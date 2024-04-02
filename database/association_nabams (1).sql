-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2024 at 05:21 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `association_nabams`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_sessions`
--

CREATE TABLE `academic_sessions` (
  `id` int NOT NULL,
  `session_name` varchar(20) DEFAULT '2023-2024',
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_settings`
--

CREATE TABLE `price_settings` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` int NOT NULL DEFAULT '0',
  `is_active` set('Yes','No') NOT NULL DEFAULT 'Yes',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `price_settings`
--

INSERT INTO `price_settings` (`id`, `name`, `amount`, `is_active`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'registration fee', 2500, 'Yes', '2024-03-31 14:20:53', '2024-03-31 14:20:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `purpose` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `amount` int NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phone_number` varchar(30) DEFAULT NULL,
  `reference` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Pending','Success','Failed') NOT NULL DEFAULT 'Pending',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `authorization_url` varchar(255) DEFAULT NULL,
  `callback_url` varchar(255) DEFAULT NULL,
  `gateway_response` varchar(255) DEFAULT NULL,
  `paid_at` varchar(60) DEFAULT NULL,
  `channel` varchar(20) DEFAULT NULL,
  `other_info` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `purpose`, `email`, `amount`, `fullname`, `phone_number`, `reference`, `created_at`, `status`, `updated_at`, `authorization_url`, `callback_url`, `gateway_response`, `paid_at`, `channel`, `other_info`) VALUES
