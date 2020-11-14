-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2020 at 09:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manuchari`
--

-- --------------------------------------------------------

--
-- Table structure for table `caraddress`
--

CREATE TABLE `caraddress` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caraddress`
--

INSERT INTO `caraddress` (`id`, `user_id`, `car_address`) VALUES
(1, 3, 'vazisubani 2mr 1.kor'),
(2, 3, 'ვაზისუბანი 2 მიკრო123');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `cars` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `cars`) VALUES
(2, 'ALFA ROMEO'),
(3, 'ASTON MARTIN'),
(4, 'AUDI'),
(5, 'BENTLEY'),
(6, 'BMW'),
(7, 'BRILLIANCE'),
(33, 'BUGATTI'),
(34, 'BUICK'),
(35, 'CADILLAC'),
(36, 'CHANGAN'),
(37, 'CHERY'),
(38, 'CHEVROLET'),
(40, 'CHRYSLER'),
(41, 'CITROEN'),
(42, 'CPI'),
(43, 'DAEWOO'),
(44, 'DAIHATSU'),
(45, 'DM TELAI'),
(46, 'DODGE'),
(47, 'DONGFENG'),
(48, 'FAW'),
(49, 'FERRARI'),
(50, 'FIAT'),
(51, 'FISKER'),
(52, 'FORD'),
(53, 'Fortschritt'),
(54, 'FOTON'),
(55, 'GAZ'),
(56, 'GEELY'),
(57, 'GMC'),
(58, 'GREATWALL'),
(59, 'HAVAL'),
(60, 'HONDA'),
(61, 'HUMMER'),
(62, 'HYSTER'),
(63, 'HYUNDAI'),
(64, 'INFINITI'),
(65, 'ISUZU'),
(66, 'IVECO'),
(67, 'JAC'),
(68, 'JAGUAR'),
(69, 'JEEP'),
(70, 'KARSAN'),
(71, 'KIA'),
(72, 'LAMBORGHINI'),
(73, 'LANCIA'),
(74, 'LAND ROVER'),
(75, 'MERCEDES - BENZ'),
(76, 'MERCURY'),
(77, 'MG'),
(78, 'MINI'),
(79, 'MITSUBISHI'),
(80, 'MOSKVICH'),
(81, 'NAZ'),
(82, 'NIEWIADOW'),
(83, 'NISSAN'),
(84, 'OPEL'),
(85, 'PEUGEOT'),
(86, 'PONTIAC'),
(87, 'PORSCHE'),
(88, 'RENAULT'),
(89, 'ROLLS-ROYCE'),
(90, 'ROVER'),
(91, 'SAAB'),
(92, 'SATURN'),
(93, 'SCION'),
(94, 'SEAT'),
(95, 'SKODA'),
(96, 'SSANGYONG'),
(97, 'SUBARU'),
(98, 'SUZUKI'),
(99, 'TATA'),
(100, 'TESLA'),
(101, 'TOYOTA'),
(102, 'UAZ'),
(103, 'VAZ'),
(104, 'VOLKSWAGEN'),
(105, 'VOLVO'),
(106, 'Xingtai'),
(107, 'YTO'),
(108, 'ZAZ'),
(109, 'ZXAUTO');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `car_name`, `model`) VALUES
(27, 'AUDI', 'audi123'),
(28, 'AUDI', 'audi3333'),
(29, 'BMW', '11bmw'),
(30, 'BMW', '22bmw'),
(31, 'BMW', '22bmw');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `image` text DEFAULT 'profileimage.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `password`, `image`) VALUES
(3, 'bacho', 'vashakidze', 'bacho093@gmail.com', '555 57 57 57', '7ca4a7f279260a822151d75ec5a8d1ce', 'profileimage.png'),
(72, 'vakhtangi', 'vashakidze', 'bacho@gmail.com', '557 57 57 57', '7ca4a7f279260a822151d75ec5a8d1ce', 'profileimage.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_car`
--

CREATE TABLE `user_car` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_car`
--

INSERT INTO `user_car` (`id`, `user_id`, `car`) VALUES
(3, 3, 'BUICK'),
(4, 3, 'DODGE'),
(8, 3, 'DONGFENG'),
(9, 3, 'CHERY'),
(10, 3, 'BMW'),
(11, 3, 'AUDI'),
(12, 3, 'BMW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caraddress`
--
ALTER TABLE `caraddress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_car`
--
ALTER TABLE `user_car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `car` (`car`),
  ADD KEY `car_2` (`car`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caraddress`
--
ALTER TABLE `caraddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user_car`
--
ALTER TABLE `user_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `caraddress`
--
ALTER TABLE `caraddress`
  ADD CONSTRAINT `caraddress_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_car`
--
ALTER TABLE `user_car`
  ADD CONSTRAINT `user_car_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
