<?php
    
      session_start();

  
      $username= $_SESSION['username'];
	  if(!isset($_SESSION['username']) || $_SESSION['username'] == false){
		  header('Location: index.php');
	  }else{
	  include('cargador.php');
	  
	  $objDb  = new connectionDb();
	  $objLog = new Login();  
      $objDb->create_Connection();     
      $sql = mysql_query("SELECT * FROM users where username LIKE '%$username%' ");   
      $row=mysql_fetch_array($sql);

      $cUserId=$row['id']; //ACTUAL USER
      $cUserRole=$row['admin']; // USER ROLEe
     
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Control Panel Login</title>
<link rel="stylesheet" href="css/admin.css" />
</head>

<body>
<?php 
  
include "header_html.php" ;
echo 'Welcome ';
echo $username;


?>

<div id="interface">

  <!-- User section-->
  <div class="dashBoard">
    <?php 

    if($cUserRole == 1)
    {
        echo'  

         <div class="btnAdm">
            <img src="images/icons/_add_cat.png" /><br />
            <a href="create_user.php">Add user</a>
        </div> 
        ';
    }
    
    
    ?>
     
    <div class="btnAdm">
    <img src="images/icons/_add_cat.png" /><br />
    <a href="users.php">Edit Profile</a>
    </div>  

    <!-- Post section -->
    <div class="btnAdm">
    <img src="images/icons/_add_cat.png" /><br />
    <a href="create_post.php">Add Post</a>
    </div>
    <div class="btnAdm">
    <img src="images/icons/_add_cat.png" /><br />
    <a href="posts.php">Edit Posts</a>
    </div>

    <!-- Event section -->
    <div class="btnAdm">
    <img src="images/icons/_add_cat.png" /><br />
    <a href="create_event.php">Add event</a>
    </div>
    <div class="btnAdm">
    <img src="images/icons/_add_cat.png" /><br />
    <a href="events.php">Edit Events</a>
    </div>
    
 </div>
</div>
</body>
</html>
<?php } ?>