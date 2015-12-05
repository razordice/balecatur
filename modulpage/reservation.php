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

<script type="text/javascript">
	$(document).ready(function() {
		$('.contain-menulayanan').click(function(){
			$(".menutambahan").slideToggle();
		});
	});
</script>
</head>

<div class="cnt-reserve">
	<div class="post-rulefontreserve">
		<h1 class="fnt-style">FORM RESERVATION HOTEL BALECATUR INN</h1>
		<hr width="389"></hr>
		<div class="heading-breadcumb">
			<ul>
				<li>Home >> Reservation</li>
			</ul>
		</div>
		<form action="<?php echo $site;?>modulpage/proses/reservation_proses.php?act=booking" method="post" enctype="multipartformdata">
			<div class="box-reserveclient">
				<input type="radio" name="reserve-personal" checked><span class="deskrip-reserveleft">Reservation Personal</span>
				<input type="radio" name="reserve-personal" value=""><span class="deskrip-reserveright">Reservation Atasnama PT / CV (Instansi)</span>
			</div>
			<fieldset>
				
			<div class="box-grup">
				<div form-grupingbox>
					<input type="hidden" name="id_member" value="<?php echo $_SESSION['id_member'];?>" class="form-box box-input cursorkodebook" readonly required="">	
				</div>
				<div form-grupingbox>
					<label>Kode booking</label>
					<input type="text" name="kd_booking" value="<?php echo acakangkahuruf(6); ?>" class="form-box box-input cursorkodebook" readonly required=""></td>
				</div>
				<div form-grupingbox>
					<label>Nama Pemesan</label>
					<input type="text" name="nama_lengkap" value="<?php echo $_SESSION['nama_lengkap'];?>" class="form-box box-input cursorkodebook" readonly required="">
				</div>
				<div>
				<?php 

					$get_datauser ="SELECT * FROM member WHERE id_member='$_SESSION[id_member]'";
					$save_identity = mysqli_query($konek, $get_datauser);
					while ($data = mysqli_fetch_array($save_identity)) {
				?>
					<label>Identitas KTP / SIM</label>
					<input type="text" name="identitas" value="" class="form-box box-input" readonly>	
					<!-- <input type="file" value="browse" class="flash-boxpic" name="foto-ktp" required=""> -->

				<?php } ?>

				</div>
				<div form-grupingbox>
					<label>Check In</label>
					<input type="text" name="checkin" class="form-box box-input cursorbox"  required=""></td>
				</div>
				<div form-grupingbox>
					<label>Check Out</label>
					<input type="text" name="checkout" class="form-box box-input cursorbox"  required=""></td>
				</div>
				<div form-grupingbox>
					<label>Pilih kamar</label>
					<select name="id_kategori_kamar" class="form-select box-input " required="">
						<option value="">- pilih kamar-</option>
							<?php 
								$ambildata=mysqli_query($konek,"SELECT * FROM kategori_kamar");
								while ($data=mysqli_fetch_array($ambildata)) {
								$tampil=($data['id_kategori_kamar']==$id_kate_kamar)?'tampil="tampil"' :'';
									echo "<option value='".$data['id_kategori_kamar']."' $tampil>".$data['type_kamar']."</option>";
								}
							?>
					</select>
				</div>
				<div>
					<label>Adults</label>
					<select name="adults" class="form-select box-input" required="">
						<option value="">- adults -</option>
							<?php

								for ($i=1; $i<=5; $i++) { 
									$adl = ($i<5) ? "$i" : $i;
									$select = ($adl==$adults)? "selected" : "";
									echo "<option value='$adl' $select>$adl</option>";
								}
							?>
						</select>
				</div>
				<div>
					<label>Parents</label>
					<select name="parents" class="form-select box-input" required="">
						<option value="">- parents -</option>
							<?php

								for ($i=1; $i<=5; $i++) { 
									$parnt = ($i<5) ? "$i" : $i;
									$select = ($parnt==$parents)? "selected" : "";
									echo "<option value='$parnt' $select>$parnt</option>";
								}
			 				?>
						</select>
				</div>
			</div>

			<h3 class="style-menutmbhn">Layanan Tambahan</h3><span class="icon-imgmenu"></span>
			<div class="container-menutmbhn">
				<div class="functionclick">
					<div class="contain-menulayanan">
						<a class="notifclick">Klik disini</a>
						<div>
							<img src="<?php echo "$site";?>image/icon/logoplus.png" class="icon-pluslayanan">

							<div class="menutambahan"style="display:none;">

									<input type="checkbox" name="laundry" value="laundry">
								<label for="laundry">laundry</label>
									<input type="checkbox" name="laundry" value="laundry">
								<label for="laundry">sewa mobil</label>
									<input type="checkbox" name="laundry" value="laundry">
								<label for="laundry">sewa motor</label>
							</div><!-- menutambahan -->	
							
						</div>
					</div><!-- contain-menulayanan -->
				</div><!-- functionclick -->
			</div><!-- container-menutmbhn -->
					
			</fieldset>
			<input type="submit" class="btn btn-reserve" value="Pesan Sekarang">
		</form>
	</div><!-- post-rulefont -->
</div><!-- cnt-reserve -->

