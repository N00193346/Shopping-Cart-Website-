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
    <title>Book Worms - Password form</title>

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
      <?php require 'include/footer.php'; ?>
    </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
?>