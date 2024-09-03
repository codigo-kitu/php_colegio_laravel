<?php

namespace App\Lib\Estructura\Alumno\Domain\Entity;

class Alumno {
		
	public int $id = -1;
	public string $created_at = '';
	public string $updated_at = '';
	
	public string $nombre = '';
	public string $apellido = '';
	public string $fecha_nacimiento = '';
	
	function __construct () {
		
		$this->id = -1;
		$this->created_at = '';
		$this->updated_at = '';
	
 		$this->nombre='';
 		$this->apellido='';
 		$this->fecha_nacimiento=date('Y-m-d');
    }
	
	/*-------------------- GETTERs -------------------*/
	
	public function getId(): ?int {
		return $this->id;
	}
	
	public function getCreated_at(): ?string {
		return $this->created_at;
	}
	
	public function getUpdated_at(): ?string {
		return $this->updated_at;
	}
	
    
    
    
    
	public function  getNombre() : ?string {
		return $this->nombre;
	}
    
	public function  getApellido() : ?string {
		return $this->apellido;
	}
    
	public function  getFechaNacimiento() : ?string {
		return $this->fecha_nacimiento;
	}
	
	/*-------------------- SETTERs -------------------*/
	
	public function setId(int $id): void {
		$this->id = $id;
	}
	
	public function setCreated_at(string $created_at): void {
		$this->created_at = $created_at;
	}
	
	public function setUpdated_at(string $updated_at): void {
		$this->updated_at = $updated_at;
	}
	
    		
    		
    		
    
	public function setNombre(string $new_nombre) {
		$this->nombre = $new_nombre;
	}		
    
	public function setApellido(string $new_apellido) {
		$this->apellido = $new_apellido;
	}		
    
	public function setFechaNacimiento(string $new_fecha_nacimiento) {
		$this->fecha_nacimiento = $new_fecha_nacimiento;
	}		
	
	//FKs
	
	
	//RELACIONES
	
	public $matricula = null;
	public $alumno_materias = array();
	public $materias = array();
	public $pensions = array();
	public $notas = array();
}
