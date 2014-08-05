<?php
      session_start();
	   $user_name= $_SESSION['username'];
	  if(!isset($_SESSION['ACCSS']) || $_SESSION['ACCSS'] == false){
		  header('Location: index.php');
	  }else{
	  include('cargador.php');
	  
	  $objDb  = new connectionDb();
	  $objLog = new Login();
	  
	  $objDb->create_Connection();
	  
	  $postTitleCount=strlen($_POST['title']);


	  $introCount=strlen($_POST['introduction']);

	  $contentCount=strlen($_POST['content']);
	  $currentDate = date('m/d/Y');
	  $currentDate2 = date('Y-m-d H:i:s');

 

	  //clicking on save
	  if(isset($_POST['save']))
	   {
		  if(isset($_POST['title']) and $postTitleCount <=45)
		  {
			   if(isset($_POST['introduction']) and $introCount >=100)
			   {
				   if(isset($_POST['content']) and $contentCount >=300)
				   	{
				   	if(isset($_POST['datepicker']) and $_POST['datepicker']>= $currentDate)
				   	
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
				      $newDate= date("Y-m-d", strtotime($date));
				      
				      
					  mysql_query("INSERT INTO events (id,title,introduction,content,user_id,created,modified,start,type) VALUES(NULL,'$title','$introduction','$content','$user_id','$currentDate2','$currentDate2','$newDate','e')") or exit(mysql_error());

					    echo'<script type="text/javascript">
					        function redireccionar(){
					          window.location="events.php";
					        } 
					        
					        setTimeout ("redireccionar()", 500); //tiempo expresado en milisegundos
					        alert("Event Created.");
					        </script>';				 			 
					}//end if datepicker
					else{
						echo'<script type="text/javascript">
					        function redireccionar(){
					          window.location="create_event.php";
					        } 
					        
					        setTimeout ("redireccionar()", 1000); //tiempo expresado en milisegundos
					        alert("Error: Datetime incorrect.");
					        </script>';	
					} //end else datepicker
				    }//end if content
				    else{
				    	echo'<script type="text/javascript">
					        function redireccionar(){
					          window.location="create_event.php";
					        } 
					        
					        setTimeout ("redireccionar()", 1000); //tiempo expresado en milisegundos
					        alert("Error: Content must be at least 300 characters.Try Again.");
					        </script>';	
					    }//end else content
				}//end if intro
				else{
					echo'<script type="text/javascript">
					function redireccionar(){
					window.location="create_event.php";
					} 					        
					setTimeout ("redireccionar()", 1000); //tiempo expresado en milisegundos
					alert("Error: Introduction must be at least 100 characters.Try Again.");
					</script>';
				}//end else intro
			}//end if title
			else{
				echo'<script type="text/javascript">
			function redireccionar(){
			window.location="create_event.php";
			} 					        
			setTimeout ("redireccionar()", 1000); //tiempo expresado en milisegundos
			alert("Error: The title has to be under 45 characters.Try Again.");
			</script>';

			}//end else title
	    }//end if save
	    else
	    {
	  	echo'<script type="text/javascript">
		function redireccionar(){
		window.location="create_event.php";
		} 					        
		setTimeout ("redireccionar()", 1000); //tiempo expresado en milisegundos
		alert("Error: Problem with save.Check the fields and try again.");
		</script>';	
	    } // end else save

	}
?>