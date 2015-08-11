<?php
  function tgl_indo($tgl){
      $tanggal = substr($tgl,8,2);
      $bulan = getBulan(substr($tgl,5,2));
      $tahun = substr($tgl,0,4);
      return $tanggal.' '.$bulan.' '.$tahun;     
  } 

  function getBulan($bln){
        switch ($bln){
          case 1: 
            return "Januari";
            break;
          case 2:
            return "Februari";
            break;
          case 3:
            return "Maret";
            break;
          case 4:
            return "April";
            break;
          case 5:
            return "Mei";
            break;
          case 6:
            return "Juni";
            break;
          case 7:
            return "Juli";
            break;
          case 8:
            return "Agustus";
            break;
          case 9:
            return "September";
            break;
          case 10:
            return "Oktober";
            break;
          case 11:
            return "November";
            break;
          case 12:
            return "Desember";
            break;
        }
      } 
?>
<div class="row">
    <div class="col-lg-12">                
        <h1 class="page-header">Manajemen Detail Transaksi</h1>                
    </div>                
  	<div class="col-lg-12">
<?php 
$aksi="proses.php";

  $edit = mysql_query("SELECT * FROM `order` WHERE id_order='$_GET[id]'");

    $r=mysql_fetch_array($edit);
    $edit2=mysql_query("select * from member where id_member='$r[id_member]'");
    $r2    = mysql_fetch_array($edit2);
    $a1 = $r2['kode_wilayah'];
    $a = explode (".", $r2['kode_wilayah']);
    $prov=mysql_query("select * from inf_lokasi where lokasi_propinsi='$a[0]'");

    $kab=mysql_query("select * from inf_lokasi where lokasi_propinsi='$a[0]' and lokasi_kabupatenkota='$a[1]'");

    $kec=mysql_query("select * from inf_lokasi where lokasi_propinsi='$a[0]' and lokasi_kabupatenkota='$a[1]' and lokasi_kecamatan='$a[2]'");

    $kel=mysql_query("select * from inf_lokasi where lokasi_kode='$a1'");

    $prov=mysql_fetch_array($prov);

    $kab=mysql_fetch_array($kab);

    $kec=mysql_fetch_array($kec);

    $rkel=mysql_fetch_array($kel);
    $tanggal=tgl_indo($r['tgl_order']);

    $pilihan_status = array('Baru', 'Lunas', 'Dikirim');
    $pilihan_order = '';
    foreach ($pilihan_status as $status) {
     $pilihan_order .= "<option value=$status";
     if ($status == $r['status_order']) {
        $pilihan_order .= " selected";
     }
     $pilihan_order .= ">$status</option>\r\n";
    }

    echo "<div class='col-lg-5'>
          <form method=POST action=$aksi?act=updateOrder>
          <input type=hidden name=id value=$r[id_order]>
          <table class=table>
          <tr><td>No. Order</td>        <td> : $r[id_order]</td></tr>
          <tr><td>Tgl. & Jam Order</td> <td> : $tanggal & $r[jam_order]</td></tr>
          <tr><td>Status Order      </td><td><select name=status_order class='form-control'>$pilihan_order</select></td></tr> 
          <tr><td colspan=2>
          <input type=submit value='Ubah Status' class='btn btn-small btn-success'>
          <input type=button value=Batal class='btn btn-small' onclick=self.history.back()>
          </td></tr>
          </table></form></div>";

  // tampilkan rincian produk yang di order
  $sql2=mysql_query("SELECT * FROM order_detail, produk 
                     WHERE order_detail.id_produk=produk.id_produk 
                     AND order_detail.id_order='$_GET[id]'");
  
  echo "<table class='table table-striped'>
        <tr><th>Nama Produk</th><th>Jumlah</th><th>Harga Satuan</th><th>Sub Total</th></tr>";
  
  while($s=mysql_fetch_array($sql2)){
     // rumus untuk menghitung subtotal dan total   
    $subtotal    = $s['harga'] * $s['jumlah'];
    $total       = @$total + $subtotal;
    $subtotal_rp = number_format($subtotal,0,',','.');
    $total_rp    = number_format($total,0,',','.');    
    $harga       = number_format($s['harga'],0,',','.');

    echo "<tr><td>$s[nama_produk]</td><td>$s[jumlah]</td><td>Rp. $harga</td><td>Rp. $subtotal_rp</td></tr>";
  }

  $ongkos=mysql_fetch_array(mysql_query("SELECT ongkos FROM ongkir WHERE id_propinsi='$r2[id_kota]'"));
  $ongkoskirim=$ongkos['ongkos'];
  // $ongkoskirim=$ongkos['ongkos'];
  $coba = $ongkoskirim;
  $hasil = str_replace(',', '', $coba);

  $grandtotal    = $total + $hasil; 

  $ongkoskirim_rp = number_format($hasil,0,',','.');
  $grandtotal_rp  = number_format($grandtotal,0,',','.');    

echo "<tr><td colspan=3 align=right>Total : </td><td>Rp. <b>$total_rp</b></td></tr>
      <tr><td colspan=3 align=right>Ongkos Kirim : </td><td>Rp. <b>$ongkoskirim_rp</b></td></tr>      
      <tr><td colspan=3 align=right>Grand Total : </td><td>Rp. <b>$grandtotal_rp</b></td></tr>
      </table>";

  // tampilkan data kustomer
  echo "<div class='col-lg-8'><table class='table table-condensed'>
        <tr><th colspan=2>Data Kustomer</th></tr>
        <tr><td>Nama Pembeli</td><td> : $r2[nama_lengkap]</td></tr>
        <tr><td>Alamat Pengiriman</td><td> : $r2[alamat], $rkel[lokasi_nama], $kec[lokasi_nama], $kab[lokasi_nama], $prov[lokasi_nama]</td></tr>
        <tr><td>No. Telpon/HP</td><td> : $r2[no_tlp]</td></tr>
        <tr><td>Email</td><td> : $r2[email]</td></tr>
        </table></div>";
?>

	</div>
</div>