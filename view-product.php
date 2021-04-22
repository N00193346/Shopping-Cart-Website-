<?php require_once 'config.php'; ?>

<?php 
use BookWorms\Model\Product;
use BookWorms\Model\Image;
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
  $brand = $product->brand;
  $relatedProducts = Product::findByBrand($brand);
  if ($product === null) {
      throw new Exception("Illegal request parameter");
      }

  
  }

  catch (Exception $ex) {
  $request->session()->set("flash_message", $ex->getMessage());
  $request->session()->set("flash_message_class", "alert-warning");

  $request->redirect("index.php");
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
        
        <div class="main__product">
            <div class="main__product__images">
            <?php $image = Image::findById($product->image_id);
                $image2 = Image::findById($product->image_id2);
                $image3 = Image::findById($product->image_id3);
                $image4 = Image::findById($product->image_id4);
               if ($image !== null){   ?>
                   <div class="main__image__large"><img src="<?= APP_URL . "/actions/" . $image->filename ?>" alt="" /></div>
                   <?php  } 
                   ?>
                <div class="main__product__image__sub">
                <?php if ($image2 !== null){   ?>
                    <div class="main__product__image__sub__small"><img src="<?= APP_URL . "/actions/" . $image2->filename ?>" alt="" /></div>
                    <?php  } 
                   ?>
                 <?php if ($image3 !== null){   ?>
                    <div class="main__product__image__sub__small"><img src="<?= APP_URL . "/actions/" . $image3->filename ?>" alt="" /></div>
                    <?php  } 
                   ?>
                <?php if ($image4 !== null){   ?>
                    <div class="main__product__image__sub__small"><img src="<?= APP_URL . "/actions/" . $image4->filename ?>" alt="" /></div>
                    <?php  } 
                   ?>
                </div>
             
            </div>
            <div class="side">
                 <div class="side__brand"><?= $product->brand ?></div>
                <div class="side__model"><?= $product->model ?></div>
                <div class="side__price">€<?= $product->price ?></div>
                 <!-- If user is not an admin display form button -->
                 <?php $role = $request->session()->get("role");
                 if ($role !== "admin") {?>
                <form method="post" action="<?= APP_URL ?>/actions/cart-add.php">
                <input type="hidden" name="id" value="<?= $product->id ?>"/>
                 <div class="side__button"><button>Add to cart</button></div>
                 </form>
                 <!-- Else display button to edit product -->
                 <?php  } else { ?>
                <form method="post" action="<?= APP_URL ?>views/admin/product-edit.php?id=<?= $product->id ?>">
                <input type="hidden" name="id" value="<?= $product->id ?>"/>
                 <div class="side__button"><button>Edit</button></div>
                 </form>
                 <?php  } 
                 ?>
            </div>
        </div>
        
        <div class="info">
            <div class="description">
                <div class="description__heading">Description</div>
                <div class="description__text">
                <?= $product->description ?>
                </div>
            </div>
            <div class="specs">
                 <div class="specs__heading">Specs</div>
                <div class="specs__text">
                 <ul>
                     <li><b>Neck type:</b> Nitro Wizard 5pc Panga Panga/Walnut neck</li>
                     <li><b>Body:</b> Flamed Maple top/Nyatoh body</li>
                     <li><b>Fretboard:</b> Bound Macassar Ebony fretboard w/White Step off-set dot inlay</li>
                     <li><b>Frets: </b>Sub zero treated Jumbo frets</li>
                     <li><b>Bridge:</b> Gibraltar Standard II bridge</li>
                     <li><b>Neck pickup:</b> Bare Knuckle Aftermath</li>
                    <li><b>Hardware color:</b> Cosmo black</li>
                </ul>
                </div>
            </div>
        </div>
        
        
        <div class="related">More from <?= $product->brand ?>:</div>
        
            
        <div class="products">
        <?php foreach ($relatedProducts as $relatedProduct) { ?>
            <?php if ($relatedProduct->id !== $product->id) { ?>
           
          <a href="view-product.php?id=<?= $relatedProduct->id?>" class="product__card">
            
            <?php $image = Image::findById($relatedProduct->image_id);
               if ($image !== null){
            ?>
                <div class="product__card__image" style="background-image: url('<?= APP_URL . "/actions/" . $image->filename ?>')"></div>
                <?php  } 
                 ?>
                    <div class="product__card__brand"><?= $relatedProduct->brand ?></div>
                    <div class="product__card__model"><?= $relatedProduct->model ?></div>
                    <div class="product__card__price">€<?= $relatedProduct->price ?></div>
                    <div class="gap"></div>
                     <!-- If user is not an admin display form button -->
                     <?php $role = $request->session()->get("role");
                    if ($role !== "admin") {?>
                    <form method="post" action="<?= APP_URL ?>/actions/cart-add.php">
                    <input type="hidden" name="id" value="<?= $relatedProduct->id ?>"/>
                      <div class="product__card__button"><button type="submit" >Add to cart</button></div>
                    </form>
                    <?php  } 
                    ?>
        
            
            </a>
            <?php  } 
            ?>
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
