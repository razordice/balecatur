<div class="row">
    <div class="col-lg-12">                
        <h1 class="page-header">Manajemen Member</h1>                
    </div>                
   	<div class="col-lg-12">
   		<table class="table">
   			<thead>
   				<tr>
   					<th>No.</th>
   					<th>Nama Member</th>
   					<th>Email</th>
            <th>No Tlp</th>
   					<th>KTP/SIM/Passport</th>
   					<th>Action</th>
   				</tr>
   			</thead>
   			<tbody>
   				<?php 
    			$no=1;

   					$query = mysqli_query($konek,"select * from member order by nama_lengkap");

					while ($result = mysqli_fetch_array($query)) { ?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $result['nama_lengkap'];?></td>
						<td><?php echo $result['email'];?></td>
            <td><?php echo $result['no_telp'];?></td>
						<td>
              <a href="<?php echo $site; ?>image/identitas/<?php echo $result['foto_identitas']; ?>" data-lightbox="<?php echo $result['id_member']?>">
                <i class="glyphicon glyphicon-picture"></i>
              </a>
            </td>
						<td>
							<a href="<?php echo "homeadmin.php?modul=man_member_edit&id=$result[id_member]"?>">
								<i class="glyphicon glyphicon-eye-open"></i> Detail
							</a> | 
							<a href="<?php echo "proses.php?act=hapusMember&id=$result[id_member]";?>" onclick="return confirm('Delete?');">
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