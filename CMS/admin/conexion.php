<?php

$db_host = "localhost"; // database host

$db_name = "gurutattoo"; // database name

$db_login = "root"; // database user

$db_pass= ""; // database password



$db = mysql_connect($db_host, $db_login, $db_pass);

mysql_select_db($db_name,$db);

?>

