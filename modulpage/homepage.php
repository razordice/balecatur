<?php session_start();

	include "config/koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
<body>
<div id="wrapper-header">
    <div class="slider-container">
    	<div class="flexslider">
            <ul class="slides">
                  <li><img src="<?php echo $site;?>image/imageslider/Gb2.jpg"/></li>
                  <li><img src="<?php echo $site;?>image/imageslider/Gb2.jpg"/></li>
                  <li><img src="<?php echo $site;?>image/imageslider/Gb2.jpg"/></li>
                  <li><img src="<?php echo $site;?>image/imageslider/Gb2.jpg"/></li>
            </ul>
        </div><!-- flexslider -->
  	</div><!-- slider-container -->
</div><!-- wrapper-header -->

<div id="wrapper-content">
  	<div class="content-top">
    	<div class="reserve-content">

     	<form action="" method="post" enctype="multipart/form-data" id="">
        <input type="text" name="check-in" id="datepicker-example7-start" class="reserve-menuleft" placeholder="Check In" required=""> 
        <input type="text" name="check-out" id="datepicker-example7-end" class="reserve-menuright" placeholder="Check Out" required="">
          	<select name='room-type' class='mega-menuselect' required="">
		            <?php

		            	echo "<option value='$datakamar'>Room Type</option>";
		                $datakamar   =mysqli_query($konek,"SELECT * FROM kategori_kamar ORDER BY id_kategori_kamar ASC");
		                while ($data =mysqli_fetch_array($datakamar)) {
		                	
		                $tampil= ($data['id_kategori_kamar']==$id_kate_kamar)?'tampil="tampil"' :'';
		                echo "<option value='".$data['id_kategori_kamar']."' $tampil>".$data['type_kamar']."</option>";
		              }

		            ?>
            </select>

           <select name='room-type' class='mega-menuselect' required="">
           		<option value="">  Adults </option>
                    <?php
                        for ($i=1; $i<=5; $i++) { 
                            $adl = ($i<5) ? "$i" : $i;
                            $select = ($adl==$adults) ? "selected" : "";
                            echo "<option value='adl' $select>$adl</option>";

                        }
                    ?>
            </select>
                       
            <select name='room-type' class='mega-menuselect' required="">
            	<option value="">  Parent </option>
                       <?php
                            for ($i=1; $i<=6; $i++) { 
                                $prnt = ($i<10) ? "$i" : $i;
                                $select = ($prnt==$parent) ? "selected" : "";
                                echo "<option value='prnt' $select>$prnt</option>";

                            }
                       ?>

                    <input type="submit" class="btn-aviabiltiy" value="Check Aviability">
            </select>
        </form>

        </div><!--reserve-content-->
    </div><!--content top-->
</div><!-- wrapper-content -->

<div class="wrapper-outerhotel">
	<div class="postion-judul"></div>
		<div class="content-hotel">
			<div class="pstion-features-package">
				<h1 class="styling-fontfeatures">Features Package<h1>		
				<hr class="line-featurespackage">
			</div>
			<div class="container-item">
				<!-- <div class="position-box"> -->
				<?php 

					$getimage =mysqli_query($konek, "SELECT * FROM kategori_kamar");
					while ($dataimg =mysqli_fetch_array($getimage)) {
						
				?>
				<div class="itemkamar-hotelsideleft">
					<img class='sizeimg-room' src='<?php echo $site; ?>image/kamar/<?php echo $dataimg["foto_kamar"];?>'>
					<span class="content_deskripsi-kamarstandart">
						<h2 class="font-deskripsi"> <?php echo $dataimg['type_kamar']; ?></h2>
						<article class="article-decript">
							Kenyamanan extra dengan konsep elegant serta fasilitas yang ditawarkan yang memadai cocok 
							bagi anda yang menginap dengan nuansa yang klasik dengan alam.
						</article>
						<a href="<?php echo $site;?>moreinformation" class="btn-moreinformation" value="More Information">more information</a>
					</span>
				</div><!-- itemkamar-hotel-->
				
				<?php } ?>	
			</div><!-- container-item-->
		</div><!-- content-hotel -->
	</div><!-- wrapper-outerhotel -->
<div class="clear-fixcont"></div>
</body>
</html>