
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
      <?php 
      require_once '../controllers/AlumnoController.php';
      require_once '../models/Alumno.php';
      $modelAlum = new Alumno();
      $alumController = new AlumnoController();
      foreach($alumController->Listar() as $r): ?>
          <tr>
              <td><?php echo utf8_encode($r->__GET('Nombre')); ?></td>
              <td><?php echo utf8_encode($r->__GET('Apellido')); ?></td>
              <td><?php echo utf8_encode($r->__GET('Sexo')) == 1 ? 'H' : 'F'; ?></td>
              <td><?php echo utf8_encode($r->__GET('FechaNacimiento')); ?></td>
              <td>
                  <a href="#" onClick="editarCliente(<?php echo $r->id; ?>);">Editar</a>
              </td>
              <td>
                  <a href="#" onClick="eliminarCliente(<?php echo $r->id; ?>);">Eliminar</a>
              </td>
          </tr>
      <?php endforeach; ?>
</table>    
