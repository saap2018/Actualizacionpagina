<h1 class="page-header">
    <?php echo $alm->IdLugar != null ? $alm->Placas : 'Ingreso de lugar'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Disponibilidad">Disponibilidad</a></li>
  <li class="active"> <?php echo $alm->IdLugar != null ? $alm->Placas : 'Ingreso de lugar'; ?></li>
</ol>

<form id="frm-cliente" action="?c=Disponibilidad&a=Modificar" method="post" enctype="multipart/form-data">
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
        <input type="text" name="Disponibilidad" value="<?php echo $alm->Disponibilidad == 1 ? 'Si' : 'No';  ?>" class="form-control" />
    </div>
     <div class="form-group">
        <label>Placas del Vehiculo </label>
        <input type="text" name="Placas" value="<?php echo $alm->Placas ?>" class="form-control" />
    </div>

    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Actulizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>

