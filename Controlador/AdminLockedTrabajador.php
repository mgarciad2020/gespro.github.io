<?php

    /* Including the file apigestor.php */
    include_once 'apigestor.php';

    $api = new ApiGestor();

   /* Checking if the id_trabajador and estado are set and if they are numeric. */
     if(isset($_GET['id_trabajador']) && isset($_GET['estado'])){
      /* Checking if the id_trabajador is numeric. */
       if(is_numeric($_GET['id_trabajador'])){
        $item = array(
            'id_trabajador'=> $_GET['id_trabajador'],
            'estado'=> $_GET['estado']
        );
        $api->lockedTrabajador($item);
       }else{
           $api->error('Parametro introducido erroneo');
       }
        
    }else{
        $api->error('Error al llamar a la API');
    }

?>