/*
Navicat MySQL Data Transfer

Source Server         : shop
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tpthink5

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-08-02 13:42:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for goods_type
-- ----------------------------
DROP TABLE IF EXISTS `goods_type`;
CREATE TABLE `goods_type` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT '0',
  `level` int(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=270 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_type
-- ----------------------------
INSERT INTO `goods_type` VALUES ('267', '1', '0', '0,267', '1', '2018-07-30 20:35:44');
INSERT INTO `goods_type` VALUES ('268', '2', '267', '0,267,268', '2', '2018-07-30 20:35:53');

-- ----------------------------
-- Table structure for shop_goods
-- ----------------------------
DROP TABLE IF EXISTS `shop_goods`;
CREATE TABLE `shop_goods` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gname` varchar(255) DEFAULT NULL,
  `tid` int(10) DEFAULT NULL,
  `tpid` int(10) DEFAULT NULL,
  `unit` char(255) DEFAULT NULL,
  `attributes` enum('推荐','新品','热卖','促销','包邮','限时卖','不参与会员折扣') DEFAULT NULL,
  `imagepath` varchar(255) DEFAULT NULL,
  `number` int(10) DEFAULT NULL,
  `barcode` int(10) DEFAULT NULL,
  `curprice` int(10) DEFAULT NULL,
  `oriprice` int(10) DEFAULT NULL,
  `cosprice` int(10) DEFAULT NULL,
  `inventory` int(10) DEFAULT NULL,
  `restrict` int(10) DEFAULT NULL,
  `already` int(10) DEFAULT NULL,
  `freight` int(10) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `reorder` int(255) DEFAULT NULL,
  `text` text,
  `update_time` datetime DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_goods
-- ----------------------------
INSERT INTO `shop_goods` VALUES ('73', '1', '243', '0', '', '推荐', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '2018-07-26 15:51:23', '2018-07-26 15:51:23');
INSERT INTO `shop_goods` VALUES ('74', '我', '243', '0', '', '推荐', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '2018-07-27 16:37:16', '2018-07-27 16:37:16');
INSERT INTO `shop_goods` VALUES ('75', '2', '267', '0', '', '推荐', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2', '2018-07-30 20:38:55', '2018-07-30 20:38:55');
INSERT INTO `shop_goods` VALUES ('72', '1', '243', '0', '', '推荐', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '2018-07-26 15:50:48', '2018-07-26 15:50:48');
INSERT INTO `shop_goods` VALUES ('71', '1', '243', '0', '', '推荐', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '2018-07-26 15:50:21', '2018-07-26 15:50:21');
INSERT INTO `shop_goods` VALUES ('70', '1', '243', '0', '', '推荐', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '2018-07-26 15:49:50', '2018-07-26 15:49:50');
INSERT INTO `shop_goods` VALUES ('69', '1', '243', '0', '', '推荐', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '2018-07-26 14:24:31', '2018-07-26 14:24:31');
