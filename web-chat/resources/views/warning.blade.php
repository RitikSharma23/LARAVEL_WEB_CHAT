<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="Enter your description here"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="dist/css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
		<!-- Swipe core CSS -->
		<link href="dist/css/swipe.min.css" type="text/css" rel="stylesheet">
		<!-- Favicon -->
		<link href="dist/img/favicon.png" type="image/png" rel="icon">
    <title>Document</title>
    <link rel="stylesheet" href="html.css">
</head>
<body>

@if ($message=="blocked")
    <div class="blocked">
      <center>
        <img class="img" src="https://img.freepik.com/premium-vector/anxious-male-character-with-smartphone-shocked-with-internet-account-been-blocked-user-can-enter-social-media-networks-due-blocking-private-page-cartoon-people-vector-illustration_87771-11436.jpg?w=2000" alt="">
        <h1 class="text-danger">Sorry! It Might seems you are blocked...</h1>
        <h3 class="text-warning">Please Contact to Admin</h1>
      </center>
    </div>
@endif

@if ($message=="accountopen")
    <div class="accountopen">
      <center>
        <img class="img" src="https://i.pinimg.com/originals/86/94/b6/8694b6b836f1f6886a1ff0ec31366305.png" alt="">
        <h1 class="text-success">Account Created Successfully</h1>
        <h4 class="text-warning">Now, You Are Automatically redirected</h1>
      </center>
    <script>setTimeout(function() { location.replace("loginpage"); }, 2000);</script>
    </div>
@endif


@if ($message=="nouserfound")
    <div class="blocked">
      <center>
        <img class="img" src="https://thumbs.dreamstime.com/b/upset-magnifying-glass-cute-not-found-symbol-unsuccessful-s-upset-magnifying-glass-cute-not-found-symbol-unsuccessful-122205900.jpg" alt="">
        <h1 class="text-success">Sorry! No user Found </h1>
        <h6 class="text-warning">Now, You Are Automatically redirected <br> towards login page</h1>
      </center>
    </div>
    <script>setTimeout(function() { location.replace("registerpage"); }, 3000);</script>
@endif


@if ($message=="userfound")
    <div class="userfound">
      <center><br><br><br>
        <img class="img" src="https://cdn.dribbble.com/users/427857/screenshots/9246116/media/0438bc1a444fac735b2a3744b2860873.png?compress=1&resize=400x300&vertical=top" alt=""><br><br><br><br>
        <h1 class="text-success">Seems, You Are Already Registered</h1>
        <h4 class="text-warning">Don't, You Are Automatically redirected Towards <br> Login Page.....</h1>
      </center>
    </div>
    <script>setTimeout(function() { location.replace("loginpage"); }, 3000);</script>
@endif

@if ($message=="passwordreset")
    <div class="passwordreset">
      <center>
        <img class="img" src="https://static.vecteezy.com/system/resources/previews/004/968/639/original/password-has-been-reset-successfully-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg" alt=""><br><br><br><br>
        <h1 class="text-success">New Password Set Successfully</h1>
        <h5 class="text-warning">Don't worry, You Are Automatically redirected<br> Towards  Login Page.....</h1>
      </center>
    </div>
    <script>setTimeout(function() { location.replace("home"); }, 3000);</script>
@endif

@if ($message=="wrongpassword")
    <div class="passwordreset">
      <center>
        <img class="img" src="https://cdn.dribbble.com/users/8069464/screenshots/15766628/1701_4x.jpg" alt=""><br><br><br><br>
        <h1 class="text-success">Might You Have Forgotten Your Password</h1>
        <h5 class="text-warning">You Can Reset Your password Here..</h1><br><br>
        <a href="{{url('/')}}/password"><button class="btn button" style="width: 25%;">Reset Password</button></a>

      </center>
    </div>
@endif







        <!-- <img class="img" src="https://cdni.iconscout.com/illustration/premium/thumb/no-user-found-6771636-5639817.png" alt=""> -->

        <style>
            .blocked img,.passwordreset img{
                width: 500px;
            }
            .btn {
                min-height: 40px;
                border-radius: 3px;
            }.btn {
	color: #fff;
	border-radius: 4px;
	background: #2196F3;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	border: none;
}
.btn:hover, .modal-confirm .btn:focus {
	background: #75a9d4;
	outline: none;
}
        </style>
</body>
</html>
