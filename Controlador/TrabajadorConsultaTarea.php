<?php

/* Including the file apigestor.php. */
include_once 'apigestor.php';

    $api = new ApiGestor();

    /* Checking if the id is a number. If it is, it will call the function getTareaByIdProyecto()
    from the class ApiGestor. If it is not, it will call the function error('Escribe el id de un
    proyecto existente para ver la informacion') from the class ApiGestor. */
    if(isset($_GET['id'])){
        $id = $_GET['id'];

       /* Checking if the id is a number. If it is, it will call the function getTareaByIdProyecto()
       from the class ApiGestor. If it is not, it will call the function error('Escribe el id de un
       proyecto existente para ver la informacion') from the class ApiGestor. */
        if(is_numeric($id)){
            $api->getTareaByIdProyecto($id);
        }else{
            $api->error('Escribe el id de un proyecto existente para ver la informacion');
        }
    }else{
       /* Calling the function getAllTareas() from the class ApiGestor. */
        $api->getAllTareas();
    }



?>