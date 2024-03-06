-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2024 at 04:08 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MOBILEBANKING`
--

-- --------------------------------------------------------

--
-- Table structure for table `ACCOUNT`
--

CREATE TABLE `ACCOUNT` (
  `ACCOUNT_ID` int(11) NOT NULL,
  `ACCOUNT_NO` varchar(20) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `BALANCE` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ACCOUNT`
--

INSERT INTO `ACCOUNT` (`ACCOUNT_ID`, `ACCOUNT_NO`, `USER_ID`, `BALANCE`) VALUES
(2, '10005043000467562022', 3, '0.000'),
(3, '10005044000517027095', 4, '0.000'),
(4, '10005045000174346762', 5, '0.000'),
(5, '10005046000278976991', 6, '0.000'),
(6, '10005047000318211967', 7, '0.000'),
(7, '10005048000955849507', 8, '0.000'),
(8, '10005049000147740218', 9, '0.000'),
(9, '10005041000079103821', 10, '1545.000'),
(10, '10005041300060967605', 13, '0.000'),
(11, '10005041400005876389', 14, '0.000');

-- --------------------------------------------------------

--
-- Table structure for table `CHEQUES`
--

CREATE TABLE `CHEQUES` (
  `CHEQUE_ID` int(10) NOT NULL,
  `ACCOUNT_ID` int(11) NOT NULL,
  `AMOUNT` decimal(10,3) NOT NULL,
  `STATUS` enum('PENDING','DEPOSITED','STOPPED') NOT NULL DEFAULT 'PENDING',
  `CREATION_TIME` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `FINANCIAL_TIPS`
--

CREATE TABLE `FINANCIAL_TIPS` (
  `FINANCIAL_TIP_ID` int(10) NOT NULL,
  `TIP` text NOT NULL,
  `CATEGORY` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `FINANCIAL_TIPS`
--

INSERT INTO `FINANCIAL_TIPS` (`FINANCIAL_TIP_ID`, `TIP`, `CATEGORY`) VALUES
(1, 'Create a budget and stick to it. This helps you manage your spending and savings effectively.', 'Budgeting'),
(2, 'Build an emergency fund to cover unexpected expenses. Aim for at least three to six months\' worth of living expenses.', 'Savings'),
(3, 'Pay off high-interest debt as a priority. It can save you money in the long run and improve your financial health.', 'Debt Management'),
(4, 'Invest for the future. Consider long-term investments to grow your wealth and achieve financial goals.', 'Investing'),
(5, 'Regularly review your financial goals and adjust your plan accordingly. Flexibility is key to financial success.', 'Financial Planning');

-- --------------------------------------------------------

--
-- Table structure for table `TRANSACTIONS`
--

CREATE TABLE `TRANSACTIONS` (
  `TRANSACTION_ID` int(10) NOT NULL,
  `AMOUNT` decimal(10,3) NOT NULL,
  `TYPE` enum('DEPOSIT','WITHDRAWAL','LOAN REPAYMENT','TRANSFER') DEFAULT NULL,
  `AMOUNT_TYPE` enum('CHEQUE','CASH','MOBILE') NOT NULL,
  `CHEQUE_NO` varchar(20) DEFAULT NULL,
  `ACCOUNT_ID` int(10) DEFAULT NULL,
  `TRANSACTION_TIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `CHEQUE_STATUS` enum('STOPPED','ACTIVE') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `TRANSACTIONS`
--

INSERT INTO `TRANSACTIONS` (`TRANSACTION_ID`, `AMOUNT`, `TYPE`, `AMOUNT_TYPE`, `CHEQUE_NO`, `ACCOUNT_ID`, `TRANSACTION_TIME`, `CHEQUE_STATUS`) VALUES
(1, '600.000', 'DEPOSIT', 'CASH', '', 9, '2024-03-05 20:34:20', NULL),
(2, '1000.000', 'DEPOSIT', 'CHEQUE', '11111111', 9, '2024-03-05 20:35:25', 'STOPPED'),
(3, '300.000', 'DEPOSIT', 'CASH', '', 9, '2024-03-05 23:08:03', NULL),
(4, '300.000', 'DEPOSIT', 'CHEQUE', '22222222', 9, '2024-03-05 23:12:57', NULL),
(5, '345.000', 'DEPOSIT', 'CASH', '', 9, '2024-03-05 23:16:09', NULL),
(6, '4000.000', 'DEPOSIT', 'CHEQUE', '33333333', 9, '2024-03-05 23:30:37', 'STOPPED'),
(7, '3000.000', 'DEPOSIT', 'CHEQUE', '23232323', 9, '2024-03-05 23:39:10', 'STOPPED');

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `USER_ID` int(10) NOT NULL,
  `FIRST_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `PIN` varchar(200) NOT NULL,
  `CREATION_TIME` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`USER_ID`, `FIRST_NAME`, `LAST_NAME`, `PIN`, `CREATION_TIME`) VALUES
(3, 'Patrick', 'Kabita', '$2y$10$NJMozqm/ZsRdXnf2QpuyjONQNJGUbWILtg/SjHJyXxnywLZYL6pa2', '2024-03-05 14:10:35'),
(4, 'Mary', 'Muigai', '$2y$10$P7g6S/5a16mhVlnmqqmmIePONmzNpvuCRM8hO0LQ0s9dF7faVIApW', '2024-03-05 14:15:51'),
(5, 'Wilberforce', 'Otieno', '$2y$10$WAyqz0KgRupyGvpnh4QZf.ATWygXBzKy.0IVyRvTsqIhAwlp4sxrK', '2024-03-05 14:16:38'),
(6, 'James', 'Letik', '$2y$10$9LbWjbkcxflzlPkFzKIVGuVLNDVb7xvH69PPF5mWm4emClhkNfvaS', '2024-03-05 14:20:53'),
(7, 'James', 'Sew', '$2y$10$76SVH5kYn/aeAdCWGqi7z.PuWIj2ZNsNUIqKWaT90BDUm1mtT3feS', '2024-03-05 14:21:23'),
(8, 'pauline', 'derw', '$2y$10$5Mfi9MLykiUdYIjByYoSjeN2l/r7PLGeaY5/fAVHpGhem3vg0KceC', '2024-03-05 14:21:50'),
(9, 'Mino', 'Owino', '$2y$10$J9XVbeKJVb/Oqfi5fPUzzOJOm0W/kI.I4jS775nMrdAwoFJUe0ljC', '2024-03-05 14:23:21'),
(10, 'John', 'Doe', '$2y$10$kqxYtnq0W8BwKAbetRHLce4hZpjjWkSvXo.keTybAPu5m2.BIog.i', '2024-03-05 14:50:30'),
(11, 'Fatuma', 'Mwelusi', '$2y$10$.rYxZAuxJz5cPU0kNsG6I.SSZIoEGqFCtYjhUbozpys1caHiS0yte', '2024-03-05 22:54:49'),
(12, 'Fatuma', 'madsa', '$2y$10$v25xbBg3DBKeG174dAljNOH4EXM2w0/aOsa/wURwpk62oihqR.WC.', '2024-03-05 23:00:22'),
(13, 'James', 'madsa', '$2y$10$4ppZC9j1OwXwLeSYo2dzfe.nMudJb.yLIC50u5EW6XaxJyzbCFboq', '2024-03-05 23:03:32'),
(14, 'Juliet', 'Romish', '$2y$10$24yGN0LYeRX4oDREuyvhAufAANWR9KRVgLZ2n153QApru6xohhySW', '2024-03-05 23:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `USER_LOGIN`
--

CREATE TABLE `USER_LOGIN` (
  `LOGIN_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `SUCCESSFUL` enum('YES','NO') NOT NULL,
  `TIMESTAMP` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `USER_LOGIN`
--

INSERT INTO `USER_LOGIN` (`LOGIN_ID`, `USER_ID`, `SUCCESSFUL`, `TIMESTAMP`) VALUES
(1, 3, 'YES', '2024-03-05 14:10:35'),
(2, 4, 'YES', '2024-03-05 14:15:51'),
(3, 5, 'YES', '2024-03-05 14:16:38'),
(4, 6, 'YES', '2024-03-05 14:20:53'),
(5, 7, 'YES', '2024-03-05 14:21:23'),
(6, 8, 'YES', '2024-03-05 14:21:50'),
(7, 9, 'YES', '2024-03-05 14:23:21'),
(8, 10, 'YES', '2024-03-05 14:50:30'),
(9, 10, 'YES', '2024-03-05 14:53:27'),
(10, 10, 'YES', '2024-03-05 14:54:47'),
(11, 10, 'YES', '2024-03-05 15:00:09'),
(12, 10, 'YES', '2024-03-05 21:51:17'),
(13, 10, 'YES', '2024-03-05 23:07:49'),
(14, 10, 'YES', '2024-03-05 23:16:59'),
(15, 14, 'YES', '2024-03-05 23:17:36'),
(16, 10, 'YES', '2024-03-06 06:48:36'),
(17, 10, 'YES', '2024-03-06 07:24:14'),
(18, 10, 'YES', '2024-03-06 07:25:20'),
(19, 10, 'YES', '2024-03-06 07:32:59'),
(20, 10, 'YES', '2024-03-06 07:48:15'),
(21, 10, 'YES', '2024-03-06 08:19:01'),
(22, 10, 'NO', '2024-03-06 15:04:41'),
(23, 10, 'YES', '2024-03-06 15:04:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ACCOUNT`
--
ALTER TABLE `ACCOUNT`
  ADD PRIMARY KEY (`ACCOUNT_ID`);

--
-- Indexes for table `CHEQUES`
--
ALTER TABLE `CHEQUES`
  ADD PRIMARY KEY (`CHEQUE_ID`),
  ADD KEY `fk_cheques_account` (`ACCOUNT_ID`);

--
-- Indexes for table `TRANSACTIONS`
--
ALTER TABLE `TRANSACTIONS`
  ADD PRIMARY KEY (`TRANSACTION_ID`),
  ADD KEY `fk_transactions_account` (`ACCOUNT_ID`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `USER_LOGIN`
--
ALTER TABLE `USER_LOGIN`
  ADD PRIMARY KEY (`LOGIN_ID`),
  ADD KEY `fk_userlogin_users` (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ACCOUNT`
--
ALTER TABLE `ACCOUNT`
  MODIFY `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `CHEQUES`
--
ALTER TABLE `CHEQUES`
  MODIFY `CHEQUE_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `TRANSACTIONS`
--
ALTER TABLE `TRANSACTIONS`
  MODIFY `TRANSACTION_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `USER_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `USER_LOGIN`
--
ALTER TABLE `USER_LOGIN`
  MODIFY `LOGIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CHEQUES`
--
ALTER TABLE `CHEQUES`
  ADD CONSTRAINT `fk_cheques_account` FOREIGN KEY (`ACCOUNT_ID`) REFERENCES `ACCOUNT` (`ACCOUNT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `TRANSACTIONS`
--
ALTER TABLE `TRANSACTIONS`
  ADD CONSTRAINT `fk_transactions_account` FOREIGN KEY (`ACCOUNT_ID`) REFERENCES `ACCOUNT` (`ACCOUNT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `USER_LOGIN`
--
ALTER TABLE `USER_LOGIN`
  ADD CONSTRAINT `fk_userlogin_users` FOREIGN KEY (`USER_ID`) REFERENCES `USERS` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
