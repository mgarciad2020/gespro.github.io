<?php

class proyecto{

    private $id_proyecto;
    private $nombre;
    private $estado;
    private $fecha_inicio;
    private $fecha_fin;
    
    private function Proyecto($id_proyecto, $nombre, $estado, $fecha_inicio, $fecha_fin){
        $this ->id_trabajador = $id_trabajador;
        $this ->nombre = $nombre;
        $this ->estado = $estado;
        $this ->fecha_inicio = $usuario;
        $this ->fecha_fin = $fecha_fin;
    }

    public function getId_proyecto(){
		return $this->id_proyecto;
	}

	public function setId_proyecto($id_proyecto){
		$this->id_proyecto = $id_proyecto;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
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