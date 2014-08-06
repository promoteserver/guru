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
       		  $post_id=$_POST['post_id'];
			
			     //No image have been uploaded
                 //we still save the info
			     mysql_query("UPDATE posts SET title='$title',introduction='$intro',content='$content' WHERE id='$post_id'") or exit(mysql_error());
                 header('Location: posts.php');
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