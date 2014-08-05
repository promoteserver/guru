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
	  
	  if(isset($_GET['alb']) and !empty($_GET['alb'])){
		  $IdA = intval($_GET['alb']);
		  $act = mysql_real_escape_string($_GET['ac']);
		  if($act=='off'){
			  mysql_query("UPDATE users SET status=0 WHERE id='$IdA'");
		  }else{
			  mysql_query("UPDATE users SET status=1 WHERE id='$IdA'");
		  }
		  header('Location: '.$_SERVER['HTTP_REFERER']);
	  }else{
		  header('Location: index.php');
	  }
	  
?>