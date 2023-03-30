-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2023 at 07:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answerId` int(9) NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  `questionId` int(9) NOT NULL,
  `isItTrue` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answerId`, `content`, `questionId`, `isItTrue`) VALUES
(1, 'Japonii', 1, 0),
(2, 'Chin', 1, 0),
(3, 'Niemiec', 1, 0),
(4, 'Korei Południowej', 1, 1),
(5, 'Polska', 2, 0),
(6, 'Stany Zjednoczone', 2, 1),
(7, 'Pakistan', 2, 0),
(8, 'Indonezja', 2, 0),
(9, 'Rosji', 3, 0),
(10, 'Białorusi', 3, 0),
(11, 'Ukrainy', 3, 1),
(12, 'Polski', 3, 0),
(13, 'Fat Boy', 4, 1),
(14, 'Little Boy', 4, 0),
(15, 'Manhattan', 4, 0),
(16, 'Atomic Bomb Number 2', 4, 0),
(17, 'Apple', 5, 1),
(18, 'Microsoft', 5, 0),
(19, 'Google', 5, 0),
(20, 'Oracle', 5, 0),
(21, 'Niski przyrost naturalny', 6, 0),
(22, 'Wysoki współczynnik urodzeń', 6, 0),
(23, 'Drastyczny spadek liczby zmarłych', 6, 1),
(24, 'Wysoki dobrobyt społeczeństwa', 6, 0),
(25, '17 razy', 7, 0),
(26, '5 razy', 7, 0),
(27, '12 razy', 7, 0),
(28, '14 razy', 7, 1),
(29, 'Ankara', 8, 0),
(30, 'Astana', 8, 1),
(31, 'Duszanbe', 8, 0),
(32, 'Aszchabad', 8, 0),
(33, 'Willy-Willy', 9, 0),
(34, 'Tajfun', 9, 0),
(35, 'Tornado', 9, 0),
(36, 'Huragan', 9, 1),
(37, 'okupanta', 10, 0),
(38, 'związek zawodowy', 10, 0),
(39, 'zawód', 10, 1),
(40, 'wypadek w pracy', 10, 0),
(41, '0', 11, 0),
(42, '1', 11, 1),
(43, '2', 11, 0),
(44, '3', 11, 0),
(45, 'Biuro Obwodu Radom', 12, 0),
(46, 'Brak Odpowiedzi Rządu', 12, 0),
(47, 'Biuro Ochrony Rządu', 12, 1),
(48, 'Brak Opodatkowania Rodzin', 12, 0),
(49, 'Julian Ochocki', 13, 0),
(50, 'Konrad Walenrod', 13, 0),
(51, 'Wojciech Dobrzyński', 13, 0),
(52, 'Stanisław Wokulski', 13, 1),
(53, '2005 roku', 14, 1),
(54, '2003 roku', 14, 0),
(55, '2007 roku', 14, 0),
(56, '2011 roku', 14, 0),
(57, 'Francja', 15, 0),
(58, 'Rosja', 15, 0),
(59, 'Holandia', 15, 1),
(60, 'Hiszpania', 15, 0),
(61, 'Norwegii', 16, 0),
(62, 'Wielkiej Brytanii', 16, 0),
(63, 'Francji', 16, 0),
(64, 'Danii', 16, 1),
(65, 'Andromeda', 17, 0),
(66, 'Wielki Teleskop Kanaryjski', 17, 0),
(67, 'Ekstremalnie Wielki Teleskop Europejski', 17, 1),
(68, 'Hubble', 17, 0),
(69, 'Kim Zong Un', 18, 1),
(70, 'Mao Zedong', 18, 0),
(71, 'Kim Dzong II', 18, 0),
(72, 'Kim Ir Sen', 18, 0),
(73, 'Warszawa', 19, 0),
(74, 'Olsztyn', 19, 0),
(75, 'Radom', 19, 0),
(76, 'Dęblin', 19, 1),
(77, 'Monako', 20, 0),
(78, 'Watykan', 20, 1),
(79, 'Nauru', 20, 0),
(80, 'Tuvalu', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `historyAnswers`
--

CREATE TABLE `historyAnswers` (
  `historyId` int(9) NOT NULL,
  `userId` int(11) NOT NULL,
  `result` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `historyAnswers`
--

INSERT INTO `historyAnswers` (`historyId`, `userId`, `result`, `date`) VALUES
(1, 1, '3', '2023-03-27'),
(2, 2, '7', '2023-03-27'),
(3, 1, '3', '2023-03-27'),
(4, 1, '4', '2023-03-28'),
(5, 1, '4', '2023-03-28'),
(6, 4, '5', '2023-03-28'),
(7, 1, '10', '2023-03-28'),
(8, 2, '4', '2023-03-28'),
(9, 1, '9', '2023-03-29'),
(10, 1, '10', '2023-03-29'),
(11, 1, '10', '2023-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionId` int(9) NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  `category` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionId`, `content`, `category`) VALUES
(1, 'Z jakiego kraju pochodzi firma Samsung?', 'technologia'),
(2, 'Który kraj ma trzecią największą liczbę ludności na świecie?', 'geografia'),
(3, 'Na terenie (obecnie) jakiego kraju doszło do wybuchu elektrowni atomowej w Czarnobylu?', 'geografia/historia'),
(4, 'Jak nazywała się bomba, która została zrzucona na Nagasaki 9 VIII 1945 roku?', 'historia'),
(5, 'Jaka jest największa firma technologiczna świata?', 'technologia'),
(6, 'Co przyczynia się do zjawiska demograficznego nazywanego BABY BOOM?', 'geografia'),
(7, 'Ile razy w historii Real Madryt wygrał Ligę Mistrzów (Champions League)?', 'piłka nożna'),
(8, 'Stolicą Kazachstanu jest?', 'geografia'),
(9, 'Jak nazywa się cyklon tropikalny w Ameryce Północnej?', 'geografia'),
(10, 'Co oznacza angielskie słowo: occupation?', 'języki obce'),
(11, 'Ile polskich filmów otrzymało Oscara?', 'filmy'),
(12, 'Jak poprawnie brzmi rozwinięcie skrótu BOR?', 'polityka'),
(13, 'Jak nazywa się główny bohater powieści Bolesława Prusa pt. \"Lalka\"?', 'język polski'),
(14, 'W którym roku zmarł papież Polak?', 'wiedza ogólna'),
(15, 'W którym kraju legalna jest eutanazja?', 'etyka'),
(16, 'Do którego państwa należy obszar Grenlandii?', 'geografia'),
(17, 'Jak nazywa się największy teleskop na świecie?', 'astronomia'),
(18, 'Kto rządzi w Korei Północnej?', 'geografia'),
(19, 'Jak nazywa się miejscowość, w której uczeni są przyszli polscy piloci?', 'wiedza ogólna'),
(20, 'Najmniejszym państwem świata jest?', 'geografia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(9) NOT NULL,
  `nick` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `nick`, `password`) VALUES
(1, 'lefinek', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'Maciej', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(3, 'Papito', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(4, 'zuzarbuz', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answerId`),
  ADD KEY `fk_questions_answer` (`questionId`);

--
-- Indexes for table `historyAnswers`
--
ALTER TABLE `historyAnswers`
  ADD PRIMARY KEY (`historyId`),
  ADD KEY `fk_user_result` (`userId`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answerId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `historyAnswers`
--
ALTER TABLE `historyAnswers`
  MODIFY `historyId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `fk_questions_answer` FOREIGN KEY (`questionId`) REFERENCES `questions` (`questionId`);

--
-- Constraints for table `historyAnswers`
--
ALTER TABLE `historyAnswers`
  ADD CONSTRAINT `fk_user_result` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
