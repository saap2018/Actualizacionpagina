<?php require_once('Connections/saap.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$empleado = mysqli_query($link, "SELECT empleados.Nombre, empleados.Apellidos FROM empleados WHERE empleados.Cargo='Cajero'") or die(mysql_error($link));
$row_empleado = mysqli_fetch_assoc($empleado);
$totalRows_empleado = mysqli_num_rows($empleado);

?>
<?php require_once('Connections/prueba.php'); ?>
<?php

$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset1 =mysqli_query($link, "SELECT HoraEntrada, HoraSalida FROM tiempo") or die(mysqli_error($link));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset2 = mysqli_query($link, "SELECT nombre_tipov FROM tipo_de_vehiculo") or die(mysqli_error($link));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset3 = mysqli_query($link, "SELECT tarifa FROM tarifas") or die(mysqli_error($link));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset4 = mysqli_query($link, "SELECT Placas FROM vehiculos") or die(mysqli_error($link));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);

$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset5 = mysqli_query($link, "SELECT CONCAT (empleados.Nombre, empleados.Apellidos) as Nombre FROM empleados") or die(mysqli_error($link));
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);
?>
<h1 class="page-header">
    <?php echo $alm->IdControlIngreso != null ? $alm->PlacasVehiculo : 'Ingreso al parqueadero'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Ingreso">Ingreso</a></li>
  <li class="active"> <?php echo $alm->IdControlIngreso != null ? $alm->PlacasVehiculo : 'Ingreso al parqueadero'; ?></li>
</ol>

<form id="frm-ingreso" action="?c=Ingreso&a=Guardar" method="post" enctype="multipart/form-data">
   <input type="hidden" name="IdControlIngreso" value="<?php echo $alm->IdControlIngreso; ?>" />
	 <?php
	  	date_default_timezone_set('America/Bogota');
		$hora= date ("H:i");
		$fecha= date ("j/M/Y");
?>
     <div class="form-group">
    	Fecha         
      <input name="fecha" type="text" class="form-control" id="textfield" value="<?php echo $fecha; ?>" readonly="readonly"/>
    </div>
    <div class="form-group">
    	Tiempo         
      <input name="tiempo" type="text" class="form-control" id="textfield" value="<?php echo $hora; ?>" readonly="readonly"/>
    </div>
    <div class="form-group">
        <label>Tarifa</label> 
        <label for="select3"></label>
        <select name="TipoTarifa" id="select3" class="form-control">
        <option required value=""> Seleccione el tipo de tarifa</option>
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset3['tarifa']?>"><?php echo $row_Recordset3['tarifa']?></option>
          <?php
} while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3));
  $rows = mysqli_num_rows($Recordset3);
  if($rows > 0) {
      mysqli_data_seek($Recordset3, 0);
	  $row_Recordset3 = mysqli_fetch_assoc($Recordset3);
  }
?>
        </select>
    </div>
     <div class="form-group">
        Placa    	
          <label for="select4"></label>
          <select name="PlacasVehiculo" id="select4" class="form-control">
          <option required value=""> Seleccione placa del vehículo</option>  
			<?php
do {  
?>
            <option value="<?php echo $row_Recordset4['Placas']?>"><?php echo $row_Recordset4['Placas']?></option>
            <?php
} while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4));
  $rows = mysqli_num_rows($Recordset4);
  if($rows > 0) {
      mysqli_data_seek($Recordset4, 0);
	  $row_Recordset4 = mysqli_fetch_assoc($Recordset4);
  }
?>
          </select>
    </div>
        <div class="form-group">
        Nombre del empleado 
          <label for="select"></label>
          <label for="select"></label>
          <select name="NombreEmpleado" id="select" class="form-control">
          <option required value=""> Nombre del vendedor</option>
            <?php
do {  
?>
            <option value="<?php echo $row_empleado['Nombre'].' '.$row_empleado['Apellidos']?>"><?php echo $row_empleado['Nombre'].' '.$row_empleado['Apellidos']?></option>
            <?php
} while ($row_empleado = mysql_fetch_assoc($empleado));
  $rows = mysql_num_rows($empleado);
  if($rows > 0) {
      mysql_data_seek($empleado, 0);
	  $row_empleado = mysql_fetch_assoc($empleado);
  }
?>
          </select>
        </div>
        <div class="form-group">
    	Lugar asignado         
      <input name="fecha" type="text" class="form-control" id="textfield" value="<?php echo $fecha; ?>" />
    </div>
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-ingreso").submit(function(){
            return $(this).validate();
        });
    })
</script>
<?php

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset4);

mysqli_free_result($Recordset5);

mysqli_free_result($Recordset1);
 
?>
