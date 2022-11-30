<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>User | Index</title>
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
	<body >
    <div id="udetail" style="display: none;">{{$final['phone']."@".$final['fname']." ".$final['lname'].""."@".$final['fname']."_jpg"}}</div>

		<main id="mainclass" >
			<div class="layout">
				<!-- Start of Navigation -->
				<div class="navigation">
					<div class="container">
						<div class="inside">
							<div class="nav nav-tab menu">
								<button class="btn"><img class="avatar-xl" id="imgch"  src="/profile/{{$final['fname']}}.jpg" alt="avatar"></button>
								<!-- <a href="#members" data-toggle="tab"><i class="material-icons">account_circle</i></a> -->
								<a href="#discussions" data-toggle="tab" class="active"><i class="material-icons active">chat_bubble_outline</i></a>


								<a href="#settings" data-toggle="tab"><i class="material-icons">settings</i></a>
                                <a href="" data-toggle="tab" ><i id="person" class="material-icons">person_add</i></a>
								<button class="btn power" onclick="visitPage();"><i class="material-icons">power_settings_new</i></button>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Navigation -->
				<!-- Start of Sidebar -->
				<div class="sidebar" id="sidebar" style="border:1px solid grey;">
					<div class="container">
						<div class="col-md-12">
							<div class="tab-content">
								<!-- Start of Contacts -->
								<div class="tab-pane fade" id="members">
									<div class="search">
										<form class="form-inline position-relative">
											<input type="search" class="form-control" id="people" placeholder="Search for people...">
											<button type="button" class="btn btn-link loop"><i class="material-icons">search</i></button>
										</form>
										<button class="btn create" data-toggle="modal" data-target="#exampleModalCenter"><i class="material-icons">person_add</i></button>
									</div>
									<div class="list-group sort">

									</div>

								</div>
								<!-- End of Contacts -->
								<!-- Start of Discussions -->
								<div id="discussions" class="tab-pane fade active show">
									<div class="search">
										<form class="form-inline position-relative">
											<input type="search" class="form-control" id="conversations" placeholder="Search for conversations...">
											<button type="button" class="btn btn-link loop"><i class="material-icons">search</i></button>
										</form>
									</div>

									<div class="discussions" id="dis">
										<h1>Chats</h1>

									</div>
								</div>
								<!-- End of Discussions -->
								<!-- Start of Settings -->
								<div class="tab-pane fade" id="settings">
									<div class="settings">
										<div class="profile">
											<img class="avatar-xl" id="imgch2"   src="/profile/{{$final['fname']}}.jpg" alt="avatar">
											<h1><a href="#">{{$final['fname'] }} {{$final['lname']}}</a></h1>
										</div>
										<div class="categories" id="accordionSettings">
											<h1>Settings</h1>

											<!-- Start of My Account -->
                                            <!-- <a href="{{url('/')}}/profile/{{$final['id']}}">PROFILE</a> -->

                                            <form action="{{url('/')}}/profil" method="post">@csrf
                                                <input type="text" value="{{$final['id']}}" name="id" >
                                                <button  type="submit" class='sbtn' ><i class="material-icons md-30 online" >person_outline</i>Update Profile</button>
                                            </form>

											<div class="category" id="myaccount" >
												<!-- <a href="/jhjhjh" class="title collapsed" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background-color: white;border: none;border-radius: 10px;">
													<i class="material-icons md-30 online">person_outline</i>
													<div class="data">
														<h5>My Account</h5></div>
													<i class="material-icons">keyboard_arrow_right</i>
												</a> -->



												<div class="collapse" id="" aria-labelledby="headingOne" data-parent="#accordionSettings">


												</div>
											</div>

											<div class="category" id="myaccount" >
												<!-- <a href="/jhjhjh" class="title collapsed" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background-color: white;border: none;border-radius: 10px;">
													<i class="material-icons md-30 online">person_outline</i>
													<div class="data">
														<h5>My Account</h5></div>
													<i class="material-icons">keyboard_arrow_right</i>
												</a> -->



												<div class="collapse" id="" aria-labelledby="headingOne" data-parent="#accordionSettings">

												</div>
											</div>



                                            <br>
									<button id="feedbtn" class="fbtn"><i class="material-icons md-30 online">feedback</i>Feedback</button>
											<!-- End of My Account -->


											<!-- End of Notifications Settings -->

											<!-- Start of Appearance Settings -->
											<div class="category">
												<!-- <a href="#" class="title collapsed" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
													<i class="material-icons md-30 online">colorize</i>
													<div class="data">
														<h5>Appearance</h5>
														<p>Customize the look of Swipe</p>
													</div>
													<i class="material-icons">keyboard_arrow_right</i>
												</a> -->
												<div class="collapse" id="collapseFive" aria-labelledby="headingFive" data-parent="#accordionSettings">
													<div class="content no-layer">
														<div class="set">
															<div class="details">
																<h5>Turn Off Lights</h5>
																<p>The dark mode is applied to core areas of the app that are normally displayed as light.</p>
															</div>
															<label class="switch">
																<input type="checkbox">
																<span class="slider round mode"></span>
															</label>
														</div>
													</div>
												</div>
											</div>

                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="requests">
							<div class="title">
								<h1>Add your friends</h1>
								<button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i class="material-icons">close</i></button>
							</div>
							<div class="content">
								<form>
									<div class="form-group">
										<label for="user">Username:</label>
										<input type="text" class="form-control" id="user" placeholder="Add recipient..." required>
										<div class="user" id="contact">
											<img class="avatar-sm"  src="dist/img/avatars/avatar-female-5.jpg" alt="avatar">
											<h5>Keith Morris</h5>
											<button class="btn"><i class="material-icons">close</i></button>
										</div>
									</div>
									<div class="form-group">
										<label for="welcome">Message:</label>
										<textarea class="text-control" id="welcome" placeholder="Send your welcome message...">Hi Keith, I'd like to add you as a contact.</textarea>
									</div>
									<button type="submit" class="btn button w-100">Send Friend Request</button>
								</form>
							</div>
						</div>
					</div>
				</div>
											<!-- End of Appearance Settings -->

											<!-- Start of Logout -->
											<div class="category">
												<a href="sign-in.html" class="title collapsed">
													<i class="material-icons md-30 online">power_settings_new</i>
													<div class="data">
														<h5>Power Off</h5>
														<p>Log out of your account</p>
													</div>

												</a>
											</div>
											<!-- End of Logout -->
										</div>
									</div>
								</div>
								<!-- End of Settings -->
							</div>
						</div>
					</div>
				</div>

				<div class="main">
					<div class="tab-content" id="nav-tabContent">
						<!-- Start of Babble -->
						<div class="babble tab-pane fade active show" id="list-chat" role="tabpanel" aria-labelledby="list-chat-list">
							<!-- Start of Chat -->
							<div class="chat" id="chat1">
								<div class="top">
									<div class="container">
										<div class="col-md-12">
											<div class="inside">
												<a href="#"><img class="avatar-md" id="imgch3"  src="profile.png" data-toggle="tooltip" data-placement="top" title="Shanu" alt="avatar"></a>
												<!-- <div class="status">
													<i class="material-icons online">fiber_manual_record</i>
												</div> -->
												<div class="data">
													<h5><a href="#" id="liveuser"></a></h5>
													<span style="color: white;">Active now</span>
												</div>
												<div class="dropdown">
													<button class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-30">more_vert</i></button>
													<div class="dropdown-menu dropdown-menu-right">
														<hr>
														<button class="dropdown-item" id="clear"><i class="material-icons">clear</i>Clear Chat</button>
														<button class="dropdown-item" id="delete"><i class="material-icons">delete</i>Delete Contact</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

                                <div class="content" id="content" >
									<div class="container">
										<div class="col-md-12" id="mes">



										</div>
									</div>
								</div>
								<div class="container">
									<div class="col-md-12">
										<div class="bottom">
											<div class="position-relative w-100">
                                                <input type="text" name="" id="">
												<textarea id="text2" class="form-control" placeholder="Start typing for reply..." rows="1"></textarea>
												<button class="btn emoticons"><i class="material-icons">insert_emoticon</i></button>
												<button id="send2" type="submit" class="btn send"><i class="material-icons" id="">send</i></button>

									</div>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div> <!-- Layout -->
		</main>


        <div class="addfriend" id="addbox" >
        <div class="modal-dialog modal-dialog-centered" role="document">
						<div class="requests">
							<div class="title">
								<h1>Add your friends</h1>
								<button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i id="close" class="material-icons">close</i></button>
							</div>
							<div class="content out">
									<div class="form-group">
										<label for="user">Username:</label>
										<input type="number" class="form-control" id="usernum" placeholder="Enter Phone Number..." required>
                                        <span class="text-danger" id="error"></span>
                                        <span class="text-success" id="success"></span>
									</div>
									<div class="form-group">
										<label for="welcome">Message:</label>
										<textarea class="text-control" id="usermess" placeholder="Send your welcome message..."></textarea>
									</div>
									<button id="find" type="submit" class="btn button w-100">Send Friend Request</button>
							</div>
						</div>
					</div>
				</div>

							<!--for feed back!!!!!!!!!!!!!!!!!!!!!!!!-->
				    <div class="addfriend" id="feedbox" >
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="requests">
							<div class="title">
								<h1>Give your feedback</h1>
								<button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i id="close2" class="material-icons">close</i></button>
							</div>
							<div class="content out">
                                    <form action="{{url('/')}}/feedback" method="post">@csrf
                                        <div class="form-group">
										<label for="welcome">Feedback:</label>
                                        <input type="text" name="phone" value="{{$final['phone']}}" style="display:none">
                                        <input type="text" name="name" value="{{$final['fname'].' '.$final['lname']}}" style="display:none">
                                        <input type="text" name="email" value="{{$final['email']}}" style="display:none">
										<textarea class="text-control" id="userfeed" name="complaint" placeholder="Suggest Us..."></textarea>
									</div>
									<button id="findfeed" type="submit" class="btn button w-100">Send Feedback</button>
                                    </form>

							</div>
						</div>
					</div>
				</div>

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
        <script src="message.js"></script>

        <style>
            .addfriend{
                position: absolute;
                top: 0px;
                left: 700px;
                z-index: -3;
                transition: 1s;
            }
            .feedback{
                position: absolute;
                top: -900px;
                left: 700px;
                z-index: -3;
                transition: 1s;
            }
            .title{
                border-style:solid solid none solid;
            }
            .out{
                border-style:none solid solid solid;
            }
            .bg-image {
                filter: blur(0px);
                height: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
			.sbtn{

				width: 300px;
				height: 70px;
				background-color: white;
				border-radius: 10px;
				border: none;
				font-size: larger;



			}
			.sbtn i{
			float: left;
			margin-left: 10px;



			}
			.sbtn:hover{
				border:3px solid #2196F3 ;

			}
			.fbtn{
				float: center;
				width: 300px;
				height: 70px;
				background-color: white;
				border-radius: 10px;
				border: none;
				font-size: larger;



			}
			.fbtn i{
			float: left;
			margin-left: 10px;


			}
			.fbtn:hover{
				border:3px solid #2196F3 ;

			}

        </style>
	</body>

</html>
