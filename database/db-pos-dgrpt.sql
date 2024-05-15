-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2024 at 08:12 AM
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
-- Database: `db-pos-dgrpt`
--

-- --------------------------------------------------------

--
-- Table structure for table `assujetti`
--

CREATE TABLE `assujetti` (
  `num_quitt` int(11) NOT NULL,
  `assujetti` varchar(50) DEFAULT NULL,
  `generatingAct` text DEFAULT NULL,
  `numberAct` varchar(50) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `amountInLetter` text DEFAULT NULL,
  `idAgent` int(11) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `month` varchar(30) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `statusQT` varchar(30) DEFAULT NULL,
  `createdAtAss` date NOT NULL DEFAULT current_timestamp(),
  `updatedAtAss` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assujetti`
--

INSERT INTO `assujetti` (`num_quitt`, `assujetti`, `generatingAct`, `numberAct`, `amount`, `amountInLetter`, `idAgent`, `site_id`, `month`, `year`, `statusQT`, `createdAtAss`, `updatedAtAss`) VALUES
(1, 'EMBEMBE MARCEL', 'ESTAP. RIZ', '170 SACS', 340200, 'TROIS CENT QUARANTE MILLE DEUX CENT FRANCS CONGOLAIS', 1, 1, '05', 2024, 'En attente d\'impression', '2024-05-12', '2024-05-12'),
(2, 'Mario MARCEL', 'ESTAP. HARICOT', '200 SACS', 845200, 'huit cents quarant-cinq mille deux cent trente-six', 1, 1, '05', 2024, 'En attente d\'impression', '2024-05-12', '2024-05-12'),
(3, 'Joel Hadisi', 'ESTAP. HARICOT', '700', 1000000, 'UN MILLION DE FRANC CONGOLAIS', 1, 1, '05', 2024, 'Imprimé', '2024-05-12', '2024-05-12'),
(5, 'Joel Hadisi', 'ESTAP. HARICOT', '300 SACS', 1000000, 'UN MILLION DE FRANC CONGOLAIS', 1, 1, '05', 2024, 'Imprimé', '2024-05-13', '2024-05-13'),
(6, 'EMBEMBE MARCEL', 'ESTAP. RIZ', '170 SACS', 45, '', 1, 1, '05', 2024, 'En attente d\'impression', '2024-05-13', '2024-05-13'),
(7, 'EMBEMBE MARCEL', 'ESTAP. RIZ', '170 SACS', 524532, 'TROIS CENT QUARANTE MILLE DEUX CENT FRANCS CONGOLAIS', 1, 1, '05', 2024, 'Imprimé', '2024-05-13', '2024-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `logMessage` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logSite`
--

CREATE TABLE `logSite` (
  `id` int(11) NOT NULL,
  `site_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `logMessage` varchar(50) DEFAULT NULL,
  `ticket` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `ticket` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp(),
  `updatedAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `name`, `ticket`, `status`, `createdAt`, `updatedAt`) VALUES
(1, '23 KM', 4, 'En activité', '2024-05-09', '2024-05-09'),
(2, 'Bafwasende', 5, 'En activité', '2024-05-09', '2024-05-09'),
(3, 'Lubunga', 5, 'Fermé', '2024-05-09', '2024-05-09'),
(4, 'banalya', 5, 'En activité', '2024-05-09', '2024-05-09'),
(5, 'Direction Générale', 4, 'En activité', '2024-05-09', '2024-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `user_T`
--

CREATE TABLE `user_T` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `sexe` varchar(2) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `roleUser` varchar(50) DEFAULT NULL,
  `mdps` text DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp(),
  `updatedAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_T`
--

INSERT INTO `user_T` (`id`, `firstname`, `lastname`, `phone`, `sexe`, `site_id`, `username`, `roleUser`, `mdps`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 'Martin', 'bakole', 851232153, 'M', 1, 'mbk', 'agent', '95c946bf622ef93b0a211cd0fd028dfdfcf7e39e', 'actif', '2024-05-09', '2024-05-09'),
(2, 'Rebeka', 'Kasoki Abondance', 823229630, 'F', 1, 'rkA', 'agent', '95c946bf622ef93b0a211cd0fd028dfdfcf7e39e', 'actif', '2024-05-09', '2024-05-09'),
(3, 'Dan Fortinho', 'vihamba', 819007079, 'M', 5, 'dan', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'actif', '2024-05-09', '2024-05-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assujetti`
--
ALTER TABLE `assujetti`
  ADD PRIMARY KEY (`num_quitt`),
  ADD KEY `idAgent` (`idAgent`),
  ADD KEY `site_id` (`site_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `logSite`
--
ALTER TABLE `logSite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `site_id` (`site_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_T`
--
ALTER TABLE `user_T`
  ADD PRIMARY KEY (`id`),
  ADD KEY `site_id` (`site_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assujetti`
--
ALTER TABLE `assujetti`
  MODIFY `num_quitt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logSite`
--
ALTER TABLE `logSite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_T`
--
ALTER TABLE `user_T`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assujetti`
--
ALTER TABLE `assujetti`
  ADD CONSTRAINT `assujetti_ibfk_1` FOREIGN KEY (`idAgent`) REFERENCES `user_T` (`id`),
  ADD CONSTRAINT `assujetti_ibfk_2` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `site` (`id`);

--
-- Constraints for table `logSite`
--
ALTER TABLE `logSite`
  ADD CONSTRAINT `logSite_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`),
  ADD CONSTRAINT `logSite_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_T` (`id`);

--
-- Constraints for table `user_T`
--
ALTER TABLE `user_T`
  ADD CONSTRAINT `user_T_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
