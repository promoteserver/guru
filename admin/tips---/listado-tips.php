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
 <table width="645" border="0">

   <tr>

     <td width="639">

     	<?php



######Configuración#######

                         #

$paginas = 10;            #

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

echo'<table width="603" border="0">
  <tr>
    <td width="597">';
	
    echo'<div style="width:580px; height:134px;padding:0px;">
    <div style="float:left; width:123px; height:122px; padding:3px;">
    <img src="imagenes/fullscreen/'.$row['imagen'].'" width="123" height="122">
    </div>
    <div style="float:left; width:435px; height:122px; padding:3px;" align="left";>';
	echo $row['titulo_espanol']."<br><br>";
    $pieces=explode(" ",$row['des_espanol']);
	$n=count($pieces);
	$i=0;
	for($i = 0; $i < $n; $i++)
	{
		if($i<=30)
		{
		 echo $pieces[$i]." ";
		 if($i==30)
		 {
			echo "..."; 
		 }
		}
	}
    echo'</div>
    </div><br>
    <div style="float:right;width:590px; height:auto;" align="right">
    <br><a href="descripcion-tip.php?pg=1&id='.$row['id'].'">Ver mas...</a>
    </div><br>';
	
	echo'</td>
  </tr>
</table>';

//Aqui termina xD

}

$pag = ($tp == 1) ? pagina : paginas;

$reg = ($total == 1) ? tip : tips;

?>



</td>

   </tr>

 </table>

 <table width="753" border="0">

   <tr>

     <td width="747" align="center"><br><span class='verdana' style='font-weight:normal'>Mostrando <?=$total?> <?=$reg?> en <?=$tp?> <?=$pag?></span><br />

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

echo "<span class='verdana' style='font-weight:normal'><font color='black'><a class='paginacion' href=\"listado-tips.php?pg=".($actual-1)."\">&lt; Anterior</a> | </font></span>";

}

else {

echo "<span class='verdana' style='font-weight:normal'>|</span>";

}

for ($i = 1; $i <= $tp;$i++) {

if ($i == $actual) {

echo "<span class='verdana'> <b>".$i."</b> | </span>";

}

else {

echo "<span style='font-weight:normal;'><font color='black' face='verdana' size='2'><a class='paginacion' href=\"listado-tips.php?pg=".$i."\"> ".$i."</a> |</font></span>";

}

}

if ($siguiente) {

echo " <span class='verdana' style='font-weight:normal'><font color='black'><a class='paginacion' href=\"listado-tips.php?pg=".($actual+1)."\"> Siguiente &gt;</font></a></span>";

}

}

else

{

echo "<font face='verdana' size='2' style='font-weight:normal;' color='red'>No hay tips para mostrar.</font";	

}

?></td>

   </tr>

 </table>


</center>
</body>

</html>

