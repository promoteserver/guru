<?php
session_start();

	
	  include('admin/cargador.php');
	  
	  $objDb  = new connectionDb();
	  $objLog = new Login();
	  $objGal = new Gallery();
	  //we connected
	  $objDb->create_Connection();



$sql=mysql_query("SELECT id,photo,post_id,type from posts_gallery union all select id,photo,event_id,type from events_gallery");

$sql32=mysql_query("SELECT id,title,introduction,type,modified as M from events union all select id,title,introduction,type,modified as M from posts order by M desc LIMIT 0,5");
$query=mysql_query("SELECT id from events union all select id from posts");
$count=mysql_num_rows($query);



//$sql2=mysql_query("SELECT @rank:=0+1 as type,id as ident,photo,post_id as contentId from posts_gallery where ident='$contentId' UNION ALL SELECT @rank:=1+1 as type,id as ident,photo,event_id as contentId  from events_gallery as ev where ident='$contentId'  LIMIT 5   ORDER BY ident DESC");
//$gallery=mysql_fetch_array($sql2); // Todos los post & events -> $banner['type']=1 > Gallery Post// $gallery['type']=0 > Gallery Event
?>

<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>GuruTattoo - Our Blog -</title>   

    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon" >
    <link href="css/bootstrap-styles.css" rel="stylesheet">
	<link rel="stylesheet" href="css/styles-mgs.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,800,900,700,600,500,400,200,100' rel='stylesheet' type='text/css'>
	<style>
	.loader{
		bottom:0;
		float:left;
		margin-left: 40%;
		position: fixed;
	}
	.messages{

		font-size:20px;
		bottom:0;
		color:white;

		left:600px;
	
	}
	</style>
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53d0cc927073b138"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
    <script src="js/mapScript.js"></script>
    
    <script class="rs-file" src="js/jquery-1.8.3.min.js"></script>
	<script>
		$(document).ready(function(){
		var load=0;
		var count = <?php echo $count; ?>;
		$('.loader').hide();
			$(window).scroll(function(){

				if($(window).scrollTop()==$(document).height()-$(window).height())
				{			
					$('.loader').show();	
					load++;
					if(load*5 > count)
					{
						$('.messages').text("");
						$('.loader').hide();
					}else{
						$.post("ajax.php",{load:load},function(data){
						$('.wrap').append(data);
						$('.loader').hide();

					});
					}
					

				}	

			});	
		});
	</script>







  </head>

  <body id="home"> <!-- Para indentificar en que pagina estamos -->




   <section class="container">

      <div class="content row">

        

<nav class="navbar navbar-default " role="navigation">



  <!-- El logotipo y el icono que despliega el menú se agrupan



       para mostrarlos mejor en los dispositivos móviles -->



  <div class="navbar-header col-lg-5">



    <section id="branding">



       <a href="index.html"> <img class="img-responsive hidden-logo" src="images/logo_guru03.png" alt="Logo">



         <img class="img-responsive hidden-logo2" src="images/logo_guru02.png" alt="Logo" ></a>



  </section>



 



    <button type="button" class="displaybottom navbar-toggle" data-toggle="collapse"



            data-target=".navbar-ex1-collapse">



      <span class="sr-only">Desplegar navegación</span>



      <span class="icon-bar"></span>



      <span class="icon-bar"></span>



      <span class="icon-bar"></span>



    </button>



  



  </div>



 



  <!-- Agrupar los enlaces de navegación, los formularios y cualquier



       otro elemento que se pueda ocultar al minimizar la barra -->



  <div class="col-lg-1"> </div>



  <div class=" col-lg-7  m-top-50  navbar-ex1-collapse collapse ">



 



    <ul class="nav navbar-nav navbar-right " >



<?php include "navbar.php" ?>




    </ul>



  </div>

  <div class="hidden-xs col-lg-7  m-top-50 ">



 



    <ul class="nav navbar-nav navbar-right " >

<?php include "navbar.php" ?>




    </ul>



  </div>






</nav>



      

        <section class="main">

      <div class="row">

	<div class="col-lg-12">

	  <div class="mainheader">
	    <a class="link" href="recent-events.php">RECENT EVENTS </a> <span><img src="images/arrow1.png" width="15" height="15"><a  class="link" href="blog.php">OUR BLOG</a><img src="images/arrow2.png" width="15" height="15"></span><a class="link" href="event-list.php">EVENTS</a>
	  </div>
	</div>

</div>

<div class="wrap">
<?php    	



while($content=mysql_fetch_array($sql32)) 

