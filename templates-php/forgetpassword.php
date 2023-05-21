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
						<input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">

										<h4 class="mb-4 pb-3">Write your email in the field and we will send you a mail
											with a verification code. </h4>
										<div class="section text-center" name="fgerrordiag" id="fgerrordiag"
											hidden="true">
											<p> Error: </p>
										</div>
										<form name="forgetpassform" id="forgetpassform" method="POST"
											action="<?php echo $_SERVER['PHP_SELF'] ?>">
											<div class="form-group">
												<input type="text" name="fg-emailfield" id="fg-emailfield"
													class="form-style" placeholder="Email">
												<i class="input-icon uil uil-user"></i>
											</div>

											<input class="btn mt-4" name="forgetpassbtn" type="submit" value="Verify">

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
require 'sendMail.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['forgetpassbtn'])) {
		$query = "SELECT * from trainee
				WHERE email =" . "'" . $_POST['fg-emailfield'] . "';";
		$fetched_user = $conn->query($query);
		if ($fetched_user->num_rows == 0) {
			echo "<script>
			errdia('fgerrordiag','Email is not registered!');
			</script>";
		} else {
			$_SESSION['email'] = $_POST['fg-emailfield'];
			$_SESSION['verification'] = rand(100000, 999999);
			$msg = 'Hi,

 
						You are almost done! Simply write the following code in the verification field 
						that is provided to you in our form.
						
            <h1 style="font-size:80px; padding-left:550px;">' . $_SESSION['verification'] . '</h1>';
			//check if the email is sent
			//sent
			if (sendMail($_SESSION['email'], $msg)) {
				echo "<script>
		window.location.href= 'verification.php';
		</script>";
			}
			//not sent 
			else {
				echo "<script>
      	errdia('fgerrordiag','We cant send you a verification code right now.');
      	</script>";
			}
		}
	}
}
?>

</html>