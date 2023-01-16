# Host: localhost  (Version 5.5.5-10.4.19-MariaDB)
# Date: 2022-07-21 11:47:56
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "alternatif"
#

DROP TABLE IF EXISTS `alternatif`;
CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `fax` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "alternatif"
#

INSERT INTO `alternatif` VALUES (1,'PT. Vita Pratama Abadi','Jl. Surya Permata III No.47 , Kebon Jeruk, Jakarta Barat\t','082244333188','-'),(2,'Boss Grocery and Supplier','Jl. Bunga Raya, Pasar Baloi Persero No.19, Riau','07784081888','-'),(3,'PT. Jaya Fermex','Komp. Purimutiara. Jl. Griya Utama Blok A No.21 - 22, Sunter Agung, Jakarta','02165310808','02165310811'),(4,'Ariani Sundari','Jl. Raya Sukabumi Selatan No.23, Kebon Jeruk, Jakarta Barat','08127107772','-'),(5,'Raja Telur','Jl. Ketandan Wetan No.47, Yogyakarta','087838649495','0274562079'),(6,'CV. Sumber Berkat','Jl. Jenggolo 25 Kemirirejo, Magelang','082137221459','-'),(7,'Jasmine Fresh Fruit','Jl. Teuku Umar. Gg. Rajawali No.8,  Bali','081338582494','-'),(8,'PT. Palembang Batam Sejahtera','Taman Sari Hijau Blok B2 No.11, Tiban Baru Sekupang, Batam','02158902147','02158902148');

#
# Structure for table "hasil"
#

DROP TABLE IF EXISTS `hasil`;
CREATE TABLE `hasil` (
  `id_alternatif` int(11) NOT NULL,
  `nilai` double DEFAULT NULL,
  `periode` date NOT NULL,
  PRIMARY KEY (`id_alternatif`,`periode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "hasil"
#


#
# Structure for table "kriteria"
#

DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(50) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  `atribut` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "kriteria"
#

INSERT INTO `kriteria` VALUES (1,'Harga',0.23988,'Cost'),(2,'Kualitas Produk',0.28084,'Benefit'),(3,'Waktu Pengiriman',0.05956,'Cost'),(4,'Ketersediaan Barang',0.26146,'Benefit'),(5,'Kualitas Pelayanan',0.15828,'Benefit');

#
# Structure for table "bobot_kriteria"
#

DROP TABLE IF EXISTS `bobot_kriteria`;
CREATE TABLE `bobot_kriteria` (
  `kriteria_1` int(11) NOT NULL,
  `kriteria_2` int(11) NOT NULL,
  `bobot` char(5) NOT NULL,
  KEY `kriteria_1` (`kriteria_1`),
  KEY `kriteria_2` (`kriteria_2`),
  CONSTRAINT `bobot_kriteria_ibfk_1` FOREIGN KEY (`kriteria_1`) REFERENCES `kriteria` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `bobot_kriteria_ibfk_2` FOREIGN KEY (`kriteria_2`) REFERENCES `kriteria` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "bobot_kriteria"
#

INSERT INTO `bobot_kriteria` VALUES (1,2,'1/3'),(1,3,'4/1'),(1,4,'1/1'),(1,5,'3/1'),(2,3,'3/1'),(2,4,'1/1'),(2,5,'1/1'),(3,4,'1/5'),(3,5,'1/3'),(4,5,'2/1');

#
# Structure for table "level"
#

DROP TABLE IF EXISTS `level`;
CREATE TABLE `level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "level"
#

INSERT INTO `level` VALUES (1,'Decision Maker'),(2,'Staff Entry'),(4,'Admin');

#
# Structure for table "nilai_alternatif"
#

DROP TABLE IF EXISTS `nilai_alternatif`;
CREATE TABLE `nilai_alternatif` (
  `alternatif` int(11) DEFAULT NULL,
  `kriteria` int(11) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `periode` date NOT NULL,
  KEY `alternatif` (`alternatif`),
  KEY `kriteria` (`kriteria`),
  CONSTRAINT `nilai_alternatif_ibfk_1` FOREIGN KEY (`alternatif`) REFERENCES `alternatif` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `nilai_alternatif_ibfk_2` FOREIGN KEY (`kriteria`) REFERENCES `kriteria` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "nilai_alternatif"
#

INSERT INTO `nilai_alternatif` VALUES (1,1,11500,'2022-07-13'),(1,2,3,'2022-07-13'),(1,3,1,'2022-07-13'),(1,4,3,'2022-07-13'),(1,5,4,'2022-07-13'),(2,1,27000,'2022-07-13'),(2,2,4,'2022-07-13'),(2,3,6,'2022-07-13'),(2,4,4,'2022-07-13'),(2,5,5,'2022-07-13'),(3,1,39000,'2022-07-13'),(3,2,4,'2022-07-13'),(3,3,2,'2022-07-13'),(3,4,4,'2022-07-13'),(3,5,5,'2022-07-13'),(4,1,23300,'2022-07-13'),(4,2,4,'2022-07-13'),(4,3,3,'2022-07-13'),(4,4,4,'2022-07-13'),(4,5,3,'2022-07-13'),(5,1,21000,'2022-07-13'),(5,2,4,'2022-07-13'),(5,3,2,'2022-07-13'),(5,4,4,'2022-07-13'),(5,5,4,'2022-07-13'),(6,1,24500,'2022-07-13'),(6,2,3,'2022-07-13'),(6,3,7,'2022-07-13'),(6,4,3,'2022-07-13'),(6,5,5,'2022-07-13'),(7,1,21000,'2022-07-13'),(7,2,5,'2022-07-13'),(7,3,5,'2022-07-13'),(7,4,4,'2022-07-13'),(7,5,5,'2022-07-13'),(8,1,16000,'2022-07-13'),(8,2,5,'2022-07-13'),(8,3,3,'2022-07-13'),(8,4,3,'2022-07-13'),(8,5,5,'2022-07-13');

#
# Structure for table "pengguna"
#

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna` (
  `username` char(50) NOT NULL,
  `password` char(64) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `nama` char(50) DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `level` (`level`),
  CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "pengguna"
#


#
# Structure for table "masuk"
#

DROP TABLE IF EXISTS `masuk`;
CREATE TABLE `masuk` (
  `id` char(36) NOT NULL,
  `pengguna` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `masuk_ibfk_1` (`pengguna`),
  CONSTRAINT `masuk_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `pengguna` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "masuk"
#

