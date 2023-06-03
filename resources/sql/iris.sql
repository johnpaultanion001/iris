INSERT INTO `reported_bies` (`id`, `first_name`, `last_name`, `email`, `mobile_number`, `created_at`, `updated_at`) VALUES
(1, 'Johnpaul', 'Tanion', 'johnpaultanion001@gmail.com', '09778882250', '2023-05-30 18:25:32', '2023-05-30 18:25:32');


INSERT INTO `reports` (`id`, `user_id`, `title`, `description`, `file`, `created_at`, `updated_at`) VALUES
(1, '1', 'Report Title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'http://dti-internal.ap-southeast-1.elasticbeanstalk.com/test.pdf', '2023-05-30 18:24:18', '2023-05-30 18:24:18'),
(2, '1', 'Report Title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'http://dti-internal.ap-southeast-1.elasticbeanstalk.com/test.pdf', '2023-05-30 18:24:18', '2023-05-30 18:24:18'),
(3, '1', 'Report Title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'http://dti-internal.ap-southeast-1.elasticbeanstalk.com/test.pdf', '2023-05-30 18:24:18', '2023-05-30 18:24:18'),
(4, '1', 'Report Title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'http://dti-internal.ap-southeast-1.elasticbeanstalk.com/test.pdf', '2023-05-30 18:24:18', '2023-05-30 18:24:18'),
(5, '1', 'Report Title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'http://dti-internal.ap-southeast-1.elasticbeanstalk.com/test.pdf', '2023-05-30 18:24:18', '2023-05-30 18:24:18');

INSERT INTO `users` (`id`, `agency_id`, `name`, `last_name`, `email`, `mobile_number`, `role`, `password`, `status`, `profile`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 1, 'Admin', 'Super Admin 1', 'admin@gmail.com', '09775556620', 'SUPER_ADMIN', '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896', 'ACTIVE', 'profile.jpg', '2023-05-30 18:24:18', '2023-05-30 18:24:18', NULL),
(2, 1, 'Admin 2', 'Super Admin 2', 'admin1@gmail.com', '09775556620', 'SUPER_ADMIN', '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896', 'ACTIVE', 'profile.jpg', '2023-05-30 18:24:18', '2023-05-30 18:24:18', NULL),
(3, 2, 'DA Admin', 'Admin', 'da_admin@gmail.com', '09775556621', 'ADMIN', '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896', 'ACTIVE', 'profile.jpg', '2023-05-30 18:24:18', '2023-05-30 18:24:18', NULL),
(4, 3, 'DOH Admin', 'Admin', 'doh_admin@gmail.com', '09775556622', 'ADMIN', '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896', 'ACTIVE', 'profile.jpg', '2023-05-30 18:24:18', '2023-05-30 18:24:18', NULL),
(5, 4, 'DENR Admin', 'Admin', 'denr_admin@gmail.com', '09775556623', 'ADMIN', '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896', 'ACTIVE', 'profile.jpg', '2023-05-30 18:24:18', '2023-05-30 18:24:18', NULL);


INSERT INTO `vendors` (`id`, `vendor_name`, `email`, `mobile_number`, `city`, `created_at`, `updated_at`) VALUES
(1, 'test vendor name', 'vendor@gmail.com', '09778882250', 'Antipolo City', '2023-05-30 18:25:32', '2023-05-30 18:25:32');



INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'DTI IRIS Personal Access Client', '$2y$10$5BfoK7rgYUL7NcdMLaJfiuJrV5oYgi2DJgvfoGuEADfRdkt9Of7X2', NULL, 'http://localhost', 1, 0, 0, '2023-05-31 05:32:57', '2023-05-31 05:32:57'),
(2, NULL, 'DTI IRIS Password Grant Client', '$2y$10$W6bA8qFuNUyGlmWbzQfX0eOb9w2Q0Hx85Ct7xEc.Z5R7X51uLPzuK', 'users', 'http://localhost', 0, 1, 0, '2023-05-31 05:32:57', '2023-05-31 05:32:57');


INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-05-31 05:32:57', '2023-05-31 05:32:57');

INSERT INTO `ticket_document_files` (`id`, `ticket_id`, `document_file`, `created_at`, `updated_at`) VALUES
(1, '1', 'documents_file/sWvyZo9Lq2pVbnvh5vG3BV7gtq2Kj3gdvz23hQ7w.docx', '2023-06-03 08:49:10', '2023-06-03 08:49:10'),
(2, '1', 'documents_file/ZGu1a985xHcLNZL48D1IBE9FKIDYdodIsgn4SgT4.docx', '2023-06-03 08:49:10', '2023-06-03 08:49:10'),
(3, '2', 'documents_file/PfLsOh7s01iUeMVmqbIXLFw8sDVSLS3AKErwooSY.docx', '2023-06-03 08:55:14', '2023-06-03 08:55:14'),
(4, '2', 'documents_file/QdbThE6C5KXkd6o5pUgQaBTcqPs3q3zvyV40OBhW.png', '2023-06-03 08:55:14', '2023-06-03 08:55:14'),
(5, '3', 'documents_file/sWvyZo9Lq2pVbnvh5vG3BV7gtq2Kj3gdvz23hQ7w.docx', '2023-06-03 08:49:10', '2023-06-03 08:49:10'),
(6, '3', 'documents_file/ZGu1a985xHcLNZL48D1IBE9FKIDYdodIsgn4SgT4.docx', '2023-06-03 08:49:10', '2023-06-03 08:49:10'),
(7, '4', 'documents_file/PfLsOh7s01iUeMVmqbIXLFw8sDVSLS3AKErwooSY.docx', '2023-06-03 08:55:14', '2023-06-03 08:55:14'),
(8, '4', 'documents_file/QdbThE6C5KXkd6o5pUgQaBTcqPs3q3zvyV40OBhW.png', '2023-06-03 08:55:14', '2023-06-03 08:55:14'),
(9, '5', 'documents_file/sWvyZo9Lq2pVbnvh5vG3BV7gtq2Kj3gdvz23hQ7w.docx', '2023-06-03 08:49:10', '2023-06-03 08:49:10'),
(10, '6', 'documents_file/ZGu1a985xHcLNZL48D1IBE9FKIDYdodIsgn4SgT4.docx', '2023-06-03 08:49:10', '2023-06-03 08:49:10'),
(11, '7', 'documents_file/PfLsOh7s01iUeMVmqbIXLFw8sDVSLS3AKErwooSY.docx', '2023-06-03 08:55:14', '2023-06-03 08:55:14'),
(12, '8', 'documents_file/QdbThE6C5KXkd6o5pUgQaBTcqPs3q3zvyV40OBhW.png', '2023-06-03 08:55:14', '2023-06-03 08:55:14'),
(13, '9', 'documents_file/sWvyZo9Lq2pVbnvh5vG3BV7gtq2Kj3gdvz23hQ7w.docx', '2023-06-03 08:49:10', '2023-06-03 08:49:10'),
(14, '10', 'documents_file/ZGu1a985xHcLNZL48D1IBE9FKIDYdodIsgn4SgT4.docx', '2023-06-03 08:49:10', '2023-06-03 08:49:10'),
(15, '11', 'documents_file/PfLsOh7s01iUeMVmqbIXLFw8sDVSLS3AKErwooSY.docx', '2023-06-03 08:55:14', '2023-06-03 08:55:14'),
(16, '12', 'documents_file/QdbThE6C5KXkd6o5pUgQaBTcqPs3q3zvyV40OBhW.png', '2023-06-03 08:55:14', '2023-06-03 08:55:14'),
(17, '13', 'documents_file/QdbThE6C5KXkd6o5pUgQaBTcqPs3q3zvyV40OBhW.png', '2023-06-03 08:55:14', '2023-06-03 08:55:14'),
(18, '14', 'documents_file/QdbThE6C5KXkd6o5pUgQaBTcqPs3q3zvyV40OBhW.png', '2023-06-03 08:55:14', '2023-06-03 08:55:14');

