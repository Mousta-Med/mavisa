<?php
session_start();

require_once "app/controllers/Home.controller.php";
$homecontroller = new homecontroller;

if (empty($_GET['page'])) {
    require "app/views/home.view.php";
} else {
    $page = rtrim($_GET['page'], '/');
    $URL = explode('/', filter_var($page), FILTER_SANITIZE_URL);

    switch ($URL[0]) {
        case "read":
            require "app/controllers/read.api.php";
            break;
        case "single_read":
            require "app/controllers/single_read.api.php";
            break;
        case "create":
            require "app/controllers/create.api.php";
            break;
        case "booking":
            require "app/controllers/booking.api.php";
            break;
        case "update":
            require "app/controllers/update.api.php";
            break;
        case "delete":
            require "app/controllers/delete.api.php";
            break;
        case "home":
            require "app/views/home.view.php";
            break;
        case "file":
            $homecontroller->filepage();
            break;
        case "login":
            require "app/controllers/login.api.php";
            break;
        case "logout":
            $homecontroller->logout();
            break;
        case "book":
            $homecontroller->bookpage();
            break;
        default:
            require "app/views/404.view.php";
            break;
    }
}
