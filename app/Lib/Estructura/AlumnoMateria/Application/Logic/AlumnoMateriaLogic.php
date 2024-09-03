<?php

namespace App\Lib\Estructura\AlumnoMateria\Application\Logic;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Estructura\AlumnoMateria\Domain\Entity\AlumnoMateria;
/*use App\Lib\Estructura\AlumnoMateria\Domain\Model\AlumnoMateriaModel;*/

use App\Lib\Estructura\AlumnoMateria\Infrastructure\Data\AlumnoMateriaDataI;
use App\Lib\Estructura\AlumnoMateria\Infrastructure\Data\AlumnoMateriaData;

use App\Lib\Estructura\AlumnoMateria\Application\Logic\AlumnoMateriaLogicI;

class AlumnoMateriaLogic implements AlumnoMateriaLogicI {
	
	public AlumnoMateriaDataI $alumno_materiaDataI;
	
	public AlumnoMateria $alumno_materia1;
	public array $alumno_materias;
	
	/*FKs*/
	
	public array $alumnosFK;
	public array $materiasFK;
	
	function __construct() {      
		$this->alumno_materiaDataI = new AlumnoMateriaData();
		
		$this->alumno_materia1 = new AlumnoMateria();
		$this->alumno_materias = array();		
				
		/*FKs*/
		//$this->alumno_materiaFKReturnView = new AlumnoMateriaFKReturnView();
		
		
		$this->alumnosFK = array();
		$this->materiasFK = array();
    }
	
	public function getIndex(Pagination $pagination1): array {				
		$this->alumno_materias = $this->alumno_materiaDataI->getIndex($pagination1);
		return $this->alumno_materias;
	}
	
	public function getTodos(Pagination $pagination1): array {
		$this->alumno_materias = $this->alumno_materiaDataI->getTodos($pagination1);		
		return $this->alumno_materias;
	}
	
	public function getSeleccionar(int $id): AlumnoMateria {
		$this->alumno_materia1 = $this->alumno_materiaDataI->getSeleccionar($id);		
		return $this->alumno_materia1;
	}			
	
	public function nuevo($values): AlumnoMateria {
		$this->alumno_materia1 = $this->alumno_materiaDataI->nuevo($values);		
		return $this->alumno_materia1;
	}
	
	public function actualizar(int $id,$values): bool {
		return $this->alumno_materiaDataI->actualizar($id,$values);		
	}
	
	public function eliminar(int $id): bool {		
		return $this->alumno_materiaDataI->eliminar($id);		
	}
	
	public function nuevos($news_alumno_materias): void {		
		$this->alumno_materiaDataI->nuevos($news_alumno_materias);		
	}
	
	public function actualizars($updates_alumno_materias,$updates_columnas): void {		
		$this->alumno_materiaDataI->actualizars($updates_alumno_materias,$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_alumno_materias): void {		
		$this->alumno_materiaDataI->eliminars($ids_deletes_alumno_materias);		
	}	
	
	public function guardarCambios($news_alumno_materias,$ids_deletes_alumno_materias,$updates_alumno_materias,$updates_columnas): void {
		$this->alumno_materiaDataI->guardarCambios($news_alumno_materias,$ids_deletes_alumno_materias,$updates_alumno_materias,$updates_columnas);		
	}
	
	/*FKs*/
	
	public function getFks(): void {
		$this->alumno_materiaDataI->getFks();		
		
		$this->alumnosFK = $this->alumno_materiaDataI->alumnosFK;
		$this->materiasFK = $this->alumno_materiaDataI->materiasFK;
	}
	
	
}
