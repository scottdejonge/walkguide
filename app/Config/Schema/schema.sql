/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50622
 Source Host           : localhost
 Source Database       : walkguide

 Target Server Type    : MySQL
 Target Server Version : 50622
 File Encoding         : utf-8

 Date: 07/04/2015 13:34:47 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `walks`
-- ----------------------------
DROP TABLE IF EXISTS `walks`;
CREATE TABLE `walks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grade` int(1) DEFAULT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maintain` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `warning` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gisid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source_comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vetting` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wheelchair` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fireline` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `material` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `geometry` longtext COLLATE utf8_unicode_ci,
  `start_lat` int(11) DEFAULT NULL,
  `start_lng` int(11) DEFAULT NULL,
  `end_lat` int(11) DEFAULT NULL,
  `end_lng` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2143 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
