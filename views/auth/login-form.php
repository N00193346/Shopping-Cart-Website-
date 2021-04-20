<?php require_once '../../config.php'; ?>

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
   
    
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="../../assets/css/mystyle.css" />
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
<!--        Home header-->
      <div>
          <h1>Login form</h1>
          <form name='login' action="<?= APP_URL . '/actions/login.php' ?>" method="post" >
            <div class="form-field">
              <label for="email">Email:</label>
              <input type="text" name="email" id="email" value="<?= old("email") ?>" />
              <span class="error"><?= error("email") ?></span>
            </div>
            <div class="form-field">
              <label for="password">Password:</label>
              <input type="password" name="password" id="password" />
              <span class="error"><?= error("password") ?></span>
            </div>
            <div class="form-field">
              <label></label>
              <input class="btn btn-primary" type="submit" name="submit" value="Login" />
              <a class="btn btn-light" href="<?= APP_URL . "/" ?>" >Cancel</a>
            </div>
            <a class="nav-link" href="<?= APP_URL ?>/views/auth/login-password-form.php">Forgotten password?</a>
        </form>
        
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
