<?php
class trabajador_proyecto{
   
    private $id_trabajador_proyecto;
    private $id_trabajador;
    private $id_proyecto;
    private $fecha_inicio;
    private $fecha_fin;

    private function Trabajador_proyecto($id_trabajador_proyecto, $id_trabajador, $id_proyecto, $fecha_inicio, $fecha_fin){
        $this ->id_trabajador_proyecto = $id_trabajador_proyecto;
        $this ->id_trabajador = $id_trabajador;
        $this ->id_proyecto = $id_proyecto;
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

	public function getId_proyecto(){
		return $this->id_proyecto;
	}

	public function setId_proyecto($id_proyecto){
		$this->id_proyecto = $id_proyecto;
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