<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<center>
<?php
if ($_POST['guardar']=="Guardar")
{
	$id = $_POST['id'];
	$titulo_espanol = $_POST['titulo_espanol'];
	$titulo_ingles = $_POST['titulo_ingles'];
 	$imagen_nombre= $_FILES["imagen"]["name"]; 
	$file_type = $_FILES['imagen']['type'];
	$imagen_peso= $_FILES["imagen"]["size"]; 
	$imagen_temporal= $_FILES["imagen"]["tmp_name"]; 
	$fecha = $_POST['fecha'];
	$des_espanol = $_POST['des_espanol'];	
	$des_ingles = $_POST['des_ingles'];
	
	if($_POST['titulo_espanol']=="")
	{
		echo '<font color="red">Favor llenar el campo de titulo en espanol</font>';
	}
	else
	if($_POST['titulo_ingles']=="")
	{
		echo '<font color="red">Favor llenar el campo de titulo en ingles</font>';
	}
	else
	if($_POST['fecha']=="")
	{
		echo '<font color="red">Favor llenar el campo de fecha</font>';
	}
	else
	if($_POST['des_espanol']=="")
	{
		echo '<font color="red">Favor llenar el campo de descripcion en español</font>';
	}
	else
	if($_POST['des_ingles']=="")
	{
		echo '<font color="red">Favor llenar el campo de descripcion en ingles</font>';
	}
	else
	{

			   $n        = count($imagen_temporal);
			   $i        = 0;
			 
			   while ($i < $n)
			   {
					$rand_name = md5(time());						
					$rand_name= rand(0,999999999);
					 include("conexion.php");
					 $result = mysql_query("SELECT * FROM tips where id='".$id."'") or die(mysql_error());  
					 // keeps getting the next row until there are no more to get
					if (mysql_num_rows($result) != 0)
					{
						$row = mysql_fetch_array( $result );
						///////ACTUALIZA SI SE SUBE OTRA IMAGEN
						if($imagen_nombre[$i]!="")
						{
							if (@move_uploaded_file($imagen_temporal[$i],"imagenes/".$rand_name.str_replace(" ","",$imagen_nombre[$i])))
								{
									unlink("imagenes/fullscreen/".$row['imagen']);
									unlink("imagenes/".$row['imagen']);
									include("conexion.php");
									mysql_query("UPDATE tips SET titulo_espanol='".$titulo_espanol."', titulo_ingles='".$titulo_ingles."', imagen='".$rand_name.str_replace(" ","",$imagen_nombre[$i])."', fecha='".$fecha."', des_espanol='".$des_espanol."', des_ingles='".$des_ingles."' where id='".$id."'") or die(mysql_error());
									////////////RESIZE IMAGEN AL TAMAÑO GRANDE//////////
										$ruta="imagenes/".$rand_name.str_replace(" ","",$imagen_nombre[$i])."";
										$ThumbWidth=500;
										if($imagen_peso[$i]){						
											if($file_type[$i] == "image/pjpeg" || $file_type[$i] == "image/jpeg"){						
											$fuente = imagecreatefromjpeg($ruta);						
											}elseif($file_type[$i] == "image/x-png" || $file_type[$i] == "image/png"){						
											$fuente = imagecreatefrompng($ruta);						
											}elseif($file_type[$i] == "image/gif"){						
											$fuente = imagecreatefromgif($ruta);						
											}	
										}
										list($width, $height) = getimagesize($ruta);						
											//calculate the image ratio						
											$imgratio=$width/$height;						
											if ($imgratio>1){						
											$newwidth = $ThumbWidth;						
											$newheight = $ThumbWidth/$imgratio;						
											}else{						
											$newheight = $ThumbWidth;						
											$newwidth = $ThumbWidth*$imgratio;						
											}						
										//$fuente = @imagecreatefromjpeg($ruta);
										$imagen = imagecreatetruecolor($newwidth,$newheight);
										
										ImageCopyResized($imagen,$fuente,0,0,0,0,$newwidth,$newheight,$width,$height);
										
										//Header("Content-type: image/png");
										imagejpeg($imagen,"imagenes/fullscreen/".$rand_name.str_replace(" ","",$imagen_nombre[$i])); 
										////////////////////////////////
										
										////////////RESIZE IMAGEN AL TAMAÑO CHICO//////////
								$ruta="imagenes/".$rand_name.str_replace(" ","",$imagen_nombre[$i])."";
								$ThumbWidth=254;
								if($imagen_peso[$i]){						
									if($file_type[$i] == "image/pjpeg" || $file_type[$i] == "image/jpeg"){						
									$fuente = imagecreatefromjpeg($ruta);						
									}elseif($file_type[$i] == "image/x-png" || $file_type[$i] == "image/png"){						
									$fuente = imagecreatefrompng($ruta);						
									}elseif($file_type[$i] == "image/gif"){						
									$fuente = imagecreatefromgif($ruta);						
									}	
								}
								list($width, $height) = getimagesize($ruta);						
									//calculate the image ratio						
									$imgratio=$width/$height;						
									if ($imgratio>1){						
									$newwidth = $ThumbWidth;						
									$newheight = $ThumbWidth/$imgratio;						
									}else{						
									$newheight = $ThumbWidth;						
									$newwidth = $ThumbWidth*$imgratio;						
									}						
								//$fuente = @imagecreatefromjpeg($ruta);
								$imagen = imagecreatetruecolor($newwidth,$newheight);
								
								ImageCopyResized($imagen,$fuente,0,0,0,0,$newwidth,$newheight,$width,$height);
								
								//Header("Content-type: image/png");
								imagejpeg($imagen,"imagenes/thumbnail/".$rand_name.str_replace(" ","",$imagen_nombre[$i])); 
								////////////////////////////////
										echo "<script>alert('Tip Actualizado Correctamente');</script>";
			  			 echo'<script type="text/javascript">top.location.replace("lista-tips.php");</script>';
								}
						}
						////////////////////////
						else
						///////ACTUALIZA SINO SE SUBE OTRA IMAGEN
						{
									include("conexion.php");
									mysql_query("UPDATE tips SET titulo_espanol='".$titulo_espanol."', titulo_ingles='".$titulo_ingles."', fecha='".$fecha."', des_espanol='".$des_espanol."', des_ingles='".$des_ingles."' where id='".$id."'") or die(mysql_error());
									 echo "<script>alert('Tip Actualizado Correctamente');</script>";
			  			 echo'<script type="text/javascript">top.location.replace("lista-tips.php");</script>';
						}
					}
					else
					{
						if($imagen_nombre[$i]!="")
						{
								if (@move_uploaded_file($imagen_temporal[$i],"imagenes/".$rand_name.str_replace(" ","",$imagen_nombre[$i])))
								{ 
								
								include("conexion.php");
								// Insert a row of information into the table 
								mysql_query("INSERT INTO tips (titulo_espanol, titulo_ingles, imagen, fecha, des_espanol, des_ingles) 
							VALUES('$titulo_espanol', '$titulo_ingles' ,'".$rand_name.str_replace(" ","",$imagen_nombre[$i])."', '$fecha', '$des_espanol', '$des_ingles') ") 									or die(mysql_error()); 
								
								////////////RESIZE IMAGEN AL TAMAÑO GRANDE//////////
								$ruta="imagenes/".$rand_name.str_replace(" ","",$imagen_nombre[$i])."";
								$ThumbWidth=500;
								if($imagen_peso[$i]){						
									if($file_type[$i] == "image/pjpeg" || $file_type[$i] == "image/jpeg"){						
									$fuente = imagecreatefromjpeg($ruta);						
									}elseif($file_type[$i] == "image/x-png" || $file_type[$i] == "image/png"){						
									$fuente = imagecreatefrompng($ruta);						
									}elseif($file_type[$i] == "image/gif"){						
									$fuente = imagecreatefromgif($ruta);						
									}	
								}
								list($width, $height) = getimagesize($ruta);						
									//calculate the image ratio						
									$imgratio=$width/$height;						
									if ($imgratio>1){						
									$newwidth = $ThumbWidth;						
									$newheight = $ThumbWidth/$imgratio;						
									}else{						
									$newheight = $ThumbWidth;						
									$newwidth = $ThumbWidth*$imgratio;						
									}						
								//$fuente = @imagecreatefromjpeg($ruta);
								$imagen = imagecreatetruecolor($newwidth,$newheight);
								
								ImageCopyResized($imagen,$fuente,0,0,0,0,$newwidth,$newheight,$width,$height);
								
								//Header("Content-type: image/png");
								imagejpeg($imagen,"imagenes/fullscreen/".$rand_name.str_replace(" ","",$imagen_nombre[$i])); 
								////////////////////////////////
								
								////////////RESIZE IMAGEN AL TAMAÑO CHICO//////////
								$ruta="imagenes/".$rand_name.str_replace(" ","",$imagen_nombre[$i])."";
								$ThumbWidth=254;
								if($imagen_peso[$i]){						
									if($file_type[$i] == "image/pjpeg" || $file_type[$i] == "image/jpeg"){						
									$fuente = imagecreatefromjpeg($ruta);						
									}elseif($file_type[$i] == "image/x-png" || $file_type[$i] == "image/png"){						
									$fuente = imagecreatefrompng($ruta);						
									}elseif($file_type[$i] == "image/gif"){						
									$fuente = imagecreatefromgif($ruta);						
									}	
								}
								list($width, $height) = getimagesize($ruta);						
									//calculate the image ratio						
									$imgratio=$width/$height;						
									if ($imgratio>1){						
									$newwidth = $ThumbWidth;						
									$newheight = $ThumbWidth/$imgratio;						
									}else{						
									$newheight = $ThumbWidth;						
									$newwidth = $ThumbWidth*$imgratio;						
									}						
								//$fuente = @imagecreatefromjpeg($ruta);
								$imagen = imagecreatetruecolor($newwidth,$newheight);
								
								ImageCopyResized($imagen,$fuente,0,0,0,0,$newwidth,$newheight,$width,$height);
								
								//Header("Content-type: image/png");
								imagejpeg($imagen,"imagenes/thumbnail/".$rand_name.str_replace(" ","",$imagen_nombre[$i])); 
								////////////////////////////////
								
								 echo "<script>alert('Tip Creado Correctamente');</script>";
			  			 echo'<script type="text/javascript">top.location.replace("lista-tips.php");</script>';
								}
						}
					}
					 
				  $i++;
			
			   }
  
	  }
}




////ELIMINA UNA IMAGEN
if (isset($_GET["id"]))
{
$id=$_GET["id"];
$imagen=$_GET["imagen"];
 include("conexion.php");
// Get all the data from the "example" table
$result1 = mysql_query("DELETE FROM tips where id='$id'") 
or die(mysql_error());  
unlink("imagenes/fullscreen/".$imagen);
unlink("imagenes/".$imagen);
echo "<script>alert('Tip Eliminado Correctamente');</script>";
echo "<html><head><meta HTTP-EQUIV='Refresh' CONTENT='0; URL=lista-tips.php'></head><body></body></html>";
}
?>
</center>
</body>
</html>