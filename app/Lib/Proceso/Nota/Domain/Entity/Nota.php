<?php

namespace App\Lib\Proceso\Nota\Domain\Entity;

class Nota {
		
	public int $id = -1;
	public string $created_at = '';
	public string $updated_at = '';
	
	public int $id_alumno = -1;
	public string $id_alumno_Descripcion = '';

	public int $id_materia = -1;
	public string $id_materia_Descripcion = '';

	public int $id_docente = -1;
	public string $id_docente_Descripcion = '';

	public float $nota_prueba = 0.0;
	public float $nota_trabajo = 0.0;
	public float $nota_examen = 0.0;
	public float $nota_final = 0.0;
	
	function __construct () {
		
		$this->id = -1;
		$this->created_at = '';
		$this->updated_at = '';
	
 		$this->id_alumno=-1;
		$this->id_alumno_Descripcion='';

 		$this->id_materia=-1;
		$this->id_materia_Descripcion='';

 		$this->id_docente=-1;
		$this->id_docente_Descripcion='';

 		$this->nota_prueba=0.0;
 		$this->nota_trabajo=0.0;
 		$this->nota_examen=0.0;
 		$this->nota_final=0.0;
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
    
	public function  getIdDocente() : ?int {
		return $this->id_docente;
	}
	
	public function  getid_docente_Descripcion() : string {
		return $this->id_docente_Descripcion;
	}
    
	public function  getNotaPrueba() : ?float {
		return $this->nota_prueba;
	}
    
	public function  getNotaTrabajo() : ?float {
		return $this->nota_trabajo;
	}
    
	public function  getNotaExamen() : ?float {
		return $this->nota_examen;
	}
    
	public function  getNotaFinal() : ?float {
		return $this->nota_final;
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
    
	public function setIdDocente(int $new_id_docente) {
		$this->id_docente = $new_id_docente;
	}		
    
	public function setNotaPrueba(float $new_nota_prueba) {
		$this->nota_prueba = $new_nota_prueba;
	}		
    
	public function setNotaTrabajo(float $new_nota_trabajo) {
		$this->nota_trabajo = $new_nota_trabajo;
	}		
    
	public function setNotaExamen(float $new_nota_examen) {
		$this->nota_examen = $new_nota_examen;
	}		
    
	public function setNotaFinal(float $new_nota_final) {
		$this->nota_final = $new_nota_final;
	}		
	
	//FKs
	
	public $alumno = null;
	public $materia = null;
	public $docente = null;
	
	//RELACIONES
	
}
