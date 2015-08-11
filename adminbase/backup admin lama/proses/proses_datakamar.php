<?php 

	include "../../config/koneksi.php";


if ($_GET['act']=='tambah') {

	$tipe_kamar		   = $_POST['id_kategori_kamar'];
	$fasilitas 		   = $_POST['fasilitas'];
	$tarif 		   	   = $_POST['tarif'];
	$foto_kamar 	   = $_POST['foto_kamar'];

	$query = "INSERT INTO kamar (id_kategori_kamar, fasilitas, tarif, foto_kamar ) VALUES ('$id_kategori_kamar','$fasilitas','$tarif','$foto_kamar')";
	$simpan = mysqli_query($konek,$query);

	if ($simpan) {

		header('location:../homeadmin.php?modul=datakamar');

	}else{

		echo "<script>alert('Data gagal disimpan !!')</script>";
		echo "<script>history.go(-1)</script>";

	}
}

if ($_GET['act']='edit') {
	
	$fasilitas  = $_POST['fasilitas'];
	$tarif 		= $_POST['tarif'];
	$foto_kamar = $_POST['foto_kamar'];

	$update = "UPDATE kamar SET fasilitas='$fasilitas', tarif='$tarif', foto_kamar='$foto_kamar' WHERE id_kamar='$_POST['id_kamar']'";
	$updated =mysqli_query($konek,$update);



}












?>