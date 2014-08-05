<?php
      session_start();
	  
	  if(isset($_SESSION['ACCSS']) and isset($_SESSION['username']) and $_SESSION['ACCSS']==true){
		  unset($_SESSION['ACCSS']);
		   unset($_SESSION['username']);	
		  session_destroy();
		  header('Location: index.php');
	  }
?>