<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>Register</title>
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- start confirm script -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<!-- end confirm script -->
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
									<form class="signup" action="{{url('/')}}/register" method="post">
                                        @csrf
										<div class="form-parent">
											<div class="form-group">
												<input type="text" name="fname" class="form-control" placeholder="First Name" value="{{old('fname')}}">
												<button class="btn icon"><i class="material-icons">person_outline</i></button>
												<span class="text-danger">@error('fname'){{$message}}@enderror</span>
											</div>
											<div class="form-group">
												<input type="text" name="lname" class="form-control" placeholder="Last Name" value="{{old('lname')}}" >
												<button class="btn icon"><i class="material-icons">person_outline</i></button>
												<span class="text-danger">@error('lname'){{$message}}@enderror</span>
											</div>
										</div>
										<div class="form-group">
											<input type="number" id="phone" name="phone" class="form-control" placeholder="Phone" value="{{old('phone')}}">
											<button class="btn icon"><i class="material-icons">local_phone</i></button>
											<span class="text-danger">@error('phone'){{$message}}@enderror</span>
										</div>

										<div class="form-parent" id="ootp" style="display: none;">


										<div class="form-group" >
											<span class="text-success" id="succ"></span>
											<input type="number" id="otp" name="otp" class="form-control" placeholder="OTP" >
											<button class="btn icon"><i class="material-icons">local_phone</i></button>
											<span class="text-danger" id="mess"></span>
										</div>
										<div class="form-group">
                                       <span id="time"></span><button id="resend" disabled style="background-color: white;border: none;">Resend</button>
										</div>

                                        </div>


										<div class="form-group">
											<input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
											<button class="btn icon"><i class="material-icons">email</i></button>
											<span class="text-danger">@error('email'){{$message}}@enderror</span>
										</div>
										<div class="form-group">
											<input type="password" name="password" class="form-control" placeholder="Password">
											<button class="btn icon"><i class="material-icons">lock_outline</i></button>
											<span class="text-danger">@error('password'){{$message}}@enderror</span>
										</div>
										<div class="form-group">
											<input type="password" name="cnf_password" class="form-control" placeholder="Confirm Password" >
											<button class="btn icon"><i class="material-icons">lock_outline</i></button>
											<span class="text-danger">@error('cnf_password'){{$message}}@enderror</span>
										</div>
										<button type="submit" id="submit" class="btn button" style="background-color: grey;" formaction="{{url('/')}}/register" disabled>Register</button>
										<div class="callout">
											<span>Already a member? <a href="{{url('/')}}/loginpage">Login</a></span>
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
								<h2>Welcome </h2>
								<p>To keep connected with your friends please login with your personal info.</p>
								<a href="{{url('/')}}/loginpage" class="btn button">Login</a>
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
     <style>
                .modal-confirm {
            color: #636363;
            width: 325px;
            font-size: 14px;
        }
        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
        }
        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }
        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -15px;
        }
        .modal-confirm .form-control, .modal-confirm .btn {
            min-height: 40px;
            border-radius: 3px;
        }
        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -5px;
        }
        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
        }
        .modal-confirm .icon-box {
            color: #fff;
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: -70px;
            width: 95px;
            height: 95px;
            border-radius: 50%;
            z-index: 9;
            background: #2196F3;
            padding: 15px;
            text-align: center;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }
        .modal-confirm .icon-box i {
            font-size: 58px;
            position: relative;
            top: 3px;
        }
        .modal-confirm.modal-dialog {
            margin-top: 80px;
        }
        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #2196F3;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border: none;
        }
        .modal-confirm .btn:hover, .modal-confirm .btn:focus {
            background: #75a9d4;
            outline: none;
        }
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>

<script>
    function otpgenerator(minVal,maxVal)
{
  var randVal = minVal+(Math.random()*(maxVal-minVal));
  return Math.round(randVal);
}
    x=""

    function otp(){
        document.getElementById("resend").disabled=true
        document.getElementById("resend").style.color="grey"
        // url="https://www.fast2sms.com/dev/bulkV2?authorization=KCmx0I3aLSqWveTkZ9Pi16rzl8nfDRwMUhbVctHpO4Bd5QAuNgDkHXl9NuZp7mR0P1osaWxtJCq2GivI&message=Hello, Welcome to Web-Chat Your 4 Digit OTP is :"+x+"&language=english&route=q&numbers="+ph;

        const xhttp = new XMLHttpRequest(ph,x);
            xhttp.open("GET", "https://www.fast2sms.com/dev/bulkV2?authorization=KCmx0I3aLSqWveTkZ9Pi16rzl8nfDRwMUhbVctHpO4Bd5QAuNgDkHXl9NuZp7mR0P1osaWxtJCq2GivI&message=Hello, Welcome to Web-Chat Your 4 Digit OTP is : "+x+"&language=english&route=q&numbers="+ph, true);
            xhttp.send();

            var timeLeft = 60;
            var elem = document.getElementById('time');
            var timerId = setInterval(countdown, 1000);
            function countdown() {
            if (timeLeft == -1) {
                clearTimeout(timerId);
                doSomething();
            } else {
                elem.innerHTML = timeLeft + ' seconds remaining';
                timeLeft--;
            }
            if(timeLeft==0){
                document.getElementById("resend").disabled=false
                document.getElementById("resend").style.color="blue"
            }
            }
    }
    document.getElementById("phone").addEventListener("keyup",()=>{

        if(document.getElementById("phone").value.length==10){
            x=""
            document.getElementById("ootp").style.display="block"

            x = otpgenerator(1111,9999)
            console.log(x)

            ph=document.getElementById("phone").value
            document.getElementById("succ").innerHTML="OTP Sent Successfully.."
            otp(ph,x)
        }else{
            document.getElementById("succ").innerHTML=""
        }
    })

    document.getElementById("otp").addEventListener("keyup",()=>{


        if(document.getElementById("otp").value.length==4){
            if(document.getElementById("otp").value==x){
                document.getElementById("submit").style.backgroundColor="#2196f3"
                document.getElementById("submit").disabled=false
            document.getElementById("ootp").style.display="none"

            }else{
                document.getElementById("mess").innerHTML="OTP Not Match"
            }
        }else{
            document.getElementById("mess").innerHTML=""
        }
        })

    document.getElementById("resend").addEventListener("click",()=>{
        x=""
            document.getElementById("ootp").style.display="block"
            x = Math.floor((Math.random() * 9999) + 1000);
            ph=document.getElementById("phone").value
            document.getElementById("succ").innerHTML="OTP Resent Successfully..."
            otp(ph,x)
    })


</script>
	</body>


</html>
