<?php require_once '../../config.php'; ?>
<?php
use BookWorms\Model\User;
use BookWorms\Model\Customer;
use BookWorms\Model\Image;

if (!$request->is_logged_in()) {
  $request->redirect("/views/auth/login-form.php");
}
$role = $request->session()->get("role");
if ($role !== "customer") {
  $request->redirect("/actions/logout.php");
}
?>
<?php
try {
    $rules = [
        'id' => 'present|integer|min:1'
    ];
    $request->validate($rules);
    if (!$request->is_valid()) {
        throw new Exception("Illegal request");
    }
    $id = $request->input('id');
    $user = User::findById($id);
    $customer = Customer::findByUserId($id); 
    if ($customer === null) {
        throw new Exception("Illegal request parameter");
        }
    }
    catch (Exception $ex) {
    $request->session()->set("flash_message", $ex->getMessage());
    $request->session()->set("flash_message_class", "alert-warning");

    $request->redirect("views/customer/home.php");
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Book Worms - Edit Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/mystyle.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
             <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </head>
  <body>
   

      <?php require 'include/navbar.php'; ?>
      <?php require 'include/flash.php'; ?>
      <main role="main">
      <div class="cart breathe">
          
      <div class="row">
          <div class="col table-responsive">
          <h1>Edit Name</h1>
            <form method="post" 
                  action="<?= APP_URL .'actions/profile-update.php' ?>"
                  enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $user->id ?>" required/>  

                <div class="form-field">
              <label for="name">Name:</label>
              <input type="text" name="name" id="name" value="<?= old("name", $user->name) ?>" />
              <span class="error"><?= error("name") ?></span>
            </div>

            <div class="form-field">
              <label for="email">Email:</label>
              <input type="text" name="email" id="email" value="<?= old("email", $user->email) ?>" />
              <span class="error"><?= error("email") ?></span>
            </div>

            <div class="form-field">
             <label for="address" class="mt-2">Address:</label>
                <textarea name="address" id="address"  rows="5"><?= old('address', $customer->address) ?></textarea>
                <span class="error"><?= error('address') ?></span>
            </div>

            <div class="form-field">
              <label for="phone">Phone:</label>
              <input type="phone" name="phone" id="phone" value="<?= old("phone", $customer->phone) ?>" />
              <span class="error"><?= error("phone") ?></span>
            </div>


            <div class="form-field">
                    <label for="image_id" class="mt-2">Profile Picture:</label>
                    <?php
                    $image = Image::findById($user->image_id);
                    if ($image !== null){
                    ?>
                    <img src="<?= APP_URL . "/actions/" . $image->filename ?>" width="150px" />
                    <?php
                    }
                    ?>
                    <input type="file" name="image_id" id="image_id" value="<?= $image->filename ?>"/>
                    <span class="error"><?= error('image_id') ?></span>
              </div>
                
               <div class="margin"></div>
                <label></label>
                <button type="submit" class="btn btn-primary">Store</button>
                <a class="btn btn-danger" href="<?= APP_URL ?>/views/admin/home.php">Cancel</a>
             
        
            </form>
            </div>
        </div>
       

      </main>
      <?php require 'include/footer_stick.php'; ?>
    </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
