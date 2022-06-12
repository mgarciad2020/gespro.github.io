<?php
   /* Including the file apigestor.php. */
    include_once 'apigestor.php';

    $api = new ApiGestor();

    /* Checking if the getAllTareas is set. If it is, it will call the getAllTareas function. */
    if(isset($_GET['getAllTareas'] )) {
        $api->getAllTareas();
    }

?>