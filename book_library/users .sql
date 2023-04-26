-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 05:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_book`
--

CREATE TABLE `create_book` (
  `id` bigint(20) NOT NULL,
  `book_id` bigint(20) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_description` text NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `copies_available` varchar(50) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `read_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_book`
--

INSERT INTO `create_book` (`id`, `book_id`, `author_name`, `book_name`, `book_description`, `img_url`, `copies_available`, `created_at`, `read_status`) VALUES
(3, 222, 'Stephen R. Covey', 'The 7 Habits of highly Effective People', '', '../upload_images/the7habits.jpg', '0', '2023-04-11 09:14:59', 'read'),
(4, 333, 'John R. Fanchi', 'Math refresher for scientists and engineers', 'Published in\r\nNew York\r\n\r\nEdition Notes\r\nIncludes bibliographical references (p. 249-252) and index.\r\n\"A Wiley-Interscience publication.\"\r\n\r\nClassifications\r\nDewey Decimal Class512/.1Library of CongressQA37.2 .F35 1997, QA37.2.F35 1997', '../upload_images/math_rah.jpg', '0', '2023-04-13 05:05:05', 'unread'),
(5, 121, 'Sarah J. Maas', 'A Court of Mist and Fury', 'Feyre has undergone more trials than one human woman can carry in her heart. Though she\'s now been granted the powers and lifespan of the High Fae, she is haunted by her time Under the Mountain and the terrible deeds she performed to save the lives of Tamlin and his people.\r\n\r\nAs her marriage to Tamlin approaches, Feyre\'s hollowness and nightmares consume her. She finds herself split into two different people: one who upholds her bargain with Rhysand, High Lord of the feared Night Court, and one who lives out her life in the Spring Court with Tamlin. While Feyre navigates a dark web of politics, passion, and dazzling power, a greater evil looms. She might just be the key to stopping it, but only if she can harness her harrowing gifts, heal her fractured soul, and decide how she wishes to shape her future-and the future of a world in turmoil.\r\n\r\nBestselling author Sarah J. Maas\'s masterful storytelling brings this second book in her dazzling, sexy, action-packed series to new heights.', '../upload_images/court of the mist.jpg', '1', '2023-04-14 05:15:25', 'read'),
(6, 131, 'T. J. Thompson', 'The Technology of Nuclear Reactor Safety - Vol. 2', 'These books are the product of Project SIFTOR (Safety Information for the Technology of Reactors), a coordinated effort sponsored by the U.S. Atomic Energy Commission to evaluate critically, organize, and generalize the growing body of information concerned with safety problems in reactor design and operation. Many leading authorities have contributed to this project, and their studies range in treatment from normal, day-to-day operation to catastrophic accidents. The history of specific accidents is reviewed, as is that of destructive tests (\"intentional accidents\"). The results of numerous theoretical and experimental studies of reactor excursions (\"run-aways\") are synthesized by mathematical models. The problems of containing or confining the energy and radioactive debris that would be released by a serious accident at a reactor installation are considered in detail, as are the safety problems associated with non-nuclear phases of reactor design: mechanical components, chemical reactions, fluid flow, and heat transfer.\r\n', '../upload_images/nuclear_reactor.jpg', '1', '2023-04-14 05:20:20', ''),
(7, 141, 'Dean Koontz', 'The Eyes Of Darkness', 'Tina Evans has spent a year suffering from incredible heartache since her son Danny\'s tragic death. But now, with her Vegas show about to premiere, Tina can think of no better time for a fresh start. Maybe she can finally move on and put her grief behind her.\r\n\r\nOnly there is a message for Tina, scrawled on the chalkboard in Danny\'s room: NOT DEAD. Two words that send her on a terrifying journey from the bright lights of Las Vegas to the cold shadows of the High Sierras, where she uncovers a terrible secret..', '../upload_images/eyes_of_darkness.jpg', '1', '2023-04-14 05:25:53', ''),
(8, 151, 'J.R.R. Tolkien', 'The Hobbit', 'This is the story of how a Baggins had an adventure, and found himself doing and saying things altogether unexpected...\r\n\r\nBilbo Baggins is a hobbit who enjoys a comfortable, unambitious life, rarely travelling further than the pantry of his hobbit-hole in Bag End. But his contentment is disturbed when the wizard, Gandalf, and a company of thirteen dwarves arrive on his doorstep to whisk him away on a journey \"there and back again\". They have a plot to raid the treasure hoard of Smaug the Magnificent, a large and very dangerous dragon...\r\n\r\nThe prelude to The Lord of the Rings, The Hobbit has sold many millions of copies since its publication in 1937, establishing itself as one of the most beloved and influential books of the twentieth century.', '../upload_images/hobbit.jpg', '1', '2023-04-14 05:33:08', 'unread'),
(9, 161, 'Stephen King', 'The Bachman Books', 'The name on the cover was \"Richard Bachman,\" but the imagination inside could only belong to one man--Stephen King. for years readers of these four novels wrote to \"Bachman,\" asking if the author was really Stephen King writing under a pseudonym. At last the secret is out--and so are these four spellbinding tales of future shock and suspense, now available in one volume.\r\n\r\nHere is rage, a story of stunning psychological horror about an \"extra\" ordinary high school student...a chilling glimpse into a future America where a macabre marathon, The Long Walk, is a contest with death...Roadwork, an eerie variation on the theme of \"Home Sweet Home\"...and a nightmare vision of a ghoulish game show. The Running Man, where you bet your life--literally.\r\n\r\nThe first two of these superlatively shocking novels were completed before Carrie was even begun. the others were written in between some of Stephen King\'s most popular bestsellers to date. And each of them is marked by the undeniable fascination of one of the most brilliant imaginations of our time.\r\n--jacket', '../upload_images/the_bachman_books.jpg', '1', '2023-04-15 10:17:37', ''),
(10, 171, 'Tom Clancy', 'Red rabbit', 'Jack Ryan\'s first days with the CIA may be the Pope\'s last days alive.\r\n\r\nLong before he was President or head of the CIA, before he fought terrorist attacks on the Super Bowl or the White House, even before a submarine named Red October made its perilous way across the Atlantic, Jack Ryan was an historian, teacher, and recent ex-Marine temporarily living in England while researching a book. A series of deadly encounters with an IRA splinter group had brought him to the attention of the CIA\'s Deputy Director, Vice Admiral James Greer—as well as his counterpart with the British SIS, Sir Basil Charleston—and when Greer asked him if he wanted to come aboard as a freelance analyst, Jack was quick to accept. The opportunity was irresistible, and he was sure he could fit it in with the rest of his work.\r\n\r\nAnd then Jack forgot all about the rest of his work, because one of his first assignments was to help debrief a high-level Soviet defector, and the defector told an amazing tale: Top Soviet officials, including Yuri Andropov, were planning to assassinate the Pope, John Paul II. Could it be true? As the days and weeks go by, Ryan must battle, first to try to confirm the plot, and then to prevent it, but this is a brave new world, and nothing he has done up to now has prepared him for the lethal game of cat-and-mouse that is the Soviet Union versus the United States. In the end, it will be not just the Pope\'s life but the stability of the Western world that is at stake. . . and it may already be too late for a novice CIA analyst to do anything about it.\r\n\r\n\"Clancy creates not only compelling characters but frighteningly topical situations and heart-stopping action,\" wrote The Washington Post about The Bear and the Dragon. \"Among the handful of superstars, Clancy still reigns, and he is not likely to be dethroned any time soon.\" These words were never truer than about the remarkable pages of his breathtaking new novel. This is Clancy at his best—and there is none better.', '../upload_images/red_rabbit.jpg', '1', '2023-04-15 10:22:04', '');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `issue_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `return_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL,
  `copies_available` int(50) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`id`, `book_id`, `user_name`, `user_email`, `book_name`, `issue_date`, `return_date`, `status`, `copies_available`) VALUES
