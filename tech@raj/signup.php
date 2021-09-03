<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php"; ?>
    <title><?php if(isset($title)){echo $title;} ?></title>
    <link rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
    <di id="loader"><img src="loader/gif.gif" id="loader" alt="_loading"></di>
    <div id="mainDiv">
        <div id="outdiv">
            <p id="mainMssg"></p>
            <div id="center">
                <form action="#" method="POST" id="form" name="form">
                    <h3>Register Your Account :)</h3>
            <div class="input"><input type="text" name="fname" id="fname" placeholder="Your first name"/>
        <p></p>
        </div>
           <div class="input"> <input type="text" name="lname" id="lname" placeholder="Your last name"/>
        <p></p>
        </div>
           <div class="input"> <input type="text" name="email" id="email" placeholder="Your email"/><p></p></div>
            <div class="input"><input type="password" name="pass" id="pass" autocomplete="off" placeholder="Your password"/><p></p></div>
            <div class="input"><input type="password" name="cpass" id="cpass" autocomplete="off" placeholder="Confirm your password"/><p></p></div>
            <input type="submit" name="submit" id="submit"/>
            <div id="logout">Have an account? <a href="login"> Login</a></div>
            </form>
        </div>
    </div>
    <?php require_once "footer.php"; ?>
    </div>
<script type="text/javascript" src="links/jquery-3.6.0.min.js"></script>
<script>
    window.onload= function(){
        document.getElementById('loader').style.display= 'none';
        document.getElementById('mainDiv').style.display= 'block';
    }
$(document).ready(function(){
    $('#submit').attr('disabled', 'disabled');

    $('#submit').click(function(e){
        e.preventDefault();
     let pass= $('#pass').val();
     let cpass= $('#cpass').val();
     if(cpass != ""){
     if(pass === cpass){
        // mssg('success', msgBox, '');
    let fname= $('#fname').val();
    let lname= $('#lname').val();
    let email= $('#email').val();
    $.ajax({
        url: "postdatas",
        type: "POST",
        data: {uname: fname, ulname: lname, uemail: email, upass: pass},
        success: function(data){
           $('#mainMssg').fadeIn('fast').addClass('success').html(data);
           setInterval(() => {
              location.href= "index";
           }, 1500);
        }
    });
       

     }else{mssg('error', msgBox, 'Password not matched');}
    }else{mssg('error', msgBox, 'Confirm your password');}

    });

function check(){
    let total= $('.success').length;
        if(total === 5 || total === 4){
        $('#submit').removeAttr('disabled', 'disabled');
        
    }
}

    function mssg(con, target, msg){
        $(target).fadeIn('fast');
           target.removeClass();
           target.addClass(con);
           target.html(msg);
        
    }

    $('#form input').blur(function(){    
    let div= $(this).attr('id');
    // console.log(div);
    let parent = $(this.parentElement);
    let msgBox= $(parent).children('p');
    // console.log(msgBox);
    let length= $(this).val().length;
    if(div == 'fname'){
        if(length <= 2 || length > 15){
            // console.log('got');
        mssg('error', msgBox, 'Invalid Name!');    
        }else{
        mssg('success', msgBox, '');
        }
    }

    if(div == 'lname'){
        if(length <= 2 || length > 15){
            // console.log('got');
        mssg('error', msgBox, 'Invalid Last Name!');    
        }else{
        mssg('success', msgBox, '');
        }
    }

    if(div == 'email'){
     let email= $(this).val();
     let atsymbol = email.indexOf("@");
     let dot= email.lastIndexOf('.');
	if(atsymbol < 3){mssg('error', msgBox, 'Invalid Email !');}
	else if(dot <= atsymbol + 2){mssg('error', msgBox, 'Invalid Email !');}
	else if(dot === email.length - 1){mssg('error', msgBox, 'Invalid Email !');}
	else{mssg('success', msgBox, '');}
    
    }

    if(div == 'pass'){
        if(length <= 5){
            // console.log('got');
        mssg('error', msgBox, 'Require atleast 6 length');    
        }else{
        mssg('success', msgBox, '');
        check();
        }
    }

    if(div == 'cpass'){
     let pass= $('#pass').val();
     let cpass= $(this).val();
     if(cpass != ""){
     if(pass === cpass){
        mssg('success', msgBox, '');
        check();

     }else{mssg('error', msgBox, 'Password not matched');}
    }else{mssg('error', msgBox, 'Confirm your password');}
}

});
});
</script>
</body>
</html>