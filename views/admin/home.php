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
        <div>
          <h1>Admin home</h1>
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
            <h2> orders</h2>
            </div>
            <div class="tab-pane fade" id="customers" role="tabpanel" aria-labelledby="customers-tab">
              <h2>Customers</h2>
            </div>
          </div>
        </div>
      </main>
      <?php require 'include/footer.php'; ?>
    </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/products.js"></script>
    <script src="<?= APP_URL ?>/assets/js/orders.js"></script>
  </body>
</html>