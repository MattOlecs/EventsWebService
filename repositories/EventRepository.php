<?php

require_once('../classes/DbConnection.php');

class EventRepository
{

    public static function getEvents()
    {
        $queryString = "SELECT * FROM `event`";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getEvent($id)
    {
        $queryString = "SELECT * FROM `event` WHERE `id` = $id";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function insertEvent($values, $userId)
    {
        $title = $values['title'];
        $timestamp =  $values['date'] . " " . $values['time'];
        $description = $values['description'];

        $queryString =
            "INSERT INTO `event`
            (`id`, `id_owner`, `title`, `description`, `date`, `create_date`) VALUES (?,?,?,?,?,NOW());";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        try {
            $query->execute([null, $userId, $title, $description, $timestamp]);
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public static function deleteEvent($id)
    {
        $queryString = "DELETE FROM `event` WHERE `id` = $id;";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        try {
            $query->execute();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public static function isUserRegisteredforEvent($eventId, $userId)
    {
        $queryString =
            "SELECT 1 FROM `event_members` 
            WHERE `id_event` = $eventId && `id_user` = $userId";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        $queryResult = $query->fetchAll(PDO::FETCH_ASSOC);

        return count($queryResult) > 0;
    }

    public static function registerUserForEvent($eventId, $userId)
    {
        $queryString =
            "INSERT INTO `event_members`
            (`id_event`,`id_user`) VALUES (?,?);";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        try {
            $query->execute([$eventId, $userId]);
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public static function unregisterUserFromEvent($eventId, $userId)
    {
        $queryString =
            "DELETE FROM `event_members`
            WHERE `id_event` = $eventId && `id_user` = $userId;";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        try {
            $query->execute();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public static function getNamesOfUsersRegisteredForEvent($eventId)
    {
        $queryString =
            "SELECT `login` FROM `user` 
            INNER JOIN (SELECT * FROM `event_members` WHERE `id_event` = $eventId) members 
            ON id_user = id;";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
