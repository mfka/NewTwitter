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

    /** @param $paramName string
     * @param $paramType string (get | post)
     * @return boolean | string
     */
    public function getParam($paramName = null, $paramType = 'GET')
    {
        $paramName = strtoUpper(trim($paramName));
        if (!in_array($paramType, self::REQUEST_METHODS)) {
            return false;
        }
        if (is_null($paramName)) {
            return $this->params[$paramType];
        }
        if (array_key_exists($paramName, $this->params[$paramType])) {
            return $this->params[$paramType][$paramName];
        }
        return false;
    }

    public function checkMethod(string $type = 'GET'): bool
    {
        return $_SERVER['REQUEST_METHOD'] === strtoupper($type);
    }
}