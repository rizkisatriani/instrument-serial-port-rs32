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

/*Table structure for table `devices_jenis` */

DROP TABLE IF EXISTS `devices_jenis`;

CREATE TABLE `devices_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis` varchar(3) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
  `param` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36424 DEFAULT CHARSET=latin1;

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

/*Table structure for table `material_analisa` */

DROP TABLE IF EXISTS `material_analisa`;

CREATE TABLE `material_analisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_material` varchar(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_station` varchar(5) DEFAULT NULL,
  `faktor_pengenceran` int(11) DEFAULT NULL,
  `id_klp` varchar(255) DEFAULT NULL,
  `urut_mill` int(11) DEFAULT NULL,
  `urut_boiling` int(11) DEFAULT NULL,
  `urut_boiler` int(11) DEFAULT NULL,
  `urut_water` int(11) DEFAULT NULL,
  `urut_evap` int(11) DEFAULT NULL,
  `urut_batch` int(11) DEFAULT NULL,
  `urut_floculant` int(11) DEFAULT NULL,
  `urut_machine` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

/*Table structure for table `parameter_analisa` */

DROP TABLE IF EXISTS `parameter_analisa`;

CREATE TABLE `parameter_analisa` (
  `id_parameter` varchar(5) CHARACTER SET latin1 NOT NULL,
  `nama_parameter` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `alias` varchar(35) CHARACTER SET latin1 DEFAULT NULL,
  `satuan` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `id_klp` varchar(4) CHARACTER SET latin1 DEFAULT NULL,
  `method` varchar(35) CHARACTER SET latin1 DEFAULT NULL,
  `is_mill` tinyint(1) DEFAULT 0,
  `is_boiling` tinyint(1) DEFAULT 0,
  `is_boiler` tinyint(1) DEFAULT 0,
  `is_water` tinyint(1) DEFAULT 0,
  `is_evap` tinyint(1) DEFAULT 0,
  `is_batch` tinyint(1) DEFAULT 0,
  `is_floculant` tinyint(1) DEFAULT 0,
  `is_machine` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id_parameter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `satuan_parameter` */

DROP TABLE IF EXISTS `satuan_parameter`;

CREATE TABLE `satuan_parameter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `station` */

DROP TABLE IF EXISTS `station`;

CREATE TABLE `station` (
  `id_station` varchar(4) DEFAULT NULL,
  `nama_station` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

/*Table structure for table `uji_petik_gula` */

DROP TABLE IF EXISTS `uji_petik_gula`;

CREATE TABLE `uji_petik_gula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ujipetik` varchar(35) DEFAULT NULL,
  `id_parameter` varchar(5) DEFAULT NULL,
  `wkt_uji` datetime DEFAULT NULL,
  `nilai_uji` float(10,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `id_user` int(11) DEFAULT NULL,
  `is_data` tinyint(1) DEFAULT 1 COMMENT '1=new,2=ricek,3=test',
  `tanggal` date DEFAULT NULL,
  `wkt_input` timestamp NULL DEFAULT current_timestamp(),
  `id_user_delete` int(11) DEFAULT NULL,
  `reason_delete` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=latin1;

/*Table structure for table `uji_petik_parameter` */

DROP TABLE IF EXISTS `uji_petik_parameter`;

CREATE TABLE `uji_petik_parameter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pack` varchar(10) DEFAULT NULL,
  `nama_pack` varchar(35) DEFAULT NULL,
  `min` float(10,2) DEFAULT 0.00,
  `max` float(10,2) DEFAULT 0.00,
  `min_save` float(10,2) DEFAULT 0.00,
  `max_save` float(10,2) DEFAULT 0.00,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

/*Table structure for table `verifikasi` */

DROP TABLE IF EXISTS `verifikasi`;

CREATE TABLE `verifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(15) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_jam` varchar(8) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_module` int(11) DEFAULT NULL,
  `param` varchar(15) DEFAULT NULL,
  `wkt_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `verifikasi_detil` */

DROP TABLE IF EXISTS `verifikasi_detil`;

CREATE TABLE `verifikasi_detil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_verifikasi` int(11) DEFAULT NULL,
  `id_material` varchar(11) DEFAULT NULL,
  `id_parameter` varchar(5) DEFAULT NULL,
  `id_jam` varchar(8) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `hasil_awal` double DEFAULT 0,
  `hasil` double DEFAULT 0,
  `param` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=183 DEFAULT CHARSET=latin1;

/*Table structure for table `verifikasi_detil_tmp` */

DROP TABLE IF EXISTS `verifikasi_detil_tmp`;

CREATE TABLE `verifikasi_detil_tmp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_verifikasi` int(11) DEFAULT NULL,
  `id_material` varchar(11) DEFAULT NULL,
  `id_parameter` varchar(5) DEFAULT NULL,
  `id_jam` varchar(8) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `hasil_awal` double DEFAULT 0,
  `hasil` double DEFAULT 0,
  `param` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=483 DEFAULT CHARSET=latin1;

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

/*Table structure for table `wf_group` */

DROP TABLE IF EXISTS `wf_group`;

CREATE TABLE `wf_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `wf_status` */

DROP TABLE IF EXISTS `wf_status`;

CREATE TABLE `wf_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idstatus` varchar(35) DEFAULT NULL,
  `desc` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `wf_submiter` */

DROP TABLE IF EXISTS `wf_submiter`;

CREATE TABLE `wf_submiter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_wf_table` int(11) DEFAULT NULL,
  `id_wf_group` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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

/*Table structure for table `wf_tracking` */

DROP TABLE IF EXISTS `wf_tracking`;

CREATE TABLE `wf_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaction` int(11) DEFAULT NULL,
  `id_wf_table` int(11) DEFAULT NULL,
  `id_module` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Procedure structure for procedure `water_condensate_prods` */

/*!50003 DROP PROCEDURE IF EXISTS  `water_condensate_prods` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `water_condensate_prods`(IN tgl VARCHAR(20))
BEGIN
 SELECT id_jam
,CASE WHEN id_material = "M051" AND id_parameter="P003" THEN hasil ELSE 0 END AS M051P003
,CASE WHEN id_material = "M051" AND id_parameter="P029" THEN hasil ELSE 0 END AS M051P029
,CASE WHEN id_material = "M052" AND id_parameter="P003" THEN hasil ELSE 0 END AS M052P003
,CASE WHEN id_material = "M052" AND id_parameter="P029" THEN hasil ELSE 0 END AS M052P029
,CASE WHEN id_material = "M053" AND id_parameter="P003" THEN hasil ELSE 0 END AS M053P003
,CASE WHEN id_material = "M053" AND id_parameter="P029" THEN hasil ELSE 0 END AS M053P029
,CASE WHEN id_material = "M054" AND id_parameter="P003" THEN hasil ELSE 0 END AS M054P003
,CASE WHEN id_material = "M054" AND id_parameter="P029" THEN hasil ELSE 0 END AS M054P029
,CASE WHEN id_material = "M055" AND id_parameter="P003" THEN hasil ELSE 0 END AS M055P003
,CASE WHEN id_material = "M055" AND id_parameter="P029" THEN hasil ELSE 0 END AS M055P029
,CASE WHEN id_material = "M056" AND id_parameter="P029" THEN hasil ELSE 0 END AS M056P029
,CASE WHEN id_material = "M056" AND id_parameter="P003" THEN hasil ELSE 0 END AS M056P003
,CASE WHEN id_material = "M062" AND id_parameter="P003" THEN hasil ELSE 0 END AS M062P003
,CASE WHEN id_material = "M062" AND id_parameter="P029" THEN hasil ELSE 0 END AS M062P029
,CASE WHEN id_material = "M063" AND id_parameter="P029" THEN hasil ELSE 0 END AS M063P029
,CASE WHEN id_material = "M063" AND id_parameter="P003" THEN hasil ELSE 0 END AS M063P003
,CASE WHEN id_material = "M064" AND id_parameter="P003" THEN hasil ELSE 0 END AS M064P003
,CASE WHEN id_material = "M064" AND id_parameter="P029" THEN hasil ELSE 0 END AS M064P029
,CASE WHEN id_material = "M068" AND id_parameter="P003" THEN hasil ELSE 0 END AS M068P003
,CASE WHEN id_material = "M068" AND id_parameter="P029" THEN hasil ELSE 0 END AS M068P029
,CASE WHEN id_material = "M069" AND id_parameter="P003" THEN hasil ELSE 0 END AS M069P003
,CASE WHEN id_material = "M069" AND id_parameter="P029" THEN hasil ELSE 0 END AS M069P029
                  FROM water_condensate_report_tb_2
                  WHERE tanggal=tgl 
                   GROUP BY  id_jam;
    END */$$
DELIMITER ;

/*Table structure for table `mollasses_temp` */

DROP TABLE IF EXISTS `mollasses_temp`;

/*!50001 DROP VIEW IF EXISTS `mollasses_temp` */;
/*!50001 DROP TABLE IF EXISTS `mollasses_temp` */;

/*!50001 CREATE TABLE  `mollasses_temp`(
 `id_material` varchar(11) ,
 `id_parameter` varchar(5) ,
 `id_jam` varchar(255) ,
 `tanggal` date ,
 `hasil` double 
)*/;

/*Table structure for table `sugar_product` */

DROP TABLE IF EXISTS `sugar_product`;

/*!50001 DROP VIEW IF EXISTS `sugar_product` */;
/*!50001 DROP TABLE IF EXISTS `sugar_product` */;

/*!50001 CREATE TABLE  `sugar_product`(
 `id_material` varchar(11) ,
 `id_parameter` varchar(5) ,
 `id_jam` int(11) ,
 `tanggal` date ,
 `no_strike` varchar(35) ,
 `hasil` double 
)*/;

/*Table structure for table `water_condensate_report_tb_5` */

DROP TABLE IF EXISTS `water_condensate_report_tb_5`;

/*!50001 DROP VIEW IF EXISTS `water_condensate_report_tb_5` */;
/*!50001 DROP TABLE IF EXISTS `water_condensate_report_tb_5` */;

/*!50001 CREATE TABLE  `water_condensate_report_tb_5`(
 `id` int(11) ,
 `tanggal` date ,
 `id_jam` varchar(8) ,
 `id_material` varchar(11) ,
 `NAME` varchar(255) ,
 `pH` double ,
 `Sugar` double ,
 `Debit` double 
)*/;

/*View structure for view mollasses_temp */

/*!50001 DROP TABLE IF EXISTS `mollasses_temp` */;
/*!50001 DROP VIEW IF EXISTS `mollasses_temp` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mollasses_temp` AS (select `t`.`id_material` AS `id_material`,`t`.`parameter` AS `id_parameter`,`t`.`id_jam` AS `id_jam`,`t`.`tanggal` AS `tanggal`,case when max(`t`.`hasil`) = 0 then min(`t`.`hasil`) else max(`t`.`hasil`) end AS `hasil` from (select `db_laborat`.`material_analisa`.`id_material` AS `id_material`,coalesce(`db_laborat`.`parameter_analisa`.`id_parameter`,'-') AS `parameter`,`db_laborat`.`jam_analisa`.`desc` AS `id_jam`,`db_laborat`.`hasil_analisa`.`tanggal` AS `tanggal`,case when `db_laborat`.`material_analisa`.`id` = `db_laborat`.`hasil_analisa`.`id_material` and `db_laborat`.`parameter_analisa`.`id_parameter` = 'P027' then coalesce(avg(`db_laborat`.`hasil_analisa`.`hasil`),0) else 0 end AS `hasil` from (((`db_laborat`.`material_analisa` left join `db_laborat`.`hasil_analisa` on(`db_laborat`.`material_analisa`.`id` in ('140','141','142','143','176','145'))) left join `db_laborat`.`parameter_analisa` on(`db_laborat`.`parameter_analisa`.`id_parameter` = `db_laborat`.`hasil_analisa`.`id_parameter`)) left join `db_laborat`.`jam_analisa` on(`db_laborat`.`jam_analisa`.`id` = `db_laborat`.`hasil_analisa`.`id_jam`)) where `db_laborat`.`hasil_analisa`.`id_material` in ('140','141','142','143','176','145') and `db_laborat`.`parameter_analisa`.`id_parameter` = 'P027' group by `db_laborat`.`material_analisa`.`id`,`db_laborat`.`hasil_analisa`.`id_material` order by `db_laborat`.`material_analisa`.`id`) `t` group by `t`.`id_material`,`t`.`id_jam` order by `t`.`id_jam`,`t`.`id_material`) */;

/*View structure for view sugar_product */

/*!50001 DROP TABLE IF EXISTS `sugar_product` */;
/*!50001 DROP VIEW IF EXISTS `sugar_product` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sugar_product` AS (select `t`.`id_material` AS `id_material`,`t`.`parameter` AS `id_parameter`,`t`.`id_jam` AS `id_jam`,`t`.`tanggal` AS `tanggal`,`t`.`no_strike` AS `no_strike`,case when max(`t`.`hasil`) = 0 then min(`t`.`hasil`) else max(`t`.`hasil`) end AS `hasil` from (select `db_laborat`.`material_analisa`.`id_material` AS `id_material`,coalesce(`db_laborat`.`parameter_analisa`.`id_parameter`,'-') AS `parameter`,`db_laborat`.`hasil_analisa`.`id_parameter` AS `id_parameter2`,`db_laborat`.`hasil_analisa`.`id_jam` AS `id_jam`,`db_laborat`.`hasil_analisa`.`tanggal` AS `tanggal`,case when `db_laborat`.`parameter_analisa`.`id_parameter` = `db_laborat`.`hasil_analisa`.`id_parameter` and `db_laborat`.`hasil_analisa`.`id_material` = '39' then coalesce(avg(`db_laborat`.`hasil_analisa`.`hasil`),0) else 0 end AS `hasil`,coalesce(`db_laborat`.`hasil_analisa`.`no_strike`,0) AS `no_strike` from ((`db_laborat`.`parameter_analisa` left join `db_laborat`.`hasil_analisa` on(`db_laborat`.`parameter_analisa`.`id_parameter` in ('P013','P014','P008','P002','P018','P019','P020','P021','P022','P084','P085','P086','P080'))) left join `db_laborat`.`material_analisa` on(`db_laborat`.`material_analisa`.`id` = `db_laborat`.`hasil_analisa`.`id_material`)) where `db_laborat`.`hasil_analisa`.`id_parameter` in ('P013','P014','P008','P002','P018','P019','P020','P021','P022','P084','P085','P086','P080') and `db_laborat`.`hasil_analisa`.`id_material` = '39' group by `db_laborat`.`parameter_analisa`.`id_parameter`,`db_laborat`.`hasil_analisa`.`id_parameter`,`db_laborat`.`hasil_analisa`.`id_jam`) `t` group by `t`.`parameter`,`t`.`id_jam` order by `t`.`id_jam`) */;

/*View structure for view water_condensate_report_tb_5 */

/*!50001 DROP TABLE IF EXISTS `water_condensate_report_tb_5` */;
/*!50001 DROP VIEW IF EXISTS `water_condensate_report_tb_5` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `water_condensate_report_tb_5` AS (select `t`.`id` AS `id`,`t`.`tanggal` AS `tanggal`,`t`.`id_jam` AS `id_jam`,`t`.`id_material` AS `id_material`,`t`.`NAME` AS `NAME`,case when max(`t`.`pH`) = 0 then min(`t`.`pH`) else max(`t`.`pH`) end AS `pH`,case when max(`t`.`Sugar`) = 0 then min(`t`.`Sugar`) else max(`t`.`Sugar`) end AS `Sugar`,case when max(`t`.`Debit`) = 0 then min(`t`.`Debit`) else max(`t`.`Debit`) end AS `Debit` from (select `db_laborat`.`verifikasi_detil`.`id_verifikasi` AS `id`,`db_laborat`.`verifikasi`.`tanggal` AS `tanggal`,`db_laborat`.`verifikasi_detil`.`id_jam` AS `id_jam`,`db_laborat`.`material_analisa`.`id_material` AS `id_material`,`db_laborat`.`verifikasi_detil`.`id_material` AS `material`,`db_laborat`.`verifikasi_detil`.`id_parameter` AS `id_parameter`,`db_laborat`.`verifikasi_detil`.`hasil` AS `hasil`,`db_laborat`.`material_analisa`.`name` AS `NAME`,case when (`db_laborat`.`material_analisa`.`id_material` = `db_laborat`.`verifikasi_detil`.`id_material` and `db_laborat`.`verifikasi_detil`.`id_parameter` = 'P003') then `db_laborat`.`verifikasi_detil`.`hasil` else 0 end AS `pH`,case when (`db_laborat`.`material_analisa`.`id_material` = `db_laborat`.`verifikasi_detil`.`id_material` and `db_laborat`.`verifikasi_detil`.`id_parameter` = 'P029') then `db_laborat`.`verifikasi_detil`.`hasil` else 0 end AS `Sugar`,case when (`db_laborat`.`material_analisa`.`id_material` = `db_laborat`.`verifikasi_detil`.`id_material` and `db_laborat`.`verifikasi_detil`.`id_parameter` = 'P040') then `db_laborat`.`verifikasi_detil`.`hasil` else 0 end AS `Debit` from (`db_laborat`.`material_analisa` left join (`db_laborat`.`verifikasi` join `db_laborat`.`verifikasi_detil` on(`db_laborat`.`verifikasi_detil`.`id_material` in ('M089','M090','M091','M092','M093','M094') and `db_laborat`.`verifikasi`.`id` = `db_laborat`.`verifikasi_detil`.`id_verifikasi`)) on(`db_laborat`.`material_analisa`.`id_material` in ('M089','M090','M091','M092','M093','M094'))) where `db_laborat`.`verifikasi_detil`.`param` = 'water' order by `db_laborat`.`verifikasi_detil`.`id_jam`,`db_laborat`.`material_analisa`.`id_material`) `t` group by `t`.`id_material`,`t`.`id_jam` order by `t`.`id_jam`,`t`.`id_material` desc) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
