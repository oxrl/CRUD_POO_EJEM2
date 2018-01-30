<?php
require_once '../controllers/AlumnoController.php';
require_once '../models/Alumno.php';

// Logica
$modelAlum = new Alumno();
$alumController = new AlumnoController();
$data=null;
error_log('ACCION : '.$_POST['action']);
if(isset($_POST['action']))
{
	switch($_POST['action'])
	{
		case 'actualizar':
			$modelAlum->__SET('id',              $_POST['id']);
			$modelAlum->__SET('Nombre',          $_POST['Nombre']);
			$modelAlum->__SET('Apellido',        $_POST['Apellido']);
			$modelAlum->__SET('Sexo',            $_POST['Sexo']);
			$modelAlum->__SET('FechaNacimiento', $_POST['FechaNacimiento']);

			$alumController->Actualizar($modelAlum);
			echo 'ok';
			//header('Location: index.php');
			break;

		case 'registrar':
            $modelAlum->__SET('Nombre',          $_POST['Nombre']);
            $modelAlum->__SET('Apellido',        $_POST['Apellido']);
            $modelAlum->__SET('Sexo',            $_POST['Sexo']);
            $modelAlum->__SET('FechaNacimiento', $_POST['FechaNacimiento']);


			$alumController->Registrar($modelAlum);
			echo 'ok';
			//header('Location: index.php');
			break;

		case 'eliminar':
			$alumController->Eliminar($_POST['id']);
			echo 'ok';
			//header('Location: index.php');
			break;

		case 'editar':
		
			$data = $alumController->Obtener($_POST['id']);
			error_log('Data : '.print_r($data,true));
			echo json_encode($data);
			break;
	}
}

?>