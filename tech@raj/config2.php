<?php

class database {
    private $host= 'localhost';
    private $dbName= 'myprofile';
    private $user= 'root';
    private $pass= '';

    public function connection(){
    try{
        $conn= new PDO('mysql:host=' .$this->host.'; dbname='.$this->dbName, $this->user, $this->pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;

    }catch(PDOException $e){
        echo "Database Error".$e->getMessage();
    }

}

}
?>