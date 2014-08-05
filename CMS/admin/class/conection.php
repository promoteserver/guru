<?php
      class connectionDb {
		  const DB_NAME = 'gurutattoosj';
		  const DB_HOST = 'gurutattoosj.db.3916572.hostedresource.com';
		  const DB_USER = 'gurutattoosj';
		  const DB_PASS = 'SanJose777@';
		  
		  public function create_Connection(){
			  mysql_connect(self::DB_HOST, self::DB_USER, self::DB_PASS);
			  mysql_select_db(self::DB_NAME);
		  }
	  }
?>