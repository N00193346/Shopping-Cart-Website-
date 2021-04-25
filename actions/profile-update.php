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
    "address" => "present|minlength:10|maxlength:256",
    "phone" => "present|minlength:4|maxlength:64"
  ];

  $request->validate($rules);

  if (!$request->is_valid()) {
    throw new Exception("Form not completed");
  }

  $image = null;
 
  if(FileUpload::exists('image_id')){
  $file = new FileUpload("image_id");
  $file_path = $file->get();
  $image = new Image();
  $image->filename = $file_path;
  $image->save();
  }

  $id = $request->input("id");
  $email = $request->input("email");
  $name = $request->input("name");
  $address = $request->input("address"); 
  $phone = $request->input("phone"); 
 
  $user = User::findById($id);
  $user->email = $email;
  $user->name = $name;
  if ($image !== null) {
    $user->image_id = $image->id;
  } 
 
 


  
  $user->save();

  $customer = Customer::findByUserId($id);
  $customer->address = $address;
  $customer->phone = $phone;
  $customer->user_id = $id;
  $customer->save();
  
  
  $request->session()->set('email', $user->email);
  $request->session()->set('name', $user->name);
  $request->session()->set('role', "customer");
  $request->session()->set("flash_message", "The profule updated");
  $request->session()->set("flash_message_class", "alert-info");
  $request->session()->forget("flash_data");
  $request->session()->forget("flash_errors");

  $request->redirect("/views/customer/home.php");
}


catch(Exception $ex) {
  $request->session()->set("flash_message", $ex->getMessage());
  $request->session()->set("flash_message_class", "alert-warning");

  $request->session()->set("flash_data", $request->all());
  $request->session()->set("flash_errors", $request->errors());

  $request->redirect("/views/customer/profile-edit.php");
}
?>