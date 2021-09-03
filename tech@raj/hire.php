<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "header.php"; ?>
    <title><?php if(isset($title)){echo $title;} ?></title>
    <link rel="stylesheet" type="text/css" href="style3.css"/>
</head>
<body>
<?php require_once "footer.php"; ?>
    <div id="loader"><img src="loader/gif.gif" id="loader" alt="_loading"></div>
    <div id="main">
    <table id="table">
        <br><br>
        <tr>
           <p id="mssg"><?php  ?></p>
        </tr>
        <?php 
        if(isset($_SESSION['id'])){
            unset($_SESSION['hmssg']);
            ?>
        
<form action="#" method="POST">
<tr>
            <td>Project Title:</td>
            <td><input type="text" name="title" id="title" ></td>
        </tr>
        <tr>
            <td>Project Description:</td>
            <td><textarea name="desc" id="desc" cols="100" rows="10"></textarea></td>
        </tr>
        <tr>
            <td>Full Address</td>
            <td><input type="text" name="address" id="address" ></td>
        </tr>
        <tr>
            <td>Select Project Type</td>
            <td><select name="type" id="type"><option value="Organisational">Organisational<option value="Personal">Personal</option></option></select></td>
        </tr>
        <tr>
            <td>Your Mobile No.</td>
            <td><input type="text" name="mobno" id="mobno" ></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" id="submit" ></td>
        </tr>
</form>
        
    </table>
    <?php }else{echo "Please Login first to hire me!";}  ?>
</div>

    <script type="text/javascript" src="links/jquery-3.6.0.min.js"></script>
<script>
    window.onload= function(){
        document.getElementById('loader').style.display= 'none';
        document.getElementById('main').style.display= 'block';
    }
    $(document).ready(function(){
    $('#submit').click(function(e){
        e.preventDefault();
        let title= $('#title').val();
        let desc= $('#desc').val();
        let address= $('#address').val();
        let type= $('#type').val();
        let mobno= $('#mobno').val();
        $.post(
            "postdatas",
            {submit: "true", ptitle: title, pdesc: desc, padd: address, typ: type, mob: mobno},
            function(data){
                let res= JSON.parse(data);
                console.log(res);
                if(res.status == 'false'){
                    $('#mssg').html(res[0].msg);
                }else{
                $('#mssg').html(res[1].msg);
                $('#mssg').append('<br> You have various ways to contact me. Call on my mobile no. '+res[2].mobno)
                alert('Form Submitted. Scroll top to this page to note my mobile no. in message box.');
            }
        }
        );
    });

    });
    </script>
</body>
</html>