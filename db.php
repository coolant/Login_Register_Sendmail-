<?php

include "veritabani/ez_sql_core.php";
include "veritabani/ez_sql_mysqli.php";

$db= new ezSQL_mysqli('root','','test','localhost');
$db -> query("SET NAMES 'utf8'");
$db -> query("SET CHARACTER SET utf8");
$db -> query("SET COLLATION_CONNECTION = 'utf8_general_ci'");
?>