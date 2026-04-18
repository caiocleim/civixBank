<?php

class LoginController{
    public function loginPage(){
        require_once BASE_PATH . '/views/login/login.php';
        
    }

    public function checarLogin(){
        require_once BASE_PATH . '/app/controllers/DataBaseController.php';
        
        $usuarioDigitado = $_POST['conta'];
        $senhaDigitada = $_POST['senha'];


        $buscarUsuario = new DataBase();
        $dadosCliente = $buscarUsuario->buscarUsuario($usuarioDigitado,$senhaDigitada);

        if($dadosCliente !== null){
            
            if($dadosCliente['num_conta'] === $usuarioDigitado && password_verify($senhaDigitada,$dadosCliente['senha_hash'])){
               
            }else{
               
            }
            


        }



    }
}
