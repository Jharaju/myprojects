<style rel= "stylesheet"> *{font-size: 2rem; color: orange; background-color: papayawhip; margin-left: 1rem;}   </style>

<?Php
session_start();
error_reporting(E_ALL & ~E_ERROR);
if(isset($_POST['addpic'])){
    if($_POST['addpic'] === "true"){
        $action= htmlentities('dynamic_data');
        echo $data= "";
    }
}

// if(isset($_POST['submit'])){
// if($_POST['submit'] === "true"){
        
            if(isset($_SESSION['id'])){
        if(isset($_POST['submit'])){
            $ppic= $_FILES['uprofilePic'];
            if($ppic){
            $validppic= ['image/jpg', 'image/jpeg', 'image/png'];
            $pname= $ppic['name'];
            $ptemp= $ppic['tmp_name'];
            if(in_array($ppic['type'], $validppic, TRUE)){
                      $dest= 'images/'.$pname;
                    move_uploaded_file($ptemp, $dest);
                    require "config.php";
                    $con= new myConnection();
                    $conn= $con->connect();
                    if(! isset($_SESSION['itself'])){
                    $sqlp= $conn->prepare("UPDATE profile_users SET profile_pic= :pic WHERE id= :eml");
                  $sqlp->bindParam(':pic', $pname);
                  $sqlp->bindParam(':eml', $_SESSION['id']);
              if($sqlp->execute()){
                echo 'Profile pic updated';                
                    $conn=null; $con=null;
              }else{ echo 'Select jpg or jpeg or png file only!'; 
                     $conn=null; $con=null;}
            }else{
                $sqlp1= $conn->prepare("UPDATE members SET profile_pic= :pic WHERE id= :eml && role= 2");
                  $sqlp1->bindParam(':pic', $pname);
                  $sqlp1->bindParam(':eml', $_SESSION['id']);
              if($sqlp1->execute()){
                echo 'Profile pic updated';
              }
            }
            }else{echo 'No pic detected!';
                  $conn=null; $con=null;}
        }
        }  
        }
// }
// }





?>




<script type="text/javascript" src="links/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
    setTimeout(() => {
        location.href= "index";
    }, 3000);

    });
    </script>

