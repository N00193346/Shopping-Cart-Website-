<?php require_once '../../config.php'; ?>
<?php
if (!$request->is_logged_in()) {
  $request->redirect("/views/auth/login-form.php");
}
$role = $request->session()->get("role");
if ($role !== "admin") {
  $request->redirect("/actions/logout.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Book Worms - Home</title>

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
          <h1>Create New Product</h1>
            <form method="post" 
                  action="<?= APP_URL . '/actions/product-store.php' ?>"
                  enctype="multipart/form-data">

                  
                <label for="brand" class="mt-2">Brand</label>
                <div class="form-field">
                    <input type="text" name="brand" id="brand" value="<?= old('brand') ?>" />
                    <span class="error"><?= error('brand') ?></span>
                </div>

                <label for="model" class="mt-2">Model</label>
                <div class="form-field">
                    <input type="text" name="model" id="model" value="<?= old('model') ?>" />
                    <span class="error"><?= error('model') ?></span>
                </div>

                <label for="price" class="mt-2">Price(€)</label>
                <div class="form-field">
                    <input type="text" name="price" id="price" value="<?= old('price') ?>" />
                    <span class="error"><?= error('price') ?></span>
                </div>

                <label for="description" class="mt-2">Description</label>
                <div class="form-field">
                    <textarea name="description" id="description"  cols="147" rows="5"><?= old('description') ?></textarea>
                    <span class="error"><?= error('description') ?></span>
                </div>

                <div class="form-field">
                    <label for="image_id" class="mt-2">Product Image:</label>
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
