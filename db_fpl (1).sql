-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2022 pada 07.51
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

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
(3, 'MUHAMMAD FARID ANANDA', 'ADMINISTRASI MANAJEMEN RESIKO  PENGINTERNALAN & MUTU', '105110', '08011111111', 'KEPATUHAN BISNIS', '0', 'adm.kb', 'e10adc3949ba59abbe56e057f20f883e', 'B1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akomodasi`
--

CREATE TABLE `tb_akomodasi` (
  `IDX_A` int(11) NOT NULL,
  `IDX_U` int(11) NOT NULL,
  `NOMOR_A` text NOT NULL,
  `NIPP_A` tinytext NOT NULL,
  `NAMA_A` text NOT NULL,
  `JABATAN_A` tinytext NOT NULL,
  `UNIT_KERJA_A` tinytext NOT NULL,
  `ACARA_A` text NOT NULL,
  `NOMOR_SPPD` text NOT NULL,
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akomodasi_jenis`
--

CREATE TABLE `tb_akomodasi_jenis` (
  `IDX_AJ` int(11) NOT NULL,
  `NAMA_AJ` tinytext NOT NULL,
  `IDX_A` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jamuan`
--

CREATE TABLE `tb_jamuan` (
  `IDX_J` int(11) NOT NULL,
  `IDX_U` int(11) NOT NULL,
  `NOMOR_J` text NOT NULL,
  `NAMA_J` tinytext NOT NULL,
  `NIPP_J` tinytext NOT NULL,
  `JABATAN_J` tinytext NOT NULL,
  `UNIT_KERJA_J` tinytext NOT NULL,
  `ACARA_J` text NOT NULL,
  `DATE_J` date NOT NULL,
  `TELEPON_J` tinytext NOT NULL,
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

INSERT INTO `tb_jamuan` (`IDX_J`, `IDX_U`, `NOMOR_J`, `NAMA_J`, `NIPP_J`, `JABATAN_J`, `UNIT_KERJA_J`, `ACARA_J`, `DATE_J`, `TELEPON_J`, `ISI_J`, `PROCESS`, `VENDOR`, `DATE_TTD`, `DIVISION`, `DATE_NOMOR`, `SURAT_KE`, `LINK`, `FILE`, `STATUS`) VALUES
(1, 105309, '', 'Meiky Fitrada', '105309', 'Administrator Utilitas dan Sistem Informasi', 'Operasi & Teknik', 'acara kantor', '2022-06-06', '08111111111', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:600px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\" style=\"width:20%\">WAKTU</th>\r\n			<th scope=\"col\" style=\"width:20%\">JUMLAH ORANG</th>\r\n			<th scope=\"col\" style=\"width:50%\">JAMUAN</th>\r\n			<th scope=\"col\" style=\"width:20%\">TEMPAT</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>21321</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>21321</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:50%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>wowowow</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n			</td>\r\n			<td style=\"width:20%\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>kantor</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'KIRIM', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', '2022-06-06', 'B3', NULL, 0, '', '', '1');

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
(1, 'RAPAT INTERNAL', 1);

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
-- Struktur dari tabel `tb_pelayanan_umum`
--

CREATE TABLE `tb_pelayanan_umum` (
  `IDX_UMUM` int(11) NOT NULL,
  `IDX_U` int(11) NOT NULL,
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

INSERT INTO `tb_pelayanan_umum` (`IDX_UMUM`, `IDX_U`, `NOMOR_UMUM`, `NAMA_PEMOHON`, `JABATAN`, `NIPP`, `TELEPON_UMUM`, `UNIT_KERJA`, `PERMOHONAN_UMUM`, `DATE_UMUM`, `TIME_UMUM`, `BENTUK_UMUM`, `TUJUAN_UMUM`, `LINK`, `FILE`, `PROCESS`, `VENDOR`, `DIVISION`, `DATE_NOMOR`, `SURAT_KE`, `APROVE`, `ACTIVE`) VALUES
(3, 105013, 'XX.XX/XX/XX/XX/X.XXX-XX', 'Satriyo Agung Nugroho', 'Manager SDM, Umum dan KBL', '105013', '08111111111', 'Keuangan, Umum dan SDM', 'asd', '0000-00-00', '00:00:00', ' ', '', NULL, NULL, 'DRAFT', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', 'B4', NULL, '', '0', '1'),
(4, 105013, 'XX.XX/XX/XX/XX/X.XXX-XX', 'Satriyo Agung Nugroho', 'Manager SDM, Umum dan KBL', '105013', '08111111111', 'Keuangan, Umum dan SDM', '', '0000-00-00', '00:00:00', 'Karangan Bunga', '', NULL, NULL, 'DRAFT', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', 'B4', NULL, '', '0', '1'),
(5, 105013, 'XX.XX/XX/XX/XX/X.XXX-XX', 'Satriyo Agung Nugroho', 'Manager SDM, Umum dan KBL', '105013', '08111111111', 'Keuangan, Umum dan SDM', 'asdsad', '2022-06-06', '10:38:00', 'Pemberian Bantuan Proposal Kegiatan', 'asdsadasdsa', NULL, NULL, 'DRAFT', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', 'B4', NULL, '', '0', '1'),
(6, 105309, 'XX.XX/XX/XX/XX/X.XXX-XX', 'Meiky Fitrada', 'Administrator Utilitas dan Sistem Informasi', '105309', '  08111111111', 'Operasi & Teknik', 'asdsad', '2022-06-07', '11:02:00', 'Karangan Bunga', 'asdsada', NULL, NULL, 'DRAFT', 'Ketua Koperasi Konsumen Suaka Bahari Pelabuhan', 'B3', NULL, '', '0', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman_kendaraan`
--

CREATE TABLE `tb_peminjaman_kendaraan` (
  `IDX_PK` int(11) NOT NULL,
  `IDX_U` int(11) NOT NULL,
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

INSERT INTO `tb_peminjaman_kendaraan` (`IDX_PK`, `IDX_U`, `NOMOR_PK`, `NAMA_PK`, `JABATAN_PK`, `NIPP_PK`, `TELEPON_PK`, `UNIT_KERJA_PK`, `PINJAM_KENDARAAN`, `DATE_PK`, `TIME_PK_AWAL`, `TIME_PK_AKHIR`, `TUJUAN_PK`, `JENIS_KENDARAAN`, `PENGEMUDI`, `SPEEDO_AWAL`, `SPEEDO_AKHIR`, `DATE_NOMOR`, `SURAT_KE`, `DIVISION`, `LINK`, `FILE`, `PROCESS`, `ACTIVE`) VALUES
(1, 105309, '', 'Meiky Fitrada', 'Administrator Utilitas dan Sistem Informasi', '105309', '08111111111', 'Operasi & Teknik', 'INNOVA', '2022-06-16', '11:54:00', '23:54:00', 'asdsad', NULL, 'asdsad', 'asdsadsa', '', NULL, '', 'B3', '', '', 'DRAFT', '1');

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
(10, '', '2022-06-15 11:54:19', 1, 'PEMINJAMAN KENDARAAN', '105309', 'DRAFT');

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
-- Indeks untuk tabel `tb_jenis_kendaraan`
--
ALTER TABLE `tb_jenis_kendaraan`
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
  MODIFY `IDX_A` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_akomodasi_jenis`
--
ALTER TABLE `tb_akomodasi_jenis`
  MODIFY `IDX_AJ` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jamuan`
--
ALTER TABLE `tb_jamuan`
  MODIFY `IDX_J` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_jamuan_jenis`
--
ALTER TABLE `tb_jamuan_jenis`
  MODIFY `IDX_JJ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_kendaraan`
--
ALTER TABLE `tb_jenis_kendaraan`
  MODIFY `IDX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pelayanan_umum`
--
ALTER TABLE `tb_pelayanan_umum`
  MODIFY `IDX_UMUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_peminjaman_kendaraan`
--
ALTER TABLE `tb_peminjaman_kendaraan`
  MODIFY `IDX_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_process_hist`
--
ALTER TABLE `tb_process_hist`
  MODIFY `IDX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
