<?php session_start();

include"../config/koneksi.php";

/*$act    = "modulpage/member/signup_proses.php";
$action  = isset($_GET['action']) ? $_GET['action']: null;*/

?>

<script type="text/javascript">
	$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});

	$(document).ready(function() {
		var validator = $('#registerform').submit(function() {

		}).validate({
			rules: {
				nama_lengkap :"required",
				email :{
					required :true,
					email:true
				},
				password :{
					required :true,
					minlength:10
				},
				knfrimasi_password :{
					required :true,
					minlength:10,
					equalTo :"#password"
				},
				no_telp :{
					required :true,
					minlength:12,
					phone_number:true
				},
				jen_kel:{
					required:true
				}
			},	
			messages : {
				nama_lengkap :"Nama lengkap tidak boleh kosong !!",
				email :{
					required :"Email tidak boleh kosong !!"
				},
				password :{
					required  :"Password tidak boleh kosong !!",
					minlength :"Password tidak boleh kurang dari 10 karakter !!"
				},
				knfrimasi_password :{
					required  :"knfrimasi_password tidak boleh kosong",
					minlength :"Password tidak boleh kurang dari 10 karakter !!",
					equalTo   :"Password tidak sama !!"
				},
				no_telp :{
					required :"Nomor telepon tidak boleh kosong !!",
					phone_number : "Nomor Telp tidak Valid !!"
				},

			}
		});
	});
	
</script>

<style type="text/css">
	#registerform label{
		width: 20%;
	}
	
	.error{
		color:hsl(0, 100%, 51%);
	}

</style>
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
				
				<form action="modulpage/member/signup_proses.php?act=tambah" method="post" enctype="multipart/form-data" id="registerform">
				<table class="tb-reserve" width="800" cellpading="5" cellspacing="0">
					<tr>
						<td width="200"><label for="nama_lengkap" class="erormessage">Nama Lengkap</label></td>
						<td class="fnts-stlye">
							<input type="text" name="nama_lengkap" id="nama_lengkap" class="box-input" placeholder="Nama Lengkap" autofocus required></td>
					</tr>
					<tr>
						<td class="">Identitas KTP / SIM</td>
						<td class="">
							<input type="text" class="box-input" name="identitas" placeholder="Masukkan Nomor KTP / SIM">
							<!-- <input type="file" value="browse" class="flash-boxpic" name="foto_identitas" required> -->
						</td>
					</tr>
					<tr>
						<td class=""><label for="email">Email</label></td>
						<td class="">
							<input type="text" name="email" id="email" class="box-input" required></td>

					</tr>
					<tr>
						<td class=""><label for="password">Password</label></td>
						<td class="">
							<input type="password" name="password" id="password" class="box-input" required></td>
					</tr>
					<tr>
						<td class=""><label for="knfrimasi_password">Konfrimasi password</label></td>
						<td class="">
							<input type="password" name="knfrimasi_password" id="knfrimasi_password" class="box-input" required></td>
					</tr>
					<tr>
						<td width="200"><label for="no_telp">No telp / Hp</label></td>
						<td class="fnts-stlye">
							<input type="text" name="no_telp" id="no_telp" class="box-input" required></td>
					</tr>
					<tr>
						<td class="">Jenis Kelamin</td>
						<td class="">
							<input type="radio" checked name="jen_kel" id="jen_kel" class="position-radio" value="Pria" required>Pria</input>
							<input type="radio" name="jen_kel" id="jen_kel" class="position-radio" value="Wanita" required>Wanita</input>
						</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td><textarea rows="4" cols="73" name="alamat" id="alamat" class="form-cntrl"></textarea></td>
					</tr>
					<tr>
						<td class="">Foto Profil</td>
						<td class="">
							<input type="file" value="browse" class="flash-boxpic" name="fotoprofil" required>
						</td>
					</tr>
				</table>
				<div class="clear-containerterms">
					<input type="checkbox" value="agrements" class="postion-checkbox" required>
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

