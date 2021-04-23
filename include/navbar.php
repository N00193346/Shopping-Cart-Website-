<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="../../assets/css/mystyle.css" />
<!--        Bootstrap Nav Bar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">Incredible Instruments</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="<?= APP_URL ?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= APP_URL ?>views/about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= APP_URL ?>views/contact.php">Contact</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <?php if (!$request->session()->has("email")) { ?>
                <a class="btn button_background my-2 my-sm-0 margin" href="<?= APP_URL ?>views/auth/login-form.php">Log In</a>
                <a class="btn button_background my-2 my-sm-0 margin" href="<?= APP_URL ?>views/auth/register-form.php">Register</a>
              <?php } else { ?>
                <a href="<?= APP_URL ?>/actions/logout.php">Logout</a>
              <?php $role = $request->session()->get("role");
              if ($role !== "admin") {?>
                <a class="btn button_background my-2 my-sm-0 margin" href="<?= APP_URL ?>/views/cart-view.php">View Cart</a>
                <a class="btn button_background my-2 my-sm-0 margin" href="<?= APP_URL ?>/views/customer/home.php">My Profile</a>
              <?php } else { ?>
                <a class="btn button_background my-2 my-sm-0 margin" href="<?= APP_URL ?>views/admin/home.php">Admin Tools</a>
                <?php } ?>
               <?php } ?>
            </form>
          </div>
        </nav>
