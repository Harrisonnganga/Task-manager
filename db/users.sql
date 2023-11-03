-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2023 at 05:22 PM
-- Server version: 8.0.33
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(9, 'ngangaharrison490@gmail.com', '$2y$10$kB2Yk1wxFFjn6xykBBFbJuTeuuy7VBo3QlHfFcO2nkJt50lGUX5EG'),
(10, 'harry@gmail.com', '$2y$10$jC7P23QkpChuEteU0TSnu.t4Btyci3bstnlzE7em0yfumfKwmnVom'),
(11, 'joh@example.com', '$2y$10$wl5ejDVM8995gHeoH7d9D.kEvYU4qVK/qIYoHJhhQQS9AsuVd9Bqq'),
(12, 'harrison.nganga@learninglions.org', '$2y$10$GZMbwqURKDnZwZEO9DvK7OXIJfLOZyxAFnIXTd6WKVBzgxwStn0Py'),
(13, 'kenya@gmail.com', '$2y$10$fZJlypshgjhwVF2dEiv40OOoibD4YvJg7kAaG/lOiEWkKMX9FxveK'),
(14, 'ngangaharrison544@gmail.com', '$2y$10$2rhtNZHOF5.8rWFx87n1W.HJH2zIcHZndlnbDMrtDXairoMBRAQv6');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
