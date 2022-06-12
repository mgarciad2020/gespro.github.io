<?php

include_once 'gestor.php';

require_once '../Modelo/trabajador.php';
require_once '../Modelo/kanban.php';
require_once '../Modelo/proyecto.php';
require_once '../Modelo/tarea.php';


class ApiGestor{

    /**
     * It takes an id, queries the database, and returns a json object.
     * 
     * @param id 1
     */
    function getKanban($id){
        $gestor = new Gestor();
        $gestores = array();
        //var_dump($id);
        $result = $gestor->CargarListaKanban($id);
        if($result->rowCount() >= 1){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $item = new stdClass();
                $item = array(
                    'nombre' => $row['NOMBRE'],
                    'estado' => $row['ESTADO']
                );
                
                array_push($gestores, $item);
            }
            //$this->$gestores;
            echo json_encode($gestores);
        }else{
            //echo json_encode(array('mensaje'=>'No hay elementos registrados'));
            $this->error('No hay elementos registrados');
        }
    }

    /**
     * It returns a JSON array of objects
     */
    function getAllIdByTrabajador(){
        $gestor = new Gestor();
        $gestores = array();

        $result = $gestor->cargarlistaidtrabajador();

        if($result->rowCount() >= 1){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $item = new stdClass();
                $item = array(
                    'id_trabajador' => $row['id_trabajador'],
                    'nombre' => $row['nombre'],
                    'apellidos' => $row['apellidos'],
                    'dni' => $row['dni'],
                    'email' => $row['email'],
                    'usuario' => $row['usuario'],
                    'contrasena' => $row['contrasena'],
                    'estado' => $row['estado']
                );
                
                array_push($gestores, $item);
            }
            //$this->$gestores;
            echo json_encode($gestores);
        }else{
            //echo json_encode(array('mensaje'=>'No hay elementos registrados'));
            $this->error('No hay elementos registrados');
        }
    }

    /**
     * It returns a JSON array of objects, each object has 4 properties.
     */
    function getAllIdByProyecto(){
        $gestor = new Gestor();
        $gestores = array();

        $result = $gestor->cargarlistaidproyecto();

        if($result->rowCount() >= 1){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $item = new stdClass();

                 $item = array(
                    'id_proyecto' => $row['id_proyecto'],
                    'nombre' => $row['nombre'],
                    'estado' => $row['estado'],
                    'fecha_inicio' => $row['fecha_inicio'],
                    'fecha_fin' => $row['fecha_fin']
                );
                
                array_push($gestores, $item);
            }
            //$this->$gestores;
            echo json_encode($gestores);
        }else{
            //echo json_encode(array('mensaje'=>'No hay elementos registrados'));
            $this->error('No hay elementos registrados');
        }
    }

    /**
     * It returns a JSON array of objects.
     */
    function getAllTareas(){
        $gestor = new Gestor();
        $gestores = array();

        $result = $gestor->obtenerTareas();

        if($result->rowCount() >= 1){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $item = new stdClass();

                 $item = array(
                    'id_tarea' => $row['id_tarea'],
                    'id_proyecto' => $row['id_proyecto'],
                    'fecha_inicio' => $row['fecha_inicio'],
                    'fecha_fin' => $row['fecha_fin'],
                    'nombre' => $row['nombre'],
                    'estado' => $row['estado'],
                    'descripcion' => $row['descripcion'],
                    'usuario' => $row['usuario']
                );
                
                array_push($gestores, $item);
            }
            //$this->$gestores;
            echo json_encode($gestores);
        }else{
            //echo json_encode(array('mensaje'=>'No hay elementos registrados'));
            $this->error('No hay elementos registrados');
        }
    }

    /**
     * It gets all the projects from the database and returns them as a JSON object.
     */
    function getAllProyectos(){
        $gestor = new Gestor();
        $gestores = array();
        $gestores = array();

        $result = $gestor->obtenerProyectos();

        if($result->rowCount()){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id_proyecto' => $row['id_proyecto'],
                    'nombre' => $row['nombre'],
                    'estado' => $row['estado'],
                    'fecha_inicio' => $row['fecha_inicio'],
                    'fecha_fin' => $row['fecha_fin']
                );
                array_push($gestores, $item);
            }
            $this->printJSON($gestores);
        }else{
            //echo json_encode(array('mensaje'=>'No hay elementos registrados'));
            $this->error('No hay elementos registrados');
        }
    }

    /**
     * It gets a project by its id, and if it exists, it returns the project in JSON format.
     * 
     * @param id The id of the item to be deleted
     */
    function getByIdProyecto($id){
        $gestor = new Gestor();
        $gestores = array();
        $gestores["items"] = array();

        $result = $gestor->obternerProyectoByID($id);

        if($result->rowCount() == 1){
            $row = $result->fetch();
                $item = array(
                    'id_proyecto' => $row['id_proyecto'],
                    'nombre' => $row['nombre'],
                    'estado' => $row['estado'],
                    'fecha_inicio' => $row['fecha_inicio'],
                    'fecha_fin' => $row['fecha_fin']
                );
                array_push($gestores['items'], $item);
                $this->printJSON($gestores);
        }else{
            //echo json_encode(array('mensaje'=>'No hay elementos registrados'));
            $this->error('No hay elementos registrados');
        }
    }

    /**
     * It gets all the workers from the database and returns them in JSON format.
     */
    function getAllTrabajadores(){
        $gestor = new Gestor();
        $gestores = array();
        $gestores = array();

        $result = $gestor->obtenerTrabajadores();

        if($result->rowCount()){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id_trabajador' => $row['id_trabajador'],
                    'nombre' => $row['nombre'],
                    'apellidos' => $row['apellidos'],
                    'dni' => $row['dni'],
                    'email' => $row['email'],
                    'usuario' => $row['usuario'],
                    'contrasena' => $row['contrasena'],
                    'estado' => $row['estado']
                );
                array_push($gestores, $item);
            }
            $this->printJSON($gestores);
        }else{
            //echo json_encode(array('mensaje'=>'No hay elementos registrados'));
            $this->error('No hay elementos registrados');
        }
    }

  
    /**
     * It gets the data from the database and prints it in JSON format.
     * 
     * @param id The id of the item to be deleted
     */
    function getByIdTrabajador($id){
        $gestor = new Gestor();
        $gestores = array();
        $gestores["items"] = array();

        $result = $gestor->obterneTrabajadorByID($id);

        if($result->rowCount() == 1){
            $row = $result->fetch();
                $item = array(
                    'id_trabajador' => $row['id_trabajador'],
                    'nombre' => $row['nombre'],
                    'apellidos' => $row['apellidos'],
                    'dni' => $row['dni'],
                    'email' => $row['email'],
                    'usuario' => $row['usuario'],
                    'contrasena' => $row['contrasena'],
                    'estado' => $row['estado']
                );
                array_push($gestores['items'], $item);
                $this->printJSON($gestores);
        }else{
            //echo json_encode(array('mensaje'=>'No hay elementos registrados'));
            $this->error('No hay elementos registrados');
        }
    }


    /**
     * It gets a task by its project id.
     * 
     * @param id The id of the project
     */
    function getTareaByIdProyecto($id){
        $gestor = new Gestor();
        $gestores = array();
        $gestores["items"] = array();

        $result = $gestor->obterneTareaByIdProyecto($id);

        if($result->rowCount() == 1){
            $row = $result->fetch();
                $item = array(
                    'id_tarea' => $row['id_tarea'],
                    'id_proyecto' => $row['id_proyecto'],
                    'fecha_inicio' => $row['fecha_inicio'],
                    'fecha_fin' => $row['fecha_fin'],
                    'nombre' => $row['nombre'],
                    'descripcion' => $row['descripcion'],
                    'estado' => $row['estado'],
                    'usuario' => $row['usuario']
                );
                array_push($gestores['items'], $item);
                $this->printJSON($gestores);
        }else{
            //echo json_encode(array('mensaje'=>'No hay elementos registrados'));
            $this->error('No hay elementos registrados');
        }
    }

   /**
    * It adds a new worker to the database.
    * 
    * @param item is an array with the data to be inserted into the database.
    */
    function addTrabajador($item){
        $trabajador = new Gestor();
        $result = $trabajador->nuevoTrabajador($item);
        $this->exito('Nuevo trabajador registrado');
    }
    
 /**
  * It takes an item, creates a new Gestor, and then calls the nuevoProyecto function on the Gestor
  * object
  * 
  * @param item is an array with the following structure:
  */
    function addProyecto($item){
        $trabajador = new Gestor();
        $result = $trabajador->nuevoProyecto($item);
        $this->exito('Nuevo proyecto registrado');
    }

   /**
    * I'm going to create a new object of the class Gestor, then I'm going to call the method
    * nuevoTrabajadorProyecto() on that object, and then I'm going to call the method exito() on the
    * current object.
    * 
    * @param item {
    */
    function addTrabajadorProyecto($item){
        $trabajador = new Gestor();
        $result = $trabajador->nuevoTrabajadorProyecto($item);
        $this->exito('Asignación registrada');
    }

   /**
    * I'm going to create a new object of the class Gestor, then I'm going to call the method
    * nuevoTrabajadorTarea() on that object, and then I'm going to call the method exito() on the
    * current object.
    * 
    * @param item {
    */
    function addTrabajadorTarea($item){
        $trabajador = new Gestor();
        $result = $trabajador->nuevoTrabajadorTarea($item);
        $this->exito('Asignación registrada');
    }

    /**
     * I'm going to create a new object, then I'm going to call a method on that object, then I'm going
     * to call another method on the same object, then I'm going to call a method on a different
     * object.
     * 
     * @param item {
     */
    function addTarea($item){
        $trabajador = new Gestor();
        $result = $trabajador->nuevaTarea($item);
        $this->exito('Nuevo proyecto registrado');
    }

    /**
     * The function modifyTrabajador() takes an item and updates it in the database.
     * 
     * @param item 
     */
    function modifyTrabajador($item){
        $trabajador = new Gestor();
        $result = $trabajador->actualizarTrabajador($item);
        $this->exito('Trabajador Actualizado');
    }

    /**
     * The function modifyProyecto() takes an item, creates a new Gestor object, calls the
     * actualizarProyecto() method on that object, and then calls the exito() method on the current
     * object.
     * 
     * @param item 
     */
    function modifyProyecto($item){
        $trabajador = new Gestor();
        $result = $trabajador->actualizarProyecto($item);
        $this->exito('Proyecto Actualizado');
    }

    /**
     * It takes an item, creates a new Gestor, and then calls the actualizarTarea function on the
     * Gestor object, passing in the item. Then it calls the exito function, passing in the string
     * 'Tarea Actualizada'.
     * 
     * @param item {
     */
    function modifyTarea($item){
        $trabajador = new Gestor();
        $result = $trabajador->actualizarTarea($item);
        $this->exito('Tarea Actualizada');
    }

   /**
    * It takes an item, creates a new Gestor object, calls the BloquearTrabajador method on that
    * object, and then calls the exito method on the current object.
    * 
    * @param item is the id of the user
    */
    function lockedTrabajador($item){
        $trabajador = new Gestor();
        $result = $trabajador->BloquearTrabajador($item);
        $this->exito('Usuario Bloquado');
    }
    
    /**
     * "I'm going to delete a worker, but first I'm going to create a new worker, then I'm going to
     * delete the worker I just created."</code>
     * 
     * 
     * 
     * I'm not sure what the author was trying to accomplish here, but I'm pretty sure it's not what
     * they intended.
     * 
     * @param item The ID of the item to delete
     */
    function deleteTrabajador($item){
        $trabajador = new Gestor();
        $result = $trabajador->EliminarTrabajadorByID($item);
        $this->exito('Usuario Eliminado');
    }

    /**
     * I'm going to delete a project, but first I'm going to tell you that I'm going to delete it.
     * 
     * @param item The ID of the project to be deleted
     */
    function deleteProyecto($item){
        $trabajador = new Gestor();
        $result = $trabajador->EliminarProyectoByID($item);
        $this->exito('Proyecto Eliminado');
    }

   /**
    * It takes a string and returns a JSON object with a single property, "mensaje", whose value is the
    * string.
    * 
    * @param mensaje The message to be displayed.
    */
    function error($mensaje){
        echo "<code>" . json_encode(array('mensaje' => $mensaje)) . '</code>';
    }

    /**
     * It takes a string and returns a JSON object with a single key-value pair.
     * 
     * @param mensaje The message to be displayed.
     */
    function exito($mensaje){
        echo "<code>" . json_encode(array('mensaje' => $mensaje)) . '</code>';
    }

    /**
     * It takes an array and converts it to a JSON object.
     * 
     * @param array The array you want to print out as JSON.
     */
    function printJSON($array){
        echo json_encode(array($array));
    }
}

?>