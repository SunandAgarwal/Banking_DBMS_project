-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: Banking
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `Account_Number` bigint(20) NOT NULL,
  `Type` text NOT NULL,
  `Balance` double NOT NULL,
  `Status` text NOT NULL,
  `Cheque_Book_No` int(11) DEFAULT NULL,
  `Registered_time` datetime DEFAULT NULL,
  PRIMARY KEY (`Account_Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branches` (
  `IFSC_Code` varchar(15) NOT NULL,
  `Assets` double NOT NULL,
  `Street` varchar(25) DEFAULT NULL,
  `City` varchar(15) NOT NULL,
  `State` varchar(15) NOT NULL,
  `PIN_Code` int(11) NOT NULL,
  PRIMARY KEY (`IFSC_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES ('ABC101',100000,'Q','A','B',123456),('ABC102',100000,'R','A','B',123457),('ABC103',100000,'S','A','B',123458),('ABC104',100000,'T','A','B',123459);
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `card__info`
--

DROP TABLE IF EXISTS `card__info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `card__info` (
  `Card_No` int(11) NOT NULL,
  `CVV` int(3) NOT NULL,
  `Valid_Thru` int(11) NOT NULL,
  `Card_Holder` text,
  `Type` text NOT NULL,
  `PIN` int(11) NOT NULL,
  `Account_Number` bigint(20) NOT NULL,
  PRIMARY KEY (`Card_No`),
  KEY `Account_Number` (`Account_Number`),
  CONSTRAINT `card__info_ibfk_1` FOREIGN KEY (`Account_Number`) REFERENCES `accounts` (`Account_Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card__info`
--

LOCK TABLES `card__info` WRITE;
/*!40000 ALTER TABLE `card__info` DISABLE KEYS */;
/*!40000 ALTER TABLE `card__info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cust__phones`
--

DROP TABLE IF EXISTS `cust__phones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cust__phones` (
  `Customer_ID` int(11) NOT NULL,
  `Phone_No` int(11) NOT NULL,
  PRIMARY KEY (`Customer_ID`,`Phone_No`),
  CONSTRAINT `cust__phones_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customers` (`Customer_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cust__phones`
--

LOCK TABLES `cust__phones` WRITE;
/*!40000 ALTER TABLE `cust__phones` DISABLE KEYS */;
/*!40000 ALTER TABLE `cust__phones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `Customer_ID` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(15) NOT NULL,
  `middle_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) NOT NULL,
  `Father_name` varchar(25) NOT NULL,
  `Street` varchar(25) DEFAULT NULL,
  `City` varchar(15) DEFAULT NULL,
  `State` varchar(15) DEFAULT NULL,
  `PIN_Code` int(11) NOT NULL,
  `Gender` enum('M','F','O') NOT NULL,
  `Date_of_birth` date NOT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `Aadhar_number` int(11) NOT NULL,
  `Account_Number` bigint(20) NOT NULL,
  PRIMARY KEY (`Customer_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp__acc`
--

DROP TABLE IF EXISTS `emp__acc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp__acc` (
  `Account_Number` bigint(20) NOT NULL,
  `Employee_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Account_Number`),
  KEY `Employee_ID` (`Employee_ID`),
  CONSTRAINT `emp__acc_ibfk_1` FOREIGN KEY (`Account_Number`) REFERENCES `accounts` (`Account_Number`),
  CONSTRAINT `emp__acc_ibfk_2` FOREIGN KEY (`Employee_ID`) REFERENCES `employees` (`Employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp__acc`
--

LOCK TABLES `emp__acc` WRITE;
/*!40000 ALTER TABLE `emp__acc` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp__acc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp__phones`
--

DROP TABLE IF EXISTS `emp__phones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp__phones` (
  `Employee_ID` int(11) NOT NULL,
  `Phone_No` int(11) NOT NULL,
  PRIMARY KEY (`Employee_ID`,`Phone_No`),
  CONSTRAINT `emp__phones_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employees` (`Employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp__phones`
--

LOCK TABLES `emp__phones` WRITE;
/*!40000 ALTER TABLE `emp__phones` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp__phones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `Employee_ID` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(15) NOT NULL,
  `middle_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) NOT NULL,
  `Street` text,
  `City` text,
  `State` text,
  `Pin_Code` int(11) NOT NULL,
  `Gender` enum('M','F','O') NOT NULL,
  `Date_Of_birth` date NOT NULL,
  `Email` text,
  `Aadhar_number` int(11) NOT NULL,
  `Designation` text NOT NULL,
  `Salary` int(11) NOT NULL,
  `IFSC_Code` varchar(15) NOT NULL,
  PRIMARY KEY (`Employee_ID`),
  KEY `IFSC_Code` (`IFSC_Code`),
  CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`IFSC_Code`) REFERENCES `branches` (`IFSC_Code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'w',NULL,'e','k','k','k',1,'M','0011-11-11','a@3.co',1,'po',40000,'ABC104');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loans`
--

DROP TABLE IF EXISTS `loans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loans` (
  `Loan_No` int(11) NOT NULL,
  `Type` text NOT NULL,
  `Interest_Rate` double NOT NULL,
  `Period` text NOT NULL,
  PRIMARY KEY (`Loan_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loans`
--

LOCK TABLES `loans` WRITE;
/*!40000 ALTER TABLE `loans` DISABLE KEYS */;
/*!40000 ALTER TABLE `loans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (37,'2017_10_31_142310_create_branches_table',1),(83,'2014_10_12_000000_create_users_table',2),(84,'2014_10_12_100000_create_password_resets_table',2),(85,'2017_10_31_135945_create_customers_table',2),(86,'2017_10_31_141200_create_branches_table',2),(87,'2017_10_31_141208_create_employees_table',2),(88,'2017_10_31_141246_create_emp__phones_table',2),(89,'2017_10_31_142038_create_cust__phones_table',2),(90,'2017_10_31_142145_create_accounts_table',2),(91,'2017_10_31_142226_create_transactions_table',2),(92,'2017_10_31_142304_create_loans_table',2),(93,'2017_10_31_145434_takes__loan_table',2),(94,'2017_10_31_145518_card__info_table',2),(95,'2017_10_31_145603_emp__acc_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `takes__loan`
--

DROP TABLE IF EXISTS `takes__loan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `takes__loan` (
  `Account_Number` bigint(20) NOT NULL,
  `Loan_No` int(11) NOT NULL,
  `Loan_Amount` double NOT NULL,
  `Monthly_Installment` double NOT NULL,
  `Pending_Amount` int(11) NOT NULL,
  `Collateral_Guarantor` text NOT NULL,
  PRIMARY KEY (`Account_Number`,`Loan_No`),
  KEY `Loan_No` (`Loan_No`),
  CONSTRAINT `takes__loan_ibfk_1` FOREIGN KEY (`Account_Number`) REFERENCES `accounts` (`Account_Number`),
  CONSTRAINT `takes__loan_ibfk_2` FOREIGN KEY (`Loan_No`) REFERENCES `loans` (`Loan_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `takes__loan`
--

LOCK TABLES `takes__loan` WRITE;
/*!40000 ALTER TABLE `takes__loan` DISABLE KEYS */;
/*!40000 ALTER TABLE `takes__loan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `Transaction_ID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Debit` double DEFAULT NULL,
  `Credit` double DEFAULT NULL,
  `Type` text NOT NULL,
  `Account_Number` bigint(20) NOT NULL,
  `Sender_Acc_No` int(11) DEFAULT NULL,
  `Beneficiary_Acc_No` int(11) DEFAULT NULL,
  PRIMARY KEY (`Transaction_ID`),
  KEY `Account_Number` (`Account_Number`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`Account_Number`) REFERENCES `accounts` (`Account_Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-04 17:22:01
