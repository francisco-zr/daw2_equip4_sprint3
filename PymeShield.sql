CREATE TABLE `courses` (
  `id_course` int PRIMARY KEY AUTO_INCREMENT,
  `name_course` varchar(50) UNIQUE NOT NULL,
  `description_course` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `hidden` date
);

CREATE TABLE `emblems` (
  `id_emblem` int PRIMARY KEY AUTO_INCREMENT,
  `name_emblem` varchar(50) NOT NULL,
  `description_emblem` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `id_course` int NOT NULL,
  `hidden` date
);

CREATE TABLE `categories` (
  `id_category` int PRIMARY KEY AUTO_INCREMENT,
  `name_category` varchar(50),
  `id_course` int NOT NULL,
  `hidden` date
);

CREATE TABLE `resources_files` (
  `id_resource_file` int PRIMARY KEY AUTO_INCREMENT,
  `name_resource_file` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `id_category` int NOT NULL,
  `hidden` date
);

CREATE TABLE `resources_url` (
  `id_resource_url` int PRIMARY KEY AUTO_INCREMENT,
  `name_resource_url` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `id_category` int NOT NULL,
  `hidden` date
);

CREATE TABLE `resources_text` (
  `id_resource_text` int PRIMARY KEY AUTO_INCREMENT,
  `name_resource_text` varchar(50) NOT NULL,
  `description_resource_text` varchar(1000) NOT NULL,
  `id_category` int NOT NULL,
  `hidden` date
);

CREATE TABLE `deliveries` (
  `id_delivery` int PRIMARY KEY AUTO_INCREMENT,
  `locate` varchar(50) NOT NULL,
  `grade` decimal(2,2),
  `id_activity` int,
  `id_user` int
);

CREATE TABLE `grade` (
  `id_grade` int PRIMARY KEY AUTO_INCREMENT,
  `qualification` int NOT NULL,
  `id_user` int NOT NULL,
  `description` varchar(50) NOT NULL,
  `hidden` date
);

CREATE TABLE `ratings` (
  `id_rating` int PRIMARY KEY AUTO_INCREMENT,
  `rating` varchar(50) NOT NULL,
  `Feedback` varchar(50) NOT NULL,
  `id_course` int NOT NULL,
  `hidden` date
);

CREATE TABLE `users` (
  `id_user` int PRIMARY KEY AUTO_INCREMENT,
  `dni` varchar(50) UNIQUE NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `emblems` varchar(50),
  `nick_name` varchar(50) NOT NULL,
  `password` varchar(255),
  `hidden` date,
  `id_company` int,
  `profile_image` varchar(255),
  `type_user` ENUM ('admin', 'worker', 'client') NOT NULL,
  `token` varchar(50)
);

CREATE TABLE `recuperation_passwords` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `recuperation_token` varchar(255) NOT NULL,
  `token_expiration` datetime
);

CREATE TABLE `creation_passwords` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `creation_token` varchar(255) NOT NULL,
  `token_expiration` datetime
);

