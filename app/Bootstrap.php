<?php

namespace App;

use App\Routing as Routing;

use Src\Abstracts\AbstractController;
use App\Request;

class Bootstrap
{
    /** @var  $routing Routing */
    private $routing;

    /** @var  $request Request */
    private $request;

    /** @var $route array */
    private $route;

    /** @var  $url string */
    private $url;


    /** @var  $controller AbstractController */
    private $controller;

    function __construct()
    {
        $this->setRouting();
        $this->setRequest();
        $this->setUrl();
        $this->setRoute();
        $this->initController();
    }


    private function initController()
    {
        $action = ($this->route['action'] ?: 'index') . 'Action';
        $controllerName = ucfirst($this->route['controller']) ?: 'NoPage';

        $controller = 'Src\\Controllers\\' . $controllerName;

        $this->controller = new $controller();

        $this->request->setControllerParams($this->controller);
        call_user_func_array([$this->controller, 'setRouting'], [$this->routing]);

        call_user_func_array([$this->controller, $action], []);

    }

    private function setRouting()
    {
        $this->routing = new Routing();
    }

    private function setRequest()
    {
        $this->request = new \App\Request();
    }

    private function setUrl()
    {
        $url = explode('?', $_SERVER['REQUEST_URI']);
        $this->url = rtrim($url[0], '/');
    }

    private function setRoute()
    {
        return $this->route = $this->routing->getRouteByUrl($this->url);
    }
}


