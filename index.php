<!DOCTYPE html>
<html lang="es">
	<head>
        <meta charset="UTF-8">
		<title>Anexsoft</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <script src="./assets/js/jquery.min.js"></script>
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="#" method="post" id="form_1" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="id" id="id" value="" />
                    
                    <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" name="Nombre" id="Nombre" value="" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Apellido</th>
                            <td><input type="text" name="Apellido" id="Apellido" value="" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Sexo</th>
                            <td>
                                <select id="Sexo" name="Sexo" style="width:100%;">
                                    <option value="1">Masculino</option>
                                    <option value="2" >Femenino</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Fecha</th>
                            <td><input type="text" id="FechaNacimiento" name="FechaNacimiento" value="" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" id="nuevo" class="pure-button pure-button-primary">Nuevo</button>
                                <button type="submit" id="agregar" class="pure-button pure-button-primary" onClick="agregarCliente">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <div id="tabla"></div>
              
            </div>
        </div>
        
        <script src="./assets/js/script.js"></script>

    </body>
</html>