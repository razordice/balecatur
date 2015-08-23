<div class="row">
    <div class="col-lg-12">                
        <h1 class="page-header">Manajemen Edit Ongkir</h1>                
    </div>                
  	<div class="col-lg-12">
<?php 
$aksi="proses.php";

    $edit=mysqli_query($konek,"select * from admin where id_admin='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
    
echo "<form method=POST action=$aksi?modul=man_user_edit&act=updateUser>
          <input type=hidden name=id value='$r[id_admin]'>
          <table>
          <tr>
          	<td>Nama User </td>
          	<td>: </td>
          	<td>$r[username]</td>
          </tr>
          <tr>
          	<td>Blokir User </td>
          	<td>: </td>
          	<td> "?>
              <?php 
              if ($r['status'] == "Y") {
                echo '<label class="radio-inline">
                          <input type="radio" name="blokir" value="Y" checked> Ya
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="blokir" value="N"> Tidak
                        </label>';
                
              } else {
                echo '<label class="radio-inline">
                          <input type="radio" name="blokir" value="Y"> Ya
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="blokir" value="N" checked> Tidak
                        </label>';
                
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