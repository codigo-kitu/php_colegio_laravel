<?php

namespace App\Lib\Estructura\DocenteMateria\Domain\Entity;

class DocenteMateria {
		
	public int $id = -1;
	public string $created_at = '';
	public string $updated_at = '';
	
	public int $id_docente = -1;
	public string $id_docente_Descripcion = '';

	public int $id_materia = -1;
	public string $id_materia_Descripcion = '';

	
	function __construct () {
		
		$this->id = -1;
		$this->created_at = '';
		$this->updated_at = '';
	
 		$this->id_docente=-1;
		$this->id_docente_Descripcion='';

 		$this->id_materia=-1;
		$this->id_materia_Descripcion='';

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
	
    
    
    
    
	public function  getIdDocente() : ?int {
		return $this->id_docente;
	}
	
	public function  getid_docente_Descripcion() : string {
		return $this->id_docente_Descripcion;
	}
    
	public function  getIdMateria() : ?int {
		return $this->id_materia;
	}
	
	public function  getid_materia_Descripcion() : string {
		return $this->id_materia_Descripcion;
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
	
    		
    		
    		
    
	public function setIdDocente(int $new_id_docente) {
		$this->id_docente = $new_id_docente;
	}		
    
	public function setIdMateria(int $new_id_materia) {
		$this->id_materia = $new_id_materia;
	}		
	
	//FKs
	
	public $docente = null;
	public $materia = null;
	
	//RELACIONES
	
}
