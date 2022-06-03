<?php

require_once('../classes/DbConnection.php');

class EventRepository {

    public static function getEvents() {
        $queryString = "SELECT * FROM `event`";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getEvent($id) {
        $queryString = "SELECT * FROM `event` WHERE `id` = $id";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function insertEvent($values) {
        
        $name = $values['name'];
        $date = '2022-05-31 18:00:00';
        $description = $values['description'];

        $queryString = 
        "INSERT INTO `event`.`event`
        (`id`,`name`,`date`,`description`,`creator_user_id`) VALUES (?,?,?,?,?);";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        try {
            $query->execute([null, $name, $date, $description, 1]);
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}