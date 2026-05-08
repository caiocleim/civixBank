<?php



class LoginController{
    

    public function checarLogin(){
        require_once BASE_PATH . '/app/controllers/DataBaseController.php';
        
        $usuarioDigitado = $_POST['conta'];
        $senhaDigitada = $_POST['senha'];


        $buscarUsuario = new DataBase();
        $dadosCliente = $buscarUsuario->buscarUsuario($usuarioDigitado);

        $buscarDadosPessoais = new DataBase();
        $dadosPessoais = $buscarDadosPessoais->buscarDadosPessoais($dadosCliente['num_conta']);


        if($dadosCliente !== null){
            
            if($dadosCliente['num_conta'] === $usuarioDigitado && password_verify($senhaDigitada,$dadosCliente['senha_hash'])){
                session_start();
                $_SESSION['usuario-credenciais'] = $dadosCliente;
                $_SESSION['dados-pessoais'] = $dadosPessoais;
                return;
            }else{
               return 1;
            }
            


        }



    }
}
