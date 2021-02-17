<?php require_once '../config.php'; ?>
<?php

use BookWorms\Model\User;
use BookWorms\Model\Role;

try {
  $rules = [
    "name" => "present|minlength:4|maxlength:64",
    "email" => "present|email|minlength:7|maxlength:64",
    "password" => "present|minlength:8|maxlength:64",
    "address" => "present|minlength:10|maxlength:256",
    "phone" => "present|match:/\A[0-9]{2,3}[-][0-9]{5,7}\Z/",
    "role_id" => "present"
  ];
  $request->validate($rules);

  if ($request->is_valid()) {
    $email = $request->input("email");
    $password = $request->input("password");
    $name = $request->input("name");
    $role_id = $request->input("role_id");
    $user = User::findByEmail($email);
    $address = $request->input("address");
    $phone = $request->input("phone");

    if ($user !== null) {
      $request->set_error("email", "Email address is already registered");
    }
    else {
      $user = new User();
      $user->email = $email;
      $user->password = password_hash($password, PASSWORD_DEFAULT);
      $user->name = $name;
      $user->role_id = $role_id;
      $user->save();

      $customer = new Customer();
      $customer->address = $address;
      $customer->phone = $phone;
      $customer->user_id = $user_id



    }
  } 
}


catch(Exception $ex) {
  $request->session()->set("flash_message", $ex->getMessage());
  $request->session()->set("flash_message_class", "alert-warning");

  $request->redirect("/views/auth/register-form.php");   
}

if ($request->is_valid()) {
  $request->session()->set('email', $user->email);
  $request->session()->set('name', $user->name);
  $request->session()->set('role', $role_id->title);
  $request->session()->set('name', $user->name);


  $request->session()->forget("flash_data");
  $request->session()->forget("flash_errors");

  $request->redirect("/views/customer/home.php");
}
else {
  $request->session()->set("flash_data", $request->all());
  $request->session()->set("flash_errors", $request->errors());

  $request->redirect("/views/auth/register-form.php");
}
?>