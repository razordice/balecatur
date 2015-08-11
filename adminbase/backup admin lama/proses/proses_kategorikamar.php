<?php
	include "../../config/koneksi.php";

if ($_GET['act']=='tambah') {

	$type_kamar   = $_POST['type_kamar'];
	$jumlah_kamar = $_POST['jumlah_kamar'];
 	$lokasi_file    = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    $nama_file      = addslashes($_FILES['foto']['name']);
    $acak           = rand(000000,999999);
    $nama_file_unik = $acak.$nama_file; 
    $vdir_upload    = "../../image/kamar/";
    move_uploaded_file($lokasi_file,$vdir_upload . $nama_file_unik);
	$ket = mysql_real_escape_string($_POST['fasilitas']);

	//cek validasi data
	$cekval   = mysqli_query($konek,"SELECT * FROM kategori_kamar WHERE type_kamar='$type_kamar' AND jumlah_kamar='$jumlah_kamar'");
	$cekbaris = mysqli_num_rows($cekval);

	if ($cekbaris > 0) {
		echo "<script type='text/javascript'>
				onload =function(){
					alert('Maaf data telah terinput !!');
					history.go(-1);
				}
			  </script>";
	}else{
		//upload foto script
	   

		echo $queryinsert   = "INSERT INTO kategori_kamar (type_kamar, jumlah_kamar, foto_kamar, fasilitas, tarif) VALUES ('$type_kamar','$jumlah_kamar','$nama_file_unik','$ket','$_POST[tarif]')";
		// $simpan        = mysqli_query($konek,$queryinsert);

		// if ($simpan) {
		// 	header("location:../homeadmin.php?modul=kategorikamar");
		// }else{
		// 	echo("<scripttype='text/javascript'>
		// 			onload.function(){
		// 				alert('Maaf data gagal terinput');
		// 				history.go(-1);
		// 			}
		// 		  </script>");
		// }
	}
}

if ($_GET['act']=='edit') {
	
	$type_kamar   = $_POST['type_kamar'];
	$jumlah_kamar = $_POST['jumlah_kamar'];

	$queryedit  = "UPDATE kategori_kamar SET type_kamar='$type_kamar', jumlah_kamar='$jumlah_kamar' WHERE id_kategori_kamar='$_POST[id_kategori_kamar]'";
	$simpankeDB = mysqli_query($konek,$queryedit);

	if ($simpankeDB) {
		header("location:../homeadmin.php?modul=kategorikamar");	
	}else{
		echo ("<script>alert('Data Gagal diupdate !!')</script>");		
	}
}

?>