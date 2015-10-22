<?php
//Connect To Database
$hostname='localhost';
$username='root';
$password='root';
$dbname='openmusic';
mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database');
mysql_select_db($dbname);
?>
