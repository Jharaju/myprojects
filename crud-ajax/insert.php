<?php
$name = $_POST['name'];
$email= $_POST['email'];

require 'conn.php';
    $query= "INSERT INTO user_datas (name, email) VALUES ('{$name}', '{$email}')";
    if(mysqli_query($conn, $query)){
        echo 1;
    }else{
        echo 0;
    }
    



?>