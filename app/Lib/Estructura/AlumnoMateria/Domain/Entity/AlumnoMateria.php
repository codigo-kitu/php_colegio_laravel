<?php

namespace App\Lib\Estructura\AlumnoMateria\Domain\Entity;

/*FKs*/
use App\Lib\Estructura\Alumno\Domain\Entity\Alumno;
use App\Lib\Estructura\Materia\Domain\Entity\Materia;
		

class AlumnoMateria {
		
	public int $id = -1;
	public string $created_at = '';
	public string $updated_at = '';
	
	public int $id_alumno = -1;
	public string $id_alumno_Descripcion = '';

	public int $id_materia = -1;
	public string $id_materia_Descripcion = '';

	
	//FKs
	
	public $alumno = null;
	public $materia = null;
	
	//RELACIONES
	
	
	function __construct () {
		
		$this->id = -1;
		$this->created_at = '';
		$this->updated_at = '';
	
 		$this->id_alumno=-1;
		$this->id_alumno_Descripcion='';

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
	
    
    
    
    
	public function  getIdAlumno() : ?int {
		return $this->id_alumno;
	}
	
	public function  getid_alumno_Descripcion() : string {
		return $this->id_alumno_Descripcion;
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
	
    		
    		
    		
    
	public function setIdAlumno(int $new_id_alumno) {
		$this->id_alumno = $new_id_alumno;
	}		
    
	public function setIdMateria(int $new_id_materia) {
		$this->id_materia = $new_id_materia;
	}		
}
