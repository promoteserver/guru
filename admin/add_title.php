<?php
      session_start();
	  
	  if(!isset($_SESSION['ACCSS']) || $_SESSION['ACCSS'] == false){
		  header('Location: index.php');
	  }else{
	  include('cargador.php');
	  
	  $objDb  = new connectionDb();
	  $objLog = new Login();
	  $objGal = new Gallery();
	  //we connected
	  $objDb->create_Connection();
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
<div id="header">
 <div class="header-txt">
 Dekora Administrador de Contenido
 <span>Admin Pro Control Panel</span>
 </div>
</div>
<div class="logout">
<a href="login.php">Inicio</a>&nbsp;|&nbsp;
<a href="logout.php">Cerrar sesi&oacute;n</a>
</div>
<div id="interface">
  <div class="dashBoard-admin">
  <table border="0" style="width:600px">
  <tr>
  <th>T&iacute;tulo</th>
  <th>T&iacute;tulo Galer&iacute;a</th>
  </tr>
    <?php
	      $sql = mysql_query("SELECT * FROM albums WHERE imgtitle_es='' and imgtitle_en='' ORDER BY id DESC");
		  $cnt = mysql_num_rows($sql);
		  if($cnt > 0){
			  while($row = mysql_fetch_array($sql)){
				  echo '<tr>
                        <td><a href="crear_title.php?albid='.$row['id'].'">'.$row['title_es'].'</a></td>
					    <td>
					    <a href="crear_title.php?albid='.$row['id'].'">
					    <img src="images/icons/add_title.png" border="0" />
					    </a>
					    </td>
                        </tr>';
			  }
		  }else{
			  echo '<tr>';
			  echo '<td colspan="2">';
			  echo '<a href="edit_title.php">Haga click en Edit T&iacute;tulo para editar los t&iacute;tulos</a></td>';
			  echo '</tr>';
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