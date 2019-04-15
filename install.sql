-- 创建用户表
DROP TABLE IF EXISTS `user`;
CREATE TABLE `users` (
	`user_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
	`wx_id` varchar(255) COMMENT '微信ID',
	`username` varchar(255) COMMENT '用户账号',
	`password` varchar(255) COMMENT '用户密码',
	`nickname` varchar(255) COMMENT '用户昵称',
	`mobile` varchar(255) COMMENT '手机号',
	`email` varchar(255) COMMENT '邮箱',
	`create_time` bigint COMMENT '创建时间',
	`update_time` bigint COMMENT '修改时间',
	PRIMARY KEY(`user_id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- 创建素材表
DROP TABLE IF EXISTS `parttime`;
CREATE TABLE `parttimes` (
	`parttime_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(11) COMMENT '上传者ID',
	`type` varchar(255) DEFAULT 0 COMMENT '类型',
	`title` varchar(255) NOT NULL COMMENT '标题',
	`brief` varchar(255) NOT NULL COMMENT '简介',
	`wage` int(11) NOT NULL COMMENT '时薪',
	`require` varchar(255) COMMENT '要求',
	`contact` varchar(255) NOT NULL COMMENT '联系方式(手机)',
	`linkman` varchar(255) COMMENT '联系人',
	`read_count` int(11) DEFAULT 0 COMMENT '浏览量',
	`create_time` bigint COMMENT '发布时间',
	`update_time` bigint COMMENT '修改时间',
	PRIMARY KEY(`parttime_id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- 创建浏览记录
DROP TABLE IF EXISTS `browser`;
CREATE TABLE `browsers` (
	`browser_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`parttime_id` int(11) COMMENT '兼职信息ID',
	`user_id` int(11) COMMENT '上传者ID',
	`create_time` bigint COMMENT '浏览时间',
	`update_time` bigint COMMENT '修改时间',
	PRIMARY KEY(`browser_id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- 创建评论记录
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comments` (
	`comment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`parttime_id` int(11) COMMENT '兼职信息ID',
	`user_id` int(11) COMMENT '用户ID',
	`content` varchar(255) NOT NULL COMMENT '评论内容',
	`create_time` bigint COMMENT '评论时间',
	`update_time` bigint COMMENT '修改时间',
	PRIMARY KEY(`comment_id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- 添加测试数据
INSERT INTO users (user_id) values ('aaa');

INSERT INTO parttimes (title, brief, contact, create_time) values ('标题', '简介简介简介简介简介简介简介简介简介', '111111', '1500000000');