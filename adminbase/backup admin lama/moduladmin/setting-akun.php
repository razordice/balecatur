<div class="wrapper-dashboard">
	<div class="container-dashboard">
	<h2 class="font-styeheadingsadmn">Hak Akses</h2>
	<hr class="style-hr"></hr>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="inner-boxhakakses">
			<div class="box-hakakses">
				<label for="username">Username</label>
				<input type="text" name="username" class="style-textinput" value="" required>
			</div>
			<div>
				<label for="password">Password</label>
				<input type="password" name="password" class="style-textinput" value="" required>
			</div>
			<div class="">
				<input type="submit" class="btn-confrimed" value="Submit">

			</div>
		</div><!-- inner-boxhakakses -->
	</form>
<div>
	<table class="tb_style-collapse table-bordered" cellpadding="0" cellspacing="0">
		<thead></thead>
			<tbody>
				<tr>
					<th class="th-collapse">No</th>
					<th class="th-collapse">Username</th>
					<th class="th-collapse">Password</th>
					<th class="th-collapse">Level</th>
				</tr>
				<?php 
					$query   ="SELECT * FROM admin";
					$tampung =mysqli_query($konek,$query);

					$no=1;	
					while ($data=mysqli_fetch_array($tampung)) {
					
				?>
				<tr>
					<td class="td-collapse"><?php echo $no; ?></td>
					<td class="td-collapse"><?php echo $data['username']; ?></td>
					<td class="td-collapse"><?php echo $data['password']; ?></td>
					<td class="td-collapse"><?php echo $data['level']; ?></td>
				<?php $no++; }?>
				</tr>

			</tbody>
	</table>
	</div>
</div>
</div>