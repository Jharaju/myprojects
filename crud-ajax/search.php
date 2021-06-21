<?php
require "conn.php";
$value= $_POST['value'];
$query= "SELECT * FROM user_datas WHERE name LIKE '%{$value}%' or email LIKE '%{$value}%' or id LIKE '%{$value}%'";
$result= mysqli_query($conn, $query) or die("Query failed");
if(mysqli_num_rows($result)>0){
    $output = "<table id='table' border='1' width='96%'><tr id='thead'>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>";
    while($row= mysqli_fetch_assoc($result)){
    $output.= "<tr id='tbody'>
    <td>{$row['id']}</td>
    <td>{$row['name']}</td>
    <td>{$row['email']}</td>
    <td><button id='edit_btn' data-eid='{$row['id']}'>Edit</button></td>
    <td><button id='delete_btn' data-did='{$row['id']}'>Delete</button></td>
    </tr>";
}
    $output.="</table>";
    echo $output;

}else{
    echo "No record found";
    }


?>