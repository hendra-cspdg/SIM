-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.20 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4852
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table sim.cash
CREATE TABLE IF NOT EXISTS `cash` (
  `cash_id` int(11) NOT NULL AUTO_INCREMENT,
  `day` date NOT NULL,
  `amount` bigint(20) NOT NULL,
  `remarks` text NOT NULL,
  `trans_type` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`cash_id`),
  KEY `trans_type_FK` (`trans_type`),
  KEY `trans_users_FK` (`user`),
  CONSTRAINT `trans_type_FK` FOREIGN KEY (`trans_type`) REFERENCES `transaction_types` (`trans_type_id`) ON UPDATE CASCADE,
  CONSTRAINT `trans_users_FK` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;

-- Dumping data for table sim.cash: ~4 rows (approximately)
DELETE FROM `cash`;
/*!40000 ALTER TABLE `cash` DISABLE KEYS */;
INSERT INTO `cash` (`cash_id`, `day`, `amount`, `remarks`, `trans_type`, `user`) VALUES
	(124, '2014-11-05', 999999999, 'xxxxxxxxxxxxx', 1, 1),
	(125, '2014-11-05', 567848, 'ghkdhk d hk', 5, 1),
	(127, '2014-04-05', 645684658, 'gjkgk', 1, 1),
	(130, '2014-11-05', 457457, 'qweoqytowte', 4, 1);
/*!40000 ALTER TABLE `cash` ENABLE KEYS */;


-- Dumping structure for table sim.cash_flow
CREATE TABLE IF NOT EXISTS `cash_flow` (
  `flow` varchar(8) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`flow`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sim.cash_flow: ~3 rows (approximately)
DELETE FROM `cash_flow`;
/*!40000 ALTER TABLE `cash_flow` DISABLE KEYS */;
INSERT INTO `cash_flow` (`flow`, `description`) VALUES
	('input', 'Aliran kas masuk'),
	('output', 'Aliran kas keluar');
/*!40000 ALTER TABLE `cash_flow` ENABLE KEYS */;


-- Dumping structure for table sim.inventories
CREATE TABLE IF NOT EXISTS `inventories` (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `day` date DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `inv_type` int(11) DEFAULT NULL,
  `inv_flow` varchar(32) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  PRIMARY KEY (`inv_id`),
  KEY `inv_type_FK` (`inv_type`),
  KEY `inv_flow_FK` (`inv_flow`),
  KEY `inv_user_FK` (`user`),
  CONSTRAINT `inv_flow_FK` FOREIGN KEY (`inv_flow`) REFERENCES `inventory_flow` (`inv_flow_id`) ON UPDATE CASCADE,
  CONSTRAINT `inv_type_FK` FOREIGN KEY (`inv_type`) REFERENCES `inventory_types` (`inv_type_id`) ON UPDATE CASCADE,
  CONSTRAINT `inv_user_FK` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sim.inventories: ~0 rows (approximately)
DELETE FROM `inventories`;
/*!40000 ALTER TABLE `inventories` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventories` ENABLE KEYS */;


-- Dumping structure for table sim.inventory_flow
CREATE TABLE IF NOT EXISTS `inventory_flow` (
  `inv_flow_id` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`inv_flow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sim.inventory_flow: ~0 rows (approximately)
DELETE FROM `inventory_flow`;
/*!40000 ALTER TABLE `inventory_flow` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_flow` ENABLE KEYS */;


-- Dumping structure for table sim.inventory_types
CREATE TABLE IF NOT EXISTS `inventory_types` (
  `inv_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`inv_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sim.inventory_types: ~0 rows (approximately)
DELETE FROM `inventory_types`;
/*!40000 ALTER TABLE `inventory_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_types` ENABLE KEYS */;


-- Dumping structure for table sim.pref
CREATE TABLE IF NOT EXISTS `pref` (
  `pref` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  PRIMARY KEY (`pref`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sim.pref: ~0 rows (approximately)
DELETE FROM `pref`;
/*!40000 ALTER TABLE `pref` DISABLE KEYS */;
/*!40000 ALTER TABLE `pref` ENABLE KEYS */;


-- Dumping structure for table sim.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `setting` varchar(50) NOT NULL,
  `value` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`setting`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sim.settings: ~0 rows (approximately)
DELETE FROM `settings`;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;


-- Dumping structure for table sim.transaction_types
CREATE TABLE IF NOT EXISTS `transaction_types` (
  `trans_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `flow` varchar(8) NOT NULL,
  PRIMARY KEY (`trans_type_id`),
  KEY `trans_type_flowtype_FK` (`flow`),
  CONSTRAINT `trans_type_flowtype_FK` FOREIGN KEY (`flow`) REFERENCES `cash_flow` (`flow`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table sim.transaction_types: ~5 rows (approximately)
DELETE FROM `transaction_types`;
/*!40000 ALTER TABLE `transaction_types` DISABLE KEYS */;
INSERT INTO `transaction_types` (`trans_type_id`, `description`, `flow`) VALUES
	(1, 'Penjualan tunai', 'output'),
	(2, 'Pembayaran piutang dagag', 'output'),
	(4, 'Pembelian bahan baku', 'input'),
	(5, 'Pemeliharaan mesin', 'input'),
	(7, 'Pembayaran gaji', 'input');
/*!40000 ALTER TABLE `transaction_types` ENABLE KEYS */;


-- Dumping structure for table sim.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Stores username informations';

-- Dumping data for table sim.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `username`, `realname`, `password`) VALUES
	(1, 'admin', 'Administrator', '21232f297a57a5a743894a0e4a801fc3'),
	(2, 'mriza', 'Mohammad Riza', '0e7ad88c12522343728f8dc68e5d2fcb');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for view sim.cash_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `cash_view` (
	`cash_id` INT(11) NOT NULL,
	`amount` BIGINT(20) NOT NULL,
	`day` DATE NOT NULL,
	`remarks` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`user` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`description` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view sim.ttype_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `ttype_view` (
	`id` INT(11) NOT NULL,
	`type_desc` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`flow` VARCHAR(8) NULL COLLATE 'latin1_swedish_ci',
	`flow_desc` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view sim.cash_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `cash_view`;
CREATE ALGORITHM=TEMPTABLE DEFINER=`sim`@`localhost` SQL SECURITY DEFINER VIEW `cash_view` AS select `c`.`cash_id` AS `cash_id`,`c`.`amount` AS `amount`,`c`.`day` AS `day`,`c`.`remarks` AS `remarks`,`u`.`realname` AS `user`,`y`.`description` AS `description` from ((`cash` `c` left join `users` `u` on((`c`.`user` = `u`.`user_id`))) left join `transaction_types` `y` on((`c`.`trans_type` = `y`.`trans_type_id`))) order by `c`.`cash_id` desc;


-- Dumping structure for view sim.ttype_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `ttype_view`;
CREATE ALGORITHM=TEMPTABLE DEFINER=`sim`@`localhost` SQL SECURITY DEFINER VIEW `ttype_view` AS select `type`.`trans_type_id` AS `id`,`type`.`description` AS `type_desc`,`flow`.`flow` AS `flow`,`flow`.`description` AS `flow_desc` from (`transaction_types` `type` left join `cash_flow` `flow` on((`type`.`flow` = `flow`.`flow`))) order by `type`.`trans_type_id`;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
