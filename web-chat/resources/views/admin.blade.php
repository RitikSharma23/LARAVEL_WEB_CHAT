<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>Admin | Index</title>
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap core CSS -->
		<link href="dist/css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
		<!-- Swipe core CSS -->
		<link href="dist/css/swipe.min.css" type="text/css" rel="stylesheet">
		<!-- Favicon -->
		<link href="dist/img/favicon.png" type="image/png" rel="icon">
        <link rel="stylesheet" href="message.css">
	</head>
	<body>

		<main id="mainclass">
			<div class="layout">

				<div class="sidebar" id="sidebar" style="border:1px solid grey;">
					<div class="container">
						<div class="col-md-12">
							<div class="tab-content">

								<!-- End of Contacts -->
								<!-- Start of Discussions -->
								<div id="discussions" class="tab-pane fade active show">


									<div class="discussions" id="dis">
										<h1>Chats</h1> 

                                        <a  id="feedbtn" class="filterDiscussions all unread single " >
												<img class="avatar-md" src="https://icons.veryicon.com/png/o/internet--web/prejudice/feedback-8.png" >

												<div class="data">
													<h5>User Feedback</h5>
												</div>
										</a>

                                        <a  id="accbtn" class="filterDiscussions all unread single " >
												<img class="avatar-md" src="https://icons.veryicon.com/png/o/miscellaneous/renrenlawer/account-40.png" >

												<div class="data">
													<h5>User Accounts</h5>
												</div>
										</a>
                                        <a href="{{url('/')}}/excel"  id="accbtn" class="filterDiscussions all unread single " >
												<img class="avatar-md" src="https://icons.veryicon.com/png/o/application/yitao-wireless-icon-library/download-104.png" >

												<div class="data">
													<h5>Download Feedback Report</h5>
												</div>
										</a>
                                        <!-- <a  id="prof" class="filterDiscussions all unread single " >
												<img class="avatar-md" src="https://icons.veryicon.com/png/o/miscellaneous/renrenlawer/account-40.png" >

												<div class="data">
													<h5>Admin Profile</h5>
												</div>


										</a> -->
                                        <form action="{{url('/')}}/profil" method="post">@csrf<input type="text" value="4" name="id" style="display:none"><button class="sbtn" type="submit" id="sb"><span class="material-icons">edit</span><span class="us">Update Profile</span></button></form>



                                        <a   id="accbtn2s" class="filterDiscussions all unread single " style="display:none">
												<img class="avatar-md" src="https://icons.veryicon.com/png/o/miscellaneous/renrenlawer/account-40.png" >

												<div class="data">
													<h5>User Accounts</h5>
												</div>
										</a>
                                        <a href="sign-in.html"  id="accbtn" class="filterDiscussions all unread single lh" >
												<img class="avatar-md" src="https://icons.veryicon.com/png/o/miscellaneous/iconpack-1206/logout-48.png" >

												<div class="data">
													<h5>Logout</h5>
												</div>
										</a>
                                        <!-- <a href="sign-in.html" class="title collapsed">
													<i class="material-icons md-30 online">power_settings_new</i>
													<div class="data">
														<h5>Power Off</h5>
														<p>Log out of your account</p>
													</div>

												</a> -->
                                                <a   id="accbtn2s" class="filterDiscussions all unread single " style="display:none">
												<img class="avatar-md" src="https://icons.veryicon.com/png/o/miscellaneous/renrenlawer/account-40.png" >

												<div class="data">
													<h5>User Accounts</h5>
												</div>
										</a>


                                        

									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="main"  >
					<div class="tab-content" id="nav-tabContent">
						<!-- Start of Babble -->
						<div class="babble tab-pane fade active show" id="list-chat" role="tabpanel" aria-labelledby="list-chat-list">
							<!-- Start of Chat -->
							<div class="chat" id="chat1" style="padding: 30px">

                            <div class="feedback" id="feedback">

                                <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">Token</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Feedback</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                    <tr>
                                    <th>{{$d['id']}}</th>
                                    <th>{{$d['fname']}}</th>
                                    <th>{{$d['email']}}</th>
                                    <th>{{$d['phone']}}</th>
                                    <th><div class="feed">{{$d['complaint']}}</div></th>
                                    <th><form action="{{url('/')}}/feeddelete" method="post">@csrf<input type="text" name="token" value="{{$d['id']}}" style="display:none;"><button type="submit" style="border:none;background-color:white;color:red">Delete</button></form></th>
                                    </tr>
                                    @endforeach

                                </tbody>
                                </table>
                            </div>

                            <div class="account" id="account">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">created_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $d)
                                    @if ($d['active']!=3)

                                    <tr>
                                    <th>{{$d['id']}}</th>
                                    <th>{{$d['fname']." ".$d['lname']}}</th>
                                    <th>{{$d['phone']}}</th>
                                    <th>{{$d['email']}}</th>
                                    <th>
                                        @if ($d['active']==0)
                                        <form action="{{url('/')}}/block" method="post">@csrf<input type="text" name="token" value="{{$d['id']}}" style="display:none"><button type="submit" style="border:none;background-color:white;color:green">Active</button></form>
                                        @else
                                        <form action="{{url('/')}}/unblock" method="post">@csrf<input type="text" name="token" value="{{$d['id']}}" style="display:none"><button type="submit" style="border:none;background-color:white;color:red">Blocked</button></form>
                                        @endif
                                    </th>
                                    <th><div >{{$d['created_at']}}</div></th>

                                    @endif

                                    @endforeach

                                </tbody>
                                </table>

                            </div>



							</div>

						</div>

					</div>
				</div>


			</div> <!-- Layout -->
		</main>

				<!-- feedback ends !!!!!!!!!-->

		<!-- Bootstrap/Swipe core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="dist/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="dist/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="dist/js/vendor/popper.min.js"></script>
		<script src="dist/js/swipe.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
		<script>
			function scrollToBottom(el) { el.scrollTop = el.scrollHeight; }
			scrollToBottom(document.getElementById('content'));

            document.getElementById("myaccount").addEventListener("click",()=>{
                // alert("laskdh")
            })
		</script>
        <script src="https://www.gstatic.com/firebasejs/4.3.0/firebase.js"></script>
        <script>
            document.getElementById("feedbtn").addEventListener("click",()=>{
                document.getElementById("account").style.display="none"
                document.getElementById("feedback").style.display="block"
                document.getElementById("feedbtn").style.border="solid #2196F3"
                document.getElementById("accbtn").style.border="none"

            })
            document.getElementById("accbtn").addEventListener("click",()=>{
                document.getElementById("account").style.display="block"
                document.getElementById("feedback").style.display="none"
                document.getElementById("accbtn").style.border="solid #2196F3"
                document.getElementById("feedbtn").style.border="none"

            })



        </script>

         <style>
            .feed{
                width: 400px;
                height:50px;
                overflow-y:scroll
            }
            .feed::-webkit-scrollbar {
                display: none;
            }
            .account{
                display: none;
            }
            .sbtn{

				width: 305px;
				height: 85px;
				background-color: white;
				border-radius: 10px;
				border: none;
				font-size: larger;
                margin-top: 10px;





			}
            .sbtn:hover{  border-bottom: 2px solid #2196f3;}
			.sbtn span{
                float: left;
                margin-left: 20px;


            }
            .us {
                padding-left: 10px;
                font-weight: 700;

                font-size: 16px;
                color: #212529;
            }
            #feedbtn,#accbtn,.sbtn:hover{
                cursor: pointer;

            }
            .lh:hover{
                border: 2px solid red;
                
            }

         </style>
	</body>

</html>
