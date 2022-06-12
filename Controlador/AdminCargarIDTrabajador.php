<?php
    /* Including the file apigestor.php. */
    include_once 'apigestor.php';

    $api = new ApiGestor();

    /* Checking if the getAllIdByTrabajador is set. If it is, it will call the getAllIdByTrabajador
    function. */
    if(isset($_GET['getAllIdByTrabajador'] )) {
        $api->getAllIdByTrabajador();
    }

?>