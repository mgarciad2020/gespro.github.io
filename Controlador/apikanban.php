<?php

include_once 'gestor.php';

require_once '../../Modelo/kanban.php';
require_once '../../Modelo/proyecto.php';
require_once '../../Modelo/tarea.php';
require_once '../../Modelo/trabajador.php';



class ApiKanban{

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