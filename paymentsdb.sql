-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 08:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paymentsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`id`, `name`, `email`, `password`, `user_type`, `date_created`) VALUES
(1, 'Jason Trestiza', 'jason@neac.com', '$2y$10$fOq8uKFaS/4EDDkYdmqyw.0uGMRIV9pi4KOhMXyJ6y5xZhM34s0nS', '1', '2024-01-06 07:38:31'),
(2, 'Jaya', 'jaya@neac.com', '$2y$10$Ap0Gxa0eAPYxTFWgClNboOf/EBoz0pfcZOA1jJxr6y.leHJvbYk7i', '1', '2024-01-06 08:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `id` int(11) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `service_availed` varchar(100) NOT NULL,
  `mode_of_payment` varchar(100) DEFAULT NULL,
  `other_mop` varchar(100) DEFAULT NULL,
  `total_amount_paid` varchar(100) NOT NULL,
  `payment_slip` longtext NOT NULL,
  `payment_verified` int(11) DEFAULT NULL,
  `date_verified` datetime DEFAULT NULL,
  `amount_deposited_php` decimal(12,2) DEFAULT NULL,
  `amount_deposited_usd` decimal(12,2) DEFAULT NULL,
  `date_update_admin` datetime DEFAULT NULL,
  `verified_by` varchar(100) DEFAULT NULL,
  `remarks` longtext DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`id`, `reference`, `name`, `facebook`, `email`, `contact_number`, `service_availed`, `mode_of_payment`, `other_mop`, `total_amount_paid`, `payment_slip`, `payment_verified`, `date_verified`, `amount_deposited_php`, `amount_deposited_usd`, `date_update_admin`, `verified_by`, `remarks`, `date_created`, `created_by`) VALUES
