<?php
class Empleado
{
	private $pdo;
    
    public $IdEmpleado;
    public $TipoDeDocumento;
    public $Documento;
    public $Nombre;
    public $Apellidos;
    public $Cargo;

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

			$stm = $this->pdo->prepare("SELECT * FROM empleados");
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
			          ->prepare("SELECT * FROM empleados WHERE IdEmpleado = ?");
			          

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
			            ->prepare("DELETE FROM empleados WHERE IdEmpleado = ?");			          

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
			$sql = "UPDATE empleados SET 
						TipoDeDocumento          = ?, 
						Documento        = ?,
                        Nombre        = ?,
						Apellidos            = ?, 
						Cargo = ?
				    WHERE IdEmpleado = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->TipoDeDocumento, 
                        $data->Documento,
                        $data->Nombre,
                        $data->Apellidos,
                        $data->Cargo,
                        $data->IdEmpleado
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Empleado $data)
	{
		try 
		{
		$sql = "INSERT INTO empleados (TipoDeDocumento, Documento, Nombre, Apellidos, Cargo) 
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->TipoDeDocumento, 
                        $data->Documento,
                        $data->Nombre,
                        $data->Apellidos,
                        $data->Cargo,
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}