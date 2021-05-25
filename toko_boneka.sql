/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.14-MariaDB : Database - toko_boneka
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`toko_boneka` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `toko_boneka`;

/*Table structure for table `boneka` */

DROP TABLE IF EXISTS `boneka`;

CREATE TABLE `boneka` (
  `id_boneka` INT(3) DEFAULT NULL,
  `id_merk` INT(3) DEFAULT NULL,
  `ukuran` VARCHAR(5) DEFAULT NULL,
  `warna` VARCHAR(10) DEFAULT NULL,
  `harga` INT(12) DEFAULT NULL,
  `stok` INT(3) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Data for the table `boneka` */

INSERT  INTO `boneka`(`id_boneka`,`id_merk`,`ukuran`,`warna`,`harga`,`stok`) VALUES 
(1,1,'Big','Coklat',30000,3),
(2,2,'Stand','Pink',90000,2),
(3,3,'Stand','Merah',30000,5);

/*Table structure for table `detail_bayar` */

DROP TABLE IF EXISTS `detail_bayar`;

CREATE TABLE `detail_bayar` (
  `id_detail` INT(3) NOT NULL,
  `id_boneka` INT(3) DEFAULT NULL,
  `jumlah_beli` INT(3) DEFAULT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_bayar` */

INSERT  INTO `detail_bayar`(`id_detail`,`id_boneka`,`jumlah_beli`) VALUES 
(1,1,3),
(2,2,2),
(3,3,1);

/*Table structure for table `header_bayar` */

DROP TABLE IF EXISTS `header_bayar`;

CREATE TABLE `header_bayar` (
  `no_nota` INT(3) NOT NULL,
  `tanggal` DATE DEFAULT NULL,
  `id_detail` INT(3) DEFAULT NULL,
  `total_pembelian` INT(12) DEFAULT NULL,
  `bayar` INT(12) DEFAULT NULL,
  `sisa_bayar` INT(12) DEFAULT NULL,
  PRIMARY KEY (`no_nota`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Data for the table `header_bayar` */

INSERT  INTO `header_bayar`(`no_nota`,`tanggal`,`id_detail`,`total_pembelian`,`bayar`,`sisa_bayar`) VALUES 
(1,'2021-05-10',1,90000,100000,10000),
(2,'2021-05-11',2,180000,180000,0),
(3,'2021-05-12',3,30000,50000,10000);

/*Table structure for table `merk` */

DROP TABLE IF EXISTS `merk`;

CREATE TABLE `merk` (
  `id_merk` INT(3) NOT NULL,
  `nama_merk` VARCHAR(50) DEFAULT NULL,
  `model_boneka` VARCHAR(30) DEFAULT NULL,
  PRIMARY KEY (`id_merk`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Data for the table `merk` */

INSERT  INTO `merk`(`id_merk`,`nama_merk`,`model_boneka`) VALUES 
(1,'Tedy','Boneka Beruang'),
(2,'Barbie','Boneka Perempuan'),
(3,'Elsa','Boneka Karakter');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
