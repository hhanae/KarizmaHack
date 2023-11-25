<?php require 'functions.php'; 
session_start();
use PHPMailer\PHPMailer\PHPMailer;?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>

  <?php
              if(!empty($_POST)){
                $errors = array();
                require_once 'db.php';
                if(empty($_POST['username']) || !preg_match('/^[a-z0-9]+$/', $_POST['username'])){
                  $errors['username']="You didn't enter a valid pseudo";
                }else{
                  $req = $pdo->prepare('SELECT id_user FROM user WHERE nom_user=?');
                  $req->execute([$_POST['username']]);
                  $user = $req->fetch();
                  if($user){
                    $errors['username'] = 'This username is already used';
                  } 
                }
                if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                  $errors['email']="Invalid email";
                }else{
                  $req = $pdo->prepare('SELECT id_user FROM user WHERE email_user=?');
                  $req->execute([$_POST['email']]);
                  $user = $req->fetch();
                  if($user){
                    $errors['email'] = 'This email is already used';
                  } 
                }
                if(empty($_POST['password']) || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/', $_POST['password']) ){
                  $errors['password'] = "You have to enter a valid password with lowercases, uppercases, digits and special character and confirm it correctly";
                }
                if(empty($errors)){
                  
                  $req = $pdo->prepare("INSERT INTO user SET nom_user = ?, password_user = ?, email_user= ?, confirmation_token=?");
                  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                  $token= str_random(60);
                  $req->execute([$_POST['username'], $password, $_POST['email'], $token]);
                  $user_id=$pdo->lastInsertId();

                  $receiver = $_POST['email'];
                  $subject = "Confirmation de l'authentité";
                  $body = "Vous venez de vous inscrire dans notre plateforme SOMAPORT. Afin de confirmer que ce compte est bien le votre, merci de cliquer sur ce lien:\n\n http://localhost/SOMAPORT%20V1/pages/samples/confirmation.php?id=$user_id&token=$token";
                  $sender = "From:secure.prescription00@gmail.com";
                  if (mail($receiver, $subject, $body, $sender)) {
                    $_SESSION['flash']['success']= 'Email sent successfully to $receiver';
                    header('Location: login.php');
                  exit();
                  } else { 
                    $_SESSION['flash']['danger']= 'Failed to send the email to $receiver';
                  }

                  
                  
                }

              }
              ?>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Register</h3>
                <?php if(!empty($errors)):?>
                <div class="alert alert-danger">
                  <h4 class="card-title">You didn't fill correctly the form:</h4>
                  <ul >
                    <?php foreach($errors as $error): ?>
                      <li><?= $error; ?></li>
                    <?php endforeach; ?>
                  </ul>
            </div>
              <?php endif; ?>
                <form method="POST" action="">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control p_input" name="username">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control p_input" name="email" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control p_input" name="password" required>
                  </div>
                  
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Sign Up</button>
                  </div>
                  
                  <p class="sign-up text-center">Already have an Account?<a href="#"> Sign In</a></p>
                  <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>