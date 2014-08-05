<?php
      session_start();
     $username= $_SESSION['username'];
    if(!isset($_SESSION['ACCSS']) || $_SESSION['ACCSS'] == false){
      header('Location: index.php');
    }else{
    include('cargador.php');
    
    $objDb  = new connectionDb();
    $objLog = new Login();
    $objGal = new Gallery();
    //we connected
    $objDb->create_Connection();
    $sql = mysql_query("SELECT * FROM users where username LIKE '%$username%' ");   
      $row=mysql_fetch_array($sql);

      $cUserId=$row['id']; //ACTUAL USER ID
      $cUserRole=$row['admin']; // USER ROLE
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Control Panel Login</title>
<script src="tiny_mce/tiny_mce.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/admin.css" type="text/css" />



</head>

<body >

<?php include "header_html.php" ;?>


<div id="interface">
  <div class="dashBoard-admin">
  <?php 
       if(isset($_GET['cx']) and !empty($_GET['cx'])){ // si obtuve la id por url
		   $cid = intval($_GET['cx']); // traigo la id del usuario por get desde users.php
		   $sql = mysql_query("SELECT * FROM users WHERE id='$cid'"); // seleccionar todos los usuarios mientras la id sea igual a la id capturada por get.
		   $row = mysql_fetch_array($sql);

         
   if($cid ==  $row['id'] && $cUserId == $row['id'] or $cUserRole==1){ //Si existe el post id y pertence al usuario de la session o es administrador
  ?>   
    <form action="save_edit_user.php" method="post" enctype="multipart/form-data"> <!-- Action del form save_edit_users.php -->
      <table border="0">
      <tr>
         <td>Name</td>
        <td><input type="text" name="name" id="name" value="<?=$row['name']?>" /></td>
       </tr>
        <tr>
        <td>Bio</td>
        <td><textarea rows='10' cols='50' type="text" name="bio" id="textarea" value="" /><?=$row['bio']?></textarea></td>
       </tr>
       <tr>
       <tr>
        <td>Username</em></td>
        <td><input type="text" name="username" id="username" value="<?=$row['username']?>" /></td>
       </tr>
       <tr>
        <td>Password</td>
        <td><input type="text" name="password" id="password" value="<?=$row['password']?>" /></td>
       </tr>
       <tr>		       
       <td>Image <br> <br>    <?php echo'<img  src="../images/users-images/thumb/'.$row['photo'].'" />';?></td>       
      
       <td> <br><input type="file" id="photo" name="photo" /></td>
           <td style="color:red;">Please upload a square image. Min: 50 x 50px.</td>
       </tr> 
        <tr>
        <td>Availabilities </td>
        <td>

        <input type="checkbox" id="checkbox1" <?php if ( $row['MON']==1) echo 'checked'; ?> name="mon" value="1">MON</input>
        <input type="checkbox" id="checkbox2" <?php if ( $row['TUE']==1) echo 'checked'; ?> name="tue" value="1">TUE</input>
        <input type="checkbox" id="checkbox3" <?php if ( $row['WED']==1) echo 'checked'; ?> name="wed" value="1">WED</input>
        <input type="checkbox" id="checkbox4" <?php if ( $row['THU']==1) echo 'checked'; ?> name="thu" value="1">THU</input>
        <input type="checkbox" id="checkbox5" <?php if ( $row['FRI']==1) echo 'checked'; ?> name="fri" value="1">FRI</input>
        <input type="checkbox" id="checkbox6" <?php if ( $row['SAT']==1) echo 'checked'; ?> name="sat" value="1">SAT</input>
        <input type="checkbox" id="checkbox7" <?php if ( $row['SUN']==1) echo 'checked'; ?> name="sun" value="1">SUN</input>

        </td>
       </tr> 
       <tr>  
       <td>
       	<?php
       	echo '<input type="hidden" value="'.$row['id'].'" name="cid" />
       <input type="hidden" value="'.$row['photo'].'" name="curpic" />';

       	?>
       <br>
       <input type="submit" value="Save" name="save" />
       </td>
       </tr>
      </table>
    </form>

    <?php 

      }else{

        header('Location: login.php');
      }

  } ?>
  </div>
</div>
</body>
</html>
<?php } ?>