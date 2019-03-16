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
$query_Recordset1 = "SELECT NombreCliente, ApellidosCliente FROM clientes";
$Recordset1 = mysql_query($query_Recordset1, $saap) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

?>
<h1 class="page-header">
    <?php echo $alm->IdConvenio != null ? $alm->NombreConvenio : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Convenio">Convenio</a></li>
  <li class="active"><?php echo $alm->IdConvenio != null ? $alm->NombreConvenio : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Convenio&a=Modificar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdConvenio" value="<?php echo $alm->IdConvenio; ?>" />
    
    <div class="form-group">
        <label>Nombre de Convenio</label>
        <input type="text" name="NombreConvenio" value="<?php echo $alm->NombreConvenio ?>" class="form-control" placeholder="Nombre de Convenio" />
    </div>
    
    <div class="form-group">
        <label>Valor Total del convenio</label>
        <input type="text" name="Valor" value="<?php echo $alm->Valor ?>" class="form-control" placeholder="Numero de identificación" />
    </div>
    
    <div class="form-group">
        <label>Nombre del cliente</label>
      <select name="NombreCliente" id="select" class="form-control">
      <option value="<?php echo $alm->NombreCliente; ?>"><?php echo $alm->NombreCliente; ?></option>
        <?php
do {  
?>
        <option value="<?php echo $row_Recordset1['NombreCliente'].$row_Recordset1['ApellidosCliente']?>"><?php echo $row_Recordset1['NombreCliente'].$row_Recordset1['ApellidosCliente']?></option>
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

mysql_free_result($Recordset1);
?>
