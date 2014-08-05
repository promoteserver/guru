<?php
      class Login {
		  protected $Active = false;
		  protected $Username, $Password;
		  protected $foundRow;
		  protected $error, $msj;

		  const SALT = 'Akces';
		  
		  public function make_login($User,$Pass){
			  $this->Username = strip_tags($User);
			  $this->Password   = strip_tags($Pass);
			  $sql = mysql_query("SELECT * FROM  users WHERE username='$this->Username' and password='$this->Password'");
			  $row =mysql_fetch_array($sql);
			
			  $this->foundRow = mysql_num_rows($sql);
			  if($this->foundRow > 0){
				  $this->Active = true;
				  return ($this->Active);
			  }else{
				  $this->Active = false;
				  return $this->Active;
			  }
		  }

		  public function currentUser($User,$Pass){

		  	  $this->Username = strip_tags($User);
			  $this->Password   = strip_tags($Pass);
			  $sql = mysql_query("SELECT * FROM  users WHERE username='$this->Username' and password='$this->Password'");
			  $row = mysql_fetch_array($sql);
			  $actual=$row['id'];
			  return $actual;
		  }

	
	
		  public function verify_Params($User,$Pass){
			  if(isset($User) and !empty($User) and isset($Pass) and !empty($Pass)){
				  return $this->make_login($User,$Pass);
			  }else{
				  return false;
			  }
		  }
	  }
?>