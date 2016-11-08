-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2016 at 10:49 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webspa`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `ci`, `name`, `last_name`, `birthdate`, `phone`, `email`, `created`, `modified`) VALUES
(1, 456456, 'yubiriksaido', 'hernandez', '1984-10-11', '7897897', 'yubi@gmail.com', '2016-10-29 00:17:59', '2016-10-29 00:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `method` varchar(10) NOT NULL,
  `benefactor` varchar(100) DEFAULT NULL,
  `reference` varchar(300) DEFAULT NULL,
  `sesion_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `amount`, `method`, `benefactor`, `reference`, `sesion_id`, `client_id`, `created`, `modified`) VALUES
(1, 5000, 'TDC', '', '', 1, 1, '2016-10-29 01:20:57', '2016-10-29 01:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `specialist_id` int(11) NOT NULL,
  `sesion_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `date`, `specialist_id`, `sesion_id`, `created`, `modified`) VALUES
(1, '2016-05-06 14:00:00', 2, 1, '2016-10-29 01:19:37', '2016-10-29 01:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `duration` time DEFAULT NULL,
  `price` float DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `uses_equipment` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `duration`, `price`, `type`, `active`, `uses_equipment`, `created`, `modified`) VALUES
(1, 'Masaje de piedras', '1', '01:00:00', 5000, '1', 1, 1, '2016-10-24 03:55:47', '2016-10-24 03:55:47'),
(2, 'pedicure', 'p', '01:00:00', 2000, '2', 1, 1, '2016-10-24 03:56:11', '2016-10-24 03:56:21'),
(3, 'manicure', 'm', '01:00:00', 3000, '2', 1, 1, '2016-10-24 03:56:45', '2016-10-24 03:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `sesions`
--

CREATE TABLE `sesions` (
  `id` int(11) NOT NULL,
  `paid` tinyint(1) DEFAULT NULL,
  `executed` tinyint(1) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sesions`
--

INSERT INTO `sesions` (`id`, `paid`, `executed`, `client_id`, `created`, `modified`) VALUES
(1, 1, 1, 1, '2016-10-29 00:19:12', '2016-10-29 00:19:12'),
(2, 1, 1, 1, '2016-10-29 00:20:47', '2016-10-29 00:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `sesions_services`
--

CREATE TABLE `sesions_services` (
  `sesion_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sesions_services`
--

INSERT INTO `sesions_services` (`sesion_id`, `service_id`) VALUES
(1, 1),
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `specialists`
--

CREATE TABLE `specialists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `specialty` varchar(40) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialists`
--

INSERT INTO `specialists` (`id`, `name`, `last_name`, `specialty`, `phone`, `email`, `active`, `created`, `modified`) VALUES
(1, 'Pedro', 'Perez', 'De todito', '04145489845', 'pp@gmail.com', 1, '2016-10-24 03:58:19', '2016-10-24 03:58:19'),
(2, 'Bernardo', 'Bello', 'manicurista', '0415245215', 'berniboyprettyboy@gmail.com', 1, '2016-10-29 00:06:54', '2016-10-29 00:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) DEFAULT NULL,
  `specialist_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `role`, `specialist_id`, `created`, `modified`) VALUES
(3, 'cesare', '$2y$10$ucz9Imdt3Nos41JihyS/.OMcE5Mud4Y5XIyDyAkLc9JqlRLY5tNZ.', 'ROLE_ADMIN', NULL, '2016-10-23 22:18:27', '2016-10-23 22:18:27'),
(4, 'guillermo', '$2y$10$c3UPPFU9iO.F4SFh8f.RbeRQ4Rz5wpZwx36tCj8f8ZpHw.Elp0dpi', 'ROLE_ADMIN', NULL, '2016-10-24 03:54:06', '2016-10-24 03:54:06'),
(7, 'alejandra', '$2y$10$D4CMN8XkwLoLRRJ12AdnkuRG1A/WXVi/RQZ9rw2mz8De1vfNgJS86', 'ROLE_MAN', NULL, '2016-10-24 22:50:20', '2016-10-24 22:50:20'),
(15, 'bernardo', '$2y$10$zwNvAiLH77pq1K26NnNpeedn9B9/X/UOjNsvAHYUzfUXzFBT2xiWi', 'ROLE_SPEC', 2, '2016-10-29 00:09:33', '2016-10-29 00:09:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_key` (`client_id`),
  ADD KEY `sesion_key` (`sesion_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialist_key` (`specialist_id`),
  ADD KEY `sesion_key` (`sesion_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sesions`
--
ALTER TABLE `sesions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_key` (`client_id`);

--
-- Indexes for table `sesions_services`
--
ALTER TABLE `sesions_services`
  ADD PRIMARY KEY (`sesion_id`,`service_id`),
  ADD KEY `service_key` (`service_id`);

--
-- Indexes for table `specialists`
--
ALTER TABLE `specialists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialist_key` (`specialist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sesions`
--
ALTER TABLE `sesions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `specialists`
--
ALTER TABLE `specialists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`sesion_id`) REFERENCES `sesions` (`id`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`specialist_id`) REFERENCES `specialists` (`id`),
  ADD CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`sesion_id`) REFERENCES `sesions` (`id`);

--
-- Constraints for table `sesions`
--
ALTER TABLE `sesions`
  ADD CONSTRAINT `sesions_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `sesions_services`
--
ALTER TABLE `sesions_services`
  ADD CONSTRAINT `sesions_services_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `sesions_services_ibfk_2` FOREIGN KEY (`sesion_id`) REFERENCES `sesions` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
