<?php session_start();

	include "../config/koneksi.php";
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Administrator Area</title>
	<link rel="shorcut icon" href="<?php echo "$site";?>image/icon/favicon.ico.png">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">


</head>
<body class="hoteladminstrator">
<div class="outer-wrapperadmin">
	<div class="wrapper-outteradmin">
		<div class="container-inneradmin">
			<div class="inneradmin-right">
			<form action="proses/login-proses.php" method="post" enctype="multipart/form-data">
				<table width="390" class="tbadmin-loginarea" cellpadding="0" cellspacing="0">
					<tr class="">
						<td></td>
						<td>
							<label for="username">	
								<input type="text" name="username" class="adminstyle" placeholder="username" required="">
							</label>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<label for="password">
								<input type="password" name="password" class="adminstyle" placeholder="password" required="">
							</label>
						</td>
					</tr>
				</table>
				<div class="btnpostion">
					<input type="submit"  class="btn-btnadministrator" value="Masuk">
				</div>
			</form>
			</div>
			<div class="box-contadmin">
				<div class="postion-admarea">
					<h1 class="fontadm-Area">Administrator Area</h1>
				</div>
				<div class="postion-logoadminarea">
					<img src="../image/logo/lg-hotelresize.png">
					<p class="">Ballecaturinn Allrightsreserved</p>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>