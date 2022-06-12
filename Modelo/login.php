<?php

class Login{
    public $usuario;
	public $contrasena;
    
	public function Trabajador($usuario, $contrasena){
        $this ->usuario = $usuario;
        $this ->contrasena = $contrasena;
    }

    public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getContrasena(){
		return $this->$contrasena;
	}

	public function setContrasena($contrasena){
		$this->$contrasena = $contrasena;
	}
}
?>