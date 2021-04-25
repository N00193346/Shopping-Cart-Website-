<?php require_once '../../config.php'; ?>
<?php

use BookWorms\Model\Image;
use BookWorms\Model\User;
use BookWorms\Model\Customer;

if (!$request->is_logged_in()) {
  $request->redirect("/views/auth/login-form.php");
}
$role = $request->session()->get("role");
if ($role !== "customer") {
  $request->redirect("/actions/logout.php");
}

$email = $request->session()->get("email");
$user = User::findByEmail($email);
$customer = Customer::findByUserId($user->id); 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Incredible Instrument - Customer Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/mystyle.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
             <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  </head>
  <body>
   
      <?php require 'include/navbar.php'; ?>
      <?php require 'include/flash.php'; ?>
      <main role="main">
        <div>
          <h1>Customer home</h1>
          <p class="lead">
            Hello, <?= $request->session()->get("name") ?>
          </p>
         
    
        <div class="cart margin">
      <main role="breathe">
          <ul class="nav nav-tabs" id="tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" 
                 id="orders-tab" 
                 data-toggle="tab" 
                 href="#orders" 
                 role="tab" 
                 aria-controls="orders" 
                 aria-selected="true"
              >
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" 
                 id="credit_cards-tab" 
                 data-toggle="tab" 
                 href="#credit_cards" 
                 role="tab" 
                 aria-controls="credit_cards" 
                 aria-selected="false"
              >
              Credit Cards
              </a>
            </li>
            </li>

     
          </ul>
          <div class="tab-content" id="tabContent">
            <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
              <?php require 'views/customer/orders/index.php'; ?>
            </div>
            <div class="tab-pane fade" id="credit_cards" role="tabpanel" aria-labelledby="credit_cards-tab">
              <?php require 'views/customer/credit_cards/index.php'; ?>
            </div>
           
          </div>
          

        
        </div>
      </main>

      <div class="featured">
      <h1>Profile Information</div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Profile Picture</th>
                   
                </tr>
            </thead>
            <tbody>
                <td><?= $user->name ?></td>
                <td><?= $user->email ?></td>
                <td><?= $customer->address ?></td>
                <td><?= $customer->phone ?></td>
                <td>
                <?php
                    $image = Image::findById($user->image_id);
                    if ($image !== null){
                    ?>
                    <img src="<?= APP_URL . "/actions/". $image->filename ?>" width="150px" />
                    <?php
                    }
                    ?>
                  </td>
                  
     
    </tbody>
    </table>
    <a class="btn" href="<?= APP_URL ?>/actions/profile-edit.php?id=<?= $customer->id ?>">Edit Profile</a>
        
    <div class="space__xl">  </div>

           
        </div>
      <?php require 'include/footer.php'; ?>
    
 
    <script src="<?= APP_URL ?>/assets/js/orders.js"></script>
    <script src="<?= APP_URL ?>/assets/js/credit_cards.js"></script>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
