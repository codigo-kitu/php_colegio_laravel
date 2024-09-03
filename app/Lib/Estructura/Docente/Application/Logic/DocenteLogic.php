<?php

namespace App\Lib\Estructura\Docente\Application\Logic;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Estructura\Docente\Domain\Entity\Docente;
/*use App\Lib\Estructura\Docente\Domain\Model\DocenteModel;*/

use App\Lib\Estructura\Docente\Infrastructure\Data\DocenteDataI;
use App\Lib\Estructura\Docente\Infrastructure\Data\DocenteData;

use App\Lib\Estructura\Docente\Application\Logic\DocenteLogicI;

class DocenteLogic implements DocenteLogicI {
	
	public DocenteDataI $docenteDataI;
	
	public Docente $docente1;
	public array $docentes;
	
	
	function __construct() {      
		$this->docenteDataI = new DocenteData();
		
		$this->docente1 = new Docente();
		$this->docentes = array();		
				
    }
	
	public function getIndex(Pagination $pagination1): array {				
		$this->docentes = $this->docenteDataI->getIndex($pagination1);
		return $this->docentes;
	}
	
	public function getTodos(Pagination $pagination1): array {
		$this->docentes = $this->docenteDataI->getTodos($pagination1);		
		return $this->docentes;
	}
	
	public function getSeleccionar(int $id): Docente {
		$this->docente1 = $this->docenteDataI->getSeleccionar($id);		
		return $this->docente1;
	}			
	
	public function nuevo($values): Docente {
		$this->docente1 = $this->docenteDataI->nuevo($values);		
		return $this->docente1;
	}
	
	public function actualizar(int $id,$values): bool {
		return $this->docenteDataI->actualizar($id,$values);		
	}
	
	public function eliminar(int $id): bool {		
		return $this->docenteDataI->eliminar($id);		
	}
	
	public function nuevos($news_docentes): void {		
		$this->docenteDataI->nuevos($news_docentes);		
	}
	
	public function actualizars($updates_docentes,$updates_columnas): void {		
		$this->docenteDataI->actualizars($updates_docentes,$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_docentes): void {		
		$this->docenteDataI->eliminars($ids_deletes_docentes);		
	}	
	
	public function guardarCambios($news_docentes,$ids_deletes_docentes,$updates_docentes,$updates_columnas): void {
		$this->docenteDataI->guardarCambios($news_docentes,$ids_deletes_docentes,$updates_docentes,$updates_columnas);		
	}
	
	
	/*----- RELACIONES -----*/
	
	public function getTodosRelaciones(Pagination $pagination1): array {		
		$this->docentes = $this->docenteDataI->getTodosRelaciones($pagination1);		
		return $this->docentes;
	}
	
	public function getSeleccionarRelaciones(int $id): Docente {
		$this->docente1 = $this->docenteDataI->getSeleccionarRelaciones($id);		
		return $this->docente1;
	}
	
}
