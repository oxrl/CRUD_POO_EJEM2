<?php
require_once './controllers/AlumnoController.php';
require_once './models/Alumno.php';

// Logica
$modelAlum = new Alumno();
$alumController = new AlumnoController();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$modelAlum->__SET('id',              $_REQUEST['id']);
			$modelAlum->__SET('Nombre',          $_REQUEST['Nombre']);
			$modelAlum->__SET('Apellido',        $_REQUEST['Apellido']);
			$modelAlum->__SET('Sexo',            $_REQUEST['Sexo']);
			$modelAlum->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);

			$alumController->Actualizar($modelAlum);
			header('Location: index.php');
			break;

		case 'registrar':
            $modelAlum->__SET('Nombre',          $_REQUEST['Nombre']);
            $modelAlum->__SET('Apellido',        $_REQUEST['Apellido']);
            $modelAlum->__SET('Sexo',            $_REQUEST['Sexo']);
            $modelAlum->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);


			$alumController->Registrar($modelAlum);
			header('Location: index.php');
			break;

		case 'eliminar':
			$alumController->Eliminar($_REQUEST['id']);
			header('Location: index.php');
			break;

		case 'editar':
			$modelAlum = $alumController->Obtener($_REQUEST['id']);
			break;
	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Anexsoft</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="?action=<?php echo $modelAlum->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="id" value="<?php echo $modelAlum->__GET('id'); ?>" />
                    
                    <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" name="Nombre" value="<?php echo $modelAlum->__GET('Nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Apellido</th>
                            <td><input type="text" name="Apellido" value="<?php echo $modelAlum->__GET('Apellido'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Sexo</th>
                            <td>
                                <select name="Sexo" style="width:100%;">
                                    <option value="1" <?php echo $modelAlum->__GET('Sexo') == 1 ? 'selected' : ''; ?>>Masculino</option>
                                    <option value="2" <?php echo $modelAlum->__GET('Sexo') == 2 ? 'selected' : ''; ?>>Femenino</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Fecha</th>
                            <td><input type="text" name="FechaNacimiento" value="<?php echo $modelAlum->__GET('FechaNacimiento'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <th style="text-align:left;">Apellido</th>
                            <th style="text-align:left;">Sexo</th>
                            <th style="text-align:left;">Nacimiento</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($alumController->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('Nombre'); ?></td>
                            <td><?php echo $r->__GET('Apellido'); ?></td>
                            <td><?php echo $r->__GET('Sexo') == 1 ? 'H' : 'F'; ?></td>
                            <td><?php echo $r->__GET('FechaNacimiento'); ?></td>
                            <td>
                                <a href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>