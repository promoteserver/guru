<?php
      session_start();
	  
	  if(!isset($_SESSION['ACCSS']) || $_SESSION['ACCSS'] == false){
		  header('Location: index.php');
	  }else
	  include('cargador.php');
	  
	  $objDb  = new connectionDb();
	  $objLog = new Login();
	  
	  $objDb->create_Connection();
	  
	  
	  if(isset($_FILES['pho_img_es']) and isset($_FILES['pho_img_en'])){
		  if(!empty($_FILES['pho_img_es']['name']) and !empty($_FILES['pho_img_en']['name'])){
			  //Image extension
			  $albId  = intval($_POST['idalb']);
			  $ext_es = strrchr($_FILES['pho_img_es']['name'],'.');
			  $ext_en = strrchr($_FILES['pho_img_en']['name'],'.');
			  $newNames = 'es_'.time().$ext_es;
			  $newNamen = 'en_'.time().$ext_en;
			  $folder  = '../images/gallery/';
			  move_uploaded_file($_FILES['pho_img_es']['tmp_name'], $folder.$newNames);
			  move_uploaded_file($_FILES['pho_img_en']['tmp_name'], $folder.$newNamen);
			  mysql_query("UPDATE albums SET imgtitle_es='$newNames', imgtitle_en='$newNamen' WHERE id='$albId'");
			  header('Location: login.php');
		  }else{
			  //no images have been uploaded
			  header('Location: '.$_SERVER['HTTP_REFERER']);
		  }
	  }else{
		  //missing parameters
		  header('Location: login.php');
	  }
?>