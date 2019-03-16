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

mysql_select_db($database_saap, $saap);
$query_Tipo = "SELECT nombre_tipov FROM tipo_de_vehiculo";
$Tipo = mysql_query($query_Tipo, $saap) or die(mysql_error());
$row_Tipo = mysql_fetch_assoc($Tipo);
$totalRows_Tipo = mysql_num_rows($Tipo);

mysql_select_db($database_saap, $saap);
$query_Recordset1 = "SELECT NombreCliente, ApellidosCliente FROM clientes";
$Recordset1 = mysql_query($query_Recordset1, $saap) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<h1 class="page-header">
    <?php echo $alm->IdVehiculoCliente != null ? $alm->Marca." ".$alm->Referencia." ".$alm->Color."-".$alm->Placas : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Vehiculo">Nuevo vehiculo</a></li>
  <li class="active"><?php echo $alm->IdVehiculoCliente != null ? $alm->Marca." ".$alm->Referencia." ".$alm->Color."-".$alm->Placas : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-Vehiculo" action="?c=Vehiculo&a=Modificar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdVehiculoCliente" value="<?php echo $alm->IdVehiculoCliente; ?>" />
    
   <div class="form-group">
        <label>Tipo de Vehículo</label>
        <label for="select"></label>
     <label for="select2"></label>
        <select required aria-required="true" name="TipoV" id="select" class="form-control" required>
        <option value="<?php echo $alm->TipoV; ?>"><?php echo $alm->TipoV; ?></option>
          <?php
do {  
?>
          <option value="<?php echo $row_Tipo['nombre_tipov']?>"><?php echo $row_Tipo['nombre_tipov']?></option>
          <?php
} while ($row_Tipo = mysql_fetch_assoc($Tipo));
  $rows = mysql_num_rows($Tipo);
  if($rows > 0) {
      mysql_data_seek($Tipo, 0);
	  $row_Tipo = mysql_fetch_assoc($Tipo);
  }
?>
        </select>
   </div>
    
    <div class="form-group">
        <label>Placas del Vehiculo</label>
        <input type="text" name="Placas" value="<?php echo $alm->Placas; ?>" class="form-control" required="required" />
    </div>
    
    <div class="form-group">
        <label>Marca</label>
        <input type="text" name="Marca" value="<?php echo $alm->Marca; ?>" class="form-control" placeholder="Marca" required="required"/>
    </div>
    
    <div class="form-group">
        <label>Referencia</label>
        <input type="text" name="Referencia" value="<?php echo $alm->Referencia; ?>" class="form-control" placeholder="Referencia" required="required"/>
    </div>
    <div class="form-group">
        <label>Color</label>
        <input type="text" name="Color" value="<?php echo $alm->Color; ?>" class="form-control" placeholder="Color" required="required"/>
    </div>
    <div class="form-group">
        <label>Modelo del vehiculo</label>
        <input type="text" name="Modelo" value="<?php echo $alm->Modelo; ?>" class="form-control" placeholder="Modelo" required="required"/>
    </div>
    <div class="form-group">
        <label>Descripcion del vehiculo</label>
        <input type="text" name="Descripcion" value="<?php echo $alm->Descripcion; ?>" class="form-control" placeholder="Descripcion" required="required"/>
    </div>
  <div class="form-group">
    <label>Nombre del cliente</label>
    <select name="NombreCliente" id="select3" required aria-required="true" class="form-control" required>
    <option value="<?php echo $alm->NombreCliente; ?>"><?php echo $alm->NombreCliente; ?></option>
      <?php
do {  
?>
      <option value="<?php echo $row_Recordset1['NombreCliente']." ".$row_Recordset1['ApellidosCliente']?>"><?php echo $row_Recordset1['NombreCliente']." ".$row_Recordset1['ApellidosCliente']?></option>
      <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
    </select>
  </div>
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div><br />
    <div class="text-right">
        <a href="vehiculo.php">Cancelar</a>
    </div>
</form>
 
<script>
    $(document).ready(function(){
        $("#frm-Vehiculo").submit(function(){
            return $(this).validate();
        });
    })
</script>

<?php
mysql_free_result($Tipo);

mysql_free_result($Recordset1);
?>
