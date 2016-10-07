DROP TABLE IF EXISTS `hbdx_baseinfo`;
CREATE TABLE IF NOT EXISTS `hbdx_baseinfo` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `tagfirst` varchar(64) default NULL,
  `tagsecond` varchar(64) default NULL,
  `code` varchar(512) default NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

INSERT INTO `hbdx_baseinfo` (`tagfirst`, `tagsecond`, `code`) VALUES 
('SYSTEMINFO', 'FILESHOW', '50'),
('SYSTEMINFO', 'TITLE', 'Simple Down演示站'),
('LIST', '1', '电影'),
('SYSTEMINFO', 'TYPEEXTS', 'gif,jpg,png,pdf,zip,tar'),
('SYSTEMINFO', 'MAXSIZE', '2048'),
('SYSTEMINFO', 'TYPEEXTS', ''),
('SYSTEMINFO', 'TONGJI', '站长统计'),
('SHOW', '操作', 'TRUE'),
('SHOW', '大小', 'TRUE'),
('SHOW', '下载量', 'TRUE'),
('SHOW', '发布者', 'TRUE'),
('SHOW', '日期', 'TRUE'),
('SHOW', '标签', 'TRUE'),
('SHOW', '积分', 'TRUE'),
('SYSTEMINFO', 'PINGLUN', '社会化评论插件'),
('SYSTEMINFO', 'KEYWORDS', ''),
('SYSTEMINFO', 'DESCRIPTION', ''),
('SYSTEMINFO', 'INTEGRATION', '10');

DROP TABLE IF EXISTS `hbdx_blue`;
CREATE TABLE IF NOT EXISTS `hbdx_blue` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `filetitle` varchar(128) default NULL,
  `filename` varchar(255) default NULL,
  `filesize` varchar(255) default NULL,
  `filetype` varchar(255) default NULL,
  `fileurl` varchar(255) default NULL,
  `fileext` varchar(255) default NULL,
  `filenum` int(10) default '0',
  `loaddate` date default NULL,
  `fileuser` varchar(60) default NULL,
  `filetag` varchar(16) default NULL,
  `filetext` longtext default NULL,
  `top` int(4) NOT NULL,
  `keywords` varchar(128) default NULL,
  `description` varchar(128) default NULL,
  `viewnum` int(10) default '0',
  `integration` int(10) default '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

DROP TABLE IF EXISTS `hbdx_fav`;
CREATE TABLE IF NOT EXISTS `hbdx_fav` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `fav_viewid` int(10) default '0',
  `fav_viewtitle` varchar(60) default NULL,
  `fav_username` varchar(20) default NULL,
  `fav_date` date default NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

DROP TABLE IF EXISTS `hbdx_tag`;
CREATE TABLE IF NOT EXISTS `hbdx_tag` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `tag_name` varchar(64) default NULL,
  `tag_num` int(10) default '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

INSERT INTO `hbdx_tag` (`tag_name`, `tag_num`) VALUES ('蓝光', 0);

DROP TABLE IF EXISTS `hbdx_users`;
CREATE TABLE IF NOT EXISTS `hbdx_users` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_name` varchar(60) default NULL,
  `user_pass` varchar(64) default NULL,
  `user_displayname` varchar(250) default NULL,
  `user_qq` varchar(15) default NULL,
  `user_mail` varchar(100) default NULL,
  `user_loginnum` int(10) default '0',
  `registerdate` datetime default NULL,
  `logindate` datetime default NULL,
  `user_group` varchar(10) default '0',
  `user_integration` int(10) default '0',
  `lastview` varchar(512) default NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

INSERT INTO `hbdx_users` (`id` ,`user_name` ,`user_pass` ,`user_displayname` ,`user_qq` ,`user_mail` ,`user_loginnum` ,`registerdate` ,`logindate` ,`user_group` ,`user_Integration` ,`lastview`) VALUES (
NULL ,  'admin',  'e10adc3949ba59abbe56e057f20f883e',  '管理员',  '',  '',  '0', NULL , NULL ,  '管理员',  '1000', NULL);

DROP TABLE IF EXISTS `hbdx_downrecord`;
CREATE TABLE IF NOT EXISTS `hbdx_downrecord` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `record_id` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;