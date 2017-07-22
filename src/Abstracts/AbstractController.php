<?php

namespace Src\Abstracts;

use App\Routing;
use App\View;
use Src\Interfaces\ControllerInterface;

abstract class AbstractController implements ControllerInterface
{

    /** @var $get array */
    protected $get;

    /** @var $post array */
    protected $post;

    /** @var $view View */
    protected $view;

    /** @var $routing Routing */
    public $routing;

    public function setParams(string $type = 'get', array $params)
    {
        switch ($type) {
            case 'get':
                $this->get = $params;
                break;
            case 'post':
                $this->post = $params;
                break;
        }
    }

    public function setRouting(Routing $routing)
    {
        $this->routing = new Routing();
    }

    protected function redirect(string $routeName)
    {
        $this->routing->redirect($routeName);
    }


//    protected function redirect(string $controller = 'index', string $action = 'index')
//    {
//        $controller = ucfirst($controller);
//        $action .= 'Action';
//        if ($controller == 'index' && $action = 'index') {
//            header('Location: /');
//        } else {
//            header('Location: /' . $controller . '/' . $action, 301);
//        }
//        exit;
//    }
//
//
//    public function isGet()
//    {
//        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//            return true;
//        } else {
//            return false;
//        }
//    }
//
//    public function isPost()
//    {
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            return true;
//        } else {
//            return false;
//        }
//    }
//
//    public function getValue($name = FALSE)
//    {
//        switch ($name) {
//            case isset($_POST[$name]):
//                $value = $_POST[$name];
//                return $value;
//                break;
//            default:
//                return False;
//                break;
//        }
//    }
//
//    public function getValues()
//    {
//        if (isset($_POST)) {
//            return $_POST;
//        } else {
//            return false;
//        }
//    }
//
//    public function getParams()
//    {
//        if (isset($_GET)) {
//            return $_GET;
//        } else {
//            return false;
//        }
//    }
//
//    public function getParam($name = FALSE)
//    {
//        switch ($name) {
//            case isset($_GET[$name]):
//                $value = $_GET[$name];
//                return $value;
//                break;
//            default:
//                return FALSE;
//                break;
//        }
//    }
//
//    public function getRequest()
//    {
//        if (isset($_GET)) {
//            $arrRequest = explode('/', $_GET['request']);
//            $arrKey = array('controller', 'action');
//            $arrRequest = array_combine($arrKey, $arrRequest);
//            return $arrRequest;
//        } else {
//            return FALSE;
//        }
//    }
//
//    public function getController()
//    {
//        $arrRequest = $this->getRequest();
//        if (isset ($arrRequest['controller'])) {
//            return $arrRequest['controller'];
//        } else {
//            return FALSE;
//        }
//    }
//
//    public function getAction()
//    {
//        $arrRequest = $this->getRequest();
//        if (isset ($arrRequest['action'])) {
//            return $arrRequest['action'];
//        } else {
//            return FALSE;
//        }
//    }
}