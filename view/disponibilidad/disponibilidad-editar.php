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
$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset2 = mysqli_query($link, "SELECT Placas FROM vehiculos") or die(mysqli_error($link));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
?>
<h1 class="page-header">
    <?php echo $alm->IdLugar != null ? $alm->Placas : 'Ingreso de lugar'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Disponibilidad">Disponibilidad</a></li>
  <li class="active"> <?php echo $alm->IdLugar != null ? $alm->Placas : 'Ingreso de lugar'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Disponibilidad&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdLugar" value="<?php echo $alm->IdLugar; ?>" />
    
    <div class="form-group">
        <label>Fila</label>
        <input type="text" name="Fila" value="<?php echo $alm->Fila ?>" class="form-control" />
    </div>
    
    <div class="form-group">
        <label>Columna</label>
        <input type="text" name="Columna" value="<?php echo $alm->Columna ?>" class="form-control" />
    </div>
    <div class="form-group">
        <label>Disponible</label>
        <select name="Disponibilidad" class="form-control">
            <option <?php echo $alm->Disponibilidad == 1 ? 'selected' : ''; ?> value="1">Si</option>
            <option <?php echo $alm->Disponibilidad == 2 ? 'selected' : ''; ?> value="2">No</option>
        </select>
    </div>
     <div class="form-group">
        Placas del Vehiculo 
          <label for="select"></label>
          <select name="Placas" id="select" class="form-control">
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
  echo $alm->Placas;
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
