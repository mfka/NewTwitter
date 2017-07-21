<?php

namespace Src\Controllers;

use Src\Abstracts\AbstractController;

class Index extends AbstractController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        echo 'indexController';
    }

}

