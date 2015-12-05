<div class="row">
	<script type="text/javascript">
		$(document).ready(function() {
			$('.tambah').click(function() {
				$('.tambah-content').slideToggle();
			});
      $("#add-produk").validate({ 
          rules: {
              kategori: {
                  selectcheck: true
              }
          },
          messages: {
              nama: "Kolom nomor kamar  tidak boleh kosong!"
          }
      });
      $.validator.addMethod('selectcheck', function (value) {
        return (value != '0');
    }, "Kolom pilih kategori kamar harus dipilih!");
		});
	</script>
    <div class="col-lg-12">
      <div class="font-sizerheading">
        <h1 class="page-header">Manajemen Kamar</h1>                
      </div>                
    </div>                
    <div class="col-lg-12">
    	<button class="btn btn-small btn-success tambah">Tambah Kamar</button> 
    	<div class="tambah-content" style="display:none;">
            <div class="panel-body" style="width:30%;">

    		 <form role="form" action="proses.php?act=addKamar" method="post" enctype="multipart/form-data" id="add-produk">
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="Nomor Kamar" name="no_kamar" type="text" autofocus required>
                    </div>
                    <div class="form-group">
                    	<select name="kategori" class="form-control" required>
            				<option value=0>Pilih Type Kamar</option>";

                    		<?php 
                    			$tampil=mysqli_query($konek,"SELECT * FROM kategori_kamar ORDER BY type_kamar");
					            while($r=mysqli_fetch_array($tampil)){
					              echo "<option value=$r[id_kategori_kamar]>$r[type_kamar]</option>";
					            } 
				            ?>
                    	</select>
                    </div>
                    <!-- Change this to a button or input when using this as a form -->
                    <input type="submit" value="Submit" class="btn btn-small btn-success">
                </fieldset>
            </form>
    		</div>
    	</div>
    	<table class="table">
   			<thead>
   				<tr>
   					<th>No.</th>
   					<th>No Kamar</th>
   					<th>Kategori Kamar</th>
   					<th>Action</th>
   				</tr>
   			</thead>
   			<tbody>
   				<?php 
    			$no=1;

   					$query = mysqli_query($konek,"select * from kamar,kategori_kamar where kamar.id_kategori_kamar=kategori_kamar.id_kategori_kamar order by kategori_kamar.type_kamar");

					while ($result = mysqli_fetch_array($query)) { ?>
					<tr>
            <td><?php echo $no;?></td>
						<td><?php echo $result['no_kamar'];?></td>
						<td><?php echo $result['type_kamar'];?></td>
						<td>
							<a href="<?php echo "homeadmin.php?modul=man_datakamar_edit&id=$result[id_kamar]"?>">
								<i class="fa fa-edit"></i> Edit
							</a> | 
							<a href="<?php echo "proses.php?act=hapusKamar&id=$result[id_kamar]";?>" onclick="return confirm('Delete?');">
								<i class="fa fa-close"></i> Delete
							</a> 
						</td>
					</tr>
				<?php
					$no++;
					}
   				?>
   			</tbody>
   		</table>
    </div>                
</div>                