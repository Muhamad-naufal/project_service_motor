-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2023 pada 11.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_book` varchar(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_book` datetime DEFAULT NULL,
  `jam` time NOT NULL,
  `plat_no` varchar(255) NOT NULL,
  `nama_motor` varchar(255) NOT NULL,
  `tahun_kendaraan` year(4) NOT NULL,
  `id_paket_service` int(11) NOT NULL,
  `id_turun_mesin` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `id_status` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id_booking`, `id_user`, `kode_book`, `tanggal`, `tanggal_book`, `jam`, `plat_no`, `nama_motor`, `tahun_kendaraan`, `id_paket_service`, `id_turun_mesin`, `keluhan`, `id_status`) VALUES
(62, 13, 'A3', '2023-12-22 04:06:57', '2023-12-23 00:00:00', '12:07:00', 'R 1234 R', 'Beat', '2020', 1, 2, 'Nggak Nyala', 1),
(63, 14, 'A2', '2023-12-22 11:32:14', '2023-12-28 00:00:00', '00:00:00', 'ASDASD', 'SDASDS', '0000', 1, 2, 'ADASDASD', 1),
(64, 14, 'A3', '2023-12-22 11:35:04', '2023-12-23 00:00:00', '00:00:00', 'R 1234 BR', 'Vario ', '2010', 2, 2, 'Nggak Nyala', 4),
(65, 14, 'A2', '2023-12-29 10:01:23', '2023-12-29 00:00:00', '22:06:00', 'hfhg', 'hfhf', '0000', 1, 1, 'asdasdas', 4),
(66, 14, 'A3', '2023-12-29 10:19:00', '2023-12-29 00:00:00', '21:03:00', 'aSdasd', 'asdsdas', '0000', 1, 1, 'asasaddasdd', 4),
(67, 14, 'A4', '2023-12-29 10:35:38', '2023-12-29 00:00:00', '21:03:00', 'kJShdj', 'jasgdjs', '0000', 1, 1, 'asdasdasasd', 4),
(68, 14, 'A5', '2023-12-29 10:36:09', '2023-12-29 00:00:00', '22:22:00', 'asdasdsa', 'asdsa', '0000', 2, 2, 'sdasdsadasdsasasdas', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_booking_data` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nota`
--

INSERT INTO `nota` (`id_nota`, `id_booking_data`, `content`, `harga`) VALUES
(17, 62, 'Ganti Oli : 20.000\r\nService : 30.000', 50000),
(18, 62, '<p>SF</p>\r\n<p>ADS</p>\r\n<p>ASDA</p>\r\n<p>FSA</p>', 123213),
(19, 63, '<p>HEMKAS</p>\r\n<p>SDKSAHDKSUGDKU</p>\r\n<p>Akjshasjkdasdj</p>\r\n<p>ajs,hasjd</p>\r\n<p>askdhasjk</p>', 12121212),
(20, 62, '<ol>\r\n<li>Ganti Oli : 20.000</li>\r\n<li>Ganti Aki : 30.000</li>\r\n<li>Ganti Sparepart : 20.000</li>\r\n<li>Service : 50.000</li>\r\n<li>Ganti Jok : 30.000</li>\r\n</ol>', 150000),
(21, 62, '<ol>\r\n<li>ganti oli : 20.000</li>\r\n<li>service : 50.000</li>\r\n</ol>', 70000),
(22, 64, '<ol>\r\n<li>ganti oli : 40.000</li>\r\n<li>service : 50.000</li>\r\n</ol>', 90000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_service`
--

CREATE TABLE `paket_service` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `paket_service`
--

INSERT INTO `paket_service` (`id_paket`, `nama_paket`) VALUES
(1, 'Service Ringan'),
(2, 'Service Komplit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_nama_status` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_nama_status`, `status`) VALUES
(1, 'Selesai'),
(2, 'Proses'),
(3, 'Mengantre'),
(4, 'Status');

-- --------------------------------------------------------

--
-- Struktur dari tabel `turun_mesin`
--

CREATE TABLE `turun_mesin` (
  `id_nama_turun_mesin` int(11) NOT NULL,
  `nama_turun_mesin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `turun_mesin`
--

INSERT INTO `turun_mesin` (`id_nama_turun_mesin`, `nama_turun_mesin`) VALUES
(1, 'Frame(Rangka)'),
(2, 'Mesin'),
(3, 'Kelistrikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_nama_user` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username_user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_nama_user`, `nama_lengkap`, `username_user`, `password`, `alamat`, `no_hp`) VALUES
(12, 'Fajar Akmali Rizky', 'fajar', 'fajar', 'Majenang', '0821345678'),
(13, 'Khoerotul Melina', 'meli', 'meli', 'brebes', '0987654321'),
(14, 'Resti', 'resti', 'resti', 'purwokerto', '09875665162');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_user` (`id_user`,`id_paket_service`,`id_turun_mesin`),
  ADD KEY `id_paket_service` (`id_paket_service`),
  ADD KEY `id_turun_mesin` (`id_turun_mesin`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_booking` (`id_booking_data`),
  ADD KEY `id_booking_data` (`id_booking_data`);

--
-- Indeks untuk tabel `paket_service`
--
ALTER TABLE `paket_service`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_nama_status`);

--
-- Indeks untuk tabel `turun_mesin`
--
ALTER TABLE `turun_mesin`
  ADD PRIMARY KEY (`id_nama_turun_mesin`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_nama_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `paket_service`
--
ALTER TABLE `paket_service`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_nama_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `turun_mesin`
--
ALTER TABLE `turun_mesin`
  MODIFY `id_nama_turun_mesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_nama_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_paket_service`) REFERENCES `paket_service` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_nama_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`id_turun_mesin`) REFERENCES `turun_mesin` (`id_nama_turun_mesin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_5` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_nama_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`id_booking_data`) REFERENCES `booking` (`id_booking`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
