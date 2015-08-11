<script type='text/javascript'>
	function validateform() {
		var jumlah_kamar = document.forms['validatethis']['jumlah_kamar'].value;
		var type_kamar = document.forms['validatethis']['type_kamar'].value;
		var foto_kamar = document.forms['validatethis']['foto_kamar'].value;
		var tarif = document.forms['validatethis']['tarif'].value;
		var fasilitas = document.forms['validatethis']['fasilitas'].value;
		if (type_kamar == null || type_kamar == ''){
			alert('Type Kamar harus disii !!');
			return false;
		}
		if (jumlah_kamar == null || jumlah_kamar == ''){
			alert('Jumlah Kamar harus disii !!');
			return false;
		}
		if (foto_kamar == null || foto_kamar == ''){
			alert('Foto Kamar harus disii !!');
			return false;
		}
		if (fasilitas == null || fasilitas == ''){
			alert('Fasilitas Kamar harus disii !!');
			return false;
		}
		if (tarif == null || tarif == ''){
			alert('Tarif Kamar harus diisi !!');
			return false;
		}
	}
	tinymce.init({
	    selector: "textarea",
	    plugins: [
	        "advlist autolink lists link charmap print preview anchor",
	        "searchreplace visualblocks code fullscreen",
	        "insertdatetime table contextmenu paste"
	    ],
	    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent"
	});
</script>
<div class="wrapper-dashboard">
	<div class="container-dashboard">
	<?php 
        if (isset($_GET['id_kategori_kamar'])) {
             $output    = $_GET['id_kategori_kamar']; 
             $link      = "proses/proses_kategorikamar.php?act=edit";
        } else {
             $output    = ""; 
             $link      = $site."adminbase/proses/proses_kategorikamar.php?act=tambah";
        }

	?>
		<h2 class="font-styeheadingsadmn">Data Kategori Kamar</h2>
		<hr class="style-hr"></hr>
		<form action="<?php echo $link;?>" method="post" encytpe="multipart/form-data" >
			<span class="positiontabble">
       		 	<?php 
       		 		 $tampilkan =mysqli_fetch_array(mysqli_query($konek,"SELECT * FROM kategori_kamar WHERE id_kategori_kamar='$output'"));
       		 	?>
				<div class="wrap-tipekamar">
					<span style="display:none;">
						 <label for='type_kamar'>id_kategori_kamar</label>
						 <input type="text" name="id_kategori_kamar" value="<?php echo $_GET['id_kategori_kamar']; ?>" class="form-control stylekatekamar">
					</span>
					<span>
						<label for='type_kamar'>Tipe Kamar</label>
						<input type='text' name='type_kamar' value='<?php echo $tampilkan['type_kamar']; ?>' class='form-control stylekatekamar' >							
					</span>
					<span>
						<label for="jumlah_kamar">Jumlah Kamar</label>
						<input type="text" name="jumlah_kamar" value="<?php echo $tampilkan['jumlah_kamar']; ?>" class="form-control stylekatekamar" >
					</span>
					<span>
						<label for='foto'>Foto kamar</label>
			  			<input type="file" name="foto" class="">
					</span>
				</div>
				<span>
					<label for="keterangan">Fasilitas Kamar</label>
		    		<textarea name="fasilitas"  cols="20" rows="7"  class="form-control stylekatekamar" ></textarea>
				</span>	
				<div class="wrap-tipekamar">
					<span>
						<label for="harga-kamar" >Harga Kamar</label>
						<input type="text" name="tarif" value="<?php echo $tampilkan['tarif'] ?>" class="form-control stylekatekamar">
					</span>	
				</div>
				<div class="postion-btnact">
					<?php
						if(isset($_GET['id_kategori_kamar'])){
							echo "<input type='submit' value='Edit' class='btn-confrimed'>";
							echo "<input type='button' value='Cancel' onClick='history.go(-1)' class='btn-cancelconf'>";
						}else{
							echo "<input type='submit' value='Save' class='btn-confrimed'>";
							echo "<input type='reset' value='Cancel' class='btn-cancelconf'>";
						}

					 ?>
				</div>					
		</form>
					
			<table class="tb_style-collapse table-bordered" cellpadding="0" cellspacing="0" border="0"> 
				<tr>
					<th class="th-collapse" width="30">No</th>
					<th class="th-collapse" width="500">Tipe Kamar</th>
					<th class="th-collapse" width="500">Jumlah Kamar</th>
					<th class="th-collapse" colspan="2">Aksi</th>	
				</tr>
				<?php 

					$ambildata = "SELECT * FROM kategori_kamar";
					$tampung   = mysqli_query($konek,$ambildata);

					$no=1;

					while($data=mysqli_fetch_array($tampung)) {
				?>
				<tr>
					<td class="td-collapse"><?php echo $no; ?></td>
					<td class="td-collapse"><?php echo $data['type_kamar'] ?></td>
					<td class="td-collapse"><?php echo $data['jumlah_kamar']; ?></td>
					<td class="td-collapse">
					<a href="homeadmin.php?modul=kategorikamar&id_kategori_kamar=<?php echo $data['id_kategori_kamar'];?>">
					<i class="fa fa-check-square-o"><span style="margin-left:5px;">edit</span></i></td>
					<td class="td-collapse">
					<a href="<?php echo $site;?>adminbase/proses/hapus-kategorikamar.php?id_kategori_kamar=<?php echo $data['id_kategori_kamar']; ?>"
					onclick="return confirm('Anda yakin menghapus data ini !!')"><i class="fa fa-times"><span style="margin-left:5px;">delete</span></i></td>
					
				</tr>
			<?php $no++; } ?>
			</table>
		<div class="clear-clearcntainer"></div>
	</div><!-- container-dashboard -->
</div><!-- wrapper-dashboard -->
