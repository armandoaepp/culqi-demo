/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_culqi

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-04-14 10:53:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cargo
-- ----------------------------
DROP TABLE IF EXISTS `cargo`;
CREATE TABLE `cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL DEFAULT '0',
  `nombre` varchar(255) NOT NULL DEFAULT '',
  `apellidos` varchar(255) NOT NULL DEFAULT '',
  `amount` decimal(10,2) unsigned DEFAULT NULL,
  `currency_code` varchar(3) DEFAULT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) DEFAULT NULL,
  `source_id` varchar(255) DEFAULT NULL,
  `estado` tinyint(4) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cargo
-- ----------------------------
INSERT INTO `cargo` VALUES ('1', '00030', 'Armando ', 'Pisfil P', '990.00', 'USD', '', 'armandoaepp@gmail.com', 'tkn_test_ChHHXNgvLnSoqee5', '1', '2019-04-14 10:28:31', '2019-04-14 10:28:31');
INSERT INTO `cargo` VALUES ('2', '00060', 'Armando ', 'Pisfil P', '990.00', 'USD', '', 'armandoaepp@gmail.com', 'tkn_test_IGuMIoZlAjjQCxFb', '1', '2019-04-14 10:32:24', '2019-04-14 10:32:24');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `max_sesions` int(11) DEFAULT NULL,
  `estado` smallint(5) unsigned NOT NULL DEFAULT '1',
  `created_up` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Armando', 'Pisfil Puemape', 'armandoaepp@gmail.com', '7b64d09060db17ca6b96c0af99575903', null, '1', '2018-07-05 15:07:03');
INSERT INTO `users` VALUES ('2', 'Web Master', 'ADMINISTRADOR', 'webmaster@gmail.com', '7b64d09060db17ca6b96c0af99575903', null, '1', '2018-07-05 15:07:03');
INSERT INTO `users` VALUES ('3', 'Admin', 'Admin', 'intelectus@unnuevopoder.com', 'e10adc3949ba59abbe56e057f20f883e', null, '1', '2018-11-29 20:29:12');
