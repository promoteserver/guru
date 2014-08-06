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
 <table width="972" border="0">
   <tr>
     <td width="962"><div style="float:left;"><table width="645" border="0">

   <tr>

     <td width="639">

     	<?php



######Configuración#######

                         #

$paginas = 1;            #

$tabla = "tips";  #

                         #

##########################



//$actual = (!isset ($pg))?1:$pg;

$actual = $_GET['pg'];

mysql_connect("dekoradb.db.3916572.hostedresource.com", "dekoradb", "Dekora4living4");

mysql_select_db("dekoradb");

$sql = mysql_query ("SELECT * FROM ".$tabla." order by id desc");

$total = mysql_num_rows ($sql);

if ($actual == 1) {

$desde = "0";

}

elseif ($actual != 1) {

$desde = $actual * $paginas - $paginas;

}

$tp = ($total / $paginas);

if (strstr($tp,'.')){ 

$tp = explode (".",$tp);

$tp = ($tp[0]+1);

}

$resp = mysql_query ("SELECT * FROM ".$tabla." ORDER BY id desc LIMIT ".$desde.",".$paginas."");

if (mysql_num_rows($resp) != 0)

{

while ($row = mysql_fetch_array ($resp)) {

//Aqui parte la parte de modificación
 include("conexion.php");
// Get all the data from the "example" table
$result1 = mysql_query("SELECT * FROM tips where id='".$_GET['id']."'") 
or die(mysql_error());
if (mysql_num_rows($result1) != 0)
{ 
$row1 = mysql_fetch_array( $result1 );
$_SESSION['titulo']=$row1['titulo_espanol'];
$_SESSION['descripcion']=$row1['des_espanol'];
$_SESSION['imagen']="imagenes/fullscreen/".$row1['imagen'];
echo'<table width="669" border="0">
  <tr>
    <td height="21" align="right"><font size="1">Home | Tips e Ideas | '.$row1['titulo_espanol'].'</font></td>
  </tr>
    <tr>
    <td height="21">'.$row1['titulo_espanol'].'</td>
  </tr>
  <tr>
    <td width="663" height="21"><div align="left" style="float:left;"><img src="imagenes/fullscreen/'.$row1['imagen'].'" align="left" style="padding:10px;">'.$row1['des_espanol'].'<br><br>'.$row1['fecha'].'</div></td>
  </tr>
</table>';
}
else
{
	$_SESSION['titulo']=$row['titulo_espanol'];
	$_SESSION['descripcion']=$row['des_espanol'];
	$_SESSION['imagen']="imagenes/fullscreen/".$row['imagen'];
	echo'<table width="669" border="0">
  <tr>
    <td height="21" align="right"><font size="1">Home | Tips e Ideas | '.$row['titulo_espanol'].'</font></td>
  </tr>
    <tr>
    <td height="21">'.$row['titulo_espanol'].'</td>
  </tr>
  <tr>
    <td width="663" height="21"><div align="justify" style="float:left;"><img src="imagenes/fullscreen/'.$row['imagen'].'" align="left" style="padding:10px;">'.$row['des_espanol'].'<br><br>'.$row['fecha'].'</div></td>
  </tr>
</table>';
	
}
//Aqui termina xD

}

$pag = ($tp == 1) ? pagina : paginas;

$reg = ($total == 1) ? tip : tips;

?>



</td>

   </tr>

 </table></div><div style="float:left; width:250px;"><br /><br /><br />
 <?php
 include("conexion.php");
// Get all the data from the "example" table
$result = mysql_query("SELECT * FROM tips order by id desc LIMIT 10") 
or die(mysql_error()); 
while($row = mysql_fetch_array( $result ))
{
	echo '<a href="descripcion-tip.php?pg=1&id='.$row['id'].'">'.$row['titulo_espanol']."<br><br>";
}

?></div></td>
   </tr>
 </table>
 

 <table width="753" border="0">

   <tr>

     <td width="388" align="center">
<?php

$anterior = true;

$siguiente = true;

if (($actual == 1) AND ($actual == $tp)) {

$anterior = false;

$siguiente = false;

}

elseif ($actual == $tp) {

$anterior = true;

$siguiente = false;

}

elseif ($actual == 1) {

$anterior = false;

$siguiente = true;

}

if ($anterior) {

echo "<span class='verdana' style='font-weight:normal'><font color='black'><a class='paginacion' href=\"descripcion-tip.php?pg=".($actual-1)."\">&lt; Anterior</a>  </font></span>";

}

else {

echo "<span class='verdana' style='font-weight:normal'></span>";

}

for ($i = 1; $i <= $tp;$i++) {

if ($i == $actual) {

//echo "<span class='verdana'> <b>".$i."</b> | </span>";

}

else
{
	echo'</td>
     <td width="151" align="center"> ';

//echo "<span style='font-weight:normal;'><font color='black' face='verdana' size='2'><a class='paginacion' href=\"descripcion-tip.php?pg=".$i."\"> ".$i."</a> |</font></span>";

}

}

if ($siguiente) {

echo " <span class='verdana' style='font-weight:normal'><a class='paginacion' href=\"descripcion-tip.php?pg=".($actual+1)."\"> Siguiente &gt;</a></span>";

}

}

else

{

echo "<font face='verdana' size='2' style='font-weight:normal;' color='red'>No hay tips para mostrar.</font";	

}

?></font></td>
     <td width="355" align="center"><!-- AddThis Button BEGIN -->

<!-- AddThis Button END --></td>

   </tr>

 </table>


</center>
</body>

</html>

