<?php

class Bootstrap
{
    function __construct()
    {
        $url = explode('?', $_SERVER['REQUEST_URI']);
        $url = explode('/', rtrim($url[0], '/'));
        if (isset($url[1])) {
            $file = __DIR__ . '/../../controllers/' . ucfirst($url[1]) . 'Controller.php';
        } else {
            $file = __DIR__ . '/../../controllers/IndexController.php';
            $url[1] = 'Index';
        }
        if (file_exists($file)) {
            require_once $file;
            $controller = $url[1] . 'Controller';
            $controller = new $controller;
            if (isset($url[2])) {
                $action = $url[2] . 'Action';
                $controller->$action();
            } else {
                $controller->indexAction();
            }
        } else {
            echo('Controller ' . $url[1] . ' does not exits.');
        }

    }
}


