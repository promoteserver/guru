<?php
      session_start();
	  
	  if(!isset($_SESSION['ACCSS']) || $_SESSION['ACCSS'] == false){
		  header('Location: index.php');
	  }else
	  include('cargador.php');
	  
	  $objDb  = new connectionDb();
	  $objLog = new Login();
	  
	  $objDb->create_Connection();
	  
	  //clicking on save
	  if(isset($_POST['save'])){
		  if(isset($_POST['username']) and isset($_POST['password']) and $_POST['username'] != "" and $_POST['password'] != ""){
		  	if($_POST['name']!="")
		  	{
			  //collecting data
			  $username = mysql_real_escape_string($_POST['username']);
			  $password = mysql_real_escape_string($_POST['password']);
			  $image = mysql_real_escape_string($_POST['photo']);
			  $admin = mysql_real_escape_string($_POST['admin']);
			  $bio = mysql_real_escape_string($_POST['bio']);
			  $name = mysql_real_escape_string($_POST['name']);
			  $mon = mysql_real_escape_string($_POST['mon']);
			  $tue = mysql_real_escape_string($_POST['tue']);
			  $wed = mysql_real_escape_string($_POST['wed']);
			  $thu = mysql_real_escape_string($_POST['thu']);
			  $fri = mysql_real_escape_string($_POST['fri']);
			  $sat = mysql_real_escape_string($_POST['sat']);
			  $sun = mysql_real_escape_string($_POST['sun']);
			  if(isset($_FILES['photo']) and !empty($_FILES['photo']['name'])){
				  $ext      = strtolower(strchr($_FILES['photo']['name'],'.'));
				  //cannot exceed 1MB
				  $filezize = round(filesize($_FILES['photo']['tmp_name']) / 1024);
				  //folder
				  $folder  = '../images/users-images/';
				  //filename
				  $filename = time().$ext;
				  //we accept jpg only
				  $tempFilee=imagecreatefromjpeg($_FILES['photo']['tmp_name']);
				  $wi_source = imagesx($tempFilee);
      			  $he_source = imagesy($tempFilee);
      			  $status=0;
      			  if($wi_source == $he_source and $wi_source>=50 and $he_source>=50)
      			  {
				  if($ext=='.jpg' || $ext=='.jpeg' and $filezize < 1024){
					  move_uploaded_file($_FILES['photo']['tmp_name'], $folder.$filename);
					  mysql_query("INSERT INTO users (id,username,password,admin,photo,status,bio,name,MON,TUE,WED,THU,FRI,SAT,SUN)
					  VALUES(NULL,'$username','$password','$admin','$filename',1,'$bio','$name','$mon','$tue','$wed','$thu','$fri','$sat','$sun')")
					  or exit(mysql_error());
					          //Redimensionar tamaño 50x50 para post //

				            //Ruta de la original
				            $rtOriginal='../../images/gallery/zoom/'.$newName.'';
				                 
				            //Crear variable de imagen a partir de la original
				            $original = imagecreatefromjpeg($rtOriginal);
				                 
				            //Definir tamaño máximo y mínimo
				            $ancho_final = 50;
				            $alto_final = 50;
				             
				            //Recoger ancho y alto de la original
				            list($ancho,$alto)=getimagesize($rtOriginal);
				             
				            $lienzo=imagecreatetruecolor($ancho_final,$alto_final);
				             
				            //Copiar $original sobre la imagen que acabamos de crear en blanco ($tmp)
				            imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
				             
				            //Limpiar memoria
				            imagedestroy($original);
				             
				            //Definimos la calidad de la imagen final
				            $cal=90;
				             
				            //Se crea la imagen final en el directorio indicado
				            imagejpeg($lienzo,'../../images/users-images/'.$newName.'',$cal);

				            //FIN Redimensionar tamaño 50x50 //
					  header('Location: login.php');
				  }
				  else{
						echo'<script type="text/javascript">
					function redireccionar(){
					  window.location="create_user.php";
					} 
					
					setTimeout ("redireccionar()", 1000); //tiempo expresado en milisegundos
					alert("Image format error. Check if the image is .JPG");
					</script>';
				  }
				
				}else{
						echo'<script type="text/javascript">
					function redireccionar(){
					  window.location="create_user.php";
					} 
					
					setTimeout ("redireccionar()", 1000); //tiempo expresado en milisegundos
					alert("Please select a square image.Min size:50 x 50 px.Thanks.");
					</script>';
				}
				
			  }else{
			  	echo'<script type="text/javascript">
					function redireccionar(){
					  window.location="create_user.php";
					} 
					
					setTimeout ("redireccionar()", 1000); //tiempo expresado en milisegundos
					alert("Image cannot be empty");
					</script>';
		
			  }
		  }else{
			  	  	echo'<script type="text/javascript">
					function redireccionar(){
					  window.location="create_user.php";
					} 
					
					setTimeout ("redireccionar()", 1000); //tiempo expresado en milisegundos
					alert("Name Cannot be empty!");
					</script>';
		  }
		 }else{
		  	 	echo'<script type="text/javascript">
					function redireccionar(){
					  window.location="create_user.php";
					} 
					
					setTimeout ("redireccionar()", 1000); //tiempo expresado en milisegundos
					alert("User or Password Cannot be empty!");
					</script>';
		  }
	  }else{
	  	echo'Problema en SAVE<br>';
		  //how do u get here
		 // header('Location: index.php');
	  }
	  ob_start();
?>