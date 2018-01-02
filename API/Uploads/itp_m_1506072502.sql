/*
SQLyog - Free MySQL GUI v5.02
Host - 5.5.5-10.1.21-MariaDB : Database - itp
*********************************************************************
Server version : 5.5.5-10.1.21-MariaDB
*/


create database if not exists `itp`;

USE `itp`;

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert into `login` values 
(1,'admin','123');

/*Table structure for table `tbl_access` */

DROP TABLE IF EXISTS `tbl_access`;

CREATE TABLE `tbl_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_activated` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_access` */

insert into `tbl_access` values 
(1,'Helmet Sticker/Induction Card/Swipe Card','2017-02-02 13:36:15','2017-02-02 08:06:15',0,1),
(2,'Induction Card','2017-02-02 13:36:15','2017-05-10 13:52:02',0,1),
(3,'Swipe Card','2017-02-02 13:36:15','2017-02-02 08:06:15',0,1),
(4,'Helmet Sticker','2017-02-02 13:36:15','2017-02-02 08:06:15',0,1),
(5,'Helmet Sticker & Induction Card','2017-02-02 13:36:15','2017-02-02 08:06:15',0,1),
(6,'Helmet Sticker & Swipe Card','2017-02-02 13:36:15','2017-02-02 08:06:15',0,1),
(7,'Induction Card & Swipe Card 2','2017-02-02 13:36:15','2017-05-11 06:13:21',0,1);

/*Table structure for table `tbl_assign_checklist` */

DROP TABLE IF EXISTS `tbl_assign_checklist`;

CREATE TABLE `tbl_assign_checklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itp_main_id` int(11) DEFAULT NULL,
  `checklist_name` varchar(400) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `uuid` varchar(400) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_uploaded` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_assign_checklist` */

insert into `tbl_assign_checklist` values 
(1,1,'ok',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','123',0,0),
(2,1,'new',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','456',0,0);

/*Table structure for table `tbl_capture` */

DROP TABLE IF EXISTS `tbl_capture`;

CREATE TABLE `tbl_capture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `employer_id` int(11) DEFAULT NULL,
  `induction_id` int(11) DEFAULT NULL,
  `capture_date` varchar(50) DEFAULT NULL,
  `text_data` text,
  `image_name` varchar(400) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `isdeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_capture` */

insert into `tbl_capture` values 
(7,1,2,59,'2017-04-18','gg','20170418174305.jpg','2017-04-18 12:13:51','2017-04-18 12:13:51',0),
(8,1,2,59,'2017-04-18','test1','20170418174832.jpg','2017-04-18 12:21:26','2017-04-18 12:21:26',0),
(9,1,2,59,'2017-04-18','test2','20170418174928.jpg','2017-04-18 12:21:26','2017-04-18 12:21:26',0),
(10,1,2,59,'2017-04-18','','20170418174938.jpg','2017-04-18 12:21:26','2017-04-18 12:21:26',0),
(11,2,1,1,'2017-04-19','My Computer 2','20170419072334.jpg','2017-04-18 21:25:11','2017-04-18 21:25:11',0),
(12,2,1,1,'2017-04-19','My Computer 4','20170419072342.jpg','2017-04-18 21:25:13','2017-04-18 21:25:13',0),
(13,2,1,1,'2017-04-19','My Computer','20170419072349.jpg','2017-04-18 21:25:13','2017-04-18 21:25:13',0),
(14,2,1,1,'2017-04-19','My Computer 2','20170419072403.jpg','2017-04-18 21:25:13','2017-04-18 21:25:13',0),
(15,2,3,1,'2017-04-19','','20170419073116.jpg','2017-04-18 21:31:37','2017-04-18 21:31:37',0),
(16,2,3,1,'2017-04-19','','20170419073129.jpg','2017-04-18 21:31:37','2017-04-18 21:31:37',0),
(17,2,3,1,'2017-04-19','','20170419085732.jpg','2017-04-18 22:57:41','2017-04-18 22:57:41',0),
(18,1,2,1,'2017-04-19','bugging','20170419123024.jpg','2017-04-19 07:00:52','2017-04-19 07:00:52',0),
(19,1,3,1,'2017-04-19','test111111','20170419161655.jpg','2017-04-19 10:47:31','2017-04-19 10:47:31',0),
(20,1,3,1,'2017-04-19','','20170419161707.jpg','2017-04-19 10:47:31','2017-04-19 10:47:31',0),
(21,2,3,1,'2017-04-20','tttttt','20170420162542.jpg','2017-04-20 06:26:21','2017-04-20 06:26:21',0),
(22,1,2,59,'2017-04-20','hhhh','20170420141814.jpg','2017-04-20 08:49:19','2017-04-20 08:49:19',0),
(23,1,2,1,'2017-04-20','testhfourytfyt','20170420142329.jpg','2017-04-20 08:53:51','2017-04-20 08:53:51',0),
(24,2,3,1,'2017-04-20','phone','20170420193619.jpg','2017-04-20 09:36:58','2017-04-20 09:36:58',0),
(25,2,3,1,'2017-04-20','elephant','20170420193640.jpg','2017-04-20 09:36:58','2017-04-20 09:36:58',0),
(26,1,1,1,'2017-04-20','okhhhhh','20170420164055.jpg','2017-04-20 11:11:15','2017-04-20 11:11:15',0),
(27,1,2,59,'2017-04-20','hhhhhhh','20170420170311.jpg','2017-04-20 11:33:22','2017-04-20 11:33:22',0),
(28,2,3,1,'2017-04-21','lismore','20170421072853.jpg','2017-04-20 21:31:34','2017-04-20 21:31:34',0),
(29,2,3,1,'2017-04-21','Brisbane','20170421072908.jpg','2017-04-20 21:31:34','2017-04-20 21:31:34',0),
(30,2,3,1,'2017-04-21','My Ipad','20170421221623.jpg','2017-04-21 12:17:33','2017-04-21 12:17:33',0),
(31,2,3,1,'2017-04-21','Plastic Crate','20170421221710.jpg','2017-04-21 12:17:33','2017-04-21 12:17:33',0),
(32,2,3,1,'2017-04-21','ssssss','20170421221841.jpg','2017-04-21 12:19:19','2017-04-21 12:19:19',0),
(33,2,3,1,'2017-04-21','kkkkkk','20170421221852.jpg','2017-04-21 12:19:19','2017-04-21 12:19:19',0),
(34,2,3,1,'2017-04-21','ffffff','20170421221907.jpg','2017-04-21 12:19:19','2017-04-21 12:19:19',0),
(35,2,2,1,'2017-04-21','jjjj','20170421221944.jpg','2017-04-21 12:22:08','2017-04-21 12:22:08',0),
(36,2,2,1,'2017-04-21','kkkkkkk','20170421221956.jpg','2017-04-21 12:22:08','2017-04-21 12:22:08',0),
(37,2,2,1,'2017-04-21','jjjjjj','20170421222012.jpg','2017-04-21 12:22:08','2017-04-21 12:22:08',0),
(38,2,2,1,'2017-04-21','kkkkkk','20170421222023.jpg','2017-04-21 12:22:08','2017-04-21 12:22:08',0),
(39,2,2,1,'2017-04-21','Icon so induction','20170421222036.jpg','2017-04-21 12:22:08','2017-04-21 12:22:08',0),
(40,2,2,1,'2017-04-21','\"QUT','20170421222055.jpg','2017-04-21 12:22:08','2017-04-21 12:22:08',0),
(41,2,2,1,'2017-04-21','sssss','20170421222120.jpg','2017-04-21 12:22:08','2017-04-21 12:22:08',0),
(42,2,2,1,'2017-04-21','ddddd','20170421222137.jpg','2017-04-21 12:22:08','2017-04-21 12:22:08',0),
(43,2,2,1,'2017-04-21','kkkkk','20170421222151.jpg','2017-04-21 12:22:08','2017-04-21 12:22:08',0),
(44,2,3,1,'2017-04-21','Hello my name is','20170421225008.jpg','2017-04-21 12:51:16','2017-04-21 12:51:16',0),
(45,2,3,1,'2017-04-21','kkkkkk','20170421225036.jpg','2017-04-21 12:51:18','2017-04-21 12:51:18',0),
(46,2,3,1,'2017-04-21','kkkkkk','20170421225047.jpg','2017-04-21 12:51:18','2017-04-21 12:51:18',0),
(47,2,1,1,'2017-04-24','Computer','20170424115908.jpg','2017-04-24 01:59:22','2017-04-24 01:59:22',0),
(48,1,1,1,'2017-04-25','test','20170425124848.jpg','2017-04-25 07:19:50','2017-04-25 07:19:50',0),
(49,1,1,1,'2017-04-25','test2','20170425124859.jpg','2017-04-25 07:19:50','2017-04-25 07:19:50',0),
(50,2,3,1,'2017-04-28','Telephone','20170428001459.jpg','2017-04-27 14:16:10','2017-04-27 14:16:10',0),
(51,2,3,1,'2017-04-28','TV hhhh','20170428001536.jpg','2017-04-27 14:16:10','2017-04-27 14:16:10',0),
(52,2,2,1,'2017-05-02','hello','20170502160741.jpg','2017-05-02 06:07:52','2017-05-02 06:07:52',0),
(53,2,3,1,'2017-05-03','hello','20170503100721.jpg','2017-05-03 00:07:38','2017-05-03 00:07:38',0),
(54,2,2,1,'2017-05-07','Hello','20170507083153.jpg','2017-05-06 22:32:09','2017-05-06 22:32:09',0),
(55,1,1,1,'2017-05-08','okkkk','20170508161246.jpg','2017-05-08 10:43:06','2017-05-08 10:43:06',0),
(56,2,1,1,'2017-05-08','okkkkkkk','20170508161714.jpg','2017-05-08 10:47:42','2017-05-08 10:47:42',0),
(57,2,1,1,'2017-05-08','okkkkkkk','20170508161726.jpg','2017-05-08 10:47:42','2017-05-08 10:47:42',0),
(58,2,3,1,'2017-05-09','Keypad','20170509131630.jpg','2017-05-09 03:16:42','2017-05-09 03:16:42',0),
(59,2,2,1,'2017-05-10','wleflghwrelk','20170510162113.jpg','2017-05-10 06:21:22','2017-05-10 06:21:22',0),
(60,1,1,1,'2017-05-11','ghcghcghcghcghc','20170511112727.jpg','2017-05-11 05:58:16','2017-05-11 05:58:16',0),
(61,1,2,1,'2017-05-11','ghchgcghcghchgchg','20170511112934.jpg','2017-05-11 05:59:49','2017-05-11 05:59:49',0),
(62,2,21,74,'2017-05-11','test by n','20170511171805.jpg','2017-05-11 11:48:15','2017-05-11 11:48:15',0),
(63,2,22,1,'2017-05-12','keypad','20170512073959.jpg','2017-05-11 21:40:26','2017-05-11 21:40:26',0),
(64,2,22,1,'2017-05-12','black','20170512074014.jpg','2017-05-11 21:40:26','2017-05-11 21:40:26',0),
(65,2,7,1,'2017-05-13','Plastic Box','20170513165404.jpg','2017-05-13 06:54:39','2017-05-13 06:54:39',0),
(66,2,7,1,'2017-05-13','Plastic Tub','20170513165509.jpg','2017-05-13 06:57:02','2017-05-13 06:57:02',0),
(67,2,7,1,'2017-05-13','Northern Retaining Wall','20170513165534.jpg','2017-05-13 06:57:02','2017-05-13 06:57:02',0),
(68,2,7,1,'2017-05-13','Site Induction APP','20170513165605.jpg','2017-05-13 06:57:02','2017-05-13 06:57:02',0),
(69,2,7,1,'2017-05-13','Sliding Door','20170513165627.jpg','2017-05-13 06:57:02','2017-05-13 06:57:02',0),
(70,2,20,1,'2017-05-14','Foo Foo','20170514112747.jpg','2017-05-14 01:30:17','2017-05-14 01:30:17',0),
(71,2,20,1,'2017-05-14','My Knee','20170514112800.jpg','2017-05-14 01:30:17','2017-05-14 01:30:17',0),
(72,2,20,1,'2017-05-14','Foo Foo Laying Down','20170514112827.jpg','2017-05-14 01:30:17','2017-05-14 01:30:17',0),
(73,2,20,1,'2017-05-14','Couch','20170514112856.jpg','2017-05-14 01:30:17','2017-05-14 01:30:17',0),
(74,2,20,1,'2017-05-14','TV and Ball','20170514112914.jpg','2017-05-14 01:30:17','2017-05-14 01:30:17',0),
(75,2,20,1,'2017-05-14','Hayden and the Joker','20170514112933.jpg','2017-05-14 01:30:17','2017-05-14 01:30:17',0),
(76,2,7,1,'2017-05-16','sssss','20170516090325.jpg','2017-05-15 23:03:51','2017-05-15 23:03:51',0),
(77,2,7,1,'2017-05-16','jjjjj','20170516090341.jpg','2017-05-15 23:03:51','2017-05-15 23:03:51',0),
(78,2,10,1,'2017-05-24','234567','20170524111850.jpg','2017-05-24 01:19:10','2017-05-24 01:19:10',0),
(79,2,10,1,'2017-05-24','170524 tank hole #2','20170524113256.jpg','2017-05-24 01:35:26','2017-05-24 01:35:26',0),
(80,2,10,1,'2017-05-24','170524 tank hole #2','20170524113338.jpg','2017-05-24 01:35:28','2017-05-24 01:35:28',0),
(81,2,10,1,'2017-05-24','170524 earthworks','20170524113406.jpg','2017-05-24 01:35:28','2017-05-24 01:35:28',0),
(82,2,10,1,'2017-05-24','170524 earthworks','20170524113430.jpg','2017-05-24 01:35:28','2017-05-24 01:35:28',0),
(83,2,10,1,'2017-05-24','170524 sub base','20170524113615.jpg','2017-05-24 01:38:57','2017-05-24 01:38:57',0),
(84,2,10,1,'2017-05-24','170524 subbase','20170524113829.jpg','2017-05-24 01:38:57','2017-05-24 01:38:57',0),
(85,2,20,1,'2017-05-24','170524 retaining wall 1','20170524113959.jpg','2017-05-24 01:40:39','2017-05-24 01:40:39',0),
(86,2,20,1,'2017-05-24','170524 retaining wall 1','20170524114020.jpg','2017-05-24 01:40:40','2017-05-24 01:40:40',0),
(87,1,2,59,'2017-05-29','jgjhhhj','20170529120728.jpg','2017-05-29 06:38:17','2017-05-29 06:38:17',0),
(88,8,8,1,'20170529_164845','','1496054939194.jpg','2017-05-29 11:18:47','2017-05-29 11:18:47',0),
(89,8,8,1,'20170529_171453','','1496054939194.jpg','2017-05-29 11:45:04','2017-05-29 11:45:04',0),
(90,8,8,1,'20170529_171453','','FB_IMG_1495650040225.jpg','2017-05-29 11:45:04','2017-05-29 11:45:04',0),
(91,8,8,1,'20170529_171453','','20170529_171436.jpg','2017-05-29 11:45:04','2017-05-29 11:45:04',0),
(92,8,8,1,'20170529_171748','','1496054939194.jpg','2017-05-29 11:47:57','2017-05-29 11:47:57',0),
(93,8,8,1,'20170529_171748','','FB_IMG_1495650040225.jpg','2017-05-29 11:47:57','2017-05-29 11:47:57',0),
(94,8,8,1,'20170529_171748','','20170529_171436.jpg','2017-05-29 11:47:57','2017-05-29 11:47:57',0),
(95,1,1,1,'20170529_173111','','1496054939194.jpg','2017-05-29 12:01:13','2017-05-29 12:01:13',0),
(96,1,1,1,'20170529_173111','','FB_IMG_1495650040225.jpg','2017-05-29 12:01:13','2017-05-29 12:01:13',0),
(97,2,2,1,'20170529_173250','','1496054939194.jpg','2017-05-29 12:02:54','2017-05-29 12:02:54',0),
(98,3,3,1,'20170529_175213','','1496054939194.jpg','2017-05-29 12:22:25','2017-05-29 12:22:25',0),
(99,3,3,1,'20170529_175213','','IMG-20170523-WA0003.jpg','2017-05-29 12:22:25','2017-05-29 12:22:25',0),
(100,8,8,1,'20170529_175627','','1496054939194.jpg','2017-05-29 12:26:30','2017-05-29 12:26:30',0),
(101,8,8,1,'20170529_175627','','IMG-20170526-WA0021.jpg','2017-05-29 12:26:30','2017-05-29 12:26:30',0),
(102,2,2,1,'20170529_180022','','Screenshot_2017-05-21-16-08-27.png','2017-05-29 12:30:33','2017-05-29 12:30:33',0),
(103,2,2,1,'20170529_180022','','1496054939194.jpg','2017-05-29 12:30:33','2017-05-29 12:30:33',0),
(104,1,1,1,'20170529_180408','','1496054939194.jpg','2017-05-29 12:34:12','2017-05-29 12:34:12',0),
(105,3,3,1,'20170529_180951','','FB_IMG_1495650040225.jpg','2017-05-29 12:39:52','2017-05-29 12:39:52',0),
(106,3,3,1,'20170529_183009','','1496054939194.jpg','2017-05-29 13:00:17','2017-05-29 13:00:17',0),
(107,NULL,NULL,NULL,'20170529_183806','','1496054939194.jpg','2017-05-29 13:08:08','2017-05-29 13:08:08',0),
(108,1,1,1,'20170531_125407','','IMG-20170531-WA0022.jpg','2017-05-31 07:24:15','2017-05-31 07:24:15',0),
(109,1,1,1,'20170531_125407','','IMG_20161115_121141.jpg','2017-05-31 07:24:15','2017-05-31 07:24:15',0),
(110,2,2,1,'20170531_180000','','20170531_161226.jpg','2017-05-31 12:30:08','2017-05-31 12:30:08',0),
(111,2,10,1,'2017-06-01','hellow','20170601143847.jpg','2017-06-01 04:39:01','2017-06-01 04:39:01',0),
(112,1,1,1,'2017-06-02','test','20170602093544.jpg','2017-06-02 04:05:52','2017-06-02 04:05:52',0),
(113,1,2,59,'2017-06-06','Dodds','20170606123853.jpg','2017-06-06 07:09:35','2017-06-06 07:09:35',0),
(114,1,2,59,'2017-06-06','dddd','20170606123913.jpg','2017-06-06 07:09:35','2017-06-06 07:09:35',0),
(115,1,2,59,'2017-06-06','hii','20170606171748.jpg','2017-06-06 11:48:31','2017-06-06 11:48:31',0),
(116,1,2,1,'2017-06-06','ok','20170606214016.jpg','2017-06-06 16:12:04','2017-06-06 16:12:04',0),
(117,2,7,1,'2017-06-07','No Thing','20170607181823.jpg','2017-06-07 08:19:20','2017-06-07 08:19:20',0),
(118,2,7,1,'2017-06-07','No Thing Again','20170607181849.jpg','2017-06-07 08:19:20','2017-06-07 08:19:20',0),
(119,2,7,1,'2017-06-07','No Things As Well','20170607181943.jpg','2017-06-07 08:20:02','2017-06-07 08:20:02',0),
(120,1,3,1,'2017-06-07','jjjjjj','20170607151146.jpg','2017-06-07 09:42:04','2017-06-07 09:42:04',0),
(121,1,2,59,'2017-06-07','hhhh','20170607151917.jpg','2017-06-07 09:49:31','2017-06-07 09:49:31',0),
(122,1,2,59,'2017-06-07','test','20170607152017.jpg','2017-06-07 09:50:28','2017-06-07 09:50:28',0),
(123,1,2,59,'2017-06-07','test','20170607152017.jpg','2017-06-07 09:51:00','2017-06-07 09:51:00',0),
(124,1,2,59,'2017-06-07','test','20170607152156.jpg','2017-06-07 09:52:06','2017-06-07 09:52:06',0),
(125,1,2,1,'2017-06-07','testing','20170607152254.jpg','2017-06-07 09:53:11','2017-06-07 09:53:11',0);

