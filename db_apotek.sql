-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Nov 2024 pada 14.30
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jual_belis`
--

CREATE TABLE `detail_jual_belis` (
  `id` bigint UNSIGNED NOT NULL,
  `detail_penjualan_id` bigint UNSIGNED NOT NULL,
  `detail_pembelian_id` bigint UNSIGNED NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelians`
--

CREATE TABLE `detail_pembelians` (
  `id` bigint UNSIGNED NOT NULL,
  `pembelian_id` bigint UNSIGNED NOT NULL,
  `obat_id` bigint UNSIGNED NOT NULL,
  `harga_beli` int NOT NULL,
  `jumlah_beli` int NOT NULL,
  `jumlah_sisa` int NOT NULL,
  `tanggal_expire` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualans`
--

CREATE TABLE `detail_penjualans` (
  `id` bigint UNSIGNED NOT NULL,
  `penjualan_id` bigint UNSIGNED NOT NULL,
  `obat_id` bigint UNSIGNED NOT NULL,
  `harga_jual` int NOT NULL,
  `jumlah_jual` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Obat Bebas Terbatas', '2024-11-12 15:22:00', '2024-11-12 15:22:00'),
(2, 'Obat Herbal', '2024-11-12 15:22:00', '2024-11-12 15:22:00'),
(3, 'Obat Keras', '2024-11-12 15:22:00', '2024-11-12 15:22:00'),
(4, 'Obat Bebas', '2024-11-12 15:22:00', '2024-11-12 15:22:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_04_15_164143_create_kategoris_table', 1),
(4, '2022_04_16_013740_create_obats_table', 1),
(5, '2022_04_16_013916_create_suppliers_table', 1),
(6, '2022_04_16_014007_create_pembelians_table', 1),
(7, '2022_04_16_014023_create_penjualans_table', 1),
(8, '2022_04_16_015051_create_detail_penjualans_table', 1),
(9, '2022_04_16_015121_create_detail_pembelians_table', 1),
(10, '2022_04_16_015139_create_detail_jual_belis_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obats`
--

CREATE TABLE `obats` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `obats`
--

INSERT INTO `obats` (`id`, `nama_obat`, `kategori_id`, `stok`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(1, 'Ibuprofen', 2, 0, 7000, 20000, '2024-11-12 15:22:01', '2024-11-12 15:22:01'),
(2, 'Paracetamol', 2, 0, 4000, 20000, '2024-11-12 15:22:01', '2024-11-12 15:22:01'),
(3, 'Paramex', 4, 0, 5000, 17000, '2024-11-12 15:22:01', '2024-11-12 15:22:01'),
(4, 'Redoxon', 2, 0, 7000, 14000, '2024-11-12 15:22:01', '2024-11-12 15:22:01'),
(5, 'Panadol', 3, 0, 5000, 14000, '2024-11-12 15:22:01', '2024-11-12 15:22:01'),
(6, 'Vitacimin', 4, 0, 8000, 20000, '2024-11-12 15:22:01', '2024-11-12 15:22:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelians`
--

CREATE TABLE `pembelians` (
  `id` bigint UNSIGNED NOT NULL,
  `no_pembelian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `tanggal_beli` date NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualans`
--

CREATE TABLE `penjualans` (
  `id` bigint UNSIGNED NOT NULL,
  `no_penjualan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total` int NOT NULL,
  `bayar` int NOT NULL,
  `tanggal_jual` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama_supplier`, `no_telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'PT. JKL', '(+62) 553 6446 6065', 'Dk. Sutami No. 957, Tangerang Selatan 51944, Sultra', '2024-11-12 15:22:01', '2024-11-12 15:22:01'),
(2, 'PT. DEF', '020 5714 2248', 'Jln. Bah Jaya No. 753, Tanjung Pinang 31429, Sumsel', '2024-11-12 15:22:01', '2024-11-12 15:22:01'),
(3, 'PT. ABC', '0844 0559 112', 'Ds. Laksamana No. 188, Tidore Kepulauan 58343, Jabar', '2024-11-12 15:22:01', '2024-11-12 15:22:01'),
(4, 'PT. GHI', '(+62) 269 8869 866', 'Ki. Basoka Raya No. 359, Gunungsitoli 43167, Jatim', '2024-11-12 15:22:01', '2024-11-12 15:22:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Admin','Petugas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `no_telp`, `alamat`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nadine Yolanda', '024 8583 733', 'Jr. Sam Ratulangi No. 727, Banjarmasin 77832, Riau', 'admin@gmail.com', '$2y$10$ZZFS/puJOSuN8tNaVzaLfu3ff5ezDuscPT5RE5RfOmmHfXD616Xue', 'Admin', 'iY94ReAkSEuSPFIfNRIZ07Ky5aVHazFEO2QHuueKsVNwukZFzDN0cNgwuwYA', '2024-11-12 15:22:00', '2024-11-12 15:22:00'),
(2, 'Maimunah Puspita', '0425 5542 074', 'Psr. Ekonomi No. 920, Sibolga 14058, Riau', 'petugas@gmail.com', '$2y$10$vGGXCct5NgbV5IQq4wWDruCBcwK63DVf.YgneLMe5k2EMTeFbZx9.', 'Petugas', 'TIDOdBHeGF', '2024-11-12 15:22:00', '2024-11-12 15:22:00'),
(3, 'Gaduh Sitorus S.T.', '0536 1494 987', 'Ki. Tentara Pelajar No. 340, Banda Aceh 47202, Bengkulu', 'kemal.laksita@example.net', '$2y$10$Xzozn2BhXp7Z8oX08Zfudu95pZvZqpPT.y74/IC9wvvBqFIW6xY.K', 'Admin', 'Ut2txV1Mz8', '2024-11-12 15:22:00', '2024-11-12 15:22:00'),
(4, 'Belinda Wastuti', '0740 5625 634', 'Jln. Jakarta No. 101, Malang 77137, Maluku', 'pangeran.lestari@example.com', '$2y$10$B3N5S6agRJORAfd6MPjW0OONfnoQNCCGd675s9QRnd2dpo8P0atZK', 'Petugas', 'AO9BPitKJn', '2024-11-12 15:22:00', '2024-11-12 15:22:00'),
(5, 'Tiara Rina Lestari M.Pd', '021 2501 662', 'Gg. Katamso No. 56, Sibolga 27683, Sulteng', 'unjani64@example.org', '$2y$10$2.PwAwL0rIOlKUnIdelC3.QdtgPUaH4wBMfe5u9Kxhq8JyMINxI9.', 'Admin', '8caPJtoKzE', '2024-11-12 15:22:00', '2024-11-12 15:22:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_jual_belis`
--
ALTER TABLE `detail_jual_belis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_jual_belis_detail_penjualan_id_foreign` (`detail_penjualan_id`),
  ADD KEY `detail_jual_belis_detail_pembelian_id_foreign` (`detail_pembelian_id`);

--
-- Indeks untuk tabel `detail_pembelians`
--
ALTER TABLE `detail_pembelians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pembelians_pembelian_id_foreign` (`pembelian_id`),
  ADD KEY `detail_pembelians_obat_id_foreign` (`obat_id`);

--
-- Indeks untuk tabel `detail_penjualans`
--
ALTER TABLE `detail_penjualans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_penjualans_penjualan_id_foreign` (`penjualan_id`),
  ADD KEY `detail_penjualans_obat_id_foreign` (`obat_id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obats`
--
ALTER TABLE `obats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `obats_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelians_supplier_id_foreign` (`supplier_id`),
  ADD KEY `pembelians_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `penjualans`
--
ALTER TABLE `penjualans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT untuk tabel `detail_jual_belis`
--
ALTER TABLE `detail_jual_belis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelians`
--
ALTER TABLE `detail_pembelians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualans`
--
ALTER TABLE `detail_penjualans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `obats`
--
ALTER TABLE `obats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjualans`
--
ALTER TABLE `penjualans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_jual_belis`
--
ALTER TABLE `detail_jual_belis`
  ADD CONSTRAINT `detail_jual_belis_detail_pembelian_id_foreign` FOREIGN KEY (`detail_pembelian_id`) REFERENCES `detail_pembelians` (`id`),
  ADD CONSTRAINT `detail_jual_belis_detail_penjualan_id_foreign` FOREIGN KEY (`detail_penjualan_id`) REFERENCES `detail_penjualans` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_pembelians`
--
ALTER TABLE `detail_pembelians`
  ADD CONSTRAINT `detail_pembelians_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `obats` (`id`),
  ADD CONSTRAINT `detail_pembelians_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelians` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_penjualans`
--
ALTER TABLE `detail_penjualans`
  ADD CONSTRAINT `detail_penjualans_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `obats` (`id`),
  ADD CONSTRAINT `detail_penjualans_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualans` (`id`);

--
-- Ketidakleluasaan untuk tabel `obats`
--
ALTER TABLE `obats`
  ADD CONSTRAINT `obats_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`);

--
-- Ketidakleluasaan untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  ADD CONSTRAINT `pembelians_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `pembelians_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `penjualans`
--
ALTER TABLE `penjualans`
  ADD CONSTRAINT `penjualans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
