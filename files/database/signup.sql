-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 05:43 PM
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
-- Database: `signup`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_data`
--

CREATE TABLE `book_data` (
  `id` bigint(20) NOT NULL,
  `book_id` bigint(20) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_description` text NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_data`
--

INSERT INTO `book_data` (`id`, `book_id`, `author_name`, `book_name`, `book_description`, `img_url`, `created_at`) VALUES
(28, 112, 'C. S. Lewis.', 'The Chronicles of Narnia', 'The Chronicles of Narnia is a series of seven high fantasy novels by British author C. S. Lewis. Illustrated by Pauline Baynes and originally published between 1950 and 1956, The Chronicles of Narnia has been adapted for radio, television, the stage, film and video games. The series is set in the fictional realm of Narnia, a fantasy world of magic, mythical beasts and talking animals. It narrates the adventures of various children who play central roles in the unfolding history of the Narnian world. Except in The Horse and His Boy, the protagonists are all children from the real world who are magically transported to Narnia, where they are sometimes called upon by the lion Aslan to protect Narnia from evil. The books span the entire history of Narnia, from its creation in The Magician\'s Nephew to its eventual destruction in The Last Battle.', 'images/narnia.jpg', '2023-03-24 18:06:02'),
(29, 113, 'J.R.R. Tolkien', 'The Two Towers (The Lord of the Rings)', 'As Frodo and Sam leave, a band of orcs captures Merry and Pippin and kills Boromir. Aragorn, Legolas, and Gimli decide to let the Ringbearer go and instead rescue Merry and Pippin. Aragorn, Legolas, and Gimli pursue the orcs as they run across the fields of Rohan toward Saruman\'s fortress at Isengard. They find evidence that the orcs of Sauron and Saruman have quarreled and that either one hobbit is still alive, but they begin to lose hope as they fall farther and farther behind. After three days of running with little rest, they meet a troop of the riders of Rohan. The horsemen\'s leader, Éomer, informs the trio that the orcs were destroyed on the edge of Fangorn forest, with no survivors. He lends them horses to continue the pursuit, but offers little hope that the hobbits escaped the battle.', 'images/the_two_tower.jpg', '2023-03-24 18:10:57'),
(31, 111, 'Matt Ridley', 'How Innovation Works', 'Innovation is the main event of the modern age, the reason we experience both dramatic improvements in our living standards and unsettling changes in our society. Forget short-term symptoms like Donald Trump and Brexit, it is innovation that will shape the twenty-first century. Yet innovation remains a mysterious process, poorly understood by policy makers and businessmen alike.\r\n\r\nMatt Ridley argues that we need to see innovation as an incremental, bottom-up, fortuitous process that happens as a direct result of the human habit of exchange, rather than an orderly, top-down process developing according to a plan. Innovation is crucially different from invention, because it is the turning of inventions into things of practical and affordable use to people. It speeds up in some sectors and slows down in others. It is always a collective, collaborative phenomenon, involving trial and error, not a matter of lonely genius. It happens mainly in just a few parts of the world at any one time. It still cannot be modeled properly by economists, but it can easily be discouraged by politicians. Far from there being too much innovation, we may be on the brink of an innovation famine.', 'images/how_Inovation_work.jpg', '2023-03-24 23:15:53'),
(46, 115, 'George R. R. Martin', 'A Game of Thrones', 'Long ago, in a time forgotten, a preternatural event threw the seasons out of balance. In a land where summers can last decades and winters a lifetime, trouble is brewing. The cold is returning, and in the frozen wastes to the north of Winterfell, sinister and supernatural forces are massing beyond the kingdom’s protective Wall. At the center of the conflict lie the Starks of Winterfell, a family as harsh and unyielding as the land they were born to. Sweeping from a land of brutal cold to a distant summertime kingdom of epicurean plenty, here is a tale of lords and ladies, soldiers and sorcerers, assassins and bastards, who come together in a time of grim omens.\r\n\r\nHere an enigmatic band of warriors bear swords of no human metal; a tribe of fierce wildlings carry men off into madness; a cruel young dragon prince barters his sister to win back his throne; and a determined woman undertakes the most treacherous of journeys. Amid plots and counterplots, tragedy and betrayal, victory and terror, the fate of the Starks, their allies, and their enemies hangs perilously in the balance, as each endeavors to win that deadliest of conflicts: the game of thrones.', 'images/gamesofthrons.jpg', '2023-03-27 20:14:56'),
(48, 116, 'Morgan Housel', 'The Psychology of Money', 'Timeless lessons on wealth, greed, and happiness doing well with money isn’t necessarily about what you know. It’s about how you behave. And behavior is hard to teach, even to really smart people. How to manage money, invest it, and make business decisions are typically considered to involve a lot of mathematical calculations, where data and formulae tell us exactly what to do. But in the real world, people don’t make financial decisions on a spreadsheet. They make them at the dinner table, or in a meeting room, where personal history, your unique view of the world, ego, pride, marketing, and odd incentives are scrambled together. In the psychology of money, the author shares 19 short stories exploring the strange ways people think about money and teaches you how to make better sense of one of life’s most important matters.', 'images/money.jpg', '2023-03-27 20:17:22'),
(49, 117, 'Eckhart Tolle', 'The power of now', 'Eckhart Tolle has emerged as one of today\'s most inspiring teachers. In The Power of Now, already a worldwide bestseller, the author describes his transition from despair to self-realization soon after his 29th birthday. Tolle took another ten years to understand this transformation, during which time he evolved a philosophy that has parallels in Buddhism, relaxation techniques, and meditation theory but is also eminently practical. In The Power of Now he shows readers how to recognize themselves as the creators of their own pain, and how to have a pain-free existence by living fully in the present. Accessing the deepest self, the true self, can be learned, he says, by freeing ourselves from the conflicting, unreasonable demands of the mind and living \"present, fully, and intensely, in the Now.\"\r\n\r\n', 'images/the power of now.jpg', '2023-03-27 20:19:39'),
(50, 118, 'Cal Newport', 'Deep Work Rules for Focused Success in a Distracted World', 'Deep work is the ability to focus without distraction on a cognitively demanding task. It\'s a skill that allows you to quickly master complicated information and produce better results in less time. Deep work will make you better at what you do and provide the sense of true fulfillment that comes from craftsmanship. In short, deep work is like a super power in our increasingly competitive twenty-first century economy. And yet, most people have lost the ability to go deep-spending their days instead in a frantic blur of e-mail and social media, not even realizing there\'s a better way.', 'images/deep_thinking.jpg', '2023-03-27 20:23:08'),
(51, 119, 'Douglas Lackey', 'The ethics of war and peace', '', 'images/warandpeace.jpg', '2023-03-27 20:25:45'),
(53, 133, 'Laurie Halse Anderson', 'Speak', '\"Speak up for yourself--we want to know what you have to say.\" From the first moment of her freshman year at Merryweather High, Melinda knows this is a big fat lie, part of the nonsense of high school. She is friendless, outcast, because she busted an end-of-summer party by calling the cops, so now nobody will talk to her, let alone listen to her. As time passes, she becomes increasingly isolated and practically stops talking altogether. Only her art class offers any solace, and it is through her work on an art project that she is finally able to face what really happened at that terrible party: she was raped by an upperclassman, a guy who still attends Merryweather and is still a threat to her. Her healing process has just begun when she has another violent encounter with him. But this time Melinda fights back, refuses to be silent, and thereby achieves a measure of vindication.\r\n\r\nIn Laurie Halse Anderson\'s powerful novel, an utterly believable heroine with a bitterly ironic voice delivers a blow to the hypocritical world of high school. She speaks for many a disenfranchised teenager while demonstrating the importance of speaking up for oneself.', 'images/12703531-L.jpg', '2023-03-28 12:13:46'),
(55, 127, 'Sarah J. Maas', 'A Court of Mist and Fury', 'Feyre has undergone more trials than one human woman can carry in her heart. Though she\'s now been granted the powers and lifespan of the High Fae, she is haunted by her time Under the Mountain and the terrible deeds she performed to save the lives of Tamlin and his people.\r\n\r\nAs her marriage to Tamlin approaches, Feyre\'s hollowness and nightmares consume her. She finds herself split into two different people: one who upholds her bargain with Rhysand, High Lord of the feared Night Court, and one who lives out her life in the Spring Court with Tamlin. While Feyre navigates a dark web of politics, passion, and dazzling power, a greater evil looms. She might just be the key to stopping it, but only if she can harness her harrowing gifts, heal her fractured soul, and decide how she wishes to shape her future-and the future of a world in turmoil.', 'images/court of the mist.jpg', '2023-03-28 23:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(2, 'abc', 'abc123@abc.com', '$2y$10$AXVvnAHQWHuIEqBhk4uwaeXZx1OJLt/y6DkxrNLLZzqcCzOTIG4Sy', '2023-03-21 18:13:49'),
(9, 'admin', 'admin@admin', '$2y$10$K8OqEV5ND6tq3fFylD6auumu5RwyP55aAb0GW/FUacZX4em0lhRoK', '2023-03-21 18:13:49'),
(16, 'nitin', 'nitinlingwal@gmail.com', '$2y$10$XaVQfcud1EFf0NIzEQZty.P9V.aiwvKCfFA1nLkQffK9OvkEV9aWe', '2023-03-21 18:13:49'),
(17, 'Uanaruto', 'uanaruto@gmail.com', '$2y$10$g8GNmiTBGZ6BGhF.rQasV.H/4Ad.X/GzcETOqA6RaQdDenIHvEA3u', '2023-03-28 12:30:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_data`
--
ALTER TABLE `book_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_data`
--
ALTER TABLE `book_data`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