(1, '370487X861452', 'Jason Trestiza', 'JASON', 'jason66@neac.com', '09977323880', 'NCLEX Australia', 'BDO', NULL, '$2135.55', 'upload/hRzjEBX1Ql7R9la0Via9sptuoM1infZQzrNuKvWA.jpg,upload/zB3tH0KS9iNhleWdVY3spkTFl0QB5FMzyPAs70rG.jpg,upload/hfpHFrviNimWa7GxAXIedICMCR0PHGEUYa7a46cY.png,upload/IiNMUK404GfRgB9kBcHqI3rDpGhk7E2f5b1rhPM4.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 03:30:56', '127.0.0.1'),
(2, '87481249A5839', 'Jason Trestiza', 'test', 'test@test.com', '09977323880', 'test', 'Remittance', NULL, '452.66', 'upload/wUfRBoWXhgeRxyKub0AI77FVXs8NpN9rnDDdJrhv.jpg,upload/tlEFf4tRwwG2NwgFfzpIxcw7BTVETNtxStUgswEA.jpg,upload/Vveg1mgXgJcbZTK4MJyPSRme2ajgRseuTcde6g6q.jpg,upload/fEdsJXO7IjOTRGpvCbpSgK6b15y1GdDDbUI6Q73G.jpg,upload/rQVrAwTfwMsko0eubSHQ7YwSAepzei8vJbalaN9l.jpg,upload/cAedIty0HOj1bryUnqPsu74qVvonOmDnhnQgKm43.jpg', 1, '2024-01-08 14:26:00', 22.00, 22.56, '2024-01-25 00:00:00', 'Jaya', 'hehe', '2024-01-08 02:17:17', '127.0.0.1'),
(3, '8338M76858326', 'Test', 'Test 3', 'test3@test.com', '12312312', 'Wala', 'Remittance', NULL, '1111', 'upload/PpK85YdSo3NDsyQUWzNSKfCAHEXuIKr9EvtIsAyv.jpg,upload/uxPwV7kjQbcWV1XlSsHjQOzdBdJ57U45tIsZJEKa.jpg,upload/Zs6ST9JTupTH6iceV5FDF1qrec7QyXjBAPLhupHJ.jpg,upload/7gK9Gp0zjilK0LH5NMKKlW89NZ4uda9yKB37WvPf.jpg,upload/zgu0NbNELSyoNqms4yBJmCsxN2gSSOMay6vi3qd5.jpg,upload/R2D6hfcD0RRrymzHQ4Nsewo4bNUpnBI1VjLwy5A2.jpg', 1, '2024-01-08 14:39:00', NULL, NULL, NULL, 'Jaya', 'hehe', '2024-01-08 06:04:04', '127.0.0.1'),
(4, '65536060431W5', 'Test', 'Test 4', 'test4@test.com', '09999999999', 'Meron', 'Others', 'Gcash', '555.12', 'upload/rx5PW6dfhrrPC27AFuMcyIoy7PxUpwnZ3LhRPYdW.jpg,upload/t9NklACxcJkcJIFoStM9IZ75NagUZqzv104zY6Fw.jpg,upload/hsdsoAaIR8wE039SujpCfJ7Qse5oVRDozxrIPHDU.jpg,upload/0b7Wm4KtJIBP6NQcJIzMkI5wXL1NBZD5444Zr6YA.jpg,upload/Ku5cdHjkRw6rSYrkst8NOzLlz6fgUOjnA9sMb1eJ.jpg,upload/FZaRWDpBYzEmQcaDFp5fR2CBsJeI49NJjU81juyr.jpg,upload/5AUo96buX94YaShjUztVlbhDV75PI6Nu1ATnYD1f.jpg,upload/VJfNjIvjQ6sQX3iZqrtHF4zGEkAMwFa3iylwlrkw.png', NULL, NULL, NULL, NULL, NULL, NULL, 'hehe', '2024-01-08 06:49:44', '127.0.0.1'),
(5, 'J318097065132', 'Test', 'Test 5', 'test5@test.com', '09999999999', 'Meron', 'BDO', NULL, '555.12', 'upload/HIIqSgAuKdfMmDFOzRLgJzg6IbhXKfzAOKxW35CZ.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-08 07:00:22', '127.0.0.1'),
(6, '7363S85084497', 'Test', 'Test 5', 'test5@test.com', '09999999999', 'Meron', 'BDO', NULL, '555.12', 'upload/ztJv7SvUQlECwsamd3KNKKGP6QfeJZ46NJlQmUj9.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-08 07:00:27', '127.0.0.1'),
(7, '10305641430W7', 'Test', 'Test 5', 'test5@test.com', '09999999999', 'Meron', 'BDO', NULL, '555.12', 'upload/AqC3ZbjUP3QBt0CtmoryJF2Cq15gudwl8ROtx2Nw.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-08 07:00:32', '127.0.0.1'),
(8, '344Z952938964', 'Test', 'Test 5', 'test5@test.com', '09999999999', 'Meron', 'BDO', NULL, '555.12', 'upload/4qgmiZwmMBAycKO5XsX7KTzB6mdh14mr4K71WEmY.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-08 07:00:36', '127.0.0.1'),
(9, '740470O535698', 'Test', 'Test 5', 'test5@test.com', '09999999999', 'Meron', 'BDO', NULL, '555.12', 'upload/OY62VhHxukQWW7eJJAwbHM1q3oQc7KxXyv1TcM8r.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-08 07:00:58', '127.0.0.1'),
(10, '294349U502036', 'Test', 'Test 5', 'test5@test.com', '09999999999', 'Meron', 'BDO', NULL, '555.12', 'upload/S1PfEVih2tNy1Tw4qHs5DBO70DhAib47a2AcTnE8.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-08 07:01:20', '127.0.0.1'),
(11, '6257437956Y85', 'Test', 'Test 5', 'test5@test.com', '09999999999', 'Meron', 'BDO', NULL, '555.12', 'upload/Lm3NZDjoqjYMA4ci6WQbkbJxM6XySA6wGAnHYgJg.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-08 07:01:30', '127.0.0.1'),
(12, '5W50789894387', 'Test', 'Test 5', 'test5@test.com', '09999999999', 'Meron', 'BDO', NULL, '555.12', 'upload/09eVDemtJvbkiTRfHHT02h2emHWSzEh0TNAjcIA2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-08 07:01:34', '127.0.0.1'),
(13, '93V5204406205', 'Test', 'Test 5', 'test5@test.com', '09999999999', 'Meron', 'BDO', NULL, '555.12', 'upload/AKeG894uJLdNFx7NrhEiNZXcyahuGLpe2enXyI2y.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-08 07:01:38', '127.0.0.1'),
(14, '192815283T678', 'Test', 'Test 5', 'test5@test.com', '09999999999', 'Meron', 'BDO', NULL, '555.12', 'upload/oU7eDLF6GQC8x7Gi8NRkzAl16pSeNXGropDLhmNX.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-08 07:01:59', '127.0.0.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
