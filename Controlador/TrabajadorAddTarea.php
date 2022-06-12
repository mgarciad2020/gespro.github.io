<?php

    /* Including the file apigestor.php, which is the file that contains the functions that will be
    used in this file. */
    include_once 'apigestor.php';

    $api = new ApiGestor();

/* Checking if the variables are set, if they are, it will create an array with the variables and call
the function addTarea. */
    if(isset($_GET['id_proyecto']) && isset($_GET['fecha_inicio']) && isset($_GET['fecha_fin']) && isset($_GET['nombre'])  && isset($_GET['descripcion']) && isset($_GET['usuario'])){
        $item = array(
            'id_proyecto'=> $_GET['id_proyecto'],
            'fecha_inicio'=> $_GET['fecha_inicio'],
            'fecha_fin'=> $_GET['fecha_fin'],
            'nombre'=> $_GET['nombre'],
            'descripcion'=> $_GET['descripcion'],
            'estado'=> 'Pendiente',
            'usuario'=> $_GET['usuario']
        );
        $api->addTarea($item);
    }else{
        $api->error('Error al llamar a la API');
    }

/* Redirecting the user to the dashboarduser.php page. */
    header("Location: /gespro.github.io/Vista/Trabajador/dashboarduser.php");
?>