<?php

class trabajador{
    private $id_trabajador;
    private $nombre;
    private $apellidos;
    private $dni;
    private $email;
    private $usuario;
    private $contrasena;
	private $estado;

	private function Trabajador($id_trabajador, $nombre, $apellidos, $dni, $email, $usuario, $contrasena, $estado){
        $this ->id_trabajador = $id_trabajador;
        $this ->nombre = $nombre;
        $this ->apellidos = $apellidos;
        $this ->dni = $dni;
        $this ->email = $email;
        $this ->usuario = $usuario;
        $this ->contrasena = $contrasena;
		$this ->estado = $estado;
    }

    public function getId_trabajador(){
		return $this->id_trabajador;
	}

	public function setId_trabajador($id_trabajador){
		$this->id_trabajador = $id_trabajador;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getApellidos(){
		return $this->apellidos;
	}

	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}

	public function getDni(){
		return $this->dni;
	}

	public function setDni($dni){
		$this->dni = $dni;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getContrasena(){
		return $this->contrasena;
	}

	public function setContrasena($contrasena){
		$this->contrasena = $contrasena;
	}

	public function getEstado(){
		return $this->$estado;
	}

	public function setEstado($estado){
		$this->$estado = $estado;
	}
}

?>