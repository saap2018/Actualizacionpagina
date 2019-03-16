<?php
session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
require_once 'model/cliente.php';

class ClienteController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Cliente();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/cliente/cliente.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Cliente();
        
        require_once 'view/header.php';
        require_once 'view/cliente/cliente-editar.php';
        require_once 'view/footer.php';
    }
    public function Update(){
        $alm = new Cliente();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/cliente/cliente-actualizar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Cliente();
        
        $alm->IdCliente = $_REQUEST['IdCliente'];
        $alm->TipoDocumento = $_REQUEST['TipoDocumento'];
        $alm->DocumentoCliente = $_REQUEST['DocumentoCliente'];
        $alm->NombreCliente = $_REQUEST['NombreCliente'];
        $alm->ApellidosCliente = $_REQUEST['ApellidosCliente'];
        $alm->NumeroTelefonico = $_REQUEST['NumeroTelefonico'];
		$alm->Email = $_REQUEST['Email'];	
        
            $this->model->Registrar($alm);
        
        header('Location: registro clientes.php');
    }
    public function Modificar(){
        $alm = new Cliente();
    	$alm->IdCliente = $_REQUEST['IdCliente'];
        $alm->TipoDocumento = $_REQUEST['TipoDocumento'];
        $alm->DocumentoCliente = $_REQUEST['DocumentoCliente'];
        $alm->NombreCliente = $_REQUEST['NombreCliente'];
        $alm->ApellidosCliente = $_REQUEST['ApellidosCliente'];
        $alm->NumeroTelefonico = $_REQUEST['NumeroTelefonico'];
		$alm->Email = $_REQUEST['Email'];
		
        	
            $this->model->Actualizar($alm);
     
	header('Location: registro clientes.php');
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: registro clientes.php');
    }
}