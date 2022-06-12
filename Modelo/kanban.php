<?php
class Kanban{
    public $id;
	public $estado;
    
	public function Trabajador($id, $estado){
        $this ->id = $id;
        $this ->estado = $estado;
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getEstado(){
		return $this->$estado;
	}

	public function setEstado($estado){
		$this->$estado = $estado;
	}
}
?>