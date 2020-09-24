/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.10-MariaDB : Database - db_laborat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_laborat` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_laborat`;

/*Table structure for table `devices` */

DROP TABLE IF EXISTS `devices`;

CREATE TABLE `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_alat` varchar(4) DEFAULT NULL,
  `id_jenis` varchar(3) DEFAULT NULL,
  `kode_produk` varchar(35) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `ip` varchar(35) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `port` varchar(10) DEFAULT NULL COMMENT 'COM1',
  `baudrate` int(5) DEFAULT NULL COMMENT '9600',
  `databit` int(1) DEFAULT NULL COMMENT '8',
  `parity` varchar(10) DEFAULT NULL COMMENT 'None',
  `stopbit` varchar(10) DEFAULT NULL COMMENT 'One',
  `handshake` varchar(35) DEFAULT NULL COMMENT 'XonXoff',
  `metode` enum('array','substring','search') DEFAULT NULL,
  `metode_value` varchar(35) DEFAULT NULL,
  `awal` int(11) DEFAULT NULL,
  `akhir` int(11) DEFAULT NULL,
  `lokasi` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `devices` */

insert  into `devices`(`id`,`id_alat`,`id_jenis`,`kode_produk`,`nama`,`merk`,`deskripsi`,`ip`,`url`,`port`,`baudrate`,`databit`,`parity`,`stopbit`,`handshake`,`metode`,`metode_value`,`awal`,`akhir`,`lokasi`) values (1,'A01','k01','HB43S','Moisture','Toledo','Moisture Analyzer Mettler Toledo HB43',NULL,'http://localhost:8080/api/book/1','COM7',2400,7,'Even','One','XOnXOff','search','Result',14,6,NULL),(2,'A04','k02','HM42X','pH Meter','TOA','pH Meter TOA DKK HM42X (Juice)',NULL,'http://localhost:8080/api/book/1','COM7',9600,8,'None','One','XOnXOff','array','11',NULL,NULL,NULL),(5,'A02','k01','HC103','Moisture','Toledo','Moisture Analyzer Mettler Toledo HC103',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'A03','k01','HB54-S','Moisture','Toledo','Moisture Analyzer Mettler Toledo HB45-S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'A05','k02','HM42X','pH Meter','TOA','pH Meter TOA DKK HM42X (Boiler Water)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'A06','k02','HM25R','pH Meter','TOA','pH Meter TOA DKK HM25R',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'A07','k03','ME3002','Balance','Toledo','Metttler Toledo Balance ME3002',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'A08','k03','AWB120','Balance','WB','AWB120 Balance',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'A09','k03','PS3500R2','Balance','Radwag','Radwag Balance PS3500R2',NULL,'http://localhost:8080/api/book/1','COM7',9600,8,'None','One','XOnXOff',NULL,NULL,NULL,NULL,NULL),(12,'A10','k03','AWB120','Balance','WB','AWB120 Balance',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'A11','k04','A212','Conductivity','Orion','Orion Star A212 Conductivity Meter',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'A12','k05','Sucroflex','Sucroflex','Sucroflex','Sucroflex',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'A13','k06','DR5000','Spectrofotometer','Hach','Spectrofotometer HACH DR5000',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'A14','k06','DR600','Spectrofotometer','Hach','Spectrofotometer HACH DR6000',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'A15','k07','TL2360','Turbidity','Hach','Turbidity Meter Hach TL2360',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,'A16','k08','52CE','DO','YSI','DO Meter YSI 52CE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,'A17','k09','MCP200','Sucromat','Sucromat','Sucromat MCP200',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,'A18','k09','MCP5300','Sucromat','Sucromat','Sucromat MCP5300',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,'A19','k10','DV1','Viscometer','Viscometer','Viscometer Brookfield DV1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'A20','k11','-','-','-','Manual Input',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,'A21',NULL,NULL,'Balance',NULL,'Packing 20kg',NULL,'http://localhost:8080/api/book/1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,'A22',NULL,NULL,'Balance',NULL,'Packing 1kg',NULL,'http://localhost:8080/api/book/1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,'A23',NULL,NULL,'Balance',NULL,'Packing 50kg',NULL,'http://localhost:8080/api/book/1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `devices_jenis` */

DROP TABLE IF EXISTS `devices_jenis`;

CREATE TABLE `devices_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis` varchar(3) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `devices_jenis` */

insert  into `devices_jenis`(`id`,`id_jenis`,`nama`,`deskripsi`) values (1,NULL,'weightger','TIMBANGAN'),(2,NULL,'PH','PH METER'),(3,NULL,'moisture','MOISTURE ANALIZER');

/*Table structure for table `hakakses` */

DROP TABLE IF EXISTS `hakakses`;

CREATE TABLE `hakakses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `is_create` tinyint(1) DEFAULT 0,
  `is_update` tinyint(1) DEFAULT 0,
  `is_delete` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data` (`id_user`,`id_module`),
  KEY `id_module` (`id_module`),
  KEY `iduser` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `hakakses` */

insert  into `hakakses`(`id`,`id_user`,`id_module`,`is_create`,`is_update`,`is_delete`) values (1,3,4,1,1,1),(2,4,4,1,0,1),(6,5,4,0,0,0),(7,4,5,1,0,1),(8,4,11,1,0,1),(9,4,12,1,0,1),(10,4,15,1,0,1),(11,4,16,1,0,1),(12,4,17,1,0,1),(13,4,18,1,0,1),(14,4,19,1,0,1),(15,6,4,0,0,0);

/*Table structure for table `hasil_analisa` */

DROP TABLE IF EXISTS `hasil_analisa`;

CREATE TABLE `hasil_analisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(15) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_jam` int(11) DEFAULT NULL,
  `nilai_a` double DEFAULT 0,
  `nilai_b` double DEFAULT 0,
  `wkt_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_user` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT 1,
  `id_parameter` varchar(5) DEFAULT NULL,
  `id_modul` int(11) DEFAULT NULL,
  `id_material` int(11) DEFAULT NULL,
  `is_data` tinyint(2) DEFAULT 1 COMMENT '1=new,2=ricek,3=test',
  `hasil` double DEFAULT NULL,
  `no_strike` varchar(35) DEFAULT NULL,
  `time_strike` varchar(35) DEFAULT NULL,
  `pan_strike` double DEFAULT NULL,
  `boiling_time_strike` varchar(35) DEFAULT NULL,
  `vol_strike` double DEFAULT NULL,
  `pending_user` int(11) DEFAULT NULL,
  `verify_by` int(11) DEFAULT NULL,
  `approve_by` int(11) DEFAULT NULL,
  `input` varchar(255) DEFAULT NULL,
  `is_show` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=264 DEFAULT CHARSET=latin1;

/*Data for the table `hasil_analisa` */

insert  into `hasil_analisa`(`id`,`nomor`,`tanggal`,`id_jam`,`nilai_a`,`nilai_b`,`wkt_input`,`id_user`,`id_status`,`id_parameter`,`id_modul`,`id_material`,`is_data`,`hasil`,`no_strike`,`time_strike`,`pan_strike`,`boiling_time_strike`,`vol_strike`,`pending_user`,`verify_by`,`approve_by`,`input`,`is_show`) values (210,'ANL20030000001','2020-03-18',25,-22.522522522522518,0,'2020-03-18 10:59:51',2,1,'P018',21,39,1,-22.522522522522518,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|10|10|10|10|10|17|17|17|17|17|-15|7|7|7|7|7|-18|-22.522522522522518|3.3409999999999993|2.3386999999999984|69.99999999999997|',0),(211,'ANL20030000001','2020-03-18',25,3.3409999999999993,0,'2020-03-18 10:59:51',2,1,'P019',21,39,1,3.3409999999999993,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|10|10|10|10|10|17|17|17|17|17|-15|7|7|7|7|7|-18|-22.522522522522518|3.3409999999999993|2.3386999999999984|69.99999999999997|',0),(212,'ANL20030000001','2020-03-18',25,69.99999999999997,0,'2020-03-18 10:59:52',2,1,'P020',21,39,1,69.99999999999997,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|10|10|10|10|10|17|17|17|17|17|-15|7|7|7|7|7|-18|-22.522522522522518|3.3409999999999993|2.3386999999999984|69.99999999999997|',1),(213,'ANL20030000001','2020-03-18',25,10,0,'2020-03-18 10:59:52',2,1,'P061',21,39,1,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|10|10|10|10|10|17|17|17|17|17|-15|7|7|7|7|7|-18|-22.522522522522518|3.3409999999999993|2.3386999999999984|69.99999999999997|',0),(214,'ANL20030000001','2020-03-18',25,10,0,'2020-03-18 10:59:52',2,1,'P062',21,39,1,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|10|10|10|10|10|17|17|17|17|17|-15|7|7|7|7|7|-18|-22.522522522522518|3.3409999999999993|2.3386999999999984|69.99999999999997|',0),(215,'ANL20030000001','2020-03-18',25,10,0,'2020-03-18 10:59:52',2,1,'P063',21,39,1,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|10|10|10|10|10|17|17|17|17|17|-15|7|7|7|7|7|-18|-22.522522522522518|3.3409999999999993|2.3386999999999984|69.99999999999997|',0),(216,'ANL20030000001','2020-03-18',25,10,0,'2020-03-18 10:59:52',2,1,'P064',21,39,1,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|10|10|10|10|10|17|17|17|17|17|-15|7|7|7|7|7|-18|-22.522522522522518|3.3409999999999993|2.3386999999999984|69.99999999999997|',0),(217,'ANL20030000001','2020-03-18',25,10,0,'2020-03-18 10:59:52',2,1,'P065',21,39,1,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|10|10|10|10|10|17|17|17|17|17|-15|7|7|7|7|7|-18|-22.522522522522518|3.3409999999999993|2.3386999999999984|69.99999999999997|',0),(218,'ANL20030000001','2020-03-18',25,10,0,'2020-03-18 10:59:52',2,1,'P066',21,39,1,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|10|10|10|10|10|17|17|17|17|17|-15|7|7|7|7|7|-18|-22.522522522522518|3.3409999999999993|2.3386999999999984|69.99999999999997|',0),(219,'ANL20030000001','2020-03-18',25,10,0,'2020-03-18 10:59:52',2,1,'P067',21,39,1,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|10|10|10|10|10|17|17|17|17|17|-15|7|7|7|7|7|-18|-22.522522522522518|3.3409999999999993|2.3386999999999984|69.99999999999997|',0),(220,'ANL20030000001','2020-03-18',25,7,0,'2020-03-18 10:59:52',2,1,'P068',21,39,1,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|10|10|10|10|10|17|17|17|17|17|-15|7|7|7|7|7|-18|-22.522522522522518|3.3409999999999993|2.3386999999999984|69.99999999999997|',0),(221,'ANL20030000001','2020-03-18',25,7,0,'2020-03-18 10:59:52',2,1,'P069',21,39,1,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|10|10|10|10|10|17|17|17|17|17|-15|7|7|7|7|7|-18|-22.522522522522518|3.3409999999999993|2.3386999999999984|69.99999999999997|',0),(222,'ANL20030000001','2020-03-18',25,7,0,'2020-03-18 10:59:52',2,1,'P070',21,39,1,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|10|10|10|10|10|17|17|17|17|17|-15|7|7|7|7|7|-18|-22.522522522522518|3.3409999999999993|2.3386999999999984|69.99999999999997|',0),(223,'ANL20030000001','2020-03-18',25,7,0,'2020-03-18 10:59:52',2,1,'P071',21,39,1,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|10|10|10|10|10|17|17|17|17|17|-15|7|7|7|7|7|-18|-22.522522522522518|3.3409999999999993|2.3386999999999984|69.99999999999997|',0),(224,'ANL20030000001','2020-03-18',25,7,0,'2020-03-18 10:59:52',2,1,'P072',21,39,1,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|10|10|10|10|10|17|17|17|17|17|-15|7|7|7|7|7|-18|-22.522522522522518|3.3409999999999993|2.3386999999999984|69.99999999999997|',0),(225,'ANL20030000001','2020-03-18',25,-18,0,'2020-03-18 10:59:52',2,1,'P073',21,39,1,-18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|10|10|10|10|10|17|17|17|17|17|-15|7|7|7|7|7|-18|-22.522522522522518|3.3409999999999993|2.3386999999999984|69.99999999999997|',0),(226,'ANL20030000001','2020-03-18',25,2.3386999999999984,0,'2020-03-18 10:59:52',2,1,'P074',21,39,1,2.3386999999999984,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|10|10|10|10|10|17|17|17|17|17|-15|7|7|7|7|7|-18|-22.522522522522518|3.3409999999999993|2.3386999999999984|69.99999999999997|',0),(227,'ANL20030000002','2020-03-18',2,25,0,'2020-03-18 12:16:43',2,1,'P028',11,45,2,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1),(228,'ANL20030000003','2020-03-18',2,10,0,'2020-03-18 12:16:43',2,1,'P028',11,45,2,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1),(229,'ANL20030000004','2020-03-18',2,25,0,'2020-03-18 12:16:43',2,1,'P028',11,45,1,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1),(230,'ANL20030000005','2020-03-18',3,35,0,'2020-03-18 12:16:55',2,1,'P028',11,45,1,35,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1),(231,'ANL20030000006','2020-03-18',4,10,0,'2020-03-18 12:21:07',2,1,'P028',11,45,1,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1),(232,'ANL20030000007','2020-03-18',2,145,0,'2020-03-18 16:09:17',2,1,'P014',12,39,1,145,'1212',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1),(233,'ANL20030000008','2020-03-18',2,0.0897,0,'2020-03-18 16:09:48',2,1,'P022',22,45,1,0.0897,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'30|10|0.0897',1),(234,'ANL20030000009','2020-03-18',2,0.06202799999999999,0,'2020-03-18 16:10:02',2,1,'P022',22,45,3,0.06202799999999999,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0221|121|0.06202799999999999',1),(235,'ANL20030000010','2020-03-18',2,30,0,'2020-03-18 16:12:34',2,1,'P011',16,6,1,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1),(236,'ANL20030000011','2020-03-18',2,66.66666666666666,0,'2020-03-18 17:49:28',2,1,'P009',24,1,1,66.66666666666666,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'20|30|66.66666666666666',1),(237,'ANL20030000011','2020-03-18',2,20,0,'2020-03-18 17:49:28',2,1,'P053',24,1,1,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'20|30|66.66666666666666',0),(238,'ANL20030000011','2020-03-18',2,30,0,'2020-03-18 17:49:28',2,1,'P054',24,1,1,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'20|30|66.66666666666666',0),(239,'ANL20030000012','2020-03-24',25,0,0,'2020-03-24 15:23:58',2,1,'P018',21,39,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|13|13|1213|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|',0),(240,'ANL20030000012','2020-03-24',25,0,0,'2020-03-24 15:23:58',2,1,'P019',21,39,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|13|13|1213|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|',0),(241,'ANL20030000012','2020-03-24',25,0,0,'2020-03-24 15:23:58',2,1,'P020',21,39,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|13|13|1213|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|',1),(242,'ANL20030000012','2020-03-24',25,10,0,'2020-03-24 15:23:58',2,1,'P061',21,39,1,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|13|13|1213|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|',0),(243,'ANL20030000012','2020-03-24',25,10,0,'2020-03-24 15:23:58',2,1,'P062',21,39,1,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|13|13|1213|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|',0),(244,'ANL20030000012','2020-03-24',25,13,0,'2020-03-24 15:23:58',2,1,'P063',21,39,1,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|13|13|1213|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|',0),(245,'ANL20030000012','2020-03-24',25,13,0,'2020-03-24 15:23:58',2,1,'P064',21,39,1,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|13|13|1213|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|',0),(246,'ANL20030000012','2020-03-24',25,1213,0,'2020-03-24 15:23:58',2,1,'P065',21,39,1,1213,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|13|13|1213|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|',0),(247,'ANL20030000012','2020-03-24',25,0,0,'2020-03-24 15:23:58',2,1,'P066',21,39,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|13|13|1213|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|',0),(248,'ANL20030000012','2020-03-24',25,0,0,'2020-03-24 15:23:58',2,1,'P067',21,39,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|13|13|1213|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|',0),(249,'ANL20030000012','2020-03-24',25,0,0,'2020-03-24 15:23:58',2,1,'P068',21,39,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|13|13|1213|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|',0),(250,'ANL20030000012','2020-03-24',25,0,0,'2020-03-24 15:23:58',2,1,'P069',21,39,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|13|13|1213|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|',0),(251,'ANL20030000012','2020-03-24',25,0,0,'2020-03-24 15:23:59',2,1,'P070',21,39,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|13|13|1213|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|',0),(252,'ANL20030000012','2020-03-24',25,0,0,'2020-03-24 15:23:59',2,1,'P071',21,39,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|13|13|1213|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|',0),(253,'ANL20030000012','2020-03-24',25,0,0,'2020-03-24 15:23:59',2,1,'P072',21,39,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|13|13|1213|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|',0),(254,'ANL20030000012','2020-03-24',25,0,0,'2020-03-24 15:23:59',2,1,'P073',21,39,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|13|13|1213|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|',0),(255,'ANL20030000012','2020-03-24',25,0,0,'2020-03-24 15:23:59',2,1,'P074',21,39,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10|10|13|13|1213|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|',0),(256,'ANL20030000013','2020-03-27',2,8.192,0,'2020-03-27 08:34:08',2,1,'P003',4,1,1,8.192,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1),(257,'ANL20030000014','2020-03-27',2,8.193,0,'2020-03-27 08:37:22',2,1,'P003',4,1,1,8.193,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1),(258,'ANL20030000015','2020-03-27',2,8.194,0,'2020-03-27 08:51:26',2,1,'P003',4,1,1,8.194,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1),(259,'ANL20030000016','2020-03-27',2,8.195,0,'2020-03-27 08:56:28',2,1,'P003',4,1,1,8.195,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1),(260,'ANL20030000017','2020-03-27',3,8.206,0,'2020-03-27 10:01:47',2,1,'P003',4,1,1,8.206,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1),(261,'ANL20030000018','2020-03-31',2,6.91,0,'2020-03-31 14:51:37',2,1,'P003',4,1,1,6.91,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1),(262,'ANL20030000019','2020-03-31',2,6.73,0,'2020-03-31 14:54:08',2,1,'P003',4,1,1,6.73,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1),(263,'ANL20030000020','2020-03-31',2,-0.07,0,'2020-03-31 16:11:01',2,1,'P008',5,5,1,-0.07,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1);

/*Table structure for table `jam_analisa` */

DROP TABLE IF EXISTS `jam_analisa`;

CREATE TABLE `jam_analisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jam` varchar(4) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `is_shift` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `jam_analisa` */

insert  into `jam_analisa`(`id`,`id_jam`,`jam`,`desc`,`is_shift`) values (1,'J06','06:00:00','06:00',0),(2,'J07','07:00:00','07:00',0),(3,'J08','08:00:00','08:00',0),(4,'J09','09:00:00','09:00',0),(5,'J10','10:00:00','10:00',0),(6,'J11','11:00:00','11:00',0),(7,'J12','12:00:00','12:00',0),(8,'J13','13:00:00','13:00',0),(9,'J14','14:00:00','14:00',0),(10,'J15','15:00:00','15:00',0),(11,'J16','16:00:00','16:00',0),(12,'J17','17:00:00','17:00',0),(13,'J18','18:00:00','18:00',0),(14,'J19','19:00:00','19:00',0),(15,'J20','20:00:00','20:00',0),(16,'J21','21:00:00','21:00',0),(17,'J22','22:00:00','22:00',0),(18,'J23','23:00:00','23:00',0),(19,'J24','24:00:00','24:00',0),(20,'J01','01:00:00','01:00',0),(21,'J02','02:00:00','02:00',0),(22,'J03','03:00:00','03:00',0),(23,'J04','04:00:00','04:00',0),(24,'J05','05:00:00','05:00',0),(25,'J25',NULL,'Shift I',1),(26,'J26',NULL,'Shift II',1),(27,'J27',NULL,'Shift III',1);

/*Table structure for table `material_analisa` */

DROP TABLE IF EXISTS `material_analisa`;

CREATE TABLE `material_analisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_material` varchar(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_station` varchar(5) DEFAULT NULL,
  `faktor_pengenceran` int(11) DEFAULT NULL,
  `id_klp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;

/*Data for the table `material_analisa` */

insert  into `material_analisa`(`id`,`id_material`,`name`,`id_station`,`faktor_pengenceran`,`id_klp`) values (1,'M001','First Expressed Juice','S02',1,'k02,k06,k09'),(2,'M002','Mixed Juice','S02',1,'k02,k06,k09'),(3,'M003','Last Expressed Juice','S02',1,'k02,k09'),(4,'M004','Shreddered Cane','S01',1,'k02,k03,k09'),(5,'M005','Final Bagasse','S02',1,'k01,k09'),(6,'M006','Clear Juice','S05',1,'k02,k06,k07,k09'),(7,'M007','Filter Cake','S05',1,'k01,k09'),(8,'M008','Raw Syrup','S05',5,'k02,k06,k07,k09'),(9,'M009','Clarified Syrup','S05',5,'k02,k06,k07,k09'),(10,'M010','Sulphited Syrup','S05',5,'k02,k06,k07,k09'),(11,'M011','Mud','S05',1,'k02,k09'),(12,'M012','Heavy Filtrate','S05',1,'k02,k09'),(13,'M013','Light Filtrate','S05',1,'k02,k09'),(14,'M014','Scum','S05',1,'k02,k09'),(15,'M015','B-Masc CVP#1','S06',15,'k09,k10'),(16,'M016','B-Masc CVP#2','S06',15,'k09,k10'),(17,'M017','C-Masc CVP#1','S06',15,'k09,k10'),(18,'M018','C-Masc CVP#2','S06',15,'k09,k10'),(19,'M019','C-Masc Head Box','S06',15,'k09,k10'),(20,'M020','B Magma','S06',10,'k09'),(21,'M021','C Magma','S06',10,'k09'),(22,'M022','B/C Melting','S06',5,'k09'),(23,'M023','C1 Sugar','S06',15,'k09'),(24,'M024','A-Mol @Tank','S06',10,'k09'),(25,'M025','A-Wash','S06',10,'k09'),(26,'M026','B-Mol Heavy','S06',15,'k09'),(27,'M027','C-Wash','S06',15,'k09'),(28,'M028','B-Mol @Tank','S06',15,'k09'),(29,'M029','Final Molasses','S06',10,'k09'),(30,'M030','A Massecuite','S06',15,'k09'),(31,'M031','A Graining','S06',15,'k09'),(32,'M032','A Seed','S06',15,'k09'),(33,'M033','B Graining','S06',15,'k09'),(34,'M034','B Seed','S06',15,'k09'),(35,'M035','B Massecuite Batch Pan','S06',15,'k09'),(36,'M036','C Graining','S06',15,'k09'),(37,'M037','C Seed','S06',15,'k09'),(38,'M038','C Massecuite Batch Pan','S06',15,'k09'),(39,'M039','Sugar Product','S06',1,'k01,k09'),(40,'M040','Sugar Scrubber','S06',1,'k09'),(41,'M041','B Masc CVP#1 Nutsche','S06',15,'k09'),(42,'M042','B Masc CVP#2 Nutsche','S06',15,'k09'),(43,'M043','C Masc CVP#1 Nutsche','S06',15,'k09'),(44,'M044','C Masc CVP#2 Nutsche','S06',15,'k09'),(45,'M045','Boiler Feed Water','S03',1,'k02,k04,k06,k08'),(46,'M046','Boiler Water No 1','S03',1,'k02,k04,k06,k08'),(47,'M047','Boiler Water No 2','S03',1,'k02,k04,k06,k08'),(48,'M048','Boiler Water No 3','S03',1,'k02,k04,k06,k08'),(49,'M049','Boiler Water No 4','S03',1,'k02,k04,k06,k08'),(50,'M050','Boiler Water No 5','S03',1,'k02,k04,k06,k08'),(51,'M051','R J H # 1 Condensate','S05',1,'k02,k06'),(52,'M052','R J H # 2 Condensate','S05',1,'k02,k06'),(53,'M053','R J H # 3 Condensate','S05',1,'k02,k06'),(54,'M054','S J H  1&2 Condensate','S05',1,'k02,k06'),(55,'M055','S J H  3&4 Condensate','S05',1,'k02,k06'),(56,'M056','Clear J Heater Condensate','S05',1,'k02,k06'),(57,'M057','Evap 1ABCDE Condensate','S05',1,'k02,k06'),(58,'M058','Evap 2ABC Condensate','S05',1,'k02,k06'),(59,'M059','Evap 3AB Condensate','S05',1,'k02,k06'),(60,'M060','Evap 4 Condensate','S05',1,'k02,k06'),(61,'M061','Evap 5 Condensate','S05',1,'k02,k06'),(62,'M062','Evap Hot Well','S05',1,'k02,k06'),(63,'M063','Pan Hot Well','S05',1,'k02,k06'),(64,'M064','Evap Vacuum Condensor','S05',1,'k02,k06'),(65,'M065','Injection Water Inlet','S04',1,'k02,k06'),(66,'M066','Injection Water Outlet','S04',1,'k02,k06'),(67,'M067','Cooling Water Temp. (In/Out)','S04',1,'k02,k06'),(68,'M068','Vacuum Filter Condensor #1','S05',1,'k02,k06'),(69,'M069','Vacuum Filter Condensor #2','S05',1,'k02,k06'),(70,'M070','Pan Condensor No 1','S06',1,'k02,k06'),(71,'M071','Pan Condensor No 2','S06',1,'k02,k06'),(72,'M072','Pan Condensor No 3','S06',1,'k02,k06'),(73,'M073','Pan Condensor No 4','S06',1,'k02,k06'),(74,'M074','Pan Condensor No 5','S06',1,'k02,k06'),(75,'M075','Pan Condensor No 6','S06',1,'k02,k06'),(76,'M076','Pan Condensor No 7','S06',1,'k02,k06'),(77,'M077','Pan Condensor No 8','S06',1,'k02,k06'),(78,'M078','Pan Condensor No 9','S06',1,'k02,k06'),(79,'M079','Pan Condensor No 10','S06',1,'k02,k06'),(80,'M080','Pan Condensor No 11','S06',1,'k02,k06'),(81,'M081','Pan Condensor No 12','S06',1,'k02,k06'),(82,'M082','Pan Condensor No 13','S06',1,'k02,k06'),(83,'M083','Pan Condensor No 14','S06',1,'k02,k06'),(84,'M084','Pan Condensor No 15','S06',1,'k02,k06'),(85,'M085','B-CVP Condensor No 1','S06',1,'k02,k06'),(86,'M086','B-CVP Condensor No 2','S06',1,'k02,k06'),(87,'M087','C-CVP Condensor No 1','S06',1,'k02,k06'),(88,'M088','C-CVP Condensor No 2','S06',1,'k02,k06'),(89,'M089','Gutter A @ Clary','',1,'k02,k06'),(90,'M090','Gutter A @ Curing','',1,'k02,k06'),(91,'M091','Gutter C @ Milling','',1,'k02,k06'),(92,'M092','Gutter A ','',1,'k02,k06'),(93,'M093','Gutter B ','',1,'k02,k06'),(94,'M094','Gutter C ','',1,'k02,k06'),(95,'M095','Evaporator Juice #1A','S05',1,'k02,k06'),(96,'M096','Evaporator Juice #1B','S05',1,'k02,k06,k09'),(97,'M097','Evaporator Juice #1C','S05',1,'k02,k06,k09'),(98,'M098','Evaporator Juice #1D','S05',1,'k02,k06,k09'),(99,'M099','Evaporator Juice #1ABCD','S05',1,'k02,k06,k09'),(100,'M100','Evaporator Juice #2A','S05',1,'k02,k06,k09'),(101,'M101','Evaporator Juice #2B','S05',1,'k02,k06,k09'),(102,'M102','Evaporator Juice #2C','S05',1,'k02,k06,k09'),(103,'M103','Evaporator Juice #2D','S05',1,'k02,k06,k09'),(104,'M104','Evaporator Juice #2ABCD','S05',1,'k02,k06,k09'),(105,'M105','Evaporator Juice #3A','S05',1,'k02,k06,k09'),(106,'M106','Evaporator Juice #3B','S05',1,'k02,k06,k09'),(107,'M107','Evaporator Juice #3AB','S05',1,'k02,k06,k09'),(108,'M108','Evaporator Juice #4','S05',1,'k02,k06,k09'),(109,'M109','Evaporator Juice #5','S05',1,'k02,k06,k09'),(110,'M110','Quick Lime','S05',1,'k01'),(111,'M111','Slake Lime','S05',1,'k01'),(112,'M112','Sulfur','S05',1,'k01'),(113,'M113','Phosporic Acid','S05',1,'k01'),(114,'M114','Juice Flocculant','S05',1,'k01,k02,k10'),(115,'M115','Syrup Flocculant','S05',1,'k01,k02,k10'),(116,'M116','Caustic Soda Liquid','S05',1,''),(117,'M117','Soda Flakes','S05',1,'k01'),(118,'M118','Sugar Packed 50kg','S08',1,'k03'),(119,'M119','Sugar Packed 1kg','S08',1,'k03'),(120,'M120','Sugar Packed 20kg','S08',1,'k03'),(121,'M121','WWT Inlet','S09',1,'k02,k06,k07,k08'),(122,'M122','WWT Outlet','S09',1,'k02,k06,k07,k08'),(123,'M123','WWT Settling Pond','S09',1,'k02,k06,k07,k08'),(124,'M124','WWT Equalization Pond','S09',1,'k02,k06,k07,k08'),(125,'M125','WWT An Aerob Pond #1','S09',1,'k02,k06,k07,k08'),(126,'M126','WWT An Aerob Pond #2','S09',1,'k02,k06,k07,k08'),(127,'M127','WWT An Aerob Pond #3','S09',1,'k02,k06,k07,k08'),(128,'M128','WWT Facultative Pond #1','S09',1,'k02,k06,k07,k08'),(129,'M129','WWT Facultative Pond #2','S09',1,'k02,k06,k07,k08'),(130,'M130','WWT Facultative Pond #3','S09',1,'k02,k06,k07,k08'),(131,'M131','WWT Facultative Pond #4','S09',1,'k02,k06,k07,k08'),(132,'M132','WWT Facultative Pond #5','S09',1,'k02,k06,k07,k08'),(133,'M133','WWT Facultative Pond #6','S09',1,'k02,k06,k07,k08'),(134,'M134','WWT Aeration Pond #1','S09',1,'k02,k06,k07,k08'),(135,'M135','WWT Stabilization Pond #1','S09',1,'k02,k06,k07,k08'),(136,'M136','WWT Stabilization Pond #2','S09',1,'k02,k06,k07,k08'),(137,'M137','Sungai Hulu (Way Putak)','S09',1,'k02,k06,k07,k08'),(138,'M138','Sungai Hilir (Lebung Suroto)','S09',1,'k02,k06,k07,k08'),(139,'M139','Raw Water Pond','S04',1,'k02,k06,k07,k08'),(140,'M140','Molasses Tank-A','S11',10,'k01,k02,k06,k09,k10'),(141,'M141','Molasses Tank-B','S11',10,'k01,k02,k06,k09,k10'),(142,'M142','Molasses Tank-C','S11',10,'k01,k02,k06,k09,k10'),(143,'M143','Molasses Tank-D','S11',10,'k01,k02,k06,k09,k10'),(144,'M144','Molasses Tank-E','S11',10,'k01,k02,k06,k09,k10'),(145,'M145','Molasses Tank-Factory','S11',10,'k01,k02,k06,k09,k10'),(146,'M146','Molasses KMT','S11',10,'k01,k02,k06,k09,k10');

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `only_admin` tinyint(1) DEFAULT 0 COMMENT 'flex untuk module admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `menus` */

insert  into `menus`(`id`,`name`,`desc`,`urut`,`only_admin`) values (1,'analisa','ANALISA',2,0),(2,'parameter','PARAMETER ANALISA',1,0),(3,'sysadmin','SYSTEM ADMINISTRATION',100,1),(4,'verifikasi','VERIFIKASI ANALISA',3,0),(5,'report','REPORT ANALISA',4,0);

/*Table structure for table `modules` */

DROP TABLE IF EXISTS `modules`;

CREATE TABLE `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_submenu` int(11) DEFAULT NULL,
  `urut` tinyint(2) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT 'mif-versions',
  PRIMARY KEY (`id`),
  UNIQUE KEY `DATA` (`id_submenu`,`urut`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

/*Data for the table `modules` */

insert  into `modules`(`id`,`id_submenu`,`urut`,`name`,`desc`,`logo`) values (1,1,1,'user','User & Akses','mif-user'),(2,1,2,'module','Menu & Module','mif-menu'),(3,2,1,'devicesapi','API & Devices Link','mif-link'),(4,3,2,'analisaph','Analisa pH','mif-lab'),(5,3,1,'analisamoisture','Analisa Moisture','mif-versions'),(11,3,3,'analisaconductivity','Analisa Conductifity','mif-power'),(12,3,4,'analisasucroflex','Analisa Sucroflex','mif-versions'),(15,3,5,'analisaspectro','Analisa Spectrofotometer','mif-versions'),(16,3,6,'analisaturbidi','Analisa Turbidimeter','mif-versions'),(17,3,7,'analisado','Analisa DO Meter','mif-versions'),(18,3,9,'analisavisco','Analisa Viscometer','mif-versions'),(19,3,8,'analisamanual','Analisa Manual','mif-versions'),(20,5,1,'analisafiber','Analisa Fiber/Dirt/TSS','mif-versions'),(21,5,2,'analisagrandsize','Analisa Grand Size','mif-versions'),(22,5,3,'analisaashsugar','Analisa Ash Sugar','mif-versions'),(23,5,4,'analisaliquidcolour','Analisa Liquid Color','mif-versions'),(24,5,5,'analisaindex','Analisa Preparation Index','mif-versions'),(25,5,6,'analisapolari','Analisa Polarimeter & Refractometer','mif-versions'),(26,6,1,'ujipetikberat','Analisa Uji Petik Weigher','mif-versions'),(27,7,1,'cekmill','Mill & Clarification','mif-versions'),(28,7,2,'cekboiling','Boiling','mif-versions'),(29,7,3,'cekboiler','Boiler Water','mif-versions'),(30,7,4,'cekwaterconsensate','Water Condensate','mif-versions'),(31,7,5,'cekmachinetest','C-1 Machice Test','mif-versions'),(32,7,6,'cekevaporator','Individual Evaporator','mif-versions'),(33,7,7,'cekfloculant','Floculant & Saccharate','mif-versions'),(34,7,8,'cekbatchpan','Batch Pan Massecuite','mif-versions'),(35,7,9,'ceksugarproduct','Sugar Product','mif-versions'),(36,7,10,'cekmolassestemp','Final Molasses Temperature','mif-versions'),(37,8,1,'reportdailymill','Daily Mill Material Report','mif-versions'),(38,8,2,'reportdailyclari','Daily Clarification Report','mif-versions'),(39,8,3,'reportdailyboiling','Daily Boiling Material Report','mif-versions'),(40,8,4,'reportdailypan','Daily Batch Pan Messecuite Report','mif-versions'),(42,8,5,'reportdailysugar','Daily Sugar Product Report','mif-versions'),(43,8,6,'reportdailyboilerwater','Daily Boiler Water Report','mif-versions'),(44,8,7,'reportdailycondensor','Daily Boiler Water, Condensate Report','mif-versions'),(45,8,8,'reportdailymachine','Daily Machine Test','mif-versions'),(46,8,9,'reportdailyeva','Daily Individual Evaporator Test','mif-versions'),(47,8,10,'reportdailyfloculant','Daily Floculant & Lime Report','mif-versions'),(48,8,11,'reportdailymolasses','Daily Final Molasses Temperature','mif-versions'),(49,6,2,'ujipetikauto','Analisa Uji Petik Gula Auto','mif-versions');

/*Table structure for table `parameter_analisa` */

DROP TABLE IF EXISTS `parameter_analisa`;

CREATE TABLE `parameter_analisa` (
  `id_parameter` varchar(5) CHARACTER SET latin1 NOT NULL,
  `nama_parameter` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `alias` varchar(35) CHARACTER SET latin1 DEFAULT NULL,
  `satuan` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `id_klp` varchar(4) CHARACTER SET latin1 DEFAULT NULL,
  `method` varchar(35) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_parameter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `parameter_analisa` */

insert  into `parameter_analisa`(`id_parameter`,`nama_parameter`,`alias`,`satuan`,`id_klp`,`method`) values ('P001','Brix','Brix','%','k09',''),('P002','Polarization','Pol','%','k09',''),('P003','pH','pH','','k02',''),('P004','Total Solid in Juice','Dirt','%','k03',''),('P005','Phospate Content after dosing','P2O5 aft.','ppm','k06',''),('P006','Phospate Content before dosing','P2O5 bfr.','ppm','k06',''),('P007','Reducing Sugar','RS','%','k11',''),('P008','Moisture Content','Moist.','%','k01',''),('P009','Preparation Index','PI','%','k09',''),('P010','Fiber Content','Fiber','%','k03',''),('P011','Turbidity','Turb.','NTU','k07',''),('P012','Calcium Oxide Content','CaO','ppm','k06',''),('P013','Liquid Colour','Colour','IU','k06',''),('P014','Crystal Colour','CT','CT','k05',''),('P015','Beume','Be','oBe','k11',''),('P016','Dextrant Content','Dext.','ppm','k06',''),('P017','Amylum Content','Amylum','ppm','k06',''),('P018','Grain Size','G-Size','mm','k03',''),('P019','Mean Aperture','MA','%','k03',''),('P020','Coefficient of Variation','CV','%','k03',''),('P021','Sulfur Dioxide content','SO2','ppm','k11',''),('P022','Condustivity Ash Content','Ash','ppm','k04',''),('P023','Sucrose Content','Sucrose','%','k11',''),('P024','Total Sugar as Invest','TSAI','%','k11',''),('P025','Viscosity','Visc.','cPa','k10',''),('P026','Sand Content','Sand','%','k11',''),('P027','Temperature','Temp.','oC','k11',''),('P028','Conductivity','Cond.','æS/cm','k04',''),('P029','Sugar Content','Sugar Content','ppm','k06',''),('P030','Disv. Oxygen as O?','DO','ppm','k08',''),('P031','Total Hardness','Hardness','ppm','k11',''),('P032','M. Alkalinity','M-Alk','ppm','k11',''),('P033','P.  Alkalinity','P-Alk','ppm','k11',''),('P034','O. Alkalinity','O-Alk','ppm','k11',''),('P035','Silica as SiO?','SiO2','ppm','k06',''),('P036','Phosphate as P?O?','P2O5','ppm','k06',''),('P037','Sulphite as Na?SO?','Sulfit','ppm','k06',''),('P038','Chloride as NaCL','Chloride','ppm','k06',''),('P039','Iron as Fe','Iron','ppm','k06',''),('P040','Debit','Debit','m3/day','k11',''),('P041','Chemical Oxigen Demand','COD','ppm','k06',''),('P042','Biological Oxigen Demand','BOD','ppm','k11',''),('P043','Total Suspended Solid','TSS','ppm','k03',''),('P044','Hydrogen Sulfida','H2S','ppm','k06',''),('P045','Amoniak','NH3','ppm','k06',''),('P046','Total Coliform','Coliform','APM/100ml','k11',''),('P047','Minyak Lemak','Minyak Lemak','ppm','k11',''),('P048','Berat wadah','Berat wadah','kg','k03',''),('P049','Berat Awal','Berat Awal','kg','k03',''),('P050','Berat Akhir','Berat Akhir','kg','k03',''),('P051','Liquid Colour - brix','Brix Colour','%','k09',''),('P052','Liquid Colour - Absorbance','Abs Colour','Abs','k06',''),('P053','Preparation Index - Brix1','Bx PI-1','%','k09',''),('P054','Preparation Index - Brix2','Bx PI-2','%','k09',''),('P055','Weight of Bag','Wt Bag','kg','k03',''),('P056','Weight of Sugar + Bag','Wt Bag brutto','kg','k03',''),('P057','Weight of Pack','Wt Pack','kg','k03',''),('P058','Weight of Sugar + Pack','Wt Pack Brutto','kg','k03',''),('P059','Weight of Box','Wt Box','kg','k03',''),('P060','Weight of Sugar + Box','Wt Box Brutto','kg','k03',''),('P061','Berat Fraksi 1 Tarra','Fraksi1 Tarra','kg','k03',''),('P062','Berat Fraksi 2 Tarra','Fraksi2 Tarra','kg','k03',''),('P063','Berat Fraksi 3 Tarra','Fraksi3 Tarra','kg','k03',''),('P064','Berat Fraksi 4 Tarra','Fraksi4 Tarra','kg','k03',''),('P065','Berat Fraksi 5 Tarra','Fraksi5 Tarra','kg','k03',''),('P066','Berat Fraksi 6 Tarra','Fraksi6 Tarra','kg','k03',''),('P067','Berat sample','Sample Gsize','kg','k03',''),('P068','Berat Fraksi 1 Netto','Fraksi1 Net','kg','k03',''),('P069','Berat Fraksi 2 Netto','Fraksi2 Net','kg','k03',''),('P070','Berat Fraksi 3 Netto','Fraksi3 Net','kg','k03',''),('P071','Berat Fraksi 4 Netto','Fraksi4 Net','kg','k03',''),('P072','Berat Fraksi 5 Netto','Fraksi5 Net','kg','k03',''),('P073','Berat Fraksi 6 Netto','Fraksi6 Net','kg','k03',''),('P074','Standard Deviasi Sugar','SD','%','k03','');

/*Table structure for table `satuan_parameter` */

DROP TABLE IF EXISTS `satuan_parameter`;

CREATE TABLE `satuan_parameter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `satuan_parameter` */

insert  into `satuan_parameter`(`id`,`name`,`satuan`) values (1,'Temperature','°C'),(2,'pH','pH'),(3,'P2O5','P2O5');

/*Table structure for table `station` */

DROP TABLE IF EXISTS `station`;

CREATE TABLE `station` (
  `id_station` varchar(4) DEFAULT NULL,
  `nama_station` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `station` */

insert  into `station`(`id_station`,`nama_station`) values ('S01','Cane Reception Station'),('S02','Milling Station'),('S03','Boiler House'),('S04','Water Station'),('S05','Clarification Station'),('S06','Boiling Station'),('S07','Curing Station'),('S08','Packing Station'),('S09','Waste Water Treatment'),('S10','Sugar Warehouse'),('S11','Molasses Storage');

/*Table structure for table `submenus` */

DROP TABLE IF EXISTS `submenus`;

CREATE TABLE `submenus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) DEFAULT NULL,
  `urut` tinyint(2) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `logo` varchar(255) DEFAULT 'mif-list2',
  PRIMARY KEY (`id`),
  UNIQUE KEY `DATA` (`id_menu`,`urut`,`category`),
  UNIQUE KEY `name` (`name`,`category`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `submenus` */

insert  into `submenus`(`id`,`id_menu`,`urut`,`name`,`desc`,`category`,`active`,`logo`) values (1,3,1,'setting','Setting',NULL,1,'mif-cog fg-red'),(2,3,2,'devices','Master',NULL,1,'mif-devices fg-green'),(3,1,1,'inputanalisa','Input Analisa',NULL,1,'mif-justice'),(5,1,2,'inputanalisakhusus','Input Analisa Khusus',NULL,1,'mif-verified'),(6,1,3,'inputujipetik','Input Analisa Uji Petik Gula',NULL,1,'mif-list2'),(7,4,1,'verifyanalisa','Verifikasi Analisa',NULL,1,'mif-list2'),(8,5,1,'report','Report',NULL,1,'mif-list2');

/*Table structure for table `system` */

DROP TABLE IF EXISTS `system`;

CREATE TABLE `system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `defaultpassword` varchar(35) DEFAULT NULL,
  `sessionidle` int(11) DEFAULT 0,
  `apipassword` varchar(255) DEFAULT NULL,
  `apipassworddefault` varchar(255) DEFAULT NULL,
  `systemname` varchar(35) DEFAULT NULL,
  `systemalias` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `system` */

insert  into `system`(`id`,`defaultpassword`,`sessionidle`,`apipassword`,`apipassworddefault`,`systemname`,`systemalias`) values (1,'gmp@123456',0,'1234','bengkelit','Lab Automation System','LAMS');

/*Table structure for table `uji_petik_gula` */

DROP TABLE IF EXISTS `uji_petik_gula`;

CREATE TABLE `uji_petik_gula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ujipetik` varchar(35) DEFAULT NULL,
  `id_parameter` varchar(5) DEFAULT NULL,
  `wkt_uji` datetime DEFAULT NULL,
  `nilai_uji` double DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `id_user` int(11) DEFAULT NULL,
  `is_data` tinyint(1) DEFAULT NULL COMMENT '1=new,2=ricek,3=test',
  `nomor` varchar(15) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_jam` int(11) DEFAULT NULL,
  `wkt_input` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

/*Data for the table `uji_petik_gula` */

insert  into `uji_petik_gula`(`id`,`id_ujipetik`,`id_parameter`,`wkt_uji`,`nilai_uji`,`status`,`id_user`,`is_data`,`nomor`,`tanggal`,`id_jam`,`wkt_input`) values (5,NULL,'P057',NULL,10,0,2,1,'UJI20030000001','2020-03-19',2,'2020-03-19 10:17:49'),(6,NULL,'P058',NULL,158,0,2,1,'UJI20030000002','2020-03-19',2,'2020-03-19 10:18:56'),(7,NULL,'P058',NULL,147,0,2,1,'UJI20030000003','2020-03-19',2,'2020-03-19 10:20:06'),(121,NULL,NULL,NULL,5545447,0,2,NULL,'','2020-04-15',NULL,'2020-04-15 15:57:22'),(122,NULL,NULL,NULL,8722252,0,2,NULL,'','2020-04-15',NULL,'2020-04-15 15:57:23'),(123,NULL,NULL,NULL,1246493,0,2,NULL,'','2020-04-15',NULL,'2020-04-15 15:57:26'),(124,NULL,NULL,NULL,4978490,0,2,NULL,'','2020-04-15',NULL,'2020-04-15 15:57:29'),(125,NULL,NULL,NULL,9430070,0,2,NULL,'','2020-04-15',NULL,'2020-04-15 15:57:32'),(126,NULL,NULL,NULL,1419105,0,2,NULL,'','2020-04-15',NULL,'2020-04-15 15:57:35'),(127,NULL,NULL,NULL,9021161,0,2,NULL,'','2020-04-15',NULL,'2020-04-15 15:57:38'),(128,NULL,NULL,NULL,9201165,0,2,NULL,'','2020-04-15',NULL,'2020-04-15 15:57:42'),(129,NULL,NULL,NULL,5511305,0,2,NULL,'','2020-04-15',NULL,'2020-04-15 15:57:44'),(130,NULL,NULL,NULL,4810458,0,2,NULL,'','2020-04-15',NULL,'2020-04-15 15:57:47'),(131,NULL,NULL,NULL,6641060,0,2,NULL,'','2020-04-15',NULL,'2020-04-15 15:57:50'),(132,NULL,NULL,NULL,8319249,0,2,NULL,'','2020-04-15',NULL,'2020-04-15 15:57:54'),(133,NULL,NULL,NULL,8273673,0,2,NULL,'','2020-04-15',NULL,'2020-04-15 15:57:57'),(134,NULL,NULL,NULL,4136897,0,2,NULL,'','2020-04-15',NULL,'2020-04-15 15:58:00'),(135,NULL,NULL,NULL,6091034,0,2,NULL,'','2020-04-15',NULL,'2020-04-15 15:58:03'),(136,NULL,NULL,NULL,6891203,0,2,NULL,'','2020-04-15',NULL,'2020-04-15 15:58:06');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) DEFAULT NULL,
  `namalengkap` varchar(70) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0 COMMENT '1 = administrator,0=user',
  `allow` tinyint(1) DEFAULT 1 COMMENT '1 = aktif, 0= non aktif',
  `bidang_kerja` enum('Operator','Supervisor','Staf','Administrator') DEFAULT 'Operator',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`nip`,`namalengkap`,`password`,`gender`,`is_admin`,`allow`,`bidang_kerja`) values (2,'admin','Administrator','123','L',1,1,'Administrator'),(4,'operator','operator','gmp@123456','L',0,1,'Operator'),(5,'spv','Supervisor','gmp@123456','L',0,1,'Supervisor'),(6,'officer','Officer','gmp@123456','L',0,1,'Staf');

/*Table structure for table `verifikasi` */

DROP TABLE IF EXISTS `verifikasi`;

CREATE TABLE `verifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(15) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_jam` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_module` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `verifikasi` */

/*Table structure for table `wf_action` */

DROP TABLE IF EXISTS `wf_action`;

CREATE TABLE `wf_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(35) DEFAULT NULL,
  `id_wf_status` int(11) DEFAULT NULL,
  `id_wf_group` int(11) DEFAULT NULL,
  `keterangan` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `wf_action` */

insert  into `wf_action`(`id`,`desc`,`id_wf_status`,`id_wf_group`,`keterangan`) values (2,'Verify',2,2,'untuk verivied'),(3,'Approve',3,3,'untuk Approval'),(4,'Reject',4,2,'untuk verivied'),(5,'Change Request',1,2,'untuk verivied'),(6,'Recall',1,1,'untuk submiter'),(7,'Reject',4,3,'untuk Approval'),(8,'Change Request',1,3,'untuk Approval');

/*Table structure for table `wf_asigment` */

DROP TABLE IF EXISTS `wf_asigment`;

CREATE TABLE `wf_asigment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_wf_group` int(11) DEFAULT NULL,
  `id_wf_submiter` int(11) DEFAULT NULL,
  `step` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wf_asigment` */

insert  into `wf_asigment`(`id`,`id_user`,`id_wf_group`,`id_wf_submiter`,`step`) values (1,5,2,1,1),(2,6,3,1,2);

/*Table structure for table `wf_group` */

DROP TABLE IF EXISTS `wf_group`;

CREATE TABLE `wf_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wf_group` */

insert  into `wf_group`(`id`,`name`) values (1,'Submiter'),(2,'Verify'),(3,'Appoval');

/*Table structure for table `wf_status` */

DROP TABLE IF EXISTS `wf_status`;

CREATE TABLE `wf_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idstatus` varchar(35) DEFAULT NULL,
  `desc` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `wf_status` */

insert  into `wf_status`(`id`,`idstatus`,`desc`) values (1,'draft','Draft'),(2,'inreview','In Review'),(3,'approve','Approve'),(4,'reject','Reject'),(5,'submited','Submited'),(6,'change','Change Request');

/*Table structure for table `wf_submiter` */

DROP TABLE IF EXISTS `wf_submiter`;

CREATE TABLE `wf_submiter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_wf_table` int(11) DEFAULT NULL,
  `id_wf_group` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wf_submiter` */

insert  into `wf_submiter`(`id`,`id_user`,`id_wf_table`,`id_wf_group`) values (1,4,1,1);

/*Table structure for table `wf_table` */

DROP TABLE IF EXISTS `wf_table`;

CREATE TABLE `wf_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(15) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `id_module` int(11) DEFAULT NULL,
  `nama_table` varchar(255) DEFAULT NULL,
  `nama_field` varchar(255) DEFAULT NULL,
  `nama_create` varchar(255) DEFAULT NULL,
  `nama_pending` varchar(255) DEFAULT NULL,
  `nama_verify` varchar(255) DEFAULT NULL,
  `nama_approve` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wf_table` */

insert  into `wf_table`(`id`,`nomor`,`nama`,`id_module`,`nama_table`,`nama_field`,`nama_create`,`nama_pending`,`nama_verify`,`nama_approve`) values (1,'20012901','Analisa PH Workflow',4,'hasil_analisa','id_status','id_user','pending_user','verify_by','approve_by');

/*Table structure for table `wf_tracking` */

DROP TABLE IF EXISTS `wf_tracking`;

CREATE TABLE `wf_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaction` int(11) DEFAULT NULL,
  `id_wf_table` int(11) DEFAULT NULL,
  `id_module` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `wf_tracking` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
