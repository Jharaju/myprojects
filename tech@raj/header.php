<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php session_start(); ?>
    <?php
if(isset($_SERVER['PHP_SELF'])){
    
    switch ($_SERVER['PHP_SELF']) {
        case "/myfolder/tech@raj/index.php":
            # code...
            $title= "Home";
            break;
 
            case "/myfolder/tech@raj/login.php":
                # code...
                $title= "Login";
                break;
 
                    case "/myfolder/tech@raj/signup.php":
                        # code...
                        $title= "Signup";
                        break;
 
                        case "/myfolder/tech@raj/admin_login.php":
                            # code...
                            $title= "Login";
                            break;
 
                            case "/myfolder/tech@raj/tech@Raj.php":
                                # code...
                                $title= "Admin";
                                break;
                     
                                case "/myfolder/tech@raj/hire.php":
                                    # code...
                                    $title= "Hire";
                                    break;
 
                                    case "/myfolder/tech@raj/chat.php":
                                        # code...
                                        $title= "Chat";
                                        break;

                                        case "/myfolder/tech@raj/about.php":
                                            # code...
                                            $title= "About";
                                            break;

                                            case "/myfolder/tech@raj/services.php":
                                                # code...
                                                $title= "Services";
                                                break;
                             
        default:
            # code...
            $title= "Home";
            break;
    }
    
}

?>
    <title><?php if(isset($title)){echo $title;} ?></title>
    <link rel="stylesheet" href="links/all.min.css"/>
    <script src="links/all.min.js"></script>
    <style>
    *{margin: 0; padding: 0; box-sizing: border-box;}
    /* html body{width: 100%; height: 2rem; font-size: 62.5%;} */
    #outer{width: 100%; height: 2rem; 
            /* position: fixed; */
            position: fixed; z-index: 200;
        }
        #popupOut{
    width: 15rem;
    height: auto;
    padding-bottom: 1rem;
    background-color: burlywood;
    color: chartreuse;
    position: absolute;
    top: 1.8rem;
    right: 0.5rem;
    border-radius: 1rem;
    box-shadow: rgba(240, 46, 170, 0.4) 5px 5px, rgba(240, 46, 170, 0.3) 10px 10px, rgba(240, 46, 170, 0.2) 15px 15px, rgba(240, 46, 170, 0.1) 20px 20px, rgba(240, 46, 170, 0.05) 25px 25px;
    z-index: 100;
    display: none;
    clip-path: polygon(84% 6%, 91% 0, 95% 6%, 100% 6%, 100% 100%, 0 100%, 0 6%);
    }
    #popup{
    width: 100%;
    height: 100%;
    display: grid;
    place-items: center;
    line-height: 1.2rem;
    
}
#popup a{
    width: 55%;
    padding: 0.2rem;
    padding-right: 1.5rem;
    padding-left: 1.5rem;
    /* background-color: blue; */
    margin-top: 0.9rem;    
    color: blue;
    /* border-radius: 0.5rem; */
    font-size: 1rem;
    text-decoration: none;
}
#popup #menu{font-size: 1.5rem;}
#addpic #addp{
    padding: 0.2rem;
    /* padding-right: 1.5rem;
    padding-left: 1.5rem; */
    background-color: blue;
    /* margin-top: 0.2rem; */
    color: snow;
    border-radius: 0.5rem;
    font-size: 0.7rem;
    cursor: pointer;
}

        #header{background-color: black; display: flex; border-radius: 0.3rem; justify-content: space-between; align-items: center; text-align: center; line-height: 1.5rem; box-shadow: 0 1px 1px rgba(0,0,0,0.11), 
              0 2px 2px rgba(0,0,0,0.11), 
              0 4px 4px rgba(0,0,0,0.11), 
              0 8px 8px rgba(0,0,0,0.11), 
              0 16px 16px rgba(0,0,0,0.11), 
              0 32px 32px rgba(0,0,0,0.11);}

              
              
              #logo{width: 7.3rem; height: 2rem; position: relative; background-color: hsl(352, 20%, 22%); border-radius: 1rem; float: left; margin-left: 0.8rem; }
              #logo #logoContent::after{
                  content: "tech@Raj";
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        font-size: 1.5rem;
        text-shadow: 0px 3px 0px snow,
        0px 14px 10px pink,
        0px 24px 2px rgba(0,0,0,0.1),
        0px 34px 30px rgba(0,0,0,0.1);
        margin-left: 0.1rem;
        color: pink;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;
        
    }
    #rightSide{display: flex; justify-content: center; width: 25%; float: right; color: blue; font-size: 1.3rem;}
    #rightSide p{display: inline; width: 100%; margin-right: 2.5rem; color: deeppink; animation: rotate 0.8s infinite;}
    @keyframes rotate{
    0%{ 
    
     }
    50%{ 
    color: yellow;
 }
 100%{ 
    color: yellowgreen;
 }
}
    @media (max-width: 950px) {
        #rightSide{width: 50%;}
        #rightSide p{margin-right: 1rem;}
    }
    #search_div{margin-right: 1rem;}
    #slbtn{
        width: 4rem;
        height: 1.5rem;
        font-size: 1rem;
        color: snow;
        background-color: blue;
        border-radius: 0.5rem;
        float: right;
        margin-right: 1rem;
        cursor: pointer;
        text-decoration: none;
    }

    </style>
