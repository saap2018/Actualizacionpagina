<?php
session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
require_once 'model/vehiculo.php';

class VehiculoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Vehiculo();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/vehiculo/vehiculo.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Vehiculo();
        
        require_once 'view/header.php';
        require_once 'view/vehiculo/vehiculo-editar.php';
        require_once 'view/footer.php';
    }
    public function Update(){
        $alm = new Vehiculo();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/vehiculo/vehiculo-actualizar.php';
        require_once 'view/footer.php';
    }
    public function Guardar(){
        $alm = new Vehiculo();
        
            $alm->IdVehiculoCliente = $_REQUEST['IdVehiculoCliente'];
			$alm->TipoV = $_REQUEST['TipoV'];
            $alm->Placas = $_REQUEST['Placas'];
            $alm->Marca = $_REQUEST['Marca'];
            $alm->Referencia = $_REQUEST['Referencia'];
            $alm->Color = $_REQUEST['Color'];
            $alm->Modelo = $_REQUEST['Modelo'];
            $alm->Descripcion = $_REQUEST['Descripcion'];
            $alm->NombreCliente = $_REQUEST['NombreCliente'];
		
        
            $this->model->Registrar($alm);
        
        header('Location: vehiculos.php');
    }
	public function Modificar(){
        $alm = new Vehiculo();
    		$alm->IdVehiculoCliente = $_REQUEST['IdVehiculoCliente'];    
			$alm->TipoV = $_REQUEST['TipoV'];
            $alm->Placas = $_REQUEST['Placas'];
            $alm->Marca = $_REQUEST['Marca'];
            $alm->Referencia = $_REQUEST['Referencia'];
            $alm->Color = $_REQUEST['Color'];
            $alm->Modelo = $_REQUEST['Modelo'];
            $alm->Descripcion = $_REQUEST['Descripcion'];
            $alm->NombreCliente = $_REQUEST['NombreCliente'];
		
        	
            $this->model->Actualizar($alm);
        
        header('Location: vehiculos.php');
    }
   
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: vehiculos.php');
    }
}