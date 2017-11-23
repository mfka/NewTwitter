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


    private function setRoutes(): array
    {
        return $this->routes = [
            [
                'url' => '',
                'name' => 'home',
                'controller' => 'index',
                'action' => 'index'
            ],
            [
                'url' => '/user/edit/(\d+)',
                'name' => 'user-edit',
                'controller' => 'user',
                'action' => 'edit',
            ],
            [
                'url' => '/404',
                'name' => 'no-page',
                'controller' => 'noPage',
                'action' => 'index'
            ],
            [
                'url' => '/user/login',
                'name' => 'user-login',
                'controller' => 'user',
                'action' => 'login',

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
        return;
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

    public function getRouteByUrl(string $uri)
    {
        $paths = array_column($this->routes, 'url');
        foreach ($paths as $index => $path) {
            preg_match_all('#^' . $path . '$#', $uri, $matches, PREG_OFFSET_CAPTURE);
            if (!empty($matches[0])) {
                return $this->routes[$index];
            }
        }
        return false;
    }

}
