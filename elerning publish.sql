/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.30 : Database - elearning
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`elearning` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `elearning`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `guru` */

DROP TABLE IF EXISTS `guru`;

CREATE TABLE `guru` (
  `id_guru` int NOT NULL,
  `nama_guru` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(13) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id_guru`),
  KEY `guru_ibfk_1` (`user_id`),
  CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `guru` */

insert  into `guru`(`id_guru`,`nama_guru`,`tgl_lahir`,`alamat`,`no_telp`,`created_at`,`updated_at`,`user_id`) values 
(198011114,'Rafli Setiawan S.pd','1980-11-11','Jl. Murhum','081256547765',NULL,'2023-07-13 23:05:03',17),
(198012192,'Hisbullah, S.Pd','1980-12-19','Jl. Murhum','081256540990',NULL,'2023-07-13 03:24:57',22),
(198503196,'Isran S.pd','1985-03-19','Jl. Waode Bilahi','081256541233',NULL,'2023-07-13 03:14:43',13),
(198504192,'Aminatul Zaharia S.pd','1985-04-19','Jl. Waode Bilahi','081256541333',NULL,'2023-07-28 12:36:57',18),
(198505201,'Wa Ode Rohmayani, S.pd','1985-05-20','Jl. Waode Bilahi','081256541244',NULL,'2023-07-13 03:25:06',23),
(198806017,'Norma Yeti, S.Pd','1988-06-16','Jl. Merpati','081322902211','2023-07-09 22:16:28','2023-07-13 03:25:51',28),
(198901245,'Fatmawati Raslia, S.Pd','1989-01-24','Jl. Poros Ereke','082356547110',NULL,'2023-07-28 12:37:58',25),
(198902246,'Hasrul S.pd','1989-02-24','Jl. Poros Ereke','082356547888',NULL,'2023-07-28 12:38:22',15),
(198903244,'Barman, S.Pd','1989-03-24','Jl. Poros Ereke','082356548888',NULL,'2023-07-28 12:37:42',20),
(198905248,'Ummy Ezianto, S.Pd','1989-05-24','Jl. Poros Ereke','082356547000',NULL,'2023-07-13 03:25:43',27),
(198907117,'Sanusi, S.Pd','1989-07-11','Jl. Murhum','081322902219','2023-07-08 05:28:00','2023-07-08 06:58:35',9),
(199008219,'Ningsih Lestari, S.Pd','1990-08-21','Jl. Minangminanga','082354568788',NULL,'2023-07-13 03:25:35',26),
(199009215,'Syamsul Alam S.Pd','1990-09-21','Jl. Minangminanga','082354567899',NULL,'2023-07-13 03:16:47',16),
(199010213,'Musfira, S.Pd','1990-10-21','Jl. Minangminanga','082354567800',NULL,'2023-07-13 03:24:46',21),
(199205110,'Usman, S.Pd','1992-05-11','Jl. Laode Gure','085295188177',NULL,'2023-07-13 03:25:16',24),
(199205143,'Awaluddin S.pd','1992-05-14','Jl. Laode Gure','085295187771',NULL,'2023-07-28 12:37:11',14),
(199205191,'Abdul Zahmid, S.Pd','1992-05-19','Jl. Laode Gure','085295187770',NULL,'2023-07-28 12:36:42',19);

/*Table structure for table `jadwal` */

DROP TABLE IF EXISTS `jadwal`;

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_mapel` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_kelas` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `id_guru` int NOT NULL,
  `hari` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `kode_mapel` (`kode_mapel`),
  KEY `kode_kelas` (`kode_kelas`),
  KEY `id_guru` (`id_guru`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `jadwal` */

insert  into `jadwal`(`id_jadwal`,`kode_mapel`,`kode_kelas`,`id_guru`,`hari`,`jam_mulai`,`jam_akhir`) values 
('H011','1001','12ipa1',111,'Senin','07:00:00','08:30:00'),
('H012','1003','12ipa1',113,'Senin','08:40:00','10:10:00'),
('H013','1005','12ipa1',115,'Senin','10:40:00','12:10:00'),
('H021','1002','12ipa1',112,'Selasa','07:00:00','08:30:00'),
('H022','1004','12ipa1',114,'Selasa','08:40:00','10:10:00'),
('H023','1006','12ipa1',116,'Selasa','10:40:00','12:10:00'),
('H031','1013','12ipa1',123,'Rabu','07:00:00','08:30:00'),
('H032','1007','12ipa1',117,'Rabu','08:40:00','10:10:00'),
('H033','1016','12ipa1',126,'Rabu','10:40:00','12:10:00'),
('H041','1008','12ipa1',118,'Kamis','07:00:00','08:30:00'),
('H042','1015','12ipa1',125,'Kamis','08:40:00','10:10:00'),
('H043','1005','12ipa1',115,'Kamis','10:40:00','12:10:00'),
('H051','1014','12ipa1',124,'Jumat','07:00:00','08:30:00'),
('H052','1017','12ipa1',127,'Jumat','08:40:00','10:10:00'),
('H111','1005','12ipa2',115,'Senin','07:00:00','08:30:00'),
('H112','1001','12ipa2',111,'Senin','08:40:00','10:10:00'),
('H113','1003','12ipa2',113,'Senin','10:40:00','12:10:00'),
('H121','1006','12ipa2',116,'Selasa','07:00:00','08:30:00'),
('H122','1002','12ipa2',112,'Selasa','08:40:00','10:10:00'),
('H123','1004','12ipa2',114,'Selasa','10:40:00','12:10:00'),
('H131','1016','12ipa2',126,'Rabu','07:00:00','08:30:00'),
('H132','1017','12ipa2',127,'Rabu','08:40:00','10:10:00'),
('H133','1007','12ipa2',117,'Rabu','10:40:00','12:10:00'),
('H141','1005','12ipa2',115,'Kamis','07:00:00','08:30:00'),
('H142','1008','12ipa2',118,'Kamis','08:40:00','10:10:00'),
('H143','1015','12ipa2',125,'Kamis','10:40:00','12:10:00'),
('H151','1013','12ipa2',123,'Jumat','07:00:00','08:30:00'),
('H152','1014','12ipa2',124,'Jumat','08:40:00','10:10:00'),
('H211','1003','12ips1',113,'Senin','07:00:00','08:30:00'),
('H212','1002','12ips1',112,'Senin','08:40:00','10:10:00'),
('H213','1015','12ips1',125,'Senin','10:40:00','12:10:00'),
('H221','1004','12ips1',114,'Selasa','07:00:00','08:30:00'),
('H222','1005','12ips1',115,'Selasa','08:40:00','10:10:00'),
('H223','1011','12ips1',121,'Selasa','10:40:00','12:10:00'),
('H231','1012','12ips1',122,'Rabu','07:00:00','08:30:00'),
('H232','1010','12ips1',120,'Rabu','08:40:00','10:10:00'),
('H233','1014','12ips1',124,'Rabu','10:40:00','12:10:00'),
('H241','1013','12ips1',123,'Kamis','07:00:00','08:30:00'),
('H242','1009','12ips1',119,'Kamis','08:40:00','10:10:00'),
('H243','1017','12ips1',127,'Kamis','10:40:00','12:10:00'),
('H251','1001','12ips1',111,'Jumat','07:00:00','08:30:00'),
('H252','1005','12ips1',115,'Jumat','08:40:00','10:10:00'),
('H311','1017','12ips2',127,'Senin','07:00:00','08:30:00'),
('H312','1012','12ips2',122,'Senin','08:40:00','10:10:00'),
('H313','1002','12ips2',112,'Senin','10:40:00','12:10:00'),
('H321','1010','12ips2',120,'Selasa','07:00:00','08:30:00'),
('H322','1001','12ips2',111,'Selasa','08:40:00','10:10:00'),
('H323','1005','12ips2',115,'Selasa','10:40:00','12:10:00'),
('H331','1014','12ips2',124,'Rabu','07:00:00','08:30:00'),
('H332','1011','12ips2',121,'Rabu','08:40:00','10:10:00'),
('H333','1003','12ips2',113,'Rabu','10:40:00','12:10:00'),
('H341','1003','12ips2',113,'Kamis','07:00:00','08:30:00'),
('H342','1013','12ips2',123,'Kamis','08:40:00','10:10:00'),
('H343','1009','12ips2',119,'Kamis','10:40:00','12:10:00'),
('H351','1005','12ips2',115,'Jumat','07:00:00','08:30:00'),
('H352','1015','12ips2',125,'Jumat','08:40:00','10:10:00');

/*Table structure for table `jawaban` */

DROP TABLE IF EXISTS `jawaban`;

CREATE TABLE `jawaban` (
  `id_jawaban` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int NOT NULL,
  `kode_tugas` int NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_jawaban`),
  KEY `id_siswa` (`id_siswa`),
  KEY `id_tugas` (`kode_tugas`),
  CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jawaban_ibfk_2` FOREIGN KEY (`kode_tugas`) REFERENCES `tugas` (`kode_tugas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `jawaban` */

