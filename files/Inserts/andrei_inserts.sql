
/*INSERTS USERS*/

INSERT INTO `users` (`id_user`, `dni`, `name_user`, `last_name`, `phone_number`, `email`, `emblems`, `nick_name`, `password`, `hidden`, `id_company`, `type_user`) 
VALUES ('1', '23483719F', 'Eduard ', 'Andrei', '635182904', 'andreiadmin@pymeshield.com', NULL, 'andrei', '123', NULL, NULL, 'admin');

INSERT INTO `users` (`id_user`, `dni`, `name_user`, `last_name`, `phone_number`, `email`, `emblems`, `nick_name`, `password`, `hidden`, `id_company`, `type_user`) 
VALUES ('2', '12893290T', 'Aleix', 'Paga', '643912389', 'aleixworker@pymeshield.com', NULL, 'aleix', '123', NULL, NULL, 'worker');

INSERT INTO `users` (`id_user`, `dni`, `name_user`, `last_name`, `phone_number`, `email`, `emblems`, `nick_name`, `password`, `hidden`, `id_company`, `type_user`) 
VALUES ('3', '29301957O', 'Toni', 'Enrich', '672910382', 'toniclient@pymeshield.com', NULL, 'toni', '123', NULL, NULL, 'client');



/*INSERTS QUESTIONNARIES*/

INSERT INTO `questionnaries` (`id_questionary`, `name_questionary`, `autor_questionary`, `date_questionary`, `hidden`, `id_user`) 
VALUES ('1', 'Qüestionari 1', NULL, NULL, NULL, '3');



/*INSERTS QUESTIONS*/

INSERT INTO `questions` (`id_question`, `name_question`, `description_question`, `hidden`, `id_questionary`) 
VALUES ('1', 'Pregunta 1', 'Pregunta de prova', NULL, '1');



/*INSERTS ANSWERS*/

INSERT INTO `answers` (`id_answer`, `name_answer`, `description_answer`, `hidden`, `id_question`) 
VALUES ('1', 'Resposta número 1', 'Resposta de prova', NULL, '1');



/*INSERTS RECOMMENDATIONS*/

INSERT INTO `recommendations` (`id_recommendation`, `name_recommendation`, `description_recommendation`, `hidden`, `id_answer`) 
VALUES ('1', 'Recomanació número 1', 'Recomanació de prova ', NULL, '1');



/*INSERTS TASKS*/

INSERT INTO `tasks` (`id_task`, `name_task`, `description_task`, `accepted`, `state`, `start_date`, `final_date`, `id_user`, `id_questionary`, `id_recommendation`, `percentage`, `importance`, `hidden`) 
VALUES ('1', 'Tasca numero 1', 'Descripció de la tasca número 1', '0', NULL, NULL, NULL, NULL, '1', '1', '0', 'danger', NULL);
