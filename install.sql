-- �����û���
DROP TABLE IF EXISTS `user`;
CREATE TABLE `users` (
	`user_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '�û�ID',
	`wx_id` varchar(255) COMMENT '΢��ID',
	`username` varchar(255) COMMENT '�û��˺�',
	`password` varchar(255) COMMENT '�û�����',
	`nickname` varchar(255) COMMENT '�û��ǳ�',
	`mobile` varchar(255) COMMENT '�ֻ���',
	`email` varchar(255) COMMENT '����',
	`create_time` bigint COMMENT '����ʱ��',
	`update_time` bigint COMMENT '�޸�ʱ��',
	PRIMARY KEY(`user_id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- �����زı�
DROP TABLE IF EXISTS `parttime`;
CREATE TABLE `parttimes` (
	`parttime_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(11) COMMENT '�ϴ���ID',
	`type` varchar(255) DEFAULT 0 COMMENT '����',
	`title` varchar(255) NOT NULL COMMENT '����',
	`brief` varchar(255) NOT NULL COMMENT '���',
	`wage` int(11) NOT NULL COMMENT 'ʱн',
	`require` varchar(255) COMMENT 'Ҫ��',
	`contact` varchar(255) NOT NULL COMMENT '��ϵ��ʽ(�ֻ�)',
	`linkman` varchar(255) COMMENT '��ϵ��',
	`read_count` int(11) DEFAULT 0 COMMENT '�����',
	`create_time` bigint COMMENT '����ʱ��',
	`update_time` bigint COMMENT '�޸�ʱ��',
	PRIMARY KEY(`parttime_id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ���������¼
DROP TABLE IF EXISTS `browser`;
CREATE TABLE `browsers` (
	`browser_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`parttime_id` int(11) COMMENT '��ְ��ϢID',
	`user_id` int(11) COMMENT '�ϴ���ID',
	`create_time` bigint COMMENT '���ʱ��',
	`update_time` bigint COMMENT '�޸�ʱ��',
	PRIMARY KEY(`browser_id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- �������ۼ�¼
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comments` (
	`comment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`parttime_id` int(11) COMMENT '��ְ��ϢID',
	`user_id` int(11) COMMENT '�û�ID',
	`content` varchar(255) NOT NULL COMMENT '��������',
	`create_time` bigint COMMENT '����ʱ��',
	`update_time` bigint COMMENT '�޸�ʱ��',
	PRIMARY KEY(`comment_id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ��Ӳ�������
INSERT INTO users (user_id) values ('aaa');

INSERT INTO parttimes (title, brief, contact, create_time) values ('����', '�������������������', '111111', '1500000000');