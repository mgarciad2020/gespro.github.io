<?php

   /* Including the file apigestor.php */
    include_once 'apigestor.php';

    $api = new ApiGestor();
/* Checking if the date is empty or not. */
   if(isset($_GET['nombre']) && isset($_GET['estado']) && isset($_GET['fecha_inicio']) && isset($_GET['fecha_fin']) && isset($_GET['id_proyecto']) ){
/* Checking if the date is empty or not. */
      if($_GET['fecha_fin'] == ''){
        $item = array(
            'nombre' => $_GET['nombre'],
            'estado'=> $_GET['estado'],
            'fecha_inicio'=> $_GET['fecha_inicio'],
            'fecha_fin'=> NULL,
            'id_proyecto'=> $_GET['id_proyecto']
            );
            $api->modifyProyecto($item);
      }else{
        $item = array(
        'nombre' => $_GET['nombre'],
        'estado'=> $_GET['estado'],
        'fecha_inicio'=> $_GET['fecha_inicio'],
        'fecha_fin'=> $_GET['fecha_fin'],
        'id_proyecto'=> $_GET['id_proyecto']
        );
        $api->modifyProyecto($item);
      }
    }else{
        $api->error('Error al llamar a la API');
    }

    /* Redirecting the user to the dashboardproyectos.php page. */
    header("Location: /gespro.github.io/Vista/Administrador/dashboardproyectos.php")
?>