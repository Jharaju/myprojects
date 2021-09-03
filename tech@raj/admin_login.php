<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "header.php"; ?>
    <title><?php if(isset($title)){echo $title;} ?></title>
    <link rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
    <div id="loader"><img src="loader/gif.gif" alt="_loading"></div>
<div id="mainDiv">
        <div id="outdiv">
            <p id="mainMssg"></p>
            <div id="center">

<?php

?>
                <form action="<?php htmlentities('admin_login'); ?>" method="POST" id="form" name="form">
                    <h3 id= "msg"><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];}else{echo 'Login :)';} ?></h3>
           <div class="input"> <input type="text" name="lemail" id="lemail" placeholder="Your email"/></div>
            <div class="input"><input type="password" name="lpass" id="lpass" autocomplete="off" placeholder="Your password"/></div>
            <input type="hidden" id="hidden" name="hidden" />
            
            <button name="submit" id="submit">Submit</button>
            </form>
            
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
    
    $.ajax({
        url: "popup",
        type: "POST",
        data: {login: 'true', tokenKey: 'true'},
        success: function(dat){
            // console.log(dat);
         $('#hidden').val(dat);
        }
    });

    setInterval(() => {
        if($('#hidden').val() == ""){
        $('#submit').attr('disabled', 'disabled');    
    }else{$('#submit').removeAttr('disabled', 'disabled');}
    }, 2000);

    let msg= $('#msg').text();
    // console.log(msg);
    
    $('#submit').click(function(e){
        e.preventDefault();
        $.post(
            "popup",
            {asubmit: 'true',ahidden:$('#hidden').val(), lemail: $('#lemail').val(), lpass: $('#lpass').val()},
            function(data){
                $('#msg').html(data);
                // if(data === "Login_Successful"){
        location.href= "tech@Raj";
        
                // }
            }
        );
    });

});
    </script>
</body>
</html>