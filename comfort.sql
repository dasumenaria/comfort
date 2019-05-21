-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `accounting_entries`;
CREATE TABLE `accounting_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ledger_id` int(10) NOT NULL,
  `debit` decimal(12,2) DEFAULT NULL,
  `credit` decimal(15,2) DEFAULT NULL,
  `transaction_date` date NOT NULL,
  `company_id` int(10) NOT NULL,
  `is_opening_balance` varchar(10) DEFAULT NULL,
  `invoice_id` int(10) DEFAULT NULL,
  `receipt_id` int(11) DEFAULT NULL,
  `receipt_row_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `payment_row_id` int(11) DEFAULT NULL,
  `journal_voucher_id` int(10) DEFAULT NULL,
  `journal_voucher_row_id` int(10) DEFAULT NULL,
  `reconciliation_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

INSERT INTO `accounting_entries` (`id`, `ledger_id`, `debit`, `credit`, `transaction_date`, `company_id`, `is_opening_balance`, `invoice_id`, `receipt_id`, `receipt_row_id`, `payment_id`, `payment_row_id`, `journal_voucher_id`, `journal_voucher_row_id`, `reconciliation_date`) VALUES
(2,	209,	NULL,	15000.00,	'2019-04-01',	1,	'yes',	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'0000-00-00'),
(3,	212,	120.00,	NULL,	'2019-04-01',	1,	'yes',	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'0000-00-00'),
(25,	209,	2285.00,	0.00,	'2019-05-20',	1,	NULL,	7,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'0000-00-00'),
(26,	33,	0.00,	2040.00,	'2019-05-20',	1,	NULL,	7,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'0000-00-00'),
(27,	16,	0.00,	122.40,	'2019-05-20',	1,	NULL,	7,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'0000-00-00'),
(28,	17,	0.00,	122.40,	'2019-05-20',	1,	NULL,	7,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'0000-00-00'),
(29,	31,	0.00,	0.20,	'2019-05-20',	1,	NULL,	7,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'0000-00-00'),
(30,	209,	1994.00,	0.00,	'2019-05-21',	1,	NULL,	8,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'0000-00-00'),
(31,	33,	0.00,	1080.00,	'2019-05-21',	1,	NULL,	8,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'0000-00-00'),
(32,	16,	0.00,	106.80,	'2019-05-21',	1,	NULL,	8,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'0000-00-00'),
(33,	17,	0.00,	106.80,	'2019-05-21',	1,	NULL,	8,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'0000-00-00'),
(34,	31,	0.00,	0.40,	'2019-05-21',	1,	NULL,	8,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'0000-00-00');

DROP TABLE IF EXISTS `accounting_groups`;
CREATE TABLE `accounting_groups` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nature_of_group_id` int(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `company_id` int(10) NOT NULL,
  `customer` tinyint(1) DEFAULT NULL,
  `supplier` tinyint(1) DEFAULT NULL,
  `purchase_voucher_first_ledger` tinyint(1) DEFAULT NULL,
  `purchase_voucher_purchase_ledger` tinyint(1) DEFAULT NULL,
  `purchase_voucher_all_ledger` tinyint(1) DEFAULT NULL,
  `sale_invoice_party` tinyint(4) DEFAULT NULL,
  `sale_invoice_sales_account` tinyint(4) DEFAULT NULL,
  `credit_note_party` int(10) DEFAULT NULL,
  `credit_note_sales_account` int(10) DEFAULT NULL,
  `bank` int(10) NOT NULL,
  `cash` tinyint(1) DEFAULT NULL,
  `purchase_invoice_purchase_account` tinyint(1) DEFAULT NULL,
  `purchase_invoice_party` tinyint(1) DEFAULT NULL,
  `receipt_ledger` tinyint(1) DEFAULT NULL,
  `payment_ledger` tinyint(1) DEFAULT NULL,
  `credit_note_first_row` tinyint(1) DEFAULT NULL,
  `credit_note_all_row` tinyint(1) DEFAULT NULL,
  `debit_note_first_row` tinyint(1) DEFAULT NULL,
  `debit_note_all_row` tinyint(1) DEFAULT NULL,
  `sales_voucher_first_ledger` tinyint(1) DEFAULT NULL,
  `sales_voucher_sales_ledger` tinyint(1) DEFAULT NULL,
  `sales_voucher_all_ledger` tinyint(1) DEFAULT NULL,
  `journal_voucher_ledger` tinyint(1) DEFAULT NULL,
  `contra_voucher_ledger` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

INSERT INTO `accounting_groups` (`id`, `nature_of_group_id`, `name`, `parent_id`, `lft`, `rght`, `company_id`, `customer`, `supplier`, `purchase_voucher_first_ledger`, `purchase_voucher_purchase_ledger`, `purchase_voucher_all_ledger`, `sale_invoice_party`, `sale_invoice_sales_account`, `credit_note_party`, `credit_note_sales_account`, `bank`, `cash`, `purchase_invoice_purchase_account`, `purchase_invoice_party`, `receipt_ledger`, `payment_ledger`, `credit_note_first_row`, `credit_note_all_row`, `debit_note_first_row`, `debit_note_all_row`, `sales_voucher_first_ledger`, `sales_voucher_sales_ledger`, `sales_voucher_all_ledger`, `journal_voucher_ledger`, `contra_voucher_ledger`) VALUES
(1,	2,	'Branch / Divisions',	NULL,	1,	2,	1,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	1,	1,	1,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(2,	2,	'Capital Account',	NULL,	3,	6,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	NULL,	1,	NULL),
(3,	1,	'Current Assets',	NULL,	7,	26,	1,	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	1,	NULL,	NULL),
(4,	2,	'Current Liabilities',	NULL,	27,	38,	1,	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	1,	NULL,	NULL),
(5,	4,	'Direct Expenses',	NULL,	39,	40,	1,	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	1,	NULL,	NULL),
(6,	3,	'Direct Incomes',	NULL,	41,	42,	1,	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	1,	NULL,	NULL),
(7,	1,	'Fixed Assets',	NULL,	43,	44,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	NULL),
(8,	4,	'Indirect Expenses',	NULL,	45,	46,	1,	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	1,	NULL,	NULL),
(9,	3,	'Indirect Incomes',	NULL,	47,	48,	1,	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	1,	NULL,	NULL),
(10,	1,	'Investments',	NULL,	49,	50,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(11,	2,	'Loans (Liability)',	NULL,	51,	58,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(12,	1,	'Misc. Expenses (ASSET)',	NULL,	59,	60,	1,	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(13,	4,	'Purchase Accounts',	NULL,	61,	62,	1,	NULL,	NULL,	NULL,	1,	1,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	1,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(14,	3,	'Sales Accounts',	NULL,	63,	64,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	NULL,	1,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	1,	1,	NULL,	NULL),
(15,	2,	'Suspense A/c',	NULL,	65,	66,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(16,	NULL,	'Reserves & Surplus',	2,	4,	5,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(17,	NULL,	'Bank Accounts',	3,	8,	9,	1,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	1,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	NULL,	1),
(18,	NULL,	'Cash-in-hand',	3,	10,	11,	1,	NULL,	NULL,	1,	NULL,	NULL,	1,	NULL,	1,	NULL,	0,	1,	NULL,	NULL,	1,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	NULL,	1),
(19,	NULL,	'Deposits (Asset)',	3,	12,	13,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(20,	NULL,	'Loans & Advances (Asset)',	3,	14,	15,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(21,	NULL,	'Stock-in-hand',	3,	16,	17,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(22,	NULL,	'Sundry Debtors',	3,	18,	19,	1,	1,	NULL,	1,	NULL,	NULL,	1,	NULL,	1,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	1,	1,	1,	1,	1,	NULL,	NULL,	1,	NULL),
(23,	NULL,	'Duties & Taxes',	4,	28,	33,	1,	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	1,	NULL,	NULL),
(24,	NULL,	'Provisions',	4,	34,	35,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(25,	NULL,	'Sundry Creditors',	4,	36,	37,	1,	NULL,	1,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	1,	1,	1,	1,	1,	1,	1,	1,	NULL,	NULL,	NULL,	NULL),
(26,	NULL,	'Bank OD A/c',	11,	52,	53,	1,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	1,	1,	1,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(27,	NULL,	'Secured Loans',	11,	54,	55,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(28,	NULL,	'Unsecured Loans',	11,	56,	57,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	1,	1,	NULL,	1,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(29,	NULL,	'Input GST',	23,	29,	30,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(30,	NULL,	'Output GST',	23,	31,	32,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_type_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `supplier_id` varchar(20) NOT NULL,
  `engine_no` varchar(20) NOT NULL,
  `chasis_no` varchar(20) NOT NULL,
  `rto_tax_date` date NOT NULL,
  `insurance_date_from` date NOT NULL,
  `insurance_date_to` date NOT NULL,
  `authorization_date` date NOT NULL,
  `permit_date` date NOT NULL,
  `fitness_date` date NOT NULL,
  `puc_date` date NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

INSERT INTO `cars` (`id`, `car_type_id`, `name`, `supplier_id`, `engine_no`, `chasis_no`, `rto_tax_date`, `insurance_date_from`, `insurance_date_to`, `authorization_date`, `permit_date`, `fitness_date`, `puc_date`, `is_deleted`) VALUES
(2,	'1',	'RJ 27 TA 1361',	'3',	'9936712',	'4007103692',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	0),
(3,	'1',	'RJ27 TA 1032',	'11',	'9871883',	'4007084217',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	0),
(4,	'1',	'RJ27 TA 1754',	'23',	'6157289',	'7142196',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(5,	'1',	'RJ27 TA 1755',	'2',	'6162605',	'7143047',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(6,	'1',	'RJ27 TA 1756',	'2',	'6182382',	'7147585',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(7,	'1',	'RJ27 TA 2734',	'2',	'120848',	'4007238333',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(8,	'1',	'RJ27 TA 2735',	'2',	'6020519',	'7238659',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(9,	'1',	'RJ27 TA 2754',	'2',	'5123906',	'7239989',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(10,	'1',	'RJ27 TA 2191',	'2',	'6365641',	'4007187164',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(11,	'1',	'RJ27 TA 2193',	'2',	'6361473',	'4007716721',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(12,	'1',	'RJ27 TA 2194',	'2',	'6364433',	'4007187065',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(13,	'2',	'RJ27 TA 2143',	'2',	'2A27236894',	'JJDBE38K30250028',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(14,	'2',	'RJ27 TA 2144',	'2',	'2A21233060',	'JTD600249016',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(15,	'3',	'RJ27 TA 0963',	'6',	'122285787',	'206836403',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	0),
(16,	'3',	'RJ27 TA 0964',	'6',	'2857611',	'20683507',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	0),
(17,	'5',	'RJ27 TA 2063',	'2',	'16620',	'13803CQ2',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(18,	'5',	'RJ27 TA 2064',	'2',	'16635',	'31709003297',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(19,	'6',	'RJ27 TA 3131',	'2',	'6.49633E+12',	'2237',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(20,	'7',	'RJ27 TA 4141',	'2',	'CMG006763',	'95087',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(21,	'8',	'RJ27 T 2772',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(22,	'8',	'RJI 129',	'7',	'',	'',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	0),
(23,	'12',	'Rj 27 TA 2932 ',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(24,	'12',	'Rj 27 TA 2933',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(25,	'1',	'Taxi Service',	'18',	'',	'',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	'0000-00-00',	0),
(26,	'1',	'RJ27TA4899',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(27,	'1',	'RJ27TA4900',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(28,	'13',	'RJ27 TA 4915',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(29,	'13',	'RJ27 TA 4916',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(30,	'1',	'Other Innova',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(31,	'1',	'RJ 27 TA 5456',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(32,	'1',	'RJ 27 TA 5458',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(33,	'1',	'RJ27 TA 6070',	'2',	'',	'',	'2015-09-30',	'2015-10-01',	'2015-09-25',	'1970-01-01',	'2015-09-30',	'2015-09-30',	'2015-09-30',	0),
(34,	'1',	'RJ27 TA 6072',	'2',	'',	'',	'2015-09-30',	'2015-09-25',	'2015-10-01',	'2015-09-30',	'2015-09-30',	'2015-09-30',	'2015-09-30',	0),
(35,	'13',	'Other Etios',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(36,	'9',	'Other Mini Coach',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(37,	'11',	'Other Tempo Traveler',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(38,	'10',	'Other Large Coach',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(39,	'6',	'Other Mercedes',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(40,	'6',	'RJ27 TA 6648',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'2017-09-29',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(41,	'1',	'RJ27 TA 7137',	'2',	'',	'',	'1970-01-01',	'2017-06-24',	'2018-06-23',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(42,	'1',	'RJ27 TA 7138',	'2',	'',	'',	'1970-01-01',	'2017-06-24',	'2018-06-23',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(43,	'1',	'RJ27 TA 7253',	'2',	'',	'',	'1970-01-01',	'2017-09-25',	'2018-09-25',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(44,	'1',	'RJ27 TA 7254',	'2',	'',	'',	'1970-01-01',	'2017-09-25',	'2018-09-25',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(45,	'16',	'RJ27 TA 7978',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(46,	'16',	'RJ27 TA 7980',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(47,	'19',	'RJ27 TA 8265',	'2',	'WRK4B20285',	'MA1TA4WR2K2B28233',	'2019-03-13',	'2019-03-07',	'2020-03-06',	'2019-03-13',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(48,	'19',	'RJ27 TA 8267',	'2',	'WRK4B20322',	'MA1TA4WR2K2B27686',	'2019-03-13',	'2019-03-07',	'2020-03-06',	'1970-01-01',	'1970-01-01',	'2019-03-13',	'1970-01-01',	0),
(49,	'1',	'RJ27 TA 8260',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(50,	'1',	'RJ27 TA 8261',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(51,	'1',	'RJ27 TA 8262',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(52,	'1',	'RJ27 TA 8263',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(53,	'1',	'RJ27 TA 8264',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(54,	'19',	'Other Scorpio',	'2',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0),
(55,	'',	' ',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	'1970-01-01',	0);

DROP TABLE IF EXISTS `car_types`;
CREATE TABLE `car_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO `car_types` (`id`, `name`) VALUES
(1,	'Innova'),
(2,	'Camry'),
(3,	'Corolla'),
(4,	'Indigo'),
(5,	'Linea'),
(6,	'Mercedes'),
(7,	'Audi Q-5'),
(8,	'Vintage'),
(9,	'Mini Coach'),
(10,	'Large Coach'),
(11,	'Tempo Traveller'),
(12,	'Jaguar'),
(13,	'Toyota Etios'),
(14,	'Chevrolet Tavera'),
(15,	'Extra Large Coach'),
(16,	'Toyota Crysta'),
(17,	'Mercedes Sprinter'),
(18,	'Range Rover'),
(19,	'Mahindra Scorpio');

