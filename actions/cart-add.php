<?php require_once '../config.php'; ?>
<?php

if ($request->is_logged_in()) {

  $role = $request->session()->get("role");
  if ($role !== "customer") {
    $request->redirect("/views/" .$role. "home.php");
  }
}

use BookWorms\Model\Product;
use BookWorms\Model\Cart;

try {
  $rules = [
    "id" => "present|integer"
  ];

  $request->validate($rules);
  if (!$request->is_valid()) {
    throw new Exception ("Id invalid");
  }

  $id = intval($request->input("id"));
  $product = Product::findById($id);
  if ($product === null) {
    throw new Exception("No product detected");
  }

  $cart = Cart::get($request);
  $cart->add($product, 1);


  $request->session()->set("flash_message", "Product: " .$product->title. "has been added to the cart");
  $request->session()->set("flash_message_class", "alert-info");
  
  $request->redirect("/views/cart-view.php");
}


catch(Exception $ex) {
  $request->session()->set("flash_message", $ex->getMessage());
  $request->session()->set("flash_message_class", "alert-warning");

  $request->redirect("/");
}
?>