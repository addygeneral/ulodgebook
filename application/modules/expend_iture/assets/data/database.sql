--
-- Table structure for table `expenditureydetails`
--

CREATE TABLE IF NOT EXISTS `expenditureydetails` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `categorytypeid` int(11) NOT NULL,
  `categorytitle` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenditureytype`
--

CREATE TABLE IF NOT EXISTS `expenditureytype` (
  `categorytypeid` int(11) NOT NULL AUTO_INCREMENT,
  `categorytypetitle` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`categorytypeid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenditurey_ref_accomodation`
--

CREATE TABLE IF NOT EXISTS `expeniturey_ref_accomodation` (
  `accomodationid` int(11) NOT NULL,
  `categoryid` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `mesurementid` int(11) NOT NULL AUTO_INCREMENT,
  `expensesmesurementitle` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`mesurementid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;