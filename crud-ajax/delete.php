<?php 
require "conn.php";
$id= $_POST['id'];
$query= "DELETE FROM user_datas WHERE id='{$id}'";
$result= mysqli_query($conn, $query) or die("query failed");
if($result){
   echo 1;
}else{
    echo 0;
}



?>