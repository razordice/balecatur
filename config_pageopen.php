<?php

    include "config/koneksi.php";
    //setting page maodul
    $modul = isset($_GET['modul']) ? $_GET['modul'] : null;

    if ($_GET['modul'] == "") {

       include ("modulpage/homepage.php");
    }
    elseif ($_GET['modul'] == "homepage") {
        include ("modulpage/homepage.php");
    }
    elseif ($_GET['modul'] == "akomodasi"){
        include ("modulpage/akomodasi.php");
    }
    elseif ($_GET['modul'] == "gallery"){
        include ("modulpage/gallery.php");
    }
    elseif ($_GET['modul'] == "roomfeature"){
        include ("modulpage/roomfeature.php");
    }
    elseif ($_GET['modul'] == "testimonial"){
        include ("modulpage/testimonial.php");
    }
    elseif ($_GET['modul'] == "reservation"){
        include ("modulpage/reservation.php");
    }
    elseif ($_GET['modul'] == "faq"){
        include ("modulpage/faq.php");
    }
    elseif ($_GET['modul'] == "contact-us"){
        include ("modulpage/contact-us.php");
    }
    elseif ($_GET['modul'] =="detail-roomstandart") {
        include ("modulpage/detail-roomstandart.php");
    }
    elseif ($_GET['modul'] == "signup"){
        include ("modulpage/member/signup.php");
    }else {
        echo "<p><b>halaman yang diminta tidak ada !!</b></p>";
    }

?>