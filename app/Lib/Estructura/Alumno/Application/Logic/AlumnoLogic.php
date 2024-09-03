<?php

namespace App\Lib\Estructura\Alumno\Application\Logic;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Estructura\Alumno\Domain\Entity\Alumno;
/*use App\Lib\Estructura\Alumno\Domain\Model\AlumnoModel;*/

use App\Lib\Estructura\Alumno\Infrastructure\Data\AlumnoDataI;
use App\Lib\Estructura\Alumno\Infrastructure\Data\AlumnoData;

use App\Lib\Estructura\Alumno\Application\Logic\AlumnoLogicI;

class AlumnoLogic implements AlumnoLogicI {
	
	public AlumnoDataI $alumnoDataI;
	
	public Alumno $alumno1;
	public array $alumnos;
	
	
	function __construct() {      
		$this->alumnoDataI = new AlumnoData();
		
		$this->alumno1 = new Alumno();
		$this->alumnos = array();		
				
    }
	
	public function getIndex(Pagination $pagination1): array {				
		$this->alumnos = $this->alumnoDataI->getIndex($pagination1);
		return $this->alumnos;
	}
	
	public function getTodos(Pagination $pagination1): array {
		$this->alumnos = $this->alumnoDataI->getTodos($pagination1);		
		return $this->alumnos;
	}
	
	public function getSeleccionar(int $id): Alumno {
		$this->alumno1 = $this->alumnoDataI->getSeleccionar($id);		
		return $this->alumno1;
	}			
	
	public function nuevo($values): Alumno {
		$this->alumno1 = $this->alumnoDataI->nuevo($values);		
		return $this->alumno1;
	}
	
	public function actualizar(int $id,$values): bool {
		return $this->alumnoDataI->actualizar($id,$values);		
	}
	
	public function eliminar(int $id): bool {		
		return $this->alumnoDataI->eliminar($id);		
	}
	
	public function nuevos($news_alumnos): void {		
		$this->alumnoDataI->nuevos($news_alumnos);		
	}
	
	public function actualizars($updates_alumnos,$updates_columnas): void {		
		$this->alumnoDataI->actualizars($updates_alumnos,$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_alumnos): void {		
		$this->alumnoDataI->eliminars($ids_deletes_alumnos);		
	}	
	
	public function guardarCambios($news_alumnos,$ids_deletes_alumnos,$updates_alumnos,$updates_columnas): void {
		$this->alumnoDataI->guardarCambios($news_alumnos,$ids_deletes_alumnos,$updates_alumnos,$updates_columnas);		
	}
	
	
	/*----- RELACIONES -----*/
	
	public function getTodosRelaciones(Pagination $pagination1): array {		
		$this->alumnos = $this->alumnoDataI->getTodosRelaciones($pagination1);		
		return $this->alumnos;
	}
	
	public function getSeleccionarRelaciones(int $id): Alumno {
		$this->alumno1 = $this->alumnoDataI->getSeleccionarRelaciones($id);		
		return $this->alumno1;
	}
	
}
