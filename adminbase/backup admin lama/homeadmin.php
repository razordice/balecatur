<?php session_start();
  include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <!-- <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina"> -->

    <title>Administrator Hotel</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!--jquery -->
   <script type="text/javascript" src="<?php echo $site;?>library/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="assets/tinymce/js/tinymce/tinymce.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
      <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
   <!--<script src="assets/js/jquery-1.8.3.min.js"></script>-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <section id="container" >
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
          <!--logo start-->
          <a href="index.php" class="logo"><b>Administrator Hotel</b></a>
          <!--logo end-->
          <div class="nav notify-row" id="top_menu">
              <!--  notification start -->
              <ul class="nav top-menu">
              <!-- settings notification start -->

                  <?php include "notification.php"; ?>   

              <!--  notification end -->
          </div>
          <!-- top menu logout-->
          <div class="top-menu">
          	<ul class="nav pull-right top-menu">
                  <li><a class="logout" href="logout.php">Logout</a></li>
          	</ul>
          </div><!-- top-menu -->
    </header>
    <!--header end-->
      
    <!--  MAIN SIDEBAR MENU -->

      <?php include "sidebarleft.php"; ?>

      <!-- END OF SIDEBAR MENU-->
    
      <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
          <?php include "config_openpage_admin.php"; ?>
        </section>
    </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              @2015 - Balecatur All Rights Reserved.
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>


    <script type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    

    <!--script for this page-->

  </body>
</html>