DROP TABLE IF EXISTS `corporate_billings`;
CREATE TABLE `corporate_billings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `guest_name` varchar(120) NOT NULL,
  `ref` text NOT NULL,
  `service_date` varchar(500) NOT NULL,
  `service` varchar(200) NOT NULL,
  `rate` varchar(500) NOT NULL,
  `no_of_days` varchar(500) NOT NULL,
  `taxi_no` varchar(500) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `tot_amnt` varchar(100) NOT NULL,
  `service_tax` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `net_amnt` varchar(100) NOT NULL,
  `login_id` int(11) NOT NULL,
  `counter_id` int(11) NOT NULL,
  `waveoff_status` int(11) NOT NULL,
  `waveoff_reason` text NOT NULL,
  `waveoff_login_id` int(11) NOT NULL,
  `waveoff_counter_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `counters`;
CREATE TABLE `counters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `counters` (`id`, `name`) VALUES
(1,	'Admin'),
(2,	'Head Office'),
(3,	'Hanuman Pole'),
(4,	'Airport'),
(5,	'LPH'),
(6,	'Radisson'),
(7,	'Test counterrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrss'),
(8,	'new COunter');

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_person` varchar(20) NOT NULL,
  `office_no` varchar(20) NOT NULL,
  `residence_no` varchar(20) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `fax_no` varchar(20) NOT NULL,
  `opening_bal` int(11) NOT NULL,
  `closing_bal` int(11) NOT NULL,
  `srvctaxregno` varchar(20) NOT NULL,
  `panno` varchar(20) NOT NULL,
  `creditlimit` varchar(20) NOT NULL,
  `block_status` varchar(20) NOT NULL,
  `servicetax_status` varchar(10) NOT NULL,
  `gst_number` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `credit_debit` varchar(20) NOT NULL,
  `bill_to_bill` varchar(10) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

INSERT INTO `customers` (`id`, `name`, `address`, `contact_person`, `office_no`, `residence_no`, `mobile_no`, `email_id`, `fax_no`, `opening_bal`, `closing_bal`, `srvctaxregno`, `panno`, `creditlimit`, `block_status`, `servicetax_status`, `gst_number`, `state`, `city`, `credit_debit`, `bill_to_bill`, `is_deleted`) VALUES
(3,	'Airport Walkin',	'UDR',	'Maruti',	'12342123432123',	'1232123123',	'2147483647',	'dsu@gmail.com',	'',	15000,	0,	'123',	'123212321',	'15000',	'',	'yes',	'123456',	'Rajasthan',	'Udaipur',	'credit',	'yes',	0),
(4,	'Heritage',	'',	'Dsu',	'',	'',	'2147483647',	'',	'',	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'no',	1),
(5,	'test One',	'',	'test',	'',	'',	'',	'',	'',	0,	0,	'',	'',	'1458',	'',	'',	'',	'Gujarat',	'Abad',	'',	'no',	0),
(6,	'India Transport',	'',	'98989879898988888',	'',	'',	'',	'',	'',	0,	0,	'',	'',	'',	'',	'no',	'',	'Kerala',	'',	'',	'no',	0),
(24,	'Mahindra XUV',	'',	'Dsu Menaria',	'',	'',	'',	'',	'',	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'no',	0);

