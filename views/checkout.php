<?php require_once '../config.php'; ?>

<?php
if (!$request->is_logged_in()) {
  $request->redirect("/views/auth/login-form.php");
}
$role = $request->session()->get("role");
if ($role !== "customer") {
  $request->redirect("/views/" .$role. "/home.php");
}

use BookWorms\Model\Cart;
$cart = Cart::get($request);
if ($cart->empty()) {
  $request->redirect("/views/cart-view.php");
}



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Book Worms - Checkout</title>

    <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= APP_URL ?>/assets/css/template.css" rel="stylesheet">
    <link href="<?= APP_URL ?>/assets/css/form.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <?php require 'include/header.php'; ?>
      <?php require 'include/navbar.php'; ?>
      <?php require 'include/flash.php'; ?>
      <main role="main">
        <div>
          <h1>Checkout</h1>
          <form method="post" action="<?= APP_URL ?>/actions/order-store.php" >



        
                <label for="type">Card type:</label>
                <select class="form-control" name="type" id="type">
                  <option value="mastercard" <?= chosen("type", "mastercard") ? "selected" : "" ?>>Master Card</option>
                  <option value="visa" <?= chosen("type", "visa") ? "selected" : "" ?>>Visa</option>
                </select>
                <span class="error"><?= error("type") ?></span>
              </div>
                  
                <label for="name" class="mt-2">Name on card</label>
                <div class="form-field">
                    <input type="text" name="name" id="name" value="<?= old('name') ?>" />
                    <span class="error"><?= error('name') ?></span>
                </div>

                <label for="card_number" class="mt-2">Card Number</label>
                <div class="form-field">
                    <input type="text" name="card_number" id="card_number"  value="<?= old('card_number') ?>" />
                    <span class="error"><?= error('card_number') ?></span>
                </div>

                <label for="cvc" class="mt-2">Cvc</label>
                <div class="form-field">
                    <input type="text" name="cvc" id="cvc" value="<?= old('cvc') ?>" />
                    <span class="error"><?= error('cvc') ?></span>
                </div>

                <label for="exp_month" class="mt-2">Expiry Month</label>
                <div class="form-field">
                    <input type="text" name="exp_month" id="exp_month" value="<?= old('exp_month') ?>" />
                    <span class="error"><?= error('exp_month') ?></span>
                </div>

                <label for="exp_year" class="mt-2">Expiry Year</label>
                <div class="form-field">
                    <input type="text" name="exp_year" id="exp_year" value="<?= old('exp_year') ?>" />
                    <span class="error"><?= error('exp_year') ?></span>
                </div>

    
                
               
                <label></label>
                <button type="submit" class="btn btn-primary">Checkout</button>
                <a class="btn btn-default" href="<?= APP_URL ?>/views/cart-view.php">Cancel</a>
            </form>
         
     
       

        </div>
      </main>
      <?php require 'include/footer.php'; ?>
    </div>
    <!-- <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script> -->
  </body>
</html>
