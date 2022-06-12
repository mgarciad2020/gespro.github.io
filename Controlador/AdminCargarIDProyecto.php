<?php
/* Including the file apigestor.php. */
    include_once 'apigestor.php';

    $api = new ApiGestor();

   /* Checking if the getAllIdByProyecto is set and if it is it will call the getAllIdByProyecto
   function. */
    if(isset($_GET['getAllIdByProyecto'] )) {
        $api->getAllIdByProyecto();
    }

?>