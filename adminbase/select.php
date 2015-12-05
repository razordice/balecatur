<?php 

    if (!isset($_GET['modul'])) {
        include('moduladmin/dashboard.php');
        
    } else {    

        $page = $_GET['modul'];  
        switch($page) {

            case 'dashboard':
                include('moduladmin/dashboard.php');
                break;
            case 'profil':
                include('moduladmin/profil.php');
                break; 
            /* master user atau member */ 
            case 'man_user':
                include('moduladmin/man_user.php');
                break;
            case 'man_user_edit':
                include('moduladmin/man_user_edit.php');
                break;   
            case 'man_member':
                include('moduladmin/man_member.php');
                break;
            case 'man_member_edit':
                include('moduladmin/man_member_edit.php');
                break;  
            /* master type kamar */
            case 'kategorikamar':
                include('moduladmin/man_kategorikamar.php');
                break; 
            case 'man_kategorikamar_edit':
                include('moduladmin/man_kategorikamar_edit.php');
                break;
            case 'man_diskon':
                include('moduladmin/man_diskon.php');
                break; 
            /* master kamar */
            case 'man_datakamar':
                include('moduladmin/man_datakamar.php');
                break;
            case 'man_datakamar_edit':
                include('moduladmin/man_datakamar_edit.php');
                break; 
            /* cek kamar  */
            case 'checkkamar':
                include('moduladmin/cek_kamar.php');
                break;
            /* master reservasi */ 
            case 'man_reserveonline':
                include('moduladmin/man_reserveonline.php');
                break;
            case 'man_reserveoffline':
                include('moduladmin/man_reserveoffline.php');
                break;  
            /* master rental */
            case 'man_rental':
                include('moduladmin/man_rental.php');
                break;
            case 'man_rental_edit':
                include('moduladmin/man_rental_edit.php');
                break;
            /* master berita */
            case 'man_berita':
                include('moduladmin/man_berita.php');
                break;
            case 'man_berita_edit':
                include('moduladmin/man_berita_edit.php');
                break;
            /* master restorasi */
            case 'man_datamenu':
                include ("moduladmin/man_datamenu.php");                       
                break;
            case 'man_menuedit':
                include ('moduladmin/man_datamenuedit.php');
                break;           
            case 'man_katemenu':
                include ("moduladmin/man_katemenu.php");
                break;
            /*laporan hotel*/
            case 'laporan_reservasi':
                include "moduladmin/laporan_reservasi.php";
                break;
            case 'laporan_memberhotel':
                include "moduladmin/laporan_memberhotel.php";
                break;
            case 'laporan_pemasukan':
                include "moduladmin/laporan_pemasukan.php";
                break;
            case 'laporan_sewarental':
                include "moduladmin/laporan_sewarental.php";
                break;
        }
    }
     
?>    