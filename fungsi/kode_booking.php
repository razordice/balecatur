<?php

	include "config/koneksi.php";


//fungsi untuk mendapatkan jumlah total baris di database
function getTotalRow($sql)
{
    $rs = mysql_query($sql) or die(mysql_error().$sql);
    $r = mysql_num_rows($rs);
    mysql_free_result($rs);
    return $r;
}
 
function KodeBooking()
{
    //jumlah panjang karakter angka dan huruf.
    $length_abjad = "2";
    $length_angka = "4";
 
    //huruf yg dimasukan, kecuali I,L dan O
    $huruf = "ABCDEFGHJKMNPRSTUVWXYZ";
 
    //mulai proses generate huruf
    $i = 1;
    $txt_abjad = "";
    while ($i <= $length_abjad) {
        $txt_abjad .= $huruf{mt_rand(0,strlen($huruf))};
        $i++;
    }
 
    //mulai proses generate angka
    $datejam = date("His");
    $time_md5 = rand(time(), $datejam);
    $cut = substr($time_md5, 0, $length_angka); 
 
    //mennggabungkan dan mengacak hasil generate huruf dan angka
    $acak = str_shuffle($txt_abjad.$cut);
 
    //menghitung dan memeriksa hasil generate di database menggunakan fungsi getTotalRow(),
    //jika hasil generate sudah ada di database maka proses generate akan diulang
    $cek  = getTotalRow('SELECT kd_booking FROM booking WHERE kd_booking = "'.$acak.'"');
    if($cek > 0) { $cek = KodeBooking(); }
 
    return $acak;
}

?>

