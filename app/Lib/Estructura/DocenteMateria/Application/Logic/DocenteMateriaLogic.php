<?php

namespace App\Lib\Estructura\DocenteMateria\Application\Logic;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Estructura\DocenteMateria\Domain\Entity\DocenteMateria;
/*use App\Lib\Estructura\DocenteMateria\Domain\Model\DocenteMateriaModel;*/

use App\Lib\Estructura\DocenteMateria\Infrastructure\Data\DocenteMateriaDataI;
use App\Lib\Estructura\DocenteMateria\Infrastructure\Data\DocenteMateriaData;

use App\Lib\Estructura\DocenteMateria\Application\Logic\DocenteMateriaLogicI;

class DocenteMateriaLogic implements DocenteMateriaLogicI {
	
	public DocenteMateriaDataI $docente_materiaDataI;
	
	public DocenteMateria $docente_materia1;
	public array $docente_materias;
	
	/*FKs*/
	
	public Collection $docentesFK;
	public Collection $materiasFK;
	
	function __construct() {      
		$this->docente_materiaDataI = new DocenteMateriaData();
		
		$this->docente_materia1 = new DocenteMateria();
		$this->docente_materias = array();		
				
		/*FKs*/
		//$this->docente_materiaFKReturnView = new DocenteMateriaFKReturnView();
		
		
		$this->docentesFK = new Collection();
		$this->materiasFK = new Collection();
    }
	
	public function getIndex(Pagination $pagination1): array {				
		$this->docente_materias = $this->docente_materiaDataI->getIndex($pagination1);
		return $this->docente_materias;
	}
	
	public function getTodos(Pagination $pagination1): array {
		$this->docente_materias = $this->docente_materiaDataI->getTodos($pagination1);		
		return $this->docente_materias;
	}
	
	public function getSeleccionar(int $id): DocenteMateria {
		$this->docente_materia1 = $this->docente_materiaDataI->getSeleccionar($id);		
		return $this->docente_materia1;
	}			
	
	public function nuevo($values): DocenteMateria {
		$this->docente_materia1 = $this->docente_materiaDataI->nuevo($values);		
		return $this->docente_materia1;
	}
	
	public function actualizar(int $id,$values): bool {
		return $this->docente_materiaDataI->actualizar($id,$values);		
	}
	
	public function eliminar(int $id): bool {		
		return $this->docente_materiaDataI->eliminar($id);		
	}
	
	public function nuevos($news_docente_materias): void {		
		$this->docente_materiaDataI->nuevos($news_docente_materias);		
	}
	
	public function actualizars($updates_docente_materias,$updates_columnas): void {		
		$this->docente_materiaDataI->actualizars($updates_docente_materias,$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_docente_materias): void {		
		$this->docente_materiaDataI->eliminars($ids_deletes_docente_materias);		
	}	
	
	public function guardarCambios($news_docente_materias,$ids_deletes_docente_materias,$updates_docente_materias,$updates_columnas): void {
		$this->docente_materiaDataI->guardarCambios($news_docente_materias,$ids_deletes_docente_materias,$updates_docente_materias,$updates_columnas);		
	}
	
	/*FKs*/
	
	public function getFks(): void {
		$this->docente_materiaDataI->getFks();		
		
		$this->docentesFK = $this->docente_materiaDataI->docentesFK;
		$this->materiasFK = $this->docente_materiaDataI->materiasFK;
	}
	
	
}
