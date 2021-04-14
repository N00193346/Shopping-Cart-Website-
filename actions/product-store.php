<?php require_once '../config.php'; ?>
<?php



use BookWorms\Model\Product;
use BookWorms\Model\Image;
use BookWorms\Http\FileUpload;

try {
  $rules = [
    "brand" => "present",
    "model" => "present",
    "price" => "present",
    "description" => "present",
    "category" => "present"
  ];

  $request->validate($rules);
  if ($request->is_valid()) {
  $file = new FileUpload("image_id");
  $file_path = $file->get();
  $image = new Image();
  $image->filename = $file_path;
  $image->save();
  
  $product = new Product();
  $product->brand = $request->input("brand");
  $product->model = $request->input("model");
  $product->price = $request->input("price");
  $product->description = $request->input("description");
  $product->image_id = $image->id;
  $product->category = $request->input("category");
  $product->save();

  $request->session()->set("flash_message", "The product was successfully added to the database");
  $request->session()->set("flash_message_class", "alert-info");
  $request->session()->forget("flash_data");
  $request->session()->forget("flash_errors");


  $request->redirect("/views/admin/home.php");
}
}

catch(Exception $ex) {
  $request->session()->set("flash_message", $ex->getMessage());
  $request->session()->set("flash_message_class", "alert-warning");

  $request->session()->set("flash_data", $request->all());
  $request->session()->set("flash_errors", $request->errors());

  $request->redirect("/views/admin/product-create.php");
}
?>