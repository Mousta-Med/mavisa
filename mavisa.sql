-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 11:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mavisa`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `09:15` tinyint(1) NOT NULL,
  `10:15` tinyint(1) NOT NULL,
  `11:15` tinyint(1) NOT NULL,
  `14:15` tinyint(1) NOT NULL,
  `15:15` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `reservation_date`, `user_id`, `09:15`, `10:15`, `11:15`, `14:15`, `15:15`) VALUES
(5, '2023-03-29', 27, 0, 0, 0, 0, 0),
(6, '2023-03-31', 28, 0, 0, 0, 0, 0),
(7, '2023-03-26', 28, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_token` varchar(200) NOT NULL,
  `user_firstname` varchar(200) NOT NULL,
  `user_lastname` varchar(200) NOT NULL,
  `user_birthdate` date NOT NULL,
  `user_nationality` varchar(200) NOT NULL,
  `family_situation` varchar(200) NOT NULL,
  `user_adresse` varchar(200) NOT NULL,
  `visa_type` varchar(200) NOT NULL,
  `Date_of_departure` date NOT NULL,
  `arrival_date` date NOT NULL,
  `voyage_document_type` varchar(200) NOT NULL,
  `voyage_document_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_token`, `user_firstname`, `user_lastname`, `user_birthdate`, `user_nationality`, `family_situation`, `user_adresse`, `visa_type`, `Date_of_departure`, `arrival_date`, `voyage_document_type`, `voyage_document_number`) VALUES
(20, 'MA3e097ae2', 'Echo', 'Allen', '1997-01-10', 'Non tenetur at conse', 'Harum nihil sunt aut', 'At ut deleniti paria', 'Eos sint lorem tempo', '1991-03-26', '2018-08-19', 'Nesciunt doloremque', 262),
(21, 'MA315826ef', 'Sylvia', 'Stevens', '1998-04-07', 'Eu et voluptatem mi', 'Ducimus quia nesciu', 'Aliquip duis eiusmod', 'Exercitation qui por', '2021-03-04', '1983-08-30', 'Sunt dicta cumque et', 438),
(22, 'MA91b7ccec', 'Ainsley', 'Reeves', '1975-04-02', 'Inventore saepe volu', 'Labore vel rem est i', 'Odio ab illum autem', 'Commodo reprehenderi', '1980-03-16', '2001-11-06', 'Debitis enim cupidat', 922),
(23, 'MA67e9cd0f', '', '', '0000-00-00', '', '', '', '', '0000-00-00', '0000-00-00', '', 0),
(24, 'MA8a4339be', 'Dexter', 'Drake', '1978-07-22', 'Aut eos temporibus ', 'Ut libero reprehende', 'Voluptate ex vitae s', 'Eu natus in proident', '1988-09-01', '2011-03-04', 'Quisquam fugiat ulla', 78),
(25, 'MA8d9be8c0', 'Burton', 'Cunningham', '1977-11-08', 'Unde quasi lorem bla', 'Sit ex ut lorem ali', 'Velit aute elit nec', 'Nostrud neque nesciu', '1983-05-04', '2019-11-21', 'Vel do minus deserun', 161),
(26, 'MA029a5291', 'Thomas', 'Rivers', '1996-05-22', 'Excepturi ut eius no', 'Sint cupidatat cons', 'Fuga Enim aut eum p', 'Omnis eligendi susci', '1972-12-23', '1987-10-14', 'Esse velit velit ven', 194),
(27, 'MA95ef181a', 'lolux', 'vistore', '1974-01-27', 'Velit sit vitae opti', 'Dolor nihil et esse ', 'Ut eius inventore ac', 'Veniam consequatur ', '2011-11-08', '2020-11-26', 'Doloremque laboris v', 408),
(28, 'MA9e933935', 'Colorado', 'Padil', '1994-07-13', 'Autem quod est in an', 'Minima qui in exerci', 'Enim aliqua Anim si', 'Sit tempore itaque', '1996-04-20', '1988-06-10', 'Qui et amet quo omn', 801),
(29, 'MA75f40c75', 'Kamal', 'Pittman', '1978-03-14', 'Aut a perferendis fu', 'Sunt non incidunt e', 'Sit sit nobis tempo', 'Et in eos exercitati', '2022-02-03', '1987-03-14', 'Accusamus minim moll', 222),
(30, 'MAcc3bc8aa', 'Lucy', 'Rosa', '2016-12-28', 'Et eveniet eu at cu', 'Magnam reiciendis ex', 'Quidem temporibus ut', 'Sunt molestiae fuga', '1996-08-05', '2004-10-20', 'In omnis aperiam dui', 992),
(31, 'MA96855dfe', 'Ella', 'Christensen', '2006-04-21', 'Ea quia numquam esse', 'Ipsum reiciendis atq', 'Tempora ut laudantiu', 'Ea voluptate quo et ', '1987-05-31', '1982-01-15', 'Qui est eveniet ut', 715),
(32, 'MAe4bd44ce', 'Sara', 'Shannon', '1970-06-27', 'Quia ullam perspicia', 'Anim nulla iste nost', 'Sed aliquip et ipsum', 'Cupidatat excepturi ', '1973-11-03', '2006-04-26', 'Adipisci rerum non p', 690),
(33, 'MA0a737b03', 'Casey', 'Carver', '2015-06-02', 'Expedita ducimus qu', 'Sed doloremque quasi', 'Sunt qui adipisci ha', 'Nostrud quibusdam of', '2021-11-02', '2018-06-14', 'Perferendis officia ', 592),
(34, 'MA2900f7d8', 'Jada', 'Holder', '1998-06-14', 'Aliquid reprehenderi', 'Quo aspernatur quisq', 'Placeat dolores vel', 'Minima duis non reru', '1970-11-05', '1980-03-25', 'Sit ut rerum volupta', 485);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
