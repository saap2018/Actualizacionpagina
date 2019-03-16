<h1 class="page-header">Convenios</h1>
<ol class="breadcrumb">
  <li><a href="Login/inicio.php">Principal</a></li>	
</ol>
<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Convenio&a=Crud">Nuevo convenio</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th >Nombre del convenio</th> 
            <th>Valor</th>
            <th>Nombre Cliente</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->NombreConvenio; ?></td>
            <td><?php echo $r->Valor; ?></td>
            <td><?php echo $r->NombreCliente; ?></td>
            <td>
                <a href="?c=Convenio&a=Update&id=<?php echo $r->IdConvenio; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Convenio&a=Eliminar&id=<?php echo $r->IdConvenio; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
