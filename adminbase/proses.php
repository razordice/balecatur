<?php
include "../config/koneksi.php";

$act=$_GET['act'];


// Tambah Kamar
if ($act=='addKamar'){
  $q = "INSERT INTO kamar (id_kategori_kamar, no_kamar) 
  				VALUES('$_POST[kategori]','$_POST[no_kamar]')";
  $success = mysqli_query($konek,$q);
    if($success) {
        echo "<script>alert('Kamar Berhasil Di simpan!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_datakamar>";
    } else { 
        echo "<script>alert('Kamar Gagal Di simpan!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_datakamar>";
    } 
}

// Update Kamar
elseif ($act=='updateKamar'){
		$q = "UPDATE kamar SET id_kategori_kamar = '$_POST[kategori]', 
	  								 no_kamar = '$_POST[no_kamar]'
	  								WHERE id_kamar='$_POST[id]'"; 
    $success = mysqli_query($konek,$q);
		
    if($success) {
        echo "<script>alert('Kamar Berhasil Di edit!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_datakamar>";
    } else { 
        echo "<script>alert('Kamar Gagal Di edit!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_datakamar>";
    } 
}

// Hapus Kamar
elseif ($act=='hapusKamar'){
  $q="DELETE FROM kamar WHERE id_kamar='$_GET[id]'";
   $success = mysqli_query($konek,$q);
    
    if($success) {
        echo "<script>alert('Kamar Berhasil Di hapus!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_datakamar>";
    } else { 
        echo "<script>alert('Kamar Gagal Di hapus!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_datakamar>";
    } 
}

// Tambah Kategori
elseif ($act=='addKategori'){
  //upload foto script
    $lokasi_file    = $_FILES['foto']['tmp_name'];
    $nama_file      = $_FILES['foto']['name'];
    $acak           = rand(000000,999999);
    $nama_file_unik = $acak.$nama_file; 
    $vdir_upload    = "../image/kamar/";
    move_uploaded_file($_FILES["foto"]["tmp_name"],$vdir_upload . $nama_file_unik);
    $fasilitas =mysqli_real_escape_string($konek,$_POST['fasilitas']);

    $q = "INSERT INTO kategori_kamar(type_kamar,jumlah_kamar,foto_kamar,fasilitas,tarif) VALUES('$_POST[type_kamar]','$_POST[jumlah_kamar]','$nama_file_unik','$fasilitas','$_POST[tarif]')";
    $success = mysqli_query($konek,$q);
    if($success) {
        echo "<script>alert('Kategori Kamar Berhasil Di simpan!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=kategorikamar>";
    } else { 
        echo "<script>alert('Kategori Kamar Gagal Di simpan!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=kategorikamar>";
    } 
}

// Update Kategori
elseif ($act=='updateKategori'){
  //upload foto script
    $lokasi_file    = $_FILES['foto']['tmp_name'];
    $nama_file      = $_FILES['foto']['name'];
    $acak           = rand(000000,999999);
    $nama_file_unik = $acak.$nama_file; 
    $vdir_upload    = "../image/kamar/";
    move_uploaded_file($_FILES["foto"]["tmp_name"],$vdir_upload . $nama_file_unik);
    $fasilitas =mysqli_real_escape_string($konek,$_POST['fasilitas']);

  if (empty($lokasi_file)) {
    $q="UPDATE kategori_kamar SET type_kamar = '$_POST[type_kamar]', 
                     jumlah_kamar = '$_POST[jumlah_kamar]',
                     fasilitas = '$fasilitas', 
                     tarif = '$_POST[tarif]' WHERE id_kategori_kamar='$_POST[id]'";
    $success=mysqli_query($konek,$q); 
  } else {
    if ($nama_file_unik != $_POST['foto_lama']) {
      unlink($vdir_upload . $_POST['foto_lama']);
    }
    $q="UPDATE kategori_kamar SET type_kamar = '$_POST[type_kamar]', 
                     jumlah_kamar = '$_POST[jumlah_kamar]',
                     fasilitas = '$fasilitas', 
                     tarif = '$_POST[tarif]', 
                     foto_kamar = '$nama_file_unik'
                     WHERE id_kategori_kamar='$_POST[id]'"; 
    $success=mysqli_query($konek,$q); 
  }

   if($success) {
      echo "<script>alert('Kategori Kamar Berhasil Di edit!');</script>"; 
      echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=kategorikamar>";
  } else { 
      echo "<script>alert('Kategori Kamar Gagal Di edit!');</script>"; 
      echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=kategorikamar>";
  } 
}

// Hapus Kategori
elseif ($act=='hapusKategori'){
  $ambil = mysqli_fetch_array(mysqli_query($konek,"select foto_kamar from kategori_kamar WHERE id_kategori_kamar='$_GET[id]'"));
  $vdir_upload    = "../image/kamar/";
  unlink($vdir_upload . $ambil['foto_kamar']);

  $q = "DELETE FROM kategori_kamar WHERE id_kategori_kamar='$_GET[id]'";
  $success = mysqli_query($konek,$q);
  if($success) {
      echo "<script>alert('Kategori Kamar Berhasil Di hapus!');</script>"; 
      echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=kategorikamar>";
  } else { 
      echo "<script>alert('Kategori Kamar Gagal Di hapus!');</script>"; 
      echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=kategorikamar>";
  } 
}

// Hapus Ongkos Kirim
elseif ($act=='hapusOngkir'){
  mysql_query("DELETE FROM ongkir WHERE id_ongkir='$_GET[id]'");
  header('location:adminpanel.php?page=man_ongkir');
}

// Update Ongkos Kirim
elseif ($act=='updateOngkir'){
  mysql_query("UPDATE ongkir SET ongkos ='$_POST[ongkos_kirim]' WHERE id_ongkir = '$_POST[id]'");
  header('location:adminpanel.php?page=man_ongkir');
}

// Add User
elseif ($act=='addUser') {
  $pass = md5($_POST['password']);
  $q = "INSERT INTO admin (username, password, level, status) 
          VALUES('$_POST[username]','$pass','$_POST[user]','$_POST[blokir]')";
  $success = mysqli_query($konek,$q);

    if($success) {
        echo "<script>alert('User Berhasil Di simpan!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_user>";
    } else { 
        echo "<script>alert('User Gagal Di simpan!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_user>";
    } 
}

// Update User
elseif ($act=='updateUser'){
  $success = mysqli_query($konek,"UPDATE admin SET status ='$_POST[blokir]' WHERE id_admin = '$_POST[id]'");
    if($success) {
        echo "<script>alert('User Berhasil Di ubah!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_user>";
    } else { 
        echo "<script>alert('User Gagal Di ubah!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_user>";
    } 
}

// Hapus User
elseif ($act=='hapusUser'){
  mysql_query("DELETE FROM member WHERE id_member='$_GET[id]'");
  header('location:adminpanel.php?page=man_user');
}

// Update status order
if ($act=='updateOrder'){
  if ($_POST['status_order'] == 'Baru') {
    $status = 0;
  } else if ($_POST['status_order'] == 'Lunas') {
    $status = 1;
  } else {
    $status = 2;
  }
  mysql_query("UPDATE `order` SET status_order='$status' where id_order='$_POST[id]'");
  header('location:adminpanel.php?page=man_transaksi');
}
?>