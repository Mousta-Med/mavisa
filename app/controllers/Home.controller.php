
<?php

// require_once "app/models/User.class.php";


class homecontroller
{
    private $app;
    public function  bookpage()
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'msg' => 'You Must Create File or login'
            ];
            header("location: /mavisa/file");
        } else {
            require "app/views/book.view.php";
        }
    }
    public function  loginpage()
    {
        if (isset($_SESSION['user'])) {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'msg' => 'you already logged in'
            ];
            header("location: /mavisa/file");
        } else {
            require "app/views/login.view.php";
        }
    }
}
