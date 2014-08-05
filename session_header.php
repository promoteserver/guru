<?php
      session_start();
	   $username= $_SESSION['username'];
	  if(!isset($_SESSION['ACCSS']) || $_SESSION['ACCSS'] == false){
		  header('Location: index.php');
	  }else{
	  include('cargador.php');
	  
	  $objDb  = new connectionDb();
	  $objLog = new Login();
	  $objGal = new Gallery();
	  //we connected
	  $objDb->create_Connection();
	  $sql = mysql_query("SELECT * FROM users where username LIKE '%$username%' ");   
      $row=mysql_fetch_array($sql);
      $cUserId=$row['id']; //ACTUAL USER ID
      $cUserRole=$row['admin']; // USER ROLE
