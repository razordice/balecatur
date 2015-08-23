<script type="text/javascript">
    $(document).ready(function() {
      $('.tambah').click(function() {
        $('.tambah-content').slideToggle();
      });

      $("#add-user").validate({ 
          rules: {
              user: {
                  selectcheck: true
              }
          },
          messages: {
              username: "Kolom username tidak boleh kosong!",
              password: "Kolom password tidak boleh kosong!"
          }
      });
      $.validator.addMethod('selectcheck', function (value) {
        return (value != '0');
      }, "Kolom pilih user harus dipilih!");
    });
</script>
<div class="row">
    <div class="col-lg-12">                
        <h1 class="page-header">Manajemen User</h1>                
    </div>                
   	<div class="col-lg-12">
      <button class="btn btn-small btn-success tambah">Tambah User</button> 
      <div class="tambah-content" style="display:none;">
        <div class="panel-body" style="width:40%;">
         <form role="form" action="proses.php?act=addUser" method="post" id="add-user" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" type="password" autofocus required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="user" required>
                          <option value="0">Pilih User</option>
                          <option value="1">Admin Sistem</option>
                          <option value="2">Admin Restoran</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Blokir User : </label>
                        <label class="radio-inline">
                          <input type="radio" name="blokir" value="Y"> Ya
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="blokir" value="N" checked > Tidak
                        </label>
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
   					<th>Nama User</th>
   					<th>Level</th>
   					<th>Blokir</th>
   					<th>Action</th>
   				</tr>
   			</thead>
   			<tbody>
   				<?php 
    			$no=1;

   					$query = mysqli_query($konek,"select * from admin where level != '0' order by id_admin");

					while ($result = mysqli_fetch_array($query)) { ?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $result['username'];?></td>
            <?php 
              if($result['level']==1){
                $user = "Admin Sistem";
              } else if($result['level']==2) {
                $user = "Admin Restoran";
              }
            ?>
						<td><?php echo $user;?></td>
						<td><?php echo $result['status'];?></td>
						<td>
							<a href="<?php echo "homeadmin.php?modul=man_user_edit&id=$result[id_admin]"?>">
								<i class="fa fa-edit"></i> Edit
							</a> | 
							<a href="<?php echo "proses.php?act=hapusUser&id=$result[id_admin]";?>" onclick="return confirm('Delete?');">
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