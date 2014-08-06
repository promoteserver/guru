<?php
session_start();



  

    include('../admin/cargador.php');

    

    $objDb  = new connectionDb();

    $objLog = new Login();

    $objGal = new Gallery();

    //we connected

    $objDb->create_Connection();

      





//@rank=1 > Post // @rank=0 > Event

$sql=mysql_query("SELECT @rank:=0+1 as type,id,title,introduction,modified as M  from posts p UNION ALL SELECT @rank:=1+1 as type,id,title,introduction,modified as M from events as ev  ORDER BY M DESC");

$banner=mysql_fetch_array($sql);



?>