<?php

namespace App\Lib\Estructura\Materia\Domain\Entity;

class Materia {
		
	public int $id = -1;
	public string $created_at = '';
	public string $updated_at = '';
	
	public string $codigo = '';
	public string $nombre = '';
	public int $activo = 0;
	
	function __construct () {
		
		$this->id = -1;
		$this->created_at = '';
		$this->updated_at = '';
	
 		$this->codigo='';
 		$this->nombre='';
 		$this->activo=0;
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
	
    
    
    
    
	public function  getCodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getNombre() : ?string {
		return $this->nombre;
	}
    
	public function  getActivo() : ?int {
		return $this->activo;
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
	
    		
    		
    		
    
	public function setCodigo(string $new_codigo) {
		$this->codigo = $new_codigo;
	}		
    
	public function setNombre(string $new_nombre) {
		$this->nombre = $new_nombre;
	}		
    
	public function setActivo(int $new_activo) {
		$this->activo = $new_activo;
	}		
	
	//FKs
	
	
	//RELACIONES
	
	public $alumnos = array();
	public $alumno_materias = array();
	public $docentes = array();
	public $notas = array();
	public $docente_materias = array();
}
