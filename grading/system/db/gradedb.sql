

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

INSERT INTO `tblsubjects` (`subjectname`, `description`, `yearlevelid`) VALUES
('Reading', 'Reading', 1),
('Reading', 'Reading', 2),
('Language', 'Language', 1),
('Language', 'Language', 2),
('Mathematics', 'Mathematics', 1),
('Mathematics', 'Mathematics', 2),
('Science', 'Science', 1),
('Science', 'Science', 2),
('Filipino', 'Filipino', 1),
('Filipino', 'Filipino', 2),
('Social Studies', 'Social Studies', 1),
('Social Studies', 'Social Studies', 2),
('Makabayan: C.L.E./Values', 'Makabayan: C.L.E./Values', 1),
('Makabayan: C.L.E./Values', 'Makabayan: C.L.E./Values', 2),
('Makabayan: MAPE', 'Makabayan: MAPE', 1),
('Makabayan: MAPE', 'Makabayan: MAPE', 2),
('Makabayan: Computer', 'Makabayan: Computer', 1),
('Makabayan: Computer', 'Makabayan: Computer', 2),
('Makabayan: HELE/Writing', 'Makabayan: HELE/Writing', 1),
('Makabayan: HELE/Writing', 'Makabayan: HELE/Writing', 2),
('Makabayan: Club', 'Makabayan: Club', 1),
('Makabayan: Club', 'Makabayan: Club', 2),
('Reading', 'Reading', 3),
('Reading', 'Reading', 4),
('Language', 'Language', 3),
('Language', 'Language', 4),
('Mathematics', 'Mathematics', 3),
('Mathematics', 'Mathematics', 4),
('Science', 'Science', 3),
('Science', 'Science', 4),
('Filipino', 'Filipino', 3),
('Filipino', 'Filipino', 4),
('Social Studies', 'Social Studies', 3),
('Social Studies', 'Social Studies', 4),
('Makabayan: C.L.E./Values', 'Makabayan: C.L.E./Values', 3),
('Makabayan: C.L.E./Values', 'Makabayan: C.L.E./Values', 4),
('Makabayan: MAPE', 'Makabayan: MAPE', 3),
('Makabayan: MAPE', 'Makabayan: MAPE', 4),
('Makabayan: Computer', 'Makabayan: Computer', 3),
('Makabayan: Computer', 'Makabayan: Computer', 4),
('Makabayan: HELE/Writing', 'Makabayan: HELE/Writing', 3),
('Makabayan: HELE/Writing', 'Makabayan: HELE/Writing', 4),
('Makabayan: Club', 'Makabayan: Club', 3),
('Makabayan: Club', 'Makabayan: Club', 4),
('Reading', 'Reading', 5),
('Reading', 'Reading', 6),
('Language', 'Language', 5),
('Language', 'Language', 6),
('Mathematics', 'Mathematics', 5),
('Mathematics', 'Mathematics', 6),
('Science', 'Science', 5),
('Science', 'Science', 6),
('Filipino', 'Filipino', 5),
('Filipino', 'Filipino', 6),
('Social Studies', 'Social Studies', 5),
('Social Studies', 'Social Studies', 6),
('Makabayan: C.L.E./Values', 'Makabayan: C.L.E./Values', 5),
('Makabayan: C.L.E./Values', 'Makabayan: C.L.E./Values', 6),
('Makabayan: MAPE', 'Makabayan: MAPE', 5),
('Makabayan: MAPE', 'Makabayan: MAPE', 6),
('Makabayan: Computer', 'Makabayan: Computer', 5),
('Makabayan: Computer', 'Makabayan: Computer', 6),
('Makabayan: HELE/Writing', 'Makabayan: HELE/Writing', 5),
('Makabayan: HELE/Writing', 'Makabayan: HELE/Writing', 6),
('Makabayan: Club', 'Makabayan: Club', 5),
('Makabayan: Club', 'Makabayan: Club', 6),
('Reading', 'Reading', 7),
('Reading', 'Reading', 8),
('Language', 'Language', 7),
('Language', 'Language', 8),
('Mathematics', 'Mathematics', 7),
('Mathematics', 'Mathematics', 8),
('Science', 'Science', 7),
('Science', 'Science', 8),
('Filipino', 'Filipino', 7),
('Filipino', 'Filipino', 8),
('Social Studies', 'Social Studies', 7),
('Social Studies', 'Social Studies', 8),
('Makabayan: C.L.E./Values', 'Makabayan: C.L.E./Values', 7),
('Makabayan: C.L.E./Values', 'Makabayan: C.L.E./Values', 8),
('Makabayan: MAPE', 'Makabayan: MAPE', 7),
('Makabayan: MAPE', 'Makabayan: MAPE', 8),
('Makabayan: Computer', 'Makabayan: Computer', 7),
('Makabayan: Computer', 'Makabayan: Computer', 8),
('Makabayan: HELE/Writing', 'Makabayan: HELE/Writing', 7),
('Makabayan: HELE/Writing', 'Makabayan: HELE/Writing', 8),
('Makabayan: Club', 'Makabayan: Club', 7),
('Makabayan: Club', 'Makabayan: Club', 8),
('Reading', 'Reading', 9),
('Reading', 'Reading', 10),
('Language', 'Language', 9),
('Language', 'Language', 10),
('Mathematics', 'Mathematics', 9),
('Mathematics', 'Mathematics', 10),
('Science', 'Science', 9),
('Science', 'Science', 10),
('Filipino', 'Filipino', 9),
('Filipino', 'Filipino', 10),
('Social Studies', 'Social Studies', 9),
('Social Studies', 'Social Studies', 10),
('Makabayan: C.L.E./Values', 'Makabayan: C.L.E./Values', 9),
('Makabayan: C.L.E./Values', 'Makabayan: C.L.E./Values', 10),
('Makabayan: MAPE', 'Makabayan: MAPE', 9),
('Makabayan: MAPE', 'Makabayan: MAPE', 10),
('Makabayan: Computer', 'Makabayan: Computer', 9),
('Makabayan: Computer', 'Makabayan: Computer', 10),
('Makabayan: HELE/Writing', 'Makabayan: HELE/Writing', 9),
('Makabayan: HELE/Writing', 'Makabayan: HELE/Writing', 10),
('Makabayan: Club', 'Makabayan: Club', 9),
('Makabayan: Club', 'Makabayan: Club', 10),
('Reading', 'Reading', 11),
('Reading', 'Reading', 12),
('Language', 'Language', 11),
('Language', 'Language', 12),
('Mathematics', 'Mathematics', 11),
('Mathematics', 'Mathematics', 12),
('Science', 'Science', 11),
('Science', 'Science', 12),
('Filipino', 'Filipino', 11),
('Filipino', 'Filipino', 12),
('Social Studies', 'Social Studies', 11),
('Social Studies', 'Social Studies', 12),
('Makabayan: C.L.E./Values', 'Makabayan: C.L.E./Values', 11),
('Makabayan: C.L.E./Values', 'Makabayan: C.L.E./Values', 12),
('Makabayan: MAPE', 'Makabayan: MAPE', 11),
('Makabayan: MAPE', 'Makabayan: MAPE', 12),
('Makabayan: Computer', 'Makabayan: Computer', 11),
('Makabayan: Computer', 'Makabayan: Computer', 12),
('Makabayan: HELE/Writing', 'Makabayan: HELE/Writing', 11),
('Makabayan: HELE/Writing', 'Makabayan: HELE/Writing', 12),
('Makabayan: Club', 'Makabayan: Club', 11),
('Makabayan: Club', 'Makabayan: Club', 12);

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
  `id` int(11) NOT NULL,
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
  ADD UNIQUE KEY `tblstudentadvisory` (`classid`,`studentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblstudentadvisory`
--
ALTER TABLE `tblstudentadvisory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE `tblsubjectteacher` (
  `id` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `yearlevelid` int(11) NOT NULL,
  `classid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblsubjectteacher`
--
ALTER TABLE `tblsubjectteacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tblsubjectteacherindex` (`teacherid`,`subjectid`,`yearlevelid`,`classid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblsubjectteacher`
--
ALTER TABLE `tblsubjectteacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `tblnotifications` (
  `id` int(11) NOT NULL,
  `quarter` varchar(15) NOT NULL,
  `deadline` date DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblnotifications`
--
ALTER TABLE `tblnotifications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblnotifications`
--
ALTER TABLE `tblnotifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  

INSERT INTO `tblnotifications` (`quarter`, `deadline`, `is_enabled`) VALUES
('1stquarter', NULL, 0),
('2ndquarter', NULL, 0),
('3rdquarter', NULL, 0),
('4thquarter', NULL, 0);