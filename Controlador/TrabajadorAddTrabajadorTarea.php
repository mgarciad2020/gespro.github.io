<?php

    /* Including the file apigestor.php. */
    include_once 'apigestor.php';

    $api = new ApiGestor();

    /* Checking if the variables are set. If they are, it will create an array with the variables and
    call the function addTrabajadorTarea. If they are not set, it will call the error function. */
    if(isset($_GET['id_trabajador']) && isset($_GET['id_tarea']) && isset($_GET['fecha_inicio']) && isset($_GET['fecha_fin'])){
        $item = array(
            'id_trabajador' => $_GET['id_trabajador'],
            'id_tarea'=> $_GET['id_tarea'],
            'fecha_inicio'=> $_GET['fecha_inicio'],
            'fecha_fin'=> $_GET['fecha_fin']
        );
        
        $api->addTrabajadorTarea($item);
    }else{
        $api->error('Error al llamar a la API');
    }

    header("Location: /gespro.github.io/Vista/Trabajador/dashboarduser.php")?>