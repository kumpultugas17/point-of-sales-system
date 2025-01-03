-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2025 at 09:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `materi_pos_sistem`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Elektronik', 'Produk elektronik seperti televisi, komputer, dan smartphone', '2025-01-03 08:35:54', '2025-01-03 08:35:54'),
(2, 'Pakaian', 'Berbagai jenis pakaian untuk pria, wanita, dan anak-anak', '2025-01-03 08:35:54', '2025-01-03 08:35:54'),
(3, 'Makanan dan Minuman', 'Produk makanan ringan, minuman kemasan, dan bahan makanan', '2025-01-03 08:35:54', '2025-01-03 08:35:54'),
(4, 'Kesehatan dan Kecantikan', 'Produk seperti kosmetik, perawatan kulit, dan suplemen kesehatan', '2025-01-03 08:35:54', '2025-01-03 08:35:54'),
(5, 'Peralatan Rumah Tangga', 'Peralatan seperti blender, panci, dan barang kebutuhan rumah tangga lainnya', '2025-01-03 08:35:54', '2025-01-03 08:35:54'),
(6, 'Otomotif', 'Produk seperti aksesori mobil, motor, dan suku cadang kendaraan', '2025-01-03 08:35:54', '2025-01-03 08:35:54'),
(7, 'Mainan dan Hobi', 'Mainan untuk anak-anak serta barang untuk hobi seperti model kit atau alat musik', '2025-01-03 08:35:54', '2025-01-03 08:35:54'),
(8, 'Peralatan Olahraga', 'Produk seperti bola, raket, dan pakaian olahraga', '2025-01-03 08:35:54', '2025-01-03 08:35:54'),
(9, 'Buku dan Alat Tulis', 'Buku bacaan, buku pelajaran, dan perlengkapan alat tulis', '2025-01-03 08:35:54', '2025-01-03 08:35:54'),
(10, 'Produk Digital', 'Produk digital seperti e-book, voucher game, dan perangkat lunak', '2025-01-03 08:35:54', '2025-01-03 08:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','kasir') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama_pengguna`, `alamat`, `telepon`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin Utama', 'Jl. Merdeka No. 1', '081234567890', 'admin', 'admin@example.com', 'admin', 'admin', '2025-01-03 08:37:51', '2025-01-03 08:37:51'),
(2, 'Kasir Satu', 'Jl. Pahlawan No. 5', '082345678901', 'kasir1', 'kasir1@example.com', 'admin', 'kasir', '2025-01-03 08:37:51', '2025-01-03 08:37:51'),
(3, 'Kasir Dua', 'Jl. Sudirman No. 10', '083456789012', 'kasir2', 'kasir2@example.com', 'admin', 'kasir', '2025-01-03 08:37:51', '2025-01-03 08:37:51'),
(4, 'Admin Cadangan', 'Jl. Diponegoro No. 15', '084567890123', 'admin2', 'admin2@example.com', 'admin', 'admin', '2025-01-03 08:37:51', '2025-01-03 08:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `kategori_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode_produk`, `nama_produk`, `harga`, `stok`, `gambar`, `kategori_id`, `created_at`, `updated_at`) VALUES
(1, 'PRD001', 'Smartphone XYZ', 2500000, 50, 'smartphone_xyz.jpg', 1, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(2, 'PRD002', 'Laptop ABC', 5000000, 30, 'laptop_abc.jpg', 1, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(3, 'PRD003', 'Kaos Polos', 50000, 200, 'kaos_polos.jpg', 2, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(4, 'PRD004', 'Jaket Hoodie', 150000, 100, 'jaket_hoodie.jpg', 2, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(5, 'PRD005', 'Snack Ringan', 10000, 500, 'snack_ringan.jpg', 3, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(6, 'PRD006', 'Minuman Soda', 8000, 300, 'minuman_soda.jpg', 3, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(7, 'PRD007', 'Lipstik Merah', 70000, 100, 'lipstik_merah.jpg', 4, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(8, 'PRD008', 'Vitamin C', 90000, 150, 'vitamin_c.jpg', 4, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(9, 'PRD009', 'Blender XYZ', 300000, 50, 'blender_xyz.jpg', 5, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(10, 'PRD010', 'Panci Besar', 250000, 70, 'panci_besar.jpg', 5, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(11, 'PRD011', 'Aksesori Mobil', 100000, 40, 'aksesori_mobil.jpg', 6, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(12, 'PRD012', 'Oli Motor', 50000, 120, 'oli_motor.jpg', 6, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(13, 'PRD013', 'Mainan Robot', 120000, 60, 'mainan_robot.jpg', 7, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(14, 'PRD014', 'Gitar Akustik', 600000, 20, 'gitar_akustik.jpg', 7, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(15, 'PRD015', 'Bola Sepak', 150000, 80, 'bola_sepak.jpg', 8, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(16, 'PRD016', 'Raket Tenis', 250000, 40, 'raket_tenis.jpg', 8, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(17, 'PRD017', 'Novel Fiksi', 50000, 100, 'novel_fiksi.jpg', 9, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(18, 'PRD018', 'Pensil Mekanik', 15000, 200, 'pensil_mekanik.jpg', 9, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(19, 'PRD019', 'E-Book Programming', 100000, 9999, 'ebook_programming.jpg', 10, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(20, 'PRD020', 'Voucher Game 100k', 100000, 500, 'voucher_game.jpg', 10, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(21, 'PRD021', 'TV LED 40 Inch', 3000000, 25, 'tv_led_40.jpg', 1, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(22, 'PRD022', 'Headphone Bluetooth', 500000, 50, 'headphone_bt.jpg', 1, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(23, 'PRD023', 'Celana Jeans', 120000, 150, 'celana_jeans.jpg', 2, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(24, 'PRD024', 'Sepatu Sneakers', 300000, 80, 'sepatu_sneakers.jpg', 2, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(25, 'PRD025', 'Biskuit Cokelat', 20000, 400, 'biskuit_cokelat.jpg', 3, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(26, 'PRD026', 'Jus Buah Kemasan', 15000, 300, 'jus_buah.jpg', 3, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(27, 'PRD027', 'Pelembap Wajah', 100000, 100, 'pelembap_wajah.jpg', 4, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(28, 'PRD028', 'Minyak Rambut', 75000, 120, 'minyak_rambut.jpg', 4, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(29, 'PRD029', 'Setrika Listrik', 250000, 60, 'setrika_listrik.jpg', 5, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(30, 'PRD030', 'Kompor Gas', 450000, 40, 'kompor_gas.jpg', 5, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(31, 'PRD031', 'Ban Motor', 300000, 50, 'ban_motor.jpg', 6, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(32, 'PRD032', 'Lampu Mobil', 150000, 70, 'lampu_mobil.jpg', 6, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(33, 'PRD033', 'Puzzle Anak', 50000, 120, 'puzzle_anak.jpg', 7, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(34, 'PRD034', 'Drum Kit Mini', 1500000, 15, 'drum_kit_mini.jpg', 7, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(35, 'PRD035', 'Kaos Olahraga', 75000, 150, 'kaos_olahraga.jpg', 8, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(36, 'PRD036', 'Sepatu Lari', 400000, 60, 'sepatu_lari.jpg', 8, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(37, 'PRD037', 'Ensiklopedia Anak', 200000, 80, 'ensiklopedia_anak.jpg', 9, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(38, 'PRD038', 'Buku Gambar', 30000, 200, 'buku_gambar.jpg', 9, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(39, 'PRD039', 'Software Antivirus', 350000, 500, 'software_antivirus.jpg', 10, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(40, 'PRD040', 'Voucher Streaming 1 Bulan', 50000, 300, 'voucher_streaming.jpg', 10, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(41, 'PRD041', 'Tablet Android', 2000000, 40, 'tablet_android.jpg', 1, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(42, 'PRD042', 'Power Bank 10000mAh', 300000, 100, 'power_bank.jpg', 1, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(43, 'PRD043', 'Kemeja Formal', 150000, 120, 'kemeja_formal.jpg', 2, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(44, 'PRD044', 'Topi Baseball', 50000, 150, 'topi_baseball.jpg', 2, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(45, 'PRD045', 'Keripik Kentang', 15000, 300, 'keripik_kentang.jpg', 3, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(46, 'PRD046', 'Teh Botol', 8000, 500, 'teh_botol.jpg', 3, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(47, 'PRD047', 'Maskara Tahan Air', 90000, 90, 'maskara_tahan_air.jpg', 4, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(48, 'PRD048', 'Sabun Wajah', 60000, 130, 'sabun_wajah.jpg', 4, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(49, 'PRD049', 'Rice Cooker', 350000, 70, 'rice_cooker.jpg', 5, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(50, 'PRD050', 'Kipas Angin', 250000, 80, 'kipas_angin.jpg', 5, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(51, 'PRD051', 'Pelindung Jok Mobil', 120000, 60, 'pelindung_jok.jpg', 6, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(52, 'PRD052', 'Helm Motor', 400000, 50, 'helm_motor.jpg', 6, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(53, 'PRD053', 'Kartu Remi', 20000, 200, 'kartu_remi.jpg', 7, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(54, 'PRD054', 'Keyboard Gaming', 500000, 25, 'keyboard_gaming.jpg', 7, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(55, 'PRD055', 'Matras Yoga', 150000, 40, 'matras_yoga.jpg', 8, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(56, 'PRD056', 'Jersey Sepak Bola', 250000, 90, 'jersey_sepak_bola.jpg', 8, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(57, 'PRD057', 'Kamus Bahasa Inggris', 100000, 50, 'kamus_bahasa_inggris.jpg', 9, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(58, 'PRD058', 'Spidol Warna', 25000, 180, 'spidol_warna.jpg', 9, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(59, 'PRD059', 'Template Web', 200000, 9999, 'template_web.jpg', 10, '2025-01-03 08:40:49', '2025-01-03 08:40:49'),
(60, 'PRD060', 'Lisensi Musik', 150000, 300, 'lisensi_musik.jpg', 10, '2025-01-03 08:40:49', '2025-01-03 08:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `stok_detail`
--

CREATE TABLE `stok_detail` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `stok_masuk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kategori` (`kategori_id`);

--
-- Indexes for table `stok_detail`
--
ALTER TABLE `stok_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `stok_detail`
--
ALTER TABLE `stok_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `stok_detail`
--
ALTER TABLE `stok_detail`
  ADD CONSTRAINT `stok_detail_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id`);

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`),
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
