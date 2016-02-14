<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 18/01/2016
 * Time: 21:06
 */
namespace ModernWays\Webshop\Controller;

class Admin extends \ModernWays\Mvc\Controller
{
    public function index()
    {
        return $this->view('Admin', 'Index', null);
    }

    public function loggingIn()
    {
        $model = null;
        return $this->view('Admin', 'LoggingIn', $model);
    }

    public function login()
    {
        $provider = new \ModernWays\AnOrmApart\Provider('IdentityOVH', $this->noticeBoard);
        $model = new \ModernWays\Identity\Model\User($this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\User($model, $provider);
        // username typed in by user
        $userNameInput = filter_input(INPUT_POST, 'User-UserName', FILTER_SANITIZE_STRING);
        // password typed in by user
        $userPasswordInput = filter_input(INPUT_POST, 'User-Password', FILTER_SANITIZE_STRING);

        $authentication = new \ModernWays\Identity\Authentication($this->noticeBoard,
            new \ModernWays\Identity\Session($this->noticeBoard), $dal);
        $authentication->login($userNameInput, $userPasswordInput);
        return $this->view('Admin','Index', null);
    }

    public function logout()
    {
        $session = new \ModernWays\Identity\Session($this->noticeBoard);
        $session->end();
        return $this->view('Admin','Index', null);
    }
}