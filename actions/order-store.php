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
use BookWorms\Model\CreditCard;

//Get contents of cart
$cart = Cart::get($request);
//Get customers id from session

//If the cart is empty redirect the customer
if ($cart->empty()) {
  $request->redirect("/views/cart-view.php");
}


try {
//Get Customer Id from sessions
  $customer_id = $request->session()->get("customer_id");
//   $rules = [
//     "type" => "present",
//     "name" => "present|minlength:4|maxlength:64",
//     "card_number" => "present|minlength:12|maxlength:12",
//     "cvc" => "present|minlength:3|maxlength:3",
//     "exp_month" => "present|minlength:2|maxlength:2",
//     "exp_year" => "present|minlength:2|maxlength:4"
//   ];
//   $request->validate($rules);


//  if ($request->is_valid()) {
  //Getting variables from passed form 
    $id = $request->input("id");
    $type = $request->input("type");
    $name = $request->input("name");
    $card_number = $request->input("card_number");
    $cvc = $request->input("cvc");
    $exp_month = $request->input("exp_month");
    $exp_year = $request->input("exp_year");
    $save = $request->input("save");
  
  //Check if credit card uses already exists in database
  $check_credit_card = CreditCard::findByCardNumber($card_number);

  // If credit card does not exist, create in database
  if ($check_credit_card === null) {
  $credit_card = new CreditCard();
  $credit_card->type = $type;
  $credit_card->name = $name;
  $credit_card->card_number = $card_number;
  $credit_card->cvc = $cvc;
  $credit_card->exp_month = $exp_month;
  $credit_card->exp_year = $exp_year;
  //If the user wants to save credit card for future purchases, assign it to their account 
  if ($save === "yes"){
  $credit_card->customer_id = $customer_id;
  }
  $credit_card->save();
  }

//If the user did not use a saved credit card, we want replace the id variable with id of the credit card just created
// $id = $credit_card->id;

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
  
  //Create Order
  $order = new Order();
  $order->customer_id = $customer_id;

  //If the there was no credit card in the database, use the of the credit card created
  if ($check_credit_card === null) {
  $order->credit_card_id = $credit_card->id;
  //Else use the id passed from the saved card
  } else {
  $order->credit_card_id = $id;
  }
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

  $request->redirect("/views/checkout.php");
}

?>