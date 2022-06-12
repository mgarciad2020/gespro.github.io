<?php

   /* Including the file apigestor.php */
    include_once 'apigestor.php';

    $api = new ApiGestor();

    /* Checking if the id is set and if it is a number. If it is a number it will call the
    getByIdProyecto function. If it is not a number it will call the error function. If the id is
    not set it will call the getAllProyectos function. */
    if(isset($_GET['id'])){
        $id = $_GET['id'];

       /* Checking if the id is a number. */
        if(is_numeric($id)){
            $api->getByIdProyecto($id);
        }else{
            $api->error('Los parametros son incorrectos');
        }
    }else{
       /* Calling the function getAllProyectos() from the class ApiGestor. */
        $api->getAllProyectos();
    }

    

?>