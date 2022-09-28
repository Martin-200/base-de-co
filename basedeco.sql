-- Adminer 4.8.1 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `basedeco`;
CREATE DATABASE `basedeco` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `basedeco`;

DROP TABLE IF EXISTS `ban`;
CREATE TABLE `ban` (
  `banID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `banDate` bigint(20) NOT NULL,
  `adminID` int(11) NOT NULL,
  PRIMARY KEY (`banID`),
  KEY `fk_Ban_userID` (`userID`),
  KEY `fk_Ban_adminID` (`adminID`),
  CONSTRAINT `ban_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`) ON DELETE CASCADE,
  CONSTRAINT `fk_Ban_adminID` FOREIGN KEY (`adminID`) REFERENCES `User` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  `categoryColor` varchar(255) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Comments`;
CREATE TABLE `Comments` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `problemID` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `numberUpVote` int(11) NOT NULL DEFAULT '0',
  `numberDownVote` int(11) NOT NULL DEFAULT '0',
  `respondTo` int(11) DEFAULT NULL,
  `dateOfPublication` datetime NOT NULL,
  PRIMARY KEY (`commentID`),
  KEY `fk_Comments_userID` (`userID`),
  KEY `fk_Comments_problemID` (`problemID`),
  CONSTRAINT `fk_Comments_problemID` FOREIGN KEY (`problemID`) REFERENCES `Problem` (`problemID`),
  CONSTRAINT `fk_Comments_userID` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification` (
  `notificationID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `notificationType` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `redirection` varchar(255) NOT NULL,
  PRIMARY KEY (`notificationID`),
  KEY `fk_Notification_userID` (`userID`),
  CONSTRAINT `fk_Notification_userID` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `problem`;
CREATE TABLE `problem` (
  `problemID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `codeError` varchar(255) NOT NULL,
  `solution` text NOT NULL,
  `view` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `linkToScreen` varchar(255) NOT NULL,
  `dateOfPublication` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`problemID`),
  KEY `fk_Problem_userID` (`userID`),
  CONSTRAINT `fk_Problem_userID` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `problem` (`problemID`, `userID`, `title`, `description`, `codeError`, `solution`, `view`, `status`, `linkToScreen`, `dateOfPublication`) VALUES
(1,	1,	'pppopopopo',	'oiojcjjjjjjjjjjjjjoiojcjjjjjjjjjjjjjoiojcjjjjjjjjjjjjj',	'0987',	'oiojcjjjjjjjjjjjjjoiojcjjjjjjjjjjjjjoiojcjjjjjjjjjjjjj',	3,	2,	'\"\"',	'2022-09-28 11:20:36');

DROP TABLE IF EXISTS `ProblemCategory`;
CREATE TABLE `ProblemCategory` (
  `problemCategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryID` int(11) NOT NULL,
  `problemID` int(11) NOT NULL,
  PRIMARY KEY (`problemCategoryID`),
  KEY `fk_ProblemCategory_categoryID` (`categoryID`),
  KEY `fk_ProblemCategory_problemID` (`problemID`),
  CONSTRAINT `fk_ProblemCategory_categoryID` FOREIGN KEY (`categoryID`) REFERENCES `Category` (`categoryID`),
  CONSTRAINT `fk_ProblemCategory_problemID` FOREIGN KEY (`problemID`) REFERENCES `Problem` (`problemID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ProblemModify`;
CREATE TABLE `ProblemModify` (
  `problemModifyID` int(11) NOT NULL AUTO_INCREMENT,
  `problemID` int(11) NOT NULL,
  `newTitle` varchar(255) NOT NULL,
  `newCodeError` varchar(255) NOT NULL,
  `newDescription` varchar(255) NOT NULL,
  `newSolution` varchar(255) NOT NULL,
  `newLinkToScreen` varchar(255) NOT NULL,
  `dateOfModification` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`problemModifyID`),
  KEY `fk_ProblemModify_problemID` (`problemID`),
  CONSTRAINT `fk_ProblemModify_problemID` FOREIGN KEY (`problemID`) REFERENCES `Problem` (`problemID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `report`;
CREATE TABLE `report` (
  `reportID` int(11) NOT NULL AUTO_INCREMENT,
  `postCategory` varchar(255) NOT NULL,
  `postID` int(11) NOT NULL,
  `reportType` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`reportID`),
  KEY `fk_Report_postID` (`postID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `profilePictureUrl` varchar(255) NOT NULL,
  `userLevel` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_creation_account` date NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `User` (`userID`, `firstName`, `lastName`, `mail`, `username`, `profilePictureUrl`, `userLevel`, `password`, `date_creation_account`) VALUES
(1,	'Julien',	'Pierson',	'frajuju.fp@gmail.com',	'Pierson38',	'kd',	2,	'jj',	'2022-09-26'),
(6,	'Martin',	'Matin',	'MM@g.com',	'mmmmmm69',	'de',	0,	'de',	'2022-09-26');

-- 2022-09-28 09:44:01
