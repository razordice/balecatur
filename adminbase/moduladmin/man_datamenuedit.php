<div class="col-lg-12">   
    <div class="font-sizerheading">
        <h1 class="page-header">Manajemen edit data menu</h1>                
    </div>             
</div>             

<?php

	$aksi="proses.php";

	$getdatamenu = mysqli_query($konek,"select * from menu join paket on menu.id_paket=paket.id_paket where id_menu='$_GET[id]'");
	$hasil =mysqli_fetch_array($getdatamenu);

?>	

		<form action=<?php echo "$aksi?modul=man_datamenuedit&act=update_datamenu"?> method='post' enctype='multipart/form-data'>
			<input type='hidden' name='id_menu' value='$hasil[id_menu]'></input>
			<table>
				<tr>
					<td><label>Nama Paket :</label></td>
					<td><input type='text' name='nama_paket' class='form-control' value=<?php echo $hasil['nama_paket']?>></td>
				</tr>		
				<tr>
					<td><label>Nama Menu :</label></td>
					<td><textarea name='nama_menu'><?php echo $hasil['nama_menu']?></textarea > 
					</td>
				</tr>
				<tr>
					<td><label>Harga Menu :</label></td>
					<td><input type='text' name='harga_paket' class='form-control' value=<?php echo $hasil['harga_paket']?>></input></td>
				</tr>
				<tr>
					
					<td><input type='submit' value='Ubah' class='btn btn-small btn-success'></input></td>
					<td><input type='submit' value='Batal' class='btn btn-small btn-success'></input></td>
				</tr>
				
			</table>
		</form>



