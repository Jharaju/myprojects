<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    *{margin: 0; padding: 0; box-sizing: border-box;}
    div{width: 100vw; height: 100vh; background-color: snow;}
    #para{
        width: 30%; height: auto; display: none; background-color: green; color: orangered;
    }
    
    </style>
</head>
<body>
    <div id="main">
        <p id="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium mollitia cum quia!</p>
        <button type="submit" id="click">Click</button>
    </div>

<script type="text/javascript" src="jquery-3.6.0.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    function message(m){
        if(m['status'] == "true"){
            alert(1);
        }else{alert(2);}
    }
    
    $('#click').click(function(){
    $('#para').fadeIn('slow');
    mssg['msg']= "I want something";
    mssg['status']= "true";
    console.log(mssg);
    message(mssg);

})
});

</script>

</body>
</html>