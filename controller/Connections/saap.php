<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_saap = "localhost";
$database_saap = "saap";
$username_saap = "root";
$password_saap = "";
$saap = mysql_pconnect($hostname_saap, $username_saap, $password_saap) or trigger_error(mysql_error(),E_USER_ERROR); 
?>