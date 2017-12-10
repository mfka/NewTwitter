<?php

namespace Src\Abstracts;

use App\Request;
use App\Routing;
use App\View;
use Src\Interfaces\ControllerInterface;

abstract class AbstractController implements ControllerInterface
{
    /** @var $routing Routing */
    public $routing;
    /** @var $request Request */
    public $request;
    /** @var $get array */
    protected $get;
    /** @var $post array */
    protected $post;
    /** @var $view View */
    protected $view;

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
        $this->routing = $routing;
    }

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function init()
    {
        $this->view = new View();
    }

    protected function redirect(string $routeName)
    {
        $this->routing->redirect($routeName);
    }

    protected function isPost()
    {
        return $this->request->checkMethod('POST');
    }

    protected function isGet()
    {
        return $this->request->checkMethod('GET');
    }

    protected function render(string $templateName = 'index', array $data = [], string $folder = null): void
    {
        if (!isset($folder)) {
            $folder = preg_replace('Action','',debug_backtrace()[1]['function']);
        }
        $template = $this->view->render($folder, $templateName, $data);
        if ($template) {
            echo $template;
        }
    }
}