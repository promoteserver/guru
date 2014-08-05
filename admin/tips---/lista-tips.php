<? session_start(); ?>
<?php //include("validar.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
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
<center>
        <table width="1075" border="0">
          <tr>
          <td width="1069"><a href="crear-tips.php">Agregar</a>
          </tr>
          <?php
$texto="'Esta seguro que desea borrar este tip?'";
 include("conexion.php");
// Get all the data from the "example" table
$result = mysql_query("SELECT * FROM tips order by id desc") 
or die(mysql_error()); 
while($row = mysql_fetch_array( $result ))
{
	echo '<tr>
	<td style="border-bottom:#FF0000 1px solid;">';
	echo "<div style='float:left; width:900px;border:#FF0000 0px solid;'>".$row['titulo_espanol']. " / ". $row['titulo_ingles']."</div>";
	echo'<div align="right" style="float:left; width:160px;border:#FF0000 0px solid;"><a href="crear-tips.php?id='.$row['id'].'">Editar</a> | <a href="procesos.php?id='.$row['id'].'&imagen='.$row['imagen'].'" onclick="if(!confirm('.$texto.'))return false">Eliminar</a></div></td>
       </tr>';
}

?>
            
        </table>
</center>
</body>

</html>

