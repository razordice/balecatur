<?php
include "../config/koneksi.php";

$act=$_GET['act'];

//MANAGEMENT KAMAR

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

		$q = "UPDATE kamar SET id_kategori_kamar = '$_POST[kategori]', no_kamar = '$_POST[no_kamar]'
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

//MANAJEMEN KATEGORI KAMAR

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

    $addkate = "INSERT INTO kategori_kamar(type_kamar,jumlah_kamar,foto_kamar,fasilitas,deskripsi,tarif) 
                VALUES('$_POST[type_kamar]','$_POST[jumlah_kamar]','$nama_file_unik','$fasilitas','$_POST[deskripsi]','$_POST[tarif]')";
    $success = mysqli_query($konek,$addkate);

    if($success) {
        echo "<script>alert('Kategori Kamar Berhasil Di simpan!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=kategorikamar>";
    }else { 
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

// MANAGEMENT DISKON 

//tambah diskon
elseif ($act== 'tambah_diskon') {

 
  //validasi
  $getdata_disc =mysqli_query($konek,"SELECT * FROM diskon WHERE dari_tgl='$dari_tgl' AND sampai_tgl='$sampai_tgl'");
  $cek_disc = mysqli_num_rows($getdata_disc);

  if($cek_disc > 0 ){
    echo "<script>alert('Data sudah diinput !')</script>";
    echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_diskon>";

  }else{

 /* $dari_tgl=  $_POST['dari_tgl'];
  $sampai_tgl = $_POST['sampai_tgl'];*/

  $pecahtgl1 = explode("/", $_POST['dari_tgl']);
  $date1 = $pecahtgl1[2]."-".$pecahtgl1[0]."-".$pecahtgl1[1];

  $pecahtgl2 = explode("/", $_POST['sampai_tgl']);
  $date2 = $pecahtgl2[2]."-".$pecahtgl2[0]."-".$pecahtgl2[1];


  //filter
  $ket_diskon = mysqli_real_escape_string($konek,$_POST['ket_diskon']);

  $querydisc = "INSERT INTO diskon (id_kategori_kamar, besar_diskon, dari_tgl, sampai_tgl, keterangan_diskon) 
                VALUES ('$_POST[id_kategori_kamar]','$_POST[besar_diskon]','$date1','$date2','$ket_diskon')";
  $savedisc  = mysqli_query($konek,$querydisc);
/*  echo $querydisc;*/

    if ($savedisc) {
        echo "<script>alert('Data berhasil disimpan !')</script>";
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_diskon>";
    }else{
        echo "<script>alert('Data gagal disimpan !')</script>";
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_diskon>";
    }
  }

}

elseif ($act =='ubah_diskon') {
  
}
elseif ($act=='hapus_mandiskon') {
  
  $hapusdisk = "DELETE fROM diskon WHERE id_diskon='$_GET[id]'";
  $succefully = mysqli_query($konek,$hapusdisk);

  if ($succefully) {
    echo "<script>alert('Data berhasi dihapus !')</script>";
    echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_diskon>";
  }else{
    echo "<script>alert('Data gagal dihapus !')</script>";
    echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?moudl=man_diskon>";
  }
}



//MANAGEMENT RESTORASI

//tambah kategori menu
elseif ($act=='tambah_katemenu') {
  $get_katemenu = mysqli_query($konek,"SELECT * FROM paket WHERE nama_paket='$_POST[nama_paket]'");
  $cek_datakatemenu = mysqli_num_rows($get_katemenu);

  if ($cek_datakatemenu > 0) {
    echo "<script>alert('Data sudah di input !!')</script>";
    echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_datamenu>";
    
  }else{

    $query_katemenu = "INSERT INTO paket (nama_paket, harga_paket) VALUES('$_POST[nama_paket]','$_POST[harga_paket]')";
    $berhasil = mysqli_query($konek, $query_katemenu);

    if ($berhasil) {
        echo "<script>alert('Data berhasil disimpan !!')</script>";
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_datamenu>";
    }else{
        echo "<script>alert('Data gagal disimpan !!')</script>";
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_datamenu>";
    }
  }

}


elseif ($act=='tambah_menu') {

  $querymenu = "INSERT INTO menu (id_paket,nama_menu) 
                VALUES ('$_POST[id_paket]','$_POST[nama_menu]')";

  $berhasil =mysqli_query($konek, $querymenu);
/* echo $querymenu;*/
  if ($berhasil) {
      echo "<script>alert('Data berhasi disimpan !!');</script>";
      echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_datamenu>";
  }else{
      echo "<script>alert('Data Gagal disimpan !!');</script>";
      echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_datamenu>";
  }
}

elseif ($act=='update_menu') {

  $updatemenu = "UPDATE menu SET id_paket='$_POST[id_paket]', nama_menu='$_POST[nama_menu]', harga_menu='$_POST[harga_menu]'
                  nama_menu='$_POST[nama_menu]'";

  $berhasilupdate =mysqli_query($konek, $updatemenu);
    if ($berhasilupdate) {
      echo "<script>alert('Data berhasil di update !!')</script>";
      echo "<meta equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_datamenu>";
    }else{

    }
}

elseif ($act=='hapus_manmenu') {

  $hapusmenu="DELETE FROM menu WHERE id_menu='$_GET[id]'";
  $success_delete = mysqli_query($konek,$hapusmenu);

  if ($success_delete) {
    echo "<script>alert('data berhasil dihapus !!');</script>";
    echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_datamenu>";
  }else{
    echo "<script>alert('data gagal dihapus !!');</script>";
    echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_datamenu>";
  }

}

//MANAJEMEN MEMBER

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

  $success = mysqli_query($konek,"DELETE FROM admin WHERE id_admin='$_GET[id]'");
  if($success) {

        echo "<script>alert('User Berhasil Di Hapus!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_user>";
    } else { 
        echo "<script>alert('User Gagal Di ubah!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_user>";
    } 
}

