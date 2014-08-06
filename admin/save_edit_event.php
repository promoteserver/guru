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
	  
	  //clicking on save
	  if(isset($_POST['save'])){
		  if(isset($_POST['title']) and isset($_POST['introduction'])){
			  //collecting data
			  $title = mysql_real_escape_string($_POST['title']);
			  $intro = mysql_real_escape_string($_POST['introduction']);
			  $content = mysql_real_escape_string($_POST['content']);
			  $event_id=$_POST['eventId'];
			  $date=mysql_real_escape_string($_POST['datepicker']);       		
              $newDate = date("Y-m-d", strtotime($originalDate));
       

           
			
			     //No image have been uploaded
                 //we still save the info
			     mysql_query("UPDATE events SET title='$title',introduction='$intro',content='$content',start='$newDate' WHERE id='$event_id'") or exit(mysql_error());
                 header('Location: events.php');
		 }
		 else{
		  
			  //data doesnt exist yet
		      header('Location: index.php');
		  }
	  }else{
	  	
		  //how do u get here
		  header('Location: index.php');
	  }
}?>