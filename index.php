<?php require_once 'config.php'; ?>

<?php 
use BookWorms\Model\Product;
use BookWorms\Model\Image;
?>
<?php
try {
    $request->session()->forget("flash_data");
    $request->session()->forget("flash_errors");
    $products = Product::findAll();
}
catch (Exception $ex){
    $request->session()->set("flash_message", $ex->getMessage());
     $request->session()->set("flash_message_class", "alert-warning");
    $festivals = [];
    
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome to Book Worms</title>

    <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= APP_URL ?>/assets/css/template.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <?php require 'include/header.php'; ?>
      <?php require 'include/navbar.php'; ?>
      <?php require 'include/flash.php'; ?>
      <main role="main">
        <div>
          <h1>Welcome to Book Worms</h1>
          <p class="lead">
            Nam eget sollicitudin nunc. Quisque volutpat felis mi, in rutrum ligula 
            dictum in. Curabitur augue ex, blandit id pellentesque interdum, aliquet 
            ac tellus. Vivamus sit amet augue posuere, ultricies purus a, pharetra 
            ante. Nullam congue, mauris vel vehicula dictum, velit risus posuere 
            metus, ut luctus sapien nisl in risus. Donec faucibus dictum ornare. 
            Quisque interdum velit dui. Vestibulum sem ex, accumsan non ultricies vel, 
            blandit vitae enim. Pellentesque quis tortor quis nulla hendrerit porta. 
            Proin facilisis ac nibh in hendrerit.
          </p>
        </div>


        <div class="card-columns">
        <?php foreach ($products as $product) { ?>
        <div class="card mb-3" style="width: 18rem;">
    
        <?php $image = Image::findById($product->image_id);
        if ($image !== null){
          ?>
          <img src="<?= APP_URL . "/actions/" . $image->filename ?>" width="270px" alt="image" />
          <?php  } 
            ?>
          <div class="card-body">
            <h5 class="card-title"><?= $product->brand ?></h5>
            <h5 class="card-title"><?= $product->model ?></h5>
            <h5 class="card-title">€<?= $product->price ?></h5>
            <p class="card-text"><?= $product->description ?></p>
          </div>
          <form nethod  = "post" action="<?= APP_URL ?>/actions/cart-add.php ">
            <input type="hidden" name="id" value="<?= $product->id ?>"/>
            <button type="submit" class="btn btn-primary">Add to cart</button>
          </div>
            <?php  } 
            ?>
          </div>
        
      
      
      
        



      </main>
      <?php require 'include/footer.php'; ?>
    </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
