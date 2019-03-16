<h1 class="page-header">
    <?php echo $alm->IdControlIngreso != null ? $alm->PlacasVehiculo : 'Modificar ingreso'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Ingreso">Ingreso</a></li>
  <li class="active"><?php echo $alm->IdControlIngreso != null ? $alm->PlacasVehiculo : 'Modificar ingreso'; ?></li>
</ol>

<form id="frm-ingreso" action="?c=Ingreso&a=Modificar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdControlIngreso" value="<?php echo $alm->IdControlIngreso; ?>" />
    
   <div class="form-group">
        <label>Hora entrada</label>
        <input type="text" name="tiempo" value="<?php echo $alm->tiempo; ?>" class="form-control" />
    </div>
    <div class="form-group">
        <label>Tipo de tarifa</label>
        <input type="text" name="TipoTarifa" value="<?php echo $alm->TipoTarifa; ?>" class="form-control" placeholder="Ingrese nombre Cliente"  />
    </div>
    
    <div class="form-group">
        <label>Placa del vehiculo</label>
        <input type="text" name="PlacasVehiculo" value="<?php echo $alm->PlacasVehiculo; ?>" class="form-control" />
    </div>
    <div class="form-group">
        <label>Nombre del Empleado</label>
        <input type="text" name="NombreEmpleado" value="<?php echo $alm->NombreEmpleado; ?>" class="form-control" placeholder="Ingrese numero de contacto del cliente" />
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

