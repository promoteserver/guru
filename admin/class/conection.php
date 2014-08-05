<?php
      class connectionDb {
		  const DB_NAME = 'gurutattoo';
		  const DB_HOST = '10.8.11.27';
		  const DB_USER = 'gurutattoo';
		  const DB_PASS = 'InkMe#13';
		  
		  public function create_Connection(){
			  mysql_connect(self::DB_HOST, self::DB_USER, self::DB_PASS);
			  mysql_select_db(self::DB_NAME);
		  }
	  }
?>