CREATE TABLE `brands` (
  `brand_id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `active` int NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `cars` (
  `car_id` int unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(16) NOT NULL,
  `air_conditioner` int NOT NULL COMMENT '1=Have 0=Haven''t',
  `shift` int NOT NULL COMMENT '1=Manual 0=Auto',
  `passengers` int NOT NULL,
  `price` int NOT NULL,
  `active` int NOT NULL,
  `brand_id` int NOT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `logs` (
  `log_id` int unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(30) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `reservations` (
  `res_id` int unsigned NOT NULL AUTO_INCREMENT,
  `date_begin` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `total_amount` int NOT NULL,
  `state` int NOT NULL,
  `car_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `tokens` (
  `token` varchar(32) NOT NULL,
  `date_time` datetime NOT NULL,
  `type` varchar(12) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `users` (
  `user_id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci