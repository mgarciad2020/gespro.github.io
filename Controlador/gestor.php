<?php

include_once 'conexion.php';

/* It's a class that connects to a database and executes queries. */
class Gestor extends Conexion{
    

    /**
     * It selects the name and state of a task from the task table, and the id of the task and the id
     * of the worker from the worker_task table, and the id of the worker from the worker table, where
     * the id of the worker is equal to the id of the worker and the state of the task is equal to the
     * state of the task.
     * 
     * @param kanban {
     * 
     * @return The query is being returned.
     */
    function CargarListaKanban($kanban){
        $query = $this->connect()->prepare('SELECT T.NOMBRE, T.ESTADO FROM TAREA T INNER JOIN TRABAJADOR_TAREA TT ON TT.ID_TAREA = T.ID_TAREA INNER JOIN TRABAJADOR TR ON TR.ID_TRABAJADOR = TT.ID_TRABAJADOR WHERE TR.ID_TRABAJADOR = :id AND T.ESTADO = :estado ');
        $query->execute(['id' => $kanban['id'], 'estado' => $kanban['estado']]);
        return $query;
    }
    /**
     * It returns a query object.
     * 
     * @return The query object.
     */
    function obtenerTareas(){
        $query = $this->connect()->query('SELECT * FROM TAREA');
        return $query;
    }

   /**
    * It returns a query object.
    * 
    * @return The query result.
    */
    function obtenerProyectos(){
        $query = $this->connect()->query('SELECT * FROM PROYECTO');
        return $query;
    }

    /**
     * It takes an id and returns a query.
     * 
     * @param id The id of the project you want to get
     * 
     * @return The query is being returned.
     */
    function obternerProyectoByID($id){
        $query = $this->connect()->prepare('SELECT * FROM PROYECTO WHERE id_proyecto = :id');
        $query->execute(['id' => $id]);
        return $query;
    }

   /**
    * It returns a query object.
    * 
    * @return The query result.
    */
    function obtenerTrabajadores(){
        $query = $this->connect()->query('SELECT * FROM TRABAJADOR');
        return $query;
    }

   /**
    * It returns a query object that contains the result of a query that selects all the columns from
    * the table TRABAJADOR where the id_trabajador column is equal to the id parameter.
    * 
    * @param id The id of the worker you want to get
    * 
    * @return The query is being returned.
    */
    function obterneTrabajadorByID($id){
        $query = $this->connect()->prepare('SELECT * FROM TRABAJADOR WHERE id_trabajador = :id');
        $query->execute(['id' => $id]);
        return $query;
    }

    /**
     * It takes an id and returns a query object.
     * 
     * @param id The id of the task you want to get
     * 
     * @return The query is being returned.
     */
    function obterneTareaByIdProyecto($id){
        $query = $this->connect()->prepare('SELECT * FROM TAREA WHERE id_tarea = :id');
        $query->execute(['id' => $id]);
        return $query;
    }
    
    /**
     * It takes an array of data and inserts it into a database table.
     * 
     * @param trabajador array(8) { ["nombre"]=&gt; string(4) "test" ["apellidos"]=&gt; string(4)
     * "test" ["dni"]=&gt; string(9) "123456789" ["email"]=
     * 
     * @return The query object.
     */
    function nuevoTrabajador($trabajador){
        $query = $this->connect()->prepare('INSERT INTO TRABAJADOR (NOMBRE, APELLIDOS, DNI, EMAIL, USUARIO, CONTRASENA, ESTADO) VALUES (:nombre, :apellidos, :dni, :email, :usuario, :contrasena, :estado)');
        $query->execute(['nombre' => $trabajador['nombre'], 'apellidos' => $trabajador['apellidos'],  'dni' => $trabajador['dni'], 'email' => $trabajador['email'], 'usuario' => $trabajador['usuario'], 'contrasena' => $trabajador['contrasena'], 'estado' => $trabajador['estado']]);
        return $query;
    }

    
    /**
     * It takes an array of data and inserts it into a database table.
     * 
     * @param proyecto array
     * 
     * @return The query object.
     */
    function nuevoProyecto($proyecto){
        $query = $this->connect()->prepare('INSERT INTO PROYECTO (NOMBRE, ESTADO, FECHA_INICIO, FECHA_FIN) VALUES (:nombre, :estado, :fechainicio, :fechafin)');
        $query->execute(['nombre' => $proyecto['nombre'], 'estado' => $proyecto['estado'],  'fechainicio' => $proyecto['fecha_inicio'], 'fechafin' => $proyecto['fecha_fin']]);
        return $query;
    }

