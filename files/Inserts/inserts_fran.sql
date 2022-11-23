START TRANSACTION;
--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `dni`, `name_user`, `last_name`, `phone_number`, `email`, `emblems`, `nick_name`, `password`, `hidden`, `id_company`, `type_user`) VALUES
(1, '00000000W', 'Francisco', 'Zahinos', 600000000, 'franciscozahinos@iesmontsia.org', NULL, 'fzahinos', 'unapassword', NULL, NULL, 'admin');

--
-- Volcado de datos para la tabla `questionnaries`
--

INSERT INTO `questionnaries` (`id_questionary`, `name_questionary`, `autor_questionary`, `date_questionary`, `hidden`, `id_user`) VALUES
(1, 'Questionario1', NULL, NULL, NULL, 1);

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`id_question`, `name_question`, `description_question`, `hidden`, `id_questionary`) VALUES
(1, '¿Pregunta 1?', 'Descripción de la pregunta 1', NULL, 1);
--
-- Volcado de datos para la tabla `answers`
--

INSERT INTO `answers` (`id_answer`, `name_answer`, `description_answer`, `hidden`, `id_question`) VALUES
(1, 'Respuesta 1', 'Descripción de la respuesta 1', NULL, 1);

--
-- Volcado de datos para la tabla `recommendations`
--

INSERT INTO `recommendations` (`id_recommendation`, `name_recommendation`, `description_recommendation`, `hidden`, `id_answer`) VALUES
(1, 'Recomendación 1', 'Descripción de la recomendación 1', NULL, 1);

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`id_task`, `name_task`, `description_task`, `accepted`, `state`, `start_date`, `final_date`, `id_user`, `id_questionary`, `id_recommendation`, `percentage`, `importance`, `hidden`) VALUES
(1, 'Tarea 1', 'Descripción de la tarea 1', 1, 'ToDo', '2022-05-12 00:00:00', '2022-05-13 00:00:00', 1, 1, 1, 0, 'warning', NULL),
(2, 'Tarea 2', 'Descripción de la tarea 2', 1, 'ToDo', '2022-05-13 00:00:00', '2022-05-14 00:00:00', 1, 1, 1, 0, 'danger', NULL),
(3, 'Tarea 3', 'Descripción de la tarea 3', 1, 'InProgress', '2022-05-14 00:00:00', '2022-05-17 00:00:00', 1, 1, 1, 50, 'success', NULL),
(4, 'Tarea 4', 'Descripción de la tarea 4', 1, 'InProgress', '2022-05-17 00:00:00', '2022-05-22 00:00:00', 1, 1, 1, 50, 'danger', NULL),
(5, 'Tarea 5', 'Descripción de la tarea 5', 1, 'InProgress', '2022-05-19 00:00:00', '2022-05-24 00:00:00', 1, 1, 1, 50, 'warning', NULL),
(6, 'Tarea 6', 'Descripción de la tarea 6', 1, 'Done', '2022-05-12 00:00:00', '2022-05-20 00:00:00', 1, 1, 1, 100, 'danger', NULL);


COMMIT;
