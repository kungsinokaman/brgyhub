-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3325
-- Generation Time: Nov 22, 2024 at 12:19 AM
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
-- Database: `brgyhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `fullname` varchar(150) NOT NULL,
  `age` int(100) NOT NULL,
  `certificates` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`fullname`, `age`, `certificates`) VALUES
('Renald Capillo', 20, 'Certificate of Indigency'),
('Bryl Cedric L. Gumban', 22, 'Certificate of Residency'),
('Flordale Dane Rio R. Palo', 20, 'Certificate of Residency'),
('Rosie Jane P. Siosan', 18, 'Certificate of Residency'),
('Jesselyn R. Lenaria', 63, 'Certificate of Indigency'),
('Bryl Cedric L. Gumban', 22, 'Certificate of Residency'),
('Renald P. Capillo', 22, 'Certificate of Indigency'),
('Jeany Rose P. Ignacio', 22, 'Certificate of Indigency');

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `fullname` varchar(150) NOT NULL,
  `age` int(100) NOT NULL,
  `clearance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clearance`
--

INSERT INTO `clearance` (`fullname`, `age`, `clearance`) VALUES
('Bryl Cedric Gumban', 22, 'School Reference'),
('Bryl Cedric L. Gumban', 22, 'School Reference'),
('Bryl Cedric L. Gumban', 22, 'Application for Employment'),
('Renald P. Capillo', 20, 'Overseas Travel Papers'),
('Renald P. Capillo', 20, 'Application for Employment'),
('Rosie Jane P. Siosan', 20, 'Transfer of Residence'),
('Rosie Jane P. Siosan', 18, 'Overseas Travel Papers'),
('Jesselyn R. Lenaria', 63, 'Application for Senior Citizen ID'),
('Bryl Cedric L. Gumban', 22, 'School Reference'),
('Renald P. Capillo', 22, 'School Reference');

-- --------------------------------------------------------

--
-- Table structure for table `head`
--

CREATE TABLE `head` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `head`
--

INSERT INTO `head` (`id`, `name`, `email`, `password`, `image`, `status`) VALUES
('V3O7HOeE8dgJTZDoZT4Z', 'Dazel Palo', 'dazel@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'AF1YLyKzsUptlBfpbDAl.jpg', ''),
('fbnVN8gRXt7CnGLUkwZY', 'Freesel Joy P. Cardinal', 'jcardinal@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'UcBBSeJYrXKblgE7QJ5O.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_path`, `description`) VALUES
(4, 'storage/community_post_images/673c8f0c70d83.jpg', 'Clean streets, happy hearts: Barangay Lopez Jaena St. residents show their commitment to a cleaner community.'),
(5, 'storage/community_post_images/673c8f7655bc2.jpg', 'Full bellies, happy smiles: Feeding program brings joy and sustenance to Barangay Lopez Jaena St. residents.'),
(6, 'storage/community_post_images/673c8fe01805b.jpeg', 'Barangay Lopez Jaena St. residents actively participate in a productive assembly, discussing community issues and plans.'),
(7, 'storage/community_post_images/673c90afdf2e4.jpeg', 'Keeping pace with technology: Barangay Lopez Jaena St. officials gain valuable digital knowledge through a specialized workshop.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `noticemsg`
--

CREATE TABLE `noticemsg` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `noticemsg`
--

INSERT INTO `noticemsg` (`id`, `message`) VALUES
(67, 'Announcement 3:\r\nWhat: Feeding Program\r\nWhen: September 8, 2024 @11:00am\r\nWho: Barangay Residents\r\nWhere: Barangay Hall'),
(68, 'Announcement 4\r\nWhat: Clean-up drive\r\nWhen: October 1, 2024 @8:00am\r\nWho: Barangay residents\r\nWhere: Barangay Lopez Jaena St.'),
(69, 'Announcement 5\r\nWhat: Barangay Officials Meeting\r\nWho: Barangay Officers\r\nWhen: September 15, 2024 @8:00am\r\nWhere: Barangay Hall');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`) VALUES
('80cgKcu4mSnH07hWpvaz', 'Rosie Jane P. Siosan', 'rosiesiosan@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '3Kyx6nLFrEuuJxoihFZl.jpg'),
('Av21FiCafXEQ6QalDIqR', 'pedro', 'pedro@gmail.com', '7d695548f82a9589a5b09da95040ad6930ce8b86', 'GJLKWKaVxJfwQiRMcZwn.jpg'),
('C8ggJaaB1SuoTgO6iBwv', 'Renald Capillo', 'renald@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'c9HMtc98w6j5ZauNVGHh.jpg'),
('HBdytwF1aOUdMJDLGJk0', 'petercutee', 'petercutee@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'ROL7rDaA66jPBhDSFfPP.jpg'),
('L4bQQhsKuqI40Xp4EFVA', 'Jeany Rose P. Ignacio', 'jennie@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2g5qggYdOUhqFTj1jdpC.jpg'),
('LmOyxguDBHK59eq5R9pd', 'Bryl Cedric Gumban', 'bryl@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'GOufpUCCpePlPcqRAkzp.jpg'),
('pVfJL0WurXosLMEELJcS', 'Jesselyn R. Lenaria', 'jlenaria@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'mmcLDxifpP7hL1HhpN9h.jpg'),
('qfnVhWKiPh70o20o39EV', 'Flordale Dane Rio R. Palo', 'flordalepalo@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'KM803qG6xyqQEH3uk3zP.png'),
('rEGQicXWNQmh8TGS860N', 'cj funa', 'cj@gmail.com', '83787f060a59493aefdcd4b2369990e7303e186e', 'ozHDM3lDeJ5ygjmOEClT.png'),
('xo6YwGUkihidJ8qSzJKh', 'Winston Corneja', 'winston@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'YvL1B6g8yZzSQhy56GAM.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticemsg`
--
ALTER TABLE `noticemsg`
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
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `noticemsg`
--
ALTER TABLE `noticemsg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
