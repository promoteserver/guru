<?php
      session_start();
	  $user_name= $_SESSION['username'];
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
<link rel="stylesheet" href="css/admin.css" type="text/css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>


<script>
$(function () {
$("#datepicker").datepicker();
});
</script>

</head>

<body>
<?php include "header_html.php" ;?>
<div id="interface">
  <div class="dashBoard-admin">
    <form action="save_event.php" method="post" enctype="multipart/form-data">
      <table border="0">
       <tr>
        <td>Title</td>
        <td><input type="text" name="title" id="title" value="" /></td>
        <?php
       	echo '<td><input type="hidden" name="user_name" value="'.$user_name.'"  /></td>' ; 
        ?>    
       </tr>
       <tr>
        <td>Introduction</td>
        <td><input  style="width:200px;height:150px;" type="text" name="introduction" id="introduction" value="" /></td>
       </tr>
       <tr>
       <td>Content</td>
       <td><textarea type="file" id="content" name="content" /> </textarea></td>
       </tr>    

        <tr>
       <td>Start Date</td>
       <td><input id="datepicker" name="datepicker" type="text" ></td>
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
<?php } ?>