-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2025 at 07:31 AM
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
(1, 'Elektronik', 'Produk elektronik seperti TV, komputer, dan smartphone.', '2024-12-20 08:13:11', '2024-12-20 08:13:11'),
(2, 'Fashion', 'Pakaian, aksesori, dan sepatu untuk pria, wanita, dan anak-anak.', '2024-12-20 08:13:11', '2024-12-20 08:13:11'),
(3, 'Makanan & Minuman', 'Produk makanan dan minuman siap saji atau bahan makanan.', '2024-12-20 08:13:11', '2024-12-20 08:13:11'),
(4, 'Kesehatan', 'Produk kesehatan seperti obat-obatan dan alat kesehatan.', '2024-12-20 08:13:11', '2024-12-20 08:13:11'),
(5, 'Olahraga', 'Peralatan olahraga dan pakaian olahraga.', '2024-12-20 08:13:11', '2024-12-20 08:13:11'),
(6, 'Peralatan Rumah Tangga', 'Peralatan rumah tangga seperti panci, blender, dan lainnya.', '2024-12-20 08:13:11', '2024-12-20 08:13:11');

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
(1, 'Azkadina Razan Fatimah', 'Jl. RTA Milono Kota Palangkaraya', '085249099652', 'admin', 'azkadina@mail.com', 'admin', 'kasir', '2025-01-02 14:22:14', '2025-01-02 14:22:27');

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
(1, 'PRD001', 'Earbuds Nirkabel', 850000, 40, NULL, 1, '2024-12-20 08:24:21', '2024-12-21 06:15:50'),
(2, 'PRD002', 'Smartwatch Generasi Baru', 3200000, 25, NULL, 1, '2024-12-20 08:24:21', '2024-12-21 06:16:29'),
(3, 'PRD003', 'Proyektor Mini HD', 2800000, 10, NULL, 1, '2024-12-20 08:24:21', '2024-12-21 06:16:29'),
(4, 'PRD004', 'Sepatu Boots Kulit', 450000, 20, NULL, 2, '2024-12-20 08:24:21', '2024-12-21 06:16:29'),
(5, 'PRD005', 'Topi Baseball', 120000, 50, NULL, 2, '2024-12-20 08:24:21', '2024-12-21 06:16:29'),
(6, 'PRD006', 'Jaket Denim Unisex', 320000, 30, NULL, 2, '2024-12-20 08:24:21', '2024-12-21 06:16:29'),
(7, 'PRD007', 'Pizza Pepperoni Medium', 90000, 7, NULL, 3, '2024-12-20 08:24:21', '2025-01-03 02:26:42'),
(8, 'PRD008', 'Donat Isi Cokelat', 15000, 100, NULL, 3, '2024-12-20 08:24:21', '2024-12-21 06:16:29'),
(9, 'PRD009', 'Smoothie Strawberry', 25000, 50, NULL, 3, '2024-12-20 08:24:21', '2024-12-21 06:16:29'),
(10, 'PRD009', 'Obat Flu Tablet', 20000, 200, NULL, 4, '2024-12-20 08:24:21', '2024-12-21 06:16:29'),
(11, 'PRD010', 'Paket Vitamin Multivitamin', 120000, 80, NULL, 4, '2024-12-20 08:24:21', '2024-12-21 06:16:29'),
(12, 'PRD011', 'Hand Sanitizer 500ml', 30000, 150, NULL, 4, '2024-12-20 08:24:21', '2024-12-21 06:16:29'),
(13, 'PRD012', 'Sepeda Lipat Aluminium', 3500000, 62, NULL, 5, '2024-12-20 08:24:21', '2025-01-03 04:01:59'),
(14, 'PRD013', 'Sarung Tinju', 150000, 38, NULL, 5, '2024-12-20 08:24:21', '2025-01-03 04:01:59'),
(16, 'PRD015', 'Vacuum Cleaner Robot', 2000000, 12, NULL, 6, '2024-12-20 08:24:21', '2024-12-21 06:16:29'),
(17, 'PRD016', 'Microwave Oven Digital', 1500000, 15, NULL, 6, '2024-12-20 08:24:21', '2025-01-03 04:00:22'),
(18, 'PRD017', 'Kompor Listrik 2 Tungku', 1200000, 20, NULL, 6, '2024-12-20 08:24:21', '2024-12-21 06:16:29'),
(19, 'PRD018', 'Monitor Gaming Curved 27 Inch', 4000000, 15, NULL, 1, '2024-12-20 08:24:21', '2024-12-21 06:16:29'),
(20, 'PRD019', 'Keyboard Mekanikal RGB', 750000, 22, NULL, 1, '2024-12-20 08:24:21', '2025-01-03 04:01:59'),
(21, 'PRD020', 'Drone Kamera HD', 12000000, 8, NULL, 1, '2024-12-20 08:24:21', '2024-12-21 06:16:29'),
(22, 'PRD021', 'Tas Kulit Premium', 550000, 20, NULL, 2, '2024-12-20 08:24:21', '2024-12-21 06:16:29'),
(23, 'PRD022', 'Jas Formal Pria', 950000, 15, '677661dc4a788.png', 2, '2024-12-20 08:24:21', '2025-01-02 09:52:28'),
(41, 'PRD023', 'Jam Tangan Wanita Elegan', 320000, 30, '67758579cd2fa.jpeg', 2, '2025-01-01 18:06:45', '2025-01-01 18:12:09');

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

--
-- Dumping data for table `stok_detail`
--

INSERT INTO `stok_detail` (`id`, `produk_id`, `stok_masuk`, `tanggal_masuk`) VALUES
(1, 23, 10, '2025-01-02'),
(2, 1, 20, '2025-01-02'),
(3, 13, 1, '2025-01-02'),
(4, 13, 5, '2025-01-02'),
(5, 13, 10, '2025-01-02'),
(6, 13, 5, '2025-01-02'),
(7, 13, 5, '2025-01-02'),
(8, 13, 2, '2025-01-02'),
(9, 13, 2, '2025-01-02'),
(10, 13, 13, '2025-01-02'),
(11, 13, 7, '2025-01-02'),
(12, 13, 5, '2025-01-02'),
(13, 13, 5, '2025-01-02'),
(14, 7, 2, '2025-01-03');

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

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal_transaksi`, `total`, `pengguna_id`, `created_at`, `updated_at`) VALUES
(1, '2025-01-03', 150000.00, 1, '2025-01-03 04:01:40', '2025-01-03 04:01:41'),
(2, '2025-01-03', 9400000.00, 1, '2025-01-03 04:01:59', '2025-01-03 04:01:59');

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
  `diskon` decimal(10,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `transaksi_id`, `produk_id`, `quantity`, `harga`, `sub_total`, `diskon`, `created_at`, `updated_at`) VALUES
(1, 1, 14, 1, 150000.00, 150000.00, 0.00, '2025-01-03 04:01:41', '2025-01-03 04:01:41'),
(2, 2, 13, 2, 3500000.00, 7000000.00, 0.00, '2025-01-03 04:01:59', '2025-01-03 04:01:59'),
(3, 2, 14, 1, 150000.00, 150000.00, 0.00, '2025-01-03 04:01:59', '2025-01-03 04:01:59'),
(4, 2, 20, 3, 750000.00, 2250000.00, 0.00, '2025-01-03 04:01:59', '2025-01-03 04:01:59');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `stok_detail`
--
ALTER TABLE `stok_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