DROP TABLE IF EXISTS `customer_tariffs`;
CREATE TABLE `customer_tariffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(30) NOT NULL,
  `car_type_id` varchar(10) NOT NULL,
  `service_id` varchar(50) NOT NULL,
  `rate` varchar(20) NOT NULL,
  `minimum_chg_km` varchar(11) NOT NULL,
  `extra_km_rate` varchar(11) NOT NULL,
  `minimum_chg_hourly` int(11) NOT NULL,
  `extra_hour_rate` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `customer_tariffs` (`id`, `customer_id`, `car_type_id`, `service_id`, `rate`, `minimum_chg_km`, `extra_km_rate`, `minimum_chg_hourly`, `extra_hour_rate`, `is_deleted`) VALUES
(1,	'3',	'1',	'2',	'1200',	'100',	'200',	300,	1500,	0),
(5,	'24',	'1',	'2',	'1200',	'100',	'200',	300,	1500,	0);

DROP TABLE IF EXISTS `duty_slips`;
CREATE TABLE `duty_slips` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `guest_name` varchar(255) NOT NULL,
  `reporting_address` text NOT NULL,
  `mobile_no` varchar(200) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `photo_id` varchar(50) NOT NULL,
  `service_id` varchar(20) NOT NULL,
  `car_type_id` varchar(20) NOT NULL,
  `car_id` varchar(20) NOT NULL,
  `temp_car_no` varchar(20) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `detail_no` varchar(30) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `opening_km` bigint(20) NOT NULL,
  `opening_time` time NOT NULL,
  `closing_km` bigint(20) NOT NULL,
  `closing_time` time NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `extra_chg` int(10) NOT NULL,
  `permit_chg` int(10) NOT NULL,
  `parking_chg` int(10) NOT NULL,
  `otherstate_chg` int(10) NOT NULL COMMENT 'Drive Allowanace',
  `guide_chg` int(10) NOT NULL COMMENT 'Border Tax',
  `misc_chg` int(10) NOT NULL,
  `remarks` text NOT NULL,
  `billed_complimentary` varchar(20) NOT NULL,
  `authorized_person` varchar(30) NOT NULL,
  `date_authorization` date NOT NULL,
  `reason` varchar(200) NOT NULL,
  `billing_status` varchar(20) NOT NULL,
  `total_km` varchar(30) NOT NULL,
  `rate` bigint(20) NOT NULL,
  `extra` varchar(10) NOT NULL,
  `extra_details` varchar(30) NOT NULL,
  `extra_amnt` bigint(20) NOT NULL,
  `tot_amnt` bigint(20) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `login_id` varchar(30) NOT NULL,
  `counter_id` varchar(20) NOT NULL,
  `max_invoice_id` varchar(10) NOT NULL,
  `new_car_no` varchar(100) NOT NULL,
  `waveoff_status` int(10) NOT NULL,
  `waveoff_reason` text NOT NULL,
  `waveoff_login_id` int(10) NOT NULL,
  `waveoff_counter_id` int(10) NOT NULL,
  `temp_driver_name` varchar(50) NOT NULL,
  `gst_no` varchar(50) NOT NULL,
  `service_date` date NOT NULL,
  `ref` varchar(100) NOT NULL,
  `no_of_days` varchar(100) NOT NULL,
  `texi_no` varchar(100) NOT NULL,
  `cop_amounts` varchar(100) NOT NULL,
  `billing_type` varchar(100) NOT NULL,
  `fuel_hike_chg` int(15) NOT NULL,
  `city` varchar(50) NOT NULL,
  `financial_year_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `duty_slips` (`id`, `date`, `guest_name`, `reporting_address`, `mobile_no`, `email_id`, `photo_id`, `service_id`, `car_type_id`, `car_id`, `temp_car_no`, `customer_id`, `detail_no`, `employee_id`, `opening_km`, `opening_time`, `closing_km`, `closing_time`, `date_from`, `date_to`, `extra_chg`, `permit_chg`, `parking_chg`, `otherstate_chg`, `guide_chg`, `misc_chg`, `remarks`, `billed_complimentary`, `authorized_person`, `date_authorization`, `reason`, `billing_status`, `total_km`, `rate`, `extra`, `extra_details`, `extra_amnt`, `tot_amnt`, `amount`, `login_id`, `counter_id`, `max_invoice_id`, `new_car_no`, `waveoff_status`, `waveoff_reason`, `waveoff_login_id`, `waveoff_counter_id`, `temp_driver_name`, `gst_no`, `service_date`, `ref`, `no_of_days`, `texi_no`, `cop_amounts`, `billing_type`, `fuel_hike_chg`, `city`, `financial_year_id`) VALUES
