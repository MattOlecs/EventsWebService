<?php

require_once('../classes/DbConnection.php');

class UserRepository {

    public static function getUser($id) {
        $queryString = "SELECT * FROM user WHERE id = :id";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->bindParam(":id", $id);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function insertUser($userArray)
    {
        $login= $userArray['login'];
        $email = $userArray['email'];
        $password = $userArray['password'];
        //password_hash($userArray['password'], PASSWORD_DEFAULT);
        $queryString = 
        "INSERT INTO `events`.`user`
        (`id`,`login`,`email`,`password`,`is_admin`,`is_active`,`allow_notifications`) VALUES (?,?,?,?,?,?,?);";

        $db = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess();
        $query = $db->prepare($queryString);
        
        try {
            $db->beginTransaction();
            $query->execute([null, $login, $email, $password, 0, 1, 1]);
            $id = $db->lastInsertId();
            $db->commit();
        } catch (PDOException $ex) {
            $db->rollBack();
            return $ex->getMessage();
        }
        return $id;
    } 

    public static function userExists($login){
        $queryString = "SELECT * FROM user WHERE login = :login";

        $db = DbConnection::getDatabaseInstance()
        ->getDatabaseAccess();
        $query = $db->prepare($queryString);

        $query->bindParam(":login", $login);
        $query->execute();

        if ($query->rowCount() > 0)
            return $query->fetchColumn();
        else
            return 0;
    }

    public static function verifyUser($id, $password)
    {
        $queryString = "SELECT login, password FROM user WHERE id = :id";

        $db = DbConnection::getDatabaseInstance()
        ->getDatabaseAccess();
        $query = $db->prepare($queryString);

        $query->bindParam(":id", $id);
        $query->execute();

        if ($query->rowCount() > 0) {
            $user = $query->fetch(PDO::FETCH_ASSOC);
            return $password == $user['password'] ? $user['login'] : false;
        }
        return false;
    }
}