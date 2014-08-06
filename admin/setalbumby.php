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
	  
	  if(isset($_GET['ord']) and isset($_GET['alb'])){
		  $IdA = intval($_GET['alb']);
		  $act = mysql_real_escape_string($_GET['ord']);

			  mysql_query("UPDATE albums SET position='$act' WHERE id='$IdA'");
		  header('Location: '.$_SERVER['HTTP_REFERER']);
	  }else{
		  header('Location: index.php');
	  }
	  
?>