<?php require_once '../config.php'; ?>
<?php



use BookWorms\Model\Product;
use BookWorms\Model\Image;
use BookWorms\Http\FileUpload;

try {
  $rules = [
    "id" => "present",
    "brand" => "present",
    "model" => "present",
    "price" => "present",
    "description" => "present",
    "category" => "present"
  ];


  $request->validate($rules);
  if ($request->is_valid()) {

    $image = null;
    if (FileUpload::exists("image_id")){
        $file = new FileUpload("image_id");
        $file_path = $file->get();
        $image = new Image();
        $image->filename = $file_path;
        $image->save();
    }  

    $image2 = null;
    if (FileUpload::exists('image_id2')){
        $file2 = new FileUpload("image_id2");
        $file_path2 = $file2->get();
        $image2 = new Image();
        $image2->filename = $file_path2;
        $image2->save();
    }

    $image3 = null;
    if (FileUpload::exists('image_id3')){
        $file3 = new FileUpload("image_id3");
        $file_path3 = $file3->get();
        $image3 = new Image();
        $image3->filename = $file_path3;
        $image3->save();
    }

    $image4 = null;
    if (FileUpload::exists('image_id4')){
        $file4 = new FileUpload("image_id4");
        $file_path4 = $file4->get();
        $image4 = new Image();
        $image4->filename = $file_path4;
        $image4->save();
    }
  
  
  $product = Product::findById($request->input("id"));
  $product->brand = $request->input("brand");
  $product->model = $request->input("model");
  $product->price = $request->input("price");
  $product->description = $request->input("description");
  if ($image !== null) {
      $product->image_id = $image->id;
  }
  if ($image2 !== null) {
    $product->image_id2 = $image2->id;
  }
  if ($image3 !== null) {
    $product->image_id3 = $image3->id;
  }
  if ($image4 !== null) {
    $product->image_id4 = $image4->id;
  }
 
  $product->category = $request->input("category");
  $product->save();

  $request->session()->set("flash_message", "The product was successfully updated");
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

  $request->redirect("/views/admin/product-edit.php");
}
?>