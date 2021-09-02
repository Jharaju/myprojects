<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "header.php"; ?>
    <title><?php if(isset($title)){echo $title;} ?></title>
    <link rel="stylesheet" href="stylesheet.css" />
    
</head>
<body>
<?php require_once "footer.php"; ?>
    <div><img src="loader/gif.gif" id="loader" alt="_loading"></div>
<div id="mainDiv">
        
        <div id="outdiv">
            <p id="mainMssg"></p>
                <div id="chatBox">
                    <h3>letsChat :)</h3>
                    <div id="chat">
                        <div id="chatHeader">
                            <div id="userInfo">
<?php
// Make connection to database

$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
if(isset($_SESSION['id'])){
if(! isset($_SESSION['itself'])){
// Fetch these columns from your user table for header info.

$qf= "SELECT firstname, lastname, profile_pic FROM users WHERE id= :ed";
$quef= $conn->prepare($qf);
$quef->bindParam(':ed', $_SESSION['id']);
$quef->execute();
if($quef->rowCount() > 0){
$resultf= $quef->fetch();
}
}

?>

                                <img src="images/<?php if(! isset($_SESSION['itself'])){if(isset($_SESSION['id'])){if(! isset($_SESSION['one'])){echo $resultf['profile_pic'];}}} ?>" alt= ""> <p id="uname"><?php if(! isset($_SESSION['itself'])){if(isset($_SESSION['id'])){if(! isset($_SESSION['admin'])){echo $resultf['firstname']." ".$resultf['lastname'];}}} ?></p>
                            <?php } ?>
                            </div>
                            
                        </div>
                        <?php                        
                        if(isset($_SESSION['id'])){ ?>
                        <div id="chattingDiv">
                        <div id="messageArea">
                            <?php
if(isset($_SESSION['targetid'])){
    
?>
                            

<?php
}
?>
                        </div> 
                           
                        <div id="sendMessage">
                            <input type="text" name="text" id="text" autocomplete="off">
                            <button name="send" id="send">Send</button>
                            </div>
                            
                        </div>
                        <?php }else{echo "<div id= 'mssg'>You are not logged in! Login first...</div>";} ?>

                    </div>
                    <div id="available_persons">
                        <?php
                    
                    // Make your coonection again, You option to follow oop approach to less code for queries,

                    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                    $q= "SELECT * FROM members_table";
                    $que= $conn->prepare($q);
                    $que->execute();
                    if($count= $que->rowCount() > 0){
                        if(! isset($_SESSION['mine'])){
                            
                        while ($result= $que->fetch()) {
                            # code...
                            $id= $result['id'];
                          

?>
                    <div class="available_members"><img src="images/<?php echo $result['profile_pic']; ?>" alt= "">
                    <div class="name"><?php echo $result['firstname']. ' '. $result['lastname']; ?></div></div> <button class="chat_button" data-targetid="<?php echo $id; ?>">Message Me</button>
                        
                    <?php 
                    if(isset($_SESSION['id'])){
                if($result['id'] === $_SESSION['id']){
// Here i checking that it is my session or not. if session id equal to member id than below i coded to show persons who messaged me,
  
                    $_SESSION['me']= $result['id'];
                }    
                }
            }
            }
                ?>
               
                <?php
                    if(isset($_SESSION['me'])){
                        if($_SESSION['me']=== $_SESSION['id']){
                            ?>

                            <?php
                            
                        // Here fetching all records from messages uniquely where to(table_column) equal to member id.

                        $q1= "SELECT * FROM profile_users LEFT JOIN messages ON messages.where_to= :mine";
                        $que1= $conn->prepare($q1);
                        $que1->bindParam(':mine', $_SESSION['id']);
                        $que1->execute();
                        if($count1= $que1->rowCount() > 0){
                            // echo "Its greater than zero";
                            $matchUniq= [];
                            
                            while ($result1= $que1->fetch()) {
                                # code...
                                // echo "<pre>";
                                // print_r($result1);
                                // exit();
                                if(! in_array($result1['id'], $matchUniq)){
                                    array_push($matchUniq, $result1['id']);
                                    $id1= $result1['id'];
                                ?>
// this is for available persons, i given the class name aavailable members to reduce css code only so dont be confused

<div class="available_members"><img src="images/<?php echo $result1['profile_pic']; ?>" alt= "_pic">
<div class="name"><?php echo $result1['firstname']. ' '. $result1['lastname']; ?></div></div> <button class="chat_button" data-mid="<?php echo $id1; ?>">Message Me</button>

<?php
                            }
                        }
                            $conn= null;
                                
                        }else{echo "No users right now!"; $conn= null;}
                        }
                    }
                    
                }
                    ?>
                
                </div>
                </div>
    </div>
</div>

    <script type="text/javascript" src="links/jquery-3.6.0.min.js"></script>
<script>
    window.onload= function(){
        document.getElementById('loader').style.display= 'none';
        document.getElementById('mainDiv').style.display= 'block';
    }
    $(document).ready(function(){
        
       $(document).on('click', '.chat_button', function(e){
           e.preventDefault();
               let targetid= $(this).data('targetid');
               
            //    console.log(targetid);
               $('#chattingDiv').toggle('slow');
                // let fid= $('#fhidden').val();
                // console.log("fid-".fid);
                $.post(
                   "dynamic",
                   {setmid: targetid},
                   function(res){
                    // console.log(res);
                    
                   }
               );

   
            // $('#text').focus();
           
        setInterval(() => {
            $.post(
                   "dynamic",
                   {mbrid: targetid},
                   function(res){
                    //    let resp= JSON.parse(res);
                    //    console.log(res);
                    let ready= $('#messageArea').html(res);
                    setTimeout(() => {
                        location.href= "#send";
                    $('#text').focus();
                    }, 1000);
                   }
               );
        }, 250);


           $(document).on('click', '#send', function(e){
               e.preventDefault();
               let msg= $('#text').val();
            //    $('#send').trigger('reset');
               
               $.post(
                   "dynamic",
                   {mssg: msg},
                   function(data){
                    // let data= JSON.parse(dat);
                    // console.log(data);
                    
                    $('#messageArea').html(data);
                    location.href= "#send";
                    $('#text').val("");
                    $('#text').focus();
                   }
               );
               
           });
       });
    });

    </script>
</body>
</html>