<div class="row">
    <div class="col-lg-12">                
        <h1 class="page-header">Manajemen Edit Kamar</h1>                
    </div>                
  	<div class="col-lg-12">
<?php 
$aksi="proses.php";

    $edit=mysqli_query($konek,"select * from kamar where id_kamar='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
echo "
<form method=POST action='$aksi?modul=man_datakamar_edit&act=updateKamar' enctype=multipart/form-data>
          <input type=hidden name=id value='$r[id_kamar]'>
          <table>
          <tr>
          	<td>No Kamar </td>
          	<td>: </td>
          	<td><input type=text name='no_kamar' class='form-control' value='$r[no_kamar]'></td>
          </tr>
          <tr>
            <td>Kategori </td>
            <td>: </td>
            <td> <select name='kategori' class='form-control'>"; ?>
              <?php 
              $tampil=mysqli_query($konek,"SELECT * FROM kategori_kamar ORDER BY type_kamar");
          if ($r['id_kategori_kamar']==0){
            echo "<option value=0 selected>- Pilih Type Kamar -</option>";
          }   

          while($w=mysqli_fetch_array($tampil)){
            if ($r['id_kategori_kamar']==$w['id_kategori_kamar']){
              echo "<option value=$w[id_kategori_kamar] selected>$w[type_kamar]</option>";
            }
            else{
              echo "<option value=$w[id_kategori_kamar]>$w[type_kamar]</option>";
            }
          }
          echo "</select>";
              ?>
  <?php echo "</td>
          </tr>
      	  <tr></tr>
          <tr><td colspan=2><input type=submit value=Update class='btn btn-small btn-success'>
                            <input type=button value=Batal class='btn btn-small' onclick=self.history.back()></td></tr>
          </table></form>";
?>

	</div>
</div>