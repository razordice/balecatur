<?php 
	include "config/koneksi.php";

	session_start();
	session_destroy();

	echo "<script>alert('anda berhasil logout!')</script>";
	
	include "redirecting.php";
?>