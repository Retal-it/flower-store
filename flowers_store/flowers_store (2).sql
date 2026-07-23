-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 مايو 2026 الساعة 13:40
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowers_store`
--

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Seedling'),
(2, 'Seed');

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `category_id`, `created_at`) VALUES
(18, 'Gypsophila', '• Vibe: Minimalist, airy, and romantic.\r\n• Symbolism: Represents purity and everlasting love.\r\n• Care: Loves bright light and moderate watering.', 150.00, 'photo_٢٠٢٦-٠٥-٠٥_٢٣-١٦-١٣.jpg', 1, '2026-05-07 14:24:35'),
(19, 'Jasmine', 'Vibe: Elegant, refreshing, and serene.\r\nSymbolism: Represents purity, modesty, and grace.\r\nCare: Loves bright, indirect light and consistent moisture.\r\nScent: Sweet, intoxicating, and naturally calming.', 170.00, 'Jasmine.jpg', 1, '2026-05-07 15:26:59'),
(20, 'Sweet Pea', 'Vibe: Dreamy, nostalgic, and sophisticated.\r\nSymbolism: Represents blissful pleasure, gratitude, and delicate beauty.\r\nCare: Prefers cool temperatures, plenty of sunshine, and well-drained soil.\r\nScent: Honey-sweet, floral, and reminiscent of a spring garden.', 120.00, 'Sweet Pea.jpg', 1, '2026-05-07 15:30:56'),
(21, 'Orchids', 'Vibe: Exotic, graceful, and luxurious.\r\nSymbolism: Represents rare beauty, strength, and refined love.\r\nCare: Prefers bright indirect light, high humidity, and specialized orchid bark.\r\nScent: Often subtle and powdery, or sometimes completely scentless.', 100.00, 'Orchids.jpg', 1, '2026-05-07 15:38:53'),
(22, 'Canna Lily', 'Vibe: Tropical, bold, and energetic.\r\nSymbolism: Represents passion, confidence, and a bright future.\r\nCare: Prefers full sun, frequent watering, and rich, moist soil.\r\nScent: Mostly scentless, though some varieties offer a very faint, grassy aroma.', 165.00, 'Canna Lily.jpg', 1, '2026-05-07 15:41:52'),
(23, 'Aster', 'Vibe: Tropical, bold, and energetic.\r\nSymbolism: Represents passion, confidence, and a bright future.\r\nCare: Prefers full sun, frequent watering, and rich, moist soil.\r\nScent: Mostly scentless, though some varieties offer a very faint, grassy aroma.', 180.00, 'Aster.jpg', 1, '2026-05-07 15:44:10'),
(24, 'Carnations', 'Variety: Spray Carnations (Multiple blooms per stem).\r\nColors: A mix of bold Red, soft Pink, and pure White.\r\nVibe: Classic, textured, and colorful.\r\nSymbolism: Love (Red), Gratitude (Pink), and Purity (White).', 190.00, 'Carnations.jpg', 1, '2026-05-07 15:49:10'),
(32, 'Asters seed', NULL, 45.00, 'Asters.jpg', 2, '2026-05-07 21:09:49'),
(33, 'Black Orchid seed', NULL, 66.00, 'blackOrchids.jpg', 2, '2026-05-07 21:18:35'),
(34, 'Zinnias seed', NULL, 76.00, 'Zinnias.jpg', 2, '2026-05-07 21:19:42'),
(35, 'Roses seed', NULL, 88.00, 'roses.jpg', 2, '2026-05-07 21:20:18'),
(36, 'Jasmine seed', NULL, 38.00, '‏‏jasmine - نسخة.jpg', 2, '2026-05-07 21:22:29'),
(37, 'Delphiniums seed', NULL, 178.00, 'Delphiniums.jpg', 2, '2026-05-07 21:26:56'),
(38, 'Carnations seed', NULL, 74.00, '‏‏Carnations - نسخة.jpg', 2, '2026-05-07 21:27:41'),
(39, 'Orchids seed', NULL, 56.00, '‏‏orchids - نسخة.jpg', 2, '2026-05-07 21:28:24');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'ahmed', 'ahmed@example.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