(1, 15, 'registration fee', 'juki@mailinator.com', 2500, 'Solomon Nasim', '08145858570', '455ghgfg6', '2024-03-31 14:49:28', 'Success', '2024-04-02 14:12:38', NULL, NULL, NULL, NULL, 'card', NULL),
(2, 16, 'registration fee', 'wikisyr@mailinator.com', 2500, 'Kennedy Alexa', '08106105026', NULL, '2024-03-31 14:52:11', 'Pending', '2024-03-31 14:52:11', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(3, 17, 'registration fee', 'tewoqofoj@mailinator.com', 2500, 'Osborne Halla', '08188262776', 'zrg3r5zynl', '2024-03-31 15:24:17', 'Success', '2024-03-31 15:30:11', NULL, 'http://127.0.0.1:8000/payment_url', 'Successful', '2024-03-31T16:24:43.000Z', 'card', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":3674300014,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"zrg3r5zynl\",\"receipt_number\":null,\"amount\":250000,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2024-03-31T16:24:43.000Z\",\"created_at\":\"2024-03-31T16:24:17.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"105.112.183.0\",\"metadata\":\"\",\"log\":{\"start_time\":1711902261,\"time_spent\":22,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Set payment method to: card\",\"time\":19},{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":22},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":22}]},\"fees\":13750,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_f2oht6vg11\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_3jGHJaymwhs9LcariEMG\",\"account_name\":null},\"customer\":{\"id\":163635625,\"first_name\":null,\"last_name\":null,\"email\":\"tewoqofoj@mailinator.com\",\"customer_code\":\"CUS_xtwx27shqwfy0oe\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":{},\"order_id\":null,\"paidAt\":\"2024-03-31T16:24:43.000Z\",\"createdAt\":\"2024-03-31T16:24:17.000Z\",\"requested_amount\":250000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2024-03-31T16:24:17.000Z\",\"plan_object\":{},\"subaccount\":{}}}'),
(4, 21, 'registration fee', 'hecar@mailinator.com', 2500, 'Henry Rhoda', '08133023441', 'tzg33uiv0x', '2024-03-31 15:50:45', 'Success', '2024-03-31 15:55:15', NULL, 'http://127.0.0.1:8000/payment_url', 'Successful', '2024-03-31T16:55:12.000Z', 'card', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":3674353746,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"tzg33uiv0x\",\"receipt_number\":null,\"amount\":250000,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2024-03-31T16:55:12.000Z\",\"created_at\":\"2024-03-31T16:50:45.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"105.112.183.0\",\"metadata\":\"\",\"log\":{\"start_time\":1711903849,\"time_spent\":264,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":262},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":264}]},\"fees\":13750,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_0oq7k8ziq1\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_3jGHJaymwhs9LcariEMG\",\"account_name\":null},\"customer\":{\"id\":163637815,\"first_name\":null,\"last_name\":null,\"email\":\"hecar@mailinator.com\",\"customer_code\":\"CUS_4r4lj1kh93xibvx\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":{},\"order_id\":null,\"paidAt\":\"2024-03-31T16:55:12.000Z\",\"createdAt\":\"2024-03-31T16:50:45.000Z\",\"requested_amount\":250000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2024-03-31T16:50:45.000Z\",\"plan_object\":{},\"subaccount\":{}}}'),
(5, 22, 'registration fee', 'giculysyq@mailinator.com', 2500, 'English Fallon', '08187172808', 'g8kf5q6ge3', '2024-03-31 15:55:40', 'Pending', '2024-03-31 15:55:40', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(6, 23, 'registration fee', 'madu@mailinator.com', 2500, 'Koch Pandora', '08143578681', 'ynhanrpny5', '2024-03-31 15:57:32', 'Success', '2024-03-31 16:12:02', NULL, 'http://127.0.0.1:8000/payment_url', 'Successful', '2024-03-31T17:12:00.000Z', 'card', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":3674363867,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"ynhanrpny5\",\"receipt_number\":null,\"amount\":250000,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2024-03-31T17:12:00.000Z\",\"created_at\":\"2024-03-31T16:57:32.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"105.112.183.0\",\"metadata\":\"\",\"log\":{\"start_time\":1711904256,\"time_spent\":864,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":863},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":864}]},\"fees\":13750,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_eygzbdxjq3\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_3jGHJaymwhs9LcariEMG\",\"account_name\":null},\"customer\":{\"id\":163638355,\"first_name\":null,\"last_name\":null,\"email\":\"madu@mailinator.com\",\"customer_code\":\"CUS_afwg6jtx1d1qeha\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":{},\"order_id\":null,\"paidAt\":\"2024-03-31T17:12:00.000Z\",\"createdAt\":\"2024-03-31T16:57:32.000Z\",\"requested_amount\":250000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2024-03-31T16:57:32.000Z\",\"plan_object\":{},\"subaccount\":{}}}'),
(7, 24, 'registration fee', 'totel@mailinator.com', 2500, 'Macias Avye', '08103277602', 'wm4lrrg6t1', '2024-03-31 17:38:10', 'Pending', '2024-03-31 17:38:10', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(8, 25, 'registration fee', 'gydunit@mailinator.com', 2500, 'Aguirre Gillian', '08171131982', '3hn405ddpo', '2024-03-31 17:39:50', 'Pending', '2024-03-31 17:39:50', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(9, 26, 'registration fee', 'vosoreru@mailinator.com', 2500, 'Solomon Mallory', '08195754856', '6h1f4bspwd', '2024-03-31 17:42:31', 'Pending', '2024-03-31 17:42:31', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(10, 27, 'registration fee', 'zovexyxib@mailinator.com', 2500, 'Wheeler Stacy', '08176917809', 'lx01f3gaua', '2024-03-31 17:43:34', 'Pending', '2024-03-31 17:43:34', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(11, 28, 'registration fee', 'musedeqyhi@mailinator.com', 2500, 'Tyler Seth', '08133924357', '59dsg5fjb7', '2024-03-31 17:44:08', 'Pending', '2024-03-31 17:44:08', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(12, 29, 'registration fee', 'vysowebeji@mailinator.com', 2500, 'Collier Aubrey', '08119328889', '8m8qouh7mt', '2024-03-31 17:45:32', 'Pending', '2024-03-31 17:45:32', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(13, 30, 'registration fee', 'dece@mailinator.com', 2500, 'Warren Eaton', '08195723023', 'mjthyrnjbg', '2024-03-31 17:46:24', 'Pending', '2024-03-31 17:46:24', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(14, 31, 'registration fee', 'kyhefygut@mailinator.com', 2500, 'Cannon Minerva', '08162702228', 'lsq2h143dg', '2024-03-31 17:47:05', 'Pending', '2024-03-31 17:47:05', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(15, 32, 'registration fee', 'wyget@mailinator.com', 2500, 'Dudley Elvis', '08104986824', 'n50atzlknq', '2024-03-31 17:48:52', 'Pending', '2024-03-31 17:48:52', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(16, 33, 'registration fee', 'fegibyn@mailinator.com', 2500, 'Blair Flavia', '08188178195', 'mkirvnvk61', '2024-03-31 21:13:06', 'Pending', '2024-03-31 21:13:06', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(17, 34, 'registration fee', 'hodulelej@mailinator.com', 2500, 'Mckay Camden', '08116859636', '13cpoztez0', '2024-03-31 21:14:03', 'Pending', '2024-03-31 21:14:03', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(18, 35, 'registration fee', 'tidysuk@mailinator.com', 2500, 'Harmon Shelley', '08191627157', '1nmclivyrq', '2024-03-31 21:14:39', 'Pending', '2024-03-31 21:14:39', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(19, 36, 'registration fee', 'zidaw@mailinator.com', 2500, 'Jacobs Eden', '08141410646', '3igd34crdr', '2024-03-31 21:19:37', 'Pending', '2024-03-31 21:19:37', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(20, 37, 'registration fee', 'rijokuhob@mailinator.com', 2500, 'Raymond Cheryl', '08146440047', '0hc3a40ngb', '2024-03-31 21:21:57', 'Pending', '2024-03-31 21:21:57', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(21, 38, 'registration fee', 'fyba@mailinator.com', 2500, 'Walls Mia', '08168048374', 'i8hwpagz5u', '2024-03-31 21:22:50', 'Pending', '2024-03-31 21:22:50', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(22, 39, 'registration fee', 'petyquqemy@mailinator.com', 2500, 'West Sandra', '08139570033', 'dbh0dqfvw1', '2024-03-31 21:28:14', 'Pending', '2024-03-31 21:28:14', NULL, 'http://127.0.0.1:8000/payment_url', NULL, NULL, NULL, NULL),
(23, 40, 'registration fee', 'syloq@mailinator.com', 2500, 'Mccoy Samson', '08136008595', 'eahdm6jk70', '2024-03-31 21:28:35', 'Success', '2024-03-31 21:29:26', NULL, 'http://127.0.0.1:8000/payment_url', 'Successful', '2024-03-31T22:29:25.000Z', 'card', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":3674902766,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"eahdm6jk70\",\"receipt_number\":null,\"amount\":250000,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2024-03-31T22:29:25.000Z\",\"created_at\":\"2024-03-31T22:28:35.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"105.113.96.31\",\"metadata\":\"\",\"log\":{\"start_time\":1711924159,\"time_spent\":5,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":5},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":5}]},\"fees\":13750,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_xrcymmyfv7\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_3jGHJaymwhs9LcariEMG\",\"account_name\":null},\"customer\":{\"id\":163660731,\"first_name\":null,\"last_name\":null,\"email\":\"syloq@mailinator.com\",\"customer_code\":\"CUS_02ya3cape1jx4ko\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":{},\"order_id\":null,\"paidAt\":\"2024-03-31T22:29:25.000Z\",\"createdAt\":\"2024-03-31T22:28:35.000Z\",\"requested_amount\":250000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2024-03-31T22:28:35.000Z\",\"plan_object\":{},\"subaccount\":{}}}'),
(24, 41, 'registration fee', 'jonedafi@mailinator.com', 2500, 'Riddle Preston', '08164460438', 'py7najfi41', '2024-03-31 21:31:13', 'Success', '2024-03-31 21:31:26', NULL, 'http://127.0.0.1:8000/payment_url', 'Successful', '2024-03-31T22:31:25.000Z', 'card', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":3674905430,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"py7najfi41\",\"receipt_number\":null,\"amount\":250000,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2024-03-31T22:31:25.000Z\",\"created_at\":\"2024-03-31T22:31:14.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"105.113.96.31\",\"metadata\":\"\",\"log\":{\"start_time\":1711924282,\"time_spent\":3,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":2},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":3}]},\"fees\":13750,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_z8buhwq527\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_3jGHJaymwhs9LcariEMG\",\"account_name\":null},\"customer\":{\"id\":163660874,\"first_name\":null,\"last_name\":null,\"email\":\"jonedafi@mailinator.com\",\"customer_code\":\"CUS_z0vqw3u7wqdn6sb\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":{},\"order_id\":null,\"paidAt\":\"2024-03-31T22:31:25.000Z\",\"createdAt\":\"2024-03-31T22:31:14.000Z\",\"requested_amount\":250000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2024-03-31T22:31:14.000Z\",\"plan_object\":{},\"subaccount\":{}}}'),
(25, 42, 'registration fee', 'jiqurigi@mailinator.com', 2500, 'Nichols Chandler', '08151158912', 'ug2rft24ig', '2024-03-31 21:33:48', 'Success', '2024-03-31 21:34:01', NULL, 'http://127.0.0.1:8000/payment_url', 'Successful', '2024-03-31T22:34:00.000Z', 'card', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":3674907812,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"ug2rft24ig\",\"receipt_number\":null,\"amount\":250000,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2024-03-31T22:34:00.000Z\",\"created_at\":\"2024-03-31T22:33:48.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"105.113.96.31\",\"metadata\":\"\",\"log\":{\"start_time\":1711924437,\"time_spent\":3,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":2},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":3}]},\"fees\":13750,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_2udhvc8rci\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_3jGHJaymwhs9LcariEMG\",\"account_name\":null},\"customer\":{\"id\":163661024,\"first_name\":null,\"last_name\":null,\"email\":\"jiqurigi@mailinator.com\",\"customer_code\":\"CUS_ke5k9pgdkl82346\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":{},\"order_id\":null,\"paidAt\":\"2024-03-31T22:34:00.000Z\",\"createdAt\":\"2024-03-31T22:33:48.000Z\",\"requested_amount\":250000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2024-03-31T22:33:48.000Z\",\"plan_object\":{},\"subaccount\":{}}}'),
(26, 43, 'registration fee', 'duzavaloqy@mailinator.com', 2500, 'Hartman Aaron', '08130951503', '32x1o10vtp', '2024-03-31 21:36:27', 'Success', '2024-03-31 21:37:55', NULL, 'http://127.0.0.1:8000/payment_url', 'Successful', '2024-03-31T22:36:38.000Z', 'card', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":3674910033,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"32x1o10vtp\",\"receipt_number\":null,\"amount\":250000,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2024-03-31T22:36:38.000Z\",\"created_at\":\"2024-03-31T22:36:27.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"105.113.96.31\",\"metadata\":\"\",\"log\":{\"start_time\":1711924595,\"time_spent\":3,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":2},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":3}]},\"fees\":13750,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_llp9y91iqk\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_3jGHJaymwhs9LcariEMG\",\"account_name\":null},\"customer\":{\"id\":163661152,\"first_name\":null,\"last_name\":null,\"email\":\"duzavaloqy@mailinator.com\",\"customer_code\":\"CUS_wnuxoi5ph87kij6\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":{},\"order_id\":null,\"paidAt\":\"2024-03-31T22:36:38.000Z\",\"createdAt\":\"2024-03-31T22:36:27.000Z\",\"requested_amount\":250000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2024-03-31T22:36:27.000Z\",\"plan_object\":{},\"subaccount\":{}}}'),
(27, 44, 'registration fee', 'giqef@mailinator.com', 2500, 'Charles Charlotte', '08144333879', 'doxdm24mq1', '2024-03-31 21:38:07', 'Success', '2024-03-31 21:38:19', NULL, 'http://127.0.0.1:8000/payment_url', 'Successful', '2024-03-31T22:38:18.000Z', 'card', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":3674911504,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"doxdm24mq1\",\"receipt_number\":null,\"amount\":250000,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2024-03-31T22:38:18.000Z\",\"created_at\":\"2024-03-31T22:38:07.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"105.113.96.31\",\"metadata\":\"\",\"log\":{\"start_time\":1711924695,\"time_spent\":3,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":2},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":3}]},\"fees\":13750,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_t1hjbftcge\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_3jGHJaymwhs9LcariEMG\",\"account_name\":null},\"customer\":{\"id\":163661258,\"first_name\":null,\"last_name\":null,\"email\":\"giqef@mailinator.com\",\"customer_code\":\"CUS_s1zk2kuidfbzu1m\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":{},\"order_id\":null,\"paidAt\":\"2024-03-31T22:38:18.000Z\",\"createdAt\":\"2024-03-31T22:38:07.000Z\",\"requested_amount\":250000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2024-03-31T22:38:07.000Z\",\"plan_object\":{},\"subaccount\":{}}}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(225) NOT NULL,
  `matno` varchar(30) DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `level` varchar(20) DEFAULT NULL,
  `member_type` enum('Regular','Alumni','Part-time') NOT NULL DEFAULT 'Regular',
  `expectation_msg` text,
  `reg_fee` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` enum('Yes','No') NOT NULL DEFAULT 'No',
  `fee_paid` enum('Yes','No') NOT NULL DEFAULT 'No',
  `role` enum('Member','Admin') NOT NULL DEFAULT 'Member',
  `bio` text,
  `dob` date DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `nickname`, `email`, `password`, `matno`, `phone`, `level`, `member_type`, `expectation_msg`, `reg_fee`, `created_at`, `updated_at`, `is_active`, `fee_paid`, `role`, `bio`, `dob`, `image`) VALUES
(1, 'Laith', 'Hill', NULL, 'hynybifycy@mailinator.com', '$2y$10$MZCzUHSTcxaiKwMliJ74jOud0GF8UJDuQJ61MQCao5VRNB3/yt8di', 'Rerum similique quae', '12345678901', 'ND 2', 'Regular', 'Optio quo doloribus', 0, '2024-03-31 12:07:02', '2024-03-31 12:07:02', 'No', 'No', 'Member', NULL, NULL, NULL),
(2, 'r', 'Snider', NULL, 'quvulop@mailinator.com', '$2y$10$u9L5KSdFxVxIRzg4.vTeOuoYA7vlR.0xL3liSBYCKLqy08rPt/8u6', 'Cillum eiusmod optio', '01234567890', 'ND 2', 'Regular', 'Est magni aut non au', 0, '2024-03-31 12:34:42', '2024-03-31 12:34:42', 'No', 'No', 'Member', NULL, NULL, NULL),
(3, 'w', 'Sherman', NULL, 'lykipi@mailinator.com', '$2y$10$uXvdlAFWUDLWXh1eI0JiUOuuvKOj3AZdF8GtyBvgATUr7QaRyiyni', 'A earum proident do', '01234567891', 'HND 1', 'Part-time', 'Sit perspiciatis f', 0, '2024-03-31 12:37:00', '2024-03-31 12:37:00', 'No', 'No', 'Member', NULL, NULL, NULL),
(4, 's', 'Wiggins', NULL, 'fivazexe@mailinator.com', '$2y$10$fVN/MQvp0IVTYnAesoxVKuYHLuXWoRepaVTg91ZZhw9hY/wYIyv76', 'Cupidatat error aut', '01234567891', 'ND 2', 'Regular', 'Voluptate enim simil', 0, '2024-03-31 12:37:35', '2024-03-31 12:37:35', 'No', 'No', 'Member', NULL, NULL, NULL),
(5, 's', 'Flowers', NULL, 'pimyhix@mailinator.com', '$2y$10$rfoOHEIjwm93RjsWr9uwMuki9KrawvRZ6uQ1nqW/D5or/iQUCoMXq', 'Nulla enim aliqua M', '08132712715', 'ND 1', 'Alumni', 'Qui eius alias labor', 0, '2024-03-31 12:38:22', '2024-03-31 12:38:22', 'No', 'No', 'Member', NULL, NULL, NULL),
(6, 's', 'Carrillo', NULL, 'femuky@mailinator.com', '$2y$10$2V8TiTgC.ig6a8unPk9xHuWG.g7f8oGZHAcSE6qpPOH0ZWCqCTrJC', 'Corrupti non ut omn', '08140464370', 'ND 2', 'Alumni', 'Quia dolorum aut non', 0, '2024-03-31 12:43:35', '2024-03-31 12:43:35', 'No', 'No', 'Member', NULL, NULL, NULL),
(7, 'K', 'Wise', NULL, 'lytumo@mailinator.com', '$2y$10$M6Mjg4zMwj7RBV99ZJQLH.g51yj/oGVGstLHeAre0J3RQQnoEpL9K', 'Odit dolor soluta op', '08175258603', 'ND 2', 'Alumni', 'Nesciunt lorem quis', 0, '2024-03-31 12:48:45', '2024-03-31 12:48:45', 'No', 'No', 'Member', NULL, NULL, NULL),
(8, 'Britanney', 'Dyer', NULL, 'kyxowufu@mailinator.com', '$2y$10$isa8sjctlsRzrRaEqJ2gueWzZGTjaEqbwJvKosyPkWMHJTSvs6sK.', 'Sit architecto conse', '08163030129', 'ND 2', 'Alumni', 'Est nemo pariatur', 2500, '2024-03-31 13:28:33', '2024-03-31 13:28:33', 'No', 'No', 'Member', NULL, NULL, NULL),
(9, 'Cameran', 'Zamora', NULL, 'zufe@mailinator.com', '$2y$10$Z1VQUCPe3TP195iimnwipeh4f8PP11mzlOgv95Bgy9DvSNsXOzWQu', 'Voluptates vel asper', '08127842056', 'ND 2', 'Alumni', 'Sint veritatis eos', 2500, '2024-03-31 14:16:10', '2024-03-31 14:16:10', 'No', 'No', 'Member', NULL, NULL, NULL),
(10, 'Fallon', 'Webster', NULL, 'delipy@mailinator.com', '$2y$10$DIPy4DR3MRsDAPlgaeHhYu8L4ikaaRHiKzxYprm8OVJRVzgYTz9ai', 'Ab veniam irure err', '08175994809', 'HND 3', 'Alumni', 'Quasi nostrud ad in', 2500, '2024-03-31 14:22:30', '2024-03-31 14:22:30', 'No', 'No', 'Member', NULL, NULL, NULL),
(11, 'Nevada', 'Landry', NULL, 'bijurihub@mailinator.com', '$2y$10$K4Cq5Z.d70Lk.blKnNYSHeATCLpEUEsQcQS1hwlS9IOFLD7GBPrm2', 'Deserunt eveniet la', '08126691447', 'ND 2', 'Regular', 'Elit sed dolor cons', 2500, '2024-03-31 14:43:12', '2024-03-31 14:43:12', 'No', 'No', 'Member', NULL, NULL, NULL),
(12, 'Basil', 'Gilliam', NULL, 'fynydu@mailinator.com', '$2y$10$eLM2pELJcEetrEOzAJp3WO2VI4e2WHQCHRk1Oz9uaJar7WFRDrnAO', 'Ut eius unde commodo', '08111057794', 'HND 2', 'Part-time', 'Modi eius officiis q', 2500, '2024-03-31 15:46:04', '2024-03-31 15:46:04', 'No', 'No', 'Member', NULL, NULL, NULL),
(13, 'Yuri', 'Jones', NULL, 'xygatowa@mailinator.com', '$2y$10$bQX4G/DCY5jgR.uq4d01oOTEXqlyZMkiu.bYlK9XcGPYYH.MdqQNS', 'Voluptatem qui non o', '08102720693', 'HND 1', 'Regular', 'Quis et ipsum ad lab', 2500, '2024-03-31 14:48:13', '2024-03-31 14:48:13', 'No', 'No', 'Member', NULL, NULL, NULL),
(14, 'Julian', 'Mitchell', NULL, 'lelyz@mailinator.com', '$2y$10$od3OVWaRKNOaNdmVG4Wtou1j4QX/jmoUGslrZOZWGaodb4o26XreK', 'Deleniti cumque sed', '08111223969', 'HND 3', 'Part-time', 'Quia veniam reprehe', 2500, '2024-03-31 14:48:46', '2024-03-31 14:48:46', 'No', 'No', 'Member', NULL, NULL, NULL),
(15, 'Nasimfp', 'Solomonf55', 'lawis30', 'juki@mailinator.com', '$2y$10$TZJx.DG.xhtJjfTgx2AaC.GdXPasr/9sYNeD0vZlno6tbi6YwJbJm', '12/124/221', '08145858571', 'ND 1', 'Regular', 'Aute in animi facil', 2500, '2024-03-31 14:49:28', '2024-04-02 14:00:40', 'No', 'No', 'Member', 'i am a cool guy3331', '2024-04-12', 'profile_images/1795131603114472.png'),
(16, 'Alexa', 'Kennedy', NULL, 'wikisyr@mailinator.com', '$2y$10$CBS82C5phDx5P4V.kkhNkevl/I2X4Ot.DgWOYrJL1Z4b7xLq.qPdW', 'Officia dolore quis', '08106105026', 'ND 1', 'Regular', 'Non voluptatem exer', 2500, '2024-03-31 14:52:11', '2024-03-31 14:52:11', 'No', 'No', 'Member', NULL, NULL, NULL),
(17, 'Halla', 'Osborne', NULL, 'tewoqofoj@mailinator.com', '$2y$10$XHe0bhBImJVE.0HsHqj4mes7ipdymG1M09V/L81SPwu.lemIjzcny', 'Veritatis minim quib', '08188262776', 'HND 1', 'Alumni', 'Excepturi rerum porr', 2500, '2024-03-31 15:24:16', '2024-03-31 15:24:16', 'No', 'No', 'Member', NULL, NULL, NULL),
(18, 'Tanner', 'Chandler', NULL, 'bacymyco@mailinator.com', '$2y$10$uEk1vZ9VtmcyzeAiy7ZwKOIqF5sISwRgFHSDQg8fokSMFtZfpHFxy', 'Esse at incididunt d', '08136481920', 'ND 2', 'Regular', 'Architecto fugiat is', 2500, '2024-03-31 15:43:40', '2024-03-31 15:43:40', 'No', 'No', 'Member', NULL, NULL, NULL),
(19, 'Heather', 'Grimes', NULL, 'dusop@mailinator.com', '$2y$10$fou.cnhwjgkcNuzuTD5iCeoraRPLQMhwjjq9BUifiktoYqKQjd2r6', 'Officiis aperiam eiu', '08129182867', 'HND 2', 'Part-time', 'Porro dolor voluptas', 2500, '2024-03-31 15:45:13', '2024-03-31 15:45:13', 'No', 'No', 'Member', NULL, NULL, NULL),
(20, 'Buffy', 'Juarez', NULL, 'qepy@mailinator.com', '$2y$10$vyjl9RhtO4XOWJ6C2ZmoIuF2/NP2.s/NwvRWOwnwcfTXZ0bEijJOi', 'Qui aut qui veniam', '08124764089', 'HND 2', 'Part-time', 'Minima eveniet mole', 2500, '2024-03-31 15:46:42', '2024-03-31 15:46:42', 'No', 'No', 'Member', NULL, NULL, NULL),
(21, 'Rhoda', 'Henry', NULL, 'hecar@mailinator.com', '$2y$10$0h3sYTflzi.e12fPVWJ2BeOsmMtID7v/lIGQURwjLDd./zSinfGeu', 'Itaque harum eum aut', '08133023441', 'HND 2', 'Alumni', 'Et quos sed in sapie', 2500, '2024-03-31 15:50:44', '2024-03-31 15:50:44', 'No', 'No', 'Member', NULL, NULL, NULL),
(22, 'Fallon', 'English', NULL, 'giculysyq@mailinator.com', '$2y$10$g7hPUTEUgLO.zatewrkujuxKaWoQgI92WRIqYhmiuhzs118gE0tMK', 'Do optio nobis qui', '08187172808', 'HND 2', 'Alumni', 'Aute qui est illum', 2500, '2024-03-31 15:55:31', '2024-03-31 15:55:31', 'No', 'No', 'Member', NULL, NULL, NULL),
(23, 'Pandora', 'Koch', NULL, 'madu@mailinator.com', '$2y$10$ub/1PdV6gyi5ITTQFFSX9uk3GwWoxre/rJNEjyGnKUDhZqM3/qMgC', 'Officia veniam aut', '08143578681', 'HND 1', 'Part-time', 'Excepturi impedit c', 2500, '2024-03-31 15:57:26', '2024-03-31 15:57:26', 'No', 'No', 'Member', NULL, NULL, NULL),
(24, 'Avye', 'Macias', NULL, 'totel@mailinator.com', '$2y$10$tKn7ITvZuT6mjYdU77rJw.vp9yZYOND6A7BtKeqjncf.PegxqeLTu', 'Exercitationem rerum', '08103277602', 'ND 1', 'Part-time', 'Cupiditate mollit oc', 2500, '2024-03-31 17:38:09', '2024-03-31 17:38:09', 'No', 'No', 'Member', NULL, NULL, NULL),
(25, 'Gillian', 'Aguirre', NULL, 'gydunit@mailinator.com', '$2y$10$.j8be5/2jDPkqxDvAv1Ssumd9aA4rem8bC/NWRDy52RHTxBUrRTGG', 'Excepturi labore cul', '08171131982', 'ND 2', 'Alumni', 'Duis velit nihil tem', 2500, '2024-03-31 17:39:48', '2024-03-31 17:39:48', 'No', 'No', 'Member', NULL, NULL, NULL),
(26, 'Mallory', 'Solomon', NULL, 'vosoreru@mailinator.com', '$2y$10$7lkTkdc.BXh4VPAUeOfma.9ZoCrMNlF1cfIdDiSUnGv5r8nD2Zq2e', 'Ipsam repellendus M', '08195754856', 'HND 2', 'Regular', 'Velit dolor magni f', 2500, '2024-03-31 17:42:30', '2024-03-31 17:42:30', 'No', 'No', 'Member', NULL, NULL, NULL),
(27, 'Stacy', 'Wheeler', NULL, 'zovexyxib@mailinator.com', '$2y$10$2PYPSCPtOXMvmal22u4uKuvu6pOLYiuqy.fsddUx4pL7q4Y5QA06W', 'Quasi ratione ea occ', '08176917809', 'ND 1', 'Regular', 'Quis dolores atque v', 2500, '2024-03-31 17:43:32', '2024-03-31 17:43:32', 'No', 'No', 'Member', NULL, NULL, NULL),
(28, 'Seth', 'Tyler', NULL, 'musedeqyhi@mailinator.com', '$2y$10$xreOBT0dYM6av2LSgcF09OyBJu75KAREIzUlpl5hK5zN41YXJVqcS', 'Nostrum nihil ad ist', '08133924357', 'HND 3', 'Regular', 'Sit ullamco inventor', 2500, '2024-03-31 17:44:07', '2024-03-31 17:44:07', 'No', 'No', 'Member', NULL, NULL, NULL),
(29, 'Aubrey', 'Collier', NULL, 'vysowebeji@mailinator.com', '$2y$10$pFiN74Rl.LbnF5nr2dSZkucUtVDj0EKm9auaeeBOle2WH4lfUx1m6', 'Ut velit ullam saep', '08119328889', 'HND 3', 'Part-time', 'Necessitatibus quia', 2500, '2024-03-31 17:45:31', '2024-03-31 17:45:31', 'No', 'No', 'Member', NULL, NULL, NULL),
(30, 'Eaton', 'Warren', NULL, 'dece@mailinator.com', '$2y$10$3bpUXqkU806keqxqf6hwOuvOUxuOpehm/g8uniF8KGYAnt26bOvGq', 'Autem aute deserunt', '08195723023', 'HND 1', 'Part-time', 'Tenetur ea eaque par', 2500, '2024-03-31 17:46:23', '2024-03-31 17:46:23', 'No', 'No', 'Member', NULL, NULL, NULL),
(31, 'Minerva', 'Cannon', NULL, 'kyhefygut@mailinator.com', '$2y$10$oi6MbiQdi3hdIXmsMX.Lger.5ylCeS3ipO4.yHimFEeCo2WGsA87u', 'Sunt officia facili', '08162702228', 'HND 2', 'Regular', 'Pariatur Omnis ea c', 2500, '2024-03-31 17:47:04', '2024-03-31 17:47:04', 'No', 'No', 'Member', NULL, NULL, NULL),
(32, 'Elvis', 'Dudley', NULL, 'wyget@mailinator.com', '$2y$10$lvTuzeNw7Yb8zPPPoD.qfOtc.DHOogqnzU35rHzTH9c50bXxSn9vO', 'Do dolor obcaecati v', '08104986824', 'HND 2', 'Alumni', 'Consequatur Vel qua', 2500, '2024-03-31 17:48:51', '2024-03-31 17:48:51', 'No', 'No', 'Member', NULL, NULL, NULL),
(33, 'Flavia', 'Blair', NULL, 'fegibyn@mailinator.com', '$2y$10$cACLDEgHkvaroyrr4BRIqefy/ObypODKftR94B0OxKUIdybb053r6', 'Enim ut laudantium', '08188178195', 'HND 1', 'Part-time', 'Minim voluptatem tot', 2500, '2024-03-31 21:13:05', '2024-03-31 21:13:05', 'No', 'No', 'Member', NULL, NULL, NULL),
(34, 'Camden', 'Mckay', NULL, 'hodulelej@mailinator.com', '$2y$10$eXa5bMPHg10DJHY3QCY7Zem9bN45DpqBluPGyE4p57X7HbCSYHVRi', 'Ut ut ad nulla ut in', '08116859636', 'ND 2', 'Regular', 'Soluta do consectetu', 2500, '2024-03-31 21:14:03', '2024-03-31 21:14:03', 'No', 'No', 'Member', NULL, NULL, NULL),
(35, 'Shelley', 'Harmon', NULL, 'tidysuk@mailinator.com', '$2y$10$7qrfEPFPMhdFHL27kLckzeAtAC6d5vnZtDJLUUiHUnWPJausQBR1e', 'Deserunt ab totam vo', '08191627157', 'ND 2', 'Part-time', 'Dolorum error autem', 2500, '2024-03-31 21:14:38', '2024-03-31 21:14:38', 'No', 'No', 'Member', NULL, NULL, NULL),
(36, 'Eden', 'Jacobs', NULL, 'zidaw@mailinator.com', '$2y$10$qB3i9.yHo6PgY96IcMofsOy9SFJEj5LGJ4x95lrLji9eb3M8unbWe', 'Qui esse incididunt', '08141410646', 'ND 2', 'Regular', 'Non saepe et sint vo', 2500, '2024-03-31 21:19:37', '2024-03-31 21:19:37', 'No', 'No', 'Member', NULL, NULL, NULL),
(37, 'Cheryl', 'Raymond', NULL, 'rijokuhob@mailinator.com', '$2y$10$LMccJpH1mzYw3xIB3d8QCOi8qxAzLyJTuSE2eZ0Zql3JcKcIt5dSi', 'Esse quae quia repu', '08146440047', 'HND 1', 'Alumni', 'Aut natus quo commod', 2500, '2024-03-31 21:21:57', '2024-03-31 21:21:57', 'No', 'No', 'Member', NULL, NULL, NULL),
(38, 'Mia', 'Walls', NULL, 'fyba@mailinator.com', '$2y$10$gZ.qCKPXuZGKgJU90n9HXuHk3dX/rAf5nSQB098Nr3ddfVRCItrpC', 'Ad ut in excepteur i', '08168048374', 'ND 2', 'Regular', 'Totam enim nisi simi', 2500, '2024-03-31 21:22:49', '2024-03-31 21:22:49', 'No', 'No', 'Member', NULL, NULL, NULL),
(39, 'Sandra', 'West', NULL, 'petyquqemy@mailinator.com', '$2y$10$7MEmnaxyJj1TM1VT0oK7f.MF4xNE/gzTAI/KQHVt2lyNrbI7UZT/O', 'Quia aliqua Est qua', '08139570033', 'HND 2', 'Part-time', 'Do optio aut dolor', 2500, '2024-03-31 21:28:14', '2024-03-31 21:28:14', 'No', 'No', 'Member', NULL, NULL, NULL),
(40, 'Samson', 'Mccoy', NULL, 'syloq@mailinator.com', '$2y$10$BLAS2r.fKwuhRD47CKlV6.koqEBCtHK0aHjckVWDv9aTouGyAcoKK', 'Pariatur Labore est', '08136008595', 'HND 3', 'Part-time', 'At numquam aute debi', 2500, '2024-03-31 21:28:34', '2024-03-31 21:28:34', 'No', 'No', 'Member', NULL, NULL, NULL),
(41, 'Preston', 'Riddle', NULL, 'jonedafi@mailinator.com', '$2y$10$5l1kUv.mezCFLUBNtP3H3.NPblfcx3xv8t0.mQT/a5kj724/mEh5a', 'Quisquam est molest', '08164460438', 'ND 2', 'Alumni', 'Corporis esse autem', 2500, '2024-03-31 21:31:12', '2024-03-31 21:31:12', 'No', 'No', 'Member', NULL, NULL, NULL),
(42, 'Chandler', 'Nichols', NULL, 'jiqurigi@mailinator.com', '$2y$10$gDGPkYt6FGUdH.PxFTHRz.SkeTdeayoJL7OK5qEwCwo7PnBsbiaWy', 'At veniam quis fugi', '08151158912', 'ND 2', 'Alumni', 'Voluptatem dignissim', 2500, '2024-03-31 21:33:45', '2024-03-31 21:33:45', 'No', 'No', 'Member', NULL, NULL, NULL),
(43, 'Aaron', 'Hartman', NULL, 'duzavaloqy@mailinator.com', '$2y$10$m4dCu2TaFSGXmG7FLfruEubV9P2tV9xtR7F1SGVIk/OIgou9pO3wa', 'Sit non praesentium', '08130951503', 'HND 2', 'Regular', 'Corrupti minus aliq', 2500, '2024-03-31 21:36:26', '2024-03-31 21:36:26', 'No', 'No', 'Member', NULL, NULL, NULL),
(44, 'Charlotte', 'Charles', NULL, 'giqef@mailinator.com', '$2y$10$6fcmli7c09UMSz49DcljnuApAV.UU9S0xH0fiCxj.z430IehNMLVu', 'Inventore nisi assum', '08144333879', 'HND 3', 'Part-time', 'Corporis nihil elige', 2500, '2024-03-31 21:38:06', '2024-03-31 21:38:06', 'No', 'No', 'Member', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_about`
--

CREATE TABLE `web_about` (
  `id` int NOT NULL,
  `body` text,
  `image` varchar(255) DEFAULT NULL,
  `text` text,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_benefits`
--

CREATE TABLE `web_benefits` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `icon` varchar(150) DEFAULT NULL,
  `text` text,
  `position` int NOT NULL DEFAULT '1',
  `image` varchar(150) DEFAULT NULL,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_colours`
--

CREATE TABLE `web_colours` (
  `name` varchar(50) DEFAULT NULL,
  `colour` varchar(50) DEFAULT NULL,
  `id` int NOT NULL,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_counters`
--

CREATE TABLE `web_counters` (
  `id` int NOT NULL,
  `icon` varchar(100) NOT NULL,
  `count` int DEFAULT '0',
  `text` varchar(100) DEFAULT NULL,
  `position` int NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_cta`
--

CREATE TABLE `web_cta` (
  `id` int NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `button_text` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_events`
--

CREATE TABLE `web_events` (
  `id` int NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `short_text` varchar(150) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `long_text` text,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `position` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_excos`
--

CREATE TABLE `web_excos` (
  `id` int NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `post` varchar(150) DEFAULT NULL,
  `position` int NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_hearders`
--

CREATE TABLE `web_hearders` (
  `id` int NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `site_name` varchar(100) DEFAULT NULL,
  `support_phone` varchar(20) DEFAULT NULL,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_registration`
--

CREATE TABLE `web_registration` (
  `id` int NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_resources`
--

CREATE TABLE `web_resources` (
  `id` int NOT NULL,
  `icon` varchar(150) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `position` int NOT NULL DEFAULT '1',
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_sliders`
--

CREATE TABLE `web_sliders` (
  `id` int NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `caption` varchar(100) DEFAULT NULL,
  `text` text,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `position` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_testimonials`
--

CREATE TABLE `web_testimonials` (
  `id` int NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `picture` varchar(150) DEFAULT NULL,
  `testimony` text,
  `position` int NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_vissions`
--

CREATE TABLE `web_vissions` (
  `id` int NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `icon` varchar(150) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `position` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_sessions`
--
ALTER TABLE `academic_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_settings`
--
ALTER TABLE `price_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- Indexes for table `web_about`
--
ALTER TABLE `web_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_benefits`
--
ALTER TABLE `web_benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_colours`
--
ALTER TABLE `web_colours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_counters`
--
ALTER TABLE `web_counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_cta`
--
ALTER TABLE `web_cta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_events`
--
ALTER TABLE `web_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_excos`
--
ALTER TABLE `web_excos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_hearders`
--
ALTER TABLE `web_hearders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_registration`
--
ALTER TABLE `web_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_resources`
--
ALTER TABLE `web_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_sliders`
--
ALTER TABLE `web_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_testimonials`
--
ALTER TABLE `web_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_vissions`
--
ALTER TABLE `web_vissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_sessions`
--
ALTER TABLE `academic_sessions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_settings`
--
ALTER TABLE `price_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `web_about`
--
ALTER TABLE `web_about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_benefits`
--
ALTER TABLE `web_benefits`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_colours`
--
ALTER TABLE `web_colours`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_counters`
--
ALTER TABLE `web_counters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_cta`
--
ALTER TABLE `web_cta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_events`
--
ALTER TABLE `web_events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_excos`
--
ALTER TABLE `web_excos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_hearders`
--
ALTER TABLE `web_hearders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_registration`
--
ALTER TABLE `web_registration`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_resources`
--
ALTER TABLE `web_resources`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_sliders`
--
ALTER TABLE `web_sliders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_testimonials`
--
ALTER TABLE `web_testimonials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_vissions`
--
ALTER TABLE `web_vissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
