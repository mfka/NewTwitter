<?php

class TwittController extends Controller
{

    public function indexAction()
    {
        $twitts = Twitt::getAll();
        $this->view->arrTwitts = $twitts;
        $this->view->render('twitt/index');
    }

    public function addAction()
    {
        echo 'tutaj';
        if ($this->session->get('logged') === 0) {
            $this->view->message = 'Sorry you are not logged. Try again!';
            $this->view->render('index/index');
            exit;
        }

        $user = $this->session->get('user');

        if (!$user) {
            $this->view->message = 'Sorry user do not exits. Try again!';
            $this->view->render('index/index');
            exit;
        }

        if ($this->isPost()) {

            $strTwitt = trim($this->getValue('twitt'));

            if (strlen($strTwitt) > 160) {
                $this->view->message = 'Your twitt is to long!';
                $this->view->render('tiwtt/index');
            }

        }


    }

}