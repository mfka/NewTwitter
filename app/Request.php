<?php

namespace App;


class Request
{

    const REQUEST_METHODS = ['POST', 'GET'];
    /** @var  $params array */
    private $params;

    public function setParams()
    {
        if ($this->checkMethod() && isset($_GET)) {
            $this->params['GET'] = $_GET;
        } elseif ($this->checkMethod('POST') && isset($_POST))
            $this->params['POST'] = $_POST;
    }

    public function checkMethod(string $type = 'GET'): bool
    {
        return $_SERVER['REQUEST_METHOD'] === strtoupper($type);
    }

    public function query(string $paramName = ''): string
    {
        return $this->getParam($paramName);
    }

    /** @param $paramName string
     * @param $paramType string (get | post)
     * @return false | string | array
     */
    public function getParam(string $paramName = '', string $paramType = 'GET')
    {
        if (!in_array($paramType, self::REQUEST_METHODS)) {
            return false;
        }
        if (empty($paramName)) {
            return $this->params[$paramType];
        } elseif (array_key_exists($paramName, $this->params[$paramType])) {
            return $this->params[$paramType][$paramName];
        }
        return false;
    }

    public function request(string $paramName = ''): string
    {
        return $this->getParam($paramName, 'POST');
    }
}