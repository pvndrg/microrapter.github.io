-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2020 at 06:51 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `microrapter`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(250) NOT NULL,
  `when` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `file_id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `when` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`file_id`, `sender`, `receiver`, `name`, `when`) VALUES
(1, 'pravin@durge.com', 'pravin@durge.com', '2099098427.jpg', '2016-03-28 01:13:35'),
(2, 'aradhana@gmail.com', 'pravin@gmail.com', '6dc123acae84028d7dec13b6b3ebc2dd.jpg', '2016-03-28 05:14:13'),
(3, 'pravin@durge.com', 'shyam@gmail.com', '7e53e05378b8b8d43fea05079ab09ce8.jpg', '2016-03-28 06:32:25'),
(5, 'eshwarrake@gmail.com', 'pravin@durge.com', '5-895-coolcar2.jpg', '2016-03-28 07:03:39'),
(6, 'snehanagavelli45@gmail.com', 'pravin@durge.com', '5-895-coolcar2.jpg', '2016-03-28 07:22:23'),
(7, 'pravin@durge.com', 'shyam@gmail.com', '530323432.jpg', '2016-03-28 07:54:09'),
(8, 'pravin@durge.com', '', '', '2016-03-28 08:02:03'),
(9, 'pravin@durge.com', '', '5-895-coolcar2.jpg', '2016-03-28 08:03:17'),
(10, 'pravin@durge.com', 'pravin@durge.com', '2011 Honda CBR 250R 2.jpg', '2016-03-28 08:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `group_message`
--

CREATE TABLE `group_message` (
  `msg_id` int(8) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `group_msg` varchar(250) NOT NULL,
  `when` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_message`
--

INSERT INTO `group_message` (`msg_id`, `sender`, `receiver`, `group_msg`, `when`) VALUES
(4, 'aradhana@gmail.com', '', 'hi', '2016-03-28 05:14:28'),
(5, 'pravin@gmail.com', '', 'hello', '2016-03-28 05:16:59'),
(6, 'shyam@gmail.com', '', 'hi guys..', '2016-03-28 05:19:11'),
(7, 'pravin@durge.com', '', 'whats up', '2016-03-28 06:33:13'),
(8, 'eshwarrake@gmail.com', '', 'hello', '2016-03-28 07:03:53'),
(9, 'snehanagavelli45@gmail.com', '', 'hiiii\r\n', '2016-03-28 07:22:35'),
(10, 'pravin@durge.com', '', 'how are you sneha', '2016-03-28 07:23:25'),
(11, 'hamidsheikh85@yahoo.in', '', 'cool', '2016-03-28 07:37:15'),
(12, 'hamidsheikh85@yahoo.in', '', '', '2016-03-28 07:37:18'),
(13, 'pravin@durge.com', '', 'hii', '2016-03-28 07:54:25'),
(14, 'pravin@durge.com', '', 'hi tyuiop[]', '2016-03-28 08:02:47'),
(15, 'shyam@gmail.com', '', 'hi\r\n', '2016-03-29 05:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(8) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `personal_msg` varchar(250) NOT NULL,
  `group_msg` varchar(250) NOT NULL,
  `when` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `sender`, `receiver`, `personal_msg`, `group_msg`, `when`) VALUES
(31, 'pravin@gmail.com', 'shyam@gmail.com', 'hi.....', '', '2016-03-28 05:17:28'),
(32, 'pravin@gmail.com', 'shyam@gmail.com', 'how are you...?', '', '2016-03-28 05:18:10'),
(33, 'shyam@gmail.com', 'pravin@gmail.com', 'hello', '', '2016-03-28 05:19:40'),
(34, 'shyam@gmail.com', 'pravin@gmail.com', 'i am fine And you', '', '2016-03-28 05:19:57'),
(35, 'pravin@durge.com', 'shyam@gmail.com', 'hi', '', '2016-03-28 06:33:47'),
(36, 'eshwarrake@gmail.com', 'pravin@durge.com', 'hi', '', '2016-03-28 07:04:19'),
(37, 'pravin@durge.com', 'shyam@gmail.com', 'hi will sen you a image', '', '2016-03-28 07:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `day` int(2) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `sex` varchar(8) NOT NULL,
  `pic` longblob NOT NULL,
  `imageType` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `day`, `month`, `year`, `sex`, `pic`, `imageType`) VALUES
(4, 'pravin', 'durge', 'pravin@durge.com', 'pravin', 6, 1, 2006, 'male', 0x37656634393133396134336131373937633130653838323737636662626538632e6a7067, ''),
(5, 'shyam', 'sharma', 'shyam@gmail.com', 'shyam', 29, 6, 1998, ' male', 0x2d313939353730323831362e6a7067, ''),
(10, 'priyanka', 'matte', 'priyankamatte@gamil.com', '12345', 12, 8, 1998, ' female', '', ''),
(11, 'aradhana', 'prasad', 'aradhana@gmail.com', '12345', 5, 5, 1997, ' female', '', ''),
(12, 'eshwar', 'rake', 'eshwarrake@gmail.com', '8552801370', 11, 11, 1994, ' male', '', ''),
(13, 'sneha', 'nagavelli', 'snehanagavelli45@gmail.com', 'sneha', 13, 4, 1998, ' female', '', ''),
(14, 'sheikh', 'hamid2', 'hamidsheikh85@yahoo.in', '12345', 7, 7, 1997, ' male', '', ''),
(15, 'jitendra', 'sah', 'sonusah28@gmail.com', 'kitu@sah', 14, 9, 1993, ' male', '', ''),
(16, 'priya', 'shahu', 'priyashahu@gmail.com', '123', 30, 10, 1999, ' female', '', ''),
(17, 'Chhaya', 'prasad', 'chhaya@gmail.com', 'nemo', 7, 9, 1997, ' female', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `group_message`
--
ALTER TABLE `group_message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `group_message`
--
ALTER TABLE `group_message`
  MODIFY `msg_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
