<?php
   include ("includes/koneksi.php");
if (!isset($_POST['submit'])){
      $nama     = $_POST['nama'];
      $email    = $_POST['email'];
      $Komentar = $_POST['komentar'];

//masukan data dengan query insert into ke tabel buku_tamu      
$q = "INSERT INTO buku_tamu VALUES ('$nama','$email','$komentar') ";
//eksekusi query
$r = mysql_query($q) or die(mysql_error());

  if ($r) { $msg ="Komentar berhasil dikirim !"; }
  else { $msg ="komentar gagal dikirim"; }

  }
?>

<!DOCTYPE>
<html lang="eng">
<head>
<link href="css/menubox.css" type="text/css" rel="stylesheet"><!--menubox.css-->
</head>
<body>
  <div class="menubox">
      <div id="message">
              <p><?php echo "<center><h3>$msg</center></h3>" ?></p>
                <p class="textbox">Klik disini untuk kembali</P>     
              <a href="index.php"/>
            <input type="submit" name="kembali" class="submitbtn" value="<<Kembali"/>
      </div>     
  </div>
</body>
</head>