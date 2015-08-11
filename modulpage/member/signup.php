<?php session_start();

include"../config/koneksi.php";

/*$act    = "modulpage/member/signup_proses.php";
$action  = isset($_GET['action']) ? $_GET['action']: null;*/

?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
	<div class="wrapper-outerregist">
		<div class="content-register">
			<div class="positionmenu-register">
				<div class="post-rulefontsignup">
				<p class="fnt-style">REGISTRASI MEMBER HOTEL BALECATUR INN</p>
				<hr class="line-style"></hr>
					<article class="information-methods">
						Selamat datang member anggota Hotel Balecatur Inn ! ,setelah anda mengisi formulir informasi berikut ini, dan anda telah menyelesaikan data tersebut.
						Informasi yang anda berikan tidak akan digunakan dengan cara apapun / penyalahgunaan dalam bentuk kriminalitas internet ( Cyber Crime ). 
					</article>
				
				<form action="modulpage/member/signup_proses.php?act=tambah" method="post" enctype="multipart/form-data">
				<table class="tb-reserve" width="800" cellpading="5" cellspacing="0">
					<tr>
						<td width="200">Nama Lengkap</td>
						<td class="fnts-stlye">
							<input type="text" name="nama_lengkap" class="box-input" required=""></td>
					</tr>
					<tr>
						<td class="">Email</td>
						<td class="">
							<input type="text" name="email" class="box-input" required=""></td>

					</tr>
					<tr>
						<td class="">Password</td>
						<td class="">
							<input type="password" name="password" class="box-input" required=""></td>
					</tr>
					<tr>
						<td class="">Konfrimasi password</td>
						<td class="">
							<input type="password" name="password" class="box-input" required=""></td>
					</tr>
					<tr>
						<td width="200">No telp / Hp</td>
						<td class="fnts-stlye">
							<input type="text" name="no_telp" class="box-input" required=""></td>
					</tr>
					<tr>
						<td class="">Jenis Kelamin</td>
						<td class="">
							<input type="radio" checked name="jen_kel" class="position-radio" value="Pria" required="">Pria</input>
							<input type="radio" name="jen_kel" class="position-radio" value="Wanita" required="">Wanita</input>
						</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td><textarea rows="4" cols="73" name="alamat" class="form-cntrl"></textarea></td>
					</tr>
					<tr>
						<td class="">Identitas anda KTP / SIM</td>
						<td class="">
							<input type="file" value="browse" class="flash-boxpic" name="foto_identitas" required="">
						</td>
					</tr>
					<tr>
						<td class="">Foto Profil</td>
						<td class="">
							<input type="file" value="browse" class="flash-boxpic" name="fotoprofil" required="">
						</td>
					</tr>
				</table>
				<div class="clear-containerterms">
					<input type="checkbox" value="agrements" class="postion-checkbox" required="">
						<p class="terms-condition">saya setuju dengan ketentuan dan kebijakan manajemen hotel <strong class="terms-bold">"Terms of Use Notice",
						</strong>Balecatur Hotel <strong class="terms-bold">"Privacy Policy"</strong></p>
					
					<tr>
						<td class=""></td>
						<td class="">
							<input type="submit" class="btn btn-reserve" value="Daftar Sekarang">
						</td>
					</tr>
				</form>
				</div>
				</div><!-- post-rulefont -->
			</div><!-- positionmenu-register -->
		</div><!-- content-register -->
	</div><!-- wrapper-outerregist -->
</body>
