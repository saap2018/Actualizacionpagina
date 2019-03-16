<?php
class Usuario
{
	private $pdo;
    public $uid;
    public $username;
    public $password;
	public $email;
    public $name;
	
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

			$stm = $this->pdo->prepare("SELECT * FROM users");
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
			          ->prepare("SELECT * FROM users WHERE uid = ?");
			          

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
			            ->prepare("DELETE FROM users WHERE uid = ?");			          

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
			$sql = "UPDATE users SET 
						username = ?,
						password = ?,
						email= ?,
						name = ?
				    WHERE uid = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->username,
                    	$data->password,
						$data->email,
                    	$data->name
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Usuario $data)
	{
		try 
		{
		$sql = "INSERT INTO users (username,password,email,name) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->username,
                    $data->password,
					$data->email,
                    $data->name 
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}