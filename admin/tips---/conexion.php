<?php

$db_host = "dekoradb.db.3916572.hostedresource.com"; // database host

$db_name = "dekoradb"; // database name

$db_login = "dekoradb"; // database user

$db_pass= "Dekora4living4"; // database password



$db = mysql_connect($db_host, $db_login, $db_pass);

mysql_select_db($db_name,$db);

?>

