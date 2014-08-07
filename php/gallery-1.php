<?php





  

    include('../admin/cargador.php');

    

    $objDb  = new connectionDb();

    $objLog = new Login();

    $objGal = new Gallery();

    //we connected

    $objDb->create_Connection();

?>
<script class="rs-file" src="js/jquery-1.8.3.min.js"></script>



    <script class="rs-file" src="js/jquery.royalslider.min.js"></script>



    <link href="css/royalslider.css" rel="stylesheet">

   <h3> RECENT WORK</h3> 

<script class="rs-file" src="js/jquery-1.8.3.min.js"></script>



    <script class="rs-file" src="js/jquery.royalslider.min.js"></script>



    <link href="css/royalslider.css" rel="stylesheet">

   



    <div id="gallery-1" class="royalSlider rsDefault visibleNearby">   

    <?php



     $mysql=mysql_query("SELECT * from users_images");



     while($users_images=mysql_fetch_array($mysql))

     {

       $userId=$users_images['user_id'];

       $mysql2=mysql_query("SELECT * from users where id = '$userId'");

       $CurrentUser=mysql_fetch_array($mysql2);

       $username=$CurrentUser['name'];

       echo '<a  href="artist.php?userid='.$userId.'"><img class="rsImg" src="http://gurutattoo.net/images/gallery/zoom/'.$users_images['photo'].'"  ></a>';

     }

    



    ?>

    </div>

 <br>  <p> <span><strong>By</strong></span> <a href="artist.php?userid=<?php echo $userId ; ?>" style="color:#FFF;"><?php echo $username ;?></a> </p> <br>  <br> 



 



<div class="page wrapper">  



 







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



   



  



    <script id="addJS">// Important note! If you're adding CSS3 transition to slides, fadeInLoadedSlide should be disabled to avoid fade-conflicts.



jQuery(document).ready(function($) {



  var si = $('#gallery-1').royalSlider({



    addActiveClass: true,



    arrowsNav: false,



    controlNavigation: 'none',



    autoScaleSlider: true, 



    autoScaleSliderWidth: 960,     



    autoScaleSliderHeight: 400,



    loop: true,



    fadeinLoadedSlide: false,



    globalCaption: true,



    keyboardNavEnabled: true,



    globalCaptionInside: false,







    visibleNearby: {



      enabled: true,



      centerArea: 0.5,



      center: true,



      breakpoint: 650,



      breakpointCenterArea: 0.64,



      navigateByCenterClick: true



    }



  }).data('royalSlider');







  // link to fifth slide from slider description.



  $('.slide4link').click(function(e) {



    si.goTo(4);



    return false;



  });



});



</script>



  



  </div>



    



    </div>