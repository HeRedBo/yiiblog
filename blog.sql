## blog 博客数据库

# 系统管理员表
CREATE DATABASW `yii_blog` DEFAULT CHARSET utf8;
DROP TABLE IF EXISTS 
DROP TABLE IF EXISTE `bg_admin` (
	`uid` int unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
	`username` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
	`password` char(32) NOT NULL DEFAULT '' COMMENT '用户密码',
	'salt' char(6) NOT NULL DEFAULT '' COMMENT '加密的盐',
	PRIMARY KEY (`uid`)
) ENGINE MyISAM CHARSET utf8 COMMENT '后台管理员表';

INSERT INTO `bg_admin` values('1','admin','4f17be8c1449482dd7152dcbf281eaee','bl1234');

CREATE TABLE `bg_article` (
	`aid` int unsigned NOT NULL AUTO_INCREMENT,
	`title` varchar(155) NOT NULL DEFAULT '' COMMENT '文章标题',
	`time` int unsigned NOT NULL DEFAULT '0' COMMENT '发表日期',
	`thumb` varchar(200) NOT NULL DEFAULT '' COMMENT '文章缩略图',
	`content` text DEFAULT '' COMMENT '博客内容',
	`type` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '博客类型',
	'cid' mediumint unsigned NOT NULL DEFAULT '0' COMMENT '博客分类',
	PRIMARY KEY(`aid`)
)  ENGINE=InnoDB DEFAULT CHARSET = utf8 COMMENT '博客文章表';
