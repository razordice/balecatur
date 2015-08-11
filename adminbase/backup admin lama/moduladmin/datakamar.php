<?php
	if (isset($_GET['id_kamar'])) {
		$output = $_GET['id_kamar'];
		$link   = "proses/proses_datakamar.php?act=edit";
	}else{
		$output = "";
		$link   = "proses/proses_datakamar.php?act=tambah";
	}

 ?>
	<div class="wrapper-dashboard">
		<div class="container-dashboard">
		 	<div class="box-containerinner">
		 	<h2 class="font-styeheadingsadmn">Data Kamar</h2>
		 	<hr class="style-hr"></hr>
		<form action="<?php echo $link; ?>" name="" method="post" encytpe="multipart/form-data">
		<div class="box-stylekamar">
			<div class="boxformcontrol-inner">
				<div style="display:visibility;">
					<label for="id_kamar" class="controlposition">Id kamar</label>
					<input type="text" value="<?php echo $_GET['id_kamar']?>" class="form-select">
				</div>
				<label for="nama-kamar" class="controlposition">Nama Kamar</label>
				<select name="tipe_kamar" class="form-select">
					<option value=""> Pilih kamar </option>
					<?php 
					 	$datakamar =mysqli_query($konek,"SELECT * FROM kategori_kamar");
					 	while ($baris=mysqli_fetch_array($datakamar)) {
					 		$pilih = ($baris['id_kategori_kamar']==$id_kategori_kamar) ? '$pilih="$pilih"' : '';
					 		echo "<option value='".$baris['id_kategori_kamar']."'$pilih'>".$baris['type_kamar']."</option>";
					 	}

					?>
				</select><br>
				
				<label for="" class="controlposition">Harga Kamar</label>
					<input type="text" name="tarif" value="<?php echo $_GET['tarif'] ?>" class="form-control stylekatekamar" required>

			</div>
			<div class="cntrol-fileupload">
			   <label for='foto-kamar' class="formcntrl-labels">Foto kamar</label>
			   <input type="file" name="foto_kamar" value="" required>
			</div>
			<div class="cntrol-textareas">
				<label for="keterangan" class="controlposition">Keterangan</label>
				<!-- TInyMCE -->
				<script type="text/javascript" src="../library/tinymce/js/tinymce/tinymce.min.js"></script>
			    <script type="text/javascript">
			        tinyMCE.init({
					     mode : "textareas"
					  
					});
			    </script>
			    <textarea name="content"  cols="5" rows="7" required></textarea>
			</div>
               <div class="cntrol-btnkamar">
               		<?php
						if(!$_GET['id_kamar']){

							echo "<input type='submit' value='Save' class='btn-confrimed'>";
							echo "<input type='reset' value='Cancel' class='btn-cancelconf'>";

						}else{

							echo "<input type='submit' value='Edit' class='btn-confrimed'>";
							echo "<input type='button' value='Cancel' onClick='history.go(-1)' class='btn-cancelconf'>";
						}

					 ?>
               </div>
			</div>
		</div><!-- box-stylekamar -->
		</form>
			<?php

				$datakamar = "SELECT * FROM kamar,kategori_kamar WHERE kategori_kamar.id_kategori_kamar=kamar.id_kategori_kamar";
				$tampung   = mysqli_query($konek,$datakamar);

				$no=1;
					while ($data=mysqli_fetch_array($tampung)) {
					
			 ?>

			 	<div>
			 		<table class="tb_style-collapse table-bordered" cellspacing="0" cellpadding="0">
				 		<tbody>
					 		<tr>
					 			<th class="th-collapse" width="50">No</th>
					 			<th class="th-collapse" width="200">Nama Kamar</th>
					 			<th class="th-collapse" width="200">Keterangan</th>
					 			<th class="th-collapse" width="200">Tarif</th>
					 			<th class="th-collapse" width="200">Foto Kamar</th>
					 			<th class="th-collapse" colspan="2" width="150">Aksi</th>
					 		</tr>
					 		<tr>
					 			<td class="td-collapse"><?php echo $no;?></td>
					 			<td class="td-collapse"><?php echo $data['type_kamar']?></td>
					 			<td class="td-collapse"><?php echo $data['fasilitas']?></td>
					 			<td class="td-collapse"><?php echo $data['tarif'];?></td>
					 			<td class="td-collapse"><?php echo $data['foto_kamar']?></td>
					 			<td class="td-collapse">
					 			<a href="homeadmin.php?modul=datakamar&id_kamar=<?php echo $data['id_kamar']?>">
					 			<i class="fa fa-check-square-o">edit</i></a></td>
					 			<td class="td-collapse">
					 			<a href=""><i class="fa fa-times">delete</i></a></td>
					 		</tr>	
					<?php $no++; }  ?>
				 		</tbody>
			 		</table>
			 	</div>
		</div><!-- container-dashboard -->
	<div><!-- wrapper-dashboard -->