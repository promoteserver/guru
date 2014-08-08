<?php





  

    include('../admin/cargador.php');

    

    $objDb  = new connectionDb();

    $objLog = new Login();

    $objGal = new Gallery();

    //we connected

    $objDb->create_Connection();

?>

   <h3> RECENT WORK</h3> 



   



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
