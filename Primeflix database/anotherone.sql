-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 03:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anotherone`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addactor` (IN `name1` VARCHAR(99), IN `name2` VARCHAR(99), IN `name3` VARCHAR(99))  BEGIN
INSERT INTO actors(actorName) VALUES(name1);
INSERT INTO actors(actorName) VALUES(name2);
INSERT INTO actors(actorName) VALUES(name3);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertactor` (IN `aid1` INT(11), IN `aid2` INT(11), IN `aid3` VARCHAR(11), IN `tid` INT(11))  BEGIN
INSERT INTO actorjunction(tid,aid) VALUES (tid,aid1);
INSERT INTO actorjunction(tid,aid) VALUES (tid,aid2);
INSERT INTO actorjunction(tid,aid) VALUES (tid,aid3);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `actorjunction`
--

CREATE TABLE `actorjunction` (
  `tid` int(11) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actorjunction`
--

INSERT INTO `actorjunction` (`tid`, `aid`) VALUES
(18, 80),
(18, 78),
(18, 79),
(19, 27),
(19, 25),
(19, 26),
(20, 81),
(20, 83),
(20, 82),
(21, 81),
(21, 90),
(21, 83),
(22, 92),
(22, 93),
(22, 94),
(23, 97),
(23, 96),
(23, 95),
(24, 99),
(24, 100),
(24, 98),
(25, 61),
(25, 101),
(25, 102);

--
-- Triggers `actorjunction`
--
DELIMITER $$
CREATE TRIGGER `del` AFTER DELETE ON `actorjunction` FOR EACH ROW BEGIN
	DELETE FROM genrejunction WHERE genrejunction.tid = old.tid;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `aid` int(11) NOT NULL,
  `actorName` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`aid`, `actorName`) VALUES
(61, ''),
(80, 'Aaron Eckhart'),
(81, 'Al Pacino'),
(99, 'Anne Hathway'),
(77, 'asd'),
(27, 'Bob Gunton'),
(49, 'Brad Pitt'),
(78, 'Christian Bale'),
(75, 'das'),
(101, 'Daveigh Chase'),
(83, 'Diane Keaton'),
(47, 'Edward Norton'),
(46, 'Elijah Wood'),
(97, 'Ellen Page'),
(86, 'Gary Sinise'),
(79, 'Heath Ledger'),
(92, 'Henry Fonda'),
(100, 'Jessica Chastain'),
(96, 'Joseph Gordon-Levitt'),
(93, 'Lee J. Cobb'),
(48, 'Lee Van Cleef'),
(95, 'Leonardo DiCaprio'),
(82, 'Marlon Brando'),
(94, 'Martin Balsam'),
(98, 'Matthew McConaughey'),
(25, 'Morgan Freeman'),
(51, 'Orlando Bloom'),
(90, 'Robert De Niro'),
(85, 'Robin Wright'),
(76, 'sad'),
(102, 'Suzanne Pleshette'),
(26, 'Tim Robbins'),
(84, 'Tom Hanks');

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `did` int(11) NOT NULL,
  `directorName` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`did`, `directorName`) VALUES
(33, ''),
(36, 'Christopher Nolan'),
(35, 'dasd'),
(17, 'David Fincher'),
(37, 'Francis Ford Coppola'),
(9, 'Frank Darabont'),
(45, 'Hayao Miyazaki'),
(16, 'Peter Jackson'),
(42, 'Sidney Lumet'),
(38, 'Steven Spielberg');

-- --------------------------------------------------------

--
-- Table structure for table `genrejunction`
--

CREATE TABLE `genrejunction` (
  `tid` int(11) NOT NULL,
  `gid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genrejunction`
--

INSERT INTO `genrejunction` (`tid`, `gid`) VALUES
(18, 100040),
(18, 100023),
(18, 100020),
(19, 100028),
(19, 100023),
(19, 100020),
(20, 100028),
(20, 100023),
(20, 100020),
(21, 100023),
(21, 100020),
(21, 100028),
(22, 100028),
(22, 100023),
(22, 100020),
(23, 100040),
(23, 100039),
(23, 100042),
(24, 100040),
(24, 100039),
(24, 100042),
(25, 100039),
(25, 100047),
(25, 100048);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `gid` int(11) NOT NULL,
  `genre` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`gid`, `genre`) VALUES
