-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Mar 2025 pada 11.35
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi_pegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat`, `telp`, `fax`, `email`) VALUES
(2, 'Test Cus', 'Jln Abc', '081388189796', '2384789327', 'asdasdasd@gmail.com'),
(4, 'Arifin', 'Jln Kp Baru', '081388189796', '2141231212', 'arifin281297@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `idetitas`
--

DROP TABLE IF EXISTS `idetitas`;
CREATE TABLE `idetitas` (
  `id_identitas` int(11) NOT NULL,
  `nama_identitas` varchar(100) NOT NULL,
  `badan_hukum` varchar(100) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `rekening` varchar(20) NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `idetitas`
--

INSERT INTO `idetitas` (`id_identitas`, `nama_identitas`, `badan_hukum`, `npwp`, `email`, `url`, `alamat`, `tlp`, `fax`, `rekening`, `foto`) VALUES
(1, 'UNPAM Pamulang', 'Universitas s', '21131213123132', 'test@gmail.com', 'http://localhkoperasi_pegawai/index.php/aHR0cDovL1', 'asdsd', '01238761823', '9128308123123', '123132343242', 'UNPAM2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `nama_item` varchar(100) NOT NULL,
  `uom` varchar(50) NOT NULL,
  `harga_beli` int(15) NOT NULL,
  `harga_jual` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id_item`, `nama_item`, `uom`, `harga_beli`, `harga_jual`) VALUES
(2, 'Apel 1', 'Buah', 5000, 6000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Ahmad Zainul Arifin', 'ari', '12345', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `id_sales` int(11) NOT NULL,
  `tgl_sales` date NOT NULL,
  `id_customer` int(11) NOT NULL,
  `do_number` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_temp`
--

DROP TABLE IF EXISTS `transaction_temp`;
CREATE TABLE `transaction_temp` (
  `id_transaction` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `session_id` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `idetitas`
--
ALTER TABLE `idetitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indeks untuk tabel `transaction_temp`
--
ALTER TABLE `transaction_temp`
  ADD PRIMARY KEY (`id_transaction`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `idetitas`
--
ALTER TABLE `idetitas`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `manager`
--
ALTER TABLE `manager`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaction_temp`
--
ALTER TABLE `transaction_temp`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
