<?php
/**
 * Created by PhpStorm.
 * User: bertin.dev
 * Date: 25/01/2021
 * Time: 07h46
 */

namespace app\config;
use \PDO;

class Database
{


    private $db_host1;
    private $db_name1;
    private $db_user1;
    private $db_pass1;
    private $pdo;
    private $db_type;

   //pgsql
    public function __construct($db_host, $db_name, $db_user, $db_pass, $db_type){
        $this->db_host1 = $db_host;
        $this->db_name1 = $db_name;
        $this->db_user1 = $db_user;
        $this->db_pass1 = $db_pass;
        $this->db_type = $db_type;
    }



    private function getPDO(){

        if($this->pdo === null){
            $pdo = new PDO($this->db_type.':host='.$this->db_host1.'; dbname='.$this->db_name1, $this->db_user1, $this->db_pass1);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }


    private function getPDOPgSQL(){

        if($this->pdo === null){
            $pdo = new PDO($this->db_type.':host='.$this->db_host1.'; dbname='.$this->db_name1, $this->db_user1, $this->db_pass1);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

    /*
       private function getPDOPgSQL(){
        if($this->pdo === null){
            $pdo = new PDO('pgsql:host='.$this->db_host1.';port=5432;dbname='.$this->db_name1, $this->db_user1, $this->db_pass1);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }
     */


    public function query($statement, $class_name = null, $one = false){
        $req = $this->getPDO()->query($statement);
        //$donnee = $req->fetchAll(PDO::FETCH_CLASS, $class_name );
        if(is_null($class_name))
        {
            $req->setFetchMode(PDO::FETCH_OBJ);
        }
        else
        {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }

        if($one){
            $donnee = $req->fetch();
        }
        else{
            $donnee = $req->fetchAll();
        }

        return $donnee;
    }


    public function query_pgsql($statement, $class_name = null, $one = false){
        $req = $this->getPDOPgSQL()->query($statement);
        //$donnee = $req->fetchAll(PDO::FETCH_CLASS, $class_name );
        if(is_null($class_name))
        {
            $req->setFetchMode(PDO::FETCH_OBJ);
        }
        else
        {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }

        if($one){
            $donnee = $req->fetch();
        }
        else{
            $donnee = $req->fetchAll();
        }

        return $donnee;
    }



    //RENVOI LE NOMBRE DE LIGNES D'UNE TABLE OU PLUSIEURS TABLES
    public function rowCount($statement){
        $req = $this->getPDO()->query($statement);
        $donnee = $req->rowCount();
        return $donnee;
    }





}