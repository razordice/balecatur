<?php
	function tgl_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}	

	function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
			} 
?>
<div class="row">
    <div class="col-lg-12">                
        <h1 class="page-header">Manajemen Transaksi</h1>                
    </div>                
   	<div class="col-lg-12">
   		<table class="table">
   			<thead>
   				<tr>
   					<th>No.</th>
   					<th>ID Order</th>
   					<th>Nama Member</th>
   					<th>Status Order</th>
   					<th>Tgl & Jam Order</th>
   					<th>Action</th>
   				</tr>
   			</thead>
   			<tbody>
   				<?php 
    			$no=1;

   					$query = mysql_query("select * FROM `order` natural join member ORDER BY id_order DESC");

					while ($result = mysql_fetch_array($query)) { ?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $result['id_order'];?></td>
						<td><?php echo $result['nama_lengkap'];?></td>
						<td><?php if ($result['status_order'] == 0) {echo "Baru";} elseif ($result['status_order'] == 1) {echo "Lunas";} else {echo"Dikirim";}?></td>
						<td><?php echo tgl_indo($result['tgl_order']).", ".$result['jam_order'];?></td>
						<td>
							<a href="<?php echo "adminpanel.php?page=man_transaksi_detail&id=$result[id_order]"?>">
								<i class="fa fa-edit"></i> Detail
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