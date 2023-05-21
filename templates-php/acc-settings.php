<?php
session_start();
if (!isset($_SESSION['email']))
    header("Location: loginsignup.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="../Styles-css/acc-settings.css" />
    <link rel="stylesheet" href="../Styles-css/responsive.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script type="text/javascript" src="../Modules-js/CheckEmpty.js"></script>
    <script type="text/javascript" src="../Modules-js/ErrorDialog.js"></script>
    <script type="text/javascript" src="../Modules-js/EmailValidation.js"></script>
    <script type="text/javascript" src="../Modules-js/PhoneNoValidation.js"></script>
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="#" class="logo">
                        <img src="../Assets/alexander-hipp-iEEBWgY_6lA-unsplash.jpg">
                        <span class="nav-item" id="name-field">Name</span>
                    </a></li>
                <li><a href="profile.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Profile</span>
                    </a></li>
                <li><a href="workout.php">
                        <i class="fas fa-dumbbell"></i>
                        <span class="nav-item">Workout</span>
                    </a></li>

                <li><a href="#">
                        <i class="fas fa-heartbeat"></i>
                        <span class="nav-item">Recovery</span>
                    </a></li>
                <li><a href="acc-settings.php">
                        <i class="fas fa-cog"></i>
                        <span class="nav-item">Settings</span>
                    </a></li>

                <li>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <button name="logout-btn" class="logout" id="logout-btn">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="nav-item">Log out</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <div>

            <div class="containers" id="pricing">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="edit-info" id="edit-info">
                    <div class="forms">
                        <div class="account-settings" data-tilt>
                            <div class="text">
                                <div>
                                    <h3 class="mb-4">Account Settings</h3>
                                </div>
                                <hr class="hr">
                                <div id="prof-error" hidden>
                                    <p>Error:</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="    margin-left: -175px;
                                    margin-top: 36px;">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" id="fn-field" name="fn-field"
                                            placeholder="First name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="    margin-left: 470px;
                                    margin-top: -89px;">
                                        <label class="modify">Last Name</label>
                                        <input type="text" class="form-control" id="ln-field" name="ln-field"
                                            placeholder="Last name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-left: -175px;">
                                        <label>Email</label>
                                        <input type="text" class="form-control" id="em-field" name="em-field"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="        margin-left: 470px;
                                    margin-top: -89px;">
                                        <label class="modify">Phone number</label>
                                        <input type="tel" class="form-control" id="tel-field" name="tel-field"
                                            placeholder="Phone number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-left: -175px;">
                                        <label>Birth Date</label>
                                        <input type="date" class="form-control" id="bd-field" name="bd-field" disabled>
                                    </div>
                                    <input type="submit" class="btn " value=" Update" name="edit-info-btn"
                                        style="        margin-left: 881px;"></input>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="        margin-left: 470px;
                                    margin-top: -128px;">
                                        <label class="modify">Subscription</label>
                                        <input type="text" class="form-control" id="sub-field" name="sub-field"
                                            disabled>
                                    </div>

                                </div>
                            </div>

                        </div>
                </form>
                <script>
                    document.getElementById('edit-prof').onsubmit = function () {
                        emptyfield = CheckEmpty('edit-prof');
                        if (emptyfield != null) {
                            emptyfieldname = document.getElementById(emptyfield).getAttribute("placeholder");
                            msg = "Please fill " + emptyfieldname.toLowerCase() + " field.";
                            errdia("prof-error", msg);
                            return false;
                        }
                        else if (!validateEmail(document.getElementById('edit-prof').elements['em-field'].value)) {
                            msg = "Please add '@' and '.domain' in your email address.";
                            errdia("prof-error", msg);
                            return false;
                        }
                        else if (!isPhoneNumber(document.getElementById('edit-prof').elements['tel-field'].value)) {
                            msg = "Please write a valid phone number.";
                            errdia("prof-error", msg);
                            return false;
                        }
                    }
                </script>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="edit-pass" id="edit-pass">
                    <div class="password" data-tilt>
                        <div class="text">
                            <div>
                                <h3 class="mb-4" style="    margin-top: -136px;
                                margin-left: -171px;">Password Settings</h3>
                            </div>
                            <hr class="hr" style="margin-top: -36px;">
                            <div id="pass-error" hidden>
                                <p>Error:</p>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="    margin-left: -175px;
                                margin-top: 36px;">
                                    <label>Old Password</label>
                                    <input type="password" class="form-control" id="passo-field" name="passo-field"
                                        placeholder="old password">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" style="margin-left: -175px;">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" id="passn-field" name="passn-field"
                                        placeholder="new passwword">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="        margin-left: 470px;
                                margin-top: -89px;">
                                    <label class="modify">Confirm Password</label>
                                    <input type="password" class="form-control" id="passc-field" name="passc-field"
                                        placeholder="confirm new password">
                                </div>
                            </div>
                            <div class="col-md-6">

                                <input type="submit" class="btn " value=" Update" name="edit-pass-btn"
                                    style="        margin-left: 881px;"></input>
                            </div>

                        </div>


                    </div>
                </form>
                <script>
                    document.getElementById('edit-pass').onsubmit = function () {
                        emptyfield = CheckEmpty('edit-pass');
                        if (emptyfield != null) {
                            emptyfieldname = document.getElementById(emptyfield).getAttribute("placeholder");
                            msg = "Please fill " + emptyfieldname.toLowerCase() + " field.";
                            errdia("pass-error", msg);
                            return false;
                        }
                        else if (document.getElementById('edit-pass').elements['passn-field'].value.length < 8 || document.getElementById('edit-pass').elements['passn-field'].value.length > 40) {
                            msg = "Password: min 8 characters and max 40 characters";
                            errdia("pass-error", msg);
                            return false;
                        }
                        else if (document.getElementById('edit-pass').elements['passn-field'].value != document.getElementById('edit-pass').elements['passc-field'].value) {
                            msg = "Password and confirmation password fields do not match.";
                            errdia("pass-error", msg);
                            return false;
                        }
                    }
                </script>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="edit-auth" id="edit-auth">

                    <div class="security" data-tilt>
                        <div class="text">
                            <div>
                                <h3 class="mb-4" style="    margin-top: -136px;
                                margin-left: -171px;">Security Settings</h3>
                            </div>
                            <hr class="hr" style="margin-top: -36px;">
                            <div id="auth-error" hidden>
                                <p>Error:</p>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" style="margin-left: -175px; margin-top: 50px;">
                                    <label>Login</label>
                                    <input type="email" class="form-control" id="em-field" name="em-field"
                                        placeholder="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="        margin-left: 470px;
                                margin-top: -89px;">
                                    <label class="modify">
                                        Two-factor auth</label>
                                    <input type="text" class="form-control" id="tel-field" name="tel-field"
                                        placeholder="phone number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="submit" class="btn " value=" Update" name="edit-auth-btn"
                                    style="        margin-left: 881px;"></input>
                            </div>
                        </div>
                    </div>
                </form>
                <script>
                    document.getElementById('edit-auth').onsubmit = function () {
                        emptyfield = CheckEmpty('edit-auth');
                        if (emptyfield != null) {
                            emptyfieldname = document.getElementById(emptyfield).getAttribute("placeholder");
                            msg = "Please fill " + emptyfieldname.toLowerCase() + " field.";
                            errdia("auth-error", msg);
                            return false;
                        }
                    }
                </script>
            </div>
        </div>
    </div>
    <?php
    require 'connection.php';
    require 'errordialog.php';
    require 'EmptyValidation.php';
    require 'EmailValidation.php';
    require 'PhoneNoValidation.php';
    function displayinfo()
    {
        if (isset($_SESSION['first_name'])) {
            echo "<script>
				form= document.getElementById('edit-info');
				fnfield = form.elements['fn-field'];
				fnfield.value = \"" . $_SESSION['first_name'] . "\";
				</script>";
        }
        if (isset($_SESSION['last_name'])) {
            echo "<script>
                form = document.getElementById('edit-info');
                lnfield = form.elements['ln-field'];
                lnfield.value = \"" . $_SESSION['last_name'] . "\";
            </script>";
        }
        if (isset($_SESSION['email'])) {
            echo "<script>
                form = document.getElementById('edit-info');
                fnfield = form.elements['em-field'];
                fnfield.value = \"" . $_SESSION['email'] . "\";
            </script>";
        }
        if (isset($_SESSION['phone_number'])) {
            echo "<script>
                form = document.getElementById('edit-info');
                fnfield = form.elements['tel-field'];
                fnfield.value = \"" . $_SESSION['phone_number'] . "\";
            </script>";
        }
        if (isset($_SESSION['birth_date'])) {
            echo "<script>
                form = document.getElementById('edit-info');
                fnfield = form.elements['bd-field'];
                fnfield.value = \"" . $_SESSION['birth_date'] . "\";
            </script>";
        }
        if (isset($_SESSION['subscribed'])) {
            echo "<script>
                form = document.getElementById('edit-info');
                subfield = form.elements['sub-field'];
                subfield.value = \"" . $_SESSION['subscribed'] . "\";
            </script>";
        }
        //Change the name of the trainee in the nav panal
        echo "
         <script>
             namefield= document.getElementById('name-field');
             namefield.innerHTML=\"" . $_SESSION['first_name'] . "\";
         </script>
         ";
    }
    function updateinfo($conn)
    {
        $querymsg = "UPDATE trainee
                        SET email='" . $_POST['em-field'] . "'
                        ,first_name='" . $_POST['fn-field'] . "' 
                        ,last_name='" . $_POST['ln-field'] . "'
                        ,phone_number='" . $_POST['tel-field'] . "'
                        WHERE email ='" . $_SESSION['email'] . "'";
        $_SESSION['first_name'] = $_POST['fn-field'];
        $_SESSION['last_name'] = $_POST['ln-field'];
        $_SESSION['email'] = $_POST['em-field'];
        $_SESSION['phone_number'] = $_POST['tel-field'];
        $conn->query($querymsg);
    }
    //Check if there is a session with the users' information
    if (session_status() == 2) {
        //check if there is a submittion
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Is this submittion --> first form(edit your account)
            if (isset($_POST['edit-info-btn'])) {
                $empty_field = checkEmpty($_POST);
                if ($empty_field != null) {
                    echo "<script>
                    editinfo= document.getElementById('edit-info');
                    emptyfield = editinfo.elements['" . $empty_field . "'].placeholder;
                    errdia('prof-error','Please fill the '+emptyfield.toLowerCase()+' field.');
                    </script>";
                    displayinfo();
                } /* elseif (!(isValidEmail($_POST['reg-emailfield']))) {
                 echo "<script>
                 errdia('prof-error','Please add '@' and '.domain' in your email address.');
                 </script>";
                 } elseif (!(isValidTel($_POST['reg-telfield']))) {
                 echo "<script>
                 errdia('prof-error','Please write a valid phone number.');
                 </script>";
                 }*/
                //check if the email has changed 
                elseif ($_SESSION['email'] != $_POST['em-field']) {
                    $query = "SELECT * from trainee
                    WHERE email=" . "'" . $_POST['em-field'] . "'";
                    $fetcheduser = $conn->query($query);
                    //email changed then check if it is taken
                    if ($fetcheduser->num_rows == 1) {
                        //email is taken
                        echo "<script>
						        errdia('prof-error','Email is already taken!');
						        </script>";
                        displayinfo();
                    } else {
                        //email isnot taken so lets check if phone number changed
                        if ($_SESSION['phone_number'] != $_POST['tel-field']) {
                            $query = "SELECT * from trainee
				            WHERE phone_number =" . $_POST['reg-telfield'];
                            $fetcheduser = $conn->query($query);
                            //phone number changed then if it is taken
                            if ($fetcheduser->num_rows == 1) {
                                //phone number is taken
                                echo "<script>
						        errdia('prof-error','phone number has been used before!');
						        </script>";
                                displayinfo();
                            } else {
                                //phone number isnot taken
                                updateinfo($conn);
                                displayinfo();
                            }
                        } else {
                            //phone number didnot change but email changed
                            updateinfo($conn);
                            displayinfo();
                        }
                    }
                }
                //email didnot change letss check if phone nunmber changed 
                elseif ($_SESSION['phone_number'] != $_POST['tel-field']) {
                    $query = "SELECT * from trainee
				            WHERE phone_number =" . $_POST['tel-field'];
                    $fetcheduser = $conn->query($query);
                    //phone number changed lets check if it is taken
                    if ($fetcheduser->num_rows == 1) {
                        //phone number is taken
                        echo "<script>
						        errdia('prof-error','phone number has been used before!');
						        </script>";
                        displayinfo();
                    } else {
                        //phone number isnot taken
                        updateinfo($conn);
                        displayinfo();
                    }
                } else {
                    //neither email nor phone number are changed
                    if (($_SESSION['first_name'] != $_POST['fn-field']) || ($_SESSION['last_name'] != $_POST['ln-field'])) {
                        updateinfo($conn);
                        displayinfo();
                    } else {
                        displayinfo();
                    }
                }
            }
            //Is this submittion --> second form(password change)
            else if (isset($_POST['edit-pass-btn'])) {
                $empty_field = checkEmpty($_POST);
                //if there is an empty field
                if ($empty_field != null) {
                    echo "<script>
                    editpass= document.getElementById('edit-pass');
                    emptyfield = editpass.elements['" . $empty_field . "'].placeholder;
                    errdia('pass-error','Please fill the '+emptyfield.toLowerCase()+' field.');
                    </script>";
                    displayinfo();
                }
                //old password is incorrect
                else {
                    $query = "SELECT * from trainee
                    WHERE email = '" . $_SESSION['email'] . "';";
                    $fetched_user = $conn->query($query);
                    $user = $fetched_user->fetch_assoc();
                    if (!password_verify($_POST['passo-field'], $user['pw'])) {
                        echo "<script>
                        errdia('pass-error','Password is incorrect!');
                        </script>";
                        displayinfo();
                    }
                    //both password fields(new/confirmation) donot match
                    else {
                        if ($_POST['passc-field'] != $_POST['passn-field']) {
                            echo "<script>
                            errdia('pass-error','Password and confirmation fields do not match!');
                            </script>";
                            displayinfo();
                        }
                        //no problems met --> updated your password
                        else {
                            $query = "UPDATE trainee 
                            SET pw ='" . password_hash($_POST['passn-field'], PASSWORD_DEFAULT) . "'
                            WHERE email ='" . $_SESSION['email'] . "';";
                            $conn->query($query);
                            displayinfo();
                            echo "<script>
                            errdia('pass-error','Updated your password!');
                            </script>";
                        }
                    }
                }
            }
            //Is this submittion --> third form(authorization) 
            else if (isset($_POST['edit-auth-btn'])) {
                displayinfo();
            }
            //Is this submittion --> logout form
            else if (isset($_POST['logout-btn'])) {
                session_destroy();
                echo "<script>
                window.location.href= 'index.php';
                </script>";
            }
        } else {
            displayinfo();
        }
    }
    ?>
</body>

</html>