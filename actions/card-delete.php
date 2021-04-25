<?php require_once '../config.php'; ?>
<?php



use BookWorms\Model\CreditCard;


try {
  $rules = [
    "id" => "present"
  ];

  $request->validate($rules);
  if (!$request->is_valid()) {
      throw new Exception("Illegal request");
  }
  $id = $request->input('id');
  $credit_card = CreditCard::findById($id);
  if ($credit_card === null) {
      throw new Exception("Illegal request parameter");
      }
  
  
  $credit_card->delete();

  $request->session()->set("flash_message", "The credit card was successfully removed from the database");
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

  $request->redirect("/views/customer/home.php");
}
?>