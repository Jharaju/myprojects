<?php

class functions{
    private $id;
    private $message;
    private $where_from;
    private $where_to;
    private $conn;
    private $table;
    private $token;

public function __construct(){
    
    require "config2.php";
    $con= new database();
    $this->conn= $con->connection();
}
public function setTable($tabl){
    $this->table= $tabl;
}

public function select_admin($p){
    
    $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$q= "SELECT firstname, lastname, profile_pic FROM $this->table WHERE role= :rol";
$que= $this->conn->prepare($q);
$que->bindParam(':rol', $p);
$que->execute();
if($que->rowCount() > 0){
$result= $que->fetch();
return $result;
}
}

public function select_project(){
    
    $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$q= "SELECT * FROM $this->table ORDER BY id DESC";
$que= $this->conn->prepare($q);
$que->execute();
if($que->rowCount() > 0){
    $result= [];
while($res= $que->fetch()){
array_push($result, $res);
}
return $result;

}
}

public function selectCoverPic(){
    $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$q= "SELECT * FROM $this->table";
$que= $this->conn->prepare($q);
$que->execute();
if($que->rowCount() > 0){
    $result= [];
while($res= $que->fetch()){
    $arr= ['cpic' => $res['cover_pic']];
array_push($result, $arr);
}
return $result;

}
}

public function search_project($sear){
    $search= "%{$sear}%";
    $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$q= "SELECT * FROM $this->table WHERE title LIKE :srch";
$que= $this->conn->prepare($q);
$que->bindParam(':srch', $search);
$que->execute();
if($que->rowCount() > 0){
    $result= [];
while($res= $que->fetch()){
array_push($result, $res);
}
return $result;

}
}

public function updateToken($token, $id){
    $this->token= $token;
    $this->id= $id;
$q= "UPDATE $this->table SET token= :tok WHERE email= :ide";
$que= $this->conn->prepare($q);
$que->bindParam(':tok', $this->token);
$que->bindParam(':ide', $this->id);
$que->execute();
if($que){
    return "updated";
}
}

public function selectToken($id){
    $this->id= $id;
$q= "SELECT * FROM $this->table WHERE email= :ide";
$que= $this->conn->prepare($q);
$que->bindParam(':ide', $this->id);
$que->execute();
if($que->rowCount() == 1){
$result= $que->fetch();
return $result;
}
}





public function __destruct()
{
    $this->conn= null;
}


//     public function outgoing_messages($sid, $mid){
//     // $this->id = $i;
//     // $this->message = $m;
//     // $this->where_from =$wf;
//     // $this->where_to = $wt;
//     $userid= $sid;
//     if(isset($mid)){
//     $memberid= $mid;

//     $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// $q= "SELECT * FROM $this->table WHERE where_from= :uid && where_to= :mid ORDER BY time ASC";
// $que= $this->conn->prepare($q);
// $que->bindParam(':uid', $userid);
// $que->bindParam(':mid', $memberid);
// $que->execute();
// if($que->rowCount() > 0){
//     $messg= [];
//     while ($return= $que->fetch()) {
//         # code...
//         array_push($messg, $return['message']);
        
//     }
//     return json_encode($messg);
//     $conn= null;
// }else{$messg= []; json_encode($messg);}
//     }


// }

// public function incoming_messages($sid, $mid){
//     // $this->id = $i;
//     // $this->message = $m;
//     // $this->where_from =$wf;
//     // $this->where_to = $wt;
//     $userid= $sid;
//     if(isset($mid)){
//     $memberid= $mid;

//     $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// $q1= "SELECT * FROM $this->table WHERE where_from= :mid && where_to= :uid ORDER BY time ASC";
// $que1= $this->conn->prepare($q1);
// $que1->bindParam(':mid', $memberid);
// $que1->bindParam(':uid', $userid);
// $que1->execute();
// if($que1->rowCount() > 0){
//     $messg1= [];
//     while ($return= $que1->fetch()) {
//         # code...
//         array_push($messg1, $return['message']);
        
//     }
//     return json_encode($messg1);
//     $conn= null;
// }else{$messg1= []; json_encode($messg1);}
// }
//     }





}





?>