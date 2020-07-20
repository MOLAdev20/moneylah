-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2020 pada 06.26
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moneylah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_hutang`
--

CREATE TABLE `data_hutang` (
  `ID` int(10) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Hari_tanggal` varchar(20) NOT NULL,
  `Jam` varchar(8) NOT NULL,
  `Nominal` int(20) NOT NULL,
  `Catatan` text NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_hutang`
--

INSERT INTO `data_hutang` (`ID`, `Nama`, `Hari_tanggal`, `Jam`, `Nominal`, `Catatan`, `Status`) VALUES
(1, 'test', 'Senin 20 07 2020', '06:17', 100000, 'test', 'Meminjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemasukan`
--

CREATE TABLE `data_pemasukan` (
  `ID` int(10) NOT NULL,
  `Nama_pemasukan` varchar(30) NOT NULL,
  `Hari_tanggal` varchar(20) NOT NULL,
  `Jam` varchar(6) NOT NULL,
  `Nominal` int(15) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pemasukan`
--

INSERT INTO `data_pemasukan` (`ID`, `Nama_pemasukan`, `Hari_tanggal`, `Jam`, `Nominal`, `Keterangan`) VALUES
(1, 'test', 'Senin 20 07 2020', '10:19', 1000, 'test'),
(3, 'test', 'Senin 20 07 2020', '11:07', 200000, 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengeluaran`
--

CREATE TABLE `data_pengeluaran` (
  `ID` int(10) NOT NULL,
  `Nama_pengeluaran` varchar(50) NOT NULL,
  `Hari_tanggal` varchar(20) NOT NULL,
  `Jam` varchar(8) NOT NULL,
  `Nominal` int(17) NOT NULL,
  `Catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pengeluaran`
--

INSERT INTO `data_pengeluaran` (`ID`, `Nama_pengeluaran`, `Hari_tanggal`, `Jam`, `Nominal`, `Catatan`) VALUES
(1, 'Erik', 'Senin 20 07 2020', '05:20', 110, 'test'),
(2, 'test', 'Senin 20 07 2020', '06:07', 890, 'test');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_hutang`
--
ALTER TABLE `data_hutang`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `data_pemasukan`
--
ALTER TABLE `data_pemasukan`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `data_pengeluaran`
--
ALTER TABLE `data_pengeluaran`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_hutang`
--
ALTER TABLE `data_hutang`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_pemasukan`
--
ALTER TABLE `data_pemasukan`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_pengeluaran`
--
ALTER TABLE `data_pengeluaran`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
