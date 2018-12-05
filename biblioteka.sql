-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2018 at 10:56 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `jezik`
--

CREATE TABLE `jezik` (
  `id` int(11) NOT NULL,
  `jezici` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jezik`
--

INSERT INTO `jezik` (`id`, `jezici`) VALUES
(1, 'srpski'),
(2, 'engleski'),
(3, 'hrvatski');

-- --------------------------------------------------------

--
-- Table structure for table `knjige`
--

CREATE TABLE `knjige` (
  `id` int(11) NOT NULL,
  `naslov` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `godina` varchar(10) NOT NULL,
  `izdavac` varchar(30) NOT NULL,
  `jezik` int(10) NOT NULL,
  `zanrovi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `knjige`
--

INSERT INTO `knjige` (`id`, `naslov`, `autor`, `godina`, `izdavac`, `jezik`, `zanrovi`) VALUES
(4, 'U Potrazi za Drakulom', 'Rejmond Mekneli i Radu Floresku', '2006', 'Tisa', 1, 4),
(6, 'Vampir 1816', 'Dzon Polidori, Lord Bajron i Mer Seli', '2006', 'Tisa', 1, 1),
(7, 'Krstaski Ratovi u ocima Arapa', 'Amin Maluf', '2006', 'Laguna', 1, 4),
(8, 'Samarkand', 'Amin Maluf', '2013', 'Laguna', 1, 4),
(9, 'Americki Bogovi', 'Nil Gejmen', '2008', 'Laguna', 1, 5),
(11, 'Prasko Groblje', 'Umberto Eko', '2011', 'Plato', 1, 4),
(12, 'Ime Ruze', 'Umberto Eko', '2014', 'Vulkan', 1, 4),
(14, 'Krvavi Meridijan', 'Kormak Makarti', '2009', 'BeoBook', 1, 2),
(15, 'Limeni Dobos', 'Ginter Gras', '2014', 'Laguna', 1, 2),
(16, 'A Game of Thrones', 'George R.R. Martin', '1996', 'Bantam Spectra', 2, 3),
(17, 'A Clash of Kings', 'George R.R. Martin', '1999', 'Bantam Spectra', 2, 3),
(18, 'A Storm of Swords', 'George R.R. Martin', '2000', 'Bantam Spectra', 2, 3),
(19, 'A Feast for Crows', 'George R.R. Martin', '2005', 'Bantam Spectra', 2, 3),
(20, 'A Dance with Dragons', 'George R.R. Martin', '2011', 'Bantam Spectra', 2, 3),
(24, 'Hanibal', 'Tomas Haris', '2002', 'Narodna knjiga', 1, 6),
(30, 'Sirocici Heliksa', 'Den Simons', '2005', 'Polaris', 1, 5),
(31, 'Stari Rim', 'V. I. Maskin', '1953', 'Plato', 1, 4),
(40, 'Kad jaganjci utihnu', 'Tomas Haris', '2004', 'VeÄernji list', 3, 6),
(42, 'Gole kosti', 'Stiven King', '2005', 'TWIN PRESS', 3, 1),
(43, 'Godisnja doba', 'Stiven King', '2006', 'TWIN PRESS', 3, 1),
(44, 'Karmila', 'Seridan La Fanu', '1995', 'Tisa', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `firstName`, `lastName`, `password`, `user_type`) VALUES
(1, 'Suzana', 'suzanizam87@gmail.com', 'Suzana', 'Radojevic', '$2y$10$b82/vX6Ns5zwkmLo0/yVGu8V/53P3EZ/0/dYBqzumN.zD9u6XzvOe', 1),
(2, 'Daca', 'daca@mail.com', 'Danijela', 'Radojevic', '$2y$10$qP57MD.NLi28ZU6R7P11BOr9ypKewvCktf8nbUoR21764.bjKf1a.', 3),
(3, 'Marko', 'margo@mail.com', 'Marko', 'Mladenovic', '$2y$10$Ojko/befdXeuRiFbU.uTBu0S3cyhDlAHR1j/4SPguO/aG2remX1qy', 3),
(5, 'Petar', 'pera@mail.com', 'Petar', 'Petrovic', '$2y$10$Pi9t0RAb0JucGByjtEyuY.RoH8lxwkdb.ENEPWBsUqE7FWwfHhjGC', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users_type`
--

CREATE TABLE `users_type` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_type`
--

INSERT INTO `users_type` (`id`, `type`) VALUES
(1, 'admin'),
(2, 'moderator'),
(3, 'regular_user');

-- --------------------------------------------------------

--
-- Table structure for table `zanr`
--

CREATE TABLE `zanr` (
  `id` int(11) NOT NULL,
  `naziv_zanra` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zanr`
--

INSERT INTO `zanr` (`id`, `naziv_zanra`) VALUES
(1, 'horor'),
(2, 'drama'),
(3, 'epska fantastika'),
(4, 'istorijski'),
(5, 'fantastika'),
(6, 'triler');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jezik`
--
ALTER TABLE `jezik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knjige`
--
ALTER TABLE `knjige`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jezik` (`jezik`,`zanrovi`),
  ADD KEY `zanr` (`zanrovi`),
  ADD KEY `jezik_2` (`jezik`,`zanrovi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `users_type`
--
ALTER TABLE `users_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zanr`
--
ALTER TABLE `zanr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jezik`
--
ALTER TABLE `jezik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `knjige`
--
ALTER TABLE `knjige`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users_type`
--
ALTER TABLE `users_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `zanr`
--
ALTER TABLE `zanr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `knjige`
--
ALTER TABLE `knjige`
  ADD CONSTRAINT `knjige_ibfk_1` FOREIGN KEY (`jezik`) REFERENCES `jezik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `knjige_ibfk_2` FOREIGN KEY (`zanrovi`) REFERENCES `zanr` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `users_type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
