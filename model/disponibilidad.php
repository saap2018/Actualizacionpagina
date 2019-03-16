<?php
class Disponibilidad
{
	private $pdo;
    
	public $IdLugar;
	public $Fila; 
	public $Columna;
    public $Disponibilidad; 
	public $Placas; 
    
   
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

			$stm = $this->pdo->prepare("SELECT * FROM disponibilidad");
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
			          ->prepare("SELECT * FROM disponibilidad WHERE IdLugar = ?");
			          

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
			            ->prepare("DELETE FROM disponibilidad WHERE IdLugar = ?");			          

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
			$sql = "UPDATE disponibilidad SET 
						Fila          = ?, 
						Columna        = ?,
                        Disponibilidad        = ?,
						Placas        = ?
				    WHERE IdLugar = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
					    $data->Fila, 
						$data->Columna,
                        $data->Disponibilidad, 
						$data->Placas, 
                        $data->IdLugar
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Disponibilidad $data)
	{
		try 
		{
		$sql = "INSERT INTO disponibilidad (Fila, Columna, Disponibilidad, Placas)
		        VALUES (?, ?, ?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                     $data->Fila, 
						$data->Columna,
                        $data->Disponibilidad, 
						$data->Placas,
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}