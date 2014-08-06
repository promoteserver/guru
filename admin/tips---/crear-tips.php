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
	   div6 = document.getElementById('ventanita');
       div6.style.display = 'block';
		document.formulario.submit();   
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
<?php
$id=$_GET['id'];
 include("conexion.php");
// Get all the data from the "example" table
$result = mysql_query("SELECT * FROM tips where id='".$id."'") 
or die(mysql_error()); 
$row = mysql_fetch_array( $result );

?>
<center>
      <form action="procesos.php" method="post" enctype="multipart/form-data" name="formulario" id="formulario" target="ventana">
      <div id="ventanita" style="display:none;"> <iframe src="" name="ventana" width="500" height="40" scrolling="si" frameborder="0" id="ventana" style="border:#0066CC 0px solid;" border="0"> El explorador no admite los marcos flotantes o no está configurado actualmente para mostrarlos. </iframe></div></font>
      <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
        <table width="1008" border="0">
          <tr>
            <td width="205" align="right">Titulo Español: </td>
            <td colspan="2" align="left"><input name="titulo_espanol" type="text" size="85" maxlength="76" id="titulo_espanol" value="<?php echo $row['titulo_espanol']; ?>"/> 
              76 caracteres max.</td>
          </tr>
          <tr>
            <td align="right">Titulo Inglés:</td>
            <td colspan="2" align="left"><input name="titulo_ingles" type="text" size="85" maxlength="76" id="titulo_ingles" value="<?php echo $row['titulo_ingles']; ?>" /> 
              76 caracteres max.</td>
          </tr>
          <tr>
            <td align="right">Imagen:</td>
            <td colspan="2" align="left"><input type="file" name="imagen[]"/></td>
          </tr>
          <tr>
            <td colspan="3" align="center">
             <?php
             include("conexion.php");
		// Get all the data from the "example" table
		$result1 = mysql_query("SELECT * FROM tips where id='".$_GET['id']."'") 
		or die(mysql_error()); 
		if (mysql_num_rows($result1) != 0)
		{
			$row1 = mysql_fetch_array( $result1 );
            echo '<img src="imagenes/fullscreen/'.$row1['imagen'].'" />';
		}
			?></td>
          </tr>
          <tr>
            <td align="right">Fecha:</td>
            <td colspan="2" align="left"><input type="text" name="fecha" value="<?php echo $row['fecha']; ?>" /><input type="button"  onClick="showCal('Calendar1')" value="Calendario"></td>
          </tr>
          <tr>
            <td align="right">Descripción:</td>
            <td width="466" align="left"> Español</td>
            <td width="319" align="left">Inglés</td>
            </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="left">
            <textarea name="des_espanol" cols="50" rows="10" id="textarea1" style="border:#000000 1px solid;"><?php echo $row['des_espanol']; ?></textarea>
            <script language="JavaScript1.2" type="text/javascript">
 			 generate_wysiwyg('textarea1');
			</script></td>
            <td align="left">
            <textarea name="des_ingles" cols="50" rows="10" id="textarea2" style="border:#000000 1px solid;"><?php echo $row['des_ingles']; ?></textarea>
			<script language="JavaScript1.2" type="text/javascript">
  			generate_wysiwyg('textarea2');
			</script></td>
          </tr>
          <tr>
            <td align="left"><br /></td>
            <td align="left"><input type="submit" name="guardar" onclick="return enviar();" value="Guardar" /><input type="button" value="Cancelar" onclick="window.location='lista-tips.php'" /></td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr>
            <td height="2" colspan="3"></td>
          </tr>
        </table>
  </form>
</center>
</body>

</html>

