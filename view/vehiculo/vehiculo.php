<h1 class="page-header">Vehiculos</h1>
<ol class="breadcrumb">
  <li><a href="cuenta.php">Principal</a></li>	
</ol>
<div class="well well-sm text-right">
    <a class="btn btn-success" href="?c=Vehiculo&a=Crud">Crear vehículo</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
                    <th>Tipo de Vehiculo</th>
					 <th>Placas</th>
					 <th>Marca</th>
					 <th>Referencia</th>
					 <th>Color</th>
					 <th>Modelo</th>
					 <th>Descripcion</th>
					 <th>Cliente </th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->TipoV; ?></td>
            <td><?php echo $r->Placas; ?></td>
            <td><?php echo $r->Marca; ?></td>
            <td><?php echo $r->Referencia; ?></td>
            <td><?php echo $r->Color; ?></td>
            <td><?php echo $r->Modelo; ?></td>
            <td><?php echo $r->Descripcion; ?></td>
            <td><?php echo $r->NombreCliente; ?></td>
            <td>
                <a href="?c=Vehiculo&a=Update&id=<?php echo $r->IdVehiculoCliente; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Vehiculo&a=Eliminar&id=<?php echo $r->IdVehiculoCliente; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
<div class="well well-sm text-right">
    <a class="btn btn-primary" href="ingresos.php?c=Ingreso&a=Crud">Hacer ingreso</a>
</div>