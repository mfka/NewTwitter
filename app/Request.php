<?php

namespace App;

use Src\Interfaces\ControllerInterface;

class Request
{

    public function setControllerParams(ControllerInterface $controller)
    {
        $this->setParams($controller);
    }

    private function setParams(ControllerInterface $controller)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET)) {
            $controller->setParams('get', $_GET);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST))
            $controller->setParams('post', $_POST);
    }
}