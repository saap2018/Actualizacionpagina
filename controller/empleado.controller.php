<?php
session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
require_once 'model/empleado.php';

class EmpleadoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Empleado();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/empleado/empleado.php';
        require_once 'view/footer.php';
    }
   public function Crud(){
        $alm = new Empleado();
        
        require_once 'view/header.php';
        require_once 'view/empleado/empleado-editar.php';
        require_once 'view/footer.php';
    }
    public function Update(){
        $alm = new Empleado();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/empleado/empleado-actualizar.php';
        require_once 'view/footer.php';
    } 
   
    public function Guardar(){
        $alm = new Empleado();
        
        $alm->IdEmpleado = $_REQUEST['IdEmpleado'];
        $alm->TipoDeDocumento = $_REQUEST['TipoDeDocumento'];
        $alm->Documento = $_REQUEST['Documento'];
        $alm->Nombre = $_REQUEST['Nombre'];
        $alm->Apellidos = $_REQUEST['Apellidos'];
        $alm->Cargo = $_REQUEST['Cargo'];

       $this->model->Registrar($alm);
        
        header('Location: empleados.php');
    }
    public function Modificar(){
        $alm = new Empleado();
        $alm->IdEmpleado = $_REQUEST['IdEmpleado'];
        $alm->TipoDeDocumento = $_REQUEST['TipoDeDocumento'];
        $alm->Documento = $_REQUEST['Documento'];
        $alm->Nombre = $_REQUEST['Nombre'];
        $alm->Apellidos = $_REQUEST['Apellidos'];
        $alm->Cargo = $_REQUEST['Cargo'];
	
        	
            $this->model->Actualizar($alm);
     
		header('Location: empleados.php');
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: empleados.php');
    }
}