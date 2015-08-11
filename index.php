<?php session_start();

      include "config/koneksi.php";

/*if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<script>alert Maaf anda harus login terlebih dahulu !! ; window.location='../index.php?modulpage=sign'/</script>";

}else{
  */

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- meta deskripsi-->
  <meta charset="utf-8">
  <meta name="keyword" content="hotel murah dijalan wates,hotel murah dan berkualitas">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Hotel Balecatur Inn</title>

  <!-- favicon-->
  <link rel="shorcut icon" href="<?php echo "$site";?>image/icon/favicon.ico.png">
	<!-- css -->
  <link href="<?php echo $site;?>library/zebra_datepicker/css/default.css" type="text/css" rel="stylesheet">
  <link href="<?php echo $site;?>css/basehotel.css" type="text/css" rel="stylesheet">
  <link href="<?php echo $site;?>css/flexslider.css" type="text/css" rel="stylesheet">
	<!-- jquery versi 1.11.1 -->
	<script type="text/javascript" src="<?php echo $site;?>library/js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="<?php echo $site;?>library/js/jquery.flexslider.js"></script>
  <script type="text/javascript" src="<?php echo $site;?>library/twd-menu.js"></script>
  <script type="text/javascript" src="<?php echo $site;?>library/zebra_datepicker/zebra_datepicker.js"></script>
  <script type="text/javascript" src="<?php echo $site;?>library/zebra_datepicker/core.js"></script>

  <!-- slider function -->
	<script type="text/javascript">
      $(document).ready(function() {
        $('.flexslider').flexslider ({
            animation:"slide"

        });
      });
	</script>
</head>
<body> 
<!--************************************** Navi Navigasi *********************************************-->           
    <div id="top-nav" class="navbar navbar-fixed-top"><!-- navbar fixed top none scroling down-->
      <div class="navbar-inner">
        <div class="container-navbartop">
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li><a href="<?php echo $site;?>">homepage</a></li>
                    <li><a href="<?php echo $site;?>akomodasi">accomodation</a></li>
                    <li><a href="<?php echo $site;?>gallery">gallery</a></li>
                    <li><a href="<?php echo $site;?>roomfeature">room features</a></li>
                    <li><a href="<?php echo $site;?>testimonial">testimonial</a></li>
                    <!-- <li><a href="bukutamu.php">GuestBook</a></li> -->
                    <li><a href="<?php echo $site;?>reservation">reservation</a></li>
                    <li><a href="<?php echo $site;?>faq">faq</a></li>
                    <li><a href="<?php echo $site;?>signup"><input type="submit" value="Sign Up" class="btnsignup"></a></li>
                    <li><a href="<?php echo $site;?>signin.php">Login<a/></li>
                </ul><!-- nav pull-right -->
            </div><!-- nav collapse collapse -->
        </div><!--container-navbartop-->
            <div class="">
              <span class="image-iconmedia">
                <a href="#" target="blank"><img class="img-blus" src="<?php echo $site;?>image/icon/tweet.png"></a>          
                <a href="#" target="blank"><img class="img-blus" src="<?php echo $site;?>image/icon/fb.png"></a> 
                <a href="#" target="blank"><img class="img-blus" src="<?php echo $site;?>image/icon/insta.png"></a> 
              </span>
            </div> 
      </div><!--navbar-inner-->
    </div><!-- top-nav -->

    <div id="box-wrapper">
      <div id="wrapper">
        <div class="asidelogo-right">
            <img src="<?php echo $site;?>image/logo/logo.png">
        </div><!-- asidelogo-right-->

<!--************************************** content *********************************************-->            
    <div id="content">
        <!--page open setup -->
        
        <?php include "config_pageopen.php"; ?>

    </div>

<!--************************************** end of content **************************************-->       
                
<!--************************************** footer *********************************************-->  
<div id="wrapper-footer">
    <div id="wrapper-columleft">
        <div class="colomleft-text">
            <ul class="">
                <li><span>Contact us</span></li>
                <li><span>Telp   : 0853444324525 / 02747174206</span></li>
                <li><span>email  : balecaturinn@yahoo.com</span></li>
                <li><span>adress : Jln Wates km 8 Gamol RT 07 /RW 17 Balecatur Gamping Sleman Yogyakarta</span></li>
            </ul>
        </div>       
    </div><!-- wrapper-columleft -->
    <div class="colom-leftinner">
         <div class="bottom-inlinemenus">
            <ul class="menuinlines">
                <li><a class="menuinlines" href="<?php echo "$site";?>faq">Faq</a></li>
                <li><a class="menuinlines" href="">Partners</a></li>
                <li><a class="menuinlines" href="">About Us</a></li>
                <li><a class="menuinlines" href="<?php echo "$site";?>contact-us">Contact us</a></li>
                <li><a class="menuinlines" href="">Help Center</a></li>
            </ul>
         </div>
    </div>
    <div class="wrapper-columright">
        <div class="cont-columright">
            <div class="cnt-ourwelocation">
              <p class="fnt-ourlocation">Our Location</p>
              <img src="<?php echo $site;?>image/icon/icon location.png"></img>
              <hr class="line-ourlocation"> 
              <p class="cnt-fntstylelocation">Jln Wates km 8 Balecatur Gamping Sleman Yogyakarta</p>
            </div>
            <div class="cnt-payments-methods">
              <p class="">Payment Methods</p> 
              <div class="icon-grouping">
                <span><img src="<?php echo $site;?>image/icon/MASTERCARD.png"></span>
                <span><img src="<?php echo $site;?>image/icon/VISA.png"></span>
                <span><img src="<?php echo $site;?>image/icon/BNI.png" class="cstom-img"></span>                
              </div>
            </div>  
        </div>
    </div>
    <div id="wrapper-colombottom">
      <ul class="contact-personhotel">
          <li class="li-contact"><a class="a.contact"><img class="img-icon" src="<?php echo $site;?>image/icon/phone.png">0853444324525</a></li>
          <li class="li-contact"><a class="a.contact"><img class="img-icon" src="<?php echo $site;?>image/icon/telp.png">02747174206</a></li>
          <li class="li-contact"><a class="a.contact"><img class="img-icon" src="<?php echo $site;?>image/icon/icon email.png">balecaturinn@yahoo.co.id</a></li>
      </ul>
      <div class="colombottom-copyright">
        <p>&copy; copyright hotelbalecatur-inn 2014 - <?php echo date('Y')  ?> ,allrightreserved</p>
      </div>
    </div>
</div><!-- wrapper-footer -->
             

<!--************************************** end of footer ***************************************-->  
   
</body>
</html>

