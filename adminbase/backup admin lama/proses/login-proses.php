<?php session_start();
/*error_reporting(E_ALL);*/
/*  ini_set('display_error', 1);*/
	
include "../../config/koneksi.php";


	$username =mysqli_real_escape_string($konek,$_POST['username']);
	$password =mysqli_real_escape_string($konek,md5($_POST['password']));


	$querinya =mysqli_query($konek,"SELECT * FROM admin WHERE username='$username' AND password='$password' ");
	$ketemu  =mysqli_fetch_array($querinya);				


	if ($ketemu['username']==$username AND $ketemu['password']==$password) {
		$_SESSION['id_admin'] = $ketemu ['id_admin'];
		$_SESSION['username'] = $ketemu ['username'];
		$_SESSION['password'] = $ketemu ['password'];
		$_SESSION['level']    = $ketemu ['level'];

		echo "<script>alert('Selamat datang ".$_SESSION['username']." !!')</script>";
		echo "<meta http-equiv=refresh content=0;url=../homeadmin.php?modul=dashboard>";

	}else{
		echo "<script>alert('maaf username dan password anda salah ulangi lagi !!')</script>";
		echo "<script>history.go(-1)</script>";

	}


/*}*/
?>

