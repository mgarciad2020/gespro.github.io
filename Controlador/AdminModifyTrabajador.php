<?php

/* Including the file apigestor.php */
    include_once 'apigestor.php';

    $api = new ApiGestor();

/* Checking if the variables are set and if they are it is creating an array with the variables and
calling the function modifyTrabajador. */
    if(isset($_GET['nombre']) && isset($_GET['apellidos']) && isset($_GET['dni']) && isset($_GET['email']) && isset($_GET['usuario']) && isset($_GET['contrasena']) && isset($_GET['estado']) && isset($_GET['id_trabajador'])){
        $item = array(
            'nombre' => $_GET['nombre'],
            'apellidos'=> $_GET['apellidos'],
            'dni'=> $_GET['dni'],
            'email'=> $_GET['email'],
            'usuario'=> $_GET['usuario'],
            'contrasena'=> $_GET['contrasena'],
            'estado'=> $_GET['estado'],
            'id_trabajador'=> $_GET['id_trabajador']
        );
        $api->modifyTrabajador($item);
    }else{
        $api->error('Error al llamar a la API');
    }

   header("Location: /Gestor/Vista/Administrador/dashboardadmin.php")
?>