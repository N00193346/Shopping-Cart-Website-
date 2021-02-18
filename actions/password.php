<?php require_once '../config.php'; ?>
<?php

use BookWorms\Model\User;
use BookWorms\Model\Customer;
use BookWorms\Model\Role;

try {
  $rules = [
    "user_id" => "present",
    "email" => "present|email|minlength:7|maxlength:64",
    "password" => "present|minlength:8|maxlength:64"
  ];

  $request->validate($rules);

  if (!$request->is_valid()) {
    throw new Exception("Form not completed");
  }

  $email = $request->input("email");
  $password = $request->input("password");
  $name = $request->input("name");
  $id = $request->input("user_id");

  $user = User::findByID($id);
  $user->email = $email;
  $user->password = password_hash($password, PASSWORD_DEFAULT);
  $user->name = $name;
  $user->save();

  
  $request->session()->set('email', $user->email);
  $request->session()->set('name', $user->name);
  $request->session()->set('role', "customer");
  $request->session()->forget("flash_data");
  $request->session()->forget("flash_errors");

  $request->redirect("/views/customer/home.php");
}

catch(Exception $ex) {
  $request->session()->set("flash_message", $ex->getMessage());
  $request->session()->set("flash_message_class", "alert-warning");

  $request->session()->set("flash_data", $request->all());
  $request->session()->set("flash_errors", $request->errors());

  $request->redirect("/views/auth/register-form.php");
}
?>