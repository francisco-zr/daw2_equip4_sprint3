
INSERT INTO `companies` (`id_company`, `name_company`, `email`, `phone_number`, `cif`, `hidden`) VALUES ('1', 'Company 1', 'company1@gmail.com', '643543789', 'IUASDNISO', NULL);

INSERT INTO `companies` (`id_company`, `name_company`, `email`, `phone_number`, `cif`, `hidden`) VALUES ('2', 'Company 2', 'company2@gmail.com', '678943625', 'VYIAUSJKD', NULL);

INSERT INTO `companies` (`id_company`, `name_company`, `email`, `phone_number`, `cif`, `hidden`) VALUES ('3', 'Company 3', 'company3@gmail.com', '678932675', 'TYBSINIOO', NULL);

INSERT INTO `companies` (`id_company`, `name_company`, `email`, `phone_number`, `cif`, `hidden`) VALUES ('4', 'Company 4', 'company4@gmail.com', '643792817', 'IUASDNISS', NULL);

INSERT INTO `companies` (`id_company`, `name_company`, `email`, `phone_number`, `cif`, `hidden`) VALUES ('5', 'Company 5', 'company5@gmail.com', '678325671', 'TYMMTNIDS', NULL);

INSERT INTO `companies` (`id_company`, `name_company`, `email`, `phone_number`, `cif`, `hidden`) VALUES ('6', 'Company 6', 'company6@gmail.com', '655333222', 'IDGFUSJKY', NULL);

INSERT INTO `companies` (`id_company`, `name_company`, `email`, `phone_number`, `cif`, `hidden`) VALUES ('7', 'Company 7', 'company7@gmail.com', '644633681', 'TYJNINIUU', NULL);

INSERT INTO `companies` (`id_company`, `name_company`, `email`, `phone_number`, `cif`, `hidden`) VALUES ('8', 'Company 8', 'company8@gmail.com', '643262342', 'YDSTABDRO', NULL);



INSERT INTO `users` (`id_user`, `dni`, `name_user`, `last_name`, `phone_number`, `email`, `emblems`, `nick_name`, `password`, `hidden`, `id_company`, `profile_image`, `type_user`, `token`) VALUES ('2', 'X6984886Q', 'Tatiana', 'Valentinyova', '658429179', 'tatianavalentinyova@iesmontsia.org', NULL, 'Tatiana17', NULL, NULL, '2', NULL, 'client', NULL);

INSERT INTO `users` (`id_user`, `dni`, `name_user`, `last_name`, `phone_number`, `email`, `emblems`, `nick_name`, `password`, `hidden`, `id_company`, `profile_image`, `type_user`, `token`) VALUES ('3', '00000123G', 'Samuel', 'Lara', '64364573', 'samuellara@iesmontsia.org', NULL, 'Samuel', NULL, NULL, '1', NULL, 'client', NULL);

INSERT INTO `users` (`id_user`, `dni`, `name_user`, `last_name`, `phone_number`, `email`, `emblems`, `nick_name`, `password`, `hidden`, `id_company`, `profile_image`, `type_user`, `token`) VALUES ('4', '00330123L', 'Julen', 'Martinez', '678532513', 'julenmartinez@iesmontsia.org', NULL, 'Julen', NULL, NULL, '1', NULL, 'client', NULL);

INSERT INTO `users` (`id_user`, `dni`, `name_user`, `last_name`, `phone_number`, `email`, `emblems`, `nick_name`, `password`, `hidden`, `id_company`, `profile_image`, `type_user`, `token`) VALUES ('5', '45273890Q', 'Joan', 'Almudeve', '679874321', 'joanpasqualalmudeve@iesmontsia.org', NULL, 'Jan', NULL, NULL, '4', NULL, 'client', NULL);

INSERT INTO `users` (`id_user`, `dni`, `name_user`, `last_name`, `phone_number`, `email`, `emblems`, `nick_name`, `password`, `hidden`, `id_company`, `profile_image`, `type_user`, `token`) VALUES ('6', '41173821U', 'Marta', 'Gutierrez', '643721892', 'marta@gmail.com', NULL, 'Marta1', NULL, NULL, '5', NULL, 'client', NULL);

INSERT INTO `users` (`id_user`, `dni`, `name_user`, `last_name`, `phone_number`, `email`, `emblems`, `nick_name`, `password`, `hidden`, `id_company`, `profile_image`, `type_user`, `token`) VALUES ('7', '12000456V', 'Miriam', 'Gómez', '675643678', 'miriamgomez@gmail.com', NULL, 'MiriamG', NULL, NULL, '6', NULL, 'client', NULL);

