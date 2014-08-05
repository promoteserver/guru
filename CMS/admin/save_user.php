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
				  $folder  = '../images/gallery/';
				  //filename
				  $filename = time().$ext;
				  //we accept jpg only
				  if($ext=='.jpg' || $ext=='.jpeg' and $filezize < 1024){
					  move_uploaded_file($_FILES['photo']['tmp_name'], $folder.$filename);
					  mysql_query("INSERT INTO users (id,username,password,admin,photo,status,bio,name,MON,TUE,WED,THU,FRI,SAT,SUN)
					  VALUES(NULL,'$username','$password','$admin','$filename',1,'$bio','$name','$mon','$tue','$wed','$thu','$fri','$sat','$sun')")
					  or exit(mysql_error());
					  header('Location: login.php');
				  }else{
					  echo ' exceed 2MB or not JPG';
					 //header('Location: index.php');
				  }
			  }else{
			  	echo'La imagen esta vacia o no esta seteada<br>';
			     //header('Location: create_user.php');
			  }
		  }else{
			  	echo'No setea username ni el password o la imagen<br>';
		  }
	  }else{
	  	echo'Problema en SAVE<br>';
		  //how do u get here
		 // header('Location: index.php');
	  }
?>