(5,	'2019-05-15',	'Dashrath Menaria',	'',	'9680747166',	'Dasumenaria@gmail.com',	'Passport Number',	'2',	'1',	'3',	'',	'3',	'125455454',	'2',	1200,	'02:01:00',	1400,	'05:05:00',	'2019-05-15',	'2019-05-15',	10,	10,	10,	10,	10,	10,	'Test Fomm',	'',	'',	'0000-00-00',	'Nop',	'yes',	'',	1200,	'',	'',	0,	1270,	0,	'4',	'1',	'',	'',	0,	'',	0,	0,	'',	'',	'0000-00-00',	'',	'',	'',	'',	'Normal Billing',	10,	'Udaipur',	3),
(6,	'2019-05-16',	'Rohit Kumar',	'',	'9999999999',	'rohit@phppoets.im',	'Driving Licence',	'2',	'1',	'3',	'',	'3',	'74154',	'2',	1400,	'02:02:00',	1500,	'13:11:00',	'2019-05-24',	'2019-05-25',	0,	0,	0,	0,	0,	0,	'Record Fetch by dsu ',	'',	'',	'0000-00-00',	'',	'yes',	'',	1200,	'',	'',	0,	1200,	0,	'4',	'1',	'',	'',	0,	'',	0,	0,	'',	'',	'0000-00-00',	'',	'',	'',	'',	'Normal Billing',	0,	'Udaipur',	3),
(7,	'2019-05-17',	'Rohit Kumar',	'',	'2134532432',	'',	'Driving Licence',	'2',	'1',	'3',	'',	'3',	'1234rt',	'2',	1500,	'12:11:00',	1800,	'23:14:00',	'2019-05-17',	'2019-05-19',	0,	0,	0,	0,	0,	0,	'nop',	'',	'',	'0000-00-00',	'',	'yes',	'',	1200,	'',	'',	0,	1200,	0,	'4',	'1',	'',	'',	0,	'',	0,	0,	'',	'',	'0000-00-00',	'',	'',	'',	'',	'Normal Billing',	0,	'Udaipur',	3),
(8,	'2019-05-21',	'Dimple',	'',	'9898748748',	'dsu@123.com',	'Passport Number',	'2',	'1',	'3',	'',	'3',	'145145',	'2',	1800,	'11:11:00',	2000,	'15:15:00',	'2019-05-21',	'2019-05-23',	100,	100,	100,	100,	100,	100,	'test',	'',	'',	'0000-00-00',	'test',	'yes',	'',	1200,	'',	'',	0,	1900,	0,	'4',	'1',	'',	'',	0,	'',	0,	0,	'',	'',	'0000-00-00',	'',	'',	'',	'',	'Normal Billing',	100,	'Udaipur',	3);

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_type` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `present_add` text NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `esi_no` varchar(30) NOT NULL,
  `pf_no` varchar(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `basicsalary` varchar(30) NOT NULL,
  `dearness` varchar(30) NOT NULL,
  `houserent` varchar(30) NOT NULL,
  `conveyance` varchar(30) NOT NULL,
  `phone_amnt` varchar(30) NOT NULL,
  `medical_amnt` varchar(30) NOT NULL,
  `professiontax` varchar(30) NOT NULL,
  `providentfund` varchar(30) NOT NULL,
  `fpf` varchar(30) NOT NULL,
  `esic` varchar(30) NOT NULL,
  `incometaxtds` varchar(30) NOT NULL,
  `bank_account_number` varchar(30) NOT NULL,
  `bank_name` varchar(30) NOT NULL,
  `driver_doj` date NOT NULL,
  `blood_group` varchar(30) NOT NULL,
  `ref_name` varchar(30) NOT NULL,
  `lic_no` varchar(30) NOT NULL,
  `lic_issue_date` date NOT NULL,
  `lic_issue_place` varchar(30) NOT NULL,
  `lic_exp_date` date NOT NULL,
  `badge_no` varchar(30) NOT NULL,
  `dob_leave` date NOT NULL,
  `leave_reason` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

INSERT INTO `employees` (`id`, `employee_type`, `name`, `mobile_no`, `present_add`, `father_name`, `qualification`, `address`, `dob`, `esi_no`, `pf_no`, `designation`, `basicsalary`, `dearness`, `houserent`, `conveyance`, `phone_amnt`, `medical_amnt`, `professiontax`, `providentfund`, `fpf`, `esic`, `incometaxtds`, `bank_account_number`, `bank_name`, `driver_doj`, `blood_group`, `ref_name`, `lic_no`, `lic_issue_date`, `lic_issue_place`, `lic_exp_date`, `badge_no`, `dob_leave`, `leave_reason`, `is_deleted`) VALUES
(2,	'',	'Shankar  Lal Meena',	'9166269494',	'Near Flora Hotel ,Opp.Patel Service Ce',	'',	'10th',	'Sarsia Tehsil- Sarada',	'0000-00-00',	'1605144845',	'RJ -21757/ 23',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'RJ-27/DLC/03/14372',	'0000-00-00',	'Udaipur',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(3,	'',	'Suresh Chandra Purohit',	'9166269494',	'4A-90 ,Sec.No. 7,Udaipur',	'',	'',	'Chiklawas ,Tehsil-Nathdwara -Dist.Rajsam',	'0000-00-00',	'1605304433',	'RJ- 21757 /28',	'',	'4836',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'RJ-30/DLC/05?12468',	'0000-00-00',	'Udaipur',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(4,	'',	'Ghanshyam Lal Kalawa',	'9166269494',	'Titardi -Amba Mata Ki Gati.udaipur',	'',	'',	'Titardi -Amba Mata Ki Gati.udaipur',	'0000-00-00',	'1605144488',	'Rj-21757 /25',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'Rj- 27 /DLC/05/72716',	'0000-00-00',	'Udaipur',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(5,	'',	'Rajesh',	'9166269494',	'85, Near Police Line,Tekri.Udaipur',	'',	'',	'85, Near Police Line,Tekri.Udaipur',	'0000-00-00',	'1605144846',	'RJ - 21757 / 30',	'Chauffeur',	'4836',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'RJ-27/DLC/04/41242',	'0000-00-00',	'Udaipur',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(6,	'',	'Goverdhan',	'9166269494',	'Udaipur',	'',	'',	'',	'0000-00-00',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(7,	'',	'Brij Mohan',	'9166269494',	'Udaipur',	'',	'',	'',	'0000-00-00',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(8,	'',	'Balwant',	'9166269494',	'Udaipur',	'',	'',	'',	'0000-00-00',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(9,	'',	'Nandlal',	'9166269494',	'Udaipur',	'',	'',	'',	'0000-00-00',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(10,	'',	'Iqbal Hussain',	'9166269494',	'19-Mahavat Vadi ,Bade Purohit Ka Khura',	'',	'',	'19-Mahavat Vadi ,Bade Purohit Ka Khura',	'0000-00-00',	'1605144496',	'Rj-21757 /29',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'Rj-27/DLC/04/34510',	'0000-00-00',	'Udaipur',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(11,	'',	'Manoj Kumar Nepali',	'9166269494',	'395-C BlockChitrakut NagarUdaipur',	'',	'',	'395-C BlockChitrakut NagarUdaipur',	'0000-00-00',	'1605304435',	'Rj - 21757 / 27',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'Rj-27/DLC/03/16626',	'0000-00-00',	'Udaipur',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(12,	'',	'Yashwant',	'9166269494',	'Udaipur',	'',	'',	'',	'0000-00-00',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(13,	'',	'Babu Singh',	'9166269494',	'Udaipur',	'',	'',	'',	'0000-00-00',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(14,	'',	'Prakash Puri',	'9166269494',	'Udaipur',	'',	'',	'',	'0000-00-00',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(15,	'',	'Sumer',	'9166269494',	'Udaipur',	'',	'',	'',	'0000-00-00',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(16,	'',	'Gokul Lal Meghwal',	'9166269494',	'Khempura-Pratap Nagar,udaipur',	'',	'',	'Khempura-Pratap Nagar,udaipur',	'0000-00-00',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'Rj-27/DLC/06/10188',	'0000-00-00',	'Udaipur',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(17,	'',	'Kishan',	'9166269494',	'Udaipur',	'',	'',	'',	'0000-00-00',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(18,	'',	'Mangilal',	'9166269494',	'Udaipur',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'1970-01-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(19,	'',	'Veerpal',	'9166269494',	'Udaipur',	'',	'',	'',	'0000-00-00',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(20,	'',	'Sanjay Soni',	'9166269494',	'Udaipur',	'Shyam Lal Soni',	'',	'E Block, 196 Sector 14',	'1978-01-17',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'Allahabad Bank',	'2013-03-01',	'B+',	'',	'',	'2000-03-16',	'',	'2019-05-14',	'',	'1970-01-01',	'',	0),
(21,	'',	'Madan Lal Meghwal',	'9166269494',	'Gorela',	'Moda Ji meghwal',	'',	'',	'0000-00-00',	'',	'',	'Chauffeur',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'Siddhant Chatur',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(22,	'',	'Durga Shanker',	'9166269494',	'',	'',	'',	'Dabok',	'0000-00-00',	'',	'',	'Chauffeur',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'Murli',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(23,	'',	'Suresh Meghwal',	'9166269494',	'Dabok, Udaipur',	'',	'',	'',	'0000-00-00',	'',	'',	'Chauffeur',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(24,	'',	'Narayan Lal Gurjar',	'9166269494',	'Udaipur',	'',	'',	'',	'0000-00-00',	'',	'',	'Chauffeur',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(25,	'',	'Others',	'9166269494',	'',	'',	'',	'',	'0000-00-00',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(26,	'',	'Chaman Singh',	'9166269494',	'Sri ram, colony, Pratapnagar',	'',	'',	'',	'0000-00-00',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(27,	'',	'Kishore Panwar',	'9166269494',	'25, Shree nagar , Rampura',	'',	'',	'',	'0000-00-00',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(28,	'',	'Sunil Sharma',	'9166269494',	'Pula, Fatehpura',	'',	'',	'',	'0000-00-00',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(29,	'',	'Jamna Das',	'9166269494',	'Rampura',	'',	'',	'',	'0000-00-00',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(30,	'',	'Shakti Singh Bhati',	'9166269494',	'Udaipur',	'',	'',	'',	'0000-00-00',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(31,	'',	'Chaman Singh',	'9166269494',	'18, shriram colony, pratap nagar udaipur',	'Devi Singh Ji',	'',	'',	'0000-00-00',	'',	'',	'Driver',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'0000-00-00',	'O+',	'',	'',	'0000-00-00',	'Udaipur',	'0000-00-00',	'',	'0000-00-00',	'',	0),
(32,	'',	'Sheetal Soni',	'9166269494',	'Debari',	'',	'',	'Debari',	'2015-07-15',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'2015-05-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(33,	'',	'Sohan Khatik',	'9166269494',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'1970-01-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(34,	'',	'Zakir Hussain Sheikh',	'9166269494',	'Savina',	'',	'',	'',	'1970-01-01',	'',	'',	'Supervisor',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'1970-01-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(35,	'',	'Jaswant Singh',	'9166269494',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'1970-01-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(36,	'',	'Praveen Singh',	'9166269494',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'1970-01-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(37,	'',	'Prakash Gurjar',	'9166269494',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'1970-01-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(38,	'',	'Shailendra Singh',	'9166269494',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'1970-01-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(39,	'',	'Murli Vaishnav',	'9166269494',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'1970-01-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(40,	'',	'Nitesh Kumar',	'9166269494',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'1970-01-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(41,	'',	'Kheta Ram Patel',	'9166269494',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'2015-08-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(42,	'',	'Rajesh Airport',	'9166269494',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'1970-01-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(43,	'',	'Lalit Kumawat',	'9166269494',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'1970-01-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(44,	'',	'Roshan Kumar',	'9166269494',	'Ambaveri',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'2015-09-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(45,	'',	'Bheru Lal',	'9166269494',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'2016-06-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(46,	'',	'Om Prakash',	'9166269494',	'Udaipur',	'',	'',	'',	'2017-10-04',	'',	'',	'Driver',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'2017-07-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(47,	'',	'Ambalal',	'9166269494',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'2017-08-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(48,	'',	'Lalit Kacchawa',	'9166269494',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'Driver',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'2018-04-03',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(49,	'',	'Maan SIngh',	'9166269494',	'Debari, Udaipur',	'',	'',	'',	'2018-10-29',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'2018-10-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(50,	'',	'Gopal Singh',	'9166269494',	'Dabok, Udaipur',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'1970-01-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(51,	'',	'Tushar Menaria',	'9166269494',	'Sevashram, Udaipur',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'1970-01-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(52,	'',	'Mohammed Ali',	'9166269494',	'30 B Jyoti Nagar, near fellowship academy school',	'Irshad Hussain',	'',	'30 B Jyoti Nagar, near fellowship academy school',	'1994-04-16',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'2018-12-06',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(53,	'',	'Santosh Sen',	'9166269494',	'Lakhawali',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'2018-12-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(55,	'',	'jj',	'9166269494',	'driver address',	' ',	' ',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'1970-01-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0),
(56,	'',	'employee jitesh',	'9166269494',	'address employee',	'',	'',	'',	'1970-01-01',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'1970-01-01',	'O+',	'',	'',	'1970-01-01',	'',	'1970-01-01',	'',	'1970-01-01',	'',	0);

DROP TABLE IF EXISTS `financial_years`;
CREATE TABLE `financial_years` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `financial_year_from` date NOT NULL,
  `financial_year_to` date NOT NULL,
  `alias_name` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `financial_years` (`id`, `financial_year_from`, `financial_year_to`, `alias_name`, `status`) VALUES
(1,	'2017-04-01',	'2018-03-31',	'17-18',	'close'),
(2,	'2018-04-01',	'2019-03-31',	'18-19',	'close'),
(3,	'2019-04-01',	'2020-03-31',	'19-20',	'open');

DROP TABLE IF EXISTS `gst_figures`;
CREATE TABLE `gst_figures` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `company_id` int(10) NOT NULL,
  `tax_percentage` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO `gst_figures` (`id`, `name`, `company_id`, `tax_percentage`) VALUES
(1,	'0%',	1,	0.00),
(2,	'5%',	1,	5.00),
(3,	'12%',	1,	12.00),
(4,	'18%',	1,	18.00),
(5,	'28%',	1,	28.00),
(11,	'0%',	2,	0.00),
(12,	'5%',	2,	5.00),
(13,	'12%',	2,	12.00),
(14,	'18%',	2,	18.00),
(15,	'28%',	2,	28.00),
(16,	'0%',	3,	0.00),
(17,	'5%',	3,	5.00),
(18,	'12%',	3,	12.00),
(19,	'18%',	3,	18.00),
(20,	'28%',	3,	28.00);

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(15) NOT NULL,
  `invoice_type_id` int(10) NOT NULL,
  `authorized_person` varchar(30) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `remarks` varchar(40) NOT NULL,
  `total` varchar(20) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `tax` varchar(20) NOT NULL,
  `grand_total` varchar(20) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `login_id` int(11) NOT NULL,
  `counter_id` int(11) NOT NULL,
  `complimenatry_status` int(20) NOT NULL,
  `waveoff_status` int(10) NOT NULL,
  `waveoff_reason` text NOT NULL,
  `waveoff_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `waveoff_login_id` int(10) NOT NULL,
  `waveoff_counter_id` int(10) NOT NULL,
  `current_date` date NOT NULL,
  `invoice_gst` varchar(50) NOT NULL,
  `financial_year_id` int(11) NOT NULL,
  `gst_figure_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `invoices` (`id`, `invoice_no`, `invoice_type_id`, `authorized_person`, `customer_id`, `date`, `payment_type`, `remarks`, `total`, `discount`, `tax`, `grand_total`, `payment_status`, `login_id`, `counter_id`, `complimenatry_status`, `waveoff_status`, `waveoff_reason`, `waveoff_date`, `waveoff_login_id`, `waveoff_counter_id`, `current_date`, `invoice_gst`, `financial_year_id`, `gst_figure_id`) VALUES
(5,	'A001/19-20',	1,	'',	'3',	'2019-05-16',	'Cash',	'',	'1200',	'10',	'151.2',	'1411',	'no',	4,	1,	0,	0,	'testttt',	'0000-00-00 00:00:00',	4,	1,	'2019-05-16',	'',	3,	0),
(7,	'A002/19-20',	1,	'',	'3',	'2019-05-17',	'Credit',	'dasdas',	'2400',	'360',	'244.8',	'2285',	'no',	4,	1,	0,	0,	'',	'0000-00-00 00:00:00',	0,	0,	'1970-01-01',	'123456',	3,	0),
(8,	'A0003/19-20',	1,	'',	'3',	'2019-05-21',	'Credit',	'',	'1200',	'120',	'213.6',	'1994',	'no',	4,	1,	0,	0,	'',	'0000-00-00 00:00:00',	0,	0,	'2019-05-21',	'',	3,	0);

DROP TABLE IF EXISTS `invoice_details`;
CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(20) NOT NULL,
  `duty_slip_id` int(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `invoice_details` (`id`, `invoice_id`, `duty_slip_id`, `amount`) VALUES
(2,	5,	5,	'1270'),
(5,	7,	6,	'1200'),
(6,	7,	7,	'1200'),
(7,	8,	8,	'1900');

DROP TABLE IF EXISTS `invoice_types`;
CREATE TABLE `invoice_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `invoice_types` (`id`, `name`) VALUES
(1,	'Car'),
(2,	'Guide'),
(3,	'Logistics'),
(4,	'Others');

