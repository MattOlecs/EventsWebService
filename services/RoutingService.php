<?php
require_once("../classes/abstracts/AbstractPage.php");
require_once("../classes/abstracts/AbstractInstallerPage.php");
require_once("../classes/pages/BaseEventsPage.php");
require_once("../classes/pages/MainPage.php");
require_once("../classes/pages/MyEventsPage.php");
require_once("../classes/pages/FavouriteEventsPage.php");
require_once("../classes/pages/ErrorPage.php");
require_once("../classes/pages/AddEventPage.php");
require_once("../classes/pages/DeleteEventPage.php");
require_once("../classes/pages/EventDetailsPage.php");
require_once("../classes/pages/RegisterPage.php");
require_once("../classes/pages/LoginPage.php");
require_once("../classes/pages/LogoutPage.php");
require_once("../classes/pages/AdminPanelPage.php");
require_once("../classes/pages/EditProfilePage.php");
require_once("../classes/pages/DeleteUserPage.php");
require_once("../classes/pages/AboutPage.php");
require_once("../classes/pages/InstallerStepOnePage.php");
require_once("../classes/pages/InstallerStepTwoPage.php");
require_once("../classes/pages/InstallerStepThreePage.php");
require_once("../classes/pages/InstallerStepFourPage.php");

class RoutingService
{
    private static $isAdmin;

    public static function inject($value)
    {
        self::$isAdmin = $value;
    }

    private static function getCurrentUri()
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
        $uri = '/' . trim($uri, '/');
        return $uri;
    }

    private static function renderInstallerPage($step){
        switch ($step) {
            case 1:
                (new InstallerStepOnePage())->render();
                break;
            case 2:
                (new InstallerStepTwoPage())->render();
                break;
            case 3:
                (new InstallerStepThreePage())->render();
                break;
            case 4:
                (new InstallerStepFourPage())->render();
        }
    }

    public static function route()
    {
        $base_url = self::getCurrentUri();
        $routes = explode('/', $base_url);
        foreach ($routes as $route) {
            if (!empty(trim($route)))
                array_push($routes, $route);
        }

        $var = '';
        if (UtilsRepository::isAdmin()) {
            $var = 'true';
        } else {
            $var = 'false';
        }

        switch ($routes[1]) {
            case "":
                (new MainPage())->render();
                break;
            case "about":
                (new AboutPage())->render();
                break;
            case "add-event":
                (new AddEventPage())->render();
                break;
            case "delete-event":
                (new DeleteEventPage($routes[2]))->render();
                break;
            case "event-details":
                (new EventDetailsPage($routes[2]))->render();
                break;
            case "register":
                (new RegisterPage())->render();
                break;
            case "login":
                (new LoginPage())->render();
                break;
            case "logout":
                (new LogoutPage())->render();
                break;
            case "admin-panel":
                // if (UtilsRepository::isAdmin()) {
                //     (new AdminPanelPage())->render();
                // } else {
                //     (new MainPage())->render();
                // }
                (new AdminPanelPage())->render();
                break;
            case "edit-profile":
                (new EditProfilePage($routes[2]))->render();
                break;
            case "delete-user":
                (new DeleteUserPage($routes[2]))->render();
                break;
            case "crated-by-me-events":
                (new MyEventsPage())->render();
                break;
            case "favourite-events":
                (new FavouriteEventsPage())->render();
                break;
            case "installer":
                self::renderInstallerPage($routes[2]);
                break;
            default:
                (new ErrorPage())->render();
        }
    }

    public static function redirectToErrorPage(){
        header("Location: /error");
    }

    public static function redirectToInstallatorPage(){
        header("Location: /installer/1");
    }

    public static function isAtInstallerPage(){
        $base_url = self::getCurrentUri();
        $routes = explode('/', $base_url);
        foreach ($routes as $route) {
            if (!empty(trim($route)))
                array_push($routes, $route);
        }

        $var = '';
        if (UtilsRepository::isAdmin()) {
            $var = 'true';
        } else {
            $var = 'false';
        }

        return $routes[1] == "installer";
    }
}
