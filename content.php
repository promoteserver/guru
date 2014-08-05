<?php    	





while($content=mysql_fetch_array($sql32)) 

{
	$gallery=mysql_fetch_array($sql);
	$contentId=$content['id'];
	$galleryId=$gallery['post_id'];

	if($content['type']=='e') //Si es evento
	{

	$sql100=mysql_query("SELECT e.id as event_id,eg.id as egId ,eg.photo as egphoto,e.title as title,e.introduction as introduction,e.start as start from events as e left join events_gallery as eg on eg.event_id=e.id where e.id='$contentId' ");
	$event=mysql_fetch_array($sql100);	
		
	if($event['egphoto'] != NULL) // si evet_gallery es distinto de null
	{
			
						echo'<article class="enventintro media col-lg-12 item">	

					<div class="media-body">

					<div class="row">		            

						<div class="col-lg-12 padd-50">

       

				<div class="col-lg-6 m-img" style="margin-bottom:20px;">';
					    //Difrencias entre las fechas
                        $date1 = date("m/d/Y");
						$date2 = $event['start'];

						$diff = abs(strtotime($date2) - strtotime($date1));

						$years = floor($diff / (365*60*60*24));
						$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
						$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

						if($years !=0){ // si esta asignado el año se pone el año 
							$timeleft=$years;
							$timetype='YEARS';
						}elseif($months !=0)
						{
							$timeleft=$months;
							$timetype='MONTHS';
						}else{
							$timeleft=$days;
							$timetype='DAYS';
						}

					echo'	
					<div class="event-time col-lg-11 "><p> '.$timeleft.' '.$timetype.'</p></div>

					<img  style="border:5px solid #CCBEA6" src="images/gallery/medium/'.$event['egphoto'].'" class="img-responsive"  alt="Event"></a>

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
	 
		echo'<a class="viewmore" href="event.php?id='.$contentId.'">MORE <img src="images/view.png" width="10" height="15" style="margin-top:-5px;"></a> 

		</p>
		</div>
		</div>


		';

} // end else
	
} // end if si es event_gallery

if($content['type']=='p') //Si es POST 
{
	
	$sql1001=mysql_query("SELECT p.id as post_id,pg.id as pgId ,pg.photo as pgphoto from posts as p left join posts_gallery as pg on pg.post_id=p.id where p.id='$contentId'");
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

                <div class="event-intro col-lg-6">					

					<p>
						'.$content['introduction'].'
				
					<br><br>
					
                     <a href="post.php?id='.$contentId.'" class="link" >MORE <img src="images/view.png" width="10" height="15" style="margin-top:-5px; margin-left:10px"></a>

					</p>

					<br><br>

				</div>

       

				<div class="col-lg-6 m-img" style="margin-bottom:20px;">

					

					<img style="border:5px solid #CCBEA6" src="images/gallery/medium/'.$post['pgphoto'].'"  class="img-responsive"  alt="Event"></a>

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
	 
		echo'<a class="viewmore" href="post.php?id='.$contentId.'">MORE <img src="images/view.png" width="10" height="15" style="margin-top:-5px;"></a> 

		</p>
		</div>
		</div>

		';

}//end ELSE post & photo is not null
}//end if es POST GALLERY


	


 
}//end while contenedor

?>

