<?php
session_start();

  
    include('admin/cargador.php');
    
    $objDb  = new connectionDb();
    $objLog = new Login();
    $objGal = new Gallery();
    //we connected
    $objDb->create_Connection();
      
//Id event actual
$CurrentEventId=$_GET['id'];
   //Traemos todos los datos del post
        $sql1=mysql_query("SELECT  * from events where id='$CurrentEventId'");
        $event=mysql_fetch_array($sql1);



?>
<!DOCTYPE html>



<html lang="en">



<head>



  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

      <title>Event</title>   

  <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon" >
  <link href="css/bootstrap-styles.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles-mgs.css">
  <link href='http://fonts.googleapis.com/css?family=Raleway:300,800,900,700,600,500,400,200,100' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/royalslider-event.css" />
  <link rel="stylesheet" href="css/default.css" />
  <link rel="stylesheet" href="css/iskin.css" />  
  <link rel="stylesheet" href="css/royalslider-preview.css" />
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
  <script src="js/mapScript.js"></script>
  <script class="rs-file" src="js/jquery-1.8.3.min.js"></script>
  <script src="js/jquery.easing.1.3.min.js"></script> 
  <script src="js/royal-slider-8.1.min.js"></script>
</head>



  <body id="home"> <!-- Para indentificar en que pagina estamos -->







   <section class="container">



      <div class="content row">



        



  <nav class="navbar navbar-default " role="navigation">



  <!-- El logotipo y el icono que despliega el menú se agrupan



       para mostrarlos mejor en los dispositivos móviles -->



  <div class="navbar-header col-lg-5">



  	<section id="branding">



	     <a href="index.php"> <img class="img-responsive hidden-logo" src="images/logo_guru03.png" alt="Logo">



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



		<div class="mainheader">RECENT EVENTS  <span><img src="images/arrow1.png" width="15" height="15"> EVENT <img src="images/arrow2.png" width="15" height="15"></span>  OUR BLOG</div>



	</div>



     <div class="col-lg-12 title">



   <h1><?php echo $event['title']; ?></h1>



</div>







 <div class="col-lg-5"></div>



      <?php
      if($objGal->countGaleryPicEvent($CurrentEventId) != 0)
     {
           echo'
          <div class="col-lg-2 text-center"><img src="images/line-events.png" width="3" height="68"></div>

    <div class="col-lg-5"></div>
           <div id="main-body" >   
      <!-- Gallery Section -->
    <div id="slider-ajax-container">

      <div id="banner-rotator" class="royalSlider default">   

    
    <ul class="royalSlidesContainer">
      ';
   
        $sql3=mysql_query("SELECT * from events_gallery where event_id = '$CurrentEventId'");
        while($event_photo=mysql_fetch_array($sql3))
        {
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
             <li class="royalSlide">
              <div class="event-cont"><p>IN '.$timeleft.' '.$timetype.'</p></div>
              <img class="royalImage img-responsive"  src="images/gallery/zoom/'.$event_photo['photo'].'" />
            </li>
          
           ';     
         } 

         echo'
    </ul>  

    

</div>

</div>  

 <!-- End Gallery Section --> 

  </div>


';
         }

?>




	<script>     	



	jQuery(document).ready(function() {		



		$('#banner-rotator').royalSlider({			



	   		imageAlignCenter:true,



	   		imageScaleMode: "fill",



	   		



	   		hideArrowOnLastSlide:true,



	   		slideSpacing:20,



	   		



	   		autoScaleSlider: true,



	   		autoScaleSliderWidth: 640,



	   		autoScaleSliderHeight: 640



	    });		



	});



    </script>  <!-- fin event -->



    



    



    </div>



    



</div>



          



<div class="col-lg-12" >



    <div class="col-lg-5"></div>



    <div class="col-lg-2 text-center "><img src="images/line-events-2.png" width="3" height="68"></div>



    <div class="col-lg-5"></div>



   



    </div>







          







<div class="col-lg-12 padd-50 event">



	<h1 > 
    <?php 
    $event['start'];
    $mes = date("m",strtotime($event['start']));
    $año = date("Y",strtotime($event['start']));
    $dia = date("d",strtotime($event['start']));

    function nombremes($mes){
      setlocale(LC_TIME, 'english');
      $nombre=strftime("%B",mktime(0, 0, 0, $mes, 1, 2000));
      return $nombre;
    } 
     function nombredia($dia){
      setlocale(LC_TIME, 'english');
      $nombre=strftime("%A",mktime(0, 0, 0, 1, $dia, 2000));
      return $nombre;
    } 
    $nombredia=nombredia($dia);
    $mes=nombremes($mes);
    echo $mes; echo ' '; echo $dia; echo ' - '; echo $nombredia;
  ?>
 </h1><br><br>



	<?php echo $event['content'];?>
</div>



           <div class="col-lg-12">



		<div class="mainheader">RECENT EVENTS  <span><img src="images/arrow1.png" width="15" height="15"> EVENT <img src="images/arrow2.png" width="15" height="15"></span>  OUR BLOG</div>



	</div>



 <div class="col-lg-12 face">



	<h3> FACEBOOK COMMENTS	</h3>



  <div id="fb-root"></div>



<script>(function(d, s, id) {



  var js, fjs = d.getElementsByTagName(s)[0];



  if (d.getElementById(id)) return;



  js = d.createElement(s); js.id = id;



  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=469175689763272&version=v2.0";



  fjs.parentNode.insertBefore(js, fjs);



}(document, 'script', 'facebook-jssdk'));</script>







<div class="fb-comments" data-href="https://www.facebook.com/pages/Guru-Tattoo/122894147762522?fref=ts" data-width="100%" data-numposts="5" data-colorscheme="light"></div>







         </div>



         











        </section> <!-- main -->



      </div> <!-- content -->          



  <div class="contact row " >







<h1>CONTACT US</h1>







<div class="contactPadding">











<div class="col-lg-6">



	<h2>2375 S Bascom Ave, San Jose, CA</h2>



	<div class="contact-left"><section id="googleMap" class="img-responsive"  style="height:180px; "></section></div>



<img  class="vertical-line visible-lg "  src="images/vertical-line.png" />



</div>















<div class="col-lg-6">



	



  <h3>Online</h3>


  <!-- Contact Form -->
  <?php include "form.php" ?>
  <!-- End Contact Form -->

</div>



</div>



</div>



<!--FOOTER -->
<?php include "footer.php" ?>
<!-- end footer -->



   </section>  <!-- container -->











     <!-- ARCHIVOS -->





     <script src="js/myscript.js"></script>



    <script src="js/bootstrap.min.js"></script>



  </body>



   



</html>