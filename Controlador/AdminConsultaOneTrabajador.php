<?php

/* Including the file apigestor.php */
include_once 'apigestor.php';

    $api = new ApiGestor();

/**
 * If the id is numeric, then get the id of the worker, otherwise, show an error.
 */
    function recuperarTrabajador(){
         if(is_numeric($id)){
                $api->getByIdTrabajador($id);
                exit();
    
            }else{
                $api->error('Los parametros son incorrectos');
            }
        }
?>