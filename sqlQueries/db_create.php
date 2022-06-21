<?php


class db_create{

    public static function getCreateDbCommands() 
    {
        $create[] = "CREATE TABLE `event` (
        `id` int(11) NOT NULL,
        `id_owner` int(11) NOT NULL,
        `title` varchar(45) NOT NULL,
        `description` varchar(1000) NOT NULL,
        `date` date NOT NULL,
        `create_date` date NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";


        $create[] .= "INSERT INTO `event` (`id`, `id_owner`, `title`, `description`, `date`, `create_date`) VALUES
        (11, 16, 'football game ', 'kickin ball', '2022-06-24', '2022-06-20'),
        (13, 16, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id faucibus orci. Praesent consequat iaculis turpis ut viverra. Phasellus eleifend ullamcorper molestie. Donec eget fermentum metus, ut laoreet enim. Nunc vehicula elit nisl, eget consequat nibh scelerisque maximus. Nullam sit amet odio viverra, posuere ligula posuere, placerat tellus. Vivamus eros nisi, hendrerit nec commodo eu, auctor eget augue. Aliquam sagittis risus vel convallis varius. Donec condimentum auctor mattis. Praesent dictum tempor sem accumsan sagittis. Donec tempus sodales sapien, sit amet mattis quam. Phasellus ut massa bibendum, venenatis ex non, hendrerit est. Phasellus tempor ullamcorper convallis. Praesent convallis non sem in mattis.\r\n\r\nMauris sagittis facilisis pharetra. Sed sodales, nisl in gravida porta, ante metus viverra tellus, eu aliquet dui diam quis dolor. Suspendisse et turpis velit. Cras feugiat magna a dictum bibendum. Etiam fringilla orci in lorem dictum, id ultrices quam pellentesque e', '2022-06-25', '2022-06-20'),
        (14, 18, 'D&D&D', 'drinks, drugs, dogs', '2022-06-22', '2022-06-20'),
        (15, 19, 'american burger', 'let\'s eat some good burgir for dinner', '2022-06-30', '2022-06-21'),
        (16, 20, 'star battle', 'pew pew ', '2022-06-25', '2022-06-21');";


        $create[] .= "CREATE TABLE `event_members` (
            `id_event` int(11) NOT NULL,
            `id_user` int(11) NOT NULL,
            `join_date` date NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";


        $create[] .= "INSERT INTO `event_members` (`id_event`, `id_user`, `join_date`) VALUES
        (13, 16, '2022-06-20'),
        (11, 16, '2022-06-20'),
        (11, 18, '2022-06-20'),
        (14, 18, '2022-06-20'),
        (14, 19, '2022-06-21'),
        (11, 19, '2022-06-21'),
        (13, 20, '2022-06-21'),
        (11, 20, '2022-06-21'),
        (15, 16, '2022-06-21');";



        $create[] .= "CREATE TABLE `favorite_events` (
            `id_user` int(11) NOT NULL,
            `id_event` int(11) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
          ";


        $create[] .= "CREATE TABLE `logs` (
            `id` int(11) NOT NULL,
            `id_user` int(11) NOT NULL,
            `login_datetime` datetime NOT NULL,
            `logout_datetime` datetime DEFAULT NULL,
            `logged_time` time DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        $create[] .= "INSERT INTO `logs` (`id`, `id_user`, `login_datetime`, `logout_datetime`, `logged_time`) VALUES
        (1, 15, '2022-06-20 22:52:21', '2022-06-20 22:54:04', '00:01:43'),
        (2, 16, '2022-06-20 22:54:47', '2022-06-20 22:55:40', '00:00:53'),
        (3, 16, '2022-06-20 22:55:44', '2022-06-20 22:59:05', '00:03:21'),
        (4, 17, '2022-06-20 22:59:46', '2022-06-20 23:01:37', '00:01:51'),
        (5, 16, '2022-06-20 23:01:42', '2022-06-20 23:06:42', '00:05:00'),
        (6, 16, '2022-06-20 23:11:20', '2022-06-20 23:12:09', '00:00:49'),
        (7, 18, '2022-06-20 23:12:39', '2022-06-20 23:27:47', '00:15:08'),
        (8, 16, '2022-06-20 23:27:53', '2022-06-21 00:27:19', '00:59:26'),
        (9, 18, '2022-06-21 00:27:31', '2022-06-21 00:27:37', '00:00:06'),
        (11, 16, '2022-06-21 16:22:53', '2022-06-21 16:23:29', '00:00:36'),
        (12, 16, '2022-06-21 16:23:35', '2022-06-21 17:28:09', '01:04:34'),
        (13, 19, '2022-06-21 17:34:13', '2022-06-21 17:42:23', '00:08:10'),
        (14, 20, '2022-06-21 17:47:21', '2022-06-21 17:52:33', '00:05:12'),
        (15, 16, '2022-06-21 17:53:01', '2022-06-21 17:55:00', '00:01:59'),
        (16, 16, '2022-06-21 17:55:22', NULL, NULL);";


        $create[] .= "CREATE TABLE `user` (
            `id` int(11) NOT NULL,
            `login` varchar(45) NOT NULL,
            `email` varchar(45) NOT NULL,
            `password` varchar(100) NOT NULL,
            `is_admin` int(1) NOT NULL,
            `is_active` int(1) NOT NULL,
            `allow_notifications` int(1) NOT NULL,
            `name` varchar(45) NOT NULL,
            `surname` varchar(45) NOT NULL,
            `username` varchar(45) NOT NULL,
            `register_date` date NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";


        $create[] .= "INSERT INTO `user` (`id`, `login`, `email`, `password`, `is_admin`, `is_active`, `allow_notifications`, `name`, `surname`, `username`, `register_date`) VALUES
        (16, 'tnorek21', 'tnorek21@gmail.com', 'tnorek21', 1, 1, 1, 'Tadeusz', 'Norek', 'tnorek21', '2022-06-20'),
        (18, 'userek01', 'userek@wp.pl', 'userek123', 0, 1, 1, 'Marek', 'Mostowiak', 'userek01', '2022-06-20'),
        (19, 'americano', 'usa@wp.pl', 'usausausa', 0, 1, 0, 'John', 'Moore', 'AmericanJohn', '2022-06-21'),
        (20, 'LukeSkywalker', 'luke@wp.pl', 'nohand123', 0, 1, 1, 'Luke', 'Skywalker', 'LukeSkywalker', '2022-06-21');";


        $create[] .= "ALTER TABLE `event`
        ADD PRIMARY KEY (`id`),
        ADD KEY `id_owner` (`id_owner`);";

        $create[] .= "ALTER TABLE `event_members`
        ADD KEY `event_id_fk` (`id_event`),
        ADD KEY `user_id_fk` (`id_user`);";

        $create[] .= "ALTER TABLE `logs`
        ADD PRIMARY KEY (`id`);";


        $create[] .= "ALTER TABLE `user`
        ADD PRIMARY KEY (`id`),
        ADD UNIQUE KEY `login` (`login`),
        ADD UNIQUE KEY `email` (`email`);";


        $create[] .= "ALTER TABLE `event`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;";


        $create[] .= "ALTER TABLE `logs`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;";

        $create[] .= "ALTER TABLE `user`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;";

        $create[] .= "ALTER TABLE `event`
        ADD CONSTRAINT `id_owner` FOREIGN KEY (`id_owner`) REFERENCES `user` (`id`) ON DELETE CASCADE;";

        $create[] .= "ALTER TABLE `event_members`
        ADD CONSTRAINT `event_id_fk` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`) ON DELETE CASCADE,
        ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;";

        $create[] .= "COMMIT;";

        return $create;
    }
}