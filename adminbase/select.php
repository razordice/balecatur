<?php 
    if (!isset($_GET['modul']))
    {
        include('moduladmin/dashboard.php');
    } else {    
        $page = $_GET['modul'];  
        switch($page)
        {
            case 'dashboard':
                include('moduladmin/dashboard.php');
                break;
            case 'profil':
                include('moduladmin/profil.php');
                break; 
            /* master user/member */ 
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
            case 'man_ongkir':
                include('moduladmin/man_ongkir.php');
                break;     
            case 'man_ongkir_edit':
                include('moduladmin/man_ongkir_edit.php');
                break;     
            /* master reservasi */ 
            case 'man_transaksi':
                include('moduladmin/man_transaksi.php');
                break;
            case 'man_transaksi_detail':
                include('moduladmin/man_transaksi_detail.php');
                break;  
            /* master rental */
            case 'man_rental':
                include('moduladmin/rental.php');
                break;
            /* master berita */
            case 'man_berita':
                include('moduladmin/man_berita.php');
                break;
            case 'man_berita_edit':
                include('moduladmin/man_berita_edit.php');
                break;
           
        }
    }
     
?>    