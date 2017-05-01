-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2017 at 06:33 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bulletin_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `body_description` varchar(255) NOT NULL,
  `due_date` varchar(20) DEFAULT NULL,
  `contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID`, `type`, `user_id`, `date`, `location`, `category`, `body_description`, `due_date`, `contact`) VALUES
(1, 'Offering', 2, '2017-04-25 21:30:34', 'Phoenix', 'BabySitting', 'Looking to babysit', 'March 2, ', '60288888');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`ID`, `first_name`, `last_name`, `email`, `password`) VALUES
(2, 'Bart', 'Simpson', 'bsimpson@me.com', '$2y$10$XqcwIxN7af9Hsx0sO3EoC.CSthCpE5DdwsADwaH78VtG8AlqvTqx6'),
(3, 'Brittany', 'Do', 'b@yahoo.com', '$2y$10$wF6fRHDGnpU49/HDuZFpFeAfrQT/ppFziEyxmXRNbYGSVAjlwwxD6'),
(4, 'Lisa', 'Simpson', 'lsimp@me.com', '$2y$10$L82eLfHPI6Vc5jr.Pn5ljeCAg5NQzNSwZaxQKIkR.1O8HL1CQ0Ie2'),
(5, 'Mom', 'Jo', 'mj@me.com', '$2y$10$FdO9HkSgep08/orvKKGSQ.6lKBtrMr3hypOyKdgeHkIz6H8v4HWfq'),
(6, 'Bill', '&lt;script&gt;', 'bo@gmail.com', '$2y$10$uvZTIvES42EngNskoLNeeeEyVokBuoQMSYAGE7PwvAhlwB3vHF/va'),
(7, '&lt;Cotten Head&gt;', 'Jo', 'j@me.com', '$2y$10$JQFxMBPNTGkjGUZ6XJ.Z8ejsZD0Zlpq3e90sLHeHetEDDlcQpAGJi'),
(8, 'Homer', 'Simpson', 'hsimpson@me.com', '$2y$10$9zd3Na3Jx4BzlmL8sFVlAuc6oRxT.PgvUh.0hmXrFoWbk3TnatRVO'),
(9, 'Bob', 'Burger', 'bb@me.com', '$2y$10$vRx.DhLjFPoeMDm5htMtyOjPw6k4HFejBvDe.XZmHjBqLQ9O7nZru'),
(10, 'Barb', 'Simpson', 'bsimp@yahoo.com', '$2y$10$bLBIhNFRrRs1s2J6Du0MZOcpG3limfLt8ZS/18ByT5ZFp3YHI55yq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
