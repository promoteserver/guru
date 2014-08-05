<?php
session_start();

  
    include('admin/cargador.php');
    
    $objDb  = new connectionDb();
    $objLog = new Login();
    $objGal = new Gallery();
    //we connected
    $objDb->create_Connection();

$CurrentUserId=$_GET['userid'];      
$sql = mysql_query("SELECT * from users where id='$CurrentUserId'");
$user=mysql_fetch_array($sql);
?>

<!DOCTYPE html>



<html lang="en">



  <head>



    <meta charset="utf-8">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">



    <title>GuruTattoo - Artists</title>   



       <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon" >



       



   <link href="css/bootstrap-styles.css" rel="stylesheet">



   <link rel="stylesheet" href="css/styles-mgs.css">



<link href='http://fonts.googleapis.com/css?family=Raleway:300,800,900,700,600,500,400,200,100' rel='stylesheet' type='text/css'>

<link  href="css/royalslidergallery.css" rel="stylesheet">





     <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">



    </script>



    <script src="js/mapScript.js"></script>

  <!-- Go to www.addthis.com/dashboard to customize your tools -->
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53d0cc927073b138"></script>

    <script class="rs-file" src="js/jquery-1.8.3.min.js"></script>



    <script class="rs-file" src="js/jquery.royalslider.min.js"></script>

   



         <script src="js/myscript.js"></script>



         <script src="js/bootstrap.min.js"></script>











    



    <!-- syntax highlighter -->



    <script src="js/highlight.pack.js"></script>



    <script src="js/jquery-ui-1.8.22.custom.min.js"></script>



    <script> hljs.initHighlightingOnLoad();</script>











    







    <!-- preview-related stylesheets -->



    <link href="css/resetgallery.css" rel="stylesheet">



    <link href="css/jquery-ui-1.8.22.custom.css" rel="stylesheet">



    <link href="css/github.css" rel="stylesheet">







    <!-- slider stylesheets -->



    



     



        <link class="rs-file" href="css/rs-universal.css" rel="stylesheet">







    <style>



      #gallery-2 {



  width: 100%;



  -webkit-user-select: none;



  -moz-user-select: none;  



  user-select: none;



}







    </style>



    



    <style>



      #page-navigation { display: none; }



    </style>















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



    <div class="mainheader">      <a class="link" href="blog.php">OUR BLOG </a> <span><img src="images/arrow1.png" width="15" height="15"><a  class="link" href="#">ARTIST TATTOS</a><img src="images/arrow2.png" width="15" height="15"></span><a class="link" href="artist.php?userid=<?php echo $CurrentUserId;?>">ARTIST PAINTS</a>



	</div>



     



     <div class="gallery">



    <div class="titlegallery">



   <h1><?php echo $user['name']; ?></h1> <h4><a href="artist.php?userid=<?php echo $CurrentUserId ?>">View Paints Gallery</a></h4>



</div>







 



    



    <div class="col-lg-12" >



 <!-- slider gallery -->



  <div  class="page wrapper">



   



      <div class="row clearfix">



  <div class="fwImage col span_4">



<div id="gallery-2" class="royalSlider rsUni">


<?php 

$sql2=mysql_query("SELECT * from users_images where user_id='$CurrentUserId'");
while($userimg=mysql_fetch_array($sql2))
{

echo '

<a class="rsImg"  href="images/gallery-tattoos/'.$userimg['photo'].'" style="margin-left:0;"> <img class="rsTmb" src="images/gallery-tattoos/thumb/'.$userimg['photo'].'" /></a>



';

}

?>;

 


</div>



  </div>



  



</div>











  <!-- You don't need this part of code -->



 



  <script>



    jQuery(document).ready(function($) {



      // DO NOT INCLUDE THIS CODE IN YOUR BUILD, it's for tabs on this page



        var code = $('#html-code code');



        if(code.is(':empty')) {



          var rsCode = $('.royalSlider-preview');



          if(!rsCode.length) {



              rsCode = $('.royalSlider');



          }



          rsCode = rsCode.clone().removeClass('royalSlider-preview').wrap('<div></div>').parent().html();



          rsCode = htmlencode(rsCode);



          code.html(rsCode);



        }



        $('#js code').html( htmlencode($('#addJS').html()) );







        var filesHTML = '';



        $('.rs-file').each(function() {



          var item = $(this).removeAttr('class');



          if(item.is('script')) {



            filesHTML += '<script src="' + item.attr('src') + '" />';



          } else {



            filesHTML += $('<div>').append( $(this).clone().removeAttr('class') ).html();



          }



          filesHTML += "\n";



        });



        $('#files code').html( htmlencode( filesHTML ) );



        $( ".tabs" ).tabs();



    });



    function htmlencode(str) {



      if(str) {



         return str.replace(/[&<>"']/g, function($0) {



            return "&" + {"&":"amp", "<":"lt", ">":"gt", '"':"quot", "'":"#39"}[$0] + ";";



        });



      }



    }   



  </script>



  



  



   <!-- tabs & footer end /// --> 



   



  



    <script id="addJS">jQuery(document).ready(function() {



  $('#gallery-2').royalSlider({



    fullscreen: {



      enabled: true,



      nativeFS: true



    },



    controlNavigation: 'thumbnails',



    thumbs: {



      orientation: 'vertical',



      paddingBottom: 4,



      appendSpan: true



    },



    transitionType:'fade',



    autoScaleSlider: true, 



    autoScaleSliderWidth: 940,     



    autoScaleSliderHeight: 670,



    loop: true,



    arrowsNav: false,



    keyboardNavEnabled: true







  });



});



</script>



  



  </div>







   <!-- fin slider -->



   



    <div class="col-lg-7 gallery-top"><p><?php echo $user['bio']; ?></p></div>



    <div class="col-lg-1"></div>



    <div class="col-lg-4 gallery-top"><div class="availability">AVAILABILITY



            <ul>


              <?php 
              if($user['MON']==1)
              {
                echo'<li>monday</li>';

              }

               if($user['TUE']==1)
              {
                echo'<li>tuesday</li>';

              }

               if($user['WED']==1)
              {
                echo'<li>wednesday</li>';

              }
               if($user['THU']==1)
              {
                echo'<li>thursday</li>';

              }
               if($user['FRI']==1)
              {
                echo'<li>friday</li>';

              }
               if($user['SAT']==1)
              {
                echo'<li>saturday</li>';

              }
               if($user['SUN']==1)
              {
                echo'<li>sunday</li>';

              }

              echo'<li style="border-bottom:#D23021 solid 1px;"></li>';

              ?>
              



             

              



            </ul>



          </div></div>



    



      </div>



    </div>



    



</div>



          







          















        </section> <!-- main -->



      </div> <!-- content -->          



  <div class="contact row " >







<h1>CONTACT US</h1>







<div class="contactPadding">











<div class="col-lg-6">



	<h2>2375 S Bascom Ave, San Jose, CA</h2>



	<div class="contact-left">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3174.6685972815367!2d-121.93215289999999!3d37.279285!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808e34ee38c3a295%3A0xb9b310ad42131814!2s2375+S+Bascom+Ave%2C+Campbell%2C+CA+95008%2C+USA!5e0!3m2!1sen!2spa!4v1405352197174" allowtransparency="true" frameborder="0" scrolling="no" style="border:none;overflow:hidden;width:100%;  height: 299px;"  ></iframe> 
 
  </div>



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