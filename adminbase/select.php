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
            case 'man_user':
                include('moduladmin/man_user.php');
                break;
            case 'man_user_edit':
                include('moduladmin/man_user_edit.php');
                break;   
            /* master type kamar */
            case 'kategorikamar':
                include('moduladmin/kategorikamar.php');
                break; 
            case 'man_kategori_edit':
                include('moduladmin/man_kategori_edit.php');
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
            case 'man_transaksi':
                include('moduladmin/man_transaksi.php');
                break;
            case 'man_transaksi_detail':
                include('moduladmin/man_transaksi_detail.php');
                break;  
           
        }
    }
     
?>    