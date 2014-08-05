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
	  
	  if(isset($_GET['pic']) and !empty($_GET['pic'])){
		  $picId = intval($_GET['pic']);
		  @unlink('../images/gallery/zoom/'.$objGal->picToRemoveEvent($picId));
		  mysql_query("DELETE FROM events_gallery WHERE id='$picId'");
		  header('Location: '.$_SERVER['HTTP_REFERER']);
	  }else{
		  header('Location: index.php');
	  }
	  
?>