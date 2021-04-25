<?php require_once '../config.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Increidt Instruments - Contact us</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/mystyle.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
             <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <body>
    
   
      <?php require 'include/navbar.php'; ?>
      <?php require 'include/flash.php'; ?>
      <div class="featured">
      <main role="main">
        <div>
          <h1>Contact us</h1>
          <div class="row">
            <div class="col-lg">
              <p class="lead">
                Aliquam tristique tellus eu diam gravida tempor. Sed tellus 
                velit, scelerisque vel elementum et, dignissim at felis. 
                Integer in aliquet quam, fermentum bibendum lacus. Mauris 
                nisi massa, facilisis nec viverra nec, faucibus in felis. In 
                posuere malesuada orci, vitae gravida tortor aliquet blandit. 
                Etiam et velit quis augue viverra sodales. Quisque eu magna 
                in est vestibulum lacinia ut eu mauris. Etiam imperdiet 
                sollicitudin erat, et placerat massa bibendum id. Proin odio 
                metus, iaculis at posuere sed, facilisis vel mauris. 
                Pellentesque ac neque at leo tincidunt auctor in eu ante. 
                Etiam ut suscipit tortor. Sed pretium suscipit eros, eu 
                scelerisque purus porta eget. Aenean tempus risus vel urna 
                blandit feugiat.
              </p>
              <p>
                Phasellus nulla lacus, tristique quis sem eu, porta suscipit 
                libero. Nulla pulvinar purus id pellentesque feugiat. Nam sit 
                amet tincidunt elit. Nunc tincidunt orci ac auctor luctus. 
                Sed iaculis auctor dictum. Etiam et metus ullamcorper, 
                viverra nisl et, volutpat velit. Etiam vel bibendum elit. 
                Proin condimentum auctor viverra.
              </p>
              <p>
                Nam nibh lectus, faucibus ac maximus id, ultrices sit amet 
                ex. Praesent faucibus mi et ipsum cursus venenatis at et 
                ante. Vivamus eu fringilla diam. Sed ac cursus diam, nec 
                eleifend est. Phasellus convallis placerat orci, vel ornare 
                est ornare nec. Vestibulum quis dolor eu enim commodo 
                posuere. Nam ut nunc quis dolor faucibus feugiat. Proin at 
                quam id nibh blandit eleifend quis eu diam. Maecenas a 
                tempor diam. Aliquam bibendum magna leo, id fringilla velit 
                maximus at. Nullam rutrum porta justo, commodo varius orci 
                vulputate ut. Etiam molestie mauris dolor, ac porttitor erat 
                varius aliquet. Cras ac lobortis augue. Sed vitae ligula 
                dignissim, placerat tellus quis, mollis nulla. Aliquam at 
                nibh odio. Vivamus ultrices, enim quis ullamcorper 
                consectetur, magna lectus efficitur urna, ac accumsan nisi 
                lectus et ex.
              </p>
            </div>
            <div class="col-lg">
              <h3>
                <img 
                  src="<?= APP_URL ?>/assets/img/email.png"
                  width="40px" />
                Send us a message 
              </h3>
              <p>
                Please use the form below to send us a message, ask
                us a question, and our support team will get back to 
                you as soon as possible.
              </p>
              <form name='login' action="<?= APP_URL . '/actions/email/email.php' ?>" method="post">
                <div class="form-field">
                  <label for="name">Name:</label>
                  <input type="name" name="name" id="name" />
                  <span class="error"><?= error("name") ?></span>
                </div>
                <div class="form-field">
                  <label for="email">Email:</label>
                  <input type="text" name="email" id="email" value="<?= old("email") ?>" />
                  <span class="error"><?= error("email") ?></span>
                </div>
                <div class="form-field">
                  <label for="subject">Subject:</label>
                  <input type="text" name="subject" id="subject" value="<?= old("subject") ?>" />
                  <span class="error"><?= error("subject") ?></span>
                </div>
                <div class="form-field">
                  <label for="message">Message:</label>
                  <textarea name="message" id="message" rows="5"><?= old("message") ?></textarea>
                  <span class="error"><?= error("message") ?></span>
                </div>
                <div class="form-field">
                  <label></label>
                  <input class="btn btn-primary" type="submit" name="submit" value="Send" />
                  <a class="btn btn-light" href="<?= APP_URL . "/" ?>" >Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </main>
     
    </div>
    <?php require 'include/footer_stick.php'; ?>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
