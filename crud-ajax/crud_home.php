<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD USING AJAX</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="stylesheet" href="fontawesome/all.min.css">
    <script type="text/javascript" src="fontawesome/all.min.js"></script>
    
</head>
<body>
<div id="main">
    <h2 id="mainheading">Crud Application Using Ajax Jquery:</h2>

<div id="main_input">
<div id="uinput">
<div> Name: <input type="text" id="uname" name="uname" autocomplete="off"/></div>
<div> Email: <input type="text" id="uemail" name="uemail" autocomplete="off"/></div>
<div> <input type="submit" value="Submit" name="submit" id="submit"/></div>
</div>
<div id="search_div">
<div> <button id="search_btn"><i id="search_icon" class='fa fa-search'></i></button><input type="text" id="search" autocomplete="off"/></div>
</div>
</div>

<div id="tabledatas">
<h2 class="heading2">Your Records:</h2>

<div id="error_msg" class="error_msg">This is error</div>
<div id="success_msg" class="success_msg">This is success msg</div>
</div>

<div id="tables">
<!-- table is loaded here... -->
</div>

<div id="modal_box">
    <div id="modal">
<div> Name: <input type="text" id="ename" name="ename" autocomplete="off"/></td></div>
<div> Email: <input type="text" id="eemail" name="eemail" autocomplete="off"/></td></div>
<div><input type="submit" value="Submit" name="esubmit" id="esubmit"/></div>

<button id="close_modal">x</button>
        
    </div>
</div>


</div>

<script type="text/javascript" src="jquery-3.6.0.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
<script type="text/javascript">
$(document).ready(function(){

// message function:
function message(m){
      if(m['status'] == "false"){
        $(error_msg).fadeIn('slow').html(m.msg);
        setTimeout(() => {
            $(error_msg).fadeOut('slow');
            // $(error_msg).fadeIn('slow').html(m.msg);
        }, 4000);
      }
      if(m['status'] == "true"){
          
        $(success_msg).fadeIn('slow').html(m.msg);
        setTimeout(() => {
            $(success_msg).fadeOut('slow');
            // $(success_msg).fadeIn('slow').html(m.msg);
        }, 4000);
      }
    }

// For Inserting datas into database:
   $('#submit').click(function(){
    let nm= $('#uname').val();
    let eml = $('#uemail').val();

    $("#uname").val('');
    $("#uemail").val('');

    $.ajax({
        url: "insert.php",
        type: "POST",
        data: {name: nm, email: eml},
        success: function(data){
            if(data==1){
                // $(success_msg).fadeIn('slow').html('Insertion completed');
                let mssg= new Array();
                mssg['msg']="Insertion Completed";
                mssg['status']="true";
                message(mssg);
                loadtable();
            }else{
                // $(error_msg).fadeIn('slow').html('Failed to insert');
                let mssg= new Array();
                mssg['msg']="Failed to insert";
                mssg['status']="false";
                message(mssg);
            }
                 }
                });
    
            });

        
            // deleting record from table database:
            $(document).on('click', '#delete_btn', function(){
                if(confirm('Are you sure want to delete the record')){
                let deid= $(this).data('did');
                $.post(
                    "delete.php",
                    {id: deid},
                    function(data){
                        if(data == 1){
                           let mssg= new Array();
                           mssg['msg']= "Record deleted succesful";
                           mssg['status']= "true";
                           message(mssg);
                           loadtable();
                       }else{
                        let mssg= new Array();
                           mssg['msg']= "Record not deleted";
                           mssg['status']= "false";
                           message(mssg);
                           loadtable();

                       }    
                    }
                );    
                    }else{

                    }
                
            });

// To update or edit records:
            $(document).on('click','#edit_btn', function(){
                $('#modal_box').fadeIn('slow');

                $(document).on('click', '#close_modal', function(){
                $('#modal_box').fadeOut('fast');
            });
            
            let eid= $(this).data('eid');

            $.post(
                "fetch_single.php",
                 {id: eid},
                 function(data){
                     $('#modal').html(data);

                 }
            );

            $(document).on('click', '#esubmit', function(){
                let ename= $('#ename').val();
                let eemail= $('#eemail').val();
                
                $.post(
                    "update.php",
                    {id: eid, name: ename, email: eemail},
                    function(data){
                      if(data == 1){
                           let mssg= new Array();
                           mssg['msg']= "Record updated succesful";
                           mssg['status']= "true";
                           message(mssg);
                           loadtable();
                           $('#ename').val('');
                           $('#eemail').val('');
                           $('#modal_box').fadeOut('fast');
                       }else{
                        let mssg= new Array();
                           mssg['msg']= "Record not updated";
                           mssg['status']= "false";
                           message(mssg);

                       }                     
                    }
                );
            });
         });

        //  search functionality:
        $('#search_btn').click(function(){
            $('#search').fadeIn('slow');
            $('#search_btn').hide();
            $('#search').keyup(function(){
                let keyValue= $('#search').val();


                $.post(
                    "search.php",
                    {value: keyValue},
                    function(data){
                      $('#tables').html(data);
                    }
                );
                
            });
        });

        // Pagination functionality:
        // Load_table:
        function loadtable(page){
            $.post(
            "load_pagination.php",
            {page_no: page},
            function(data){
              $('#tables').html(data);            
            }
               );
               
            }
            loadtable();    
            
            $(document).on('click', '#pagination a', function(e){
                e.preventDefault();
                let page= $(this).attr('id');
                loadtable(page);
            });

        

// reset css to make responsive for inputs of modal box
});

</script>
</body>
</html>