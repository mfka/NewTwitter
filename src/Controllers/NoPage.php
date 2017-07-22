<?php
/**
 * Created by PhpStorm.
 * User: mfka
 * Date: 21.07.17
 * Time: 21:41
 */

namespace Src\Controllers;

use Src\Abstracts\AbstractController;

class NoPage extends AbstractController
{
    public function indexAction()
    {
        echo 'NoPage';
    }
}