insert  into `jawaban`(`id_jawaban`,`id_siswa`,`kode_tugas`,`file`,`created_at`,`updated_at`) values 
(24,20230504,14,'Asyariawati_PuasaRamadhan.docx','2023-07-23 08:53:29','2023-07-23 08:53:29'),
(25,20250502,14,'riwayat_e-learning (18).pdf','2023-07-27 10:13:59','2023-07-27 10:13:59'),
(26,20250502,14,'MUTMAINUN BIL IMAN.pptx','2023-07-27 10:14:57','2023-07-27 10:14:57'),
(27,20250502,14,'riwayat_e-learning (12).pdf','2023-07-27 10:26:18','2023-07-27 10:26:18');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `kode_kelas` int NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kelas` */

insert  into `kelas`(`kode_kelas`,`nama_kelas`,`created_at`,`updated_at`) values 
(1,'XII IPA 1',NULL,'2023-07-20 12:49:52'),
(2,'XII IPA 2',NULL,'2023-07-20 12:50:02'),
(3,'XII IPS 1',NULL,'2023-07-20 12:52:47'),
(20,'XII IPS 4','2023-07-28 12:31:55','2023-07-28 12:31:55');

/*Table structure for table `mapel` */

DROP TABLE IF EXISTS `mapel`;

CREATE TABLE `mapel` (
  `kode_mapel` int NOT NULL AUTO_INCREMENT,
  `id_guru` int NOT NULL,
  `nama_mapel` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_mapel`),
  KEY `id_guru` (`id_guru`),
  CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1027 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `mapel` */

