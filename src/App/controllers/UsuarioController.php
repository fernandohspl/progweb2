<?php

namespace App\Controllers;

use App\Models\Usuario;

class UsuarioController
{
    private static $instance;
    private $conexão;

    public static function getInstance(){

        if (self::$instance == null){
            self::$instance = new UsuarioController();
        }
        return self::$instance;
    }

    private function __construct(){
        $this->conexão = Conexao::getIntance();
    }


    public function inserir(Usuario $usuario){
        $sql = "INSERT INTO usuario (nome, telefone, email, senha) VALUES (";
        $sql .= "'" . $usuario->getNome()        . "', ";
        $sql .= "'" . $usuario->getTelefone()    . "', ";
        $sql .= "'" . $usuario->getEmail()       . "', ";
        $sql .= "'" . $usuario->getSenha()    . "'";
        $sql .= ")";

        $this->conexão->query($sql);
        return $sql;
    }
}
