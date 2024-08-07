CREATE TABLE `brands` (
  `brand_id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `active` int NOT NULL,
  PRIMARY KEY (`brand_id`),
  UNIQUE KEY `unique_brand_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `cars` (
  `car_id` int unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(16) NOT NULL,
  `air_conditioner` int NOT NULL COMMENT '1=Have 0=Haven''t',
  `shift` int NOT NULL COMMENT '1=Manual 0=Auto',
  `passengers` int NOT NULL,
  `price` int NOT NULL,
  `active` int NOT NULL,
  `brand_id` int NOT NULL,
  PRIMARY KEY (`car_id`),
  UNIQUE KEY `unique_brand_name` (`model`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

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
  `date` date NOT NULL,
  `hour` varchar(5) NOT NULL,
  `type` varchar(12) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`token`),
  UNIQUE KEY `unique_token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `users` (
  `user_id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `surname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` char(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `unique_user_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE USER 'customer_user'@'%' IDENTIFIED WITH mysql_native_password BY 'wY7oO6#D5d;C'; 
GRANT SELECT ON `car_renting`.`brands` TO 'customer_user'@'%'; 
GRANT SELECT ON `car_renting`.`cars` TO 'customer_user'@'%'; 
GRANT INSERT, UPDATE ON `car_renting`.`reservations` TO 'customer_user'@'%'; 
GRANT SELECT, INSERT ON `car_renting`.`tokens` TO 'customer_user'@'%'; 
GRANT SELECT, INSERT, UPDATE ON `car_renting`.`users` TO 'customer_user'@'%'; 