INSERT INTO `users` (`id_user`, `dni`, `name_user`, `last_name`, `phone_number`, `email`, `emblems`, `nick_name`, `password`, `hidden`, `id_company`, `profile_image`, `type_user`, `token`) VALUES ('8', '00123423P', 'Paola', 'López ', '67893234', 'paolalopez@gmail.com', NULL, 'Paola23', NULL, NULL, '7', NULL, 'admin', NULL);

INSERT INTO `users` (`id_user`, `dni`, `name_user`, `last_name`, `phone_number`, `email`, `emblems`, `nick_name`, `password`, `hidden`, `id_company`, `profile_image`, `type_user`, `token`) VALUES ('9', '00220431L', 'Pepito', 'Villarroya', '61234567', 'pepitov@iesmontsia.org', NULL, 'Pepito8', NULL, NULL, '4', NULL, 'worker', NULL);

INSERT INTO `users` (`id_user`, `dni`, `name_user`, `last_name`, `phone_number`, `email`, `emblems`, `nick_name`, `password`, `hidden`, `id_company`, `profile_image`, `type_user`, `token`) VALUES ('10', 'X7686352D', 'Tania', 'Gómez', '611298365', 'taniagomez@gmail.com', NULL, 'Tania01', NULL, NULL, '4', NULL, 'worker', NULL);





INSERT INTO `tasks` (`id_task`, `accepted`, `state`, `start_date`, `final_date`, `price`, `manages`, `id_user`, `id_questionary`, `id_recommendation`, `id_budget`, `id_impact`, `percentage`, `hidden`) VALUES ('7', '1', NULL, '2022-06-12 00:00:00', '2022-06-20 00:00:00', '100', NULL, '2', '1', '1', '1', '2', '50', NULL);

INSERT INTO `tasks` (`id_task`, `accepted`, `state`, `start_date`, `final_date`, `price`, `manages`, `id_user`, `id_questionary`, `id_recommendation`, `id_budget`, `id_impact`, `percentage`, `hidden`) VALUES ('8', '1', NULL, '2022-07-12 00:00:00', '2022-07-20 00:00:00', '100', NULL, '3', '1', '1', '1', '2', '50', NULL);

INSERT INTO `tasks` (`id_task`, `accepted`, `state`, `start_date`, `final_date`, `price`, `manages`, `id_user`, `id_questionary`, `id_recommendation`, `id_budget`, `id_impact`, `percentage`, `hidden`) VALUES ('9', '1', NULL, '2022-08-12 00:00:00', '2022-08-20 00:00:00', '100', NULL, '4', '1', '1', '2', '3', '100', NULL);

INSERT INTO `tasks` (`id_task`, `accepted`, `state`, `start_date`, `final_date`, `price`, `manages`, `id_user`, `id_questionary`, `id_recommendation`, `id_budget`, `id_impact`, `percentage`, `hidden`) VALUES ('10', '1', NULL, '2022-09-12 00:00:00', '2022-09-20 00:00:00', '100', NULL, '5', '1', '1', '1', '3', '100', NULL);

INSERT INTO `tasks` (`id_task`, `accepted`, `state`, `start_date`, `final_date`, `price`, `manages`, `id_user`, `id_questionary`, `id_recommendation`, `id_budget`, `id_impact`, `percentage`, `hidden`) VALUES ('11', '1', NULL, '2022-10-12 00:00:00', '2022-10-20 00:00:00', '100', NULL, '6', '1', '1', '3', '6', '100', NULL);

INSERT INTO `tasks` (`id_task`, `accepted`, `state`, `start_date`, `final_date`, `price`, `manages`, `id_user`, `id_questionary`, `id_recommendation`, `id_budget`, `id_impact`, `percentage`, `hidden`) VALUES ('12', '1', NULL, '2022-01-28 01:02:20', '2022-03-20 00:00:00', '100', NULL, '7', '1', '1', '2', '1', '10', NULL);



INSERT INTO `budgets` (`id_budget`, `price`, `accepted`, `hidden`, `status`) VALUES ('2', '300', NULL, NULL, 'Done');
INSERT INTO `budgets` (`id_budget`, `price`, `accepted`, `hidden`, `status`) VALUES ('3', '300', NULL, NULL, 'Pending');