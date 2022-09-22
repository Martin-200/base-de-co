-- Adminer 4.8.1 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `Ban`;
CREATE TABLE `Ban` (
  `banID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `banLevel` int(11) NOT NULL,
  `banDate` date NOT NULL,
  `adminID` int(11) NOT NULL,
  PRIMARY KEY (`banID`),
  KEY `fk_Ban_userID` (`userID`),
  KEY `fk_Ban_adminID` (`adminID`),
  CONSTRAINT `fk_Ban_adminID` FOREIGN KEY (`adminID`) REFERENCES `User` (`userID`),
  CONSTRAINT `fk_Ban_userID` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `Category`;
CREATE TABLE `Category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryColor` varchar(255) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Comments`;
CREATE TABLE `Comments` (
  `commentID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `problemID` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `numberUpVote` int(11) NOT NULL,
  `numberDownVote` int(11) NOT NULL,
  `respondTo` int(11) DEFAULT NULL,
  PRIMARY KEY (`commentID`),
  KEY `fk_Comments_userID` (`userID`),
  KEY `fk_Comments_problemID` (`problemID`),
  CONSTRAINT `fk_Comments_problemID` FOREIGN KEY (`problemID`) REFERENCES `Problem` (`problemID`),
  CONSTRAINT `fk_Comments_userID` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `Notification`;
CREATE TABLE `Notification` (
  `notificationID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `notificationType` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `redirection` varchar(255) NOT NULL,
  PRIMARY KEY (`notificationID`),
  KEY `fk_Notification_userID` (`userID`),
  CONSTRAINT `fk_Notification_userID` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `Problem`;
CREATE TABLE `Problem` (
  `problemID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `codeError` varchar(255) NOT NULL,
  `solution` varchar(255) NOT NULL,
  `view` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `linkToScreen` varchar(255) NOT NULL,
  `dateOfPublication` date NOT NULL,
  PRIMARY KEY (`problemID`),
  KEY `fk_Problem_userID` (`userID`),
  CONSTRAINT `fk_Problem_userID` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `ProblemCategory`;
CREATE TABLE `ProblemCategory` (
  `problemCategoryID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `problemID` int(11) NOT NULL,
  PRIMARY KEY (`problemCategoryID`),
  KEY `fk_ProblemCategory_problemID` (`problemID`),
  KEY `fk_ProblemCategory_categoryID` (`categoryID`),
  CONSTRAINT `fk_ProblemCategory_categoryID` FOREIGN KEY (`categoryID`) REFERENCES `Category` (`categoryID`),
  CONSTRAINT `fk_ProblemCategory_problemID` FOREIGN KEY (`problemID`) REFERENCES `Problem` (`problemID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ProblemModify`;
CREATE TABLE `ProblemModify` (
  `problemModifyID` int(11) NOT NULL,
  `problemID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `linkToScreen` varchar(255) NOT NULL,
  PRIMARY KEY (`problemModifyID`),
  KEY `fk_ProblemModify_problemID` (`problemID`),
  CONSTRAINT `fk_ProblemModify_problemID` FOREIGN KEY (`problemID`) REFERENCES `Problem` (`problemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `Report`;
CREATE TABLE `Report` (
  `reportID` int(11) NOT NULL,
  `postCategory` varchar(255) NOT NULL,
  `postID` int(11) NOT NULL,
  `reportType` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`reportID`),
  KEY `fk_Report_postID` (`postID`),
  CONSTRAINT `fk_Report_postID` FOREIGN KEY (`postID`) REFERENCES `Comments` (`commentID`)
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
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `User` (`userID`, `firstName`, `lastName`, `mail`, `username`, `profilePictureUrl`, `userLevel`, `password`) VALUES
(1,	'Juliend',	'Pierson',	'frajuju.fp@gmail.com',	'Pierson38',	'kd',	2,	'jj'),
(2,	'htthh',	'nhhnn',	'gtth@gmail.com',	'bgnn',	'd',	2,	'oo');

-- 2022-09-22 13:00:20
