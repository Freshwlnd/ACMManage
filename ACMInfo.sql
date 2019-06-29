/*
 Navicat Premium Data Transfer

 Source Server         : link1
 Source Server Type    : MySQL
 Source Server Version : 50643
 Source Host           : localhost:3306
 Source Schema         : ACMInfo

 Target Server Type    : MySQL
 Target Server Version : 50643
 File Encoding         : 65001

 Date: 29/06/2019 18:53:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ParticipateOnC
-- ----------------------------
DROP TABLE IF EXISTS `ParticipateOnC`;
CREATE TABLE `ParticipateOnC` (
  `TNo` int(11) NOT NULL DEFAULT '0',
  `TName` char(50) DEFAULT NULL,
  `OnCNo` int(11) NOT NULL DEFAULT '0',
  `Rank` int(11) DEFAULT NULL,
  PRIMARY KEY (`TNo`,`OnCNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for TrainingContest
-- ----------------------------
DROP TABLE IF EXISTS `TrainingContest`;
CREATE TABLE `TrainingContest` (
  `TrCNo` int(11) NOT NULL AUTO_INCREMENT,
  `Time` date DEFAULT NULL,
  PRIMARY KEY (`TrCNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for announcement
-- ----------------------------
DROP TABLE IF EXISTS `announcement`;
CREATE TABLE `announcement` (
  `Title` char(255) DEFAULT NULL,
  `Content` char(255) DEFAULT NULL,
  `Time` datetime NOT NULL,
  PRIMARY KEY (`Time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of announcement
-- ----------------------------
BEGIN;
INSERT INTO `announcement` VALUES ('训练赛1', '训练赛时间为2019-7-13，在信息楼实验室202进行，请各位同学及时到达。', '2019-06-29 04:04:34');
INSERT INTO `announcement` VALUES ('训练赛1结果', '罗金荣同学获得了本次训练赛的冠军，让大家一起恭喜他！', '2019-06-29 04:07:02');
INSERT INTO `announcement` VALUES ('EC-Final名单', '徐悦皓、罗金荣、龚炯达；以及其他同学入选最终名单，如有异议，请在三天内找猛士老师协商，当然，协商也不会改变结果。', '2019-06-29 04:08:12');
COMMIT;

-- ----------------------------
-- Table structure for computer
-- ----------------------------
DROP TABLE IF EXISTS `computer`;
CREATE TABLE `computer` (
  `CompNo` char(12) NOT NULL,
  `PNo` char(20) DEFAULT NULL,
  PRIMARY KEY (`CompNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for dailydutyteam
-- ----------------------------
DROP TABLE IF EXISTS `dailydutyteam`;
CREATE TABLE `dailydutyteam` (
  `DDTNo` int(11) NOT NULL,
  `PNo1` char(20) DEFAULT NULL,
  `PNo2` char(20) DEFAULT NULL,
  `PNo3` char(20) DEFAULT NULL,
  `PNo4` char(20) DEFAULT NULL,
  `PNo5` char(20) DEFAULT NULL,
  PRIMARY KEY (`DDTNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for offlinecontest
-- ----------------------------
DROP TABLE IF EXISTS `offlinecontest`;
CREATE TABLE `offlinecontest` (
  `OffCNo` int(11) NOT NULL AUTO_INCREMENT,
  `OffCName` char(100) DEFAULT NULL,
  `University` char(100) DEFAULT NULL,
  `Expend` float DEFAULT NULL,
  `Time` date DEFAULT NULL,
  PRIMARY KEY (`OffCNo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of offlinecontest
-- ----------------------------
BEGIN;
INSERT INTO `offlinecontest` VALUES (1, 'World-Final', '清华大学', 100, '2019-06-28');
INSERT INTO `offlinecontest` VALUES (2, '西安邀请赛', '西安工业大学', 200, '2019-05-17');
INSERT INTO `offlinecontest` VALUES (3, '湘潭邀请赛', '湘潭大学', 300, '2019-06-01');
COMMIT;

-- ----------------------------
-- Table structure for onlinecontest
-- ----------------------------
DROP TABLE IF EXISTS `onlinecontest`;
CREATE TABLE `onlinecontest` (
  `OnCNo` int(11) NOT NULL AUTO_INCREMENT,
  `OJName` char(100) DEFAULT NULL,
  `OnCName` char(100) DEFAULT NULL,
  `Time` date DEFAULT NULL,
  PRIMARY KEY (`OnCNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for participateoffc
-- ----------------------------
DROP TABLE IF EXISTS `participateoffc`;
CREATE TABLE `participateoffc` (
  `TNo` int(11) NOT NULL DEFAULT '0',
  `TName` char(50) DEFAULT NULL,
  `OffCNo` int(11) NOT NULL DEFAULT '0',
  `Rank` int(11) DEFAULT NULL,
  `GoldMedal` int(11) DEFAULT NULL,
  `SilverMedal` int(11) DEFAULT NULL,
  `BronzeMedal` int(11) DEFAULT NULL,
  PRIMARY KEY (`TNo`,`OffCNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of participateoffc
-- ----------------------------
BEGIN;
INSERT INTO `participateoffc` VALUES (1, '我们一定会有女朋友的', 1, 1, 1, 0, 0);
INSERT INTO `participateoffc` VALUES (1, '我们一定会有女朋友的', 2, 14, 1, 0, 0);
INSERT INTO `participateoffc` VALUES (2, '大家好', 3, 37, 0, 1, 0);
COMMIT;

-- ----------------------------
-- Table structure for participatetrc
-- ----------------------------
DROP TABLE IF EXISTS `participatetrc`;
CREATE TABLE `participatetrc` (
  `PNo` int(11) NOT NULL DEFAULT '0',
  `TrCNo` int(11) NOT NULL DEFAULT '0',
  `Rank` int(11) DEFAULT NULL,
  PRIMARY KEY (`PNo`,`TrCNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for person
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `PNo` char(20) NOT NULL,
  `PName` char(20) NOT NULL,
  `PSex` char(5) DEFAULT NULL,
  `PClass` char(10) DEFAULT NULL,
  `PBankNo` char(30) DEFAULT NULL,
  `PHeight` int(11) DEFAULT NULL,
  `PPhone` char(15) DEFAULT NULL,
  `PQQ` char(15) DEFAULT NULL,
  `PWechat` char(20) DEFAULT NULL,
  `PT_Size` char(5) DEFAULT NULL,
  `PSignNo` int(11) DEFAULT NULL,
  `PHdu` char(100) DEFAULT NULL,
  `PWeight` int(11) DEFAULT NULL,
  `PSingle` char(5) DEFAULT NULL,
  `PAdmin` int(11) DEFAULT '0',
  `PPassword` char(255) NOT NULL,
  `PSeatNo` char(20) DEFAULT NULL,
  PRIMARY KEY (`PNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of person
-- ----------------------------
BEGIN;
INSERT INTO `person` VALUES ('1712190101', '张思远', '男', '计科1701', '7894561874654122543', NULL, '17371737173', '1848184818', '123456', 'XL', NULL, 'zhangsiyuanaichigua', NULL, NULL, 0, 'fb86afdc6f218e61054c5c9574460095', NULL);
INSERT INTO `person` VALUES ('1712190113', '龚炯达', '男', '计科1701', '', NULL, '173****5843', '1848663638', '0', 'M', NULL, '', NULL, NULL, 1, 'e10adc3949ba59abbe56e057f20f883e', '1');
INSERT INTO `person` VALUES ('1712190114', '徐悦皓', '男', '计科1701', '', NULL, '1737656xxxx', '9856059xx', '', 'L', NULL, 'freshwind11', NULL, NULL, 1, '21232f297a57a5a743894a0e4a801fc3', '2');
INSERT INTO `person` VALUES ('1712190115', '张羽丰', '男', '计科1701', '', NULL, '17376562358', '1691903105', '', 'L', NULL, '蓝音', NULL, NULL, 0, 'e10adc3949ba59abbe56e057f20f883e', '3');
INSERT INTO `person` VALUES ('1712190120', '罗金荣', '男', '计科1701', '', NULL, '', '', '', 'M', NULL, '我叫罗金荣', NULL, NULL, 1, '21232f297a57a5a743894a0e4a801fc3', '4');
INSERT INTO `person` VALUES ('1712190400', '缪佩翰', '男', '计科1701', '1234567891234567890', NULL, '17371737173', '1884411', '12456498', 'XL', NULL, NULL, NULL, NULL, 0, 'f2d136ea22a5b6e0ed0120a03ab795c2', NULL);
COMMIT;

-- ----------------------------
-- Table structure for team
-- ----------------------------
DROP TABLE IF EXISTS `team`;
CREATE TABLE `team` (
  `TNo` int(11) NOT NULL AUTO_INCREMENT,
  `PNo1` char(20) DEFAULT NULL,
  `PNo2` char(20) DEFAULT NULL,
  `PNo3` char(20) DEFAULT NULL,
  PRIMARY KEY (`TNo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of team
-- ----------------------------
BEGIN;
INSERT INTO `team` VALUES (1, '1712190114', '1712190113', '1712190120');
INSERT INTO `team` VALUES (2, '1712190400', '1712190120', '1712190101');
COMMIT;

-- ----------------------------
-- View structure for admindata
-- ----------------------------
DROP VIEW IF EXISTS `admindata`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admindata` AS select `person`.`PName` AS `PName`,`person`.`PNo` AS `PNo`,`person`.`PSex` AS `PSex`,`person`.`PClass` AS `PClass`,`person`.`PBankNo` AS `PBankNo`,`person`.`PPhone` AS `PPhone`,`person`.`PQQ` AS `PQQ`,`person`.`PWechat` AS `PWechat`,`person`.`PT_Size` AS `PT_Size`,`person`.`PHdu` AS `PHdu`,`person`.`PAdmin` AS `PAdmin`,`person`.`PSeatNo` AS `PSeatNo` from `person`;

-- ----------------------------
-- View structure for announce
-- ----------------------------
DROP VIEW IF EXISTS `announce`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `announce` AS select `announcement`.`Title` AS `Title`,`announcement`.`Content` AS `Content`,`announcement`.`Time` AS `Time` from `announcement` order by `announcement`.`Time` desc;

-- ----------------------------
-- View structure for dailyduty
-- ----------------------------
DROP VIEW IF EXISTS `dailyduty`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dailyduty` AS select `dailydutyteam`.`DDTNo` AS `DDTNo`,`dailydutyteam`.`PNo1` AS `PNo1`,`dailydutyteam`.`PNo2` AS `PNo2`,`dailydutyteam`.`PNo3` AS `PNo3`,`dailydutyteam`.`PNo4` AS `PNo4`,`dailydutyteam`.`PNo5` AS `PNo5` from `dailydutyteam`;

-- ----------------------------
-- View structure for normaldata
-- ----------------------------
DROP VIEW IF EXISTS `normaldata`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `normaldata` AS select `person`.`PName` AS `PName`,`person`.`PNo` AS `PNo`,`person`.`PSex` AS `PSex`,`person`.`PClass` AS `PClass`,`person`.`PPhone` AS `PPhone`,`person`.`PQQ` AS `PQQ`,`person`.`PWechat` AS `PWechat`,`person`.`PT_Size` AS `PT_Size`,`person`.`PHdu` AS `PHdu`,`person`.`PSeatNo` AS `PSeatNo` from `person`;

-- ----------------------------
-- View structure for offawards
-- ----------------------------
DROP VIEW IF EXISTS `offawards`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `offawards` AS select `offlinecontest`.`Time` AS `比赛时间`,`offlinecontest`.`University` AS `比赛地点`,`offlinecontest`.`OffCName` AS `比赛名`,`participateoffc`.`TName` AS `队伍名`,`participateoffc`.`GoldMedal` AS `GoldMedal`,`participateoffc`.`SilverMedal` AS `SilverMedal`,`participateoffc`.`BronzeMedal` AS `BronzeMedal`,`team`.`PNo1` AS `PNo1`,`team`.`PNo2` AS `PNo2`,`team`.`PNo3` AS `PNo3` from ((`team` join `participateoffc`) join `offlinecontest`) where ((`participateoffc`.`OffCNo` = `offlinecontest`.`OffCNo`) and (`participateoffc`.`TNo` = `team`.`TNo`));

-- ----------------------------
-- View structure for pnopname
-- ----------------------------
DROP VIEW IF EXISTS `pnopname`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pnopname` AS select `person`.`PNo` AS `PNo`,`person`.`PName` AS `PName` from `person`;

-- ----------------------------
-- View structure for userpassword
-- ----------------------------
DROP VIEW IF EXISTS `userpassword`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userpassword` AS select `person`.`PNo` AS `学号`,`person`.`PPassword` AS `密码` from `person`;

SET FOREIGN_KEY_CHECKS = 1;
