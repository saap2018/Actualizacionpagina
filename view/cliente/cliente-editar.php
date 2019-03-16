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
$tipo = mysqli_query($link, "SELECT nombre_documento FROM tipo_de_documento") or die(mysql_error());
$row_tipo = mysqli_fetch_assoc($tipo);
$totalRows_tipo = mysqli_num_rows($tipo);
?>
<h1 class="page-header">
    <?php echo $alm->IdCliente != null ? $alm->NombreCliente : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Cliente">Clientes</a></li>
  <li class="active"><?php echo $alm->IdCliente != null ? $alm->NombreCliente : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-cliente" action="?c=Cliente&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdCliente" value="<?php echo $alm->IdCliente; ?>" />
    
    <div class="form-group">
        <label>Tipo </label>
      <label for="select"></label>
        <select name="TipoDocumento" id="select" class="form-control">
        <option required value="">Tipo de documento </option>
          <?php
do {  
?>
          <option value="<?php echo $row_tipo['nombre_documento']?>"><?php echo $row_tipo['nombre_documento']?></option>
          <?php
} while ($row_tipo = mysqli_fetch_assoc($tipo));
  $rows = mysqli_num_rows($tipo);
  if($rows > 0) {
      mysqli_data_seek($tipo, 0);
	  $row_tipo = mysqli_fetch_assoc($tipo);
  }
  echo $alm->TipoDocumento;
?>
        </select>
    </div>
    <div class="form-group">
        <label>Numero de Documento</label>
        <input type="text" name="DocumentoCliente" value="<?php echo $alm->DocumentoCliente; ?>" class="form-control" placeholder="Identificación del cliente"  required="required"/>
    </div>
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="NombreCliente" value="<?php echo $alm->NombreCliente; ?>" class="form-control" placeholder="Ingrese nombre Cliente" required="required"/>
    </div>
    
    <div class="form-group">
        <label>Apellidos</label>
        <input type="text" name="ApellidosCliente" value="<?php echo $alm->ApellidosCliente; ?>" class="form-control" placeholder="Ingrese apellidos cliente" required="required"/>
    </div>
    <div class="form-group">
        <label>Teléfono de contacto</label>
        <input type="text" name="NumeroTelefonico" value="<?php echo $alm->NumeroTelefonico; ?>" class="form-control" placeholder="Ingrese numero de contacto del cliente" required="required"/>
    </div>
    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="Email" value="<?php echo $alm->Email; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>
    <hr />
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-cliente").submit(function(){
            return $(this).validate();
        });
    })
</script>

