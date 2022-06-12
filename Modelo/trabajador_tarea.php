<?php
class trabajador_proyecto{
   
    private $id_trabajador_tarea;
    private $id_trabajador;
    private $id_tarea;
    private $fecha_inicio;
    private $fecha_fin;

    private function Trabajador_proyecto($id_trabajador_tarea, $id_trabajador, $id_tarea, $fecha_inicio, $fecha_fin){
        $this ->id_trabajador_proyecto = $id_trabajador_proyecto;
        $this ->id_trabajador = $id_trabajador;
        $this ->id_tarea = $id_tarea; 
        $this ->fecha_inicio = $fecha_inicio;
        $this ->fecha_fin = $fecha_fin;
    }

    public function getId_trabajador_proyecto(){
		return $this->id_trabajador_proyecto;
	}

	public function setId_trabajador_proyecto($id_trabajador_proyecto){
		$this->id_trabajador_proyecto = $id_trabajador_proyecto;
	}

	public function getId_trabajador(){
		return $this->id_trabajador;
	}

	public function setId_trabajador($id_trabajador){
		$this->id_trabajador = $id_trabajador;
	}

	public function getId_tarea(){
		return $this->id_tarea;
	}

	public function setId_tarea($id_tarea){
		$this->id_tarea = $id_tarea;
	}

	public function getFecha_inicio(){
		return $this->fecha_inicio;
	}

	public function setFecha_inicio($fecha_inicio){
		$this->fecha_inicio = $fecha_inicio;
	}

	public function getFecha_fin(){
		return $this->fecha_fin;
	}

	public function setFecha_fin($fecha_fin){
		$this->fecha_fin = $fecha_fin;
	}
}
?>