<?php
      session_start();
      
	  $_SESSION['username']="";
	  include('cargador.php');
	  
	  $objDb  = new connectionDb();
	  $objLog = new Login();
	  
	  $objDb->create_Connection();
	  
	  if($objLog->verify_Params($_POST['username'],$_POST['password'])==false){
		  header('Location: index.php?fix=uspw');
	  }else{
	  	  $_SESSION['ACCSS'] = true;
	  	  $_SESSION['username'] = $_POST['username'];
			
		  header('Location: login.php');
	  }
	  
	  

?>