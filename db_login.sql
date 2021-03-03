/*
SQLyog Ultimate v10.3 
MySQL - 5.5.5-10.5.5-MariaDB : Database - db_login
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_login` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_login`;

/*Table structure for table `sk` */

DROP TABLE IF EXISTS `sk`;

CREATE TABLE `sk` (
  `id_sk` int(100) NOT NULL AUTO_INCREMENT,
  `nomor_sk` varchar(250) NOT NULL,
  `bagian` varchar(250) NOT NULL,
  `sub_bagian` varchar(250) NOT NULL,
  `judul_sk` varchar(250) NOT NULL,
  `tgl_sk` date NOT NULL,
  `ttd` int(100) NOT NULL,
  `file` varchar(250) NOT NULL,
  `id_pegawai` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_sk`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `sk` */

insert  into `sk`(`id_sk`,`nomor_sk`,`bagian`,`sub_bagian`,`judul_sk`,`tgl_sk`,`ttd`,`file`,`id_pegawai`,`created_at`) values (1,'W13-A/0454/OT.01.3/SK/01/2019','Manajemen','Manajemen','Penetapan Tim APM 2019','2019-01-29',10,'1579077983SKTimAPMPTASurabayaTahun2019.pdf',84,'2020-01-15 15:42:57'),(2,'W13-A/0453/OT.01.3/SK/01/2019','Manajemen','Manajemen','Tim Asistensi Manajemen Mutu 2019','2019-01-29',10,'1579080483SK_Tim_Manajemen_Mutu_PTA_Surabaya_2019.pdf',51,'2020-01-15 16:28:03'),(3,'W13-A/0176/KP.00.2/1/2020','Kesekretariatan','Sub Bagian TURT','Pengangkatan Tenaga Kontrak 2020','2020-01-02',10,'1579080621SK_Tenaga_Kontrak_2020.pdf',51,'2020-01-15 16:30:21'),(4,'W13-A/4487/PL.05/12/2019','Kesekretariatan','Sub Bagian TURT','Opname Fisik Inventaris 2019','2019-06-30',48,'1579083041SK_Opname_Fisik_Inventaris_2019.pdf',51,'2020-01-15 17:10:41'),(5,'W13-A/292/KS.00/SK/1/2019','Kesekretariatan','Sub Bagian Kepegawaian dan Pengembangan IT','Penerima Hasil Internet& Komputer 2020','2020-01-03',48,'1579084511SK_Pejabat_Penerima_Hasil_TA.2020.pdf',51,'2020-01-15 17:15:07'),(6,'W13-A/293/KP.00.2/1/2020','Manajemen','Manajemen','HAWASBID Tahun 2020','2020-01-06',10,'1579083593SK_Hakim_Pengawas_Bidang_2020.pdf',51,'2020-01-15 17:19:00'),(7,'W13-A/3729/KU.01/11/2019','Kesekretariatan','Sub Bagian Keuangan dan Pelaporan','Tim Pengendalian Intern PIPK','2019-11-10',48,'1579083749SK_Tim_PIPK_2019.pdf',51,'2020-01-15 17:22:29'),(8,'W13-A/243/HM.00/SK/1/2020','Kesekretariatan','Sub Bagian Rencana Program dan Anggaran','Tim Penyusun Laporan Kegiatan 2019','2020-01-02',10,'1579083986SK_Tim_Penyusun_Pelaporan_Pelaksanaan_Kegiatan_2019.pdf',51,'2020-01-15 17:26:26'),(9,'W13-A/3447/OT.01.3/SK/10/2019','Manajemen','Manajemen','Tim Telusur Dokumen Ass Survillance APM 2019','2019-10-15',10,'1579084191SK_Tim_Telusur_Dokumen_Ass_Surv_APM_2019.pdf',51,'2020-01-15 17:29:51'),(10,'W13-A/3448/OT.01.3/SK/10/2019','Manajemen','Manajemen','Tim Observasi Implementasi APM 2019','2019-10-15',10,'1579084330SK_Penetapan_Tim_Observasi_APM_2019.pdf',51,'2020-01-15 17:32:10'),(11,'W13-A/477/KP.02.1/1/2019','Kesekretariatan','Sub Bagian TURT','Pemberlakuan SIAP Di wilayah PTA Surabaya (Inovasi)','2019-01-30',10,'15791705735.a_SK_Pemberlakuan_SIAP.pdf',51,'2020-01-16 17:29:33'),(12,'W13-A/0244/KU.01/Sk/1/2020','Kesekretariatan','Sub Bagian Kepegawaian dan Pengembangan IT','SK Pengelola Keuangan','2020-01-02',48,'1580351489SK_Pengelola_Keuangan.pdf',68,'2020-01-30 09:31:29'),(13,'W13-A/1506/OT.00/SK/3/2020','Manajemen','Manajemen','SK Pembentukan TIM Pelaksana Zona Integritas','2020-03-17',10,'1584583526SK_Tim_Pembentukan_Tim_ZI.pdf',68,'2020-03-19 09:05:26'),(14,'W13-A/1544/HM.00/SK/3/2020','Manajemen','Manajemen','Pejabat Pengelola Informasi dan Dokumentasi','2020-03-17',10,'1586232009SK_Pejabat_Pengelola_Informasi_&_Dokumentasi.pdf',67,'2020-04-07 11:00:09'),(15,'W13-A/1518/OT.00/SK/3/2020','Manajemen','Manajemen','SK Tim Pengelola PTSP','2020-03-17',10,'1586232401SK_Tim_Pengelola_PTSP.pdf',67,'2020-04-07 11:06:41'),(16,'W13-A/235/OT.00/SK/2/2018','Manajemen','Manajemen','Tim Penyusun SOP','2018-02-01',10,'1586232654SK_Tim_Penyusun_SOP.pdf',67,'2020-04-07 11:10:54'),(17,'W13-A/901/OT.01.3/SK/2/2020','Manajemen','Manajemen','Implementasi PALAPA REOG & SURAMADU','2020-02-17',10,'1586232842SK_Implementasi_PALAPA_REOG_&_SURAMADU.pdf',67,'2020-04-07 11:14:02'),(18,'W13-A/901/OT.01.3/SK/3/2020','Manajemen','Manajemen','Implementasi Inovasi Notifikasi dan Informasi Perkara','2020-03-12',10,'1586233013SK_Implementasi_Inovasi_Notifikasi_dan_Informasi_Perkara.pdf',67,'2020-04-07 11:16:53'),(19,'W13-A/3712/OT.00/SK/12/2016','Manajemen','Manajemen','Implementasi SIAP Online','2016-12-05',10,'1586233167SK_Implementasi_SIAP_Online.pdf',67,'2020-04-07 11:19:27'),(20,'W13-A/0888/OT.01.2/SK/3/2019','Manajemen','Manajemen','Tim TI Pembuatan Aplikasi Suramadu','2019-03-04',10,'1586233327SK_Tim_TI_Pembuatan_Aplikasi_Suramadu.pdf',67,'2020-04-07 11:22:07'),(21,'W13-A/2413/HM.02.03/SK/7/2019','Manajemen','Manajemen','Penunjukan Tim Inovasi TI ','2019-07-15',10,'1586233628SK_Penunjukan_Tim_Inovasi_TI_2019.pdf',67,'2020-04-07 11:27:08'),(22,'W13-A/3223/OT.00/SK/10/2016','Manajemen','Manajemen','Pembentukan Tim Pelaksana Proyek Manajemen Perubahan','2016-10-17',10,'1586233783SK_Pembentukan_Tim_Pelaksana_Proyek_Manajemen_Perubahan.pdf',67,'2020-04-07 11:29:43'),(23,'W13-A/870/OT.00/SK/2/2020','Manajemen','Manajemen','Tim Reviu SOP','2020-02-12',10,'1586233967SK_Tentang_Tim_Reviu_SOP.pdf',67,'2020-04-07 11:32:47'),(24,'W13-A/0975/HM.02.3/SK/3/2019','Manajemen','Manajemen','Penunjukan Tim Pengelola TI ','2019-03-13',10,'1586234196SK_Penunjukan_Tim_Pengelola_IT_2019_.pdf',67,'2020-04-07 11:36:36'),(25,'W13-A/1546/HM.02.3/SK/3/2020','Manajemen','Manajemen','Penunjukan Tim Pengelola TI ','2020-03-19',10,'1586234300SK_Penunjukan_Tim_Pengelola_IT_2020.pdf',67,'2020-04-07 11:38:20'),(26,'W13-A/0500/HM.02/3/SK/2/2019','Manajemen','Manajemen','Keterbukaan dan Pelayanan Informasi Publik','2019-02-01',10,'1586234501SK_Keterbukaan_dan_Pelayanan_Informasi_Publik_2019.pdf',67,'2020-04-07 11:41:41'),(27,'W13-A/0497/HK.05/2/2019','Kepaniteraan','Bagian Banding','Standar Pelayanan Peradilan','2019-02-01',10,'1586237047SK_Standar_Pelayanan_Peradilan.pdf',67,'2020-04-07 12:24:07'),(28,'W13-A/1600/HM.02.3/SK/3/2020','Manajemen','Manajemen','Penunjukan Tim Pengelola Website 2020','2020-03-24',10,'1586237385SK_Penunjukan_Tim_Pengelola_Website_2020.pdf',67,'2020-04-07 12:29:45'),(29,'W13-A/2278/HM.02.3/SK/7/2019','Manajemen','Manajemen','Penunjukan Tim Pengelola Website 2019','2019-07-01',10,'1586237487SK_Penunjukan_Tim_Pengelola_Website_2019.pdf',67,'2020-04-07 12:31:27'),(30,'W13-A-/1833/KS.00/SK/4/2020','Kesekretariatan','Sub Bagian TURT','PEMBENTUKAN PANITIA PENGHAPUSAN BMN PA KAB MADIUN','2020-04-15',108,'1588741458SK_PANITIA_PENGHAPUSAN_BMN_KAB_MADIUN.pdf',67,'2020-05-06 12:04:18'),(31,'W3-A/2126/OT.00/SK/5/2020','Manajemen','Manajemen','PEMBENTUKAN TIM PENILAI PELAKSANAAN ZI PENGADILAN AGAMA DI WILAYAH PTA SURABAYA TAHUN 2020','2020-05-15',108,'1589943039SK_TIM_PENILAI_ZI.pdf',51,'2020-05-20 09:35:02'),(32,'W13-A/2156/OT.01.3/SK/05/2020','Manajemen','Manajemen','Penetapan Tim Pendampingan APM Pada PTA Dan PA Se Jatim','2020-05-15',108,'1590112002Tim_Pendamping_APM_2020.pdf',51,'2020-05-22 08:46:42'),(33,'W13-A/2155/OT.01.3/SK/05/2020','Manajemen','Manajemen','Penetapa Tim APM PTA Surabaya 2020','2020-05-15',108,'1590112224Tim_APM_PTA_Surabaya_2020.pdf',51,'2020-05-22 08:50:24'),(34,'W13-A/2153/HM.02.3/SK/5/2020','Manajemen','Manajemen','Penunjukan Tim Pengelola Website Pada PTA Surabaya Th.2020 Revisi Mei','2020-05-15',108,'1590112379Penunjukan_Tim_Pengelola_Website_Rev_Mei.pdf',51,'2020-05-22 08:52:59'),(35,'W13-A/2163/OT.01.3/SK/5/2020','Manajemen','Manajemen','Implementasi Aplikasi Survey&Antrian Pelayanan PTSP, Info Perkara, Pengiriman Surat Digital Pada PTA Surabaya','2020-05-15',108,'1590113435SK_Implementasi_Aplikasi_(_REK_AYO_REK).pdf',51,'2020-05-22 09:10:35'),(36,'W13-A/2078/KP.02.1/SK/5/2020','Kesekretariatan','Sub Bagian Kepegawaian dan Pengembangan IT','SK Penanggung Jawab dan Petugas Absen Penegakan Disiplin Kerja','2020-05-06',108,'1591339574Penanggung_Jawab_dan_Petugas_Absen_Penegakan_Disiplin_Kerja_Tahun_2020.pdf',60,'2020-06-05 13:46:14'),(37,'W13-A/2022/KP.04.6/SK/5/2020','Kesekretariatan','Sub Bagian Kepegawaian dan Pengembangan IT','SK Baperjakat','2020-05-22',108,'1591339909SK_baperjakat_2020.pdf',60,'2020-06-05 13:51:49'),(38,'W13-A/2071/PS.01/SK/5/2020','Kesekretariatan','Sub Bagian Kepegawaian dan Pengembangan IT','SK Hakim Pengawas Daerah dan Hakim Pengawas Bidang Mei 2020','2020-05-06',108,'1591340219SK_Hatiwasda_dan_Hatiwasbid_Mei_2020.pdf',60,'2020-06-05 13:56:59'),(39,'W13-A/2279/PS.01/SK/6/2020','Kesekretariatan','Sub Bagian Kepegawaian dan Pengembangan IT','SK Hakim Pengawas Daerah dan Hakim Pengawas Bidang Juni 2020','2020-06-03',108,'1591340336SK_HAWASBID_DAN_DAERAH.pdf',60,'2020-06-05 13:58:56'),(40,'W13-A/2276/PS.01/SK/6/2020','Kesekretariatan','Sub Bagian Kepegawaian dan Pengembangan IT','SK Pakaian Seragam Dinas','2020-06-03',108,'1591340483SK_Pakaian_Seragam_Dinas.pdf',60,'2020-06-05 14:01:23'),(41,'W13-A/1544/HM.00/SK/3/2020','Kesekretariatan','Sub Bagian Kepegawaian dan Pengembangan IT','SK Pejabat Pengelola Informasi dan Dokumentasi','2020-03-19',0,'1591340934SK_Pejabat_Pengelola_Informasi_dan_Dokumentasi_2020.pdf',60,'2020-06-05 14:08:54'),(42,'W13-A/2052/0T.00/SK/5/2020','Kesekretariatan','Sub Bagian Kepegawaian dan Pengembangan IT','SK Tim Pelaksana ZI','2020-05-05',108,'1591341205SK_Pembentukan_Tim_Pelaksana_ZI.pdf',60,'2020-06-05 14:13:25'),(43,'W13-A/2126/OT.00/SK/5/2020','Kesekretariatan','Sub Bagian Kepegawaian dan Pengembangan IT','SK Pembentukan Tim Penilai Pelaksanaan Zona Integritas Pengadilan Agama di Wilayah Pengadilan Tinggi Agama Surabaya','2020-05-13',108,'1591341366SK_Pembentukan_Tim_Penilai_ZI....pdf',60,'2020-06-05 14:16:06'),(44,'W13-A/2050/PS.01/SK/5/2020','Kesekretariatan','Sub Bagian Kepegawaian dan Pengembangan IT','SK Pendelegasian Wewenang dan Pemberian Izin Keluar Kantor dan Izin Tidak  Masuk Kantor','2020-05-05',108,'1591341617SK_Pendelegasian_Wewenang_Iji_keluar_dan_tidak_masuk_kantor_Mei_2020_(1).pdf',60,'2020-06-05 14:20:17'),(45,'W13-A/2231/HM.00/SK/5/2020','Kesekretariatan','Sub Bagian Kepegawaian dan Pengembangan IT','SK Role Model Pimpinan','2020-05-04',108,'1591342588SK_Role_Model_Pimpinan.pdf',60,'2020-06-05 14:36:28'),(46,'W13-A/2079/PS.01/SK/5/2020','Kesekretariatan','Sub Bagian Kepegawaian dan Pengembangan IT','SK Tim Pengawas Penegakan Disiplin Kerja','2020-05-06',108,'1591342741SK_TIM_PENGAWAS_PENEGAKAN_DISIPLIN.pdf',60,'2020-06-05 14:39:01'),(47,'W13-A/1518/OT.00/SK/3/2020','Kesekretariatan','Sub Bagian Kepegawaian dan Pengembangan IT','SK Tim Pengelola Pelayanan Terpadu Satu Pintu','2020-03-17',0,'1591342930SK_Tim_PTSP_2020.pdf',60,'2020-06-05 14:42:10');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `password` varchar(256) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`name`,`email`,`image`,`role_id`,`is_active`,`password`,`date_created`) values (5,'Yadi Sepriadi','yadi.sepriadi@gmail.com','1a5f47f6276c7800c455d7911d863f41-removebg-preview.png',1,1,'$2y$10$6u1coz6JofBSmWhKvCEb0evHxqmb2OTHei.J5KcJKFhTcyD1RwqK2','2020-10-06 12:00:19'),(6,'Andakara Xherdan','andakara.xherdan@gmail.com','default.jpg',2,1,'$2y$10$FKvQBwQ8Aq03MMrwPsHnRurV4hqwgpAba61I7zumhaW3ZNYtvqK3C','2020-11-04 08:46:08');

/*Table structure for table `user_access_menu` */

DROP TABLE IF EXISTS `user_access_menu`;

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `user_access_menu` */

insert  into `user_access_menu`(`id`,`role_id`,`menu_id`) values (1,1,1),(2,1,2),(3,2,2),(4,1,3),(6,2,4),(7,1,4),(8,1,6);

/*Table structure for table `user_menu` */

DROP TABLE IF EXISTS `user_menu`;

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) CHARACTER SET utf8 NOT NULL,
  `icon` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `user_menu` */

insert  into `user_menu`(`id`,`menu`,`icon`) values (1,'Admin','nav-icon fas fa-tachometer-alt'),(2,'User','nav-icon fas fa-users'),(3,'Menu','nav-icon fas fa-folder'),(6,'Arsip','nav-icon fas fa-archive');

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_role` */

insert  into `user_role`(`id_role`,`role`) values (1,'Administrator'),(2,'Member'),(3,'Moderator');

/*Table structure for table `user_sub_menu` */

DROP TABLE IF EXISTS `user_sub_menu`;

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `user_sub_menu` */

insert  into `user_sub_menu`(`id`,`menu_id`,`title`,`url`,`icon`,`is_active`) values (1,1,'Dashboard','admin','fas fa-columns nav-icon',1),(2,2,'My Profile','user','fas fa-user nav-icon',1),(3,3,'Menu Management','menu/','fas fa-folder-open nav-icon',1),(4,3,'Submenu Management','menu/submenu/','fas fa-folder-open nav-icon',1),(9,1,'Role Management','admin/role/','nav-icon fas fa-user-tie',1),(10,2,'Edit Profile','user/edit/','nav-icon fas fa-user-edit',1),(11,2,'Change Password','user/ubahpassword/','nav-icon fas fa-key',1),(12,6,'Daftar Induk SK','arsip/','nav-icon fas fa-book-open',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
