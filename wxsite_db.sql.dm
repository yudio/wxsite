/*
 Navicat MySQL Data Transfer

 Source Server         : MAC_HOST
 Source Server Version : 50535
 Source Host           : localhost
 Source Database       : wxsite_db

 Target Server Version : 50535
 File Encoding         : utf-8

 Date: 02/26/2014 03:03:04 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `tp_access`
-- ----------------------------
DROP TABLE IF EXISTS `tp_access`;
CREATE TABLE `tp_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_adma`
-- ----------------------------
DROP TABLE IF EXISTS `tp_adma`;
CREATE TABLE `tp_adma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  `url` varchar(100) NOT NULL,
  `copyright` varchar(50) NOT NULL,
  `info` varchar(120) NOT NULL,
  `title` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='diy 宣传页';

-- ----------------------------
--  Table structure for `tp_alipay_config`
-- ----------------------------
DROP TABLE IF EXISTS `tp_alipay_config`;
CREATE TABLE `tp_alipay_config` (
  `token` varchar(60) NOT NULL,
  `name` varchar(40) NOT NULL DEFAULT '',
  `pid` varchar(40) NOT NULL DEFAULT '',
  `key` varchar(60) NOT NULL DEFAULT '',
  `open` tinyint(1) NOT NULL DEFAULT '0',
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_api`
-- ----------------------------
DROP TABLE IF EXISTS `tp_api`;
CREATE TABLE `tp_api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  `url` varchar(100) NOT NULL,
  `number` tinyint(1) NOT NULL,
  `order` tinyint(1) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`,`token`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='第三方api接口表';

-- ----------------------------
--  Table structure for `tp_areply`
-- ----------------------------
DROP TABLE IF EXISTS `tp_areply`;
CREATE TABLE `tp_areply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) NOT NULL,
  `default_reply` varchar(255) DEFAULT NULL,
  `default_reply_flag` tinyint(2) DEFAULT NULL,
  `content` text NOT NULL,
  `uid` int(11) NOT NULL,
  `uname` varchar(90) NOT NULL,
  `createtime` varchar(13) NOT NULL,
  `updatetime` varchar(13) NOT NULL,
  `token` char(30) NOT NULL,
  `is_news` tinyint(2) NOT NULL,
  `home` varchar(1) NOT NULL DEFAULT '0',
  `lbs_dis` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_article`
-- ----------------------------
DROP TABLE IF EXISTS `tp_article`;
CREATE TABLE `tp_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(90) NOT NULL,
  `description` char(255) NOT NULL,
  `author` varchar(15) NOT NULL,
  `form` varchar(30) NOT NULL,
  `updatetime` varchar(13) NOT NULL,
  `createtime` varchar(13) NOT NULL,
  `content` text NOT NULL,
  `imgs` char(40) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_call`
-- ----------------------------
DROP TABLE IF EXISTS `tp_call`;
CREATE TABLE `tp_call` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `token` varchar(60) CHARACTER SET latin1 NOT NULL,
  `phone_account` varchar(50) CHARACTER SET latin1 NOT NULL,
  `phone_password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='手机短信配置';

-- ----------------------------
--  Table structure for `tp_canyu`
-- ----------------------------
DROP TABLE IF EXISTS `tp_canyu`;
CREATE TABLE `tp_canyu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xid` int(11) NOT NULL,
  `wecha_id` varchar(60) NOT NULL,
  `token` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `number` int(11) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_case`
-- ----------------------------
DROP TABLE IF EXISTS `tp_case`;
CREATE TABLE `tp_case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `url` char(255) NOT NULL,
  `img` char(200) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_classify`
-- ----------------------------
DROP TABLE IF EXISTS `tp_classify`;
CREATE TABLE `tp_classify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `info` varchar(90) NOT NULL COMMENT '分类描述',
  `sorts` varchar(6) NOT NULL COMMENT '显示顺序',
  `img` char(255) NOT NULL,
  `url` char(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` varchar(1) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `token` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=323 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_company`
-- ----------------------------
DROP TABLE IF EXISTS `tp_company`;
CREATE TABLE `tp_company` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `shortname` varchar(50) NOT NULL DEFAULT '',
  `mp` varchar(11) NOT NULL DEFAULT '',
  `tel` varchar(20) NOT NULL DEFAULT '',
  `address` varchar(200) NOT NULL DEFAULT '',
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `intro` text NOT NULL,
  `catid` mediumint(3) NOT NULL DEFAULT '0',
  `taxis` int(10) NOT NULL DEFAULT '0',
  `isbranch` tinyint(1) NOT NULL DEFAULT '0',
  `logourl` varchar(180) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_diymen_class`
-- ----------------------------
DROP TABLE IF EXISTS `tp_diymen_class`;
CREATE TABLE `tp_diymen_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `pid` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `keyword` varchar(30) NOT NULL,
  `is_show` tinyint(1) NOT NULL,
  `sort` tinyint(3) NOT NULL,
  `url` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_diymen_set`
-- ----------------------------
DROP TABLE IF EXISTS `tp_diymen_set`;
CREATE TABLE `tp_diymen_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `appid` varchar(18) NOT NULL,
  `appsecret` varchar(32) NOT NULL,
  `appaccess` varchar(256) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_dream`
-- ----------------------------
DROP TABLE IF EXISTS `tp_dream`;
CREATE TABLE `tp_dream` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `content` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Table structure for `tp_flash`
-- ----------------------------
DROP TABLE IF EXISTS `tp_flash`;
CREATE TABLE `tp_flash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `img` char(255) NOT NULL,
  `is_show` tinyint(1) NOT NULL,
  `type` varchar(255) NOT NULL,
  `url` char(255) NOT NULL,
  `info` varchar(90) NOT NULL,
  `sort` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COMMENT='3g网站头部flash';

-- ----------------------------
--  Table structure for `tp_follow`
-- ----------------------------
DROP TABLE IF EXISTS `tp_follow`;
CREATE TABLE `tp_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `follow_form_id` varchar(100) NOT NULL,
  `follow_to_id` varchar(100) NOT NULL,
  `follow_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 COMMENT='关注表';

-- ----------------------------
--  Table structure for `tp_function`
-- ----------------------------
DROP TABLE IF EXISTS `tp_function`;
CREATE TABLE `tp_function` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` tinyint(3) NOT NULL,
  `usenum` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `funname` varchar(100) NOT NULL,
  `info` varchar(100) NOT NULL,
  `isserve` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gid` (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_home`
-- ----------------------------
DROP TABLE IF EXISTS `tp_home`;
CREATE TABLE `tp_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `title` varchar(30) NOT NULL,
  `picurl` varchar(120) NOT NULL,
  `info` varchar(120) NOT NULL,
  `plugmenucolor` varchar(10) NOT NULL,
  `copyright` varchar(200) NOT NULL,
  `homeurl` varchar(150) NOT NULL,
  `advancetpl` tinyint(1) NOT NULL DEFAULT '0',
  `wxkey` varchar(100) DEFAULT NULL,
  `matchtype` tinyint(1) DEFAULT NULL,
  `caption` varchar(100) DEFAULT NULL,
  `mslogo` varchar(256) DEFAULT NULL,
  `show_bg_img` varchar(256) DEFAULT NULL,
  `bg_img` varchar(256) DEFAULT NULL,
  `bg_audio` varchar(256) DEFAULT NULL,
  `comment` varchar(256) DEFAULT NULL,
  `play_img` varchar(256) DEFAULT NULL,
  `play_audio` varchar(256) DEFAULT NULL,
  `animation` varchar(256) DEFAULT NULL,
  `bg_animation` varchar(256) DEFAULT NULL,
  `stat_code` varchar(256) DEFAULT NULL,
  `smart_branch` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_host`
-- ----------------------------
DROP TABLE IF EXISTS `tp_host`;
CREATE TABLE `tp_host` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `keyword` varchar(50) NOT NULL COMMENT '关键词',
  `title` varchar(50) NOT NULL COMMENT '商家名称',
  `address` varchar(50) NOT NULL COMMENT '商家地',
  `tel` varchar(13) NOT NULL COMMENT '商家电话',
  `tel2` varchar(13) NOT NULL COMMENT '手机号',
  `ppicurl` varchar(250) NOT NULL COMMENT '订房封面图片',
  `headpic` varchar(250) NOT NULL COMMENT '订单页头部图片',
  `name` varchar(50) NOT NULL COMMENT '文字描述',
  `sort` int(11) NOT NULL COMMENT '排序',
  `picurl` varchar(100) NOT NULL COMMENT '图片地址',
  `url` varchar(50) NOT NULL COMMENT '图片跳转地址以http',
  `info` text NOT NULL COMMENT '商家介绍：',
  `info2` text NOT NULL COMMENT '订房说明u',
  `creattime` int(11) NOT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='酒店商家设置';

-- ----------------------------
--  Table structure for `tp_host_list_add`
-- ----------------------------
DROP TABLE IF EXISTS `tp_host_list_add`;
CREATE TABLE `tp_host_list_add` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hid` int(11) NOT NULL COMMENT '商家id',
  `token` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL COMMENT '房间类型',
  `typeinfo` varchar(100) NOT NULL COMMENT '简要说明',
  `price` decimal(10,2) NOT NULL COMMENT '原价：',
  `yhprice` decimal(10,2) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '文字描述',
  `picurl` varchar(110) NOT NULL COMMENT '图片地址',
  `url` varchar(100) NOT NULL COMMENT '图片跳转地址以http',
  `info` text NOT NULL COMMENT '配套设施',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='房间类型信息表';

-- ----------------------------
--  Table structure for `tp_host_order`
-- ----------------------------
DROP TABLE IF EXISTS `tp_host_order`;
CREATE TABLE `tp_host_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `wecha_id` varchar(50) NOT NULL,
  `book_people` varchar(50) NOT NULL COMMENT '预订人',
  `tel` varchar(13) NOT NULL COMMENT '电话',
  `check_in` int(11) NOT NULL COMMENT '入住时间',
  `check_out` int(11) NOT NULL COMMENT '离开时间',
  `room_type` varchar(50) NOT NULL COMMENT '房间类型',
  `book_time` int(11) NOT NULL COMMENT '预订时间',
  `book_num` int(11) NOT NULL COMMENT '预订数量',
  `price` decimal(10,2) NOT NULL COMMENT ' 价格',
  `order_status` int(11) NOT NULL COMMENT '订单状态 1 成功,2 失败,3 未处理',
  `hid` int(11) NOT NULL COMMENT '订房商家id',
  `remarks` varchar(250) NOT NULL COMMENT '留言备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='订单管理';

-- ----------------------------
--  Table structure for `tp_img`
-- ----------------------------
DROP TABLE IF EXISTS `tp_img`;
CREATE TABLE `tp_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `uname` varchar(90) NOT NULL,
  `keyword` char(255) NOT NULL,
  `type` tinyint(2) NOT NULL COMMENT '关键词匹配类型',
  `match_type` tinyint(2) DEFAULT NULL,
  `text` text NOT NULL COMMENT '简介',
  `classid` int(11) NOT NULL,
  `classname` varchar(60) NOT NULL,
  `pic` char(255) NOT NULL COMMENT '封面图片',
  `showpic` varchar(1) NOT NULL COMMENT '图片是否显示封面',
  `info` text NOT NULL COMMENT '图文详细内容',
  `url` char(255) NOT NULL COMMENT '图文外链地址',
  `createtime` varchar(13) NOT NULL,
  `updatetime` varchar(13) NOT NULL,
  `click` int(11) NOT NULL,
  `token` char(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sort` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `classid` (`classid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COMMENT='微信图文';

-- ----------------------------
--  Table structure for `tp_indent`
-- ----------------------------
DROP TABLE IF EXISTS `tp_indent`;
CREATE TABLE `tp_indent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `gid` tinyint(2) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `title` varchar(60) NOT NULL,
  `info` int(11) NOT NULL,
  `indent_id` char(20) NOT NULL,
  `widtrade_no` int(20) NOT NULL,
  `price` float NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_keyword`
-- ----------------------------
DROP TABLE IF EXISTS `tp_keyword`;
CREATE TABLE `tp_keyword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` char(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  `module` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=257 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_links`
-- ----------------------------
DROP TABLE IF EXISTS `tp_links`;
CREATE TABLE `tp_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) CHARACTER SET utf8 NOT NULL,
  `url` char(255) CHARACTER SET utf8 NOT NULL,
  `status` varchar(1) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `tp_liuyan`
-- ----------------------------
DROP TABLE IF EXISTS `tp_liuyan`;
CREATE TABLE `tp_liuyan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(30) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `text` varchar(500) DEFAULT NULL,
  `createtime` int(20) DEFAULT NULL,
  `uptatetime` int(20) DEFAULT NULL,
  `token` varchar(30) NOT NULL,
  `re` varchar(500) DEFAULT NULL,
  `wecha_id` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_lottery`
-- ----------------------------
DROP TABLE IF EXISTS `tp_lottery`;
CREATE TABLE `tp_lottery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `joinnum` int(11) NOT NULL COMMENT '参与人数',
  `click` int(11) NOT NULL,
  `token` varchar(30) NOT NULL,
  `keyword` varchar(10) NOT NULL,
  `starpicurl` varchar(100) NOT NULL COMMENT '填写活动开始图片网址',
  `title` varchar(60) NOT NULL COMMENT '活动名称',
  `txt` varchar(60) NOT NULL COMMENT '用户输入兑奖时候的显示信息',
  `sttxt` varchar(200) NOT NULL COMMENT '简介',
  `statdate` int(11) NOT NULL COMMENT '活动开始时间',
  `enddate` int(11) NOT NULL COMMENT '活动结束时间',
  `info` varchar(200) NOT NULL COMMENT '活动说明',
  `aginfo` varchar(200) NOT NULL COMMENT '重复抽奖回复',
  `endtite` varchar(60) NOT NULL COMMENT '活动结束公告主题',
  `endpicurl` varchar(100) NOT NULL,
  `endinfo` varchar(60) NOT NULL,
  `fist` varchar(50) NOT NULL COMMENT '一等奖奖品设置',
  `fistnums` int(4) NOT NULL COMMENT '一等奖奖品数量',
  `fistlucknums` int(1) NOT NULL COMMENT '一等奖中奖号码',
  `second` varchar(50) NOT NULL COMMENT '二等奖奖品设置',
  `type` tinyint(1) NOT NULL,
  `secondnums` int(4) NOT NULL,
  `secondlucknums` int(1) NOT NULL,
  `third` varchar(50) NOT NULL,
  `thirdnums` int(4) NOT NULL,
  `thirdlucknums` int(1) NOT NULL,
  `allpeople` int(11) NOT NULL,
  `canrqnums` int(2) NOT NULL COMMENT '个人限制抽奖次数',
  `parssword` int(15) NOT NULL,
  `renamesn` varchar(50) NOT NULL,
  `renametel` varchar(60) NOT NULL,
  `displayjpnums` int(1) NOT NULL,
  `createtime` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `four` varchar(50) NOT NULL,
  `fournums` int(11) NOT NULL,
  `fourlucknums` int(11) NOT NULL,
  `five` varchar(50) NOT NULL,
  `fivenums` int(11) NOT NULL,
  `fivelucknums` int(11) NOT NULL,
  `six` varchar(50) NOT NULL COMMENT '六等奖',
  `sixnums` int(11) NOT NULL,
  `sixlucknums` int(11) NOT NULL,
  `zjpic` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_lottery_record`
-- ----------------------------
DROP TABLE IF EXISTS `tp_lottery_record`;
CREATE TABLE `tp_lottery_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lid` int(11) NOT NULL,
  `usenums` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户使用次数',
  `wecha_id` varchar(60) NOT NULL COMMENT '微信唯一识别码',
  `token` varchar(30) NOT NULL,
  `islottery` int(1) NOT NULL COMMENT '是否中奖',
  `wecha_name` varchar(60) NOT NULL COMMENT '微信号',
  `phone` varchar(15) NOT NULL,
  `sn` varchar(13) NOT NULL COMMENT '中奖后序列号',
  `time` int(11) NOT NULL,
  `prize` varchar(50) NOT NULL DEFAULT '' COMMENT '已中奖项',
  `sendstutas` int(11) NOT NULL DEFAULT '0',
  `sendtime` int(11) NOT NULL,
  PRIMARY KEY (`id`,`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=504 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_member`
-- ----------------------------
DROP TABLE IF EXISTS `tp_member`;
CREATE TABLE `tp_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `isopen` int(1) NOT NULL,
  `homepic` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_member_card_contact`
-- ----------------------------
DROP TABLE IF EXISTS `tp_member_card_contact`;
CREATE TABLE `tp_member_card_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `sort` tinyint(1) NOT NULL,
  `info` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_member_card_coupon`
-- ----------------------------
DROP TABLE IF EXISTS `tp_member_card_coupon`;
CREATE TABLE `tp_member_card_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `title` varchar(60) NOT NULL,
  `group` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `price` int(11) NOT NULL,
  `people` int(3) NOT NULL,
  `statdate` int(11) NOT NULL,
  `enddate` int(11) NOT NULL,
  `info` varchar(200) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_member_card_create`
-- ----------------------------
DROP TABLE IF EXISTS `tp_member_card_create`;
CREATE TABLE `tp_member_card_create` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `number` varchar(20) NOT NULL,
  `wecha_id` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=1150 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_member_card_exchange`
-- ----------------------------
DROP TABLE IF EXISTS `tp_member_card_exchange`;
CREATE TABLE `tp_member_card_exchange` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `everyday` tinyint(4) NOT NULL,
  `continuation` tinyint(4) NOT NULL,
  `reward` tinyint(4) NOT NULL,
  `cardinfo` varchar(200) NOT NULL,
  `cardinfo2` varchar(200) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_member_card_info`
-- ----------------------------
DROP TABLE IF EXISTS `tp_member_card_info`;
CREATE TABLE `tp_member_card_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `info` varchar(200) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `description` varchar(12) NOT NULL,
  `class` tinyint(1) NOT NULL,
  `password` varchar(11) NOT NULL,
  `crate_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_member_card_integral`
-- ----------------------------
DROP TABLE IF EXISTS `tp_member_card_integral`;
CREATE TABLE `tp_member_card_integral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `title` varchar(60) NOT NULL,
  `integral` int(8) NOT NULL,
  `statdate` int(11) NOT NULL,
  `enddate` int(11) NOT NULL,
  `info` varchar(200) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_member_card_set`
-- ----------------------------
DROP TABLE IF EXISTS `tp_member_card_set`;
CREATE TABLE `tp_member_card_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `cardname` varchar(60) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `bg` varchar(100) NOT NULL,
  `diybg` varchar(200) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `numbercolor` varchar(10) NOT NULL,
  `vipnamecolor` varchar(10) NOT NULL,
  `Lastmsg` varchar(100) NOT NULL,
  `vip` varchar(100) NOT NULL,
  `qiandao` varchar(100) NOT NULL,
  `shopping` varchar(100) NOT NULL,
  `memberinfo` varchar(100) NOT NULL,
  `membermsg` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_member_card_sign`
-- ----------------------------
DROP TABLE IF EXISTS `tp_member_card_sign`;
CREATE TABLE `tp_member_card_sign` (
  `id` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `wecha_id` varchar(50) NOT NULL,
  `sign_time` int(11) NOT NULL,
  `is_sign` int(11) NOT NULL,
  `score_type` int(11) NOT NULL,
  `expense` int(11) NOT NULL,
  `sell_expense` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_member_card_vip`
-- ----------------------------
DROP TABLE IF EXISTS `tp_member_card_vip`;
CREATE TABLE `tp_member_card_vip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `title` varchar(60) NOT NULL,
  `group` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `statdate` int(11) NOT NULL,
  `enddate` int(11) NOT NULL,
  `info` varchar(200) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_nearby_user`
-- ----------------------------
DROP TABLE IF EXISTS `tp_nearby_user`;
CREATE TABLE `tp_nearby_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(30) NOT NULL,
  `uid` varchar(32) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_node`
-- ----------------------------
DROP TABLE IF EXISTS `tp_node`;
CREATE TABLE `tp_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '节点名称',
  `title` varchar(50) NOT NULL COMMENT '菜单名称',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否激活 1：是 2：否',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注说明',
  `pid` smallint(6) unsigned NOT NULL COMMENT '父ID',
  `level` tinyint(1) unsigned NOT NULL COMMENT '节点等级',
  `data` varchar(255) DEFAULT NULL COMMENT '附加参数',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序权重',
  `display` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '菜单显示类型 0:不显示 1:导航菜单 2:左侧菜单',
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_ordering_class`
-- ----------------------------
DROP TABLE IF EXISTS `tp_ordering_class`;
CREATE TABLE `tp_ordering_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `name` varchar(10) NOT NULL,
  `sort` tinyint(2) NOT NULL,
  `info` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_ordering_set`
-- ----------------------------
DROP TABLE IF EXISTS `tp_ordering_set`;
CREATE TABLE `tp_ordering_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `keyword` varchar(10) NOT NULL,
  `title` varchar(60) NOT NULL,
  `info` varchar(120) NOT NULL,
  `picurl` varchar(100) NOT NULL,
  `flash` text NOT NULL,
  `create_time` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_other`
-- ----------------------------
DROP TABLE IF EXISTS `tp_other`;
CREATE TABLE `tp_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `keyword` varchar(60) NOT NULL,
  `info` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_panorama`
-- ----------------------------
DROP TABLE IF EXISTS `tp_panorama`;
CREATE TABLE `tp_panorama` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `intro` varchar(300) NOT NULL DEFAULT '',
  `frontpic` varchar(100) NOT NULL DEFAULT '',
  `rightpic` varchar(100) NOT NULL DEFAULT '',
  `backpic` varchar(100) NOT NULL DEFAULT '',
  `leftpic` varchar(100) NOT NULL DEFAULT '',
  `toppic` varchar(100) NOT NULL DEFAULT '',
  `bottompic` varchar(100) NOT NULL DEFAULT '',
  `keyword` varchar(60) NOT NULL DEFAULT '',
  `taxis` int(10) NOT NULL DEFAULT '0',
  `music` varchar(100) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_photo`
-- ----------------------------
DROP TABLE IF EXISTS `tp_photo`;
CREATE TABLE `tp_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `title` varchar(20) NOT NULL,
  `picurl` varchar(100) NOT NULL,
  `isshoinfo` tinyint(1) NOT NULL,
  `num` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_time` int(11) NOT NULL,
  `info` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_photo_list`
-- ----------------------------
DROP TABLE IF EXISTS `tp_photo_list`;
CREATE TABLE `tp_photo_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `pid` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `sort` tinyint(3) NOT NULL,
  `picurl` varchar(100) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `info` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_product`
-- ----------------------------
DROP TABLE IF EXISTS `tp_product`;
CREATE TABLE `tp_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `catid` mediumint(4) NOT NULL DEFAULT '0',
  `storeid` mediumint(4) NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL DEFAULT '',
  `price` float NOT NULL DEFAULT '0',
  `oprice` float NOT NULL DEFAULT '0',
  `discount` float NOT NULL DEFAULT '10',
  `intro` text NOT NULL,
  `token` varchar(50) NOT NULL,
  `keyword` varchar(100) NOT NULL DEFAULT '',
  `salecount` mediumint(4) NOT NULL DEFAULT '0',
  `logourl` varchar(150) NOT NULL DEFAULT '',
  `dining` tinyint(1) NOT NULL DEFAULT '0',
  `groupon` tinyint(1) NOT NULL DEFAULT '0',
  `endtime` int(10) NOT NULL DEFAULT '0',
  `fakemembercount` mediumint(4) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`,`storeid`),
  KEY `catid_2` (`catid`),
  KEY `storeid` (`storeid`),
  KEY `token` (`token`),
  KEY `price` (`price`),
  KEY `oprice` (`oprice`),
  KEY `discount` (`discount`),
  KEY `dining` (`dining`),
  KEY `groupon` (`groupon`,`endtime`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_product_cart`
-- ----------------------------
DROP TABLE IF EXISTS `tp_product_cart`;
CREATE TABLE `tp_product_cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL DEFAULT '',
  `wecha_id` varchar(60) NOT NULL DEFAULT '',
  `info` varchar(300) NOT NULL DEFAULT '',
  `total` mediumint(4) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  `truename` varchar(20) NOT NULL DEFAULT '',
  `tel` varchar(14) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `diningtype` mediumint(2) NOT NULL DEFAULT '0',
  `tableid` mediumint(4) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL DEFAULT '0',
  `buytime` varchar(100) NOT NULL DEFAULT '',
  `groupon` tinyint(1) NOT NULL DEFAULT '0',
  `dining` tinyint(1) NOT NULL DEFAULT '0',
  `year` mediumint(4) NOT NULL DEFAULT '0',
  `month` mediumint(4) NOT NULL DEFAULT '0',
  `day` mediumint(4) NOT NULL DEFAULT '0',
  `hour` smallint(4) NOT NULL DEFAULT '0',
  `printed` tinyint(1) NOT NULL DEFAULT '0',
  `handled` tinyint(1) NOT NULL DEFAULT '0',
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  `orderid` varchar(40) NOT NULL,
  `sent` tinyint(1) NOT NULL DEFAULT '0',
  `logistics` varchar(70) NOT NULL,
  `logisticsid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`,`time`),
  KEY `groupon` (`groupon`),
  KEY `dining` (`dining`),
  KEY `printed` (`printed`),
  KEY `year` (`year`,`month`,`day`,`hour`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_product_cart_list`
-- ----------------------------
DROP TABLE IF EXISTS `tp_product_cart_list`;
CREATE TABLE `tp_product_cart_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cartid` int(10) NOT NULL DEFAULT '0',
  `productid` int(10) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  `total` mediumint(4) NOT NULL DEFAULT '0',
  `wecha_id` varchar(60) NOT NULL DEFAULT '',
  `token` varchar(50) NOT NULL DEFAULT '',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cartid` (`cartid`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_product_cat`
-- ----------------------------
DROP TABLE IF EXISTS `tp_product_cat`;
CREATE TABLE `tp_product_cat` (
  `id` mediumint(4) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL,
  `des` varchar(500) NOT NULL DEFAULT '',
  `parentid` mediumint(4) NOT NULL,
  `logourl` varchar(100) NOT NULL,
  `dining` tinyint(1) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parentid` (`parentid`),
  KEY `token` (`token`),
  KEY `dining` (`dining`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_product_diningtable`
-- ----------------------------
DROP TABLE IF EXISTS `tp_product_diningtable`;
CREATE TABLE `tp_product_diningtable` (
  `id` mediumint(4) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(60) NOT NULL DEFAULT '',
  `intro` varchar(500) NOT NULL DEFAULT '',
  `taxis` mediumint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_reply_info`
-- ----------------------------
DROP TABLE IF EXISTS `tp_reply_info`;
CREATE TABLE `tp_reply_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `title` varchar(30) NOT NULL DEFAULT '',
  `picurl` varchar(120) NOT NULL DEFAULT '',
  `info` varchar(120) NOT NULL DEFAULT '',
  `infotype` varchar(20) NOT NULL DEFAULT '',
  `diningyuding` tinyint(1) NOT NULL DEFAULT '1',
  `diningwaimai` tinyint(1) NOT NULL DEFAULT '1',
  `config` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_requestdata`
-- ----------------------------
DROP TABLE IF EXISTS `tp_requestdata`;
CREATE TABLE `tp_requestdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `year` int(4) NOT NULL,
  `month` int(2) NOT NULL,
  `day` int(2) NOT NULL,
  `time` int(11) NOT NULL,
  `textnum` int(5) NOT NULL,
  `imgnum` int(5) NOT NULL,
  `videonum` int(5) NOT NULL,
  `other` int(5) NOT NULL,
  `follownum` int(5) NOT NULL,
  `unfollownum` int(5) NOT NULL,
  `3g` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_role`
-- ----------------------------
DROP TABLE IF EXISTS `tp_role`;
CREATE TABLE `tp_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '后台组名',
  `pid` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `status` tinyint(1) unsigned DEFAULT '0' COMMENT '是否激活 1：是 0：否',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序权重',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注说明',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_role_user`
-- ----------------------------
DROP TABLE IF EXISTS `tp_role_user`;
CREATE TABLE `tp_role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` smallint(6) unsigned NOT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_selfform`
-- ----------------------------
DROP TABLE IF EXISTS `tp_selfform`;
CREATE TABLE `tp_selfform` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `token` varchar(30) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `keyword` varchar(100) NOT NULL DEFAULT '',
  `intro` varchar(400) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  `successtip` varchar(60) NOT NULL DEFAULT '',
  `failtip` varchar(60) NOT NULL DEFAULT '',
  `endtime` int(10) NOT NULL DEFAULT '0',
  `logourl` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `token` (`token`),
  KEY `endtime` (`endtime`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_selfform_input`
-- ----------------------------
DROP TABLE IF EXISTS `tp_selfform_input`;
CREATE TABLE `tp_selfform_input` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `formid` int(10) NOT NULL DEFAULT '0',
  `displayname` varchar(30) NOT NULL DEFAULT '',
  `fieldname` varchar(30) NOT NULL DEFAULT '',
  `inputtype` varchar(20) NOT NULL DEFAULT '',
  `options` varchar(200) NOT NULL DEFAULT '',
  `require` tinyint(1) NOT NULL DEFAULT '0',
  `regex` varchar(100) NOT NULL DEFAULT '',
  `taxis` mediumint(4) NOT NULL DEFAULT '0',
  `errortip` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `formid` (`formid`,`taxis`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_selfform_value`
-- ----------------------------
DROP TABLE IF EXISTS `tp_selfform_value`;
CREATE TABLE `tp_selfform_value` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `formid` int(10) NOT NULL DEFAULT '0',
  `wecha_id` varchar(50) NOT NULL DEFAULT '',
  `values` varchar(2000) NOT NULL DEFAULT '',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `formid` (`formid`,`wecha_id`,`time`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_site_plugmenu`
-- ----------------------------
DROP TABLE IF EXISTS `tp_site_plugmenu`;
CREATE TABLE `tp_site_plugmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL DEFAULT '',
  `name` varchar(20) NOT NULL DEFAULT '',
  `type` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `order` int(10) DEFAULT NULL,
  `taxis` mediumint(4) NOT NULL DEFAULT '0',
  `display` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`,`taxis`,`display`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_snccode`
-- ----------------------------
DROP TABLE IF EXISTS `tp_snccode`;
CREATE TABLE `tp_snccode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `wechaname` varchar(60) NOT NULL,
  `caeatetime` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `token` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_system_info`
-- ----------------------------
DROP TABLE IF EXISTS `tp_system_info`;
CREATE TABLE `tp_system_info` (
  `lastsqlupdate` int(10) NOT NULL,
  `version` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_taobao`
-- ----------------------------
DROP TABLE IF EXISTS `tp_taobao`;
CREATE TABLE `tp_taobao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(64) NOT NULL,
  `keyword` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `picurl` varchar(100) NOT NULL,
  `homeurl` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `keyword` (`keyword`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_text`
-- ----------------------------
DROP TABLE IF EXISTS `tp_text`;
CREATE TABLE `tp_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `uname` varchar(90) NOT NULL,
  `keyword` char(255) NOT NULL,
  `type` varchar(1) NOT NULL,
  `text` text NOT NULL,
  `createtime` varchar(13) NOT NULL,
  `updatetime` varchar(13) NOT NULL,
  `click` int(11) NOT NULL,
  `token` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=utf8 COMMENT='文本回复表';

-- ----------------------------
--  Table structure for `tp_token_open`
-- ----------------------------
DROP TABLE IF EXISTS `tp_token_open`;
CREATE TABLE `tp_token_open` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  `queryname` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_upyun_attachement`
-- ----------------------------
DROP TABLE IF EXISTS `tp_upyun_attachement`;
CREATE TABLE `tp_upyun_attachement` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `url` varchar(160) NOT NULL,
  `code` varchar(10) NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_user`
-- ----------------------------
DROP TABLE IF EXISTS `tp_user`;
CREATE TABLE `tp_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `role` smallint(6) unsigned NOT NULL COMMENT '组ID',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态 1:启用 0:禁止',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注说明',
  `last_login_time` int(11) unsigned NOT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(15) DEFAULT NULL COMMENT '最后登录IP',
  `last_location` varchar(100) DEFAULT NULL COMMENT '最后登录位置',
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
--  Table structure for `tp_user_group`
-- ----------------------------
DROP TABLE IF EXISTS `tp_user_group`;
CREATE TABLE `tp_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `diynum` int(11) NOT NULL,
  `connectnum` int(11) NOT NULL,
  `iscopyright` tinyint(1) NOT NULL,
  `activitynum` int(3) NOT NULL,
  `price` int(11) NOT NULL,
  `statistics_user` int(11) NOT NULL,
  `create_card_num` int(4) NOT NULL,
  `wechat_card_num` int(4) NOT NULL DEFAULT '4',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_user_request`
-- ----------------------------
DROP TABLE IF EXISTS `tp_user_request`;
CREATE TABLE `tp_user_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(30) NOT NULL,
  `uid` varchar(32) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `msgtype` varchar(15) NOT NULL DEFAULT 'text',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `msgtype` (`msgtype`),
  KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_userinfo`
-- ----------------------------
DROP TABLE IF EXISTS `tp_userinfo`;
CREATE TABLE `tp_userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `wecha_id` varchar(60) NOT NULL,
  `wechaname` varchar(60) NOT NULL,
  `truename` varchar(60) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `qq` int(11) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `age` int(3) NOT NULL,
  `birthday` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `info` varchar(200) NOT NULL,
  `total_score` int(11) NOT NULL,
  `sign_score` int(11) NOT NULL,
  `expend_score` int(11) NOT NULL,
  `continuous` int(11) NOT NULL,
  `add_expend` int(11) NOT NULL,
  `add_expend_time` int(11) NOT NULL,
  `live_time` int(11) NOT NULL,
  `getcardtime` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_users`
-- ----------------------------
DROP TABLE IF EXISTS `tp_users`;
CREATE TABLE `tp_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(90) NOT NULL,
  `createtime` varchar(13) NOT NULL,
  `lasttime` varchar(13) NOT NULL,
  `status` varchar(1) NOT NULL,
  `createip` varchar(30) NOT NULL,
  `lastip` varchar(30) NOT NULL,
  `diynum` int(11) NOT NULL,
  `activitynum` int(11) NOT NULL,
  `card_num` int(11) NOT NULL,
  `card_create_status` tinyint(1) NOT NULL,
  `wechat_card_num` mediumint(4) NOT NULL DEFAULT '0',
  `money` int(11) NOT NULL,
  `viptime` varchar(13) NOT NULL,
  `connectnum` int(11) NOT NULL DEFAULT '0',
  `lastloginmonth` smallint(2) NOT NULL DEFAULT '0',
  `mobile` varchar(16) DEFAULT NULL,
  `qq` varchar(32) DEFAULT NULL,
  `nickname` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='前台用户表';

-- ----------------------------
--  Table structure for `tp_voiceresponse`
-- ----------------------------
DROP TABLE IF EXISTS `tp_voiceresponse`;
CREATE TABLE `tp_voiceresponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `uname` varchar(90) NOT NULL,
  `createtime` varchar(13) NOT NULL,
  `uptatetime` varchar(13) NOT NULL,
  `keyword` char(255) NOT NULL,
  `title` varchar(60) NOT NULL,
  `musicurl` char(255) NOT NULL,
  `hqmusicurl` char(255) NOT NULL,
  `description` char(255) NOT NULL,
  `token` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='语音回复表';

-- ----------------------------
--  Table structure for `tp_weather`
-- ----------------------------
DROP TABLE IF EXISTS `tp_weather`;
CREATE TABLE `tp_weather` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `code` char(9) NOT NULL,
  `name` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2502 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_wecha_user`
-- ----------------------------
DROP TABLE IF EXISTS `tp_wecha_user`;
CREATE TABLE `tp_wecha_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `wecha_id` varchar(60) NOT NULL,
  PRIMARY KEY (`token`,`wecha_id`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_wxmenu`
-- ----------------------------
DROP TABLE IF EXISTS `tp_wxmenu`;
CREATE TABLE `tp_wxmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `sort` tinyint(3) NOT NULL,
  `is_show` tinyint(2) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `tp_wxuser`
-- ----------------------------
DROP TABLE IF EXISTS `tp_wxuser`;
CREATE TABLE `tp_wxuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `wxname` varchar(60) NOT NULL COMMENT '公众号名称',
  `wxid` varchar(20) NOT NULL COMMENT '公众号原始ID',
  `weixin` char(20) NOT NULL COMMENT '微信号',
  `headerpic` char(255) NOT NULL COMMENT '头像地址',
  `token` char(255) NOT NULL,
  `province` varchar(30) NOT NULL COMMENT '省',
  `city` varchar(60) NOT NULL COMMENT '市',
  `qq` char(25) NOT NULL COMMENT '公众号邮箱',
  `wxfans` int(11) NOT NULL COMMENT '微信粉丝',
  `typeid` int(11) NOT NULL COMMENT '分类ID',
  `typename` varchar(90) NOT NULL DEFAULT '0' COMMENT '分类名',
  `tongji` text NOT NULL,
  `allcardnum` int(11) NOT NULL,
  `cardisok` int(11) NOT NULL,
  `yetcardnum` int(11) NOT NULL,
  `totalcardnum` int(11) NOT NULL,
  `createtime` varchar(13) NOT NULL,
  `tpltypeid` varchar(2) NOT NULL DEFAULT '1' COMMENT '默认首页模版ID',
  `updatetime` varchar(13) NOT NULL,
  `tpltypename` varchar(20) NOT NULL COMMENT '首页模版名',
  `tpllistid` varchar(10) NOT NULL COMMENT '列表模版ID',
  `tpllistname` varchar(20) NOT NULL COMMENT '列表模版名',
  `tplcontentid` varchar(10) NOT NULL COMMENT '内容模版ID',
  `tplcontentname` varchar(20) NOT NULL COMMENT '内容模版名',
  `tplchid` varchar(10) DEFAULT NULL,
  `tplchname` varchar(20) DEFAULT NULL,
  `tplmenuid` varchar(10) DEFAULT NULL,
  `tplmenuname` varchar(20) DEFAULT NULL,
  `color_id` mediumint(4) NOT NULL DEFAULT '0',
  `wecha_id` varchar(256) DEFAULT NULL,
  `wxaccount` varchar(256) DEFAULT NULL,
  `wxpwd` varchar(256) DEFAULT NULL,
  `wxfakeid` varchar(256) DEFAULT NULL,
  `type` tinyint(2) NOT NULL,
  `appid` varchar(255) DEFAULT NULL,
  `appsecret` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `uid_2` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COMMENT='微信公共帐号';

-- ----------------------------
--  Table structure for `tp_xitie`
-- ----------------------------
DROP TABLE IF EXISTS `tp_xitie`;
CREATE TABLE `tp_xitie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(40) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `opening_animation` varchar(100) DEFAULT NULL,
  `small_pic` varchar(100) DEFAULT NULL,
  `man_name` varchar(20) DEFAULT NULL,
  `girl_name` varchar(20) DEFAULT NULL,
  `time` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `video` varchar(100) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `background_music` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `site_map_2` varchar(100) DEFAULT NULL,
  `site_map_3` varchar(100) DEFAULT NULL,
  `site_map_4` varchar(100) DEFAULT NULL,
  `site_map_5` varchar(100) DEFAULT NULL,
  `site_map_1` varchar(100) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_yuyue`
-- ----------------------------
DROP TABLE IF EXISTS `tp_yuyue`;
CREATE TABLE `tp_yuyue` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(100) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `topic` varchar(200) DEFAULT NULL,
  `info` varchar(500) DEFAULT NULL,
  `statdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_yuyue_order`
-- ----------------------------
DROP TABLE IF EXISTS `tp_yuyue_order`;
CREATE TABLE `tp_yuyue_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `token` varchar(40) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `num` int(4) DEFAULT NULL,
  `memo` varchar(200) DEFAULT NULL,
  `type` smallint(4) DEFAULT '0',
  `wecha_id` int(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_zhufu`
-- ----------------------------
DROP TABLE IF EXISTS `tp_zhufu`;
CREATE TABLE `tp_zhufu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xid` int(11) NOT NULL,
  `wecha_id` varchar(60) NOT NULL,
  `token` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
