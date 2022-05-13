<?php

namespace App\Controllers;

use App\Models\Usuario;
use mysql_xdevapi\Statement;

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
        $sql = "INSERT INTO usuario (nome, telefone, email, senha) 
                VALUES (:nome,:telefone,:email,:senha)";
        $statement=$this->conexão->prepare($sql);
        $statement->bindValue(":nome", $usuario->getNome());
        $statement->bindValue(":telefone",$usuario->getTelefone());
        $statement->bindValue("email",$usuario->getEmail());
        $statement->bindValue(":senha",$usuario->getSenha());




        return $statement->execute();
    }
    public  function listar(){
        $sql= "SELECT * FROM usuasrio ORDER  BY nome";
        $statement =$this->conexão->query($sql,\POD::FETCH_ASSOC);
        foreach ($statement as $row){
           var_dump[$row];{}
        }
    }
    public function  preencherUsuario($row){
        $usuario = new  Usuario();
        $usuario->setId($row["id"]);
        $usuario->setNome($row["nome"]);
        $usuario->setEmail(["email"]);
        $usuario->setTelefone($row["telefone"]);


    }
}
