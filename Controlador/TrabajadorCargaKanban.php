<?php
/* Including the file apigestor.php. */
    include_once 'apigestor.php';

    $api = new ApiGestor();
    
  /* Getting the id and the state of the task and then it is calling the function getKanban. */
   if(isset($_GET['id_tarea']) && isset($_GET['estado'])) {
        $item = array(
            'id' => $_GET['id_tarea'],
            'estado'=> $_GET['estado']
        );
    }
    
    $api->getKanban($item);

?>