/*Table structure for table `tbl_checklist_data_filled` */

DROP TABLE IF EXISTS `tbl_checklist_data_filled`;

CREATE TABLE `tbl_checklist_data_filled` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `row_id` int(11) DEFAULT NULL,
  `assign_checklist_uuid` varchar(400) DEFAULT NULL,
  `compliance` int(11) DEFAULT NULL,
  `comments` varchar(400) DEFAULT NULL,
  `filled_by` int(11) DEFAULT NULL,
  `is_uploaded` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_saved` int(11) NOT NULL DEFAULT '0',
  `acceptance_criteria_Data` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_checklist_data_filled` */

/*Table structure for table `tbl_checklist_data_row` */

DROP TABLE IF EXISTS `tbl_checklist_data_row`;

CREATE TABLE `tbl_checklist_data_row` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itp_main_id` int(11) DEFAULT NULL,
  `checklist_heading_id` int(11) DEFAULT NULL,
  `acceptance_criteria` varchar(400) DEFAULT NULL,
  `acceptance_criteria_input` varchar(400) DEFAULT NULL,
  `key` varchar(400) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_checklist_data_row` */

insert into `tbl_checklist_data_row` values 
(1,11,11,'','',NULL,'2017-06-10 14:59:46','2017-06-10 14:59:46',0),
(2,11,11,'','','Surveillance','2017-06-10 15:00:41','2017-06-10 15:00:41',0),
(3,11,4,'test','ok','Surveillance','2017-06-10 09:39:16','2017-06-10 11:08:20',1),
(4,11,4,'test2','ok2','Surveillance','2017-06-10 09:39:50','2017-06-10 09:39:50',0),
(5,1,7,'test3','ok3','Hold','2017-06-10 09:40:21','2017-06-10 11:22:47',1),
(6,1,7,'test','ddd','Hold','2017-06-10 10:03:29','2017-06-10 10:03:29',0),
(7,1,1,'test row','test criteria','Witness','2017-06-12 06:27:17','2017-06-12 06:27:17',0);

/*Table structure for table `tbl_checklist_heading` */

DROP TABLE IF EXISTS `tbl_checklist_heading`;

CREATE TABLE `tbl_checklist_heading` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(400) DEFAULT NULL,
  `itp_main_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_checklist_heading` */

insert into `tbl_checklist_heading` values 
(1,'Note',NULL,NULL,NULL,0),
(2,'Survey Set-out',NULL,NULL,NULL,0),
(3,'Environmental Protection',NULL,NULL,NULL,0),
(4,'Excavation of Clean Soil',NULL,NULL,NULL,0),
(5,'Transfer of Excavated Soil(Relocate or Export)',NULL,NULL,NULL,0),
(6,'Fill Placement',NULL,NULL,NULL,0),
(7,'Final Inspection',NULL,NULL,NULL,0);

/*Table structure for table `tbl_checklist_image` */

DROP TABLE IF EXISTS `tbl_checklist_image`;

CREATE TABLE `tbl_checklist_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `row_id` int(11) NOT NULL,
  `image_name` varchar(400) NOT NULL,
  `assign_checklist_uuid` varchar(400) NOT NULL,
  `is_uploaded` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `created` (`created`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_checklist_image` */

/*Table structure for table `tbl_consultant` */

DROP TABLE IF EXISTS `tbl_consultant`;

CREATE TABLE `tbl_consultant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consultant_name` varchar(100) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `Tread` varchar(400) NOT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `email_add` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `pin` varchar(10) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_activated` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_consultant` */

insert into `tbl_consultant` values 
(1,'Testing','Test_contact',1,'Concrete panel installation','123456','sam@gmail.com','New York, USA','123456','2017-04-27 15:06:00','2017-04-27 09:36:00',0,1),
(2,'Saurabh','Pieter',1,'Dock Levellers','9650211774','saurabh@aviktechnosoft.com','AUS','1111','2017-05-05 14:08:47','2017-05-05 08:38:47',0,1),
(3,'CIP','Bhrugesh Patel',2,'Architect','02 9506 1400','bpatel@ciproperty.com.au','26-32 Pirrama Road, Pyrmont NSW 2009','1111','2017-05-11 06:27:36','2017-05-11 00:57:36',0,1),
(4,'McKenzie-Group','James Culwick',2,'Building Certifier','07 3834 9800','jculwick@mckenzie-group.com.au','232 Adelaide Street, Brisbane QLD 4000','1111','2017-05-11 06:37:37','2017-05-11 01:07:37',0,1),
(5,'Costin Roe Consulting','Mark Wilson',2,'Civil','02 4946 2061','mark@costinroe.com.au','173-179 Pacific Highway Charlestown  NSW  2290','1111','2017-05-11 06:38:03','2017-05-11 01:08:03',0,1),
(6,'Costin Roe Consulting','Grant Roe',2,'Structural','02 9251 7699','grant@costinroe.com.au','8 Windmill Street, Walsh Bay, NSW','1111','2017-05-11 06:34:36','2017-05-11 01:04:36',0,1),
(7,'Umow Lai','Eric Maron',2,'Hydraulic','02 9431 9475','eric.maron@umowlai.com.au','7/200 Creek St, Brisbane City QLD 4000','1111','2017-05-11 06:35:52','2017-05-11 01:05:52',0,1),
(8,'AJS Surveys','Christian Hansen',2,'Surveyor','07 3823 2144','christian@ajs.net.au','17 Judd St, Gumdale QLD 4154','1111','2017-05-11 06:37:02','2017-05-11 01:07:02',0,1);

/*Table structure for table `tbl_employee` */

DROP TABLE IF EXISTS `tbl_employee`;

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `given_name` varchar(20) DEFAULT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `contact_phone` varchar(20) DEFAULT NULL,
  `job_title` varchar(20) DEFAULT NULL,
  `occupation` varchar(200) DEFAULT NULL,
  `email_add` varchar(200) DEFAULT NULL,
  `emrg_contact_name` varchar(200) DEFAULT NULL,
  `emrg_contact_phone` varchar(200) DEFAULT NULL,
  `emrg_contact_relation` varchar(200) DEFAULT NULL,
  `is_gcic` tinyint(1) DEFAULT '0',
  `gcic_issue_date` varchar(100) DEFAULT NULL,
  `itp_name` varchar(200) DEFAULT NULL,
  `inductioncard` varchar(20) DEFAULT NULL,
  `pin` varchar(10) DEFAULT '1234',
  `employer_id` int(11) DEFAULT NULL,
  `DOB` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `medical_condition_desc` varchar(500) DEFAULT NULL,
  `medical_condition` tinyint(1) DEFAULT '0',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_activated` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_employee` */

