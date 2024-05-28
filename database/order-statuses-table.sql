/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.28-MariaDB
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

CREATE TABLE `order_statuses` (
                                  `id` int(11) NOT NULL AUTO_INCREMENT,
                                  `title` varchar(200) DEFAULT NULL,
                                  `created_at` datetime DEFAULT NULL,
                                  `updated_at` datetime DEFAULT NULL,
                                  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

insert into `order_statuses` (`id`, `title`, `created_at`, `updated_at`) values('1','Open','2023-10-29 09:09:17','2023-10-29 09:09:17');
insert into `order_statuses` (`id`, `title`, `created_at`, `updated_at`) values('2','Completed','2023-10-29 09:09:17','2023-10-29 09:09:17');
insert into `order_statuses` (`id`, `title`, `created_at`, `updated_at`) values('3','Cancelled','2023-10-29 09:09:17','2023-10-29 09:09:17');
