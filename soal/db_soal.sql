-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Sep 2020 pada 05.44
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_soal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_soal`
--

CREATE TABLE `t_soal` (
  `no` int(11) NOT NULL,
  `soal` text NOT NULL,
  `a` varchar(1000) NOT NULL,
  `b` varchar(1000) NOT NULL,
  `c` varchar(1000) NOT NULL,
  `d` varchar(1000) NOT NULL,
  `kunci` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_soal`
--

INSERT INTO `t_soal` (`no`, `soal`, `a`, `b`, `c`, `d`, `kunci`) VALUES
(1, 'Siapa presiden pertama Indonesia', 'Soekarno', 'Suharto', 'Ki Hajar Dewantara', 'Megawati Soekarno Puteri', 'Soekarno'),
(2, 'Apa kepanjangan dari NKRI', 'Negara Kesatuan Rakyat Indonesia', 'Negara Kesatuan Republik Indonesia', 'Negara Kedaulatan Republik Indonesia', 'Negara Kekeluargaan Rakyat Indonesia', 'Negara Kesatuan Republik Indonesia'),
(3, '2 + 2 = ', '10:3', '8:4', '(2:2)x(2*2)', '7:3', '(2:2)x(2*2)'),
(4, 'UPI merupakan singkatan dari', 'Universitas Padahal IKIP', 'Universitas Pendidikan Indonesia', 'Universitas Pelawak Internasional', 'Semua Benar', 'Universitas Pendidikan Indonesia'),
(5, 'Siapa nama ayah Arum Yuniarsih', 'Ruman', 'Jajang', 'Dedi', 'Sarbini', 'Ruman'),
(6, 'Malaikat pencabut nyawa adalah malaikat', 'Izroil', 'Jibril', 'Mikail', 'Isrofil', 'Izroil');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_soal`
--
ALTER TABLE `t_soal`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_soal`
--
ALTER TABLE `t_soal`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
