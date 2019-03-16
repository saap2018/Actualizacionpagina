<?php require_once('Connections/prueba.php'); ?>
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
/*
$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$tipo = mysqli_query($link, "SELECT nombre_tipov FROM tipo_de_vehiculo") or die(mysql_error());
$row_tipo = mysqli_fetch_assoc($tipo);
$totalRows_tipo = mysqli_num_rows($tipo);
*/
$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset2 = mysqli_query($link, "SELECT Placas FROM vehiculos") or die(mysql_error());
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
?>
<h1 class="page-header">
    <?php echo $alm->IdControlTiempo != null ? $alm->PlacaVehiculo : 'Ingresar tiempo'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Tiempo">Tiempo</a></li>
  <li class="active"> <?php echo $alm->IdControlTiempo != null ? $alm->PlacaVehiculo : 'Ingresar tiempo'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Tiempo&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdControlTiempo" value="<?php echo $alm->IdControlTiempo; ?>" />
    
    <div class="form-group">
        <label>Hora de entrada</label>
        <input type="time" name="HoraEntrada" value="<?php echo $alm->HoraEntrada ?>" class="form-control" placeholder="Hora que ingreso el vehiculo" />
    </div>
    
    <div class="form-group">
        <label>Hora de Salida</label>
        <input type="time" name="HoraSalida" value="<?php echo $alm->HoraSalida ?>" class="form-control" placeholder="Hora  de salida del vehiculo" />
    </div>
    
     <div class="form-group">
        Placas del Vehiculo 
          <label for="select"></label>
          <select name="PlacaVehiculo" id="select">
          <option value="">Placa del vehículo </option>
            <?php
do {  
?>
            <option value="<?php echo $row_Recordset2['Placas']?>"><?php echo $row_Recordset2['Placas']?></option>
            <?php
} while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2));
  $rows = mysqli_num_rows($Recordset2);
  if($rows > 0) {
      mysqli_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysqli_fetch_assoc($Recordset2);
  }
  echo $alm->PlacaVehiculo;
?>
          </select>
    </div>
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
<?php

mysqli_free_result($Recordset2);
?>
