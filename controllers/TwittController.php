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

            if (strlen($strTwitt) > 160 || strlen($strTwitt) == 0) {
                $this->view->message = 'sorry, Your twitt is more then 160 marks or have 0 marks!';
            }

            Twitt::create($user->id, $strTwitt);
        }

        $this->indexAction();

    }

}