<?php

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url){
    case '/':
        require_once BASE_PATH . '/app/controllers/ViewController.php';

        $loginController = new ViewController();

        $loginController->loginPage();

        break;

    case '/check-login':
        require_once BASE_PATH . "/app/controllers/ErrorController.php";
        require_once BASE_PATH . "/app/controllers/LoginController.php";
        require_once BASE_PATH . "/app/controllers/ViewController.php";
        
        #autentica o usuario e configura a session
        $AuthLogin = new LoginController();
        $retorno = $AuthLogin->checarLogin();

        if($_SESSION['usuario-credenciais'] != NULL){
            $paginaCliente = new ViewController();
            $paginaCliente->paginaDoCliente();
        }else{
            $erro = new ErrorController();
            $erro->exibir($retorno);
        }
        break;

        case '/logout':
            session_unset();
            header("Location: /");
            break;
}