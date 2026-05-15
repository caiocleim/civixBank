<?php



class AuthModel extends DataBase{


    public function __construct()
    {
        parent::__construct();
    }

    public function autenticarUsuario($num_conta, $senha){

        $sql = "SELECT * FROM usuario WHERE usuario.num_conta LIKE :num_conta AND usuario.senha LIKE :senha";
 
        $result = $this->consulta($sql, ['num_conta' => $num_conta, 'senha' => $senha], true);
        $resultado = $result->fetch(PDO::FETCH_ASSOC);
        
        if($result !== null){
            return $result;
        }else{
            return false;
        }
    }















}
