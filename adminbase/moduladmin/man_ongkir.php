<div class="row">
    <div class="col-lg-12">                
        <h1 class="page-header">Manajemen Ongkir</h1>                
    </div>                
  	<div class="col-lg-12">
   		<table class="table">
   			<thead>
   				<tr>
   					<th>No.</th>
   					<th>Nama Propinsi</th>
   					<th>Ongkos</th>
   					<th>Action</th>
   				</tr>
   			</thead>
   			<tbody>
   				<?php 
    			$no=1;

   					$query = mysql_query("select o.id_ongkir, o.id_propinsi, l.lokasi_nama, o.ongkos from ongkir o 
   						              join inf_lokasi l on o.id_kota = l.lokasi_ID order by o.id_kota");

					while ($result = mysql_fetch_array($query)) { ?>
					<tr>
						<td><?php echo $no;?></td>
            <td><?php echo $result['lokasi_nama'];?></td>
						<td>Rp <?php echo number_format($result['ongkos'],0,',','.');?>,-</td>
						<td>
							<a href="<?php echo "adminpanel.php?page=man_ongkir_edit&id=$result[id_ongkir]"?>">
								<i class="fa fa-edit"></i> Edit
							</a> | 
							<a href="<?php echo "proses.php?act=hapusOngkir&id=$result[id_ongkir]";?>" onclick="return confirm('Delete?');">
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