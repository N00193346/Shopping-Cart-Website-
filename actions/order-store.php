<?php require_once '../config.php'; ?>
<?php
if (!$request->is_logged_in()) {
  $request->redirect("/views/auth/login-form.php");
}
$role = $request->session()->get("role");
if ($role !== "customer") {
  $request->redirect("/views/" .$role. "/home.php");
}

use BookWorms\Model\Product;
use BookWorms\Model\Order;
use BookWorms\Model\Cart;
use BookWorms\Model\Customer;

$cart = Cart::get($request);

if ($cart->empty()) {
  $request->redirect("/views/cart-view.php");
}

$total = 0;
foreach ($cart->items as $item) {
$total += (intval($item->product->price)) * (intval($item->quantity));
}

$customer_id = $request->session()->get("id");


try {
//   $rules = [
//     "id" => "present",
//   ];

//   $request->validate($rules);
//   if ($request->is_valid()) {
  
  $order = new Order();
  $order->customer_id = $customer_id;
 
  $order->total = $total; 
  $order->save();

  $request->session()->set("flash_message", "Purchase Completed");
  $request->session()->set("flash_message_class", "alert-info");
  $request->session()->forget("flash_data");
  $request->session()->forget("flash_errors");

  $cart->clear();

  $request->redirect("views/customer/home.php");
  }
// }
  catch(Exception $ex) {
  $request->session()->set("flash_message", $ex->getMessage());
  $request->session()->set("flash_message_class", "alert-warning");

  $request->session()->set("flash_data", $request->all());
  $request->session()->set("flash_errors", $request->errors());

  $request->redirect("/views/cart-view.php");
}

?>