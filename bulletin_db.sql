-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2017 at 08:01 PM
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
  `name` varchar(60) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` varchar(20) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `body_description` varchar(255) NOT NULL,
  `due_date` varchar(20) DEFAULT NULL,
  `contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID`, `type`, `name`, `date`, `category`, `occupation`, `body_description`, `due_date`, `contact`) VALUES
(1, 'offering', 'Brandon', '0000-00-00 00:00:00', 'Travel', 'Travel Agent', 'a vacation planned.', '', 'bgrant@me.com'),
(2, 'seeking', 'Brittany', '0000-00-00 00:00:00', 'Travel', 'Travel Agent', 'planning my honeymoon', '2017-05-19', 'beep@me.com'),
(3, 'seeking', 'Brittany', '0000-00-00 00:00:00', 'Real Estate', 'Broker', 'managing an apartment complex', '2017-05-03', 'beep@me.com'),
(4, 'seeking', 'Brittany', '0000-00-00 00:00:00', 'Financial', 'CPA', 'filing my taxes', '2017-07-01', 'beep@me.com'),
(5, 'offering', 'Brittany', '0000-00-00 00:00:00', 'Household', 'House Cleaner', 'there house cleaned', '', 'beep@me.com'),
(6, 'offering', 'Brittany', '0000-00-00 00:00:00', 'Household', 'Plumber', 'a leaky sink fixed.', '', 'beep@me.com'),
(7, 'offering', 'Debra', '0000-00-00 00:00:00', 'Pet', 'Dog Walker', 'their pets walked.', '', 'dd@me.com'),
(8, 'seeking', 'Debra', '0000-00-00 00:00:00', 'Creative', 'Designer', 'created a company logo', '2017-05-12', 'dd@me.com'),
(9, 'offering', 'Katherine', '0000-00-00 00:00:00', 'Therapeutic', 'Masseuse', 'massage therapy', '', 'ks@me.com'),
(10, 'seeking', 'Katherine', '0000-00-00 00:00:00', 'Education', 'Math Tutor', 'linear algebra', '2017-05-26', 'ks@me.com'),
(11, 'seeking', 'Katherine', '0000-00-00 00:00:00', 'Education', 'English Tutor', 'annotating Dante''s Inferno', '2017-05-23', 'ks@me.com'),
(12, 'offering', 'Chloe', '0000-00-00 00:00:00', 'Education', 'Math Tutor', 'help with calculus and linear algebra.', '', 'cs@me.com'),
(13, 'seeking', 'Chloe', '0000-00-00 00:00:00', 'Software Development', 'Andriod Developer', 'a new app idea', '2017-06-16', 'cs@me.com'),
(14, 'offering', 'Chloe', '0000-00-00 00:00:00', 'Financial', 'CPA', 'help filing for taxes and refunds.', '', 'cs@me.com'),
(15, 'offering', 'Tyler', '0000-00-00 00:00:00', 'Medical/Health', 'Chiropractor', 'their bodies aligned', '', 'tr@me.com'),
(16, 'seeking', 'Tyler', '0000-00-00 00:00:00', 'Pet', 'Dog Walker', 'walking my puppy, April', '2017-05-25', 'tr@me.com'),
(17, 'offering', 'Brittany', '0000-00-00 00:00:00', 'Career/Job', 'Recruiter', 'a job in human resources', '', 'beep@me.com'),
(18, 'seeking', 'Brittany', '0000-00-00 00:00:00', 'Pet', 'Dog Walker', 'letting my dog, Joe, out in the afternoons.', '2017-05-12', 'beep@me.com'),
(19, 'seeking', 'Brittany', '0000-00-00 00:00:00', 'Real Estate', 'Real Estate Agent', 'selling my house', '2017-05-03', 'beep@me.com'),
(20, 'offering', 'Brittany', '0000-00-00 00:00:00', 'Beauty', 'Makeup Artist', 'makeup done for special occassions', '', 'beep@me.com'),
(21, 'seeking', 'Kyle', '0000-00-00 00:00:00', 'Education', 'Math Tutor', 'my calculus course', '2017-05-19', 'kk@gmail.com'),
(22, 'offering', 'Saul', '0000-00-00 00:00:00', 'Legal', 'Lawer', 'the best legal help that legal or illegal money can buy', '', 'saul@bettercallsaul.'),
(25, 'offering', 'Austin', '0000-00-00 00:00:00', 'Software Development', 'Developer', 'java code', '', 'am@me.com');

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
(10, 'Barb', 'Simpson', 'bsimp@yahoo.com', '$2y$10$bLBIhNFRrRs1s2J6Du0MZOcpG3limfLt8ZS/18ByT5ZFp3YHI55yq'),
(11, 'Brittany', 'Paielli', 'bmpaielli@gmail.com', '$2y$10$KCZrbElBO/2KpgJs.8Ir3eqrYy5ANduw97L8Z.jsflCgm40bC2OZy'),
(12, 'Bill', 'O&lt;&gt;', 'bill@me.com', '$2y$10$Bk1AOpWTlyZifb8ztN0AE.q8ZZFLFMFpYQCHiXwNpfSXmmMIYCs/y'),
(13, 'Brittany', 'P', 'b@me.com', '$2y$10$zF9awIr6.jntfL2ahupNxefK2w2vODy/LlVybSKQ2Z280LhF5x2m6'),
(14, 'Brit', 'P', 'bp@me.com', '$2y$10$h9B8kOoLtxzWeLVsiJTyaekdwcdHqjm/swHR46Qo924mzCFgz4V02'),
(15, 'Brittany', 'P', 'beep@me.com', '$2y$10$E9Pf3HabCzaKghVTDGNiB.TXBACkADoGQHNX7YDOFQY7FT/X0kQbC'),
(16, 'Taylor', 'Peee', 'tp@me.com', '$2y$10$m9X2h.Kqo5t/HMy2quV3i./0xykXvqwwnR.yvlA1/BWOY8t6lKnau'),
(17, 'j', 'p', 'joo@me.com', '$2y$10$9M2aSEn1YEJnNvneA2tRgOG4bYHYIdYKgtAQVYhMEy5NBO7ie.Ekm'),
(18, 'Kate', 'L', 'kl@me.com', '$2y$10$kCGWFCSiuS6FuhluLK729uPcE8QzU0o3YW9EhhifYZCSIDjCnOzLO'),
(19, 'Barry', 'Goldwater', 'Barry@gmail.com', '$2y$10$d1G5GWaIfHHWze0a1jGQh.3SKdXJ2niZZ7f3Xpm3nOIwtngc/cJYe'),
(20, 'Sandra', 'OConner', 'sandy@gmail.com', '$2y$10$n4WqbDiucLf638.a0n9B8eNostYnW1F3qlgr3PKB6st9MTfd6QDGW'),
(21, 'Katy', 'Perry', 'kp@gmail.com', '$2y$10$Ugtpngf69PJEZNAYoc9sKOpyZ.h8hfhwWjm05KLRWiv4pQzvHD0Xe'),
(22, 'Kayne', 'West', 'kw@me.com', '$2y$10$i9dB1xjVZyIA3JloVP33G.pB3kRvgaQULgDwLAzHEDO8SFCmnb.Jm'),
(23, 'Brittany', 'Paielli', 'brittanypaielli@email.arizona.ed', '$2y$10$xxtzrKK926wQBKoDX8165./tAIPkC9FhxEo8/WWnJI0.HakoTfpFG'),
(24, 'Brandon', 'Grant', 'bgrant@me.com', '$2y$10$.7yERRQ64jc4rQXLQ8S9zu7HX3aTYD9XksZD9vt0ZbhRalFY7fFoy'),
(25, 'Debra', 'Dee', 'dd@me.com', '$2y$10$.jzGEe9FhqR3PE4trb628OE9UmEBDIK2uEIxKt2t5obxbngYz0IQC'),
(26, 'Katherine', 'Shrine', 'ks@me.com', '$2y$10$IvdvMGgTCVlEENvd31Qmf.tgAj4cdZNI3K2ct6R51IX1QFkMhUce2'),
(27, 'Chloe', 'Sea', 'cs@me.com', '$2y$10$zkZ9QWKPKV3Kv9RG/YP86.8JcagHyFWHwcDlecPspcPrRbCDvmjHu'),
(28, 'Tyler', 'Richardson', 'tr@me.com', '$2y$10$KDOTOC3uxhxcSztTGd2lR.BpYpqhPZtAirbDzdRdK53Mwsrg2DfNm'),
(29, 'Kyle', 'Kouch', 'kk@gmail.com', '$2y$10$H1SwmzRxC8O8wDDdQ.hSgOozXOk.LUQ97p9DapROjfbdpyI3AmYQu'),
(30, 'Saul', 'Goodman', 'saul@bettercallsaul.com', '$2y$10$hD3WCU4QulCY3Uwio6wVl.EEeoThWBVp.QJ/uRW0WLELHEvMo5R8.'),
(31, 'Rick', 'Mercer', 'rmercer@cs.arizona.edu', '$2y$10$wsXWK0F3hk5sFqVbMdoEmu/EX9VhKBKJtA4imh8jNgeENpMnSNLzK'),
(32, 'Austin', 'M', 'am@me.com', '$2y$10$.BRIAXdDcLKVl4TTPNa5EeRYRMNjKotCF9rZFbWpKM.sFGnkkOgom');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
