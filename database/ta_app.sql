-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2023 pada 06.26
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_05_11_083509_create_users_table', 2),
(5, '2023_05_11_083643_create_roles_table', 2),
(6, '2023_05_11_083929_add_role_id_column_to_users_table', 3),
(7, '2023_05_11_084346_create_tb_permohonan_table', 4),
(8, '2023_05_11_084627_add_id_column_to_tb_permohonan_table', 5),
(9, '2023_05_12_070322_create_tb_penerimaan_kas_table', 6),
(10, '2023_05_12_072004_add_id_column_to_tb_penerimaan_kas_table', 7),
(11, '2023_05_12_080733_add_jenis_dana_column_to_tb_permohonan_table', 8),
(13, '2023_05_15_084933_add_status_column_to_tb_penerimaan_kas_table', 9),
(14, '2023_05_15_092458_add_bukti_transaksi_column_to_tb_penerimaan_kas_table', 10),
(17, '2023_05_17_074255_create_tb_pembayaran_kas_table', 11),
(19, '2023_05_17_074821_add_id_column_to_tb_pembayaran_kas_table', 12),
(20, '2023_05_17_081741_create_tb_pembayaran_bank_table', 13),
(21, '2023_05_17_082034_add_id_column_to_tb_pembayaran_bank_table', 14),
(22, '2023_05_17_082145_create_tb_penerimaan_bank_table', 15),
(23, '2023_05_19_093639_add_ttd_column_to_tb_permohonan_table', 16),
(24, '2023_05_19_153859_add_id_column_to_tb_penerimaan_bank_table', 17),
(25, '2023_05_22_090913_create_tb_pembayaran_kas_table', 18),
(26, '2023_05_22_091130_add_id_column_to_tb_pembayaran_kas_table', 19),
(31, '2023_05_22_100433_add_status_upload_column_to_tb_permohonan_table', 20),
(32, '2023_05_25_134040_add_id_upload_column_to_tb_detail_permohonan_table', 21),
(33, '2023_06_13_062234_create_tb_ca_table', 22),
(34, '2023_06_13_062840_add_id_permohonan_column_to_tb_ca_table', 23),
(35, '2023_06_13_090713_add_periode_ca_column_to_tb_ca_table', 24),
(36, '2023_06_13_141045_create_tb_penerimaan_antar_bank_table', 25),
(37, '2023_06_13_174637_create_tb_pembayaran_antar_bank_table', 26),
(38, '2023_06_14_075031_add_nominal_terpakai_column_to_tb_ca_table', 27),
(39, '2023_06_14_080531_add_nominal_terpakai_column_to_tb_ca_table', 28),
(45, '2023_06_19_101510_add_sisa_saldo_coloumn_to_tb_pembayaran_antar_bank', 29),
(46, '2023_06_19_102235_create_tb_saldo_table', 29),
(47, '2023_06_19_105438_add_id_saldo_to_tb_pembayaran_antar_bank', 30),
(48, '2023_06_20_045935_add_id_pembayaran_antar_bank_coloumn_to_tb_saldo', 31),
(49, '2023_06_26_070712_password_resets', 32),
(51, '2023_07_14_141645_create_tb_penerimaan_table', 33),
(52, '2023_07_14_142526_add_id_permohonan_coloumn_to_tb_penerimaan', 34),
(53, '2023_07_14_155603_create_tb_pembayaran_table', 35),
(54, '2023_07_14_155850_add_id_permohonan_coloumn_to_tb_pembayaran', 36);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('pemohon@gmail.com', 'NUdQs6omK00P26Aln4qXqx96ft8mUeXaZ0la04ul5HB9aZGrw8zcwlIhFmmg8VEm', '2023-06-26 01:37:22'),
('risnaberti76@gmail.com', '1yyBOLhnNkn7KekfLaGc6nnUoSNRhAUslMFggEw5P8P5gylJ17aYCquXan8gCySV', '2023-06-26 01:40:21'),
('risnaberti76@gmail.com', 'R6xOe7NTbiDFrusTBaOXUTB1m8VKlx0SdKoxUqd5xhrDet4s4R6KLv2o7rFi5T1v', '2023-06-26 01:43:58'),
('pemohon@gmail.com', '5CrdQTrAKnIez1mmiW6PV99vSyEOcpNHfS0tNzIt2B6jMjnvYVUAtJQkRup8ULqA', '2023-06-26 01:51:31'),
('sulton@gmail.com', 'vrHlpnyujOIrAGkXJxfeUSwWaYZswxkAWfKhnyyIssskkvClX6mVBBQLROPc8i5M', '2023-07-05 19:28:00'),
('risnaberti76@gmail.com', 'ss27ddlZJvngPV8WyW6n505KSj38tyhi0IiHD5q8EIDWvatlau6Akk2y0tHYgrsG', '2023-07-12 05:56:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('pemohon@gmail.com', '90MNot5DLt0jlwQrq0BgrtbDZtBYHSoCByMfSgB6enx6uvZ573bRsSXFSBroEpG3', '2023-06-26 00:17:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `role_id` int(1) UNSIGNED NOT NULL,
  `role_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Bendahara', '2023-05-11 01:52:22', '2023-05-11 01:52:22'),
(2, 'Manajer', '2023-05-11 01:52:22', '2023-05-11 01:52:22'),
(3, 'Pemeriksa', '2023-05-11 01:52:22', '2023-05-11 01:52:22'),
(4, 'Pengurus', '2023-05-11 01:52:22', '2023-05-11 01:52:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ca`
--

CREATE TABLE `tb_ca` (
  `id_ca` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'UUID',
  `id_permohonan` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_resi_ca` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_penerimaan_ca` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_terpakai` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode_ca` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_transaksi` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_permohonan`
--

CREATE TABLE `tb_detail_permohonan` (
  `id_detail_permohonan` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_permohonan` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_satuan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga_barang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_detail_permohonan`
--

INSERT INTO `tb_detail_permohonan` (`id_detail_permohonan`, `id_permohonan`, `nama_barang`, `qty`, `harga_satuan`, `total_harga_barang`, `created_at`, `updated_at`) VALUES
('e7826206e5a94e429f5858a4880db185', '245cc0e5ea8d4be09b4c3ce75698e1d7', 'BUku', '10', '50000', '500000', '2023-07-06 00:54:25', '2023-07-06 00:54:25'),
('f35e4d6e59af4700b54094e6a0f584ea', '245cc0e5ea8d4be09b4c3ce75698e1d7', 'Tas', '10', '100000', '1000000', '2023-07-06 00:53:59', '2023-07-06 00:53:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_permohonan` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_resi_bayar_bank` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pembayaran_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_pembayaran_bank` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_resi_bayar_kas` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pembayaran_kas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_pembayaran_kas` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_permohonan`, `no_resi_bayar_bank`, `tanggal_pembayaran_bank`, `bukti_pembayaran_bank`, `no_resi_bayar_kas`, `tanggal_pembayaran_kas`, `bukti_pembayaran_kas`, `created_at`, `updated_at`) VALUES
('58979809e00949588bc18ad5d50664a6', 'a37278e375214bde85bb5d5a00b002dc', '0', '0', '0', '0', '2023-07-14', 'a37278e375214bde85bb5d5a00b002dc.pdf', '2023-07-14 09:15:42', '2023-07-14 09:29:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran_antar_bank`
--

CREATE TABLE `tb_pembayaran_antar_bank` (
  `id_pembayaran_antar_bank` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'UUID',
  `no_resi_pembayaran_antar_bank` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pembayaran_antar_bank` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_dana` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sisa_saldo` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terbilang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penerimaan`
--

CREATE TABLE `tb_penerimaan` (
  `id_penerimaan` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_permohonan` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_resi_terima_bank` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_penerimaan_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_transaksi_bank` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_resi_terima_kas` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_penerimaan_kas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_transaksi_kas` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_penerimaan`
--

INSERT INTO `tb_penerimaan` (`id_penerimaan`, `id_permohonan`, `no_resi_terima_bank`, `tanggal_penerimaan_bank`, `bukti_transaksi_bank`, `no_resi_terima_kas`, `tanggal_penerimaan_kas`, `bukti_transaksi_kas`, `created_at`, `updated_at`) VALUES
('b85795a105a04b65ba6bc0c2b6c20b3e', '9af2df1ff2c34de494d754afd326dda7', '0', '0', '0', '0', '2023-07-14', '9af2df1ff2c34de494d754afd326dda7.pdf', '2023-07-14 07:41:15', '2023-07-14 08:37:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penerimaan_antar_bank`
--

CREATE TABLE `tb_penerimaan_antar_bank` (
  `id_penerimaan_antar_bank` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'UUID',
  `no_resi_penerimaan_antar_bank` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_penerimaan_antar_bank` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_dana` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terbilang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_permohonan`
--

CREATE TABLE `tb_permohonan` (
  `id_permohonan` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'UUID',
  `id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_resi_ajuan` int(20) NOT NULL,
  `tanggal_permohonan` date NOT NULL,
  `harga_satuan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_satuan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_dana_ajuan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_acc` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_dana` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_permohonan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `terbilang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttd_pemohon` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd_manajer` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd_pemeriksa` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd_bendahara` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_permohonan` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_upload` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_permohonan`
--

INSERT INTO `tb_permohonan` (`id_permohonan`, `id`, `no_resi_ajuan`, `tanggal_permohonan`, `harga_satuan`, `jumlah_satuan`, `total_dana_ajuan`, `nominal_acc`, `jenis_dana`, `keterangan_permohonan`, `terbilang`, `ttd_pemohon`, `ttd_manajer`, `ttd_pemeriksa`, `ttd_bendahara`, `status_permohonan`, `status_upload`, `created_at`, `updated_at`) VALUES
('377d452bd2a94ccc82c7860d1d14e4a6', '64f1dad4f087418c93b57091ae12a92d', 2, '2023-07-12', '250000', '1', '250000', '250000', 'Penerimaan Kas', 'Santunan Anak Yatim', 'dua ratus lima puluh  ribu', '1', '0', '0', '1', '1', NULL, '2023-07-12 06:23:42', '2023-07-14 00:39:33'),
('9af2df1ff2c34de494d754afd326dda7', '6dc9dfd199704d969c95476c1447c764', 6, '2023-07-14', '0', '0', '360000', '360000', 'Penerimaan Kas', 'Santunan', 'tiga ratus enam puluh  ribu', NULL, '0', '0', '1', '1', NULL, '2023-07-14 07:39:06', '2023-07-14 09:13:25'),
('a37278e375214bde85bb5d5a00b002dc', '8f40f4c8e2b041069b6bff919dca7ef3', 3, '2023-07-12', '500000', '1', '500000', '500000', 'Pembayaran Kas', 'Santunan Anak Yatim', 'lima ratus  ribu', '1', '0', '0', '1', '1', NULL, '2023-07-12 06:24:45', '2023-07-14 09:15:42'),
('ab3f1a67c33c43d583cd25018126b4bd', '6dc9dfd199704d969c95476c1447c764', 5, '2023-07-14', '0', '0', '12000', '12000', 'Chartered Accountant', 'bensin', 'dua belas ribu', NULL, '0', '0', '1', '1', NULL, '2023-07-14 00:53:45', '2023-07-14 21:18:10'),
('d1dd63565b1b4846bee95ba779a82aa8', '6dc9dfd199704d969c95476c1447c764', 1, '2023-07-10', '1,000,000', '1', '1,000,000', '1000000', 'Penerimaan Kas', 'CA: KAS BASECAMP', 'satu juta', '1', '0', '0', '0', '0', NULL, '2023-07-10 08:56:08', '2023-07-14 06:34:56'),
('da7733d3cf1a43bba39c413bc29ba55a', 'e8afba9675c842e78dc6bd08b5a6d96d', 4, '2023-07-12', '25000', '1', '20000', '20000', 'Penerimaan Kas', 'Uang bensin', 'dua puluh  ribu', '1', '0', '0', '0', '0', NULL, '2023-07-12 06:25:33', '2023-07-14 06:35:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_saldo`
--

CREATE TABLE `tb_saldo` (
  `id_saldo` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pembayaran_antar_bank` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo_akhir` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'UUID',
  `role_id` int(2) UNSIGNED DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `no_hp`, `divisi`, `jabatan`, `alamat`, `is_active`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
('1', 1, 'Risna Berti Sundari', 'risnaberti76@gmail.com', '$2y$10$pLPJk9GMxAHaS1yf40S5POvr3MTEU0ctDL9tSOJ9.xUzQD6.9qGuK', '085799538544', 'Keuangan', 'Bendahara I', 'Jl Jawa', 1, NULL, NULL, '2023-05-11 01:54:15', '2023-07-12 08:12:43'),
('30cf19253bcb4b91903b5f9eb2e9ca4e', 1, 'Kholifatun Mualifiyah', 'kholif@gmail.com', '$2y$10$4iQ.1Q3sstVkPdBD.b/5wO1vGtZGyhkPpQKv3Rwlducz7B5EFbyr.', '088812341234', 'Keuangan', 'Bendahara II', 'Jl. Tritih lor', 1, NULL, NULL, '2023-07-08 08:02:04', '2023-07-08 08:02:04'),
('64f1dad4f087418c93b57091ae12a92d', 4, 'Rizki Ananda Putra', 'rizki@gmail.com', '$2y$10$p/NY.tIQ24PN9BC6u8pDG.XwMq70dDiaircO8jSuwHM9CPNjbo3Jy', '085155220237', 'Marketing Communication', 'Staff', 'Jl. Sulawesi', 1, NULL, NULL, '2023-07-08 08:04:03', '2023-07-14 02:34:41'),
('658a0ba2315840af86ecadd8e515c6bb', 3, 'Sri Noviana Mukti', 'sri@gmail.com', '$2y$10$jpP8WKx2NDMCLqGJMnd38O.89TH.nqKn9D7QsTvls8DJc4hQz0aoa', '088812341234', 'Audit Internal', 'Pengawas', 'Jl. Laban', 1, NULL, NULL, '2023-07-08 07:57:28', '2023-07-08 07:57:28'),
('6dc9dfd199704d969c95476c1447c764', 4, 'Sultoni Romadhon', 'sultoni@gmail.com', '$2y$10$r04zZ5QEjg6kB1/tC.8HpO.tY76pT.wvtSNPq6r9TeeTINXyrdBCS', '089512844161', 'Marketing Communication', 'Staff', 'Jl. Sulawesi', 0, NULL, NULL, '2023-07-08 07:52:51', '2023-07-14 02:35:05'),
('8f40f4c8e2b041069b6bff919dca7ef3', 4, 'Kharisma Alfi Tiara', 'alfi@gmail.com', '$2y$10$5JQ.hcYMnpxW4OXoAFnJT./098K83ADQJylIY2ee.t8CKtM5TKgt6', '088812341234', 'Marketing Communication', 'Staff', 'Jl. Laban', 1, NULL, NULL, '2023-07-08 07:58:36', '2023-07-08 07:58:36'),
('98beb724d0624ba099c4f971e10d5dc0', 4, 'Muhammad Putra Yuda Agustian', 'yuda@gmail.com', '$2y$10$ZEHQ03WHenzFOinm8qRBK.nW7019nmvnGJQP.v0cgZ0IZcuYbTNWK', '08993595906', 'Program', 'Staff', 'Jl. Laban', 1, NULL, NULL, '2023-07-08 08:05:25', '2023-07-08 08:05:25'),
('c47ae37f6a93430cac7d70dcd843d7a9', 2, 'Haris Budi Setyawan', 'haris@gmail.com', '$2y$10$qr01nK/tVaOt9xkjeA8oK.mq9CSUyY1/I35zkeTeoLRxnqjp.zrJC', '088812341234', 'HRD Manejer', 'Manajer', 'Jl. Sulawesi', 1, NULL, NULL, '2023-07-08 08:06:29', '2023-07-12 08:44:21'),
('e8afba9675c842e78dc6bd08b5a6d96d', 4, 'Dimas Chandra Efansa', 'dimaschandra@gmail.com', '$2y$10$ctTeARzSyJIFkZC9LbK6MuddTBGmo9CIfIGNkoS/YwhQt1B0STNR.', '088812345678', 'Marketing Communication', 'Staff', 'Jl. Sulawesi', 1, NULL, NULL, '2023-07-08 07:53:46', '2023-07-08 07:53:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `tb_ca`
--
ALTER TABLE `tb_ca`
  ADD PRIMARY KEY (`id_ca`),
  ADD KEY `tb_ca_id_permohonan_foreign` (`id_permohonan`);

--
-- Indeks untuk tabel `tb_detail_permohonan`
--
ALTER TABLE `tb_detail_permohonan`
  ADD PRIMARY KEY (`id_detail_permohonan`),
  ADD KEY `tb_detail_permohonan_id_permohonan_foreign` (`id_permohonan`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `tb_pembayaran_id_permohonan_foreign` (`id_permohonan`);

--
-- Indeks untuk tabel `tb_pembayaran_antar_bank`
--
ALTER TABLE `tb_pembayaran_antar_bank`
  ADD PRIMARY KEY (`id_pembayaran_antar_bank`);

--
-- Indeks untuk tabel `tb_penerimaan`
--
ALTER TABLE `tb_penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`),
  ADD KEY `id_permohonan` (`id_permohonan`);

--
-- Indeks untuk tabel `tb_penerimaan_antar_bank`
--
ALTER TABLE `tb_penerimaan_antar_bank`
  ADD PRIMARY KEY (`id_penerimaan_antar_bank`);

--
-- Indeks untuk tabel `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  ADD PRIMARY KEY (`id_permohonan`),
  ADD UNIQUE KEY `no_resi_ajuan` (`no_resi_ajuan`),
  ADD KEY `tb_permohonan_id_foreign` (`id`);

--
-- Indeks untuk tabel `tb_saldo`
--
ALTER TABLE `tb_saldo`
  ADD PRIMARY KEY (`id_saldo`),
  ADD KEY `tb_saldo_id_pembayaran_antar_bank_foreign` (`id_pembayaran_antar_bank`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_id_permohonan_foreign` FOREIGN KEY (`id_permohonan`) REFERENCES `tb_permohonan` (`id_permohonan`);

--
-- Ketidakleluasaan untuk tabel `tb_penerimaan`
--
ALTER TABLE `tb_penerimaan`
  ADD CONSTRAINT `tb_penerimaan_id_penerimaan_foreign` FOREIGN KEY (`id_permohonan`) REFERENCES `tb_permohonan` (`id_permohonan`);

--
-- Ketidakleluasaan untuk tabel `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  ADD CONSTRAINT `fk_users_id_user` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_saldo`
--
ALTER TABLE `tb_saldo`
  ADD CONSTRAINT `tb_saldo_id_pembayaran_antar_bank_foreign` FOREIGN KEY (`id_pembayaran_antar_bank`) REFERENCES `tb_pembayaran_antar_bank` (`id_pembayaran_antar_bank`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
