<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
	<title>Login 10</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="components/public/css/style.css">
	<style>

	</style>

</head>

<body class="img js-fullheight" style="background-image: url(components/public/assets/images/bghome.jpeg); background-repeat:no-repeat; background-size: cover; position: relative;">
	<div class="overlay">
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
						<h2 class="heading-section">Login</h2>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap p-0">
							<h3 class="mb-4 text-center">Have an account?</h3>
							<form action="f_login.php" method="post" class="signin-form">
								<div class="form-group">
									<input type="text" name="username" class="form-control" placeholder="Username" required>
								</div>
								<div class="form-group">
									<input id="password-field" name="pass" type="password" class="form-control" placeholder="Password" required>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
								</div>
								<a href="signup.php">
									<button type="button" class="form-control btn btn-primary submit px-3">Sign Up</button>
								</a>

							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<script src="components/public/js/jquery.min.js"></script>
	<script src="components/public/js/popper.js"></script>
	<script src="components/public/js/bootstrap.min.js"></script>
	<script src="components/public/js/main.js"></script>
</body>

</html>