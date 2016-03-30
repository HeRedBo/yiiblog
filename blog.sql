## blog 博客数据库

# 系统管理员表
CREATE DATABASW `yii_blog` DEFAULT CHARSET utf8;
CREATE TABLE `yii_admin` (
	`uid` int unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
	`username` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
	`password` char(32) NOT NULL DEFAULT '' COMMENT '用户密码',
	`salt` char(6) NOT NULL DEFAULT '' COMMENT '加密的盐',
	PRIMARY KEY (`uid`)
) ENGINE MyISAM CHARSET utf8 COMMENT '后台管理员表';

#系统初始密码
INSERT INTO `yii_admin` values('1','admin','f0dbf28e571a2e8f0ae5811bc4181685','bl1234');

DROP TABLE IF EXISTS `yii_article`;
CREATE TABLE `yii_article` (
	`aid` int unsigned NOT NULL AUTO_INCREMENT,
	`title` varchar(155) NOT NULL DEFAULT '' COMMENT '文章标题',
	`time` int unsigned NOT NULL DEFAULT '0' COMMENT '发表日期',
	`thumb` varchar(200) NOT NULL DEFAULT '' COMMENT '文章缩略图',
	`content` text DEFAULT '' COMMENT '博客内容',
	`type` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '博客类型',
	`info` varchar(155) NOT NULL DEFAULT '' COMMENT '信息',
	`cid` mediumint unsigned NOT NULL DEFAULT '0' COMMENT '博客分类',
	PRIMARY KEY(`aid`)
)  ENGINE=InnoDB DEFAULT CHARSET = utf8 COMMENT '博客文章表';

# 博客分类表
DROP TABLE IF EXISTS `yii_category`;
CREATE TABLE `yii_category` (
	`cid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
	`cname` varchar(30) NOT NULL DEFAULT "" COMMENT '分类名称',
	 PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

INSERT INTO `yii_category` VALUES ('15', '情感');
INSERT INTO `yii_category` VALUES ('16', '生活');
INSERT INTO `yii_category` VALUES ('17', '趣事');
INSERT INTO `yii_category` VALUES ('18', '奇闻');

# 文件上传测试表
DROP TABLE IF EXISTS `yii_companynews`;
CREATE TABLE `yii_companynews` (
	`id` int unsigned not null  AUTO_INCREMENT,
	`news_pic` varchar(200) not null DEFAULT '' COMMENT '图片表',
	`add_time` int not null DEFAULT 0 COMMENT '0',
	PRIMARY KEY(`id`)
) ENGINE=InnoDB CHARSET utf8 COMMENT '图片上传测试表';


