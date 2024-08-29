-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2024 at 10:26 AM
-- Server version: 10.6.18-MariaDB-cll-lve
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codetalk_codetalk`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'lussyanast', 'lussyanast@example.com', '$2y$12$VRjnkS65Pmb0/', 'https://ui-avatars.com/api/?name=Birdie+Kreiger', '2024-07-08 03:04:08', '2024-07-08 03:04:08'),
(2, 'sygyt', 'mybim@mailinator.com', '$2y$12$ej5LYNmOMMcByNbM5Ire7.1WRtzApUiFUnV5eYWp4/QBEo.C1.bvy', 'images/users/picture/RMPFkGJbLoHER3pBWSLyVGwrd8FqEILf6eIylTrt.png', '2024-07-08 03:08:28', '2024-07-08 06:03:18'),
(3, 'nonokizuri', 'xaledigid@mailinator.com', '$2y$12$/M//rD.dko1KgYxueshpve8GpQG1YiwCRj/dvIAw8GiV76w21c7Dy', 'https://ui-avatars.com/api/?name=nonokizuri', '2024-07-08 03:14:28', '2024-07-08 06:03:18'),
(4, 'falycofuta', 'panyw@mailinator.com', '$2y$12$ro8eH2zQBhKo9HL6a/2.Y.WZthWRxqRYW0LSR0VWvqfs6BW6Lm2dO', 'https://ui-avatars.com/api/?name=falycofuta', '2024-07-08 05:46:50', '2024-07-08 06:03:19'),
(5, 'pibawaw', 'holuboky@mailinator.com', '$2y$12$3BISER9YfIXIj2Z4AkmXX.85MnEds8B0DpIL2Xf0BgTdmCJGpJ49u', 'https://ui-avatars.com/api/?name=pibawaw', '2024-07-08 05:47:25', '2024-07-08 06:03:19'),
(6, 'nutefobyv', 'cimyrah@mailinator.com', '$2y$12$vWmwD2r5vyuVNYa.Wt7fkurs8wjnK7gmLl.vuDTlHds84ZiMyQ90i', 'https://ui-avatars.com/api/?name=nutefobyv', '2024-07-08 06:06:55', '2024-07-08 06:06:55'),
(7, 'nupacoto', 'siry@mailinator.com', '$2y$12$MqQqfgUdVaEsu9uiUhQrD.lgOlfrY045dVDE3U/n.bNIEIFKm8cNW', 'https://ui-avatars.com/api/?name=nupacoto', '2024-07-08 06:08:34', '2024-07-08 06:08:34'),
(8, 'zenabu', 'wadum@mailinator.com', '$2y$12$Pn8Z5VnmLFfyA1eAT.X88u422B/U8LarO42p.aMgm6pqGw8KbjYp.', 'https://ui-avatars.com/api/?name=zenabu', '2024-07-10 06:55:02', '2024-07-10 06:55:02'),
(9, 'rogarifiz', 'votod@mailinator.com', '$2y$12$8cgxc7P1fOk3vQEAeqNtAeJSbKOT6jmpWnu1jHOZvsuUaZbaRgs42', 'https://ui-avatars.com/api/?name=rogarifiz', '2024-07-14 00:36:35', '2024-07-14 00:36:35'),
(10, 'pymipu', 'cywi@mailinator.com', '$2y$12$nFzl8nOsjba2l/Ccm2e0m.1t/AigRoNqawkdHSwKCnwNCt3Exp5WO', 'https://ui-avatars.com/api/?name=pymipu', '2024-07-18 22:22:08', '2024-07-18 22:22:08'),
(11, 'pexivanasi', 'qityhycip@mailinator.com', '$2y$12$SOQ.wZok4REOp.AtjWUhze.UIXdF48IFegRYunIbqbv5T6/7eEFQ2', 'https://ui-avatars.com/api/?name=pexivanasi', '2024-07-19 18:09:25', '2024-07-19 18:09:25'),
(12, 'Ocan', 'igedeocan@gmail.com', '$2y$12$jUKKdiEIQvJpr1Ieejn6SeNHE5OLoliBMyZaTtjtnEyretgWpbsOO', 'https://ui-avatars.com/api/?name=Ocan', '2024-07-19 18:56:48', '2024-07-19 18:56:48'),
(13, 'kiryzacy', 'fygo@mailinator.com', '$2y$12$Z3NVcRgDu86mDeemCJ22x.4pb9ZgE.zEl3qPND.7ReUmi6GD2OCbq', 'https://ui-avatars.com/api/?name=kiryzacy', '2024-07-19 19:21:24', '2024-07-19 19:21:24'),
(14, 'fakid', 'kiky@mailinator.com', '$2y$12$gljRHRnN1qHxBgM3jACOGeh7YAi080t0XiKKYXOy0kUNRGjHaUofG', 'https://ui-avatars.com/api/?name=fakid', '2024-07-19 20:24:46', '2024-07-19 20:24:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