{
	$gallery=mysql_fetch_array($sql);
	$contentId=$content['id'];
	$galleryId=$gallery['post_id'];

	if($content['type']=='e') //Si es evento
	{

	$sql100=mysql_query("SELECT e.id as event_id,eg.id as egId ,eg.desc_es as desc_es ,eg.photo as egphoto,e.title as title,e.introduction as introduction,e.start as start from events as e left join events_gallery as eg on eg.event_id=e.id where e.id='$contentId' ");
	$event=mysql_fetch_array($sql100);	
		
	if($event['egphoto'] != NULL) // si evet_gallery es distinto de null
	{
			
						echo'<article class="enventintro media col-lg-12 item">	

					<div class="media-body">

					<div class="row">		            

						<div class="col-lg-12 padd-50">

       

				<div class="col-md-7 col-lg-6 m-img" style="margin-bottom:20px;">';
					    //Difrencias entre las fechas
						$d1=date("Y-m-d");
						$d2=$event['start'];
                        $date1 = str_replace("-","",$d1);
						$date2 = str_replace("-","",$d2);;
						$dateDiffer=$date2 - $date1;
					
						$diff = abs(strtotime($date2) - strtotime($date1));

						$years = floor($diff / (365*60*60*24));
						$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));				

						if($dateDiffer == 0)
						{
							$timeleft='TODAY';
						}
						elseif($dateDiffer == 1)
						{
							$timeleft='IN '.$dateDiffer.' DAY';
						}
						if($dateDiffer < 0)
						{
							
							$timeleft='EVENT ENDED';
						}
						if($dateDiffer > 0 && $dateDiffer != 1)
						{
							$timeleft='IN '.$dateDiffer.' DAYS';
						}
					
						

					echo'	
					<div class="event-time col-lg-11 "><p> '.$timeleft.'</p></div>

					<img  style="border:5px solid #CCBEA6" src="images/gallery-event/520x520/'.$event['egphoto'].'" class="img-responsive"  alt="'.$event['desc_es'].'"></a>

				</div>

				<div class="event-intro col-lg-6">					

					<p>

						'.$content['introduction'].'

				
					<br><br>

                     <a href="event.php?id='.$contentId.'" class="link" >MORE <img src="images/view.png" width="10" height="15" style="margin-top:-5px; margin-left:10px"></a>

					</p>

					<br><br>

				</div>

            

              </div>

		</div>

		

	</div>

	<div class="col-lg-12">

    <div class="col-lg-3"></div>

    <div class="col-lg-1 text-center"></div>

    <div class="col-lg-8"></div>

    </div>

    

</article>

';


			
	
} // end if  event_gallery es distinto de null

else{

	
	echo'<div class="col-lg-12 item" style="margin-bottom: 20px; margin-top: 20px;">

	<div class="advice col-lg-6">
	<h1 >'.$content['title'].'</h1>
	<p>
		'.$content['introduction'].'
	<br> ';
	 
		echo'<a class="link" href="event.php?id='.$contentId.'">MORE <img src="images/view.png" width="10" height="15" style="margin-top:-5px;"></a> 

		</p>
		</div>
		</div>


		';

} // end else
	
} // end if si es event_gallery

if($content['type']=='p') //Si es POST 
{
	
	$sql1001=mysql_query("SELECT p.id as post_id,pg.id as pgId ,pg.desc_es as desc_es , pg.photo as pgphoto from posts as p left join posts_gallery as pg on pg.post_id=p.id where p.id='$contentId'");
	$post=mysql_fetch_array($sql1001);

	if($post['pgphoto'] != NULL)//Recorremos todos los posts que tengan foto
	{
	
	
    echo'

	<div class="col-lg-12 item">

    <div class="col-lg-6"></div>

    <div class="col-lg-6 text-center"></div>

 

    </div>
		<!-- POST SECTION -->
          <article class="enventintro media col-lg-12 item">	

		<div class="media-body">

			<div class="row">

            

				<div class="col-lg-12 padd-50">                
       

				<div class="col-md-7 col-lg-6 col-lg-push-6 m-img" style="margin-bottom:20px;">

					

					<img style="border:5px solid #CCBEA6" src="images/gallery-post/520x520/'.$post['pgphoto'].'"  class="img-responsive"  alt="'.$post['desc_es'].'"></a>

				</div>	

				<div class="event-intro  col-lg-6 col-lg-pull-6">					

					<p>
						'.$content['introduction'].'
				
					<br><br>
					
                     <a href="post.php?id='.$contentId.'" class="link" >MORE <img src="images/view.png" width="10" height="15" style="margin-top:-5px; margin-left:10px"></a>

					</p>

					<br><br>

				</div>


              </div>

		</div>

		
	</div>    

</article>

<!-- END POST SECTION -->
';
}//end if post & photo is not null
else{

	echo'<div class="col-lg-12 item" style="margin-bottom: 20px; margin-top: 20px;">

	<div class="advice col-lg-6">
	<h1 >'.$content['title'].'</h1>
	<p>
		'.$content['introduction'].'
	<br> ';
	 
		echo'<a class="link" href="post.php?id='.$contentId.'">MORE <img src="images/view.png" width="10" height="15" style="margin-top:-5px;"></a> 

		</p>
		</div>
		</div>

		';

}//end ELSE post & photo is not null
}//end if es POST GALLERY


	


 
}//end while contenedor

?>


 </div><!-- End post wrapper -->
 <div class="loader">
 	<img  src="images/ajax-loader.gif" alt="">
 </div>
 <div>

 </div>
<!--page navigation-->

  </div>
</div>
</div>
        </section> <!-- main -->

      </section> <!-- content -->          

   </section>  <!-- container -->




  <!-- ARCHIVOS -->

    <!-- Conflicto con js de galeria <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->

     <script src="js/myscript.js"></script>

    <script src="js/bootstrap.min.js"></script>
	





  </body>

</html>

