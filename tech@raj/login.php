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
    <div id="loader"><img src="loader/gif.gif" id="loader" alt="_loading"></div>
<div id="mainDiv">
        <div id="outdiv">
            <p id="mainMssg"></p>
            <div id="center">
                <form action="#" method="POST" id="form" name="form">
                    <h3>Login to your account :)</h3>
           <div class="input"> <input type="text" name="lemail" id="lemail" placeholder="Your email"/></div>
            <div class="input"><input type="password" name="lpass" id="lpass" autocomplete="off" placeholder="Your password"/></div>
            <input type="hidden" id="hidden"  />          
            <button name="submit" id="submit">Submit</button>
            <div id="logout">Not have an account? <a href="signup"> Signup</a></div>
            </form>
        </div>
    </div>
</div>
<?php require_once "footer.php"; ?>
    
    <script type="text/javascript" src="links/jquery-3.6.0.min.js"></script>
<script>
    window.onload= function(){
        document.getElementById('loader').style.display= 'none';
        document.getElementById('mainDiv').style.display= 'block';
    }
$(document).ready(function(){
    $.ajax({
        url: "postdatas",
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

    $('#submit').click(function(e){
        e.preventDefault();
        console.log($('#hidden').val());
        let email= $('#lemail').val();
        $.ajax({
        url: "postdatas",
        type: "POST",
        data: {login: 'true', lemail: email, token: $('#hidden').val(), lpass: $('#lpass').val()},
        success: function(dat){
            console.log(dat);
            let data= JSON.parse(dat);
            console.log(data);
            if(data['status'] === 'true'){
           $('#mainMssg').fadeIn('fast').addClass('success').html(data['msg']);
           $('#form').trigger('reset');
           setTimeout(() => {
              location.href= "index";
           }, 1500);
        }
        if(data['status'] === 'false'){
            $('#mainMssg').fadeIn('fast').addClass('error').html(data['msg']);
            $('#form').trigger('reset');
        }
    }
    });
    });
});


</script>

</body>
</html>