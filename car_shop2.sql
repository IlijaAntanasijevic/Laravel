-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 07:27 PM
-- Server version: 11.4.0-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_shop2`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_models`
--

CREATE TABLE `car_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `body_id` bigint(20) UNSIGNED NOT NULL,
  `seat_id` bigint(20) UNSIGNED NOT NULL,
  `doors_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_models`
--

INSERT INTO `car_models` (`id`, `model_id`, `brand_id`, `body_id`, `seat_id`, `doors_id`, `created_at`, `updated_at`) VALUES
(1, 1, 16, 1, 4, 2, NULL, NULL),
(2, 6, 2, 1, 4, 2, NULL, NULL),
(3, 3, 14, 5, 4, 2, NULL, NULL),
(4, 4, 3, 3, 4, 2, NULL, NULL),
(5, 4, 13, 1, 4, 2, NULL, NULL),
(6, 5, 17, 4, 4, 2, NULL, NULL),
(7, 1, 16, 2, 4, 2, '2024-03-10 16:40:35', '2024-03-10 16:40:35'),
(8, 6, 2, 2, 4, 2, '2024-03-10 17:25:14', '2024-03-10 17:25:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_models_model_id_foreign` (`model_id`),
  ADD KEY `car_models_brand_id_foreign` (`brand_id`),
  ADD KEY `car_models_body_id_foreign` (`body_id`),
  ADD KEY `car_models_seat_id_foreign` (`seat_id`),
  ADD KEY `car_models_doors_id_foreign` (`doors_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_models`
--
ALTER TABLE `car_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_models`
--
ALTER TABLE `car_models`
  ADD CONSTRAINT `car_models_body_id_foreign` FOREIGN KEY (`body_id`) REFERENCES `bodies` (`id`),
  ADD CONSTRAINT `car_models_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `car_models_doors_id_foreign` FOREIGN KEY (`doors_id`) REFERENCES `doors` (`id`),
  ADD CONSTRAINT `car_models_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`),
  ADD CONSTRAINT `car_models_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