insert  into `mapel`(`kode_mapel`,`id_guru`,`nama_mapel`,`created_at`,`updated_at`) values 
(1002,198503196,'Kewarganegaraan',NULL,NULL),
(1003,199205143,'Bahasa Indonesia',NULL,NULL),
(1004,198902246,'Bahasa Inggris',NULL,NULL),
(1005,199009215,'Matematika',NULL,NULL),
(1006,198011114,'Fisika',NULL,NULL),
(1007,198504192,'Biologi',NULL,NULL),
(1009,198903244,'Ekonomi',NULL,NULL),
(1011,198012192,'Sejarah',NULL,NULL),
(1012,198505201,'Geografi',NULL,NULL),
(1013,199205110,'Penjaskes',NULL,NULL),
(1014,198901245,'Seni Budaya',NULL,NULL),
(1015,199008219,'PKWU',NULL,NULL),
(1016,198905248,'Sejarah Indonesia',NULL,NULL),
(1020,198907117,'Pendidikan Agama Islam','2023-07-08 05:48:32','2023-07-08 06:39:03'),
(1022,199205191,'Kimia','2023-07-08 05:54:46','2023-07-08 05:54:46'),
(1024,199010213,'Sosiologi','2023-07-08 06:14:02','2023-07-08 06:14:02'),
(1026,198806017,'Bimbingan Konseling','2023-07-09 22:18:53','2023-07-09 22:18:53');

/*Table structure for table `materi` */

DROP TABLE IF EXISTS `materi`;

