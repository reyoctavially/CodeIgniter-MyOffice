-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 05:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myoffice`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_pegawai`
--

CREATE TABLE `absensi_pegawai` (
  `kode_absensi` varchar(8) NOT NULL,
  `tanggal_absen` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `kode_pegawai` varchar(8) NOT NULL,
  `nip_kasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi_pegawai`
--

INSERT INTO `absensi_pegawai` (`kode_absensi`, `tanggal_absen`, `jam_masuk`, `jam_keluar`, `kode_pegawai`, `nip_kasi`) VALUES
('SN-001', '2021-03-22', '07:30:00', '00:24:10', 'PG-001', '198206142009011005'),
('SN-002', '2021-04-06', '22:46:49', '22:46:54', 'PG-002', '198206142009011005'),
('SN-003', '2021-04-06', '22:59:52', '22:59:55', 'PG-003', '198207152089021001'),
('SN-004', '2021-04-06', '23:01:55', '23:01:58', 'PG-004', '198207152089021001');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `kode_cuti` varchar(8) NOT NULL,
  `jenis_cuti` varchar(50) NOT NULL,
  `pemotongan_honor` varchar(50) NOT NULL,
  `tglmulaicuti` date NOT NULL,
  `tglselesaicuti` date NOT NULL,
  `statuscuti` varchar(20) NOT NULL,
  `kode_pegawai` varchar(8) NOT NULL,
  `nip_kasi` varchar(30) NOT NULL,
  `kode_pengajuan_cuti` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`kode_cuti`, `jenis_cuti`, `pemotongan_honor`, `tglmulaicuti`, `tglselesaicuti`, `statuscuti`, `kode_pegawai`, `nip_kasi`, `kode_pengajuan_cuti`) VALUES
('CT-001', 'Cuti Kecil', '50000', '2021-03-26', '2021-03-27', 'Tidak Berlaku', 'PG-001', '198206142009011005', 'PC-001'),
('CT-002', 'Cuti kecil', '100000', '2021-04-08', '2021-04-09', 'Berlaku', 'PG-004', '198207152089021001', 'PC-004');

-- --------------------------------------------------------

--
-- Table structure for table `kepala_seksi`
--

