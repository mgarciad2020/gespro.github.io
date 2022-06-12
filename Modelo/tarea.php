<?php

class tarea{
	private $id_tarea;
    private $id_proyecto;
    private $fecha_inicio;
	private $fecha_fin;
    private $nombre;
    private $descripcion;
    private $estado;
	private $usuario;

    private function Tarea($id_tarea, $id_proyecto, $fecha_inicio, $fecha_fin, $nombre, $descripcion, $estado, $usuario){
        $this ->id_tarea = $id_tarea;
		$this ->id_proyecto = $id_proyecto;
        $this ->fecha_inicio = $fecha_inicio;
		$this ->fecha_fin = $fecha_fin;
        $this ->nombre = $nombre;
        $this ->descripcion = $descripcion;
        $this ->estado = $estado;
		$this ->usuario = $usuario;
    }

	public function getId_tarea(){
		return $this->id_tarea;
	}

	public function setId_tarea($id_tarea){
		$this->id_tarea = $id_tarea;
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

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->estado = $usuario;
	}
}

?>