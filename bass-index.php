<?php require_once 'config.php'; ?>

<?php 
use BookWorms\Model\Product;
use BookWorms\Model\Image;
?>
<?php
try {
    $request->session()->forget("flash_data");
    $request->session()->forget("flash_errors");
    $category = "bass";
    $products = Product::findByCategory($category);
}
catch (Exception $ex){
    $request->session()->set("flash_message", $ex->getMessage());
     $request->session()->set("flash_message_class", "alert-warning");
   
    
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/mystyle.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
             <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
       
		<title>CA2</title>
	</head>
	<body>
		
  <?php require 'include/navbar.php'; ?>
  <?php require 'include/flash.php'; ?>


        <main class="breathe">            
<!--            Products Title-->
            <div class="related">Bass Guitars:</div>
            
<!--    Product Cards-->
        <div class="products">
        <?php foreach ($products as $product) { ?>
          <a href="view-product.php?id=<?= $product->id?>">
            <div class="product__card">
            <?php $image = Image::findById($product->image_id);
               if ($image !== null){
            ?>
                <div class="product__card__image" style="background-image: url('<?= APP_URL . "/actions/" . $image->filename ?>')"></div>
                <?php  } 
                 ?>
                    <div class="product__card__brand"><?= $product->brand ?></div>
                    <div class="product__card__model"><?= $product->model ?></div>
                    <div class="product__card__price">€<?= $product->price ?></div>
                    <div class="gap"></div>
                    <!-- If user is not an admin display form button -->
                    <?php $role = $request->session()->get("role");
                    if ($role !== "admin") {?>
                    <form method="post" action="<?= APP_URL ?>/actions/cart-add.php">
                    <input type="hidden" name="id" value="<?= $product->id ?>"/>
                      <div class="product__card__button"><button type="submit" >Add to cart</button></div>
                    </form>
                    <?php  } 
                    ?>
        
            </div>
            </a>
            <?php  } 
            ?>
        </div>
        
		</main>
        
        
        <footer class="footer">
            <div class="footer__brand">
                  <p>©Incredible Instruments</p>
            </div>
        </footer>
        
	</body>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
