-- phpMyAdmin SQL Dump
-- version 4.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2014 at 02:14 AM
-- Server version: 10.0.12-MariaDB
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sim`
--
CREATE DATABASE IF NOT EXISTS `sim` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sim`;

-- --------------------------------------------------------

--
-- Table structure for table `cashflow_types`
--

DROP TABLE IF EXISTS `cashflow_types`;
CREATE TABLE IF NOT EXISTS `cashflow_types` (
  `flow` varchar(8) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `cashflow_types`
--

TRUNCATE TABLE `cashflow_types`;
--
-- Dumping data for table `cashflow_types`
--

INSERT INTO `cashflow_types` (`flow`, `description`) VALUES
('kalua', 'Aliran pitih kalua'),
('masuak', 'Aliran pitih masuak');

-- --------------------------------------------------------

--
-- Table structure for table `pref`
--

DROP TABLE IF EXISTS `pref`;
CREATE TABLE IF NOT EXISTS `pref` (
  `pref` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `pref`
--

TRUNCATE TABLE `pref`;
-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `setting` varchar(50) NOT NULL,
  `value` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `settings`
--

TRUNCATE TABLE `settings`;
-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
`trans_id` int(11) NOT NULL,
  `day` date NOT NULL,
  `amount` bigint(20) NOT NULL,
  `remarks` text NOT NULL,
  `trans_type` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=136 ;

--
-- Truncate table before insert `transactions`
--

TRUNCATE TABLE `transactions`;
--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `day`, `amount`, `remarks`, `trans_type`, `user`) VALUES
(124, '2014-11-05', 2752, 'tyjdghj', 1, 1),
(125, '2014-11-05', 567848, 'ghkdhk d hk', 5, 1),
(126, '2014-11-05', 0, '', 1, 1),
(127, '2014-04-05', 645684658, 'gjkgk', 1, 1),
(130, '2014-11-05', 457457, 'qweoqytowte', 4, 1),
(134, '2012-03-05', 346346, 'jdfgj ', 7, 1),
(135, '2014-11-06', 100000, 'uang tidak jelas', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_types`
--

DROP TABLE IF EXISTS `transaction_types`;
CREATE TABLE IF NOT EXISTS `transaction_types` (
`trans_type_id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `flow` varchar(8) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Truncate table before insert `transaction_types`
--

TRUNCATE TABLE `transaction_types`;
--
-- Dumping data for table `transaction_types`
--

INSERT INTO `transaction_types` (`trans_type_id`, `description`, `flow`) VALUES
(1, 'Penjualan tunai', 'masuak'),
(2, 'Pembayaran piutang dagag', 'masuak'),
(3, 'Transportasi', 'kalua'),
(4, 'Pembelian bahan baku', 'kalua'),
(5, 'Pemeliharaan mesin', 'kalua'),
(6, 'Pembayaran hutang', 'kalua'),
(7, 'Pembayaran gaji', 'kalua'),
(8, 'Bunga bank', 'masuak'),
(9, 'Tagihan listrik', 'kalua'),
(10, 'Pembayaran piutang dagang', 'masuak'),
(11, 'Tagihan PDAM', 'kalua'),
(12, 'Tagihan PAM', 'kalua'),
(13, 'Penjualan tunai', 'masuak');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`UID` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Stores username informations' AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `username`, `realname`, `password`) VALUES
(1, 'admin', 'Administrator', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'mriza', 'Mohammad Riza', '0e7ad88c12522343728f8dc68e5d2fcb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashflow_types`
--
ALTER TABLE `cashflow_types`
 ADD PRIMARY KEY (`flow`);

--
-- Indexes for table `pref`
--
ALTER TABLE `pref`
 ADD PRIMARY KEY (`pref`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`setting`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
 ADD PRIMARY KEY (`trans_id`), ADD KEY `trans_users_FK` (`user`), ADD KEY `trans_type_FK` (`trans_type`);

--
-- Indexes for table `transaction_types`
--
ALTER TABLE `transaction_types`
 ADD PRIMARY KEY (`trans_type_id`), ADD KEY `trans_type_flowtype_FK` (`flow`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `transaction_types`
--
ALTER TABLE `transaction_types`
MODIFY `trans_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
ADD CONSTRAINT `trans_type_FK` FOREIGN KEY (`trans_type`) REFERENCES `transaction_types` (`trans_type_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `trans_users_FK` FOREIGN KEY (`user`) REFERENCES `users` (`UID`) ON UPDATE CASCADE;

--
-- Constraints for table `transaction_types`
--
ALTER TABLE `transaction_types`
ADD CONSTRAINT `trans_type_flowtype_FK` FOREIGN KEY (`flow`) REFERENCES `cashflow_types` (`flow`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
