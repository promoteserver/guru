<?php

$db_host = "10.8.11.27"; // database host

$db_name = "gurutattoo"; // database name

$db_login = "gurutattoo"; // database user

$db_pass= "InkMe#13"; // database password



$db = mysql_connect($db_host, $db_login, $db_pass);

mysql_select_db($db_name,$db);

?>

