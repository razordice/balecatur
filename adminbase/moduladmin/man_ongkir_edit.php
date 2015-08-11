<div class="row">
    <div class="col-lg-12">                
        <h1 class="page-header">Manajemen Edit Ongkir</h1>                
    </div>                
  	<div class="col-lg-12">
<?php 
$aksi="proses.php";

    $edit=mysql_query("select o.id_ongkir, l.lokasi_nama, o.ongkos from ongkir o 
   						              join inf_lokasi l on o.id_kota = l.lokasi_ID where o.id_ongkir='$_GET[id]'");
    $r=mysql_fetch_array($edit);
echo "<form method=POST action=$aksi?page=man_ongkir_edit&act=updateOngkir>
          <input type=hidden name=id value='$r[id_ongkir]'>
          <table>
          <tr>
          	<td>Nama Kota </td>
          	<td>: </td>
          	<td>$r[lokasi_nama]</td>
          </tr>
          <tr>
          	<td>Ongkos Kirim </td>
          	<td>: </td>
          	<td> <input type=text name='ongkos_kirim' class='form-control' value='$r[ongkos]' size=7></td>
      	  </tr>
      	  <tr></tr>
          <tr><td colspan=2><input type=submit value=Update class='btn btn-small btn-success'>
                            <input type=button value=Batal class='btn btn-small' onclick=self.history.back()></td></tr>
          </table></form>";
?>

	</div>
</div>