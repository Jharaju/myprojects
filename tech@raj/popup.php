<?php
session_start();
if(isset($_SESSION['one'])){
    if($_SESSION['one'] === $_SESSION['id']){
        if(isset($_POST['thirdBox'])){
            if($_POST['thirdBox'] === "true"){
                $action= htmlentities('popup');
              echo $btn= "<form action='{$action}' method='POST' enctype='multipart/form-data' id='form'>
              <input type='text' placeholder='First name' id='fname' name='fname'/>
              <input type='text' placeholder='Last name' id='lname' name='lname'/>
              <input type='text' placeholder='Email' id='email' name='email'/>
              <input type='password' placeholder='Password' id='pass' name='pass'/>
              <input type='text' placeholder='Role' id='role' name='role'/>
              <input type='file' placeholder='Profile_pic' id='ppic' name='ppic'/>
              <input type='submit' id='addmem' name='msubmit'/>
              </form>";
            }
        }
    
    if(isset($_POST['msubmit'])){
        if(isset($_SESSION['one'])){
            if($_SESSION['one'] === $_SESSION['id']){
                $fname= $_POST['fname'];
  $lname= $_POST['lname'];
  $email= $_POST['email'];
  $pass= password_hash($_POST['pass'], PASSWORD_BCRYPT);
  $role= $_POST['role'];
  $ppic= $_FILES['ppic'];
  $validppic= ['image/jpg', 'image/jpeg', 'image/png'];
  $pname= $ppic['name'];
//   echo $ptype=strstr($ppic['type'], '/', FALSE)."<br>";
  $ptemp=$ppic['tmp_name'];
  if($role == "admin"){
      $role= 1;
  }else{
      $role= 2;
  }
  require "config.php";
$con= new myConnection();
$conn= $con->connect();
  $sql1= $conn->prepare("SELECT * FROM members WHERE email = :eml");
  $sql1->bindParam(':eml', $email);
  $sql1->execute();
  if($sql1->rowCount() > 0){
        echo "User already exists!";
    }else{
        if(in_array($ppic['type'], $validppic, TRUE)){
            $dest= 'images/'.$pname;
          move_uploaded_file($ptemp, $dest);
        $sql= $conn->prepare("INSERT INTO members(firstname, lastname, email, pass, role, profile_pic) VALUES(:fnm, :lnm, :eml, :pss, :rol, :pic)");
    $sql->bindParam(':fnm', $fname);
    $sql->bindParam(':lnm', $lname);
    $sql->bindParam(':eml', $email);
    $sql->bindParam(':pss', $pass);
    $sql->bindParam(':rol', $role);
    $sql->bindParam(':pic', $pname);
    if($sql->execute()){
        echo "Registration Successful";
    $conn= null;
    }else{$conn= null; echo "Registration failed";}
    }
    

  }
            }
        }
    }
    
    if(isset($_POST['acovP'])){
        if($_POST['acovP'] === "true"){
        if(isset($_SESSION['one'])){
            if($_SESSION['one'] === $_SESSION['id']){
                $action= htmlentities('popup');
                echo $coverBox= "<form action='{$action}' method='POST' enctype='multipart/form-data' id='form'>
                <input type='file' placeholder='Add cover_pic' id='cpic' name='cpic'/>
                <input type='submit' name='csubmit'/>
                </form>";    
            }
        }
    }
}
   
if(isset($_POST['csubmit'])){
    if(isset($_SESSION['one'])){
        if($_SESSION['one'] === $_SESSION['id']){
$cpic= $_FILES['cpic'];
$validppic= ['image/jpg', 'image/jpeg', 'image/png'];
$cname= $cpic['name'];
$role= 1;
//   echo $ptype=strstr($ppic['type'], '/', FALSE)."<br>";
$ctemp=$cpic['tmp_name'];
require "config.php";
$con= new myConnection();
$conn= $con->connect();
    if(in_array($cpic['type'], $validppic, TRUE)){
        $dest= 'images/'.$cname;
      move_uploaded_file($ctemp, $dest);
    $sql1= $conn->prepare("INSERT INTO cover_pics(cover_pic) VALUES(:cvr)");
$sql1->bindParam(':cvr', $cname);
if($sql1->execute()){
    echo "Cover Pic Inserted";
$conn= null;
}else{$conn= null; echo "Failed to Insert cover pic";}


}
        }
    }
}

if(isset($_POST['project'])){
    if($_POST['project'] === "true"){
        $action= htmlentities('popup');
      echo $frm= "<form action='{$action}' method='POST' enctype='multipart/form-data' id='form'>
      <input type='text' placeholder='Title' id='title' name='title'/>
      <input type='text' placeholder='Description' id='desc' name='desc'/>
      <input type='text' placeholder='Folder name' id='folder' name='folder'/>
      <input type='file' placeholder='file' id='file' name='file'/>
      <input type='submit' id='psubmit' name='psubmit'/>
      </form>";
    }
}
if(isset($_POST['psubmit'])){
    if(isset($_SESSION['one'])){
        if($_SESSION['one'] === $_SESSION['id']){
            $title= $_POST['title'];
$desc= $_POST['desc'];
$folder= $_POST['folder'];
$file= $_FILES['file'];
$fname= $file['name'];
//   echo $ptype=strstr($ppic['type'], '/', FALSE)."<br>";
$ftemp=$file['tmp_name'];

require "config.php";
$con= new myConnection();
$conn= $con->connect();

        $dest= 'files/'.$fname;
      move_uploaded_file($ftemp, $dest);
    $sql= $conn->prepare("INSERT INTO projects(title, description, folder, file) VALUES(:fnm, :lnm, :eml, :pss)");
$sql->bindParam(':fnm', $title);
$sql->bindParam(':lnm', $desc);
$sql->bindParam(':eml', $folder);
$sql->bindParam(':pss', $fname);
if($sql->execute()){
    echo "Project Inserted";
$conn= null;
}else{$conn= null; echo "Project Inserted";}
        }
    }
}








}
}

