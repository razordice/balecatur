<?php session_start();

	include "../../config/koneksi.php";

	
	$acakangkahuruf = $_POST['kd_booking'];
	$id_member  	= $_POST['id_member'];
	$type_kamar		= $_POST['type_kamar'];
	$checkin    	= $_POST['checkin'];
	$adults 		= $_POST['adults'];	
	$parents 		= $_POST['parents'];	
	$checkout		= $_POST['checkout'];
	$status     	= $_POST['status'];


	$reserve ="INSERT INTO booking (kd_booking, id_member, id_kamar, id_layanan, adults, parents, checkin, checkout, status) 
			   VALUES ('$acakangkahuruf', '$id_member', '$id_kamar', '$id_layanan','$adults', '$parents', '$checkin' ,'$checkout', '1')";

	$hasil   =mysqli_query($konek,$reserve);

	if ($hasil) {

		echo "<script>alert(terimakasih telah melakukan reservasi !!)</script>";
		/*header("location:index.php?modul=reservation");*/
	}else{
		
		echo "<script>alert(reservasi gagal!! silahkan untuk mengulangi kembali)</script>";
		echo "<script>history.go(-1)</script>";


	}


?>
