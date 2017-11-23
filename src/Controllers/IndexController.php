<?php

namespace Src\Controllers;

use Src\Abstracts\AbstractController;
use Src\Model\Twitt;

class IndexController extends AbstractController
{
    public function indexAction(): void
    {
        $twits = Twitt::getAll();
        $this->render('index', ['twits' => $twits]);
    }
}

