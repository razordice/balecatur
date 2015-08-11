<div class="wrapper-dashboard">
	<div class="container-dashboard">
	<div class="">
		<h2 class="font-styeheadingsadmn">Data Member Hotel Balecatur Inn</h2>
	</div>
	<hr class="style-hr">
		<div class="box-containerinner">
		<table cellpadding="0" cellspacing="0" class="tb_style-collapse table-bordered">
			<tr>
				<th class="th-collapse">No</th>
				<th class="th-collapse">Nama</th>
				<th class="th-collapse">email</th>
				<th class="th-collapse">alamat</th>
				<th class="th-collapse">jenis kelamin</th>
				<th class="th-collapse">no telp</th>
				<th class="th-collapse">foto identitas</th>
				<th class="th-collapse">foto</th>
				<th class="th-collapse" colspan="2">Aksi</th>
			</tr>
			<?php 
				$datamember ="SELECT * FROM member";
				$tampung =mysqli_query($konek,$datamember);
				$no=1;

				while ($data=mysqli_fetch_array($tampung)) {
			
			?>
			<tr>
				<td class="td-collapse"><?php echo $no;?></td>
				<td class="td-collapse"><?php echo $data['nama_lengkap'];?></td>
				<td class="td-collapse"><?php echo $data['email'];?></td>
				<td class="td-collapse"><?php echo $data['alamat'];?></td>
				<td class="td-collapse"><?php echo $data['jenis_kelamin'];?></td>
				<td class="td-collapse"><?php echo $data['no_telp'];?></td>
				<td class="td-collapse"><?php echo $data['foto_identitas'];?></td>
				<td class="td-collapse"><?php echo $data['foto'];?></td>
				<td class="td-collapse"><a href=""><i class="fa fa-check-square-o">edit</i></td>
				<td class="td-collapse"><a href=""><i class="fa fa-times">delete</i></td>
			</tr>
		<?php $no++; } ?>
		</table>
		</div>
	</div>
</div>
