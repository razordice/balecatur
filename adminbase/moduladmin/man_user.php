<div class="row">
    <div class="col-lg-12">                
        <h1 class="page-header">Manajemen User</h1>                
    </div>                
         	<div class="col-lg-12">
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

   					$query = mysql_query("select * from member where level != 'admin' order by id_member");

					while ($result = mysql_fetch_array($query)) { ?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $result['nama_lengkap'];?></td>
						<td><?php echo $result['level'];?></td>
						<td><?php echo $result['blokir'];?></td>
						<td>
							<a href="<?php echo "adminpanel.php?page=man_user_edit&id=$result[id_member]"?>">
								<i class="fa fa-edit"></i> Edit
							</a> | 
							<a href="<?php echo "proses.php?act=hapusUser&id=$result[id_member]";?>" onclick="return confirm('Delete?');">
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