/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : bdnovel

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2016-11-09 21:19:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bd_admin
-- ----------------------------
DROP TABLE IF EXISTS `bd_admin`;
CREATE TABLE `bd_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `adminname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL DEFAULT '',
  `phone` char(11) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `addtime` int(11) NOT NULL,
  `logtime` int(11) NOT NULL,
  `level` enum('0','1') NOT NULL DEFAULT '1' COMMENT '''0''：超级管理员 ''1''：技术人员',
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '''0'':正常 ''1'':禁用',
  PRIMARY KEY (`id`),
  UNIQUE KEY `adminname` (`adminname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bd_admin
-- ----------------------------

-- ----------------------------
-- Table structure for bd_author
-- ----------------------------
DROP TABLE IF EXISTS `bd_author`;
CREATE TABLE `bd_author` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `authorname` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `authorname` (`authorname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bd_author
-- ----------------------------

-- ----------------------------
-- Table structure for bd_book
-- ----------------------------
DROP TABLE IF EXISTS `bd_book`;
CREATE TABLE `bd_book` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bookname` varchar(255) NOT NULL,
  `authorid` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `pressid` int(11) NOT NULL,
  `totalclick` int(11) NOT NULL DEFAULT '0',
  `weekclick` int(11) NOT NULL DEFAULT '0',
  `bookpic` varchar(255) NOT NULL,
  `collect` int(11) NOT NULL DEFAULT '0',
  `label` varchar(255) NOT NULL DEFAULT '',
  `price` double(6,2) NOT NULL,
  `addtime` int(11) NOT NULL,
  `descr` varchar(255) NOT NULL DEFAULT '',
  `wordnum` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '''0'':新上架 ''1'':在售 ''2'':下架',
  PRIMARY KEY (`id`),
  UNIQUE KEY `bookname` (`bookname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bd_book
-- ----------------------------

-- ----------------------------
-- Table structure for bd_bookshelf
-- ----------------------------
DROP TABLE IF EXISTS `bd_bookshelf`;
CREATE TABLE `bd_bookshelf` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `readerid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `status` enum('2','1','0') NOT NULL DEFAULT '0' COMMENT '''0'':已购买 ''1'':已收藏 ''2'':收藏并购买',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of bd_bookshelf
-- ----------------------------

-- ----------------------------
-- Table structure for bd_comment
-- ----------------------------
DROP TABLE IF EXISTS `bd_comment`;
CREATE TABLE `bd_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `addtime` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `content` text NOT NULL,
  `readerid` int(11) NOT NULL,
  `replynum` int(11) NOT NULL DEFAULT '0',
  `likenum` int(11) NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '''0''表示可见 ''1''表示不可见',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bd_comment
-- ----------------------------

-- ----------------------------
-- Table structure for bd_detail
-- ----------------------------
DROP TABLE IF EXISTS `bd_detail`;
CREATE TABLE `bd_detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `price` double(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of bd_detail
-- ----------------------------

-- ----------------------------
-- Table structure for bd_history
-- ----------------------------
DROP TABLE IF EXISTS `bd_history`;
CREATE TABLE `bd_history` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bookid` int(11) NOT NULL,
  `readerid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bd_history
-- ----------------------------

-- ----------------------------
-- Table structure for bd_integ
-- ----------------------------
DROP TABLE IF EXISTS `bd_integ`;
CREATE TABLE `bd_integ` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `readerid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `integ` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '''0''表示增加 ''1''表示减少',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of bd_integ
-- ----------------------------

-- ----------------------------
-- Table structure for bd_log
-- ----------------------------
DROP TABLE IF EXISTS `bd_log`;
CREATE TABLE `bd_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `readerid` int(11) NOT NULL DEFAULT '0',
  `ip` char(15) NOT NULL,
  `browser` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bd_log
-- ----------------------------

-- ----------------------------
-- Table structure for bd_orders
-- ----------------------------
DROP TABLE IF EXISTS `bd_orders`;
CREATE TABLE `bd_orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `readerid` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `total` double(6,2) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '''0'':读者可见 ''1'':读者不可见',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bd_orders
-- ----------------------------

-- ----------------------------
-- Table structure for bd_press
-- ----------------------------
DROP TABLE IF EXISTS `bd_press`;
CREATE TABLE `bd_press` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pressname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pressname` (`pressname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bd_press
-- ----------------------------

-- ----------------------------
-- Table structure for bd_reader
-- ----------------------------
DROP TABLE IF EXISTS `bd_reader`;
CREATE TABLE `bd_reader` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `readername` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(11) NOT NULL DEFAULT '',
  `sex` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '''0'':女 ''1'':男 ''2'':保密',
  `pic` varchar(255) NOT NULL DEFAULT '',
  `descr` varchar(255) NOT NULL DEFAULT '',
  `integ` int(11) unsigned NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL,
  `logtime` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '''0'':正常  ''1'':禁用',
  PRIMARY KEY (`id`),
  UNIQUE KEY `readername` (`readername`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bd_reader
-- ----------------------------

-- ----------------------------
-- Table structure for bd_recycle
-- ----------------------------
DROP TABLE IF EXISTS `bd_recycle`;
CREATE TABLE `bd_recycle` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bookid` int(11) NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `authorid` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `pressid` int(11) NOT NULL,
  `totalclick` int(11) NOT NULL DEFAULT '0',
  `weekclick` int(11) NOT NULL DEFAULT '0',
  `bpic` varchar(255) NOT NULL,
  `collect` int(11) NOT NULL DEFAULT '0',
  `status` enum('0','2','1') NOT NULL DEFAULT '0' COMMENT '''0'':新上架 ''1'':在售 ''2'':下架',
  `label` varchar(255) NOT NULL DEFAULT '',
  `price` double(6,2) NOT NULL,
  `addtime` int(11) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `wordnum` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bookname` (`bookname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bd_recycle
-- ----------------------------

-- ----------------------------
-- Table structure for bd_reply
-- ----------------------------
DROP TABLE IF EXISTS `bd_reply`;
CREATE TABLE `bd_reply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `commentid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `replytime` int(11) NOT NULL,
  `replycontent` text NOT NULL,
  `readerid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bd_reply
-- ----------------------------

-- ----------------------------
-- Table structure for bd_shopcar
-- ----------------------------
DROP TABLE IF EXISTS `bd_shopcar`;
CREATE TABLE `bd_shopcar` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `readerid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bd_shopcar
-- ----------------------------

-- ----------------------------
-- Table structure for bd_type
-- ----------------------------
DROP TABLE IF EXISTS `bd_type`;
CREATE TABLE `bd_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `typename` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `typename` (`typename`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bd_type
-- ----------------------------
