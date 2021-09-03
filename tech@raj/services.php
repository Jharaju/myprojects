
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
    /* background-color: rgba(155, 30, 156, 0.12); */
    z-index: 2;
    background-color: rgba(30, 156, 128, 0.41);
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
<img src="services.jpg" alt="">

    <div id="main">
    <h2>Services</h2><br><br>
    Hey You Need To <b>Grow</b> Your <b>Business</b>. One Most Effective Way Is <b>Digitize</b> Your <b>Business</b> Or <b>Services</b>. Believe Me Your Work Will being Made <b>Easier</b> And <b>Safe</b> By Distributing Your Business <b>Online</b>. 
    
    <br><br>
        <div>
        
            <li>I Will Provide You A Best Or <b>Effective Web Apllication</b> Based On Your <b>Requirements</b>. </li><br>
            <li>Your <b>Security</b> Will Be Measure By Giving <b>First Priority</b>.</li><br>
            <li>You Dont Need To <b>Work Hard</b> For Everything To Manage About Your Bussiness.</li><br>
            <li>After Selecting This Choice Your Software Would Be <b>The Manager Of Your Organisation</b>. <br>
            <li>The Most Important Is, <b>It Will Increase Your Accuracy</b>.</li> <br>
            <br>
            <b style="font-size: 1.4rem; color:deeppink">Services We Provide:</b><br><br>
            <li>All types of <b>Web</b> based applications. eg.,</li><br>
            <li>Large or dynamic <b>eCommerce Webs</b></li>
            <li><b>MLM</b> Projects <b>(Multi-level Marketing)</b></li>
            <li><b>CRM</b> Projects <b>(Client or Customer-Relationship-Management)</b></li>
            <li>News website, etc.</li>
            <li><b>Or</b> more as your requirements</li>  

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