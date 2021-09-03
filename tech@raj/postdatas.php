<?php  
session_start();

if(isset($_POST['uname'])){
$fname= $_POST['uname'];
$lname= $_POST['ulname'];
$email= $_POST['uemail'];
$pass= password_hash($_POST['upass'], PASSWORD_BCRYPT);

require "config.php";
$con= new myConnection();
$conn= $con->connect();
$sql1= $conn->prepare("SELECT * FROM profile_users WHERE email = :eml");
$sql1->bindParam(':eml', $email);
$sql1->execute();
if($sql1->rowCount() > 0){
    echo "User already exists!";
}else{
$sql= $conn->prepare("INSERT INTO profile_users(firstname, lastname, email, pass) VALUES(:fnm, :lnm, :eml, :pss)");
$sql->bindParam(':fnm', $fname);
$sql->bindParam(':lnm', $lname);
$sql->bindParam(':eml', $email);
$sql->bindParam(':pss', $pass);
if($sql->execute()){
    echo "Registration Successful";
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$q2= "SELECT * FROM profile_users WHERE email = :eml";
$sql2= $conn->prepare($q2);
$sql2->bindParam(':eml', $email);
$sql2->execute();
if($sql2->rowCount() == 1){
    $result= $sql2->fetch();
$_SESSION['id'] = $result['id'];
$_SESSION['firstname'] = $result['firstname'];
}
$conn= null;
}else{$conn= null; echo "Registration Failed";}
}
}

if(isset($_POST['login'])){
    if($_POST['login'] === 'true'){
    
        if(isset($_POST['tokenKey'])){
        
    $ranBytes= uniqid();
    $_SESSION['lToken'] = $ranBytes;
    echo $ranBytes;
    exit();

}else{
    
if(isset($_POST['lemail'])){
    // error_reporting(E_ALL & ~E_ERROR);
    if(isset($_POST['token'])){
        
        if($_POST['token'] === $_SESSION['lToken']){
            unset($_SESSION['lToken']);
            
            $lemail = $_POST['lemail'];
    $token= $_POST['token'];
    $lpass= $_POST['lpass'];
    $role= 2;
    // $mssg= [];
    if($lemail != "" || $lpass != ""){
        require "config.php";
    $con= new myConnection();
    $conn= $con->connect();
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$q= "SELECT * FROM profile_users WHERE email = :eml";
$que= $conn->prepare($q);
$que->bindParam(':eml', $lemail);
$que->execute();
if($que->rowCount() == 1){
    $result= $que->fetch();
if(password_verify($lpass, $result['pass'])){
    
         $mssg= array('status' => 'true', 'msg' => 'Login Successful'); echo json_encode($mssg);

        $_SESSION['id'] = $result['id'];
        $_SESSION['firstname'] = $result['firstname'];
        $conn= null;
    } else{$mssg= ['status' => 'false', 'msg' => 'Wrong password']; echo json_encode($mssg);}  
}else{

    $q1= "SELECT * FROM members WHERE email = :eml && role= :rol";
$que1= $conn->prepare($q1);
$que1->bindParam(':eml', $lemail);
$que1->bindParam(':rol', $role);
$que1->execute();

if($que1->rowCount() == 1){
    $result1= $que1->fetch();
        if(password_verify($lpass, $result1['pass'])){
    
         $mssg= array('status' => 'true', 'msg' => 'Login Successful'); echo json_encode($mssg);

        $_SESSION['id'] = $result1['id'];
        $_SESSION['itself']= $_SESSION['id'];
        $_SESSION['firstname'] = $result['firstname'];
        $conn= null;
        
    } else{$mssg= ['status' => 'false', 'msg' => 'Wrong password']; echo json_encode($mssg);}  
}else{$mssg= ['status' => 'false', 'msg' => 'Not valid!']; echo json_encode($mssg); $conn=null; }

}

}else{$mssg= ['status' => 'false', 'msg' => 'Fill out all fields']; echo json_encode($mssg);}
}else{echo 111111;}
}
}
}
}
}


if(isset($_SESSION['id'])){
if(isset($_POST['submit'])){
    if($_POST['submit'] === "true"){
        if(isset($_POST['ptitle'])){
            $id= $_SESSION['id'];
    $title= $_POST['ptitle'];
    $desc= $_POST['pdesc'];
    $address= $_POST['padd'];
    $type= $_POST['typ'];
    $mobno= $_POST['mob'];
    $role=1;
    require "config.php";
$con= new myConnection();
$conn= $con->connect();
$sql= $conn->prepare("INSERT INTO hired_datas(id, title, description, address, type, mobno) VALUES(:ide, :tit, :des, :add, :typ, :mob)");
$sql->bindParam(':ide', $id);
$sql->bindParam(':tit', $title);
$sql->bindParam(':des', $desc);
$sql->bindParam(':add', $address);
$sql->bindParam(':typ', $type);
$sql->bindParam(':mob', $mobno);
if($sql->execute()){
$array= [];
$arr1= ['status' => 'true'];
array_push($array, $arr1);
$arr= ['msg' => 'Form Submitted'];
array_push($array, $arr);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$q2= "SELECT mobno FROM members WHERE role= :rol";
$sql2= $conn->prepare($q2);
$sql2->bindParam(':rol', $role);
$sql2->execute();
if($sql2->rowCount() == 1){
$result= $sql2->fetch();
$amobno = $result['mobno'];
$arr= ['mobno' => $amobno];
array_push($array, $arr);
echo json_encode($array);
}
$conn= null;
}else{$conn= null; $arr= ['status' => 'false', 'msg' => 'Form Failed To Submit'];
array_push($array, $arr); echo json_encode($array);}
}
}
}
}

if(isset($_POST['document'])){
    if($_POST['document'] === "true"){
      require_once "functions.php";
      $obj= new functions();
      $obj->setTable('cover_pics');
      $cresult= $obj->selectCoverPic();
      echo json_encode($cresult);
    }
  }

  if(isset($_POST['search'])){
    if($_POST['search'] != ""){
        $sval= $_POST['search'];
        require_once "functions.php";
        $obj= new functions();
        $obj->setTable('projects');
        $sresult= $obj->search_project($sval);
        if($sresult){
        $size= sizeof($sresult);
        //   echo "<pre>";
        //   print_r($result);
        for ($s=0; $s < $size; $s++) { 
          # code...
        
        

        echo $soutput= "<div class='myProjects'>
        <div class= 'project'>".$sresult[$s]['title'] ."
         <div class= 'description'>".$sresult[$s]['description'] ."
        
         </div>
         <div class= 'buttons'>
             <a href= '".$sresult[$s]['folder']."'/'".$sresult[$s]['file']."' class= 'checkOut' target='_blank'>Let see</a>
             <a href='sourceCodeDownload?download=".$sresult[$s]['folder']."' class= 'sourceCode'>Source Code</a>
         </div>
     </div>
        </div>  ";
      
        }
        }else{echo "No results found";}
    
    }
  }





?>
