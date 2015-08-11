-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Jul 2015 pada 00.17
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_hotelbalecatur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` enum('0','1') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
`id_berita` int(10) NOT NULL,
  `judul_berita` text NOT NULL,
  `isi_berita` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `kd_booking` varchar(10) NOT NULL,
  `id_member` int(10) NOT NULL,
  `id_kamar` int(10) NOT NULL,
  `id_paket` int(10) NOT NULL,
  `id_rental` int(10) NOT NULL,
  `id_laundry` int(10) NOT NULL,
  `adults` varchar(10) NOT NULL,
  `parents` varchar(10) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`kd_booking`, `id_member`, `id_kamar`, `id_paket`, `id_rental`, `id_laundry`, `adults`, `parents`, `checkin`, `checkout`, `status`) VALUES
('FPBGRY', 0, 0, 0, 0, 0, '1', '2', '2015-07-11', '2015-07-12', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int(10) NOT NULL,
  `foto` varchar(12) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_kamar`
--

CREATE TABLE IF NOT EXISTS `history_kamar` (
  `id_history_kamar` int(10) NOT NULL,
  `kd_booking` varchar(20) NOT NULL,
  `kd_transksi_lngsung` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
`id_kamar` int(10) NOT NULL,
  `id_kategori_kamar` int(10) NOT NULL,
  `fasilitas` varchar(20) NOT NULL,
  `tarif` varchar(20) NOT NULL,
  `foto_kamar` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_kategori_kamar`, `fasilitas`, `tarif`, `foto_kamar`) VALUES
(1, 10, 'badasd', 'Rp 2032323', 'gfdgdfgfd'),
(6, 0, '', '5000000', 'Desert.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_kamar`
--

CREATE TABLE IF NOT EXISTS `kategori_kamar` (
`id_kategori_kamar` int(11) NOT NULL,
  `type_kamar` varchar(20) NOT NULL,
  `jumlah_kamar` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_kamar`
--

INSERT INTO `kategori_kamar` (`id_kategori_kamar`, `type_kamar`, `jumlah_kamar`) VALUES
(10, 'Standart room ', '10'),
(16, 'Deluxe room', '6'),
(17, 'Deluxe room family ', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `knfrimasi_pmbyaran`
--

CREATE TABLE IF NOT EXISTS `knfrimasi_pmbyaran` (
  `id_knfrimasi_pmbyaran` varchar(30) NOT NULL,
  `kd_booking` varchar(30) NOT NULL,
  `id_member` int(10) NOT NULL,
  `status_knfrim` enum('0','1','2') NOT NULL,
  `bukti_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
`id_komentar` int(10) NOT NULL,
  `isi_komentar` int(30) NOT NULL,
  `email` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laundry`
--

CREATE TABLE IF NOT EXISTS `laundry` (
  `id_laundry` int(10) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_member` varchar(10) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `foto_identitas` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_lengkap`, `password`, `email`, `alamat`, `jenis_kelamin`, `no_telp`, `foto_identitas`, `foto`) VALUES
('0001sL9', 'reza fauzan', '827ccb0eea8a706c4c34a16891f84e7b', 'reza.fauzan@gmail.com', 'sedayun gkop', 'Pria', '09654654645', '32Chrysanthemum.jpg', '32Desert.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id_menu` int(10) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE IF NOT EXISTS `paket` (
`id_paket` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_paket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rental`
--

CREATE TABLE IF NOT EXISTS `rental` (
  `id_rental` int(11) NOT NULL,
  `kate_kendaraan` varchar(20) NOT NULL,
  `harga_kendaraan` varchar(10) NOT NULL,
  `ket_kendaraan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reset_password`
--

CREATE TABLE IF NOT EXISTS `reset_password` (
  `id_reset_password` int(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `kode` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transksi_lngsung`
--

CREATE TABLE IF NOT EXISTS `transksi_lngsung` (
`kd_transksi_lngsung` int(11) NOT NULL,
  `id_member` varchar(10) NOT NULL,
  `id_kamar` int(10) NOT NULL,
  `id_paket` int(10) NOT NULL,
  `id_rental` int(10) NOT NULL,
  `id_laundry` int(10) NOT NULL,
  `checkin_lgsng` date NOT NULL,
  `checkout_lgsng` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
 ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
 ADD PRIMARY KEY (`kd_booking`);

--
-- Indexes for table `history_kamar`
--
ALTER TABLE `history_kamar`
 ADD PRIMARY KEY (`id_history_kamar`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
 ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `kategori_kamar`
--
ALTER TABLE `kategori_kamar`
 ADD PRIMARY KEY (`id_kategori_kamar`);

--
-- Indexes for table `knfrimasi_pmbyaran`
--
ALTER TABLE `knfrimasi_pmbyaran`
 ADD PRIMARY KEY (`id_knfrimasi_pmbyaran`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
 ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `laundry`
--
ALTER TABLE `laundry`
 ADD PRIMARY KEY (`id_laundry`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
 ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
 ADD PRIMARY KEY (`id_rental`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
 ADD PRIMARY KEY (`id_reset_password`);

--
-- Indexes for table `transksi_lngsung`
--
ALTER TABLE `transksi_lngsung`
 ADD PRIMARY KEY (`kd_transksi_lngsung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
MODIFY `id_berita` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
MODIFY `id_kamar` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kategori_kamar`
--
ALTER TABLE `kategori_kamar`
MODIFY `id_kategori_kamar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
MODIFY `id_komentar` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id_menu` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transksi_lngsung`
--
ALTER TABLE `transksi_lngsung`
MODIFY `kd_transksi_lngsung` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
