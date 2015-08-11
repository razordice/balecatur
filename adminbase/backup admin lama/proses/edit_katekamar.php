<?php

	include"config/koneksi.php";


if ($act=="edit"){

	$type_kamar 	= $_POST['type_kamar'];
	$jumlah_kamar 	= $_POST['jumlah_kamar'];

	$query  = "UPDATE kategori_kamar SET type_kamar='$type_kamar' jumlah_kamar='$jumlah_kamar' WHERE id_kategori_kamar";
	$update = mysqli_query($konek, $query);

	if ($update) {
		echo "<script>alert('Data berhasil diubah !!')</script>";
	}else{

		echo "<script>alert(' Data gagal di edit !!')</script>";
		echo "<script>history.go(-1)</script>";

	}

}


?>
