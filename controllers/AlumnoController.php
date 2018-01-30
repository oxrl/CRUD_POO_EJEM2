<?php
class AlumnoController
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			 
			$this->pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'Majcp071102');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
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

			$stm = $this->pdo->prepare("SELECT * FROM alumnos");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$modelAlum = new Alumno();

				$modelAlum->__SET('id', $r->id);
				$modelAlum->__SET('Nombre', $r->Nombre);
				$modelAlum->__SET('Apellido', $r->Apellido);
				$modelAlum->__SET('Sexo', $r->Sexo);
				$modelAlum->__SET('FechaNacimiento', $r->FechaNacimiento);

				$result[] = $modelAlum;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{	
		$result=null;
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM alumnos WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$modelAlum = new Alumno();

			$modelAlum->__SET('id', $r->id);
			$modelAlum->__SET('Nombre', $r->Nombre);
			$modelAlum->__SET('Apellido', $r->Apellido);
			$modelAlum->__SET('Sexo', $r->Sexo);
			$modelAlum->__SET('FechaNacimiento', $r->FechaNacimiento);
			$result= array('id' => $r->id,'Nombre'=> utf8_encode($r->Nombre),'Apellido' => utf8_encode($r->Apellido),'Sexo' => $r->Sexo,'FechaNacimiento' => utf8_encode($r->FechaNacimiento) );
            error_log('Result : '.print_r($result,true));
			return $result;
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
			          ->prepare("DELETE FROM alumnos WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Alumno $data)
	{
		error_log('ID DEL CONTROLLADOR : '.$data->__GET('id'));
		try 
		{
			$sql = "UPDATE alumnos SET 
						Nombre          = ?, 
						Apellido        = ?,
						Sexo            = ?, 
						FechaNacimiento = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Nombre'), 
					$data->__GET('Apellido'), 
					$data->__GET('Sexo'),
					$data->__GET('FechaNacimiento'),
					$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Alumno $data)
	{
		try 
		{
		$sql = "INSERT INTO alumnos (Nombre,Apellido,Sexo,FechaNacimiento) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				utf8_decode($data->__GET('Nombre')), 
				utf8_decode($data->__GET('Apellido')), 
				utf8_decode($data->__GET('Sexo')),
				utf8_decode($data->__GET('FechaNacimiento'))
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}