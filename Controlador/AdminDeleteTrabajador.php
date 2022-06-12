<?php

/* Including the file apigestor.php. */
include_once 'apigestor.php';

    $api = new ApiGestor();

    /* Checking if the id is set and if it is a number. */
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        /* Checking if the id is a number. */
        if(is_numeric($id)){
            $api->deleteTrabajador($id);

        }else{
            $api->error('Los parametros son incorrectos');
        }
    }else{
        $api->error('Los parametros son incorrectos');
    }

   /* Redirecting the user to the dashboardadmin.php page. */
    header("Location: /gespro.github.io/Vista/Administrador/dashboardadmin.php");
?>