CREATE TABLE `materi` (
  `kode_materi` int NOT NULL AUTO_INCREMENT,
  `kode_mapel` int NOT NULL,
  `judul_materi` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kode_kelas` int NOT NULL,
  `tahun_id` int DEFAULT NULL,
  PRIMARY KEY (`kode_materi`),
  KEY `kode_mapel` (`kode_mapel`),
  KEY `kode_kelas` (`kode_kelas`),
  KEY `fk_materi_tahun_id` (`tahun_id`),
  CONSTRAINT `fk_materi_tahun_id` FOREIGN KEY (`tahun_id`) REFERENCES `tahun_ajar` (`id_ajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `materi_ibfk_2` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `materi` */

insert  into `materi`(`kode_materi`,`kode_mapel`,`judul_materi`,`deskripsi`,`file`,`created_at`,`updated_at`,`kode_kelas`,`tahun_id`) values 
(27,1002,'Materi PKN','guru pkn dan ipa 1','KARTU205190311141.docx','2023-07-06 02:17:20','2023-07-06 02:17:20',1,6),
(28,1002,'Materi PKN','guru pkn dan ipa 2','IMPLEMENTASI_DAN_PENGUJIAN.docx','2023-07-06 02:18:20','2023-07-06 02:18:20',2,6),
(31,1020,'agama','guru agama dan kelas ipa 2','Jurnal Baru.docx','2023-07-08 06:41:51','2023-07-08 06:41:51',2,6),
(32,1020,'agama','guru agama dan kelas ips 1','Jurnal Sahlani (2).docx','2023-07-08 06:42:23','2023-07-08 06:42:23',3,6),
(33,1002,'materi kewarganegaraan','materi kewarganegaraan untuk kelas 12 IPS 1','PPT.pptx','2023-07-12 00:48:47','2023-07-12 00:49:27',3,6),
(35,1020,'Puasa Ramadhan','Pentingnya, aturan serta manfaat puasa Ramadan untuk kesehatan dan spiritual','Puasa Ramadhan.docx','2023-07-17 03:52:55','2023-07-17 04:01:11',1,1),
(36,1020,'Materi Haji dan Umroh','Silahkan dipelajari, jika ada yang ditanyakan bisa ditanyakan langsung di kelas nanti.','Laporan Kerja Praktik.docx','2023-07-24 03:02:51','2023-07-24 03:02:51',1,1),
(37,1004,'Inggris','Inggris asik dan menyenangkan','RESUM BUDAYA SEHAT.docx','2023-08-09 00:07:56','2023-08-09 00:07:56',1,1),
(38,1020,'Agama islam','Islam','Bukti Donasi Rizal Ardiansyah.pdf','2023-08-09 00:10:40','2023-08-09 00:10:40',1,1),
(39,1020,'Agama islam 2','OKe','4,4.Surat Edaran Pemberitahuan ke SMA TTD.docx','2023-08-09 00:21:17','2023-08-09 00:21:17',1,1);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2014_10_12_100000_create_password_resets_table',2);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL,
  `kode_kelas` int NOT NULL,
  `nama_siswa` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(13) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa`),
  KEY `kode_kelas` (`kode_kelas`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `siswa` */

insert  into `siswa`(`id_siswa`,`kode_kelas`,`nama_siswa`,`tgl_lahir`,`alamat`,`no_telp`,`user_id`,`created_at`,`updated_at`) values 
(19059907,3,'Killua Zoldyck','1999-07-05','Jl. Murhum','081322902211',NULL,'2023-07-14 02:12:57','2023-07-14 02:14:26'),
(20030511,1,'Abdul Lestaluhu','2005-11-03','Jl. Mojimohalo','081298330212',31,NULL,'2023-07-07 01:08:06'),
(20030611,3,'Abdul Jaelani','2006-11-03','Jl. Mojimohalo','081298330213',39,NULL,NULL),
(20070006,2,'Sumarna Yo','2000-06-07','Jl. Merpati','081322902217',44,'2023-06-22 17:33:10','2023-06-24 05:56:14'),
(20110510,2,'Reisika Jenny','2005-10-11','Jl. Laode Guru','082311662219',38,NULL,'2023-07-07 01:06:57'),
(20110511,2,'Thorlisson','2005-11-11','Jl. Laode Guru','082311662419',48,NULL,NULL),
(20130510,2,'Cody Gakpo','2005-10-13','Jl. Laode Guru','082311662218',46,NULL,NULL),
(20130601,1,'Isnaini Widaya Putri','2006-01-13','Jl. Laode Gure','081377125411',32,NULL,NULL),
(20130603,3,'Bima Gantara','2006-03-13','Jl. Laode Gure','081377128413',40,NULL,NULL),
(20170506,3,'Darwin Nunez','2005-06-17','Jl. Murhum','081322902211',52,'2023-07-08 05:29:34','2023-07-08 05:29:34'),
(20190410,3,'Asrul Rajab','2004-10-19','Jl. Poros bay pas','082511668792',42,NULL,NULL),
(20190412,1,'Ahmad Mudatsir','2004-12-19','Jl. Poros bay pas','082311668792',34,NULL,NULL),
(20200503,2,'Abdul Ghafar','2005-03-20','Jl. Mojimohalo','082198391288',37,NULL,NULL),
(20200504,1,'Sitti Fatimah','2005-04-20','Jl. Laode Gure','085295190115',41,NULL,'2023-07-17 04:45:53'),
(20200511,2,'Ahmad Ghizali','2005-11-10','Jl. Poros bay pas','082311660019',36,NULL,'2023-07-05 00:41:11'),
(20210503,3,'Moh. Salah','2005-03-21','Jl. Mojimohalo','082198371288',45,NULL,'2023-07-17 04:46:05'),
(20230504,1,'Asyariawati','2005-04-23','Jl. Laode Gure','085295190111',33,NULL,NULL),
(20250502,1,'Lailly Rahma Dianilla','2005-02-25','Jl. Mojimohalo','082198398912',10,NULL,'2023-07-13 23:10:04'),
(20260509,2,'Thiago Alcantara','2005-09-26','Jl. Murhum','081322902219',49,'2023-07-08 05:43:37','2023-07-20 12:56:53'),
(20270506,1,'Laode Wahyu','2005-06-27','Jl. Mojimohalo','082198392566',35,NULL,NULL),
(20270603,3,'Anya','2006-03-27','Jl. Mojimohalo','082198392555',43,NULL,'2023-07-07 01:07:11');

/*Table structure for table `tahun_ajar` */

DROP TABLE IF EXISTS `tahun_ajar`;

CREATE TABLE `tahun_ajar` (
  `id_ajar` int NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `semester` enum('Ganjil','Genap') COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Berlangsung','Berakhir','Belum Terlaksana') COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ajar`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tahun_ajar` */

insert  into `tahun_ajar`(`id_ajar`,`tahun_ajaran`,`semester`,`status`,`created_at`,`updated_at`) values 
(1,'2022/2023','Ganjil','Berlangsung','2023-07-13 05:39:00','2023-07-26 04:21:18'),
(3,'2022/2023','Genap','Belum Terlaksana','2023-07-13 06:23:03','2023-07-26 04:21:12'),
(5,'2023/2024','Ganjil','Belum Terlaksana','2023-07-17 03:15:14','2023-07-17 03:15:14'),
(6,'2020/2021','Genap','Berakhir','2023-07-17 03:15:34','2023-07-27 12:00:00');

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `nama_admin` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(13) COLLATE utf8mb4_general_ci NOT NULL,
  `created-at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`id_admin`,`user_id`,`nama_admin`,`tgl_lahir`,`alamat`,`no_telp`,`created-at`,`updated_at`) values 
