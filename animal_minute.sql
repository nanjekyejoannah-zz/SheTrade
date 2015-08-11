-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2015 at 08:50 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `animal_minute`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE IF NOT EXISTS `animal` (
  `Animals_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Animal` varchar(250) NOT NULL,
  `Breed` varchar(250) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Parentage` varchar(250) NOT NULL,
  `Color` varchar(300) NOT NULL,
  `Vaccinated` varchar(10) NOT NULL,
  `Registered` varchar(10) NOT NULL,
  `Trained` varchar(10) NOT NULL,
  `Weight` varchar(10) NOT NULL,
  `Purpose` text NOT NULL,
  `Location` varchar(250) NOT NULL,
  `Country` varchar(250) NOT NULL DEFAULT 'Uganda',
  `Price` varchar(25) NOT NULL,
  `Sale_Type` varchar(12) NOT NULL,
  `Description` text NOT NULL,
  `Image_1` varchar(50) NOT NULL,
  `Image_1_Thumb` varchar(50) NOT NULL,
  `Image_2` varchar(50) NOT NULL,
  `Image_2_Thumb` varchar(50) NOT NULL,
  `Image_3` varchar(50) NOT NULL,
  `Image_3_Thumb` varchar(50) NOT NULL,
  `Views` int(10) NOT NULL,
  `Verified` varchar(3) NOT NULL DEFAULT 'No',
  `Added_By` int(10) NOT NULL,
  `Member_Type` varchar(12) NOT NULL DEFAULT 'User',
  PRIMARY KEY (`Animals_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `animal_comments`
--

CREATE TABLE IF NOT EXISTS `animal_comments` (
  `Comment_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Animal_ID` int(10) NOT NULL,
  `Member_ID` int(10) NOT NULL,
  `Comment` text NOT NULL,
  PRIMARY KEY (`Comment_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `animal_comments`
--

INSERT INTO `animal_comments` (`Comment_ID`, `Animal_ID`, `Member_ID`, `Comment`) VALUES
(1, 2, 3, 'comment'),
(2, 1, 2, 'comment'),
(3, 1, 2, 'comment'),
(4, 1, 2, 'comment'),
(5, 2, 2, 'Heavy duty');

-- --------------------------------------------------------

--
-- Table structure for table `animal_likes`
--

CREATE TABLE IF NOT EXISTS `animal_likes` (
  `Like_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Animal_ID` int(10) NOT NULL,
  `Member_ID` int(10) NOT NULL,
  PRIMARY KEY (`Like_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `animal_likes`
--

INSERT INTO `animal_likes` (`Like_ID`, `Animal_ID`, `Member_ID`) VALUES
(1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `Contacts_ID` int(1) NOT NULL AUTO_INCREMENT,
  `Physical` text NOT NULL,
  `Postal` text NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Forward_Emails_To` varchar(250) NOT NULL,
  `Phone` varchar(25) NOT NULL,
  PRIMARY KEY (`Contacts_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`Contacts_ID`, `Physical`, `Postal`, `Email`, `Forward_Emails_To`, `Phone`) VALUES
(1, 'SHE Trade', 'P. O. Box 30469, Kampala, Uganda', 'dwfafrica@gmail.com', '', '+256776690539');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `Country_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Country` varchar(250) NOT NULL,
  PRIMARY KEY (`Country_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`Country_ID`, `Country`) VALUES
(1, 'Uganda'),
(2, 'Kenya'),
(3, 'Tanzania'),
(4, 'Rwanda'),
(5, 'Burundi'),
(6, 'Ethopia');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `Member_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Title` varchar(5) NOT NULL,
  `First_Name` varchar(32) NOT NULL,
  `Last_Name` varchar(32) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Date_Of_Birth` date NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Phone` varchar(32) NOT NULL,
  `Website` varchar(200) NOT NULL,
  `Image` varchar(120) NOT NULL,
  `Image_Thumb` varchar(120) NOT NULL,
  `Organisation` varchar(250) NOT NULL,
  `City` varchar(250) NOT NULL,
  `Country` varchar(250) NOT NULL DEFAULT 'Uganda',
  `Animals_Added` int(10) NOT NULL DEFAULT '0',
  `Animals_Products` int(10) NOT NULL DEFAULT '0',
  `Animal_Products` int(10) NOT NULL DEFAULT '0',
  `Type` varchar(5) NOT NULL DEFAULT 'User',
  `Verification_Code` varchar(32) NOT NULL,
  `Verified` varchar(3) NOT NULL DEFAULT 'No',
  `Password` varchar(32) NOT NULL,
  PRIMARY KEY (`Member_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`Member_ID`, `Title`, `First_Name`, `Last_Name`, `Gender`, `Date_Of_Birth`, `Email`, `Phone`, `Website`, `Image`, `Image_Thumb`, `Organisation`, `City`, `Country`, `Animals_Added`, `Animals_Products`, `Animal_Products`, `Type`, `Verification_Code`, `Verified`, `Password`) VALUES
(1, 'Mr.', 'Patrick Allan', 'WabwireJr', 'Male', '1988-04-19', 'allanwabwirejr@yahoo.co.uk', '0701115550', 'http://www.orion.co.ug/', 'images/members/Image_avatar_1.JPG', 'images/members/Thumb_avatar_1.JPG', 'Orion Solutions Uganda', 'Kampala', 'Uganda', 1, 0, 0, 'Orion', '120d01182dbb142a89dfee2f9d624c9d', 'No', '487a76824d56a9df2c8a18f6a05329d5'),
(2, 'Dr.', 'Herbert', 'Kasiita', 'Male', '1999-11-30', 'kasiitacollin@gmail.com', '+256702678067', 'www.animalminute.com', '', '', 'Green Tag Africa Ltd', 'Kampala', 'Uganda', 1, 0, 0, 'Admin', 'fdee9dfc32288fecfe512a812e2c92d0', 'No', '7d3854b88d78d3e1d614b57762a71cb6'),
(3, '', 'Men', 'Top', 'Male', '0000-00-00', 'kasiita@vetmed.mak.ac.ug', '', '', 'images/members/avatar_male.png', 'images/members/avatar_male_thumb.png', '', '', 'Uganda', 0, 0, 1, 'User', 'c1475569493534f21e48e8cc8a4720de', 'No', '02c26d38bba00a9f185133dabbd3864d'),
(4, '', 'gerard', 'ogwang', 'Male', '0000-00-00', 'gerard.ogwang@yahoo.com', '', '', 'images/members/avatar_male.png', 'images/members/avatar_male_thumb.png', '', '', 'Uganda', 0, 0, 0, 'User', '0d62e2cb410cc59cf00fe97942b67cf3', 'No', 'e533ac485aedbe01af38d7d0fe76bee2'),
(5, 'Dr.', 'BRIGHTON', 'MARIENGA', 'Male', '1980-01-30', 'ariepa2005@yahoo.co.uk', '0720171025', 'www.guruvet.org', 'images/members/Image_avatar_5.JPG', 'images/members/Thumb_avatar_5.JPG', 'GURUVET COMPANY LTD', 'Nairobi', 'Kenya', 0, 0, 0, 'User', 'a98867c58e65cc28967d43fa22e408cf', 'Yes', 'f499a1511068849f63a0a7ab71520799'),
(6, '', 'Jagen', 'Julius', 'Male', '0000-00-00', 'jagen.julius@gmail.com', '', '', 'images/members/avatar_male.png', 'images/members/avatar_male_thumb.png', '', '', 'Uganda', 0, 0, 0, 'User', '7ef6534b51eec342c95e65194239c51e', 'No', '983b3ab8cf5846965120450a37ca8b91'),
(7, '', 'Ritah', 'Isabella', 'Female', '0000-00-00', 'ritahbella@gmail.com', '', '', 'images/members/avatar_female.png', 'images/members/avatar_female_thumb.png', '', '', 'Uganda', 0, 0, 0, 'User', '80da689b3789edd05427264e9e3e2c8f', 'No', '6525c893c9b727f52cabad6475da5db9'),
(8, '', 'SEBALINGA', 'CHARLES', 'Male', '0000-00-00', 'csebalinga@yahoo.com', '', '', 'images/members/avatar_male.png', 'images/members/avatar_male_thumb.png', '', '', 'Uganda', 0, 0, 0, 'User', '675213fcf900ade0853774663651ceb5', 'No', '7983dc74f26be462fcc476ab7baec2eb'),
(9, '', 'Henry', 'Sempangi', 'Male', '0000-00-00', 'hsempangi@gmail.com', '', '', 'images/members/avatar_male.png', 'images/members/avatar_male_thumb.png', '', '', 'Uganda', 0, 0, 0, 'User', 'e57ce14c68e8047d0d99705cd1fadfaa', 'No', 'cefd5709152fbe6565b8fd3fefe5af86'),
(10, '', 'Geoffrey', 'Mukama', 'Male', '0000-00-00', 'geoffreymkm803@gmail.com', '', '', 'images/members/avatar_male.png', 'images/members/avatar_male_thumb.png', '', '', 'Uganda', 0, 0, 0, 'User', 'f6b297475df61c21f7b49fd15a77908c', 'Yes', 'e8bb00617d975be816dc061615ed0626'),
(11, '', 'EMMANUEL', 'MUSINGUZI', 'Male', '0000-00-00', 'bengreyitech@gmail.com', '', '', 'images/members/avatar_male.png', 'images/members/avatar_male_thumb.png', '', '', 'Uganda', 0, 0, 0, 'User', '784a02b145c859f7f90cdab45c2a4bfc', 'No', 'a6c842fc77d8bf4366432e229bffc706'),
(12, '', 'Joel', 'BALIDDAWA', 'Male', '0000-00-00', 'jbaliddawa@gmail.com', '', '', 'images/members/avatar_male.png', 'images/members/avatar_male_thumb.png', '', '', 'Uganda', 0, 0, 0, 'User', '262b468c07fccf7233697c754e7be60e', 'No', 'dca799686bb8b5b7bbb504717ac29e74'),
(13, '', 'Noor ', 'Namuddu', 'Female', '0000-00-00', 'noornam2002@gmail.com', '', '', 'images/members/avatar_female.png', 'images/members/avatar_female_thumb.png', '', '', 'Uganda', 0, 0, 0, 'User', '9961829107fba2d7bbf497cc25ea6d84', 'No', '5867baf56cbe218ef254ee76e316c568'),
(14, '', 'Henry ', 'Ssekidde', 'Male', '0000-00-00', 'henryssekidde@yahoo.com', '', '', 'images/members/avatar_male.png', 'images/members/avatar_male_thumb.png', '', '', 'Uganda', 0, 0, 0, 'User', '42df43756bce2580cc8d57d819613e4f', 'No', 'be452dfa58007fd06ec5c42bdd7aae93'),
(15, '', 'Farhad', 'Mirzaei', 'Male', '0000-00-00', 'farmir2005@gmail.com', '', '', 'images/members/avatar_male.png', 'images/members/avatar_male_thumb.png', '', '', 'Uganda', 0, 0, 0, 'User', 'e05d0727be44c0bbb8e7daeccc634c12', 'No', 'b84fd0bf8f8ae4557225c05c3916465b'),
(16, '', 'Pat', 'Nek', 'Female', '0000-00-00', 'lpnekesa@gmail.com', '', '', 'images/members/avatar_female.png', 'images/members/avatar_female_thumb.png', '', '', 'Uganda', 0, 0, 0, 'User', '960f9c800ba4801cbbca0eadc618f0bb', 'No', '85330435726d4e8b131f0bb600ac6c75');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Product_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Animal` varchar(250) NOT NULL,
  `Product` varchar(250) NOT NULL,
  `Price` varchar(25) NOT NULL,
  `Sale_Type` varchar(12) NOT NULL,
  `Quantity` varchar(250) NOT NULL,
  `Description` text NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Image_Thumb` varchar(50) NOT NULL,
  `Views` int(10) NOT NULL DEFAULT '0',
  `Added_By` int(10) NOT NULL,
  `Member_Type` varchar(12) NOT NULL DEFAULT 'User',
  `Verified` varchar(3) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`Product_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE IF NOT EXISTS `product_comments` (
  `Comment_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Product_ID` int(10) NOT NULL,
  `Member_ID` int(10) NOT NULL,
  `Comment` text NOT NULL,
  PRIMARY KEY (`Comment_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_likes`
--

CREATE TABLE IF NOT EXISTS `product_likes` (
  `Like_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Product_ID` int(10) NOT NULL,
  `Member_ID` int(10) NOT NULL,
  PRIMARY KEY (`Like_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE IF NOT EXISTS `resource` (
  `Resource_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Category` varchar(250) NOT NULL,
  `Resource` varchar(300) NOT NULL,
  `Description` text NOT NULL,
  `Link` varchar(500) NOT NULL,
  PRIMARY KEY (`Resource_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `resource_category`
--

CREATE TABLE IF NOT EXISTS `resource_category` (
  `Category_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Category` varchar(250) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `resource_category`
--

INSERT INTO `resource_category` (`Category_ID`, `Category`, `Description`) VALUES
(1, 'Animal Ministries', ''),
(2, 'Training', ''),
(3, 'NGOs', ''),
(4, 'Research Centres', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
