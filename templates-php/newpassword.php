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
            <h6 class="mb-0 pb-3"></h6>
            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">
                <div class="card-front">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <h4 class="mb-4 pb-3">Enter new password</h4>
                      <div class="section text-center" name="fgerrordiag" id="fgerrordiag" hidden="true">
                        <p>Error:</p>
                      </div>
                      <form name="newpassform" id="newpassform" method="POST"
                        action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <div class="form-group">
                          <input type="password" name="fg-newpass" id="fg-newpass" class="form-style"
                            placeholder="Password" />
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" name="fg-confirmpass" id="fg-confirmpass" class="form-style"
                            placeholder="Re-enter Password" />
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <input class="btn mt-4" name="newpassbtn" type="submit" value="Login" />
                      </form>
                      <script>
                        document.getElementById('newpassform').onsubmit = function () {
                          if (!(document.getElementById('newpassform').elements['fg-newpass'].value == document.getElementById('newpassform').elements['fg-confirmpass'].value)) {
                            msg = "Password and confirmation password fields do not match.";
                            errdia("fgerrordiag", msg);
                            return false;
                          }
                          else if ((document.getElementById('newpassform').elements['fg-newpass'].value.length < 8) || (document.getElementById('newpassform').elements['fg-newpass'].value.length > 40)) {
                            msg = "Password: min 8 characters and max 40 characters";
                            errdia("fgerrordiag", msg);
                            return false;
                          }
                        }
                      </script>
                    </div>
                  </div>
                </div>
                <div class="card-back"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
if (isset($_POST['newpassbtn'])) {
  $query = "UPDATE trainee
  Set pw='" . password_hash($_POST['fg-newpass'], PASSWORD_DEFAULT) . "'
  Where email='" . $_SESSION['email'] . "';";
  if ($conn->query($query)) {
    echo "<script>
      window.location.href= 'loginsignup.php';
      </script>";
  } else {
    echo "<script>
		errdia('fgerrordiag','Couldnot change password. Try again later!');
		</script>";
  }
}
?>

</html>