-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2017 at 11:52 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omas`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `username` varchar(45) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `Status` int(11) NOT NULL DEFAULT '1',
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`username`, `email`, `password`, `create_time`, `Status`, `UserID`) VALUES
('accountant', 'accountant@accountant.com', '$2y$10$A/QvSPHDFLJQBiOJkr8duujQM9/5SU1ADbXSbwy64LmwUIMOzBFE.', '2017-05-02 09:49:17', 1, 1),
('adminreserved', 'adminreserved@gmail.com', '$2y$10$Ek.V4ZB2rRNhn1gcfzCE7ux.0p8q3ada7SlRaGbJcHQBuDHM8DcVe', '2017-06-12 11:01:21', 1, 9999),
('moniquekarl', 'monique@gmail.com', '$2y$10$hez5wGBxiR.RJTrWViz.QeLZ343.ALNNExQzyjmsKYFA73QCtNbUS', '2017-06-13 01:39:46', 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `username` varchar(45) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `AdminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`username`, `email`, `password`, `create_time`, `AdminID`) VALUES
('adminadmin', 'admin@admin.com', 'adminadmin1', '2017-05-02 09:49:03', 1),
('adminadmin', 'admin@admin.com', 'adminadmin', '2017-06-12 10:56:17', 9999);

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `assets_id` int(11) NOT NULL,
  `balance_id` int(11) NOT NULL,
  `asset_name` varchar(45) NOT NULL,
  `asset_value` float(10,2) NOT NULL,
  `asset_current` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`assets_id`, `balance_id`, `asset_name`, `asset_value`, `asset_current`) VALUES
(1, 1, '', 0.00, 0),
(2, 1, 'item', 50.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `balance_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`balance_id`, `date_created`, `created_by`) VALUES
(1, '2017-06-16 03:35:18', 9999);

-- --------------------------------------------------------

--
-- Table structure for table `balancer`
--

CREATE TABLE `balancer` (
  `balancer_id` int(11) NOT NULL,
  `balance_id` int(11) NOT NULL,
  `total_assets` float(10,2) NOT NULL,
  `total_liabilities` float(10,2) NOT NULL,
  `total_equity` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balancer`
--

INSERT INTO `balancer` (`balancer_id`, `balance_id`, `total_assets`, `total_liabilities`, `total_equity`) VALUES
(1, 1, 50.00, 30.00, 50.00);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(255) NOT NULL,
  `Phone` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `Phone`, `Email`, `Address`) VALUES
(1, 'Jan Lynnel F. Balitaan', '9172837586', 'janjanbalitaan@gmail.com', 'Miguelin'),
(2, 'Lorenzo Sebastianne C. Magno', '917289586', 'lorenzomagno2004@gmail.com', 'Baco'),
(3, 'Raymund Johnel Cadiz', '7092227', 'raymundjcadiz@gmail.com', 'timog QC'),
(4, 'Hannylou A. Celestial Edited', '938574637', 'hcelestial@gmail.com', 'Taguig'),
(8, 'Julia', '45', 's@s.com', 'manila'),
(9, 'Johnel Raymund J. Cadiz', '7092227', 'raymund911@gmail.com', '38 scout bayoran qc');

-- --------------------------------------------------------

--
-- Table structure for table `depreciation`
--

