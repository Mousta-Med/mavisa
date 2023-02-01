<?php

require_once "app/controllers/Home.controller.php";

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
            $iod = $URL[1];
            if (empty($iod)) {
                require "app/views/404.view.php";
            } else {
                require "app/controllers/single_read.api.php";
            }
            break;
        case "create":
            require "app/controllers/create.api.php";
            break;
        case "update":
            require "app/controllers/update.api.php";
            break;
        case "delete":
            require "app/controllers/delete.api.php";
            break;
        default:
            require "app/views/404.view.php";
            break;
    }
}
