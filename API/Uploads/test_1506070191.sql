/*
SQLyog - Free MySQL GUI v5.02
Host - 5.5.5-10.1.21-MariaDB : Database - test
*********************************************************************
Server version : 5.5.5-10.1.21-MariaDB
*/


/*Table structure for table `itp_assign` */

CREATE TABLE `itp_assign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itp_main` int(11) DEFAULT NULL,
  `assign_uuid` varchar(500) DEFAULT NULL,
  `assign_to` int(11) DEFAULT NULL,
  `form_checklist` int(1) DEFAULT NULL COMMENT '1 for Form , 2 for checklist , 0 for both',
  `assign_by` int(11) DEFAULT NULL,
  `comments` text,
  `due_date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `isdeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `itp_assign` */

insert into `itp_assign` values (1,1,'',59,0,0,'','0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',0);

/*Table structure for table `login` */

CREATE TABLE `login` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert into `login` values (1,'admin','123');

/*Table structure for table `parent_menu` */

CREATE TABLE `parent_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `href` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `parent_menu` */

insert into `parent_menu` values (1,'Site Safety Management Plans','');

/*Table structure for table `sub_menu` */

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `href` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `sub_menu` */

insert into `sub_menu` values (1,1,'Site Safety Management Plan','');
insert into `sub_menu` values (2,1,'Preliminary Risk Assessment','');
insert into `sub_menu` values (3,1,'Emergency Risk Assessment','');
insert into `sub_menu` values (4,1,'Traffic Management Risk Assessment','');
insert into `sub_menu` values (5,1,'Project Establishment Checklist','');
insert into `sub_menu` values (6,1,'Project First Aid Risk Assessment','');

/*Table structure for table `sub_sub_menu` */

CREATE TABLE `sub_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `href` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `sub_sub_menu` */

insert into `sub_sub_menu` values (1,1,'Blank Safety Management Plan','');
insert into `sub_sub_menu` values (2,1,'Approved Safety Management Plan','');
insert into `sub_sub_menu` values (3,1,'Safety Management Plan Register','');

/*Table structure for table `tbl_access` */

CREATE TABLE `tbl_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_activated` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_access` */

insert into `tbl_access` values (3,'Swipe Card_test_NEW ui','0000-00-00 00:00:00','2017-08-01 07:28:14',0,1);
insert into `tbl_access` values (6,'Helmet Sticker & Swipe Card','2017-02-02 13:36:15','2017-02-02 08:06:15',0,1);
insert into `tbl_access` values (8,'Hello','2017-05-10 19:27:39',NULL,1,1);
insert into `tbl_access` values (18,'testoing','2017-05-11 15:03:33','2017-05-11 09:33:33',1,1);
insert into `tbl_access` values (19,'sdgsadgsdg','2017-05-11 15:05:06','2017-05-11 09:35:06',1,1);
insert into `tbl_access` values (20,'Testing Authority3','2017-06-08 15:43:51','2017-06-08 10:13:56',1,1);
insert into `tbl_access` values (21,'Testing Authority','2017-06-08 17:50:55','2017-06-08 12:20:55',1,1);
insert into `tbl_access` values (22,'Testing Authority','2017-06-08 17:51:13','2017-06-08 12:21:13',1,1);
insert into `tbl_access` values (23,'tEST NEW UI','2017-08-01 12:31:57','2017-08-01 07:01:57',0,1);

/*Table structure for table `tbl_capture` */

CREATE TABLE `tbl_capture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `employer_id` int(11) DEFAULT NULL,
  `induction_id` int(11) DEFAULT NULL,
  `capture_date` date DEFAULT NULL,
  `text_data` varchar(400) DEFAULT NULL,
  `image_name` varchar(400) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `isdeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_capture` */

