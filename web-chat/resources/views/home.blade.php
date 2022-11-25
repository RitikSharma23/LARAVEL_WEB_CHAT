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
<link rel="stylesheet" href="css.css">
<title>HOME</title>
</head>
<body style="overflow:hidden;">
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom" style="width:99vw;margin-left:-100px;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">HOME</span>
      </a>

      <ul class="nav nav-pills">
        <!-- <li class="nav-item"><a href="{{url('/')}}/home" class="nav-link active" aria-current="page">Home</a></li> -->
        <li class="nav-item" style="margin-right:170px"><a href="loginpage" class="nav-link"><button class="btn btn-info" style="color:white;width:100px;border-radius:50px;font-family: 'Montserrat', sans-serif;">Login</button></a></li>
        <!-- <li class="nav-item"><a href="registerpage" class="nav-link">Register</a></li> -->
      </ul>
    </header>
    <img style="width:92vw;position:relative;top: -24px;" src="web.jpg">
  </div> 
  <a href="registerpage"> <button class="shan">Get Started</button></a> 


  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;700&display=swap'); 
    .btn-info:hover{
      background-color:#19647e;
      box-shadow:0px 0px 10px 1px #59c7e3;
    }
    .shan{
      position:absolute;
      top:450px;
      left:195px;
      width:200px;
      height:60px;
      border-radius:100px;
      background-color:#39b9ba;
      border:none;
      color:white;
      font-size:25px;
      font-family:bold;

    }
    .shan:hover{
      background-color:#19647e;
      box-shadow:0px 0px 10px 1px #59c7e3;
    }
  </style>
</body>
</html>
