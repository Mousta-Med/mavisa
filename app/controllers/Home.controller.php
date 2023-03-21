
<?php

// require_once "app/models/User.class.php";


class homecontroller
{
    private $app;
    public function  bookpage()
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            require "app/views/book.view.php";
        } else {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'msg' => 'You Must Create File'
            ];
            header("location: /mavisa/file");
        }
    }
    public function  filepage()
    {
        if (!isset($_SESSION['user'])) {
            // require "app/views/updatefile.view.php";
            require "app/views/file.view.php";
        } else {
            require "app/views/file.view.php";
        }
    }
    public function  logout()
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'msg' => "You C'ant Logout"
            ];
            header("location: /mavisa/file");
        } else {
            session_destroy();
            header("location: /mavisa/file");
        }
    }
}
