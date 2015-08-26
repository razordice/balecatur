
<div id="wrapper-content">
    <div class="content-top">
      	<div class="moreinformation-content">
			<div class="content-detailimages">
			    <div class="heading-breadcumb">
			    	<ul>
			    		<li>Home >> More infromation</li>
			    	</ul>
			    </div>
				<?php 

					$getimage =mysqli_query($konek, "SELECT * FROM kategori_kamar");
					$dataimg  =mysqli_fetch_array($getimage);
							
				?>
				<div>
					<img class='sizedetailimg-room' src='<?php echo $site; ?>image/kamar/<?php echo $dataimg["foto_kamar"];?>'>				
				</div>
				<div class="sidedetail-right">
					<div class="inner-detailcontainer">
						<?php

							$getharga  =mysqli_query($konek,"SELECT tarif, fasilitas FROM kategori_kamar");
							$showprice =mysqli_fetch_array($getharga);

							$tarifnya =$showprice['tarif'];
						?>
						<h2>Mulai Dari</h2>
						<span class="prizer-colored"> 
								Rp.<?php echo number_format("$tarifnya",2,",","."); ?>
						</span>
						<article>
							Deskripsi <?php echo $showprice['fasilitas'];?>
						</article>
						<div class="btn-prizer">
							<input type="submit" value="Pesan Sekarang" class="btnpesan-sekarang">
						</div><!-- btn-prizer -->
					</div><!-- inner-detailcontainer -->
				</div><!-- sidedetail-right -->
			</div><!-- content-detailimages -->
      	</div><!-- moreinformation-content -->
    </div><!-- content-top -->
</div><!-- wrapper-content -->