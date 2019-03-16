<h1 class="page-header">
    <?php echo $alm->Id != null ? $alm->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
 <li><a href="?c=Usuario">Usuarios</a></li>
  <li class="active"><?php echo $alm->Id != null ? $alm->nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-usuario" action="?c=Usuario&a=Modificar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="Id" value="<?php echo $alm->Id; ?>" />
    
    <div class="form-group">
        <label>Usuario</label>
        <input type="text" name="nombre" value="<?php echo $alm->nombre; ?>" class="form-control" placeholder="Ingrese su usuario"  />
    </div>
    
    <div class="form-group">
        <label>Password</label>
        <input type="text" name="clave" value="<?php echo $alm->clave; ?>" class="form-control" placeholder="Ingrese su password"  />
    </div>
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-usuario").submit(function(){
            return $(this).validate();
        });
    })
</script>