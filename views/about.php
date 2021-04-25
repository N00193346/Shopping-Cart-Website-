<?php require_once '../config.php'; ?>
<!doctype html>
<html lang="en">
<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/mystyle.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
             <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
       
		<title>CA2</title>
	</head>
  <body>
   
      <?php require 'include/navbar.php'; ?>
      <?php require 'include/flash.php'; ?>
      <main role="">
      <div class="space__xl"></div>
        <div>
          <h1>About us</h1>
          <div class="space__xl"></div>
          <div class="row">
            <div class="col">
              <p class="lead">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Vivamus rutrum condimentum porttitor. Cras interdum lectus 
                nisl. Cras ac purus dui. Donec facilisis tortor metus, vel 
                fermentum nunc aliquet et. Cras auctor non metus eget 
                volutpat. Class aptent taciti sociosqu ad litora torquent 
                per conubia nostra, per inceptos himenaeos. Ut ac turpis in 
                sem pulvinar blandit. Maecenas hendrerit ac dui ut pulvinar. 
                Nam a eros sit amet lectus commodo tempus. Sed quis purus 
                metus. Sed metus mi, bibendum ut dui quis, mattis eleifend 
                ipsum. Sed dui turpis, cursus at commodo ac, consectetur et 
                augue. Donec non dolor eros. Aenean consequat facilisis est, 
                ac ornare turpis.
              </p>
              <p>
                Pellentesque risus orci, laoreet vel lorem ac, consequat 
                sagittis nulla. Morbi cursus vel ligula pretium consectetur. 
                Donec ac erat ac augue convallis sollicitudin vitae consequat 
                libero. Nunc porta justo a fermentum aliquet. Praesent 
                placerat velit eget magna euismod porttitor. Sed at dapibus 
                risus, et pellentesque nisl. Sed laoreet lacus dignissim 
                velit aliquet facilisis. Donec leo arcu, posuere ut 
                fermentum eu, fringilla non nisi. Curabitur elementum nisi 
                ac commodo porttitor. In hendrerit lacinia quam ut facilisis. 
                Sed lectus felis, sollicitudin sed leo non, lacinia 
                pellentesque nunc. Suspendisse accumsan vitae orci quis 
                volutpat. In ac nisi ac dui pharetra suscipit.
              </p>
              <p>
                Sed tincidunt augue eleifend, laoreet diam a, convallis 
                nulla. Proin in orci consequat, venenatis enim et, imperdiet 
                urna. Sed a convallis quam, eget interdum sapien. Maecenas 
                eleifend est eget nunc tristique, eget convallis purus 
                congue. Lorem ipsum dolor sit amet, consectetur adipiscing 
                elit. Praesent a elit rhoncus, condimentum ipsum eu, varius 
                erat. Nullam arcu nulla, viverra ac blandit ut, vestibulum 
                quis enim. Vestibulum ante ipsum primis in faucibus orci 
                luctus et ultrices posuere cubilia curae; Quisque a augue 
                vel lorem convallis consequat. Nunc quis tincidunt justo, 
                sit amet consequat sem.
              </p>
            </div>
            <div class="col">
              <img src="<?= APP_URL ?>/assets/img/cart.png" />
            </div>
          </div>
      
      </main>
      <?php require 'include/footer.php'; ?>
    </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
