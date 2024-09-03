<?php

namespace App\Lib\Financiero\Pension\Domain\Entity;

class Pension {
		
	public int $id = -1;
	public string $created_at = '';
	public string $updated_at = '';
	
	public int $id_alumno = -1;
	public string $id_alumno_Descripcion = '';

	public int $anio = 0;
	public int $mes = 0;
	public float $valor = 0.0;
	public int $cobrado = 0;
	
	function __construct () {
		
		$this->id = -1;
		$this->created_at = '';
		$this->updated_at = '';
	
 		$this->id_alumno=-1;
		$this->id_alumno_Descripcion='';

 		$this->anio=0;
 		$this->mes=0;
 		$this->valor=0.0;
 		$this->cobrado=0;
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
	
    
    
    
    
	public function  getIdAlumno() : ?int {
		return $this->id_alumno;
	}
	
	public function  getid_alumno_Descripcion() : string {
		return $this->id_alumno_Descripcion;
	}
    
	public function  getAnio() : ?int {
		return $this->anio;
	}
    
	public function  getMes() : ?int {
		return $this->mes;
	}
    
	public function  getValor() : ?float {
		return $this->valor;
	}
    
	public function  getCobrado() : ?int {
		return $this->cobrado;
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
	
    		
    		
    		
    
	public function setIdAlumno(int $new_id_alumno) {
		$this->id_alumno = $new_id_alumno;
	}		
    
	public function setAnio(int $new_anio) {
		$this->anio = $new_anio;
	}		
    
	public function setMes(int $new_mes) {
		$this->mes = $new_mes;
	}		
    
	public function setValor(float $new_valor) {
		$this->valor = $new_valor;
	}		
    
	public function setCobrado(int $new_cobrado) {
		$this->cobrado = $new_cobrado;
	}		
	
	//FKs
	
	public $alumno = null;
	
	//RELACIONES
	
}
