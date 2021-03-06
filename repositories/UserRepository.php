<?php

require_once('classes/DbConnection.php');

class UserRepository
{

    public static function getUser($id)
    {
        $queryString = "SELECT * FROM user WHERE id = :id";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->bindParam(":id", $id);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function getUsers()
    {
        $queryString = "SELECT * FROM `user`";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function insertUser($userArray)
    {
        $login = $userArray['login'];
        $email = $userArray['email'];
        $password = $userArray['password'];
        //password_hash($userArray['password'], PASSWORD_DEFAULT);
        $queryString =
            "INSERT INTO `user`
        (`id`, `login`, `email`, `password`, `is_admin`, `is_active`, `allow_notifications`, `name`, `surname`, `username`, `register_date`) VALUES (?,?,?,md5(?),?,?,?,?,?,?, NOW());";

        $db = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess();
        $query = $db->prepare($queryString);

        try {
            $db->beginTransaction();
            $query->execute([null, $login, $email, $password, 0, 1, 0, '', '', $login]);
            $id = $db->lastInsertId();
            $db->commit();
        } catch (PDOException $ex) {
            $db->rollBack();
            return $ex->getMessage();
        }
        return $id;
    }

    public static function insertAdmin($userArray)
    {
        $login = $userArray['login'];
        $email = $userArray['email'];
        $password = $userArray['password'];
        $queryString =
            "INSERT INTO `user`
        (`id`, `login`, `email`, `password`, `is_admin`, `is_active`, `allow_notifications`, `name`, `surname`, `username`, `register_date`) VALUES (?,?,?,md5(?),?,?,?,?,?,?, NOW());";

        $db = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess();
        $query = $db->prepare($queryString);

        try {
            $db->beginTransaction();
            $query->execute([null, $login, $email, $password, 1, 1, 1, '', '', $login]);
            $id = $db->lastInsertId();
            $db->commit();
        } catch (PDOException $ex) {
            $db->rollBack();
            return $ex->getMessage();
        }
        return $id;
    }

    public static function deleteUser($id)
    {
        $queryString = "DELETE FROM `user` WHERE `id` = $id;";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        try {
            $query->execute();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public static function userExists($login)
    {
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
            return md5($password) == $user['password'] ? $user['login'] : false;
        }
        return false;
    }

    public static function verifyStatus($id)
    {
        $queryString = "SELECT * FROM user WHERE id = :id";

        $db = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess();
        $query = $db->prepare($queryString);

        $query->bindParam(":id", $id);
        $query->execute();

        if ($query->rowCount() > 0) {
            $user = $query->fetch(PDO::FETCH_ASSOC);
            return 1 == $user['is_active'] ? $user['login'] : false;
        }
        return false;
    }

    public static function userIsAdmin($id)
    {
        $queryString = "SELECT is_admin FROM user WHERE id = :id";
        $db = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess();
        $query = $db->prepare($queryString);

        $query->bindParam(":id", $id);
        $query->execute();

        if ($query->rowCount() > 0) {
            $row = $query->fetch();
            if ($row['is_admin'] == 1) {
                return true;
            }
        } else
            return false;
    }

    public static function getUsersRegistered()
    {
        $queryString =
            "SELECT count(*) as users_registered FROM `user`;";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        return $query->fetch(PDO::FETCH_COLUMN);
    }

    public static function getUsersRegisteredToday()
    {
        $queryString =
            "SELECT count(*) as users_registered_today FROM `user` WHERE register_date = CURDATE();";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        return $query->fetch(PDO::FETCH_COLUMN);
    }

    public static function getUsersLogged()
    {
        $queryString =
            "SELECT count(*) as users_logged FROM `logs`;";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        return $query->fetch(PDO::FETCH_COLUMN);
    }

    public static function getUsersLoggedToday()
    {
        $queryString =
            "SELECT count(*) as users_logged_today FROM `logs` WHERE date(login_datetime) = CURDATE();";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute();

        return $query->fetch(PDO::FETCH_COLUMN);
    }

    public static function getAvgLoggedTime() {
        $queryString =
        "SELECT round(SEC_TO_TIME(AVG(TIME_TO_SEC(`logged_time`))), 2) from logs where logged_time is not null;";

    $query = DbConnection::getDatabaseInstance()
        ->getDatabaseAccess()
        ->prepare($queryString);

    $query->execute();

    return $query->fetch(PDO::FETCH_COLUMN);
    }

    public static function getMostOwnedEventsUserLogin() {
        $queryString =
        "select u.login, count(*) 
        from event as e 
        left join user as u 
        on e.id_owner = u.id 
        group by u.login 
        order by count(*) desc 
        limit 1;";

    $query = DbConnection::getDatabaseInstance()
        ->getDatabaseAccess()
        ->prepare($queryString);

    $query->execute();

    return $query->fetch(PDO::FETCH_COLUMN);
    }

    public static function getMostActiveUser() {
        $queryString =
        "select u.login, SEC_TO_TIME(sum(TIME_TO_SEC(`logged_time`))) as sum_logged_time
        from logs as l
        left join user as u
        on l.id_user = u.id
        where u.login is not null
        and l.logged_time is not null
        group by u.login
        order by sum_logged_time desc
        limit 1;";

    $query = DbConnection::getDatabaseInstance()
        ->getDatabaseAccess()
        ->prepare($queryString);

    $query->execute();

    return $query->fetch(PDO::FETCH_COLUMN);
    }

    public static function getLeastActiveUser() {
        $queryString =
        "select u.login, SEC_TO_TIME(sum(TIME_TO_SEC(`logged_time`))) as sum_logged_time
        from logs as l
        left join user as u
        on l.id_user = u.id
        where u.login is not null
        and l.logged_time is not null
        group by u.login
        order by sum_logged_time asc
        limit 1;";

    $query = DbConnection::getDatabaseInstance()
        ->getDatabaseAccess()
        ->prepare($queryString);

    $query->execute();

    return $query->fetch(PDO::FETCH_COLUMN);
    }

    public static function logLogin()
    {
        $queryString =
            "INSERT INTO `logs`
            (`id_user`, `login_datetime`) VALUES (?, NOW());";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        try {
            $query->execute([$_SESSION['id']]);
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public static function getCurrentSessionID()
    {
        if (isset($_SESSION['id'])){
            $queryString =
            "SELECT id from logs where id_user = ? order by login_datetime desc limit 1;";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        $query->execute([$_SESSION['id']]);

        return $query->fetch(PDO::FETCH_COLUMN);
        }
    }

    public static function logLogout()
    {
        echo "<script>console.log('logLogout');</script>";
        $currentSession = UserRepository::getCurrentSessionID();
        $queryString =
            "UPDATE `logs` 
            SET `logout_datetime`= NOW()
            ,`logged_time` = time(timediff(now(), (SELECT login_datetime FROM `logs` where id = ?))) WHERE id = ?;";

        $query = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess()
            ->prepare($queryString);

        try {
            echo "<script>console.log($currentSession);</script>";
            $query->execute([$currentSession, $currentSession]);
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public static function updateUser($id, $userArray)
    {
        $candidate_fields = ['name', 'surname', 'email', 'username', 'password', 'is_admin', 'is_active', 'allow_notifications'];
        $fields = array();
        $queryString = "UPDATE user SET ";

        foreach ($candidate_fields as $field) {
            if (isset($userArray[$field])) {
                $queryString = $queryString . $field . "=:$field, ";
                if (strlen($userArray[$field]) == 1) 
                    $fields[$field] = (int)$userArray[$field];
                else if ($field == 'password')
                    $fields[$field] = md5($userArray[$field]);
                else {
                    $fields[$field] = $userArray[$field];
                }
            }
        }
        $queryString = substr_replace($queryString, "", -2);
        $queryString = $queryString . ' WHERE id=' . $id;

        $db = DbConnection::getDatabaseInstance()
            ->getDatabaseAccess();
        $query = $db->prepare($queryString);

        try {
            $db->beginTransaction();
            $query->execute($fields);
            $lastId = $db->lastInsertId();
            $db->commit();
        } catch (PDOException $ex) {
            $db->rollBack();
            return $ex->getMessage();
        }
        return $lastId;
    }
}
