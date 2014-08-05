<?php
      session_start();
	  
	  if(!isset($_SESSION['ACCSS']) || $_SESSION['ACCSS'] == false){
		  header('Location: index.php');
	  }else
	  include('cargador.php');
	  
	  $objDb  = new connectionDb();
	  $objLog = new Login();
	  $objGal = new Gallery();
	  
	  $objDb->create_Connection();
	  
	  //Update Tattos Details
	  if(isset($_GET['desc_es'])){
		  $title_es = mysql_real_escape_string($_GET['desc_es']);		 
		  $phid     = intval($_GET['pid']);
		  mysql_query("UPDATE users_images SET desc_es='$title_es' WHERE id='$phid'");
	  }else{
		  echo 'D !';
	  }
	  //Update Paints Details
	   if(isset($_GET['desc_es'])){
		  $title_es = mysql_real_escape_string($_GET['desc_es']);		 
		  $phid     = intval($_GET['pid']);
		  mysql_query("UPDATE users_paints SET desc_es='$title_es' WHERE id='$phid'");
	  }else{
		  echo 'D !';
	  }

	  //Update Post Gallery Details
	  if(isset($_GET['desc_es'])){
		  $title_es = mysql_real_escape_string($_GET['desc_es']);		 
		  $phid     = intval($_GET['pid']);
		  mysql_query("UPDATE posts_gallery SET desc_es='$title_es' WHERE id='$phid'");
	  }else{
		  echo 'D !';
	  }

  //Update Event Gallery Details
	  if(isset($_GET['desc_es'])){
		  $title_es = mysql_real_escape_string($_GET['desc_es']);		 
		  $phid     = intval($_GET['pid']);
		  mysql_query("UPDATE events_gallery SET desc_es='$title_es' WHERE id='$phid'");
	  }else{
		  echo 'D !';
	  }


?>