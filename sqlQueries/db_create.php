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
          (16, 20, 'star battle', 'pew pew ', '2022-06-25', '2022-06-21'),
          (18, 20, 'Motywator hipernapędu serii 503', 'Serdecznie zapraszamy wszystkich zainteresowanych na premierę najnowszego dzieła techniki. Nasz najnowszy motywator hipernapędu pozwoli wam osiągać prędkości o jakich jeszcze nie mieliście pojęcia. Jego największym osiągnięciem jest pokonanie trasy na Kessel w zawrotne 6 parseków.', '2020-07-20', '2022-06-20'),
          (19, 20, 'Wybuch gwiazdy śmierci', 'Mamy ogromną przyjemność zaprosić państwa do oglądania naszej próby ataku na odbudowaną, 3 Gwiazdę Śmierci. Prosimy o zabranie ze sobą ciepłego koca, ponieważ wydarzenie będzie dostępne do oglądania na nocnym niebie. W przypadku naszego niepowodzenia cała galaktyka zostanie zgubiona, dlatego zależy nam na waszym wsparciu! \r\nChwała rebelii!', '2022-08-10', '2022-06-20'),
          (20, 18, 'Wspólny seans : OBCY - 8. PASAŻER \"NOSTROMO\"', 'Zapraszamy na wspólny seans najlepszej (według nas) części serii o Obcym. Miejsce odbycia się wydarzenia to sala kinowa przy ulicy Pomorskiej. Przy wejściu proszę zapytać kustosza o darmowy kubek napoju ze śliny Predatora !', '2023-04-11', '2022-06-21');";

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
          (15, 16, '2022-06-21'),
          (16, 20, '2022-06-21'),
          (19, 16, '2022-06-21'),
          (18, 18, '2022-06-21'),
          (19, 18, '2022-06-21'),
          (20, 18, '2022-06-21'),
          (18, 20, '2022-06-21'),
          (19, 20, '2022-06-21'),
          (15, 20, '2022-06-21'),
          (20, 19, '2022-06-21'),
          (16, 19, '2022-06-21');";

        $create[] .= "CREATE TABLE `favorite_events` (
            `id_user` int(11) NOT NULL,
            `id_event` int(11) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
          ";

        $create[] .= "INSERT INTO `favorite_events` (`id_user`, `id_event`) VALUES
          (20, 16),
          (20, 14),
          (18, 13),
          (18, 11),
          (18, 16),
          (16, 19),
          (16, 11),
          (16, 14),
          (16, 20),
          (18, 19),
          (18, 18),
          (20, 18),
          (20, 19),
          (19, 19),
          (19, 13),
          (19, 15),
          (19, 14);";

        $create[] .= "CREATE TABLE `logs` (
            `id` int(11) NOT NULL,
            `id_user` int(11) NOT NULL,
            `login_datetime` datetime NOT NULL,
            `logout_datetime` datetime DEFAULT NULL,
            `logged_time` time DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        $create[] .= "INSERT INTO `logs` (`id`, `id_user`, `login_datetime`, `logout_datetime`, `logged_time`) VALUES
        (17, 20, '2022-06-21 19:55:32', '2022-06-21 19:56:20', '00:00:48'),
        (18, 18, '2022-06-21 19:56:41', '2022-06-21 19:57:54', '00:01:13'),
        (19, 16, '2022-06-21 19:58:01', '2022-06-21 19:58:41', '00:00:40'),
        (20, 18, '2022-06-21 19:58:49', '2022-06-21 20:01:54', '00:03:05'),
        (21, 20, '2022-06-21 20:02:04', '2022-06-21 20:04:27', '00:02:23'),
        (22, 16, '2022-06-21 20:04:33', '2022-06-21 20:05:07', '00:00:34'),
        (23, 18, '2022-06-21 20:05:12', '2022-06-21 20:05:47', '00:00:35'),
        (24, 20, '2022-06-21 20:05:56', '2022-06-21 20:06:36', '00:00:40'),
        (25, 19, '2022-06-21 20:07:23', '2022-06-21 20:07:49', '00:00:26'),
        (26, 16, '2022-06-21 20:07:56', '2022-06-21 20:08:07', '00:00:11');";


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

        $create[] .= "ALTER TABLE `favorite_events`
        ADD KEY `event_id_favorite_fk` (`id_event`),
        ADD KEY `user_id_favorite_fk` (`id_user`);";

        $create[] .= "ALTER TABLE `logs`
        ADD PRIMARY KEY (`id`);";

        $create[] .= "ALTER TABLE `user`
        ADD PRIMARY KEY (`id`),
        ADD UNIQUE KEY `login` (`login`),
        ADD UNIQUE KEY `email` (`email`);";

        $create[] .= "ALTER TABLE `event`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21";

        $create[] .= "ALTER TABLE `logs`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;";

        $create[] .= "ALTER TABLE `user`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;";

        $create[] .= "ALTER TABLE `event`
        ADD CONSTRAINT `id_owner` FOREIGN KEY (`id_owner`) REFERENCES `user` (`id`) ON DELETE CASCADE;";

        $create[] .= "ALTER TABLE `event_members`
        ADD CONSTRAINT `event_id_fk` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`) ON DELETE CASCADE,
        ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;";

        $create[] .= "ALTER TABLE `favorite_events`
        ADD CONSTRAINT `event_id_favorite_fk` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`) ON DELETE CASCADE,
        ADD CONSTRAINT `user_id_favorite_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;";

        $create[] .= "ALTER TABLE `logs`
        ADD CONSTRAINT `user_id_logs_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;";

        $create[] .= "COMMIT;";

        return $create;
    }
}