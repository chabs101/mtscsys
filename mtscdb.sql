-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 02:05 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtscdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dt_user`
--

CREATE TABLE `dt_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_me` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isdeleted` decimal(10,0) DEFAULT 0,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `dt_user`
--

INSERT INTO `dt_user` (`user_id`, `username`, `first_name`, `last_name`, `gender`, `image_url`, `password`, `remember_me`, `created_at`, `updated_at`, `isdeleted`, `isAdmin`, `role_id`) VALUES
(1, 'admin', 'Administrator', 'Administrator', 'Male', NULL, '$2y$10$Ry49zKSBEOda831R/mDqjuxCSzN1O/dpj.J8rg15.gAT7ke.muENK', NULL, '2020-01-31 12:09:26', '2020-01-31 16:55:43', '0', 1, 1),
(2, 'tester', 'Administrator', 'Administrator', 'Male', 'pbvc_2020-10-25_tester.jpg', '$2y$10$duWY9H5SXGuHq7fvOPfFlueGF6DktQdD7BUJwWoKArdRIMrP2h0fq', '7b8b974b1f28a49ab74fd176f4966ce7fca362846771a717dc821dd4607c75d4', '2020-01-31 12:09:26', '2020-10-25 07:40:32', '0', 0, 2),
(3, 'test', 'test', 'test', 'Male', NULL, '$2y$10$1zP/ph/JAhXzPuD/H0cXo.I3XbO6NBALkBqIGat1wbFcb0VOWVkT2', NULL, '2020-08-10 14:33:38', '2020-09-17 04:32:52', '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seed_collection`
--

CREATE TABLE `seed_collection` (
  `seed_collection_id` int(11) NOT NULL,
  `prefix_id` varchar(11) DEFAULT NULL,
  `species_name` varchar(255) DEFAULT NULL,
  `botanical_name` varchar(255) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `lat` decimal(11,7) DEFAULT NULL,
  `longi` decimal(11,7) DEFAULT NULL,
  `alt` int(11) DEFAULT NULL,
  `seedlot_no` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `provenance_name_db` varchar(255) DEFAULT NULL,
  `ph_climatic_type` varchar(255) DEFAULT NULL,
  `map_name` varchar(255) DEFAULT NULL,
  `habitat` varchar(255) DEFAULT NULL,
  `veg_struct` varchar(255) DEFAULT NULL,
  `sp_freq` varchar(255) DEFAULT NULL,
  `slope` varchar(255) DEFAULT NULL,
  `seed_crop` varchar(255) DEFAULT NULL,
  `bud` varchar(255) DEFAULT NULL,
  `flower` varchar(255) DEFAULT NULL,
  `soil_struct` varchar(255) DEFAULT NULL,
  `ph` varchar(255) DEFAULT NULL,
  `geo_alluv` varchar(255) DEFAULT NULL,
  `predation_status` varchar(255) NOT NULL,
  `root_sucker` varchar(255) DEFAULT NULL,
  `coppice` varchar(255) DEFAULT NULL,
  `team` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `seed_weight` double DEFAULT NULL,
  `viab` varchar(255) DEFAULT NULL,
  `seed_date` date DEFAULT NULL,
  `collect_as_bulk` varchar(255) DEFAULT NULL,
  `individuals` double(255,0) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `isdeleted` decimal(10,0) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seed_collection`
--

INSERT INTO `seed_collection` (`seed_collection_id`, `prefix_id`, `species_name`, `botanical_name`, `location`, `lat`, `longi`, `alt`, `seedlot_no`, `region`, `provenance_name_db`, `ph_climatic_type`, `map_name`, `habitat`, `veg_struct`, `sp_freq`, `slope`, `seed_crop`, `bud`, `flower`, `soil_struct`, `ph`, `geo_alluv`, `predation_status`, `root_sucker`, `coppice`, `team`, `description`, `seed_weight`, `viab`, `seed_date`, `collect_as_bulk`, `individuals`, `created_at`, `updated_at`, `isdeleted`) VALUES
(1, '00001', 'asdsadasd', 'asdsadd', 'asdasdsa', '123.1231000', '123.2222200', 1, 'asd-1saa-1ad', '01', '', '', 'esmelet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'asdsa', 0, '11', '2020-08-21', '0', 0, '2020-08-24 20:24:11', '2020-08-24 20:24:11', '0'),
(2, '00002', 'xxxxxxxxxxxxx', 'xxxxxxxxxxx', 'botanical name', '1.0000000', '1.0000000', 1, 'asd-xsss-1ad', '02', '', '', 'asdasd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2020-08-24', '', 0, '2020-08-24 20:24:23', '2020-08-24 20:24:23', '0'),
(3, '00003', 'yyyyyyy', 'yyy yyyyyyyy', 'botanical shet', '1.0000000', '1.0000000', 1, 'dsa-xsss-12as', '03', 'sadas', 'typekita', 'asdas', 'asdas', 'asdas', '1', 'asda', '1', '1', '1', 'asda', '111', 'asdasdsad', 'asdada', 'adasdas', 'asda', '', '', 0, '', '2020-08-21', '', 0, '2020-08-24 20:24:31', '2020-08-24 20:24:31', '0'),
(4, '00004', 'this is test', 'laksdaskl', 'asdsa', '1.0000000', '1.0000000', 1, 'askldlaskd', '01', '', '', 'map test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2020-08-24', '', 0, '2020-08-24 20:24:54', '2020-08-24 20:24:54', '0'),
(5, '00005', 'this is tester', 'botanical name test', 'mnl qc', '0.0000000', '0.0000000', 0, 'test-1231-no', 'NCR', '', '', 'test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2020-08-11', '', 0, '2020-08-24 20:24:07', '2020-08-24 20:24:07', '0'),
(6, '00006', 'asdkasldkaldlka', 'test', 'alsdkaskldas', '0.0000000', '0.0000000', 1, 'asda-1asds-asd', 'BARMM', '', '', 'asa', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2020-08-12', '', 0, '2020-08-24 20:23:55', '2020-08-24 20:23:55', '0'),
(7, '00007', 'meowk', 'species', 'now', '0.0000000', '0.0000000', 11, '123-1213', '4A', '', '', 'asd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2020-08-10', '', 0, '2020-08-24 20:23:37', '2020-08-24 20:23:37', '0'),
(8, NULL, '', '', '', '0.0000000', '0.0000000', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '0000-00-00', NULL, NULL, '2020-08-10 18:12:18', '2020-08-10 18:12:18', '1'),
(9, NULL, '', '', '', '0.0000000', '0.0000000', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '0000-00-00', NULL, NULL, '2020-08-10 18:12:50', '2020-08-10 18:12:50', '1'),
(10, NULL, '', '', '', '0.0000000', '0.0000000', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '0000-00-00', NULL, NULL, '2020-08-10 18:12:54', '2020-08-10 18:12:54', '1'),
(11, NULL, 'asdasdsa', '', '', '0.0000000', '0.0000000', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '0000-00-00', NULL, NULL, '2020-08-10 18:12:59', '2020-08-10 18:12:59', '1'),
(12, NULL, 'asdasdsa', '', '', '0.0000000', '0.0000000', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '0000-00-00', NULL, NULL, '2020-08-10 18:12:46', '2020-08-10 18:12:46', '1'),
(13, '00013', 'species test', 'botanical test', 'loc test', '41.0473100', '127.0000000', 555, 'seed-test-123', '01', 'test prov', 'test climatic type', 'test map', 'habitat test', 'test veg', 'test freq', 'test slope', 'test seed crop', 'test bud ', 'test flowers', 'test struct', '12', 'test geology', 'test pred status', 'test root sucker', 'coppice test', '', 'test desc', 0, '', '2020-08-11', 'test', 5, '2020-08-24 20:20:56', '2020-08-24 20:20:56', '0'),
(14, '00014', 'askldaskldsakl test', 'askldaskldsakl test', 'asdasd', '1.0000000', '11.0000000', 1, 'aslkdaskl test', '01', '', '', 'adsa', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2020-08-24', '', 0, '2020-08-24 20:14:53', '2020-08-24 20:14:53', '0'),
(15, '00015', 'aslkdaskl', 'askldsakl', 'aklsdaslkdakl', '11.0000000', '111.0000000', 111, 'askdlsakl', '4A', '', '', 'asdas', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2020-08-24', '', 0, '2020-08-24 20:29:59', '2020-08-24 20:29:59', '0'),
(16, '00016', 'lkasdlksadkl', 'lkasldkaskldkl', 'asdklsaldk', '1.0000000', '1.0000000', 1, 'askldsakld', '4A', '', '', 'askldaskl', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2020-08-31', '', 0, '2020-08-24 20:30:25', '2020-08-24 20:30:25', '0'),
(17, '00017', 'asdasdad', 'asdasd', 'asdasd', '1.0000000', '1.0000000', 1, 'asdasdad', '01', '', '', 'asdas', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2020-08-25', '', 0, '2020-08-25 07:01:38', '2020-08-25 07:01:38', '0'),
(18, '00018', 'Sssa', 'Ssss', 'Zzz', '1.0000000', '1.0000000', 1, 'Sss', '4A', '', '', 'Ss', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2020-08-25', '', 0, '2020-08-25 08:53:41', '2020-08-25 08:53:41', '0'),
(19, '00019', 'FALCATA', 'FALCATARIA', 'San Roque, Bislig City', '12.5750000', '474.4400000', 425, '0111', '13', '', '', 'Surigao', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2020-07-29', '', 1, '2020-08-25 09:06:47', '2020-08-25 09:06:47', '0'),
(20, NULL, 'FALCATA', 'FALCATARIA', 'San Roque, Bislig City', '12.5750000', '474.4400000', 425, '0111', '13', '', '', 'Surigao', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2020-07-29', '', 1, '2020-08-25 09:28:05', '2020-08-25 09:28:05', '1'),
(21, NULL, 'FALCATA', 'FALCATARIA', 'San Roque, Bislig City', '12.5750000', '474.4400000', 425, '0111', '13', '', '', 'Surigao', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2020-07-29', '', 1, '2020-08-25 09:27:59', '2020-08-25 09:27:59', '1'),
(22, NULL, 'FALCATA', 'FALCATARIA', 'San Roque, Bislig City', '12.5750000', '474.4400000', 425, '0111', '13', '', '', 'Surigao', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2020-07-29', '', 1, '2020-08-25 09:27:51', '2020-08-25 09:27:51', '1'),
(23, NULL, 'FALCATA', 'FALCATARIA', 'San Roque, Bislig City', '12.5750000', '474.4400000', 425, '0111', '13', '', '', 'Surigao', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2020-07-29', '', 1, '2020-08-25 09:27:39', '2020-08-25 09:27:39', '1'),
(24, '00024', 'Dds', 'S', 'Zz', '1.0000000', '1.0000000', 1, 'Sss', '4B', 'N/A', 'N/A', 'Ss', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '', 'N/A', '1', 'N/A', 'N/A', '', '', '', '', 0, '', '2020-08-25', 'N/A', 0, '2020-08-25 09:07:18', '2020-08-25 09:07:18', '0'),
(25, '00025', 'Ggg', 'Gggggg', 'Ggg', '8.0000000', '5.0000000', 9, 'Gggg', 'NCR', '', '', 'Qfhdqhafh', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2020-08-25', '', 0, '2020-08-25 12:36:30', '2020-08-25 12:36:30', '0'),
(26, '00026', 'Bagras', 'Bayabas', 'San Roque, Bislig City', '123.2500000', '85.2000000', 125, '205', '13', '', '', 'Bislig City', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2020-08-05', '', 0, '2020-08-26 01:06:55', '2020-08-26 01:06:55', '0'),
(27, '00027', 'test falcata', 'test falcata', 'test falcata', '1.0000000', '1.0000000', 1, 'test falcata', '02', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '1', 'n/a', 'n/a', 'n/a', 'n/a', '', 'asdasdaskldakld', 0, 'asdasd', '2020-08-26', 'asdasd', 0, '2020-08-26 01:17:39', '2020-08-26 01:17:39', '0'),
(28, '00028', 'Manguim', 'manguim', 'San Roque, Bislig City', '241.6600000', '125.5550000', 254, '125', '13', 'N/A', 'N/A', 'Surigao', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '1', 'N/A', 'N/A', 'N/A', 'N/A', '', 'N/A', 0, '', '2020-08-04', '', 0, '2020-08-26 01:39:01', '2020-08-26 01:39:01', '0'),
(29, NULL, 'Manguim', 'manguim', 'San Roque, Bislig City', '241.6600000', '125.5550000', 254, '125', '13', 'N/A', 'N/A', 'Surigao', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '1', 'N/A', 'N/A', 'N/A', 'N/A', '', 'N/A', 0, '', '2020-08-04', '', 0, '2020-08-26 03:51:25', '2020-08-26 03:51:25', '1'),
(30, '00030', 'Mankono', 'Xathosthemon verdugoniaanus', 'San Roque, Bislig City', '124.2500000', '165.2500000', 165, '120', '13', 'N/A', 'N/A', 'Bislig City', '', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '1', 'N/A', 'N/A', 'N/A', 'N/A', '', 'N/A', 0, 'N/A', '2020-08-06', 'N/A', 0, '2020-08-26 02:50:57', '2020-08-26 02:50:57', '0'),
(31, '00031', 'asdsad', 'asdlkadlk', 'asdsa', '1.0000000', '1.0000000', 1, 'lkasldkasldk', '12', 'asdad', 'sadsa', 'asdasdsad', '', 'asdasd', 'asdas', 'asd', 'asd', 'asd', 'dsa', 'sadasd', '1', 'asdad', 'asd', 'asd', 'asd', '', 'asdasdad', 11, 'asdasd', '2020-09-03', 'asdasd', 55, '2020-08-27 02:01:09', '2020-08-27 02:01:09', '0'),
(32, '00032', 'klasdklasdkl', 'lkaslkdaskld', 'askldakld', '1.0000000', '1.0000000', 1, 'lkklasdklaskl', '01', 'asdasd', 'asdsa', '', '', 'asdasd', 'asdsad', 'asdad', 'asdasd', 'asdasd', 'asdsad', 'asdsad', '111', 'asdas', 'asdasd', 'asdasd', 'd', 'MTSC STAFF', '', 0, '', '2020-08-20', 'asdsa', 111, '2020-11-23 02:13:36', '2020-11-23 02:13:36', '0');

-- --------------------------------------------------------

--
-- Table structure for table `seed_collection_other`
--

CREATE TABLE `seed_collection_other` (
  `seed_collection_other_id` int(11) NOT NULL,
  `seed_collection_id` int(11) DEFAULT NULL,
  `tree_no` varchar(11) DEFAULT NULL,
  `consignee_date` date DEFAULT NULL,
  `consignee` varchar(255) DEFAULT NULL,
  `released` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `isdeleted` decimal(10,0) DEFAULT 0,
  `barcode` varchar(255) DEFAULT NULL,
  `collection` varchar(255) DEFAULT NULL,
  `mc` varchar(255) DEFAULT NULL,
  `purity` varchar(255) DEFAULT NULL,
  `viab` varchar(255) DEFAULT NULL,
  `seed_count` decimal(10,0) DEFAULT NULL,
  `seed_weight` decimal(10,0) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `cont_no` decimal(10,0) DEFAULT NULL,
  `bag_no` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `age_` decimal(10,0) DEFAULT NULL,
  `dbh` decimal(10,0) DEFAULT NULL,
  `form_` varchar(255) DEFAULT NULL,
  `den` decimal(10,0) DEFAULT NULL,
  `branch` decimal(10,0) DEFAULT NULL,
  `width_` decimal(10,0) DEFAULT NULL,
  `mh_` decimal(10,0) DEFAULT NULL,
  `th_` decimal(10,0) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viab_percent` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `seed_collection_other`
--

INSERT INTO `seed_collection_other` (`seed_collection_other_id`, `seed_collection_id`, `tree_no`, `consignee_date`, `consignee`, `released`, `balance`, `created_at`, `updated_at`, `isdeleted`, `barcode`, `collection`, `mc`, `purity`, `viab`, `seed_count`, `seed_weight`, `room`, `cont_no`, `bag_no`, `total`, `age_`, `dbh`, `form_`, `den`, `branch`, `width_`, `mh_`, `th_`, `description`, `viab_percent`) VALUES
(9, 32, 'cba-222', '0000-00-00', '', 0, 0, '2020-11-24 05:42:57', '2020-11-24 05:42:57', '0', '', '', '', '', '', '0', '0', '', '0', '0', '0', '0', '0', 'Round', '0', '0', '0', '0', '0', '', '11'),
(10, 32, 'cba-222', '0000-00-00', '', 100, 55, '2020-11-24 05:42:57', '2020-11-24 05:42:57', '0', '', '', '', '', '', '0', '11', '', '0', '0', '0', '0', '0', 'Circle', '0', '0', '0', '0', '0', '', '11');

-- --------------------------------------------------------

--
-- Table structure for table `seed_collection_prov`
--

CREATE TABLE `seed_collection_prov` (
  `seed_prov_id` int(11) NOT NULL,
  `seed_collection_id` int(11) DEFAULT NULL,
  `assoc_inc` varchar(255) DEFAULT NULL,
  `freq` varchar(255) DEFAULT NULL,
  `ht_m` varchar(255) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `isdeleted` decimal(10,0) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seed_collection_prov`
--

INSERT INTO `seed_collection_prov` (`seed_prov_id`, `seed_collection_id`, `assoc_inc`, `freq`, `ht_m`, `comments`, `created_at`, `updated_at`, `isdeleted`) VALUES
(1, 1, 'test', 'test', 'test', 'a', '2020-08-11 04:29:32', '2020-08-11 04:29:32', '0'),
(2, 1, 'testasdas', 'asdad', 'asda', 's', '2020-08-11 04:29:32', '2020-08-11 04:29:32', '0'),
(3, 3, 'test', 'test', 'test', '', '2020-08-09 04:48:50', '2020-08-09 04:48:50', '0'),
(4, 3, 'testasdas', 'meowk', 'asda', 'asdasda', '2020-08-09 04:48:50', '2020-08-09 04:48:50', '0'),
(5, 3, 'askdlaskl', '1', '1', 'asdas', '2020-08-09 04:48:50', '2020-08-09 04:48:50', '0'),
(6, 2, '22222222', 'test', 'test', 's', '2020-08-08 14:46:52', '2020-08-08 14:46:52', '1'),
(7, 2, '222222', 'asdad', 'asda', '', '2020-08-08 14:46:52', '2020-08-08 14:46:52', '1'),
(8, 2, '22222222', 'test', 'test', '', '2020-08-08 14:23:59', '2020-08-08 14:23:59', '1'),
(9, 2, '222222', 'asdad', 'asda', '', '2020-08-08 14:23:59', '2020-08-08 14:23:59', '1'),
(10, 2, '', '', '', '', '2020-08-08 14:23:59', '2020-08-08 14:23:59', '1'),
(11, 2, '22222222', 'test', 'test', '', '2020-08-08 14:46:53', '2020-08-08 14:46:53', '1'),
(12, 2, '222222', 'asdad', 'asda', '', '2020-08-08 14:46:53', '2020-08-08 14:46:53', '1'),
(13, 0, '', '', '', '', '2020-08-08 14:41:37', '0000-00-00 00:00:00', '0'),
(14, 0, 'asda', '', '', '', '2020-08-08 14:41:37', '0000-00-00 00:00:00', '0'),
(15, 2, '22222222', 'test', 'test', '', '2020-08-08 14:43:49', '2020-08-08 14:43:49', '1'),
(16, 2, '222222', 'asdad', 'asda', '', '2020-08-08 14:43:49', '2020-08-08 14:43:49', '1'),
(17, 0, '', '', '', '', '2020-08-08 14:41:51', '0000-00-00 00:00:00', '0'),
(18, 0, 'asda', '', '', '', '2020-08-08 14:41:51', '0000-00-00 00:00:00', '0'),
(19, 2, '22222222', 'test', 'test', '', '2020-08-08 14:43:49', '2020-08-08 14:43:49', '1'),
(20, 2, '222222', 'asdad', 'asda', '', '2020-08-08 14:43:48', '2020-08-08 14:43:48', '1'),
(21, 0, '', '', '', '', '2020-08-08 14:41:57', '0000-00-00 00:00:00', '0'),
(22, 0, 'asda', '', '', '', '2020-08-08 14:41:57', '0000-00-00 00:00:00', '0'),
(23, 2, '22222222', 'test', 'test', '', '2020-08-08 14:46:53', '2020-08-08 14:46:53', '1'),
(24, 2, '222222', 'asdad', 'asda', '', '2020-08-08 14:46:53', '2020-08-08 14:46:53', '1'),
(25, 2, '22222222', 'test', 'test', '', '2020-08-08 14:46:53', '2020-08-08 14:46:53', '1'),
(26, 2, '222222', 'asdad', 'asda', '', '2020-08-08 14:46:53', '2020-08-08 14:46:53', '1'),
(27, 2, 'this is test', '', '', '', '2020-08-08 14:54:42', '2020-08-08 14:54:42', '0'),
(28, 2, 'jawa', '', '', '', '2020-08-08 14:54:42', '2020-08-08 14:54:42', '1'),
(29, 2, 'jawa lage', '', '', '', '2020-08-08 14:54:42', '2020-08-08 14:54:42', '1'),
(30, 2, 'normaaaaaaaaaaal', '', '', '', '2020-08-08 14:54:42', '2020-08-08 14:54:42', '0'),
(31, 2, 'all are good', '', '', '', '2020-08-08 14:54:42', '0000-00-00 00:00:00', '0'),
(32, 0, 'meowk', 'asldasd', 'asdasd', 'a', '2020-08-08 15:17:31', '0000-00-00 00:00:00', '0'),
(33, 4, 'asdasd', 'sadsad', 'asdasd', 's', '2020-08-08 15:17:31', '0000-00-00 00:00:00', '0'),
(34, 0, 'asdasd', 'asda', 'asdasd', 'a', '2020-08-08 15:18:17', '0000-00-00 00:00:00', '0'),
(35, 5, 'sasdasd', 'asdasd', 'asdad', 's', '2020-08-11 14:21:19', '2020-08-11 14:21:19', '0'),
(36, 6, 'asldkal', '1', 'asdsakl', '', '2020-08-08 15:23:23', '2020-08-08 15:23:23', '0'),
(37, 6, 'meowk', '', '', '', '2020-08-08 15:23:23', '0000-00-00 00:00:00', '0'),
(38, 1, 'asdasdas', 'alksdaskl', 'lkalskdlka', '3', '2020-08-11 04:29:32', '2020-08-11 04:29:32', '0'),
(39, 1, 'aksjdasjkdaskjdaskj', 'ajksdakjd', 'asjkdjkd', '2', '2020-08-11 04:29:32', '2020-08-11 04:29:32', '0'),
(40, 0, '', '', '', '', '2020-08-09 06:24:09', '0000-00-00 00:00:00', '0'),
(41, 7, 'asda', '', '', '', '2020-08-09 06:52:31', '2020-08-09 06:52:31', '0'),
(42, 7, '', '', '', '', '2020-08-09 06:52:19', '2020-08-09 06:52:19', '1'),
(43, 7, '', '', '', '', '2020-08-09 06:52:19', '2020-08-09 06:52:19', '1'),
(44, 7, '', '', '', '', '2020-08-09 06:52:19', '2020-08-09 06:52:19', '1'),
(45, 7, '', '', '', '', '2020-08-09 06:52:31', '0000-00-00 00:00:00', '0'),
(46, 7, 'asdasda', '', '', '', '2020-08-09 06:52:31', '0000-00-00 00:00:00', '0'),
(47, 5, 'meowk', '12', '32.5', 'asdas', '2020-08-11 14:21:19', '2020-08-11 14:21:19', '0'),
(48, 1, 'asjkdasjkd', 'jkdaskjdaskjd', 'jkasjkdajksdkj', '1', '2020-08-11 04:27:43', '2020-08-11 04:27:43', '1'),
(49, 1, 'asdsa', '', '', 'test', '2020-08-11 04:27:43', '2020-08-11 04:27:43', '1'),
(50, 1, '', '', '', '', '2020-08-11 04:27:43', '2020-08-11 04:27:43', '1'),
(51, 1, '', '', '', '', '2020-08-11 04:27:43', '2020-08-11 04:27:43', '1'),
(52, 1, 'last', '', '', '', '2020-08-11 04:29:32', '2020-08-11 04:29:32', '0'),
(53, 1, 'final', '', '', '', '2020-08-11 04:29:32', '2020-08-11 04:29:32', '0'),
(54, 13, 'tes', '1', '1', 'asd', '2020-08-15 11:26:35', '0000-00-00 00:00:00', '0'),
(55, 16, '', '', '', '', '2020-08-24 16:36:57', '2020-08-24 16:36:57', '0'),
(56, 31, '', '', '', '', '2020-08-26 18:12:28', '0000-00-00 00:00:00', '0'),
(57, 31, '', '', '', '', '2020-08-26 18:12:28', '0000-00-00 00:00:00', '0'),
(58, 32, 'asda', '1', '1', 'asda', '2020-11-24 04:52:08', '2020-11-24 04:52:08', '0'),
(59, 32, 'asda', '2', '2', 'asdas', '2020-11-22 02:48:21', '2020-10-24 23:50:47', '1'),
(60, 0, '', '', '', '', '2020-11-22 01:36:30', '2020-11-22 01:36:30', '0'),
(61, 32, 'asda', '1', '', '', '2020-11-24 04:52:08', '2020-11-24 04:52:08', '0'),
(62, 32, 'sadsa', '', '', '', '2020-11-24 04:52:08', '2020-11-24 04:52:08', '0'),
(63, 32, 'dd', '', '', '', '2020-11-22 18:14:56', '2020-11-22 17:27:38', '1'),
(64, 32, 'ddd', '', '', '', '2020-11-22 18:14:56', '2020-11-22 17:27:38', '1'),
(65, 32, 'asdsada', '', '', 'dsadsa', '2020-11-24 04:52:08', '2020-11-24 04:52:08', '0'),
(66, 32, 'asdsada', '', '', 'dsadsa', '2020-11-24 04:52:08', '2020-11-24 04:52:08', '0'),
(67, 32, '', '', '', '', '2020-11-24 04:52:08', '2020-11-24 04:52:08', '0');

-- --------------------------------------------------------

--
-- Table structure for table `seed_detailed_information`
--

CREATE TABLE `seed_detailed_information` (
  `detailed_info_id` int(11) NOT NULL,
  `seed_collection_id` int(11) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `date_assess` date DEFAULT NULL,
  `soil_type` varchar(255) DEFAULT NULL,
  `access_road` varchar(255) DEFAULT NULL,
  `total_area` varchar(255) DEFAULT NULL,
  `year_establish` year(4) DEFAULT NULL,
  `assoc_agri` varchar(255) DEFAULT NULL,
  `spacing` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isdeleted` decimal(10,0) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seed_detailed_information`
--

INSERT INTO `seed_detailed_information` (`detailed_info_id`, `seed_collection_id`, `owner`, `contact_no`, `date_assess`, `soil_type`, `access_road`, `total_area`, `year_establish`, `assoc_agri`, `spacing`, `remarks`, `created_at`, `updated_at`, `isdeleted`) VALUES
(1, 1, 'raneil chavez', '09187881105', '2020-08-13', 'test', 'test', '3', 2020, 'test', 'test', 'test', '2020-08-14 14:05:35', '2020-08-14 14:05:35', '0'),
(2, 17, 'asdsa', '012031203', '2020-08-25', '', '', '', 2020, '', '', '', '2020-08-24 23:14:21', '0000-00-00 00:00:00', '0'),
(0, 32, 'asda', '0918781105', '2020-11-23', '', '', '', 2020, '', '', 'Done', '2020-11-23 03:32:54', '2020-11-23 03:32:54', '0');

-- --------------------------------------------------------

--
-- Table structure for table `seed_record`
--

CREATE TABLE `seed_record` (
  `seed_record_id` int(255) NOT NULL,
  `seed_collection_id` int(11) DEFAULT NULL,
  `species_code` varchar(255) DEFAULT NULL,
  `store_code` varchar(255) DEFAULT NULL,
  `cost_code` varchar(255) DEFAULT NULL,
  `geo_n_soil` varchar(255) DEFAULT NULL,
  `bulk` varchar(255) DEFAULT NULL,
  `tree` varchar(255) DEFAULT NULL,
  `dbh` double DEFAULT NULL,
  `total_height` double DEFAULT NULL,
  `form` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `fumigation_method` varchar(255) DEFAULT NULL,
  `collector` varchar(255) DEFAULT NULL,
  `collector_no` varchar(255) DEFAULT NULL,
  `collection_date` datetime DEFAULT NULL,
  `project` varchar(255) DEFAULT NULL,
  `identified_by` varchar(255) DEFAULT NULL,
  `seed_condition` varchar(255) DEFAULT NULL,
  `storage` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `isdeleted` decimal(10,0) DEFAULT 0,
  `g_method` varchar(255) DEFAULT NULL,
  `g_from` date DEFAULT NULL,
  `g_to` date DEFAULT NULL,
  `g_viab` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `seed_record`
--

INSERT INTO `seed_record` (`seed_record_id`, `seed_collection_id`, `species_code`, `store_code`, `cost_code`, `geo_n_soil`, `bulk`, `tree`, `dbh`, `total_height`, `form`, `remarks`, `fumigation_method`, `collector`, `collector_no`, `collection_date`, `project`, `identified_by`, `seed_condition`, `storage`, `quantity`, `created_at`, `updated_at`, `isdeleted`, `g_method`, `g_from`, `g_to`, `g_viab`) VALUES
(1, 1, 'scode-321', '231', '123', 'asdasdad', '', '', 107.5, 19.3, '312', '', '', 'asdas', '0', '2020-08-18 00:00:00', 'asda', 'asda', 'asd', '18c to 22c', '11', '2020-08-14 06:25:17', '2020-08-14 06:25:17', '0', NULL, NULL, NULL, NULL),
(2, 5, 'asdsad', 'asdasd', 'asdsa', '', '', '', 0, 0, '', '', '', '', '0', '0000-00-00 00:00:00', '', '', '', '', '', '2020-08-10 13:39:26', '0000-00-00 00:00:00', '0', NULL, NULL, NULL, NULL),
(3, 6, '21312', '12321', '', '', '', '', 0, 0, '', '', '', '', '0', '0000-00-00 00:00:00', '', '', '', '3Â°c to 5Â°c', '', '2020-08-11 02:35:53', '2020-08-11 02:35:53', '0', NULL, NULL, NULL, NULL),
(4, 7, 'asdd', 'asdsa', '', '', '', '', 0, 0, '', '', '', '', '0', '0000-00-00 00:00:00', '', '', '', '-15Â°c to -18Â°c', '', '2020-08-11 02:36:51', '0000-00-00 00:00:00', '0', NULL, NULL, NULL, NULL),
(5, 2, 'asdas', 'asdsa', '', '', '', '', 0, 0, '', '', '', '', '0', '0000-00-00 00:00:00', '', '', '', '3Ëšc to 5Ëšc', '', '2020-08-12 06:11:23', '2020-08-12 06:11:23', '0', NULL, NULL, NULL, NULL),
(6, 15, 'asdas', '', '', '', '', '', 123, 1231, '1231', '', '', 'asdsa', '0', '2020-08-25 00:00:00', 'asdsa', 'asdsada', 'asdas', '18c to 22c', '1', '2020-08-24 23:02:34', '0000-00-00 00:00:00', '0', NULL, NULL, NULL, NULL),
(7, 32, 'sp-asdasd', 'n/a', 'n/a', 'n/a', '1', '', 1, 1, 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '2020-08-28 00:00:00', 'n/a', 'n/a', 'n/a', '3c to 5c', '1', '2020-11-23 03:31:40', '2020-11-23 03:31:40', '0', 'ASDAssss', '2020-10-29', '2020-10-30', '15');

-- --------------------------------------------------------

--
-- Table structure for table `tree_assessment`
--

CREATE TABLE `tree_assessment` (
  `tree_assessment_id` int(11) NOT NULL,
  `seed_collection_id` int(11) DEFAULT NULL,
  `tree_code` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `topography` varchar(255) DEFAULT NULL,
  `stem_diamenter` double DEFAULT NULL,
  `stem_straight` int(255) DEFAULT NULL,
  `forking` int(255) DEFAULT NULL,
  `circularity` int(255) DEFAULT NULL,
  `tree_health` int(255) DEFAULT NULL,
  `branch_angle` int(255) DEFAULT NULL,
  `branch_thickness` int(255) DEFAULT NULL,
  `branch_pruning` int(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `cy` year(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `isdeleted` decimal(10,0) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tree_assessment`
--

INSERT INTO `tree_assessment` (`tree_assessment_id`, `seed_collection_id`, `tree_code`, `method`, `topography`, `stem_diamenter`, `stem_straight`, `forking`, `circularity`, `tree_health`, `branch_angle`, `branch_thickness`, `branch_pruning`, `remarks`, `cy`, `created_at`, `updated_at`, `isdeleted`) VALUES
(2, 1, 'tree-1', 'test', 'test', 11, 1, 1, 1, 1, 1, 1, 1, 'meowkss', 2020, '2020-08-14 22:21:14', '2020-08-14 22:21:14', '0'),
(3, 17, 'asdsa-tree', 'sdasd', 'asdsa', 123, 123, 12, 123, 123, 22, 22, 11, '', 2020, '2020-08-25 07:08:03', '2020-08-25 07:08:03', '0'),
(4, 32, 'tcode', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', 2020, '2020-11-23 03:32:07', '2020-11-23 03:32:07', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isdeleted` decimal(10,0) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`, `created_at`, `updated_at`, `isdeleted`, `user_id`) VALUES
(1, 'Administrator', '2020-09-07 00:17:21', '2020-09-07 00:20:52', '0', 0),
(2, 'Staff', '2020-09-07 00:20:03', '0000-00-00 00:00:00', '0', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_user`
--
ALTER TABLE `dt_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `seed_collection`
--
ALTER TABLE `seed_collection`
  ADD PRIMARY KEY (`seed_collection_id`);
ALTER TABLE `seed_collection` ADD FULLTEXT KEY `seed_search` (`species_name`,`botanical_name`,`location`,`seedlot_no`,`region`,`prefix_id`);

--
-- Indexes for table `seed_collection_other`
--
ALTER TABLE `seed_collection_other`
  ADD PRIMARY KEY (`seed_collection_other_id`) USING BTREE;

--
-- Indexes for table `seed_collection_prov`
--
ALTER TABLE `seed_collection_prov`
  ADD PRIMARY KEY (`seed_prov_id`);

--
-- Indexes for table `seed_record`
--
ALTER TABLE `seed_record`
  ADD PRIMARY KEY (`seed_record_id`) USING BTREE;

--
-- Indexes for table `tree_assessment`
--
ALTER TABLE `tree_assessment`
  ADD PRIMARY KEY (`tree_assessment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_user`
--
ALTER TABLE `dt_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seed_collection`
--
ALTER TABLE `seed_collection`
  MODIFY `seed_collection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `seed_collection_other`
--
ALTER TABLE `seed_collection_other`
  MODIFY `seed_collection_other_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seed_collection_prov`
--
ALTER TABLE `seed_collection_prov`
  MODIFY `seed_prov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `seed_record`
--
ALTER TABLE `seed_record`
  MODIFY `seed_record_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tree_assessment`
--
ALTER TABLE `tree_assessment`
  MODIFY `tree_assessment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
