<?php require_once '../../config.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Book Worms - Register form</title>

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
          <h1>Register form</h1>   
          <form name='register' action="<?= APP_URL . '/actions/register.php' ?>" method="post" enctype="multipart/form-data">

          
          <div class="form-field">
              <label for="name">Name:</label>
              <input type="text" name="name" id="name" value="<?= old("name") ?>" />
              <span class="error"><?= error("name") ?></span>
            </div>

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
             <label for="address" class="mt-2">Address:</label>
                <textarea name="address" id="address"  rows="5"><?= old('address') ?></textarea>
                <span class="error"><?= error('address') ?></span>
            </div>

            <div class="form-field">
              <label for="phone">Phone:</label>
              <input type="phone" name="phone" id="phone" value="<?= old("phone") ?>" />
              <span class="error"><?= error("phone") ?></span>
            </div>


            <div class="form-field">
              <label for="image_id" class="mt-2">Profile Image:</label>
              <input type="file" name="image_id" id="image_id"/>
              <span class="error"><?= error('image_id') ?></span>
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