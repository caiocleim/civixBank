<?php 


class ErrorController{

    public function exibir($codigoDoErro){

        $mensagens = [

            '101' => 'Senha incorreta. Tente novamente'
        ];

        header("Location: /login?=" . $mensagens['101']);
    }




}



?>