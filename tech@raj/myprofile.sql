-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql211.epizy.com
-- Generation Time: May 29, 2022 at 06:30 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_29543643_myprofile`
--

-- --------------------------------------------------------

--
-- Table structure for table `cover_pics`
--

CREATE TABLE `cover_pics` (
  `id` int(255) NOT NULL,
  `cover_pic` varchar(155) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cover_pics`
--

INSERT INTO `cover_pics` (`id`, `cover_pic`) VALUES
(1, '3D Boat Lake Desktop Wallpapers.jpg'),
(2, '3D Eye Desktop Wallpapers.jpg'),
(3, '3D Monster.jpg'),
(5, '6. Bridge.jpg'),
(6, '7. Starlight.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hired_datas`
--

CREATE TABLE `hired_datas` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(55) NOT NULL,
  `type` varchar(55) NOT NULL,
  `mobno` varchar(14) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hired_datas`
--

INSERT INTO `hired_datas` (`id`, `title`, `description`, `address`, `type`, `mobno`) VALUES
(18, 'This is my first project. wish me best.', 'i want to build a responsive and dynamic based website.', 'gaur, rautahat, nepal', 'Organisational', '875865898');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(255) NOT NULL,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` int(2) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `mobno` varchar(14) DEFAULT NULL,
  `token` varchar(155) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstname`, `lastname`, `email`, `pass`, `role`, `profile_pic`, `mobno`, `token`) VALUES
(11, 'Raju', 'Jha', 'raj1215gotech@Raj.com', '$2y$10$hHtCdtxsTF0jIlY4yxJyLe.zjpkvVu5aSenfXrPv999/oRuCdWNeC', 1, 'profile3.jpg', '9865420342', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `where_from` int(255) NOT NULL,
  `where_to` int(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `display_time` varchar(155) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `where_from`, `where_to`, `time`, `display_time`) VALUES
(18, 'hey Raju', 18, 9, '2021-08-16 1629083954', '16-08-2021 05:19:14'),
(9, 'hey suman', 9, 18, '2021-08-16 1629084003', '16-08-2021 05:20:03'),
(18, 'hey 2nd', 18, 9, '2021-08-16 1629084518', '16-08-2021 05:28:38'),
(9, 'hey 2nd', 9, 18, '2021-08-16 1629084534', '16-08-2021 05:28:54'),
(18, 'hahaaa', 18, 9, '2021-08-16 1629098600', '16-08-2021 09:23:20'),
(9, 'lets chek', 9, 18, '2021-08-16 1629099625', '16-08-2021 09:40:25'),
(9, 'check', 9, 18, '2021-08-16 1629099649', '16-08-2021 09:40:49'),
(9, '', 9, 18, '2021-08-16 1629099846', '16-08-2021 09:44:06'),
(18, '', 18, 9, '2021-08-16 1629099893', '16-08-2021 09:44:53'),
(18, 'last', 18, 9, '2021-08-16 1629100186', '16-08-2021 09:49:46'),
(18, 'something', 18, 9, '2021-08-18 1629257986', '18-08-2021 05:39:46'),
(18, 'something more', 18, 9, '2021-08-18 1629258012', '18-08-2021 05:40:12'),
(18, 'checking', 18, 9, '2021-08-18 1629258021', '18-08-2021 05:40:21'),
(9, 'whats up', 9, 18, '2021-08-18 1629258083', '18-08-2021 05:41:23'),
(9, 'testing more', 9, 18, '2021-08-18 1629258103', '18-08-2021 05:41:43'),
(18, 'I think this one is better than previous one', 18, 9, '2021-08-18 1629258157', '18-08-2021 05:42:37'),
(9, 'Yes i think so', 9, 18, '2021-08-18 1629258183', '18-08-2021 05:43:03'),
(9, 'This one is good', 9, 18, '2021-08-18 1629258216', '18-08-2021 05:43:36'),
(18, 'Yaa its perfect than privious one', 18, 9, '2021-08-18 1629258250', '18-08-2021 05:44:10'),
(18, 'this is another one', 18, 9, '2021-08-18 1629258339', '18-08-2021 05:45:39'),
(9, 'What r u thinking about', 9, 18, '2021-08-18 1629258382', '18-08-2021 05:46:22'),
(18, 'i think this one is also good', 18, 9, '2021-08-18 1629258405', '18-08-2021 05:46:45'),
(18, 'check some more', 18, 9, '2021-08-18 1629258415', '18-08-2021 05:46:55'),
(18, 'This is again another one', 18, 9, '2021-08-18 1629258485', '18-08-2021 05:48:05'),
(9, 'hows it?', 9, 18, '2021-08-18 1629258522', '18-08-2021 05:48:42'),
(9, 'This is last one out of it', 9, 18, '2021-08-18 1629258613', '18-08-2021 05:50:13'),
(9, 'Hows that', 9, 18, '2021-08-18 1629258631', '18-08-2021 05:50:31'),
(18, 'I think each one is similar except first one', 18, 9, '2021-08-18 1629258700', '18-08-2021 05:51:40'),
(9, 'yes i think so', 9, 18, '2021-08-18 1629258715', '18-08-2021 05:51:55'),
(9, 'I applied first one.', 9, 18, '2021-08-18 1629258938', '18-08-2021 05:55:38'),
(9, 'Its ok', 9, 18, '2021-08-18 1629258946', '18-08-2021 05:55:46'),
(18, 'Yes done', 18, 9, '2021-08-18 1629258965', '18-08-2021 05:56:05'),
(11, 'hey suman', 11, 0, '2021-08-29 1630238424', '29-08-2021 08:00:24'),
(11, 'I have to say something', 11, 0, '2021-08-29 1630238453', '29-08-2021 08:00:53'),
(18, 'Hey raj', 18, 11, '2021-08-29 1630238701', '29-08-2021 08:05:01'),
(18, 'What going wrong', 18, 11, '2021-08-29 1630238749', '29-08-2021 08:05:49'),
(11, 'I unable to undeerstand what hell is going!', 11, 18, '2021-08-29 1630238839', '29-08-2021 08:07:19'),
(18, 'Find solution soon', 18, 11, '2021-08-29 1630239032', '29-08-2021 08:10:32'),
(11, 'dont worry i can resolve it soon', 11, 18, '2021-08-29 1630239473', '29-08-2021 08:17:53'),
(18, 'Hm do it', 18, 11, '2021-08-29 1630239493', '29-08-2021 08:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `profile_users`
--

CREATE TABLE `profile_users` (
  `id` int(255) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `token` varchar(155) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_users`
--

INSERT INTO `profile_users` (`id`, `firstname`, `lastname`, `email`, `pass`, `profile_pic`, `token`) VALUES
(18, 'Suman', 'Jha', 'suman123@gmail.com', '$2y$10$UrpRywJYhUnbDlhzIP./MeCrIH/fxPPBukwVwsarOOqN/eYoJQ2xu', 'IMG_20181114_130057.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(255) NOT NULL,
  `title` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL,
  `folder` varchar(55) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `folder`, `file`) VALUES
(3, 'A simple mini car game with javascript.', 'Checkout and play, we can say that its awesome. What you think about?', 'Car_Game', 'sublime.html');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cover_pics`
--
ALTER TABLE `cover_pics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_users`
--
ALTER TABLE `profile_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cover_pics`
--
ALTER TABLE `cover_pics`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profile_users`
--
ALTER TABLE `profile_users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