(33, 333, 'nitin', 'nitinlingwal08@gmail.com', 'Math refresher for scientists and engineers', '2023-04-26 02:31:00', '2023-04-29 02:31:00', 'approved', 1),
(34, 222, 'student', 'student@gmail.com', 'The 7 Habits of highly Effective People', '2023-04-26 02:34:00', '2023-04-30 02:34:00', 'approved', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `id` bigint(20) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `email_token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `registration_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `user_fname`, `user_lname`, `user_email`, `user_password`, `user_role`, `email_token`, `status`, `registration_time`) VALUES
(19, 'user', 'admin', 'useradmin@gmail.com', '$2y$10$kNy4Z6A5P.KKkzbjGVrkuezbS8e6R3H1grfXcNIbuItt9N81FvehG', 'Reader', '6bfee7c178032624c8ec1f5935a52c7b', 'unverified', '2023-04-10 21:48:25'),
(21, 'admin', 'abc', 'admin@gmail.com', '$2y$10$ijNQMApv3KnKJk/UYeMs1O0cKrlPReTKnykeSQmnBo6xWhnE0Pq6W', 'Admin', '99d982380cb214927c58ad1165aa65bb', 'verified', '2023-04-14 07:31:59'),
(24, 'student', 'user', 'student@gmail.com', '$2y$10$.UBAiEfMfYtcYd1C.aQcfuQYjTOaS3.zrKGOmaYbjg4ssKtw7zaWi', 'Reader', '0b430c97c5e9e7f2e7f660cc1beaf546', 'verified', '2023-04-14 12:00:03'),
(26, 'nitin', 'Lingwal', 'nitinlingwal91@gmail.com', '$2y$10$hy3igQhSwyHiHT48khFcGeEq30QxNARwg1NOpkjX11tcwrEJz1gh2', 'Admin', 'd51117767a72f836a20fa37b5c8b1477', 'verified', '2023-04-14 12:34:43'),
(48, 'nitin', 'Lingwal', 'nitinlingwal08@gmail.com', '$2y$10$GhtmmYVleheGGwcB4Bwsu.QfOcCdp9G2yHNkUbQCoo7SaWeUkDWmW', 'Reader', 'f8ff734e10c1f7effff956fda8bb36ec', 'verified', '2023-04-21 07:58:37'),
(52, 'uday', 'shetty', 'uday@gmail.com', '$2y$10$rMjqbhldDk78oOw7LabD8OJ1voTd/AE295zEvT.JRuWGZEkZMN6Oi', 'Reader', '6a095c0e52987a325bf59cf4f7ca1ce0', 'unverified', '2023-04-22 07:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `book_id` bigint(20) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `book_id`, `author_name`, `book_name`, `user_email`, `img_url`, `status`) VALUES
(4, 222, 'Stephen R. Covey', 'The 7 Habits of highly Effective People', 'student@gmail.com', '../upload_images/the7habits.jpg', 'wishlisted'),
(6, 222, 'Stephen R. Covey', 'The 7 Habits of highly Effective People', 'nitinlingwal08@gmail.com', '../upload_images/the7habits.jpg', 'wishlisted'),
(8, 333, 'John R. Fanchi', 'Math refresher for scientists and engineers', 'nitinlingwal08@gmail.com', '../upload_images/math_rah.jpg', 'wishlisted'),
(11, 121, 'Sarah J. Maas', 'A Court of Mist and Fury', 'student@gmail.com', '../upload_images/court of the mist.jpg', 'wishlisted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create_book`
--
ALTER TABLE `create_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `create_book`
--
ALTER TABLE `create_book`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
