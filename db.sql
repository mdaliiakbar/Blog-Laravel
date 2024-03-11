/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.27-MariaDB : Database - blog_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blog_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `blog_db`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `meta` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active,2=inactive',
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`title`,`slug`,`details`,`meta`,`status`,`created_by`,`created_at`,`updated_at`) values (1,'Entertainment','entertainment',NULL,NULL,1,NULL,'2024-03-03 10:33:30','2024-03-03 15:54:06'),(2,'Business','business','sdfsdf','Business',1,NULL,'2024-03-03 15:44:50','2024-03-03 16:14:43'),(3,'খেলা','khela','খেলা',NULL,NULL,NULL,'2024-03-04 16:44:37','2024-03-04 16:44:37');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_12_28_082443_create_permission_tables',1),(7,'2024_03_02_203937_create_categories_table',1),(8,'2024_03_03_005436_create_tags_table',1),(10,'2023_12_28_100417_create_news_table',2);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) NOT NULL,
  `tag_id` varchar(20) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `picture` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `thumbnail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `news_type` tinyint(4) DEFAULT NULL,
  `news_date` date DEFAULT NULL,
  `news_status` tinyint(4) DEFAULT 2 COMMENT '1=publish,2=draft',
  `slug` text DEFAULT NULL,
  `meta` text DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `news` */

insert  into `news`(`id`,`category_id`,`tag_id`,`title`,`body`,`picture`,`thumbnail`,`news_type`,`news_date`,`news_status`,`slug`,`meta`,`created_by`,`updated_by`,`deleted_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,'1','test','sdfs','','',2,'2024-03-04',1,'test','sdfs',1,1,NULL,'2024-03-04 12:35:07','2024-03-11 13:01:45',NULL),(3,1,'1','grdf','sdfs','','',1,'2024-02-26',2,'grdf','sdfsdf',1,NULL,NULL,'2024-03-04 15:57:09','2024-03-04 15:57:09',NULL),(4,2,'','ঢাকায় রেস্তোরাঁর সিঁড়ি ও অগ্নিনির্বাপণ ব্যবস্থা দেখল পুলিশ','রাজধানীর গুলশান, ধানমন্ডি, মিরপুর ও উত্তরার প্রায় অর্ধশত রেস্তোরাঁয় অভিযান চালিয়েছে পুলিশ। রোববার সন্ধ্যা থেকে রাত ১০টা পর্যন্ত এসব খাবারের দোকানে অভিযান চালানো হয়। অভিযানে কয়েকটি রেস্তোরাঁর ব্যবস্থাপক, কর্মীসহ অন্তত ২২ জনকে আটক করেছে পুলিশ।\r\n পুলিশ বলছে, নগরবাসীর নিরাপত্তার কথা বিবেচনায় রেখে এসব রেস্তোরাঁ–ভবনে জরুরি বহির্গমন সিঁড়ি ও অগ্নিনির্বাপক ব্যবস্থা রয়েছে কি না, তা দেখতেই অভিযান চালানো হয়। ধানমন্ডি এলাকার ১৯টি রেস্তোরাঁয় অভিযান চালিয়েছে পুলিশ। জরুরি বহির্গমন সিঁড়ি না থাকা, সিঁড়ি আটকে রান্নাঘর বসানো ও অগ্নিনির্বাপক ব্যবস্থা না থাকায় এসব খাবারের দোকানের বিরুদ্ধে ব্যবস্থা নেওয়া হয়েছে।','','',1,'2024-03-04',2,'dhakay-restorannr-sinnri-oo-ogninirwapn-bzbstha-dekhl-pulis',NULL,1,NULL,NULL,'2024-03-04 16:36:24','2024-03-04 16:36:24',NULL),(5,2,'','tetre sdfsdfs','sdfsdf','','',1,'2024-03-04',2,'tetre-sdfsdfs','sdfs',1,NULL,NULL,'2024-03-04 16:58:33','2024-03-04 16:58:33',NULL),(6,2,'','3hllsd sdfsdf','sdfsdf','','',1,'2024-03-04',2,'3hllsd-sdfsdf','sdfsdf',1,NULL,NULL,'2024-03-04 17:00:00','2024-03-04 17:00:00',NULL),(7,2,'','ঢাকায় রেস্তোরাঁর সিঁড়ি ও অগ্নিনির্বাপণ ব্যবস্থা দেখল পুলিশ','ঢাকায় রেস্তোরাঁর সিঁড়ি ও অগ্নিনির্বাপণ ব্যবস্থা দেখল পুলিশ','','',1,'2024-03-04',2,'dhakay-restorannr-sinnri-oo-ogninirwapn-bzbstha-dekhl-pulis-1','sdf',1,NULL,NULL,'2024-03-04 17:00:43','2024-03-04 17:00:43',NULL);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

insert  into `personal_access_tokens`(`id`,`tokenable_type`,`tokenable_id`,`name`,`token`,`abilities`,`last_used_at`,`created_at`,`updated_at`) values (1,'App\\Models\\User',1,'Personal Access Token','eb50ce3aeeb9682c2bff1dc0b12d1f1c96a409f199db39c4350077b787b7afae','[\"*\"]',NULL,'2024-03-03 10:32:44','2024-03-03 10:32:44'),(2,'App\\Models\\User',1,'Personal Access Token','0d65e34aafbd664f87fa0090d562b4804d9d1afa21d332a706e55754dd399c08','[\"*\"]',NULL,'2024-03-03 12:32:36','2024-03-03 12:32:36'),(3,'App\\Models\\User',1,'Personal Access Token','6d0d95b3c9903dbab6219b7588f10ad4e2d0fb6459166b78a3e451d211ea1817','[\"*\"]',NULL,'2024-03-03 15:40:14','2024-03-03 15:40:14'),(4,'App\\Models\\User',1,'Personal Access Token','133038e33fd468a219276b68511ce05d41d791f965e2f8f57d630015400bd093','[\"*\"]',NULL,'2024-03-04 12:10:23','2024-03-04 12:10:23'),(5,'App\\Models\\User',1,'Personal Access Token','6d41987b8e97807428d7946ecd06284a695b11dc84783a57bba8cfb52c53a362','[\"*\"]',NULL,'2024-03-04 15:45:40','2024-03-04 15:45:40'),(6,'App\\Models\\User',1,'Personal Access Token','3d422c76f0105c632d3246b96aeda3fa5643c3fdc919a3c30d8e6afc01530839','[\"*\"]',NULL,'2024-03-11 12:45:51','2024-03-11 12:45:51');

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `meta` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active,2=inactive',
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tags` */

insert  into `tags`(`id`,`title`,`slug`,`meta`,`status`,`created_by`,`created_at`,`updated_at`) values (1,'Popular',NULL,'popular, hello',2,NULL,'2024-03-03 10:33:39','2024-03-03 16:14:34');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=admin',
  `user_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`user_type`,`user_status`,`remember_token`,`created_at`,`updated_at`) values (1,'Akbar','admin@gmail.com',NULL,'$2y$10$h6hFnWisFOCWxGGCRC/d3eTrXF6Bet7Uj20q88AKbY3V4ZT5an61a',1,1,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
