-- phpMyAdmin SQL Dump
-- version 5.0.4deb2~bpo10+1+bionic1
-- https://www.phpmyadmin.net/
--
-- localhost： localhost
-- Generated date： 2021-05-20 14:51:57
-- Server version： 5.7.34-0ubuntu0.18.04.1
-- PHP version： 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database： `final`
--

-- --------------------------------------------------------

--
-- Table structure `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump the data in the table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `username`) VALUES
(1, 'hello, world2', 'Neymar'),
(2, 'hello, world', 'Neymar'),
(3, 'awesome', 'Ronaldo'),
(4, 'awesome2', 'Ronaldo'),
(5, 'hello3', 'Ronaldo'),
(6, 'infs3202', 'Ronaldo'),
(7, 'cool', 'Ronaldo');

-- --------------------------------------------------------

--
-- Table structure `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `path` text NOT NULL,
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump the data in the table `files`
--

INSERT INTO `files` (`id`, `filename`, `path`, `username`) VALUES
(19, 'dog2.jpg', '/var/www/htdocs/final/uploads/dog2.jpg', 'Ronaldo'),
(21, 'rot_dog.jpg', '/var/www/htdocs/final/uploads/rot_dog.jpg', 'Ronaldo');

-- --------------------------------------------------------

--
-- Table structure `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure `post`
--

CREATE TABLE `post` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_title` text,
  `post_description` text,
  `author` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump the data in the table `post`
--

INSERT INTO `post` (`id`, `post_title`, `post_description`, `author`) VALUES
(1, 'title1', 'context1', 'Junyi Fan'),
(2, 'title2', 'context2', 'Junyi Fan'),
(3, 'title3', 'context3', 'Junyi Fan'),
(4, 'title4', 'context4', 'Junyi Fan'),
(5, 'title5', 'context5', 'Junyi Fan'),
(6, 'title6', 'context6', 'Junyi Fan'),
(7, 'title7', 'context7', 'Junyi Fan'),
(8, 'title8', 'context8', 'Junyi Fan'),
(9, 'title9', 'context9', 'Junyi Fan'),
(10, 'title10', 'context10', 'Junyi Fan'),
(11, 'title11', 'context11', 'Junyi Fan'),
(12, 'title12', 'context12', 'Junyi Fan'),
(13, 'title13', 'context13', 'Junyi Fan'),
(14, 'title14', 'context14', 'Junyi Fan'),
(15, 'title15', 'context15', 'Junyi Fan'),
(16, 'title16', 'context16', 'Junyi Fan'),
(17, 'title17', 'context17', 'Junyi Fan'),
(18, 'title18', 'context18', 'Junyi Fan'),
(19, 'title19', 'context19', 'Junyi Fan'),
(20, 'title20', 'context20', 'Junyi Fan'),
(21, 'title21', 'context21', 'Junyi Fan');

-- --------------------------------------------------------

--
-- Table structure `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USD',
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump the data in the table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `currency`, `status`) VALUES
(1, 'Benwei Lu', 'image1.jpg', 66.00, 'USD', '1'),
(2, 'PDD', 'image2.jpg', 66.00, 'USD', '1');

-- --------------------------------------------------------

--
-- Table structure `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump the data in the table `rating`
--

INSERT INTO `rating` (`rating_id`, `post_id`, `rating`) VALUES
(1, 6, 3),
(2, 6, 5),
(3, 6, 3),
(4, 5, 2),
(5, 5, 4),
(6, 5, 4),
(7, 5, 5),
(8, 5, 5),
(9, 5, 1),
(10, 3, 5),
(11, 4, 3),
(12, 4, 5),
(13, 4, 3),
(14, 4, 5),
(15, 1, 3),
(16, 1, 1),
(17, 1, 2),
(18, 1, 5),
(19, 1, 5),
(20, 2, 4);

-- --------------------------------------------------------

--
-- Table structure `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  `useremail` text,
  `verification_key` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump the data in the table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `useremail`, `verification_key`) VALUES
(0, 'Cat', '57abf7798b9dd804a07aa64f1', '872372710@qq.com', '09152e2e04f904ef4e71e027779613cc'),
(2, 'kaka', 'b3205cf67c40a0cbe772bda9e', 'fanjunyi1998@163.com', '452dfbc5601f382c705baf80a02cd927'),
(4, 'Neymar', 'bf8bfc7d67e9007d6a731a71f', 'fanjunyiwuxi@icloud.com', '3366cb8125f7b6b50cb0c163e74a5fa5'),
(1, 'Ronaldo', 'c4e47f942bbeb413c0a976670', 'junyi.fan@uqconnect.edu.au', '65fa76b75d649402b1e20ed59e572c2d');

--
-- Index of dump table
--

--
-- Table index `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_comment` (`username`);

--
-- Table index `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_upload` (`username`);

--
-- Table index `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Table index `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Table index `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Table index `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Table index `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Use AUTO_INCREMENT in the exported table
--

--
-- Use table AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Use table AUTO_INCREMENT `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Use table AUTO_INCREMENT `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Use table AUTO_INCREMENT `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Use table AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Use table AUTO_INCREMENT `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Limit exported tables
--

--
-- Restriction table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_user_comment` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Restriction table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `FK_user_upload` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
