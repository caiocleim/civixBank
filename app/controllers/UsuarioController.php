<?php 

require_once BASE_PATH . "/app/models/Usuario.php";


class UsuarioController{

    public function index(){

    }


    public function save($id){

        $usuario = new Usuario();
        $usuario->save();

    }

    public function update($id){

        $usuario = new Usuario();
        $usuario->update();

    }
    

    public function delete($id){

        $usuario = new Usuario();
        $usuario->delete();

    }

    public function find($id){

        $usuario = new Usuario();
        $usuario->find($id);

    }

    


}



?>