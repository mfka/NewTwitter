<?php

namespace App;

use App\Routing as Routing;

use Src\Abstracts\AbstractController;
use App\Request as Request;

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

    /** @var $model Model */
    private $model;

    /** @var  $controller AbstractController */
    private $controller;

    function __construct()
    {
        $this->setRouting();
        $this->setRequest();
        $this->setUrl();
        $this->setRoute();
        $this->dbConn();
        $this->initController();
        $this->dbConn(false);
    }


    private function initController()
    {
        $action = ($this->route['action'] ?: 'index') . 'Action';
        $controllerName = ucfirst($this->route['controller']) ?: 'Index';

        $controller = 'Src\\Controllers\\' . $controllerName . 'Controller';
        $this->controller = new $controller();
        if (!class_exists($controller) || !method_exists($this->controller, $action)) {
            $this->routing->redirect('no-page');
        }
        $this->request->setParams();
        call_user_func_array([$this->controller, 'setRouting'], [$this->routing]);
        call_user_func_array([$this->controller, 'setRequest'], [$this->request]);
        call_user_func([$this->controller, 'init']);
        call_user_func([$this->controller, $action]);
    }

    private function setRouting()
    {
        $this->routing = new Routing();
    }

    private function setRequest()
    {
        $this->request = new Request();
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

    private function dbConn(bool $open = true)
    {
        $this->model instanceof Model ?: $this->model = new Model();

        if ($open) {
            return $this->model->setConnection();
        } else {
            return $this->model->closeConnection();
        }
    }
}


