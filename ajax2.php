<?php
session_start();

	
	  include('admin/cargador.php');
	  
	  $objDb  = new connectionDb();
	  $objLog = new Login();
	  $objGal = new Gallery();
	  //we connected
	  $objDb->create_Connection();
	    
$load=htmlentities(strip_tags($_POST['load']))*5;
$sql=mysql_query("SELECT * from events order by modified desc LIMIT ".$load.",5");




while($row=mysql_fetch_array($sql)) 

{

$eventId=$row['id'];

$sql100=mysql_query("SELECT e.id as event_id,eg.id as egId ,eg.photo as egphoto,e.title as title,e.introduction as introduction,e.start as start from events as e left join events_gallery as eg on eg.event_id=e.id where e.id='$eventId' ");
$event=mysql_fetch_array($sql100);  

 if($event['egphoto'] != NULL) // si evet_gallery es distinto de null
  {
      
            echo'<article class="enventintro media col-lg-12 item"> 

          <div class="media-body">

          <div class="row">               

            <div class="col-lg-12 padd-50">

       

        <div class="col-md-7 col-lg-6 m-img" style="margin-bottom:20px;">';
         

          echo' 

          <img  style="border:5px solid #CCBEA6" src="images/gallery-event/'.$event['egphoto'].'" class="img-responsive"  alt="Event"></a>

        </div>

        <div class="event-intro col-lg-6">          

          <p>

            '.$row['introduction'].'

        
          <br><br>

                     <a href="event.php?id='.$eventId.'" class="link" >MORE <img src="images/view.png" width="10" height="15" style="margin-top:-5px; margin-left:10px"></a>

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
  <h1 >'.$row['title'].'</h1>
  <p>
    '.$row['introduction'].'
  <br> ';
   
    echo'<a class="link" href="event.php?id='.$eventId.'">MORE <img src="images/view.png" width="10" height="15" style="margin-top:-5px;"></a> 

    </p>
    </div>
    </div>


    ';

} // end else  

}//end while contenedor

?>
