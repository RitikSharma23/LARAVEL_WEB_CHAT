<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>Profile</title>
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap core CSS -->
		<link href="dist/css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
		<!-- Swipe core CSS -->
		<link href="dist/css/swipe.min.css" type="text/css" rel="stylesheet">
		<!-- Favicon -->
		<link href="dist/img/favicon.png" type="image/png" rel="icon">

	</head>
	<body>
		<main>
			<div class="layout">
				<!-- Start of Navigation -->
				<div class="navigation">
					<div class="container">
						<div class="inside">
							<div class="nav nav-tab menu">
								<button class="btn"><img class="avatar-xl" src="/profile/{{$data['fname']}}.jpg" alt="avatar"></button>
								<!-- <a href="#members" data-toggle="tab"><i class="material-icons">account_circle</i></a> -->
								<a onclick="history.back()" data-toggle="tab" class="active"><i class="material-icons active" style="cursor: pointer;">arrow_back</i></a>
								<button class="btn power" onclick="visitPage();"><i class="material-icons">power_settings_new</i></button>
							</div>
						</div>
					</div>
				</div>


				<div class="main" >

                <div class="img" style="border:none;width:100%;height:300px">
                    <center>
                    <img src="/profile/{{$data['fname']}}.jpg"
                    style="height:300px;border:none;border-radius:1000px">
                    </center>

                </div>

                <div class="main order-md-2">
					<div class="start">
						<div class="container">
							<div class="col-md-12">
								<div class="content" style="position:relative;top:-200px">
									<form class="signup" action="{{url('/')}}/doupdate" method="post" enctype="multipart/form-data">
                                        @csrf
										<div class="form-group cf" >
												<input type="file" name="image" class="form-control" placeholder="Upload Image"  value="{{$data['fname']}}.jpg">

											</div>
										<div class="form-parent">

											<div class="form-group">
												<input type="text" name="id" class="form-control" placeholder="id" required value="{{$data['id']}}" style="display: none;">
												<input type="text" name="fname" class="form-control" placeholder="First Name" required value="{{$data['fname']}}">
												<button class="btn icon"><i class="material-icons">person_outline</i></button>
											</div>
											<div class="form-group">
												<input type="text" name="lname" class="form-control" placeholder="Last Name" required value="{{$data['lname']}}">
												<button class="btn icon"><i class="material-icons">person_outline</i></button>
											</div>
										</div>
										<div class="form-group">
											<input type="number" name="phone" class="form-control" placeholder="Phone" required value="{{$data['phone']}}" >
											<button class="btn icon"><i class="material-icons">local_phone</i></button>
										</div>
										<div class="form-group">
											<input type="email" name="email" class="form-control" placeholder="Email" required value="{{$data['email']}}">
											<button class="btn icon"><i class="material-icons">email</i></button>
										</div>
										<div class="form-group">
											<input type="password" name="password" class="form-control" placeholder="Password" value="" >
											<button class="btn icon"><i class="material-icons">lock_outline</i></button>
										</div>
										<div class="form-group">
											<input type="password" name="cnf_password" class="form-control" placeholder="Confirm Password" value="">
											<button class="btn icon"><i class="material-icons">lock_outline</i></button>
										</div>
										<button type="submit" id="submit" class="btn button" formaction="{{url('/')}}/doupdate" enctype="multipart/form-data">Update Profile</button>
										<div class="callout">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				</div>
			</div>
		</main>
		<!-- Bootstrap/Swipe core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="dist/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="dist/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="dist/js/vendor/popper.min.js"></script>
		<script src="dist/js/swipe.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
		<script>

            var pathArray = window.location.pathname.split('/');
            if(pathArray[1]=="doupdate"){
                history.back()
            }
		</script>

		<style>
			.cf{
				position: relative;
			}
		</style>
	</body>

</html>
