<?php
session_start();
if(isset($_POST['mssg'])){
if(isset($_SESSION['mid'])){    
if(isset($_SESSION['id'])){
    if($_POST['mssg'] != ""){
    $msg= $_POST['mssg'];
    $uid= $_SESSION['id'];
    $to= $_SESSION['mid'];
        require "config.php";
$con= new myConnection();
$conn= $con->connect();
$time= date('Y-m-d').' '.time();
$showTime= date('d-m-Y h:i:s');
$sql= $conn->prepare("INSERT INTO messages(id, message, where_from, where_to, time, display_time) VALUES(:uid, :mssg, :frm, :too, :tim, :dtim)");
$sql->bindParam(':uid', $uid);
$sql->bindParam(':mssg', $msg);
$sql->bindParam(':frm', $uid);
$sql->bindParam(':too', $to);
$sql->bindParam(':tim', $time);
$sql->bindParam(':dtim', $showTime);
if($sql->execute()){
   echo "Message saved!";
   $conn= null;
}
}else{
    echo "You are not logged in!";
    $conn= null;
}
}
}
}


if(isset($_POST['setmid'])){
    $id= $_POST['setmid'] / 957315;
    //  / 957315
    $_SESSION['mid']= $id;
    if(isset($_SESSION['mid'])){
        echo "mid setted";
        echo $_SESSION['mid'];
    }
}




    if(isset($_SESSION['id'])){
// $_SESSION['mid']= $_POST['mbrid'];
if(isset($_SESSION['mid'])){

    require "config2.php";
    $con= new database();
    $conn= $con->connection();
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // $array= [];
    $userid= $_SESSION['id'];
    $memberid= $_SESSION['mid'];
    $q= "SELECT * FROM messages WHERE where_from= :uid && where_to= :mid || where_from= :smid && where_to= :suid ORDER BY time ASC";
    $que= $conn->prepare($q);
    $que->bindParam(':uid', $userid);
    $que->bindParam(':mid', $memberid);
    
    $que->bindParam(':smid', $memberid);
    $que->bindParam(':suid', $userid);
    
    $que->execute();
    if($que->rowCount() > 0){
        $output= [];    
    while ($result= $que->fetch()) {
        # code...
        array_push($output, $result);
        
        // $out= ['message' => $result['message'], 'time' => $result['time']];
        // array_push($output, $out);
    }
    // echo "<pre>";
        // print_r($output)."<br><br><br>";
        // exit();
        $output_size= sizeof($output);
        $lastMssg= $output_size - 1; 
        for ($i=0; $i < $output_size; $i++) { 
            # code...
            
                if($output[$i]['where_from'] === $userid && $output[$i]['where_to'] === $memberid){
                
                    echo $div1 = "<div class= 'outgoing'>".$output[$i]['message']."<p class= 'time'>".$output[$i]['display_time']."</p></div>";
                
            }
            
        
        if($output[$i]['where_from'] === $memberid && $output[$i]['where_to'] === $userid){
            
                echo $div1 = "<div class= 'incoming'>".$output[$i]['message']."<p class= 'time'>".$output[$i]['display_time']."</p></div>";

            
        }
        }
    
    






}
}
    }

// if(isset($_POST['document'])){
//     if($_POST['document'] === "true"){
      
//     }
//   }




?>