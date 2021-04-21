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

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Book Worms - Contact us</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/mystyle.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
             <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  </head>
  <body>
    
      <?php require 'include/navbar.php'; ?>
      <?php require 'include/flash.php'; ?>
     <div class="cart">
      <main role="main">
        <div>
          <h1>View Cart</h1>
          <?php if ($cart->empty()) {?>
          <p>Your shopping cart is empty.</p>
          <?php } else {?>
          <table class="table">
            <thead>
              <tr>
                <th>Product</th>
                <th class="text-right">Price</th>
                <th class="text-center">Quantity</th>
                <th class="text-right">Total</th>
              </tr>
            </thead>
          <tbody>
            <?php
              $total = 0;
              foreach ($cart->items as $item) {
                $total += (intval($item->product->price)) * (intval($item->quantity));
                ?>
              <tr>
                <td class="bold"><?= $item->product->brand ?> <?= $item->product->model ?> </td>
                <td class="text-right">€<?= $item->product->price ?></td>
                <td class="text-center">
                <form method="post">
                  <input type="hidden" name="id" value="<?= $item->product->id ?>" />
                  <button class="btn btn-light" type="submit" formaction="<?= APP_URL ?>/actions/cart-remove.php">&lt;</button>
                  <span class="ml-2 mr-2"><?= $item->quantity ?></span>
                  <button class="btn btn-light" type="submit"formaction="<?= APP_URL ?>/actions/cart-add.php">&gt;</button>
              </form>
              </td>
              <td class="text-right">€<?= (intval($item->product->price)) * (intval($item->quantity)) ?></td>
            </tr>
            <?php } ?>
            <tr>
                <th colspan="3">Total amount due</th>
                <th class="text-right">€<?= $total ?></th>
            </tr>
          </tbody>
        </table>
     </div>
        <a href="<?= APP_URL ?>/views/checkout.php" class="btn btn-primary">Checkout</a>
        <?php } ?>

        </div>
      </main>
      <?php require 'include/footer_stick.php'; ?>
    
    <!-- <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script> -->
  </body>
</html>
