<?php

/* Including the file apigestor.php */
    include_once 'apigestor.php';

    $api = new ApiGestor();

    /* Checking if the variables are set and if they are, it is adding them to the database. */
    if(isset($_GET['nombre']) && isset($_GET['apellidos']) && isset($_GET['dni']) && isset($_GET['email']) && isset($_GET['usuario']) && isset($_GET['contrasena'])){
        $item = array(
            'nombre' => $_GET['nombre'],
            'apellidos'=> $_GET['apellidos'],
            'dni'=> $_GET['dni'],
            'email'=> $_GET['email'],
            'usuario'=> $_GET['usuario'],
            'contrasena'=> $_GET['contrasena'],
            'estado'=> 'Activo'
        );
        $api->addTrabajador($item);
        
    }else{
        $api->error('Error al llamar a la API');
    }

    /* Redirecting the user to the dashboardadmin.php page. */
    header("Location: /gespro.github.io/Vista/administrador/dashboardadmin.php")
?>