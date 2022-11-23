CREATE TABLE `courses` (
  `id_course` int PRIMARY KEY AUTO_INCREMENT,
  `name_course` varchar(50) NOT NULL,
  `description_course` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `hidden` date
);

CREATE TABLE `emblems` (
  `id_emblem` int PRIMARY KEY AUTO_INCREMENT,
  `name_emblem` varchar(50) NOT NULL,
  `description_emblem` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_course` int NOT NULL,
  `hidden` date
);

CREATE TABLE `resources_files` (
  `id_resource_file` int PRIMARY KEY AUTO_INCREMENT,
  `name_resource_file` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `id_course` int NOT NULL,
  `hidden` date
);

CREATE TABLE `resources_url` (
  `id_resource_url` int PRIMARY KEY AUTO_INCREMENT,
  `name_resource_url` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `id_course` int NOT NULL,
  `hidden` date
);

CREATE TABLE `resources_text` (
  `id_resource_text` int PRIMARY KEY AUTO_INCREMENT,
  `name_resource_text` varchar(50) NOT NULL,
  `description_resource_text` varchar(1000) NOT NULL,
  `id_course` int NOT NULL,
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
  `password` varchar(255) NOT NULL,
  `hidden` date,
  `id_company` int,
  `type_user` ENUM ('admin', 'worker', 'client') NOT NULL
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
  `name_task` varchar(100) NOT NULL,
  `description_task` varchar(500) NOT NULL,
  `accepted` boolean NOT NULL,
  `state` ENUM ('ToDo', 'InProgress', 'Done'),
  `start_date` datetime,
  `final_date` datetime,
  `id_user` int,
  `id_questionary` int NOT NULL,
  `id_recommendation` int NOT NULL,
  `percentage` int NOT NULL,
  `importance` ENUM ('warning', 'danger', 'success') NOT NULL,
  `hidden` date
);

CREATE TABLE `task_budget` (
  `id_task_budget` int PRIMARY KEY AUTO_INCREMENT,
  `price` double NOT NULL,
  `id_task` int NOT NULL,
  `id_budget` int NOT NULL
);

CREATE TABLE `budgets` (
  `id_budget` int PRIMARY KEY AUTO_INCREMENT,
  `price` double NOT NULL,
  `accepted` boolean,
  `hidden` date
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
  `hidden` date,
  `id_user` int NOT NULL
);

CREATE TABLE `questions` (
  `id_question` int PRIMARY KEY AUTO_INCREMENT,
  `name_question` varchar(50) NOT NULL,
  `description_question` varchar(500) NOT NULL,
  `hidden` date,
  `id_questionary` int NOT NULL
);

CREATE TABLE `answers` (
  `id_answer` int PRIMARY KEY AUTO_INCREMENT,
  `name_answer` varchar(50) NOT NULL,
  `description_answer` varchar(500) NOT NULL,
  `hidden` date,
  `id_question` int NOT NULL
);

CREATE TABLE `recommendations` (
  `id_recommendation` int PRIMARY KEY AUTO_INCREMENT,
  `name_recommendation` varchar(50) NOT NULL,
  `description_recommendation` varchar(500) NOT NULL,
  `hidden` date,
  `id_answer` int NOT NULL
);

CREATE TABLE `types_measures` (
  `id_type_measure` int PRIMARY KEY AUTO_INCREMENT,
  `name_type_measure` varchar(50) NOT NULL,
  `hidden` date,
  `id_answer` int NOT NULL
);

CREATE TABLE `interventions` (
  `id_intervention` int PRIMARY KEY AUTO_INCREMENT,
  `name_type_intervention` varchar(50) NOT NULL,
  `hidden` date,
  `id_answer` int NOT NULL
);

CREATE TABLE `probabilities` (
  `id_probability` int PRIMARY KEY AUTO_INCREMENT,
  `name_type_probability` varchar(50) NOT NULL,
  `hidden` date,
  `id_answer` int NOT NULL
);

CREATE TABLE `risks` (
  `id_risk` int PRIMARY KEY AUTO_INCREMENT,
  `name_type_risk` varchar(50) NOT NULL,
  `hidden` date,
  `id_answer` int NOT NULL
);

CREATE TABLE `impacts` (
  `id_impact` int PRIMARY KEY AUTO_INCREMENT,
  `name_type_impact` varchar(50) NOT NULL,
  `hidden` date,
  `id_answer` int NOT NULL
);

CREATE TABLE `reports` (
  `id_report` int PRIMARY KEY AUTO_INCREMENT,
  `name_report` varchar(50) NOT NULL,
  `date_report` date NOT NULL,
  `hidden` date,
  `id_user` int NOT NULL
);

CREATE TABLE `results` (
  `id_result` int PRIMARY KEY AUTO_INCREMENT,
  `hidden` date,
  `id_answer` int NOT NULL,
  `id_report` int NOT NULL
);

ALTER TABLE `emblems` ADD FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);

ALTER TABLE `resources_files` ADD FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);

ALTER TABLE `resources_url` ADD FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);

ALTER TABLE `resources_text` ADD FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);

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

ALTER TABLE `task_budget` ADD FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id_task`);

ALTER TABLE `task_budget` ADD FOREIGN KEY (`id_budget`) REFERENCES `budgets` (`id_budget`);

ALTER TABLE `activities` ADD FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);

ALTER TABLE `inventories` ADD FOREIGN KEY (`id_device`) REFERENCES `devices` (`id_device`);

ALTER TABLE `questionnaries` ADD FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

ALTER TABLE `questions` ADD FOREIGN KEY (`id_questionary`) REFERENCES `questionnaries` (`id_questionary`);

ALTER TABLE `answers` ADD FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`);

ALTER TABLE `recommendations` ADD FOREIGN KEY (`id_answer`) REFERENCES `answers` (`id_answer`);

ALTER TABLE `types_measures` ADD FOREIGN KEY (`id_answer`) REFERENCES `answers` (`id_answer`);

ALTER TABLE `interventions` ADD FOREIGN KEY (`id_answer`) REFERENCES `answers` (`id_answer`);

ALTER TABLE `probabilities` ADD FOREIGN KEY (`id_answer`) REFERENCES `answers` (`id_answer`);

ALTER TABLE `risks` ADD FOREIGN KEY (`id_answer`) REFERENCES `answers` (`id_answer`);

ALTER TABLE `impacts` ADD FOREIGN KEY (`id_answer`) REFERENCES `answers` (`id_answer`);

ALTER TABLE `reports` ADD FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

ALTER TABLE `results` ADD FOREIGN KEY (`id_answer`) REFERENCES `answers` (`id_answer`);

ALTER TABLE `results` ADD FOREIGN KEY (`id_report`) REFERENCES `reports` (`id_report`);
