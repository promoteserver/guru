<?php
      session_start();
	   $user_name= $_SESSION['username'];
	  if(!isset($_SESSION['ACCSS']) || $_SESSION['ACCSS'] == false){
		  header('Location: index.php');
	  }else
	  include('cargador.php');
	  
	  $objDb  = new connectionDb();
	  $objLog = new Login();
	  
	  $objDb->create_Connection();
	  
	  //clicking on save
	  if(isset($_POST['save']))
	   {
		  if(isset($_POST['title']) and isset($_POST['introduction']) and isset($_POST['content']))
		   {
			  //collecting data
		   	  $user_name= mysql_real_escape_string($_POST['user_name']);
		  	  $result= mysql_query("SELECT * from users where username LIKE '%$user_name%' ");
		   	  $row=mysql_fetch_array($result);
		   	  $user_id = $row['id'];	   	
			  $title = mysql_real_escape_string($_POST['title']);
			  $introduction = mysql_real_escape_string($_POST['introduction']);
			  $content = mysql_real_escape_string($_POST['content']); 
			  $date=mysql_real_escape_string($_POST['datepicker']);
		      $currentDate = date('Y-m-d H:i:s');
		      
		      
			  mysql_query("INSERT INTO events (id,title,introduction,content,user_id,created,modified,start) VALUES(NULL,'$title','$introduction','$content','$user_id','$currentDate','$currentDate','$date')") or exit(mysql_error());

			  header('Location: login.php');				 
	        }
	        else{

	        	echo "aca :) ";
	        }
	    }
	    else

	    {
	  	echo'Problema en SAVE<br>';
		  //how do u get here
		 // header('Location: index.php');
	    }
?>