-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2022 pada 07.39
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fpl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_user`
--

CREATE TABLE `mst_user` (
  `IDX` int(11) NOT NULL,
  `NAMA_USER` text NOT NULL,
  `JABATAN_USER` text NOT NULL,
  `NIPP_USER` varchar(32) NOT NULL,
  `TELPON_USER` varchar(32) NOT NULL,
  `UNIT_KERJA` text NOT NULL,
  `STATUS` text NOT NULL,
  `USERNAME` text NOT NULL,
  `PASSWORD` varchar(32) NOT NULL,
  `DIVISION` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mst_user`
--

INSERT INTO `mst_user` (`IDX`, `NAMA_USER`, `JABATAN_USER`, `NIPP_USER`, `TELPON_USER`, `UNIT_KERJA`, `STATUS`, `USERNAME`, `PASSWORD`, `DIVISION`) VALUES
(1, 'Meiky Fitrada', 'Administrator Utilitas dan Sistem Informasi', '105309', '08111111111', 'Operasi & Teknik', '0', 'adm.optek', 'e10adc3949ba59abbe56e057f20f883e', 'B3'),
(2, 'Satriyo Agung Nugroho', 'Manager SDM, Umum dan KBL', '105013', '08111111111', 'Keuangan, Umum dan SDM', '1', 'approval.manager', 'e10adc3949ba59abbe56e057f20f883e', 'B4'),
(3, 'MUHAMMAD FARID ANANDA', 'ADMINISTRASI MANAJEMEN RESIKO  PENGINTERNALAN & MUTU', '105110', '08011111111', 'Kepatuhan Bisnis', '0', 'adm.kb', 'e10adc3949ba59abbe56e057f20f883e', 'B1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akomodasi`
--

CREATE TABLE `tb_akomodasi` (
  `IDX_A` int(11) NOT NULL,
  `IDX_U` int(11) NOT NULL,
  `DATE_IN` datetime DEFAULT NULL,
  `NOMOR_A` text NOT NULL,
  `NIPP_A` tinytext NOT NULL,
  `NAMA_A` text NOT NULL,
  `JABATAN_A` tinytext NOT NULL,
  `UNIT_KERJA_A` tinytext NOT NULL,
  `ACARA_A` text NOT NULL,
  `RINCIAN_PESANAN` text NOT NULL,
  `NOMOR_SPPD` text NOT NULL,
  `TANGGAL_K_M` date DEFAULT NULL,
  `TANGGAL_K_A` date DEFAULT NULL,
  `TELEPON_A` tinytext NOT NULL,
  `ISI_A` longtext NOT NULL,
  `PROCESS` tinytext NOT NULL,
  `VENDOR` text NOT NULL,
  `DATE_TTD` date DEFAULT NULL,
  `DIVISION` int(11) NOT NULL,
  `SURAT_KE` int(11) NOT NULL,
  `DATE_NOMOR` date DEFAULT NULL,
  `LINK` text NOT NULL,
  `FILE` text NOT NULL,
  `STATUS` tinytext NOT NULL,
  `ACTIVE` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_akomodasi`
--

INSERT INTO `tb_akomodasi` (`IDX_A`, `IDX_U`, `DATE_IN`, `NOMOR_A`, `NIPP_A`, `NAMA_A`, `JABATAN_A`, `UNIT_KERJA_A`, `ACARA_A`, `RINCIAN_PESANAN`, `NOMOR_SPPD`, `TANGGAL_K_M`, `TANGGAL_K_A`, `TELEPON_A`, `ISI_A`, `PROCESS`, `VENDOR`, `DATE_TTD`, `DIVISION`, `SURAT_KE`, `DATE_NOMOR`, `LINK`, `FILE`, `STATUS`, `ACTIVE`) VALUES
(3, 105309, NULL, '', '105309', 'Meiky Fitrada', 'Administrator Utilitas dan Sistem Informasi', 'Operasi & Teknik', 'asdsad', 'asdasdasdasdasdasdasdasd', 'asdsad', '2022-09-01', '2022-09-14', '08111111111', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:600px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\" style=\"width:20%\">JUMLAH ORANG</th>\r\n			<th scope=\"col\" style=\"width:60%\">AKOMODASI (HOTEL &amp; TIKET)</th>\r\n			<th scope=\"col\" style=\"width:20%\">KETERANGAN</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:60%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n			</td>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'KIRIM', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', '2022-09-01', 0, 0, NULL, '', '', '', '1'),
(4, 105309, NULL, '', '105309', 'Meiky Fitrada', 'Administrator Utilitas dan Sistem Informasi', 'Operasi & Teknik', '', '', '', '0000-00-00', '0000-00-00', '08111111111', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:600px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\" style=\"width:20%\">JUMLAH ORANG</th>\r\n			<th scope=\"col\" style=\"width:60%\">AKOMODASI (HOTEL &amp; TIKET)</th>\r\n			<th scope=\"col\" style=\"width:20%\">KETERANGAN</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:60%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n			</td>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'KIRIM', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', '2022-09-01', 0, 0, NULL, '', '', '', '1'),
(5, 105309, NULL, '', '105309', 'Meiky Fitrada', 'Administrator Utilitas dan Sistem Informasi', 'Operasi & Teknik', 'asdas', '', 'sadsa', '2022-09-08', '2022-09-15', '08111111111', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:600px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\" style=\"width:20%\">JUMLAH ORANG</th>\r\n			<th scope=\"col\" style=\"width:60%\">AKOMODASI (HOTEL &amp; TIKET)</th>\r\n			<th scope=\"col\" style=\"width:20%\">KETERANGAN</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:60%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n			</td>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'KIRIM', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', '2022-09-01', 0, 0, NULL, '', '', '', '1'),
(6, 105309, NULL, '', '105309', 'Meiky Fitrada', 'Administrator Utilitas dan Sistem Informasi', 'Operasi & Teknik', 'asdas', '', 'sadsa', '2022-09-08', '2022-09-15', '08111111111', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:600px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\" style=\"width:20%\">JUMLAH ORANG</th>\r\n			<th scope=\"col\" style=\"width:60%\">AKOMODASI (HOTEL &amp; TIKET)</th>\r\n			<th scope=\"col\" style=\"width:20%\">KETERANGAN</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:60%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n			</td>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'KIRIM', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', '2022-09-01', 0, 0, NULL, '', '', '', '1'),
(7, 105309, '2022-09-01 12:15:25', '', '105309', 'Meiky Fitrada', 'Administrator Utilitas dan Sistem Informasi', 'Operasi & Teknik', 'asdsa', 'sadsad', 'asdsad', '2022-09-01', '2022-09-09', '08111111111', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:600px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\" style=\"width:20%\">JUMLAH ORANG</th>\r\n			<th scope=\"col\" style=\"width:60%\">AKOMODASI (HOTEL &amp; TIKET)</th>\r\n			<th scope=\"col\" style=\"width:20%\">KETERANGAN</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:60%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n			</td>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'KIRIM', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', '2022-09-01', 0, 0, NULL, '', '', '', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akomodasi_j`
--

CREATE TABLE `tb_akomodasi_j` (
  `IDX` int(11) NOT NULL,
  `NAMA_AKOMODASI` varchar(50) NOT NULL,
  `KET` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_akomodasi_j`
--

INSERT INTO `tb_akomodasi_j` (`IDX`, `NAMA_AKOMODASI`, `KET`) VALUES
(1, 'HOTEL', ''),
(2, 'TIKET PESAWAT', ''),
(3, 'TIKET KERETA API', ''),
(4, 'TIKET KAPAL', ''),
(5, 'TIKET BIS/TRAVEL', ''),
(6, 'LAIN-LAIN', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akomodasi_jenis`
--

CREATE TABLE `tb_akomodasi_jenis` (
  `IDX_AJ` int(11) NOT NULL,
  `NAMA_AJ` tinytext NOT NULL,
  `IDX_A` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_akomodasi_jenis`
--

INSERT INTO `tb_akomodasi_jenis` (`IDX_AJ`, `NAMA_AJ`, `IDX_A`) VALUES
(1, 'DINAS HARIAN', 1),
(2, 'DINAS HARIAN', 2),
(3, 'DINAS HARIAN', 3),
(4, 'DINAS HARIAN', 5),
(5, 'DINAS HARIAN', 6),
(6, 'DINAS HARIAN', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jamuan`
--

CREATE TABLE `tb_jamuan` (
  `IDX_J` int(11) NOT NULL,
  `IDX_U` int(11) NOT NULL,
  `DATE_IN` datetime DEFAULT NULL,
  `NOMOR_J` text NOT NULL,
  `NAMA_J` tinytext NOT NULL,
  `NIPP_J` tinytext NOT NULL,
  `JABATAN_J` tinytext NOT NULL,
  `UNIT_KERJA_J` tinytext NOT NULL,
  `ACARA_J` text NOT NULL,
  `JUMLAH_J` int(11) NOT NULL,
  `TEMPAT_J` text NOT NULL,
  `WAKTU_M` time DEFAULT NULL,
  `WAKTU_A` time DEFAULT NULL,
  `DATE_J` date NOT NULL,
  `TELEPON_J` tinytext NOT NULL,
  `RINCIAN_PESANAN` text NOT NULL,
  `ISI_J` longtext NOT NULL,
  `PROCESS` tinytext NOT NULL,
  `VENDOR` text NOT NULL,
  `DATE_TTD` date NOT NULL,
  `DIVISION` varchar(4) NOT NULL,
  `DATE_NOMOR` date DEFAULT NULL,
  `SURAT_KE` bigint(20) NOT NULL,
  `LINK` text NOT NULL,
  `FILE` text NOT NULL,
  `STATUS` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jamuan`
--

INSERT INTO `tb_jamuan` (`IDX_J`, `IDX_U`, `DATE_IN`, `NOMOR_J`, `NAMA_J`, `NIPP_J`, `JABATAN_J`, `UNIT_KERJA_J`, `ACARA_J`, `JUMLAH_J`, `TEMPAT_J`, `WAKTU_M`, `WAKTU_A`, `DATE_J`, `TELEPON_J`, `RINCIAN_PESANAN`, `ISI_J`, `PROCESS`, `VENDOR`, `DATE_TTD`, `DIVISION`, `DATE_NOMOR`, `SURAT_KE`, `LINK`, `FILE`, `STATUS`) VALUES
(1, 105309, NULL, '', 'Meiky Fitrada', '105309', 'Administrator Utilitas dan Sistem Informasi', 'Operasi & Teknik', 'acara kantor', 0, '', '23:48:42', NULL, '2022-06-06', '08111111111', '', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:600px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\" style=\"width:20%\">WAKTU</th>\r\n			<th scope=\"col\" style=\"width:20%\">JUMLAH ORANG</th>\r\n			<th scope=\"col\" style=\"width:50%\">JAMUAN</th>\r\n			<th scope=\"col\" style=\"width:20%\">TEMPAT</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>21321</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>21321</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:50%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>wowowow</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n			</td>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>kantor</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'KIRIM', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', '2022-06-06', 'B3', NULL, 0, '', '', '1'),
(2, 105309, NULL, '', 'Meiky Fitrada', '105309', 'Administrator Utilitas dan Sistem Informasi', 'Operasi & Teknik', 'PENYERAHAN BUNGA', 0, '', NULL, NULL, '2022-06-14', '08111111111', '', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:600px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\" style=\"width:20%\">WAKTU</th>\r\n			<th scope=\"col\" style=\"width:20%\">JUMLAH ORANG</th>\r\n			<th scope=\"col\" style=\"width:50%\">JAMUAN</th>\r\n			<th scope=\"col\" style=\"width:20%\">TEMPAT</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:20%\">\r\n			<p>1</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:20%\">\r\n			<p>1</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:50%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>1</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n			</td>\r\n			<td style=\"width:20%\">\r\n			<p>1</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'KIRIM', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', '2022-06-27', 'B3', NULL, 0, '', '', '1'),
(3, 105309, NULL, 'JD.01/27/06/B3/C.BKL-22', 'Meiky Fitrada', '105309', 'Administrator Utilitas dan Sistem Informasi', 'Operasi & Teknik', 'PENYERAHAN BUNGA 2', 0, '', NULL, NULL, '2022-06-27', '08111111111', 'BUKET 1', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:600px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\" style=\"width:20%\">WAKTU</th>\r\n			<th scope=\"col\" style=\"width:20%\">JUMLAH ORANG</th>\r\n			<th scope=\"col\" style=\"width:50%\">JAMUAN</th>\r\n			<th scope=\"col\" style=\"width:20%\">TEMPAT</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:20%\">\r\n			<p>1</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:20%\">\r\n			<p>1</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:50%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>1</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n			</td>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>1</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'APPROVE', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', '2022-06-27', 'B3', '2022-06-27', 1, '', '', '1'),
(4, 105013, NULL, '', 'Satriyo Agung Nugroho', '105013', 'Manager SDM, Umum dan KBL', 'Keuangan, Umum dan SDM', 'PENYERAHAN BUNGA', 0, '', NULL, NULL, '2022-06-01', '08111111111', 'asdsadasdsa', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:600px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\" style=\"width:20%\">WAKTU</th>\r\n			<th scope=\"col\" style=\"width:20%\">JUMLAH ORANG</th>\r\n			<th scope=\"col\" style=\"width:50%\">JAMUAN</th>\r\n			<th scope=\"col\" style=\"width:20%\">TEMPAT</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:20%\">\r\n			<p>11</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:50%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n			</td>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'KIRIM', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', '2022-06-29', 'B4', NULL, 0, '', '', '1'),
(5, 105013, NULL, 'JD.01/29/06/B4/C.BKL-22', 'Satriyo Agung Nugroho', '105013', 'Manager SDM, Umum dan KBL', 'Keuangan, Umum dan SDM', 'PENYERAHAN BUNGA', 11, '', NULL, NULL, '2022-06-01', '08111111111', 'asdsadasdsa', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:600px\">\n	<thead>\n		<tr>\n			<th scope=\"col\" style=\"width:20%\">WAKTU</th>\n			<th scope=\"col\" style=\"width:20%\">JUMLAH ORANG</th>\n			<th scope=\"col\" style=\"width:50%\">JAMUAN</th>\n			<th scope=\"col\" style=\"width:20%\">TEMPAT</th>\n		</tr>\n	</thead>\n	<tbody>\n		<tr>\n			<td style=\"width:20%\">\n			<p>11-20</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n			</td>\n			<td style=\"width:20%\">\n			<p>11</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n			</td>\n			<td style=\"width:50%\">\n			<p>SADSADASDSADSA</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\n			</td>\n			<td style=\"width:20%\">\n			<p>HOTEL</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n', 'APPROVE', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', '2022-06-29', 'B4', '2022-06-29', 1, '', '', '1'),
(6, 105309, NULL, '', 'Meiky Fitrada', '105309', 'Administrator Utilitas dan Sistem Informasi', 'Operasi & Teknik', 'PENYERAHAN BUNGA 3', 112, 'BAHARI1', NULL, NULL, '2022-06-29', '08111111111', 'BUNGA 1 BUNGA 2 3', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:600px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\" style=\"width:20%\">WAKTU</th>\r\n			<th scope=\"col\" style=\"width:20%\">JUMLAH ORANG</th>\r\n			<th scope=\"col\" style=\"width:50%\">JAMUAN</th>\r\n			<th scope=\"col\" style=\"width:20%\">TEMPAT</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:20%\">\r\n			<p>1231231</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:20%\">\r\n			<p>11</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:50%\">\r\n			<p>BUNGA 2 BUNGA 2</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n			</td>\r\n			<td style=\"width:20%\">\r\n			<p>BAHARI</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'KIRIM', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', '2022-06-29', 'B3', NULL, 0, '', '', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jamuan_jenis`
--

CREATE TABLE `tb_jamuan_jenis` (
  `IDX_JJ` int(11) NOT NULL,
  `NAMA_JENIS` tinytext NOT NULL,
  `IDX_J` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jamuan_jenis`
--

INSERT INTO `tb_jamuan_jenis` (`IDX_JJ`, `NAMA_JENIS`, `IDX_J`) VALUES
(3, 'RAPAT EKSTERNAL', 3),
(4, 'LEMBUR', 4),
(5, 'LEMBUR', 5),
(7, 'TAMU DINAS', 2),
(9, 'TAMU DINAS', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_j`
--

CREATE TABLE `tb_jenis_j` (
  `IDX` int(11) NOT NULL,
  `JENIS_JAMUAN` varchar(32) NOT NULL,
  `KET` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis_j`
--

INSERT INTO `tb_jenis_j` (`IDX`, `JENIS_JAMUAN`, `KET`) VALUES
(1, 'TAMU DINAS', ''),
(2, 'LEMBUR', ''),
(3, 'BANTUAN KONSUMSI', ''),
(4, 'RAPAT INTERNAL', ''),
(5, 'RAPAT EKSTERNAL', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_kendaraan`
--

CREATE TABLE `tb_jenis_kendaraan` (
  `IDX` int(11) NOT NULL,
  `NAMA_JK` tinytext NOT NULL,
  `PEMINJAM` text NOT NULL,
  `STATUS` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis_kendaraan`
--

INSERT INTO `tb_jenis_kendaraan` (`IDX`, `NAMA_JK`, `PEMINJAM`, `STATUS`) VALUES
(1, 'INNOVA', 'Operasi & Teknik', '0'),
(2, 'AVANZA', '', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_pu`
--

CREATE TABLE `tb_jenis_pu` (
  `IDX` int(11) NOT NULL,
  `NAMA_JENIS` text NOT NULL,
  `KET` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis_pu`
--

INSERT INTO `tb_jenis_pu` (`IDX`, `NAMA_JENIS`, `KET`) VALUES
(1, 'Karangan Bunga', ''),
(2, 'Pembelian Barang', ''),
(3, 'Pembelian Souvenir', ''),
(4, 'Pemberian Bantuan Proposal Kegiatan', ''),
(5, 'Tagihan Toko Stok Per Bagian Regional', ''),
(6, 'Penggantian BBM', ''),
(7, 'Lain-lain', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelayanan_umum`
--

CREATE TABLE `tb_pelayanan_umum` (
  `IDX_UMUM` int(11) NOT NULL,
  `IDX_U` int(11) NOT NULL,
  `DATE_IN` datetime DEFAULT NULL,
  `NOMOR_UMUM` text DEFAULT NULL,
  `NAMA_PEMOHON` text DEFAULT NULL,
  `JABATAN` text DEFAULT NULL,
  `NIPP` tinytext DEFAULT NULL,
  `TELEPON_UMUM` tinytext DEFAULT NULL,
  `UNIT_KERJA` tinytext DEFAULT NULL,
  `PERMOHONAN_UMUM` text DEFAULT NULL,
  `DATE_UMUM` date DEFAULT NULL,
  `TIME_UMUM` time DEFAULT NULL,
  `BENTUK_UMUM` text DEFAULT NULL,
  `TUJUAN_UMUM` text DEFAULT NULL,
  `RINCIAN_PESANAN` text NOT NULL,
  `LINK` text DEFAULT NULL,
  `FILE` text DEFAULT NULL,
  `PROCESS` text DEFAULT NULL,
  `VENDOR` text NOT NULL,
  `DIVISION` varchar(4) NOT NULL,
  `DATE_NOMOR` date DEFAULT NULL,
  `SURAT_KE` varchar(10) NOT NULL,
  `APROVE` enum('0','1') NOT NULL,
  `ACTIVE` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelayanan_umum`
--

INSERT INTO `tb_pelayanan_umum` (`IDX_UMUM`, `IDX_U`, `DATE_IN`, `NOMOR_UMUM`, `NAMA_PEMOHON`, `JABATAN`, `NIPP`, `TELEPON_UMUM`, `UNIT_KERJA`, `PERMOHONAN_UMUM`, `DATE_UMUM`, `TIME_UMUM`, `BENTUK_UMUM`, `TUJUAN_UMUM`, `RINCIAN_PESANAN`, `LINK`, `FILE`, `PROCESS`, `VENDOR`, `DIVISION`, `DATE_NOMOR`, `SURAT_KE`, `APROVE`, `ACTIVE`) VALUES
(3, 105013, NULL, 'XX.XX/XX/XX/XX/X.XXX-XX', 'Satriyo Agung Nugroho', 'Manager SDM, Umum dan KBL', '105013', '08111111111', 'Keuangan, Umum dan SDM', 'asd', '0000-00-00', '00:00:00', ' ', '', '', NULL, NULL, 'DRAFT', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', 'B4', NULL, '', '0', '1'),
(4, 105013, NULL, 'XX.XX/XX/XX/XX/X.XXX-XX', 'Satriyo Agung Nugroho', 'Manager SDM, Umum dan KBL', '105013', '08111111111', 'Keuangan, Umum dan SDM', '', '0000-00-00', '00:00:00', 'Karangan Bunga', '', '', NULL, NULL, 'DRAFT', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', 'B4', NULL, '', '0', '1'),
(5, 105013, NULL, 'XX.XX/XX/XX/XX/X.XXX-XX', 'Satriyo Agung Nugroho', 'Manager SDM, Umum dan KBL', '105013', '08111111111', 'Keuangan, Umum dan SDM', 'asdsad', '2022-06-06', '10:38:00', 'Pemberian Bantuan Proposal Kegiatan', 'asdsadasdsa', '', NULL, NULL, 'DRAFT', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', 'B4', NULL, '', '0', '1'),
(6, 105309, NULL, 'XX.XX/XX/XX/XX/X.XXX-XX', 'Meiky Fitrada', 'Administrator Utilitas dan Sistem Informasi', '105309', '  08111111111', 'Operasi & Teknik', 'asdsad', '2022-06-07', '11:02:00', 'Karangan Bunga', 'asdsada', '', NULL, NULL, 'DRAFT', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', 'B3', NULL, '', '0', '1'),
(7, 105309, NULL, 'PU.01/26/06/B3/C.BKL-22', 'Meiky Fitrada', 'Administrator Utilitas dan Sistem Informasi', '105309', '08111111111', 'Operasi & Teknik', 'asdsad', '2022-06-20', '08:51:00', 'Penggantian BBM', 'ASDSADSAD', 'SADASDASDSAD', NULL, NULL, 'APPROVE', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', 'B3', '2022-06-26', '01', '0', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman_kendaraan`
--

CREATE TABLE `tb_peminjaman_kendaraan` (
  `IDX_PK` int(11) NOT NULL,
  `IDX_U` int(11) NOT NULL,
  `DATE_IN` datetime DEFAULT NULL,
  `NOMOR_PK` text NOT NULL,
  `NAMA_PK` text NOT NULL,
  `JABATAN_PK` tinytext NOT NULL,
  `NIPP_PK` tinytext NOT NULL,
  `TELEPON_PK` tinytext NOT NULL,
  `UNIT_KERJA_PK` tinytext NOT NULL,
  `PINJAM_KENDARAAN` tinytext NOT NULL,
  `DATE_PK` date NOT NULL,
  `TIME_PK_AWAL` time NOT NULL,
  `TIME_PK_AKHIR` time NOT NULL,
  `TUJUAN_PK` text NOT NULL,
  `KEPERLUAN` text NOT NULL,
  `JENIS_KENDARAAN` tinytext DEFAULT NULL,
  `PENGEMUDI` tinytext NOT NULL,
  `SPEEDO_AWAL` tinytext NOT NULL,
  `SPEEDO_AKHIR` tinytext NOT NULL,
  `DATE_NOMOR` date DEFAULT NULL,
  `SURAT_KE` varchar(4) NOT NULL,
  `DIVISION` varchar(4) NOT NULL,
  `LINK` text NOT NULL,
  `FILE` text NOT NULL,
  `PROCESS` tinytext NOT NULL,
  `ACTIVE` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_peminjaman_kendaraan`
--

INSERT INTO `tb_peminjaman_kendaraan` (`IDX_PK`, `IDX_U`, `DATE_IN`, `NOMOR_PK`, `NAMA_PK`, `JABATAN_PK`, `NIPP_PK`, `TELEPON_PK`, `UNIT_KERJA_PK`, `PINJAM_KENDARAAN`, `DATE_PK`, `TIME_PK_AWAL`, `TIME_PK_AKHIR`, `TUJUAN_PK`, `KEPERLUAN`, `JENIS_KENDARAAN`, `PENGEMUDI`, `SPEEDO_AWAL`, `SPEEDO_AKHIR`, `DATE_NOMOR`, `SURAT_KE`, `DIVISION`, `LINK`, `FILE`, `PROCESS`, `ACTIVE`) VALUES
(1, 105309, NULL, '', 'Meiky Fitrada', 'Administrator Utilitas dan Sistem Informasi', '105309', '08111111111', 'Operasi & Teknik', 'INNOVA', '2022-06-16', '11:54:00', '23:54:00', 'asdsad', '', NULL, 'asdsad', 'asdsadsa', '', NULL, '', 'B3', '', '', 'DRAFT', '1'),
(2, 105309, NULL, '', 'Meiky Fitrada', 'Administrator Utilitas dan Sistem Informasi', '105309', '08111111111', 'Operasi & Teknik', 'AVANZA', '2022-06-16', '11:54:00', '23:54:00', 'asdsad', '', NULL, 'asdsad', 'asdsadsa', '', NULL, '', 'B3', '', '', 'DRAFT', '1'),
(3, 105309, NULL, 'PM.01/26/06/B3/C.BKL-22', 'Meiky Fitrada', 'Administrator Utilitas dan Sistem Informasi', '105309', '08111111111', 'Operasi & Teknik', 'INNOVA', '2022-06-15', '01:20:00', '23:26:00', 'SAMUDERA', '', NULL, 'MEIKY', '1500', '3500', '2022-06-26', '01', 'B3', '', '', 'FINISH', '1'),
(4, 105309, NULL, 'PM.02/26/06/B3/C.BKL-22', 'Meiky Fitrada', 'Administrator Utilitas dan Sistem Informasi', '105309', '08111111111', 'Operasi & Teknik', 'AVANZA', '2022-06-01', '02:24:00', '23:29:00', 'NUSANTARA', 'ACARA', NULL, 'MEIKY', '1500', '3500', '2022-06-26', '02', 'B3', '', '', 'FINISH', '1'),
(5, 105309, NULL, 'PM.01/31/08/B3/C.BKL-22', 'Meiky Fitrada', 'Administrator Utilitas dan Sistem Informasi', '105309', '08111111111', 'Operasi & Teknik', 'INNOVA', '2022-08-31', '04:55:00', '23:55:00', 'asda', 'dasdasd', NULL, 'dol', '10000', '', '2022-08-31', '01', 'B3', '', '', 'APPROVE', '1'),
(6, 105309, NULL, '', 'Meiky Fitrada', 'Administrator Utilitas dan Sistem Informasi', '105309', '08111111111', 'Operasi & Teknik', 'INNOVA', '2022-08-19', '12:03:00', '23:33:00', '123231', 'asda', NULL, 'dol', '111111', '', NULL, '', 'B3', '', '', 'KIRIM', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_process_hist`
--

CREATE TABLE `tb_process_hist` (
  `IDX` int(11) NOT NULL,
  `KOMENTAR` text DEFAULT NULL,
  `DATE_TIME` datetime NOT NULL,
  `ID` int(11) NOT NULL,
  `JENIS` text NOT NULL,
  `NIPP` varchar(32) NOT NULL,
  `STATUS` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_process_hist`
--

INSERT INTO `tb_process_hist` (`IDX`, `KOMENTAR`, `DATE_TIME`, `ID`, `JENIS`, `NIPP`, `STATUS`) VALUES
(1, '', '2022-06-06 10:24:18', 1, 'PELAYANAN UMUM', '105013', 'DRAFT'),
(2, '', '2022-06-06 10:27:14', 2, 'PELAYANAN UMUM', '105013', 'DRAFT'),
(3, '', '2022-06-06 10:27:53', 3, 'PELAYANAN UMUM', '105013', 'DRAFT'),
(4, '', '2022-06-06 10:31:16', 4, 'PELAYANAN UMUM', '105013', 'DRAFT'),
(5, '', '2022-06-06 10:36:20', 5, 'PELAYANAN UMUM', '105013', 'DRAFT'),
(6, '', '2022-06-06 11:03:06', 6, 'PELAYANAN UMUM', '105309', 'DRAFT'),
(7, '', '2022-06-06 11:03:12', 6, 'PELAYANAN UMUM', '105309', 'KIRIM'),
(8, '', '2022-06-06 11:04:23', 6, 'PELAYANAN UMUM', '105309', 'DRAFT'),
(9, '', '2022-06-06 11:25:36', 1, 'JAMUAN', '105309', 'KIRIM'),
(10, '', '2022-06-15 11:54:19', 1, 'PEMINJAMAN KENDARAAN', '105309', 'DRAFT'),
(11, '', '2022-06-20 08:51:13', 7, 'PELAYANAN UMUM', '105309', 'KIRIM'),
(12, '', '2022-06-26 23:21:54', 3, 'PEMINJAMAN KENDARAAN', '105309', 'KIRIM'),
(13, '', '2022-06-26 23:22:21', 7, 'PELAYANAN UMUM', '105013', 'PASS'),
(14, '', '2022-06-26 23:23:10', 3, 'PEMINJAMAN KENDARAAN', '105013', 'PASS'),
(15, '', '2022-06-26 23:23:24', 3, 'PEMINJAMAN KENDARAAN', '105309', 'FINISH'),
(16, '', '2022-06-26 23:24:51', 4, 'PEMINJAMAN KENDARAAN', '105309', 'KIRIM'),
(17, '', '2022-06-26 23:25:05', 4, 'PEMINJAMAN KENDARAAN', '105013', 'PASS'),
(18, '', '2022-06-26 23:26:01', 4, 'PEMINJAMAN KENDARAAN', '105309', 'FINISH'),
(19, '', '2022-06-27 00:32:21', 2, 'JAMUAN', '105309', 'KIRIM'),
(20, '', '2022-06-27 00:33:21', 3, 'JAMUAN', '105309', 'KIRIM'),
(21, '', '2022-06-27 00:34:12', 3, 'JAMUAN', '105013', 'PASS'),
(22, '', '2022-06-29 23:13:18', 4, 'JAMUAN', '105013', 'KIRIM'),
(23, '', '2022-06-29 23:16:34', 5, 'JAMUAN', '105013', 'KIRIM'),
(24, '', '2022-06-29 23:16:54', 5, 'JAMUAN', '105013', 'PASS'),
(25, '', '2022-06-29 23:20:58', 2, 'JAMUAN', '105309', 'DRAFT'),
(26, '', '2022-06-29 23:21:08', 2, 'JAMUAN', '105309', 'KIRIM'),
(27, '', '2022-06-29 23:21:27', 1, 'JAMUAN', '105309', 'KIRIM'),
(28, '', '2022-06-29 23:24:27', 6, 'JAMUAN', '105309', 'KIRIM'),
(29, '', '2022-06-29 23:25:41', 6, 'JAMUAN', '105309', 'KIRIM'),
(30, 'check', '2022-07-03 21:22:32', 1, 'AKOMODASI', '105309', 'KIRIM'),
(31, '', '2022-07-03 23:37:41', 2, 'AKOMODASI', '105013', 'KIRIM'),
(32, '', '2022-08-31 22:56:19', 5, 'PEMINJAMAN KENDARAAN', '105309', 'KIRIM'),
(33, '', '2022-08-31 22:57:37', 5, 'PEMINJAMAN KENDARAAN', '105013', 'PASS'),
(34, '', '2022-08-31 22:59:10', 6, 'PEMINJAMAN KENDARAAN', '105309', 'KIRIM'),
(35, '', '2022-09-01 12:12:12', 3, 'AKOMODASI', '105309', 'KIRIM'),
(36, '', '2022-09-01 12:13:25', 4, 'AKOMODASI', '105309', 'KIRIM'),
(37, '', '2022-09-01 12:13:51', 5, 'AKOMODASI', '105309', 'KIRIM'),
(38, '', '2022-09-01 12:14:15', 6, 'AKOMODASI', '105309', 'KIRIM'),
(39, '', '2022-09-01 12:15:25', 7, 'AKOMODASI', '105309', 'KIRIM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_unit_kerja`
--

CREATE TABLE `tb_unit_kerja` (
  `IDX` int(11) NOT NULL,
  `NAMA_UK` tinytext NOT NULL,
  `KET_UK` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_unit_kerja`
--

INSERT INTO `tb_unit_kerja` (`IDX`, `NAMA_UK`, `KET_UK`) VALUES
(1, 'Kepatuhan Bisnis', ''),
(2, 'Komersial', ''),
(3, 'Keuangan, Umum dan SDM', ''),
(4, 'Operasi & Teknik', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`IDX`);

--
-- Indeks untuk tabel `tb_akomodasi`
--
ALTER TABLE `tb_akomodasi`
  ADD PRIMARY KEY (`IDX_A`);

--
-- Indeks untuk tabel `tb_akomodasi_j`
--
ALTER TABLE `tb_akomodasi_j`
  ADD PRIMARY KEY (`IDX`);

--
-- Indeks untuk tabel `tb_akomodasi_jenis`
--
ALTER TABLE `tb_akomodasi_jenis`
  ADD PRIMARY KEY (`IDX_AJ`);

--
-- Indeks untuk tabel `tb_jamuan`
--
ALTER TABLE `tb_jamuan`
  ADD PRIMARY KEY (`IDX_J`);

--
-- Indeks untuk tabel `tb_jamuan_jenis`
--
ALTER TABLE `tb_jamuan_jenis`
  ADD PRIMARY KEY (`IDX_JJ`);

--
-- Indeks untuk tabel `tb_jenis_j`
--
ALTER TABLE `tb_jenis_j`
  ADD PRIMARY KEY (`IDX`);

--
-- Indeks untuk tabel `tb_jenis_kendaraan`
--
ALTER TABLE `tb_jenis_kendaraan`
  ADD PRIMARY KEY (`IDX`);

--
-- Indeks untuk tabel `tb_jenis_pu`
--
ALTER TABLE `tb_jenis_pu`
  ADD PRIMARY KEY (`IDX`);

--
-- Indeks untuk tabel `tb_pelayanan_umum`
--
ALTER TABLE `tb_pelayanan_umum`
  ADD UNIQUE KEY `IDX_UMUM` (`IDX_UMUM`);

--
-- Indeks untuk tabel `tb_peminjaman_kendaraan`
--
ALTER TABLE `tb_peminjaman_kendaraan`
  ADD PRIMARY KEY (`IDX_PK`);

--
-- Indeks untuk tabel `tb_process_hist`
--
ALTER TABLE `tb_process_hist`
  ADD PRIMARY KEY (`IDX`);

--
-- Indeks untuk tabel `tb_unit_kerja`
--
ALTER TABLE `tb_unit_kerja`
  ADD PRIMARY KEY (`IDX`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `IDX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_akomodasi`
--
ALTER TABLE `tb_akomodasi`
  MODIFY `IDX_A` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_akomodasi_j`
--
ALTER TABLE `tb_akomodasi_j`
  MODIFY `IDX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_akomodasi_jenis`
--
ALTER TABLE `tb_akomodasi_jenis`
  MODIFY `IDX_AJ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_jamuan`
--
ALTER TABLE `tb_jamuan`
  MODIFY `IDX_J` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_jamuan_jenis`
--
ALTER TABLE `tb_jamuan_jenis`
  MODIFY `IDX_JJ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_j`
--
ALTER TABLE `tb_jenis_j`
  MODIFY `IDX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_kendaraan`
--
ALTER TABLE `tb_jenis_kendaraan`
  MODIFY `IDX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_pu`
--
ALTER TABLE `tb_jenis_pu`
  MODIFY `IDX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_pelayanan_umum`
--
ALTER TABLE `tb_pelayanan_umum`
  MODIFY `IDX_UMUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_peminjaman_kendaraan`
--
ALTER TABLE `tb_peminjaman_kendaraan`
  MODIFY `IDX_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_process_hist`
--
ALTER TABLE `tb_process_hist`
  MODIFY `IDX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tb_unit_kerja`
--
ALTER TABLE `tb_unit_kerja`
  MODIFY `IDX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
