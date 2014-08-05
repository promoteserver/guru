<?php
      class Gallery {
		  protected $picNumber = 0;
		  protected $action;
		  
		  public function countGaleryPic($gId){
			  $sql = mysql_query("SELECT * FROM users_images WHERE user_id='$gId'");
			  $this->picNumber = mysql_num_rows($sql);
			  return $this->picNumber;
		  }

		   public function countGaleryPic2($gId){
			  $sql = mysql_query("SELECT * FROM users_paints WHERE user_id='$gId'");
			  $this->picNumber = mysql_num_rows($sql);
			  return $this->picNumber;
		  }
		   public function countGaleryPicPost($gId){
			  $sql = mysql_query("SELECT * FROM posts_gallery WHERE post_id='$gId'");
			  $this->picNumber = mysql_num_rows($sql);
			  return $this->picNumber;
		  }

		  public function countGaleryPicEvent($gId){
			  $sql = mysql_query("SELECT * FROM events_gallery WHERE event_id='$gId'");
			  $this->picNumber = mysql_num_rows($sql);
			  return $this->picNumber;
		  }
		  
		  //getting pic name
		  public function picToRemove($picId){
			  $sql = mysql_query("SELECT * FROM  users_images WHERE id='$picId'");
			  $this->picNumber = mysql_num_rows($sql);
			  if($this->picNumber > 0){
				  $row = mysql_fetch_array($sql);
				  return $row['photo'];
			  }
		  }

		    public function picToRemove2($picId){
			  $sql = mysql_query("SELECT * FROM  users_paints WHERE id='$picId'");
			  $this->picNumber = mysql_num_rows($sql);
			  if($this->picNumber > 0){
				  $row = mysql_fetch_array($sql);
				  return $row['photo'];
			  }
		  }
		  
		  public function showAlbumTitle($albId,$lang){
			  $sql = mysql_query("SELECT id,imgtitle_es,imgtitle_en FROM users WHERE id='$albId'");
			  $this->picNumber = mysql_num_rows($sql);
			  if($this->picNumber > 0){
				  $row = mysql_fetch_array($sql);
				  if(!empty($row['imgtitle_'.$lang])){
					  if($lang=="es"){
						  return '<img src="./images/gallery/'.$row['imgtitle_'.$lang].'" border="0" />';
					  }else{
						  return '<img src="../images/gallery/'.$row['imgtitle_'.$lang].'" border="0" />';
					  }
				  }
			  }
		  }
		  
		  public function activateAlbum($IdA){
			  $sql = mysql_query("SELECT status FROM users WHERE id='$IdA'");
			  $cnt = mysql_num_rows($sql);
			  if($cnt > 0){
				  $row = mysql_fetch_array($sql);
				  if($row['status']==1){
					  //js function to de-activate
					  $this->action = 'onclick="unsetAlbum('.$IdA.')" checked="checked"'; 
				  }elseif($this->albumActivated()==false){
					  $this->action = 'onclick="warningAlbum()"';
				  }else{
						  //js function to activate
					      $this->action = 'onclick="setAlbum('.$IdA.')"';
				  }
				  return $this->action;
			  }
		  }
		  
		  public function albumActivated(){
			  $sql = mysql_query("SELECT status FROM users WHERE status=1");
			  $cnt = mysql_num_rows($sql);
			  if($cnt == 3){
				  //js function callback
				  return false;				  
			  }else{
				  return true;
			  }
		  }
		  
		  public function isActive($idA){
			  $sql = mysql_query("SELECT status FROM users WHERE id='$idA'");
			  $cnt = mysql_num_rows($sql);
			  if($cnt > 0){
				  $row = mysql_fetch_array($sql);
				  if($row['status']==1){
					  return true;
				  }else{
					  return false;
				  }
			  }
		  }
		  
		  // setting album by
		 /* public function setBtnOrder($idA){
			  if($this->isActive($idA)==true){
				  $sql = mysql_query("SELECT id FROM users WHERE id='$idA'");
				  $row = mysql_fetch_array($sql);
				  echo '<select name="aI_'.$idA.'" onchange=setAlbumBy(this.value,'.$row['id'].')>';
				  echo '<option></option>';
				  echo '<option value="A"';
				  if($row['position']=="A"){
					  echo ' selected="selected"';
				  }
				  echo '>A</option>';
				  echo '<option value="B"';
				  if($row['position']=="B"){
					  echo ' selected="selected"'; 
				  }
				  echo '>B</option>';
				  echo '<option value="C"';
				  if($row['position']=="C"){
					  echo ' selected="selected"';
				  }
				  echo '>C</option>';
				  echo '</select>';
			  }
		  }*/
		  
		  public function alvailablePostion($pos){
			  $sql = mysql_query("SELECT position FROM users WHERE position='$pos'");
			  $cnt = mysql_num_rows($sql);
			  if($cnt > 0){
				  return false;
			  }
		  }
		  
		  public function showAlbumName($idAl,$lang){
			  $sql = mysql_query("SELECT title_es,title_en FROM users WHERE id='$idAl'");
			  $row = mysql_fetch_array($sql);
			  return ucwords(strtolower($row['title_'.$lang]));
		  }
		  
		  public function countWord($text){
			  if(str_word_count($text) > 30){
				  $newString = substr($text,0,190);
				  echo preg_replace('/(<\/?)(\w+)([^>]*>)/e','',$newString).'...';
			  }else{
				  echo preg_replace('/(<\/?)(\w+)([^>]*>)/e','',$text);
			  }

		  }
	  }
?>