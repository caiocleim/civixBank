<?php 


class ErrorController{

    public function exibir($codigo){

        $mensagens = [

            '101' => 'Senha incorreta. Tente novamente'
        ];

        header("Location: /login?=" . $codigo);
    }




}



?>