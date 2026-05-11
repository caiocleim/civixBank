<?php


class LoginController{

    public function checarLogin(){
        require_once BASE_PATH . "/app/models/Usuario.php";
        require_once BASE_PATH . "/app/controllers/ErrorController.php";

        $autenticarUsuario = new Usuario();
        $retorno = $autenticarUsuario->autenticarUsuario();

        return $retorno;

    }



}


?>
