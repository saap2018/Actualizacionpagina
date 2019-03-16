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
$Recordset2 = mysqli_query($link, "SELECT IdCliente FROM clientes ORDER BY IdCliente ASC") or die(mysqli_error($link));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
*/
$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset1 =  mysqli_query($link, "SELECT nombre_documento FROM tipo_de_documento") or die(mysqli_error($link));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset2 = mysqli_query($link, "SELECT nombre_cargo FROM cargos ORDER BY nombre_cargo ASC") or die(mysqli_error($link));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
?>
<h1 class="page-header">
    <?php echo $alm->IdEmpleado != null ? $alm->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Empleado">Empleados</a></li>
  <li class="active"><?php echo $alm->IdEmpleado != null ? $alm->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Empleado&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdEmpleado" value="<?php echo $alm->IdEmpleado; ?>" />
    
    <div class="form-group">
        <label>Tipo de Documento</label> 
        <label for="select"></label>
        <select required aria-required="true" name="TipoDeDocumento" id="select" class="form-control" required>
        <option value="">Seleccione tipo de documento </option>
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset1['nombre_documento']?>"><?php echo $row_Recordset1['nombre_documento']?></option>
          <?php
} while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
  $rows = mysqli_num_rows($Recordset1);
  if($rows > 0) {
      mysqli_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
  }
?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Numero de documento</label>
        <input type="text" name="Documento" value="<?php echo $alm->Documento ?>" class="form-control" placeholder="Numero de identificación" required="required"/>
    </div>
    <div class="form-group">
        <label>Nombres</label>
        <input type="text" name="Nombre" value="<?php echo $alm->Nombre; ?>" class="form-control" placeholder="Nombres completos"  required="required"/>
    </div>
    
    <div class="form-group">
        <label>Apellidos</label>
        <input type="text" name="Apellidos" value="<?php echo $alm->Apellidos; ?>" class="form-control" placeholder="Apellidos completos" required="required"/>
    </div>
    
    <div class="form-group">
        <label>Cargo</label>
        
      <label for="select2" ></label>
        <select name="Cargo" id="select2" class="form-control">
        <option required value="">Seleccione cargo </option>
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset2['nombre_cargo']?>"><?php echo $row_Recordset2['nombre_cargo']?></option>
          <?php
} while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2));
  $rows = mysqli_num_rows($Recordset2);
  if($rows > 0) {
      mysqli_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysqli_fetch_assoc($Recordset2);
  }
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
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);
?>
