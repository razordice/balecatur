<?php session_start();

	include '../../config/koneksi.php';
	
	//tanggapi action
	
$act       = $_GET['act'];

if ($act=='tambah') {

	function acakangkahuruf($panjang) {
	    $karakter = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	    $string = '';
	    for ($i = 0; $i < $panjang; $i++) {
	        $pos = rand(0, strlen($karakter) - 1);
	        $string .= $karakter{$pos};
	    }
	    return $string;
	}


	$cek = mysqli_query($konek,"select * from member");
	$row = mysqli_num_rows($cek);


	$antrian = $row + 1;
	$jlh = strlen($antrian);

	if ($jlh == 4) {
	    $urut = $antrian;
	} else if ($jlh == 3) {
	    $urut = "0" . $antrian;
	} else if ($jlh == 2) {
	    $urut = "00" . $antrian;
	} else if ($jlh == 1) {
	    $urut = "000" . $antrian;
	}  

	$acak = acakangkahuruf(3);

	$id_user_new = $urut . $acak;

	$nama_lengkap 	=$_POST['nama_lengkap'];
	$email			=$_POST['email'];
	$password		=md5($_POST['password']);
	$no_telp		=$_POST['no_telp'];
	$jen_kel		=$_POST['jen_kel'];
	$alamat     	=$_POST['alamat'];
	

	$acak            		=rand(1, 99);
	$lokasi_file_identitas  =$_FILES['foto_identitas']['tmp_name'];
	$tipe_file_ktp   		=$_FILES['foto_identitas']['type'];
	$nama_identitas         =$_FILES['foto_identitas']['name'];
	$direktori_identitas    ="../../image/identitas/";
	$nama_file_identitas    =$acak. $nama_identitas;

	$lokasi_file_fotoprofil =$_FILES['fotoprofil']['tmp_name'];
	$tipe_file_fotoprofil   =$_FILES['fotoprofil']['type'];
	$nama_fotoprofil        =$_FILES['fotoprofil']['name'];
	$direktori_fotoprofil  	="../../image/user/";
	$nama_file_fotoprofil  	=$acak. $nama_fotoprofil;

	move_uploaded_file($lokasi_file_identitas, $direktori_identitas.$nama_file_identitas);
	move_uploaded_file($lokasi_file_fotoprofil, $direktori_fotoprofil.$nama_file_fotoprofil);

	echo $query ="INSERT INTO member (id_member, nama_lengkap, password, email, alamat, jenis_kelamin, no_telp, foto_identitas, foto) 
		VALUES ('$id_user_new','$nama_lengkap','$password','$email','$alamat','$jen_kel','$no_telp','$nama_file_identitas','$nama_file_fotoprofil')";


	$hasil =mysqli_query($konek,$query);

	/*if ($hasil) { ?>
		<div class="wrapper-cntainersucces">
			<div class="container-success">
				<p>Terimakasih anda telah melakukan pendaftaran member ! :)</p>
				<a href="<?php echo "$site";?>signin.php">
				<input type="submit" class="btnbtn-succesmmber" value="Klik disini untuk Login sistem"></a>
			</div>
		</div>
	<?php
	}else{
		echo "<script>alert(Gagal disimpan !!);</script>";
		echo "<script>history.go(-1);</script>";

	}
*/

}

?>
<style type="text/css">

	.wrapper-cntainersucces{
		width: 100%;
		height: auto;
		display: inline-block;

	}
	.container-success{
	    font-size: 14px;
	    background: #D17923 none repeat scroll 0% 0%;
	    display: inline-block;
	    color: #FFF;
	    margin: 2% 0% 0% 30% !important;
	    width: 500px;
	    height: 100px;
	    font-family: Arial,sans-serif;
	    text-align: center;
	}
	.btnbtn-succesmmber{
		background: #FB0D0D none repeat scroll 0% 0%;
		display: inline-block;
		border: medium none;
		width: 36%;
		height: 32px;
		color: #FFF;
		box-shadow: 1px 1px 1px #606060;
		cursor: pointer;
	}
</style>