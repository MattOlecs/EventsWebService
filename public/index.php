<?php

require_once('../services/RoutingService.php');

if(file_exists("config/installer.php") && !RoutingService::isAtInstallerPage()){
    RoutingService::redirectToInstallatorPage();
}

RoutingService::route();