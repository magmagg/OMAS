-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2017 at 03:56 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

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
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`username`, `email`, `password`, `create_time`, `UserID`) VALUES
('accountant', 'accountant@accountant.com', '$2y$10$0PruioxWQlvh0Kr3HKKYiuETmJpB.QLWP.WqBEjlauUjRlMbu.l8a', '2017-05-02 09:49:17', 1);

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
('admin', 'admin@admin.com', 'admin', '2017-05-02 09:49:03', 1);

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
(3, 'Raymund Johnel Cadiz', '666666666', 'sakmadik@gmail.com', 'Hell'),
(4, 'Hannylou A. Celestial', '938574637', 'hcelestial@gmail.com', 'Taguig'),
(5, 'Monique Bilgera', '93857685', 'monique.bilgera@gmail.com', 'Bulacan');

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

-- --------------------------------------------------------

--
-- Table structure for table `purchasing_order_item`
--

CREATE TABLE `purchasing_order_item` (
  `ItemID` int(10) UNSIGNED NOT NULL,
  `ItemName` varchar(45) DEFAULT NULL,
  `ItemDesc` varchar(255) DEFAULT NULL,
  `Quantity` int(10) UNSIGNED DEFAULT NULL,
  `UnitPrice` float NOT NULL,
  `PO_ID` int(10) UNSIGNED NOT NULL
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
(2, 'Adidas', '36 C', 'Quezon City', 'NCR', 1115, '7493857', 'email@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `UtilitiesID` int(11) NOT NULL,
  `utility_name` varchar(45) DEFAULT NULL,
  `utility_desc` varchar(255) DEFAULT NULL,
  `utility_price` float DEFAULT NULL,
  `utility_doc` text,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
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
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

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
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`UtilitiesID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountant`
--
ALTER TABLE `accountant`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `purchasing_order`
--
ALTER TABLE `purchasing_order`
  MODIFY `PurchaseID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchasing_order_item`
--
ALTER TABLE `purchasing_order_item`
  MODIFY `ItemID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service_invoice`
--
ALTER TABLE `service_invoice`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service_invoice_item`
--
ALTER TABLE `service_invoice_item`
  MODIFY `ItemID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `UtilitiesID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
