
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
                'msg' => 'You Must Create File'
            ];
            header("location: /mavisa/file");
        } else {
            require "app/views/book.view.php";
        }
    }
}
