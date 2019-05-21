-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `journal_vouchers`;
CREATE TABLE `journal_vouchers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `financial_year_id` int(11) NOT NULL,
  `voucher_no` int(10) NOT NULL,
  `reference_no` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `transaction_date` date NOT NULL,
  `narration` text NOT NULL,
  `total_credit_amount` decimal(15,2) NOT NULL,
  `total_debit_amount` decimal(15,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `journal_voucher_rows`;
CREATE TABLE `journal_voucher_rows` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `journal_voucher_id` int(10) NOT NULL,
  `cr_dr` varchar(10) NOT NULL,
  `ledger_id` int(10) NOT NULL,
  `debit` decimal(15,2) DEFAULT NULL,
  `credit` decimal(15,2) DEFAULT NULL,
  `mode_of_payment` varchar(30) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `cheque_date` date DEFAULT NULL,
  `total` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `financial_year_id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `narration` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=643 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `payment_rows`;
CREATE TABLE `payment_rows` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `payment_id` int(10) NOT NULL,
  `cr_dr` varchar(10) NOT NULL,
  `ledger_id` int(10) NOT NULL,
  `debit` decimal(15,2) DEFAULT NULL,
  `credit` decimal(15,2) DEFAULT NULL,
  `mode_of_payment` varchar(30) NOT NULL,
  `cheque_no` varchar(30) NOT NULL,
  `cheque_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1285 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `receipts`;
CREATE TABLE `receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `financial_year_id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `narration` text NOT NULL,
  `voucher_amount` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `sales_invoice_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=326 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `receipt_rows`;
CREATE TABLE `receipt_rows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `cr_dr` varchar(10) NOT NULL COMMENT 'Dr/Cr',
  `ledger_id` int(11) NOT NULL,
  `debit` decimal(15,2) DEFAULT NULL,
  `credit` decimal(15,2) DEFAULT NULL,
  `mode_of_payment` varchar(30) NOT NULL COMMENT 'Cheque/RTGS/NEFT',
  `cheque_no` varchar(255) NOT NULL,
  `cheque_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=652 DEFAULT CHARSET=latin1;


-- 2019-05-21 06:44:58
