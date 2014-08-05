<? session_start(); ?>
<?php //include("validar.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="stylesheet" href="css/admin.css" type="text/css" />
<script language="javascript" src="scripts/exampleconfig.js"></script>
<script language="javascript" src="scripts/cal2.js"></script>
<script language="javascript" src="scripts/cal_conf2.js"></script>
<script type="text/javascript" src="wysiwyg.js"></script>
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
<script src="facefiles/jquery-1.2.2.pack.js" type="text/javascript"></script>
<link href="facefiles/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="facefiles/facebox.js" type="text/javascript"></script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox() 
    })
	</script>
 <script>
 function enviar()
{
document.formulario.submit();	
}
function confirmar()
{
   if(confirm('¿Seguro que Desea Eliminar la Imágen?'))
   {
	   
   }
   else
   {
	window.stop()  
   }
}
	 
 </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Administrar - Tips</title>



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
<center>
<table width="898" border="0">
          <tr>
          <td width="892" align="left"><a href="crear-tips.php"><img src="agregar.png" border="0" /></a>
          </tr>
<?php
$texto="'Esta seguro que desea borrar este tip?'";
 include("conexion.php");
// Get all the data from the "example" table
$result = mysql_query("SELECT * FROM tips order by id desc") 
or die(mysql_error()); 
while($row = mysql_fetch_array( $result ))
{
	echo'';
	echo '<tr>
	<td style="border-bottom:#FF0000 1px solid;" align="left">';
	echo "<div style='float:left; width:780px;border:#FF0000 0px solid;'><span style='font-family:Lucida Sans Unicode, Lucida Grande, sans-serif;color: #414141;font-size: 14px;'>".$row['titulo_espanol']. " / ". $row['titulo_ingles']."</span></div>";
	echo'<div align="right" style="float:left; width:110px;border:#FF0000 0px solid;"><span style="font-family:Lucida Sans Unicode, Lucida Grande, sans-serif;color: #414141;font-size: 14px;"><a href="crear-tips.php?id='.$row['id'].'">Editar</a> | <a href="procesos.php?id='.$row['id'].'&imagen='.$row['imagen'].'" onclick="if(!confirm('.$texto.'))return false">Eliminar</a></span></div></td>
       </tr>';
}
?>


            
        </table>
</center>
</body>

</html>

