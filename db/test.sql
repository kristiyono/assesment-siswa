/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.4.18-MariaDB : Database - test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `test`;

/*Table structure for table `t_jml_student` */

DROP TABLE IF EXISTS `t_jml_student`;

CREATE TABLE `t_jml_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jumlah` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `t_jml_student` */

insert  into `t_jml_student`(`id`,`jumlah`) values 
(1,'10-20'),
(2,'30-40');

/*Table structure for table `t_method` */

DROP TABLE IF EXISTS `t_method`;

CREATE TABLE `t_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(5) DEFAULT NULL,
  `student` int(5) DEFAULT NULL,
  `ukuran_kelas` int(5) DEFAULT NULL,
  `pertemuan` int(5) DEFAULT NULL,
  `modalitas` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk1` (`name`),
  KEY `fk2` (`student`),
  KEY `fk3` (`ukuran_kelas`),
  KEY `fk4` (`pertemuan`),
  KEY `fk5` (`modalitas`),
  CONSTRAINT `fk1` FOREIGN KEY (`name`) REFERENCES `t_name_method` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk2` FOREIGN KEY (`student`) REFERENCES `t_jml_student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk3` FOREIGN KEY (`ukuran_kelas`) REFERENCES `t_ukuran_kelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk4` FOREIGN KEY (`pertemuan`) REFERENCES `t_pertemuan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk5` FOREIGN KEY (`modalitas`) REFERENCES `t_modalitas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `t_method` */

insert  into `t_method`(`id`,`name`,`student`,`ukuran_kelas`,`pertemuan`,`modalitas`) values 
(4,1,1,3,2,2),
(5,2,1,1,1,1),
(6,3,2,1,1,3);

/*Table structure for table `t_modalitas` */

DROP TABLE IF EXISTS `t_modalitas`;

CREATE TABLE `t_modalitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modalitas` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `t_modalitas` */

insert  into `t_modalitas`(`id`,`modalitas`) values 
(1,'visual'),
(2,'kinestik'),
(3,'auditori');

/*Table structure for table `t_name_method` */

DROP TABLE IF EXISTS `t_name_method`;

CREATE TABLE `t_name_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_method` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `t_name_method` */

insert  into `t_name_method`(`id`,`name_method`) values 
(1,'Problem Solving'),
(2,'Jigsaw'),
(3,'Savi');

/*Table structure for table `t_pertemuan` */

DROP TABLE IF EXISTS `t_pertemuan`;

CREATE TABLE `t_pertemuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertemuan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `t_pertemuan` */

insert  into `t_pertemuan`(`id`,`pertemuan`) values 
(1,'Lebih dari 3'),
(2,'Lebih dari 2'),
(3,'Lebih dari 4');

/*Table structure for table `t_po` */

DROP TABLE IF EXISTS `t_po`;

CREATE TABLE `t_po` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `method_code` varchar(100) DEFAULT NULL,
  `ukuran_kelas` varchar(100) DEFAULT NULL,
  `jml_student` varchar(100) DEFAULT NULL,
  `pertemuan` varchar(100) DEFAULT NULL,
  `modalitas` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_po` */

/*Table structure for table `t_ukuran_kelas` */

DROP TABLE IF EXISTS `t_ukuran_kelas`;

CREATE TABLE `t_ukuran_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ukuran` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `t_ukuran_kelas` */

insert  into `t_ukuran_kelas`(`id`,`ukuran`) values 
(1,'16-30'),
(2,'-16'),
(3,'31-45');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