if(isset($_POST['login'])){
    if($_POST['login'] === 'true'){
        if(isset($_POST['tokenKey'])){
    
    $mtrand= mt_rand(11111111111111, 99999999999999);
    $tok= $mtrand * 761943943761;
    $token= convert_uuencode($tok);
    $_SESSION['aToken'] = $token;
    echo $token;
    exit();

}
    }
}

if(isset($_POST['asubmit'])){
    if($_POST['asubmit'] === 'true'){
    if(isset($_SESSION['aToken'])){
        $tok= $_POST['ahidden'];
        // echo $tok;
        // echo "hidden ".$tok."<br>";
    $toke= convert_uudecode($tok);
    $token= $toke / 761943943761;
// echo $token;
$sessionT= convert_uudecode($_SESSION['aToken']) / 761943943761;
// echo "session ".$sessionT."<br>";
// echo "token ".$token."<br>";
    if($sessionT === $token){
        // echo "reached";
    $memail= $_POST['lemail'];
$mpass= $_POST['lpass'];
$role= 1;
require "config.php";
$con= new myConnection();
$conn= $con->connect();
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$msql1= $conn->prepare("SELECT * FROM members WHERE email = :eml && role= :rol");
$msql1->bindParam(':eml', $memail);
$msql1->bindParam(':rol', $role);
$msql1->execute();
if($msql1->rowCount() > 0){
$mresult= $msql1->fetch();
if(password_verify($mpass, $mresult['pass'])){
  $_SESSION['id']= $mresult['id'];
$_SESSION['one']= $mresult['id'];
$_SESSION['firstname']= "Admin";
$_SESSION['msg']= "Login_Successful ";
// echo "Login_Successful";
// header("location: admin.php");
}else{$_SESSION['msg']= "Bad Try!";}
}else{$_SESSION['msg']= "Bad Request!";}
}
}else{}
}
}

?>