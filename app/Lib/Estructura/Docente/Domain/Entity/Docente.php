<?php

namespace App\Lib\Estructura\Docente\Domain\Entity;

class Docente {
		
	public int $id = -1;
	public string $created_at = '';
	public string $updated_at = '';
	
	public string $nombre = '';
	public string $apellido = '';
	public string $fecha_nacimiento = '';
	public int $anios_experiencia = 0;
	public float $nota_evaluacion = 0.0;
	
	function __construct () {
		
		$this->id = -1;
		$this->created_at = '';
		$this->updated_at = '';
	
 		$this->nombre='';
 		$this->apellido='';
 		$this->fecha_nacimiento=date('Y-m-d');
 		$this->anios_experiencia=0;
 		$this->nota_evaluacion=0.0;
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
    
	public function  getAniosExperiencia() : ?int {
		return $this->anios_experiencia;
	}
    
	public function  getNotaEvaluacion() : ?float {
		return $this->nota_evaluacion;
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
    
	public function setAniosExperiencia(int $new_anios_experiencia) {
		$this->anios_experiencia = $new_anios_experiencia;
	}		
    
	public function setNotaEvaluacion(float $new_nota_evaluacion) {
		$this->nota_evaluacion = $new_nota_evaluacion;
	}		
	
	//FKs
	
	
	//RELACIONES
	
	public $sueldos = array();
	public $contrato = null;
	public $materias = array();
	public $notas = array();
	public $docente_materias = array();
}