</head>
<body>
    
    <div id="outer">
        <div id="popupOut">
        <div id="popup">
            <?php
if(isset($_SESSION['id'])){
    ?>
    <?php
    if(isset($_SESSION['one'])){
        if($_SESSION['one'] === $_SESSION['id']){
            if(isset($_SERVER['SCRIPT_NAME'])){
                 if($_SERVER['SCRIPT_NAME'] === "/myfolder/tech@raj/tech@Raj.php"){
    ?>
    <a href='#' id='menu'>&#9776;</a>
    <?php
}
}
}
}
    ?>
    <a href="logout">Logout</a>
    <?php
    if(isset($_SERVER['SCRIPT_NAME'])){
    if($_SERVER['SCRIPT_NAME'] != "/myfolder/tech@raj/index.php"){
    ?>
    <a href="index">Home</a>
    <?php }
    } 
    if(isset($_SERVER['SCRIPT_NAME'])){
    if($_SERVER['SCRIPT_NAME'] != "/myfolder/tech@raj/about.php"){
    ?>
    <a href="about">About</a>
    <?php }
    }
    if(isset($_SERVER['SCRIPT_NAME'])){
    if($_SERVER['SCRIPT_NAME'] != "/myfolder/tech@raj/services.php"){
    ?>
    <a href="Services">Services</a>
    <?php }
    } ?>
    <?php
    if(isset($_SERVER['SCRIPT_NAME'])){
    if($_SERVER['SCRIPT_NAME'] === "/myfolder/tech@raj/index.php"){
    ?>
    <a href="#" id="addpic">Add_profile_pic</a>
    <?php }
    } ?>
    
<?php
}else{
?>
            <a href="signup">SignUp</a>
            <a href="login">Login</a>
            <a href="index">Home</a>
            <a href="services">Services</a>
            <a href="about">About</a>
            <?php
}
            ?>
        </div>
        </div>
        <div id="header">
        <div id="logo">
            <div id="logoContent"></div>
        </div>
        
        <div id="rightSide">
        
        <?php
    if(isset($_SERVER['SCRIPT_NAME'])){
    if($_SERVER['SCRIPT_NAME'] === "/myfolder/tech@raj/index.php"){
    ?>
        <div id="search_div">
				<button id="search_btn"><i id="search_icon" class='fa fa-search'></i></button>
                </div>
<?php
    }
}
?>
        
        <p><?php if(isset($_SESSION['id'])){echo "Hi". " " .$_SESSION['firstname'];} ?></p>
        <a href="#" id="slbtn"><i class="fa fa-user"></i></a>
    </div>
    </div>
    </div>
    <script type="text/javascript" src="links/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('#slbtn').click(function(e){
        e.stopPropagation();
       $('#popupOut').toggle('fast');

    //    $('#slbtn').click(function(e){
    //        $('#popupOut').fadeOut();
    //    })
    });
});



    </script>
</body>
</html>