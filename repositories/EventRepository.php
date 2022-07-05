<?php

require_once('classes/DbConnection.php');

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

    public static function doesEventExist($id)
    {
        $queryString = "SELECT 1 FROM `event` WHERE `id` = $id";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        $queryResult = $query->fetchAll(PDO::FETCH_ASSOC);

        return count($queryResult) > 0;
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
            (`id_event`,`id_user`, `join_date`) VALUES (?,?,NOW());";

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

    public static function getEventsCreated()
    {
        $queryString =
            "SELECT count(*) as events_created FROM `event`";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        return $query->fetch(PDO::FETCH_COLUMN);
    }

    public static function getEventsCreatedToday()
    {
        $queryString =
            "SELECT count(*) as events_created_today FROM `event` WHERE create_date = CURDATE();";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        return $query->fetch(PDO::FETCH_COLUMN);
    }

    public static function getEventsJoined()
    {
        $queryString =
            "SELECT count(*) as events_joined_today FROM `event_members`";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        return $query->fetch(PDO::FETCH_COLUMN);
    }

    public static function getEventsJoinedToday()
    {
        $queryString =
            "SELECT count(*) as events_joined_today FROM `event_members` WHERE join_date = CURDATE();";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        return $query->fetch(PDO::FETCH_COLUMN);
    }

    public static function getFavouriteEvents($userId){
        
        if ($userId == null){
            return;
        }

        $queryString = "SELECT `id_event` FROM `favorite_events` WHERE id_user = $userId";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        $queryResult = $query->fetchAll(PDO::FETCH_ASSOC);
        $result = array();

        foreach ($queryResult as $singleEvent){
            array_push($result, $singleEvent['id_event']);
        }

        return $result;
    }
    
    public static function getFavouriteEventsData($userId){
        $queryString = "SELECT id, id_owner, title, description, date, create_date 
            FROM `favorite_events` 
            INNER JOIN `event` ON `id_event` = `id`
            WHERE id_user = $userId";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function isFavouriteEvent($eventId, $userId){
        $queryString = "SELECT 1 FROM favorite_events WHERE id_event = $eventId AND id_user = $userId";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();
        $queryResult = $query->fetchAll(PDO::FETCH_ASSOC);

        return count($queryResult) > 0;
    }

    public static function addFavouriteEvent($eventId, $userId){
        $queryString = "INSERT INTO `favorite_events`
            (`id_user`, `id_event`) VALUES (?,?)";

        $query = DbConnection::getDatabaseInstance()
        ->getDatabaseAccess()
        ->prepare($queryString);

        try {
            $query->execute([$userId, $eventId]);
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public static function deleteFavouriteEvent($eventId, $userId){
        $queryString = "DELETE FROM `favorite_events` WHERE `id_event` = $eventId AND `id_user` =  $userId;";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        try {
            $query->execute();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public static function getUserCreatedEvents($userId)
    {
        $queryString = "SELECT * FROM `event` WHERE id_owner = $userId";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