// Hapus Member
elseif ($act=='hapusMember'){

  $success = mysqli_query($konek,"DELETE FROM member WHERE id_member='$_GET[id]'");
  if($success) {
        echo "<script>alert('User Berhasil Di Hapus!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_member>";
    } else { 
        echo "<script>alert('User Gagal Di Hapus!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_member>";
    } 
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


//MANAGEMENT BERITA

// Tambah berita
elseif ($act=='addBerita'){
  $isi_berita =mysqli_real_escape_string($konek,$_POST['isi_berita']);
  $waktu = date('Y-m-d H:i:s');
  $success = mysqli_query($konek, "INSERT INTO berita(judul_berita, isi_berita, waktu) VALUES ('$_POST[judul_berita]','$isi_berita','$waktu')");
  
  if($success) {
        echo "<script>alert('Berita Berhasil Di simpan!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_berita>";
    } else { 
        echo "<script>alert('Berita Gagal Di simpan!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_berita>";
    } 
}   

// Update berita
elseif ($act=='updateBerita'){
  $isi_berita =mysqli_real_escape_string($konek,$_POST['isi_berita']);
  $success = mysqli_query($konek,"update berita set judul_berita='$_POST[judul_berita]', isi_berita='$isi_berita' where id_berita='$_POST[id]'");
  if($success) {
        echo "<script>alert('Berita Berhasil Di edit!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_berita>";
    } else { 
        echo "<script>alert('Berita Gagal Di edit!');</script>"; 
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_berita>";
    } 
}

// Hapus berita
elseif ($act=='hapusberita') {
  $isi_berita =mysqli_query($konek,"DELETE FROM berita WHERE id_berita='$_GET[id]'");
  if ($isi_berita) {
      echo "<script>alert('Data berhasil dihapus !!')</script>";
      echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_berita>";
  }else{
      echo "<script>alert('Data gagal dihapus !!')</script>";
      echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_berita>";
  }
}

//MANAGEMENT RENTAL

//Tambah rental
elseif ($act=='addman_rental') {
  //validasi rental
  $cekdata_rent = mysqli_query($konek,"SELECT * FROM rental WHERE nama_kendaraan='$_POST[nama_kendaraan]'");
  $return_cek   = mysqli_num_rows($cekdata_rent);

  if ($return_cek > 0) {
      
    echo "<script>alert('Data sudah di input !!')</script>";
    echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_rental>";

  }else{

  $lokasi_file = $_FILES['foto_kendaraan']['tmp_name'];
  $nama_file   = $_FILES['foto_kendaraan']['name'];
  $acak        = rand(000000,999999);
  $nama_file_unik = $acak . $nama_file;
  $vdir_upload  = "../image/rental/";
  move_uploaded_file($_FILES['foto_kendaraan']['tmp_name'], $vdir_upload.$nama_file_unik);
  $ket_kendaraan =mysqli_real_escape_string($konek,$_POST['ket_kendaraan']);

  $query ="INSERT INTO rental (kate_kendaraan, nama_kendaraan, harga_kendaraan, foto_kendaraan, ket_kendaraan)
           VALUES ('$_POST[kate_kendaraan]', '$_POST[nama_kendaraan]', '$_POST[harga_kendaraan]', '$nama_file_unik', '$ket_kendaraan')";

  $berhasil =mysqli_query($konek,$query);

    if ($berhasil) {
        echo "<script>alert('Data berhasil disimpan !!')</script>";
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_rental>";
    }else{
        echo "<script>alert('Data gagal disimpan !!')</script>";
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_rental>";
    }

  }

}

elseif ($act=='edit_manrental') {
  
}


elseif ($act=='hapus_manrental') {
  //get image 
  $get_image = mysqli_fetch_array(mysqli_query($konek,"select foto_kendaraan from rental where id_rental='$_GET[id]'"));
  $vdir_upload ="../image/rental/";
  unlink($vdir_upload . $get_image['foto_kendaraan']);

  $data_rental = mysqli_query($konek,"DELETE FROM rental WHERE id_rental='$_GET[id]'");

  if ($data_rental) {
        echo "<script>alert('Data berhasil dihapus !!')</script>";
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_rental>";
  }else{
        echo "<script>alert('Data gagal dihapus !!')</script>";
        echo "<meta http-equiv=refresh content=0;url=$site"."adminbase/homeadmin.php?modul=man_rental>";
  }

}


?>

