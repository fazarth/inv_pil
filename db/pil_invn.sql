-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2021 pada 04.42
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pil_invn`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pil_brg`
--

CREATE TABLE `pil_brg` (
  `id_brg` int(10) NOT NULL,
  `kd_brg` varchar(20) NOT NULL,
  `nm_brg` varchar(100) NOT NULL,
  `id_ktgr` varchar(50) NOT NULL,
  `jml_brg` int(20) NOT NULL,
  `id_satuan` varchar(20) NOT NULL,
  `harga_brg` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pil_brg`
--

INSERT INTO `pil_brg` (`id_brg`, `kd_brg`, `nm_brg`, `id_ktgr`, `jml_brg`, `id_satuan`, `harga_brg`) VALUES
(73, 'KMPT01', 'Laptop Acer Core i5', '13', 3000, '2', 6500000),
(74, 'BJKAOS01', 'Batik Trusmi Model X', '3', 1900, '3', 20000),
(75, 'KMPT02', 'Komputer Asus 2021', '13', 100, '2', 7000000),
(76, 'KMPT03', 'Printer Epson 3 in 1', '11', 101, '2', 2000000),
(77, 'KMPT04', 'Printer Pixma MP287', '11', 100, '2', 950000),
(78, 'BJKAOS02', 'Jeans Mode X', '4', 2000, '3', 25000),
(79, 'KMPT05', 'Mouse Votre', '11', 100, '2', 20000),
(80, 'BJKAOS03', 'Jaket Supreme', '3', 1500, '3', 25000),
(81, 'ATK-JL-01', 'Kertas A4 70Gsm', '2', 100, '16', 35000),
(84, 'ATK-JL-02', 'Kertas A4 80Gsm', '2', 10, '16', 55000),
(85, 'ATK-JL-03', 'Kertas A3', '2', 10, '16', 90000),
(86, 'NEW-BRG-INPT', 'Komputer Asus 2021', '13', 10, '2', 4000000),
(87, 'XXX1', 'Pulau Intan Stock', '18', 400, '2', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pil_in`
--

CREATE TABLE `pil_in` (
  `id_in` int(10) NOT NULL,
  `kd_in` varchar(20) NOT NULL,
  `tgl_in` date NOT NULL,
  `id_brg` int(10) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `jml_brg_in` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pil_in`
--

INSERT INTO `pil_in` (`id_in`, `kd_in`, `tgl_in`, `id_brg`, `pengirim`, `jml_brg_in`) VALUES
(16, 'TRX-JN-01', '2021-06-01', 73, 'PT. Teknologi Sementara', 2000),
(17, 'TRX-JN-02', '2021-06-02', 74, 'PT. Indah Sementara Textile', 2000),
(18, 'TRX-JN-03', '2021-06-17', 78, 'PT. Masa Depan Cerah', 1000),
(20, 'MG27-JUNI-03', '2021-06-27', 74, 'PT. Textile Sementara', 1500),
(21, 'TRX-JN-04', '2021-06-30', 73, 'PT. Teknologi Saingan Google', 1500),
(22, 'TRX-JN-05', '2021-07-01', 73, 'PT. Teknologi Indah', 100),
(23, 'PULAUSTOCK', '2021-07-05', 87, 'PT. Pulau Intan', 200),
(24, 'XX11', '2021-07-05', 87, 'PT. Teknologi Sementara Selamanya', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pil_ktgr`
--

CREATE TABLE `pil_ktgr` (
  `id_ktgr` int(10) NOT NULL,
  `ktgr_brg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pil_ktgr`
--

INSERT INTO `pil_ktgr` (`id_ktgr`, `ktgr_brg`) VALUES
(2, 'Alat Tulis Kantor (ATK)'),
(3, 'Bahan Baju'),
(4, 'Bahan Celana'),
(11, 'Perangkat Pendukung Komputer'),
(12, 'Peralatan Jaringan'),
(13, 'Komputer/Laptop'),
(17, 'Minuman'),
(18, 'Pulau Intan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pil_out`
--

CREATE TABLE `pil_out` (
  `id_out` int(10) NOT NULL,
  `kd_out` varchar(20) NOT NULL,
  `tgl_out` date NOT NULL,
  `id_brg` int(10) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `jml_brg_out` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pil_out`
--

INSERT INTO `pil_out` (`id_out`, `kd_out`, `tgl_out`, `id_brg`, `tujuan`, `jml_brg_out`) VALUES
(10, 'JN-BRG-OUT', '2021-06-28', 74, 'PT. Nusa Indah Textile', 1500),
(11, 'JN-BRG-OUT-01', '2021-06-30', 74, 'PT. Selalu Textile', 100),
(12, 'JN-BRG-OUT-04', '2021-06-30', 73, 'PT. Nusa Indah Tech', 500),
(13, 'JN-BRG-OUT-03', '2021-07-02', 73, 'PT. Nusa Indah', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pil_satuan`
--

CREATE TABLE `pil_satuan` (
  `id_satuan` int(10) NOT NULL,
  `satuan_brg` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pil_satuan`
--

INSERT INTO `pil_satuan` (`id_satuan`, `satuan_brg`) VALUES
(1, 'Pcs'),
(2, 'Unit'),
(3, 'm2'),
(4, 'Pack'),
(14, 'Ekslampar'),
(16, 'Rim');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pil_brg`
--
ALTER TABLE `pil_brg`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `pil_in`
--
ALTER TABLE `pil_in`
  ADD PRIMARY KEY (`id_in`);

--
-- Indeks untuk tabel `pil_ktgr`
--
ALTER TABLE `pil_ktgr`
  ADD PRIMARY KEY (`id_ktgr`);

--
-- Indeks untuk tabel `pil_out`
--
ALTER TABLE `pil_out`
  ADD PRIMARY KEY (`id_out`);

--
-- Indeks untuk tabel `pil_satuan`
--
ALTER TABLE `pil_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pil_brg`
--
ALTER TABLE `pil_brg`
  MODIFY `id_brg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `pil_in`
--
ALTER TABLE `pil_in`
  MODIFY `id_in` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pil_ktgr`
--
ALTER TABLE `pil_ktgr`
  MODIFY `id_ktgr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pil_out`
--
ALTER TABLE `pil_out`
  MODIFY `id_out` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pil_satuan`
--
ALTER TABLE `pil_satuan`
  MODIFY `id_satuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
