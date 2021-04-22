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
    <title>Incredible Instruments - Manager Home</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/mystyle.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
             <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  </head>
  <body>
    
    
      <?php require 'include/navbar.php'; ?>
      <?php require 'include/flash.php'; ?>
      <div class="cart margin">
      <main role="breathe">
      <h1>Admin home</h1>
        <div class="space__l"></div>
        <a class="btn btn-primary float-center" href="<?= APP_URL ?>views/admin/product-create.php">Add Product</a>
        <div class="space__l"></div>
          <ul class="nav nav-tabs" id="tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" 
                 id="products-tab" 
                 data-toggle="tab" 
                 href="#products" 
                 role="tab" 
                 aria-controls="products" 
                 aria-selected="true"
              >
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" 
                 id="orders-tab" 
                 data-toggle="tab" 
                 href="#orders" 
                 role="tab" 
                 aria-controls="orders" 
                 aria-selected="false"
              >
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" 
                 id="customers-tab" 
                 data-toggle="tab" 
                 href="#customers" 
                 role="tab" 
                 aria-controls="customers" 
                 aria-selected="false"
              >
                Customers
              </a>
            </li>
          </ul>
          <div class="tab-content" id="tabContent">
            <div class="tab-pane fade show active" id="products" role="tabpanel" aria-labelledby="products-tab">
              <?php require 'views/admin/products/index.php'; ?>
            </div>
            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
            <?php require 'views/admin/orders/index.php'; ?>
            </div>
            <div class="tab-pane fade" id="customers" role="tabpanel" aria-labelledby="customers-tab">
            <?php require 'views/admin/customers/index.php'; ?>
            </div>
          </div>
          
        
        </div>
      </main>
</div>
      <?php require 'include/footer.php'; ?>
    
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/products.js"></script>
    <script src="<?= APP_URL ?>/assets/js/orders.js"></script>
    <script src="<?= APP_URL ?>/assets/js/customers.js"></script>
    <script src="<?= APP_URL ?>/assets/js/deletequery.js"></script>
  </body>
</html>