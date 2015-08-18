-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2013 at 06:59 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `socialnetwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_title` varchar(250) NOT NULL,
  `desc` varchar(250) NOT NULL,
  `uploader` varchar(250) NOT NULL,
  `DATE` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `album_title`, `desc`, `uploader`, `DATE`) VALUES
(10, 'krishna', 'god', 'sadhakbj', '2013-07-08'),
(11, 'Gopal', 'ram', 'sadhakbj', '2013-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `posted_to` varchar(255) NOT NULL,
  `DATE` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=142 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `body`, `posted_by`, `posted_to`, `DATE`) VALUES
(127, 70, 'ram', 'sadhakbj', 'njsubedi', '03 Jul 2013 at 08:11pm'),
(128, 70, 'i am thinking this only ', 'sadhakbj', 'njsubedi', '03 Jul 2013 at 08:30pm'),
(129, 71, 'oh Hi Ram K cha timro khabar ', 'sadhakbj', 'sadhakbj', '04 Jul 2013 at 08:40am'),
(130, 66, 'aaa', 'sadhakbj', 'sadhakbj', '06 Jul 2013 at 07:40am'),
(132, 65, 'ram krishna nai bhagwan hunuhuncha \r\n', 'sadhakbj', 'sadhakbj', '06 Jul 2013 at 07:58am'),
(136, 65, 'krishna \r\n', 'sadhakbj', 'sadhakbj', '06 Jul 2013 at 08:08am'),
(138, 58, 'yes with great efforts I have made this ', 'sadhakbj', 'ram01', '06 Jul 2013 at 08:49am'),
(140, 56, 'Hare Krishna', 'njsubedi', 'sadhakbj', '06 Jul 2013 at 10:10am'),
(141, 65, 'kajkj', 'sadhakbj', 'sadhakbj', '07 Jul 2013 at 01:26pm');

-- --------------------------------------------------------

--
-- Table structure for table `friendsys`
--

CREATE TABLE IF NOT EXISTS `friendsys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1` varchar(50) NOT NULL,
  `user2` varchar(50) NOT NULL,
  `1says` enum('0','1') NOT NULL,
  `2says` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `friendsys`
--

INSERT INTO `friendsys` (`id`, `user1`, `user2`, `1says`, `2says`) VALUES
(28, 'saugat01', 'ram01', '1', '1'),
(40, 'njsubedi', 'ajay01', '1', '1'),
(54, 'sadhakbj', 'njsubedi', '1', '1'),
(57, 'sadhakbj', 'ram01', '1', '1'),
(59, 'sadhakbj', 'ajay01', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user`) VALUES
(7, 57, 'sadhakbj'),
(12, 56, 'njsubedi'),
(13, 65, 'njsubedi'),
(16, 58, 'ram01'),
(18, 65, 'sadhakbj');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postedby` varchar(50) NOT NULL,
  `postedto` varchar(50) NOT NULL,
  `post` text NOT NULL,
  `DATE` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `postedby`, `postedto`, `post`, `DATE`) VALUES
