<?php
function Conectar(){
$conn = null;
$host = 'localhost';
$db = 'saap';
$user = 'root';
$pwd = '';
try{
$conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
}catch (PDOException $e){
	echo ': (Error al conectar a la base de datos'.$e;
	exit;
}
return $conn;
}
?>