(1,8,'Ern','1999-03-19','Jl. Murhum','081398229012','2023-07-07 03:13:58','2023-07-13 23:35:57');

/*Table structure for table `tugas` */

DROP TABLE IF EXISTS `tugas`;

CREATE TABLE `tugas` (
  `kode_tugas` int NOT NULL AUTO_INCREMENT,
  `kode_mapel` int NOT NULL,
  `kode_kelas` int DEFAULT NULL,
  `nama_tugas` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `deadline` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tahun_id` int DEFAULT NULL,
  PRIMARY KEY (`kode_tugas`),
  KEY `kode_mapel` (`kode_mapel`),
  KEY `id_guru` (`kode_kelas`),
  KEY `fk_tugas_tahun_id` (`tahun_id`),
  CONSTRAINT `fk_tugas_tahun_id` FOREIGN KEY (`tahun_id`) REFERENCES `tahun_ajar` (`id_ajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tugas_ibfk_2` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tugas` */

insert  into `tugas`(`kode_tugas`,`kode_mapel`,`kode_kelas`,`nama_tugas`,`deskripsi`,`file`,`deadline`,`created_at`,`updated_at`,`tahun_id`) values 
(8,1002,3,'Meringkas materi bab 1 dan 3','guru agama dan kelas 12 ips 1','Budaya Konsumen.docx','2023-07-14 07:32:57','2023-07-06 02:28:12','2023-07-08 06:44:18',6),
(13,1020,2,'Meringkas materi bab 1 dan 2','materi agama','Budaya Konsumen (1).docx','2023-07-21 00:00:00','2023-07-14 01:46:16','2023-07-14 01:46:16',6),
(14,1020,1,'Tugas Materi Puasa Ramadhan','Kirim file jawaban dalam bentuk doc dan kerjakan secara individu yah :)','Puasa Ramadhan.docx','2023-07-19 00:00:00','2023-07-17 04:20:07','2023-07-17 04:20:49',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','guru','siswa','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`role`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(8,'Ern','admin','ern@gmail.com',NULL,'$2y$10$YpFgz1quW4qrMABbMbov7uI4CZh3oo0KUT.1VOfrG/oK.Mt0Et4aO','qqa8OwPW1K5dreo06EpfhzBAFpei6j7aTyDlw0rXyRWy40tY0x2CHU32bwiC','2023-07-02 21:24:49','2023-07-27 12:39:53'),
(9,'sanusi','guru','sanusi@gmail.com',NULL,'$2y$10$WuNEvERHNmD57ZH4zqQ5XeoBF/jporH7WXIdPMyJnTFdPqUoEeMKS','slOuDnUDtzJaLLqIC83VOcFTGIWDJfb0PQav6A9MRORG36vsW2W8baATfq5L','2023-07-02 21:25:07','2023-07-27 12:49:31'),
(10,'Lailly','siswa','leli@gmail.com',NULL,'$2y$10$kZEeQavhFXcWx10XmEyLI.ky4sLSm/25fxuUvdRsz/g3IZqlAwbva','nEucRHGJjidjhRxMoxm9bSb8MshPhy9KfhqwKoBZ5seyrOS2PDRomNgrM7JL','2023-07-02 21:26:48','2023-07-27 12:53:42'),
(13,'Isran','guru','isran@gmail.com',NULL,'$2y$10$9xyKQ/3hedu7ThtSQIyvXeSyvnekkfEabUwoXUULaae2M88XE9I/q','gbvD36zZrnXN4gNxMTPVKQcrOb5fQhCDTOJLMszyhNztJpCRNHOTyNXHA4j7','2023-07-06 21:47:55','2023-07-06 21:47:55'),
(14,'Awaluddin','guru','Awal@gmail.com',NULL,'$2y$10$Sso8xlm9lcMgGJwot1zwL.ArHUfbx4hmvv9LjkgwvnOTdjjH1QG7O','ezscFqamCn9jBpm9cgmAD5iAz29eG7eqMW5DXJeb2mmkcEUu6xNzN9pgXuRT','2023-07-06 23:22:57','2023-07-06 23:22:57'),
(15,'Hasrul','guru','hasrul@gmail.com',NULL,'$2y$10$cwzu4ARrutQh7ulogT0SNehtzkfMlWm86awhUeKGbd7ynFWL.RB7O','14WwdCLjGuXbp3ZRdnEImrqOwQMF4d3B7aFeX0gsENIkzupnbhe4ifU57Gei','2023-07-06 23:47:20','2023-07-06 23:47:20'),
(16,'Syamsul. A','guru','syamsul@gmail.com',NULL,'$2y$10$ZPnm06GyVxDMn1.Zy6I/Xe/pVuChTDHrh9N.rJr7K5wQN14MW3yDi','7ttPYGirLtW09d3CuYR44IMFYv8JChrN63xDCAkr9EgtA0jUfnqkylyvuaVC','2023-07-06 23:48:09','2023-07-06 23:48:09'),
(17,'Rafli','guru','rafly@gmail.com',NULL,'$2y$10$yjVmIt45BpBO4BxdAeecce8a8K4uT5CZcVhydAvsJ.dhLDWle3Ej.','I5ecObjfWs6G2CZ8wgBaLyJ78eETZSFYfdtbpBMhXWmov7ArGY436sgRFlv8','2023-07-06 23:48:53','2023-07-13 23:05:25'),
(18,'Aminatul','guru','aminatul@gmail.com',NULL,'$2y$10$g0AwO57I5Cqpm/FuOL4AC.zyEAf/cc39xfBp4DtUPPWhp9NlrFjXm','HNS2KhdzOK0KWqMKlgKJkAOGih6nCmf37izfJGRLg8mOhHwRgmc4YsXkIl2b','2023-07-06 23:50:27','2023-07-06 23:50:27'),
(19,'Abdul.Z','guru','abdulZ@gmail.com',NULL,'$2y$10$5slW3Rcx5WhZ7ON58ym15.gcxBMyQBhPEX/YzF775bApzPqXUV1UG','jhruOfPmkPOhpzLLQdll2fXZNea34WM6FJFCR5FADCSBsDOuA4JON8wh5ONg','2023-07-06 23:50:58','2023-07-06 23:50:58'),
(20,'Barman','guru','barman@gmail.com',NULL,'$2y$10$h6oB95EDZ.7iS1ROpwmVMOfRr3tV.jYQx6SJvuGifHy5yYTq0q3ZG','JHBfZ7ocb4BgKa2uHskwHl1IWI5Budfsjda9WI5tJnn8dgQboox0l330uq7P','2023-07-06 23:51:26','2023-07-06 23:51:26'),
(21,'Musfira','guru','musfira@gmail.com',NULL,'$2y$10$upxpHPw2cmu12g5a4dRQsudMowA3tDUbnTJSF8FRXAeD/9k3VJRMG','BEHJM51ZzvUlM9Gf8JszVvj6I7kHKRK4AUC80ODXV74asKtC3I3QTGjpCc3K','2023-07-06 23:51:56','2023-07-06 23:51:56'),
(22,'Hisbullah','guru','hisbullah@gmail.com',NULL,'$2y$10$iLOGWLTfNShFa2NyXr7AsO/VsQTR/wjck1iGu8EgrFBrwwHVsgEpi','pnIBtqcmPzHqLTVWpFD2cPMJiD1ygcjEdPyKT93dF79YRxOMsd6hkZYcqmOL','2023-07-06 23:52:21','2023-07-06 23:52:21'),
(23,'Wd.Rohmayani','guru','WdRohmayani@gmail.com',NULL,'$2y$10$r6P6fv8r4Q/i2y9uWUTkK.raayB5/8aBwWxmnE9to/yuPwU57MRUG','0lSORaw33tVp52SfBymNGNWSQZoiYx1y3jocxoMEvXf8HUTy19hSsuZZJipN','2023-07-06 23:53:02','2023-07-06 23:53:02'),
(24,'Usman','guru','usman@gmail.com',NULL,'$2y$10$IiGd5siN5pFinHG9AH2eoO/XVfmgRMI3MmDzkvuQ/9GS1v/.JpgOS','CqK1AvdSNkYGmO3GOWbRkMJynhn7eoac1Zqkn1GCoomWOcVj9aTbaIJBR4Ih','2023-07-06 23:53:29','2023-07-06 23:53:29'),
(25,'fatmawati','guru','fatmawati@gmail.com',NULL,'$2y$10$ShcMSf4C4HLIUKDRQw68tO.6Z0nBlJwLUptUK2Hnw0.jv.lyRm7Di','HtmhQrXNHfI34dcXNA8LuNOD2mNttTrCkVqbDuiy8H0X8rG4xRqxZW9wdjTx','2023-07-06 23:53:54','2023-07-06 23:53:54'),
(26,'ningsih L','guru','ningsih@gmail.com',NULL,'$2y$10$GYjSek2BaMRs2QgSEOVPTedrHe.ZCwcxmxqZrihKCx8/Eb0lvI4jO','1PcxFRpakfH4W5fmGkon9z4SnkmKtjtF39UYv3WfqngnFRM4CnXQ6ZQLExSJ','2023-07-06 23:54:22','2023-07-06 23:54:22'),
(27,'Ummy','guru','ummy@gmail.com',NULL,'$2y$10$p4YVLjJHLxNt8T067Ys8AOQ0QBIXDhAc7728qlTntHGPg6jyxcfHm','z1Z6geaKhK7ViFt7EsEMRR6EqniXxwHCnCxQB50Sd3CZe09niv7euQWoUEQ9','2023-07-06 23:54:46','2023-07-06 23:54:46'),
(28,'Norma','guru','norma@gmail.com',NULL,'$2y$10$RH15G1FjZVuaz1lsNGon9usTpVJIPsnd9T1TabHfkvEnRaXNamUsq','LnnWrFYphdB8q6FjZO1Nsj1lvdUMdjgPpBybEYiU4IziSRxJ9zAXGCjOiI5w','2023-07-06 23:55:11','2023-07-06 23:55:11'),
(31,'abdullestaluhu','siswa','abdullestaluhu@gmail.com',NULL,'$2y$10$fb8VJq.Hks9vgmP2VChGpud.OgMLtRriO6ge9A93Cs9s8yWxo.dqu','gk1U2UyjRZntQ9KjHuRhPToG3WNgvm9W2vNoPLPeT5fU38xBS7AVnul4xvVV','2023-07-07 00:37:23','2023-07-07 00:37:23'),
(32,'Isnaini','siswa','nani@gmail.com',NULL,'$2y$10$BtJEDUIgIYnS22ZbbqXdFeOPHotJTBgdxZUhY0ZU.QIJrTT0Wqp9a','dex5R0jZPwtDmxI89BM9VOTHlvNvA7OgHS7DYRb4XhYM5sarbDYj7uPyTGFT','2023-07-07 00:38:28','2023-07-07 00:38:28'),
(33,'Asyariawati','siswa','asyariawati@gmail.com',NULL,'$2y$10$7LDXBIOkIYFZ4AAVyQzgHeGGk1742fL6QHOB6vZjrZaJ3EVda.ifa','G3pOaJUO5LRZavcV9w2KwDaNGhb3XxMJCAdAygq2QeMgJLUVLLu121qITl5x','2023-07-07 00:38:56','2023-07-07 00:38:56'),
(34,'A Mudatsir','siswa','amudatsir@gmail.com',NULL,'$2y$10$Xcb3FIMnHNF9LU37QBxJ9uBiSqEL7Uhhx1HVOsYhOJiv7b1yuQYk2','W4BF7d4MDC2mE2BBPUewrlEUHdQELoYnWm5iIpINARwMaXNAvvPZRIn6vST1','2023-07-07 00:39:32','2023-07-07 00:39:32'),
(35,'Ld. Wahyu','siswa','wahyu@gmail.com',NULL,'$2y$10$ykxhnlpgZZYmT1ih83BffeAT.cgDxK/cvFj5ak.WOWQiVbKosDpQa','yT8hZNCFXvdT0ZlMmkOO0zerUalf2kQAlZjQhohX0OxCRUvZrU4sduMDJIFS','2023-07-07 00:39:57','2023-07-07 00:39:57'),
(36,'A Ghizali','siswa','Ghizali@gmail.com',NULL,'$2y$10$47ksge200vpmNV6i7iq7leB2zEU.UhC2VltYMs6zBTu0cVVnVl2kW','0MIrqe6ogtoPjrG4rYEWHbhfUBpvhzvfBIJIeVvDOe3MI6XIGo5ftNP4fI2w','2023-07-07 00:40:39','2023-07-07 00:40:39'),
(37,'Ghafar','siswa','ghafar@gmail.com',NULL,'$2y$10$qDdZ/.YFOAqq8sQqdhy9o.4/0CARQDKtCXGnWSR3EUve91awz2VAi','VoHhZx4FvNfELyLSGxf3UfmYHwbhkzIodWXgUxMJPDfzpESdpu2Aut7LFvD5','2023-07-07 00:40:59','2023-07-07 00:40:59'),
(38,'Minji','siswa','minji@gmail.com',NULL,'$2y$10$SXyCu.5cHm6AMxRz9J0qg.fmqo8bE3OGceIwPusUoSC9dq8DtlF96','xGOM4i9INENbH2b4o72HdrUTWxUewDWo1OQMj3L70oK2W1P4bWrBJIMpPH0O','2023-07-07 00:41:23','2023-07-07 00:41:23'),
(39,'A Jaelani','siswa','jaelani@gmail.com',NULL,'$2y$10$hHtBNa9fX4x6A17A85IXBeN4yGNRBBERh/xRGqhLeQ.AmT4uof1/W','mcSHLKeGtUWpkIIhlUyss3D6oCvZo0iomdiXHUetVd1cmI7Ragio1hec7PBA','2023-07-07 00:41:53','2023-07-07 00:41:53'),
(40,'Bima','siswa','bima@gmail.com',NULL,'$2y$10$UfLvWfHjrPzPqfGbCcEVM.xgfgV3aIlITPLHfOYqCBoMAyxc4PUTi','Mx6kydcIjTp7DOqhZdwfAgsPBckS9UAe5ZViqLDNmIgJuEzxUhVd7l5W0oiK','2023-07-07 00:42:20','2023-07-07 00:42:20'),
(41,'Fatimah','siswa','fatima@gmail.com',NULL,'$2y$10$K1uob5Wb5i.xqVRwUDXUnewl2L8UOu4m8M4sST34OuuXaH3obg9rm','NLIkedpvhLJxdSBC4IKp4F4Y5GEKqF1ldM3QusqVwtPeqqUJYAiPHNMssCKf','2023-07-07 00:42:43','2023-07-07 00:42:43'),
(42,'Asrul','siswa','asrul@gmail.com',NULL,'$2y$10$1Bc/vU5OvVV0pFdh.m86UeNC80v8T0N0zE20IpTQuOF7ferI70U7y','6NuKS0qnj8N6LRFzawB6xVF5ETsuZAg6VWoq22aVpEol5FKoMX11bRLikfDz','2023-07-07 00:43:00','2023-07-07 00:43:00'),
(43,'Anya','siswa','anya@gmail.com',NULL,'$2y$10$VYP8TK51Opi24qlJTDbdE.D2m0jEWBtq30BVGq.eZylo9MXQixh6S','8mY3RpYbY0Up3ojV3Vn02byWvIPiC8HbqvD1RJqGHgZLxezxOWYW9tfCNarI','2023-07-07 00:43:30','2023-07-07 00:43:30'),
(44,'Sumarna','siswa','sumarna@gmail.com',NULL,'$2y$10$guolvWVCMtvTcmuMTuuo1eDOQvZlWM13cxeZml/cHIlJqrmhVQEaC','DntScmOd4mQF3kX0CMkmPlT8cimX6m94FojrVWhijsGvBiFSDmBCjye5gd15','2023-07-07 00:43:51','2023-07-07 00:43:51'),
(45,'Moh. Salah','siswa','salah@gmail.com',NULL,'$2y$10$/9AE0n4dfUHszbzbr02hNutvGTtr6ZBpkhte0jKfeC44EXwM2aJnS','gczt1y4YIalkTIBUMBqm7b2mXG1lTtvRVJXxQzw1AeonR58IAIyIP8XjEpo5','2023-07-07 00:44:08','2023-07-07 00:44:08'),
(46,'Gakpo','siswa','gakpo@gmail.com',NULL,'$2y$10$cprH2C5w5F6s8XqPgpd54exzm.Y5eL2enH.yyrvMNfqAVTn.rg8Rq','kWlnJdz6SPDLhdPFAHWwwYc9xsW9ZeeRRZE3ybBStVW7OSOSxA1FZjtRrkKl','2023-07-07 00:44:24','2023-07-07 00:44:24'),
(48,'Alisson','siswa','alisson@gmail.com',NULL,'$2y$10$oicffCg2WBKMsLXaCopMK.n3YJjj0uQRA/Yjlr1MSy.EDs3cuYgse','lFb9G5oC5us9hcsvUT50wrbXy5PhwQgV9ajy3GL7LGNrRpaP4Ie3oqFqoYYF','2023-07-07 00:45:08','2023-07-07 00:45:08'),
(49,'Thigo','siswa','thiago@gmail.com',NULL,'$2y$10$ctcfHLu56panbSu/2dpG0uGfmfXW45hjuTp6/yaXMPBY6ieMMfina','BgXMmiM4uIXPev8qIiif7n7n5PqbD6G9kYi7MCxi2eZMOtxrNFRO1nnukKWC','2023-07-07 00:51:13','2023-07-07 00:51:13'),
(52,'Nunez','siswa','nunez@gmail.com',NULL,'$2y$10$0IEbgbAqa3Ll/xveH/deEOLQ70ZZv2Lu46O7Z/wsjQYKCP/L4LWqG','ljqDhrhq018CIiV3L0QYsIAoO5AI0hJZ2PJRsaULtPZaqSoHnkMK1gj85tKH','2023-07-08 05:26:28','2023-07-08 05:26:58'),
(54,'Killua','siswa','killua@gmail.com',NULL,'$2y$10$HGqLT7WcN.jGZaCXA1lNjOSG7JeFjB0varyhGaiU3H.YTSmCxAO.m','0dZFTuhWqObVH5b20pcbBugXrKnuTNOdKnCDTyzWqIoQDrLo554wqyyXptO1','2023-07-14 02:13:30','2023-07-14 02:13:30');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
