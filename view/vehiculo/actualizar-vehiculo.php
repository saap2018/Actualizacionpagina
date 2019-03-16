<?php require_once('../../Connections/prueba.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE vehiculos SET TipoV=%s, Placas=%s, Marca=%s, Referencia=%s, Color=%s, Modelo=%s, Descripcion=%s, IdCliente=%s WHERE IdVehiculoCliente=%s",
                       GetSQLValueString($_POST['TipoV'], "text"),
                       GetSQLValueString($_POST['Placas'], "text"),
                       GetSQLValueString($_POST['Marca'], "text"),
                       GetSQLValueString($_POST['Referencia'], "text"),
                       GetSQLValueString($_POST['Color'], "text"),
                       GetSQLValueString($_POST['Modelo'], "text"),
                       GetSQLValueString($_POST['Descripcion'], "text"),
                       GetSQLValueString($_POST['IdCliente'], "int"),
                       GetSQLValueString($_POST['IdVehiculoCliente'], "int"));

  mysql_select_db($database_prueba, $prueba);
  $Result1 = mysql_query($updateSQL, $prueba) or die(mysql_error());

  $updateGoTo = "../../vehiculos.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_prueba, $prueba);
$query_Recordset1 = "SELECT * FROM vehiculos";
$Recordset1 = mysql_query($query_Recordset1, $prueba) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<h1 class="page-header">
    <?php echo $alm->IdVehiculoCliente != null ? $alm->Marca : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Vehiculo">Nuevo vehiculo</a></li>
  <li class="active"><?php echo $alm->IdVehiculoCliente != null ? $alm->Marca : 'Nuevo Registro'; ?></li>
</ol	>

<form id="frm-Vehiculo" action="?c=Vehiculo&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdVehiculoCliente" value="<?php echo $alm->id_vehiculo; ?>" />
    
    <div class="form-group"></div>
</form>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">TipoV:</td>
      <td><input type="text" name="TipoV" value="<?php echo htmlentities($row_Recordset1['TipoV'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Placas:</td>
      <td><input type="text" name="Placas" value="<?php echo htmlentities($row_Recordset1['Placas'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Marca:</td>
      <td><input type="text" name="Marca" value="<?php echo htmlentities($row_Recordset1['Marca'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Referencia:</td>
      <td><input type="text" name="Referencia" value="<?php echo htmlentities($row_Recordset1['Referencia'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Color:</td>
      <td><input type="text" name="Color" value="<?php echo htmlentities($row_Recordset1['Color'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Modelo:</td>
      <td><input type="text" name="Modelo" value="<?php echo htmlentities($row_Recordset1['Modelo'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Descripcion:</td>
      <td><input type="text" name="Descripcion" value="<?php echo htmlentities($row_Recordset1['Descripcion'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">IdCliente:</td>
      <td><input type="text" name="IdCliente" value="<?php echo htmlentities($row_Recordset1['IdCliente'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Actualizar registro" /></td>
    </tr>
  </table>
  <input type="hidden" name="IdVehiculoCliente" value="<?php echo $row_Recordset1['IdVehiculoCliente']; ?>" />
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="IdVehiculoCliente" value="<?php echo $row_Recordset1['IdVehiculoCliente']; ?>" />
</form>
<p>&nbsp;</p>
<script>
    $(document).ready(function(){
        $("#frm-Vehiculo").submit(function(){
            return $(this).validate();
        });
    })
</script>
<?php
mysql_free_result($Recordset1);
?>
