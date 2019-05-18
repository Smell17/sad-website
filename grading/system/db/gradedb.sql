

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gradedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin` which is Class Adviser 
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `accounttype` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `fname`, `lname`, `username`, `password`, `email`, `contact`, `accounttype`) VALUES
(1, 'Mister', 'Administrator', 'admin', 'admin1234', 'imtheadmin@yahoo.com', 09996969969, 'Administrator');

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `tblrealadmin` which is Admin
--

CREATE TABLE IF NOT EXISTS `tblrealadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tblrealadmin` (`id`, `fname`, `lname`, `username`, `password`) VALUES
(1, 'Nick', 'Valentine', 'nick', '123');

-- --------------------------------------------------------


--
-- Table structure for table `tblclass`
--

CREATE TABLE IF NOT EXISTS `tblclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(20) NOT NULL,
  `schoolyearid` int(11) NOT NULL,
  `yearlevelid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`id`, `classname`, `schoolyearid`, `yearlevelid`) VALUES
(1, 'Honesty', 1, 1),
(2, 'Hope', 1, 2),
(3, 'Loyalty', 1, 3),
(4, 'Faith', 1, 4),
(5, 'Patience', 1, 5),
(6, 'Courage', 1, 6),
(7, 'Wisdom', 1, 7),
(8, 'Diligence', 1, 8), 
(9, 'Charity', 1, 9),
(10, 'Perseverance', 1, 10), 
(11, 'Peace', 1, 11),
(12, 'Humility', 1, 12);


-- --------------------------------------------------------

--
-- Table structure for table `tblschoolyear`
--

CREATE TABLE IF NOT EXISTS `tblschoolyear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolyear` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `schoolyear` (`schoolyear`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tblschoolyear`
--

INSERT INTO `tblschoolyear` (`id`, `schoolyear`) VALUES
(1, '2016-2017');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE IF NOT EXISTS `tblstudent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `contact` int(20) NOT NULL,
  `address` text NOT NULL,
  `dateofbirth` date NOT NULL,
  `fathername` varchar(50) NOT NULL,
  `fathercontact` int(20) NOT NULL,
  `mothername` varchar(50) NOT NULL,
  `mothercontact` int(20) NOT NULL,
  `emergencyname` varchar(50) NOT NULL,
  `emergencycontact` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`id`, `lname`, `fname`, `mname`, `contact`, `address`, `dateofbirth`, `fathername`, `fathercontact`, `mothername`, `mothercontact`, `emergencyname`, `emergencycontact`) VALUES
(1, 'a', 'a', 'a', 1, 'a', '1969-8-15', 'smithy','69', 'wilma', '96', 'elmer', '196');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentclass`
--

CREATE TABLE IF NOT EXISTS `tblstudentclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `classid` (`classid`),
  KEY `studentid` (`studentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblstudentclass`
--

INSERT INTO `tblstudentclass` (`id`, `classid`, `studentid`, `subjectid`) VALUES
(3, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentgrade`
--

CREATE TABLE IF NOT EXISTS `tblstudentgrade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL,
  `schoolyearid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `adviserid` int(11) NOT NULL,
  `1stgrading` int(11) NOT NULL,
  `2ndgrading` int(11) NOT NULL,
  `3rdgrading` int(11) NOT NULL,
  `4thgrading` int(11) NOT NULL,
  `gradeaverage` int(11) NOT NULL,
  `remarks` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblstudentgrade`
--

INSERT INTO `tblstudentgrade` (`id`, `studentid`, `schoolyearid`, `subjectid`, `classid`, `adviserid`, `1stgrading`, `2ndgrading`, `3rdgrading`, `4thgrading`, `gradeaverage`, `remarks`) VALUES
(1, 1, 4, 1, 3, 1, 23, 23, 45, 4, 24, 'Failed'),
(5, 1, 24, 1, 3, 1, 79, 89, 78, 88, 84, 'Passed');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE IF NOT EXISTS `tblsubjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `yearlevelid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `subjectname`, `description`, `yearlevelid`) VALUES
(1, 'IT1', 'Fundamentals of Computer', 4),
(2, 'IT122', 'Articial Intelligence', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tblteacher`
--

CREATE TABLE IF NOT EXISTS `tblteacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `contact` int(20) NOT NULL,
  `address` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblteacher`
--

INSERT INTO `tblteacher` (`id`, `lname`, `fname`, `mname`, `contact`, `address`, `username`, `password`) VALUES
(1, 'Teacher', 'Teacher', 'Teacher', 1234567890, 'address', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tblteacheradvisory`
--

CREATE TABLE IF NOT EXISTS `tblteacheradvisory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacherid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacherid` (`teacherid`,`classid`),
  KEY `classid` (`classid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblteacheradvisory`
--

INSERT INTO `tblteacheradvisory` (`id`, `teacherid`, `classid`, `subjectid`) VALUES
(2, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblyearlevel`
--

CREATE TABLE IF NOT EXISTS `tblyearlevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yearlevel` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblyearlevel`
--

INSERT INTO `tblyearlevel` (`id`, `yearlevel`, `description`) VALUES
(1, '1st', 'Honesty'),
(2, '1st', 'Hope'),
(3, '2nd', 'Loyalty'),
(4, '2nd', 'Faith'),
(5, '3rd', 'Patience'),
(6, '3rd', 'Courage'),
(7, '4th', 'Wisdom'),
(8, '4th', 'Diligence'),
(9, '5th', 'Charity'),
(10, '5th', 'Perseverance'),
(11, '6th', 'Peace'),
(12, '6th', 'Humility');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
-- Table structure for table `tblstudentadvisory`
--

CREATE TABLE `tblstudentadvisory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblstudentadvisory`
--
ALTER TABLE `tblstudentadvisory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniquestudentadvisory` (`classid`,`studentid`);
  