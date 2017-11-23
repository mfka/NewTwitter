<?php

namespace Src\Controllers;

use Src\Abstracts\AbstractController;
use User;

class UserController extends AbstractController
{

    public function indexAction()
    {
        $this->isLogged();

        $this->view->user = $this->user;
        $this->view->render('user/index');
    }

    public function isLogged()
    {
        if (!$this->user) {
            $this->redirect('index', 'index');
        }
    }

    public function registerAction()
    {
        if ($this->isPost()) {
            if (isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['name'])) {
                $email = trim($_POST['email']);
                $pass = md5(trim($_POST['pass']));
                $surname = trim($_POST['surname']);
                $name = trim($_POST['name']);
            }
        }
        $user = User::create($name, $email, $pass, $surname);
        if ($user) {
            $this->session->set('logged', 1);
            $this->session->set('user', $user);
            $this->view->user = $user;
        }
        $this->redirect('index', 'index');
    }

    public function loginAction()
    {
        if ($this->isPost()) {
            $email = trim($this->request->request('email'));
            $pass = trim($this->request->request('pass'));
            if (!is_null($email) && !is_null($pass)) {
                $user = User::login($email, $pass);
                exit(var_dump($email, $pass, $user));
                if ($user instanceof User) {
                    $this->session->set('logged', 1);
                    $this->session->set('user', $user);
                    $this->redirect('twitt', 'index');
                }
            }
            $this->view->message = "Your password or/and Email is invalid - try again";
            $this->view->render('index/index');
        }
        $this->view->message = "Method is not allowed";
        $this->view->render('index/index');
    }

    public function twittsAction()
    {
        $this->isLogged();

        $twitts = Twitt::getByUserId($this->user->id);

        $this->view->arrTwitts = $twitts;

        $this->view->render('user/twitts');

    }

    public function logoutAction()
    {
        $this->session->delete('logged');
        $this->session->delete('user');
        $this->view->message = "Logout successfully";
        $this->redirect('index', 'index');
    }

    public function editAction()
    {
        var_dump('jest');
        exit;
    }

    public function deleteAccountAction()
    {

        if ($this->isPost()) {


            $pass = $this->getValue('pass');
            if ($pass) {
                $checkedPass = User::checkPass($this->user->id, $pass);
                var_dump($checkedPass);
                exit;
            }
        }
        $this->redirect('user', 'index');
    }
}