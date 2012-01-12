-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 10, 2010 at 01:58 PM
-- Server version: 4.1.9
-- PHP Version: 4.3.10
-- 
-- Database: `institute`
-- 

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

INSERT INTO `batches` VALUES ('MS01', 'MSCIT', '06am', '09am', 23, 5, 2, 'MS01');
INSERT INTO `batches` VALUES ('MS02', 'MSCIT', '07am', '10am', 20, 0, 2, 'MS02');

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

INSERT INTO `courses` VALUES ('MSCIT', 'MS', '3', 2500, 2, 5, 'Basic Software & Hardware Training', 4);

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
INSERT INTO `enquiries` VALUES ('ENAAMS00002', 'MSCIT', 'MS01', 'Akshay G Agarwal', 'Akshay', 'Gopi', 'Agarwal', '04-01-1991', 'Male', 'RB3 1165B', '8 Blocks , Near Rang Bhavan', 'Bhusawal', 425201, '9970103544', '(02582)220183', 'akshay.leadindia@gmail.com', 1281131248, 'Demo Enquiry Account', 'Friends', 'ADMITTED');
INSERT INTO `enquiries` VALUES ('ENSYMS00003', 'MSCIT', 'MS02', 'Sayyad Tayyub S Yusouf', 'Sayyad Tayyub', 'Sayyed ', 'Yusouf', '04-01-1982', 'Male', 'Demo', 'demo', 'demo', 425301, '9970103544', '(02582)220183', 'akshay.leadindia@gmail.com', 1281159331, 'Demo Pls Ignore', 'Friends', 'ENQUIRED');
INSERT INTO `enquiries` VALUES ('ENDDMS00004', 'MSCIT', 'MS02', 'Demo E Demo', 'Demo', 'Enquiry', 'Demo', '04-03-1913', 'Male', 'Demo', 'Demo', 'Demo', 222222, '9970103544', '99292991', 'aks@gmail.com', 1281159592, 'Demo', 'Friends', 'ENQUIRED');

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

INSERT INTO `eqsource` VALUES (1, 'Friends', 4, 1281023749, 'Publicity through friends', 'ACTIVE');

-- --------------------------------------------------------

-- 
-- Table structure for table `fees`
-- 

CREATE TABLE `fees` (
  `RNO` text NOT NULL,
  `DOP` varchar(10) NOT NULL default '',
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

INSERT INTO `fees` VALUES ('1234', '', 1, 'SCMS00001', 500, 1281158821, 'Demo Payment');
INSERT INTO `fees` VALUES ('12345', '', 2, 'SCMS00001', 2000, 1281158872, 'Demo Payment');
INSERT INTO `fees` VALUES ('1122', '01-02-2017', 3, 'SHMS00005', 100, 1284319776, 'Demo Payment');

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

INSERT INTO `materials` VALUES (1, 'MSCIT Books', 44, 1284492769, 42, 'Course Material For MSCIT');

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

INSERT INTO `missue` VALUES (1, 'SCMS00001', 1, 'MSCIT Books', 1, 1281159123, 'Demo Issue');
INSERT INTO `missue` VALUES (2, 'SHMS00005', 1, 'MSCIT Books', 1, 1284492534, 'Demo');

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
INSERT INTO `payments` VALUES (2, 'SSMS00001', 20, 100, 'PENDING', 1284202442, 0, 'PAYMENT FOR COMPLETING LEVEL 1');

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
  `MARS` text NOT NULL,
  `QUALIFICATION` text,
  `MEDIUM` text NOT NULL,
  `DISCOUNT` double NOT NULL default '0',
  `DOA` varchar(10) NOT NULL default '',
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

INSERT INTO `students` VALUES ('SCMS00001', 'SCMS00001', 'MSCIT', 'MS01', 'ACTIVE', 'Sunny Computers', 'Sunny ', 'Computers', 'Yaval', '05-08-2010', 'Male', NULL, 'Yaval', 'Yaval Taluka Shetkari Sangh', 'Vyapari Sankul Near Bus Stand', 'Yaval', '425301', '9890779500', '(02585)261113', 'info@sunnycomputers.com', '', NULL, '', 0, '', 'SSMS00001', 'SYMS00002', 2500, 1, 1281158872, '0', 1269189791, 'Account of Sunny Computers , Yaval', 1, 0, 2, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `students` VALUES ('SCMS00001', 'SSMS00001', 'MSCIT', 'MS01', 'ACTIVE', 'Sachin R Sonawane', 'Sachin', 'Ramesh', 'Sonawane', '09-06-1981', 'Male', '', 'Yaval', 'Yaval taluka Shetkari Sangh', 'Vyapari Sankul , Near Bus Stand', 'Yaval', '425301', '9890779500', '(02585)261113', 'info@sunnycomputers.com', '', NULL, '', 0, '', 'AAMS00004', NULL, 0, 0, 0, 'j879q4yd', 1281025217, 'First Level Account', 0, 1, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `students` VALUES ('SCMS00001', 'SYMS00002', 'MSCIT', 'MS01', 'ACTIVE', 'Sayyed Tayyub S Yousuf', 'Sayyed Tayyub', 'Sayyed', 'Yousuf', '20-06-1982', 'Male', '', 'Yaval', 'Yaval Taluka Shetkari Sangh', 'Vyapari Sankul', 'Yaval', '425301', '9970206964', '(02585) 261113', 'sunny_computers2003@yahoo.com', '', NULL, '', 0, '', NULL, NULL, 0, 0, 0, '05pn8r7q', 1281025517, 'First Level Account', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `students` VALUES ('SSMS00001', 'AAMS00003', 'MSCIT', 'MS01', 'ACTIVE', 'Akshay G Agarwal', 'Akshay', 'Gopi', 'Agarwal', '04-01-1991', 'Male', '30450280536', 'Nanded', 'Nanded', 'aa', 'aa', '431606', '9970103544', '0000999', 'sasas@gmail.com', 'UnMarried', 'Btech', '', 500, '15-10-2010', 'SHMS00005', NULL, 0, 0, 0, 'w7n18yxc', 1284202396, 'Demo', 0, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `students` VALUES ('SSMS00001', 'AAMS00004', 'MSCIT', 'MS01', 'ACTIVE', 'Akshay G Agarwal', 'Akshay', 'Gopi', 'Agarwal', '04-01-1991', 'Male', '30450280536', 'Nanded', 'Nanded', 'aa', 'aa', '431606', '9970103544', '0000999', 'sasas@gmail.com', 'UnMarried', 'Btech', '', 500, '15-10-2010', NULL, NULL, 0, 0, 0, '14q5kxw2', 1284202442, 'Demo', 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `students` VALUES ('AAMS00003', 'SHMS00005', 'MSCIT', 'MS01', 'COMPLETED', 'Sunil S Hatkar', 'Sunil', 'Suneet', 'Hatkar', '02-02-1952', 'Male', '11111111111', 'sssss', 's', 's', 'aa', '222222', '9970103544', '99', 'askss@DLLA.COM', 'UnMarried', 'qq', '', 200, '14-12-2008', NULL, NULL, 100, 0, 1284319776, 'cvh3zr9s', 1284206728, 'SALSALS', 1, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