    /**
     * It inserts a new row into the table TRABAJADOR_PROYECTO.
     * 
     * @param trabajadorproyecto 
     * 
     * @return The query object.
     */
    function nuevoTrabajadorProyecto($trabajadorproyecto){
        $query = $this->connect()->prepare('INSERT INTO TRABAJADOR_PROYECTO (ID_TRABAJADOR, ID_PROYECTO, FECHA_INICIO, FECHA_FIN) VALUES (:idtrabajador, :idproyecto, :fechainicio, :fechafin)');
        $query->execute(['idtrabajador' => $trabajadorproyecto['id_trabajador'], 'idproyecto' => $trabajadorproyecto['id_proyecto'],  'fechainicio' => $trabajadorproyecto['fecha_inicio'], 'fechafin' => $trabajadorproyecto['fecha_fin']]);
        return $query;
    }

    /**
     * It takes an array of data and inserts it into a table.
     * 
     * @param trabajadortarea array(4) { ["id_trabajador"]=&gt; string(1) "1" ["id_tarea"]=&gt;
     * string(1) "1" ["fecha_inicio"]=&gt; string(10) "2019-
     * 
     * @return The query object.
     */
    function nuevoTrabajadorTarea($trabajadortarea){
        $query = $this->connect()->prepare('INSERT INTO TRABAJADOR_TAREA (ID_TRABAJADOR, ID_TAREA, FECHA_INICIO, FECHA_FIN) VALUES (:idtrabajador, :idtarea, :fechainicio, :fechafin)');
        $query->execute(['idtrabajador' => $trabajadortarea['id_trabajador'], 'idtarea' => $trabajadortarea['id_tarea'],  'fechainicio' => $trabajadortarea['fecha_inicio'], 'fechafin' => $trabajadortarea['fecha_fin']]);
        return $query;
    }
    
    /**
     * It inserts a new row into the database.
     * 
     * @param tarea array
     * 
     * @return The query object.
     */
    function nuevaTarea($tarea){
        $query = $this->connect()->prepare('INSERT INTO TAREA (ID_PROYECTO, FECHA_INICIO, FECHA_FIN, NOMBRE, DESCRIPCION, ESTADO, USUARIO) VALUES (:idproyecto, :fechainicio, :fechafin, :nombre, :descripcion, :estado, :usuario)');
        $query->execute(['idproyecto' => $tarea['id_proyecto'],  'fechainicio' => $tarea['fecha_inicio'],  'fechafin' => $tarea['fecha_fin'], 'nombre' => $tarea['nombre'], 'descripcion' => $tarea['descripcion'], 'estado' => $tarea['estado'], 'usuario' => $tarea['usuario']]);
        return $query;
    }

  /**
   * It updates the table TRABAJADOR with the values of the array , where the ID_TRABAJADOR
   * is the same as the one in the array
   * 
   * @param trabajador array(8) { ["id_trabajador"]=&gt; string(1) "1" ["nombre"]=&gt; string(4) "test"
   * ["apellidos"]=&gt; string(4) "test" ["dni
   * 
   * @return The query is being returned.
   */
   function actualizarTrabajador($trabajador){
        $query = $this->connect()->prepare('UPDATE TRABAJADOR SET NOMBRE = :nombre , APELLIDOS = :apellidos , DNI = :dni , EMAIL = :email , USUARIO = :usuario , CONTRASENA = :contrasena , ESTADO = :estado WHERE ID_TRABAJADOR = :id_trabajador');
        $query->execute(['nombre' => $trabajador['nombre'], 'apellidos' => $trabajador['apellidos'],  'dni' => $trabajador['dni'], 'email' => $trabajador['email'], 'usuario' => $trabajador['usuario'], 'contrasena' => $trabajador['contrasena'], 'estado' => $trabajador['estado'], 'id_trabajador' =>$trabajador['id_trabajador']]);
        return $query;
   }

