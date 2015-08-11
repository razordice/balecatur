<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Hotel Balecatur Inn</title>
	<!-- src css sigup.css -->
	<link href="css/basehotel.css" type="text/css" rel="stylesheet"> 
</head>
<body>
<form id="login-form" action="?modulpage/proses=signproses.php" method="post" enctype="multipartformdata">
	<div class="display-outer"></div>
	 	<div class="main-logo header.center">
			<div class="header content.clearfix">
				<img class="logo" src="image/logo/lg-hotel.png" alt="logo"></img>
			</div><!-- header content.clearfix -->
		</div><!-- main-logo header.center -->		
	<div class="content clearfix">
		<div class="banner">
			<h1>Hotel & Resto</h1>
			<h2 class="text-small">Please sign up to access our website</h2>
		</div><!-- banner -->
		<div class="box sign-card clearfix">
			<div class="content-cardsignup">
				<label for="Email"></label>
					<input class="boxinput" type="email" placeholder="Email" required=""></input>
				<label for="Password"></label>
					<input class="boxinput" type="password" placeholder="Password" required=""></input>
				<input type="submit" class="btn-signinuser" value="Login"></input>
			</div><!-- content-cardsignup -->
			<div class="createaccount">
			<a href="lupapassword.php" class="a-createaccount">Lupa Password</a></div>		
		</div><!-- box sign-card clearfix -->
	</div><!-- content clearfix -->
</form>
</body>
</html>