/*
 Navicat MySQL Data Transfer

 Source Server         : MAC_HOST
 Source Server Version : 50535
 Source Host           : localhost
 Source Database       : wxsite_db

 Target Server Version : 50535
 File Encoding         : utf-8

 Date: 02/26/2014 04:02:17 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `tp_wxmenu`
-- ----------------------------
DROP TABLE IF EXISTS `tp_wxmenu`;
CREATE TABLE `tp_wxmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `key` varchar(255) CHARACTER SET latin1 NOT NULL,
  `type` tinyint(2) NOT NULL,
  `sort` tinyint(3) NOT NULL,
  `is_show` tinyint(2) NOT NULL,
  `url` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tp_wxmenu`
-- ----------------------------
BEGIN;
INSERT INTO `tp_wxmenu` VALUES ('12', '33', 'vostqw1393042012', '0', '???', '1111', '1', '0', '1', null), ('13', '33', 'vostqw1393042012', '12', '??', '222', '1', '11', '1', null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
