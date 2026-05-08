<?php


class LoginController{

    public function checarLogin(){
        require_once BASE_PATH . "/app/models/Usuario.php";

        $autenticarUsuario = new Usuario();
        $dados = $autenticarUsuario->checarLogin();

        if($dados == NULL){
            return;
        }
    }



}


?>