insert into `tbl_capture` values (1,1,2,61,'2020-03-17','ok','web_1492165900.png','0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_capture` values (2,1,2,61,'2017-04-18','ok','can-any-strategy-be-coded-into-mt4-robot-704x450.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_capture` values (3,1,2,61,'2020-03-17','ok','can-any-strategy-be-coded-into-mt4-robot-704x450.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_capture` values (4,1,2,61,'2020-03-17','ok','can-any-strategy-be-coded-into-mt4-robot-704x450.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_capture` values (5,1,2,61,'2020-03-17','ok','can-any-strategy-be-coded-into-mt4-robot-704x450.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_capture` values (6,1,2,61,'2020-03-17','ok','web_1492165900.png','0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_capture` values (7,1,2,61,'2017-04-18','fine','web_1492165900.png','0000-00-00 00:00:00','0000-00-00 00:00:00',0);

/*Table structure for table `tbl_consultant` */

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_consultant` */

insert into `tbl_consultant` values (1,'Sam','fgj',1,'jkl;jk;','fgj','fgj','fgj','','2017-07-31 18:29:12','2017-07-31 12:59:12',0,1);
insert into `tbl_consultant` values (2,'sdfsdg','sdgsdg',1,'sdgsdg','sdgsdg','sam@gmail.com','24','asfaw','2017-04-27 14:23:27','2017-06-06 12:09:36',1,1);
insert into `tbl_consultant` values (5,'Okk','Fonn',1,'Surveyors','qeqe','zs@d','adad','adad','2017-04-27 14:33:06','2017-06-08 09:55:16',1,1);
insert into `tbl_consultant` values (6,'Helo Testing','Consultant',3,'Fine','12345678','abc@g.com','USA','123','2017-06-01 14:58:13','2017-06-01 09:28:13',1,1);
insert into `tbl_consultant` values (7,'Testing','2424',3,'svfsf','424','sxf@as.com','USA','123','2017-06-01 15:14:30','2017-06-01 09:44:36',1,1);
insert into `tbl_consultant` values (8,'Tesing','ddd',3,'dgdg','2424','xfh@asdfsf.com','USA','11111','2017-06-01 15:14:58','2017-06-01 09:44:58',0,1);
insert into `tbl_consultant` values (9,'Helo Testing','adad',1,'sdsf','1313','abc@g.com','adad','1313','2017-06-08 15:25:36','2017-06-08 09:55:36',0,1);
insert into `tbl_consultant` values (10,'twet','wetwet',1,'wetwet','wetwet','we@gmail.com','wetwet','','2017-07-14 18:51:30','2017-07-14 13:21:30',0,1);
insert into `tbl_consultant` values (11,'ghkghk','asgasg',1,'asgasg','asgasg','sam@gmail.com1','asfgasg','','2017-07-14 19:26:40','2017-07-31 13:02:53',1,1);
insert into `tbl_consultant` values (12,'sdgsdg','q325235',1,'sdgsdg','235235','sam@gmail.com123','asfasf','1111','2017-08-01 18:12:51','2017-08-01 12:42:51',0,1);

/*Table structure for table `tbl_employee` */

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
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_employee` */

insert into `tbl_employee` values (1,'Pieter','Koppen','0447749202','1','Joint cutting and sealing','pkoppen@cipproperty.com','','','',0,'2017-04-13','gsdg','0251111','1111',1,'',' ',NULL,0,'2017-02-02 13:36:15','2017-02-02 08:06:15',0,1);
insert into `tbl_employee` values (2,'Antonio','Feliciano','+61499600363','1','Joint cutting and sealing','Antonio.felancio@yahoo.com','Hii','11111','212',0,'2017-05-11','Hello','1984770','4770',1,'','  HEllo',NULL,0,'2017-02-02 13:36:15','2017-02-02 08:06:15',0,1);
insert into `tbl_employee` values (3,'hi','there','111111','aa','Joint cutting and sealing','aa',NULL,NULL,NULL,0,NULL,NULL,'1111','1111',1,NULL,NULL,NULL,0,'2017-02-02 13:36:15','2017-02-02 08:06:15',0,1);
insert into `tbl_employee` values (4,'szfasf','asfasf','124124','Project Manager','Joint cutting and sealing','sa@h.com','SDGSDG','325235','ASFSDF',1,'2017-02-14','ASFASF','24235','1234',1,'2017-02-18','dfdfh124214235','NULL',0,'2017-02-17 18:46:02',NULL,0,1);
insert into `tbl_employee` values (5,'gfjfgj','returtu','346346','Project Manager','Joint cutting and sealing','sa@h.com','gdfgh','46346','xfhfdh',0,'2017-02-07','sdgsdg','43636436','1234',1,'2017-02-02','ryeryq2424','NULL',0,'2017-02-17 18:53:06',NULL,0,1);
insert into `tbl_employee` values (6,'Sam','2345235','35235','Project Manager','Joint cutting and sealing','sa@h.com','sdgsdg','325235','sdgsdg',1,'2017-02-08','sdgsdg','235235','1234',1,'2017-02-02','sdgsdg1313','NULL',0,'2017-02-17 19:01:16',NULL,0,1);
insert into `tbl_employee` values (7,'Pieter','Koppen','0447749202','Project Manager','Joint cutting and sealing','pkoppen@ciproperty.c','Amanda Koppen','0429777399','Wife',0,'190105','Quantum Training','0253784','3784',1,'17-05-1972','8 Midshipman Court Paradise Waters 4217','',0,'2017-02-18 11:03:01','2017-02-18 05:33:04',0,1);
insert into `tbl_employee` values (8,'Hello Shashank','Hiii','1241235','Site Manager','Joint cutting and sealing','sa@h.com','arftr','124124','aasfaf',0,'2017-03-07','asfg','131243124','3124',1,'2017-03-10','asfasf24124','Okkkk',1,'2017-03-17 13:37:33','2017-03-17 08:07:33',0,1);
insert into `tbl_employee` values (9,'fgjfgj','fjfgkj','235235','Site Manager','Joint cutting and sealing','sa@h.com','dgry','346346','stwet',0,'2017-02-28','ryery','124312423','2423',1,'2017-03-10','eryery25235','hjhgj',1,'2017-03-17 13:52:27','2017-03-17 08:22:27',0,1);
insert into `tbl_employee` values (10,'hi','345','123456789','Site Manager','Joint cutting and sealing','sam@gmail.com','sam','123','wref',0,'2017-03-01','sdfsdg','11111111111111111111','1111',1,'2017-03-08','  asf123','',0,'2017-03-22 11:50:31','2017-03-22 06:20:31',0,1);
insert into `tbl_employee` values (21,'nis','gg','455','Site Foreman','Dock Levellers','ixidi@s.s','jxjxj','5566','!kkxj',0,'17-02-1997','jcjxj','111111','1111',2,'17-02-2017','jdj1','',0,'2017-02-18 00:39:32','2017-02-17 13:42:38',0,1);
insert into `tbl_employee` values (22,'arti','Mishra','13456','Project Manager','Dock Levellers','a@gmail.com','qdkf','1234567','ckvkbb',0,'17-01-2017','hn','1111111','1111',2,'17-01-2017','Abc1','Abc',1,'2017-02-17 12:06:02','2017-02-17 14:03:10',0,1);
insert into `tbl_employee` values (23,'tapasya','parashar','12346868','Site Foreman','Piling','a@gmail.com','ducjc','5356568','sysgsu',0,'06-02-1997','hzxhx','1111111','1111',3,'09-02-2017','a1','',0,'2017-02-18 01:20:15','2017-02-17 14:20:19',0,1);
insert into `tbl_employee` values (24,'saurabh','Solanki','987654324678','Site Foreman','Dock Levellers','bdbchc@bcnfn.com','bdjhjhdih','886386836753753','hdfkhgwdkjbf',0,'01-01-2010','ggggggggg','123456789','6789',2,'17-02-1997','123 India','Cgvggghghgjbjbjbhvhbjb',1,'2017-02-17 12:53:45','2017-02-17 14:53:20',0,1);
insert into `tbl_employee` values (25,'nit','bb','1455','Site Foreman','Piling','uuj@e.jbj','ji','555','mmk',0,'31-12-2017','kkkk','22222','2222',3,'17-02-2017','yy1','',0,'2017-02-18 02:04:11','2017-02-17 15:04:24',0,1);
insert into `tbl_employee` values (26,'up','pp','9999999','Project Manager','Piling','oo@ffff.com','pp','999999','kkkkkoooo',0,'lllllllll','uuuuuu','777777','7777',3,'12-12-1212','9 ooo','Ooooo',1,'2017-02-18 11:12:00','2017-02-18 05:42:03',0,1);
insert into `tbl_employee` values (27,'nitin','singhal','123456789','Site Foreman','Piling','n@gmail.com','nitin','132676706','abcde',0,'12-02-1997','ghf','12345678','5678',3,'15-02-2017','xyz1','',0,'2017-02-21 21:16:55','2017-02-21 10:17:03',0,1);
insert into `tbl_employee` values (28,'nit','va','65','Worker','Dock Levellers','s@d.c','hd','56','ys',0,'21-02-1997','hd','1111','1111',2,'21-02-2017','ad1','',0,'2017-02-22 00:41:29','2017-02-21 13:41:34',0,1);
insert into `tbl_employee` values (29,'Sakshi','goyal','1234567889','Project Manager','Piling','a@gmail.com','xyz','123456778','afghan',0,'18-11-1997','gfg','12345678','5678',3,'14-08-2002','Xyz1','Ggggg',1,'2017-02-21 12:07:37','2017-02-21 14:04:34',0,1);
insert into `tbl_employee` values (30,'Shashank','sdgsdg','657568568','Site Foreman','Dock Levellers','sa@h.com','sdgsdgsd','34634643','dfgdfhdfh',0,'2017-02-08','dfhdfh','123456','3456',2,'2017-02-02','sdagsdg4wt646','NULL',0,'2017-02-21 19:53:51','2017-02-21 14:33:09',0,1);
insert into `tbl_employee` values (31,'Test','tetsing','23456346','Project Manager','Piling','a@h.com','dfhfdh','35235','asfasf',0,'2017-02-15','sdafsdgf','123456','3456',3,'2017-02-22','dgsdg','NULL',0,'2017-02-21 20:05:16',NULL,0,1);
insert into `tbl_employee` values (32,'Shashank','Raghav','1322435345465','Project Manager','Dock Levellers','sa@h.com','sdafsdf','324325','sdsdg',0,'2017-02-08','dgsdg','123456','3456',2,'2017-02-08','USA123','NULL',0,'2017-02-22 11:27:51','2017-02-22 05:57:51',0,1);
insert into `tbl_employee` values (33,'Shashank123','asfasf13','124124214','Project Manager','Dock Levellers','a@h.com','asfasf','21424124','sdgfsdgsdg',0,'2017-02-07','sdagsdgdsg','123456','3456',2,'2017-02-03','sfasf12341','',0,'2017-02-22 05:30:00','2017-02-22 00:00:00',0,1);
insert into `tbl_employee` values (34,'Test123','asfasf','24124','Project Manager','Dock Levellers','z@h.com','sdgsdg','325235325','sdfsdgsdg',0,'2017-02-08','sdgsdg','123456','3456',2,'2017-02-09','asf214124','',0,'2017-02-22 05:30:00','2017-02-22 06:52:07',0,1);
insert into `tbl_employee` values (35,'Testing','123','124124124','Site Manager','Dock Levellers','a@h.com','asfsdfsdg','23235325','dsgsdgsdg',0,'2017-02-08','sdsdgs','123456','3456',2,'2017-02-14','sfa2414','',0,'2017-02-22 12:42:07','2017-02-22 07:12:07',0,1);
insert into `tbl_employee` values (36,'test test','1111','325325','Site Manager','Dock Levellers','a@h.com','aafaf','124124124','asfafasf',0,'2017-02-08','qwfrqwr','123456','3456',2,'2017-02-17','asdf12','',0,'2017-02-22 13:01:02','2017-03-02 07:00:56',0,1);
insert into `tbl_employee` values (37,'test345','asasf','1241234','Worker','Dock Levellers','sa@h.com','wefsdf','23523532','xcbxcb',0,'2017-02-15','sdgd','123456','3456',2,'2017-02-15','asf1254235','',0,'2017-02-22 05:30:00','2017-02-22 07:50:23',0,1);
insert into `tbl_employee` values (38,'Shashank testing','asfasf','124124','Site Manager','Dock Levellers','a@h.com','sdgsdg','235235','sdsdgsdg',0,'2017-02-08','sdgfsdg','123456','3456',2,'2017-02-11','asdas123','',0,'2017-02-22 13:33:02','2017-02-22 08:03:02',0,1);
insert into `tbl_employee` values (39,'dd','ddd','11111','Project Manager','Piling','111@hhh.com','1111','1111','11111',0,'1111111111','sssss','ssssss','ssss',3,'11-11-11','8 dddd','',0,'2017-02-23 03:54:17','2017-03-02 07:02:29',0,1);
insert into `tbl_employee` values (40,'eeeeeee','eeeeeee','333333333','Project Manager','Dock Levellers','eeeee@dddd.com','wwwwww','33333333','wwwwwwwww',0,'3333333333','ddddddddd','eeeeeeee','eeee',2,'33-33-3333','6 ddddddd','',0,'2017-02-23 03:56:17','2017-02-22 22:26:19',0,1);
insert into `tbl_employee` values (41,'arti','mishra','123465679','Worker','Piling','arti@gmail.com','arti','23468918','frnd',0,'18-02-1997','abc','1235555','5555',3,'14-02-2017','bly1','',0,'2017-02-27 18:20:27','2017-02-27 07:20:33',0,1);
insert into `tbl_employee` values (42,'sdsdg','westgwe','36346','Site Manager','Joint cutting and sealing','sa@h.com','ewtgwet','235235','asfsdg',0,'2017-02-07','sdgsdg','235235','5235',1,'2017-02-03','sdgsd23523','sdgsdgsdg',1,'2017-02-27 14:45:11','2017-02-27 09:15:11',0,1);
insert into `tbl_employee` values (43,'iPad test','hhhh','34444555566','Project Manager','Dock Levellers','s@c.com','Dodd','123345567','ggggggg',0,'01-01-1997','hhhhhh','123456','3456',2,'27-02-2015','123fff','Yhhhh',1,'2017-02-27 07:24:13','2017-02-27 09:20:54',0,1);
insert into `tbl_employee` values (44,'Web test','sdgsdg','253235','Site Foreman','Dock Levellers','sa@h.com','estsedtgsdg','3523523','sdgfsdg',0,'2017-02-08','sdgsdg','123456','3456',2,'2017-02-15',' sdgf325235','sdgsdg',1,'2017-02-27 15:31:52','2017-02-27 10:01:52',0,1);
insert into `tbl_employee` values (45,'aarti1','Mishra','123455679','Site Manager','Piling','tappu@gmail.com','tappu','124567','add value',0,'25-02-1997','abc','12345678','5678',3,'25-02-2017','Alg1','',0,'2017-02-27 08:06:23','2017-02-27 10:03:05',0,1);
insert into `tbl_employee` values (46,'narendra','k','44567899865','Project Manager','Piling','n@gmail.com','abhi','65434578','re',0,'01-01-1997','to','11111','1111',3,'27-02-2016','Noida 63','',0,'2017-02-27 08:23:23','2017-02-27 10:20:03',0,1);
insert into `tbl_employee` values (47,'ipad','test12','453453456345','Project Manager','Piling','n@gmail.com','abi','23423452345','re',0,'01-01-1997','tp','111111','1111',3,'27-02-2016','noida63','',0,'2017-02-27 16:10:09','2017-02-27 10:37:15',0,1);
insert into `tbl_employee` values (48,'ipad','test13','3452345345234','Project Manager','Piling','n@gmail.com','abhi','42134123423','re',0,'01-01-1997','tp','1111','1111',3,'28-02-2004','noida 63','',0,'2017-02-27 16:13:09','2017-02-27 10:40:14',0,1);
insert into `tbl_employee` values (49,'hhhh','hhhh','666666666','wwwwww','Dock Levellers','ttttt@ddddd.com','eeeee','6666666','555555',0,'28-03-1997','tttttttt','ttttttt','tttt',2,'66-66-66','7hhhh','Sore thumb',1,'2017-02-28 05:54:36','2017-02-28 00:24:38',0,1);
insert into `tbl_employee` values (50,'hhhh','hhh','55555555','Project Manager','Piling','rrrrr@fff.com','ttttttt','66666666','eeeeee',0,'28-05-1997','hhhhhh','hhh66666','6666',3,'66-66-6666','6 bbbbbb bbbbb','Bad breath',1,'2017-02-28 11:47:32','2017-02-28 06:17:33',0,1);
insert into `tbl_employee` values (51,'gg','gg','','Project Manager','Piling','','','','',0,'','','','1234',3,'','','',0,'2017-02-28 15:35:05','2017-02-28 10:10:14',0,1);
insert into `tbl_employee` values (52,'Arti','Mishra','1334566','Project Manager','Dock Levellers','a@gmail.com','adrift','5668687887','aw',0,'28-08-1997','Tghyun','1111111','1111',2,'28-02-1900','Afg1','',0,'2017-02-28 15:40:12','2017-02-28 10:10:14',0,1);
insert into `tbl_employee` values (53,'hhh','ghhnnnn','767576','Project Manager','Piling','b@bsff.bim','uhuhhihk','666678','jbjhhihihh',0,'02-01-1997','to','8881','8881',3,'28-02-2014','Gdyf6','',0,'2017-02-28 15:46:38','2017-03-01 09:18:08',0,1);
insert into `tbl_employee` values (54,'gggggg','ggggg','66666666','Project Manager','Piling','iii@vvvvvv.com.au','kkkkk','555555555','yyyyyyy',0,'33-33-3333','gggggggg','hhh9h9h9h9h','9h9h',3,'44-44-444','8 mmmmmm mmmmm.','',0,'2017-03-01 10:50:42','2017-03-01 05:20:43',0,1);
insert into `tbl_employee` values (55,'Nate','k','86767676','Project Manager','Piling','n@gmail.com','abhi','86868686','re',0,'01-01-1997','to','111111','1111',3,'01-03-2016','Noida4','',0,'2017-03-01 18:56:54','2017-03-01 13:39:32',0,1);
insert into `tbl_employee` values (56,'Shashank','sdfsdgsdg','124234235235','Site Manager','Piling','sa@h.com','sdgfsdgsdg','235235235235','xzgdsfgsdgsdgsd',0,'2017-03-08','aaaaa','123456','3456',3,'2017-03-16','aswfsaf23523523','dgdfhgdfh',1,'2017-03-02 11:41:01','2017-03-02 07:37:55',0,1);
insert into `tbl_employee` values (57,'Shashank','Raghav','123456789','Site Manager','Dock Levellers','a@h.com','ASFSDFSDF','25345346346346','sdgsdgsdg',0,'2017-03-08','asfasfsdgsdfg','123456','3456',2,'2017-03-10',' USA1223','dfhdfhdfhdfh',1,'2017-03-02 15:50:15','2017-03-02 10:20:15',0,1);
insert into `tbl_employee` values (58,'Shashank','Raghav','23523523','Project Manager','Dock Levellers','sa@h.com','asfasfasf','124235235','safasfas',0,'2017-03-07','asfsdfsdg','1234234','4234',2,'2017-03-09','  asfas2412','',0,'2017-03-02 15:57:49','2017-03-02 10:27:49',0,1);
insert into `tbl_employee` values (59,'arti','Mishra','123477','Project Manager','Dock Levellers','a@gmail.com','rggy','1235567','fgh',0,'06-01-1997','sergdrg','1111111','1111',2,'06-02-2017',' Abc1','',0,'2017-03-06 18:16:05','2017-03-06 12:46:08',0,1);
insert into `tbl_employee` values (60,'ddddd','ddddd','999999','Project Manager','Piling','pppp.kopppp@ddd.com','ppppp','000000','wide',0,'12-22-2222','ppppppp','hjhhj78787','8787',3,'17-05-1972','9 jjjjj jjjjj jjjjj','',0,'2017-03-07 05:26:09','2017-03-06 23:56:10',0,1);
insert into `tbl_employee` values (61,'cbnh','fvj','1236848','Project Manger','Dock Levellers','a@gmail.com','ykkg','55880885','gjkj',0,'03-03-1997','iyhh','1111111','1111',2,'06-03-2017','sgg1','',0,'2017-03-07 16:19:43','2017-03-07 05:19:50',0,1);
insert into `tbl_employee` values (62,'gg','gg','4444444','Project Manager','Piling','rrrrreee@xxxx.com','ttttttt','777777','fffffff',0,'22-05-2016','ggggggg','ggg9999','9999',3,'22-02-2017','7 hh bbbbb','',0,'2017-03-08 02:10:18','2017-03-07 20:40:19',0,1);
insert into `tbl_employee` values (63,'hhhhhh','oooooo','8888888888','Project Manager','Piling','kkk@jjjj.com','ooooooo','09999999999','hhhhhh',0,'01-12-2010','jjjjj','uuuuuu','uuuu',3,'01-12-1972','8 hhhhhhhhhh nnnn','',0,'2017-03-11 13:53:17','2017-03-11 08:23:18',0,1);
insert into `tbl_employee` values (64,'n','k','765554545454','Project Manager','Dock Levellers','n@gmail.com','c','877565656556','r',0,'01-01-1997','to','1111','1111',2,'21-03-2016','H9','',0,'2017-03-21 15:52:18','2017-03-21 10:57:15',0,1);
insert into `tbl_employee` values (65,'jk','h','554566766555','Project Manager','Piling','hh@gmail.com','c','5677777777','g',0,'01-01-1997','h','1111','1111',3,'21-03-2016','N9','',0,'2017-03-21 18:13:50','2017-03-21 12:43:53',0,1);
insert into `tbl_employee` values (66,'hhhhhh','jjjjjj','8888888888','Worker','Piling','ffffff@hhhhhh.com','iiiiii','9999999997','ffffff',0,'20-04-2000','ffffff','jjjjjjjj','jjjj',3,'10-05-1972','8 nnnnn sssss','',0,'2017-03-31 04:22:01','2017-03-30 22:52:03',0,1);
insert into `tbl_employee` values (67,'sagfsdg','dgsdg','325235','Site Manager','Dock Levellers','sd@h.com','asfasf','24124','sdgsdg',0,'2017-04-19','ssdg','21124124','4124',2,'2017-04-20','asdgfsdg','sdg',1,'2017-04-03 16:52:08','2017-04-03 11:22:08',0,1);
insert into `tbl_employee` values (68,'sam','13124','124124','Site Manager','Piling','as@h.com','zsxfsdg','214124','sdgsdg',0,'2017-04-03','xdgsdg','235235235','5235',3,'2017-04-07','asfasf','',0,'2017-04-12 13:49:53','2017-04-12 08:19:53',0,1);
insert into `tbl_employee` values (69,'Shanky','Test','7555555','Project Manager','Piling','sa@h.com','saaam','1222','ok',0,'2017-04-12','ok','11111','1111',3,'2017-04-13','saaa@g.com','test',1,'2017-04-14 17:14:17','2017-04-14 11:44:17',0,1);
insert into `tbl_employee` values (70,'Shashank','okkk','1313','Project Manager','Dock Levellers','sa@h.com','adad','131314','asdsf',0,'2017-04-04','sfsf','13131','3131',2,'2017-04-07','test','sfsf',1,'2017-04-14 17:17:43','2017-04-14 11:47:43',0,1);
insert into `tbl_employee` values (71,'aesgwasged','124124','2514124','Worker','Piling','as@h.com','asfasf','124124','asfasf',0,'2017-04-19','asfasf','14124124','4124',3,'2017-04-14','qeq','asfasf',1,'2017-04-14 17:21:18','2017-04-14 11:51:18',0,1);
insert into `tbl_employee` values (72,'adfasf','weatw3te','124124','Site Manager','Dock Levellers','sa@h.com','fasfsa','124124','asfasf',0,'2017-04-11','asf','124124','4124',2,'2017-04-26','asfasf','asf',1,'2017-04-14 17:29:07','2017-04-14 11:59:07',0,1);
insert into `tbl_employee` values (73,'Tetsing','Hello','12345','Project Manager','Dock Levellers','sa@h.com','asfsdf','3123124','sasf',0,'2017-05-10','asfaf','24124','4124',2,'2017-05-07','I ma good','',0,'2017-05-04 13:10:06','2017-05-04 07:40:06',0,1);
insert into `tbl_employee` values (74,'Hello Shashank','final','13134','Project Manager','Piling','sam@gmail.com','afasdf','124124','sdg',0,'2017-05-05','sdgsdg','214124','4124',3,'2017-05-18','shanky@gmail.com','',0,'2017-05-04 14:39:25','2017-05-04 09:09:25',0,1);
insert into `tbl_employee` values (75,'Samm','Hello','123456','Project Manager','Mark Taylor','sam@ok.com','helo','123','bro',0,'22/02/1995','helo','1234456','4456',0,'22/02/1995','USA','',0,'2017-05-05 17:23:53','2017-05-05 11:53:53',0,1);
insert into `tbl_employee` values (76,'Hello Shashank','asfasf','14124','Site Manager','Daniel Galea','sa@h.com','EQTER','14124','ASFASF',0,'2017-05-10','ASF','214124','4124',1,'2017-05-12','asfasf','',0,'2017-05-05 17:28:37','2017-05-05 11:58:37',0,1);
insert into `tbl_employee` values (77,'sdgsdg','sdgsdg','243124','Site Foreman','dasd','a@h.com','awrfqwr','124124','asfasf',0,'2017-05-02','awrqwr`','134124','4124',4,'2017-05-02','   asf','',0,'2017-05-08 16:55:46','2017-05-08 11:25:46',0,1);
insert into `tbl_employee` values (78,'ssss','2314','1324','Project Manager','','as@h.com','aaa','124124','ssfsf',0,'2017-05-10','sfsf','1313','1313',5,'2017-05-27','sdss','',0,'2017-05-26 16:41:50','2017-05-26 11:11:50',0,1);
insert into `tbl_employee` values (79,'jjj','afet','233333','Site Manager','','a@h.com','asadf','124124','asdasd',0,'2017-05-03','asdasd','124124','4124',21,'2017-05-20','asdgfsdg','',0,'2017-05-26 16:59:36','2017-05-26 11:29:36',0,1);
insert into `tbl_employee` values (81,'www','124124','3124','Worker','ffff','as@h.com','asfasf','124124','asfasf',0,'2017-05-09','asfasf','124124','4124',26,'2017-05-11','afdf','',0,'2017-05-26 17:04:04','2017-05-26 11:34:04',0,1);
insert into `tbl_employee` values (82,'Testing Induction','Hello','111111111111','Project Manager','Block laying','sa@h.com','ssa','1121111','sdgsdg',0,'2017-06-15','ssss','1234','1234',3,'2017-06-10','Test@gmail.com','Fit',1,'2017-06-01 13:31:27','2017-06-01 08:01:27',0,1);
insert into `tbl_employee` values (83,'qwrqwr','124124','131314','Site Manager','Concrete placement','sam@gmail.com12','sdasf','124124','adfasdf',0,'2017-06-14','sdgsdg','124124124','4124',27,'2017-06-22','aaaa123','sdfsdf',1,'2017-06-01 16:52:22','2017-06-01 11:22:22',0,1);
insert into `tbl_employee` values (84,'xzvzxv','ASDASF','24124','Site Manager','Concrete placement','a@h.com','FASF','2412412','ASFASF',0,'2017-06-13','SDGSDG','35235','5235',27,'2017-06-14','ASFASF','',0,'2017-06-01 16:55:15','2017-06-01 11:25:15',0,1);
insert into `tbl_employee` values (85,'asf','asf','12352135','Project Manager','Concrete placement','a@h.com','asf','124124','asfasf',0,'2017-07-07','asf','242424','2424',7,'2017-07-22','asf','',0,'2017-07-27 14:15:17','2017-07-27 08:45:17',0,1);
insert into `tbl_employee` values (86,'asrasr','asrasr','346346','Project Manager','Piling','sa@h.com','sdgsdg','235235','sgsdg',0,'2017-07-08','sdgsdg','2354235235','5235',4,'2017-07-15','sfas','',0,'2017-07-27 15:13:27','2017-07-27 09:43:27',0,1);
insert into `tbl_employee` values (87,'zdgfsdg','sdgsdg','35235','Project Manager','Steel fixer','sam@gmail.com','dgsdgs','3465346','dfhdfh',0,'2017-07-27','sdgsdg','35235','5235',12,'2017-07-15','sdg35','test Medical',1,'2017-07-27 15:19:12','2017-07-27 09:49:12',0,1);
insert into `tbl_employee` values (88,'','','','','','','','','',0,'','','','',0,'','','',0,'2017-07-27 15:37:54','2017-07-27 10:07:54',0,1);
insert into `tbl_employee` values (89,'Sam','Rags','fdgggg','Site Manager','Principle','sa@h.com','dsgsdg','325236','sdghsdh',0,'2017-07-04','sdhsdh','3526','3526',14,'2017-07-14','Sam','',0,'2017-07-27 16:01:21','2017-07-28 12:56:56',0,1);

/*Table structure for table `tbl_employer` */

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_employer` */

insert into `tbl_employer` values (1,2,'Commercial and Industrial Property','Daniel Galea','Joint cutting and sealing','0400226980','dgalea@ciproperty.com.au','Suite 59, Jones Bay Wharf 26-32 Pirrama Road Pyrmont NSW 2009','','2017-02-02 13:36:15','2017-02-02 08:06:15',0,1);
insert into `tbl_employer` values (2,1,'Dexion','Scott Gannaway','Dock Levellers','0438354987','scottg@dexion.com.au','208-218 Abbotts Rd, Dandenong South Vic 3175','','2017-02-02 13:36:15','2017-02-02 08:06:15',0,1);
insert into `tbl_employer` values (3,3,'','','','','','','','2017-02-02 13:36:15','2017-06-08 09:38:52',1,1);
insert into `tbl_employer` values (4,1,'Testing Employer','dasd','Piling','13123','asfasf','usa','','2017-05-08 14:14:56','2017-05-08 08:44:56',0,1);
insert into `tbl_employer` values (5,2,'test123','asfasf','','24124','abc@g.com','dddd','','2017-05-17 19:22:55','2017-05-17 13:52:55',0,1);
insert into `tbl_employer` values (6,2,'asdgsdg','sdgsdg','Block laying','214124','aaa@h.com','USA','','2017-05-17 19:24:24','2017-05-17 13:54:24',0,1);
insert into `tbl_employer` values (7,1,'asfasf','asfasfasf','Concrete placement','24141241241241241241','sam@gmail.com1','asfasfssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss','','2017-05-18 14:37:05','2017-05-18 09:07:05',0,1);
insert into `tbl_employer` values (8,1,'asfasfasf','','Steel fixer','24124','abc@g.com123','USA!@#','','2017-05-18 16:21:04','2017-05-18 10:51:04',0,1);
insert into `tbl_employer` values (9,1,'shashank','','Scaffold','12345567','sam@gmail.com123','USA!@#','','2017-05-18 16:21:44','2017-05-18 10:51:44',0,1);
insert into `tbl_employer` values (10,1,'dsagsdg','sfasf','Concrete placement','2145125','asfasf@h.com','USA','','2017-05-18 16:23:50','2017-05-18 10:53:50',0,1);
insert into `tbl_employer` values (11,1,'dgsdg','sdryery','Concrete placement','214124','sam@gmail.com','wetwet','','2017-05-18 16:25:49','2017-05-18 10:55:49',0,1);
insert into `tbl_employer` values (12,1,'TEsting','asfasfasf','Steel fixer','124124','sam@gmail.com','sfsf','','2017-05-18 17:03:55','2017-05-18 11:38:44',0,1);
insert into `tbl_employer` values (14,1,'g','g','Principle','444','ss@fdbh','sssss','','2017-05-18 18:16:59','2017-05-18 12:46:59',0,1);
insert into `tbl_employer` values (15,1,'dfhdfhdfh','dfhdfh','','41235235','af','dfhdfh','','2017-05-18 18:24:07','2017-05-18 12:54:07',0,1);
insert into `tbl_employer` values (16,1,'sfasf','35235','','sdgsdgsdg','ssdg','sdgsdg','','2017-05-18 18:26:23','2017-05-18 12:56:23',0,1);
insert into `tbl_employer` values (17,1,'fdhdfh','dfhdfh','','235235','sdgsdg','sdgsdg','','2017-05-18 18:27:17','2017-05-18 12:57:17',0,1);
insert into `tbl_employer` values (18,1,'sfasfasfasf','asfasf','','124124','ASDFASF','35235','','2017-05-18 18:34:36','2017-05-18 13:04:36',0,1);
insert into `tbl_employer` values (19,1,'asfasf2424','asfasf','Principle','124124','abc@g.com12311','asfasf','','2017-05-18 20:01:16','2017-05-18 14:31:16',0,1);
insert into `tbl_employer` values (20,1,'gsdg','wt6wet','Principle','325235','sdg@1.com','sdgsdg','','2017-05-18 20:07:48','2017-05-18 14:37:48',0,1);
insert into `tbl_employer` values (21,1,'sdgsdgsdgsdgsdgsdg','214124124','Scaffold','aq352135235','asfasf@h.com111','dsagsdg','','2017-05-18 20:08:05','2017-06-08 10:07:47',0,1);
insert into `tbl_employer` values (22,1,'ZSvasf','dasgsdg','ffff','sdgsdgsdg','sdgsdgsdg@f.com','sdgsdg','','2017-05-18 20:10:33','2017-06-08 09:54:19',1,1);
insert into `tbl_employer` values (23,1,'Testing Employer','sdgsdg','','sdgsdg','sdgs','sfsf','','2017-05-18 20:13:06','2017-06-08 09:54:09',1,1);
insert into `tbl_employer` values (24,1,'sgsdfhdfh','etwet','Concrete placement','12235235','sgery','USA123','','2017-05-18 20:20:53','2017-06-08 09:54:06',1,1);
insert into `tbl_employer` values (25,1,'dsgsdg','sdgsdg','Block laying','sdgsdgsdg','etwetwet','USA4444','','2017-05-18 20:21:21','2017-06-08 09:41:12',1,1);
insert into `tbl_employer` values (26,3,'Testing','Hello','Scaffold','1233333','sam@test.com','123 USA','','2017-06-01 13:54:37','2017-06-01 08:44:01',0,1);
insert into `tbl_employer` values (27,3,'Attendance Testing','Hello','Concrete placement','sdgsdg','sam1234@h.com','SAM','','2017-06-01 16:49:29','2017-06-01 11:19:29',0,1);
insert into `tbl_employer` values (28,1,'Testing Employer','Test','New Trade TEst','12345678','sam@gmail.com','Usa','','2017-06-08 15:17:56','2017-06-08 09:53:10',1,1);
insert into `tbl_employer` values (29,1,'dgsdg','sdgsdg','other','sdgsdg','sdsdgsdg','usa','','2017-07-31 18:53:49','2017-07-31 13:23:49',0,1);
insert into `tbl_employer` values (30,1,'dfhdfh','dfhdfh','Concrete placement','dfhdfh','dfhdfh','fdhdfh','','2017-07-31 18:54:12','2017-07-31 13:24:12',0,1);
insert into `tbl_employer` values (31,1,'Test New UI','sam','Mechanical','123133','asa','USA','','2017-08-01 18:09:37','2017-08-01 12:39:37',0,1);
insert into `tbl_employer` values (32,1,'Test New UI','fass','new other','124124','sam@gmail.com','usa','','2017-08-01 18:24:01','2017-08-01 12:54:01',0,1);
insert into `tbl_employer` values (33,1,'sfasf','asfasf','asfasf','asfasf','asfasf','asfasf','','2017-08-01 18:25:54','2017-08-01 12:55:54',0,1);
insert into `tbl_employer` values (34,1,'dsgdgdg','dgdg','Block laying','dgdg','dgdg','dgdg','','2017-08-01 18:26:31','2017-08-01 12:56:31',0,1);
insert into `tbl_employer` values (35,1,'dsgsdg','sdgsdg','Principle','sdghsdg','sdgsdg','sdg','','2017-08-01 18:27:36','2017-08-01 14:31:39',0,1);

/*Table structure for table `tbl_form_data_filled` */

CREATE TABLE `tbl_form_data_filled` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(400) DEFAULT NULL,
  `row_id` int(11) DEFAULT NULL,
  `filled_by` int(11) DEFAULT NULL,
  `remark` varchar(500) DEFAULT NULL,
  `img_1` varchar(100) DEFAULT NULL,
  `img_2` varchar(100) DEFAULT NULL,
  `img_3` varchar(100) DEFAULT NULL,
  `img_4` varchar(100) DEFAULT NULL,
  `img_5` varchar(100) DEFAULT NULL,
  `img_6` varchar(100) DEFAULT NULL,
  `img_7` varchar(100) DEFAULT NULL,
  `img_8` varchar(100) DEFAULT NULL,
  `img_9` varchar(100) DEFAULT NULL,
  `img_10` varchar(100) DEFAULT NULL,
  `checked_by` int(11) DEFAULT NULL,
  `checking_remark` varchar(500) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `isdeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_form_data_filled` */

/*Table structure for table `tbl_from_data_heading` */

CREATE TABLE `tbl_from_data_heading` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `index` varchar(50) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `main_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `isdeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_from_data_heading` */

insert into `tbl_from_data_heading` values (1,'2.1       ','Design Compliance ',1,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_heading` values (2,'2.2      ','Authority Compliance',2,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_heading` values (3,'2.3     ','Factory Acceptance Tests (FAT?s)',3,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_heading` values (4,'2.4','Site Acceptance Tests (SAT?s)',4,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);

/*Table structure for table `tbl_from_data_row` */

CREATE TABLE `tbl_from_data_row` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main_id` int(11) DEFAULT NULL,
  `data_heading` int(11) DEFAULT NULL,
  `item_no` varchar(200) DEFAULT NULL,
  `activity` varchar(400) DEFAULT NULL,
  `ref_doc` varchar(400) DEFAULT NULL,
  `acc_criteria` varchar(400) DEFAULT NULL,
  `key` varchar(400) DEFAULT NULL,
  `person` varchar(400) DEFAULT NULL,
  `comments` varchar(400) DEFAULT NULL,
  `isdocneeded` tinyint(1) DEFAULT '0',
  `typeofdoc` varchar(10) DEFAULT NULL,
  `numberofdoc` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `isdeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_from_data_row` */

insert into `tbl_from_data_row` values (1,2,1,'2.1.1','Received For Construction Drawings','For Construction Drawings?	[Insert Drawing Numbers]','Issue for Construction Drawings ','H','PM','',0,'',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_row` values (2,2,1,'2.1.2','Piling Layout Plan ','For Construction Drawings ','Mark Up Plan of each date Pile was Completed','H','SE/SM','',0,'',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_row` values (3,2,1,'2.1.3','CIP Standard Detail Drawings','CIP Standard Detail Drawing No. [?]','To be used as reference document when conducting QA check ','W','CM/PM','',0,'',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_row` values (4,2,1,'2.1.4','Received Geotechnical Report ','Geotechnical Report [Insert Document Numbers]','Review and Upload Document  ','H','PM','',0,'',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_row` values (5,2,1,'2.1.5','Piling Contractor Design Computations Received','Contractor?s design documents','Review and Signed off by Design Consultant','H','PM','',0,'',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_row` values (6,2,1,'2.1.6','Received Safety in Design ','Safety in Design ','Structural Design Engineer Issue Report ','H','PM','',0,'',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_row` values (7,2,1,'2.1.7','Received Design Risk Assessment','Design risk Assessment','Structural Design Engineer Issue Report ','H','PM','',0,'',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_row` values (8,2,1,'2.1.8','Structural Design Received from Consultant','Drawings and specifications[Insert Drawing Numbers]','Piles meet load requirements','H','PM','',0,'',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_row` values (9,2,1,'2.1.9','Existing Services Review','CIP Site Safety Management Plan,As-built drawings from DBYD,As-built drawings from previous property owner,Civil construction drawings','Confirmation all services identified, via:1)Client Asset Plan 2)Drawing review and walk-over 3)In-ground detection survey/mark-out 4)Non-destructive excavation,Confirmation of all relevant services disconnected or relocated as required,Dial Before You Dig Up to date','W','SM/OH&S','',0,'',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_row` values (10,2,2,'2.2.1','Works Approvals','Op Works Approval,Development Approval,Building Approval','Approved documentation','H','PM','',0,'',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_row` values (11,2,3,'2.3.1','Pile Conformance Certificate','Pile specifications meet design requirements','Piles conform to specifications','W','SM/SE','',0,'',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_row` values (12,2,4,'2.4.1','Complete Inspection and Requirements Checklist','Inspection & Requirements Checklist (C-Q-ITP-0204D)','Checklist Completed,Upload New Checklist for each Inspected Area ','W','SM/SE','',0,'',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_row` values (13,2,4,'2.4.2','Received Contractor ITP?s','Contractor ITP?s [Insert ITP?s Nam / Numbers]','ITP to be submitted at contractor pre-start ,ITP?s complete including supporting documentation after completion of works ','W','SM/SE','',0,'',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_row` values (14,2,4,'2.4.3',' Excavation of Ground  ','Permit to Excavate SSMP 045','Approve & Completed Permit to Excavate ','H','SM','',0,'',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_row` values (15,2,4,'2.4.4','Survey as-built ','Drawings and Specifications','Meets Requirements','W','SM/SE','',0,'',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_row` values (16,2,4,'2.4.5','Piling contractor & Design Engineer?s sign off','Sign off/certification sign off ','Meets design requirements as set out in specification','W','SM/PM','',0,'',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_from_data_row` values (17,2,4,'2.4.6','All relevant NCR?s have been closed','NCR Register','NCR?s are closed.','H','PM','',0,'',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);

/*Table structure for table `tbl_induction_register` */

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
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_induction_register` */

insert into `tbl_induction_register` values (1,1,'2016-01-01','1',1,'0251111','1111','2017-02-02 13:36:15','2017-02-02 08:06:15',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (2,1,'2016-10-22','1',1,'1984770','4770','2017-02-02 13:36:15','2017-02-02 08:06:15',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (3,1,'2016-12-01','1',1,'1111','1111','2017-02-02 13:36:15','2017-02-02 08:06:15',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (4,1,'2017-02-17 13:16:02',NULL,1,'24235','1111','2017-02-17 18:46:02',NULL,0,1,'184424',NULL,NULL);
insert into `tbl_induction_register` values (5,1,'2017-02-17 13:23:06',NULL,1,'43636436','1111','2017-02-17 18:53:06',NULL,0,1,'185121',NULL,NULL);
insert into `tbl_induction_register` values (6,1,'2017-02-17 13:31:16',NULL,1,'235235','1111','2017-02-17 19:01:16',NULL,0,1,'185912',NULL,NULL);
insert into `tbl_induction_register` values (7,1,'18-02-2017',NULL,1,'0253784','3784','2017-02-18 11:03:01','2017-02-18 05:33:04',0,1,NULL,NULL,NULL);
insert into `tbl_induction_register` values (8,1,'2017-03-17',NULL,1,'131243124','1234','2017-03-17 13:37:33','2017-03-17 08:07:33',0,1,'133525',NULL,NULL);
insert into `tbl_induction_register` values (9,1,'2017-03-17',NULL,1,'124312423','1234','2017-03-17 13:52:27','2017-03-17 08:22:27',0,1,'135027',NULL,NULL);
insert into `tbl_induction_register` values (10,2,'2017-03-22','1',1,'1111111111111111111111111','1234','2017-03-22 11:50:31','2017-03-22 06:22:34',0,1,'114837','noo','0');
insert into `tbl_induction_register` values (21,1,'17-02-2017',NULL,2,'111111','1111','2017-02-18 00:39:32','2017-02-17 13:42:38',0,1,NULL,NULL,NULL);
insert into `tbl_induction_register` values (22,1,'17-02-2017',NULL,2,'1111111','1111','2017-02-17 12:06:02','2017-02-17 14:03:10',0,1,NULL,NULL,NULL);
insert into `tbl_induction_register` values (23,1,'17-02-2017',NULL,3,'1111111','1111','2017-02-18 01:20:15','2017-02-17 14:20:19',0,1,NULL,NULL,NULL);
insert into `tbl_induction_register` values (24,1,'17-02-2017','1',2,'123456789','6789','2017-02-17 12:53:45','2017-02-17 14:53:42',0,1,NULL,'tffghfghgfdfddfzxfcxcdfgdgfdfgdfgdg','0');
insert into `tbl_induction_register` values (25,1,'17-02-2017',NULL,3,'22222','2222','2017-02-18 02:04:11','2017-02-17 15:04:24',0,1,NULL,NULL,NULL);
insert into `tbl_induction_register` values (26,1,'18-02-2017',NULL,3,'777777','7777','2017-02-18 11:12:00','2017-02-18 05:42:03',0,1,NULL,NULL,NULL);
insert into `tbl_induction_register` values (27,1,'21-02-2017',NULL,3,'12345678','5678','2017-02-21 21:16:55','2017-02-21 10:17:03',0,1,NULL,NULL,NULL);
insert into `tbl_induction_register` values (28,1,'21-02-2017',NULL,2,'1111','1111','2017-02-22 00:41:29','2017-02-21 13:41:34',0,1,NULL,NULL,NULL);
insert into `tbl_induction_register` values (29,1,'21-02-2017',NULL,3,'12345678','5678','2017-02-21 12:07:37','2017-02-21 14:04:34',0,1,NULL,NULL,NULL);
insert into `tbl_induction_register` values (30,1,'2017-02-21 14:23:51','',2,'123456','1234','2017-02-21 19:53:51','2017-02-21 14:33:09',0,1,'195142','Not a fit','1');
insert into `tbl_induction_register` values (31,1,'2017-02-21 14:35:16','1',3,'123456','1234','2017-02-21 20:05:16','2017-02-23 15:06:54',0,1,'20315',NULL,'0');
insert into `tbl_induction_register` values (32,1,'2017-02-22 05:57:51',NULL,2,'123456','1234','2017-02-22 11:27:51','2017-02-22 05:57:51',0,1,'112534',NULL,NULL);
insert into `tbl_induction_register` values (33,1,'2017-02-22 06:43:20',NULL,2,'123456','1234','2017-02-22 05:30:00','2017-02-22 00:00:00',0,1,'121129',NULL,NULL);
insert into `tbl_induction_register` values (34,1,'2017-02-22 06:52:07',NULL,2,'123456','1234','2017-02-22 05:30:00','2017-02-22 06:52:07',0,1,'122032',NULL,NULL);
insert into `tbl_induction_register` values (35,1,'2017-02-22 07:12:07',NULL,2,'123456','1234','2017-02-22 12:42:07','2017-02-22 07:12:07',0,1,'12407',NULL,NULL);
insert into `tbl_induction_register` values (36,1,'2017-02-22 07:31:02','',2,'123456','1234','2017-02-22 05:30:00','2017-03-02 07:00:56',0,1,'125913','test','1');
insert into `tbl_induction_register` values (37,1,'2017-02-22 07:50:23','1',2,'123456','1234','2017-02-22 13:20:23','2017-03-02 06:59:55',0,1,'131842',NULL,'0');
insert into `tbl_induction_register` values (38,1,'2017-02-22','1',2,'123456','1234','2017-02-22 13:33:02','2017-02-22 11:50:16',0,1,'133118',NULL,'0');
insert into `tbl_induction_register` values (39,1,'23-02-2017','',3,'ssssss','ssss','2017-02-23 03:54:17','2017-03-02 07:02:29',0,1,NULL,'Not a Match','1');
insert into `tbl_induction_register` values (40,1,'23-02-2017','1',2,'eeeeeeee','eeee','2017-02-23 03:56:17','2017-02-23 15:01:12',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (41,1,'27-02-2017','1',3,'1235555','5555','2017-02-27 18:20:27','2017-02-27 09:27:00',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (42,1,'2017-02-27','1',1,'235235','1234','2017-02-27 14:45:11','2017-02-27 09:15:32',0,1,'14433',NULL,'0');
insert into `tbl_induction_register` values (43,1,'27-02-2017','1',2,'123456','3456','2017-02-27 07:24:13','2017-02-27 09:21:45',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (44,1,'2017-02-27','1',2,'123456','1234','2017-02-27 15:31:52','2017-03-01 16:19:13',0,1,'152951','Not a fit','0');
insert into `tbl_induction_register` values (45,1,'27-02-2017','1',3,'12345678','5678','2017-02-27 08:06:23','2017-02-27 10:08:02',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (46,1,'27-02-2017','1',3,'11111','1111','2017-02-27 08:23:23','2017-02-27 10:27:31',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (47,1,'27-02-2017','1',3,'111111','1111','2017-02-27 16:10:09','2017-02-27 10:46:33',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (48,1,'27-02-2017','1',3,'1111','1111','2017-02-27 16:13:09','2017-03-01 14:24:30',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (49,1,'28-02-2017','1',2,'ttttttt','tttt','2017-02-28 05:54:36','2017-03-01 14:22:12',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (50,1,'28-02-2017','1',3,'hhh66666','6666','2017-02-28 11:47:32','2017-03-01 14:17:39',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (51,1,'28-02-2017','1',3,'','1234','2017-02-28 15:35:05','2017-03-01 14:12:33',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (52,1,'28-02-2017','1',2,'1111111','1111','2017-02-28 15:40:12','2017-03-01 09:17:01',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (53,1,'28-02-2017','1',3,'8881','8881','2017-02-28 15:46:38','2017-03-01 14:00:13',0,1,NULL,'testing','0');
insert into `tbl_induction_register` values (54,1,'01-03-2017','1',3,'hhh9h9h9h9h','9h9h','2017-03-01 10:50:42','2017-03-01 13:16:57',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (55,1,'01-03-2017','1',3,'111111','1111','2017-03-01 18:56:54','2017-03-01 13:55:56',0,1,NULL,'Testing','0');
insert into `tbl_induction_register` values (56,1,'2017-03-02','1',3,'123456','1234','2017-03-02 11:41:01','2017-03-02 12:12:26',0,1,'113923','Not a Match','0');
insert into `tbl_induction_register` values (57,1,'2017-03-02','1',2,'123456','1234','2017-03-02 15:50:15','2017-03-02 11:47:57',0,1,'15482',NULL,'0');
insert into `tbl_induction_register` values (58,1,'2017-03-02','1',2,'1234234','1234','2017-03-02 15:57:49','2017-03-02 11:40:18',0,1,'155610',NULL,'0');
insert into `tbl_induction_register` values (59,1,'06-03-2017','1',2,'1111111','1111','2017-03-06 18:16:05','2017-03-06 12:50:06',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (60,1,'07-03-2017','1',3,'hjhhj78787','8787','2017-03-07 05:26:09','2017-03-23 08:00:04',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (61,1,'07-03-2017','1',2,'1111111','1111','2017-03-07 16:19:43','2017-03-07 12:00:52',0,1,NULL,'Not a Match','1');
insert into `tbl_induction_register` values (62,1,'08-03-2017','1',3,'ggg9999','9999','2017-03-08 02:10:18','2017-03-23 07:48:49',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (63,1,'11-03-2017','1',3,'uuuuuu','uuuu','2017-03-11 13:53:17','2017-03-23 07:44:55',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (64,2,'21-03-2017','1',2,'1111','1111','2017-03-21 15:52:18','2017-03-21 11:00:13',0,1,NULL,'not a match','0');
insert into `tbl_induction_register` values (65,2,'21-03-2017','1',3,'1111','1111','2017-03-21 18:13:50','2017-03-23 07:42:30',0,1,NULL,NULL,'0');
insert into `tbl_induction_register` values (66,1,'31-03-2017',NULL,3,'jjjjjjjj','jjjj','2017-03-31 04:22:01','2017-03-30 22:52:03',0,1,NULL,NULL,NULL);
insert into `tbl_induction_register` values (67,1,'2017-04-03',NULL,2,'21124124','1234','2017-04-03 16:52:08','2017-04-03 11:22:08',0,1,'165128',NULL,NULL);
insert into `tbl_induction_register` values (68,1,'2017-04-12',NULL,3,'235235235','1234','2017-04-12 13:49:53','2017-04-12 08:19:53',0,1,'13483',NULL,NULL);
insert into `tbl_induction_register` values (69,1,'2017-04-14',NULL,3,'11111','1234','2017-04-14 17:14:18','2017-04-14 11:44:18',0,1,'171243',NULL,NULL);
insert into `tbl_induction_register` values (70,1,'2017-04-14',NULL,2,'13131','1234','2017-04-14 17:17:43','2017-04-14 11:47:43',0,1,'17178',NULL,NULL);
insert into `tbl_induction_register` values (71,1,'2017-04-14','1',3,'14124124','1234','2017-04-14 17:21:18','2017-04-14 12:09:37',0,1,'172042','no','0');
insert into `tbl_induction_register` values (72,1,'2017-04-14','1',2,'124124','1234','2017-04-14 17:29:07','2017-04-14 12:02:46',0,1,'172828',NULL,'0');
insert into `tbl_induction_register` values (73,2,'2017-05-04','1',2,'24124','1234','2017-05-04 13:10:06','2017-05-04 07:42:25',0,1,'13924','Ok','0');
insert into `tbl_induction_register` values (74,3,'2017-05-04','1',3,'214124','1234','2017-05-04 14:39:26','2017-05-04 09:10:38',0,1,'143834','jk;','0');
insert into `tbl_induction_register` values (76,1,'2017-05-05','1',1,'214124','1234','2017-05-05 17:28:37','2017-05-26 11:08:24',0,1,'17273','111','1');
insert into `tbl_induction_register` values (77,1,'2017-05-08','1',4,'134124','1234','2017-05-08 16:55:46','2017-05-08 11:26:18',0,1,'165511',NULL,'0');
insert into `tbl_induction_register` values (78,2,'2017-05-26','1',5,'1313','1234','2017-05-26 16:41:50','2017-05-26 11:16:37',0,1,'164054','ok','0');
insert into `tbl_induction_register` values (79,1,'2017-05-26','1',21,'124124','1234','2017-05-26 16:59:36','2017-05-26 11:30:55',0,1,'165838','sdgsdg','1');
insert into `tbl_induction_register` values (80,1,'2017-05-26',NULL,22,'124124','1234','2017-05-26 17:04:04','2017-05-26 11:34:04',0,1,'17318',NULL,NULL);
insert into `tbl_induction_register` values (81,3,'2017-06-01','1',26,'1234','1234','2017-06-01 13:31:28','2017-06-01 08:03:06',0,1,'132959','ok','1');
insert into `tbl_induction_register` values (82,3,'2017-06-01',NULL,27,'21235235','1234','2017-06-01 16:51:16','2017-06-01 11:21:16',0,1,'165032',NULL,NULL);
insert into `tbl_induction_register` values (83,3,'2017-06-01',NULL,27,'124124124','1234','2017-06-01 16:52:22','2017-06-01 11:22:22',0,1,'165144',NULL,NULL);
insert into `tbl_induction_register` values (84,3,'2017-06-01',NULL,27,'35235','1234','2017-06-01 16:55:15','2017-06-01 11:25:15',0,1,'165434',NULL,NULL);
insert into `tbl_induction_register` values (85,1,'2017-07-27',NULL,7,'242424','1234','2017-07-27 14:15:17','2017-07-27 08:45:17',0,1,'',NULL,NULL);
insert into `tbl_induction_register` values (86,1,'2017-07-27',NULL,4,'2354235235','1234','2017-07-27 15:13:27','2017-07-27 09:43:27',0,1,'',NULL,NULL);
insert into `tbl_induction_register` values (87,1,'2017-07-27',NULL,12,'35235','1234','2017-07-27 15:19:13','2017-07-27 09:49:13',0,1,'151819',NULL,NULL);
insert into `tbl_induction_register` values (88,1,'2017-07-27',NULL,0,'','1234','2017-07-27 15:37:54','2017-07-27 10:07:54',0,1,'',NULL,NULL);
insert into `tbl_induction_register` values (89,1,'2017-07-27','1',14,'3526','1234','2017-07-27 16:01:21','2017-07-28 11:29:43',0,1,'1608',NULL,'0');

/*Table structure for table `tbl_instruction` */

CREATE TABLE `tbl_instruction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `emp_id` varchar(100) DEFAULT NULL,
  `employee_id` varchar(100) DEFAULT NULL,
  `distribution_id` varchar(100) DEFAULT NULL,
  `instructions` tinyblob,
  `req_date` varchar(100) DEFAULT NULL,
  `issued_by` int(11) DEFAULT NULL,
  `today_date` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` int(10) DEFAULT NULL,
  `attachments` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_instruction` */

insert into `tbl_instruction` values (4,1,'dgalea@ciproperty.com.au','1','2',NULL,'dfhdfh','04/19/2017',1,'04/19/2017','2017-04-26 14:07:13','2017-04-26 14:07:13',NULL,NULL);
insert into `tbl_instruction` values (5,1,'dgalea@ciproperty.com.au','1','2',NULL,'Testing','04/27/2017',1,'04/27/2017','2017-04-27 06:41:12','2017-04-27 06:41:12',NULL,NULL);
insert into `tbl_instruction` values (6,1,'0400226980','1','2',NULL,'Testing 123','04/27/2017',1,'04/27/2017','2017-04-27 06:42:39','2017-04-27 06:42:39',NULL,NULL);
insert into `tbl_instruction` values (7,1,'szFasf','1','3',NULL,'sdfsdgsdg','04/27/2017',1,'04/27/2017','2017-04-27 06:43:30','2017-04-27 06:43:30',NULL,NULL);
insert into `tbl_instruction` values (8,1,'13','2','3',NULL,'heLLO','04/27/2017',1,'04/27/2017','2017-04-27 06:49:54','2017-04-27 06:49:54',NULL,NULL);
insert into `tbl_instruction` values (9,1,'Test_emp','1','10',NULL,'Test Emp','04/27/2017',1,'04/27/2017','2017-04-27 11:51:08','2017-04-27 11:51:08',NULL,NULL);
insert into `tbl_instruction` values (10,1,'1212','1','2',NULL,'test','05/01/2017',1,'05/01/2017','2017-05-02 12:33:44','2017-05-02 12:33:44',NULL,NULL);
insert into `tbl_instruction` values (11,1,'Final Test','1','3',NULL,'Helllo','05/02/2017',1,'05/02/2017','2017-05-02 12:37:18','2017-05-02 12:37:18',NULL,NULL);
insert into `tbl_instruction` values (12,1,'asdfsdgt','1','2',NULL,'hkhjl','05/02/2017',1,'05/02/2017','2017-05-02 12:39:59','2017-05-02 12:39:59',NULL,NULL);
insert into `tbl_instruction` values (13,1,'124235','1','2',NULL,'dfgdfh','05/02/2017',1,'05/02/2017','2017-05-02 12:42:43','2017-05-02 12:42:43',NULL,NULL);
insert into `tbl_instruction` values (14,1,'fdhgdfh','1','2',NULL,'sdgsdg','05/02/2017',1,'05/02/2017','2017-05-02 12:43:47','2017-05-02 12:43:47',NULL,NULL);
insert into `tbl_instruction` values (15,1,'fdhgdfh','1','2',NULL,'sdgsdg','05/02/2017',1,'05/02/2017','2017-05-02 18:14:21','2017-05-02 18:14:21',NULL,NULL);
insert into `tbl_instruction` values (16,1,'sdgsdgh','1','3,42','2,3,10,42','zgfsdg','05/01/2017',1,'05/01/2017','2017-05-02 12:46:40','2017-05-02 12:46:40',NULL,NULL);
insert into `tbl_instruction` values (17,1,'dfsdg','1','3.42','2,3,10,42','sdgsdg','05/02/2017',1,'05/02/2017','2017-05-02 12:52:01','2017-05-02 12:52:01',NULL,NULL);
insert into `tbl_instruction` values (18,1,'fsdfsdf','1','3','3','hello','05/02/2017',1,'05/02/2017','2017-05-02 14:08:02','2017-05-02 14:08:02',NULL,NULL);
insert into `tbl_instruction` values (19,1,'Final Testing Of Email','2','37,44','42','drhdfjh','05/02/2017',1,'05/02/2017','2017-05-03 11:19:14','2017-05-03 11:19:14',NULL,NULL);
insert into `tbl_instruction` values (20,1,'Final Testing of EMail','1','10','42','fgjgfj','05/03/2017',1,'05/03/2017','2017-05-03 11:20:25','2017-05-03 11:20:25',NULL,NULL);
insert into `tbl_instruction` values (21,1,'sdgsdg','3','31,56','2','sdgsdg','05/03/2017',1,'05/03/2017','2017-05-03 11:22:19','2017-05-03 11:22:19',NULL,NULL);
insert into `tbl_instruction` values (22,1,'Final Testing Of Email','2','38,44','10','gkghl','05/03/2017',1,'05/03/2017','2017-05-03 11:24:46','2017-05-03 11:24:46',NULL,NULL);
insert into `tbl_instruction` values (23,1,'dfhjdfj','1','10,42','42','sdgsdg','05/03/2017',1,'05/03/2017','2017-05-03 11:25:48','2017-05-03 11:25:48',NULL,NULL);
insert into `tbl_instruction` values (24,1,'vhmkghk','1','2,3,10','42','vbm,hv,gh,','05/03/2017',1,'05/03/2017','2017-05-03 11:28:15','2017-05-03 11:28:15',NULL,NULL);
insert into `tbl_instruction` values (25,1,'asFRASW','1','3,10,42','42','ASFASF','05/03/2017',1,'05/03/2017','2017-05-03 11:29:02','2017-05-03 11:29:02',NULL,NULL);
insert into `tbl_instruction` values (26,1,'asfasf','2','40,44','42','asfasf','05/03/2017',1,'05/03/2017','2017-05-03 11:33:11','2017-05-03 11:33:11',NULL,NULL);
insert into `tbl_instruction` values (27,1,'sdgsdg','2','24,37,38','10','sdgsdg','05/01/2017',1,'05/01/2017','2017-05-03 11:34:12','2017-05-03 11:34:12',NULL,NULL);
insert into `tbl_instruction` values (28,1,'dsfhgdfh','2','43','10','sdhgsdh','05/01/2017',1,'05/01/2017','2017-05-03 11:37:42','2017-05-03 11:37:42',NULL,NULL);
insert into `tbl_instruction` values (29,1,'Hello','1','3','3','Hello','05/03/2017',1,'05/03/2017','2017-05-03 12:50:55','2017-05-03 12:50:55',NULL,',,,,,');
insert into `tbl_instruction` values (30,1,'ftutyi','1','42','10','ytityi','05/03/2017',1,'05/03/2017','2017-05-03 12:59:57','2017-05-03 12:59:57',NULL,',,,,,');
insert into `tbl_instruction` values (31,1,'dgsdg','1','3','3','dsgsdg','05/03/2017',1,'05/03/2017','2017-05-03 13:01:15','2017-05-03 13:01:15',NULL,',,,,,');
insert into `tbl_instruction` values (32,1,'dfhdfh','1','10','10','sdfhdfh','05/03/2017',1,'05/03/2017','2017-05-03 13:16:52','2017-05-03 13:16:52',NULL,'');
insert into `tbl_instruction` values (33,1,'ryery','2','40','3','eryery','05/03/2017',1,'05/03/2017','2017-05-03 13:36:22','2017-05-03 13:36:22',NULL,'unnamed_1493818582.png,,,,,wallhaven-204176_1493818582.png');
insert into `tbl_instruction` values (34,1,'sgeddsfg','1','3','10','dfhgdfh','05/03/2017',1,'05/03/2017','2017-05-03 13:43:02','2017-05-03 13:43:02',NULL,'wallhaven-204176_1493818982.png,wallhaven-204176_1493818982.png,unnamed_1493818982.png');
insert into `tbl_instruction` values (35,1,'testing Date','1','3','3','Hi','04-05-2017',1,'04-05-2017','2017-05-04 12:30:28','2017-05-04 12:30:28',NULL,'wallhaven-204176_1493901028.png');
insert into `tbl_instruction` values (36,1,'Testing Final Date','1','3','42','Hello','04-05-2017',1,'04-05-2017','2017-05-04 12:37:16','2017-05-04 12:37:16',NULL,'wallhaven-204176_1493901436.png');
insert into `tbl_instruction` values (37,1,'safsdg','1','42','3','dsgsdg','02-05-2017',1,'02-05-2017','2017-05-04 12:42:13','2017-05-04 12:42:13',NULL,'wallhaven-204176_1493901733.png');
insert into `tbl_instruction` values (38,1,'sdhdfh','1','3,42','42','dfh','03-05-2017',1,'03-05-2017','2017-05-04 12:43:45','2017-05-04 12:43:45',NULL,'wallhaven-204176_1493901825.png');
insert into `tbl_instruction` values (39,1,'dfhj','2','37,40','3,42','dfh','02-05-2017',1,'02-05-2017','2017-05-04 12:44:59','2017-05-04 12:44:59',NULL,'wallhaven-204176_1493901899.png,unnamed_1493901899.png');
insert into `tbl_instruction` values (40,1,'Tesiting','1','3','3','Helo','08-05-2017',1,'08-05-2017','2017-05-08 09:19:54','2017-05-08 09:19:54',NULL,'sql joins guide and syntax_1494235194.jpg');
insert into `tbl_instruction` values (41,1,'Tesiting','2','37','3','Hiii','08-05-2017',1,'08-05-2017','2017-05-08 09:21:47','2017-05-08 09:21:47',NULL,'sql joins guide and syntax_1494235307.jpg,unnamed_1494235307.png');
insert into `tbl_instruction` values (42,1,'aefgwet','4','77','3','asfasf','08-05-2017',1,'08-05-2017','2017-05-08 11:26:57','2017-05-08 11:26:57',NULL,'wallhaven-204176_1494242817.png,unnamed_1494242817.png');
insert into `tbl_instruction` values (43,1,'Hello','4','77','3','Hello','01-06-2017',1,'01-06-2017','2017-06-01 12:48:30','2017-06-01 12:48:30',NULL,'');
insert into `tbl_instruction` values (44,1,'dfgdfh','4','77','42','dfhdfh','05-07-2017',1,'05-07-2017','2017-07-17 08:26:28','2017-07-17 08:26:28',NULL,'project_number_1500279988.png,footer_logo_2_1500279988.png,');
insert into `tbl_instruction` values (45,1,'test','4','77','76','helo','10-07-2017',1,'10-07-2017','2017-07-17 10:20:57','2017-07-17 10:20:57',NULL,'footer_img_1500286857.png');
insert into `tbl_instruction` values (46,1,'Helo','4','77','3','Hi','12-07-2017',1,'12-07-2017','2017-07-17 15:25:18','2017-07-17 15:25:18',NULL,'Screenshot from 2017-07-17 13-11-48_1500305118.png,Screenshot from 2017-07-14 16-46-07_1500305118.png,Screenshot from 2017-07-14 18-45-33_1500305118.png');
insert into `tbl_instruction` values (47,1,'jlhjl','4','77','3','gfjkf','11-07-2017',1,'11-07-2017','2017-07-17 15:26:54','2017-07-17 15:26:54',NULL,'6_1500305214.jpg,11_1500305214.jpg,6_1500305214.jpg,3_1500305214.jpg');
insert into `tbl_instruction` values (48,1,'sdf','4','77','3','sdgsdg','10-07-2017',1,'10-07-2017','2017-07-17 15:37:52','2017-07-17 15:37:52',NULL,'1500305872.png,1500305872.jpg');
insert into `tbl_instruction` values (49,1,'Just a Test','2','43','42','dfhdfhd','19-07-2017',1,'19-07-2017','2017-07-24 13:40:23','2017-07-24 13:40:23',NULL,'ref_1500903623.png,ref (1)_1500903623.png,ref_1500903623.png');
insert into `tbl_instruction` values (50,1,'sdg','4','77','42','sdg','04-07-2017',1,'04-07-2017','2017-07-24 13:50:51','2017-07-24 13:50:51',NULL,'ref (1)_1500904251.png,notification_1_1500904251.png,ref_1500904251.png');
insert into `tbl_instruction` values (51,1,'sf','4','77','3','saF','11-07-2017',1,'11-07-2017','2017-07-24 13:57:47','2017-07-24 13:57:47',NULL,'ref (1)_1500904667.png,ref_1500904667.png');
insert into `tbl_instruction` values (52,1,'ok','4','77','3,76','Ok Jsut Testting','13-07-2017',1,'13-07-2017','2017-07-25 09:03:29','2017-07-25 09:03:29',NULL,'notification_3_1500973409.png,notification_1_1500973409.png,ref_1500973409.png');
insert into `tbl_instruction` values (53,1,'asfgasg','2','37,38,44','2,3,76','dzsgsdg','11-07-2017',1,'11-07-2017','2017-07-25 09:24:15','2017-07-25 09:24:15',NULL,'ref_1500974655.png');

/*Table structure for table `tbl_itp_form_heading_top` */

CREATE TABLE `tbl_itp_form_heading_top` (
  `main_id` int(11) DEFAULT NULL,
  `itp_form_uuid` varchar(400) NOT NULL,
  `project` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `completed_by` varchar(50) DEFAULT NULL,
  `esite_no` int(20) DEFAULT NULL,
  `audited_by` varchar(50) DEFAULT NULL,
  `special_info` varchar(50) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `trade_name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`itp_form_uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_itp_form_heading_top` */

/*Table structure for table `tbl_itp_main` */

CREATE TABLE `tbl_itp_main` (
  `main_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`main_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_itp_main` */

insert into `tbl_itp_main` values (1,'BulkEarthworks','2017-04-20 06:48:05','2017-04-20 06:48:05',0);
insert into `tbl_itp_main` values (2,'Pililng','0000-00-00 00:00:00','0000-00-00 00:00:00',0);
insert into `tbl_itp_main` values (3,'PileCapping','0000-00-00 00:00:00','0000-00-00 00:00:00',0);

/*Table structure for table `tbl_permit_excave_register` */

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

insert into `tbl_permit_excave_register` values (1,'001',1,'2016-11-30 00:00:00','2016-12-05 00:00:00','2016-12-01 00:00:00','0037',2,'abc22 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Tec Building ','Pieter Koppen','CLOSED','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1);
insert into `tbl_permit_excave_register` values (2,'002',1,'2016-12-01 00:00:00','2016-12-02 00:00:00','2016-12-02 00:00:00','0043',3,'abc28 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Tec Building ','Pieter Koppen','CLOSED','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1);
insert into `tbl_permit_excave_register` values (3,'003',1,'2016-12-01 00:00:00','2016-12-05 00:00:00','0000-00-00 00:00:00','0038',2,'abc23 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Tec Building ','Pieter Koppen','OPEN','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1);
insert into `tbl_permit_excave_register` values (4,'004',1,'2016-12-01 00:00:00','2016-12-05 00:00:00','2016-12-02 00:00:00','0035',2,'abc20 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Location 1','Pieter Koppen','CLOSED','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1);
insert into `tbl_permit_excave_register` values (5,'005',1,'2016-12-01 00:00:00','2016-12-07 00:00:00','2016-12-07 00:00:00','0042',3,'abc27 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Tec Building ','Pieter Koppen','CLOSED','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1);
insert into `tbl_permit_excave_register` values (6,'006',1,'2016-12-02 00:00:00','2016-12-04 00:00:00','2016-12-02 00:00:00','0021',2,'abc8 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Tec Building ','Pieter Koppen','CLOSED','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1);
insert into `tbl_permit_excave_register` values (7,'007',1,'2016-12-02 00:00:00','2016-12-04 00:00:00',NULL,'0023',2,'abc6 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Tec Building ','Pieter Koppen','OPEN','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1);
insert into `tbl_permit_excave_register` values (8,'008',1,'2016-12-03 00:00:00','2016-12-09 00:00:00','2016-12-03 00:00:00','0025',2,'abc10 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Tec Building ','Pieter Koppen','CLOSED','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1);
insert into `tbl_permit_excave_register` values (9,'009',1,'2016-12-07 00:00:00','2016-12-13 00:00:00',NULL,'0047',2,'abc22 xyz1','123456','abc1@xyz1','Excavation of Sewer Line','Location 1','Pieter Koppen','OPEN','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1);

/*Table structure for table `tbl_project` */

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_project` */

insert into `tbl_project` values (1,'Newcold-Truganina',3,'3010-05-000','2017-02-02 13:36:15','2017-08-01 07:28:27',0,1);
insert into `tbl_project` values (2,'Symbion',3,'3010-05-000','2017-03-20 12:45:53','2017-05-10 07:49:44',0,1);
insert into `tbl_project` values (3,'Testing Project',6,'312-323-000','2017-03-20 12:45:53','2017-06-01 08:37:54',0,1);
insert into `tbl_project` values (4,'PRoject 2',0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1);

/*Table structure for table `tbl_project_detail` */

CREATE TABLE `tbl_project_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `project_name` varchar(200) DEFAULT NULL,
  `construction_manager` varchar(200) DEFAULT NULL,
  `principal_contractor` varchar(200) DEFAULT NULL,
  `project_manager` varchar(200) DEFAULT NULL,
  `client` varchar(200) DEFAULT NULL,
  `project_engineer` varchar(200) DEFAULT NULL,
  `site_manager` varchar(200) DEFAULT NULL,
  `project_address` varchar(400) DEFAULT NULL,
  `foreman` varchar(200) DEFAULT NULL,
  `commencement_address` varchar(200) DEFAULT NULL,
  `safety_manager` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `site_engineer` varchar(200) DEFAULT NULL,
  `issue_date` varchar(200) DEFAULT NULL,
  `project_personal_number` int(20) DEFAULT NULL,
  `external_number` int(20) DEFAULT NULL,
  `emergency_evacuation` varchar(400) DEFAULT NULL,
  `emergency_response` varchar(400) DEFAULT NULL,
  `project_hazard` varchar(400) DEFAULT NULL,
  `emergency_response_team` varchar(400) DEFAULT NULL,
  `duties_response_team` varchar(400) DEFAULT NULL,
  `diagrams_sign` varchar(400) DEFAULT NULL,
  `safety_representative` varchar(200) DEFAULT NULL,
  `project_scope` varchar(600) DEFAULT NULL,
  `coordination_procedure` varchar(400) DEFAULT NULL,
  `response_equipment` varchar(400) DEFAULT NULL,
  `response_process` varchar(400) DEFAULT NULL,
  `emergency_management` varchar(400) DEFAULT NULL,
  `search_tag` varchar(400) DEFAULT NULL,
  `image_3` varchar(400) DEFAULT NULL,
  `image_4` varchar(400) DEFAULT NULL,
  `image_2` varchar(400) DEFAULT NULL,
  `image_1` varchar(400) DEFAULT NULL,
  `evacuation_drill` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_project_detail` */

/*Table structure for table `tbl_project_register` */

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_project_register` */

insert into `tbl_project_register` values (1,1,3,1,'2017-02-02 13:36:15','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (2,1,3,2,'2017-02-02 13:36:15','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (4,2,3,1,'2017-02-02 13:36:15','2017-05-10 07:49:44',0,1);
insert into `tbl_project_register` values (5,2,3,2,'2017-02-02 13:36:15','2017-05-10 07:49:44',0,1);
insert into `tbl_project_register` values (8,3,6,1,'2017-02-02 13:36:15','2017-06-01 08:37:54',0,1);
insert into `tbl_project_register` values (9,3,6,2,'2017-02-02 13:36:15','2017-06-01 08:37:54',0,1);
insert into `tbl_project_register` values (10,1,3,4,'2017-05-08 14:14:56','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (11,2,3,5,'2017-05-17 19:22:55','2017-05-17 13:52:55',0,1);
insert into `tbl_project_register` values (12,2,3,6,'2017-05-17 19:24:24','2017-05-17 13:54:24',0,1);
insert into `tbl_project_register` values (13,1,3,7,'2017-05-18 14:37:06','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (14,1,3,8,'2017-05-18 16:21:04','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (15,1,3,9,'2017-05-18 16:21:45','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (16,1,3,10,'2017-05-18 16:23:51','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (17,1,3,12,'2017-05-18 17:03:55','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (18,1,3,13,'2017-05-18 17:56:41','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (19,1,3,14,'2017-05-18 18:17:00','2017-08-01 07:28:27',1,1);
insert into `tbl_project_register` values (20,1,3,15,'2017-05-18 18:24:08','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (21,1,3,16,'2017-05-18 18:26:23','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (22,1,3,17,'2017-05-18 18:27:17','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (23,1,3,18,'2017-05-18 18:34:36','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (24,1,3,19,'2017-05-18 20:01:17','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (25,1,3,20,'2017-05-18 20:07:48','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (26,1,3,21,'2017-05-18 20:08:06','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (27,1,3,22,'2017-05-18 20:10:33','2017-08-01 07:28:27',1,1);
insert into `tbl_project_register` values (28,1,3,23,'2017-05-18 20:13:07','2017-08-01 07:28:27',1,1);
insert into `tbl_project_register` values (29,1,3,24,'2017-05-18 20:20:53','2017-08-01 07:28:27',1,1);
insert into `tbl_project_register` values (30,1,3,25,'2017-05-18 20:21:21','2017-08-01 07:28:27',1,1);
insert into `tbl_project_register` values (31,3,6,26,'2017-06-01 13:54:37','2017-06-01 08:44:02',1,1);
insert into `tbl_project_register` values (32,3,6,27,'2017-06-01 16:49:29','2017-06-01 11:19:29',0,1);
insert into `tbl_project_register` values (33,1,3,28,'2017-06-08 15:17:56','2017-08-01 07:28:27',1,1);
insert into `tbl_project_register` values (34,4,3,0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,1);
insert into `tbl_project_register` values (35,1,3,29,'2017-07-31 18:53:49','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (36,1,3,30,'2017-07-31 18:54:13','2017-08-01 07:28:27',0,1);
insert into `tbl_project_register` values (37,1,3,31,'2017-08-01 18:09:37','2017-08-01 12:39:37',0,1);
insert into `tbl_project_register` values (38,1,3,32,'2017-08-01 18:24:01','2017-08-01 12:54:01',0,1);
insert into `tbl_project_register` values (39,1,3,33,'2017-08-01 18:25:54','2017-08-01 12:55:54',0,1);
insert into `tbl_project_register` values (40,1,3,34,'2017-08-01 18:26:31','2017-08-01 12:56:31',0,1);
insert into `tbl_project_register` values (41,1,3,35,'2017-08-01 18:27:36','2017-08-01 12:57:36',0,1);

/*Table structure for table `tbl_refrence` */

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

insert into `tbl_refrence` values (1,2,'shanky.rags@gmail.com',1111,'5105c83c48bb5eb36ab27725a7aa6109');
insert into `tbl_refrence` values (61,2,'kdevender609@gmail.com',1111,'9d84eb5db07e320d6642dd910d3a1eb1');
insert into `tbl_refrence` values (61,1,'ss@fdbh',1111,'5a35ec150b52cc3ab69fa63bf73c38f3');
insert into `tbl_refrence` values (61,1,'xfh@asdfsf.com',1111,'f1e2e63f9639b313103927495c36fa76');
insert into `tbl_refrence` values (1,1,'scottg@dexion.com.au',1111,'c839835f1fa6db90cf1bb84c7d71ecd4');
insert into `tbl_refrence` values (1,1,'dgalea@cipropert.coma.au',1111,'6dd4a73f79b248baf4b1a3ebad4145c6');
insert into `tbl_refrence` values (1,1,'dgalea@ciproperty.com.au',1111,'dd5fafc4d179e17cbd6105c8d7541014');
insert into `tbl_refrence` values (1,2,'dgalea@cipropert.coma.u',1111,'dd71feefaf7f6173b8c1a0cdbd931fc1');
insert into `tbl_refrence` values (1,1,'v1@f',1111,'080d34bdb0c5c4250f74fbb8c12b306c');
insert into `tbl_refrence` values (1,2,'shashank.r@aviktechnosoft.com',1111,'48980617192dccc07cf0674f511a3acd');
insert into `tbl_refrence` values (1,1,'gee@c.com',1111,'9e47b19a7d4ab0faa774dc7082331baa');
insert into `tbl_refrence` values (1,1,'sam@gmail.com',1111,'e9fb0087a94fde15feb1bf8302199511');

/*Table structure for table `tbl_setting` */

CREATE TABLE `tbl_setting` (
  `id` int(11) NOT NULL,
  `induction_mail` varchar(500) DEFAULT NULL,
  `project_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_setting` */

insert into `tbl_setting` values (1,'shashank.r@aviktechnosoft.com',1);
insert into `tbl_setting` values (3,'shanky.rags@gmail.com',3);

/*Table structure for table `tbl_site_attendace` */

CREATE TABLE `tbl_site_attendace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `induction_no` varchar(400) NOT NULL,
  `project_id` int(11) NOT NULL,
  `trade` varchar(400) DEFAULT NULL,
  `employees_location` text,
  `no_of_worker` int(11) DEFAULT NULL,
  `today_date` date DEFAULT NULL,
  `whom` int(11) NOT NULL,
  `image_6` varchar(400) NOT NULL,
  `image_5` varchar(400) NOT NULL,
  `image_4` varchar(400) NOT NULL,
  `image_3` varchar(400) NOT NULL,
  `image_2` varchar(400) NOT NULL,
  `image_1` varchar(400) NOT NULL,
  `image_3_text` varchar(400) DEFAULT NULL,
  `image_4_text` varchar(400) DEFAULT NULL,
  `image_5_text` varchar(400) DEFAULT NULL,
  `image_6_text` varchar(400) DEFAULT NULL,
  `image_2_text` varchar(400) DEFAULT NULL,
  `image_1_text` varchar(400) DEFAULT NULL,
  `isuploaded` int(11) DEFAULT '1',
  `isdeleted` int(11) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_site_attendace` */

insert into `tbl_site_attendace` values (1,'1',1,'Joint cutting and sealing','test',8,'2017-03-01',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-08 00:00:00','2017-03-08 00:00:00');
insert into `tbl_site_attendace` values (2,'1',1,'Joint cutting and sealing','Testing data',8,'2017-01-01',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-01 12:04:11','2017-03-01 11:27:36');
insert into `tbl_site_attendace` values (3,'1',1,'Joint cutting and sealing','Testing data',8,'2017-03-01',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-01 12:04:11','2017-03-01 11:27:36');
insert into `tbl_site_attendace` values (4,'46',1,'Piling','Location',5,'0000-00-00',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-01 12:40:23','2017-03-01 12:40:24');
insert into `tbl_site_attendace` values (5,'1',1,'Joint cutting and sealing','jvhcjgxjgx',11,'2017-03-01',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-01 14:00:29','2017-03-01 14:00:46');
insert into `tbl_site_attendace` values (6,'1',1,'Joint cutting and sealing','nknkbkbkb',5,'2017-03-01',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-01 13:42:51','2017-03-01 14:00:46');
insert into `tbl_site_attendace` values (7,'1',1,'Joint cutting and sealing','kbkbkbjb',5,'2017-03-01',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-01 13:39:59','2017-03-01 14:00:46');
insert into `tbl_site_attendace` values (8,'1',1,'Joint cutting and sealing','jvhcjgxjgx',11,'2017-03-01',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-01 14:00:29','2017-03-01 14:01:17');
insert into `tbl_site_attendace` values (9,'46',1,'Piling','Test',6,'2017-03-02',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-02 08:59:55','2017-03-02 08:59:57');
insert into `tbl_site_attendace` values (10,'46',1,'Piling','Fff',6,'2017-03-02',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-02 09:01:49','2017-03-02 09:01:50');
insert into `tbl_site_attendace` values (11,'1',1,'Joint cutting and sealing','jfjgxjgxjgxjgx',8,'2017-03-02',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-02 09:07:37','2017-03-02 09:09:06');
insert into `tbl_site_attendace` values (12,'1',1,'Joint cutting and sealing','vhvh !jvljv ljv',5,'2017-03-02',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-02 09:16:05','2017-03-02 09:16:26');
insert into `tbl_site_attendace` values (13,'45',1,'Piling','12',1,'2017-03-02',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-02 12:58:56','2017-03-02 13:00:35');
insert into `tbl_site_attendace` values (14,'45',1,'Piling','124',11,'2017-03-02',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-02 13:02:38','2017-03-02 13:03:37');
insert into `tbl_site_attendace` values (15,'1',1,'Joint cutting and sealing','Commercial and Industrial Property has 8 Men Onsite\n\nShow Example in light text',8,'2017-03-03',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-02 23:25:09','2017-03-02 23:25:10');
insert into `tbl_site_attendace` values (16,'1',1,'Joint cutting and sealing','Commercial and Industrial Property 8 has Men Onsite',8,'2017-03-06',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-06 10:32:34','2017-03-06 10:32:36');
insert into `tbl_site_attendace` values (17,'1',1,'Joint cutting and sealing','Commercial and Industrial Property 9 has Men Onsite',9,'2017-03-06',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-06 10:39:13','2017-03-06 10:39:15');
insert into `tbl_site_attendace` values (18,'1',1,'Joint cutting and sealing','Commercial and Industrial Property 9 has Men Onsite',9,'2017-03-06',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-06 10:39:56','2017-03-06 10:39:57');
insert into `tbl_site_attendace` values (19,'48',1,'Piling','Taylor Constructions 9 has Men Onsite',9,'2017-03-06',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-06 10:41:20','2017-03-06 10:41:22');
insert into `tbl_site_attendace` values (20,'48',1,'Piling','Taylor Constructions 6 has Men Onsite',6,'2017-03-06',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-06 10:42:35','2017-03-06 10:42:37');
insert into `tbl_site_attendace` values (21,'48',1,'Piling','Erffffdsdrhhhh',9,'2017-03-06',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-06 11:44:00','2017-03-06 11:44:02');
insert into `tbl_site_attendace` values (22,'1',1,'Joint cutting and sealing','2 Foreman \n1 HSR\n2 Site Managers \n1 PM\n2 Labourers',8,'2017-03-07',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-06 23:42:11','2017-03-06 23:42:12');
insert into `tbl_site_attendace` values (23,'1',1,'Joint cutting and sealing','Ttttttt\nTtttttt',6,'2017-03-07',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-06 23:45:32','2017-03-06 23:45:33');
insert into `tbl_site_attendace` values (24,'1',1,'Joint cutting and sealing','Hhhhhhhhh',6,'2017-03-07',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-06 23:58:28','2017-03-06 23:58:29');
insert into `tbl_site_attendace` values (25,'1',1,'Joint cutting and sealing','Jjjjj',9,'2017-03-07',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-07 01:13:27','2017-03-07 01:13:27');
insert into `tbl_site_attendace` values (26,'48',1,'Piling','Test',5,'2017-03-07',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-07 10:37:58','2017-03-07 10:37:59');
insert into `tbl_site_attendace` values (27,'59',1,'Dock Levellers','Qwer',8,'2017-03-07',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-07 11:46:12','2017-03-07 11:46:14');
insert into `tbl_site_attendace` values (28,'1',1,'Joint cutting and sealing','ajsjsj',8,'2017-03-07',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-07 12:29:59','2017-03-07 12:31:30');
insert into `tbl_site_attendace` values (29,'59',1,'Dock Levellers','jdjfjf',8,'2017-03-07',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-07 12:33:00','2017-03-07 12:33:10');
insert into `tbl_site_attendace` values (30,'1',1,'Joint cutting and sealing','Ffffffff',6,'2017-03-09',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-08 20:55:39','2017-03-08 20:55:40');
insert into `tbl_site_attendace` values (31,'1',1,'Joint cutting and sealing','Hhhhhh',9,'2017-03-09',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-08 20:55:58','2017-03-08 20:55:59');
insert into `tbl_site_attendace` values (32,'1',1,'Joint cutting and sealing','Kkkk',6,'2017-03-09',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-08 22:01:54','2017-03-08 22:01:55');
insert into `tbl_site_attendace` values (33,'1',1,'Joint cutting and sealing','Hhh',7,'2017-03-09',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-08 23:30:03','2017-03-08 23:30:04');
insert into `tbl_site_attendace` values (34,'1',1,'Joint cutting and sealing','Hhhhhhh',8,'2017-03-10',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-09 21:57:22','2017-03-09 21:57:23');
insert into `tbl_site_attendace` values (35,'1',1,'Joint cutting and sealing','Ggggg',4,'2017-03-10',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-09 21:57:46','2017-03-09 21:57:47');
insert into `tbl_site_attendace` values (36,'48',1,'Piling','Ggggg',4,'2017-03-10',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-10 06:45:24','2017-03-10 06:45:26');
insert into `tbl_site_attendace` values (37,'48',1,'Piling','Hh',55,'2017-03-10',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-10 07:51:47','2017-03-10 07:51:47');
insert into `tbl_site_attendace` values (38,'48',1,'Piling','Hhh',4,'2017-03-10',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-10 07:55:45','2017-03-10 07:55:47');
insert into `tbl_site_attendace` values (39,'48',1,'Piling','Hhh',4,'2017-03-10',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-10 07:55:47','2017-03-10 07:55:47');
insert into `tbl_site_attendace` values (40,'48',1,'Piling','Hhh',4,'2017-03-10',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-10 07:55:45','2017-03-10 07:55:47');
insert into `tbl_site_attendace` values (41,'1',1,'Joint cutting and sealing','Hhhhhhh',4,'2017-03-10',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-10 11:24:06','2017-03-10 11:24:07');
insert into `tbl_site_attendace` values (42,'1',1,'Joint cutting and sealing','Dddd',7,'2017-03-10',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-10 11:24:41','2017-03-10 11:24:42');
insert into `tbl_site_attendace` values (43,'61',1,'Dock Levellers','All Fine',23,'2010-03-17',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-10 12:34:03','2017-03-10 12:34:03');
insert into `tbl_site_attendace` values (44,'61',1,'Dock Levellers','fine',23,'2010-03-17',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-10 15:27:26','2017-03-10 15:27:26');
insert into `tbl_site_attendace` values (45,'1',1,'Joint cutting and sealing','Jjjjjjj\nLlllll\nJjjj',9,'2017-03-11',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-11 08:17:14','2017-03-11 08:17:15');
insert into `tbl_site_attendace` values (46,'61',1,'Dock Levellers','Ok    ',45,'2020-03-17',0,'can-any-strategy-be-coded-into-mt4-robot-704x450.jpg','can-any-strategy-be-coded-into-mt4-robot-704x450.jpg','can-any-strategy-be-coded-into-mt4-robot-704x450.jpg','can-any-strategy-be-coded-into-mt4-robot-704x450.jpg','web_1492165900.png','web_1492165900.png',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-20 06:09:54','2017-03-20 06:09:54');
insert into `tbl_site_attendace` values (47,'61',1,'Dock Levellers','Final Test    ',12,'2020-03-17',0,'','screenshot-2.jpg','w3.png','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-20 06:10:41','2017-03-20 06:10:41');
insert into `tbl_site_attendace` values (48,'1',0,'Joint cutting and sealing','Eeeeee',5,'2017-03-21',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-21 05:13:31','2017-03-21 05:13:31');
insert into `tbl_site_attendace` values (49,'1',1,'Joint cutting and sealing','Test',5,'2017-03-21',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-21 09:32:43','2017-03-21 09:32:45');
insert into `tbl_site_attendace` values (50,'1',2,'Joint cutting and sealing','Test2',4,'2017-03-21',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-21 09:33:18','2017-03-21 09:33:18');
insert into `tbl_site_attendace` values (51,'59',1,'Dock Levellers','Testid 59',5,'2017-03-21',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-21 09:35:43','2017-03-21 09:35:45');
insert into `tbl_site_attendace` values (52,'64',2,'Dock Levellers','G',6,'2017-03-21',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-21 11:01:26','2017-03-21 11:01:27');
insert into `tbl_site_attendace` values (53,'59',1,'Dock Levellers','Ff',5,'2017-03-22',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-22 12:02:14','2017-03-22 12:02:15');
insert into `tbl_site_attendace` values (54,'1',1,'Joint cutting and sealing','Ffffff',8,'2017-03-30',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-03-30 22:46:13','2017-03-30 22:46:13');
insert into `tbl_site_attendace` values (55,'65',1,'Piling','ok',33,'2004-04-17',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-04-04 06:46:13','2017-04-04 06:46:13');
insert into `tbl_site_attendace` values (56,'65',1,'Piling','ok',23,'2004-04-17',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-04-04 06:52:35','2017-04-04 06:52:35');
insert into `tbl_site_attendace` values (58,'65',1,'Piling','ok',78,'2017-04-04',0,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-04-04 06:56:00','2017-04-04 06:56:00');
insert into `tbl_site_attendace` values (79,'65',1,'Piling','ok',233,'2017-04-07',3,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-04-07 10:12:01','2017-04-07 10:12:01');
insert into `tbl_site_attendace` values (99,'23',1,'Piling','okk',12,'2017-04-04',1,'','app3_1492076971.gif','','','','app2_1492076971.gif',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-04-13 09:49:31','2017-04-13 09:49:31');
insert into `tbl_site_attendace` values (100,'1',1,'Joint cutting and sealing','ok',23,'2017-04-12',1,'_1492165738.gif','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-04-14 10:28:58','2017-04-14 10:28:58');
insert into `tbl_site_attendace` values (101,'21',1,'Dock Levellers','tedt',78,'2017-04-19',1,'','web_1492165844.png','','','app2_1492165844.gif','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-04-14 10:30:44','2017-04-14 10:30:44');
insert into `tbl_site_attendace` values (102,'21',1,'Dock Levellers','okkk',77,'2017-04-14',1,'web_1492165900.png','','','','','app-checklist-manager_1492165900.png',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-04-14 10:31:40','2017-04-14 10:31:40');
insert into `tbl_site_attendace` values (103,'1',1,'Joint cutting and sealing','ok',23,'2017-04-21',1,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-04-21 05:49:08','2017-04-21 05:49:08');
insert into `tbl_site_attendace` values (104,'21',1,'Dock Levellers','ol',22,'2017-04-21',1,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-04-21 05:49:41','2017-04-21 05:49:41');
insert into `tbl_site_attendace` values (105,'23',1,'Piling','ok',111,'2017-04-21',1,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-04-21 05:50:04','2017-04-21 05:50:04');
insert into `tbl_site_attendace` values (106,'21',2,'Dock Levellers','testing',12,'2017-04-21',1,'','','','','','app-checklist-manager_1492758008.png',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-04-21 07:00:08','2017-04-21 07:00:08');
insert into `tbl_site_attendace` values (107,'1',2,'Joint cutting and sealing','Hello',12,'2017-05-04',1,'','','','','','unnamed_1493883258.png',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-05-04 07:34:18','2017-05-04 07:34:18');
insert into `tbl_site_attendace` values (108,'1',3,'Joint cutting and sealing','ok',14,'2017-05-04',1,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-05-04 09:12:28','2017-05-04 09:12:28');
insert into `tbl_site_attendace` values (109,'81',3,'Hello','Done',1222,'2017-06-01',1,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-06-01 10:31:06','2017-06-01 10:31:06');
insert into `tbl_site_attendace` values (110,'83',3,'Hello','xfdf',2222,'2017-06-01',1,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2017-06-01 11:23:09','2017-06-01 11:23:09');
insert into `tbl_site_attendace` values (111,'21',1,'Scott Gannaway','ok',23,'2017-06-07',1,'','','','','screenshot_1496824459.png','','','','','','okkkkk','',1,1,'2017-06-07 08:34:19','2017-06-07 08:34:19');
insert into `tbl_site_attendace` values (112,'77',1,'dasd','Helo Test New UI',45,'2017-07-21',1,'ref_1500643346.png','','','','','','','','','','','',1,1,'2017-07-21 13:22:26','2017-07-21 13:22:26');
insert into `tbl_site_attendace` values (113,'21',1,'Scott Gannaway','25def',111,'2017-07-24',1,'','','ref.png','','notification_2.png','','','','','','','',1,1,'2017-07-24 08:05:46','2017-07-24 08:05:46');
insert into `tbl_site_attendace` values (114,'77',1,'dasd','Just a Test',57,'2017-07-24',1,'','','','','ref_1500894313.png','ref.png','','','','','ok2','',1,1,'2017-07-24 11:05:13','2017-07-24 11:05:13');
insert into `tbl_site_attendace` values (115,'79',1,'214124124','Just A Test',55,'2017-07-24',1,'','','','','','ref_1500894478.png','','','','','','adad',1,1,'2017-07-24 11:07:58','2017-07-24 11:07:58');

/*Table structure for table `tbl_site_diary` */

CREATE TABLE `tbl_site_diary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `cip_staff` varchar(200) DEFAULT NULL,
  `lost_time` varchar(200) DEFAULT NULL,
  `ohs_issue` varchar(500) DEFAULT NULL,
  `labour_checklist` varchar(500) DEFAULT NULL,
  `consultant_inspection` varchar(500) DEFAULT NULL,
  `contract_issue` varchar(500) DEFAULT NULL,
  `work_completed` varchar(500) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `site_mng_sign` varchar(200) DEFAULT NULL,
  `site_mng_name` varchar(200) DEFAULT NULL,
  `site_mng_date` varchar(200) DEFAULT NULL,
  `site_formn_sign` varchar(200) DEFAULT NULL,
  `site_formn_name` varchar(200) DEFAULT NULL,
  `site_formn_date` varchar(200) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `is_approved` int(11) DEFAULT '0',
  `is_deleted` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_site_diary` */

/*Table structure for table `tbl_site_diary_instruction` */

CREATE TABLE `tbl_site_diary_instruction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `initiating_person` varchar(400) DEFAULT NULL,
  `instruction_detail` varchar(500) DEFAULT NULL,
  `recipient_person` varchar(400) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_site_diary_instruction` */

/*Table structure for table `tbl_site_diary_plant` */

CREATE TABLE `tbl_site_diary_plant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `plant_type` varchar(200) DEFAULT NULL,
  `hour_worked` varchar(200) DEFAULT NULL,
  `hire_company` varchar(200) DEFAULT NULL,
  `docket` varchar(200) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_site_diary_plant` */

/*Table structure for table `tbl_site_diary_visitor` */

CREATE TABLE `tbl_site_diary_visitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `visitor_name` varchar(200) DEFAULT NULL,
  `visit_reason` varchar(200) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_site_diary_visitor` */

/*Table structure for table `tbl_site_induction_declaration` */

CREATE TABLE `tbl_site_induction_declaration` (
  `id` int(11) NOT NULL,
  `induction_id` int(11) DEFAULT NULL,
  `edit_certifiy` varchar(200) DEFAULT NULL,
  `your_signature` varchar(200) DEFAULT NULL,
  `todays_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_site_induction_declaration` */

insert into `tbl_site_induction_declaration` values (0,NULL,'','.jpg','2017-07-27');
insert into `tbl_site_induction_declaration` values (4,NULL,'szfasf asfasf','184424','2017-02-17 13:16:02');
insert into `tbl_site_induction_declaration` values (5,NULL,'gfjfgj returtu','185121','2017-02-17 13:23:07');
insert into `tbl_site_induction_declaration` values (6,NULL,'Sam 2345235','185912','2017-02-17 13:31:16');
insert into `tbl_site_induction_declaration` values (7,NULL,'Pieter Koppen','20170218163303.png','18-02-2017');
insert into `tbl_site_induction_declaration` values (8,NULL,'Hello Shashank Hiii','133525.jpg','2017-03-17');
insert into `tbl_site_induction_declaration` values (9,NULL,'fgjfgj fjfgkj','135027.jpg','2017-03-17');
insert into `tbl_site_induction_declaration` values (10,NULL,'Sam 123','114837.jpg','2017-03-22');
insert into `tbl_site_induction_declaration` values (21,NULL,'nis gg','sign_20170217_190930.png','17-02-2017');
insert into `tbl_site_induction_declaration` values (22,NULL,'arti Mishra','20170217120603.png','17-02-2017');
insert into `tbl_site_induction_declaration` values (23,NULL,'tapasya parashar','sign_20170217_194944.png','17-02-2017');
insert into `tbl_site_induction_declaration` values (24,NULL,'saurabh Solanki','20170217125346.png','17-02-2017');
insert into `tbl_site_induction_declaration` values (25,NULL,'nit bb','sign_20170217_203405.png','17-02-2017');
insert into `tbl_site_induction_declaration` values (26,NULL,'up pp','20170218164202.png','18-02-2017');
insert into `tbl_site_induction_declaration` values (27,NULL,'nitin singhal','sign_20170221_154627.png','21-02-2017');
insert into `tbl_site_induction_declaration` values (28,NULL,'nit va','sign_20170221_191026.png','21-02-2017');
insert into `tbl_site_induction_declaration` values (29,NULL,'Sakshi goyal','20170221120738.png','21-02-2017');
insert into `tbl_site_induction_declaration` values (30,NULL,'Shashank sdgsdg','20170221123613.png','2017-02-21 14:23:51');
insert into `tbl_site_induction_declaration` values (31,NULL,'Test tetsing','20315','2017-02-21 14:35:16');
insert into `tbl_site_induction_declaration` values (32,NULL,'Shashank Raghav','112534','2017-02-22 05:57:52');
insert into `tbl_site_induction_declaration` values (33,NULL,'Shashank123 asfasf13','121129','2017-02-22');
insert into `tbl_site_induction_declaration` values (34,NULL,'Test123 asfasf','122032','2017-02-22');
insert into `tbl_site_induction_declaration` values (35,NULL,'Testing 123','12407','2017-02-22');
insert into `tbl_site_induction_declaration` values (36,NULL,'test test 1111','125913','2017-02-22');
insert into `tbl_site_induction_declaration` values (37,NULL,'test345 asasf','131842','2017-02-22');
insert into `tbl_site_induction_declaration` values (38,NULL,'Shashank testing asfasf','133118','2017-02-22');
insert into `tbl_site_induction_declaration` values (39,NULL,'dd ddd','20170302123225.jpg','23-02-2017');
insert into `tbl_site_induction_declaration` values (40,NULL,'eeeeeee eeeeeee','20170223092618.png','23-02-2017');
insert into `tbl_site_induction_declaration` values (41,NULL,'arti mishra','sign_20170227_125024.png','27-02-2017');
insert into `tbl_site_induction_declaration` values (42,NULL,'sdsdg westgwe','14433.jpg','2017-02-27');
insert into `tbl_site_induction_declaration` values (43,NULL,'iPad test hhhh','20170227072413.png','27-02-2017');
insert into `tbl_site_induction_declaration` values (44,NULL,'Web test sdgsdg','152951.jpg','2017-02-27');
insert into `tbl_site_induction_declaration` values (45,NULL,'aarti1 Mishra','20170227080625.jpg','27-02-2017');
insert into `tbl_site_induction_declaration` values (46,NULL,'narendra k','20170227082324.jpg','27-02-2017');
insert into `tbl_site_induction_declaration` values (47,NULL,'ipad test12','20170227161010.jpg','27-02-2017');
insert into `tbl_site_induction_declaration` values (48,NULL,'ipad test13','20170227161309.jpg','27-02-2017');
insert into `tbl_site_induction_declaration` values (49,NULL,'hhhh hhhh','20170228112437.jpg','28-02-2017');
insert into `tbl_site_induction_declaration` values (50,NULL,'hhhh hhh','20170228171732.jpg','28-02-2017');
insert into `tbl_site_induction_declaration` values (51,NULL,'gg gg','20170228153507.jpg','28-02-2017');
insert into `tbl_site_induction_declaration` values (52,NULL,'Arti Mishra','20170228154012.jpg','28-02-2017');
insert into `tbl_site_induction_declaration` values (53,NULL,'hhh ghhnnnn','20170228154639.jpg','28-02-2017');
insert into `tbl_site_induction_declaration` values (54,NULL,'gggggg ggggg','20170301162042.jpg','01-03-2017');
insert into `tbl_site_induction_declaration` values (55,NULL,'Nate k','20170301185654.jpg','01-03-2017');
insert into `tbl_site_induction_declaration` values (56,NULL,'Shashank sdfsdgsdg','20170302130754.jpg','2017-03-02');
insert into `tbl_site_induction_declaration` values (57,NULL,'Shashank Raghav ','15482.jpg','2017-03-02');
insert into `tbl_site_induction_declaration` values (58,NULL,'Shashank Raghav','155610.jpg','2017-03-02');
insert into `tbl_site_induction_declaration` values (59,NULL,'arti Mishra','20170306181606.jpg','06-03-2017');
insert into `tbl_site_induction_declaration` values (60,NULL,'ddddd ddddd','20170307105609.jpg','07-03-2017');
insert into `tbl_site_induction_declaration` values (61,NULL,'cbnh fvj','sign_20170307_104940.png','07-03-2017');
insert into `tbl_site_induction_declaration` values (62,NULL,'gg gg','20170308074018.jpg','08-03-2017');
insert into `tbl_site_induction_declaration` values (63,NULL,'hhhhhh oooooo','20170311182317.jpg','11-03-2017');
insert into `tbl_site_induction_declaration` values (64,NULL,'n k','20170321155218.jpg','21-03-2017');
insert into `tbl_site_induction_declaration` values (65,NULL,'jk h','20170321181351.jpg','21-03-2017');
insert into `tbl_site_induction_declaration` values (66,NULL,'hhhhhh jjjjjj','20170331085202.jpg','31-03-2017');
insert into `tbl_site_induction_declaration` values (67,NULL,'sagfsdg dgsdg','165128.jpg','2017-04-03');
insert into `tbl_site_induction_declaration` values (68,NULL,'sam 13124','13483.jpg','2017-04-12');
insert into `tbl_site_induction_declaration` values (69,NULL,'Shanky Test','171243.jpg','2017-04-14');
insert into `tbl_site_induction_declaration` values (70,NULL,'Shashank okkk','17178.jpg','2017-04-14');
insert into `tbl_site_induction_declaration` values (71,NULL,'aesgwasged 124124','172042.jpg','2017-04-14');
insert into `tbl_site_induction_declaration` values (72,NULL,'adfasf weatw3te','172828.jpg','2017-04-14');
insert into `tbl_site_induction_declaration` values (73,NULL,'Tetsing Hello','13924.jpg','2017-05-04');
insert into `tbl_site_induction_declaration` values (74,NULL,'Hello Shashank final','143834.jpg','2017-05-04');
insert into `tbl_site_induction_declaration` values (75,NULL,'Samm Hello','172228.jpg','2017-05-05');
insert into `tbl_site_induction_declaration` values (76,NULL,'Hello Shashank asfasf','17273.jpg','2017-05-05');
insert into `tbl_site_induction_declaration` values (77,NULL,'sdgsdg sdgsdg','165511.jpg','2017-05-08');
insert into `tbl_site_induction_declaration` values (78,NULL,'ssss 2314','164054.jpg','2017-05-26');
insert into `tbl_site_induction_declaration` values (79,NULL,'jjj afet','165838.jpg','2017-05-26');
insert into `tbl_site_induction_declaration` values (80,NULL,'www 124124','17318.jpg','2017-05-26');
insert into `tbl_site_induction_declaration` values (81,NULL,'Testing Induction Hello','132959.jpg','2017-06-01');
insert into `tbl_site_induction_declaration` values (82,NULL,'sam 121313','165032.jpg','2017-06-01');
insert into `tbl_site_induction_declaration` values (83,NULL,'qwrqwr 124124','165144.jpg','2017-06-01');
insert into `tbl_site_induction_declaration` values (84,NULL,'xzvzxv ASDASF','165434.jpg','2017-06-01');
insert into `tbl_site_induction_declaration` values (85,NULL,'asf asf','.jpg','2017-07-27');
insert into `tbl_site_induction_declaration` values (86,NULL,'asrasr asrasr','.jpg','2017-07-27');
insert into `tbl_site_induction_declaration` values (87,NULL,'zdgfsdg sdgsdg','151819.jpg','2017-07-27');
insert into `tbl_site_induction_declaration` values (89,NULL,'asfrasf 2541235','1608.jpg','2017-07-27');

/*Table structure for table `tbl_site_induction_topics` */

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

insert into `tbl_site_induction_topics` values (4,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'');
insert into `tbl_site_induction_topics` values (5,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'');
insert into `tbl_site_induction_topics` values (6,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'');
insert into `tbl_site_induction_topics` values (7,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (8,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (9,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (10,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (21,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (22,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (23,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (24,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (25,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (26,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (27,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (28,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (29,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (30,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (31,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (32,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (33,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (34,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (35,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (36,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (37,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (38,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (39,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (40,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (41,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (42,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (43,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (44,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (45,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (46,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (47,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (48,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (49,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (50,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (51,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (52,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (53,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (54,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (55,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (56,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (57,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (58,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (59,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (60,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (61,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (62,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (63,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (64,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (65,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (66,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (67,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (68,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (69,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (70,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (71,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (72,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (73,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (74,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (75,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (76,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (77,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (78,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (79,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (80,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (81,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (82,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (83,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (84,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (86,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (87,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');
insert into `tbl_site_induction_topics` values (89,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,'');

/*Table structure for table `tbl_site_information` */

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

insert into `tbl_site_information` values (1,'Tec Building ','Excavation of Sewer Line ','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1);
insert into `tbl_site_information` values (2,'Location 1','Detailed Description 2','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1);

/*Table structure for table `tbl_site_upload_attachment` */

CREATE TABLE `tbl_site_upload_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) DEFAULT '0',
  `induction_id` int(11) DEFAULT '0',
  `image_url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `image_id` (`image_id`,`induction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=511 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_site_upload_attachment` */

insert into `tbl_site_upload_attachment` values (213,0,4,'uploaded images/dfsdfb.gif');
insert into `tbl_site_upload_attachment` values (214,1,4,'uploaded images/app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (215,2,4,'uploaded images/screenshot-1.jpg');
insert into `tbl_site_upload_attachment` values (216,3,4,'uploaded images/dfsdfb.gif');
insert into `tbl_site_upload_attachment` values (217,0,5,'uploaded images/app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (218,1,5,'uploaded images/app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (219,2,5,'uploaded images/app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (220,3,5,'uploaded images/phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (221,0,6,'API/Uploads/phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (222,1,6,'API/Uploads/phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (223,2,6,'API/Uploads/screenshot-2.jpg');
insert into `tbl_site_upload_attachment` values (224,3,6,'API/Uploads/screenshot-2.jpg');
insert into `tbl_site_upload_attachment` values (225,0,21,'20170217_190706.jpg');
insert into `tbl_site_upload_attachment` values (226,1,21,'20170217_190738.jpg');
insert into `tbl_site_upload_attachment` values (227,2,21,'20170217_190804.jpg');
insert into `tbl_site_upload_attachment` values (228,3,21,'20170217_190830.jpg');
insert into `tbl_site_upload_attachment` values (229,0,22,'20170217120500.png');
insert into `tbl_site_upload_attachment` values (230,1,22,'20170217120504.png');
insert into `tbl_site_upload_attachment` values (231,2,22,'20170217120509.png');
insert into `tbl_site_upload_attachment` values (232,3,22,'20170217120512.png');
insert into `tbl_site_upload_attachment` values (233,0,23,'20170217_194734.jpg');
insert into `tbl_site_upload_attachment` values (234,1,23,'20170217_194746.jpg');
insert into `tbl_site_upload_attachment` values (235,2,23,'20170217_194755.jpg');
insert into `tbl_site_upload_attachment` values (236,3,23,'20170217_194802.jpg');
insert into `tbl_site_upload_attachment` values (237,0,24,'20170217125300.png');
insert into `tbl_site_upload_attachment` values (238,1,24,'20170217125313.png');
insert into `tbl_site_upload_attachment` values (239,2,24,'20170217125317.png');
insert into `tbl_site_upload_attachment` values (240,3,24,'20170217125322.png');
insert into `tbl_site_upload_attachment` values (241,0,25,'20170217_203337.jpg');
insert into `tbl_site_upload_attachment` values (242,1,25,'20170217_203344.jpg');
insert into `tbl_site_upload_attachment` values (243,2,25,'20170217_203356.jpg');
insert into `tbl_site_upload_attachment` values (244,3,25,'20170217_203351.jpg');
insert into `tbl_site_upload_attachment` values (245,0,7,'20170218163043.png');
insert into `tbl_site_upload_attachment` values (246,1,7,'20170218163059.png');
insert into `tbl_site_upload_attachment` values (247,2,7,'20170218163153.png');
insert into `tbl_site_upload_attachment` values (248,3,7,'20170218163231.png');
insert into `tbl_site_upload_attachment` values (249,0,26,'20170218164025.png');
insert into `tbl_site_upload_attachment` values (250,1,26,'20170218164033.png');
insert into `tbl_site_upload_attachment` values (251,2,26,'20170218164043.png');
insert into `tbl_site_upload_attachment` values (252,3,26,'20170218164052.png');
insert into `tbl_site_upload_attachment` values (253,0,27,'20170221_154449.jpg');
insert into `tbl_site_upload_attachment` values (254,1,27,'20170221_154524.jpg');
insert into `tbl_site_upload_attachment` values (255,2,27,'20170221_154546.jpg');
insert into `tbl_site_upload_attachment` values (256,3,27,'20170221_154601.jpg');
insert into `tbl_site_upload_attachment` values (257,0,28,'20170221_190938.jpg');
insert into `tbl_site_upload_attachment` values (258,1,28,'20170221_190945.jpg');
insert into `tbl_site_upload_attachment` values (259,2,28,'20170221_191001.jpg');
insert into `tbl_site_upload_attachment` values (260,3,28,'20170221_191011.jpg');
insert into `tbl_site_upload_attachment` values (261,0,29,'20170221120640.png');
insert into `tbl_site_upload_attachment` values (262,1,29,'20170221120647.png');
insert into `tbl_site_upload_attachment` values (263,2,29,'20170221120714.png');
insert into `tbl_site_upload_attachment` values (264,3,29,'20170221120723.png');
insert into `tbl_site_upload_attachment` values (265,0,30,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (266,1,30,'phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (267,2,30,'screenshot-2.jpg');
insert into `tbl_site_upload_attachment` values (268,3,30,'screenshot-1.jpg');
insert into `tbl_site_upload_attachment` values (269,0,31,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (270,1,31,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (271,2,31,'screenshot-1.jpg');
insert into `tbl_site_upload_attachment` values (272,3,31,'screenshot-3.png');
insert into `tbl_site_upload_attachment` values (273,0,32,'screenshot-2.jpg');
insert into `tbl_site_upload_attachment` values (274,1,32,'screenshot-3.png');
insert into `tbl_site_upload_attachment` values (275,2,32,'screenshot-1.jpg');
insert into `tbl_site_upload_attachment` values (276,3,32,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (277,0,33,'screenshot-3.png');
insert into `tbl_site_upload_attachment` values (278,1,33,'phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (279,2,33,'screenshot-1.jpg');
insert into `tbl_site_upload_attachment` values (280,3,33,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (281,0,34,'phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (282,1,34,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (283,2,34,'screenshot-2.jpg');
insert into `tbl_site_upload_attachment` values (284,3,34,'screenshot-3.png');
insert into `tbl_site_upload_attachment` values (285,0,35,'Home Page - Headings Safety Sub Heading Project Registers.png');
insert into `tbl_site_upload_attachment` values (286,1,35,'phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (287,2,35,'phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (288,3,35,'screenshot-2.jpg');
insert into `tbl_site_upload_attachment` values (289,0,36,'phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (290,1,36,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (291,2,36,'screenshot-2.jpg');
insert into `tbl_site_upload_attachment` values (292,3,36,'screenshot-3.png');
insert into `tbl_site_upload_attachment` values (293,0,37,'phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (294,1,37,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (295,2,37,'screenshot-2.jpg');
insert into `tbl_site_upload_attachment` values (296,3,37,'screenshot-1.jpg');
insert into `tbl_site_upload_attachment` values (297,0,38,'screenshot-2.jpg');
insert into `tbl_site_upload_attachment` values (298,1,38,'phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (299,2,38,'screenshot-3.png');
insert into `tbl_site_upload_attachment` values (300,3,38,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (301,0,39,'20170223092333.png');
insert into `tbl_site_upload_attachment` values (302,1,39,'20170223092345.png');
insert into `tbl_site_upload_attachment` values (303,2,39,'20170223092355.png');
insert into `tbl_site_upload_attachment` values (304,3,39,'20170223092403.png');
insert into `tbl_site_upload_attachment` values (305,0,40,'20170223092529.png');
insert into `tbl_site_upload_attachment` values (306,1,40,'20170223092537.png');
insert into `tbl_site_upload_attachment` values (307,2,40,'20170223092549.png');
insert into `tbl_site_upload_attachment` values (308,3,40,'20170223092557.png');
insert into `tbl_site_upload_attachment` values (309,0,41,'20170227_124948.jpg');
insert into `tbl_site_upload_attachment` values (310,1,41,'20170227_124955.jpg');
insert into `tbl_site_upload_attachment` values (311,2,41,'20170227_125002.jpg');
insert into `tbl_site_upload_attachment` values (312,3,41,'20170227_125009.jpg');
insert into `tbl_site_upload_attachment` values (313,0,42,'phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (314,1,42,'screenshot-1.jpg');
insert into `tbl_site_upload_attachment` values (315,2,42,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (316,3,42,'20170223092557.png');
insert into `tbl_site_upload_attachment` values (317,0,43,'20170227072330.png');
insert into `tbl_site_upload_attachment` values (318,1,43,'20170227072338.png');
insert into `tbl_site_upload_attachment` values (319,2,43,'20170227072347.png');
insert into `tbl_site_upload_attachment` values (320,3,43,'20170227072354.png');
insert into `tbl_site_upload_attachment` values (321,0,44,'phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (322,1,44,'International-climbing_&_9a7c8360-e2c0-49d6-8b19-71347b43c081.jpg');
insert into `tbl_site_upload_attachment` values (323,2,44,'20170223092557.png');
insert into `tbl_site_upload_attachment` values (324,3,44,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (325,0,45,'20170227080535.jpg');
insert into `tbl_site_upload_attachment` values (326,1,45,'20170227080544.jpg');
insert into `tbl_site_upload_attachment` values (327,2,45,'20170227080558.jpg');
insert into `tbl_site_upload_attachment` values (328,3,45,'20170227080613.jpg');
insert into `tbl_site_upload_attachment` values (329,0,46,'20170227082221.jpg');
insert into `tbl_site_upload_attachment` values (330,1,46,'20170227082231.jpg');
insert into `tbl_site_upload_attachment` values (331,2,46,'20170227082246.jpg');
insert into `tbl_site_upload_attachment` values (332,3,46,'20170227082305.jpg');
insert into `tbl_site_upload_attachment` values (333,0,47,'20170227160931.jpg');
insert into `tbl_site_upload_attachment` values (334,1,47,'20170227160937.jpg');
insert into `tbl_site_upload_attachment` values (335,2,47,'20170227160943.jpg');
insert into `tbl_site_upload_attachment` values (336,3,47,'20170227160950.jpg');
insert into `tbl_site_upload_attachment` values (337,0,48,'20170227161230.jpg');
insert into `tbl_site_upload_attachment` values (338,1,48,'20170227161237.jpg');
insert into `tbl_site_upload_attachment` values (339,2,48,'20170227161243.jpg');
insert into `tbl_site_upload_attachment` values (340,3,48,'20170227161251.jpg');
insert into `tbl_site_upload_attachment` values (341,0,49,'20170228112344.jpg');
insert into `tbl_site_upload_attachment` values (342,1,49,'20170228112403.jpg');
insert into `tbl_site_upload_attachment` values (343,2,49,'20170228112413.jpg');
insert into `tbl_site_upload_attachment` values (344,3,49,'20170228112422.jpg');
insert into `tbl_site_upload_attachment` values (345,0,50,'20170228171632.jpg');
insert into `tbl_site_upload_attachment` values (346,1,50,'20170228171644.jpg');
insert into `tbl_site_upload_attachment` values (347,2,50,'20170228171656.jpg');
insert into `tbl_site_upload_attachment` values (348,3,50,'20170228171721.jpg');
insert into `tbl_site_upload_attachment` values (349,0,51,'20170228153332.jpg');
insert into `tbl_site_upload_attachment` values (350,1,51,'20170228153344.jpg');
insert into `tbl_site_upload_attachment` values (351,2,51,'20170228153416.jpg');
insert into `tbl_site_upload_attachment` values (352,3,51,'20170228153423.jpg');
insert into `tbl_site_upload_attachment` values (353,0,52,'20170228153912.jpg');
insert into `tbl_site_upload_attachment` values (354,1,52,'20170228153922.jpg');
insert into `tbl_site_upload_attachment` values (355,2,52,'20170228153934.jpg');
insert into `tbl_site_upload_attachment` values (356,3,52,'20170228153941.jpg');
insert into `tbl_site_upload_attachment` values (357,0,53,'20170228154602.jpg');
insert into `tbl_site_upload_attachment` values (358,1,53,'20170228154612.jpg');
insert into `tbl_site_upload_attachment` values (359,2,53,'20170228154621.jpg');
insert into `tbl_site_upload_attachment` values (360,3,53,'20170228154628.jpg');
insert into `tbl_site_upload_attachment` values (361,0,54,'20170301161921.jpg');
insert into `tbl_site_upload_attachment` values (362,1,54,'20170301161953.jpg');
insert into `tbl_site_upload_attachment` values (363,2,54,'20170301162002.jpg');
insert into `tbl_site_upload_attachment` values (364,3,54,'20170301162015.jpg');
insert into `tbl_site_upload_attachment` values (365,0,55,'20170301185621.jpg');
insert into `tbl_site_upload_attachment` values (366,1,55,'20170301185627.jpg');
insert into `tbl_site_upload_attachment` values (367,2,55,'20170301185634.jpg');
insert into `tbl_site_upload_attachment` values (368,3,55,'20170301185641.jpg');
insert into `tbl_site_upload_attachment` values (369,0,56,'cont.png');
insert into `tbl_site_upload_attachment` values (370,1,56,'favicon.png');
insert into `tbl_site_upload_attachment` values (371,2,56,'deny.png');
insert into `tbl_site_upload_attachment` values (372,3,56,'spinner.gif');
insert into `tbl_site_upload_attachment` values (373,0,57,'cont.png');
insert into `tbl_site_upload_attachment` values (374,1,57,'favicon.png');
insert into `tbl_site_upload_attachment` values (375,2,57,'spinner.gif');
insert into `tbl_site_upload_attachment` values (376,3,57,'edit.png');
insert into `tbl_site_upload_attachment` values (377,0,58,'deny.png');
insert into `tbl_site_upload_attachment` values (378,1,58,'edit.png');
insert into `tbl_site_upload_attachment` values (379,2,58,'cont.png');
insert into `tbl_site_upload_attachment` values (380,3,58,'favicon.png');
insert into `tbl_site_upload_attachment` values (381,0,59,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (382,1,59,'20170306181544.jpg');
insert into `tbl_site_upload_attachment` values (383,2,59,'20170306181550.jpg');
insert into `tbl_site_upload_attachment` values (384,3,59,'20170306181555.jpg');
insert into `tbl_site_upload_attachment` values (385,0,60,'20170307105539.jpg');
insert into `tbl_site_upload_attachment` values (386,1,60,'20170307105544.jpg');
insert into `tbl_site_upload_attachment` values (387,2,60,'20170307105551.jpg');
insert into `tbl_site_upload_attachment` values (388,3,60,'20170307105557.jpg');
insert into `tbl_site_upload_attachment` values (389,0,61,'20170307_104849.jpg');
insert into `tbl_site_upload_attachment` values (390,1,61,'20170307_104902.jpg');
insert into `tbl_site_upload_attachment` values (391,2,61,'20170307_104914.jpg');
insert into `tbl_site_upload_attachment` values (392,3,61,'20170307_104925.jpg');
insert into `tbl_site_upload_attachment` values (393,0,62,'20170308073942.jpg');
insert into `tbl_site_upload_attachment` values (394,1,62,'20170308073954.jpg');
insert into `tbl_site_upload_attachment` values (395,2,62,'20170308074003.jpg');
insert into `tbl_site_upload_attachment` values (396,3,62,'20170308074008.jpg');
insert into `tbl_site_upload_attachment` values (397,0,63,'20170311182219.jpg');
insert into `tbl_site_upload_attachment` values (398,1,63,'20170311182229.jpg');
insert into `tbl_site_upload_attachment` values (399,2,63,'20170311182242.jpg');
insert into `tbl_site_upload_attachment` values (400,3,63,'favicon.png');
insert into `tbl_site_upload_attachment` values (401,0,8,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (402,1,8,'phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (403,2,8,'Home Page - Headings Safety Sub Heading Project Registers.png');
insert into `tbl_site_upload_attachment` values (404,3,8,'phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (405,0,9,'phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (406,1,9,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (407,2,9,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (408,3,9,'phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (409,0,64,'20170321155140.jpg');
insert into `tbl_site_upload_attachment` values (410,1,64,'20170321155150.jpg');
insert into `tbl_site_upload_attachment` values (411,2,64,'20170321155157.jpg');
insert into `tbl_site_upload_attachment` values (412,3,64,'20170321155205.jpg');
insert into `tbl_site_upload_attachment` values (413,0,65,'20170321181317.jpg');
insert into `tbl_site_upload_attachment` values (414,1,65,'20170321181324.jpg');
insert into `tbl_site_upload_attachment` values (415,2,65,'20170321181332.jpg');
insert into `tbl_site_upload_attachment` values (416,3,65,'20170321181339.jpg');
insert into `tbl_site_upload_attachment` values (417,0,10,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (418,1,10,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (419,2,10,'phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (420,3,10,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (421,0,66,'20170331085120.jpg');
insert into `tbl_site_upload_attachment` values (422,1,66,'20170331085127.jpg');
insert into `tbl_site_upload_attachment` values (423,2,66,'20170331085135.jpg');
insert into `tbl_site_upload_attachment` values (424,3,66,'20170331085141.jpg');
insert into `tbl_site_upload_attachment` values (425,0,67,'php.png');
insert into `tbl_site_upload_attachment` values (426,1,67,'phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (427,2,67,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (428,3,67,'4703273699_39b399711c_o_comp.jpg');
insert into `tbl_site_upload_attachment` values (429,0,0,'php.png');
insert into `tbl_site_upload_attachment` values (430,0,1,'phpcode-287392.jpeg');
insert into `tbl_site_upload_attachment` values (431,1,1,'php.png');
insert into `tbl_site_upload_attachment` values (432,0,68,'app3.gif');
insert into `tbl_site_upload_attachment` values (433,1,68,'app2.gif');
insert into `tbl_site_upload_attachment` values (434,2,68,'4703273699_39b399711c_o_comp.jpg');
insert into `tbl_site_upload_attachment` values (435,3,68,'app.png');
insert into `tbl_site_upload_attachment` values (436,0,69,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (437,1,69,'app2.gif');
insert into `tbl_site_upload_attachment` values (438,2,69,'can-any-strategy-be-coded-into-mt4-robot-704x450.jpg');
insert into `tbl_site_upload_attachment` values (439,3,69,'app3.gif');
insert into `tbl_site_upload_attachment` values (440,0,70,'app-checklist-manager.png');
insert into `tbl_site_upload_attachment` values (441,1,70,'app2.gif');
insert into `tbl_site_upload_attachment` values (442,2,70,'app.png');
insert into `tbl_site_upload_attachment` values (443,3,70,'app3.gif');
insert into `tbl_site_upload_attachment` values (444,0,71,'app2.gif');
insert into `tbl_site_upload_attachment` values (445,1,71,'app2.gif');
insert into `tbl_site_upload_attachment` values (446,2,71,'can-any-strategy-be-coded-into-mt4-robot-704x450.jpg');
insert into `tbl_site_upload_attachment` values (447,3,71,'app.png');
insert into `tbl_site_upload_attachment` values (448,0,72,'app.png');
insert into `tbl_site_upload_attachment` values (449,1,72,'app2.gif');
insert into `tbl_site_upload_attachment` values (450,2,72,'4703273699_39b399711c_o_comp.jpg');
insert into `tbl_site_upload_attachment` values (451,3,72,'app2.gif');
insert into `tbl_site_upload_attachment` values (452,0,2,'unnamed.png');
insert into `tbl_site_upload_attachment` values (453,0,73,'unnamed.png');
insert into `tbl_site_upload_attachment` values (454,1,73,'wallhaven-204176.png');
insert into `tbl_site_upload_attachment` values (455,2,73,'unnamed.png');
insert into `tbl_site_upload_attachment` values (456,3,73,'wallhaven-204176.png');
insert into `tbl_site_upload_attachment` values (457,0,74,'wallhaven-204176.png');
insert into `tbl_site_upload_attachment` values (458,1,74,'wallhaven-204176.png');
insert into `tbl_site_upload_attachment` values (459,2,74,'unnamed.png');
insert into `tbl_site_upload_attachment` values (460,3,74,'unnamed.png');
insert into `tbl_site_upload_attachment` values (461,0,75,'wallhaven-204176.png');
insert into `tbl_site_upload_attachment` values (462,1,75,'wallhaven-204176.png');
insert into `tbl_site_upload_attachment` values (463,2,75,'wallhaven-204176.png');
insert into `tbl_site_upload_attachment` values (464,3,75,'unnamed.png');
insert into `tbl_site_upload_attachment` values (465,0,76,'wallhaven-204176.png');
insert into `tbl_site_upload_attachment` values (466,1,76,'wallhaven-204176.png');
insert into `tbl_site_upload_attachment` values (467,2,76,'unnamed.png');
insert into `tbl_site_upload_attachment` values (468,3,76,'wallhaven-204176.png');
insert into `tbl_site_upload_attachment` values (469,0,77,'wallhaven-204176.png');
insert into `tbl_site_upload_attachment` values (470,1,77,'slider_1.jpg');
insert into `tbl_site_upload_attachment` values (471,2,77,'');
insert into `tbl_site_upload_attachment` values (472,3,77,'screenshot.png');
insert into `tbl_site_upload_attachment` values (473,0,78,'slider_new1.jpg');
insert into `tbl_site_upload_attachment` values (474,1,78,'slider_1.jpg');
insert into `tbl_site_upload_attachment` values (475,2,78,'Login – 1 ref p1 .png');
insert into `tbl_site_upload_attachment` values (476,3,78,'slider_new1.jpg');
insert into `tbl_site_upload_attachment` values (477,0,79,'screenshot.png');
insert into `tbl_site_upload_attachment` values (478,1,79,'slider_new1.jpg');
insert into `tbl_site_upload_attachment` values (479,2,79,'slider_1.jpg');
insert into `tbl_site_upload_attachment` values (480,3,79,'Index Page p2.png');
insert into `tbl_site_upload_attachment` values (481,0,80,'Safety (1).png');
insert into `tbl_site_upload_attachment` values (482,1,80,'5.png');
insert into `tbl_site_upload_attachment` values (483,2,80,'5.png');
insert into `tbl_site_upload_attachment` values (484,3,80,'Safety (1).png');
insert into `tbl_site_upload_attachment` values (485,0,81,'slide1.png');
insert into `tbl_site_upload_attachment` values (486,1,81,'logo.png');
insert into `tbl_site_upload_attachment` values (487,2,81,'slide1.png');
insert into `tbl_site_upload_attachment` values (488,3,81,'slide1.png');
insert into `tbl_site_upload_attachment` values (489,0,82,'slide1.png');
insert into `tbl_site_upload_attachment` values (490,1,82,'slide1.png');
insert into `tbl_site_upload_attachment` values (491,2,82,'slide1.png');
insert into `tbl_site_upload_attachment` values (492,3,82,'slide1.png');
insert into `tbl_site_upload_attachment` values (493,0,83,'slide1.png');
insert into `tbl_site_upload_attachment` values (494,1,83,'slide1.png');
insert into `tbl_site_upload_attachment` values (495,2,83,'slide1.png');
insert into `tbl_site_upload_attachment` values (496,3,83,'slide1.png');
insert into `tbl_site_upload_attachment` values (497,0,84,'slide1.png');
insert into `tbl_site_upload_attachment` values (498,1,84,'slide1.png');
insert into `tbl_site_upload_attachment` values (499,2,84,'slide1.png');
insert into `tbl_site_upload_attachment` values (500,3,84,'slide1.png');
insert into `tbl_site_upload_attachment` values (501,0,85,'ref.png');
insert into `tbl_site_upload_attachment` values (502,1,85,'ref.png');
insert into `tbl_site_upload_attachment` values (503,0,86,'');
insert into `tbl_site_upload_attachment` values (504,0,87,'');
insert into `tbl_site_upload_attachment` values (506,0,89,'notification_1.png');
insert into `tbl_site_upload_attachment` values (507,1,89,'notification_1.png');
insert into `tbl_site_upload_attachment` values (508,2,89,'notification_3.png');
insert into `tbl_site_upload_attachment` values (509,3,89,'notification_3.png');
insert into `tbl_site_upload_attachment` values (510,7,89,'ref.png');

/*Table structure for table `tbl_user` */

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
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_visitor_induction` */

insert into `tbl_visitor_induction` values (1,'1',0,'Project Manager','2017-03-02','lmonh fmjgshmzlishm,shysters,says','','jjj','77777777','hhhh','20:56','08:56',1,1,'2017-03-02 06:51:46','2017-03-02 08:59:57');
insert into `tbl_visitor_induction` values (2,'1',0,'hchckh','2017-03-02','gcgxmgxj','','hkckh','2424576727','gdmgcjgc','14:38','14:40',1,1,'2017-03-02 09:07:59','2017-03-02 09:09:06');
insert into `tbl_visitor_induction` values (3,'1',0,'Project Manager','2017-03-02','em','','nk','555','hhh','14:44','14:45',1,1,'2017-03-02 09:16:32','2017-03-02 09:16:34');
insert into `tbl_visitor_induction` values (4,'1',0,'bckhkhv','2017-03-02','cugi','','chvjvjv','75757576767','hcgjxkb','14:48','14:49',1,1,'2017-03-02 09:16:50','2017-03-02 09:17:20');
insert into `tbl_visitor_induction` values (5,'1',0,'ajvj','2017-03-02','hello','','arti','7531585','fkvjv','18:31','18:32',1,1,'2017-03-02 13:01:16','2017-03-02 13:02:02');
insert into `tbl_visitor_induction` values (6,'1',0,'ffuobg v','2017-03-02','dudjf','','akkdfk','1349797','kvvi','18:34','18:35',1,1,'2017-03-02 13:04:07','2017-03-02 13:04:52');
insert into `tbl_visitor_induction` values (11,'2',0,'h','2017-03-03','g','','h','4','j','18:39','18:39',1,1,'2017-03-03 13:09:11','2017-03-03 13:09:46');
insert into `tbl_visitor_induction` values (12,'1',0,'i','2017-03-03','j','','h','4','k','18:21','18:35',1,1,'2017-03-03 12:51:36','2017-03-03 13:09:46');
insert into `tbl_visitor_induction` values (13,'1',0,'','2017-03-06','abc','','dfg','123567','we','16:14','19:14',1,1,'2017-03-06 10:45:23','2017-03-06 10:45:26');
insert into `tbl_visitor_induction` values (14,'1',0,'','2017-03-06','h,l','','jjj','1245','wet','16:15','16:17',1,1,'2017-03-06 10:45:58','2017-03-06 10:48:01');
insert into `tbl_visitor_induction` values (15,'1',0,'','2017-03-06','jfufdd','','ff','12533','wasted','17:14','15:14',1,1,'2017-03-06 11:45:39','2017-03-06 11:45:40');
insert into `tbl_visitor_induction` values (16,'1',0,'','2017-03-06','Greg','','daddy','124567','Seth','17:15','17:16',1,1,'2017-03-06 11:46:03','2017-03-06 11:46:21');
insert into `tbl_visitor_induction` values (17,'1',0,'','2017-03-07','hh','','ffff,5555555#,#,#ggggg,11134445','','reasgfgfggfh','15:51','15:54',1,1,'2017-03-07 10:22:18','2017-03-07 10:31:18');
insert into `tbl_visitor_induction` values (18,'1',0,'oc','2017-03-07','gg','','f,8#,#,#g,8','','g','16:39','16:39',1,1,'2017-03-07 11:09:35','2017-03-07 11:10:09');
insert into `tbl_visitor_induction` values (19,'1',0,'Principle','2017-03-07','gh','','j,1#,#,#u,4','','g','16:45','16:46',1,1,'2017-03-07 11:15:26','2017-03-07 11:16:12');
insert into `tbl_visitor_induction` values (20,'1',0,'','2017-03-07','also','','ff,1111#,#,#,','','gfg','17:11','17:12',1,1,'2017-03-07 11:42:36','2017-03-07 11:42:43');
insert into `tbl_visitor_induction` values (21,'1',0,'','2017-03-07','asd','','try,5678#awe,6789#awe,1234#awe,1234','','set','17:13','17:14',1,1,'2017-03-07 11:44:22','2017-03-07 11:44:29');
insert into `tbl_visitor_induction` values (22,'1',0,'Principle','2017-03-07','fifif','','ucfif,258888#,#,#,','','fifi','18:04','18:05',1,1,'2017-03-07 12:34:41','2017-03-07 12:35:09');
insert into `tbl_visitor_induction` values (23,'1',0,'Principle','2017-03-07','abv','','tg,555#jjm,777#jm,788#nnn,888','','hhn','18:05','18:05',1,1,'2017-03-07 12:35:18','2017-03-07 12:35:45');
insert into `tbl_visitor_induction` values (24,'1',0,'','2017-03-08','gggggg','','ppppppp ppppppp,00000000#,#,#,','','site visit','07:40','07:41',1,1,'2017-03-07 20:41:16','2017-03-07 20:41:31');
insert into `tbl_visitor_induction` values (25,'1',0,'','2017-03-08','rrrrrr','','hhhhh nnnnn,5555555#,#,#,','','iiigggg.','07:41','07:42',1,1,'2017-03-07 20:42:13','2017-03-07 20:42:29');
insert into `tbl_visitor_induction` values (26,'1',0,'Principle','2017-03-09','nit','','v,5#,#,#gh,55','','for','12:47','14:54',1,1,'2017-03-09 07:17:20','2017-03-09 09:25:02');
insert into `tbl_visitor_induction` values (27,'1',0,'Principle','2017-03-09','form','','name,1#,#,#,','','jka','12:54','11:44',1,1,'2017-03-09 07:24:12','2017-03-10 06:14:06');
insert into `tbl_visitor_induction` values (28,'1',0,'Principle','2017-03-09','form2','','s,5#,#,#,','','s','12:54','14:58',1,1,'2017-03-09 07:24:56','2017-03-09 09:28:46');
insert into `tbl_visitor_induction` values (29,'1',0,'','2017-03-10','gggg','','tttttt,44444#,#,#,','','rrrrr','08:44','08:45',1,1,'2017-03-09 21:44:56','2017-03-09 21:45:31');
insert into `tbl_visitor_induction` values (30,'1',0,'','2017-03-10','dddddd','','ddddd,33333#,#,#,','','dddddd','08:45','08:50',1,1,'2017-03-09 21:49:33','2017-03-09 21:50:05');
insert into `tbl_visitor_induction` values (31,'1',0,'','2017-03-10','eeeeee','','ssssss,33333#,#,#,','','fffff','08:50','22:20',1,1,'2017-03-09 21:50:47','2017-03-10 11:20:34');
insert into `tbl_visitor_induction` values (32,'1',0,'','2017-03-10','wwwww','','dddddd,44444#,#,#,','','fffff','08:51','08:51',1,1,'2017-03-09 21:51:22','2017-03-09 21:51:53');
insert into `tbl_visitor_induction` values (33,'1',0,'','2017-03-10','jjjj','','aaaa,22222#,#,#,','','aaaaa','08:52','08:56',1,1,'2017-03-09 21:55:13','2017-03-09 21:56:18');
insert into `tbl_visitor_induction` values (34,'1',0,'','2017-03-10','dddd','','eeeee,33333#,#,#,','','fffff','08:55','22:21',1,1,'2017-03-09 21:56:06','2017-03-10 11:21:54');
insert into `tbl_visitor_induction` values (35,'1',0,'','2017-03-10','ggggg','','fffff,44444#,#,#,','','fffff','09:39','22:21',1,1,'2017-03-09 22:40:05','2017-03-10 11:21:33');
insert into `tbl_visitor_induction` values (36,'1',0,'','2017-03-10','gchh hgcghchgchg','','ggggg chic,4647547647#,#,#,','','thxgjdghxghcgjcjh mh','11:11','11:21',1,1,'2017-03-10 05:51:08','2017-03-10 05:51:52');
insert into `tbl_visitor_induction` values (37,'1',0,'Principle','2017-03-10','fh','','vb,44#jj,#jj,#,','','j','11:24','11:34',1,1,'2017-03-10 05:54:58','2017-03-10 06:04:24');
insert into `tbl_visitor_induction` values (38,'1',0,'','2017-03-10','yet','','try,6867676#,#,#,','','hghg','11:26','11:28',1,1,'2017-03-10 05:57:07','2017-03-10 05:58:15');
insert into `tbl_visitor_induction` values (39,'1',0,'','2017-03-10','ff','','hhh,866#,#,#,','','hhh','11:28','11:30',1,1,'2017-03-10 05:59:07','2017-03-10 06:00:52');
insert into `tbl_visitor_induction` values (40,'1',0,'','2017-03-10','ffff','','ff,6667#,#,#,','','ghh','11:32','11:33',1,1,'2017-03-10 06:02:57','2017-03-10 06:03:44');
insert into `tbl_visitor_induction` values (41,'1',0,'','2017-03-10','rrrrr','','rrrr,323423#,#,#,','','sdfasd','11:39','11:42',1,1,'2017-03-10 06:09:45','2017-03-10 06:12:21');
insert into `tbl_visitor_induction` values (42,'1',0,'','2017-03-10','test','','guy,3345#,#,#,','','gggg','11:46','11:50',1,1,'2017-03-10 06:16:21','2017-03-10 06:21:43');
insert into `tbl_visitor_induction` values (43,'1',0,'oc','2017-03-10','f','','h,1#,#,#,','','g','11:49','11:49',1,1,'2017-03-10 06:19:09','2017-03-10 06:19:38');
insert into `tbl_visitor_induction` values (44,'1',0,'','2017-03-10','m','','hh,6#,#,#,','','g','11:52','11:57',1,1,'2017-03-10 06:22:54','2017-03-10 06:27:05');
insert into `tbl_visitor_induction` values (45,'1',0,'','2017-03-10','xtf','','ff,88#,#,#,','','((ff','11:57','11:57',1,1,'2017-03-10 06:27:41','2017-03-10 06:27:56');
insert into `tbl_visitor_induction` values (46,'1',0,'','2017-03-10','ff','','ff,7#,#,#,','','v','12:05','12:07',1,1,'2017-03-10 06:35:57','2017-03-10 06:37:03');
insert into `tbl_visitor_induction` values (47,'1',0,'','2017-03-10','t','','d,7#,#,#,','','g','12:06','12:06',1,1,'2017-03-10 06:36:30','2017-03-10 06:36:50');
insert into `tbl_visitor_induction` values (48,'1',0,'','2017-03-10','fgr','','feet,54464#,#,#,','','fgh','12:34','12:36',1,1,'2017-03-10 07:04:31','2017-03-10 07:06:03');
insert into `tbl_visitor_induction` values (49,'1',0,'','2017-03-10','ggg','','gfg ff,877#,#,#,','','jbjhhihihh','12:36','13:50',1,1,'2017-03-10 07:07:11','2017-03-10 08:20:11');
insert into `tbl_visitor_induction` values (50,'1',0,'Principle','2017-03-10','gg','','fg,4422424425#,#,#,','','hh','14:22','14:24',1,1,'2017-03-10 08:52:39','2017-03-10 08:54:15');
insert into `tbl_visitor_induction` values (51,'1',0,'','2017-03-10','f','','f,222222222222#,#,#,','','f','14:28','15:32',1,1,'2017-03-10 08:59:02','2017-03-10 10:02:51');
insert into `tbl_visitor_induction` values (52,'1',0,'Principle','2017-03-10','dgb','','h,552251455555#,#,#,','','hgh','14:33','14:34',1,1,'2017-03-10 09:03:21','2017-03-10 09:04:05');
insert into `tbl_visitor_induction` values (53,'1',0,'','2017-03-10','ssssss','','ssssss,0447749202#,#,#,','','dddddd','22:18','22:20',1,1,'2017-03-10 11:19:39','2017-03-10 11:21:13');
insert into `tbl_visitor_induction` values (54,'1',0,'','2017-03-10','ggggg','','ggggg,8888888899#,#,#,','','tttttt','22:22','22:23',1,1,'2017-03-10 11:23:17','2017-03-10 11:23:41');
insert into `tbl_visitor_induction` values (55,'1',0,'Principle','2017-03-10','nitin','','g,5511111111#kk,854555555#,#,','','!!f','18:25','18:26',1,1,'2017-03-10 12:55:21','2017-03-10 12:58:26');
insert into `tbl_visitor_induction` values (56,'1',0,'','2017-03-11','ggggg','','ttttt,0000000000#,#,#,','','ttttttt','18:17','18:18',1,1,'2017-03-11 08:17:59','2017-03-11 08:18:22');
insert into `tbl_visitor_induction` values (57,'1',0,'','2017-03-21','fffffff','','fffff,1111111111#,#,#,','','gggggg','12:52','16:12',1,1,'2017-03-21 01:52:51','2017-03-21 05:13:01');
insert into `tbl_visitor_induction` values (58,'1',0,'','2017-03-21','ddddd','','dddd,4444444444#,#,#,','','ssssss','16:12','16:12',1,1,'2017-03-21 05:12:24','2017-03-21 05:12:44');
insert into `tbl_visitor_induction` values (59,'1',0,'','2017-03-21','ffffff','','ffff,2222222222#,#,#,','','eeeeee','17:53','17:54',1,1,'2017-03-21 06:54:05','2017-03-21 06:54:20');
insert into `tbl_visitor_induction` values (60,'64',0,'','2017-03-21','test','','hhh,545454545555#,#,#,','','gggg','16:31','',1,1,'2017-03-21 11:02:03','2017-03-21 11:02:03');
insert into `tbl_visitor_induction` values (61,'59',0,'','2017-03-22','y','','h,666666666666#,#,#,','','v','17:43','17:43',1,1,'2017-03-22 12:13:29','2017-03-22 12:13:50');
insert into `tbl_visitor_induction` values (62,'59',0,'','2017-03-24','ggg','','hah,787667645764#hghg,77777799999#,#,','','hhh','13:58','14:00',1,1,'2017-03-24 08:30:01','2017-03-24 08:30:50');
insert into `tbl_visitor_induction` values (63,'59',0,'','2017-03-24','h','','v1,6666666666#,#,#v4,888888888888','','r','15:42','15:43',1,1,'2017-03-24 10:15:21','2017-03-24 10:15:21');
insert into `tbl_visitor_induction` values (64,'',0,NULL,'2017-03-24','asfasf','','asfasf,124124#,#,#,','','sdsdg','12:21','',1,1,'2017-03-24 12:21:19','2017-03-24 12:21:19');
insert into `tbl_visitor_induction` values (65,'2',0,NULL,'2017-03-24','wrqwr','','qwrqwr,1423235#,#,#,','','sdgsdg','12:24','',1,1,'2017-03-24 12:24:51','2017-03-24 12:24:51');
insert into `tbl_visitor_induction` values (66,'2',0,NULL,'2017-03-24','Shashank','','safas,124124#,#,#,','','Just Chill','12:31','14:06',1,1,'2017-03-24 12:31:15','2017-03-24 12:31:15');
insert into `tbl_visitor_induction` values (67,'1',0,'Joint cutting and sealing','2017-03-27','sammy','','sfsdf,12324#,#,#,','','zxvz','07:46','07:47',1,1,'2017-03-27 07:46:47','2017-03-27 07:46:47');
insert into `tbl_visitor_induction` values (68,'1',0,'Joint cutting and sealing','2017-03-27','testing','','test,ph1#test,ph2#,#testing,ph4','','Just Chill','07:52','07:54',1,1,'2017-03-27 07:53:14','2017-03-27 07:53:14');
insert into `tbl_visitor_induction` values (69,'1',1,'Joint cutting and sealing','2017-03-29','dfhdfh','','etwet,235235#sdgsdg,325235#,#,','','xfhfh','12:07','13:47',1,1,'2017-03-29 12:08:06','2017-03-30 08:17:07');
insert into `tbl_visitor_induction` values (70,'59',1,'','2017-03-30','nk','','kk,111111111111#,#,#,','','ff','11:34','13:58',1,1,'2017-03-30 06:05:02','2017-03-30 08:28:55');
insert into `tbl_visitor_induction` values (71,'59',1,'','2017-03-30','nk','','kk,555555555555#,#,#,','','rrrr','17:22','17:23',1,1,'2017-03-30 11:53:14','2017-03-30 11:53:59');
insert into `tbl_visitor_induction` values (72,'59',1,'','2017-03-30','nk','','kk,555555555555#,#,#,','','rrr','17:44','17:47',1,1,'2017-03-30 12:14:57','2017-03-30 12:17:55');
insert into `tbl_visitor_induction` values (73,'59',1,'','2017-03-30','kkkk','','hhhhh,777777777777#,#,#,','','rrrrrr','17:48','17:49',1,1,'2017-03-30 12:18:54','2017-03-30 12:20:42');
insert into `tbl_visitor_induction` values (74,'59',1,'','2017-03-30','kk','','nnn,666666666666#,#,#,','','rrrrrmmm','18:16','18:17',1,1,'2017-03-30 12:47:17','2017-03-30 12:47:34');
insert into `tbl_visitor_induction` values (75,'1',0,'','2017-03-31','ffffff','','rrrrrr,7777777777#,#,#,','','hhhhh','08:46','08:47',1,1,'2017-03-30 22:47:02','2017-03-30 22:47:34');
insert into `tbl_visitor_induction` values (76,'1',0,'','2017-03-31','jjjjjj','','hhhhhh,4444444444#,#,#,','','ddddd','08:47','08:48',1,1,'2017-03-30 22:48:17','2017-03-30 22:48:33');
insert into `tbl_visitor_induction` values (77,'1',1,'Joint cutting and sealing','2017-04-04','testing','','test,1#test,2#,#,','','ok','09:01','09:02',1,1,'2017-04-04 07:02:05','2017-04-04 07:02:05');
insert into `tbl_visitor_induction` values (78,'1',1,'Joint cutting and sealing','2017-04-04','test2','','test,1#test,2#,#,','','ok','09:03','09:03',1,1,'2017-04-04 07:03:32','2017-04-04 07:03:32');
insert into `tbl_visitor_induction` values (79,'1',2,'Joint cutting and sealing','2017-05-04','testing','','test1,123#test2,12345#,#,','','Just Chill','09:36','09:38',1,1,'2017-05-04 07:37:23','2017-05-04 07:37:23');
insert into `tbl_visitor_induction` values (80,'1',1,'Joint cutting and sealing','2017-05-05','Hello ','1','Test2,Test1#,#,#,','','Ok','14:52','15:01',1,1,'2017-05-05 12:53:24','2017-05-05 12:53:24');
insert into `tbl_visitor_induction` values (81,'1',1,'Joint cutting and sealing','2017-05-11','','2','Hello,testing#,#,#,','','None','09:08','09:09',1,1,'2017-05-11 07:09:37','2017-05-11 07:09:37');
insert into `tbl_visitor_induction` values (82,'1',1,'Joint cutting and sealing','2017-05-11','','1','zfzsdf,gsdg#,#,#,','','sdgsdg','11:52','05:32',1,1,'2017-05-11 09:52:58','2017-05-11 09:52:58');
insert into `tbl_visitor_induction` values (83,'',2,'','2017-05-11','rwet','','wetwet,5235#,#,#,','','sdgg','15:40','',1,1,'2017-05-11 13:40:41','2017-05-11 13:40:41');
insert into `tbl_visitor_induction` values (84,'1',1,'Joint cutting and sealing','2017-05-11','Geee','','sdgsdg,2354235#,#,#,','','sfasf','15:48','14:45',1,1,'2017-05-11 13:48:27','2017-07-18 09:16:06');
insert into `tbl_visitor_induction` values (85,'1',1,'Joint cutting and sealing','2017-05-11','','1','rureu,634643#,#,#,','','dsgdh','15:48','13:58',1,1,'2017-05-11 13:48:53','2017-06-08 08:28:52');
insert into `tbl_visitor_induction` values (86,'1',1,'Joint cutting and sealing','2017-05-11','testing','','sdgdg,242345#,#,#,','','sdg','15:49','13:57',1,1,'2017-05-11 13:49:58','2017-06-08 08:27:32');
insert into `tbl_visitor_induction` values (87,'1',3,'Joint cutting and sealing','2017-06-01','Testing Visitor','','aaa,1234#add,1233#,#,','','Ok','10:56','14:28',1,1,'2017-06-01 08:57:12','2017-06-01 08:58:29');
insert into `tbl_visitor_induction` values (88,'1',1,'Joint cutting and sealing','2017-07-18','fchfd','','fgj,cgfgj#,#,#,','','fgjfgj','15:14','',1,1,'2017-07-18 13:14:24','2017-07-18 13:14:24');
insert into `tbl_visitor_induction` values (89,'1',1,'Joint cutting and sealing','2017-07-18','test','','asfasf,24124#,#,#,','','dsgsdg','16:07','19:37',1,1,'2017-07-18 14:07:13','2017-07-18 14:07:41');

/* Procedure structure for procedure `AddGeometryColumn` */

drop procedure if exists `AddGeometryColumn`;

DELIMITER $$;

CREATE DEFINER=`` PROCEDURE `AddGeometryColumn`(catalog varchar(64), t_schema varchar(64),
   t_name varchar(64), geometry_column varchar(64), t_srid int)
begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' ADD ', geometry_column,' GEOMETRY REF_SYSTEM_ID=', t_srid); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end$$

DELIMITER ;$$

/* Procedure structure for procedure `DropGeometryColumn` */

drop procedure if exists `DropGeometryColumn`;

DELIMITER $$;

CREATE DEFINER=`` PROCEDURE `DropGeometryColumn`(catalog varchar(64), t_schema varchar(64),
   t_name varchar(64), geometry_column varchar(64))
begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' DROP ', geometry_column); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end$$

DELIMITER ;$$
