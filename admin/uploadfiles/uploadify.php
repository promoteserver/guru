<?php
    sleep(2);
	if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$filename = $_FILES['Filedata']['name'];
	
	include('../../includes/db.inc.php');
	
	$tempFilee = imagecreatefromjpeg($_FILES['Filedata']['tmp_name']);
	
	  $wi_source = imagesx($tempFilee);
      $he_source = imagesy($tempFilee);
	
	$newwidth = 190;
	
	//First Reduction
	
	$reduction = ( ($newwidth *  100) / $wi_source );
	
	$newheight = ( ($he_source * $reduction) / 100);
	
	//$nouvelleimage = imagecreatetruecolor($newwidth, $newheight) or die("Error"); thumbs 
	
	$newimagepreview = imagecreatetruecolor(190, 168);
	
	//imagecopyresampled($nouvelleimage, $tempFilee, 0,0,0,0, $newwidth,$newheight, $wi_source,$he_source); thumbs
	
	imagecopyresized($newimagepreview,$tempFilee,0,0,0,0,190,168,$wi_source,$he_source);
	
	$ext = "jpg";
	
	$nomexploitable = time();
	
	//imagejpeg($nouvelleimage , '../../thumbs/'.$nomexploitable.'.'.$ext, 100); //Saving thumbnail
	
	imagejpeg($newimagepreview, '../../small/'.$nomexploitable.'.'.$ext, 100); //Saving thumbnail
	

		$largeone = "zoom_".$nomexploitable.'.'.$ext; //nombre de la imagen original
		
		$dossier = '../../upload/'; //Directorio del Zoom
			   
		move_uploaded_file($_FILES['Filedata']['tmp_name'], $dossier . $largeone);
		$gallery = $_GET['gallery'];
		mysql_query("INSERT INTO gallery VALUES(NULL,'$nomexploitable.jpg','$largeone','$gallery','','')");  //Save info into database
		echo "1";
}
?>