CREATE TABLE `devices` (
  `id_device` int PRIMARY KEY AUTO_INCREMENT,
  `brand` varchar(20) NOT NULL,
  `model_devices` varchar(100) NOT NULL,
  `mac_ethernet` varchar(20) NOT NULL,
  `mac_wifi` varchar(20),
  `id_type` int(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `device_state` varchar(20) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `serial_number` varchar(30) NOT NULL,
  `id_user` int NOT NULL,
  `hidden` date
);

CREATE TABLE `type_device` (
  `id_type_device` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL
);

CREATE TABLE `companies` (
  `id_company` int PRIMARY KEY AUTO_INCREMENT,
  `name_company` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int NOT NULL,
  `cif` varchar(50) NOT NULL,
  `hidden` date
);

CREATE TABLE `user_course` (
  `id_user_course` int PRIMARY KEY AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_course` int NOT NULL
);

CREATE TABLE `user_emblem` (
  `id_user_emblem` int PRIMARY KEY AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_emblem` int NOT NULL
);

CREATE TABLE `tasks` (
  `id_task` int PRIMARY KEY AUTO_INCREMENT,
  `accepted` boolean NOT NULL,
  `state` ENUM ('ToDo', 'InProgress', 'Done'),
  `start_date` datetime,
  `final_date` datetime,
  `price` float NOT NULL,
  `id_user` int,
  `id_questionary` int NOT NULL,
  `id_recommendation` int NOT NULL,
  `id_budget` int NOT NULL,
  `id_impact` int NOT NULL,
  `percentage` int NOT NULL,
  `hidden` date
);

CREATE TABLE `budgets` (
  `id_budget` int PRIMARY KEY AUTO_INCREMENT,
  `price` float NOT NULL,
  `accepted` boolean,
  `hidden` date,
  `status` ENUM ('Pending', 'Done', 'Waiting')
);

CREATE TABLE `activities` (
  `id_activity` int PRIMARY KEY AUTO_INCREMENT,
  `name_activity` varchar(50) NOT NULL,
  `description_activity` varchar(500),
  `start_date` datetime,
  `final_date` datetime,
  `id_course` int NOT NULL,
  `hidden` date
);

CREATE TABLE `inventories` (
  `id_inventory` int PRIMARY KEY AUTO_INCREMENT,
  `inventory_number` int,
  `id_device` int NOT NULL
);

CREATE TABLE `questionnaries` (
  `id_questionary` int PRIMARY KEY AUTO_INCREMENT,
  `name_questionary` varchar(50) NOT NULL,
  `autor_questionary` varchar(50),
  `date_questionary` date,
  `hidden` date
);

CREATE TABLE `questionnary_question` (
  `id_questionnary_question` int PRIMARY KEY AUTO_INCREMENT,
  `id_questionary` int NOT NULL,
  `id_question` int NOT NULL
);

CREATE TABLE `questionnary_user` (
  `id_questionnary_user` int PRIMARY KEY AUTO_INCREMENT,
  `id_questionary` int NOT NULL,
  `id_user` int NOT NULL
);

CREATE TABLE `questions` (
  `id_question` int PRIMARY KEY AUTO_INCREMENT,
  `name_question` varchar(50) NOT NULL,
  `description_question` varchar(500) NOT NULL,
  `hidden` date
);

CREATE TABLE `answers` (
  `id_answer` int PRIMARY KEY AUTO_INCREMENT,
  `name_answer` varchar(50) NOT NULL,
  `description_answer` varchar(500) NOT NULL,
  `hidden` date,
  `id_risk` int,
  `id_interventions` int,
  `id_type_measure` int,
  `id_probability` int,
  `id_impact` int,
  `id_question` int,
  `id_recommendation` int
);

CREATE TABLE `recommendations` (
  `id_recommendation` int PRIMARY KEY AUTO_INCREMENT,
  `name_recommendation` varchar(50) NOT NULL,
  `description_recommendation` varchar(500) NOT NULL,
  `hidden` date
);

CREATE TABLE `types_measures` (
  `id_type_measure` int PRIMARY KEY AUTO_INCREMENT,
  `name_type_measure` varchar(50) NOT NULL,
  `hidden` date
);

CREATE TABLE `interventions` (
  `id_intervention` int PRIMARY KEY AUTO_INCREMENT,
  `name_type_intervention` varchar(50) NOT NULL,
  `hidden` date
);

CREATE TABLE `probabilities` (
  `id_probability` int PRIMARY KEY AUTO_INCREMENT,
  `name_type_probability` varchar(50) NOT NULL,
  `hidden` date
);

CREATE TABLE `risks` (
  `id_risk` int PRIMARY KEY AUTO_INCREMENT,
  `name_type_risk` varchar(50) NOT NULL,
  `hidden` date
);

CREATE TABLE `impacts` (
  `id_impact` int PRIMARY KEY AUTO_INCREMENT,
  `name_type_impact` varchar(50) NOT NULL,
  `hidden` date
);

CREATE TABLE `reports` (
  `id_report` int PRIMARY KEY AUTO_INCREMENT,
  `name_report` varchar(50) NOT NULL,
  `date_report` date NOT NULL,
  `hidden` date
);

CREATE TABLE `results` (
  `id_result` int PRIMARY KEY AUTO_INCREMENT,
  `hidden` date,
  `id_answer` int NOT NULL,
  `id_report` int
);

ALTER TABLE `emblems` ADD FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);

