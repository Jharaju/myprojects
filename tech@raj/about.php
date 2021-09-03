
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
    *{margin: 0; padding: 0; box-sizing: border-box;}
    html{width: 100%; height: 100vh;}
    body{
        width: 100%;
        height: 100vh;
        font-size: 62.5%;
        display: flex;
        flex-direction: column;
        z-index: 1;
        position: relative;
    
    }
    #main{width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    z-index: 2;
    background-color: rgba(242, 151, 242, 0.8);
    box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
    font-size: 1.3rem;
    padding-top: 3rem;
    text-align: center;
    color: whitesmoke;
    overflow-y: scroll;
    padding-bottom: 3.5rem;
    display: none;
}
/* #main::-webkit-scrollbar{overflow: hidden;} */
@media (max-width: 510) {
    #down{
    width: 100%;
    height: 100%;
    font-size: 1.3rem;
    text-align: center;
    color: darkviolet;
    background-color:plum;
}
}
#main h2{color: springgreen;}
#main a{color: blue; font-size: 1.4rem;}
    
    body img{
    width: 100%;
    height: 100%;
    background-position: center;
    background-size: cover;
    
}
#footerBox{
    width: 100%;
    height: 3rem;
    margin-top: auto;
}
#footer{
    width: 100%;
    height: auto;
    font-size: 1.2rem;
    color: whitesmoke;
    background-color: black;
    border-radius: 0.7rem;
    text-align: center;
    position: absolute;
    left: 0;
    bottom: 0;
    
}
#loader{
    width: 100%;
    height: 100vh;
    text-align: center;
}
#loader img{width: 100%; height: 100%; background-color: darkslategray;}

</style>
<?php require_once "header.php"; ?>
<?php require_once "footer.php"; ?>
<div id="loader"><img src="loader/gif.gif" alt=""></div>
<img src="about.jpg" alt="">

    <div id="main">
    <h2>The Developer</h2><br><br>
    If you need to build <b>static</b> as well as <b>dynamic</b> websites, You can contact me through various ways as your choice. I was build a simple <b>chatting functionality</b> to this website for your <b>ease</b> to <b>contact</b> me. You can call on my personal <b>number</b> by just <b>hiring</b> me where i already added that section to the website. I will provide you my <b>Number</b>.
    
    <br><br>
        <div>
        

            <br><br><br><br>
        <p>To get access more features of this website. Go and <a href="signup">Register</a> your account.</p><br>
        <p>I provided you a chatting functionality for your ease to contact me. <a href="letsChat">Chat</a></p><br>
        <p>You can hire me by just clicking here.. <a href="hire">Hire</a> I will privide you my personal number also.</p><br><br>

        <p>Not visited my <b>Git</b> repository <a href="https://www.github.com/Jharaju/">Checkout My Git Repo..</a></p>
        </div>
    </div>
    
    <script type="text/javascript">
    window.onload= function(){
        document.getElementById('loader').style.display= 'none';
        document.getElementById('main').style.display= 'block';
    }
    </script>           
</head>
<body>
    
</body>
</html>