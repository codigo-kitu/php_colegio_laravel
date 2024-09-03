<?php

namespace App\Lib\Estructura\Materia\Application\Logic;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Estructura\Materia\Domain\Entity\Materia;
/*use App\Lib\Estructura\Materia\Domain\Model\MateriaModel;*/

use App\Lib\Estructura\Materia\Infrastructure\Data\MateriaDataI;
use App\Lib\Estructura\Materia\Infrastructure\Data\MateriaData;

use App\Lib\Estructura\Materia\Application\Logic\MateriaLogicI;

class MateriaLogic implements MateriaLogicI {
	
	public MateriaDataI $materiaDataI;
	
	public Materia $materia1;
	public array $materias;
	
	
	function __construct() {      
		$this->materiaDataI = new MateriaData();
		
		$this->materia1 = new Materia();
		$this->materias = array();		
				
    }
	
	public function getIndex(Pagination $pagination1): array {				
		$this->materias = $this->materiaDataI->getIndex($pagination1);
		return $this->materias;
	}
	
	public function getTodos(Pagination $pagination1): array {
		$this->materias = $this->materiaDataI->getTodos($pagination1);		
		return $this->materias;
	}
	
	public function getSeleccionar(int $id): Materia {
		$this->materia1 = $this->materiaDataI->getSeleccionar($id);		
		return $this->materia1;
	}			
	
	public function nuevo($values): Materia {
		$this->materia1 = $this->materiaDataI->nuevo($values);		
		return $this->materia1;
	}
	
	public function actualizar(int $id,$values): bool {
		return $this->materiaDataI->actualizar($id,$values);		
	}
	
	public function eliminar(int $id): bool {		
		return $this->materiaDataI->eliminar($id);		
	}
	
	public function nuevos($news_materias): void {		
		$this->materiaDataI->nuevos($news_materias);		
	}
	
	public function actualizars($updates_materias,$updates_columnas): void {		
		$this->materiaDataI->actualizars($updates_materias,$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_materias): void {		
		$this->materiaDataI->eliminars($ids_deletes_materias);		
	}	
	
	public function guardarCambios($news_materias,$ids_deletes_materias,$updates_materias,$updates_columnas): void {
		$this->materiaDataI->guardarCambios($news_materias,$ids_deletes_materias,$updates_materias,$updates_columnas);		
	}
	
	
	/*----- RELACIONES -----*/
	
	public function getTodosRelaciones(Pagination $pagination1): array {		
		$this->materias = $this->materiaDataI->getTodosRelaciones($pagination1);		
		return $this->materias;
	}
	
	public function getSeleccionarRelaciones(int $id): Materia {
		$this->materia1 = $this->materiaDataI->getSeleccionarRelaciones($id);		
		return $this->materia1;
	}
	
}
