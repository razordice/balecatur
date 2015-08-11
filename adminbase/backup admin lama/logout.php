<?php 
	session_start();
	session_destroy();

	echo("<script>alert('Anda berhasil logout sistem !')</script>");

	include "redirecting.php";
?>