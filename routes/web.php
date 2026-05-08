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
        

        try{
            #autentica o usuario e configura a session
            $AuthLogin = new LoginController();

            $AuthLogin->checarLogin();
        }catch(Exception $erro){
            $indiceErros = new ErrorController();
            $indiceErros->exibir($erro);
        }

        if($_SESSION['usuario-credenciais'] != NULL){
            $paginaCliente = new ViewController();
            $paginaCliente->paginaDoCliente();
        }else{
            echo "Erro";
        }
        break;

        case '/logout':
            session_unset();
            header("Location: /");
            break;
}