DROP TABLE IF EXISTS `ledgers`;
CREATE TABLE `ledgers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `accounting_group_id` int(10) NOT NULL,
  `freeze` tinyint(1) NOT NULL COMMENT '0==unfreezed 1==freezed',
  `company_id` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `tax_percentage` decimal(5,2) NOT NULL,
  `gst_type` varchar(10) DEFAULT NULL,
  `input_output` varchar(10) DEFAULT NULL,
  `gst_figure_id` int(10) DEFAULT NULL,
  `bill_to_bill_accounting` varchar(10) NOT NULL DEFAULT 'no',
  `round_off` int(10) NOT NULL,
  `cash` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  `default_credit_days` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=latin1;

INSERT INTO `ledgers` (`id`, `name`, `accounting_group_id`, `freeze`, `company_id`, `supplier_id`, `customer_id`, `tax_percentage`, `gst_type`, `input_output`, `gst_figure_id`, `bill_to_bill_accounting`, `round_off`, `cash`, `flag`, `default_credit_days`) VALUES
(1,	'0% CGST (input)',	29,	0,	1,	0,	0,	0.00,	'CGST',	'input',	1,	'no',	0,	0,	1,	0),
(2,	'0% SGST (input)',	29,	0,	1,	0,	0,	0.00,	'SGST',	'input',	1,	'no',	0,	0,	1,	0),
(3,	'0% IGST  (input)',	29,	0,	1,	0,	0,	0.00,	'IGST',	'input',	1,	'no',	0,	0,	1,	0),
(4,	'0% CGST (output)',	30,	0,	1,	0,	0,	0.00,	'CGST',	'output',	1,	'no',	0,	0,	1,	0),
(5,	'0% SGST (output)',	30,	0,	1,	0,	0,	0.00,	'SGST',	'output',	1,	'no',	0,	0,	1,	0),
(6,	'0% IGST (output)',	30,	0,	1,	0,	0,	0.00,	'IGST',	'output',	1,	'no',	0,	0,	1,	0),
(7,	'2.5% CGST (input)',	29,	0,	1,	0,	0,	0.00,	'CGST',	'input',	2,	'no',	0,	0,	1,	0),
(8,	'2.5% SGST (input)',	29,	0,	1,	0,	0,	0.00,	'SGST',	'input',	2,	'no',	0,	0,	1,	0),
(9,	'5% IGST (input)',	29,	0,	1,	0,	0,	0.00,	'IGST',	'input',	2,	'no',	0,	0,	1,	0),
(10,	'2.5% CGST (output)',	30,	0,	1,	0,	0,	0.00,	'CGST',	'output',	2,	'no',	0,	0,	1,	0),
(11,	'2.5% SGST (output)',	30,	0,	1,	0,	0,	0.00,	'SGST',	'output',	2,	'no',	0,	0,	1,	0),
(12,	'5% IGST (output)',	30,	0,	1,	0,	0,	0.00,	'IGST',	'output',	2,	'no',	0,	0,	1,	0),
(13,	'6% CGST (input)',	29,	0,	1,	0,	0,	0.00,	'CGST',	'input',	3,	'no',	0,	0,	1,	0),
(14,	'6% SGST (input)',	29,	0,	1,	0,	0,	0.00,	'SGST',	'input',	3,	'no',	0,	0,	1,	0),
(15,	'12% IGST (input)',	29,	0,	1,	0,	0,	0.00,	'IGST',	'input',	3,	'no',	0,	0,	1,	0),
(16,	'6% CGST (output)',	30,	0,	1,	0,	0,	0.00,	'CGST',	'output',	3,	'no',	0,	0,	1,	0),
(17,	'6% SGST (output)',	30,	0,	1,	0,	0,	0.00,	'SGST',	'output',	3,	'no',	0,	0,	1,	0),
(18,	'12% IGST (output)',	30,	0,	1,	0,	0,	0.00,	'IGST',	'output',	3,	'no',	0,	0,	1,	0),
(19,	'9% CGST (input)',	29,	0,	1,	0,	0,	0.00,	'CGST',	'input',	4,	'no',	0,	0,	1,	0),
(20,	'9% SGST (input)',	29,	0,	1,	0,	0,	0.00,	'SGST',	'input',	4,	'no',	0,	0,	1,	0),
(21,	'18% IGST (input)',	29,	0,	1,	0,	0,	0.00,	'IGST',	'input',	4,	'no',	0,	0,	1,	0),
(22,	'9% CGST (output)',	30,	0,	1,	0,	0,	0.00,	'CGST',	'output',	4,	'no',	0,	0,	1,	0),
(23,	'9% SGST (output)',	30,	0,	1,	0,	0,	0.00,	'SGST',	'output',	4,	'no',	0,	0,	1,	0),
(24,	'18% IGST (output)',	30,	0,	1,	0,	0,	0.00,	'IGST',	'output',	4,	'no',	0,	0,	1,	0),
(25,	'14% CGST (input)',	29,	0,	1,	0,	0,	0.00,	'CGST',	'input',	5,	'no',	0,	0,	1,	0),
(26,	'14% SGST (input)',	29,	0,	1,	0,	0,	0.00,	'SGST',	'input',	5,	'no',	0,	0,	1,	0),
(27,	'28% IGST (input)',	29,	0,	1,	0,	0,	0.00,	'IGST',	'input',	5,	'no',	0,	0,	1,	0),
(28,	'14% CGST (output)',	30,	0,	1,	0,	0,	0.00,	'CGST',	'output',	5,	'no',	0,	0,	1,	0),
(29,	'14% SGST (output)',	30,	0,	1,	0,	0,	0.00,	'SGST',	'output',	5,	'no',	0,	0,	1,	0),
(30,	'28% IGST (output)',	30,	0,	1,	0,	0,	0.00,	'IGST',	'output',	5,	'no',	0,	0,	1,	0),
(31,	'Round off',	8,	0,	1,	0,	0,	0.00,	NULL,	NULL,	NULL,	'no',	1,	0,	1,	0),
(32,	'Cash',	18,	0,	1,	0,	0,	0.00,	NULL,	NULL,	NULL,	'no',	0,	1,	1,	0),
(33,	'Taxi Services',	14,	0,	1,	0,	0,	0.00,	NULL,	NULL,	NULL,	'',	0,	0,	0,	0),
(34,	'Discount',	5,	0,	1,	0,	0,	0.00,	NULL,	NULL,	NULL,	'no',	0,	0,	0,	0),
(35,	'Other Charges',	8,	0,	1,	0,	0,	0.00,	NULL,	NULL,	NULL,	'no',	0,	0,	0,	0),
(209,	'Airport Walkin',	22,	0,	1,	0,	3,	0.00,	NULL,	NULL,	NULL,	'no',	0,	0,	0,	0),
(210,	'Heritage',	22,	0,	1,	0,	4,	0.00,	NULL,	NULL,	NULL,	'no',	0,	0,	0,	0),
(211,	'1234',	25,	0,	1,	46,	0,	0.00,	NULL,	NULL,	NULL,	'no',	0,	0,	0,	0),
(212,	'Dsu Supplier',	25,	0,	1,	47,	0,	0.00,	NULL,	NULL,	NULL,	'no',	0,	0,	0,	0),
(213,	'test One',	22,	0,	1,	0,	5,	0.00,	NULL,	NULL,	NULL,	'no',	0,	0,	0,	0),
(214,	'India Transport',	22,	0,	1,	0,	6,	0.00,	NULL,	NULL,	NULL,	'no',	0,	0,	0,	0),
(216,	'Raj Moters',	22,	0,	1,	0,	9,	0.00,	NULL,	NULL,	NULL,	'no',	0,	0,	0,	0);

DROP TABLE IF EXISTS `logins`;
CREATE TABLE `logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `counter_id` int(10) NOT NULL,
  `ldrview` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `logins` (`id`, `username`, `password`, `name`, `counter_id`, `ldrview`, `email`, `is_deleted`) VALUES
