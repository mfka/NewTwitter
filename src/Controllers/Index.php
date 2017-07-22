<?php

namespace Src\Controllers;

use Src\Abstracts\AbstractController;

class Index extends AbstractController
{

    public function indexAction()
    {
//        $this->redirect('no-page');
        echo 'indexController';
    }

}

