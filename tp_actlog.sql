/*
 Navicat MySQL Data Transfer

 Source Server         : hifeng.cn
 Source Server Version : 50528
 Source Host           : MYSQL1004.webweb.com
 Source Database       : db_993d88_weixin2

 Target Server Version : 50528
 File Encoding         : utf-8

 Date: 01/24/2014 13:48:24 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `tp_actlog`
-- ----------------------------
DROP TABLE IF EXISTS `tp_actlog`;
CREATE TABLE `tp_actlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `act_url` varchar(2000) DEFAULT NULL,
  `act_date` date DEFAULT NULL,
  `act_data` varchar(2000) DEFAULT NULL,
  `act_reply` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
