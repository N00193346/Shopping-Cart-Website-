<?php require_once '../../config.php'; ?>
<?php
use BookWorms\Model\Product;
use BookWorms\Model\Image;

if (!$request->is_logged_in()) {
  $request->redirect("/views/auth/login-form.php");
}
$role = $request->session()->get("role");
if ($role !== "admin") {
  $request->redirect("/actions/logout.php");
}
?>
<?php
try {
    $rules = [
        'id' => 'present|integer|min:1'
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
    }
    catch (Exception $ex) {
    $request->session()->set("flash_message", $ex->getMessage());
    $request->session()->set("flash_message_class", "alert-warning");

    $request->redirect("/admin/home.php");
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Book Worms - Edit Product</title>

    <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= APP_URL ?>/assets/css/template.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <?php require 'include/header.php'; ?>
      <?php require 'include/navbar.php'; ?>
      <?php require 'include/flash.php'; ?>
      <main role="main">
        
          
      <div class="row">
          <div class="col table-responsive">
          <h1>Edit Product</h1>
            <form method="post" 
                  action="<?= APP_URL . '/actions/product-update.php' ?>"
                  enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $product->id ?>" />  

                <label for="brand" class="mt-2">Brand</label>
                <div class="form-field">
                    <input type="text" name="brand" id="brand" value="<?= old('brand', $product->brand) ?>" />
                    <span class="error"><?= error('brand') ?></span>
                </div>

                <label for="model" class="mt-2">Model</label>
                <div class="form-field">
                    <input type="text" name="model" id="model" value="<?= old('model', $product->model) ?>" />
                    <span class="error"><?= error('model') ?></span>
                </div>

                <label for="price" class="mt-2">Price(€)</label>
                <div class="form-field">
                    <input type="text" name="price" id="price" value="<?= old('price', $product->price) ?>" />
                    <span class="error"><?= error('price') ?></span>
                </div>

                <label for="description" class="mt-2">Description</label>
                <div class="form-field">
                    <textarea name="description" id="description"  cols="147" rows="5"><?= old('description', $product->description) ?></textarea>
                    <span class="error"><?= error('description') ?></span>
                </div>

                <div>
                <label for="category">Category</label>
                <select class="form-control" name="category" id="category">
                  <option value="guitar" <?= chosen("category", "guitar") ? "selected" : "" ?>>Guitar</option>
                  <option value="bass" <?= chosen("category", "bass") ? "selected" : "" ?>>Bass</option>
                  <option value="drums" <?= chosen("category", "drums") ? "selected" : "" ?>>Drums</option>
                </select>
                <span class="error"><?= error("category") ?></span>
              </div>

                <div class="form-field">
                    <label for="image_id" class="mt-2">Product Image:</label>
                    <?php
                    $image = Image::findById($product->image_id);
                    if ($image !== null){
                    ?>
                    <img src="<?= APP_URL . "/" . $image->filename ?>" width="150px" />
                    <?php
                    }
                    ?>
                    <input type="file" name="image_id" id="image_id"/>
                    <span class="error"><?= error('image_id') ?></span>
                </div>
                
               
                <label></label>
                <button type="submit" class="btn btn-primary">Store</button>
                <a class="btn btn-danger" href="<?= APP_URL ?>/views/admin/home.php">Cancel</a>
             
        
            </form>
            </div>
        </div>
       

      </main>
      <?php require 'include/footer.php'; ?>
    </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
