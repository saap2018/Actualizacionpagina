<h1 class="page-header">Empleados</h1>
<ol class="breadcrumb">
  <li><a href="cuenta.php">Principal</a></li>	
</ol>
<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Empleado&a=Crud">Nuevo empleado</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>TipoDeDocumento</th> 
            <th>Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Cargo</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->TipoDeDocumento; ?></td>
            <td><?php echo $r->Documento; ?></td>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Apellidos; ?></td>
            <td><?php echo $r->Cargo; ?></td>
            <td>
                <a href="?c=Empleado&a=Update&id=<?php echo $r->IdEmpleado; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Empleado&a=Eliminar&id=<?php echo $r->IdEmpleado; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
