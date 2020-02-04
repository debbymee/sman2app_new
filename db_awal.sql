-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2019 pada 04.18
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sman2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(128) NOT NULL,
  `tgl_lahir` varchar(25) NOT NULL,
  `jk` varchar(128) NOT NULL,
  `nip` varchar(5) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `id_user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `tgl_lahir`, `jk`, `nip`, `alamat`, `no_hp`, `foto`, `id_user_fk`) VALUES
(1, 'Enny Nurmawati SP.d', '1999-04-04', 'perempuan', '67000', 'Jl.hana', '08122461029', '1573292073349.jpg', 2),
(3, 'Edy Susanto', '2000-09-09', 'laki-laki', '12145', 'jl.aceh', ' 08122461244', 'IMG_20181228_204312_561.jpg', 4),
(4, 'Dety Purwantini', '1988-01-01', 'perempuan', '67014', 'jl.banda', '081224612470', 'pixel_google2.jpg', 5),
(5, 'Supariyanto', '0000-00-00', 'Laki-laki', '67015', 'jl.angkasa', '081230230565', '', 6),
(6, 'Wiwik Andayani SP.d', '2019-12-05', 'perempuan', '67017', 'jl.laut', '081230230555', 'IMG_20181102_222303_489.jpg', 7),
(7, 'Idham Jauhari Priyambodo Wirawan', '0000-00-00', 'Laki-laki', '67018', 'jl.kakan', '081224612407', '', 23),
(8, 'Miftahul Mujtahidin', '0000-00-00', 'Laki-laki', '67019', 'jl.nangka', '081230230567', '', 8),
(9, 'Dinar Wirantika', '0000-00-00', 'Perempuan', '67020', 'jl.gagak', '081224612400', '', 9),
(10, 'Sunarto', '0000-00-00', 'Laki-laki', '67021', 'jl.bekasi', '081230230566', '', 10),
(11, 'Djohan Arifin', '0000-00-00', 'Laki-laki', '67027', 'Jl.langit', '081224612444', '', 25),
(12, 'Kikie Andriani', '0000-00-00', 'Perempuan', '67023', 'Jl.danau', '087743781416', '', 28),
(13, 'Indah Kristina', '0000-00-00', 'Perempuan', '67026', 'jl.gagak', '081224612499', '', 27),
(14, 'Luqman Hakim', '0000-00-00', 'Laki-laki', '67025', 'jl.ikan', '087743781415', '', 16),
(21, 'Erna Widyawati', '0000-00-00', 'perempuan', '67029', ' jl hongkong', ' 08122461241', '', 11),
(22, 'Agus Nur Sofan', '0000-00-00', 'laki-laki', '67030', ' jl.hayati', ' 08122461222', '', 12),
(23, 'Mohammad Fihir', '0000-00-00', 'laki-laki', '67031', ' jl.nagrek', ' 08774378141', '', 13),
(24, 'Utono', '0000-00-00', 'laki-laki', '67037', '  jl.hanamasa ', ' 08122461245', '', 15),
(25, 'Martiningsih', '0000-00-00', 'perempuan', '67033', 'Jl.Songgat', ' 08122461222', '', 14),
(26, 'Tri Hartatik', '0000-00-00', 'laki-laki', '67035', ' jl.mangga', '  0812929211', '', 17),
(27, 'Heri Purwaningsih', '0000-00-00', 'laki-laki', '67040', ' jl.macan', '08122212604', '', 24),
(29, 'Akhmad Qomarudin', '0000-00-00', 'laki-laki', '67043', ' jl.apel', ' 08122461240', '', 20),
(30, 'Fatimah', '0000-00-00', 'perempuan', '67044', ' jl.anggur', ' 08122461240', '', 21),
(31, 'Wiwik Windarti SP.d', '0000-00-00', 'perempuan', '67045', ' jl.bebek', ' 08122461241', '', 29),
(32, 'Rr. Supeningsih', '0000-00-00', 'perempuan', '67046', ' jl.hartono', ' 08122461240', '', 30),
(46, 'fadhilah fazrin', '1970-01-01', 'perempuan', '67099', ' jl hongkong', '081224612411', '', 54),
(47, 'fadhilahh', '1970-01-01', 'perempuan', '12322', ' jl hongkong', '081224612400', '', 54);

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_message`
--

