<?php
	
	include "../../config/koneksi.php";

if(isset($_GET['id_kategori_kamar'])) {

	$id_kategori_kamar = $_GET['id_kategori_kamar'];
	
}else{

	echo $_GET['id_kategori_kamar'];

	die ("Gagal menghapus data !!");

}

if(!empty($id_kategori_kamar) &&  $id_kategori_kamar !='') {

	$querykamar = "DELETE FROM kategori_kamar WHERE id_kategori_kamar='$_GET[id_kategori_kamar]'";
	$berhasil   = mysqli_query($konek,$querykamar);

	if ($berhasil) {
		header("location:../homeadmin.php?modul=kategorikamar");

	}else{

		echo "Data tidak terhapus !!";

	}

}

?>