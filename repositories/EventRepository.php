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
}