<?php


class ViewController{

    public function loginPage(){
        require_once BASE_PATH . '/views/login/login.php';
        
    }

    public function paginaDoCliente(){
        require_once BASE_PATH . '/views/cliente/painelCliente.php';
    }




}