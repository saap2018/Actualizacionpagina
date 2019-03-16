<?php
session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
require_once 'model/tiempo.php';

class TiempoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Tiempo();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/tiempo/tiempo.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Tiempo();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/tiempo/tiempo-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Tiempo();
        
		$alm->IdControlTiempo = $_REQUEST['IdControlTiempo'];
		$alm->HoraEntrada = $_REQUEST['HoraEntrada']; 
        $alm->HoraSalida = $_REQUEST['HoraSalida'];
        $alm->PlacaVehiculo = $_REQUEST['PlacaVehiculo'];
        
        $alm->IdControlTiempo > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: tiempos.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: tiempos.php');
    }
}