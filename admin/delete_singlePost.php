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
	  
	  if(isset($_GET['cat']) and !empty($_GET['cat'])){
		  $picId = intval($_GET['cat']);
		  if($objGal->countGaleryPicPost($picId) > 0){
			  //we must remove photos
			  header('Location: categories.php?bug=subc');
		  }else{
			  mysql_query("DELETE FROM posts WHERE id='$picId'");
			  header('Location: posts.php');
		  }
	  }else{
		  header('Location: index.php');
	  }
	  
?>