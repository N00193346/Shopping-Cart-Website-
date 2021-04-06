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
use BookWorms\Model\OrderDetails;
use BookWorms\Model\Cart;
use BookWorms\Model\Customer;

$cart = Cart::get($request);

if ($cart->empty()) {
  $request->redirect("/views/cart-view.php");
}

$total = 0;
$quantity = 0;
//Find total cost of order
foreach ($cart->items as $item) {
$total += (intval($item->product->price)) * (intval($item->quantity));
}
//Finding quantity of order
foreach ($cart->items as $item) {
  $quantity +=  (intval($item->quantity));
  }
$customer_id = $request->session()->get("id");


try {
  
  //Create Order
  $order = new Order();
  $order->customer_id = $customer_id;
  $order->total = $total; 
  $order->save();
  


  //Create Order details
  foreach ($cart->items as $item) {
    $order_details = new OrderDetails();
    $order_details->order_id = $order->id;
    $order_details->product_id = (Product::findByModel($item->product->model))->id;
    $order_details->quantity = $item->quantity;
    $order_details->save();
  }


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