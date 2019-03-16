<?php
class Tiempo
{
	private $pdo;
    
    public $IdControlTiempo;
    public $NombreConvenio;
    public $Valor;
    public $PlacaVehiculo;
   
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM tiempo");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tiempo WHERE IdControlTiempo = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM tiempo WHERE IdControlTiempo = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE tiempo SET 
						HoraEntrada          = ?, 
						HoraSalida        = ?,
                        PlacaVehiculo        = ?
				    WHERE IdControlTiempo = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->HoraEntrada, 
                        $data->HoraSalida,
                        $data->PlacaVehiculo,
                        $data->IdControlTiempo
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Tiempo $data)
	{
		try 
		{
		$sql = "INSERT INTO tiempo (HoraEntrada, HoraSalida, PlacaVehiculo) 
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                     $data->HoraEntrada, 
                        $data->HoraSalida,
                        $data->PlacaVehiculo
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Placas()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT Placas FROM vehiculos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
}