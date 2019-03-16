<?php
class Cliente
{
	private $pdo;
    
    public $IdCliente;
    public $TipoDocumento;
    public $DocumentoCliente;
    public $NombreCliente;
    public $ApellidosCliente;
    public $NumeroTelefonico;
    public $Email;
    
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

			$stm = $this->pdo->prepare("SELECT * FROM clientes");
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
			          ->prepare("SELECT * FROM clientes WHERE IdCliente = ?");
			          

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
			            ->prepare("DELETE FROM clientes WHERE IdCliente = ?");			          

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
			$sql = "UPDATE clientes SET 
						TipoDocumento= ? ,
						DocumentoCliente= ? ,
						NombreCliente= ? ,
						ApellidosCliente= ? ,
						NumeroTelefonico= ? ,
						Email = ?
					    WHERE IdCliente = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						
    $data->TipoDocumento,
    $data->DocumentoCliente,
    $data->NombreCliente,
    $data->ApellidosCliente,
    $data->NumeroTelefonico,
    $data->Email,
        $data->IdCliente        
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Cliente $data)
	{
		try 
		{
		$sql = "INSERT INTO clientes (TipoDocumento, DocumentoCliente, NombreCliente, ApellidosCliente, NumeroTelefonico, Email) VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->TipoDocumento,
    				$data->DocumentoCliente,
    				$data->NombreCliente,
    				$data->ApellidosCliente,
    				$data->NumeroTelefonico,
    				$data->Email
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}