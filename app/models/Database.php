<?php

class DataBase{

    public function conectar(){
        $env = parse_ini_file(BASE_PATH . '/.env');

        $server = $env['DB_HOST'];
        $banco = $env['DB_DATABASE'];
        $user = $env['DB_USER'];
        $senha = $env['DB_PASSWORD'];
        
        try{
            return new PDO("mysql:host=$server;dbname=$banco;charset=utf8",$user,$senha);

        }catch(Exception $erro){
            echo $erro;
        }

    }

    public function consulta($sql, $params = [], $notDie = false){
        $conexao = $this->conectar();

        if($notDie){
            $stmt = $conexao->prepare($sql);
            $stmt->execute($params);
            return $stmt;
            
        }else{
            try{    
                $stmt = $conexao->prepare($sql);
                $stmt->execute($params);
                return $stmt;
            }catch(Exception $erro){
                echo $erro;
            }
        }
    }

   




}

