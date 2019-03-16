
<h1 class="page-header">Plano del parqueadero</h1>
<ol class="breadcrumb">
  <li><a href="Login/inicio.php">Principal</a></li>	
</ol>
<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Disponibilidad&a=Crud">Disponibilidad de parqueaderos</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            			<th>Fila</th> 
						<th>Columna</th>
                        <th>Disponibilidad</th> 
						<th>Placas</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            
            <td><?php echo $r->Fila; ?></td>
            <td><?php echo $r->Columna; ?></td>
            <td><?php echo $r->Disponibilidad == 1 ? 'Si' : 'No'; ?></td>
            <td><?php echo $r->Placas; ?></td>
           <td>
                <a href="?c=Disponibilidad&a=Update&id=<?php echo $r->IdLugar; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Disponibilidad&a=Eliminar&id=<?php echo $r->IdLugar; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
