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
<script type="text/javascript" src="../js/jquery.js"></script>
<script src="tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="js/scripts.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/admin.css" type="text/css" />
</head>

<body>
<?php include "header_html.php" ;?>

<div id="interface">
  <div class="dashBoard-admin">
  <?php if(isset($_GET['bug']) and $_GET['bug'] == "subc"){
      echo '<div class="alerta">The gallery have photos. Delete that and try again</div>';
  }
  ?>
  <table border="0" style="width:600px">
  <tr>
  <th>Username</th>
  <th>Tattoo's</th>
  <th>Paints</th>
  <?php 
  if($cUserRole==1) {

  	echo'  <th width="150">Options</th>';
  }

  ?>
  <th>Role</th>
  </tr>
    <?php
    	  if($cUserRole != 1) // Si es Artista ve solamente su usuario
    	  {
	      	$sql = mysql_query("SELECT * FROM  users where id=$cUserId  ORDER BY id DESC");
	      }	
	      else{ //si es Admin ve todos los usuarios

	      	$sql = mysql_query("SELECT * FROM  users ORDER BY id DESC");
	      }
		  while($row = mysql_fetch_array($sql)){
			  echo '<tr>
                    <td><a href="edit_user.php?cx='.$row['id'].'">'.$row['username'].'</a></td>
					<td>
					<a href="add_tattoo_photos.php?albid='.$row['id'].'">
					<img src="images/icons/new_album.png" border="0" />
					</a>
					&nbsp;('.$objGal->countGaleryPic($row['id']).')
					</td>
					<td>
					<a href="add_paint_photos.php?albid2='.$row['id'].'">
					<img src="images/icons/new_album.png" border="0" />
					</a>
					&nbsp;('.$objGal->countGaleryPic2($row['id']).') 
					</td>
					
					';
					if($cUserRole==1) //Si es admin puede eliminar usuarios
					{

					echo'<td><a href="javascript:deleteCat('.$row['id'].')">
					<img src="images/icons/delete.png" border="0" /></a>&nbsp;&nbsp
							
											
						<a href="edit_user.php?cx='.$row['id'].'">
						<img src="images/icons/edit.png" border="0" />
						</a>		
					</td>';
					}
					if($row['admin']==1)
					{
						$role='Admin';
					}
					else{
						$role='Artist';
					}
					echo
					' <td><a href="">'.$role.'</a></td>                
				   </tr>';
		  }
	?>
    </table>
    </div>
    </div>
				
<script type="text/javascript">
//jQuery code goes here
$(document).ready(function(){
	$('tr:odd').addClass('odd');
	$('tr:even').addClass('even');
});
</script>
</body>
</html>
<?php } ?>