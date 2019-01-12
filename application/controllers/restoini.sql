-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Jan 2019 pada 17.52
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restoini`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`menu_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_image` varchar(100) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_image`, `menu_price`, `menu_status`) VALUES
(1, 'rendang', 'rendang.jpg', 10000, 'ready');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
`pembayaran_id` int(11) NOT NULL,
  `pembayaran_status` int(11) NOT NULL,
  `pembayaran_date` date NOT NULL,
  `pemesanan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
`pemesanan_id` int(11) NOT NULL,
  `pemesanan_no` varchar(100) NOT NULL,
  `pemesanan_date` date NOT NULL,
  `pemesanan_name` varchar(100) NOT NULL,
  `pemesanan_deskno` int(11) NOT NULL,
  `pemesanan_total` int(11) NOT NULL,
  `pemesanan_cashback` int(11) NOT NULL,
  `pemesanan_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_level` varchar(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_level`) VALUES
(1, 'andre', 'andre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1'),
(2, 'mila', 'mila@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2'),
(3, 'vanessa', 'vanes@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '3'),
(9, 'obeth', 'obedewardhana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2'),
(10, 'Jessica Mila', 'jessica@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '3'),
(11, 'grace natalie', 'gracen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2'),
(12, 'obama', 'obama@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '3'),
(13, 'sandiaga uno', 'sandiaun@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '3'),
(14, 'navala adila', 'navalia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '3'),
(15, 'vivian', 'vivian@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2'),
(16, 'jay subiakto', 'jayo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
 ADD PRIMARY KEY (`pembayaran_id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
 ADD PRIMARY KEY (`pemesanan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
MODIFY `pemesanan_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
