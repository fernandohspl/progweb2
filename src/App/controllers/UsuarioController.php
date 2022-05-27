<?php

namespace App\Controllers;

use App\Models\Usuario;


class UsuarioController
{
    private static $instance;
    private $conexao;

    public static function getInstance(){

        if (self::$instance == null){
            self::$instance = new UsuarioController();
        }
        return self::$instance;
    }

    private function __construct(){
        $this->conexao = Conexao::getIntance();
    }


    public function inserir(Usuario $usuario){
        $sql = "INSERT INTO usuario (nome, telefone, email, senha) 
                VALUES (:nome,:telefone,:email,:senha)";
        $statement=$this->conexao->prepare($sql);
        $statement->bindValue(":nome", $usuario->getNome());
        $statement->bindValue(":telefone",$usuario->getTelefone());
        $statement->bindValue(":email",$usuario->getEmail());
        $statement->bindValue(":senha",$usuario->getSenha());




        return $statement->execute();
    }
    public  function listar(){
        $sql= "SELECT id, nome, email, telefone FROM usuario ORDER  BY nome";
        $statement =$this->conexao->query($sql,\PDO::FETCH_ASSOC);
        $retorno = array();
        foreach ($statement as $row){
           $retorno[] = $this->preencherUsuario($row);
        }
        return $retorno;
    }
    private function  preencherUsuario($row){
        $usuario = new  Usuario();
        $usuario->setId($row["id"]);
        $usuario->setNome($row["nome"]);
        $usuario->setEmail($row["email"]);
        $usuario->setTelefone($row["telefone"]);
        return $usuario;

    }
}