   /**
    * It updates the table PROYECTO with the values of the array .
    * 
    * @param proyecto array(5) { ["id_proyecto"]=&gt; string(1) "1" ["nombre"]=&gt; string(7)
    * "Proyecto" ["estado"]=&gt; string(7) "Activo" ["
    * 
    * @return The query object.
    */
   function actualizarProyecto($proyecto){
        $query = $this->connect()->prepare('UPDATE PROYECTO SET NOMBRE = :nombre , ESTADO = :estado , FECHA_INICIO = :fechainicio , FECHA_FIN = :fechafin WHERE ID_PROYECTO = :id_proyecto');
        $query->execute(['nombre' => $proyecto['nombre'], 'estado' => $proyecto['estado'],  'fechainicio' => $proyecto['fecha_inicio'], 'fechafin' => $proyecto['fecha_fin'], 'id_proyecto' => $proyecto['id_proyecto']]);
        return $query;
    }

    /**
     * It updates a row in the database with the values of the array .
     * 
     * @param tarea array
     * 
     * @return The query object.
     */
    function actualizarTarea($tarea){
        $query = $this->connect()->prepare('UPDATE TAREA SET NOMBRE = :nombre , ESTADO = :estado , DESCRIPCION = :descripcion , FECHA_INICIO = :fechainicio , FECHA_FIN = :fechafin , USUARIO = :usuario WHERE ID_TAREA = :idtarea');
        $query->execute(['nombre' => $tarea['nombre'], 'estado' => $tarea['estado'], 'descripcion' => $tarea['descripcion'],  'fechainicio' => $tarea['fecha_inicio'], 'fechafin' => $tarea['fecha_fin'], 'usuario' => $tarea['usuario'], 'idtarea' =>  $tarea['id_tarea']]);
        return $query;
    }

    /**
     * It updates the table TRABAJADOR with the values of the array .
     * 
     * @param BloquearTrabajador array (size=2)
     * 
     * @return The query is being returned.
     */
    function BloquearTrabajador($BloquearTrabajador){
        $query = $this->connect()->prepare('UPDATE TRABAJADOR SET ESTADO = :estado WHERE ID_TRABAJADOR = :idtrabajador');
        $query->execute(['idtrabajador' => $BloquearTrabajador['id_trabajador'], 'estado' => $BloquearTrabajador['estado']]);
        return $query;        
    }  

   /**
    * It takes a login array, connects to the database, prepares a query, executes the query, and
    * returns the query.
    * 
    * @param login array
    * 
    * @return The query is being returned.
    */
    function Login($login){
        $query = $this->connect()->prepare('SELECT * FROM TRABAJADOR WHERE email = :usuario AND contrasena = :contrasena');
        $query->execute(['usuario' => $login['usuario'], 'contrasena' => $login['contrasena']]);
        return $query;
    }

    /**
     * It deletes a row from the table TRABAJADOR where the id_trabajador column is equal to the id
     * parameter.
     * 
     * @param id The id of the row you want to delete.
     * 
     * @return The query is being returned.
     */
    function EliminarTrabajadorByID($id){
        $query = $this->connect()->prepare('DELETE FROM TRABAJADOR WHERE id_trabajador = :id');
        $query->execute(['id' => $id]);
        return $query;
    }

    /**
     * It deletes a row from the database table Proyecto where the id_proyecto column is equal to the
     * id parameter.
     * 
     * @param id The id of the project to be deleted
     * 
     * @return The query.
     */
    function EliminarProyectoByID($id){
        $query = $this->connect()->prepare('DELETE FROM Proyecto WHERE id_proyecto = :id');
        $query->execute(['id' => $id]);
        return $query;
    }

    /**
     * It returns a query object.
     * 
     * @return The query result.
     */
    function cargarlistaidtrabajador(){
        $query = $this->connect()->query('SELECT * FROM TRABAJADOR');
        return $query;
    }

    /**
     * It queries the database for all records in the PROYECTO table and returns the result.
     * 
     * @return The query result.
     */
    function cargarlistaidproyecto(){
        $query = $this->connect()->query('SELECT * FROM PROYECTO');
        return $query;
    }

}

?>