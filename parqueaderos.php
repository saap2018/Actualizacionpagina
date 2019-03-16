<?php
$hostname = "localhost"; //en mi caso es localhost
$user = "root"; //en mi caso root
$pass = "";
?>

<!--Y por último el archivo que va insertar en la base de datos, lo llamaremos “procesa.php” y lleva el siguiente código:

<?php
//Esta linea es para incluir el archivo con las variables
    //include("variables.php");  
/* CONECTAR CON BASE DE DATOS **************** */  
   $con = mysql_connect($hostname,$user,$pass);
   if (!$con){die('ERROR DE CONEXION CON MYSQL:'. mysql_error());}
/* ********************************************** */
/* CONECTA CON LA BASE DE DATOS  **************** */
   $database = mysql_select_db("saap",$con);
   if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}
/* ********************************************** */
//REALIZAR CONSULTA
$sql = "INSERT INTO cantidaddeparqueaderos VALUES (NULL,'".$_POST['numero']."')";
                $result = mysql_query($sql);
                if(! $result){
                               echo "La consulta SQL contiene errores.".mysql_error();
                               exit();
                }else {echo "DATOS INSERTADOS CORRECTAMENTE";
                }
				?>
				   