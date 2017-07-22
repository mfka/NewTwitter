<?php

namespace App;

class Routing
{
    /** @var $routes array */
    public $routes;

    public function __construct()
    {
        $this->setRoutes();
    }


    public function getRouteByUrl($url)
    {
        return $this->getRoute('url', $url);
    }

    private function setRoutes(): array
    {
        return $this->routes = [
            [
                'url' => '',
                'params' => '',
                'name' => 'home',
                'controller' => 'index',
                'action' => 'index'
            ],
            [
                'url' => '/user/edit',
                'params' => '',
                'name' => 'user-edit'
            ],
            [
                'url' => '/404',
                'params' => '',
                'name' => 'no-page',
                'controller' => 'noPage',
                'action' => 'index'
            ]
        ];
    }


    /**
     * @param string $routeName
     */
    public function redirect(string $routeName)
    {
        $route = $this->getRoute('name', $routeName);
        header('Location: ' . $route['url'], 301);
    }

    /**
     * @param string $key
     * @param string $value
     * @return array | false
     */
    private function getRoute(string $key, string $value)
    {
        $key = array_search($value, array_column($this->routes, $key));
        if ($key >= 0) {
            return $this->routes[$key];
        }
        return false;
    }

}