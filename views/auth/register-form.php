<?php require_once '../../config.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Book Worms - Register form</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/mystyle.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
             <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  </head>
  <body>
   
     
      <?php require 'include/navbar.php'; ?>
      <?php require 'include/flash.php'; ?>
      <main class="breathe">
     
      <div class="form">
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
               
        </div>

      </main>
      
      <?php require 'include/footer_stick.php'; ?>
    
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
?>