CREATE TABLE `history_message` (
  `id_history` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal_terkirim` varchar(20) NOT NULL,
  `jam_terkirim` varchar(10) NOT NULL,
  `id_presensi_fk` int(11) NOT NULL,
  `id_wali_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history_message`
--

INSERT INTO `history_message` (`id_history`, `pesan`, `tanggal_terkirim`, `jam_terkirim`, `id_presensi_fk`, `id_wali_fk`) VALUES
(2, 'Putra / putri anda atas nama \'Yulia\' Hari ini tidak masuk dengan keterangan \'Absen\'. Demikian pemberitahuan kami, Terima kasih', '2019-12-04', '15:14', 181, 7),
(5, 'Putra / putri anda atas nama \'AAN\' Hari ini tidak masuk dengan keterangan \'Absen\'. Demikian pemberitahuan kami, Terima kasih', '2019-12-07', '05:10', 180, 7),
(6, 'Putra / putri anda atas nama \'AAN\' Hari ini tidak masuk dengan keterangan \'Absen\'. Demikian pemberitahuan kami, Terima kasih', '2019-12-09', '09:51', 180, 7),
(7, 'Putra / putri anda atas nama \'AAN\' Hari ini tidak masuk dengan keterangan \'Absen\'. Demikian pemberitahuan kami, Terima kasih', '2019-12-10', '03:41', 180, 7),
(11, 'Putra / putri anda atas nama \'Yulia\' Hari ini tidak masuk dengan keterangan \'Absen\'. Demikian pemberitahuan kami, Terima kasih', '2019-12-11', '22:31', 206, 7),
(12, 'Putra / putri anda atas nama \'AAN\' Hari ini tidak masuk dengan keterangan \'Absen\'. Demikian pemberitahuan kami, Terima kasih', '2019-12-11', '22:42', 209, 7),
(13, 'Putra / putri anda atas nama \'Yulia\' Hari ini tidak masuk dengan keterangan \'Absen\'. Demikian pemberitahuan kami, Terima kasih', '2019-12-12', '08:15', 213, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id_jadwal` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_pelajaran` varchar(10) NOT NULL,
  `kd_mapel_fk` varchar(10) NOT NULL,
  `id_kelas_fk` int(11) NOT NULL,
  `id_guru_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id_jadwal`, `hari`, `jam_pelajaran`, `kd_mapel_fk`, `id_kelas_fk`, `id_guru_fk`) VALUES
(1, 'Senin', 'jam ke-1', '001', 3, 1),
(2, 'Senin', 'jam ke-2', '001', 3, 1),
(3, 'Senin', 'jam ke-3', '006', 3, 6),
(6, 'Senin', 'jam ke-4', '006', 3, 6),
(7, 'Selasa', 'jam ke-1', '005', 3, 24),
(8, 'Senin', 'jam ke-1', '015', 6, 26),
(9, 'Senin', 'jam ke-3', '010', 8, 32),
(10, 'Rabu', 'jam ke-1', '003', 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `tingkat_kelas` varchar(10) NOT NULL,
  `ruangan` varchar(10) NOT NULL,
  `id_wali_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `jurusan`, `tingkat_kelas`, `ruangan`, `id_wali_fk`) VALUES
(3, 'XII IPS 3', 'IPS', '12', 'XII-IPS3', 7),
(4, 'XII IPS 4', 'IPS', '12', 'XII-IPS4', 8),
(6, 'XII MIPA 2', 'IPA', '12', 'XII-IPA2', 10),
(8, 'XII MIPA 4', 'IPA', '12', 'XII-IPA4', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan_presensi`
--

CREATE TABLE `keterangan_presensi` (
  `kd_keterangan` varchar(2) NOT NULL,
  `nama_keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keterangan_presensi`
--

INSERT INTO `keterangan_presensi` (`kd_keterangan`, `nama_keterangan`) VALUES
('A', 'Absen'),
('I', 'Izin'),
('D', 'Dispensasi'),
('S', 'Sakit'),
('H', 'Hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kd_mapel` varchar(10) NOT NULL,
  `nama_pelajaran` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kd_mapel`, `nama_pelajaran`) VALUES
('001', 'Geografi'),
('002', 'Bahasa dan Sastra Inggris'),
('003', 'Sosiologi'),
('004', 'Sejarah'),
('005', 'Pendidikan Jasmani, Olahr'),
('006', 'Ekonomi'),
('007', 'Matematika (Umum)'),
('008', 'Pendidikan Agama Islam da'),
('009', 'Muatan Lokal Bahasa Daera'),
('010', 'Seni Budaya'),
('011', 'Pendidikan Pancasila dan '),
('012', 'Prakarya dan Kewirausahaa'),
('013', 'Matematika (Peminatan)'),
('014', 'Bahasa Indonesia'),
('015', 'Fisika'),
('016', 'Biologi'),
('017', 'Kimia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `kd_keterangan_fk` varchar(2) NOT NULL,
  `id_jadwal_fk` int(11) NOT NULL,
  `id_siswa_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `tgl`, `foto`, `kd_keterangan_fk`, `id_jadwal_fk`, `id_siswa_fk`) VALUES
