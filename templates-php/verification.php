<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Fitness</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../Styles-css/loginsign.css" />
  <link rel="stylesheet" href="../Styles-css/password.css" />
  <script type="text/javascript" src="../Modules-js/CheckEmpty.js"></script>
  <script type="text/javascript" src="../Modules-js/EmailValidation.js"></script>
  <script type="text/javascript" src="../Modules-js/PhoneNoValidation.js"></script>
</head>

<body>
  <header class="header">
    <a href="index.php" class="logo">
      <i class="fas fa-dumbbell"></i>FitNess
    </a>
    <nav class="navbar">
      <a href="index.php" class="btn">Home</a>
    </nav>
  </header>
  <div class="section">
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">
            <h6 class="mb-0 pb-3">
              <span> </span>
            </h6>
            <input class="checkbox" type="checkbox" id="reg-log" />
            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">
                <div class="card-front">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <h4 class="mb-4 pb-3">Verification</h4>
                      <div class="section text-center" name="verrdiag" id="verrdiag" hidden="true">
                        <p>Error:</p>
                      </div>
                      <form name="verificationform" id="verificationform" method="POST"
                        action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <div class="form-group mt-2">
                          <input type="text" name="verification_code_field" id="verification_code_field"
                            class="form-style" placeholder="enter the verification code" />
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <input class="btn mt-4" name="verify" type="submit" value="Submit" />
                        <input class="btn mt-4" name="resend" type="submit" value="Resend" />
                      </form>
                    </div>
                  </div>
                </div>
                <div class="card-back">
                </div>
</body>
<?php
require 'connection.php';
require 'errordialog.php';
require 'EmptyValidation.php';
require 'PhoneNoValidation.php';
require 'EmailValidation.php';
require 'vendor/autoload.php';
require 'sendMail.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //the verify button is pressed
  if (isset($_POST['verify'])) {
    //check if what is in the verification field is the same as the code sent to the user's email
    if ($_POST['verification_code_field'] == strval($_SESSION['verification'])) {
      //check if the user was redirected to this page from the forget password page (and wrote the right code in the field)
      if (!isset($_SESSION['first_name'])) {
        echo "<script>
						window.location.href= 'newpassword.php';
						</script>";
      }
      //user is redirected from the sign up page (and wrote the right code in the field)
      else {
        //insert user's data in the database
        $query = "INSERT INTO trainee (email, pw,first_name,last_name,gender,phone_number,subscribed,birth_date,age)
						VALUES ('" . $_SESSION['email'] . "','" . $_SESSION['pass'] . "','" . $_SESSION['first_name'] . "','" . $_SESSION['last_name'] . "','" . $_SESSION['gender'] . "','" . $_SESSION['phone_number'] . "'," . 0 . ",'" . $_POST['birth_date'] . "'," . 20 . ")";
        //check if the data was inserted
        //it is inserted
        if ($conn->query($query)) {
          $query = "SELECT * from trainee
							WHERE email =" . "'" . $_SESSION['email'] . "'";
          $fetcheduser = $conn->query($query);
          $user = $fetcheduser->fetch_assoc();
          $_SESSION['trainee_id'] = $user['id'];
          echo "<script>
						window.location.href= 'profile.php';
						</script>";
          unset($_SESSION['verification']);
        }
        //it is not inserted
        else {
          echo "<script>
							errdia('verrdiag','Try registering at a later time!');
							</script>";
        }
      }
    }
    //the code written in the field doesnot match the one sent to the user's email 
    else {
      echo "<script>
						errdia('verrdiag','This code is invalid. Please try again.');
						</script>";
    }
  }
  //user pressed on resend button
  else if (isset($_POST['resend'])) {
    //update the verification code and send it
    $_SESSION['verification'] = rand(100000, 999999);
    $msg = 'Hi,

 
						You are almost done! Simply write the following code in the verification field 
						that is provided to you in our form.
						
            <h1 style="font-size:80px; padding-left:550px;">' . $_SESSION['verification'] . '</h1>';
    //check if the email is sent
    //sent
    if (sendMail($_SESSION['email'], $msg)) {
      echo "<script>
    errdia('verrdiag','We have sent you another code.');
    </script>";
    }
    //not sent 
    else {
      echo "<script>
      errdia('verrdiag','We cant send you a verification code right now.');
      </script>";
    }
  }
}
?>

</html>