CREATE TABLE `kepala_seksi` (
  `nip_kasi` varchar(30) NOT NULL,
  `nama_kasi` varchar(128) NOT NULL,
  `foto_kasi` varchar(128) NOT NULL,
  `jabatan_kasi` varchar(50) NOT NULL,
  `telp_kasi` varchar(15) NOT NULL,
  `jalan_kasi` varchar(50) NOT NULL,
  `no_rumah_kasi` varchar(8) NOT NULL,
  `rt_kasi` varchar(10) NOT NULL,
  `rw_kasi` varchar(10) NOT NULL,
  `kec_kasi` varchar(50) NOT NULL,
  `kota_kasi` varchar(50) NOT NULL,
  `kode_pos_kasi` int(11) NOT NULL,
  `email_kasi` varchar(128) NOT NULL,
  `pass_kasi` varchar(128) NOT NULL,
  `status_kasi` varchar(15) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepala_seksi`
--

INSERT INTO `kepala_seksi` (`nip_kasi`, `nama_kasi`, `foto_kasi`, `jabatan_kasi`, `telp_kasi`, `jalan_kasi`, `no_rumah_kasi`, `rt_kasi`, `rw_kasi`, `kec_kasi`, `kota_kasi`, `kode_pos_kasi`, `email_kasi`, `pass_kasi`, `status_kasi`, `is_active`, `date_created`) VALUES
('198206142009011005', 'Indra Budhiman, S.AP', 'kasi_informatika.PNG', 'Kasi bidang informatika', '08122438800', 'Jl. Mutiara Blok B Desa Rajagaluh', '015', '04', '06', 'Rajagaluh', 'Majalengka', 45472, 'indrabulle125@gmail.com', '$2y$10$XCxa.o11w0Yp7qKJCZhR4u8TSarkBQOhg6kbtN2lW1E0TZM5NDw4S', 'Aktif', 1, 1617252839),
('198207152089021001', 'Wondi Muhamad Yusuf, S.T', 'kasi_komunikasi.PNG', 'Kasi bidang komunikasi', '082216909606', 'Jalan Pramuka', '6', '1', '2', 'Majalengka', 'Majalengka', 45476, 'wondiyusuf@gmail.com', '$2y$10$XCxa.o11w0Yp7qKJCZhR4u8TSarkBQOhg6kbtN2lW1E0TZM5NDw4S', 'Aktif', 1, 1617446040);

-- --------------------------------------------------------

--
-- Table structure for table `kesehatan`
--

CREATE TABLE `kesehatan` (
  `kode_kesehatan` varchar(8) NOT NULL,
  `tgl_input_kesehatan` date NOT NULL,
  `lokasi_pegawai` varchar(50) NOT NULL,
  `suhu_tubuh_pegawai` int(12) NOT NULL,
  `hasil_swab_pegawai` varchar(25) NOT NULL,
  `status_vaksinasi_pegawai` varchar(12) NOT NULL,
  `kode_pegawai` varchar(8) NOT NULL,
  `nip_kasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kesehatan`
--

INSERT INTO `kesehatan` (`kode_kesehatan`, `tgl_input_kesehatan`, `lokasi_pegawai`, `suhu_tubuh_pegawai`, `hasil_swab_pegawai`, `status_vaksinasi_pegawai`, `kode_pegawai`, `nip_kasi`) VALUES
('KS-001', '2021-05-06', 'Perusahaan', 36, 'Negatif', 'Sudah', 'PG-001', '198206142009011005');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_honorer`
--

CREATE TABLE `pegawai_honorer` (
  `kode_pegawai` varchar(8) NOT NULL,
  `nama_pegawai` varchar(128) NOT NULL,
  `foto_pegawai` varchar(128) NOT NULL,
  `jabatan_pegawai` varchar(50) NOT NULL,
  `telp_pegawai` varchar(15) NOT NULL,
  `jalan_pegawai` varchar(50) NOT NULL,
  `no_rumah_pegawai` varchar(8) NOT NULL,
  `rt_pegawai` varchar(10) NOT NULL,
  `rw_pegawai` varchar(10) NOT NULL,
  `kec_pegawai` varchar(50) NOT NULL,
  `kota_pegawai` varchar(50) NOT NULL,
  `kode_pos_pegawai` int(11) NOT NULL,
  `email_pegawai` varchar(128) NOT NULL,
  `pass_pegawai` varchar(128) NOT NULL,
  `status_pegawai` varchar(15) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `nip_kasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai_honorer`
--

INSERT INTO `pegawai_honorer` (`kode_pegawai`, `nama_pegawai`, `foto_pegawai`, `jabatan_pegawai`, `telp_pegawai`, `jalan_pegawai`, `no_rumah_pegawai`, `rt_pegawai`, `rw_pegawai`, `kec_pegawai`, `kota_pegawai`, `kode_pos_pegawai`, `email_pegawai`, `pass_pegawai`, `status_pegawai`, `is_active`, `date_created`, `nip_kasi`) VALUES
('PG-001', 'Reynaldi Prama Octavially', 'IMG_20200822_160154_163.jpg', 'Staff bidang informatika', '082216805580', 'Jalan Desa Karayunan', '03', '01', '08', 'Cigasongsong', 'Majalengka', 45417, 'reynaldi.octavially@gmail.com', '$2y$10$dZVb4vi8FZ1YQaMUYmifF.Bm2D80/OvX2RrX5P6Y7YJA.j1Y5EL8.', 'Aktif', 1, 1617252703, '198206142009011005'),
('PG-002', 'Nur Apriyanto', 'Apri1.jpeg', 'Staff bidang informatika', '085862076175', 'Jalan Jipang', '8', '5', '7', 'Bantarkawung', 'Brebes Selatan', 52274, 'nurapriyanto076@gmail.com', '$2y$10$L56TnNlwU2BKfrwWR/hn9e/TnVrEt4.xeI6NANjIn1umJiGGEBxaK', 'Aktif', 1, 1617722841, '198206142009011005'),
('PG-003', 'Elsa Jelista Sari', 'Elsa.jpeg', 'Staff bidang komunikasi', '089669449400', 'Jalan Karasan', '7', '3', '6', 'Candirejo Ngawen', 'Klaten', 50512, 'firstjanuari@gmail.com', '$2y$10$c3cG5Q/.epiQndF54ZGO3eJxDa3clYztoSaFHB6K/iwQfeMicKhG.', 'Aktif', 1, 1617723507, '198207152089021001'),
('PG-004', 'Alifia Belqis', 'Abel.jpeg', 'Staff bidang komunikasi', '082219739477', 'Jalan Losari', '5', '1', '5', 'Losari Ploso', 'Jombang', 52364, 'Alifiabilqis05@gmail.com', '$2y$10$KZlU6Qm82.0Ljn6VxuSMZeTY4tHg5z/E6IHNVOclz3CAlmXUWtQNa', 'Cuti', 1, 1617723702, '198207152089021001');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_cuti`
--

CREATE TABLE `pengajuan_cuti` (
  `kode_pengajuan_cuti` varchar(8) NOT NULL,
  `tgl_pengajuan_cuti` date NOT NULL,
  `alasan_pengajuan_cuti` varchar(500) NOT NULL,
  `tgl_mulai_cuti` date NOT NULL,
  `tgl_selesai_cuti` date NOT NULL,
  `status_pengajuan_cuti` varchar(15) NOT NULL,
  `ket_pengajuan_cuti` varchar(500) NOT NULL,
  `kode_pegawai` varchar(8) NOT NULL,
  `nip_kasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_cuti`
--

INSERT INTO `pengajuan_cuti` (`kode_pengajuan_cuti`, `tgl_pengajuan_cuti`, `alasan_pengajuan_cuti`, `tgl_mulai_cuti`, `tgl_selesai_cuti`, `status_pengajuan_cuti`, `ket_pengajuan_cuti`, `kode_pegawai`, `nip_kasi`) VALUES
('PC-001', '2021-03-23', 'Cuti Sakit', '2021-03-26', '2021-03-27', 'Disetujui', 'Cuti telah disetujui', 'PG-001', '198206142009011005'),
('PC-002', '2021-04-06', 'Acara keluarga', '2021-04-13', '2021-04-14', 'Menunggu', 'Menunggu persetujuan dari kepala seksi', 'PG-002', '198206142009011005'),
('PC-003', '2021-04-06', 'Acara keluarga', '2021-04-14', '2021-04-15', 'Ditolak', 'Cuti telah ditolak', 'PG-003', '198207152089021001'),
('PC-004', '2021-04-06', 'Sakit', '2021-04-08', '2021-04-09', 'Disetujui', 'Cuti telah disetujui', 'PG-004', '198207152089021001');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(27, 'nurapriyanto076@gmail.com', 'lXjSnQLQePFLJDnzumzeeaFdPxzi2lQWZmge0nTa3FI=', 1617722841),
(28, 'firstjanuari@gmail.com', '7083qbgl93eBU6QGz1+1W7HMPPu5/iLwjj+SpHECT8o=', 1617723507),
(29, 'Alifiabilqis05@gmail.com', '+Gba3VFUywFHDiCg5P5Y70/tYxmGF+AD+JVUW1AhzoQ=', 1617723702),
(31, 'indrabulle125@gmail.com', 'U+TBaBmHMNfEWgTp3xQ5Sd+O3/oCGEf32RJN7u5sK8g=', 1617961052);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_pegawai`
--
ALTER TABLE `absensi_pegawai`
  ADD PRIMARY KEY (`kode_absensi`),
  ADD KEY `nip_kasi` (`nip_kasi`),
  ADD KEY `kode_pegawai` (`kode_pegawai`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`kode_cuti`),
  ADD KEY `kode_pengajuan_cuti` (`kode_pengajuan_cuti`),
  ADD KEY `kode_pegawai` (`kode_pegawai`),
  ADD KEY `nip_kasi` (`nip_kasi`);

--
-- Indexes for table `kepala_seksi`
--
ALTER TABLE `kepala_seksi`
  ADD PRIMARY KEY (`nip_kasi`);

--
-- Indexes for table `kesehatan`
--
ALTER TABLE `kesehatan`
  ADD PRIMARY KEY (`kode_kesehatan`),
  ADD KEY `kode_pegawai` (`kode_pegawai`),
  ADD KEY `nip_kasi` (`nip_kasi`);

--
-- Indexes for table `pegawai_honorer`
--
ALTER TABLE `pegawai_honorer`
  ADD PRIMARY KEY (`kode_pegawai`),
  ADD KEY `nip_kasi` (`nip_kasi`);

--
-- Indexes for table `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  ADD PRIMARY KEY (`kode_pengajuan_cuti`),
  ADD KEY `kode_pegawai` (`kode_pegawai`),
  ADD KEY `nip_kasi` (`nip_kasi`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi_pegawai`
--
ALTER TABLE `absensi_pegawai`
  ADD CONSTRAINT `absensi_pegawai_ibfk_1` FOREIGN KEY (`nip_kasi`) REFERENCES `kepala_seksi` (`nip_kasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absensi_pegawai_ibfk_2` FOREIGN KEY (`kode_pegawai`) REFERENCES `pegawai_honorer` (`kode_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti_ibfk_1` FOREIGN KEY (`kode_pengajuan_cuti`) REFERENCES `pengajuan_cuti` (`kode_pengajuan_cuti`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cuti_ibfk_2` FOREIGN KEY (`kode_pegawai`) REFERENCES `pegawai_honorer` (`kode_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cuti_ibfk_3` FOREIGN KEY (`nip_kasi`) REFERENCES `kepala_seksi` (`nip_kasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kesehatan`
--
ALTER TABLE `kesehatan`
  ADD CONSTRAINT `kesehatan_ibfk_1` FOREIGN KEY (`nip_kasi`) REFERENCES `kepala_seksi` (`nip_kasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kesehatan_ibfk_2` FOREIGN KEY (`kode_pegawai`) REFERENCES `pegawai_honorer` (`kode_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai_honorer`
--
ALTER TABLE `pegawai_honorer`
  ADD CONSTRAINT `pegawai_honorer_ibfk_1` FOREIGN KEY (`nip_kasi`) REFERENCES `kepala_seksi` (`nip_kasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  ADD CONSTRAINT `pengajuan_cuti_ibfk_1` FOREIGN KEY (`kode_pegawai`) REFERENCES `pegawai_honorer` (`kode_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_cuti_ibfk_2` FOREIGN KEY (`nip_kasi`) REFERENCES `kepala_seksi` (`nip_kasi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
