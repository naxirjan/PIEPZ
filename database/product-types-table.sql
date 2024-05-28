
CREATE TABLE `product_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT NULL,
  `status` enum('Active','Draft') DEFAULT 'Draft',
  `created_at` datetime DEFAULT NULL,
  `updates_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
 
insert into `product_types` (`id`, `title`, `status`, `created_at`, `updates_at`) values('1','Ballenbak','Draft','2023-10-21 13:04:58','2023-10-21 13:05:01');
insert into `product_types` (`id`, `title`, `status`, `created_at`, `updates_at`) values('2','Furniture > cradles','Draft','2023-10-21 13:04:58','2023-10-21 13:04:58');
insert into `product_types` (`id`, `title`, `status`, `created_at`, `updates_at`) values('3','Furniture > collections > Marylou','Draft','2023-10-21 13:04:58','2023-10-21 13:04:58');
