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
use BookWorms\Model\CreditCard;
$cart = Cart::get($request);

if ($cart->empty()) {
  $request->redirect("/views/cart-view.php");
}

$customer_id = $request->session()->get("customer_id");
// Find credit cards related to customer Id
$credit_cards = CreditCard::findByCustomerId($customer_id);
// $credit_cards = CreditCard::findAll();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Incredible Instruments - Checkout</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/mystyle.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  </head>
  </head>
  <body>

      <?php require 'include/navbar.php'; ?>
      <?php require 'include/flash.php'; ?>

      <div class="featured">
      <main role="main">
        <div>
          <h1>Checkout</h1>

          <div class="space__l"></div>
          <!-- If the customer has credit cards -->
          <?php if ($credit_cards !== null) {
            
            ?>
          <div class="col">
          <h1>Saved card</h1>
          <!-- Loop through credit cards -->
          <?php foreach ($credit_cards as $credit_card) { ?>
            <form method="post" action="<?= APP_URL ?>/actions/order-store.php">
          <!-- First get the put the credit card information into a insivle form that will be used to the checkout process -->
              <div class="form-field" hidden>
              <input type="radio" checked name="id" value="<?= $credit_card->id ?>" />
              </div>
              <div class="form-field" hidden>
              <input type="text" name="cvc" id="cvc" value="<?= $credit_card->cvc ?>" />
              </div>
              <div class="form-field" hidden>
                <input type="text" name="type" id="type"  value="<?= $credit_card->type ?>" >
              </div>
              <div class="form-field" hidden>
                <input type="text" name="name" id="name"  value="<?= $credit_card->name ?>" />
              </div>
              <div class="form-field" hidden>
                <input type="text" name="card_number" id="card_number" value="<?= $credit_card->card_number ?>" />
              </div>
              <div class="form-field" hidden>
                <input type="text" name="exp_month" id="exp_month" value="<?= $credit_card->exp_month ?>" />
              </div>
              <div class="form-field" hidden>
                <input type="text" name="exp_year" id="exp_year"  value="<?= $credit_card->exp_year ?>" />
              </div>
              <table class="table" id="table-credit_cards">
              <!-- Create table to display credit card info -->
              <thead>
                  <tr>
                      <th>Type</th>
                      <th>Name on Card</th>
                      <th>Card Number</th>
                      <th>Expiry Month</th>
                      <th>Expiry Year</th>
                      <th></th>
                  </tr>
              </thead>
              <!-- Cycle through the credit card info again to display to the user
              This reason this is done twice is because the disabled info cannot be passed into the form -->
              <td>
                <input disabled value="<?= $credit_card->type ?>" >
              </td>
              <td>
                <input  disabled value="<?= $credit_card->name ?>" />
              </td>
              <td>
                <input  disabled value="<?= $credit_card->card_number ?>" />
              </td>
              <td>
                <input disabled value="<?= $credit_card->exp_month ?>" />
              </td>
              <td>
                <input  disabled value="<?= $credit_card->exp_year ?>" />
              </td>
              <td>
              <!-- Submit the hidden values -->
              <button type="submit" class="btn btn-primary">Use this Card</button> 
              </td>
              </form>
              <?php } ?>
              <?php } ?>
        
          </table>
        </div>

        <!-- Credit new card -->
        <div class="col">
        <div class="space__l"></div>
          <h1>Use new Card</h1>
          <form method="post" action="<?= APP_URL ?>/actions/order-store.php" >
                <label for="type">Card type:</label>
                <select class="form-control col-md6" name="type" id="type">
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
                    <input type="password" name="cvc" id="cvc" value="<?= old('cvc') ?>" />
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

                <label for="save">Would you like to save your card for future purchases?:</label>
                <select class="form-control" name="save" id="save">
                  <option value="yes" <?= chosen("save", "yes") ? "selected" : "" ?>>Yes</option>
                  <option value="no" <?= chosen("save", "no") ? "selected" : "" ?>>No</option>
                </select>
                <span class="error"><?= error("save") ?></span>
              </div>
                
               <div class="space__l"></div>
                <label></label>
                <button type="submit" class="btn btn-primary">Checkout</button>
                <a class="btn btn-default" href="<?= APP_URL ?>/views/cart-view.php">Cancel</a>
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
