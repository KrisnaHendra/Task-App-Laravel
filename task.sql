-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2020 pada 07.52
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`id`, `nama`, `created_at`, `created_by`) VALUES
(1, 'Cashier Loading Bar & Resto', 1593003448, 6),
(2, 'Landing Page Humanis', 1593003513, 7),
(3, 'PPDB SMK YP', 1593003554, 7),
(4, 'Company Profile PT Arion', 1593003593, 7),
(5, 'CBT Ganesha Operation', 1593052102, 13),
(13, 'Project Internal', 1593077757, 6),
(25, 'Point Of Sales', 1593184315, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tipe` varchar(128) NOT NULL,
  `dikerjakan` int(11) NOT NULL,
  `tgl_assigne` date NOT NULL,
  `tgl_deadline` date NOT NULL,
  `tgl_done` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `task`
--

INSERT INTO `task` (`id`, `users_id`, `project_id`, `isi`, `tipe`, `dikerjakan`, `tgl_assigne`, `tgl_deadline`, `tgl_done`, `created_at`, `created_by`) VALUES
(6, 7, 3, 'Tambahkan fitur baru print pdf dan excel di profile siswa', 'Fitur', 1, '2020-06-24', '2020-06-25', 0, 1593042198, 6),
(7, 13, 4, 'Landing page bagian bawah kurang responsive', 'Revisi', 0, '2020-06-24', '2020-06-24', 0, 1593042233, 6),
(8, 7, 2, 'Bentuk data task API JSON sesuai dengan google meet kemarin', 'Bug', 1, '2020-07-08', '2020-07-10', 0, 1593042301, 6),
(9, 13, 4, 'Hapus data karyawan di halaman admin tidak bisa', 'Bug', 0, '2020-06-25', '2020-06-25', 0, 1593043991, 6),
(10, 13, 1, 'Tambah minuman kategori beer diganti modal animation', 'Bug', 1, '2020-06-25', '2020-06-25', 0, 1593044223, 6),
(12, 13, 4, 'Tambahkan CRUD di halaman HRD', 'Fitur', 0, '2020-06-26', '2020-06-28', 0, 1593160984, 13),
(13, 6, 5, 'Tambah soal di halaman project manager button error', 'Bug', 2, '2020-06-26', '2020-06-26', 0, 1593162797, 6),
(15, 3, 5, 'Insert Soal Matematika kategori 12A', 'Revisi', 1, '2020-06-27', '2020-06-27', 0, 1593229436, 6),
(16, 4, 13, 'tambahkan validasi user, laporan dengan sweetalert', 'Revisi', 0, '2020-06-27', '2020-06-27', 0, 1593229479, 6),
(17, 3, 2, 'Tes', 'Bug', 1, '2020-06-28', '2020-06-28', 0, 1593307913, 6),
(18, 6, 5, 'Tes Krisna', 'Fitur', 2, '2020-06-28', '2020-06-28', 0, 1593309287, 6),
(19, 6, 3, 'Tes Baru', 'Revisi', 0, '2020-06-28', '2020-06-28', 0, 1593313405, 6),
(20, 13, 25, 'Tambahkan pengelolaan barang di halaman pembelian menggunakan full ajax', 'Fitur', 0, '2020-06-28', '2020-06-28', 0, 1593315794, 6),
(21, 6, 13, 'gdghdhd', 'Revisi', 0, '2020-07-05', '2020-07-05', 0, 1593951480, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Sabilla Pramesti', 'sabilla@gmail.com', NULL, '$2y$10$1HfE4lZ635HqPOcX1RnmvOSCNeD2CqiuMoeNQ9AUoNh1PWfNiDFrC', 2, NULL, '2020-06-20 20:05:47', '2020-06-20 20:05:47'),
(4, 'Putra Maulana', 'zidan@gmail.com', NULL, '$2y$10$NZs4dmjx94i8dS6lH2VZHO1oCBmqrrLS5m2AcUmNJPJabK7KqBREe', 2, NULL, '2020-06-22 01:25:34', '2020-06-22 01:25:34'),
(5, 'Sherly Yuke', 'sherly@gmail.com', NULL, '$2y$10$Fukpa2LrJ5SBSdhWWV7XOu0aCvHmUcK55OWyw3xVn525Oh/7vgiK.', 2, NULL, '2020-06-22 01:28:09', '2020-06-22 01:28:09'),
(6, 'Krisna Hendra', 'krisna@gmail.com', NULL, '$2y$10$RGnDQGkZFI7hvn1OZj6Ld.iDM1fo1lZR3A.mrkf75MUgmOy0CvFna', 1, NULL, '2020-06-22 01:35:54', '2020-06-22 01:35:54'),
(7, 'Haifa Shalsabella', 'haifa@gmail.com', NULL, '$2y$10$igLuT/U28.UFmRySKYLYYu/L66o8ANHUtVYVHLojPjvYi2xPpHjHS', 1, NULL, '2020-06-22 01:39:53', '2020-06-22 01:39:53'),
(13, 'Afif Rifqi', 'afif@gmail.com', NULL, '$2y$10$Rl3aVSwu35Dyf5XKf09JEOkQYQ/8mL40gpPQBAVlaDbEjj/zoW5XC', 2, NULL, '2020-06-22 04:28:33', '2020-06-22 04:28:33'),
(15, 'Zeva Aliya', 'zeva@gmail.com', NULL, '$2y$10$ek0m9JoIQDdOmPuKQy0R2.GUFnpRP9nVGoH3Z7/f5sSqi1UJqE/jO', 2, NULL, '2020-06-26 03:01:43', '2020-06-26 03:01:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
