<?php require_once '../../config.php'; 
// if (!$request->is_logged_in()) {
//   $request->redirect("/views/auth/login-form.php");
// }
?>
<?php
use BookWorms\Model\User;
use BookWorms\Model\Customer;
use BookWorms\Model\Role;


try {
    $rules = [
        'email' => 'present'
    ];
    $request->validate($rules);
    if (!$request->is_valid()) {
        throw new Exception("Illegal request");
    }
    $email = $request->input('email');
    $user = User::findByEmail($email);
    if ($user === null) {
        throw new Exception("Illegal request parameter");
        }
    }
    catch (Exception $ex) {
    $request->session()->set("flash_message", $ex->getMessage());
    $request->session()->set("flash_message_class", "alert-warning");

    $request->redirect("/views/auth/login-form.php");
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Incredible Instruments - Password form</title>

    <link rel="stylesheet" href="assets/css/mystyle.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
             <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </head>
  <body>
 
 
      <?php require 'include/navbar.php'; ?>
      <?php require 'include/flash.php'; ?>
      <div class="container">
      <main role="main">
        <div>
          <h1>Password form</h1>   
          <form name='register' action="<?= APP_URL . '/actions/password.php' ?>" method="post">

          <input type="hidden" name="user_id" value="<?= $user->id ?>" />  
          
          <div class="form-field">
              <label for="name">Name:</label>
              <input type="text" name="name" id="name" value="<?= old('name', $user->name) ?>" diasbled/>
              <span class="error"><?= error("name") ?></span>
            </div>

            <div class="form-field">
              <label for="email">Email:</label>
              <input type="text" name="email" id="email" value="<?= old('email', $user->email) ?>" />
              <span class="error"><?= error("email") ?></span>
            </div>

            <div class="form-field">
              <label for="password">Password:</label>
              <input type="password" name="password" id="password" />
              <span class="error"><?= error("password") ?></span>
            </div>
    
            </div>

            <div class="form-field">
              <label>  </label>
              <input type="submit" name="submit" value="Submit" />
            </div>

            </form>
            </main>       
        </div>
      </main>
     
    </div>
    <?php require 'include/footer_stick.php'; ?>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
?>