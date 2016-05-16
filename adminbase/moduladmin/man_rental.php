
<script type="text/javascript">
	$(document).ready(function(){
		$('.tambah').click(function(){
      $('.tambah-content').slideToggle();

		});

    var validator = $('#addman_rental').submit(function() {


    }).validate({
     /* ignore :"",*/

     /* rules : {
        kate_kendaraan : 'required',
        nama_kendaraan : 'required'
      },
        harga_kendaraan {
                        required : true,
                        number: true 
        },

        foto_kendaraan : 'required',
        ket_kendaraan  : 'required'
      },*/
      messages : {

        kate_kendaraan : {
          required : 'kategori kendaran tidak boleh kosong'
        },
        nama_kendaraan : {
          required : 'nama kendaraan tidak boleh kosong !',
          number : ' tidak valid harus angka !'
        },
        harga_kendaraan : {
          required : 'harga kendaraan tidak boleh kosong !',
          number : 'hanya boleh diisi angka !'
        },  
        foto_kendaraan : {
          required : 'foto kendaran tidak boleh kosong ! '
        }, 
        ket_kendaraan : {
          required : 'keterangan kendaraan tidak boleh kosong !'
        } 
      },

    });

    });

/*  });*/
</script>

<div class="row">
    <div class="col-lg-12">  
      <div class="font-sizerheading">
          <h1 class="page-header">Manajemen Rental</h1>                
      </div>              
    </div>                
    <div class="col-lg-12">
      <button class="btn btn-small btn-success tambah">Tambah Rental</button> 
      <div class="tambah-content" style="display:none;">
        <div class="panel-body" style="width:80%;">
          <form role="form" action="proses.php?act=addman_rental" method="post" id="addman_rental" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group">
                    <select name="kate_kendaraan" class="form-control" autofocus required >
  	                	<option value="">- Pilih Kategori -</option>
  	                	<option>Mobil</option>
  	                	<option>Motor</option>
                    </select>
                </div>
                <div class="form-group">
                	<input type="text" name="nama_kendaraan" class="form-control" placeholder="Nama Kendaraan" autofocus required>
                </div>
                <div class="form-group">
                	<input type="text" name="harga_kendaraan" class="form-control" placeholder="Harga Kendaraan" autofocus required>
                </div>
                <div class="form-group">
                	foto kendaraan : <input type="file" class="form-control" name="foto_kendaraan" autofocus required>
                </div>
                <div class="form-group">
                    <textarea name="ket_kendaraan" placeholder="" cols="20" rows="7"  class="form-control" required></textarea>
                </div>
                <input type="submit" value="Submit" class="btn btn-small btn-success">
            </fieldset>
          </form>
        </div>
      </div>
   		<table class="table">
   			<thead>
   				<tr>
   					<th>No</th>
   					<th>Kategori</th>
   					<th>Nama Kendaraan</th>
   					<th>Harga</th>
   					<th>Foto</th>
   					<th>Keterangan</th>
   					<th>Aksi</th>
   				</tr>
   			</thead>
   			<tbody>
   			<?php
   				$tampildata_rental=mysqli_query($konek,"SELECT * FROM rental");
   				$no=1;
   				while ($data=mysqli_fetch_array($tampildata_rental)) {
   			?>
   				<tr>
   					<td><?php echo $no;?></td>
   					<td><?php echo $data['kate_kendaraan'];?></td>
   					<td><?php echo $data['nama_kendaraan'];?></td>
   					<td><?php echo number_format($data['harga_kendaraan'],0,',','.'); echo  ',-'; ?></td>
   					<td><?php echo $data['foto_kendaraan'];?></td>
   					<td><?php echo $data['ket_kendaraan'];?></td>
   					<td>
   						<a href="<?php echo "homeadmin.php?modul=man_rental_edit&id=$data[id_rental]"?>">Edit</a> |
   						<a href="<?php echo "proses.php?act=hapus_manrental&id=$data[id_rental]";?>">Hapus</a>
   					</td>
   				</tr>
   			<?php $no++; } ?>
   			</tbody>
   		</table>
   	</div>       
</div>                