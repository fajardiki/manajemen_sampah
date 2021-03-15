-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Feb 2021 pada 08.43
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_sampah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_sampah`
--

CREATE TABLE `jenis_sampah` (
  `id_jenis_sampah` int(11) NOT NULL,
  `nama_sampah` varchar(45) DEFAULT NULL,
  `harga_per_kg` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_sampah`
--

INSERT INTO `jenis_sampah` (`id_jenis_sampah`, `nama_sampah`, `harga_per_kg`) VALUES
(2, 'Kardus', '3000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menabung`
--

CREATE TABLE `menabung` (
  `id_menabung` int(11) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `jumlah_kg` int(11) NOT NULL,
  `total_harga` varchar(45) DEFAULT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_nasabah` int(11) NOT NULL,
  `id_jenis_sampah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menabung`
--

INSERT INTO `menabung` (`id_menabung`, `tgl_transaksi`, `jumlah_kg`, `total_harga`, `id_petugas`, `id_nasabah`, `id_jenis_sampah`) VALUES
(8, '2020-10-18', 20, '60000', 1, 2, 2),
(9, '2021-02-21', 9, '27000', 1, 3, 2),
(10, '2021-02-21', 10, '30000', 1, 4, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nasabah` int(11) NOT NULL,
  `nama_nasabah` varchar(45) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `no_ktp` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_rek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nasabah`
--

INSERT INTO `nasabah` (`id_nasabah`, `nama_nasabah`, `alamat`, `tgl_lahir`, `jenis_kelamin`, `no_telp`, `no_ktp`, `username`, `password`, `no_rek`) VALUES
(2, 'cahya affrillah', 'jember', '2020-10-18', 'Laki-laki', '123455', '123456', 'cahya', '$2y$10$V6paPSonWAeI1YFfW8b4x.a6Nxdqmzc0Xlnexk1Mt0Xdjoh4GNjja', 1),
(3, 'adit', 'jember', '2021-02-02', 'Laki-laki', '890', '123456', 'adit', '$2y$10$uObOJkT7USQijfRTn/aIPe4jqv71fzCHBTS1pK40lsXYAZJVUz1TK', 2),
(4, 'milhya', 'jem', '2021-02-22', 'Laki-laki', '888', '1234567', 'milhya', '$2y$10$FntZM8OwsSleunFH8KHWgOJsFfoICcMFggL4L7X6lCZ6w27ULxbQi', 2),
(5, 'fgg', 'jembe', '2021-02-23', 'Laki-laki', '77', '13', 'fgg', '$2y$10$Pba09RCbCPURVBdW/nsBEu8XPI28DG6AbOrhmmqUZYv0bl7nmvvli', 3),
(6, 'test', '098', '2021-02-23', 'Laki-laki', '098', '123456', 'test', '$2y$10$bictWu7lGBr/kIvEaPFBV.vJJalpsEGfDT3YCpa1DH59Vnk7HiBau', 3),
(7, '678', '678', '2021-02-23', 'Laki-laki', '678', '678', '678', '$2y$10$v0zs/mafgBWkrAt9Wjevzu187ucxzK0gk.uBmopJv3Y.X8cAsvyCe', 3),
(8, '789', '789', '2021-02-23', 'Laki-laki', '789', '789', '789', '$2y$10$JKM7rTTpwL5oWRzeNAL8H.tBmgdEMAAz/QPmfQVxKidweS5XRpnVC', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penarikan`
--

CREATE TABLE `penarikan` (
  `id_penarikan` int(11) NOT NULL,
  `tgl_transaksi` varchar(45) DEFAULT NULL,
  `jumlah_penarikan` varchar(45) DEFAULT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_nasabah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penarikan`
--

INSERT INTO `penarikan` (`id_penarikan`, `tgl_transaksi`, `jumlah_penarikan`, `id_petugas`, `id_nasabah`) VALUES
(5, '2020-10-18', '10000', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul` varchar(45) DEFAULT NULL,
  `isi_pengumuman` text DEFAULT NULL,
  `tgl_pengumuman` varchar(45) DEFAULT NULL,
  `id_nasabah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `isi_pengumuman`, `tgl_pengumuman`, `id_nasabah`) VALUES
(2, 'coba pengumuman', 'coba test pengumuman', '10-18-2020', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `no_telp` varchar(45) DEFAULT NULL,
  `jenis_kel` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `alamat`, `no_telp`, `jenis_kel`, `username`, `password`) VALUES
(1, 'admin', '-', '-', '-', 'admin', '$2y$10$VJo1til6JEM7wR3Sa/DI6ehxVeUHbKNYPMWj4wmgnwLus/b6tqjzi');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `report_nasabah`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `report_nasabah` (
`id` int(11)
,`jenis_transaksi` varchar(9)
,`tgl_transaksi` varchar(45)
,`nama` varchar(45)
,`nama_nasabah` varchar(45)
,`nama_jenis_sampah` varchar(45)
,`total` varchar(45)
,`id_nasabah` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int(11) NOT NULL,
  `jumlah_rekening` varchar(45) DEFAULT NULL,
  `id_nasabah` int(11) NOT NULL,
  `update_tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `jumlah_rekening`, `id_nasabah`, `update_tanggal`) VALUES
(2, '50000', 2, '2021-01-21 17:00:00'),
(3, '27000', 3, '2021-02-21 21:59:18'),
(4, '30000', 4, '2021-03-22 07:38:26'),
(5, '0', 5, '2021-02-23 07:40:13'),
(6, '0', 6, '2021-02-23 07:40:37'),
(7, '0', 7, '2021-02-23 07:40:56'),
(8, '0', 8, '2021-02-23 07:41:15');

-- --------------------------------------------------------

--
-- Struktur untuk view `report_nasabah`
--
DROP TABLE IF EXISTS `report_nasabah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_nasabah`  AS SELECT `a`.`id_penarikan` AS `id`, 'PENARIKAN' AS `jenis_transaksi`, `a`.`tgl_transaksi` AS `tgl_transaksi`, `d`.`nama` AS `nama`, `b`.`nama_nasabah` AS `nama_nasabah`, '-' AS `nama_jenis_sampah`, `a`.`jumlah_penarikan` AS `total`, `b`.`id_nasabah` AS `id_nasabah` FROM ((`penarikan` `a` join `nasabah` `b` on(`a`.`id_nasabah` = `b`.`id_nasabah`)) join `petugas` `d` on(`a`.`id_petugas` = `d`.`id_petugas`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_sampah`
--
ALTER TABLE `jenis_sampah`
  ADD PRIMARY KEY (`id_jenis_sampah`);

--
-- Indeks untuk tabel `menabung`
--
ALTER TABLE `menabung`
  ADD PRIMARY KEY (`id_menabung`,`id_petugas`,`id_nasabah`,`id_jenis_sampah`),
  ADD KEY `fk_menabung_petugas_idx` (`id_petugas`),
  ADD KEY `fk_menabung_nasabah1_idx` (`id_nasabah`),
  ADD KEY `fk_menabung_jenis_sampah1_idx` (`id_jenis_sampah`);

--
-- Indeks untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indeks untuk tabel `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`id_penarikan`,`id_petugas`,`id_nasabah`),
  ADD KEY `fk_penarikan_petugas1_idx` (`id_petugas`),
  ADD KEY `fk_penarikan_nasabah1_idx` (`id_nasabah`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`,`id_nasabah`),
  ADD KEY `fk_pengumuman_nasabah1_idx` (`id_nasabah`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`,`id_nasabah`),
  ADD KEY `fk_saldo_nasabah1_idx` (`id_nasabah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_sampah`
--
ALTER TABLE `jenis_sampah`
  MODIFY `id_jenis_sampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `menabung`
--
ALTER TABLE `menabung`
  MODIFY `id_menabung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id_nasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `penarikan`
--
ALTER TABLE `penarikan`
  MODIFY `id_penarikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menabung`
--
ALTER TABLE `menabung`
  ADD CONSTRAINT `fk_menabung_jenis_sampah1` FOREIGN KEY (`id_jenis_sampah`) REFERENCES `jenis_sampah` (`id_jenis_sampah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_menabung_nasabah1` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_menabung_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penarikan`
--
ALTER TABLE `penarikan`
  ADD CONSTRAINT `fk_penarikan_nasabah1` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penarikan_petugas1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `fk_pengumuman_nasabah1` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `saldo`
--
ALTER TABLE `saldo`
  ADD CONSTRAINT `fk_saldo_nasabah1` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
