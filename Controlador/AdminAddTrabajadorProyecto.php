<?php

    /* Including the file `apigestor.php` in the current file. */
    include_once 'apigestor.php';

    $api = new ApiGestor();

/* Checking if the variables are set and if they are, it is creating an array with the variables and
then calling the function `addTrabajadorProyecto` with the array as a parameter. */
    if(isset($_GET['id_trabajador']) && isset($_GET['id_proyecto']) && isset($_GET['fecha_inicio']) && isset($_GET['fecha_fin'])){
        $item = array(
            'id_trabajador' => $_GET['id_trabajador'],
            'id_proyecto'=> $_GET['id_proyecto'],
            'fecha_inicio'=> $_GET['fecha_inicio'],
            'fecha_fin'=> $_GET['fecha_fin']
        );
        
        $api->addTrabajadorProyecto($item);
    }else{
        $api->error('Error al llamar a la API');
    }

    /* Redirecting the user to the page `dashboardadmin.php` after the data has been inserted. */
    header("Location: /Gestor/Vista/administrador/dashboardadmin.php")
?>