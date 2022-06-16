<?php
require_once("../classes/abstracts/AbstractPage.php");
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


class RoutingService
{

    private static function getCurrentUri()
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
        $uri = '/' . trim($uri, '/');
        return $uri;
    }

    public static function route()
    {
        $base_url = self::getCurrentUri();
        $routes = explode('/', $base_url);
        foreach ($routes as $route) {
            if (!empty(trim($route)))
                array_push($routes, $route);
        }

        switch ($routes[1]) {
            case "":
                (new MainPage())->render();
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
                (new AdminPanelPage())->render();
                break;
            case "edit-profile":
                (new EditProfilePage())->render();
                break;
            case "my-events":
                (new MyEventsPage())->render();
                break;
            case "favourite-events":
                (new FavouriteEventsPage())->render();
                break;
            default:
                (new ErrorPage())->render();
        }
    }
}
