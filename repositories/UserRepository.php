<?php

require_once('../classes/DbConnection.php');

class UserRepository {

    public static function getUserInfo($id) {
        $queryString = "SELECT * FROM user WHERE _id = :id";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->bindParam(":id", $id);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}