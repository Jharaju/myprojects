<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php"; ?>
    <title><?php if(isset($title)){echo $title;} ?></title>
    <link rel="stylesheet" href="style.css"/>
    
</head>
<body>
    <style> #header{background-color: darkslategrey !important;} </style>
<div id="loader"><img src="loader/gif.gif" alt=""></div>

    <div id="main">
        <div id="profileBox">
        <div class="profile_section">
            <?php
            require_once "functions.php";
$obj= new functions();
$obj->setTable('members');
$result= $obj->select_admin('1');
?>
        <img src="" alt="_cover_pic" id="cover_pic">    
        <div class="photoWithTitle">
            <img src="<?php echo "images/".$result['profile_pic']; ?>" alt="_Profile_pic">
            <h4><?php echo $result['firstname']." ".$result['lastname']; ?></h4>
            <p>I am a <div id="slide"><span id="beforeAfter"></span></div></p>
        </div>
        </div>
        </div>

        <div id="middle">
        <div id="left">
            <a href="#">Follow On Instagram :)</a>
            <a href="#">Visit my facebook account :)</a>
        </ul>
        </div>
        <div id="right"><a href="chat">Chat With Me :)</a><a href="hire">Hire Me :)</a></div>

            
        </div>
        <div id="center">
                <div id="btnArea">
                <a class="btnBtn" href="#body"><p></p></a>
                </div>
            </div>

            <div id="showPopup">
            <div class="close">x</div>
            <div id= 'select'><form action= 'dynamic_data' method='POST' enctype='multipart/form-data'>
        <input type='file' name='uprofilePic' id= 'uprofilePic'/>
        <input type='submit' name='submit' id='addProfile' value='Add Profile_pic'/>
        </form></div>
        </div>
        
        <div id="searchPopup">
            <div id="close">x</div>
            <div id="search_div">
				
                <input type="text" id="search" name="search" autocomplete="off"/>
                <button class="searchBtn" name="ssubmit" id="ssubmit">Search</button>
                </div> 
                
                <div id="searchMain">
                    <h3>Search results:</h3>
                <div id="searchBody">
                  
                </div>
        </div>
        </div>

        <div id="body">
        <div id="addSection">
             <div id="addBox"></div>
         </div>

         <div id="heading"><h3>Check Out myProjects :)</h3></div>
         <div class="myProjects">
             <!-- <div id="prev"><</div>
             <div id="next">></div> -->
             <!-- <div id="projectSection"> -->
                 <?php
// require_once "functions.php";
// $obj1= new functions('projects');
$obj->setTable('projects');
$presult= $obj->select_project();
$size= sizeof($presult);
//   echo "<pre>";
//   print_r($result);
for ($i=0; $i < $size; $i++) { 
  # code...

?>
                 <div class="project"><?php echo $presult[$i]['title']; ?>
                  <div class="description">
                  <?php echo $presult[$i]['description']; ?>
                  </div>
                  <div class="buttons">
                      <a href="<?php echo $presult[$i]['folder']."/".$presult[$i]['file']; ?>" class="checkOut" target="_blank">Let see</a>
                      <a href="sourceCodeDownload?download=<?php echo $presult[$i]['folder']; ?>" class="sourceCode">Source Code</a>
                  </div>
              </div>
<?php } ?>

             <!-- </div> -->
         </div>
<!-- Project section ended -->
<!-- body Section -->
        </div>
        <!-- Main Section -->
        <div id="mainslideNav">
<div id="slideNav">
    <button class="about active">About</button>
    <button class="services">Services</button>
</div>
<div id="slideSection">
<div id="about">
    <div class="abtcenter">
<div class="mcenter">
    I am a <b>WEB DEVELOPER</b>.
        <br><br>
        <address>To checkout my git repository:</address>
        <br>
        <a href="https://www.github.com/Jharaju/">https://www.github.com/Jharaju/</a>
        <br><br>
        <a href="about"><b class="mabt">More About</b></a>
    </div>
        </div>
</div>
<div id="services">
<div class="servcenter">
<div class="mcenter">
- Providing best <b>Web Based Applications</b> written on different languages based on your <b>requirements.</b><br><br>
<a href="services"><b class="mabt">Details..</b></a>

</div>
</div>
</div>
</div>
</div>
<?php include_once "footer.php"; ?> 
<style>#footer{background-color: darkslategray; box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;}</style>

</div>
    <script type="text/javascript" src="links/jquery-3.6.0.min.js"></script>
<script>
    window.onload= function(){
        document.getElementById('loader').style.display= 'none';
        document.getElementById('main').style.display= 'block';
    }
    $(document).ready(function(){
        
       $('#addpic').click(function(){
                   $('#showPopup').fadeIn('fast');
                   $('#popupOut').fadeOut('fast');
                   $('#select').fadeIn('fast');
        
           $(document).on('click', '.close', function(){
            $('#showPopup').fadeOut('fast');
                
           });
       });
    

$('.about').click(function(){
    $('.about').addClass('active');
    $('.services').removeClass('active');
    $('#services').fadeOut('fast');
    $('#about').fadeIn('fast');
});
$('.services').click(function(){
    $('.services').addClass('active');
    $('.about').removeClass('active');
    $('#about').fadeOut('fast');
    $('#services').fadeIn('fast');
});


$.post(
    "postdatas",
    {document: "true"},
    function(cpics){
        // console.log(cpics);
        cpic= JSON.parse(cpics);
        // console.log(cpic);
        // console.log(cpic.length);
        let arr= [];   
        for (let index = 0; index < cpic.length; index++) {
        // const element = array[index];
        arr.push(cpic[index]['cpic']);
    }
    let i= 0;
    $('#cover_pic').attr('src', "images/cover.jpg");
    
        setInterval(() => {
            // cpic.forEach(element => {
                    // const element = array[index];
                    if(i > arr.length){i= 0;}
        if(arr[i]){            
                    $('#cover_pic').attr('src', "images/"+arr[i]);
                    // console.log(i);
                }
                    i++
                // });
            }, 3000);
        
                    
                
    }
);
$('#ssubmit').click(function(e){
    e.preventDefault();
    $('#searchPopup').show();
			   $('#search').focus();

			   $('#close').click(function(){
			$('#searchPopup').hide();
			
		    });

            let srch= $('#search').val();
            $.post(
                "postdatas",
                {search: srch},
                function(data){
                    $('#searchBody').html(data);
                }
            );
});

$('#search_btn').click(function(){
			   $('#searchPopup').show();
			   $('#search').focus();

			   $('#close').click(function(){
			$('#searchPopup').hide();
			
		    });
		    });







    });
    </script>
</body>
</html>