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
<link href="uploadfiles/uploadify.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="uploadfiles/swfobject.js"></script>
<script type="text/javascript" src="uploadfiles/jquery.uploadify.v2.1.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#uploadify").uploadify({
		'uploader'       : 'uploadfiles/uploadify.swf',
		'script'         : 'uploadfiles/uploadify_img.php?albid=<?=@$_GET['albid']?>',
		'cancelImg'      : 'uploadfiles/cancel.png',
		'folder'         : 'images/gallery/zoom/',
		'queueID'        : 'fileQueue',
		'auto'           : true,
		'multi'          : true
	});
});
</script>
<script src="tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="js/scripts.js" type="text/javascript"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<link rel="stylesheet" href="css/admin.css" type="text/css" />
</head>


<body>

<?php include "header_html.php" ;?>

<div id="interface">
  <div class="dashBoard-admin">
  	 	<h1><?php echo $username; ?> : Paints</h1>
  	<div style="width: 500px;margin:0 0 20px 0">
<div style="width:400px;margin: 20px 10px 10px 0;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:12px;color:#D70000">
Check the image format. They should be .JPG format . Thanks!
</div>
<div id="fileQueue"></div>
<input type="file" name="uploadify" id="uploadify" />
</div>
    <?php
	     if(isset($_GET['albid']) and !empty($_GET['albid']) ){
			 $albId = intval($_GET['albid']);
			 $sql = mysql_query("SELECT * FROM users_images WHERE user_id='$albId'");
			 $cnt = mysql_num_rows($sql);
			 if($cnt > 0){
				 while($row = mysql_fetch_array($sql)){
					 echo '<div class="thumb-case">
					       <img src="../thumbnail.php?src=/images/gallery/zoom/'.$row['photo'].'&h=60&w=100&q=90" class="thubm_view" />
						   <a href="javascript:deletePic('.$row['id'].')">
						   <img src="images/icons/delete.png" border="0" class="icons" /></a>
						   &nbsp;&nbsp;
						   <a href="javascript:addDetails('.$row['id'].')">
						   <img src="images/icons/edit.png" border="0" class="icons" />
						   </a>
						   <div id="thumb_'.$row['id'].'" style="display:none" class="opt">
						   <table border="0">						 
						   <tr>
						   <td>Description:	
						   <input type="text" value="'.$row['desc_es'].'" id="desc_'.$row['id'].'">
						   </td>
						   </tr>						
						   <tr>
						   <td>
						   <input type="button" value="Save" onclick="saveDetails('.$row['id'].')">
						   </td>
						   </tr>
						   </table>
						   </div>
						   </div>';
				 }
			 }
		 }
	?>
    <!--<img src="../thumbnail.php?src=/images/gallery/dekora.jpg&h=60&w=90&q=90" />-->
    </div>
    </div>
</body>
</html>
<?php } ?>