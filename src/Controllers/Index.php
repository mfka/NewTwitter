<?php

namespace Src\Controllers;

use Src\Abstracts\AbstractController;

class Index extends AbstractController
{

    public function indexAction()
    {
        $this->render('index', ['user' => 'Marek']);
    }

}

