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
		  if(isset($_POST['username']) and isset($_POST['password'])){
			  //collecting data
			  $username = mysql_real_escape_string($_POST['username']);
			  $password = mysql_real_escape_string($_POST['password']);
			  $image = mysql_real_escape_string($_POST['photo']);
			  $admin = mysql_real_escape_string($_POST['admin']);
			  $bio = mysql_real_escape_string($_POST['bio']);
			  $name = mysql_real_escape_string($_POST['name']);
			  $mon =  $_POST['mon'];
			  $tue =  $_POST['tue'];
			  $wed =  $_POST['wed'];
			  $thu =  $_POST['thu'];
			  $fri =  $_POST['fri'];
			  $sat =  $_POST['sat'];
			  $sun =  $_POST['sun'];

              $foto = $_POST['curpic'];//current pic
              $cid  = $_POST['cid'];//content ID

			  if(isset($_FILES['photo']) and !empty($_FILES['photo']['name'])){
				  $ext      = strtolower(strchr($_FILES['photo']['name'],'.'));
				  //cannot exceed 1MB
				  $filezize = round(filesize($_FILES['photo']['tmp_name']) / 1024);
				  //folder
				  $folder  = '../images/users-images/';
				  //filename
				  $filename = time().$ext;
				  //we accept jpg only
				  if($ext=='.jpg' || $ext=='.jpeg' and $filezize < 1024){
				  	
					  move_uploaded_file($_FILES['photo']['tmp_name'], $folder.$filename);
					  mysql_query("UPDATE users SET username='$username',password='$password',photo='$filename',name='$name',bio='$bio',MON='$mon',TUE='$tue',WED='$wed',THU='$thu',FRI='$fri',SAT='$sat',SUN='$sun' WHERE id='$cid'") or exit(mysql_error());
					  @unlink($folder.$foto);

					   //Redimensionar tamaño THUMB GALLERY //

            //Ruta de la original
            $rtOriginal='../images/users-images/'.$filename.'';
                 
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
            imagejpeg($lienzo,'../images/users-images/thumb/'.$filename.'',$cal);

            //FIN Redimensionar tamaño THUMB GALLERY //

                      header('Location: users.php');
				  }else{
				  
					  //exceed 2MB or not JPG
					  header('Location: login.php');
				  }
			  }else{
			
			     //No image have been uploaded
                 //we still save the info
			     mysql_query("UPDATE users SET username='$username',password='$password',name='$name',bio='$bio',MON='$mon',TUE='$tue',WED='$wed',THU='$thu',FRI='$fri',SAT='$sat',SUN='$sun' WHERE id='$cid'") or exit(mysql_error());
                header('Location: users.php');
			  }
		  }else{
		  
			  //data doesnt exist yet
		      header('Location: index.php');
		  }
	  }else{
	  	
		  //how do u get here
		  header('Location: index.php');
	  }
?>