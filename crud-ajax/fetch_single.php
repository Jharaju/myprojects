<?php  
require "conn.php";
$id= $_POST['id'];
$query= "SELECT * FROM user_datas WHERE id = '{$id}' ";
$result= mysqli_query($conn, $query) or die("query failed");
if(mysqli_num_rows($result)>0){
    $row= mysqli_fetch_assoc($result);
    $output= "<div> Name: <input type='text' value='{$row['name']}' id='ename' name='ename' autocomplete='off'/></td></div>
    <div> Email: <input type='text' value= '{$row['email']}' id='eemail' name='eemail' autocomplete='off'/></td></div>
    <div><input type='submit' value=Submit' name='esubmit' id='esubmit'/></div>
    
    <button id='close_modal'>x</button>";
    echo $output;
}else{
    echo "This record not found";
}



?>