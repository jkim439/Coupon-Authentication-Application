<?
CREATE TABLE `coupon` (
  `no` int(4) NOT NULL auto_increment,
  `cno` varchar(16) NOT NULL,
  `cash` int(10) NOT NULL,
  `date` int(6) NOT NULL,
  `state` int(1) NOT NULL,
  `regid` varchar(20) NOT NULL,
  `regdate` int(6) NOT NULL,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr AUTO_INCREMENT=1 ;

CREATE TABLE `member` (
  `no` int(4) NOT NULL auto_increment,
  `id` varchar(20) NOT NULL,
  `name` varchar(10) NOT NULL,
  `cash` int(10) NOT NULL,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr AUTO_INCREMENT=1 ;
?>