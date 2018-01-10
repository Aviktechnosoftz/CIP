/*
SQLyog - Free MySQL GUI v5.02
Host - 5.1.53-community-log : Database - test
*********************************************************************
Server version : 5.1.53-community-log
*/




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
  `state_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_consultant` */

insert into `tbl_consultant` values 

(1,'Sam','fgj',1,'jkl;jk;','fgj','fgj','fgj','','2017-07-31 18:29:12','2017-08-04 13:19:28',1,1,1),

(2,'sdfsdg','sdgsdg',1,'sdgsdg','sdgsdg','sam@gmail.com','24','asfaw','2017-04-27 14:23:27','2017-06-06 12:09:36',1,1,1),

(5,'Okk','Fonn',1,'Surveyors','qeqe','zs@d','adad','adad','2017-04-27 14:33:06','2017-06-08 09:55:16',1,1,1),

(6,'Helo Testing','Consultant',3,'Fine','12345678','abc@g.com','USA','123','2017-06-01 14:58:13','2017-06-01 09:28:13',1,1,1),

(7,'Testing','2424',3,'svfsf','424','sxf@as.com','USA','123','2017-06-01 15:14:30','2017-06-01 09:44:36',1,1,1),

(8,'Tesing','ddd',3,'dgdg','2424','xfh@asdfsf.com','USA','11111','2017-06-01 15:14:58','2017-06-01 09:44:58',0,1,1),

(9,'Helo Testing','adad',1,'sdsf','1313','abc@g.com','adad','','2017-08-16 16:03:06','2017-08-16 10:33:06',0,1,1),

(10,'twet','wetwet',1,'wetwet','wetwet','we@gmail.com','wetwet','','2017-07-14 18:51:30','2017-07-14 13:21:30',0,1,1),

(11,'ghkghk','asgasg',1,'asgasg','asgasg','sam@gmail.com1','asfgasg','','2017-07-14 19:26:40','2017-07-31 13:02:53',1,1,1),

(12,'sdgsdg','q325235',1,'sdgsdg','235235','sam@gmail.com123','asfasf','1111','2017-08-01 18:12:51','2017-08-04 13:21:49',1,1,1),

(13,'Testing','2424',1,'svfsf','424','sxf@as.com','USA','','2017-08-16 16:01:21','2017-08-16 10:31:21',0,1,1),

(14,'Tesing','ddd',1,'dgdg','2424','xfh@asdfsf.com','USA',NULL,'2017-08-04 18:49:11','2017-08-04 13:24:32',1,1,1),

(15,'Tesing','ddd',1,'dgdg','2424','xfh@asdfsf.com','USA',NULL,'2017-08-09 11:30:33','2017-08-09 06:01:48',1,1,1),

(16,'Tesing','ddd',1,'dgdg','2424','xfh@asdfsf.com','USA','','2017-08-16 16:00:16','2017-08-16 10:30:16',0,1,1),

(17,'sdgsdg','sdgsdg',1,'serydfyh','32465236','dgalea@ciproperty.com.au','dssdg','1111','2017-08-16 15:26:19','2017-08-16 09:56:19',0,1,1),

(18,'Helo Testing','Consultant',1,'Fine','12345678','abc@g.com','USA','','2017-08-16 16:22:31','2017-08-16 10:52:38',1,1,1),

(19,'Helo Testing','Consultant',1,'Fine','12345678','abc@g.com','USA','','2017-08-16 16:23:00','2017-08-16 10:53:09',1,1,1),

(20,'Helo Testing','Consultant',1,'Fine','12345678','abc@g.com','USA',NULL,'2017-08-16 16:23:16','2017-08-16 10:59:00',1,1,1),

(21,'Tesing','ddd',1,'dgdg','2424','xfh@asdfsf.com','USA',NULL,'2017-08-16 16:24:09','2017-08-16 10:58:58',1,1,1),

(22,'Tesing','ddd',1,'dgdg','2424','xfh@asdfsf.com','USA',NULL,'2017-08-16 16:24:24','2017-08-16 10:58:55',1,1,1),

(23,'Helo Testing','Consultant',1,'Fine','12345678','abc@g.com','USA',NULL,'2017-08-16 16:25:29','2017-08-16 10:57:53',1,1,1),

(24,'Helo Testing','Consultant',1,'Fine','12345678','abc@g.com','USA',NULL,'2017-08-16 16:29:09','2017-08-16 10:59:09',0,1,1);
