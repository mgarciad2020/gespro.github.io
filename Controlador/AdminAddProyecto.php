<?php

    /* Including the `apigestor.php` file. */
    include_once 'apigestor.php';

    $api = new ApiGestor();
    /* Checking if the `fecha_fin` is empty or not. If it is empty, it will set the `fecha_fin` to
         `NULL` in the database. */
    if(isset($_GET['nombre']) && isset($_GET['fecha_inicio']) && isset($_GET['fecha_fin'])){
     /* Checking if the `fecha_fin` is empty or not. If it is empty, it will set the `fecha_fin` to
     `NULL` in the database. */
      if($_GET['fecha_fin'] == ''){
        $item = array(
            'nombre' => $_GET['nombre'],
            'estado'=> 'Activo',
            'fecha_inicio'=> $_GET['fecha_inicio'],
            'fecha_fin'=> NULL);
            $api->addProyecto($item);
      }else{
        $item = array(
        'nombre' => $_GET['nombre'],
        'estado'=> 'Activo',
        'fecha_inicio'=> $_GET['fecha_inicio'],
        'fecha_fin'=> $_GET['fecha_fin']);
        $api->addProyecto($item);
      }
    }else{
       /* A method that is defined in the `apigestor.php` file. */
        $api->error('Error al llamar a la API');
    }

    /* Redirecting the user to the dashboardproyectos.php page. */
    header("Location: /gespro.github.io/Vista/Administrador/dashboardproyectos.php")

?>