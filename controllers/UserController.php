<?php

class UserController extends Controller
{
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
            $this->view->render('/user/index');

        } else {
            $this->redirect('index', 'index');
        }
    }

    public function loginAction()
    {

        if ($this->isPost()) {

            if (isset($_POST['email']) && isset($_POST['pass'])) {
                $email = trim($_POST['email']);
                $pass = md5(trim($_POST['pass']));
            }
            $user = User::login($email, $pass);

            if ($user) {
                $this->session->set('logged', 1);
                $this->session->set('user', $user);
                $this->redirect('twitt', 'index');
            } else {
                $this->view->message = "Your password or/and Email is invalid - try again";
                $this->view->render('index/index');
            }
        }
    }

    public function indexAction()
    {
        $user = $this->session->get('user');
        if (!$user) {
            $this->redirect('index', 'index');
        }
        $this->view->user = $user;
        $this->view->render('user/index');
    }

    public function logoutAction()
    {
        $this->session->delete('logged');
        $this->session->delete('user');
        $this->view->message = "Logout successfully";
        $this->redirect('index', 'index');
    }
}