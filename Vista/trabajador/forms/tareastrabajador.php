<?php
//http://localhost/Gestor/controlador/TrabajadorCargaKanban.php?id_tarea=22&estado=Procesando
include_once '../../Controlador/apikanban.php';

function RecuperarByEstado($id, $estado){
    $item['id'] = $id;
    $item['estado'] = $estado;
    $kanban = new Gestor();
    $result = $kanban->CargarListaKanban($item)->fetchAll();
    return $result;
}

$PENDIENTE = RecuperarByEstado($id, "Pendiente");
$PROCESANDO = RecuperarByEstado($id, "Procesando");
$FINALIZADO = RecuperarByEstado($id, "Finalizado");
?>


<table class="table">
  <thead>
    <tr>
      <th style="font-size:25px;" scope="col">Pendiente</th>
      <th style="font-size:25px;" scope="col">En Progreso</th>
      <th style="font-size:25px;" scope="col">Finalizado</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="danger">
      <table>
        <tr>
            <?php
                foreach ($PENDIENTE as $key => $value) {
                  echo '<a style="color:black; text-decoration:none; font-size:18px;" href="../../../Gestor/Vista/Trabajador/dashboardmodifytarea.php">'.$value['NOMBRE'].'</a> <br><br>';
                }
            ?>
        </tr>
    </table>
      </td>
      <td class="warning">
      <table>
        <tr>
            <?php
                foreach ($PROCESANDO as $key => $value) {
                  echo '<a style="color:black; text-decoration:none; font-size:18px;" href="../../../Gestor/Vista/Trabajador/dashboardmodifytarea.php">'.$value['NOMBRE'].'</a> <br><br>';
                }

            ?>
        </tr>
    </table>
      </td>
      <td class="success">
      <table>
        <tr>
            <?php
                foreach ($FINALIZADO as $key => $value) {
                  echo '<a style="color:black; text-decoration:none; font-size:18px;" href="../../../Gestor/Vista/Trabajador/dashboardmodifytarea.php">'.$value['NOMBRE'].'</a> <br><br>';
                }

            ?>
        </tr>
    </table>
      </td>
    </tr>
    
      
  </tbody>
</table>