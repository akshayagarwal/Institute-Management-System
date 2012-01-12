-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Aug 07, 2010 at 12:44 PM
-- Server version: 4.1.9
-- PHP Version: 4.3.10
-- 
-- Database: `institute`
-- 
GRANT ALL PRIVILEGES ON * . * TO 'akshay'@'localhost' IDENTIFIED BY 'omsairam' WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 ;
USE institute;

-- --------------------------------------------------------

-- 
-- Table structure for table `batches`
-- 

CREATE TABLE `batches` (
  `ID` varchar(4) NOT NULL default '',
  `COURSE` text NOT NULL,
  `START` text NOT NULL,
  `END` text NOT NULL,
  `STRENGTH` tinyint(4) NOT NULL default '0',
  `ADMISSIONS` tinyint(4) NOT NULL default '0',
  `ENQUIRIES` tinyint(4) NOT NULL default '0',
  `ID2` varchar(4) NOT NULL default '',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='batches available';

-- 
-- Dumping data for table `batches`
-- 

INSERT INTO `batches` VALUES ('MS01', 'MSCIT', '06am', '09am', 23, 2, 2, 'MS01');
INSERT INTO `batches` VALUES ('MS02', 'MSCIT', '07am', '10am', 20, 0, 0, 'MS02');

-- --------------------------------------------------------

-- 
-- Table structure for table `courses`
-- 

CREATE TABLE `courses` (
  `NAME` text NOT NULL,
  `ID` char(2) NOT NULL default '',
  `DURATION` text NOT NULL,
  `FEES` int(11) NOT NULL default '0',
  `BATCHES` int(11) NOT NULL default '0',
  `STUDENTS` int(11) NOT NULL default '0',
  `CONTENTS` text,
  `ENQUIRIES` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Details of courses offered by the institute';

-- 
-- Dumping data for table `courses`
-- 

INSERT INTO `courses` VALUES ('MSCIT', 'MS', '3', 2500, 2, 2, 'Basic Software & Hardware Training', 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `enquiries`
-- 

CREATE TABLE `enquiries` (
  `ID` varchar(11) NOT NULL default '',
  `COURSE` text NOT NULL,
  `BATCH` text NOT NULL,
  `NAME` text NOT NULL,
  `FNAME` text NOT NULL,
  `MNAME` text NOT NULL,
  `LNAME` text NOT NULL,
  `DOB` text NOT NULL,
  `GENDER` text NOT NULL,
  `ADDRESS1` text NOT NULL,
  `ADDRESS2` text NOT NULL,
  `ADDRESS3` text NOT NULL,
  `PINCODE` mediumint(9) NOT NULL default '0',
  `MOBILE` varchar(10) NOT NULL default '0',
  `LANDLINE` text NOT NULL,
  `EMAIL` text NOT NULL,
  `TIME` bigint(20) NOT NULL default '0',
  `REMARKS` text NOT NULL,
  `SOURCE` text NOT NULL,
  `STATUS` varchar(8) NOT NULL default 'ENQUIRED',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='details of enquiries made at institute';

-- 
-- Dumping data for table `enquiries`
-- 

INSERT INTO `enquiries` VALUES ('ENSSMS00001', 'MSCIT', 'MS01', 'Sachin  R Sonawane', 'Sachin ', 'Ramesh', 'Sonawane', '09-06-1981', 'Male', 'Yaval Taluka Shetkari Sangh', 'Vyapari Sankul Near Bus Stand', 'Yaval', 425301, '9890779500', '(02585)261113', 'info@sunnycomputers.com', 1281024073, 'Demo Enquiry Account', 'Friends', 'ADMITTED');
INSERT INTO `enquiries` VALUES ('ENAAMS00002', 'MSCIT', 'MS01', 'Akshay G Agarwal', 'Akshay', 'Gopi', 'Agarwal', '04-01-1991', 'Male', 'RB3 1165B', '8 Blocks , Near Rang Bhavan', 'Bhusawal', 425201, '9970103544', '(02582)220183', 'akshay.leadindia@gmail.com', 1281131248, 'Demo Enquiry Account', 'Friends', 'ENQUIRED');

-- --------------------------------------------------------

-- 
-- Table structure for table `eqsource`
-- 

CREATE TABLE `eqsource` (
  `ID` tinyint(4) NOT NULL default '0',
  `NAME` text NOT NULL,
  `ENQUIRIES` int(11) NOT NULL default '0',
  `ATIME` bigint(20) NOT NULL default '0',
  `REMARKS` text NOT NULL,
  `STATUS` text NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='sources of enquiries';

-- 
-- Dumping data for table `eqsource`
-- 

INSERT INTO `eqsource` VALUES (1, 'Friends', 2, 1281023749, 'Publicity through friends', 'ACTIVE');

-- --------------------------------------------------------

-- 
-- Table structure for table `fees`
-- 

CREATE TABLE `fees` (
  `RNO` text NOT NULL,
  `ITRANSID` mediumint(9) NOT NULL default '0',
  `STUDID` varchar(9) NOT NULL default '',
  `AMOUNT` mediumint(9) NOT NULL default '0',
  `TIME` bigint(20) NOT NULL default '0',
  `REMARKS` text,
  PRIMARY KEY  (`ITRANSID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='digital fees register';

-- 
-- Dumping data for table `fees`
-- 

INSERT INTO `fees` VALUES ('1234', 1, 'SCMS00001', 2500, 1281165223, 'Demo Payment');

-- --------------------------------------------------------

-- 
-- Table structure for table `materials`
-- 

CREATE TABLE `materials` (
  `MCODE` smallint(6) NOT NULL default '0',
  `MATNAME` text NOT NULL,
  `QUANTITY` mediumint(9) NOT NULL default '0',
  `ADDTIME` bigint(20) NOT NULL default '0',
  `REMAIN` int(11) NOT NULL default '0',
  `REMARKS` text NOT NULL,
  PRIMARY KEY  (`MCODE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='materials available with the insitute';

-- 
-- Dumping data for table `materials`
-- 

INSERT INTO `materials` VALUES (1, 'MSCIT Books', 40, 1281023640, 40, 'Course Material For MSCIT');

-- --------------------------------------------------------

-- 
-- Table structure for table `missue`
-- 

CREATE TABLE `missue` (
  `MTRANSID` mediumint(9) NOT NULL default '0',
  `STUDID` varchar(9) NOT NULL default '',
  `MCODE` smallint(9) NOT NULL default '0',
  `MATNAME` text NOT NULL,
  `QUANTITY` mediumint(9) NOT NULL default '0',
  `ITIME` bigint(20) NOT NULL default '0',
  `REMARKS` text NOT NULL,
  PRIMARY KEY  (`MTRANSID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='digital material issue register';

-- 
-- Dumping data for table `missue`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `payments`
-- 

CREATE TABLE `payments` (
  `TRANSID` mediumint(9) NOT NULL default '0',
  `STUDID` varchar(9) NOT NULL default '',
  `POINTS` mediumint(9) NOT NULL default '0',
  `AMOUNT` mediumint(9) NOT NULL default '0',
  `STATUS` text NOT NULL,
  `ADDTIME` bigint(20) NOT NULL default '0',
  `PAYTIME` bigint(20) NOT NULL default '0',
  `REMARKS` text NOT NULL,
  PRIMARY KEY  (`TRANSID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `payments`
-- 

INSERT INTO `payments` VALUES (1, 'SCMS00001', 20, 100, 'PENDING', 1281025517, 0, 'PAYMENT FOR COMPLETING LEVEL 1');

-- --------------------------------------------------------

-- 
-- Table structure for table `students`
-- 

CREATE TABLE `students` (
  `PID` varchar(9) NOT NULL default '',
  `ID` varchar(9) NOT NULL default '',
  `COURSE` text NOT NULL,
  `BATCH` varchar(4) NOT NULL default '0',
  `COURSE_STATUS` text NOT NULL,
  `NAME` text NOT NULL,
  `FNAME` text NOT NULL,
  `MNAME` text NOT NULL,
  `LNAME` text NOT NULL,
  `DOB` varchar(10) NOT NULL default '',
  `GENDER` text NOT NULL,
  `SBI` varchar(11) default NULL,
  `BRANCH` text NOT NULL,
  `ADDRESS1` text NOT NULL,
  `ADDRESS2` text NOT NULL,
  `ADDRESS3` text NOT NULL,
  `PINCODE` varchar(6) NOT NULL default '0',
  `MOBILE` varchar(10) NOT NULL default '',
  `LANDLINE` text,
  `EMAIL` text NOT NULL,
  `CHILD1` varchar(9) default NULL,
  `CHILD2` varchar(9) default NULL,
  `FEESPAID` int(11) NOT NULL default '0',
  `FEESFLAG` tinyint(4) NOT NULL default '0',
  `LFTIME` bigint(20) NOT NULL default '0',
  `PASSWORD` varchar(8) NOT NULL default '0',
  `TIME` bigint(20) default '1269189791',
  `REMARKS` text NOT NULL,
  `PAYELIG` tinyint(4) NOT NULL default '0',
  `ABSLEVEL` mediumint(9) NOT NULL default '0',
  `LEVEL1` mediumint(9) NOT NULL default '0',
  `LEVEL2` mediumint(9) NOT NULL default '0',
  `LEVEL3` mediumint(9) NOT NULL default '0',
  `LEVEL4` mediumint(9) NOT NULL default '0',
  `LEVEL5` mediumint(9) NOT NULL default '0',
  `LEVEL6` mediumint(9) NOT NULL default '0',
  `LEVEL7` mediumint(9) NOT NULL default '0',
  `LEVEL8` mediumint(9) NOT NULL default '0',
  `LEVEL9` mediumint(9) NOT NULL default '0',
  `LEVEL10` mediumint(9) NOT NULL default '0',
  `LEVEL11` mediumint(9) NOT NULL default '0',
  `LEVEL12` mediumint(9) NOT NULL default '0',
  `LEVEL13` mediumint(9) NOT NULL default '0',
  `LEVEL14` mediumint(9) NOT NULL default '0',
  `LEVEL15` mediumint(9) NOT NULL default '0',
  `LEVEL16` mediumint(9) NOT NULL default '0',
  `LEVEL17` mediumint(9) NOT NULL default '0',
  `LEVEL18` mediumint(9) NOT NULL default '0',
  `LEVEL19` mediumint(9) NOT NULL default '0',
  `LEVEL20` mediumint(9) NOT NULL default '0',
  `TOTPOINTS` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `students`
-- 

INSERT INTO `students` VALUES ('SCMS00001', 'SCMS00001', 'MSCIT', 'MS01', 'ACTIVE', 'Sunny Computers', 'Sunny ', 'Computers', 'Yaval', '05-08-2010', 'Male', NULL, 'Yaval', 'Yaval Taluka Shetkari Sangh', 'Vyapari Sankul Near Bus Stand', 'Yaval', '425301', '9890779500', '(02585)261113', 'info@sunnycomputers.com', 'SSMS00001', 'SYMS00002', 2500, 1, 1281165223, '0', 1269189791, 'Account of Sunny Computers , Yaval', 1, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `students` VALUES ('SCMS00001', 'SSMS00001', 'MSCIT', 'MS01', 'ACTIVE', 'Sachin R Sonawane', 'Sachin', 'Ramesh', 'Sonawane', '09-06-1981', 'Male', '', 'Yaval', 'Yaval taluka Shetkari Sangh', 'Vyapari Sankul , Near Bus Stand', 'Yaval', '425301', '9890779500', '(02585)261113', 'info@sunnycomputers.com', NULL, NULL, 0, 0, 0, 'j879q4yd', 1281025217, 'First Level Account', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `students` VALUES ('SCMS00001', 'SYMS00002', 'MSCIT', 'MS01', 'ACTIVE', 'Sayyed Tayyub S Yousuf', 'Sayyed Tayyub', 'Sayyed', 'Yousuf', '20-06-1982', 'Male', '', 'Yaval', 'Yaval Taluka Shetkari Sangh', 'Vyapari Sankul', 'Yaval', '425301', '9970206964', '(02585) 261113', 'info@sunnycomputers.com', NULL, NULL, 0, 0, 0, '05pn8r7q', 1281025517, 'First Level Account', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