(52, 'sadhakbj', 'sadhakbj', ' ok LINUX is looking at this post .. ok lets check it ', '2013-04-28'),
(53, 'ajay01', 'ajay01', 'life is rocking ....\r\n   you know ???', '2013-04-28'),
(55, 'sadhakbj', 'sadhakbj', ' balla balla chalyo yaar natra ta tension bhai sakya thyo ................ uff thanks god for saving me ', '2013-05-01'),
(56, 'njsubedi', 'sadhakbj', ' &lt;?php \r\necho $user;\r\n\r\n?&gt;', '2013-05-03'),
(57, 'sadhakbj', 'sadhakbj', ' something new on design i am really happy what is happening \r\n', '2013-05-06'),
(58, 'ram01', 'ram01', ' i am really happt that i got friender account ...........', '2013-05-06'),
(59, 'Oomang', 'Oomang', ' ksajbmnasbbc\r\n', '2013-05-12'),
(60, 'birat', 'birat', ' all the small things....blink 182<br />\r\n', '2013-06-28'),
(61, 'birat', 'birat', ' this is the new shit ', '2013-06-28'),
(62, 'sadhakbj', 'ashwin', ' Oh ashwin k cha timro khabar ............', '2013-06-28'),
(65, 'sadhakbj', 'ashwin', ' bijay\r\n\r\nkuikel', '2013-07-01'),
(76, 'sadhakbj', 'ashwin', ' lau ashwin ', '2013-07-07'),
(79, 'sadhakbj', 'sadhakbj', ' this is another final test', '07 Jul 2013 at 08:53pm'),
(80, 'njsubedi', 'njsubedi', ' this is my also test.......................', '07 Jul 2013 at 08:57pm');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_name` varchar(250) NOT NULL,
  `uploader` varchar(250) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `pvt_messages`
--

CREATE TABLE IF NOT EXISTS `pvt_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_from` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `msg_title` varchar(60) NOT NULL,
  `msg_body` text NOT NULL,
  `date` date NOT NULL,
  `opened` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `pvt_messages`
--

INSERT INTO `pvt_messages` (`id`, `user_from`, `user_to`, `msg_title`, `msg_body`, `date`, `opened`) VALUES
(21, 'sadhakbj', 'Oomang', 'No title', ' Oe k 6/', '2013-05-12', 'no'),
(36, 'ram01', 'sadhakbj', 'ok', 'bijaya yo just check ho hai ', '2013-06-26', 'yes'),
(38, 'sadhakbj', 'ram01', 'Re [ok]', ' huncha hajur ', '2013-07-04', 'yes'),
(41, 'sadhakbj', 'njsubedi', 'No title', ' ', '2013-07-07', 'no'),
(42, 'sadhakbj', 'njsubedi', 'No title', ' ', '2013-07-07', 'no'),
(43, 'sadhakbj', 'njsubedi', 'No title', ' ', '2013-07-07', 'no'),
(44, 'sadhakbj', 'njsubedi', 'No title', ' ', '2013-07-07', 'no'),
(45, 'sadhakbj', 'njsubedi', 'No title', ' ', '2013-07-07', 'no'),
(46, 'sadhakbj', 'njsubedi', 'No title', ' ', '2013-07-07', 'no'),
(47, 'sadhakbj', 'njsubedi', 'akjkaj', 'kjkjkj ', '2013-07-07', 'no'),
(48, 'sadhakbj', 'njsubedi', 'ad', ' ', '2013-07-07', 'no'),
(49, 'sadhakbj', 'njsubedi', 'No title', ' hello', '2013-07-07', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `sign_up_date` date NOT NULL,
  `activated` enum('0','1') NOT NULL,
  `bio` text NOT NULL,
  `imagelocation` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `sign_up_date`, `activated`, `bio`, `imagelocation`) VALUES
(15, 'sadhakbj', '     Bijayananda               ', '     Chaitanya', 'sadhakbj@gmail.com', '243bd1ce0387f18005abfc43b001646a', '0000-00-00', '0', '     hi i am bijayananda \r\nsrila prabhupada ki jay ...  Radhanath      \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'profilepic/sadhakbj/1004589_10152916541445508_773632716_n.jpg'),
(21, 'njsubedi', '  Nj       ', '  Subedi ', 'nj@njs.com.np', 'fc5e038d38a57032085441e7fe7010b0', '0000-00-00', '0', '  I love to love coding in php , android and many things so this is life * experience says        www.facebook.com   ', 'profilepic/njsubedi/14418_4136332649025_1755571109_n.jpg'),
(22, 'ajay01', '  Ajay  ', '  Kuikel', 'aj.kuikel@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '2013-07-03', '0', '   I am ajay ... this is my profile .. if you want be my friend then you can add me  ', 'profilepic/ajay01/one.jpg'),
(23, 'ram01', '  Ram   ', '  krishna', 'ram@gmail.com', 'c9a2c96cd599eca3ba0a2e2a471043e3', '0000-00-00', '0', '    i love to chant Hare Krishna Hare Krishna Krishna Krishna Hare Hare\r\nHare Rama Hare Rama Rama Rama Hare Hare ', 'img/one.jpg'),
(25, 'saugat01', 'Saugat', 'stha', 'saugat@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '0', '', 'img/one.jpg'),
(26, 'Oomang', '  Oomang  ', '  Dhakal', 'nad@kaskj.com', '7405821df328114393dc68e850f780f6', '0000-00-00', '0', '   Hi Im Oomang Dhakal .........................', 'img/one.jpg'),
(27, 'ashwin', 'ashwin', 'shrestha', 'meh_aswin@yahoo.com', '5d41402abc4b2a76b9719d911017c592', '0000-00-00', '0', '', 'profilepic/ashwin/551366_10152734853350375_136917613_n.jpg'),
(28, 'birat', 'Birat', 'Bade', 'badebirat@gmail.com', '290b113adc640c6de4c8af474aefbd67', '2013-06-28', '0', 'Please edit about you ', 'img/one.jpg'),
(29, 'ram.bdr', 'guru', ' ram', 'ram.bdr@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2013-07-01', '0', 'happy to write something about me yaar ...', 'img/one.jpg'),
(38, 'sadhakbj1111', 'bijaya', 'kuikel', 'sadhakbj@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '2013-07-08', '0', 'Write Something About You ! ', 'img/one.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
