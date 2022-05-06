<?php
namespace App\Controllers;
class Conexao{
    private  static $instance;
    public  function getIntance(){
        if (self::$instance == null){
            $dns = DRIVER.':host=' .HOST.';dbname='.DBNAME;
            self::$instance = new \PDO($dns, USER,PASSWORD);
            self::$instance->getAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
    private function __construct(){
        $conexao=Conexao::$instance->getInstance();
    }
}
?>