insert into `tbl_employee` values 
(1,'Pieter','Koppen','0447749202','1','Joint cutting and sealing','pkoppen@ciproperty.com','','','',0,'1997-05-17','fffffffff','0251111','1111',1,'','      ',NULL,0,'2017-02-02 13:36:15','2017-02-02 08:06:15',0,1),
(2,'Antonio','Feliciano','+61499600363','Site Engineer','Joint cutting and sealing','abc@gmail.com',NULL,NULL,NULL,0,NULL,NULL,'1984770','4770',1,NULL,NULL,NULL,0,'2017-02-02 13:36:15','2017-02-02 08:06:15',0,1),
(3,'hi','there','111111','aa','Joint cutting and sealing','aa@gmail.com',NULL,NULL,NULL,0,NULL,NULL,'1111','1111',1,NULL,NULL,NULL,0,'2017-02-02 13:36:15','2017-02-02 08:06:15',0,1),
(4,'szfasf','asfasf','124124','Project Manager','Joint cutting and sealing','sa@h.com','SDGSDG','325235','ASFSDF',1,'2017-02-14','ASFASF','24235','1234',1,'2017-02-18','dfdfh124214235','NULL',0,'2017-02-17 18:46:02',NULL,0,1),
(5,'gfjfgj','returtu','346346','Project Manager','Joint cutting and sealing','sa@h.com','gdfgh','46346','xfhfdh',0,'2017-02-07','sdgsdg','43636436','1234',1,'2017-02-02','ryeryq2424','NULL',0,'2017-02-17 18:53:06',NULL,0,1),
(6,'Sam','2345235','35235','Project Manager','Joint cutting and sealing','sa@h.com','sdgsdg','325235','sdgsdg',1,'2017-02-08','sdgsdg','235235','1234',1,'2017-02-02','sdgsdg1313','NULL',0,'2017-02-17 19:01:16',NULL,0,1),
(7,'Pieter','Koppen','0447749202','Project Manager','Joint cutting and sealing','pkoppen@ciproperty.com','Amanda Koppen','0429777399','Wife',0,'190105','Quantum Training','0253784','3784',1,'17-05-1972','8 Midshipman Court Paradise Waters 4217','',0,'2017-02-18 11:03:01','2017-02-18 05:33:04',0,1),
(8,'Hello Shashank','Hiii','1241235','Site Manager','Joint cutting and sealing','sa@h.com','arftr','124124','aasfaf',0,'2017-03-07','asfg','131243124','3124',1,'2017-03-10','asfasf24124','Okkkk',1,'2017-03-17 13:37:33','2017-03-17 08:07:33',0,1),
(9,'fgjfgj','fjfgkj','235235','Site Manager','Joint cutting and sealing','sa@h.com','dgry','346346','stwet',0,'2017-02-28','ryery','124312423','2423',1,'2017-03-10','eryery25235','hjhgj',1,'2017-03-17 13:52:27','2017-03-17 08:22:27',0,1),
(11,'Glenn','Herd','0488776603','Project Manager','Joint cutting and sealing','gherd@ciproperty.com','Lorraine','0417664219','Wife',0,'06-12-1999','blue doe','16940','6940',1,'01-10-1957','I blog street 4217','Old age',1,'2017-04-05 04:37:27','2017-04-04 23:08:55',0,1),
(12,'Pieter','Koppen','0447749202','Project Manager','Principle','pkoppen@ciproperty.com.au','Amanda Koppen','0429777399','wife',0,'19-05-2005','Quantum Training','0253784','3784',1,'17-05-1972','8 Midshipman Court Paradise Waters 4217','',0,'2017-05-16 03:12:08','2017-05-15 21:42:10',0,1),
(13,'Pieter','Koppen','0447749202','Site Manager','Principle','pkoppen@ciproperty.com.au','Amanda Koppen','0429777399','Wife',0,'19-01-2005','Quantum Training','0253784','3784',1,'17-05-1972','8 midshipman Court Paradise Waters','',0,'2017-05-27 07:06:59','2017-05-27 01:37:01',0,1),
(14,'Pieter','Koppen','0447749202','Site Manager','Principle','pkoppen@ciproperty.com.au','Amanda Koppen','5555555555','Wife',0,'17-05-2005','yellow','1111','1111',1,'17-05-1972','8 Midshipman Court Paradise Waters','',0,'2017-06-01 10:11:22','2017-06-01 04:41:24',0,1),
(21,'nis','gg','455','Site Foreman','Dock Levellers','ixidi@s.s','jxjxj','5566','!kkxj',0,'17-02-1997','jcjxj','111111','1111',2,'17-02-2017','jdj1','',0,'2017-02-18 00:39:32','2017-02-17 13:42:38',0,1),
(22,'arti','Mishra','13456','Project Manager','Dock Levellers','a@gmail.com','qdkf','1234567','ckvkbb',0,'17-01-2017','hn','1111111','1111',2,'17-01-2017','Abc1','Abc',1,'2017-02-17 12:06:02','2017-02-17 14:03:10',0,1),
(23,'tapasya','parashar','12346868','Site Foreman','Piling','a@gmail.com','ducjc','5356568','sysgsu',0,'06-02-1997','hzxhx','1111111','1111',3,'09-02-2017','a1','',0,'2017-02-18 01:20:15','2017-02-17 14:20:19',0,1),
(24,'saurabh','Solanki','987654324678','Site Foreman','Dock Levellers','bdbchc@bcnfn.com','bdjhjhdih','886386836753753','hdfkhgwdkjbf',0,'01-01-2010','ggggggggg','123456789','6789',2,'17-02-1997','123 India','Cgvggghghgjbjbjbhvhbjb',1,'2017-02-17 12:53:45','2017-02-17 14:53:20',0,1),
(25,'nit','bb','1455','Site Foreman','Piling','uuj@e.jbj','ji','555','mmk',0,'31-12-2017','kkkk','22222','2222',3,'17-02-2017','yy1','',0,'2017-02-18 02:04:11','2017-02-17 15:04:24',0,1),
(26,'up','pp','9999999','Project Manager','Piling','oo@ffff.com','pp','999999','kkkkkoooo',0,'lllllllll','uuuuuu','777777','7777',3,'12-12-1212','9 ooo','Ooooo',1,'2017-02-18 11:12:00','2017-02-18 05:42:03',0,1),
(27,'nitin','singhal','123456789','Site Foreman','Piling','n@gmail.com','nitin','132676706','abcde',0,'12-02-1997','ghf','12345678','5678',3,'15-02-2017','xyz1','',0,'2017-02-21 21:16:55','2017-02-21 10:17:03',0,1),
(28,'nit','va','65','Worker','Dock Levellers','s@d.c','hd','56','ys',0,'21-02-1997','hd','1111','1111',2,'21-02-2017','ad1','',0,'2017-02-22 00:41:29','2017-02-21 13:41:34',0,1),
(29,'Sakshi','goyal','1234567889','Project Manager','Piling','a@gmail.com','xyz','123456778','afghan',0,'18-11-1997','gfg','12345678','5678',3,'14-08-2002','Xyz1','Ggggg',1,'2017-02-21 12:07:37','2017-02-21 14:04:34',0,1),
(30,'Shashank','sdgsdg','657568568','Site Foreman','Dock Levellers','sa@h.com','sdgsdgsd','34634643','dfgdfhdfh',0,'2017-02-08','dfhdfh','123456','3456',2,'2017-02-02','sdagsdg4wt646','NULL',0,'2017-02-21 19:53:51','2017-02-21 14:33:09',0,1),
(31,'Test','tetsing','23456346','Project Manager','Piling','a@h.com','dfhfdh','35235','asfasf',0,'2017-02-15','sdafsdgf','123456','3456',3,'2017-02-22','dgsdg','NULL',0,'2017-02-21 20:05:16',NULL,0,1),
(32,'Shashank','Raghav','1322435345465','Project Manager','Dock Levellers','sa@h.com','sdafsdf','324325','sdsdg',0,'2017-02-08','dgsdg','123456','3456',2,'2017-02-08','USA123','NULL',0,'2017-02-22 11:27:51','2017-02-22 05:57:51',0,1),
(33,'Shashank123','asfasf13','124124214','Project Manager','Dock Levellers','a@h.com','asfasf','21424124','sdgfsdgsdg',0,'2017-02-07','sdagsdgdsg','123456','3456',2,'2017-02-03','sfasf12341','',0,'2017-02-22 05:30:00','2017-02-22 00:00:00',0,1),
(34,'Test123','asfasf','24124','Project Manager','Dock Levellers','z@h.com','sdgsdg','325235325','sdfsdgsdg',0,'2017-02-08','sdgsdg','123456','3456',2,'2017-02-09','asf214124','',0,'2017-02-22 05:30:00','2017-02-22 06:52:07',0,1),
(35,'Testing','123','124124124','Site Manager','Dock Levellers','a@h.com','asfsdfsdg','23235325','dsgsdgsdg',0,'2017-02-08','sdsdgs','123456','3456',2,'2017-02-14','sfa2414','',0,'2017-02-22 12:42:07','2017-02-22 07:12:07',0,1),
(36,'test test','1111','325325','Site Manager','Dock Levellers','a@h.com','aafaf','124124124','asfafasf',0,'2017-02-08','qwfrqwr','123456','3456',2,'2017-02-17','asdf12','',0,'2017-02-22 13:01:02','2017-03-02 07:00:56',0,1),
(37,'test345','asasf','1241234','Worker','Dock Levellers','sa@h.com','wefsdf','23523532','xcbxcb',0,'2017-02-15','sdgd','123456','3456',2,'2017-02-15','asf1254235','',0,'2017-02-22 05:30:00','2017-02-22 07:50:23',0,1),
(38,'Shashank testing','asfasf','124124','Site Manager','Dock Levellers','a@h.com','sdgsdg','235235','sdsdgsdg',0,'2017-02-08','sdgfsdg','123456','3456',2,'2017-02-11','asdas123','',0,'2017-02-22 13:33:02','2017-02-22 08:03:02',0,1),
(39,'dd','ddd','11111','Project Manager','Piling','111@hhh.com','1111','1111','11111',0,'1111111111','sssss','ssssss','ssss',3,'11-11-11','8 dddd','',0,'2017-02-23 03:54:17','2017-03-02 07:02:29',0,1),
(40,'eeeeeee','eeeeeee','333333333','Project Manager','Dock Levellers','eeeee@dddd.com','wwwwww','33333333','wwwwwwwww',0,'3333333333','ddddddddd','eeeeeeee','eeee',2,'33-33-3333','6 ddddddd','',0,'2017-02-23 03:56:17','2017-02-22 22:26:19',0,1),
(41,'arti','mishra','123465679','Worker','Piling','arti@gmail.com','arti','23468918','frnd',0,'18-02-1997','abc','1235555','5555',3,'14-02-2017','bly1','',0,'2017-02-27 18:20:27','2017-02-27 07:20:33',0,1),
(42,'sdsdg','westgwe','36346','Site Manager','Joint cutting and sealing','sa@h.com','ewtgwet','235235','asfsdg',0,'2017-02-07','sdgsdg','235235','5235',1,'2017-02-03','sdgsd23523','sdgsdgsdg',1,'2017-02-27 14:45:11','2017-02-27 09:15:11',0,1),
(43,'iPad test','hhhh','34444555566','Project Manager','Dock Levellers','s@c.com','Dodd','123345567','ggggggg',0,'01-01-1997','hhhhhh','123456','3456',2,'27-02-2015','123fff','Yhhhh',1,'2017-02-27 07:24:13','2017-02-27 09:20:54',0,1),
(44,'Web test','sdgsdg','253235','Site Foreman','Dock Levellers','sa@h.com','estsedtgsdg','3523523','sdgfsdg',0,'2017-02-08','sdgsdg','123456','3456',2,'2017-02-15',' sdgf325235','sdgsdg',1,'2017-02-27 15:31:52','2017-02-27 10:01:52',0,1),
(45,'aarti1','Mishra','123455679','Site Manager','Piling','tappu@gmail.com','tappu','124567','add value',0,'25-02-1997','abc','12345678','5678',3,'25-02-2017','Alg1','',0,'2017-02-27 08:06:23','2017-02-27 10:03:05',0,1),
(46,'narendra','k','44567899865','Project Manager','Piling','n@gmail.com','abhi','65434578','re',0,'01-01-1997','to','11111','1111',3,'27-02-2016','Noida 63','',0,'2017-02-27 08:23:23','2017-02-27 10:20:03',0,1),
(47,'ipad','test12','453453456345','Project Manager','Piling','n@gmail.com','abi','23423452345','re',0,'01-01-1997','tp','111111','1111',3,'27-02-2016','noida63','',0,'2017-02-27 16:10:09','2017-02-27 10:37:15',0,1),
(48,'ipad','test13','3452345345234','Project Manager','Piling','n@gmail.com','abhi','42134123423','re',0,'01-01-1997','tp','1111','1111',3,'28-02-2004','noida 63','',0,'2017-02-27 16:13:09','2017-02-27 10:40:14',0,1),
(49,'hhhh','hhhh','666666666','wwwwww','Dock Levellers','ttttt@ddddd.com','eeeee','6666666','555555',0,'28-03-1997','tttttttt','ttttttt','tttt',2,'66-66-66','7hhhh','Sore thumb',1,'2017-02-28 05:54:36','2017-02-28 00:24:38',0,1),
(50,'hhhh','hhh','55555555','Project Manager','Piling','rrrrr@fff.com','ttttttt','66666666','eeeeee',0,'28-05-1997','hhhhhh','hhh66666','6666',3,'66-66-6666','6 bbbbbb bbbbb','Bad breath',1,'2017-02-28 11:47:32','2017-02-28 06:17:33',0,1),
(51,'gg','gg','','Project Manager','Piling','','','','',0,'','','','1234',3,'','','',0,'2017-02-28 15:35:05','2017-02-28 10:10:14',0,1),
(52,'Arti','Mishra','1334566','Project Manager','Dock Levellers','a@gmail.com','adrift','5668687887','aw',0,'28-08-1997','Tghyun','1111111','1111',2,'28-02-1900','Afg1','',0,'2017-02-28 15:40:12','2017-02-28 10:10:14',0,1),
(53,'hhh','ghhnnnn','767576','Project Manager','Piling','b@bsff.bim','uhuhhihk','666678','jbjhhihihh',0,'02-01-1997','to','8881','8881',3,'28-02-2014','Gdyf6','',0,'2017-02-28 15:46:38','2017-03-01 09:18:08',0,1),
(54,'gggggg','ggggg','66666666','Project Manager','Piling','iii@vvvvvv.com.au','kkkkk','555555555','yyyyyyy',0,'33-33-3333','gggggggg','hhh9h9h9h9h','9h9h',3,'44-44-444','8 mmmmmm mmmmm.','',0,'2017-03-01 10:50:42','2017-03-01 05:20:43',0,1),
(55,'Nate','k','86767676','Project Manager','Piling','n@gmail.com','abhi','86868686','re',0,'01-01-1997','to','111111','1111',3,'01-03-2016','Noida4','',0,'2017-03-01 18:56:54','2017-03-01 13:39:32',0,1),
(56,'Shashank','sdfsdgsdg','124234235235','Site Manager','Piling','sa@h.com','sdgfsdgsdg','235235235235','xzgdsfgsdgsdgsd',0,'2017-03-08','aaaaa','123456','3456',3,'2017-03-16','aswfsaf23523523','dgdfhgdfh',1,'2017-03-02 11:41:01','2017-03-02 07:37:55',0,1),
(57,'Shashank','Raghav','123456789','Site Manager','Dock Levellers','a@h.com','ASFSDFSDF','25345346346346','sdgsdgsdg',0,'2017-03-08','asfasfsdgsdfg','123456','3456',2,'2017-03-10',' USA1223','dfhdfhdfhdfh',1,'2017-03-02 15:50:15','2017-03-02 10:20:15',0,1),
(58,'Shashank','Raghav','23523523','Project Manager','Dock Levellers','sa@h.com','asfasfasf','124235235','safasfas',0,'2017-03-07','asfsdfsdg','1234234','4234',2,'2017-03-09','  asfas2412','',0,'2017-03-02 15:57:49','2017-03-02 10:27:49',0,1),
(59,'arti','Mishra','123477','Project Manager','Dock Levellers','a@gmail.com','rggy','1235567','fgh',0,'06-01-1997','sergdrg','1111111','1111',2,'06-02-2017',' Abc1','',0,'2017-03-06 18:16:05','2017-03-06 12:46:08',0,1),
(60,'ddddd','ddddd','999999','Project Manager','Piling','pppp.kopppp@ddd.com','ppppp','000000','wide',0,'12-22-2222','ppppppp','hjhhj78787','8787',3,'17-05-1972','9 jjjjj jjjjj jjjjj','',0,'2017-03-07 05:26:09','2017-03-06 23:56:10',0,1),
(61,'cbnh','fvj','1236848','Project Manger','Dock Levellers','a@gmail.com','ykkg','55880885','gjkj',0,'03-03-1997','iyhh','1111111','1111',2,'06-03-2017','sgg1','',0,'2017-03-07 16:19:43','2017-03-07 05:19:50',0,1),
(62,'gg','gg','4444444','Project Manager','Piling','rrrrreee@xxxx.com','ttttttt','777777','fffffff',0,'22-05-2016','ggggggg','ggg9999','9999',3,'22-02-2017','7 hh bbbbb','',0,'2017-03-08 02:10:18','2017-03-07 20:40:19',0,1),
(63,'hhhhhh','oooooo','8888888888','Project Manager','Piling','kkk@jjjj.com','ooooooo','09999999999','hhhhhh',0,'01-12-2010','jjjjj','uuuuuu','uuuu',3,'01-12-1972','8 hhhhhhhhhh nnnn','',0,'2017-03-11 13:53:17','2017-03-11 08:23:18',0,1),
(66,'hhhhhh','jjjjjj','8888888888','Worker','Piling','ffffff@hhhhhh.com','iiiiii','9999999997','ffffff',0,'20-04-2000','ffffff','jjjjjjjj','jjjj',3,'10-05-1972','8 nnnnn sssss','',0,'2017-03-31 04:22:01','2017-03-30 22:52:03',0,1),
(67,'w','qqe','2124124','Site Manager','Dock Levellers','a@h.com','asfasf','124124','asfasf',0,'2017-03-29','asasf','1211111','1111',2,'2017-04-14','asfas','ok',1,'2017-04-03 16:48:24','2017-04-03 11:18:24',0,1),
(69,'Shashank','Test','777777777777777777','Project Manager','Piling','sa@h.com','ok','1234','ok',0,'2017-04-05','ok','11111111','1111',3,'1995-02-20','  ok','',0,'2017-04-04 11:37:43','2017-04-04 06:07:43',0,1),
(70,'Test','Test','123456','Project Manager','Piling','sa@h.com','Test','123','Test',0,'2017-04-03','Test','!23456','3456',3,'2017-04-08','USA','Fine',1,'2017-04-14 17:43:06','2017-04-14 12:13:06',0,1),
(71,'jojo','varghese','9998777778','Project Manager','Piling','jojo@mmsnns.com','john','99877728892','father',0,'20-04-2012','john','marry','arry',3,'19-12-1974','17 JOJO major.','',0,'2017-04-21 16:51:24','2017-04-26 13:50:57',0,1),
(72,'yyyyyyy','uuuuuuu','7777777777','Worker','Dock Levellers','yyyy@hhhhh.com','yyyyyy','66666666666','wife',0,'17-05-2006','hhhhh','1111','1111',2,'17-05-1972','8 hhhhhhhh','Jjjjjj',1,'2017-04-27 20:03:34','2017-04-27 14:33:36',0,1),
(73,'tity','sdgsdg','124124','Project Manager','sfsf','pieterKopeen12@gmail.com','sdg','235','asfsa',0,'2017-05-03','sdgsdg','235235','5235',8,'2017-05-17',' etwet','',0,'2017-05-08 14:25:17','2017-05-08 08:55:17',0,1),
(74,'narendra','Kumar','666666666666','Project Manager','Structural steel erection','n@gmail.com','abhi','555555555555','b',0,'11-05-1998','dhar','1111','1111',21,'11-05-2016','H9','',0,'2017-05-11 16:36:23','2017-05-11 11:12:34',0,1),
(75,'NARENDRA','WEB','55555555555','Site Foreman','Structural steel erection','F@GMAIL.COM','a','123134223423412','dsf',0,'1998-11-10','dh','1111','1111',21,'2017-12-13','H','',0,'2017-05-11 17:09:44','2017-05-11 11:39:44',0,1),
(76,'hhhh','hhhh','5555555555','Project Manager','Earthworks','gggg@cccc.com.au','gggggg','5555555555','hhhhhh',0,'11-01-2005','ffffff','22222','2222',10,'11-01-1972','7hhhhhh','',0,'2017-05-16 04:32:57','2017-05-15 23:02:59',0,1),
(77,'test','testing','455666612456','Project Manager','Concrete panel installation','sam@gmail.com','test','123456789777','testing',0,'16-05-2001','test','1234456789','6789',18,'16-05-2015','USA 123','',0,'2017-05-16 11:25:34','2017-05-16 05:55:39',0,1),
(78,'nk','Sky','111111111111','Worker','Security','n@gamil.com','ccn','222222222222','ru',0,'01-01-1997','ntp','1111','1111',15,'26-05-2016','H9','',0,'2017-05-26 16:14:46','2017-05-26 13:28:50',0,1),
(79,'kk','g','899999999999','Project Manager','Security','n@gmail.com','cop','666666666666','1rrrtttt',0,'01-01-1997','tppp','1111','1111',15,'26-05-2017','H67','Insert',1,'2017-05-26 19:02:46','2017-05-26 13:32:50',0,1),
(80,'test','one','1234567787','Project Manager','Security','test@gmail.com','asdgh','4555667890','hhhhhg',0,'01-07-1997','hghggd','regret high','high',22,'01-06-2017','123adcg','Seeded',1,'2017-06-01 19:24:47','2017-06-01 13:54:50',0,1);

/*Table structure for table `tbl_employer` */

DROP TABLE IF EXISTS `tbl_employer`;

CREATE TABLE `tbl_employer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `Tread` varchar(400) NOT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `email_add` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `pin` varchar(10) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_activated` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_employer` */

insert into `tbl_employer` values 
(1,1,'Commercial and Industrial Property','Daniel Galea','Principle','0400226980','dgalea@ciproperty.com.au','Suite 59, Jones Bay Wharf 26-32 Pirrama Road Pyrmont NSW 2009','','2017-02-02 13:36:15','2017-02-02 08:06:15',0,1),
(2,1,'Dexion','Scott Gannaway','Dock Levellers','0438354987','scottg@dexion.com.au','208-218 Abbotts Rd, Dandenong South Vic 3175','','2017-02-02 13:36:15','2017-02-02 08:06:15',0,1),
(3,1,'Taylor Constructions','Mark Taylor','Piling','0123456789','mtaylor@taylorconstructions.com','Level 13/157 Walker St, North Sydney NSW 2060','','2017-02-02 13:36:15','2017-02-02 08:06:15',0,1),
(7,2,'Commercial and Industrial Property','Daniel Galea','Principle','04002261454','dgalea@ciproperty.com.au','Suite 59, 26-32 Pirrama Road Pyrmont NSW 2009 Australia','','2017-05-08 13:38:00','2017-05-08 08:08:00',0,1),
(8,1,'Testing Employer','sfsf','Security','12344456','sam@gmail.com11','UUDS','','2017-05-08 14:10:59','2017-05-08 08:40:59',0,1),
(9,2,'Max Door Solutions','Greg Maunder','Roller Doors','1300 793 378','gregm@maxdoors.com.au','1/18 Ereton Dr, Arundel QLD 4214','','2017-05-11 05:07:06','2017-05-10 23:37:06',0,1),
(10,2,'Lange Civil','Kent Lange','Earthworks','1800 827 221','kent@langecivil.com.au','PO Box 1208 Beenleigh QLD 4207','','2017-05-11 05:10:26','2017-05-10 23:40:26',0,1),
(11,2,'Truflow Services','Matt Ostrofski','Hydraulic services and Drainage','07 3813 0208','matt@truflowservices.com.au','PO Box 2032, North Ipswich QLD 4305','','2017-05-11 05:11:50','2017-05-10 23:41:50',0,1),
(12,2,'Shepcon QLD','Adrian Prevost','Concrete placement','07 3171 3844','adrian.prevost@shepcon.net','15 Henricks St, Hemmant; PO Box 7231 Hemmant, QLD 4174','','2017-05-11 05:12:35','2017-05-10 23:42:35',0,1),
(13,2,'MQLD','Grant Johnson','Electrical services','02 9526 2370','grant.johnson@modcol.com.au','1/80 Box Road, Taren Point, New South Wales, 2229','','2017-05-11 05:15:05','2017-06-01 04:46:56',0,1),
(14,2,'Select Fire Systems','Phillip Bray','Fire protection','07 3806 5754','p.bray@selectfire.com.au','Unit 7/8 Riverland Drive Loganholme  QLD  4129','','2017-05-11 05:16:03','2017-05-10 23:46:03',0,1),
(15,2,'Otis Elevator Company','Jessica Peterson','Security','07 3722 4611','jessica.peterson@otis.com','41 Pentex Street, Salisbury QLD 4107, Australia','','2017-05-11 05:17:23','2017-05-10 23:47:23',0,1),
(16,2,'Fusion HVAC','Mike Palmer','Mechanical','07 3118 5536','mike.palmer@fusionhvac.com.au','281 Montague Road, West End, QLD 4101, Australia','','2017-05-11 05:18:04','2017-05-10 23:48:04',0,1),
(17,2,'Retracom','Matthew Bourke','Security','07 3489 4400','matthewb@retracom.com','80 Magnesium Drive Crestmead Qld 4132','','2017-05-11 05:18:40','2017-05-10 23:48:40',0,1),
(18,2,'XL Precast','Robert Celani','Concrete panel installation','02 8724 5100','rc@xlprecast.com','80 Shaw Rd, Shaw, QLD 4818.BRISBANE','','2017-05-11 05:19:21','2017-05-10 23:49:21',0,1),
(19,2,'Mesh & Bar','Scott Lilley','Security','07 3436 2400','scottl@meshbar.com.au','17 General Macarthur Pl\r\nRedbank QLD 4301','','2017-05-11 05:20:15','2017-05-10 23:50:15',0,1),
(20,2,'Simmons Bricklaying','Danny Simmons','Security','0407 924 455','simmonsbricklaying1@bigpond.com.au','Broadbeach Waters QLD 4218','','2017-05-11 05:23:43','2017-05-10 23:53:43',0,1),
(21,2,'All Type Welding','Clive Lederhose','Structural steel erection','07 3171 2404','clivel@atwgroup.com.au','55 Christensen Road Stapylton QLD 4207','','2017-05-11 05:24:27','2017-05-10 23:54:27',0,1),
(22,2,'Gunnebo','Stephen Hart','Security','1800 450 777','Stephen.Hart@Gunnebo.com','Unit 9, 16 Lexington Drive, Bella Vista NSW 2153','','2017-05-11 05:25:48','2017-05-10 23:55:48',0,1),
(23,1,'sssss','asfasf','Steel fixer','124','sam@gmail.com12','USAAA','','2017-05-18 16:20:28','2017-05-18 10:50:28',0,1);

/*Table structure for table `tbl_form_data_filled` */

DROP TABLE IF EXISTS `tbl_form_data_filled`;

CREATE TABLE `tbl_form_data_filled` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `row_id` int(11) NOT NULL,
  `filled_by` int(11) NOT NULL,
  `remark` varchar(30) NOT NULL,
  `checked_by` int(11) NOT NULL,
  `checking_remark` varchar(30) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `ref_doc_data` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_form_data_filled` */