CREATE TABLE `depreciation` (
  `depreciationID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `value` float(10,2) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `other_doc` text,
  `desc` varchar(255) DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fiscal_year` text,
  `Status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `entertainment`
--

CREATE TABLE `entertainment` (
  `entertainmentID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `value` float(10,2) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `other_doc` text,
  `desc` varchar(255) DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_paid` date DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `feesID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `value` float(10,2) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `other_doc` text,
  `desc` varchar(255) DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_paid` date DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `insuranceID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `value` float(10,2) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `other_doc` text,
  `desc` varchar(255) DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_paid` date DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `interestID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `value` float(10,2) DEFAULT NULL,
  `date_created` varchar(45) DEFAULT NULL,
  `other_doc` text,
  `desc` varchar(255) DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_paid` date DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `liabilities`
--

CREATE TABLE `liabilities` (
  `liabilities_id` int(11) NOT NULL,
  `balance_id` int(11) NOT NULL,
  `liability_name` varchar(45) NOT NULL,
  `liability_value` float(10,2) NOT NULL,
  `liability_current` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liabilities`
--

INSERT INTO `liabilities` (`liabilities_id`, `balance_id`, `liability_name`, `liability_value`, `liability_current`) VALUES
(1, 1, '', 0.00, 2),
(2, 1, 'item_3', 30.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `maintenanceID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `value` float(10,2) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `other_doc` text,
  `desc` varchar(255) DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_paid` date DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `other_expenses`
--

CREATE TABLE `other_expenses` (
  `other_expenseID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `value` float(10,2) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `other_doc` text,
  `desc` varchar(255) DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_paid` date DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `owners_equity`
--

CREATE TABLE `owners_equity` (
  `owner_id` int(11) NOT NULL,
  `balance_id` int(11) NOT NULL,
  `owner_name` varchar(45) NOT NULL,
  `owner_value` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owners_equity`
--

INSERT INTO `owners_equity` (`owner_id`, `balance_id`, `owner_name`, `owner_value`) VALUES
(1, 1, '', 0.00),
(2, 1, 'item_2', 50.00);

-- --------------------------------------------------------

--
-- Table structure for table `purchasing_order`
--

CREATE TABLE `purchasing_order` (
  `PurchaseID` int(10) UNSIGNED NOT NULL,
  `TransactionDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `Total` float NOT NULL,
  `Accountant_UserID` int(11) NOT NULL,
  `Supplier_SupplierID` int(11) NOT NULL,
  `Administrator_AdminID` int(11) DEFAULT NULL,
  `Status` int(1) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchasing_order`
--

INSERT INTO `purchasing_order` (`PurchaseID`, `TransactionDate`, `Total`, `Accountant_UserID`, `Supplier_SupplierID`, `Administrator_AdminID`, `Status`) VALUES
(1, '2017-06-16 10:43:53', 5760, 1, 1, 1, 1),
(2, '2017-06-16 11:20:30', 5500, 1, 1, 1, 1),
(3, '2017-06-28 05:43:31', 25000, 1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchasing_order_item`
--

CREATE TABLE `purchasing_order_item` (
  `ItemID` int(10) UNSIGNED NOT NULL,
  `ItemName` varchar(45) DEFAULT NULL,
  `ItemDesc` varchar(255) DEFAULT NULL,
  `Quantity` int(10) UNSIGNED DEFAULT NULL,
  `start_invent` int(11) DEFAULT NULL,
  `UnitPrice` float NOT NULL,
  `PO_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchasing_order_item`
--

INSERT INTO `purchasing_order_item` (`ItemID`, `ItemName`, `ItemDesc`, `Quantity`, `start_invent`, `UnitPrice`, `PO_ID`) VALUES
(1, 'Mackaroo', NULL, 34, 50, 60, 1),
(2, 'Shoes 1', 'Shoes', 30, 50, 500, 2),
(3, 'Shoes 2', 'Shoes 2', 44, 50, 300, 2),
(4, 'Item for supplier 1', 'Item', 39, 50, 500, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rentID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `value` float(10,2) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `other_doc` text,
  `desc` varchar(255) DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_paid` date DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_invoice`
--

CREATE TABLE `service_invoice` (
  `ServiceID` int(11) NOT NULL,
  `TransactionDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `Total` float UNSIGNED NOT NULL,
  `Accountant_UserID` int(11) NOT NULL,
  `Customer_CustomerID` int(11) NOT NULL,
  `Administrator_AdminID` int(11) DEFAULT NULL,
  `Status` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_invoice`
--

INSERT INTO `service_invoice` (`ServiceID`, `TransactionDate`, `Total`, `Accountant_UserID`, `Customer_CustomerID`, `Administrator_AdminID`, `Status`) VALUES
(1, '2017-06-28 05:29:56', 0, 1, 3, 1, 1),
(2, '2017-06-28 05:30:17', 0, 1, 4, 1, 1),
(3, '2017-06-28 05:44:24', 0, 1, 2, 1, 1),
(4, '2017-06-28 05:47:10', 0, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_invoice_item`
--

CREATE TABLE `service_invoice_item` (
  `ItemID` int(10) UNSIGNED NOT NULL,
  `Quantity` int(10) UNSIGNED DEFAULT NULL,
  `SO_ID` int(11) NOT NULL,
  `POI_ItemID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_invoice_item`
--

INSERT INTO `service_invoice_item` (`ItemID`, `Quantity`, `SO_ID`, `POI_ItemID`) VALUES
(1, 5, 1, 1),
(2, 12, 1, 2),
(3, 5, 1, 3),
(4, 5, 2, 1),
(5, 2, 2, 2),
(6, 1, 2, 3),
(7, 6, 3, 4),
(8, 6, 4, 2),
(9, 6, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_invoice_service`
--

CREATE TABLE `service_invoice_service` (
  `ServiceID` int(10) UNSIGNED NOT NULL,
  `service_name` varchar(45) NOT NULL,
  `UnitPrice` float NOT NULL,
  `Quantity` int(10) UNSIGNED DEFAULT NULL,
  `SO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SupplierID` int(11) NOT NULL,
  `SupplierName` varchar(45) DEFAULT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(45) NOT NULL,
  `Region` varchar(45) NOT NULL,
  `PostalCode` int(10) UNSIGNED NOT NULL,
  `Phone` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SupplierID`, `SupplierName`, `Address`, `City`, `Region`, `PostalCode`, `Phone`, `Email`) VALUES
(1, 'Nike', '161', 'Caloocan', 'NCR', 1114, '0917123456', 'email@mail.com'),
(2, 'Adidas', '36 C', 'Quezon City', 'NCR', 1115, '7493857', 'email@email.com'),
(3, 'supplier 1', 'sa puso mo', 'QC', '4', 1103, '123456789', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `suppliesID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `value` float(10,2) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `other_doc` text,
  `desc` varchar(255) DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_paid` date DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `trainingID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `value` float(10,2) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `other_doc` text,
  `desc` varchar(255) DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_paid` date DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `travelID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `value` float(10,2) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `other_doc` text,
  `desc` varchar(255) DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_paid` date DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `UtilitiesID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `value` float DEFAULT NULL,
  `other_doc` text,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_paid` date DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wages`
--

CREATE TABLE `wages` (
  `wagesID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `value` float(10,2) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `other_doc` text,
  `desc` varchar(255) DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_paid` date DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`assets_id`),
  ADD KEY `balance_id` (`balance_id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`balance_id`);

--
-- Indexes for table `balancer`
--
ALTER TABLE `balancer`
  ADD PRIMARY KEY (`balancer_id`),
  ADD KEY `balance_id` (`balance_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `depreciation`
--
ALTER TABLE `depreciation`
  ADD PRIMARY KEY (`depreciationID`);

--
-- Indexes for table `entertainment`
--
ALTER TABLE `entertainment`
  ADD PRIMARY KEY (`entertainmentID`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`feesID`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`insuranceID`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`interestID`);

--
-- Indexes for table `liabilities`
--
ALTER TABLE `liabilities`
  ADD PRIMARY KEY (`liabilities_id`),
  ADD KEY `balance_id` (`balance_id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`maintenanceID`);

--
-- Indexes for table `other_expenses`
--
ALTER TABLE `other_expenses`
  ADD PRIMARY KEY (`other_expenseID`);

--
-- Indexes for table `owners_equity`
--
ALTER TABLE `owners_equity`
  ADD PRIMARY KEY (`owner_id`),
  ADD KEY `balance_id` (`balance_id`);

--
-- Indexes for table `purchasing_order`
--
ALTER TABLE `purchasing_order`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD KEY `fk_Purchasing Order_Accountant1_idx` (`Accountant_UserID`),
  ADD KEY `fk_Purchasing Order_Supplier1_idx` (`Supplier_SupplierID`),
  ADD KEY `fk_Purchasing Order_Administrator1_idx` (`Administrator_AdminID`);

--
-- Indexes for table `purchasing_order_item`
--
ALTER TABLE `purchasing_order_item`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `fk_POID_idx` (`PO_ID`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rentID`);

--
-- Indexes for table `service_invoice`
--
ALTER TABLE `service_invoice`
  ADD PRIMARY KEY (`ServiceID`),
  ADD KEY `fk_Sales Invoice_Accountant1_idx` (`Accountant_UserID`),
  ADD KEY `fk_Sales Invoice_Customer1_idx` (`Customer_CustomerID`),
  ADD KEY `fk_Sales Invoice_Administrator1_idx` (`Administrator_AdminID`);

--
-- Indexes for table `service_invoice_item`
--
ALTER TABLE `service_invoice_item`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `fk_SOID` (`SO_ID`),
  ADD KEY `FK_POIItemID` (`POI_ItemID`);

--
-- Indexes for table `service_invoice_service`
--
ALTER TABLE `service_invoice_service`
  ADD PRIMARY KEY (`ServiceID`),
  ADD KEY `fk_SOID` (`SO_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`suppliesID`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`trainingID`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`travelID`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`UtilitiesID`);

--
-- Indexes for table `wages`
--
ALTER TABLE `wages`
  ADD PRIMARY KEY (`wagesID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountant`
--
ALTER TABLE `accountant`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001;
--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;
--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `assets_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `balance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `balancer`
--
ALTER TABLE `balancer`
  MODIFY `balancer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `depreciation`
--
ALTER TABLE `depreciation`
  MODIFY `depreciationID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `entertainment`
--
ALTER TABLE `entertainment`
  MODIFY `entertainmentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `feesID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `insuranceID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `interestID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `liabilities`
--
ALTER TABLE `liabilities`
  MODIFY `liabilities_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `maintenanceID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `other_expenses`
--
ALTER TABLE `other_expenses`
  MODIFY `other_expenseID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `owners_equity`
--
ALTER TABLE `owners_equity`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchasing_order`
--
ALTER TABLE `purchasing_order`
  MODIFY `PurchaseID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `purchasing_order_item`
--
ALTER TABLE `purchasing_order_item`
  MODIFY `ItemID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `rentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service_invoice`
--
ALTER TABLE `service_invoice`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `service_invoice_item`
--
ALTER TABLE `service_invoice_item`
  MODIFY `ItemID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `service_invoice_service`
--
ALTER TABLE `service_invoice_service`
  MODIFY `ServiceID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `suppliesID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `trainingID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `travel`
--
ALTER TABLE `travel`
  MODIFY `travelID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `UtilitiesID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wages`
--
ALTER TABLE `wages`
  MODIFY `wagesID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_ibfk_1` FOREIGN KEY (`balance_id`) REFERENCES `balance` (`balance_id`);

--
-- Constraints for table `balancer`
--
ALTER TABLE `balancer`
  ADD CONSTRAINT `balancer_ibfk_1` FOREIGN KEY (`balance_id`) REFERENCES `balance` (`balance_id`);

--
-- Constraints for table `liabilities`
--
ALTER TABLE `liabilities`
  ADD CONSTRAINT `liabilities_ibfk_1` FOREIGN KEY (`balance_id`) REFERENCES `balance` (`balance_id`);

--
-- Constraints for table `owners_equity`
--
ALTER TABLE `owners_equity`
  ADD CONSTRAINT `owners_equity_ibfk_1` FOREIGN KEY (`balance_id`) REFERENCES `balance` (`balance_id`);

--
-- Constraints for table `purchasing_order`
--
ALTER TABLE `purchasing_order`
  ADD CONSTRAINT `fk_Purchasing Order_Accountant1` FOREIGN KEY (`Accountant_UserID`) REFERENCES `accountant` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Purchasing Order_Administrator1` FOREIGN KEY (`Administrator_AdminID`) REFERENCES `administrator` (`AdminID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Purchasing Order_Supplier1` FOREIGN KEY (`Supplier_SupplierID`) REFERENCES `supplier` (`SupplierID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchasing_order_item`
--
ALTER TABLE `purchasing_order_item`
  ADD CONSTRAINT `fk_POID` FOREIGN KEY (`PO_ID`) REFERENCES `purchasing_order` (`PurchaseID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `service_invoice`
--
ALTER TABLE `service_invoice`
  ADD CONSTRAINT `fk_Sales Invoice_Accountant1` FOREIGN KEY (`Accountant_UserID`) REFERENCES `accountant` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Sales Invoice_Administrator1` FOREIGN KEY (`Administrator_AdminID`) REFERENCES `administrator` (`AdminID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Sales Invoice_Customer1` FOREIGN KEY (`Customer_CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `service_invoice_item`
--
ALTER TABLE `service_invoice_item`
  ADD CONSTRAINT `FK_POIItemID` FOREIGN KEY (`POI_ItemID`) REFERENCES `purchasing_order_item` (`ItemID`),
  ADD CONSTRAINT `fk_SOID` FOREIGN KEY (`SO_ID`) REFERENCES `service_invoice` (`ServiceID`);

--
-- Constraints for table `service_invoice_service`
--
ALTER TABLE `service_invoice_service`
  ADD CONSTRAINT `fk_SOID_SRVC` FOREIGN KEY (`SO_ID`) REFERENCES `service_invoice` (`ServiceID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
