<?php 
require "conn.php";
$id= $_POST['id'];
$name= $_POST['name'];
$email= $_POST['email'];
$query= "UPDATE user_datas SET name = '{$name}', email = '{$email}' WHERE id='{$id}'";
$result= mysqli_query($conn, $query) or die("query failed");
if($result){
    echo 1;
}else{
    echo 0;
}