-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 11-01-2023 a las 09:33:30
-- Versión del servidor: 10.6.11-MariaDB-1:10.6.11+maria~ubu2004
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `oversegurity`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities`
--

CREATE TABLE `activities` (
  `id_activity` int(11) NOT NULL,
  `name_activity` varchar(50) NOT NULL,
  `description_activity` varchar(500) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `final_date` datetime DEFAULT NULL,
  `id_course` int(11) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answers`
--

CREATE TABLE `answers` (
  `id_answer` int(11) NOT NULL,
  `name_answer` varchar(50) NOT NULL,
  `description_answer` varchar(500) NOT NULL,
  `hidden` date DEFAULT NULL,
  `id_risk` int(11) DEFAULT NULL,
  `id_interventions` int(11) DEFAULT NULL,
  `id_type_measure` int(11) DEFAULT NULL,
  `id_probability` int(11) DEFAULT NULL,
  `id_impact` int(11) DEFAULT NULL,
  `id_question` int(11) DEFAULT NULL,
  `id_recommendation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `answers`
--

INSERT INTO `answers` (`id_answer`, `name_answer`, `description_answer`, `hidden`, `id_risk`, `id_interventions`, `id_type_measure`, `id_probability`, `id_impact`, `id_question`, `id_recommendation`) VALUES
(1, 'Respuesta 1', 'Descripción de la respuesta 1', NULL, NULL, NULL, NULL, NULL, 1, 1, 1),
(2, 'Respuesta 2', 'Descripción de la respuesta 2', NULL, NULL, NULL, NULL, NULL, 2, 1, 2),
(3, 'Respuesta 3', 'Descripción de la respuesta 3', NULL, NULL, NULL, NULL, NULL, 2, 2, 3),
(4, 'Respuesta 4', 'Descripción de la respuesta 4', NULL, NULL, NULL, NULL, NULL, 3, 2, 4),
(5, 'Respuesta 5', 'Descripción de la respuesta 5', NULL, NULL, NULL, NULL, NULL, 1, 3, 5),
(6, 'Respuesta 6', 'Descripción de la respuesta 6', NULL, NULL, NULL, NULL, NULL, 3, 3, 6),
(7, 'Respuesta 7', 'Descripción de la respuesta 7', NULL, NULL, NULL, NULL, NULL, 3, 4, 7),
(8, 'Respuesta 8', 'Descripción de la respuesta 8', NULL, NULL, NULL, NULL, NULL, 2, 4, 8),
(9, 'Respuesta 9', 'Descripción de la respuesta 9', NULL, NULL, NULL, NULL, NULL, 2, 5, 9),
(10, 'Respuesta 10', 'Descripción de la respuesta 10', NULL, NULL, NULL, NULL, NULL, 1, 5, 10),
(11, 'Respuesta 11', 'Descripción de la respuesta 11', NULL, NULL, NULL, NULL, NULL, 1, 6, 11),
(12, 'Respuesta 12', 'Descripción de la respuesta 12', NULL, NULL, NULL, NULL, NULL, 3, 6, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `budgets`
--

CREATE TABLE `budgets` (
  `id_budget` int(11) NOT NULL,
  `price` float NOT NULL,
  `accepted` tinyint(1) DEFAULT NULL,
  `hidden` date DEFAULT NULL,
  `status` enum('Pending','Done','Waiting') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `budgets`
--

INSERT INTO `budgets` (`id_budget`, `price`, `accepted`, `hidden`, `status`) VALUES
(1, 2000, 0, NULL, 'Waiting');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(50) DEFAULT NULL,
  `id_course` int(11) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `id_company` int(11) NOT NULL,
  `name_company` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `cif` varchar(50) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id_course` int(11) NOT NULL,
  `name_course` varchar(50) NOT NULL,
  `description_course` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creation_passwords`
--

CREATE TABLE `creation_passwords` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `creation_token` varchar(255) NOT NULL,
  `token_expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deliveries`
--

CREATE TABLE `deliveries` (
  `id_delivery` int(11) NOT NULL,
  `locate` varchar(50) NOT NULL,
  `grade` decimal(2,2) DEFAULT NULL,
  `id_activity` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devices`
--

CREATE TABLE `devices` (
  `id_device` int(11) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model_devices` varchar(100) NOT NULL,
  `mac_ethernet` varchar(20) NOT NULL,
  `mac_wifi` varchar(20) DEFAULT NULL,
  `id_type` int(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `device_state` varchar(20) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `serial_number` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emblems`
--

CREATE TABLE `emblems` (
  `id_emblem` int(11) NOT NULL,
  `name_emblem` varchar(50) NOT NULL,
  `description_emblem` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `id_course` int(11) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grade`
--

CREATE TABLE `grade` (
  `id_grade` int(11) NOT NULL,
  `qualification` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impacts`
--

CREATE TABLE `impacts` (
  `id_impact` int(11) NOT NULL,
  `name_type_impact` varchar(50) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `impacts`
--

INSERT INTO `impacts` (`id_impact`, `name_type_impact`, `hidden`) VALUES
(1, 'warning', NULL),
(2, 'danger', NULL),
(3, 'success', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interventions`
--

CREATE TABLE `interventions` (
  `id_intervention` int(11) NOT NULL,
  `name_type_intervention` varchar(50) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventories`
--

CREATE TABLE `inventories` (
  `id_inventory` int(11) NOT NULL,
  `inventory_number` int(11) DEFAULT NULL,
  `id_device` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `probabilities`
--

CREATE TABLE `probabilities` (
  `id_probability` int(11) NOT NULL,
  `name_type_probability` varchar(50) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questionnaries`
--

CREATE TABLE `questionnaries` (
  `id_questionary` int(11) NOT NULL,
  `name_questionary` varchar(50) NOT NULL,
  `autor_questionary` varchar(50) DEFAULT NULL,
  `date_questionary` date DEFAULT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `questionnaries`
--

INSERT INTO `questionnaries` (`id_questionary`, `name_questionary`, `autor_questionary`, `date_questionary`, `hidden`) VALUES
(1, 'Questionario1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questionnary_question`
--

CREATE TABLE `questionnary_question` (
  `id_questionnary_question` int(11) NOT NULL,
  `id_questionary` int(11) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `questionnary_question`
--

INSERT INTO `questionnary_question` (`id_questionnary_question`, `id_questionary`, `id_question`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questionnary_user`
--

CREATE TABLE `questionnary_user` (
  `id_questionnary_user` int(11) NOT NULL,
  `id_questionary` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `questionnary_user`
--

INSERT INTO `questionnary_user` (`id_questionnary_user`, `id_questionary`, `id_user`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE `questions` (
  `id_question` int(11) NOT NULL,
  `name_question` varchar(50) NOT NULL,
  `description_question` varchar(500) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`id_question`, `name_question`, `description_question`, `hidden`) VALUES
(1, '¿Pregunta 1?', 'Descripción de la pregunta 1', NULL),
(2, '¿Pregunta 2?', 'Descripción de la pregunta 2', NULL),
(3, '¿Pregunta 3?', 'Descripción de la pregunta 3', NULL),
(4, '¿Pregunta 4?', 'Descripción de la pregunta 4', NULL),
(5, '¿Pregunta 5?', 'Descripción de la pregunta 5', NULL),
(6, '¿Pregunta 6?', 'Descripción de la pregunta 6', NULL),
(7, '¿Pregunta 7?', 'Descripción de la pregunta 7', NULL),
(8, '¿Pregunta 8?', 'Descripción de la pregunta 8', NULL),
(9, '¿Pregunta 9?', 'Descripción de la pregunta 9', NULL),
(10, '¿Pregunta 10?', 'Descripción de la pregunta 10', NULL),
(11, '¿Pregunta 11?', 'Descripción de la pregunta 11', NULL),
(12, '¿Pregunta 12?', 'Descripción de la pregunta 12', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ratings`
--

CREATE TABLE `ratings` (
  `id_rating` int(11) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `Feedback` varchar(50) NOT NULL,
  `id_course` int(11) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recommendations`
--

CREATE TABLE `recommendations` (
  `id_recommendation` int(11) NOT NULL,
  `name_recommendation` varchar(50) NOT NULL,
  `description_recommendation` varchar(500) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recommendations`
--

INSERT INTO `recommendations` (`id_recommendation`, `name_recommendation`, `description_recommendation`, `hidden`) VALUES
(1, 'Recomendación 1', 'Descripción de la recomendación 1', NULL),
(2, 'Recomendación 2', 'Descripción de la recomendación 2', NULL),
(3, 'Recomendación 3', 'Descripción de la recomendación 3', NULL),
(4, 'Recomendación 4', 'Descripción de la recomendación 4', NULL),
(5, 'Recomendación 5', 'Descripción de la recomendación 5', NULL),
(6, 'Recomendación 6', 'Descripción de la recomendación 6', NULL),
(7, 'Recomendación 7', 'Descripción de la recomendación 7', NULL),
(8, 'Recomendación 8', 'Descripción de la recomendación 8', NULL),
(9, 'Recomendación 9', 'Descripción de la recomendación 9', NULL),
(10, 'Recomendación 10', 'Descripción de la recomendación 10', NULL),
(11, 'Recomendación 11', 'Descripción de la recomendación 11', NULL),
(12, 'Recomendación 12', 'Descripción de la recomendación 12', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperation_passwords`
--

CREATE TABLE `recuperation_passwords` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recuperation_token` varchar(255) NOT NULL,
  `token_expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reports`
--

CREATE TABLE `reports` (
  `id_report` int(11) NOT NULL,
  `name_report` varchar(50) NOT NULL,
  `date_report` date NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resources_files`
--

CREATE TABLE `resources_files` (
  `id_resource_file` int(11) NOT NULL,
  `name_resource_file` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `id_category` int(11) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resources_text`
--

CREATE TABLE `resources_text` (
  `id_resource_text` int(11) NOT NULL,
  `name_resource_text` varchar(50) NOT NULL,
  `description_resource_text` varchar(1000) NOT NULL,
  `id_category` int(11) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resources_url`
--

CREATE TABLE `resources_url` (
  `id_resource_url` int(11) NOT NULL,
  `name_resource_url` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `id_category` int(11) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `results`
--

CREATE TABLE `results` (
  `id_result` int(11) NOT NULL,
  `hidden` date DEFAULT NULL,
  `id_answer` int(11) NOT NULL,
  `id_report` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `risks`
--

CREATE TABLE `risks` (
  `id_risk` int(11) NOT NULL,
  `name_type_risk` varchar(50) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE `tasks` (
  `id_task` int(11) NOT NULL,
  `accepted` tinyint(1) NOT NULL,
  `state` enum('ToDo','InProgress','Done') DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `final_date` datetime DEFAULT NULL,
  `price` float NOT NULL,
  `manages` varchar(250) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_questionary` int(11) NOT NULL,
  `id_recommendation` int(11) NOT NULL,
  `id_budget` int(11) NOT NULL,
  `id_impact` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`id_task`, `accepted`, `state`, `start_date`, `final_date`, `price`, `manages`, `id_user`, `id_questionary`, `id_recommendation`, `id_budget`, `id_impact`, `percentage`, `hidden`) VALUES
(1, 0, 'ToDo', '2022-05-12 00:00:00', '2022-05-13 00:00:00', 100, NULL, 1, 1, 1, 1, 1, 0, NULL),
(2, 1, 'ToDo', '2022-05-13 00:00:00', '2022-05-14 00:00:00', 100, NULL, 1, 1, 2, 1, 2, 0, NULL),
(3, 1, 'InProgress', '2022-05-14 00:00:00', '2022-05-17 00:00:00', 100, NULL, 1, 1, 3, 1, 3, 50, NULL),
(4, 1, 'InProgress', '2022-05-17 00:00:00', '2022-05-22 00:00:00', 100, NULL, 1, 1, 4, 1, 2, 50, NULL),
(5, 1, 'InProgress', '2022-05-19 00:00:00', '2022-05-24 00:00:00', 100, NULL, 1, 1, 5, 1, 1, 50, NULL),
(6, 1, 'Done', '2022-05-12 00:00:00', '2022-05-20 00:00:00', 100, NULL, 1, 1, 6, 1, 2, 100, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `types_measures`
--

CREATE TABLE `types_measures` (
  `id_type_measure` int(11) NOT NULL,
  `name_type_measure` varchar(50) NOT NULL,
  `hidden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_device`
--

CREATE TABLE `type_device` (
  `id_type_device` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `dni` varchar(50) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `emblems` varchar(50) DEFAULT NULL,
  `nick_name` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `hidden` date DEFAULT NULL,
  `id_company` int(11) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `type_user` enum('admin','worker','client') NOT NULL,
  `token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `dni`, `name_user`, `last_name`, `phone_number`, `email`, `emblems`, `nick_name`, `password`, `hidden`, `id_company`, `profile_image`, `type_user`, `token`) VALUES
(1, '00000000W', 'Francisco', 'Zahinos', 600000000, 'franciscozahinos@iesmontsia.org', NULL, 'fzahinos', 'unapassword', NULL, NULL, NULL, 'admin', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_course`
--

CREATE TABLE `user_course` (
  `id_user_course` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_emblem`
--

CREATE TABLE `user_emblem` (
  `id_user_emblem` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_emblem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id_activity`),
  ADD KEY `id_course` (`id_course`);

--
-- Indices de la tabla `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `id_risk` (`id_risk`),
  ADD KEY `id_interventions` (`id_interventions`),
  ADD KEY `id_type_measure` (`id_type_measure`),
  ADD KEY `id_probability` (`id_probability`),
  ADD KEY `id_impact` (`id_impact`),
  ADD KEY `id_question` (`id_question`),
  ADD KEY `id_recommendation` (`id_recommendation`);

--
-- Indices de la tabla `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id_budget`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `id_course` (`id_course`);

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id_company`);

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_course`),
  ADD UNIQUE KEY `name_course` (`name_course`);

--
-- Indices de la tabla `creation_passwords`
--
ALTER TABLE `creation_passwords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id_delivery`),
  ADD KEY `id_activity` (`id_activity`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id_device`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `emblems`
--
ALTER TABLE `emblems`
  ADD PRIMARY KEY (`id_emblem`),
  ADD KEY `id_course` (`id_course`);

--
-- Indices de la tabla `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id_grade`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `impacts`
--
ALTER TABLE `impacts`
  ADD PRIMARY KEY (`id_impact`);

--
-- Indices de la tabla `interventions`
--
ALTER TABLE `interventions`
  ADD PRIMARY KEY (`id_intervention`);

--
-- Indices de la tabla `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id_inventory`),
  ADD KEY `id_device` (`id_device`);

--
-- Indices de la tabla `probabilities`
--
ALTER TABLE `probabilities`
  ADD PRIMARY KEY (`id_probability`);

--
-- Indices de la tabla `questionnaries`
--
ALTER TABLE `questionnaries`
  ADD PRIMARY KEY (`id_questionary`);

--
-- Indices de la tabla `questionnary_question`
--
ALTER TABLE `questionnary_question`
  ADD PRIMARY KEY (`id_questionnary_question`),
  ADD KEY `id_questionary` (`id_questionary`),
  ADD KEY `id_question` (`id_question`);

--
-- Indices de la tabla `questionnary_user`
--
ALTER TABLE `questionnary_user`
  ADD PRIMARY KEY (`id_questionnary_user`),
  ADD KEY `id_questionary` (`id_questionary`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_question`);

--
-- Indices de la tabla `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_course` (`id_course`);

--
-- Indices de la tabla `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`id_recommendation`);

--
-- Indices de la tabla `recuperation_passwords`
--
ALTER TABLE `recuperation_passwords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id_report`);

--
-- Indices de la tabla `resources_files`
--
ALTER TABLE `resources_files`
  ADD PRIMARY KEY (`id_resource_file`),
  ADD KEY `id_category` (`id_category`);

--
-- Indices de la tabla `resources_text`
--
ALTER TABLE `resources_text`
  ADD PRIMARY KEY (`id_resource_text`),
  ADD KEY `id_category` (`id_category`);

--
-- Indices de la tabla `resources_url`
--
ALTER TABLE `resources_url`
  ADD PRIMARY KEY (`id_resource_url`),
  ADD KEY `id_category` (`id_category`);

--
-- Indices de la tabla `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id_result`),
  ADD KEY `id_report` (`id_report`),
  ADD KEY `id_answer` (`id_answer`);

--
-- Indices de la tabla `risks`
--
ALTER TABLE `risks`
  ADD PRIMARY KEY (`id_risk`);

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_questionary` (`id_questionary`),
  ADD KEY `id_recommendation` (`id_recommendation`),
  ADD KEY `id_budget` (`id_budget`),
  ADD KEY `id_impact` (`id_impact`);

--
-- Indices de la tabla `types_measures`
--
ALTER TABLE `types_measures`
  ADD PRIMARY KEY (`id_type_measure`);

--
-- Indices de la tabla `type_device`
--
ALTER TABLE `type_device`
  ADD PRIMARY KEY (`id_type_device`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD KEY `id_company` (`id_company`);

--
-- Indices de la tabla `user_course`
--
ALTER TABLE `user_course`
  ADD PRIMARY KEY (`id_user_course`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_course` (`id_course`);

--
-- Indices de la tabla `user_emblem`
--
ALTER TABLE `user_emblem`
  ADD PRIMARY KEY (`id_user_emblem`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_emblem` (`id_emblem`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activities`
--
ALTER TABLE `activities`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `answers`
--
ALTER TABLE `answers`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id_budget` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `companies`
--
ALTER TABLE `companies`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `creation_passwords`
--
ALTER TABLE `creation_passwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id_delivery` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `devices`
--
ALTER TABLE `devices`
  MODIFY `id_device` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `emblems`
--
ALTER TABLE `emblems`
  MODIFY `id_emblem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grade`
--
ALTER TABLE `grade`
  MODIFY `id_grade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `impacts`
--
ALTER TABLE `impacts`
  MODIFY `id_impact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `interventions`
--
ALTER TABLE `interventions`
  MODIFY `id_intervention` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id_inventory` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `probabilities`
--
ALTER TABLE `probabilities`
  MODIFY `id_probability` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `questionnaries`
--
ALTER TABLE `questionnaries`
  MODIFY `id_questionary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `questionnary_question`
--
ALTER TABLE `questionnary_question`
  MODIFY `id_questionnary_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `questionnary_user`
--
ALTER TABLE `questionnary_user`
  MODIFY `id_questionnary_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `questions`
--
ALTER TABLE `questions`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `id_recommendation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `recuperation_passwords`
--
ALTER TABLE `recuperation_passwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reports`
--
ALTER TABLE `reports`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resources_files`
--
ALTER TABLE `resources_files`
  MODIFY `id_resource_file` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resources_text`
--
ALTER TABLE `resources_text`
  MODIFY `id_resource_text` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resources_url`
--
ALTER TABLE `resources_url`
  MODIFY `id_resource_url` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `results`
--
ALTER TABLE `results`
  MODIFY `id_result` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `risks`
--
ALTER TABLE `risks`
  MODIFY `id_risk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `types_measures`
--
ALTER TABLE `types_measures`
  MODIFY `id_type_measure` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `type_device`
--
ALTER TABLE `type_device`
  MODIFY `id_type_device` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user_course`
--
ALTER TABLE `user_course`
  MODIFY `id_user_course` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user_emblem`
--
ALTER TABLE `user_emblem`
  MODIFY `id_user_emblem` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);

--
-- Filtros para la tabla `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`id_risk`) REFERENCES `risks` (`id_risk`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`id_interventions`) REFERENCES `interventions` (`id_intervention`),
  ADD CONSTRAINT `answers_ibfk_3` FOREIGN KEY (`id_type_measure`) REFERENCES `types_measures` (`id_type_measure`),
  ADD CONSTRAINT `answers_ibfk_4` FOREIGN KEY (`id_probability`) REFERENCES `probabilities` (`id_probability`),
  ADD CONSTRAINT `answers_ibfk_5` FOREIGN KEY (`id_impact`) REFERENCES `impacts` (`id_impact`),
  ADD CONSTRAINT `answers_ibfk_6` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`),
  ADD CONSTRAINT `answers_ibfk_7` FOREIGN KEY (`id_recommendation`) REFERENCES `recommendations` (`id_recommendation`);

--
-- Filtros para la tabla `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);

--
-- Filtros para la tabla `creation_passwords`
--
ALTER TABLE `creation_passwords`
  ADD CONSTRAINT `creation_passwords_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_ibfk_1` FOREIGN KEY (`id_activity`) REFERENCES `activities` (`id_activity`),
  ADD CONSTRAINT `deliveries_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type_device` (`id_type_device`),
  ADD CONSTRAINT `devices_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `emblems`
--
ALTER TABLE `emblems`
  ADD CONSTRAINT `emblems_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);

--
-- Filtros para la tabla `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `grade_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_ibfk_1` FOREIGN KEY (`id_device`) REFERENCES `devices` (`id_device`);

--
-- Filtros para la tabla `questionnary_question`
--
ALTER TABLE `questionnary_question`
  ADD CONSTRAINT `questionnary_question_ibfk_1` FOREIGN KEY (`id_questionary`) REFERENCES `questionnaries` (`id_questionary`),
  ADD CONSTRAINT `questionnary_question_ibfk_2` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`);

--
-- Filtros para la tabla `questionnary_user`
--
ALTER TABLE `questionnary_user`
  ADD CONSTRAINT `questionnary_user_ibfk_1` FOREIGN KEY (`id_questionary`) REFERENCES `questionnaries` (`id_questionary`),
  ADD CONSTRAINT `questionnary_user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);

--
-- Filtros para la tabla `recuperation_passwords`
--
ALTER TABLE `recuperation_passwords`
  ADD CONSTRAINT `recuperation_passwords_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `resources_files`
--
ALTER TABLE `resources_files`
  ADD CONSTRAINT `resources_files_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

--
-- Filtros para la tabla `resources_text`
--
ALTER TABLE `resources_text`
  ADD CONSTRAINT `resources_text_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

--
-- Filtros para la tabla `resources_url`
--
ALTER TABLE `resources_url`
  ADD CONSTRAINT `resources_url_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

--
-- Filtros para la tabla `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`id_report`) REFERENCES `reports` (`id_report`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`id_answer`) REFERENCES `answers` (`id_answer`);

--
-- Filtros para la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`id_questionary`) REFERENCES `questionnaries` (`id_questionary`),
  ADD CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`id_recommendation`) REFERENCES `recommendations` (`id_recommendation`),
  ADD CONSTRAINT `tasks_ibfk_4` FOREIGN KEY (`id_budget`) REFERENCES `budgets` (`id_budget`),
  ADD CONSTRAINT `tasks_ibfk_5` FOREIGN KEY (`id_impact`) REFERENCES `impacts` (`id_impact`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`);

--
-- Filtros para la tabla `user_course`
--
ALTER TABLE `user_course`
  ADD CONSTRAINT `user_course_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `user_course_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);

--
-- Filtros para la tabla `user_emblem`
--
ALTER TABLE `user_emblem`
  ADD CONSTRAINT `user_emblem_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `user_emblem_ibfk_2` FOREIGN KEY (`id_emblem`) REFERENCES `emblems` (`id_emblem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
