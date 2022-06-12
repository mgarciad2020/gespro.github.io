<?php

/* Including the file apigestor.php */
include_once 'apigestor.php';

    $api = new ApiGestor();

    /* Checking if the id is a number. If it is, it will call the function getByIdTrabajador() from the
    class ApiGestor. If it is not, it will call the function error() from the class ApiGestor. */
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        /* This is checking if the id is a number. If it is, it will call the function
        getByIdTrabajador() from the class ApiGestor. If it is not, it will call the function
        error() from the class ApiGestor. */
        if(is_numeric($id)){
            $api->getByIdTrabajador($id);
            exit();

        }else{
            $api->error('Los parametros son incorrectos');
        }
    }else{
       /* Calling the function getAllTrabajadores() from the class ApiGestor. */
        $api->getAllTrabajadores();
    }

?>