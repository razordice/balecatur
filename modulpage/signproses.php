<?php session_start();
include "../koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username=anti_injection($_POST['username']);
$password=anti_injection(($_POST['password']));

if (!ctype_alnum($username) OR !ctype_alnum($password)){
  echo "Mau Iseng ya??";
}
else {
    $query=mysql_query("SELECT * FROM user WHERE username='$username' AND password='$password' AND blokir !='Y'");
    $record=mysql_fetch_array($query);

    if ($record['username']==$username and $record['password']==$password) {
        $_SESSION['id_user']      = $record['id_user'];
        $_SESSION['username']     = $record['username'];
        $_SESSION['nama_lengkap'] = $record['nama_lengkap'];
        echo "<script>alert('Selamat Datang ".$_SESSION['nama_lengkap']."!!!')</script>";
        echo "<meta http-equiv=refresh content=0;url=$site/booking.php>";
    } else {
        echo "<script>alert('Username atau password salah !!!')</script>";
        echo "<script>history.go(-1)</script>";
    }
}


?>