insert into `tbl_form_data_filled` values 
(1,5,59,'remarks test',0,'','2017-06-06 09:53:35','2017-06-06 11:34:03',0,'test rare'),
(2,6,59,'abc',0,'','2017-06-06 11:56:37','2017-06-06 11:56:37',0,'');

/*Table structure for table `tbl_form_image` */

DROP TABLE IF EXISTS `tbl_form_image`;

CREATE TABLE `tbl_form_image` (
  `id` int(11) NOT NULL,
  `row_id` int(11) NOT NULL,
  `image_name` varchar(400) NOT NULL,
  `is_uploaded` int(11) NOT NULL DEFAULT '0',
  `ref_doc_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `created` (`created`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_form_image` */

insert into `tbl_form_image` values 
(1,5,'C-Q-ITP-0202C Bulk Earthworks (Cut to Fill) (ITP Form)-1.doc',0,-2,'2017-06-06 09:55:45','2017-06-06 09:55:45',0),
(2,5,'co.in:eticketing:printTicketHindi.jsf?pnr=2131674206^B^16-May-2017^1.pdf',0,-1,'2017-06-06 09:54:43','2017-06-06 09:54:43',0),
(3,5,'ITP APP 1.png',0,5,'2017-06-06 09:54:15','2017-06-06 09:54:15',0),
(4,5,'co.in:eticketing:printTicketHindi.jsf?pnr=2131674206^B^16-May-2017^1.pdf',0,20,'2017-06-06 10:20:17','2017-06-06 10:20:17',0),
(5,5,'C-Q-ITP-0202C Bulk Earthworks (Cut to Fill) (ITP Form)-1.doc',0,19,'2017-06-06 10:20:07','2017-06-06 10:20:07',0),
(6,5,'20170606170334.pdf',0,21,'2017-06-06 11:33:44','2017-06-06 11:33:44',0),
(7,6,'20170606172615.jpg',0,22,'2017-06-06 11:56:22','2017-06-06 11:56:22',0);

/*Table structure for table `tbl_from_data_heading` */

DROP TABLE IF EXISTS `tbl_from_data_heading`;

CREATE TABLE `tbl_from_data_heading` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `index` varchar(50) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `main_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `is_checklist_needed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_from_data_heading` */

insert into `tbl_from_data_heading` values 
(1,'2.1','Design Compliance ',1,2,'2017-06-01 01:07:28','2017-06-01 01:07:28',0,0),
(2,'2.2','Authority Compliance',2,2,'2017-06-01 01:07:28','2017-06-01 01:07:28',0,0),
(3,'2.3','Factory Acceptance Tests (FAT\'s)',3,2,'2017-06-01 01:07:28','2017-06-01 01:07:28',0,0),
(4,'2.4','Site Acceptance Tests (SAT\'s)',4,2,'2017-06-01 01:07:28','2017-06-01 01:07:28',1,0);

/*Table structure for table `tbl_from_data_row` */

DROP TABLE IF EXISTS `tbl_from_data_row`;

CREATE TABLE `tbl_from_data_row` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main_id` int(11) DEFAULT NULL,
  `data_heading_id` int(11) DEFAULT NULL,
  `item_no` varchar(200) DEFAULT NULL,
  `activity` varchar(400) DEFAULT NULL,
  `ref_doc_input` varchar(1000) DEFAULT NULL,
  `acc_criteria` varchar(400) DEFAULT NULL,
  `key` varchar(400) DEFAULT NULL,
  `person` varchar(400) DEFAULT NULL,
  `comments` varchar(400) DEFAULT NULL,
  `is_doc_needed` int(11) NOT NULL DEFAULT '0',
  `type_of_doc` varchar(10) DEFAULT NULL,
  `number_of_doc` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `tbl_from_data_row` */

insert into `tbl_from_data_row` values 
(5,1,1,'2.1.1','Received Construction Drawings',' CO13261.00-C10, C20, C25, C30, C31, C32, C35, C46','Issue for Construction Drawings','H','PM','Issue for Construction Drawings',1,NULL,NULL,'2017-06-02 05:52:45','2017-06-02 05:52:45',0),
(6,1,1,'2.1.2','Received Safety in Design & Design Risk Assessment ',' ','Structural Design Engineer Issue Each Report ','H','PM','Attach Report to Back of ITP Form',1,NULL,NULL,'2017-06-02 05:53:50','2017-06-02 05:53:50',0),
(7,1,1,'2.1.3','CIP Standard Detail Drawing',' CIP Standard Detail Drawing No. […]','Download drawing from corporate intranet','W','CM/PM','Keep drawing for reference whilst performing inspection',1,NULL,NULL,'2017-06-02 05:55:05','2017-06-02 05:55:05',0),
(8,1,2,'2.2.1','Works Approvals',' ','Approved documentation','H','PM','Attach approval to back of (ITP form)',1,NULL,NULL,'2017-06-02 05:57:00','2017-06-02 05:57:00',0),
(9,1,2,'2.2.2','Traffic/vehicle management Site Plan ',' ','Approved TMP from consultant ','H','OH&S','Traffic/Vehicle Management Site Plan, Attach approval to back of (ITP form)',1,NULL,NULL,'2017-06-02 05:58:27','2017-06-02 05:58:27',0),
(10,1,2,'2.2.3','Dilapidation survey',' ','Photos/videos taken of surrounding properties','W','SM/SE','Attach Dilapidation report to back of (ITP form)',1,NULL,NULL,'2017-06-02 06:00:30','2017-06-02 06:00:30',0),
(11,1,2,'2.2.4','Existing services Review ',' ','Confirmation all services identified, via: drawings review and walk-over in-ground detection survey/mark-out non-destructive excavation Confirmation all relevant services disconnected or relocated as required Permit to Excavate signed-off','H','SM/OH&S','Asset owner confirmation document Permit to Excavate sign-off DBYD information is only legally valid for 30 days. DBYD information is to be updated monthly.',1,NULL,NULL,'2017-06-02 06:02:19','2017-06-02 06:02:19',0),
(12,1,3,'2.3.1','Classification of existing ground',' ','Sampling & classification of soils (for contamination)','W','SM/SE','Attach Soil classification report to back of (ITP) form',1,NULL,NULL,'2017-06-02 06:03:36','2017-06-02 06:03:36',0),
(13,1,3,'2.3.2','Import/Export Soil Validation',' ','Ensure compliance to authority conditions Ensure compliance with material requirements','H','PM','Material Specification Sheet Certificate of Origin Soil Test Results (if required) Attach approval to back of (ITP form)',1,NULL,NULL,'2017-06-02 06:08:29','2017-06-02 06:08:29',0),
(14,1,3,'2.3.3','Fill Material Approval',' ','Fill material meets design specifications','','','Attach Material specification sheet to back of (ITP form)',1,NULL,NULL,'2017-06-02 06:10:02','2017-06-02 06:10:02',0),
(15,1,4,'2.4.1','Complete Inspection and Requirements Checklist',' ','Checklist completed for Lot','W','SM/SE','Attach all supporting documents to the back of the checklist ',1,NULL,NULL,'2017-06-02 06:10:56','2017-06-02 06:10:56',0),
(16,1,4,'2.4.2','Survey as-built ',' ','Ensure record show as-filled plan and levels ','W','SM','Attach Survey sign-off to the back of (ITP form)',1,NULL,NULL,'2017-06-02 06:11:43','2017-06-02 06:11:43',0),
(17,1,4,'2.4.3','Received Contractor ITP’s',' [Insert ITP’s Numbers]','ITP to be submitted at contractor pre-start  ITP’s complete including supporting documentation after completion of works ','W','SM/SE','Attach all supporting documents to the back of the checklist',1,NULL,NULL,'2017-06-02 06:12:36','2017-06-02 06:12:36',0),
(18,1,4,'2.4.4','All relevant NCR’s have been closed',' ','NCR’s are closed.','H','PM','Refer NCR No’s.',1,NULL,NULL,'2017-06-02 06:13:20','2017-06-02 06:13:20',0),
(19,11,1,'2.1.4','Activity Test','                         23','Test Criteria','Witness','Test Person','Test Remark/Record',1,NULL,NULL,'2017-06-09 08:00:40','2017-06-09 12:07:35',0),
(20,11,1,'2.1.5','Activity Test2','           23','Activity Criteria 2','Witness','22','esss',1,NULL,NULL,'2017-06-09 08:57:28','2017-06-09 12:15:03',0),
(21,0,0,'.1','',' ','','','','',0,NULL,NULL,'2017-06-10 07:54:56','2017-06-10 07:54:56',0),
(22,0,0,'.2','',' ','','','','',0,NULL,NULL,'2017-06-10 07:56:56','2017-06-10 07:56:56',0);

/*Table structure for table `tbl_induction_register` */

DROP TABLE IF EXISTS `tbl_induction_register`;

CREATE TABLE `tbl_induction_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `induction_date` varchar(100) DEFAULT NULL,
  `inducted_by` varchar(100) DEFAULT NULL,
  `empid` int(11) DEFAULT NULL,
  `induction_card_no` varchar(100) DEFAULT NULL,
  `pincode` varchar(50) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_activated` tinyint(1) DEFAULT '1',
  `signature` varchar(200) DEFAULT NULL,
  `comments` text,
  `isapproved` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_induction_register` */

insert into `tbl_induction_register` values 
(1,1,'2016-01-01','1',1,'0251111','1111','2017-02-02 13:36:15','2017-02-02 08:06:15',0,1,NULL,NULL,'0'),
(2,1,'2016-10-22','1',1,'1984770','4770','2017-02-02 13:36:15','2017-02-02 08:06:15',0,1,NULL,NULL,'0'),
(3,1,'2016-12-01','1',1,'1111','1111','2017-02-02 13:36:15','2017-02-02 08:06:15',0,1,NULL,NULL,'0'),
(4,1,'2017-02-17 13:16:02',NULL,1,'24235','1111','2017-02-17 18:46:02',NULL,0,1,'184424',NULL,NULL),
(5,1,'2017-02-17 13:23:06',NULL,1,'43636436','1111','2017-02-17 18:53:06',NULL,0,1,'185121',NULL,NULL),
(6,1,'2017-02-17 13:31:16',NULL,1,'235235','1111','2017-02-17 19:01:16',NULL,0,1,'185912',NULL,NULL),
(7,1,'18-02-2017',NULL,1,'0253784','3784','2017-02-18 11:03:01','2017-02-18 05:33:04',0,1,NULL,NULL,NULL),
(8,1,'2017-03-17',NULL,1,'131243124','1234','2017-03-17 13:37:33','2017-03-17 08:07:33',0,1,'133525',NULL,NULL),
(9,1,'2017-03-17',NULL,1,'124312423','1234','2017-03-17 13:52:27','2017-03-17 08:22:27',0,1,'135027',NULL,NULL),
(11,1,'05-04-2017',NULL,1,'16940','6940','2017-04-05 04:37:27','2017-04-04 23:08:55',0,1,NULL,NULL,NULL),
(12,2,'16-05-2017','1',7,'0253784','3784','2017-05-16 03:12:08','2017-05-15 21:44:07',0,1,NULL,NULL,'0'),
(13,2,'27-05-2017',NULL,1,'0253784','3784','2017-05-27 07:06:59','2017-05-27 01:37:01',0,1,NULL,NULL,NULL),
(14,2,'01-06-2017','1',1,'1111','1111','2017-06-01 10:11:22','2017-06-01 04:50:26',0,1,NULL,NULL,'0'),
(21,1,'17-02-2017',NULL,2,'111111','1111','2017-02-18 00:39:32','2017-02-17 13:42:38',0,1,NULL,NULL,NULL),
(22,1,'17-02-2017',NULL,2,'1111111','1111','2017-02-17 12:06:02','2017-02-17 14:03:10',0,1,NULL,NULL,NULL),
(23,1,'17-02-2017',NULL,3,'1111111','1111','2017-02-18 01:20:15','2017-02-17 14:20:19',0,1,NULL,NULL,NULL),
(24,1,'17-02-2017','1',2,'123456789','6789','2017-02-17 12:53:45','2017-02-17 14:53:42',0,1,NULL,'tffghfghgfdfddfzxfcxcdfgdgfdfgdfgdg','0'),
(25,1,'17-02-2017',NULL,3,'22222','2222','2017-02-18 02:04:11','2017-02-17 15:04:24',0,1,NULL,NULL,NULL),
(26,1,'18-02-2017',NULL,3,'777777','7777','2017-02-18 11:12:00','2017-02-18 05:42:03',0,1,NULL,NULL,NULL),
(27,1,'21-02-2017',NULL,3,'12345678','5678','2017-02-21 21:16:55','2017-02-21 10:17:03',0,1,NULL,NULL,NULL),
(28,1,'21-02-2017',NULL,2,'1111','1111','2017-02-22 00:41:29','2017-02-21 13:41:34',0,1,NULL,NULL,NULL),
(29,1,'21-02-2017',NULL,3,'12345678','5678','2017-02-21 12:07:37','2017-02-21 14:04:34',0,1,NULL,NULL,NULL),
(30,1,'2017-02-21 14:23:51','',2,'123456','1234','2017-02-21 19:53:51','2017-02-21 14:33:09',0,1,'195142','Not a fit','1'),
(31,1,'2017-02-21 14:35:16','1',3,'123456','1234','2017-02-21 20:05:16','2017-02-23 15:06:54',0,1,'20315',NULL,'0'),
(32,1,'2017-02-22 05:57:51',NULL,2,'123456','1234','2017-02-22 11:27:51','2017-02-22 05:57:51',0,1,'112534',NULL,NULL),
(33,1,'2017-02-22 06:43:20',NULL,2,'123456','1234','2017-02-22 05:30:00','2017-02-22 00:00:00',0,1,'121129',NULL,NULL),
(34,1,'2017-02-22 06:52:07',NULL,2,'123456','1234','2017-02-22 05:30:00','2017-02-22 06:52:07',0,1,'122032',NULL,NULL),
(35,1,'2017-02-22 07:12:07',NULL,2,'123456','1234','2017-02-22 12:42:07','2017-02-22 07:12:07',0,1,'12407',NULL,NULL),
(36,1,'2017-02-22 07:31:02','',2,'123456','1234','2017-02-22 05:30:00','2017-03-02 07:00:56',0,1,'125913','test','1'),
(37,1,'2017-02-22 07:50:23','1',2,'123456','1234','2017-02-22 13:20:23','2017-03-02 06:59:55',0,1,'131842',NULL,'0'),
(38,1,'2017-02-22','1',2,'123456','1234','2017-02-22 13:33:02','2017-02-22 11:50:16',0,1,'133118',NULL,'0'),
(39,1,'23-02-2017','',3,'ssssss','ssss','2017-02-23 03:54:17','2017-03-02 07:02:29',0,1,NULL,'Not a Match','1'),
(40,1,'23-02-2017','1',2,'eeeeeeee','eeee','2017-02-23 03:56:17','2017-02-23 15:01:12',0,1,NULL,NULL,'0'),
(41,1,'27-02-2017','1',3,'1235555','5555','2017-02-27 18:20:27','2017-02-27 09:27:00',0,1,NULL,NULL,'0'),
(42,1,'2017-02-27','1',1,'235235','1234','2017-02-27 14:45:11','2017-02-27 09:15:32',0,1,'14433',NULL,'0'),
(43,1,'27-02-2017','1',2,'123456','3456','2017-02-27 07:24:13','2017-02-27 09:21:45',0,1,NULL,NULL,'0'),
(44,1,'2017-02-27','1',2,'123456','1234','2017-02-27 15:31:52','2017-03-01 16:19:13',0,1,'152951','Not a fit','0'),
(45,1,'27-02-2017','1',3,'12345678','5678','2017-02-27 08:06:23','2017-02-27 10:08:02',0,1,NULL,NULL,'0'),
(46,1,'27-02-2017','1',3,'11111','1111','2017-02-27 08:23:23','2017-02-27 10:27:31',0,1,NULL,NULL,'0'),
(47,1,'27-02-2017','1',3,'111111','1111','2017-02-27 16:10:09','2017-02-27 10:46:33',0,1,NULL,NULL,'0'),
(48,1,'27-02-2017','1',3,'1111','1111','2017-02-27 16:13:09','2017-03-01 14:24:30',0,1,NULL,NULL,'0'),
(49,1,'28-02-2017','1',2,'ttttttt','tttt','2017-02-28 05:54:36','2017-03-01 14:22:12',0,1,NULL,NULL,'0'),
(50,1,'28-02-2017','1',3,'hhh66666','6666','2017-02-28 11:47:32','2017-03-01 14:17:39',0,1,NULL,NULL,'0'),
(51,1,'28-02-2017','1',3,'','1234','2017-02-28 15:35:05','2017-03-01 14:12:33',0,1,NULL,NULL,'0'),
(52,1,'28-02-2017','1',2,'1111111','1111','2017-02-28 15:40:12','2017-03-01 09:17:01',0,1,NULL,NULL,'0'),
(53,1,'28-02-2017','1',3,'8881','8881','2017-02-28 15:46:38','2017-03-01 14:00:13',0,1,NULL,'testing','0'),
(54,1,'01-03-2017','1',3,'hhh9h9h9h9h','9h9h','2017-03-01 10:50:42','2017-03-01 13:16:57',0,1,NULL,NULL,'0'),
(55,1,'01-03-2017','1',3,'111111','1111','2017-03-01 18:56:54','2017-03-01 13:55:56',0,1,NULL,'Testing','0'),
(56,1,'2017-03-02','1',3,'123456','1234','2017-03-02 11:41:01','2017-03-02 12:12:26',0,1,'113923','Not a Match','0'),
(57,1,'2017-03-02','1',2,'123456','1234','2017-03-02 15:50:15','2017-03-02 11:47:57',0,1,'15482',NULL,'0'),
(58,1,'2017-03-02','1',2,'1234234','1234','2017-03-02 15:57:49','2017-03-02 11:40:18',0,1,'155610',NULL,'0'),
(59,1,'06-03-2017','1',2,'1111111','1111','2017-03-06 18:16:05','2017-03-06 12:50:06',0,1,NULL,NULL,'0'),
(60,1,'07-03-2017','1',3,'hjhhj78787','8787','2017-03-07 05:26:09','2017-03-23 08:00:04',0,1,NULL,NULL,'0'),
(61,1,'07-03-2017','1',2,'1111111','1111','2017-03-07 16:19:43','2017-03-07 12:00:52',0,1,NULL,'Not a Match','1'),
(62,1,'08-03-2017','1',3,'ggg9999','9999','2017-03-08 02:10:18','2017-03-23 07:48:49',0,1,NULL,NULL,'0'),
(63,1,'11-03-2017','1',3,'uuuuuu','uuuu','2017-03-11 13:53:17','2017-03-23 07:44:55',0,1,NULL,NULL,'0'),
(66,1,'31-03-2017','1',3,'jjjjjjjj','jjjj','2017-03-31 04:22:01','2017-04-12 04:27:07',0,1,NULL,'gesfzafhsgfhghzn','1'),
(67,1,'2017-04-03','1',2,'1211111','1234','2017-04-03 16:48:24','2017-04-12 03:17:08',0,1,'164721',NULL,'0'),
(69,1,'2017-04-04','1',3,'11111111','1234','2017-04-04 11:37:43','2017-04-04 06:09:40',0,1,'113549','ok','0'),
(70,1,'2017-04-14','1',3,'!23456','1234','2017-04-14 17:43:06','2017-04-14 12:14:34',0,1,'174147','testing','0'),
(71,1,'21-04-2017',NULL,3,'marry','arry','2017-04-21 16:51:24','2017-04-26 13:50:57',0,1,NULL,NULL,NULL),
(72,1,'2017-05-08',NULL,8,'111111','1234','2017-05-08 14:22:51','2017-05-08 08:52:51',0,1,'14219',NULL,NULL),
(73,1,'2017-05-08','1',8,'235235','1234','2017-05-08 14:25:17','2017-05-08 08:55:51',0,1,'142354',NULL,'0'),
(74,2,'11-05-2017','1',21,'1111','1111','2017-05-11 16:36:23','2017-05-11 11:13:30',0,1,NULL,'Rejected','0'),
(75,2,'2017-05-11',NULL,21,'1111','1234','2017-05-11 17:09:44','2017-05-11 11:39:44',0,1,'17747',NULL,NULL),
(76,2,'16-05-2017',NULL,10,'22222','2222','2017-05-16 04:32:57','2017-05-15 23:02:59',0,1,NULL,NULL,NULL),
(77,2,'16-05-2017','1',18,'1234456789','6789','2017-05-16 11:25:34','2017-05-16 05:58:28',0,1,NULL,NULL,'0'),
(78,2,'26-05-2017','',15,'1111','1111','2017-05-26 16:14:46','2017-05-26 13:28:50',0,1,NULL,'ok','1'),
(79,2,'26-05-2017',NULL,15,'1111','1111','2017-05-26 19:02:46','2017-05-26 13:32:50',0,1,NULL,NULL,NULL),
(80,2,'01-06-2017',NULL,22,'regret high','high','2017-06-01 19:24:47','2017-06-01 13:54:50',0,1,NULL,NULL,NULL);

/*Table structure for table `tbl_instruction` */

DROP TABLE IF EXISTS `tbl_instruction`;

CREATE TABLE `tbl_instruction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `employee_id` varchar(100) DEFAULT NULL,
  `distribution_id` varchar(100) DEFAULT NULL,
  `instructions` text,
  `req_date` varchar(100) DEFAULT NULL,
  `issued_by` int(11) DEFAULT NULL,
  `today_date` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `attachments` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_instruction` */

insert into `tbl_instruction` values 
(1,1,'Test',1,'2',NULL,'Hello','04/27/2017',1,'04/27/2017','2017-04-27 06:54:30','2017-04-27 06:54:30',0,NULL),
(2,1,'Hello',1,'2',NULL,'Hello','04/27/2017',1,'04/27/2017','2017-04-27 07:02:38','2017-04-27 07:02:38',0,NULL),
(3,1,'ggdfggfdgdfgsd',1,'3',NULL,'vbnvcbb\r\nds\r\ndfsdf\r\nsdf\r\nsdf\r\nsdf\r\ndsf\r\ndsf\r\ndsfsd\r\nfsd\r\nfsdf\r\n','04/26/2017',1,'04/26/2017','2017-04-27 07:40:02','2017-04-27 07:40:02',0,NULL),
(13,1,'xsdgsdg',8,'73','3','dfhdfh','08-05-2017',1,'08-05-2017','2017-05-08 12:42:05','2017-05-08 12:42:05',0,'unnamed_1494247325.png'),
(7,1,'Final testing sam',1,'2,3,42','3,42','Hello its Testing','05/02/2017',1,'05/02/2017','2017-05-02 14:17:09','2017-05-02 14:17:09',0,NULL),
(12,1,'Tetsing Final Ok',1,'3','3','Hi','08-05-2017',1,'08-05-2017','2017-05-08 07:42:01','2017-05-08 07:42:01',0,'site_instruction_approved_1494229321.php,unnamed_1494229321.png'),
(9,1,'Hello',1,'3','3','Hello','05/03/2017',1,'05/03/2017','2017-05-03 10:00:19','2017-05-03 10:00:19',0,NULL),
(10,1,'Final Test2',1,'2,3','3,42','Hii','05/03/2017',1,'05/03/2017','2017-05-03 10:27:01','2017-05-03 10:27:01',0,NULL),
(11,1,'Helo Its Email Testing',2,'43,44','3,42','Hello Testing time','05/03/2017',1,'05/03/2017','2017-05-03 11:36:02','2017-05-03 11:36:02',0,NULL);

/*Table structure for table `tbl_itp_form_heading_header` */

DROP TABLE IF EXISTS `tbl_itp_form_heading_header`;

CREATE TABLE `tbl_itp_form_heading_header` (
  `main_id` int(11) NOT NULL,
  `project` int(200) DEFAULT NULL,
  `location` varchar(30) NOT NULL,
  `completed_by` varchar(30) NOT NULL,
  `audited_by` varchar(30) NOT NULL,
  `special_info` varchar(400) NOT NULL,
  `title` varchar(30) NOT NULL,
  `trade_name` varchar(30) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_itp_form_heading_header` */

insert into `tbl_itp_form_heading_header` values 
(1,NULL,'USA','','','Testing 2','Bulk Earthworks (Cut to Fill)','Commercial and Industrial Prop','2017-06-07 06:29:44','2017-06-09 07:05:29',0,1),
(10,NULL,'','','','','New1','','2017-06-09 07:45:00','2017-06-09 07:45:00',0,22),
(11,NULL,'safsdff','','','fv3333','new2','Commercial and Industrial Prop','2017-06-09 07:54:30','2017-06-09 07:54:41',0,23);

/*Table structure for table `tbl_itp_main` */

DROP TABLE IF EXISTS `tbl_itp_main`;

CREATE TABLE `tbl_itp_main` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_itp_main` */

insert into `tbl_itp_main` values 
(1,'Bulk Earthworks (Cut to Fill)','2017-06-01 01:07:54','2017-06-01 01:07:54',0),
(2,'Testing ITP','2017-06-09 06:26:21','2017-06-09 07:01:54',1),
(3,'new','2017-06-09 06:43:38','2017-06-09 07:01:57',1),
(4,'vvv','2017-06-09 06:44:03','2017-06-09 07:01:59',1),
(5,'helo','2017-06-09 07:02:59','2017-06-09 07:36:16',1),
(6,'sdgsdg','2017-06-09 07:12:54','2017-06-09 07:36:19',1),
(7,'dddd','2017-06-09 07:36:23','2017-06-09 07:44:52',1),
(8,'ggggg','2017-06-09 07:37:14','2017-06-09 07:44:53',1),
(9,'gggggddd','2017-06-09 07:38:23','2017-06-09 07:44:50',1),
(10,'New1','2017-06-09 07:45:00','2017-06-09 07:54:23',1),
(11,'new2','2017-06-09 07:54:30','2017-06-09 07:54:30',0);

/*Table structure for table `tbl_permit_excave_register` */

DROP TABLE IF EXISTS `tbl_permit_excave_register`;

CREATE TABLE `tbl_permit_excave_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permit_no` varchar(20) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `issue_date` datetime DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `closure_date` datetime DEFAULT NULL,
  `induction_no` varchar(20) DEFAULT NULL,
  `employer_id` int(11) DEFAULT NULL,
  `permit_recipients_name` varchar(100) DEFAULT NULL,
  `mob_no` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `task` varchar(200) DEFAULT NULL,
  `work_location` varchar(70) DEFAULT NULL,
  `permit_issuers_name` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `additional_comments` varchar(100) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_activated` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_permit_excave_register` */

insert into `tbl_permit_excave_register` values 
(1,'001',1,'2016-11-30 00:00:00','2016-12-05 00:00:00','2016-12-01 00:00:00','0037',2,'abc22 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Tec Building ','Pieter Koppen','CLOSED','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),
(2,'002',1,'2016-12-01 00:00:00','2016-12-02 00:00:00','2016-12-02 00:00:00','0043',3,'abc28 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Tec Building ','Pieter Koppen','CLOSED','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),
(3,'003',1,'2016-12-01 00:00:00','2016-12-05 00:00:00','0000-00-00 00:00:00','0038',2,'abc23 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Tec Building ','Pieter Koppen','OPEN','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),
(4,'004',1,'2016-12-01 00:00:00','2016-12-05 00:00:00','2016-12-02 00:00:00','0035',2,'abc20 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Location 1','Pieter Koppen','CLOSED','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),
(5,'005',1,'2016-12-01 00:00:00','2016-12-07 00:00:00','2016-12-07 00:00:00','0042',3,'abc27 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Tec Building ','Pieter Koppen','CLOSED','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),
(6,'006',1,'2016-12-02 00:00:00','2016-12-04 00:00:00','2016-12-02 00:00:00','0021',2,'abc8 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Tec Building ','Pieter Koppen','CLOSED','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),
(7,'007',1,'2016-12-02 00:00:00','2016-12-04 00:00:00',NULL,'0023',2,'abc6 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Tec Building ','Pieter Koppen','OPEN','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),
(8,'008',1,'2016-12-03 00:00:00','2016-12-09 00:00:00','2016-12-03 00:00:00','0025',2,'abc10 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Tec Building ','Pieter Koppen','CLOSED','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),
(9,'009',1,'2016-12-07 00:00:00','2016-12-13 00:00:00',NULL,'0047',2,'abc22 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Location 1','Pieter Koppen','OPEN','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1);

/*Table structure for table `tbl_project` */

DROP TABLE IF EXISTS `tbl_project`;

CREATE TABLE `tbl_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(200) DEFAULT NULL,
  `access_id` int(11) NOT NULL,
  `number` varchar(200) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_activated` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_project` */

insert into `tbl_project` values 
(1,'Newcold-Truganina',7,'3010-05-000','2017-02-02 13:36:15','2017-05-11 06:12:26',0,1),
(2,'Symbion',2,'3010-05-000','2017-03-20 12:45:53','2017-05-14 05:40:27',0,1);

/*Table structure for table `tbl_project_register` */

DROP TABLE IF EXISTS `tbl_project_register`;

CREATE TABLE `tbl_project_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `access_id` int(11) DEFAULT NULL,
  `employer_id` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_activated` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_project_register` */

insert into `tbl_project_register` values 
(1,1,7,1,'2017-02-02 13:36:15','2017-05-11 06:12:26',0,1),
(2,1,7,2,'2017-02-02 13:36:15','2017-05-11 06:12:26',0,1),
(3,1,7,3,'2017-02-02 13:36:15','2017-05-11 06:12:26',0,1),
(9,2,2,7,'2017-05-08 13:38:00','2017-05-14 05:40:27',0,1),
(10,1,7,8,'2017-05-08 14:10:59','2017-05-11 06:12:26',0,1),
(11,2,2,9,'2017-05-11 05:07:06','2017-05-14 05:40:27',0,1),
(12,2,2,10,'2017-05-11 05:10:26','2017-05-14 05:40:27',0,1),
(13,2,2,11,'2017-05-11 05:11:50','2017-05-14 05:40:27',0,1),
(14,2,2,12,'2017-05-11 05:12:35','2017-05-14 05:40:27',0,1),
(15,2,2,13,'2017-05-11 05:15:05','2017-05-14 05:40:27',0,1),
(16,2,2,14,'2017-05-11 05:16:03','2017-05-14 05:40:27',0,1),
(17,2,2,15,'2017-05-11 05:17:23','2017-05-14 05:40:27',0,1),
(18,2,2,16,'2017-05-11 05:18:04','2017-05-14 05:40:27',0,1),
(19,2,2,17,'2017-05-11 05:18:40','2017-05-14 05:40:27',0,1),
(20,2,2,18,'2017-05-11 05:19:21','2017-05-14 05:40:27',0,1),
(21,2,2,19,'2017-05-11 05:20:15','2017-05-14 05:40:27',0,1),
(22,2,2,20,'2017-05-11 05:23:43','2017-05-14 05:40:27',0,1),
(23,2,2,21,'2017-05-11 05:24:27','2017-05-14 05:40:27',0,1),
(24,2,2,22,'2017-05-11 05:25:48','2017-05-14 05:40:27',0,1),
(25,1,7,23,'2017-05-18 16:20:28','2017-05-18 10:50:28',0,1);

/*Table structure for table `tbl_ref_doc` */

DROP TABLE IF EXISTS `tbl_ref_doc`;

CREATE TABLE `tbl_ref_doc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `row_id` int(11) NOT NULL,
  `ref_doc` varchar(400) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `is_uploaded` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_ref_doc` */

insert into `tbl_ref_doc` values 
(1,1,' ','2017-06-01 09:55:36','2017-06-01 09:55:36',0,1),
(2,2,' ','2017-06-02 05:46:24','2017-06-02 05:46:24',0,1),
(3,3,' Construction Drawings','2017-06-02 05:48:17','2017-06-02 05:48:17',0,1),
(4,4,' Safety in Design  Design risk Assessment ','2017-06-02 05:49:42','2017-06-02 05:49:42',0,1),
(5,5,' Construction Drawings','2017-06-02 05:52:45','2017-06-02 05:52:45',0,1),
(6,6,' Safety in Design  Design risk Assessment ','2017-06-02 05:53:50','2017-06-02 05:53:50',0,1),
(7,7,' ','2017-06-02 05:55:05','2017-06-02 05:55:05',0,1),
(8,8,' Op Works Approval Development Approval Building Approval','2017-06-02 05:57:00','2017-06-02 05:57:00',0,1),
(9,9,' Authority conditions CIP Site Safety Management Plan','2017-06-02 05:58:27','2017-06-02 05:58:27',0,1),
(10,10,' Authority conditions','2017-06-02 06:00:30','2017-06-02 06:00:30',0,1),
(11,11,' CIP Site Safety Management Plan CIP Permit to Excavate As-built drawings from DBYD  As-built drawings from previous property owner Civil construction drawings','2017-06-02 06:02:19','2017-06-02 06:02:19',0,1),
(12,12,' Australian Standards AS 1726','2017-06-02 06:03:36','2017-06-02 06:03:36',0,1),
(13,13,' Authority consent Material Specifications','2017-06-02 06:08:29','2017-06-02 06:08:29',0,1),
(14,14,' Material Specifications Design Specifications','2017-06-02 06:10:02','2017-06-02 06:10:02',0,1),
(15,15,' Inspection & Requirements Checklist (C-Q-ITP-0202D)','2017-06-02 06:10:56','2017-06-02 06:10:56',0,1),
(16,16,' Civil Specifications','2017-06-02 06:11:43','2017-06-02 06:11:43',0,1),
(17,17,' Contractor ITP`s ','2017-06-02 06:12:36','2017-06-02 06:12:36',0,1),
(18,18,' NCR Register','2017-06-02 06:13:20','2017-06-02 06:13:20',0,1),
(19,5,'docs','2017-06-06 09:56:24','2017-06-06 09:56:24',0,1),
(20,5,'PDFs','2017-06-06 09:56:24','2017-06-06 09:56:24',0,1),
(21,5,'test pdf','2017-06-06 11:34:04','2017-06-06 11:34:04',0,1),
(22,6,'test','2017-06-06 11:56:38','2017-06-06 11:56:38',0,1),
(23,19,'Construction Drawings','2017-06-09 08:00:40','2017-06-09 08:00:40',1,1),
(24,19,'Safety in Design ','2017-06-09 08:00:40','2017-06-09 08:00:40',1,1),
(25,19,'Design risk Assessment ','2017-06-09 08:00:40','2017-06-09 08:00:40',1,1),
(26,19,'Op Works Approval','2017-06-09 08:00:40','2017-06-09 08:00:40',1,1),
(27,19,'Safety in Design','2017-06-09 08:35:51','2017-06-09 08:35:51',1,1),
(28,19,'Design risk Assessment','2017-06-09 08:35:51','2017-06-09 08:35:51',1,1),
(29,19,'Op Works Approval','2017-06-09 08:35:51','2017-06-09 08:35:51',1,1),
(30,19,'Construction Drawings','2017-06-09 08:53:52','2017-06-09 08:53:52',1,1),
(31,19,'Inspection & Requirements Checklist (C-Q-ITP-0202D)','2017-06-09 08:54:11','2017-06-09 08:54:11',1,1),
(32,19,'Civil Specifications','2017-06-09 08:54:11','2017-06-09 08:54:11',1,1),
(33,20,'Design risk Assessment ','2017-06-09 08:57:28','2017-06-09 08:57:28',1,1),
(34,20,'Op Works Approval','2017-06-09 08:57:28','2017-06-09 08:57:28',1,1),
(35,19,'Australian Standards AS 1726','2017-06-09 09:14:21','2017-06-09 09:14:21',1,1),
(36,19,'Inspection & Requirements Checklist (C-Q-ITP-0202D)','2017-06-09 09:14:21','2017-06-09 09:14:21',1,1),
(37,19,'Australian Standards AS 1726','2017-06-09 09:14:21','2017-06-09 09:14:21',1,1),
(38,19,'Inspection & Requirements Checklist (C-Q-ITP-0202D)','2017-06-09 09:14:21','2017-06-09 09:14:21',1,1),
(39,19,'Australian Standards AS 1726','2017-06-09 10:16:03','2017-06-09 10:16:03',1,1),
(40,19,'Inspection & Requirements Checklist (C-Q-ITP-0202D)','2017-06-09 10:16:03','2017-06-09 10:16:03',1,1),
(41,19,'Australian Standards AS 1726','2017-06-09 10:16:07','2017-06-09 10:16:07',1,1),
(42,19,'Inspection & Requirements Checklist (C-Q-ITP-0202D)','2017-06-09 10:16:07','2017-06-09 10:16:07',1,1),
(43,19,'Australian Standards AS 1726','2017-06-09 10:16:11','2017-06-09 10:16:11',1,1),
(44,19,'Inspection & Requirements Checklist (C-Q-ITP-0202D)','2017-06-09 10:16:11','2017-06-09 10:16:11',1,1),
(45,19,'Australian Standards AS 1726','2017-06-09 10:16:46','2017-06-09 10:16:46',1,1),
(46,19,'Inspection & Requirements Checklist (C-Q-ITP-0202D)','2017-06-09 10:16:46','2017-06-09 10:16:46',1,1),
(47,19,'Australian Standards AS 1726','2017-06-09 10:17:13','2017-06-09 10:17:13',1,1),
(48,19,'Inspection & Requirements Checklist (C-Q-ITP-0202D)','2017-06-09 10:17:13','2017-06-09 10:17:13',1,1),
(49,19,'Australian Standards AS 1726','2017-06-09 10:18:01','2017-06-09 10:18:01',1,1),
(50,19,'Inspection & Requirements Checklist (C-Q-ITP-0202D)','2017-06-09 10:18:01','2017-06-09 10:18:01',1,1),
(51,19,'Australian Standards AS 1726','2017-06-09 10:18:11','2017-06-09 10:18:11',1,1),
(52,19,'Inspection & Requirements Checklist (C-Q-ITP-0202D)','2017-06-09 10:18:12','2017-06-09 10:18:12',1,1),
(53,19,'Australian Standards AS 1726','2017-06-09 10:19:23','2017-06-09 10:19:23',1,1),
(54,19,'Inspection & Requirements Checklist (C-Q-ITP-0202D)','2017-06-09 10:19:23','2017-06-09 10:19:23',1,1),
(55,19,'Australian Standards AS 1726','2017-06-09 10:29:28','2017-06-09 10:29:28',1,1),
(56,19,'Inspection & Requirements Checklist (C-Q-ITP-0202D)','2017-06-09 10:29:28','2017-06-09 10:29:28',1,1),
(57,20,'Design risk Assessment','2017-06-09 11:09:32','2017-06-09 11:09:32',1,1),
(58,20,'Op Works Approval','2017-06-09 11:09:33','2017-06-09 11:09:33',1,1),
(59,20,'test_other','2017-06-09 11:29:46','2017-06-09 11:29:46',1,1),
(60,20,'Construction Drawings','2017-06-09 11:29:46','2017-06-09 11:29:46',1,1),
(61,20,'Safety in Design','2017-06-09 11:29:46','2017-06-09 11:29:46',1,1),
(62,20,'Design risk Assessment','2017-06-09 11:29:47','2017-06-09 11:29:47',1,1),
(63,20,'Op Works Approval','2017-06-09 11:29:47','2017-06-09 11:29:47',1,1),
(64,20,'newwww_ther','2017-06-09 11:52:48','2017-06-09 11:52:48',1,1),
(65,20,'Construction Drawings','2017-06-09 11:52:48','2017-06-09 11:52:48',1,1),
(66,20,'Safety in Design','2017-06-09 11:52:48','2017-06-09 11:52:48',1,1),
(67,20,'Design risk Assessment','2017-06-09 11:52:48','2017-06-09 11:52:48',1,1),
(68,20,'Op Works Approval','2017-06-09 11:52:48','2017-06-09 11:52:48',1,1),
(69,20,'test_other','2017-06-09 11:52:48','2017-06-09 11:52:48',1,1),
(70,20,'otherrrrr','2017-06-09 11:54:14','2017-06-09 11:54:14',1,1),
(71,20,'Construction Drawings','2017-06-09 11:54:15','2017-06-09 11:54:15',1,1),
(72,20,'Safety in Design','2017-06-09 11:54:15','2017-06-09 11:54:15',1,1),
(73,20,'Design risk Assessment','2017-06-09 11:54:15','2017-06-09 11:54:15',1,1),
(74,20,'Op Works Approval','2017-06-09 11:54:15','2017-06-09 11:54:15',1,1),
(75,20,'test_other','2017-06-09 11:54:15','2017-06-09 11:54:15',1,1),
(76,20,'vvffdfedddd','2017-06-09 11:56:07','2017-06-09 11:56:07',1,1),
(77,20,'other','2017-06-09 17:28:00','2017-06-09 17:28:00',1,1),
(78,20,'vvffdfedddd','2017-06-09 17:28:48','2017-06-09 17:28:48',1,1),
(79,20,'vvffdfedddd','2017-06-09 11:59:30','2017-06-09 11:59:30',1,1),
(80,20,'FINAL','2017-06-09 12:00:11','2017-06-09 12:00:11',1,1),
(81,20,'Construction Drawings','2017-06-09 12:00:11','2017-06-09 12:00:11',1,1),
(82,20,'Safety in Design','2017-06-09 12:00:11','2017-06-09 12:00:11',1,1),
(83,20,'Design risk Assessment','2017-06-09 12:00:11','2017-06-09 12:00:11',1,1),
(84,20,'Op Works Approval','2017-06-09 12:00:11','2017-06-09 12:00:11',1,1),
(85,20,'test_other','2017-06-09 12:00:11','2017-06-09 12:00:11',1,1),
(86,20,'vvffdfedddd','2017-06-09 12:00:11','2017-06-09 12:00:11',1,1),
(87,20,'vvffdfedddd','2017-06-09 12:00:12','2017-06-09 12:00:12',1,1),
(88,20,'FINAL','2017-06-09 12:00:20','2017-06-09 12:00:20',1,1),
(89,20,'Construction Drawings','2017-06-09 12:00:20','2017-06-09 12:00:20',1,1),
(90,20,'Safety in Design','2017-06-09 12:00:20','2017-06-09 12:00:20',1,1),
(91,20,'Design risk Assessment','2017-06-09 12:00:20','2017-06-09 12:00:20',1,1),
(92,20,'Op Works Approval','2017-06-09 12:00:20','2017-06-09 12:00:20',1,1),
(93,20,'test_other','2017-06-09 12:00:20','2017-06-09 12:00:20',1,1),
(94,20,'vvffdfedddd','2017-06-09 12:00:20','2017-06-09 12:00:20',1,1),
(95,20,'vvffdfedddd','2017-06-09 12:00:20','2017-06-09 12:00:20',1,1),
(96,19,'MUJEEB BHAI','2017-06-09 12:05:48','2017-06-09 12:05:48',1,1),
(97,19,'MUJEEB BHAI','2017-06-09 12:06:41','2017-06-09 12:06:41',1,1),
(98,19,'Material Specifications','2017-06-09 12:07:35','2017-06-09 12:07:35',0,1),
(99,19,'Design Specifications','2017-06-09 12:07:35','2017-06-09 12:07:35',0,1),
(100,20,'Construction Drawings','2017-06-09 12:11:49','2017-06-09 12:11:49',1,1),
(101,20,'Safety in Design','2017-06-09 12:11:49','2017-06-09 12:11:49',1,1),
(102,20,'Design risk Assessment','2017-06-09 12:11:49','2017-06-09 12:11:49',1,1),
(103,20,'Op Works Approval','2017-06-09 12:11:49','2017-06-09 12:11:49',1,1),
(104,20,'test_other','2017-06-09 12:11:49','2017-06-09 12:11:49',1,1),
(107,20,'randhir sir','2017-06-09 12:11:49','2017-06-09 12:11:49',1,1),
(108,20,'randhir sir','2017-06-09 12:13:15','2017-06-09 12:13:15',1,1),
(109,20,'randhir sir','2017-06-09 12:13:31','2017-06-09 12:13:31',1,1),
(110,20,'randhir sir','2017-06-09 12:15:03','2017-06-09 12:15:03',0,1);

/*Table structure for table `tbl_ref_docs` */

DROP TABLE IF EXISTS `tbl_ref_docs`;

CREATE TABLE `tbl_ref_docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_docs_select` varchar(200) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `isdeleted` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_ref_docs` */

insert into `tbl_ref_docs` values 
(1,'Construction Drawings','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(2,'Safety in Design ','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(3,'Design risk Assessment ','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(4,'Op Works Approval','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(5,'Development Approval','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(6,'Building Approval','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(7,'Authority conditions','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(8,'CIP Site Safety Management Plan','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(9,'Authority conditions','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(10,'CIP Site Safety Management Plan','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(11,'CIP Permit to Excavate','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(12,'As-built drawings from DBYD ','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(13,'As-built drawings from previous property owner','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(14,'Civil construction drawings','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(15,'Australian Standards AS 1726','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(16,'Authority consent','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(17,'Material Specifications','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(18,'Material Specifications','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(19,'Design Specifications','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(20,'Inspection & Requirements Checklist (C-Q-ITP-0202D)','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(21,'Civil Specifications','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(22,'Contractor ITP`s ','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(23,'NCR Register','2017-06-02 05:58:24','2017-06-02 05:58:24',''),
(24,'test_other','2017-06-09 11:29:46','2017-06-09 11:29:46',''),
(25,'newwww_ther','2017-06-09 11:52:48','2017-06-09 11:52:48',''),
(26,'otherrrrr','2017-06-09 11:54:14','2017-06-09 11:54:14',''),
(27,'vvffdfedddd','2017-06-09 11:56:07','2017-06-09 11:56:07',''),
(28,'vvffdfedddd','2017-06-09 11:59:30','2017-06-09 11:59:30',''),
(29,'FINAL','2017-06-09 12:00:11','2017-06-09 12:00:11',''),
(30,'FINAL','2017-06-09 12:00:19','2017-06-09 12:00:19',''),
(31,'MUJEEB BHAI','2017-06-09 12:05:48','2017-06-09 12:05:48',''),
(32,'MUJEEB BHAI','2017-06-09 12:06:41','2017-06-09 12:06:41',''),
(33,'randhir sir','2017-06-09 12:11:49','2017-06-09 12:11:49','');

/*Table structure for table `tbl_refrence` */

DROP TABLE IF EXISTS `tbl_refrence`;

CREATE TABLE `tbl_refrence` (
  `induction_id` int(100) DEFAULT NULL,
  `project_id` int(100) DEFAULT NULL,
  `email` varchar(500) NOT NULL,
  `pin` int(100) DEFAULT NULL,
  `refrence_no` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `refrence_no` (`refrence_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_refrence` */

insert into `tbl_refrence` values 
(61,2,'shanky.rags@gmail.com',1111,'72bd1613ddad451b0ca0d70671d66581'),
(61,2,'kdevender609@gmail.com',1111,'9d84eb5db07e320d6642dd910d3a1eb1'),
(61,1,'ss@fdbh',1111,'5a35ec150b52cc3ab69fa63bf73c38f3'),
(61,1,'xfh@asdfsf.com',1111,'fccc437b1c3c628f7189a4d8ced7b1c7'),
(1,1,'shashank.r@aviktechnosoft.com',1111,'aea0b85f8d43b9e85da77bae87861ce6'),
(1,1,'pkoppen@ciproperty.com.au',1111,'f35d2d057a23163689fb9b95eddd06d9'),
(1,1,'randhir.s@aviktechnosoft.com',1111,'e09bb8a49079fab161fb17f799eea1fe');

/*Table structure for table `tbl_setting` */

DROP TABLE IF EXISTS `tbl_setting`;

CREATE TABLE `tbl_setting` (
  `id` int(11) NOT NULL,
  `induction_mail` varchar(500) DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_setting` */

insert into `tbl_setting` values 
(1,'pkoppen@ciproperty.com.au,diamondsaurabh@gmail.com',1),
(2,'pkoppen@ciproperty.com.au',2);

/*Table structure for table `tbl_site_attendace` */

DROP TABLE IF EXISTS `tbl_site_attendace`;

CREATE TABLE `tbl_site_attendace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `induction_no` varchar(400) NOT NULL,
  `project_id` int(11) NOT NULL,
  `trade` varchar(400) DEFAULT NULL,
  `employees_location` text,
  `no_of_worker` int(11) DEFAULT NULL,
  `today_date` date DEFAULT NULL,
  `whom` int(11) NOT NULL,
  `image_1` varchar(400) NOT NULL,
  `image_2` varchar(400) NOT NULL,
  `image_3` varchar(400) NOT NULL,
  `image_4` varchar(400) NOT NULL,
  `image_5` varchar(400) NOT NULL,
  `isuploaded` int(11) DEFAULT '1',
  `isdeleted` int(11) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `image_6` varchar(400) NOT NULL,
  `image_1_text` varchar(400) NOT NULL,
  `image_2_text` varchar(400) NOT NULL,
  `image_3_text` varchar(400) NOT NULL,
  `image_4_text` varchar(400) NOT NULL,
  `image_5_text` varchar(400) NOT NULL,
  `image_6_text` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_site_attendace` */

insert into `tbl_site_attendace` values 
(2,'1',1,'Principle','Testing',12,'2017-04-25',1,'20170425124848.jpg','20170425124859.jpg','20170425124848.jpg','20170425124859.jpg','20170425124859.jpg',1,1,'2017-04-25 07:17:48','2017-04-25 07:17:48','','','','','','',''),
(6,'59',1,'Dock Levellers','Txt test',5,'2017-05-02',0,'20170502163930.jpg','','','20170502163942.jpg','',1,1,'2017-05-02 11:11:50','2017-05-02 11:19:47','','hhhhh','','','','yyyyyyy',''),
(7,'1',1,'Joint cutting and sealing','Test',8,'2017-05-02',0,'20170502165300.jpg','','','','',1,1,'2017-05-02 11:23:10','2017-05-02 11:23:10','','first image','','','','',''),
(8,'1',2,'Joint cutting and sealing','Chgchgchgchgchg',23757555,'2017-05-08',0,'20170508131504.jpg','','20170508161714.jpg','20170508133252.jpg','20170508161726.jpg',1,1,'2017-05-08 08:02:57','2017-05-08 08:02:58','20170508161726.jpg','hgdhgdhgdhg','dhfdghdhdhgd','hfsfhdhgdghd','htdhfdhgdgud','ugfhhfxg',''),
(9,'1',1,'Daniel Galea','ok',23,'2017-05-08',1,'unnamed_1494232811.png','20170508161246.jpg','','','',1,1,'2017-05-08 08:40:11','2017-05-08 08:40:11','','','','','','',''),
(10,'74',2,'Structural steel erection','Test',6,'2017-05-11',0,'20170511171654.jpg','','','','',1,1,'2017-05-11 11:47:05','2017-05-11 11:47:06','','jhihh','','','','',''),
(11,'1',2,'Principle','3 men onsite .......\n2 men onsite ...........\n2 men onsite .........',7,'2017-05-12',0,'20170512071704.jpg','20170512071721.jpg','20170512071734.jpg','20170512071806.jpg','',1,1,'2017-05-11 21:18:18','2017-05-11 21:18:18','','Plastic Tub','Marble Tile','APP Mark Ups','Site Induction APP','Home Page',''),
(12,'1',2,'Principle','2 men .........',5,'2017-05-16',0,'20170516085357.jpg','20170516085412.jpg','20170516085430.jpg','20170516085500.jpg','',1,1,'2017-05-15 22:55:11','2017-05-15 22:55:12','','Keypad','Keypad 2','Laptop','IPhone','Lot of Dirt',''),
(13,'59',1,'Dock Levellers','Khih',7,'2017-05-24',0,'20170524121844.jpg','','','','',1,1,'2017-05-24 06:48:53','2017-05-24 06:48:53','','ggg chinook','','','','',''),
(14,'59',1,'Dock Levellers','Hhh',7,'2017-05-29',0,'','','','','',1,1,'2017-05-29 07:10:21','2017-05-29 07:11:23','','','','','','',''),
(15,'1',2,'Principle','3 men working in the office \n3 men working in the field',6,'2017-06-01',0,'20170601143332.jpg','','','','',1,1,'2017-06-01 04:33:41','2017-06-01 04:33:41','','keypad','','','','',''),
(16,'1',2,'Principle','3 men working',8,'2017-06-07',0,'20170607182229.jpg','','','','',1,1,'2017-06-07 08:22:40','2017-06-07 08:22:41','','hello','','','','',''),
(17,'21',1,'Scott Gannaway','ok',33,'2017-06-07',1,'screenshot_1496826044.png','','','','',1,1,'2017-06-07 09:00:44','2017-06-07 09:00:44','screenshot_1496826044.png','Tst1','','','','','tst6');

/*Table structure for table `tbl_site_induction_declaration` */

DROP TABLE IF EXISTS `tbl_site_induction_declaration`;

CREATE TABLE `tbl_site_induction_declaration` (
  `id` int(11) NOT NULL,
  `induction_id` int(11) DEFAULT NULL,
  `edit_certifiy` varchar(200) DEFAULT NULL,
  `your_signature` varchar(200) DEFAULT NULL,
  `todays_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_site_induction_declaration` */

insert into `tbl_site_induction_declaration` values 
(4,NULL,'szfasf asfasf','184424','2017-02-17 13:16:02'),
(5,NULL,'gfjfgj returtu','185121','2017-02-17 13:23:07'),
(6,NULL,'Sam 2345235','185912','2017-02-17 13:31:16'),
(7,NULL,'Pieter Koppen','20170218163303.png','18-02-2017'),
(8,NULL,'Hello Shashank Hiii','133525.jpg','2017-03-17'),
(9,NULL,'fgjfgj fjfgkj','135027.jpg','2017-03-17'),
(10,NULL,'Sam 123','114837.jpg','2017-03-22'),
(11,NULL,'Glenn Herd','20170405090728.jpg','05-04-2017'),
(12,NULL,'Pieter Koppen','20170516074209.jpg','16-05-2017'),
(13,NULL,'Pieter Koppen','20170527113700.jpg','27-05-2017'),
(14,NULL,'Pieter Koppen','20170601144122.jpg','01-06-2017'),
(21,NULL,'nis gg','sign_20170217_190930.png','17-02-2017'),
(22,NULL,'arti Mishra','20170217120603.png','17-02-2017');
insert into `tbl_site_induction_declaration` values 
(23,NULL,'tapasya parashar','sign_20170217_194944.png','17-02-2017'),
(24,NULL,'saurabh Solanki','20170217125346.png','17-02-2017'),
(25,NULL,'nit bb','sign_20170217_203405.png','17-02-2017'),
(26,NULL,'up pp','20170218164202.png','18-02-2017'),
(27,NULL,'nitin singhal','sign_20170221_154627.png','21-02-2017'),
(28,NULL,'nit va','sign_20170221_191026.png','21-02-2017'),
(29,NULL,'Sakshi goyal','20170221120738.png','21-02-2017'),
(30,NULL,'Shashank sdgsdg','20170221123613.png','2017-02-21 14:23:51'),
(31,NULL,'Test tetsing','20315','2017-02-21 14:35:16'),
(32,NULL,'Shashank Raghav','112534','2017-02-22 05:57:52'),
(33,NULL,'Shashank123 asfasf13','121129','2017-02-22'),
(34,NULL,'Test123 asfasf','122032','2017-02-22'),
(35,NULL,'Testing 123','12407','2017-02-22'),
(36,NULL,'test test 1111','125913','2017-02-22'),
(37,NULL,'test345 asasf','131842','2017-02-22'),
(38,NULL,'Shashank testing asfasf','133118','2017-02-22'),
(39,NULL,'dd ddd','20170302123225.jpg','23-02-2017'),
(40,NULL,'eeeeeee eeeeeee','20170223092618.png','23-02-2017'),
(41,NULL,'arti mishra','sign_20170227_125024.png','27-02-2017'),
(42,NULL,'sdsdg westgwe','14433.jpg','2017-02-27'),
(43,NULL,'iPad test hhhh','20170227072413.png','27-02-2017'),
(44,NULL,'Web test sdgsdg','152951.jpg','2017-02-27'),
(45,NULL,'aarti1 Mishra','20170227080625.jpg','27-02-2017'),
(46,NULL,'narendra k','20170227082324.jpg','27-02-2017'),
(47,NULL,'ipad test12','20170227161010.jpg','27-02-2017'),
(48,NULL,'ipad test13','20170227161309.jpg','27-02-2017'),
(49,NULL,'hhhh hhhh','20170228112437.jpg','28-02-2017'),
(50,NULL,'hhhh hhh','20170228171732.jpg','28-02-2017'),
(51,NULL,'gg gg','20170228153507.jpg','28-02-2017'),
(52,NULL,'Arti Mishra','20170228154012.jpg','28-02-2017'),
(53,NULL,'hhh ghhnnnn','20170228154639.jpg','28-02-2017'),
(54,NULL,'gggggg ggggg','20170301162042.jpg','01-03-2017'),
(55,NULL,'Nate k','20170301185654.jpg','01-03-2017'),
(56,NULL,'Shashank sdfsdgsdg','20170302130754.jpg','2017-03-02'),
(57,NULL,'Shashank Raghav ','15482.jpg','2017-03-02'),
(58,NULL,'Shashank Raghav','155610.jpg','2017-03-02'),
(59,NULL,'arti Mishra','20170306181606.jpg','06-03-2017'),
(60,NULL,'ddddd ddddd','20170307105609.jpg','07-03-2017'),
(61,NULL,'cbnh fvj','sign_20170307_104940.png','07-03-2017'),
(62,NULL,'gg gg','20170308074018.jpg','08-03-2017'),
(63,NULL,'hhhhhh oooooo','20170311182317.jpg','11-03-2017'),
(64,NULL,'n k','20170321155218.jpg','21-03-2017'),
(65,NULL,'jk h','20170321181351.jpg','21-03-2017'),
(66,NULL,'hhhhhh jjjjjj','20170331085202.jpg','31-03-2017'),
(67,NULL,'w qqe','164721.jpg','2017-04-03'),
(68,NULL,'sfasf sfasf','172851.jpg','2017-04-03'),
(69,NULL,'Shashank Test','113549.jpg','2017-04-04'),
(70,NULL,'Test Test','174147.jpg','2017-04-14'),
(71,NULL,'jojo varghese','20170421165126.jpg','21-04-2017'),
(72,NULL,'yyyyyyy uuuuuuu','20170428003334.jpg','28-04-2017'),
(73,NULL,'tity sdgsdg','142354.jpg','2017-05-08'),
(74,NULL,'narendra Kumar','20170511163624.jpg','11-05-2017'),
(75,NULL,'NARENDRA  WEB','17747.jpg','2017-05-11'),
(76,NULL,'hhhh hhhh','20170516090258.jpg','16-05-2017'),
(77,NULL,'test testing','20170516112535.jpg','16-05-2017'),
(78,NULL,'nk Sky','20170526185848.jpg','26-05-2017'),
(79,NULL,'kk g','20170526190247.jpg','26-05-2017'),
(80,NULL,'test one','20170601192448.jpg','01-06-2017');

/*Table structure for table `tbl_site_induction_topics` */

DROP TABLE IF EXISTS `tbl_site_induction_topics`;

CREATE TABLE `tbl_site_induction_topics` (
  `id` int(11) NOT NULL,
  `induction_topic_1` int(11) DEFAULT '0',
  `induction_topic_2` int(11) DEFAULT '0',
  `induction_topic_3` int(11) DEFAULT '0',
  `induction_topic_4` int(11) DEFAULT '0',
  `induction_topic_5` int(11) DEFAULT '0',
  `induction_topic_6` int(11) DEFAULT '0',
  `induction_topic_7` int(11) DEFAULT '0',
  `induction_topic_8` int(11) DEFAULT '0',
  `induction_topic_9` int(11) DEFAULT '0',
  `induction_topic_10` int(11) DEFAULT '0',
  `induction_topic_11` int(11) DEFAULT '0',
  `induction_topic_12` int(11) DEFAULT '0',
  `induction_topic_13` int(11) DEFAULT '0',
  `induction_topic_14` int(11) DEFAULT '0',
  `induction_topic_15` int(11) DEFAULT '0',
  `induction_topic_16` int(11) DEFAULT '0',
  `induction_topic_17` int(11) DEFAULT '0',
  `induction_topic_18` int(11) DEFAULT '0',
  `induction_topic_19` int(11) DEFAULT '0',
  `induction_topic_20` int(11) DEFAULT '0',
  `induction_topic_21` int(11) DEFAULT '0',
  `induction_topic_22` int(11) DEFAULT '0',
  `induction_topic_23` int(11) DEFAULT '0',
  `induction_topic_23_subpart` int(11) DEFAULT '0',
  `induction_topic_24` int(11) DEFAULT '0',
  `induction_topic_25` int(11) DEFAULT '0',
  `induction_topic_26` int(11) DEFAULT '0',
  `induction_topic_27` int(11) DEFAULT '0',
  `induction_topic_28` int(11) DEFAULT '0',
  `induction_topic_29` int(11) DEFAULT '0',
  `induction_topic_30` int(11) DEFAULT '0',
  `induction_topic_31` int(11) DEFAULT '0',
  `induction_topic_32` int(11) DEFAULT '0',
  `induction_topic_33` int(11) DEFAULT '0',
  `induction_topic_34` int(11) DEFAULT '0',
  `induction_topic_edit_text_34` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_site_induction_topics` */

insert into `tbl_site_induction_topics` values 
(4,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,''),
(5,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,''),
(6,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,''),
(7,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(8,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(9,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(10,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(11,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(12,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(13,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(14,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(21,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(22,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(23,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(24,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(25,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(26,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(27,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(28,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(29,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(30,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(31,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(32,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(33,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(34,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(35,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(36,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(37,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(38,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(39,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(40,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(41,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(42,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(43,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(44,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(45,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(46,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(47,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(48,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(49,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(50,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(51,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(52,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(53,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(54,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(55,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(56,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(57,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(58,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(59,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(60,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(61,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(62,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(63,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(64,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(65,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(66,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(67,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(68,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(69,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(70,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(71,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(72,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(73,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(74,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(75,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(76,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(77,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(78,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(79,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,''),
(80,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');

/*Table structure for table `tbl_site_information` */

DROP TABLE IF EXISTS `tbl_site_information`;

CREATE TABLE `tbl_site_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_location` varchar(200) DEFAULT NULL,
  `permit_to_excavate_task` varchar(200) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_activated` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_site_information` */

insert into `tbl_site_information` values 
(1,'Tec Building ','Excavation of Sewer Line ','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),
(2,'Location 1','Detailed Description 2','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1);

/*Table structure for table `tbl_site_upload_attachment` */

DROP TABLE IF EXISTS `tbl_site_upload_attachment`;

CREATE TABLE `tbl_site_upload_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) DEFAULT '0',
  `induction_id` int(11) DEFAULT '0',
  `image_url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `image_id` (`image_id`,`induction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=512 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_site_upload_attachment` */

insert into `tbl_site_upload_attachment` values 
(213,0,4,'uploaded images/dfsdfb.gif'),
(214,1,4,'uploaded images/app-checklist-manager.png'),
(215,2,4,'uploaded images/screenshot-1.jpg'),
(216,3,4,'uploaded images/dfsdfb.gif'),
(217,0,5,'uploaded images/app-checklist-manager.png'),
(218,1,5,'uploaded images/app-checklist-manager.png'),
(219,2,5,'uploaded images/app-checklist-manager.png'),
(220,3,5,'uploaded images/phpcode-287392.jpeg'),
(221,0,6,'API/Uploads/phpcode-287392.jpeg'),
(222,1,6,'API/Uploads/phpcode-287392.jpeg'),
(223,2,6,'API/Uploads/screenshot-2.jpg'),
(224,3,6,'API/Uploads/screenshot-2.jpg'),
(225,0,21,'20170217_190706.jpg'),
(226,1,21,'20170217_190738.jpg'),
(227,2,21,'20170217_190804.jpg'),
(228,3,21,'20170217_190830.jpg'),
(229,0,22,'20170217120500.png'),
(230,1,22,'20170217120504.png'),
(231,2,22,'20170217120509.png'),
(232,3,22,'20170217120512.png'),
(233,0,23,'20170217_194734.jpg'),
(234,1,23,'20170217_194746.jpg'),
(235,2,23,'20170217_194755.jpg'),
(236,3,23,'20170217_194802.jpg'),
(237,0,24,'20170217125300.png'),
(238,1,24,'20170217125313.png'),
(239,2,24,'20170217125317.png'),
(240,3,24,'20170217125322.png'),
(241,0,25,'20170217_203337.jpg'),
(242,1,25,'20170217_203344.jpg'),
(243,2,25,'20170217_203356.jpg'),
(244,3,25,'20170217_203351.jpg'),
(245,0,7,'20170218163043.png'),
(246,1,7,'20170218163059.png'),
(247,2,7,'20170218163153.png'),
(248,3,7,'20170218163231.png'),
(249,0,26,'20170218164025.png'),
(250,1,26,'20170218164033.png'),
(251,2,26,'20170218164043.png'),
(252,3,26,'20170218164052.png'),
(253,0,27,'20170221_154449.jpg'),
(254,1,27,'20170221_154524.jpg'),
(255,2,27,'20170221_154546.jpg'),
(256,3,27,'20170221_154601.jpg'),
(257,0,28,'20170221_190938.jpg'),
(258,1,28,'20170221_190945.jpg'),
(259,2,28,'20170221_191001.jpg'),
(260,3,28,'20170221_191011.jpg'),
(261,0,29,'20170221120640.png'),
(262,1,29,'20170221120647.png'),
(263,2,29,'20170221120714.png'),
(264,3,29,'20170221120723.png'),
(265,0,30,'app-checklist-manager.png'),
(266,1,30,'phpcode-287392.jpeg'),
(267,2,30,'screenshot-2.jpg'),
(268,3,30,'screenshot-1.jpg'),
(269,0,31,'app-checklist-manager.png'),
(270,1,31,'app-checklist-manager.png'),
(271,2,31,'screenshot-1.jpg'),
(272,3,31,'screenshot-3.png'),
(273,0,32,'screenshot-2.jpg'),
(274,1,32,'screenshot-3.png'),
(275,2,32,'screenshot-1.jpg'),
(276,3,32,'app-checklist-manager.png'),
(277,0,33,'screenshot-3.png'),
(278,1,33,'phpcode-287392.jpeg'),
(279,2,33,'screenshot-1.jpg'),
(280,3,33,'app-checklist-manager.png'),
(281,0,34,'phpcode-287392.jpeg'),
(282,1,34,'app-checklist-manager.png'),
(283,2,34,'screenshot-2.jpg'),
(284,3,34,'screenshot-3.png'),
(285,0,35,'Home Page - Headings Safety Sub Heading Project Registers.png'),
(286,1,35,'phpcode-287392.jpeg'),
(287,2,35,'phpcode-287392.jpeg'),
(288,3,35,'screenshot-2.jpg'),
(289,0,36,'phpcode-287392.jpeg'),
(290,1,36,'app-checklist-manager.png'),
(291,2,36,'screenshot-2.jpg'),
(292,3,36,'screenshot-3.png'),
(293,0,37,'phpcode-287392.jpeg'),
(294,1,37,'app-checklist-manager.png'),
(295,2,37,'screenshot-2.jpg'),
(296,3,37,'screenshot-1.jpg'),
(297,0,38,'screenshot-2.jpg'),
(298,1,38,'phpcode-287392.jpeg'),
(299,2,38,'screenshot-3.png'),
(300,3,38,'app-checklist-manager.png'),
(301,0,39,'20170223092333.png'),
(302,1,39,'20170223092345.png'),
(303,2,39,'20170223092355.png'),
(304,3,39,'20170223092403.png'),
(305,0,40,'20170223092529.png'),
(306,1,40,'20170223092537.png'),
(307,2,40,'20170223092549.png'),
(308,3,40,'20170223092557.png'),
(309,0,41,'20170227_124948.jpg'),
(310,1,41,'20170227_124955.jpg'),
(311,2,41,'20170227_125002.jpg'),
(312,3,41,'20170227_125009.jpg'),
(313,0,42,'phpcode-287392.jpeg'),
(314,1,42,'screenshot-1.jpg'),
(315,2,42,'app-checklist-manager.png'),
(316,3,42,'20170223092557.png'),
(317,0,43,'20170227072330.png'),
(318,1,43,'20170227072338.png'),
(319,2,43,'20170227072347.png'),
(320,3,43,'20170227072354.png'),
(321,0,44,'phpcode-287392.jpeg'),
(322,1,44,'International-climbing_&_9a7c8360-e2c0-49d6-8b19-71347b43c081.jpg'),
(323,2,44,'20170223092557.png'),
(324,3,44,'app-checklist-manager.png'),
(325,0,45,'20170227080535.jpg'),
(326,1,45,'20170227080544.jpg'),
(327,2,45,'20170227080558.jpg'),
(328,3,45,'20170227080613.jpg'),
(329,0,46,'20170227082221.jpg'),
(330,1,46,'20170227082231.jpg'),
(331,2,46,'20170227082246.jpg'),
(332,3,46,'20170227082305.jpg'),
(333,0,47,'20170227160931.jpg'),
(334,1,47,'20170227160937.jpg'),
(335,2,47,'20170227160943.jpg'),
(336,3,47,'20170227160950.jpg'),
(337,0,48,'20170227161230.jpg'),
(338,1,48,'20170227161237.jpg'),
(339,2,48,'20170227161243.jpg'),
(340,3,48,'20170227161251.jpg'),
(341,0,49,'20170228112344.jpg'),
(342,1,49,'20170228112403.jpg'),
(343,2,49,'20170228112413.jpg'),
(344,3,49,'20170228112422.jpg'),
(345,0,50,'20170228171632.jpg'),
(346,1,50,'20170228171644.jpg'),
(347,2,50,'20170228171656.jpg'),
(348,3,50,'20170228171721.jpg'),
(349,0,51,'20170228153332.jpg'),
(350,1,51,'20170228153344.jpg'),
(351,2,51,'20170228153416.jpg'),
(352,3,51,'20170228153423.jpg'),
(353,0,52,'20170228153912.jpg'),
(354,1,52,'20170228153922.jpg'),
(355,2,52,'20170228153934.jpg'),
(356,3,52,'20170228153941.jpg'),
(357,0,53,'20170228154602.jpg'),
(358,1,53,'20170228154612.jpg'),
(359,2,53,'20170228154621.jpg'),
(360,3,53,'20170228154628.jpg'),
(361,0,54,'20170301161921.jpg'),
(362,1,54,'20170301161953.jpg'),
(363,2,54,'20170301162002.jpg'),
(364,3,54,'20170301162015.jpg'),
(365,0,55,'20170301185621.jpg'),
(366,1,55,'20170301185627.jpg'),
(367,2,55,'20170301185634.jpg'),
(368,3,55,'20170301185641.jpg'),
(369,0,56,'cont.png'),
(370,1,56,'favicon.png'),
(371,2,56,'deny.png'),
(372,3,56,'spinner.gif'),
(373,0,57,'cont.png'),
(374,1,57,'favicon.png'),
(375,2,57,'spinner.gif'),
(376,3,57,'edit.png'),
(377,0,58,'deny.png'),
(378,1,58,'edit.png'),
(379,2,58,'cont.png'),
(380,3,58,'favicon.png'),
(381,0,59,'app-checklist-manager.png'),
(382,1,59,'20170306181544.jpg'),
(383,2,59,'20170306181550.jpg'),
(384,3,59,'20170306181555.jpg'),
(385,0,60,'20170307105539.jpg'),
(386,1,60,'20170307105544.jpg'),
(387,2,60,'20170307105551.jpg'),
(388,3,60,'20170307105557.jpg'),
(389,0,61,'20170307_104849.jpg'),
(390,1,61,'20170307_104902.jpg'),
(391,2,61,'20170307_104914.jpg'),
(392,3,61,'20170307_104925.jpg'),
(393,0,62,'20170308073942.jpg'),
(394,1,62,'20170308073954.jpg'),
(395,2,62,'20170308074003.jpg'),
(396,3,62,'20170308074008.jpg'),
(397,0,63,'20170311182219.jpg'),
(398,1,63,'20170311182229.jpg'),
(399,2,63,'20170311182242.jpg'),
(400,3,63,'20170311182249.jpg'),
(401,0,8,'app-checklist-manager.png'),
(402,1,8,'phpcode-287392.jpeg'),
(403,2,8,'Home Page - Headings Safety Sub Heading Project Registers.png'),
(404,3,8,'phpcode-287392.jpeg'),
(405,0,9,'phpcode-287392.jpeg'),
(406,1,9,'app-checklist-manager.png'),
(407,2,9,'app-checklist-manager.png'),
(408,3,9,'phpcode-287392.jpeg'),
(409,0,64,'20170321155140.jpg'),
(410,1,64,'20170321155150.jpg'),
(411,2,64,'20170321155157.jpg'),
(412,3,64,'20170321155205.jpg'),
(413,0,65,'20170321181317.jpg'),
(414,1,65,'20170321181324.jpg'),
(415,2,65,'20170321181332.jpg'),
(416,3,65,'20170321181339.jpg'),
(417,0,10,'app-checklist-manager.png'),
(418,1,10,'app-checklist-manager.png'),
(419,2,10,'phpcode-287392.jpeg'),
(420,3,10,'app-checklist-manager.png'),
(421,0,66,'20170331085120.jpg'),
(422,1,66,'20170331085127.jpg'),
(423,2,66,'20170331085135.jpg'),
(424,3,66,'20170331085141.jpg'),
(425,0,67,'can-any-strategy-be-coded-into-mt4-robot-704x450.jpg'),
(426,1,67,'can-any-strategy-be-coded-into-mt4-robot-704x450.jpg'),
(427,2,67,'phpcode-287392.jpeg'),
(428,3,67,'phpcode-287392.jpeg'),
(429,0,68,'php.png'),
(430,1,68,'app-checklist-manager.png'),
(431,2,68,'phpcode-287392.jpeg'),
(432,3,68,'4703273699_39b399711c_o_comp.jpg'),
(433,0,69,'php.png'),
(434,1,69,'phpcode-287392.jpeg'),
(435,2,69,'app-checklist-manager.png'),
(436,3,69,'4703273699_39b399711c_o_comp.jpg'),
(437,5,69,'rfwDB3L.png'),
(438,0,11,'20170405090607.jpg'),
(439,1,11,'20170405090613.jpg'),
(440,2,11,'20170405090627.jpg'),
(441,3,11,'20170405090637.jpg'),
(442,0,70,'app3.gif'),
(443,1,70,'app2.gif'),
(444,2,70,'web.png'),
(445,3,70,'t.gif'),
(446,0,71,'20170421164755.jpg'),
(447,1,71,'20170421164812.jpg'),
(448,2,71,'20170421164852.jpg'),
(449,3,71,'20170421164901.jpg'),
(450,4,71,'20170421164837.jpg'),
(451,5,71,'20170421164922.jpg'),
(452,6,71,'20170421164930.jpg'),
(453,7,71,'20170421164909.jpg'),
(454,8,71,'20170421164941.jpg'),
(455,9,71,'20170421164947.jpg'),
(456,10,71,'20170421164953.jpg'),
(457,11,71,'20170421165000.jpg'),
(458,12,71,'20170421165011.jpg'),
(459,13,71,'20170421165017.jpg'),
(460,0,72,'20170428003217.jpg'),
(461,1,72,'20170428003227.jpg'),
(462,2,72,'20170428003233.jpg'),
(463,3,72,'20170428003242.jpg'),
(468,0,73,'wallhaven-204176.png'),
(469,1,73,'wallhaven-204176.png'),
(470,2,73,'wallhaven-204176.png'),
(471,3,73,'wallhaven-204176.png'),
(472,0,74,'20170511163551.jpg'),
(473,1,74,'20170511163559.jpg'),
(474,2,74,'20170511163604.jpg'),
(475,3,74,'20170511163609.jpg'),
(476,0,75,'arrow05-u83425.png'),
(477,1,75,'arrow05-u83425.png'),
(478,2,75,'arrow05-u83425.png'),
(479,3,75,'arrow05-u83425.png'),
(480,0,12,'20170516074053.jpg'),
(481,1,12,'20170516074110.jpg'),
(482,2,12,'20170516074135.jpg'),
(483,3,12,'20170516074148.jpg'),
(484,0,76,'20170516090205.jpg'),
(485,1,76,'20170516090226.jpg'),
(486,2,76,'20170516090232.jpg'),
(487,3,76,'20170516090238.jpg'),
(488,0,77,'20170516112454.jpg'),
(489,1,77,'20170516112500.jpg'),
(490,2,77,'20170516112507.jpg'),
(491,3,77,'20170516112513.jpg'),
(492,0,78,'20170526161216.jpg'),
(493,1,78,'20170526161224.jpg'),
(494,2,78,'20170526161236.jpg'),
(495,3,78,'20170526161250.jpg'),
(496,0,79,'20170526190205.jpg'),
(497,1,79,'20170526190211.jpg'),
(498,2,79,'20170526190219.jpg'),
(499,3,79,'20170526190223.jpg'),
(500,0,13,'20170527113530.jpg'),
(501,1,13,'20170527113543.jpg'),
(502,2,13,'20170527113603.jpg'),
(503,3,13,'20170527113615.jpg'),
(504,0,14,'20170601144042.jpg'),
(505,1,14,'20170601144049.jpg'),
(506,2,14,'20170601144054.jpg'),
(507,3,14,'20170601144100.jpg'),
(508,0,80,'20170601192404.jpg'),
(509,1,80,'20170601192411.jpg'),
(510,2,80,'20170601192417.jpg'),
(511,3,80,'20170601192422.jpg');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `google_id` int(50) DEFAULT NULL,
  `fb_id` int(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `role` varchar(400) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_activated` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

/*Table structure for table `tbl_visitor_induction` */

DROP TABLE IF EXISTS `tbl_visitor_induction`;

CREATE TABLE `tbl_visitor_induction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `induction_no` varchar(400) NOT NULL,
  `project_id` int(11) NOT NULL,
  `position` varchar(400) DEFAULT NULL,
  `today_date` date DEFAULT NULL,
  `visitor_business` varchar(400) NOT NULL,
  `cont_business` varchar(400) NOT NULL,
  `visitor_name` varchar(400) NOT NULL,
  `visitor_mobile` varchar(400) NOT NULL,
  `visit_reason` varchar(400) NOT NULL,
  `visit_in` varchar(400) NOT NULL,
  `visit_out` varchar(400) DEFAULT NULL,
  `isuploaded` int(11) DEFAULT '1',
  `isdeleted` int(11) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_visitor_induction` */

insert into `tbl_visitor_induction` values 
(69,'1',1,'Joint cutting and sealing','2017-03-29','dfhdfh','1','etwet,235235#sdgsdg,325235#,#,','','xfhfh','12:07','13:47',1,1,'2017-03-29 12:08:06','2017-03-30 08:17:07'),
(70,'59',1,'','2017-03-30','nk','1','kk,111111111111#,#,#,','','ff','11:34','13:58',1,1,'2017-03-30 06:05:02','2017-03-30 08:28:55'),
(71,'59',1,'','2017-03-30','nk','1','kk,555555555555#,#,#,','','rrrr','17:22','17:23',1,1,'2017-03-30 11:53:14','2017-03-30 11:53:59'),
(72,'59',1,'','2017-03-30','nk','1','kk,555555555555#,#,#,','','rrr','17:44','17:47',1,1,'2017-03-30 12:14:57','2017-03-30 12:17:55'),
(73,'59',1,'','2017-03-30','kkkk','1','hhhhh,777777777777#,#,#,','','rrrrrr','17:48','17:49',1,1,'2017-03-30 12:18:54','2017-03-30 12:20:42'),
(74,'59',1,'','2017-03-30','kk','1','nnn,666666666666#,#,#,','','rrrrrmmm','18:16','18:17',1,1,'2017-03-30 12:47:17','2017-03-30 12:47:34'),
(77,'59',1,'','2017-04-03','hh','1','hhhhhhh,666666666555#,#,#,','','hhhh','18:32','18:33',1,1,'2017-04-03 13:03:09','2017-04-03 13:03:37'),
(78,'1',1,'','2017-04-03','jojo varghese','1','Jojo,9497892126#,#,#,','','site induction review','20:03','20:05',1,1,'2017-04-03 14:35:03','2017-04-03 14:35:50'),
(79,'1',1,'Joint cutting and sealing','2017-04-04','shashank','1','test,1#test,2#,#,','','ok','06:41','06:42',1,1,'2017-04-04 06:41:36','2017-04-04 06:41:36'),
(80,'1',1,'','2017-04-04','llllll','1','lllllll,9999999999#,#,#,','','llll','21:36','21:38',1,1,'2017-04-04 11:36:47','2017-04-04 11:38:49'),
(81,'1',1,'','2017-04-05','CIP','1','Glen Herd,8888888888#,#,#,','','Site Visit','08:45','08:46',1,1,'2017-04-04 22:46:17','2017-04-04 22:46:50'),
(82,'1',1,'','2017-04-05','jjjjjjj','1','ggggggg,5555555555#,#,#,','','jjjjjjjj','13:12','13:14',1,1,'2017-04-05 03:13:48','2017-04-05 03:14:38'),
(83,'1',1,'','2017-04-05','wwwwwwww','1','wwwwwwww,6666666666#,#,#,','','wwwwww','13:26','13:27',1,1,'2017-04-05 03:27:04','2017-04-05 03:27:31'),
(84,'1',1,'','2017-04-05','ffffff','1','hhhhh,5555555555#,#,#,','','jjjjj','14:09','06:43',1,1,'2017-04-05 04:13:09','2017-04-08 20:43:41'),
(85,'1',1,'','2017-04-05','jjjjj','1','jjjjjj,77777777777#,#,#,','','hhhhhhh','18:30','18:35',1,1,'2017-04-05 08:30:15','2017-04-05 08:35:53'),
(86,'1',1,'','2017-04-05','CIP','1','A Koppen,7777777777#,#,#,','','hello','18:33','18:35',1,1,'2017-04-05 08:35:03','2017-04-05 08:35:31'),
(87,'1',1,'','2017-04-09','ssssss','1','dddddd,7777777777#,#,#,','','sssssssssss','06:37','06:42',1,1,'2017-04-08 20:38:46','2017-04-08 20:42:58'),
(88,'1',1,'','2017-04-09','ppppp','1','pppppp3,333333333333#,#,#,','','wwwwwwwww','07:04','13:54',1,1,'2017-04-08 21:05:29','2017-04-10 03:54:50'),
(89,'1',1,'','2017-04-10','CIP','1','danTubman,5555555555#,#,#,','','CA Works','13:52','13:54',1,1,'2017-04-10 03:53:26','2017-04-10 03:54:15'),
(90,'1',1,'','2017-04-11','fffff','1','dddddd,3333333333#,#,#,','','dddddddddd','16:02','16:03',1,1,'2017-04-11 06:02:35','2017-04-11 06:03:58'),
(91,'1',1,'','2017-04-11','Jojo varghese','1','Ashley,9497892126#john,9995012513#,#,','','induction','12:14','02:34',1,1,'2017-04-11 06:45:58','2017-04-11 06:45:58'),
(92,'1',1,'','2017-04-11','Jojo','1','Pieter,9753456734#Sam,0998787767#,#,','','induction','17:42','17:44',1,1,'2017-04-11 12:13:52','2017-04-11 12:14:47'),
(93,'1',1,'','2017-04-12','hhhhh','1','hhhhhh,33333333444#,#,#,','','jjjjj','12:41','12:42',1,1,'2017-04-12 02:41:50','2017-04-12 02:42:13'),
(94,'1',1,'','2017-04-12','ggggg','1','eeeeee,6666666666#,#,#,','','ssssss','14:19','14:21',1,1,'2017-04-12 04:20:43','2017-04-12 04:21:36'),
(97,'1',1,'','2017-04-14','john','1','Arun,9865325797#Ruth,6435687531#,#,','','induction','18:28','08:43',1,1,'2017-04-14 12:59:22','2017-04-26 03:14:22'),
(99,'1',1,'','2017-04-26','dexion','1','john,9811655145#,#,#,','','Aiwen hi','08:40','08:43',1,1,'2017-04-26 03:12:10','2017-04-26 03:13:12'),
(100,'59',1,'','2017-05-05','khihih','1','jh sciences,656556565656#,#,#,','','jgugygygyghffgfgf','14:01','',1,1,'2017-05-05 08:33:08','2017-05-05 08:34:55'),
(101,'59',1,'','2017-05-05','khihih','2','hghghgugug,424343535334#,#,#,','','hghghgugug','14:35','15:05',1,1,'2017-05-05 09:06:23','2017-05-31 09:36:04'),
(102,'1',2,'','2017-05-10','dddd','3','gggg,5555555555#,#,#,','','Inspected footi..........','16:16','16:18',1,1,'2017-05-10 06:17:41','2017-05-10 06:18:27'),
(103,'59',1,'','2017-05-11','','2','hhh,666666666666#,#,#,','','he','14:21','16:30',1,1,'2017-05-11 08:52:46','2017-05-11 11:00:44'),
(104,'1',1,'','2017-05-11','dfdgbfbdvf gfg','(null)','fifty fgh,89987778890#,#,#,','','hfhhtcthchgcyt','15:02','18:54',1,1,'2017-05-11 09:34:20','2017-05-29 13:24:32'),
(105,'1',2,'','2017-05-11','Ruth','(null)','ffffff,9876543210#,#,#,','','ghjj','15:05','',1,1,'2017-05-11 09:36:11','2017-05-11 09:36:12'),
(106,'1',2,'','2017-05-11','test','(null)','hhh,444444444444#,#,#,','','yuguguh','15:07','',1,1,'2017-05-11 09:38:33','2017-05-11 09:38:33'),
(107,'1',2,'','2017-05-11','eqwerqwe','(null)','were,123123132412#,#,#,','','23412341234','15:17','',1,1,'2017-05-11 09:47:18','2017-05-11 09:45:40'),
(108,'69',1,'','2017-05-11','','1','Chgchgchgchgchg,9876543210#,#,#,','','cthtydthchtcutctuxtyx','16:01','16:26',1,1,'2017-05-11 10:32:03','2017-05-11 10:58:04'),
(109,'74',2,'','2017-05-11','','3','test,666666665555#,#,#,','','test','16:46','16:50',1,1,'2017-05-11 11:17:11','2017-05-11 11:18:38'),
(110,'1',2,'','2017-05-16','','5','hhhhhh,5555555888#,#,#,','','Rep Inspection Northern Retaining Wall','08:57','',1,1,'2017-05-15 22:59:46','2017-05-15 22:59:47'),
(111,'59',1,'','2017-05-29','','1','kkk,111111111111#,#,#,','','re test','12:51','12:55',1,1,'2017-05-29 07:22:31','2017-05-29 07:26:10'),
(112,'1',2,'','2017-06-01','','5','Grant Roe,5555555555#,#,#,','','Inspect Reo Retaining Wall 1','14:35','14:37',1,1,'2017-06-01 04:37:15','2017-06-01 04:37:36'),
(113,'1',2,'','2017-06-01','dddddd','','sssss,66666666677#,#,#,','','sssss','15:17','15:18',1,1,'2017-06-01 05:17:49','2017-06-01 05:18:09');
