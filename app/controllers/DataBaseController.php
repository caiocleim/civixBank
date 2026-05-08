<?php

class DataBase{

    public function conectar(){
        $env = parse_ini_file(BASE_PATH . '/.env');

        $server = $env['DB_HOST'];
        $banco = $env['DB_DATABASE'];
        $user = $env['DB_USER'];
        $senha = $env['DB_PASSWORD'];
        
        try{
            return new mysqli($server,$user,$senha,$banco);

        }catch(Exception $erro){
            echo $erro;
        }

    }

    public function buscarUsuario($usuarioDigitado){
        $conexao = $this->conectar();

        $sql = "SELECT * FROM usuario WHERE num_conta = ? LIMIT 1";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("s",$usuarioDigitado);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $dados = $resultado->fetch_assoc();

        if($dados !== null){
            return $dados;
        }else{
            header("Location: /login=?Erro");
        }
    }

    public function buscarDadosPessoais($num_conta){
        $conexao = $this->conectar();

        $sql = "SELECT * FROM cliente
        INNER JOIN usuario
        ON usuario.id = cliente.usuario_id
        WHERE usuario.num_conta LIKE ?";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("s",$num_conta);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $dados = $resultado->fetch_assoc();

        if($dados !== null){
            return $dados;
        }else{
            header("Location: /login=?Erro");
        }

    }


}