ALTER TABLE `deliveries` ADD FOREIGN KEY (`id_activity`) REFERENCES `activities` (`id_activity`);

ALTER TABLE `deliveries` ADD FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

ALTER TABLE `grade` ADD FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

ALTER TABLE `ratings` ADD FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);

ALTER TABLE `users` ADD FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`);

ALTER TABLE `devices` ADD FOREIGN KEY (`id_type`) REFERENCES `type_device` (`id_type_device`);

ALTER TABLE `devices` ADD FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

ALTER TABLE `user_course` ADD FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

ALTER TABLE `user_course` ADD FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);

ALTER TABLE `user_emblem` ADD FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

ALTER TABLE `user_emblem` ADD FOREIGN KEY (`id_emblem`) REFERENCES `emblems` (`id_emblem`);

ALTER TABLE `tasks` ADD FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

ALTER TABLE `tasks` ADD FOREIGN KEY (`id_questionary`) REFERENCES `questionnaries` (`id_questionary`);

ALTER TABLE `tasks` ADD FOREIGN KEY (`id_recommendation`) REFERENCES `recommendations` (`id_recommendation`);

ALTER TABLE `tasks` ADD FOREIGN KEY (`id_budget`) REFERENCES `budgets` (`id_budget`);

ALTER TABLE `tasks` ADD FOREIGN KEY (`id_impact`) REFERENCES `impacts` (`id_impact`);

ALTER TABLE `activities` ADD FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);

ALTER TABLE `inventories` ADD FOREIGN KEY (`id_device`) REFERENCES `devices` (`id_device`);

ALTER TABLE `questionnary_question` ADD FOREIGN KEY (`id_questionary`) REFERENCES `questionnaries` (`id_questionary`);

ALTER TABLE `questionnary_question` ADD FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`);

ALTER TABLE `questionnary_user` ADD FOREIGN KEY (`id_questionary`) REFERENCES `questionnaries` (`id_questionary`);

ALTER TABLE `questionnary_user` ADD FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

ALTER TABLE `recuperation_passwords` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

ALTER TABLE `creation_passwords` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

ALTER TABLE `categories` ADD FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);

ALTER TABLE `resources_text` ADD FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

ALTER TABLE `resources_files` ADD FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

ALTER TABLE `resources_url` ADD FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

ALTER TABLE `answers` ADD FOREIGN KEY (`id_risk`) REFERENCES `risks` (`id_risk`);

ALTER TABLE `answers` ADD FOREIGN KEY (`id_interventions`) REFERENCES `interventions` (`id_intervention`);

ALTER TABLE `answers` ADD FOREIGN KEY (`id_type_measure`) REFERENCES `types_measures` (`id_type_measure`);

ALTER TABLE `answers` ADD FOREIGN KEY (`id_probability`) REFERENCES `probabilities` (`id_probability`);

ALTER TABLE `answers` ADD FOREIGN KEY (`id_impact`) REFERENCES `impacts` (`id_impact`);

ALTER TABLE `answers` ADD FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`);

ALTER TABLE `answers` ADD FOREIGN KEY (`id_recommendation`) REFERENCES `recommendations` (`id_recommendation`);

ALTER TABLE `results` ADD FOREIGN KEY (`id_report`) REFERENCES `reports` (`id_report`);

ALTER TABLE `results` ADD FOREIGN KEY (`id_answer`) REFERENCES `answers` (`id_answer`);
