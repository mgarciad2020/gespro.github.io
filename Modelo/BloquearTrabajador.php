<?php

class BloquearTrabajador{
    public $id_trabajador;
	public $estado;
    
	public function Trabajador($id_trabajador, $estado){
        $this ->id_trabajador = $id_trabajador;
        $this ->estado = $estado;
    }

    public function getId_trabajador(){
		return $this->id_trabajador;
	}

	public function setId_trabajador($id_trabajador){
		$this->id_trabajador = $id_trabajador;
	}

	public function getEstado(){
		return $this->$estado;
	}

	public function setEstado($estado){
		$this->$estado = $estado;
	}
}

?>