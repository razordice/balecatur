<?php 

	include "config/koneksi.php";

?>
<!-- style sheet css -->
<style type="text/css">

	*{
		box-sizing:border-box;
	}

	.table{
			width: 100%;
			/*background: hsla(0, 0%, 0%, 0);*/
			border-collapse: collapse;
			font-size: 12px;
			border-spacing: 0;
	}

	tbody{
			display:  table-row-group;
			vertical-align: middle;
			border-color: inherit;
	}

	.table > thead > tr > th {
			border: 1px solid #000;
			background:hsl(24, 79%, 50%);
			color: #fff;
			padding: 1% 1% 1% 2%;
	}
	.table > tbody > tr > td {
			border: 1px solid #000;
			border:1px solid #000;
			padding: 1% 1% 1% 2%;
	}
	.heading-oldtable{
			margin-top: 20px;
	}
	.color-reservationheading{
			color: hsl(352, 100%, 50%);
	}
</style>


<div class="cnt-reserve">
	<div class="post-rulefontreserve">
		<h1 class="fnt-style">FORM MY ORDER HOTEL BALECATUR INN</h1>
		<hr width="389"></hr>
		<div class="heading-breadcumb">
			<ul>
				<li>Home >> My order</li>
			</ul>
		</div>
		<?php  
			$getstat_reserve = "SELECT * FROM booking WHERE id_member='$_SESSION[id_member]'";
			$savedquery =mysqli_query($konek,$getstat_reserve);
			$data = mysqli_fetch_array($savedquery);

					if ($data['stat_reservation']=='person') {
						$status_booking="Reservasi Personal";
					}elseif($data['status']=='atas_nama') {
						$status_booking ="Reservation Atasnama PT / CV (Instansi)";
					}	
		?>
		<div class="color-reservationheading"><h6>Status Reservation : <?php echo $status_booking; ?></h6>
	
		</div>
	<form action="<?php echo $site;?>modulpage/proses/reservation-proses.php" method="post" enctype="multipartformdata">
	<div class="heading-oldtable">
		<table class="table">
			<thead>
				<tr>
					<th width="50">No</th>
					<th class="">Kode Booking</th>
					<th class="">Nama Pemesan</th>
					<th class="">Tipe Kamar</th>
					<th class="">Check In</th>
					<th class="">Check Out</th>
					<th class="">Status</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php

				$getdata_booking = "SELECT * FROM booking b JOIN member m ON b.id_member=m.id_member
															JOIN kategori_kamar k ON b.id_kategori_kamar=k.id_kategori_kamar";
				$saved = mysqli_query($konek, $getdata_booking);

				$no=1;
				while ($data=mysqli_fetch_array($saved)) {

					if ($data['status']=='0') {
						$status_booking="belum melakukan pembayaran";
					}elseif ($data['status']=='1') {
						$status_booking ="belum melakukan pembayaran";
					}
			 ?>
				<tr>
					<td width="40"><?php echo $no;?></td>
					<td class=""><?php echo $data['kd_booking'];?></td>
					<td class=""><?php echo $data['nama_lengkap'];?></td>
					<td class=""><?php echo $data['type_kamar'];?></td>
					<td class=""><?php echo $data['checkin'];?></td>
					<td class=""><?php echo $data['checkout'];?></td>
					<td class=""><?php echo $status_booking;?></td>
					<td colspan="2"><a href="<?php  ?>"></a></td>
		
				</tr>
				<?php $no++; } ?>
			</tbody>
		</table>		
	</form>
	</div>
	<div style="margin-bottom:18%;"></div>
	</div>
</div>