<div class="row">
    <div class="col-lg-12">                
        <h1 class="page-header">Manajemen Edit Ongkir</h1>                
    </div>                
  	<div class="col-lg-12">
<?php 
$aksi="proses.php";

    $edit=mysql_query("select * from member where id_member='$_GET[id]'");
    $r=mysql_fetch_array($edit);
    $a1 = $r['kode_wilayah'];
    $a = explode (".", $r['kode_wilayah']);
    $prov=mysql_query("select * from inf_lokasi where lokasi_propinsi='$a[0]'");
    $kab=mysql_query("select * from inf_lokasi where lokasi_propinsi='$a[0]' and lokasi_kabupatenkota='$a[1]'");
    $kec=mysql_query("select * from inf_lokasi where lokasi_propinsi='$a[0]' and lokasi_kabupatenkota='$a[1]' and lokasi_kecamatan='$a[2]'");
    $kel=mysql_query("select * from inf_lokasi where lokasi_kode='$a1'");
    $prov=mysql_fetch_array($prov);
    $kab=mysql_fetch_array($kab);
    $kec=mysql_fetch_array($kec);
    $rkel=mysql_fetch_array($kel);

    
echo "<form method=POST action=$aksi?page=man_user_edit&act=updateUser>
          <input type=hidden name=id value='$r[id_member]'>
          <table>
          <tr>
          	<td>Nama User </td>
          	<td>: </td>
          	<td>$r[nama_lengkap]</td>
          </tr>
          <tr>
            <td>Alamat </td>
            <td>: </td>
            <td>$r[alamat], $rkel[lokasi_nama], $kec[lokasi_nama], $kab[lokasi_nama], $prov[lokasi_nama]</td>
          </tr>
          <tr>
            <td>No Tlp </td>
            <td>: </td>
            <td>$r[no_tlp]</td>
          </tr>
          <tr>
            <td>Email </td>
            <td>: </td>
            <td>$r[email]</td>
          </tr>
          <tr>
          	<td>Blokir </td>
          	<td>: </td>
          	<td> "?>
              <?php 
              if ($r['blokir'] == "Y") {
                echo "<input type=radio name='blokir' value='Y' checked> Y ";
                echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                echo "<input type=radio name='blokir' value='N'> N";
                
              } else {
                echo "<input type=radio name='blokir' value='Y'> Y ";
                echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                echo "<input type=radio name='blokir' value='N' checked> N";
                
              }

            ?>
<?php echo"</td>
      	  </tr>
      	  <tr></tr>
          <tr><td colspan=2><input type=submit value=Update class='btn btn-small btn-success'>
                            <input type=button value=Batal class='btn btn-small' onclick=self.history.back()></td></tr>
          </table></form>";
?>

	</div>
</div>