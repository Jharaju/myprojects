<?php
require 'conn.php';
$limit= "10";
$page= "";
if(isset($_POST['page_no'])){
    $page= $_POST['page_no'];
}else{
    $page= '1';
}
$offset= ($page - 1) * $limit;

$query= "SELECT * FROM user_datas LIMIT {$offset},{$limit}";
if($conn){
    $result= mysqli_query($conn, $query) or die("query failed");
    if(mysqli_num_rows($result)>0){
           $output = "<table id='table' border='1' width='96%'><tr id='thead'>
           <th>Id</th>
           <th>Name</th>
           <th>Email</th>
           <th>Edit</th>
           <th>Delete</th>
           </tr>";
        
               $sn= ($page - 1) * $limit + 1;
               
           while($row= mysqli_fetch_assoc($result)){
            $output.= "<tr id='tbody'>
            <td>{$sn}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td><button id='edit_btn' data-eid='{$row['id']}'>Edit</button></td>
            <td><button id='delete_btn' data-did='{$row['id']}'>Delete</button></td>
            </tr>";
            
            $sn++;
        }
            $output.= "</table>";
            $output.= "<div id= 'pagination'>";
            $query2= "SELECT * FROM user_datas";
            $result2= mysqli_query($conn, $query2) or die("Query2 failed");
            $total_record= mysqli_num_rows($result2);
            $total_page= ceil($total_record / $limit);
            if($page>= 2){
                $npage= ($page - 1);
                $output.= "<a id= '{$npage}' href= '#'>Prev..</a>";
            }
            
            for($i= 1; $i <= $total_page; $i++){
                if($i == $page){
                    $class_name= "active";
                }else{$class_name= ""; }

                $output.= "<a class= '{$class_name}' id= '{$i}' href= '#'>{$i}</a>";

            };
            if($page < $total_page){
                $npage= ($page + 1);
                $output.= "<a id= '{$npage}' href= '#'>Next..</a>";
            }
            
            $output.= "</div>";
            echo $output;
            echo $page;


            }else{
                echo "No result found";
         }
         mysqli_close($conn);
        }

    

?>