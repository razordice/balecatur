<?php session_start();

	include  "config/koneksi.php";

	function acakangkahuruf($panjang) {
	    $karakter = '12345678910ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $string = '';
	    for ($i = 0; $i < $panjang; $i++) {
	        $pos = rand(0, strlen($karakter) - 1);
	        $string .= $karakter{$pos};
	    }
	    return $string;
	}
	
?>
<!DOCTYPE>
<html lang="en">
<head>

<script type="text/javascript">
	$(document).ready(function() {
			$(".menutambahan").hide();

		$(".functionclick").click(function() {
			$(".menutambahan").toggle(500); 

		});
	});
</script>

</head>
<?php

/*$aksi   = "modulpage/reservation-proses.php";
$action = isset($_GET['action']) ? $_GET['action'] : null; 
*/


?>
<meta charset="utf-8">
<body>
	<div class="cnt-reserve">
		<div class="post-rulefontreserve">
			<h1 class="fnt-style">FORM RESERVATION HOTEL BALECATUR INN</h1>
			<hr width="389"></hr>
			<form action="<?php echo $site;?>modulpage/proses/reservation-proses.php" method="post" enctype="multipartformdata">
				<table class="tb-reserve" wireservedth="800" cellpading="5" cellspacing="0">
					<tr>
						<td width="200">Kode booking</td>
						<td class="fnts-stlye">
							<input type="text" name="kd_booking" value="<?php echo acakangkahuruf(6); ?>" class="form-box box-input" required=""></td>
					</tr>
					<tr>
						<td class="">Check In</td>
						<td class="">
							<input type="text" name="checkin" class="form-box box-input" id="datepicker-example7-start" required=""></td>

					</tr>
					<tr>
						<td class="">Check Out</td>
						<td class="">
							<input type="text" name="checkout" class="form-box box-input" id="datepicker-example7-end" required=""></td>
							
					</tr>
					<tr>
						<td class="">Tipe Kamar</td>
						<td class="">
							<select name="id_kategori_kamar" class="form-select mega-selected" required="">
								<option value="">- pilih -</option>
									<?php 
										$ambildata=mysqli_query($konek,"SELECT * FROM kategori_kamar");
										while ($data=mysqli_fetch_array($ambildata)) {
										$tampil=($data['id_kategori_kamar']==$id_kate_kamar)?'tampil="tampil"' :'';
											echo "<option value='".$data['id_kategori_kamar']."' $tampil>".$data['type_kamar']."</option>";
										}
									?>
							</select>
						</td>
					</tr>
					<tr>
						<td class="">Adults</td>
						<td class="">	
							<select name="adults" class="form-select mega-selected" required="">
							<option value="">- adults -</option>
								<?php

									for ($i=1; $i<=5; $i++) { 
										$adl = ($i<5) ? "$i" : $i;
										$select = ($adl==$adults)? "selected" : "";
										echo "<option value='$adl' $select>$adl</option>";
									}
								?>
							</select>
					</tr>
					<tr>
						<td class="">Parents</td>
						<td class="">
							<select name="parents" class="form-select mega-selected" required="">
							<option value="">- parents -</option>
								<?php

									for ($i=1; $i<=5; $i++) { 
										$parnt = ($i<5) ? "$i" : $i;
										$select = ($parnt==$parents)? "selected" : "";
										echo "<option value='$parnt' $select>$parnt</option>";
									}
				 				?>
							</select>
					</tr>
					<tr>
						<td class="">Foto KTP</td>
						<td class="">
							<!-- <div class="style-filebox"> -->
							<!-- 	<span>Upload</span> -->
								<input type="file" value="browse" class="flash-boxpic" name="foto-ktp" required="">
						<!-- 	</div> -->
						</td>
					</tr>
					<tr>
				</table>
				<h3 class="style-menutmbhn">Layanan Tambahan</h3><span class="icon-imgmenu"></span>
				<div class="container-menutmbhn">
					<div class="functionclick">
						<div class="contain-menulayanan">
							<a class="notifclick">Klik disini</a>
							<table>
								<img src="<?php echo "$site";?>image/icon/logoplus.png" class="icon-pluslayanan">
								<span class="menutambahan">
										<input type="checkbox" name="laundry" value="laundry">
									<label for="laundry">laundry</label>
										<input type="checkbox" name="laundry" value="laundry">
									<label for="laundry">sewa mobil</label>
										<input type="checkbox" name="laundry" value="laundry">
									<label for="laundry">sewa motor</label>
								</span><!-- menutambahan -->	
							</table>
						</div><!-- contain-menulayanan -->
					</div><!-- functionclick -->
				</div><!-- container-menutmbhn -->
						
				<input type="submit" class="btn btn-reserve" value="Pesan Sekarang">
			</form>
		</div><!-- post-rulefont -->
	</div><!-- cnt-reserve -->
</body>


