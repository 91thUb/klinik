/*
SQLyog Community v11.31 (32 bit)
MySQL - 5.1.41 : Database - klinik
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`klinik` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `klinik`;

/*Table structure for table `detail_berobat` */

DROP TABLE IF EXISTS `detail_berobat`;

CREATE TABLE `detail_berobat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_riwayat_berobat` int(11) DEFAULT NULL,
  `id_obat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_obat` (`id_obat`),
  KEY `id_riwayat_berobat` (`id_riwayat_berobat`),
  CONSTRAINT `detail_berobat_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_berobat_ibfk_2` FOREIGN KEY (`id_riwayat_berobat`) REFERENCES `riwayat_berobat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `detail_berobat` */

insert  into `detail_berobat`(`id`,`id_riwayat_berobat`,`id_obat`) values (8,10,4),(13,11,4),(14,11,5),(15,1,4),(16,12,4),(17,13,4),(18,13,5),(19,13,6),(23,14,4),(24,14,6);

/*Table structure for table `dokter` */

DROP TABLE IF EXISTS `dokter`;

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(255) DEFAULT NULL,
  `gelar_depan` varchar(255) DEFAULT NULL,
  `gelar_belakang` varchar(255) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `dokter` */

insert  into `dokter`(`id`,`nama`,`alamat`,`no_telp`,`gelar_depan`,`gelar_belakang`,`umur`) values (1,'Resti','Hati ku','0856xx','Dr.','M,ARG',17),(2,'Mutia','Hati ku','0865xxx','Dr.','Phd',23);

/*Table structure for table `obat` */

DROP TABLE IF EXISTS `obat`;

CREATE TABLE `obat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_suplier` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id`),
  KEY `obat_ibfk_1` (`id_suplier`),
  CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_suplier`) REFERENCES `suplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `obat` */

insert  into `obat`(`id`,`id_suplier`,`nama`,`deskripsi`) values (4,2,'Paramex','Obat php'),(5,2,'Panadol','Obat sakit hati'),(6,1,'asd','asd'),(7,3,'panas','-');

/*Table structure for table `operator` */

DROP TABLE IF EXISTS `operator`;

CREATE TABLE `operator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(255) DEFAULT NULL,
  `umur` smallint(6) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_passwd` varchar(255) DEFAULT NULL,
  `id_type_operator` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_operator` (`id_type_operator`),
  CONSTRAINT `operator_ibfk_1` FOREIGN KEY (`id_type_operator`) REFERENCES `type_operator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `operator` */

insert  into `operator`(`id`,`nama`,`alamat`,`no_telp`,`umur`,`user_name`,`user_passwd`,`id_type_operator`) values (1,'admin lalala','administator','0876x',22,'admin','admin',2),(2,'operator lalala','operator','098x',21,'operator','operator',1),(3,'operator 2','asda','0877',22,'operator2','operator2',1);

/*Table structure for table `pasien` */

DROP TABLE IF EXISTS `pasien`;

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `umur` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pasien` */

insert  into `pasien`(`id`,`nama`,`alamat`,`no_telp`,`umur`) values (1,'Aseprg','Cipanas','0876x',22),(2,'Mut mut','Tasik','0876x',23);

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pegawai` */

insert  into `pegawai`(`id`,`nip`,`nama`,`alamat`,`kota`) values (1,'8989','nama','alamat','bogor'),(2,'898989','nama 2','bandung','bandung');

/*Table structure for table `riwayat_berobat` */

DROP TABLE IF EXISTS `riwayat_berobat`;

CREATE TABLE `riwayat_berobat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokter` int(11) DEFAULT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `id_operator` int(11) DEFAULT NULL,
  `keluhan` text,
  `tanggal` datetime DEFAULT NULL,
  `totalBiaya` double DEFAULT NULL,
  `bayar` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_dokter` (`id_dokter`),
  KEY `id_pasien` (`id_pasien`),
  KEY `id_operator` (`id_operator`),
  CONSTRAINT `riwayat_berobat_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `riwayat_berobat_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `riwayat_berobat_ibfk_3` FOREIGN KEY (`id_operator`) REFERENCES `operator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `riwayat_berobat` */

insert  into `riwayat_berobat`(`id`,`id_dokter`,`id_pasien`,`id_operator`,`keluhan`,`tanggal`,`totalBiaya`,`bayar`) values (1,1,1,2,'asdad','2013-12-25 06:39:08',45000,100000),(10,1,1,1,'ad','2013-12-25 06:38:07',1,2),(11,1,1,1,'asdasdad','2013-12-25 06:38:45',222222222222,22222222222222),(12,2,1,2,'asadasd','2013-12-25 07:40:42',2323,2323),(13,1,1,3,'asd','2013-12-25 07:50:19',11,1),(14,1,1,1,'rwer','2013-12-26 09:20:42',34,3434);

/*Table structure for table `suplier` */

DROP TABLE IF EXISTS `suplier`;

CREATE TABLE `suplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `suplier` */

insert  into `suplier`(`id`,`nama_supplier`,`alamat`,`no_telp`) values (1,'Kimia Farma','Jakarta','0865x'),(2,'Sari Husada','Bandung','0812xx'),(3,'Mut Mut Farma','Jalan mana we','0876xx');

/*Table structure for table `type_operator` */

DROP TABLE IF EXISTS `type_operator`;

CREATE TABLE `type_operator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `type_operator` */

insert  into `type_operator`(`id`,`nama`) values (1,'operator'),(2,'admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
