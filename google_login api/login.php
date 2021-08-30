<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

<?php
	
    require_once "config.php";
	// if (isset($_SESSION['access_token'])) {
		// header('Location: google_index.php');
		// exit();
	// }
	$loginURL = $gClient->createAuthUrl();
?>



<?php  

?>
<h1 id="main_heading">Login to Your Account :)</h1>
<div id="main">
    
    
    <div id="center">
        <div class="via">
       
        <input type="button" onclick="window.location = '<?php echo $loginURL ?>';"  name="google" value="Login with Google" class="btn btn-block btn-social btn-google">
        <!-- <a href="#" id="via_google">Signup via google</a> -->
        
        </div>
          <div><p id="main_mssg"><?php if(isset($_SESSION['mssg'])){echo $_SESSION['mssg'];}
        // if(isset($_GET['un'])){
            // write code to count time.
    
        // } ?></p></div>
        <form id="login_form" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
          <div>Name or Email: <input type="text" id="lname" name="lname" required autocomplete="off" ></div>
          <div>Password: <input type="password" id="lpass" name="lpass" autocomplete="off" required ></div>
          <div>Select your role: <select id="role" name="role" required >
          <option value="User">User</option>
          <option value="Member">Member</option>
          </select>
          </div>
          <div id="llastsec">
          <div><input type="submit" value="Login" id="lsubmit" name="lsubmit" required ></div>
          <div class="signanchor">Dont have an account: <a href="#" id="donthaveanaccount">Signup</a></div>
    </div>
        </form>
        <?php  

?>
    </div>
</div>
    
</body>
</html>