<?php

class database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $databasename = "dbheavy";
    private $stmt;
    private $mapper;
    

    private function _construct(){
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->databasename;
            $this->mapper = new PDO($dsn, $this->username, $this->password);
            $this->mapper->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->mapper;
        } 
        catch (PDOException $th) {
            die("Could not connect" . $th->getMessage());
        }
    }
    public function selectiondata($sqlquery){
        return $result = $this->_construct()->query($sqlquery);

    }
    public function querystring($sql){
        return $this->stmt = $this->_construct()->prepare($sql);
    }
    public function dataCount(){
        return $this->stmt->rowCount() >0;
    }
    public function datafetching(){
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    // public function whileloop($datarow, $dataresult){
        // return $datarow = $dataresult->fetch(PDO::FETCH_ASSOC);
    // }
    public function passworddecryptor($normalppasword, $hashedpass){
        return password_verify($normalppasword, $hashedpass);
    }
    public function bind($param, $val, $type = null) {
        if(is_null($type))
        {
            switch(true){
                case $type == 1:
                    $type = PDO::PARAM_INT;
                break;
                case $type == 2:
                    $type = PDO::PARAM_BOOL;
                break;
                case $type == 3:
                    $type = PDO::PARAM_NULL;
                break;
                default;
                $type = PDO::PARAM_STR;
            }
        }
        return $this->stmt->bindParam($param, $val, $type);
    }

    public function execution(){
        return $this->stmt->execute();
    }
}