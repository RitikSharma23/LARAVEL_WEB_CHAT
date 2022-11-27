<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>ADMIN | LOGIN</title>
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
				<!-- Start of Sign In -->
				<div class="main order-md-1">
					<div class="start">
						<div class="container">
							<div class="col-md-12">
								<div class="content">
									<h1>Admin Login</h1>

									<!-- <p>Use Your Phone Number To Login </p> -->
									<form action="{{url('/')}}/login" method="post">
                                        @csrf
										<div class="form-group">
											<input type="text" name="userid" class="form-control" placeholder="User-Id" value="{{old('userid')}}">
											<button class="btn icon"><i class="material-icons">person_outline</i></button>
											<span class="text-danger">@error('userid'){{$message}}@enderror</span>
										</div>
										<div class="form-group">
											<input type="password" name="password" class="form-control" placeholder="Password" >
											<button class="btn icon"><i class="material-icons">lock_outline</i></button>
											<span class="text-danger">@error('password'){{$message}}@enderror</span>
										</div>
										<button type="submit" class="btn button" formaction="{{url('/')}}/login">Login</button>
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sign In -->
				
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
