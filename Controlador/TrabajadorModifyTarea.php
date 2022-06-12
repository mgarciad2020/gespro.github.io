<?php

    /* Including the file `apigestor.php` in the current file. */
    include_once 'apigestor.php';

    $api = new ApiGestor();

/* Checking if the variables are set and if they are, it is creating an array with the variables and
calling the function modifyTarea. */
    if(isset($_GET['fecha_inicio']) && isset($_GET['fecha_fin']) && isset($_GET['nombre'])  && isset($_GET['descripcion']) && isset($_GET['estado']) && isset($_GET['usuario']) && isset($_GET['id_tarea'])){
        $item = array(
            'nombre'=> $_GET['nombre'],
            'estado'=> $_GET['estado'],
            'descripcion'=> $_GET['descripcion'],
            'fecha_inicio'=> $_GET['fecha_inicio'],
            'fecha_fin'=> $_GET['fecha_fin'],
            'usuario'=> $_GET['usuario'],
            'id_tarea'=> $_GET['id_tarea']
        );
        $api->modifyTarea($item);
    }else{
        $api->error('Error al llamar a la API');
    }

/* Redirecting the user to the dashboarduser.php page. */
    header("Location: /Gestor/Vista/Trabajador/dashboarduser.php")
?>