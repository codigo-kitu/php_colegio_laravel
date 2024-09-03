<?php

namespace App\Lib\Proceso\Matricula\Application\Logic;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Proceso\Matricula\Domain\Entity\Matricula;
/*use App\Lib\Proceso\Matricula\Domain\Model\MatriculaModel;*/

use App\Lib\Proceso\Matricula\Infrastructure\Data\MatriculaDataI;
use App\Lib\Proceso\Matricula\Infrastructure\Data\MatriculaData;

use App\Lib\Proceso\Matricula\Application\Logic\MatriculaLogicI;

class MatriculaLogic implements MatriculaLogicI {
	
	public MatriculaDataI $matriculaDataI;
	
	public Matricula $matricula1;
	public array $matriculas;
	
	/*FKs*/
	
	public Collection $alumnosFK;
	
	function __construct() {      
		$this->matriculaDataI = new MatriculaData();
		
		$this->matricula1 = new Matricula();
		$this->matriculas = array();		
				
		/*FKs*/
		//$this->matriculaFKReturnView = new MatriculaFKReturnView();
		
		
		$this->alumnosFK = new Collection();
    }
	
	public function getIndex(Pagination $pagination1): array {				
		$this->matriculas = $this->matriculaDataI->getIndex($pagination1);
		return $this->matriculas;
	}
	
	public function getTodos(Pagination $pagination1): array {
		$this->matriculas = $this->matriculaDataI->getTodos($pagination1);		
		return $this->matriculas;
	}
	
	public function getSeleccionar(int $id): Matricula {
		$this->matricula1 = $this->matriculaDataI->getSeleccionar($id);		
		return $this->matricula1;
	}			
	
	public function nuevo($values): Matricula {
		$this->matricula1 = $this->matriculaDataI->nuevo($values);		
		return $this->matricula1;
	}
	
	public function actualizar(int $id,$values): bool {
		return $this->matriculaDataI->actualizar($id,$values);		
	}
	
	public function eliminar(int $id): bool {		
		return $this->matriculaDataI->eliminar($id);		
	}
	
	public function nuevos($news_matriculas): void {		
		$this->matriculaDataI->nuevos($news_matriculas);		
	}
	
	public function actualizars($updates_matriculas,$updates_columnas): void {		
		$this->matriculaDataI->actualizars($updates_matriculas,$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_matriculas): void {		
		$this->matriculaDataI->eliminars($ids_deletes_matriculas);		
	}	
	
	public function guardarCambios($news_matriculas,$ids_deletes_matriculas,$updates_matriculas,$updates_columnas): void {
		$this->matriculaDataI->guardarCambios($news_matriculas,$ids_deletes_matriculas,$updates_matriculas,$updates_columnas);		
	}
	
	/*FKs*/
	
	public function getFks(): void {
		$this->matriculaDataI->getFks();		
		
		$this->alumnosFK = $this->matriculaDataI->alumnosFK;
	}
	
	
}
