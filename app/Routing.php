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

    /**
     * @param string $url
     * @return array | false
     */
    public function getRoute($url)
    {
        if (array_key_exists($url, $this->routes)) {
            return $this->routes[$url];
        }
        return false;
    }

    private function setRoutes(): array
    {
        return $this->routes = [
            '' => [
                'params' => '',
                'name' => 'Index',
                'controller' => 'index',
                'action' => 'index'
            ]
        ];
    }


}