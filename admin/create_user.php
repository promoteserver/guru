<?php
      session_start();
	  
	  if(!isset($_SESSION['ACCSS']) || $_SESSION['ACCSS'] == false){
		  header('Location: index.php');
	  }else{
	  include('cargador.php');
	  
	  $objDb  = new connectionDb();
	  $objLog = new Login();
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Control Panel Login</title>
<script src="tiny_mce/tiny_mce.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/admin.css" type="text/css" />

</head>

<body>
<?php include "header_html.php" ;?>
<div id="interface">
  <div class="dashBoard-admin">
    <form action="save_user.php" method="post" enctype="multipart/form-data">
      <table border="0">
        <tr>
        <td>Name (*)</td>
        <td><input type="text" name="name" id="name" value="" /></td>
       </tr>
        <tr>
        <td>Bio</td>
        <td><textarea rows='10' cols='50' type="text" name="bio" id="textarea" value="" /></textarea></td>
       </tr>
       <tr>
        <td>Username(*)</td>
        <td><input type="text" name="username" id="username" value="" /></td>
       </tr>
       <tr>
        <td>Password(*)</td>
        <td><input type="password" name="password" id="password" value="" /></td>
       </tr>
       <tr>
       <td>Image(*)</td>
       <td><input type="file" id="photo" name="photo" /></td>
        <td style="color:red;">Please upload a square image. Min: 50 x 50px.</td>
       </tr>
       <tr>
        <td>Admin </td>
        <td><input type="radio"name="admin"  value="0">Admin</input><span> </span>
        <input type="radio"   checked  name="admin" value="1">Artist</input></td>
       </tr>  
         <tr>
        <td>Availabilities </td>
        <td>
        <input type="checkbox" name="mon" value="1">MON</input>
        <input type="checkbox" name="tue" value="1">TUE</input>
        <input type="checkbox" name="wed" value="1">WED</input>
        <input type="checkbox" name="thu" value="1">THU</input>
        <input type="checkbox" name="fri" value="1">FRI</input>
        <input type="checkbox" name="sat" value="1">SAT</input>
        <input type="checkbox" name="sun" value="1">SUN</input>
        </td>
       </tr>     
       <tr>
       <td>&nbsp;</td>
       <td><input type="submit" value="Save" name="save" /></td>
       </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>
<?php } ob_start(); ?>