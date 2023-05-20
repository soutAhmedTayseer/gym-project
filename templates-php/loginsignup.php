<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
	<title>Fitness</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Styles-css/loginsign.css">
	<link rel="stylesheet" href="../Styles-css/password.css">
	<script type="text/javascript" src="../Modules-js/CheckEmpty.js"></script>
	<script type="text/javascript" src="../Modules-js/EmailValidation.js"></script>
	<script type="text/javascript" src="../Modules-js/PhoneNoValidation.js"></script>
</head>

<body>
	<header class="header">
		<a href="index.php" class="logo"> <i class="fas fa-dumbbell"></i>FitNess </a>
		<nav class="navbar">
			<a href="index.php" class="btn">Home</a>
		</nav>
	</header>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
						<input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
						<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>
											<div class="section text-center" name="logerrordiag" id="logerrordiag"
												hidden="true">
												<p> Error: </p>
											</div>
											<form name="loginform" id="loginform" method="POST"
												action="<?php echo $_SERVER['PHP_SELF'] ?>">
												<div class="form-group">
													<input type="text" name="log-emailfield" id="log-emailfield"
														class="form-style" placeholder="Email">
													<i class="input-icon uil uil-user"></i>
												</div>
												<div class="form-group mt-2">
													<input type="password" name="log-passfield" id="log-passfield"
														class="form-style" placeholder="Password">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<input class="btn mt-4" name="sublog" type="submit" value="Login">
												<p class="mb-0 mt-4 text-center"><a href="#" class="link">Forgot your
														password?</a></p>
											</form>
											<script>
												document.getElementById('loginform').onsubmit = function () {
													idoffield = CheckEmpty('loginform');
													if (idoffield != null) {
														emptyfieldname = document.getElementById(idoffield).getAttribute("placeholder");
														msg = "Please fill " + emptyfieldname.toLowerCase() + " field.";
														errdia("logerrordiag", msg);
														return false;
													}
													else if (!validateEmail(document.getElementById('loginform').elements['log-emailfield'].value)) {
														msg = "Please add '@' and '.domain' in your email address.";
														errdia("logerrordiag", msg);
														return false;
													}
													else return true;
												}
											</script>
										</div>
									</div>
								</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-3 pb-3">Sign Up</h4>
											<div class="section text-center" name="regerrordiag" id="regerrordiag"
												hidden="true">
												<p> Error: </p>
											</div>
											<form id="registerform" name="registerform" method="POST"
												action="<?php echo $_SERVER['PHP_SELF'] ?>">
												<div class="full-name">
													<div class="form-group" id="name-group1">
														<input type="text" name="reg-fnfield" id="reg-fnfield"
															class="form-style" placeholder="First Name">
														<i class="input-icon uil uil-user"></i>
													</div>
													<div class="form-group " id="name-group2">
														<input type="text" name="reg-lnfield" id="reg-lnfield"
															class="form-style" placeholder="Last Name">
														<i class="input-icon uil uil-user"></i>
													</div>
												</div>
												<div class="form-group mt-2">
													<input type="tel" name="reg-telfield" id="reg-telfield"
														class="form-style" placeholder="Phone Number">
													<i class="input-icon uil uil-phone"></i>
												</div>
												<div class="form-group mt-2">
													<input type="text" name="reg-emailfield" id="reg-emailfield"
														class="form-style" placeholder="Email">
													<i class="input-icon uil uil-at"></i>
												</div>
												<div class="form-group mt-2">
													<input type="password" name="reg-passfield" id="reg-passfield"
														class="form-style" placeholder="Password"
														oninput="validatePassword()">
													<div id="password-strength">
														<span>Password Strength: </span>
														<i class="input-icon uil uil-lock-alt"></i>
														<i class="far fa-heart" style="color: #d70338" id="heart1"></i>
														<i class="far fa-heart" style="color: #d70338" id="heart2"></i>
														<i class="far fa-heart" style="color: #d70338" id="heart3"></i>
														<i class="far fa-heart" style="color: #d70338" id="heart4"></i>
														<i class="far fa-heart" style="color: #d70338" id="heart5"></i>
													</div>
												</div>
												<div class="form-group mt-2">
													<input type="password" name="reg-passcfield" id="reg-passcfield"
														class="form-style" placeholder="Confirm password">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<div class="form-group mt-2 pb-3">
													<input type="date" name="reg-bdfield" id="reg-bdfield"
														class="form-style" placeholder="birthday">
													<i class="input-icon uil uil-calendar-alt"></i>
												</div>
												<div class="gender justify-content-center">
													<label style="--clr:#d70338;">
														<input type="radio" name="reg-genderfield" value="male">
														<i></i>
														<span>Male</span>
													</label>
													<label style="--clr:#d70338;">
														<input type="radio" name="reg-genderfield" value="female">
														<i></i>
														<span>Female</span>
													</label>
												</div>
												<input class="btn mt-4" name="subreg" type="submit" value="Register">
											</form>
											<script>
												function checkPassword(password) {
													var progress = 0;
													if (password.length >= 8)
														progress++;
													if (password.match(/[A-Z]/))
														progress++;
													if (password.match(/[a-z]/))
														progress++;
													if (password.match(/\d/))
														progress++;
													if (password.match(/[\W_]/))
														progress++;
													for (var i = 1; i <= 5; i++) {
														if (progress >= i) {
															document.getElementById(`heart${i}`).classList.add("fas", "full");
														} else {
															document.getElementById(`heart${i}`).classList.remove("fas", "full");
														}
													}
													return progress;
												}
												function validatePassword() {
													var password = document.getElementById("reg-passfield").value;
													var progress = checkPassword(password);
												}
												document.getElementById('registerform').onsubmit = function () {
													idoffield = CheckEmpty('registerform');
													if (idoffield != null) {
														emptyfieldname = document.getElementById(idoffield).getAttribute("placeholder");
														msg = "Please fill " + emptyfieldname.toLowerCase() + " field.";
														errdia("regerrordiag", msg);
														return false;
													}
													else if (!validateEmail(document.getElementById('registerform').elements['reg-emailfield'].value)) {
														msg = "Please add '@' and '.domain' in your email address.";
														errdia("regerrordiag", msg);
														return false;
													}
													else if (!isPhoneNumber(document.getElementById('registerform').elements['reg-telfield'].value)) {
														msg = "Please write a valid phone number.";
														errdia("regerrordiag", msg);
														return false;
													}
													else if (!(document.getElementById('registerform').elements['reg-passfield'].value == document.getElementById('registerform').elements['reg-passcfield'].value)) {
														msg = "Password and confirmation password fields do not match.";
														errdia("regerrordiag", msg);
														return false;
													}
													else if ((document.getElementById('registerform').elements['reg-passfield'].value.length < 8) || (document.getElementById('registerform').elements['reg-passfield'].value.length > 40)) {
														msg = "Password: min 8 characters and max 40 characters";
														errdia("regerrordiag", msg);
														return false;
													}
													else return true;
												}
											</script>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	require 'connection.php';
	require 'errordialog.php';
	require 'EmptyValidation.php';
	require 'PhoneNoValidation.php';
	require 'EmailValidation.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['sublog'])) {
			$empty_field = checkEmpty($_POST);
			if ($empty_field != null) {
				echo "<script>
				logform= document.getElementById('loginform');
				emptyfield = logform.elements['" . $empty_field . "'].placeholder;
				errdia('logerrordiag','Please fill the '+emptyfield.toLowerCase());
				</script>";
			} elseif (!(isValidEmail($_POST['log-emailfield']))) {
				echo "<script>
				errdia('logerrordiag','Please add '@' and '.domain' in your email address.');
				</script>";
			} else {
				$query = "SELECT * from trainee
				WHERE email =" . "'" . $_POST['log-emailfield'] . "'";
				$fetcheduser = $conn->query($query);
				if ($fetcheduser->num_rows == 0) {
					echo "<script>
					errdia('logerrordiag','User doesnot exist!');
					</script>";
				} else {
					$user = $fetcheduser->fetch_assoc();
					if (password_verify($_POST['log-passfield'], $user['pw'])) {
						$_SESSION['first_name'] = $user['first_name'];
						$_SESSION['last_name'] = $user['last_name'];
						$_SESSION['email'] = $user['email'];
						$_SESSION['age'] = $user['age'];
						$_SESSION['birth_date'] = $user['birth_date'];
						$_SESSION['phone_number'] = $user['phone_number'];
						$_SESSION['subscription'] = $user['subscribed'];
						$_SESSION['gender'] = $user['gender'];
						echo "<script>
						window.location.href= 'profile.php';
						</script>";
					} else {
						echo "<script>
						errdia('logerrordiag','Password is incorrect!');
						</script>";
					}
				}
			}
		}
		if (isset($_POST['subreg'])) {
			$empty_field = checkEmpty($_POST);
			if ($empty_field != null) {
				echo "<script>
				regform= document.getElementById('registerform');
				emptyfield = regform.elements['" . $empty_field . "'].placeholder;
				errdia('regerrordiag','Please fill the '+emptyfield.toLowerCase());
				</script>";
			} elseif (!(isValidEmail($_POST['reg-emailfield']))) {
				echo "<script>
				errdia('regerrordiag','Please add '@' and '.domain' in your email address.');
				</script>";
			} elseif (!(isValidTel($_POST['reg-telfield']))) {
				echo "<script>
				errdia('regerrordiag','Please write a valid phone number.');
				</script>";
			} else if (strlen($_POST['reg-passfield']) < 8) {
				echo "<script>
				errdia('regerrordiag','Password: min 8 characters and max 40 characters');
				</script>";
			} elseif ($_POST['reg-passfield'] != $_POST['reg-passcfield']) {
				echo "<script>
				errdia('regerrordiag','Password and confirmation password fields do not match.');
				</script>";
			} else {
				$query = "SELECT * from trainee
				WHERE email=" . "'" . $_POST['reg-emailfield'] . "'";
				$fetcheduser = $conn->query($query);
				if ($fetcheduser->num_rows == 1) {
					echo "<script>
					errdia('regerrordiag','Email is  already taken!');
					</script>";
				} else {
					$query = "SELECT * from trainee
				WHERE phone_number =" . $_POST['reg-telfield'];
					$fetcheduser = $conn->query($query);
					if ($fetcheduser->num_rows == 1) {
						echo "<script>
						errdia('regerrordiag','phone number has been used before!');
						</script>";
					} else {
						$query = "INSERT INTO trainee (email, pw,first_name,last_name,gender,phone_number,subscribed,birth_date,age)
						VALUES ('" . $_POST['reg-emailfield'] . "','" . password_hash($_POST['reg-passfield'], PASSWORD_DEFAULT) . "','" . $_POST['reg-fnfield'] . "','" . $_POST['reg-lnfield'] . "','" . $_POST['reg-genderfield'] . "','" . $_POST['reg-telfield'] . "'," . 0 . ",'" . $_POST['reg-bdfield'] . "'," . 20 . ")";
						if ($conn->query($query)) {
							$_SESSION['first_name'] = $_POST['reg-fnfield'];
							$_SESSION['last_name'] = $_POST['reg-lnfield'];
							$_SESSION['gender'] = $_POST['reg-genderfield'];
							$_SESSION['email'] = $_POST['reg-emailfield'];
							$_SESSION['birth_date'] = $_POST['reg-bdfield'];
							$_SESSION['phone_number'] = $_POST['reg-telfield'];
							$_SESSION['age'] = 20;
							$_SESSION['subscribed'] = 0;
							echo "<script>
						window.location.href= 'profile.php';
						</script>";
						} else {
							echo "<script>
							errdia('regerrordiag','Try registering at a later time!');
							</script>";
						}
					}
				}
			}
		}
	}
	?>
</body>

</html>