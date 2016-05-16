<?php session_start();

	include "../../config/koneksi.php";

	$act=$_GET['act'];

if ($act=='booking') {


	$acakangkahuruf 	= $_POST['kd_booking'];
	$type_kamar			= $_POST['type_kamar'];
	$checkin    		= $_POST['checkin'];
	$checkout			= $_POST['checkout'];
	$id_kategori_kamar  = $_POST['id_kategori_kamar'];
	$id_paket			= $_POST['id_paket'];
	$id_rental			= $_POST['id_rental'];
	$id_laundry			= $_POST['id_laundry'];
	$nama_perusahaan	= $_POST['nama_perusahaan'];
	$atas_nama			= $_POST['atas_nama'];
	$email				= $_POST['email'];
	$adults 			= $_POST['adults'];	
	$parents 			= $_POST['parents'];	
	$status     		= $_POST['status'];



	$reserve ="INSERT INTO booking (kd_booking, id_member, id_kategori_kamar, id_paket, id_rental, id_laundry, nama_perusahaan, atas_nama, email, adults, parents, 
						   checkin, checkout, status, stat_reservation) VALUES ('$acakangkahuruf', '$_POST[id_member]', '$id_kategori_kamar', '$id_paket', '$id_rental', '$id_laundry',
						   '-', '-', '-', '$adults', '$parents', '$checkin' ,'$checkout', '0' ,'person')";
	$hasil   =mysqli_query($konek,$reserve);
  /*  echo $reserve; */

 if($hasil) {
        echo "<script>alert('Booking Berhasil Di simpan!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."/myorder>";
    } else { 
        echo "<script>alert('Booking Gagal Di simpan!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."/reservation>";
    } 

}

elseif ($act=='booking_instansi') {
	
	$acakangkahuruf 	= $_POST['kd_booking'];
	$type_kamar			= $_POST['type_kamar'];
	$checkin    		= $_POST['checkin'];
	$checkout			= $_POST['checkout'];
	$id_kategori_kamar  = $_POST['id_kategori_kamar'];
	$adults 			= $_POST['adults'];	
	$parents 			= $_POST['parents'];	
	$status     		= $_POST['status'];

	$reserve_instansi ="INSERT INTO booking (kd_booking, id_member, id_kategori_kamar, id_paket, adults, parents, checkin, checkout, status) 
			   VALUES ('$acakangkahuruf', '$_POST[id_member]', '$id_kategori_kamar', '$id_paket','$adults', '$parents', '$checkin' ,'$checkout', '0')";

	$hasil   =mysqli_query($konek,$reserve_instansi);

	if($hasil) {
        echo "<script>alert('Booking Berhasil Di simpan!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."/myorder>";
    } else { 
        echo "<script>alert('Booking Gagal Di simpan!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."/reservation>";
    } 

}

?>
