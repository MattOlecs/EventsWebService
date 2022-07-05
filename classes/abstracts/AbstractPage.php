<?php

require_once('services/RenderingService.php');
require_once('repositories/UserRepository.php');
require_once('repositories/UtilsRepository.php');

abstract class AbstractPage
{
    private $loginInfo;

    public function __construct()
    {
        session_start();
        $this->refreshStatus();
    }

    public function setTitle($title)
    {
        RenderingService::inject('title', $title);
    }

    public function refreshStatus()
    {
        $this->loginInfo = UtilsRepository::getLoggedIn();
        RenderingService::inject('loginInfo', $this->loginInfo);
        RoutingService::inject(UtilsRepository::isAdmin());

        $var = '';
        if (UtilsRepository::isAdmin()) {
            $var = 'true';
        } else {
            $var = 'false';
        }
        echo "<script>console.log('AbstractPage: $var');</script>";
    }

    public function getLoginInfo()
    {
        return $this->loginInfo;
    }

    public function isAdmin()
    {
        return $this->isAdmin;
    }

    public abstract function render();
}
