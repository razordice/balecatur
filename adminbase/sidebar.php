<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
        <p class="centered" style="text-align:center; margin:5% auto;">
          <a href="#"><img src="images/lg1.png" class="img-circle" width="60"></a>
        </p>
        <li>
            <a href="homeadmin.php?modul=dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
        </li>

        <?php if($_SESSION['level_admin']=="3") { ?>
        <li>
            <a href="#"><i class="fa fa-user fa-fw"></i> Man. User dan Member</a>
            <i class="fa fa-sort-down has-children"></i>
            <ul>
                <li><a href="homeadmin.php?modul=man_user">Man. User</a></li>
                <li><a href="homeadmin.php?modul=man_member">Man. Member</a></li>
            </ul>
        </li>

        <?php } else { ?>
        <li>
            <a href="homeadmin.php?modul=man_member"><i class="fa fa-user fa-fw"></i> Manajemen Member</a>
        </li>
        <?php }?>

        <?php if ($_SESSION['level_admin']=="1") {  ?>
        
        <li>
            <a href="homeadmin.php?modul=man_berita"><i class="fa fa-desktop fa-fw"></i> Manajemen Berita</a>
        </li>
        <li>
            <a href="homeadmin.php?modul=man_diskon"><i class="fa fa-usd fa-fw"></i> Manajemen Dikson</a>
        </li>
        <li>
            <a href="homeadmin.php?modul=man_rental"><i class="fa fa-car fa-fw"></i> Master Manajemen Rental</a>
        </li>
        
        <li>
            <a href="homeadmin.php?modul=man_transaksi"><i class="fa fa-briefcase fa-fw"></i> Manajemen Reservasi</a>
            <i class="fa fa-sort-down has-children"></i>
            <ul>
                <li><a href="homeadmin.php?modul=man_reserveonline">Reservasi Online</a></li>
                <li><a href="homeadmin.php?modul=man_reserveoffline">Reservasi Offline</a></li>
            </ul>
        </li>    
        <li>
            <a href="homeadmin.php?modul=man_kategori"><i class="glyphicon glyphicon-bed fa-fw"></i> Master Manajemen Kamar</a>
            <i class="fa fa-sort-down has-children"></i>
            <ul>
                <li><a href="homeadmin.php?modul=kategorikamar">Kategori Kamar</a></li>
                <li><a href="homeadmin.php?modul=man_datakamar">Data Kamar </a></li>
                <li><a href="homeadmin.php?modul=checkkamar">Check Kamar </a></li>
            </ul>
        </li>
        <?php } ?>

        <?php if ($_SESSION['level_admin']=="2") {  ?>
        <li>
            <a href="homeadmin.php?page=man_produk"><i class="fa fa-cutlery fa-fw"></i> Master Restaurant</a>
            <i class="fa fa-sort-down has-children"></i>
            <ul>
                <li><a href="homeadmin.php?modul=man_katemenu">Kategori Paket</a></li>
                <li><a href="homeadmin.php?modul=man_datamenu">Data Menu</a></li>
            </ul>
        </li>
        <?php } ?>
        <li>
            <a href="homeadmin.php?page=man_ongkir"><i class="fa fa-file-text-o fa-fw"></i> Data Laporan</a>
            <i class="fa fa-sort-down has-children"></i>
            <ul>
        <?php if ($_SESSION['level_admin']=="1" || $_SESSION['level_admin']=="3") { ?>
                <li><a href="homeadmin.php?modul=laporan_reservasi">Laporan Reservasi</a></li>
                <li><a href="homeadmin.php?modul=laporan_memberhotel">Laporan Member Hotel</a></li>
                <li><a href="homeadmin.php?modul=laporan_pemasukan">Laporan Pemasukan</a></li>
                <li><a href="homeadmin.php?modul=laporan_sewarental">Laporan Sewa Mobil / Motor</a></li>
        <?php } ?>
        <?php if ($_SESSION['level_admin']=="2" || $_SESSION['level_admin']=="3") { ?>
                <li><a href="#">Laporan Restorasi</a></li>
            </ul>
        <?php } ?>
        </li>
    </ul>               
</div>                