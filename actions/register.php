<?php require_once '../config.php'; ?>
<?php

use BookWorms\Model\User;
use BookWorms\Model\Customer;
use BookWorms\Model\Role;
use BookWorms\Model\Image;
use BookWorms\Http\FileUpload;

try {
  $rules = [
    "name" => "present|minlength:4|maxlength:64",
    "email" => "present|email|minlength:7|maxlength:64",
    "password" => "present|minlength:8|maxlength:64",
    "address" => "present|minlength:10|maxlength:256",
    "phone" => "present|minlength:4|maxlength:64"
  ];

  $request->validate($rules);

  if (!$request->is_valid()) {
    throw new Exception("Form not completed");
  }

  $file = new FileUpload("image_id");
  $file_path = $file->get();
  $image = new Image();
  $image->filename = $file_path;
  $image->save();
  
  $email = $request->input("email");
  $password = $request->input("password");
  $name = $request->input("name");
  $address = $request->input("address"); 
  $phone = $request->input("phone"); 
  $role_id = 4;
  $user = User::findByEmail($email);
  if ($user !== null) {
      $request->set_error("email", "Email address is already registered");
  }

  $user = new User();
  $user->email = $email;
  $user->password = password_hash($password, PASSWORD_DEFAULT);
  $user->name = $name;
  $user->role_id = $role_id;
  $user->image_id = $image_id;
  $user->save();

  $customer = new Customer();
  $customer->address = $address;
  $customer->phone = $phone;
  $customer->user_id = $user->id;
  $customer->save();
  
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