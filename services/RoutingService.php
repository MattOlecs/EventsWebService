<?php

require_once("../classes/AbstractPage.php");
require_once("../classes/MainPage.php");
require_once("../classes/ErrorPage.php");

class RoutingService {

    private static function getCurrentUri() {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
        $uri = '/' . trim($uri, '/');
        return $uri;
    }

    public static function route() {
        $base_url = self::getCurrentUri();
        $routes = explode('/', $base_url);
        foreach($routes as $route) {
            if(!empty(trim($route)))
                array_push($routes, $route);
        }

        switch ($routes[1]) {
            case "":
                (new MainPage())->render();
                break;
            default:
                (new ErrorPage())->render();
        }
    }
}