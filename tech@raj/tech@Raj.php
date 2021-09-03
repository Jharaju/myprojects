<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "header.php"; ?>
    <title><?php if(isset($title)){echo $title;} ?></title>
    <link rel="stylesheet" href="style2.css" />
</head>
<body>
<?php require_once "footer.php"; ?>
    <!-- <style> #mainDiv{display: none;}  </style> -->
    <?php
    //  if(! isset($_SESSION['one'])){
        require_once "admin_login.php";
    //  }else{
  if(isset($_SESSION['one'])){
      if($_SESSION['one'] === $_SESSION['id']){
  
    ?>
    <div id="main">
    
        <div id="up">
            <h1>Admin</h1>
        </div>
        <div id="secondBox">
          <div id="member"></div>  
          <div class="sclose">&times;</div>
        </div>
<!-- Main -->
<div id="thirdBox">
<div id="content">
    <button id="addM">Add_Member</button>
    <button id="cPic">Add Cover_Pic</button>
    <button id="aproject">Add_Project</button>
    <button id="hdatas">Hired_Datas</button>
    <button>Add</button>
    <button>Add</button>
    <button>Add</button>
    <button>Add</button>
    <button>Add</button>
</div>
<div class="close">&times;</div>
</div>





</div>

<?php 

}
}

?>


    <script type="text/javascript" src="links/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){

    let msg= $('#msg').html();
    // console.log(msg);
    setTimeout(() => {
        if(msg === "Login_Successful "){
        $('#mainDiv').fadeOut('fast');
        $('#lemail').val("");
        $('#lpass').val("");
        $('#submit').attr('disabled', 'disabled');
     }
    }, 500);
     function thirdBox(){
        $('#popupOut').fadeOut('fast');
         $('#thirdBox').fadeIn('fast');
     }
     function secondBox(){
        $('#thirdBox').fadeOut('fast'); 
     }

     $('#addM').click(function(){
        secondBox();
         $.post(
             "popup",
             {thirdBox: "true"},
             function(dat){
            $('#secondBox').fadeIn('fast');
            $('#member').html(dat);
             }
         );
     });
     $('#menu').click(function(){
         thirdBox();
         $('.close').click(function(){
            $('#thirdBox').fadeOut('fast');
         });
     });
     $('.sclose').click(function(){
            $('#secondBox').fadeOut('fast');
         });
         $('#cPic').click(function(){
        secondBox();
         $.post(
             "popup",
             {acovP: "true"},
             function(dat){
            $('#secondBox').fadeIn('fast');
            $('#member').html(dat);
             }
         );
     });
     $('#aproject').click(function(){
        secondBox();
         $.post(
             "popup",
             {project: "true"},
             function(dat){
            $('#secondBox').fadeIn('fast');
            $('#member').html(dat);
             }
         );
     });



});
</script>

</body>
</html>