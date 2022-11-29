<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="css.css">
</head>
<body>
<div class="d-flex justify-content-center align-items-center container">
        <div class="card py-5 px-3">
            <h5 class="m-0">Mobile phone verification</h5><span class="mobile-text">Enter the code we just send on your mobile phone <b  style="color:#8a4ef9">+91 86684833</b></span>
            <div class="d-flex flex-row mt-5">
                <input type="text" id="first" class="form-control" autofocus="">
                <input type="text"  id="second" class="form-control">
                <input type="text"  id="third" class="form-control">
                <input type="text" id="fourth" class="form-control"></div>
            <div class="text-center mt-5"><span class="d-block mobile-text">Don't receive the code?</span><span  style="color:#8a4ef9">Resend</span></div>
        </div>
    </div>
    <style>
        .card {
  width: 350px;
  padding: 10px;
  border-radius: 20px;
  background: #fff;
  border: none;
  height: 350px;
  position: relative;
}

.container {
  height: 100vh;
}

body {
  background: #eee;
}

.mobile-text {
  color: #989696b8;
  font-size: 15px;
}

.form-control {
  margin-right: 12px;
}

.form-control:focus {
  color: #495057;
  background-color: #fff;
  border-color: #8a4ef9";
  outline: 0;
  box-shadow: none;
}

.cursor {
  cursor: pointer;
}
    </style>
    <script>
        <function clickEvent(first,last){
      if(first.value.length){
        document.getElementById(last).focus();
      }
    }
    </script>
</body>
</html>