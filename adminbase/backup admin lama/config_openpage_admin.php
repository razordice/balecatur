<?php 
	// include "../config/koneksi.php";
	//setting page maodul
    $moduladmin = isset($_GET['moduladmin']) ? $_GET['moduladmin'] : null;

    if ($_GET['modul'] == "") {
       include ("moduladmin/dashboard.php");
    }
    elseif ($_GET['modul'] == "dashboard") {
        include ("moduladmin/dashboard.php");
    }
    elseif ($_GET['modul'] == "datakamar"){
        include ("moduladmin/datakamar.php");
    }
     elseif ($_GET['modul'] == "checkkamar"){
        include ("moduladmin/checkkamar.php");
    }
    elseif ($_GET['modul'] == "kategorikamar"){
        include ("moduladmin/kategorikamar.php");
    }
    elseif ($_GET['modul'] == "manajemen_berita"){
        include ("moduladmin/manajemen_berita.php");
    }
    elseif ($_GET['modul'] == "testimonial"){
        include ("moduladmin/testimonial.php");
    }
    elseif ($_GET['modul'] == "reservation"){
        include ("moduladmin/reservation.php");
    }
    elseif ($_GET['modul'] == "faq"){
        include ("moduladmin/faq.php");
    }
    elseif ($_GET['modul'] == "contact_us"){
        include ("moduladmin/contact_us.php");
    }
    elseif ($_GET['modul'] == "setting-akun"){
        include ("moduladmin/setting-akun.php");
    }
    elseif ($_GET['modul']=="member") {
        include ("moduladmin/member.php");
    }
    elseif ($_GET['modul'] == "signup"){
        include ("moduladmin/signup.php");
    }else {
        echo "<p><b>halaman yang diminta tidak ada !!</b></p>";
    }

?>

