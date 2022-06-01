<?php

require_once('../classes/DbConnection.php');

class UserRepository {

    public static function getUserInfo($id) {
        $query = "SELECT * FROM user WHERE _id = :id";

        $stmt = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}