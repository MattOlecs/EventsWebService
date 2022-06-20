<?php

require_once('../services/RoutingService.php');

if(file_exists("config/installer.php")){
    RoutingService::redirectToInstallatorPage();
    return;
}

RoutingService::route();