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

    public static function isUserRegisteredforEvent($eventId, $userId){
        $queryString = 
            "SELECT 1 FROM `eventmembers` 
            WHERE `event_id` = $eventId && `user_id` = $userId";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        $queryResult = $query->fetchAll(PDO::FETCH_ASSOC);

        return count($queryResult) > 0;
    }

    public static function registerUserForEvent($eventId, $userId){
        $queryString = 
            "INSERT INTO `eventmembers`
            (`event_id`,`user_id`) VALUES (?,?);";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        try {
            $query->execute([$eventId, $userId]);
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public static function unregisterUserFromEvent($eventId, $userId){
        $queryString = 
            "DELETE FROM `eventmembers`
            WHERE `event_id` = $eventId && `user_id` = $userId;";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        try {
            $query->execute();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public static function getNamesOfUsersRegisteredForEvent($eventId){
        $queryString = 
            "SELECT CONCAT(`first_name`, ' ', `last_name`) AS full_name FROM `user` 
            INNER JOIN (SELECT * FROM `eventmembers` WHERE `event_id` = $eventId) members 
            ON user_id = _id;";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}