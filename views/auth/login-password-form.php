<?php require_once '../../config.php'; ?>
<?php
if ($request->is_logged_in()) {
  $role = $request->session()->get("role");
  $request->redirect("/views"."/".$role."/home.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Incredible Instruments - Login form</title>
    <link rel="stylesheet" href="assets/css/mystyle.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
             <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </head>
  </head>
  <body>
 
 
      <?php require 'include/navbar.php'; ?>
      <?php require 'include/flash.php'; ?>
      <div class="featured">
      <main role="main">
        <div>
          <h1>Forgotten password form</h1>
          <form name='login' action="<?= APP_URL ?>/views/auth/password-form.php" method="post">
            <div class="form-field">
              <label for="email">Email:</label>
              <input type="text" name="email" id="email" value="<?= old("email") ?>" />
              <span class="error"><?= error("email") ?></span>
            </div>
            <div class="form-field">
              <label></label>
              <input class="btn btn-primary" type="submit" name="submit" value="Login" />
              
              <a class="btn btn-light" href="<?= APP_URL . "/" ?>" >Cancel</a>
            </div>
        
        </form>
        </div>
      </main>
   
    </div>
    <?php require 'include/footer_stick.php'; ?>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
$request->session()->forget("flash_data");
$request->session()->forget("flash_errors");
?>