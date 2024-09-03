<?php

namespace App\Lib\Proceso\Matricula\Domain\Entity;

class Matricula {
		
	public int $id = -1;
	public string $created_at = '';
	public string $updated_at = '';
	
	public int $anio = 0;
	public float $costo = 0.0;
	public string $fecha = '';
	public int $pagado = 0;
	
	function __construct () {
		
		$this->id = -1;
		$this->created_at = '';
		$this->updated_at = '';
	
 		$this->anio=0;
 		$this->costo=0.0;
 		$this->fecha=date('Y-m-d');
 		$this->pagado=0;
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
	
    
    
    
    
	public function  getAnio() : ?int {
		return $this->anio;
	}
    
	public function  getCosto() : ?float {
		return $this->costo;
	}
    
	public function  getFecha() : ?string {
		return $this->fecha;
	}
    
	public function  getPagado() : ?int {
		return $this->pagado;
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
	
    		
    		
    		
    
	public function setAnio(int $new_anio) {
		$this->anio = $new_anio;
	}		
    
	public function setCosto(float $new_costo) {
		$this->costo = $new_costo;
	}		
    
	public function setFecha(string $new_fecha) {
		$this->fecha = $new_fecha;
	}		
    
	public function setPagado(int $new_pagado) {
		$this->pagado = $new_pagado;
	}		
	
	//FKs
	
	public $alumno = null;
	
	//RELACIONES
	
}
