<?php require_once '../config.php'; ?>
<?php



use BookWorms\Model\Product;
use BookWorms\Model\Image;
use BookWorms\Http\FileUpload;

try {
  $rules = [
    "id" => "present"
  ];

  $request->validate($rules);
  if (!$request->is_valid()) {
      throw new Exception("Illegal request");
  }
  $id = $request->input('id');
  $product = Product::findById($id);
  if ($product === null) {
      throw new Exception("Illegal request parameter");
      }
  
  
  $product->delete();

  $request->session()->set("flash_message", "The product was successfully deleted from the database");
  $request->session()->set("flash_message_class", "alert-info");
  $request->session()->forget("flash_data");
  $request->session()->forget("flash_errors");
  
  $request->redirect("/views/admin/home.php");
}


catch(Exception $ex) {
  $request->session()->set("flash_message", $ex->getMessage());
  $request->session()->set("flash_message_class", "alert-warning");

  $request->session()->set("flash_data", $request->all());
  $request->session()->set("flash_errors", $request->errors());

  $request->redirect("/views/admin/home.php");
}
?>