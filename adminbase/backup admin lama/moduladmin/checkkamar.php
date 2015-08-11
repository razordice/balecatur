	<div class="wrapper-dashboard">
		<div class="container-dashboard">
			<h2 class="font-styeheadingsadmn">Aviability Room / Check Ketersediaan Kamar</h2>
			<hr class="style-hr"></hr>
			<span class="cnt-menukategori">
			<form action="" method="" enctype="multipartformdata">
				<table cellpadding="0" cellspacing="0" class="">
					<label class="post-kate">Kategori Kamar</label>
						<select name="kate_kamar" class="select_megastyle" required>
						<option value="">Pilih Kategori</option>
							<?php 
								$ambildata=mysqli_query($konek,"SELECT * FROM kategori_kamar");
									while ($data=mysqli_fetch_array($ambildata)) {
									$tampilkan =($data['id_kategori_kamar']==$id_kate_kamar)?'tampilkan="tampilkan"':'';
									echo "<option value='".$data['id_kategori_kamar']."'$tampilkan>".$data['type_kamar']."</option>";
										
									}
							?>
						</select>		
						<input type="submit" value="submit" class="btn-confrimed">
						<input type="text" id="datepicker-example7-start" class="post-rightcnt" placeholder="pilih tanggal" required>
						<input type="submit" value="submit" class="btn-confrimedright">
				</table>	
			</form>
			</span>
			<div class="wrapinner-table-room">
			<!-- 	<h3 class="fnt-theadingroom">Superior Room</h3> -->
					<span class="inner-roomblock1">
						<p class="heading-noroom1">1</p>
					</span>
					<span class="inner-roomblock2">
						<p class="heading-noroom2">2</p>
					</span>
					<span class="inner-roomblock3">
						<p class="heading-noroom3">3</p>
					</span>
					<span class="inner-roomblock4">
						<p class="heading-noroom4">4</p>
					</span>
				<!-- <h3 class="fnt-theadingroom">Deluxe Room</h3> -->
					<span class="inner-roomblock5">
						<p class="heading-noroom1">5</p>
					</span>
					<span class="inner-roomblock6">
						<p class="heading-noroom2">6</p>
					</span>
					<span class="inner-roomblock3">
						<p class="heading-noroom3">7</p>
					</span>
					<span class="inner-roomblock4">
						<p class="heading-noroom4">8</p>
					</span>
				<!-- <h3 class="fnt-theadingroom">Deluxe Family Room</h3> -->
					<span class="inner-roomblock5">
						<p class="heading-noroom4">9</p>
					</span>
					<span class="inner-roomblock2">
						<p class="heading-noroom4">10</p>
					</span>
					<span class="inner-roomblock3">
						<p class="heading-noroom4">11</p>
					</span>
					<span class="inner-roomblock1">
						<p class="heading-noroom1">12</p>
					</span>
				<div class="clearfix-cont-room"></div>
			</div><!-- inner-table-room -->
			<div class="container-status-kmr">
				<div class="box-statroom">
				<h2 class="font-styeheadingsadmn">Status Kamar</h2>
					<span class="icon-statred"><p class="hedings-statkamar">Terisi</p></span>
					<span class="icon-statyellow"><p class="hedings-statkamar">Dipesan</p></span>
					<span class="icon-statgreen"><p class="hedings-statkamar">Tersedia</p></span>
				</div><!--box-statroom -->
			</div><!-- container-status-kmr -->
		</div><!-- container-dashboard -->
	</div><!-- wrapper-dashboard -->