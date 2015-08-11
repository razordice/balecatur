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
          		<!-- <option value=""></option> -->
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
                                echo "<option value='adl' $select>$prnt</option>";

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
				<div class="itemkamar-hotelsideleft">
					<img class="sizeimg-room" src="<?php echo $site;?>image/kamar/standart-room.jpg">
					<span class="content_deskripsi-kamarstandart">
						<h2 class="font-deskripsi">Superior Room</h2>
						<article class="article-decript">
							Kenyamanan extra dengan konsep elegant serta fasilitas yang ditawarkan yang memadai cocok 
							bagi anda yang menginap dengan nuansa yang klasik dengan alam.
						</article>
						<a href="?modul=detail-roomstandart/">
						<input type="submit" class="btn-moreinformation" value="More Information"></a>
					</span>
				</div><!-- itemkamar-hotel-->
		
				<div class="itemkamar-hotel-aside-center">
					<img class="sizeimg-room" src="<?php echo $site;?>image/kamar/standart-room.jpg">
					<span class="content_deskripsi-kamardeluxe">
						<h2 class="font-deskripsi">Deluxe Room</h2>
						<article class="article-decript">
							Kenyamanan extra dengan konsep elegant serta fasilitas yang ditawarkan yang memadai cocok 
							bagi anda yang menginap dengan nuansa yang klasik dengan alam.
						</article>
						<input type="submit" class="btn-moreinformation" value="More Information">
					</span>
				</div><!-- itemkamar-hotel-->
			
				<div class="itemkamar-hotel-sideright">
					<img class="sizeimg-room" src="<?php echo $site;?>image/kamar/standart-room.jpg">
					<span class="content_deskripsi-kamardeluxefam">
						<h2 class="font-deskripsi">Deluxe Family Room</h2>
						<article class="article-decript">
							Kenyamanan extra dengan konsep elegant serta fasilitas yang ditawarkan yang memadai cocok 
							bagi anda yang menginap dengan nuansa yang klasik dengan alam.
						</article>
						<input type="submit" class="btn-moreinformation" value="More Information">
					</span>
				 </div><!-- itemkamar-hotel-->
			</div><!-- container-item-->
		</div><!-- content-hotel -->
	</div><!-- wrapper-outerhotel -->
<div class="clear-fixcont"></div>
</body>
</html>