(100028, ''),
(100040, 'Action'),
(100039, 'Adventure'),
(100047, 'Animation'),
(100023, 'Crime'),
(100020, 'Drama'),
(100048, 'Family'),
(100022, 'Fantasy'),
(100042, 'Sci-Fi');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `name` varchar(99) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(99) NOT NULL,
  `uname` varchar(99) NOT NULL,
  `pass` varchar(99) NOT NULL,
  `visits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`name`, `age`, `email`, `uname`, `pass`, `visits`) VALUES
('qwert', 1, 'qwe@ewqe.com', '123', '123', 1),
('Nachiket', 20, 'nachiket3598@gmail.com', 'admin', 'admin', 8),
('Dhanraj Jamdade', 20, 'dhanraj@gmail.com', 'foata', 'qwerty', 0),
('nachiket', 20, 'fiaoefeoih@l.com', 'nachi', 'password', 1),
('Nachiket', 20, 'nachiket3598@gmail.com', 'nachiket', 'password', 14),
('Nachiket', 20, '11111trojan11111@gmail.com', 'pepeg', 'pepeg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mylist`
--

CREATE TABLE `mylist` (
  `tid` int(11) NOT NULL,
  `uname` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mylist`
--

INSERT INTO `mylist` (`tid`, `uname`) VALUES
(18, '123'),
(18, 'nachi'),
(18, 'nachiket'),
(18, 'pepeg'),
(23, 'nachiket'),
(23, 'pepeg'),
(24, 'nachiket'),
(25, 'nachiket'),
(25, 'pepeg');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `tid` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `poster` varchar(99) NOT NULL,
  `bg` varchar(99) NOT NULL,
  `trailer` varchar(99) NOT NULL,
  `movie` varchar(99) NOT NULL,
  `year` varchar(4) NOT NULL,
  `did` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`tid`, `name`, `poster`, `bg`, `trailer`, `movie`, `year`, `did`) VALUES
(18, 'The Dark Knight', 'posters/4.jpg', 'bg/4.jpg', 'V75dMMIW2B4', 'Yee.mkv', '2008', 36),
(19, 'The Shawshank Redemption', 'posters/1.jpg', 'bg/1.jpg', '6hB3S9bIaco', 'Yee.mkv', '1994', 9),
(20, 'The Godfather', 'posters/2.jpg', 'bg/2.jpg', '5DO-nDW43Ik', 'Yee.mkv', '1972', 37),
(21, 'The Godfather: Part II', 'posters/3.jpg', 'bg/3.jpg', '9O1Iy9od7-A', 'Yee.mkv', '1974', 37),
(22, '12 Angry Men', 'posters/5.jpg', 'bg/5.jpg', '_13J_9B5jEk', 'Yee.mkv', '1957', 42),
(23, 'Inception', 'posters/20.jpg', 'bg/20.jpg', '8hP9D6kZseM', 'Yee.mkv', '2010', 36),
(24, 'Interstellar', 'posters/21.jpg', 'bg/21.jpg', 'zSWdZVtXT7E', 'Yee.mkv', '2014', 36),
(25, 'Spirited Away', 'posters/22.jpg', 'bg/22.jpg', 'nsrWpFmB2bQ', 'Yee.mkv', '2001', 45);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actorjunction`
--
ALTER TABLE `actorjunction`
  ADD KEY `tid` (`tid`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `actorName` (`actorName`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`did`),
  ADD UNIQUE KEY `directorName` (`directorName`);

--
-- Indexes for table `genrejunction`
--
ALTER TABLE `genrejunction`
  ADD KEY `tid` (`tid`) USING BTREE,
  ADD KEY `gid` (`gid`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`gid`),
  ADD UNIQUE KEY `genre` (`genre`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `mylist`
--
ALTER TABLE `mylist`
  ADD KEY `tid` (`tid`,`uname`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `did` (`did`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100049;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actorjunction`
--
ALTER TABLE `actorjunction`
  ADD CONSTRAINT `aid` FOREIGN KEY (`aid`) REFERENCES `actors` (`aid`),
  ADD CONSTRAINT `tid` FOREIGN KEY (`tid`) REFERENCES `titles` (`tid`);

--
-- Constraints for table `genrejunction`
--
ALTER TABLE `genrejunction`
  ADD CONSTRAINT `genrejunction_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `genres` (`gid`),
  ADD CONSTRAINT `genrejunction_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `titles` (`tid`);

--
-- Constraints for table `mylist`
--
ALTER TABLE `mylist`
  ADD CONSTRAINT `mylist_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `login` (`uname`),
  ADD CONSTRAINT `mylist_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `titles` (`tid`);

--
-- Constraints for table `titles`
--
ALTER TABLE `titles`
  ADD CONSTRAINT `did` FOREIGN KEY (`did`) REFERENCES `directors` (`did`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
