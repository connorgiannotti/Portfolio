-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2017 at 10:12 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thunderboltmusic`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` text CHARACTER SET utf8mb4 NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `songs_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `songs_id`) VALUES
(1, 'dsdrsdrsersrsdfdfdgdfgdfg', 11, 13),
(2, 'sdfsdfsdfsdfsdfsdfsdfsdfsdfsdf', 11, 13);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `artist` varchar(50) NOT NULL,
  `album` varchar(50) NOT NULL,
  `album_cover` varchar(255) NOT NULL,
  `genres` enum('Pop','HipHop','RnB','Indie','Reggae','Freestyle') NOT NULL,
  `comments` varchar(1000) NOT NULL,
  `url` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `album_cover`, `genres`, `comments`, `url`, `date_added`) VALUES
(13, 'Crazy Brazy', 'A$AP MOB', 'Cozy Tapes Vol. 1:Friends', '5893e62841b0f.jpg', 'HipHop', '', 'https://www.youtube.com/embed/533N3fO63Tg', '2017-02-03 02:08:40'),
(14, 'Fake Love', 'Drake', 'More Life', '5893e692b24db.jpg', 'HipHop', '', 'https://www.youtube.com/embed/MtMfp2wMW3w', '2017-02-03 02:10:26'),
(15, 'X', '21 Savage & Metro Boomin', 'Savage', '5893e6e42e8d5.jpg', 'HipHop', '', 'https://www.youtube.com/embed/SpXw0qiy3Wo', '2017-02-03 02:11:48'),
(16, 'Black Beatles', 'Rae Sremmurd (Ft. Gucci Mane)', 'SremmLife 2', '5893e748e59d4.jpg', 'HipHop', '', 'https://www.youtube.com/embed/b8m9zhNAgKs', '2017-02-03 02:13:29'),
(17, '3005', 'Childish Gambino', 'Because the Internet', '5893e77e978a2.jpg', 'HipHop', '', 'https://www.youtube.com/embed/tG35R8F2j8k', '2017-02-03 02:14:22'),
(18, 'Bounce Back', 'Big Sean', 'I Decided', '5893e8ace2a38.jpg', 'HipHop', '', 'https://www.youtube.com/embed/phr1pOFK1V8', '2017-02-03 02:19:25'),
(19, 'Broccoli', 'D.R.A.M. (Ft. Lil Yachty)', 'Big Baby D.R.A.M.', '5893e9115e8e3.jpg', 'HipHop', '', 'https://www.youtube.com/embed/K44j-sb1SRY', '2017-02-03 02:21:05'),
(20, 'Man', 'Skepta', 'Konnichiwa', '5893e95d1b664.jpg', 'HipHop', '', 'https://www.youtube.com/embed/sOhxPhqzMwg', '2017-02-03 02:22:21'),
(21, 'Ps & Qs', 'Lil Uzi Vert', 'Lil Uzi Vert Vs. The World', '589fd2a831c85.jpg', 'HipHop', '', 'https://www.youtube.com/embed/x0fFzqX_Xgo', '2017-02-12 03:12:40'),
(22, 'Redbone', 'Childish Gambino', 'Awaken, My Love!', '589fd4273d7d5.jpg', 'Indie', '', 'https://www.youtube.com/embed/Kp7eSUU9oy8', '2017-02-12 03:19:03'),
(23, 'Love$ick', 'Mura Masa, A$AP Rocky', 'Love$ick', '589fd5e527001.jpg', 'Indie', '', 'https://www.youtube.com/embed/ZJM4AQSbZDk', '2017-02-12 03:26:29'),
(24, 'A$AP MOB Freestyle', 'A$AP MOB', '', '589fd8253a770.jpg', 'Freestyle', '', 'https://www.youtube.com/embed/_ZldaVyu164', '2017-02-12 03:36:05'),
(25, 'Childish Gambino Freestyle on Sway in the Morning ', 'Childish Gambino', '', '589fd9d0ca319.jpg', 'Freestyle', '', 'https://www.youtube.com/embed/NfM_fb1onoI', '2017-02-12 03:43:12'),
(26, 'Lil Dicky Freestyle on Sway In The Morning', 'Lil Dicky', '', '589fdb00508df.jpg', 'Freestyle', '', 'https://www.youtube.com/embed/1RZkIPlUosE', '2017-02-12 03:48:16'),
(27, 'Castle On The Hill', 'Ed Sheeran', 'Castle On The Hill', '589fde7bb1a91.jpg', 'Pop', '', 'https://www.youtube.com/embed/K0ibBPhiaG0', '2017-02-12 04:03:07'),
(28, 'Shape of You', 'Ed Sheeran', 'Shape of You', '589fdf0a8f9a3.jpg', 'Pop', '', 'https://www.youtube.com/embed/JGwWNGJdvx8', '2017-02-12 04:05:30'),
(29, 'Yeah', 'Usher', 'Confessions', '589fe1d86fa96.jpg', 'RnB', '', 'https://www.youtube.com/embed/GxBSyx85Kp8', '2017-02-12 04:17:28'),
(30, 'Buffalo Soldier', 'Bob Marley', 'Confrontation', '58a007171a66e.jpg', 'Reggae', '', 'https://www.youtube.com/embed/uMUQMSXLlHM', '2017-02-12 06:56:23'),
(31, 'One Love', 'Bob Marley', 'One Love: The Very Best of Bob Marley & The Wailer', '58a007953ac36.jpg', 'Reggae', '', 'https://www.youtube.com/embed/FTY8H7zjdtc', '2017-02-12 06:58:29'),
(32, 'Fergalicious ', 'Fergie', 'The Dutchess', '58a0082cd81ce.jpg', 'Pop', '', 'https://www.youtube.com/embed/5T0utQ-XWGY', '2017-02-12 07:01:00'),
(33, 'Hey Ya', 'OutKast', 'Speakerboxxx/The Love Below', '58a00940e4ff1.jpg', 'HipHop', '', 'https://www.youtube.com/embed/PWgvGjAhvIw', '2017-02-12 07:05:36'),
(34, 'Umbrella', 'Rihanna', 'Good Girl Gone Bad', '58a00a5f6553a.jpg', 'RnB', '', 'https://www.youtube.com/embed/CvBfHwUxHIk', '2017-02-12 07:10:23'),
(35, 'Party', 'Chris Brown', 'Party', '58a00b5233cd8.jpg', 'RnB', '', 'https://www.youtube.com/embed/Z9eMk051dYg', '2017-02-12 07:14:26'),
(36, 'Not Nice', 'PARTYNEXTDOOR', 'PartyNextDoor 3', '58a00bee76fdf.jpg', 'RnB', '', 'https://www.youtube.com/embed/iTno21crSsY', '2017-02-12 07:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(254) CHARACTER SET utf8mb4 NOT NULL,
  `username` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `privilege` enum('user','admin','moderate','banned') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `date_created`, `privilege`) VALUES
(2, 'gdjfghsd@m.com', 'dwdwdwe', '$2y$10$PhUiNwzOF50s9nItGmxPn.MA8xjktH4ZNTm9I1c1S/weiVwCulxgy', '2017-01-27 00:07:41', 'user'),
(3, 'kingcon88@gmail.com', 'cg', '$2y$10$ogPA5cYie.fruzSbwIVbvO/MRW6Rpqt.gH9tOfiei/HdxdkWmZ1bC', '2017-01-29 23:31:37', 'user'),
(5, 'oo@oo.com', 'oo', '$2y$10$Vh4oU1CIM4iquLW1XnBbNu/Ol4m1ipxYLyOZkYXI2kPdesW9H8nTC', '2017-01-29 23:52:04', 'user'),
(6, 'qw@qw.com', 'qw', '$2y$10$sgJMw7QUtxjok3lHDON95OkgG4spmMrWApEVlvA..0AAn.omOtwiO', '2017-01-30 00:04:29', 'user'),
(7, 'dfdfdf@m.com', 'dfdfdf', '$2y$10$ziLHllYLPIEyCfFplc3LKOik.kUA5dj8P9JhfSyyDtrjnLJqqRfxK', '2017-02-01 01:54:09', 'user'),
(8, 'hhh@m.com', 'hkkgh', '$2y$10$asiZ7xxELNS1pdljlIulvuMLeQdPBM6WIg4nC7Cjm3dlJg4MJbzya', '2017-02-01 01:57:06', 'user'),
(11, 'agga@gmail.com', 'gg', '$2y$10$Dau7wJQHbfegRyZ6ZmdNV.H/4/loUs3JOFDqlYqbXKx8cOLZ.6bNS', '2017-02-09 21:23:23', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `songs_id` (`songs_id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`songs_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
