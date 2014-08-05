<?php

  include('../cargador.php');
  
  $objDb  = new connectionDb();
  $objLog = new Login();
  $objGal = new Gallery();
  
  $objDb->create_Connection();
      
    sleep(2);
	if (!empty($_FILES)) {

	$tempFile = $_FILES['Filedata']['tmp_name'];
	$filename = $_FILES['Filedata']['name'];
	
	$tempFilee = imagecreatefromjpeg($_FILES['Filedata']['tmp_name']);
	
	    $wi_source = imagesx($tempFilee);
      $he_source = imagesy($tempFilee);

      //Si es  de la galeria tattoss agrego imagen
      if(($wi_source == 640 && $he_source == 640) and isset($_GET['albid'])){ 
        $ext = strrchr($filename,'.');
        $cid = intval($_GET['albid']);
        if($ext ==".jpg" || $ext==".jpeg"){
            $dossier = '../../images/gallery/zoom/'; //Directorio del Zoom
            $newName = time().$ext;
            move_uploaded_file($_FILES['Filedata']['tmp_name'], $dossier . $newName);
            mysql_query("INSERT INTO users_images (id,photo,user_id) VALUES(NULL,'$newName','$cid')");
             //Ruta de la original
            $rtOriginal='../../images/gallery/zoom/'.$newName.'';
                 
            //Crear variable de imagen a partir de la original
            $original = imagecreatefromjpeg($rtOriginal);
                 
            //Definir tamaño máximo y mínimo
            $ancho_final = 524;
            $alto_final = 452;
             
            //Recoger ancho y alto de la original
            list($ancho,$alto)=getimagesize($rtOriginal);
             
            $lienzo=imagecreatetruecolor($ancho_final,$alto_final);
             
            //Copiar $original sobre la imagen que acabamos de crear en blanco ($tmp)
            imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
             
            //Limpiar memoria
            imagedestroy($original);
             
            //Definimos la calidad de la imagen final
            $cal=90;
             
            //Se crea la imagen final en el directorio indicado
            imagejpeg($lienzo,'../../images/gallery/medium/'.$newName.'',$cal);

        }
      }else{

        echo'<script>
            alert("Error");
        </script>';
      }


      //Agrega imagenes Galeria Paints
        if(($wi_source == 640 && $he_source == 640) and isset($_GET['albid2'])){ 
        $ext = strrchr($filename,'.');
        $cid = intval($_GET['albid2']);
        if($ext ==".jpg" || $ext==".jpeg"){
            $dossier = '../../images/gallery/zoom/'; //Directorio del Zoom
            $newName = time().$ext;
            move_uploaded_file($_FILES['Filedata']['tmp_name'], $dossier . $newName);
            mysql_query("INSERT INTO users_paints (id,photo,user_id) VALUES(NULL,'$newName','$cid')");
             //Ruta de la original
            $rtOriginal='../../images/gallery/zoom/'.$newName.'';
                 
            //Crear variable de imagen a partir de la original
            $original = imagecreatefromjpeg($rtOriginal);
                 
            //Definir tamaño máximo y mínimo
            $ancho_final = 524;
            $alto_final = 452;
             
            //Recoger ancho y alto de la original
            list($ancho,$alto)=getimagesize($rtOriginal);
             
            $lienzo=imagecreatetruecolor($ancho_final,$alto_final);
             
            //Copiar $original sobre la imagen que acabamos de crear en blanco ($tmp)
            imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
             
            //Limpiar memoria
            imagedestroy($original);
             
            //Definimos la calidad de la imagen final
            $cal=90;
             
            //Se crea la imagen final en el directorio indicado
            imagejpeg($lienzo,'../../images/gallery/medium/'.$newName.'',$cal);
        }
      }else{

        echo'<script>
            alert("Error");
        </script>';
      }

       //Agrega imagenes POST GALLERY
        if(($wi_source == 640 && $he_source == 640) and isset($_GET['postid'])){      

        $ext = strrchr($filename,'.');
        $cid = intval($_GET['postid']);
        if($ext ==".jpg" || $ext==".jpeg"){
            $dossier = '../../images/gallery/zoom/'; //Directorio del Zoom
            $newName = time().$ext;
            move_uploaded_file($_FILES['Filedata']['tmp_name'], $dossier . $newName);
            mysql_query("INSERT INTO posts_gallery (id,photo,post_id) VALUES(NULL,'$newName','$cid')");

             //Ruta de la original
            $rtOriginal='../../images/gallery/zoom/'.$newName.'';
                 
            //Crear variable de imagen a partir de la original
            $original = imagecreatefromjpeg($rtOriginal);
                 
            //Definir tamaño máximo y mínimo
            $ancho_final = 524;
            $alto_final = 452;
             
            //Recoger ancho y alto de la original
            list($ancho,$alto)=getimagesize($rtOriginal);
             
            $lienzo=imagecreatetruecolor($ancho_final,$alto_final);
             
            //Copiar $original sobre la imagen que acabamos de crear en blanco ($tmp)
            imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
             
            //Limpiar memoria
            imagedestroy($original);
             
            //Definimos la calidad de la imagen final
            $cal=90;
             
            //Se crea la imagen final en el directorio indicado
            imagejpeg($lienzo,'../../images/gallery/medium/'.$newName.'',$cal);
        }
      }else{

        echo'<script>
            alert("Error");
        </script>';
      }

       //Agrega imagenes EVENT GALLERY
        if(($wi_source == 640 && $he_source == 640) and isset($_GET['eventid'])){      

        $ext = strrchr($filename,'.');
        $cid = intval($_GET['eventid']);
        if($ext ==".jpg" || $ext==".jpeg"){
            $dossier = '../../images/gallery/zoom/'; //Directorio del Zoom
            $newName = time().$ext;
            move_uploaded_file($_FILES['Filedata']['tmp_name'], $dossier . $newName);
            mysql_query("INSERT INTO events_gallery (id,photo,event_id) VALUES(NULL,'$newName','$cid')");

            //Ruta de la original
            $rtOriginal='../../images/gallery/zoom/'.$newName.'';
                 
            //Crear variable de imagen a partir de la original
            $original = imagecreatefromjpeg($rtOriginal);
                 
            //Definir tamaño máximo y mínimo
            $ancho_final = 524;
            $alto_final = 452;
             
            //Recoger ancho y alto de la original
            list($ancho,$alto)=getimagesize($rtOriginal);
             
            $lienzo=imagecreatetruecolor($ancho_final,$alto_final);
             
            //Copiar $original sobre la imagen que acabamos de crear en blanco ($tmp)
            imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
             
            //Limpiar memoria
            imagedestroy($original);
             
            //Definimos la calidad de la imagen final
            $cal=90;
             
            //Se crea la imagen final en el directorio indicado
            imagejpeg($lienzo,'../../images/gallery/medium/'.$newName.'',$cal);
        }
      }else{

        echo'<script>
            alert("Error");
        </script>';
      }


 

		echo "1";
}
?>