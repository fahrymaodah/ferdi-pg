-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2023 pada 14.13
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
-- Database: `lerdi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `administrator_id` int(11) NOT NULL,
  `administrator_name` varchar(25) NOT NULL,
  `administrator_email` varchar(50) NOT NULL,
  `administrator_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`administrator_id`, `administrator_name`, `administrator_email`, `administrator_password`) VALUES
(1, 'Fahry Maodah', 'mfahry96@gmail.com', '41cafa3672372dd6df005dfe8d1f7675a6e85f21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `product_size_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL,
  `category_url` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_url`) VALUES
(1, 'T-Shirt', 't-shirt'),
(2, 'Gantungan Kunci', 'gantungan-kunci');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destination`
--

CREATE TABLE `destination` (
  `destination_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `destination_name` varchar(25) NOT NULL,
  `destination_email` varchar(50) NOT NULL,
  `destination_contact` varchar(25) NOT NULL,
  `destination_city` varchar(25) NOT NULL,
  `destination_address` text NOT NULL,
  `destination_postal_code` varchar(10) NOT NULL,
  `destination_tracking` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `destination`
--

INSERT INTO `destination` (`destination_id`, `order_id`, `destination_name`, `destination_email`, `destination_contact`, `destination_city`, `destination_address`, `destination_postal_code`, `destination_tracking`) VALUES
(1, 1, 'Fahry Maodah', 'mfahry96@gmail.com', '087705561599', 'Sleman', 'Jl. Kledokan IV No. 41 B. Depok', '55281', '003005580322'),
(2, 2, 'Ferdiansyah Putra', 'ferdip99@gmail.com', '081234567890', 'Sleman', 'Jl. Kaliurang No. 1. Sleman', '55581', ''),
(3, 3, 'Fahry Maodah', 'mfahry96@gmail.com', '087705561599', 'Sleman', 'Jl. Kledokan IV No. 41 B. Depok', '55281', '124534523124'),
(5, 5, 'Fahry Maodah', 'mfahry96@gmail.com', '087705561599', 'Sleman', 'Jl. Kledokan IV No. 41 B. Caturtunggal. Depok', '55281', ''),
(6, 6, 'Fahry Maodah', 'mfahry96@gmail.com', '087705561599', 'Sleman', 'TEs', '55281', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(25) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `member_contact` varchar(25) NOT NULL,
  `member_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_email`, `member_contact`, `member_password`) VALUES
(1, 'Fahry Maodah', 'mfahry96@gmail.com', '087705561599', '41cafa3672372dd6df005dfe8d1f7675a6e85f21'),
(2, 'Ferdiansyah Putra', 'ferdip99@gmail.com', '081234567890', '367935cdd686c8bc4658f96564d0dd8f5b3e9034');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `order_code` varchar(25) NOT NULL,
  `order_total` int(11) NOT NULL,
  `order_payment` varchar(25) NOT NULL,
  `order_service` varchar(10) NOT NULL,
  `order_status` enum('','pending','paid','packing','sending','completed','cancelled') NOT NULL,
  `order_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`order_id`, `member_id`, `order_code`, `order_total`, `order_payment`, `order_service`, `order_status`, `order_datetime`) VALUES
(1, 1, 'INV-230322001', 250000, 'Direct Bank Transfer', 'JNE', 'completed', '2023-03-10 20:17:07'),
(2, 2, 'INV-230322002', 200000, 'Direct Bank Transfer', 'JNE', 'cancelled', '2023-03-11 16:22:57'),
(3, 1, 'INV-230323001', 100000, 'Direct Bank Transfer', 'SiCepat', 'completed', '2023-03-11 21:41:32'),
(5, 1, 'INV-230323002', 450000, 'Direct Bank Transfer', 'SiCepat', 'cancelled', '2023-03-23 08:37:42'),
(6, 1, 'INV-230323003', 150000, 'Direct Bank Transfer', 'JNE', 'packing', '2023-03-23 11:33:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_size_id` int(11) NOT NULL,
  `order_product_qty` int(11) NOT NULL,
  `order_product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_product`
--

INSERT INTO `order_product` (`order_product_id`, `order_id`, `product_size_id`, `order_product_qty`, `order_product_price`) VALUES
(1, 1, 26, 1, 100000),
(2, 1, 31, 1, 150000),
(3, 2, 25, 2, 100000),
(4, 3, 25, 1, 100000),
(6, 5, 30, 1, 150000),
(7, 5, 33, 2, 150000),
(8, 6, 30, 1, 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_url` varchar(50) NOT NULL,
  `product_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_code`, `product_name`, `product_description`, `product_price`, `product_url`, `product_image`) VALUES
(1, 1, 'TS001', '404 Error! Not Found', 'Kaos hitam dengan bahan combed 30s. Dengan tulisan \"404 Error!\" berwarna merah dan \"Not Found\" berwarna putih', 100000, '404-error-not-found', 't-shirt-404-error-not-found.jpg'),
(3, 1, 'TS002', 'Coffee Stackoverflow Code', 'Kaos hitam dengan bahan combed 30s. Dengan gambar \"Coffee Stackoverflow Code\" berwarna kuning', 150000, 'coffee-stackoverflow-code', 'coffee-stackoverflow-code.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_size`
--

CREATE TABLE `product_size` (
  `product_size_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `product_size_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product_size`
--

INSERT INTO `product_size` (`product_size_id`, `product_id`, `size_id`, `product_size_stock`) VALUES
(24, 1, 1, 0),
(25, 1, 2, 0),
(26, 1, 3, 0),
(27, 1, 4, 0),
(28, 1, 5, 0),
(29, 3, 1, 2),
(30, 3, 2, 1),
(31, 3, 3, 0),
(32, 3, 4, 0),
(33, 3, 5, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `size_name` varchar(5) NOT NULL,
  `size_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `size`
--

INSERT INTO `size` (`size_id`, `category_id`, `size_name`, `size_description`) VALUES
(1, 1, 'S', 'P : 68 | L : 48'),
(2, 1, 'M', 'P : 71 | L : 50'),
(3, 1, 'L', 'P : 74 | L : 54'),
(4, 1, 'XL', 'P : 77 | L : 56'),
(5, 1, 'XXL', 'P : 80 | L : 60'),
(6, 2, 'S', 'Diameter 3cm'),
(7, 2, 'M', 'Diameter 5cm'),
(8, 2, 'L', 'Diameter 8cm');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`administrator_id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `product_size_id` (`product_size_id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`destination_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indeks untuk tabel `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_size_id` (`product_size_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`product_size_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indeks untuk tabel `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `administrator`
--
ALTER TABLE `administrator`
  MODIFY `administrator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `destination`
--
ALTER TABLE `destination`
  MODIFY `destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `product_size`
--
ALTER TABLE `product_size`
  MODIFY `product_size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_size_id`) REFERENCES `product_size` (`product_size_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `destination`
--
ALTER TABLE `destination`
  ADD CONSTRAINT `destination_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_size_id`) REFERENCES `product_size` (`product_size_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_size_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