(178, '2019-12-03', '', 'A', 2, 1),
(179, '2019-12-03', 'j1.jpg', 'I', 2, 1),
(180, '2019-12-04', '', 'A', 1, 1),
(181, '2019-12-04', '', 'A', 1, 4),
(182, '2019-12-04', '', 'A', 3, 1),
(183, '2019-12-04', '', 'A', 3, 4),
(184, '2019-12-04', '', 'D', 7, 1),
(185, '2019-12-04', '', 'D', 7, 4),
(186, '2019-12-05', '', 'H', 8, 10),
(187, '2019-12-05', '3_warna2.jpg', 'I', 9, 11),
(188, '2019-12-05', '', 'I', 1, 1),
(189, '2019-12-05', '', 'I', 1, 4),
(194, '2019-12-07', '', 'I', 3, 1),
(195, '2019-12-07', '', 'A', 3, 4),
(196, '2019-12-09', '', 'A', 3, 1),
(197, '2019-12-09', '', 'A', 3, 4),
(205, '2019-12-11', '', 'H', 10, 1),
(206, '2019-12-11', '', 'A', 10, 4),
(207, '2019-12-11', '', 'D', 1, 1),
(208, '2019-12-11', 'IMG_20181207_163435_3081.jpg', 'D', 1, 4),
(209, '2019-12-11', 'IMG_20181121_110347_857.jpg', 'A', 3, 1),
(210, '2019-12-11', '', 'H', 3, 4),
(212, '2019-12-12', '', 'S', 1, 4),
(213, '2019-12-12', '', 'A', 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(128) NOT NULL,
  `nipd` int(5) NOT NULL,
  `jk` varchar(128) NOT NULL,
  `nisn` int(10) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nik` varchar(50) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp_ortu` varchar(25) NOT NULL,
  `id_kelas_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `nipd`, `jk`, `nisn`, `tempat_lahir`, `tgl_lahir`, `nik`, `agama`, `alamat`, `no_hp_ortu`, `id_kelas_fk`) VALUES
(1, 'AAN', 12344, 'perempuan', 192292222, 'Banjar', '2000-01-01', '1234567888', 'Islam', 'jl.hayati no.10', '+62 812-2207-6548', 8),
(4, 'Yulia', 12345, 'perempuan', 192292223, ' Sulawesi', '1999-04-05', '1234567888', 'Kristen', '  jl.klaten', '+62853-1789-4054', 3),
(10, 'alfann firmansyah', 12344, 'laki-laki', 2147483647, 'Banjar', '2000-01-01', '1234567880', 'Kristen', ' jl.unta', ' 081224612411', 6),
(11, 'Amrina Rosada', 67122, 'perempuan', 192292222, 'Sulawesi', '2000-09-09', '1234567899', 'Buddha', ' jl.klaten', ' 081224612402', 8),
(12, 'maulina', 9123, 'perempuan', 1234412345, 'Banjar', '2000-01-01', '1234567889', 'Kristen', ' jl hongkong', ' 081224612400', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id_fk` int(1) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id_fk`, `is_active`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(2, 'enny_nur', '827ccb0eea8a706c4c34a16891f84e7b', 2, 1),
(4, 'edy_susanto', '202cb962ac59075b964b07152d234b70', 2, 0),
(5, 'dety_purwantini', '202cb962ac59075b964b07152d234b70', 2, 1),
(6, 'supariyanto', '202cb962ac59075b964b07152d234b70', 2, 1),
(7, 'wiwik_andayani', '827ccb0eea8a706c4c34a16891f84e7b', 3, 1),
(8, 'miftahul_mujtahidin', '202cb962ac59075b964b07152d234b70', 3, 1),
(9, 'dinar_wirantika', '202cb962ac59075b964b07152d234b70', 2, 1),
(10, 'sunarto', '202cb962ac59075b964b07152d234b70', 3, 1),
(11, 'erna_widyawati', '202cb962ac59075b964b07152d234b70', 2, 1),
(12, 'agus_nursofan', '202cb962ac59075b964b07152d234b70', 3, 1),
(13, 'mohamad_fihir', '202cb962ac59075b964b07152d234b70', 3, 1),
(14, 'martiningsih', '202cb962ac59075b964b07152d234b70', 2, 1),
(15, 'utono', '202cb962ac59075b964b07152d234b70', 2, 1),
(16, 'luqman_hakim', '202cb962ac59075b964b07152d234b70', 2, 1),
(17, 'tri_hartatik', '77e69c137812518e359196bb2f5e9bb9', 2, 1),
(19, 'rani_asmara', '202cb962ac59075b964b07152d234b70', 2, 1),
(20, 'akhmad_qomarudin', '202cb962ac59075b964b07152d234b70', 2, 1),
(21, 'fatimah', '202cb962ac59075b964b07152d234b70', 2, 1),
(23, 'idham_jauhari_priyambodo_wirawan', '202cb962ac59075b964b07152d234b70', 2, 1),
(24, 'heri_purwaningsih', '202cb962ac59075b964b07152d234b70', 2, 1),
(25, 'djohan_arifin', '202cb962ac59075b964b07152d234b70', 2, 1),
(26, 'siti_maisyaroh', '202cb962ac59075b964b07152d234b70', 2, 1),
(27, 'indah_kristina', '202cb962ac59075b964b07152d234b70', 2, 1),
(28, 'kikie_andriani', '202cb962ac59075b964b07152d234b70', 2, 1),
(29, 'wiwik_windarti', '202cb962ac59075b964b07152d234b70', 2, 1),
(30, 'rr_supeningsih', '202cb962ac59075b964b07152d234b70', 2, 1),
(31, 'tes', '202cb962ac59075b964b07152d234b70', 2, 1),
(53, 'tesss', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1),
(54, 'fadhilah', '33ceb07bf4eeb3da587e268d663aba1a', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'guru'),
(3, 'walikelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id_wali` int(11) NOT NULL,
  `id_guru_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wali_kelas`
--

INSERT INTO `wali_kelas` (`id_wali`, `id_guru_fk`) VALUES
(7, 6),
(8, 8),
(29, 10),
(10, 22),
(12, 23);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `nama_guru` (`nama_guru`),
  ADD KEY `id_user_fk` (`id_user_fk`);

--
-- Indeks untuk tabel `history_message`
--
ALTER TABLE `history_message`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `history_message_ibfk_1` (`id_presensi_fk`),
  ADD KEY `history_message_ibfk_2` (`id_wali_fk`);

--
-- Indeks untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `kd_mapel_fk` (`kd_mapel_fk`),
  ADD KEY `id_kelas_fk` (`id_kelas_fk`),
  ADD KEY `id_guru_fk` (`id_guru_fk`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_wali_fk` (`id_wali_fk`);

--
-- Indeks untuk tabel `keterangan_presensi`
--
ALTER TABLE `keterangan_presensi`
  ADD KEY `kd_keterangan` (`kd_keterangan`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD UNIQUE KEY `nama_pelajaran` (`nama_pelajaran`),
  ADD KEY `kd_mapel` (`kd_mapel`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `id_siswa_fk` (`id_siswa_fk`),
  ADD KEY `id_jadwal_fk` (`id_jadwal_fk`),
  ADD KEY `kd_keterangan_fk` (`kd_keterangan_fk`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas_fk` (`id_kelas_fk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id_fk` (`role_id_fk`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id_wali`),
  ADD KEY `id_guru_fk` (`id_guru_fk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `history_message`
--
ALTER TABLE `history_message`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id_wali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_user_fk`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `history_message`
--
ALTER TABLE `history_message`
  ADD CONSTRAINT `history_message_ibfk_1` FOREIGN KEY (`id_presensi_fk`) REFERENCES `presensi` (`id_presensi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `history_message_ibfk_2` FOREIGN KEY (`id_wali_fk`) REFERENCES `wali_kelas` (`id_wali`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_1` FOREIGN KEY (`kd_mapel_fk`) REFERENCES `mata_pelajaran` (`kd_mapel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_2` FOREIGN KEY (`id_kelas_fk`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_3` FOREIGN KEY (`id_guru_fk`) REFERENCES `guru` (`id_guru`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_wali_fk`) REFERENCES `wali_kelas` (`id_wali`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_1` FOREIGN KEY (`id_siswa_fk`) REFERENCES `siswa` (`id_siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `presensi_ibfk_2` FOREIGN KEY (`id_jadwal_fk`) REFERENCES `jadwal_pelajaran` (`id_jadwal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `presensi_ibfk_3` FOREIGN KEY (`kd_keterangan_fk`) REFERENCES `keterangan_presensi` (`kd_keterangan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas_fk`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id_fk`) REFERENCES `user_role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD CONSTRAINT `wali_kelas_ibfk_1` FOREIGN KEY (`id_guru_fk`) REFERENCES `guru` (`id_guru`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
