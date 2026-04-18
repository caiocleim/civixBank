<?php

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url){
    case '/login':
        require_once BASE_PATH . '/app/controllers/LoginController.php';

        $loginController = new LoginController();

        $loginController->loginPage();

        break;

    case '/check-login':
        require_once BASE_PATH . '/app/controllers/LoginController.php';

        $AuthLogin = new LoginController();

        $AuthLogin->checarLogin();
        break;
}