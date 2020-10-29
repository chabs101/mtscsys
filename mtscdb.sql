/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : mtscdb

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 29/10/2020 16:52:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dt_user
-- ----------------------------
DROP TABLE IF EXISTS `dt_user`;
CREATE TABLE `dt_user`  (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_me` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `isdeleted` decimal(10, 0) NULL DEFAULT 0,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dt_user
-- ----------------------------
INSERT INTO `dt_user` VALUES (1, 'admin', 'Administrator', 'Administrator', 'Male', '', '$2y$10$Ry49zKSBEOda831R/mDqjuxCSzN1O/dpj.J8rg15.gAT7ke.muENK', NULL, '2020-01-31 12:09:26', '2020-01-31 16:55:43', 0, 1, 1);
INSERT INTO `dt_user` VALUES (2, 'tester', 'Administrator', 'Administrator', 'Male', 'pbvc_2020-10-25_tester.jpg', '$2y$10$duWY9H5SXGuHq7fvOPfFlueGF6DktQdD7BUJwWoKArdRIMrP2h0fq', '7b8b974b1f28a49ab74fd176f4966ce7fca362846771a717dc821dd4607c75d4', '2020-01-31 12:09:26', '2020-10-25 07:40:32', 0, 0, 1);
INSERT INTO `dt_user` VALUES (3, 'test', 'test', 'test', 'Male', '', '$2y$10$1zP/ph/JAhXzPuD/H0cXo.I3XbO6NBALkBqIGat1wbFcb0VOWVkT2', '', '2020-08-10 14:33:38', '2020-09-17 04:32:52', 0, 0, 2);

-- ----------------------------
-- Table structure for seed_collection
-- ----------------------------
DROP TABLE IF EXISTS `seed_collection`;
CREATE TABLE `seed_collection`  (
  `seed_collection_id` int(11) NOT NULL AUTO_INCREMENT,
  `prefix_id` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `species_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `botanical_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `location` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `lat` decimal(11, 7) NULL DEFAULT NULL,
  `longi` decimal(11, 7) NULL DEFAULT NULL,
  `alt` int(11) NULL DEFAULT NULL,
  `seedlot_no` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `region` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `provenance_name_db` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ph_climatic_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `map_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `habitat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `veg_struct` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sp_freq` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `slope` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `seed_crop` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bud` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flower` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `soil_struct` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ph` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `geo_alluv` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `predation_status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `seed_date` date NULL DEFAULT NULL,
  `collect_as_bulk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `individuals` double(255, 0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  `isdeleted` decimal(10, 0) NULL DEFAULT 0,
  `assoc_include` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `freq` decimal(10, 0) NULL DEFAULT NULL,
  `ht` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `comments` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `seed_weight` decimal(10, 0) NULL DEFAULT NULL,
  `viab` decimal(10, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`seed_collection_id`) USING BTREE,
  FULLTEXT INDEX `seed_search`(`species_name`, `botanical_name`, `location`, `seedlot_no`, `region`, `prefix_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of seed_collection
-- ----------------------------
INSERT INTO `seed_collection` VALUES (1, '00001', 'asdsadasd', 'asdsadd', 'asdasdsa', 123.1231000, 123.2222200, 1, 'asd-1saa-1ad', '01', '', '', 'esmelet', '', '', '', '', '', '', '', '', '', '', '', '2020-08-21', '0', 0, '2020-08-24 20:24:11', '2020-08-24 20:24:11', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (2, '00002', 'xxxxxxxxxxxxx', 'xxxxxxxxxxx', 'botanical name', 1.0000000, 1.0000000, 1, 'asd-xsss-1ad', '02', '', '', 'asdasd', '', '', '', '', '', '', '', '', '', '', '', '2020-08-24', '', 0, '2020-08-24 20:24:23', '2020-08-24 20:24:23', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (3, '00003', 'yyyyyyy', 'yyy yyyyyyyy', 'botanical shet', 1.0000000, 1.0000000, 1, 'dsa-xsss-12as', '03', 'sadas', 'typekita', 'asdas', 'asdas', 'asdas', '1', 'asda', '1', '1', '1', 'asda', '111', 'asdasdsad', 'asdada', '2020-08-21', '', 0, '2020-08-24 20:24:31', '2020-08-24 20:24:31', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (4, '00004', 'this is test', 'laksdaskl', 'asdsa', 1.0000000, 1.0000000, 1, 'askldlaskd', '01', '', '', 'map test', '', '', '', '', '', '', '', '', '', '', '', '2020-08-24', '', 0, '2020-08-24 20:24:54', '2020-08-24 20:24:54', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (5, '00005', 'this is tester', 'botanical name test', 'mnl qc', 0.0000000, 0.0000000, 0, 'test-1231-no', 'NCR', '', '', 'test', '', '', '', '', '', '', '', '', '', '', '', '2020-08-11', '', 0, '2020-08-24 20:24:07', '2020-08-24 20:24:07', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (6, '00006', 'asdkasldkaldlka', 'test', 'alsdkaskldas', 0.0000000, 0.0000000, 1, 'asda-1asds-asd', 'BARMM', '', '', 'asa', '', '', '', '', '', '', '', '', '', '', '', '2020-08-12', '', 0, '2020-08-24 20:23:55', '2020-08-24 20:23:55', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (7, '00007', 'meowk', 'species', 'now', 0.0000000, 0.0000000, 11, '123-1213', '4A', '', '', 'asd', '', '', '', '', '', '', '', '', '', '', '', '2020-08-10', '', 0, '2020-08-24 20:23:37', '2020-08-24 20:23:37', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (8, '', '', '', '', 0.0000000, 0.0000000, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 0, '2020-08-10 18:12:18', '2020-08-10 18:12:18', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (9, '', '', '', '', 0.0000000, 0.0000000, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 0, '2020-08-10 18:12:50', '2020-08-10 18:12:50', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (10, '', '', '', '', 0.0000000, 0.0000000, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 0, '2020-08-10 18:12:54', '2020-08-10 18:12:54', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (11, '', 'asdasdsa', '', '', 0.0000000, 0.0000000, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 0, '2020-08-10 18:12:59', '2020-08-10 18:12:59', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (12, '', 'asdasdsa', '', '', 0.0000000, 0.0000000, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 0, '2020-08-10 18:12:46', '2020-08-10 18:12:46', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (13, '00013', 'species test', 'botanical test', 'loc test', 41.0473100, 127.0000000, 555, 'seed-test-123', '01', 'test prov', 'test climatic type', 'test map', 'habitat test', 'test veg', 'test freq', 'test slope', 'test seed crop', 'test bud ', 'test flowers', 'test struct', '12', 'test geology', 'test pred status', '2020-08-11', 'test', 5, '2020-08-24 20:20:56', '2020-08-24 20:20:56', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (14, '00014', 'askldaskldsakl test', 'askldaskldsakl test', 'asdasd', 1.0000000, 11.0000000, 1, 'aslkdaskl test', '01', '', '', 'adsa', '', '', '', '', '', '', '', '', '', '', '', '2020-08-24', '', 0, '2020-08-24 20:14:53', '2020-08-24 20:14:53', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (15, '00015', 'aslkdaskl', 'askldsakl', 'aklsdaslkdakl', 11.0000000, 111.0000000, 111, 'askdlsakl', '4A', '', '', 'asdas', '', '', '', '', '', '', '', '', '', '', '', '2020-08-24', '', 0, '2020-08-24 20:29:59', '2020-08-24 20:29:59', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (16, '00016', 'lkasdlksadkl', 'lkasldkaskldkl', 'asdklsaldk', 1.0000000, 1.0000000, 1, 'askldsakld', '4A', '', '', 'askldaskl', '', '', '', '', '', '', '', '', '', '', '', '2020-08-31', '', 0, '2020-08-24 20:30:25', '2020-08-24 20:30:25', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (17, '00017', 'asdasdad', 'asdasd', 'asdasd', 1.0000000, 1.0000000, 1, 'asdasdad', '01', '', '', 'asdas', '', '', '', '', '', '', '', '', '', '', '', '2020-08-25', '', 0, '2020-08-25 07:01:38', '2020-08-25 07:01:38', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (18, '00018', 'Sssa', 'Ssss', 'Zzz', 1.0000000, 1.0000000, 1, 'Sss', '4A', '', '', 'Ss', '', '', '', '', '', '', '', '', '', '', '', '2020-08-25', '', 0, '2020-08-25 08:53:41', '2020-08-25 08:53:41', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (19, '00019', 'FALCATA', 'FALCATARIA', 'San Roque, Bislig City', 12.5750000, 474.4400000, 425, '0111', '13', '', '', 'Surigao', '', '', '', '', '', '', '', '', '', '', '', '2020-07-29', '', 1, '2020-08-25 09:06:47', '2020-08-25 09:06:47', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (20, '', 'FALCATA', 'FALCATARIA', 'San Roque, Bislig City', 12.5750000, 474.4400000, 425, '0111', '13', '', '', 'Surigao', '', '', '', '', '', '', '', '', '', '', '', '2020-07-29', '', 1, '2020-08-25 09:28:05', '2020-08-25 09:28:05', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (21, '', 'FALCATA', 'FALCATARIA', 'San Roque, Bislig City', 12.5750000, 474.4400000, 425, '0111', '13', '', '', 'Surigao', '', '', '', '', '', '', '', '', '', '', '', '2020-07-29', '', 1, '2020-08-25 09:27:59', '2020-08-25 09:27:59', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (22, '', 'FALCATA', 'FALCATARIA', 'San Roque, Bislig City', 12.5750000, 474.4400000, 425, '0111', '13', '', '', 'Surigao', '', '', '', '', '', '', '', '', '', '', '', '2020-07-29', '', 1, '2020-08-25 09:27:51', '2020-08-25 09:27:51', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (23, '', 'FALCATA', 'FALCATARIA', 'San Roque, Bislig City', 12.5750000, 474.4400000, 425, '0111', '13', '', '', 'Surigao', '', '', '', '', '', '', '', '', '', '', '', '2020-07-29', '', 1, '2020-08-25 09:27:39', '2020-08-25 09:27:39', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (24, '00024', 'Dds', 'S', 'Zz', 1.0000000, 1.0000000, 1, 'Sss', '4B', 'N/A', 'N/A', 'Ss', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '', 'N/A', '1', 'N/A', 'N/A', '2020-08-25', 'N/A', 0, '2020-08-25 09:07:18', '2020-08-25 09:07:18', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (25, '00025', 'Ggg', 'Gggggg', 'Ggg', 8.0000000, 5.0000000, 9, 'Gggg', 'NCR', '', '', 'Qfhdqhafh', '', '', '', '', '', '', '', '', '', '', '', '2020-08-25', '', 0, '2020-08-25 12:36:30', '2020-08-25 12:36:30', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (26, '00026', 'Bagras', 'Bayabas', 'San Roque, Bislig City', 123.2500000, 85.2000000, 125, '205', '13', '', '', 'Bislig City', '', '', '', '', '', '', '', '', '', '', '', '2020-08-05', '', 0, '2020-08-26 01:06:55', '2020-08-26 01:06:55', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (27, '00027', 'test falcata', 'test falcata', 'test falcata', 1.0000000, 1.0000000, 1, 'test falcata', '02', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '1', 'n/a', 'n/a', '2020-08-26', 'asdasd', 0, '2020-08-26 01:17:39', '2020-08-26 01:17:39', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (28, '00028', 'Manguim', 'manguim', 'San Roque, Bislig City', 241.6600000, 125.5550000, 254, '125', '13', 'N/A', 'N/A', 'Surigao', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '1', 'N/A', 'N/A', '2020-08-04', '', 0, '2020-08-26 01:39:01', '2020-08-26 01:39:01', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (29, '', 'Manguim', 'manguim', 'San Roque, Bislig City', 241.6600000, 125.5550000, 254, '125', '13', 'N/A', 'N/A', 'Surigao', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '1', 'N/A', 'N/A', '2020-08-04', '', 0, '2020-08-26 03:51:25', '2020-08-26 03:51:25', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (30, '00030', 'Mankono', 'Xathosthemon verdugoniaanus', 'San Roque, Bislig City', 124.2500000, 165.2500000, 165, '120', '13', 'N/A', 'N/A', 'Bislig City', '', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '1', 'N/A', 'N/A', '2020-08-06', 'N/A', 0, '2020-08-26 02:50:57', '2020-08-26 02:50:57', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (31, '00031', 'asdsad', 'asdlkadlk', 'asdsa', 1.0000000, 1.0000000, 1, 'lkasldkasldk', '12', 'asdad', 'sadsa', 'asdasdsad', '', 'asdasd', 'asdas', 'asd', 'asd', 'asd', 'dsa', 'sadasd', '1', 'asdad', 'asd', '2020-09-03', 'asdasd', 55, '2020-08-27 02:01:09', '2020-08-27 02:01:09', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_collection` VALUES (32, '00032', 'klasdklasdkl', 'lkaslkdaskld', 'askldakld', 1.0000000, 1.0000000, 1, 'lkklasdklaskl', '01', 'asdasd', 'asdsa', '', 'ghg', 'asdasd', 'asdsad', 'asdad', 'asdasd', 'asdasd', 'asdsad', 'asdsad', '111', 'asdas', 'asdasd', '2020-08-20', 'asdsa', 111, '2020-10-29 05:11:17', '2020-10-29 05:11:17', 0, 'asda', 11, 'asda', '11', 'asdad', 11, 11);

-- ----------------------------
-- Table structure for seed_detailed_information
-- ----------------------------
DROP TABLE IF EXISTS `seed_detailed_information`;
CREATE TABLE `seed_detailed_information`  (
  `detailed_info_id` int(11) NOT NULL,
  `seed_collection_id` int(11) NULL DEFAULT NULL,
  `owner` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `contact_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date_assess` date NULL DEFAULT NULL,
  `soil_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `access_road` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `total_area` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `year_establish` year NULL DEFAULT NULL,
  `assoc_agri` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `spacing` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  `isdeleted` decimal(10, 0) NULL DEFAULT 0
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of seed_detailed_information
-- ----------------------------
INSERT INTO `seed_detailed_information` VALUES (1, 1, 'raneil chavez', '09187881105', '2020-08-13', 'test', 'test', '3', 2020, 'test', 'test', 'test', '2020-08-14 14:05:35', '2020-08-14 14:05:35', 0);
INSERT INTO `seed_detailed_information` VALUES (2, 17, 'asdsa', '012031203', '2020-08-25', '', '', '', 2020, '', '', '', '2020-08-24 23:14:21', '0000-00-00 00:00:00', 0);

-- ----------------------------
-- Table structure for seed_record
-- ----------------------------
DROP TABLE IF EXISTS `seed_record`;
CREATE TABLE `seed_record`  (
  `seed_record_id` int(255) NOT NULL AUTO_INCREMENT,
  `seed_collection_id` int(11) NULL DEFAULT NULL,
  `species_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `store_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cost_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `geo_n_soil` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bulk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tree` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dbh` double NULL DEFAULT NULL,
  `total_height` double NULL DEFAULT NULL,
  `form` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fumigation_method` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `collector` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `collector_no` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `collection_date` datetime(0) NULL DEFAULT NULL,
  `project` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `identified_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `seed_condition` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `storage` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `quantity` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  `isdeleted` decimal(10, 0) NULL DEFAULT 0,
  `g_method` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `g_from` date NULL DEFAULT NULL,
  `g_to` date NULL DEFAULT NULL,
  `g_viab` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`seed_record_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of seed_record
-- ----------------------------
INSERT INTO `seed_record` VALUES (1, 1, 'scode-321', '231', '123', 'asdasdad', '', '', 107.5, 19.3, '312', '', '', 'asdas', '0', '2020-08-18 00:00:00', 'asda', 'asda', 'asd', '18c to 22c', '11', '2020-08-14 14:25:17', '2020-08-14 14:25:17', 0, NULL, NULL, NULL, NULL);
INSERT INTO `seed_record` VALUES (2, 5, 'asdsad', 'asdasd', 'asdsa', '', '', '', 0, 0, '', '', '', '', '0', '0000-00-00 00:00:00', '', '', '', '', '', '2020-08-10 21:39:26', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL);
INSERT INTO `seed_record` VALUES (3, 6, '21312', '12321', '', '', '', '', 0, 0, '', '', '', '', '0', '0000-00-00 00:00:00', '', '', '', '3Â°c to 5Â°c', '', '2020-08-11 10:35:53', '2020-08-11 10:35:53', 0, NULL, NULL, NULL, NULL);
INSERT INTO `seed_record` VALUES (4, 7, 'asdd', 'asdsa', '', '', '', '', 0, 0, '', '', '', '', '0', '0000-00-00 00:00:00', '', '', '', '-15Â°c to -18Â°c', '', '2020-08-11 10:36:51', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL);
INSERT INTO `seed_record` VALUES (5, 2, 'asdas', 'asdsa', '', '', '', '', 0, 0, '', '', '', '', '0', '0000-00-00 00:00:00', '', '', '', '3Ëšc to 5Ëšc', '', '2020-08-12 14:11:23', '2020-08-12 14:11:23', 0, NULL, NULL, NULL, NULL);
INSERT INTO `seed_record` VALUES (6, 15, 'asdas', '', '', '', '', '', 123, 1231, '1231', '', '', 'asdsa', '0', '2020-08-25 00:00:00', 'asdsa', 'asdsada', 'asdas', '18c to 22c', '1', '2020-08-25 07:02:34', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL);
INSERT INTO `seed_record` VALUES (7, 32, 'sp-asdasd', 'n/a', 'n/a', 'n/a', '1', '', 1, 1, 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '2020-08-28 00:00:00', 'n/a', 'n/a', 'n/a', '3c to 5c', '1', '2020-10-29 07:46:29', '2020-10-29 07:46:29', 0, 'ASDA', '2020-10-29', '2020-10-30', '15');

-- ----------------------------
-- Table structure for seed_record_germination
-- ----------------------------
DROP TABLE IF EXISTS `seed_record_germination`;
CREATE TABLE `seed_record_germination`  (
  `seed_germination_id` int(11) NOT NULL AUTO_INCREMENT,
  `seed_record_id` int(11) NULL DEFAULT NULL,
  `method` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `seed_from` date NULL DEFAULT NULL,
  `seed_to` date NULL DEFAULT NULL,
  `viab` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  `isdeleted` decimal(10, 0) NULL DEFAULT 0,
  PRIMARY KEY (`seed_germination_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of seed_record_germination
-- ----------------------------
INSERT INTO `seed_record_germination` VALUES (1, 1, 'asdasds', '0000-00-00', '0000-00-00', '90%', '2020-08-11 12:16:46', '2020-08-11 12:16:46', 1);
INSERT INTO `seed_record_germination` VALUES (2, 1, 'meowkey', '0000-00-00', '0000-00-00', '55', '2020-08-11 22:23:09', '2020-08-11 22:23:09', 0);
INSERT INTO `seed_record_germination` VALUES (3, 1, '321', '0000-00-00', '0000-00-00', '123', '2020-08-11 22:23:09', '2020-08-11 22:23:09', 1);
INSERT INTO `seed_record_germination` VALUES (4, 1, 'meowk', '0000-00-00', '0000-00-00', '90', '2020-08-11 22:23:09', '2020-08-11 22:23:09', 1);
INSERT INTO `seed_record_germination` VALUES (5, 1, '', '0000-00-00', '0000-00-00', '', '2020-08-11 12:22:06', '2020-08-11 12:22:06', 1);
INSERT INTO `seed_record_germination` VALUES (6, 1, '', '0000-00-00', '0000-00-00', '', '2020-08-11 12:22:06', '2020-08-11 12:22:06', 1);
INSERT INTO `seed_record_germination` VALUES (7, 1, '', '0000-00-00', '0000-00-00', '', '2020-08-11 12:22:06', '2020-08-11 12:22:06', 1);
INSERT INTO `seed_record_germination` VALUES (8, 1, '', '0000-00-00', '0000-00-00', '', '2020-08-11 12:22:06', '2020-08-11 12:22:06', 1);

-- ----------------------------
-- Table structure for seed_record_other
-- ----------------------------
DROP TABLE IF EXISTS `seed_record_other`;
CREATE TABLE `seed_record_other`  (
  `seed_record_other_id` int(11) NOT NULL AUTO_INCREMENT,
  `seed_record_id` int(11) NULL DEFAULT NULL,
  `tree_no` int(11) NULL DEFAULT NULL,
  `consignee_date` date NULL DEFAULT NULL,
  `consignee` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `released` double NULL DEFAULT NULL,
  `balance` double NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  `isdeleted` decimal(10, 0) NULL DEFAULT 0,
  `barcode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `collection` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mc` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `purity` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `viab` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `seed_count` decimal(10, 0) NULL DEFAULT NULL,
  `seed_weight` decimal(10, 0) NULL DEFAULT NULL,
  `room` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cont_no` decimal(10, 0) NULL DEFAULT NULL,
  `bag_no` decimal(10, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`seed_record_other_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of seed_record_other
-- ----------------------------
INSERT INTO `seed_record_other` VALUES (1, 1, 1, '2020-08-24', 'asdasd', 0, 0, '2020-08-24 19:28:59', '2020-08-24 19:28:59', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_record_other` VALUES (2, 1, 2, '2020-08-23', 'asda', 0, 0, '2020-08-24 19:28:59', '2020-08-24 19:28:59', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_record_other` VALUES (3, 1, 3, '0000-00-00', '', 0, 0, '2020-08-11 12:35:52', '2020-08-11 12:35:52', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_record_other` VALUES (4, 1, 4, '0000-00-00', '', 0, 0, '2020-08-11 12:35:52', '2020-08-11 12:35:52', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `seed_record_other` VALUES (5, 0, 0, '0000-00-00', '', 0, 0, '2020-10-29 07:38:45', '2020-10-29 07:38:45', 0, '', '', '', '', '', 0, 0, '', 0, 0);
INSERT INTO `seed_record_other` VALUES (6, 7, 11, '2020-10-29', 'rnyl', 5, 11, '2020-10-29 08:25:51', '2020-10-29 08:25:51', 0, 'asdada', 'asdsa', 'asdada', 'sadsadad', 'sdsadsa', 1, 2, 'asdsa', 11, 11);
INSERT INTO `seed_record_other` VALUES (7, 7, 0, '0000-00-00', '', 0, 0, '2020-10-29 07:52:55', '2020-10-29 07:51:06', 1, '', '', '', '', '', 0, 0, '', 0, 0);
INSERT INTO `seed_record_other` VALUES (8, 7, 0, '2020-10-30', 'sssss', 6, 1, '2020-10-29 08:25:51', '2020-10-29 08:25:51', 0, 'asdsa', 'dsadsad', 'asdasdas', 'dsadasdsa', 'sadasdsa', 1, 1, 'asd', 11, 11);

-- ----------------------------
-- Table structure for tree_assessment
-- ----------------------------
DROP TABLE IF EXISTS `tree_assessment`;
CREATE TABLE `tree_assessment`  (
  `tree_assessment_id` int(11) NOT NULL AUTO_INCREMENT,
  `seed_collection_id` int(11) NULL DEFAULT NULL,
  `tree_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `method` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `topography` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `stem_diamenter` double NULL DEFAULT NULL,
  `stem_straight` int(255) NULL DEFAULT NULL,
  `forking` int(255) NULL DEFAULT NULL,
  `circularity` int(255) NULL DEFAULT NULL,
  `tree_health` int(255) NULL DEFAULT NULL,
  `branch_angle` int(255) NULL DEFAULT NULL,
  `branch_thickness` int(255) NULL DEFAULT NULL,
  `branch_pruning` int(255) NULL DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cy` year NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  `isdeleted` decimal(10, 0) NULL DEFAULT 0,
  PRIMARY KEY (`tree_assessment_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tree_assessment
-- ----------------------------
INSERT INTO `tree_assessment` VALUES (2, 1, 'tree-1', 'test', 'test', 11, 1, 1, 1, 1, 1, 1, 1, 'meowkss', 2020, '2020-08-14 22:21:14', '2020-08-14 22:21:14', 0);
INSERT INTO `tree_assessment` VALUES (3, 17, 'asdsa-tree', 'sdasd', 'asdsa', 123, 123, 12, 123, 123, 22, 22, 11, '', 2020, '2020-08-25 07:08:03', '2020-08-25 07:08:03', 0);

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `isdeleted` decimal(10, 0) NULL DEFAULT 0,
  `user_id` int(11) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES (1, 'Administrator', '2020-09-07 00:17:21', '2020-09-07 00:20:52', 0, 0);
INSERT INTO `user_role` VALUES (2, 'Staff', '2020-09-07 00:20:03', '0000-00-00 00:00:00', 0, 1);

SET FOREIGN_KEY_CHECKS = 1;
