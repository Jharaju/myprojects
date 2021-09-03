<?php
class test{
private $conn;
private $table;


    function __construct($table)
    {
      $this->table= $table;
      require_once "config.php";
      $con= new myConnection();
      $conn= $con->connect();
    }

public function sayHello(){
    return "hello";
}

function sayBye(){
    return "bye";
}

function __destruct()
{
    $conn= null;
}


}


?>