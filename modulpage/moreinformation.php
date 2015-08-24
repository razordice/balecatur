
<div id="wrapper-content">
    <div class="content-top">
      	<div class="moreinformation-content">
			<div class="content-detailimages">
			<?php 

				$getimage =mysqli_query($konek, "SELECT * FROM kategori_kamar");
				$dataimg =mysqli_fetch_array($getimage);
						
			?>
			<img class='sizeimg-room' src='<?php echo $site; ?>image/kamar/<?php echo $dataimg["foto_kamar"];?>'>				
		
			</div>
      	</div>
    </div>
</div>