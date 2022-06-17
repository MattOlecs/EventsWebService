<?php

class UtilsRepository
{
    public static function login($id)
    {
        $_SESSION['id'] = $id;
        $_SESSION['isAdmin'] = UserRepository::userIsAdmin($id);
        UserRepository::logLogin();
    }

    public static function logout()
    {
        echo "<script>console.log('logout');</script>";
        UserRepository::logLogout();
        session_unset();
        session_destroy();
    }

    public static function getLoggedIn()
    {
        if (isset($_SESSION['id']))
            return $_SESSION['id'];
        else
            return 0;
    }

    public static function isAdmin()
    {
        if (isset($_SESSION['isAdmin']))
            return $_SESSION['isAdmin'];
        else
            return false;
    }
}