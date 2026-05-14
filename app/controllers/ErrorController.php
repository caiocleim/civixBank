<?php 


class ErrorController{

    public function exibir($urlAtual,$codigoDoErro){

        $mensagens = [

            [
                "codigo" => "101",
                "mensagem" => "Login e senha incorretos, verifique suas credenciais."
            ],
        ];


        foreach($mensagens as $erro){
            if($codigoDoErro == $erro['codigo']){
                header("Location: " . $urlAtual . "?ErrorPage=" . $erro['codigo'] . "&msgError=" . $erro['mensagem']);

            }
        }

    }




}



?>