(4,	'admin',	'$2y$10$i/DI4zC1pl/w0SbxoJpciu9i7VHf9jrfKEYtawmKYraptoa0akd16',	'Dsu Menaria',	1,	'Yes',	'dasu@gmail.com',	0);

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(30) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `controller` varchar(40) NOT NULL,
  `action` varchar(40) NOT NULL,
  `icon_class_name` varchar(50) NOT NULL,
  `is_hidden` enum('Y','N') NOT NULL DEFAULT 'N',
  `query_string` varchar(30) NOT NULL,
  `target` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

INSERT INTO `menus` (`id`, `menu_name`, `parent_id`, `lft`, `rght`, `controller`, `action`, `icon_class_name`, `is_hidden`, `query_string`, `target`) VALUES
(1,	'Dashboard',	NULL,	1,	2,	'Logins',	'index',	'fa fa-home',	'N',	'',	''),
(2,	'Masters',	NULL,	3,	48,	'#',	'#',	'fa fa-gears',	'N',	'',	''),
(3,	'Customer',	2,	4,	13,	'#',	'#',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(4,	'Add',	3,	5,	6,	'Customers',	'add',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(5,	'Edit',	3,	7,	8,	'Customers',	'index',	'glyphicon glyphicon-asterisk',	'N',	'edt',	''),
(6,	'Delete',	3,	9,	10,	'Customers',	'index',	'glyphicon glyphicon-asterisk',	'N',	'del',	''),
(7,	'Search',	3,	11,	12,	'Customers',	'index',	'glyphicon glyphicon-asterisk',	'N',	'ser',	''),
(8,	'Supplier',	2,	49,	58,	'#',	'#',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(9,	'Add',	8,	50,	51,	'Suppliers',	'add',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(10,	'Edit',	8,	52,	53,	'Suppliers',	'index',	'glyphicon glyphicon-asterisk',	'N',	'edt',	''),
(11,	'Delete',	8,	54,	55,	'Suppliers',	'index',	'glyphicon glyphicon-asterisk',	'N',	'del',	''),
(12,	'Search',	8,	56,	57,	'Suppliers',	'index',	'glyphicon glyphicon-asterisk',	'N',	'ser',	''),
(13,	'Employee',	2,	59,	68,	'#',	'#',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(14,	'Add',	13,	60,	61,	'Employees',	'add',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(15,	'Edit',	13,	62,	63,	'Employees',	'index',	'glyphicon glyphicon-asterisk',	'N',	'edt',	''),
(16,	'Delete',	13,	64,	65,	'Employees',	'index',	'glyphicon glyphicon-asterisk',	'N',	'del',	''),
(17,	'Search',	13,	66,	67,	'Employees',	'index',	'glyphicon glyphicon-asterisk',	'N',	'ser',	''),
(18,	'Car',	2,	69,	72,	'#',	'#',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(19,	'Add',	18,	73,	74,	'Cars',	'add',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(20,	'Edit',	18,	75,	76,	'Cars',	'index',	'glyphicon glyphicon-asterisk',	'N',	'edt',	''),
(21,	'Delete',	18,	77,	78,	'Cars',	'index',	'glyphicon glyphicon-asterisk',	'N',	'del',	''),
(22,	'Search',	18,	70,	71,	'Cars',	'index',	'glyphicon glyphicon-asterisk',	'N',	'ser',	''),
(23,	'Customer Tariff',	2,	14,	23,	'#',	'#',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(24,	'Add',	23,	15,	16,	'CustomerTariffs',	'add',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(25,	'Edit',	23,	17,	18,	'CustomerTariffs',	'index',	'glyphicon glyphicon-asterisk',	'N',	'edt',	''),
(26,	'Delete',	23,	19,	20,	'CustomerTariffs',	'index',	'glyphicon glyphicon-asterisk',	'N',	'del',	''),
(27,	'Search',	23,	21,	22,	'CustomerTariffs',	'index',	'glyphicon glyphicon-asterisk',	'N',	'ser',	''),
(28,	'Supplier Tariff',	2,	24,	33,	'#',	'#',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(29,	'Add',	28,	25,	26,	'SupplierTariffs',	'add',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(30,	'Edit',	28,	27,	28,	'SupplierTariffs',	'index',	'glyphicon glyphicon-asterisk',	'N',	'edt',	''),
(31,	'Delete',	28,	29,	30,	'SupplierTariffs',	'index',	'glyphicon glyphicon-asterisk',	'N',	'del',	''),
(32,	'Search',	28,	31,	32,	'SupplierTariffs',	'index',	'glyphicon glyphicon-asterisk',	'N',	'ser',	''),
(33,	'Service',	2,	34,	39,	'#',	'#',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(34,	'Add',	33,	35,	36,	'Services',	'add',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(35,	'Edit | Delete | View',	33,	37,	38,	'Services',	'index',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(36,	'Counter',	2,	40,	41,	'Counters',	'add',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(37,	'Car Type',	2,	42,	43,	'CarTypes',	'index',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(38,	'Supplier Type',	2,	44,	45,	'SupplierTypes',	'index',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(39,	'Sub Supplier Type',	2,	46,	47,	'SupplierTypes',	'supplier',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(40,	'Duty Slip',	NULL,	79,	88,	'#',	'#',	'glyphicon glyphicon-list-alt',	'N',	'',	''),
(41,	'Add',	40,	80,	81,	'DutySlips',	'add',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(42,	'Edit',	40,	82,	83,	'DutySlips',	'index',	'glyphicon glyphicon-asterisk',	'N',	'edt',	''),
(43,	'Waveoff',	40,	84,	85,	'DutySlips',	'index',	'glyphicon glyphicon-asterisk',	'N',	'del',	''),
(44,	'Search',	40,	86,	87,	'DutySlips',	'index',	'glyphicon glyphicon-asterisk',	'N',	'ser',	''),
(45,	'Reports',	NULL,	89,	98,	'#',	'#',	'glyphicon glyphicon-folder-open',	'N',	'',	''),
(46,	'Waveoff Duty Slip',	45,	90,	91,	'DutySlips',	'waveoffds',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(47,	'Open DS',	45,	92,	93,	'DutySlips',	'OpenDs',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(48,	'Unbilled DS',	45,	94,	95,	'DutySlips',	'Unbilledds',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(49,	'Records',	45,	96,	97,	'DutySlips',	'records',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(50,	'Security',	NULL,	99,	108,	'#',	'#',	'glyphicon glyphicon-briefcase',	'N',	'',	''),
(51,	'User Right',	50,	100,	107,	'#',	'#',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(52,	'Add New User',	51,	101,	102,	'Logins',	'add',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(53,	'Assign Rights',	51,	103,	104,	'UserRights',	'add',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(54,	'View Rights',	51,	105,	106,	'Logins',	'LoginView',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(55,	'Billing',	NULL,	109,	118,	'#',	'#',	'glyphicon glyphicon-th-list',	'N',	'',	''),
(57,	'Add',	55,	110,	111,	'Invoices',	'add',	'glyphicon glyphicon-asterisk',	'N',	'',	''),
(58,	'Edit',	55,	112,	113,	'Invoices',	'index',	'glyphicon glyphicon-asterisk',	'N',	'edt',	''),
(59,	'Weveoff',	55,	114,	115,	'Invoices',	'index',	'glyphicon glyphicon-asterisk',	'N',	'del',	''),
(60,	'Search',	55,	116,	117,	'Invoices',	'index',	'glyphicon glyphicon-asterisk',	'N',	'ser',	'');

DROP TABLE IF EXISTS `nature_of_groups`;
CREATE TABLE `nature_of_groups` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `nature_of_groups` (`id`, `name`) VALUES
(1,	'Assets'),
(2,	'Liabilities'),
(3,	'Income'),
(4,	'Expenses');

DROP TABLE IF EXISTS `reference_details`;
CREATE TABLE `reference_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `ledger_id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL COMMENT 'New/Agst Ref/Advance/On Account',
  `ref_name` varchar(255) NOT NULL,
  `debit` decimal(15,2) NOT NULL,
  `credit` decimal(15,2) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `receipt_row_id` int(11) NOT NULL,
  `payment_row_id` int(11) NOT NULL,
  `journal_voucher_row_id` int(10) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `opening_balance` varchar(10) DEFAULT NULL,
  `due_days` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `reference_details` (`id`, `customer_id`, `supplier_id`, `transaction_date`, `company_id`, `ledger_id`, `type`, `ref_name`, `debit`, `credit`, `receipt_id`, `receipt_row_id`, `payment_row_id`, `journal_voucher_row_id`, `invoice_id`, `opening_balance`, `due_days`) VALUES
(2,	3,	NULL,	'2019-04-01',	1,	209,	'',	'',	0.00,	15000.00,	0,	0,	0,	0,	NULL,	'yes',	0),
(3,	NULL,	47,	'2019-04-01',	1,	212,	'',	'',	120.00,	0.00,	0,	0,	0,	0,	NULL,	'yes',	0),
(4,	3,	NULL,	'2019-05-17',	1,	209,	'',	'IN6',	2230.00,	0.00,	0,	0,	0,	0,	NULL,	NULL,	0),
(8,	3,	NULL,	'2019-05-20',	1,	209,	'',	'IN7',	2285.00,	0.00,	0,	0,	0,	0,	7,	NULL,	0),
(9,	3,	NULL,	'2019-05-21',	1,	209,	'',	'IN8',	1994.00,	0.00,	0,	0,	0,	0,	8,	NULL,	0);

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `sac_code` varchar(30) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

INSERT INTO `services` (`id`, `name`, `type`, `sac_code`, `is_deleted`) VALUES
(2,	'Airport Drop',	'intercity',	'996423',	0),
(3,	'Airport Pick up',	'intercity',	'996423',	0),
(4,	'Half Day Sight seeing',	'incity',	'996412',	0),
(5,	'Full Day Sight seeing',	'incity',	'996412',	0),
(6,	'Eklingji and Nagda',	'incity',	'996412',	0),
(7,	'Monsoon Palace',	'incity',	'996412',	0),
(8,	'Nathdwara',	'incity',	'996412',	0),
(9,	'Jaisamand Lake',	'incity',	'996412',	0),
(10,	'Kumbhalgarh',	'incity',	'996412',	0),
(11,	'Ranakpur',	'incity',	'996412',	0),
(12,	'Kumbhalgarh and Rankpur',	'incity',	'996412',	0),
(13,	'Chittorgarh',	'incity',	'996412',	0),
(14,	'Full Day Incity',	'incity',	'996412',	0),
(15,	'City Transfer',	'incity',	'996412',	0),
(16,	'Jodhpur drop',	'intercity',	'996423',	0),
(17,	'Ahmedabad drop',	'intercity',	'996423',	0),
(18,	'Jaipur drop',	'intercity',	'996423',	0),
(19,	'Inter-city',	'intercity',	'996423',	0),
(20,	'Dariba Drop',	'intercity',	'996423',	0),
(21,	'Kankroli Drop',	'intercity',	'996423',	0),
(22,	'In city and Airport Drop',	'incity',	'996412',	0),
(23,	'City Tour and Airport Drop',	'incity',	'996412',	0),
(24,	'Nathdwara and Airport Drop',	'incity',	'996412',	0),
(25,	'In City',	'incity',	'996412',	0),
(26,	'Bus Transfer',	'incity',	'996412',	0),
(27,	'Railway Transfer',	'incity',	'996412',	0),
(28,	'Mount Abu',	'intercity',	'996423',	0),
(29,	'Half Day Sight Seeing with Guide Service',	'incity',	'998556',	0),
(30,	'Tourist Guide Service',	'incity',	'998556',	0),
(31,	'Logistics',	'incity',	'998555',	0),
(32,	'Full Day Sight Seeing with Guide Service',	'incity',	'998556',	0),
(33,	'Half Day Language',	'incity',	'998556',	0),
(34,	'Full Day Language',	'incity',	'998556',	0),
(35,	'Heritage Walk',	'incity',	'998556',	0),
(36,	'railway/city transfer',	'incity',	'',	0),
(37,	'test',	'incity',	'996412',	0);

DROP TABLE IF EXISTS `service_cities`;
CREATE TABLE `service_cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `service_cities` (`id`, `name`, `flag`) VALUES
(1,	'Udaipur',	0),
(2,	'Jaipur',	0),
(3,	'Surat',	0);

DROP TABLE IF EXISTS `states`;
CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

INSERT INTO `states` (`id`, `state_name`) VALUES
(1,	'Andaman and Nicobar Islands'),
(2,	'Andhra Pradesh'),
(3,	'Arunachal Pradesh'),
(4,	'Assam'),
(5,	'Bihar'),
(6,	'Chandigarh'),
(7,	'Chhattisgarh'),
(8,	'Dadra and Nagar Haveli'),
(9,	'Daman and Diu'),
(10,	'Delhi'),
(11,	'Goa'),
(12,	'Gujarat'),
(13,	'Haryana'),
(14,	'Himachal Pradesh'),
(15,	'Jammu and Kashmir'),
(16,	'Jharkhand'),
(17,	'Karnataka'),
(19,	'Kerala'),
(20,	'Lakshadweep'),
(21,	'Madhya Pradesh'),
(22,	'Maharashtra'),
(23,	'Manipur'),
(24,	'Meghalaya'),
(25,	'Mizoram'),
(26,	'Nagaland'),
(29,	'Odisha'),
(31,	'Puducherry'),
(32,	'Punjab'),
(33,	'Rajasthan'),
(34,	'Sikkim'),
(35,	'Tamil Nadu'),
(36,	'Telangana'),
(37,	'Tripura'),
(38,	'Uttar Pradesh'),
(39,	'Uttarakhand'),
(41,	'West Bengal');

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_type_id` int(30) NOT NULL,
  `supplier_type_sub_id` int(30) NOT NULL,
  `name` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `contact_name` varchar(20) NOT NULL,
  `office_no` varchar(20) NOT NULL,
  `residence_no` varchar(20) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `fax_no` varchar(20) NOT NULL,
  `opening_bal` varchar(20) NOT NULL,
  `closing_bal` varchar(20) NOT NULL,
  `due_days` varchar(20) NOT NULL,
  `servicetax_no` varchar(20) NOT NULL,
  `pan_no` varchar(20) NOT NULL,
  `account_no` varchar(25) NOT NULL,
  `servicetax_status` varchar(10) NOT NULL,
  `credit_debit` varchar(10) NOT NULL,
  `bill_to_bill` varchar(10) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

INSERT INTO `suppliers` (`id`, `supplier_type_id`, `supplier_type_sub_id`, `name`, `address`, `contact_name`, `office_no`, `residence_no`, `mobile_no`, `email_id`, `fax_no`, `opening_bal`, `closing_bal`, `due_days`, `servicetax_no`, `pan_no`, `account_no`, `servicetax_status`, `credit_debit`, `bill_to_bill`, `is_deleted`) VALUES
(2,	1,	1,	'Comfort Travels HOT',	'Udaipur',	'Siddhant',	'0294-2421771',	'',	'',	'operations@comforttours.com',	'0294-2422131',	'',	'',	'',	'aawpc1369est001',	'aawpc1369e',	'',	'yes',	'',	'',	0),
(3,	1,	1,	'Piyush Chatur',	'Udaipur',	'Piyush',	'0294-2421771',	'',	'0',	'rohan.chatur@comforttours.com',	'294',	'',	'',	'',	'',	'',	'',	'yes',	'',	'',	0),
(6,	1,	28,	'Suniti Chatur',	'Udaipur',	'Siddhant',	'0294-2421771',	'',	'0',	'operations@comforttours.com',	'0294-2422131`',	'',	'',	'',	'',	'',	'',	'yes',	'',	'',	0),
(7,	1,	25,	'Roshan Tours',	'Udaipur',	'Rohan',	'0294-2421771',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'yes',	'',	'',	0),
(9,	2,	7,	'Lucky Tours & Travel',	'Udaipur',	'Sarfaraj',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'yes',	'',	'',	0),
(11,	1,	1,	'Shreyans Chatur',	'Udaipur',	'Shreyans',	'',	'',	'0',	'operations@comforttours.com',	'0294-2422131',	'',	'',	'',	'',	'',	'',	'yes',	'',	'',	0),
(12,	5,	20,	'Nishant Jethi',	'Udaipur',	'Nishant',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'yes',	'',	'',	0),
(13,	5,	20,	'Abhijeet Singh',	'Udaipur',	'Abhijeet Singh',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'yes',	'',	'',	0),
(14,	5,	20,	'Chinmay Dikshit',	'udaipur',	'Chinmay Dikshit',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'yes',	'',	'',	0),
(15,	5,	20,	'Suresh Nagarkoti',	'Udaipur',	'S. Nagarkoti',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'yes',	'',	'',	0),
(16,	5,	20,	'Pankaj Joshi',	'Udaipur',	'Pankaj Joshi',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'yes',	'',	'',	0),
(17,	3,	12,	'R.S..Motors Pvt.Ltd',	'Udaipur',	'Shahid',	'0294-2528019',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'yes',	'',	'',	0),
(18,	1,	1,	'Outsource Car',	' Udaipur',	'',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'yes',	'',	'',	0),
(20,	6,	22,	'Aravali Filling Station',	' Udaipur',	'Mr.Abhishek',	'2942483741',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'yes',	'',	'',	0),
(22,	3,	9,	'Accessories House',	' Town hallUdaipur',	'Mr.Raju',	'2942561162',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'yes',	'',	'',	0),
(23,	1,	1,	'Siddharth Chatur',	' Comfort Travels and Tours, Udaipur',	'',	'2942411661',	'',	'0',	'admin@comforttours.com',	'',	'',	'',	'',	'',	'',	'',	'yes',	'',	'',	0),
(24,	3,	9,	'Deep Tyre Treat',	' Bhuvana Udaipur',	'',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'yes',	'',	'',	0),
(25,	2,	5,	'Shri EKlingnath Tour',	' ',	'Ankit',	'',	'',	'0',	'',	'',	'201785',	'',	'',	'',	'AMJPS8147D',	'01260200000248',	'yes',	'',	'',	0),
(26,	6,	22,	'Other Outstation Pum',	' ',	'',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'yes',	'',	'',	0),
(27,	3,	8,	'Shri Ram Service Cen',	'UIT Circle, Fatehpura ',	'',	'',	'',	'0',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	0),
(28,	3,	8,	'Mukesh Hood Pochis W',	'Surajpole ',	'',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0),
(29,	1,	1,	'Rajasthan Four Wheel',	'1-A, Fatehnagar, Surya Nagar, Tonk Road,',	'Mr. Abhishek',	'01412546563',	'',	'0',	'',	'',	'',	'',	'',	'AACCR8345NST001',	'',	'',	'',	'',	'',	0),
(30,	3,	8,	'Upasana Track on Mov',	'Opp Celeb Mall ',	'Mr Deep',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0),
(31,	3,	14,	'Prateek Battery Hous',	' Suraj Pole',	'',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0),
(32,	3,	12,	'Neyaz Auto and All car A/c works',	' Patel Circle',	'Neyaz Bhai',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0),
(33,	0,	0,	'Airports Authority of India',	'Maharana Pratap Airport Udaipur ',	'Mr Dahima',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'AAACA6412D',	'',	'',	'',	'',	0),
(34,	3,	11,	'Noble spray painting',	' Mallatalai',	'Mohd Rafique',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0),
(35,	3,	8,	'Ravi Kalra',	' RTO Udaipur',	'',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0),
(36,	1,	1,	'Medora Travel Services',	'Ahmedabad, Gujarat ',	'',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0),
(38,	3,	8,	'e',	' ',	'',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0),
(39,	1,	1,	'car supplier jitesh',	'Address of jitesh  ',	'jit',	'',	'',	'1',	'jitesh@phppoets.in',	'',	'22000',	'',	'',	'',	'',	'',	'',	'',	'',	0),
(40,	2,	6,	'Couch Supplier jitesh',	'address of jitesh  ',	'couch jitesh',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0),
(41,	3,	8,	'maintenance supplier jitesh ',	'address of jitesh  ',	'main jitesh ',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0),
(42,	4,	15,	'Amenities supplier Jitesh',	'address of jitesh  ',	'Ame Supplier jitesh ',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	0),
(43,	1,	1,	'testinghemendra',	'hemendra',	'hemendra',	'1234567899',	'1234567',	'2123456786',	'hemendrakhatik12@gmail.com',	'1234567',	'100',	'200',	'',	'',	'',	'',	'',	'',	'',	0),
(44,	1,	1,	'Datatest',	'Datatest',	'Datahemstest',	'1234567890',	'34323454',	'5895552256',	'yohems12@gmail.com',	'1234567',	'500',	'',	'50',	'125255',	'pannumber123',	'649784522222011',	'',	'credit',	'Yes',	0),
(45,	1,	1,	'Hemenndra',	'UdaipurRajasthan',	'Hemendra',	'9983476801',	'1234578',	'9983476801',	'hemendrakhatik22@gmail.com',	'5552221',	'500',	'',	'100',	'ServiceTax123',	'PanNumber212',	'61301754215',	'Yes',	'credit',	'No',	0),
(46,	0,	0,	'1234',	'123',	'123',	'1234232213',	'',	'1234212321',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'no',	0),
(47,	1,	1,	'Dsu Supplier',	'sdsfdvf',	'sdfwedf',	'12321323212321212321',	'',	'1232123212',	'',	'',	'120',	'',	'',	'',	'',	'',	'yes',	'debit',	'yes',	0);

DROP TABLE IF EXISTS `supplier_tariffs`;
CREATE TABLE `supplier_tariffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` varchar(30) NOT NULL,
  `car_type_id` varchar(10) NOT NULL,
  `service_id` varchar(50) NOT NULL,
  `rate` varchar(20) NOT NULL,
  `minimum_chg_km` int(11) NOT NULL,
  `extra_km_rate` int(11) NOT NULL,
  `minimum_chg_hourly` int(11) NOT NULL,
  `extra_hour_rate` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=367 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `supplier_types`;
CREATE TABLE `supplier_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `supplier_types` (`id`, `name`) VALUES
(1,	'Cars'),
(2,	'Coach'),
(3,	'Maintenance'),
(4,	'Amenities'),
(5,	'Guide'),
(6,	'Fuel'),
(7,	'Air');

DROP TABLE IF EXISTS `supplier_type_subs`;
CREATE TABLE `supplier_type_subs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_type_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

INSERT INTO `supplier_type_subs` (`id`, `supplier_type_id`, `name`) VALUES
(1,	'1',	'Innova'),
(2,	'1',	'Indigo'),
(3,	'1',	'Mercedes'),
(4,	'1',	'Accord'),
(5,	'2',	'Mini Coach'),
(6,	'2',	'Large Coach'),
(7,	'2',	'Tempo Traveller'),
(8,	'3',	'Car Service'),
(9,	'3',	'Tyres'),
(10,	'3',	'Denting'),
(11,	'3',	'Painting'),
(12,	'3',	'Mechanical Work'),
(13,	'3',	'Wheel Alignment'),
(14,	'3',	'Battery'),
(15,	'4',	'Newspaper'),
(16,	'4',	'Magazine'),
(17,	'4',	'Air - Freshners'),
(18,	'4',	'Uniforms'),
(19,	'4',	'Other'),
(20,	'5',	'English'),
(21,	'5',	'Language Guide'),
(22,	'6',	'Petrol'),
(23,	'6',	'Diesel'),
(24,	'6',	'Oil'),
(25,	'1',	'Vintage'),
(26,	'1',	'Audi Q-5'),
(27,	'1',	'Camry'),
(28,	'1',	'Corolla'),
(29,	'1',	'Linea'),
(30,	'',	'dsaf'),
(31,	'',	'Hemedra'),
(32,	'',	'Test'),
(33,	'2',	'Lemborgini');

DROP TABLE IF EXISTS `user_rights`;
CREATE TABLE `user_rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `menu_ids` text,
  PRIMARY KEY (`id`),
  KEY `login_id` (`login_id`),
  CONSTRAINT `user_rights_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `logins` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `user_rights` (`id`, `login_id`, `menu_ids`) VALUES
(1,	4,	'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,57,58,59,60');

-- 2019-05-21 05:53:55
