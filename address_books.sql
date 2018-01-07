-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2018 at 10:37 PM
-- Server version: 5.7.16-log
-- PHP Version: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `address_books`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `city`, `address`) VALUES
(1, 'Челюпинск', 'ул. Пушкина, д. Колотушкина'),
(2, 'Златоуст', 'ул. Первый Куст, дом &quot;Пока что пуст&quot;');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `address_id`, `group_id`) VALUES
(1, 1, NULL, 1),
(2, 3, 2, 2),
(3, 26, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'Коллеги'),
(2, 'Друзья'),
(3, 'Полезные телефоны'),
(4, 'Семья');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` timestamp NOT NULL,
  `description` varchar(500) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `description`, `content`) VALUES
(1, 'articles 1', '2018-01-01 19:00:00', 'description for articles 1', 'content for articles 1 , very big content'),
(2, 'articles 2', '2018-01-01 19:00:00', 'description for articles 2', 'content for articles 2, verty big content');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `phone` bigint(100) NOT NULL,
  `phone2` bigint(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `phone`, `phone2`, `email`, `company`) VALUES
(1, 'Kirill', 'Semenov', 89630818196, 89514420272, 'PO-2-06_024@mail.ru', 'IS'),
(3, 'Edita', 'Mushkarova', 89525205201, 123, 'dzhudi_90@list.ru', 'TTK'),
(4, 'Кирилл', 'Семенов', 89630818196, 89514420272, NULL, 'Интерсвязь'),
(14, 'Аркадий', 'Укупник', 895112345678, NULL, NULL, 'Russian Federation'),
(15, 'Василий', 'Фамильевич', 89517538521, NULL, NULL, 'Russian'),
(16, 'Boulevard', 'Brouken', 89513578520, 87531596540, NULL, 'Dreams'),
(21, 'Nougat', NULL, 89012355678, NULL, NULL, 'Android'),
(22, 'Nougat', NULL, 89012355678, NULL, NULL, 'Android'),
(23, 'Bob', NULL, 12345678901, NULL, NULL, NULL),
(24, 'Oppo', 'C5', 78945612300, NULL, NULL, 'China Production'),
(25, '4X', 'Redmi', 96385274100, NULL, NULL, 'China Production'),
(26, 'Nexus 5X', 'LG', 9876543211, NULL, NULL, 'Google Corporation'),
(27, 'Create', 'action', 10923847561, NULL, NULL, 'Controller'),
(28, 'Арсений', 'Семенов', 19238837465, NULL, NULL, 'Сынулик и Ко'),
(29, 'Арсений', 'Семенов', 19238837465, NULL, NULL, 'Сынулик и Ко'),
(30, 'Test', 'Testov', 78945612300, NULL, NULL, NULL),
(32, 'Postal', 'Voltarate', 1010101092934, NULL, NULL, NULL),
(33, 'Name', 'Family', 1232343457, NULL, NULL, NULL),
(34, 'Имя', 'Фамилия', 89639639630, NULL, NULL, NULL),
(35, 'Имя', 'Фамилия', 89639639630, NULL, NULL, NULL),
(36, 'Евлампий', 'Гутентакович', 123123123123, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
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
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
