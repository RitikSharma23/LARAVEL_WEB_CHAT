<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>Sign Up – Swipe</title>
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap core CSS -->
		<link href="dist/css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
		<!-- Swipe core CSS -->
		<link href="dist/css/swipe.min.css" type="text/css" rel="stylesheet">
		<!-- Favicon -->
		<link href="dist/img/favicon.png" type="image/png" rel="icon">
	</head>
	<body class="start">
		<main>
			<div class="layout">
				<!-- Start of Sign Up -->
				<div class="main order-md-2">
					<div class="start">
						<div class="container">
							<div class="col-md-12">
								<div class="content">
									<h1>Create Account</h1>
									<p>Use Your Email And Password For Registration</p>
									<form class="signup">
										<div class="form-parent">
											<div class="form-group">
												<input type="text" name="fname" class="form-control" placeholder="First Name" required>
												<button class="btn icon"><i class="material-icons">person_outline</i></button>
											</div>
											<div class="form-group">
												<input type="text" name="lname" class="form-control" placeholder="Last Name" required>
												<button class="btn icon"><i class="material-icons">person_outline</i></button>
											</div>
										</div>
										<div class="form-group">
											<input type="number" name="phone" class="form-control" placeholder="Phone" required>
											<button class="btn icon"><i class="material-icons">local_phone</i></button>
										</div>
										<div class="form-group">
											<input type="email" name="email" class="form-control" placeholder="Email" required>
											<button class="btn icon"><i class="material-icons">email</i></button>
										</div>
										<div class="form-group">
											<input type="password" name="password" class="form-control" placeholder="Password" required>
											<button class="btn icon"><i class="material-icons">lock_outline</i></button>
										</div>
										<div class="form-group">
											<input type="password" name="cnf_password" class="form-control" placeholder="Confirm Password" required>
											<button class="btn icon"><i class="material-icons">lock_outline</i></button>
										</div>
										<button type="submit" class="btn button" formaction="index-2.html">Sign Up</button>
										<div class="callout">
											<span>Already a member? <a href="sign-in.html">Sign In</a></span>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sign Up -->
				<!-- Start of Sidebar -->
				<div class="aside order-md-1">
					<div class="container">
						<div class="col-md-12">
							<div class="preference">
								<h2>Welcome Back!</h2>
								<p>To keep connected with your friends please login with your personal info.</p>
								<a href="sign-in.html" class="btn button">Sign In</a>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sidebar -->
			</div> <!-- Layout -->
		</main>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="dist/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="dist/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="dist/js/vendor/popper.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
	</body>


</html>
