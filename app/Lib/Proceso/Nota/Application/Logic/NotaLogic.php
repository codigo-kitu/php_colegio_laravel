<?php

namespace App\Lib\Proceso\Nota\Application\Logic;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Proceso\Nota\Domain\Entity\Nota;
/*use App\Lib\Proceso\Nota\Domain\Model\NotaModel;*/

use App\Lib\Proceso\Nota\Infrastructure\Data\NotaDataI;
use App\Lib\Proceso\Nota\Infrastructure\Data\NotaData;

use App\Lib\Proceso\Nota\Application\Logic\NotaLogicI;

class NotaLogic implements NotaLogicI {
	
	public NotaDataI $notaDataI;
	
	public Nota $nota1;
	public array $notas;
	
	/*FKs*/
	
	public Collection $alumnosFK;
	public Collection $materiasFK;
	public Collection $docentesFK;
	
	function __construct() {      
		$this->notaDataI = new NotaData();
		
		$this->nota1 = new Nota();
		$this->notas = array();		
				
		/*FKs*/
		//$this->notaFKReturnView = new NotaFKReturnView();
		
		
		$this->alumnosFK = new Collection();
		$this->materiasFK = new Collection();
		$this->docentesFK = new Collection();
    }
	
	public function getIndex(Pagination $pagination1): array {				
		$this->notas = $this->notaDataI->getIndex($pagination1);
		return $this->notas;
	}
	
	public function getTodos(Pagination $pagination1): array {
		$this->notas = $this->notaDataI->getTodos($pagination1);		
		return $this->notas;
	}
	
	public function getSeleccionar(int $id): Nota {
		$this->nota1 = $this->notaDataI->getSeleccionar($id);		
		return $this->nota1;
	}			
	
	public function nuevo($values): Nota {
		$this->nota1 = $this->notaDataI->nuevo($values);		
		return $this->nota1;
	}
	
	public function actualizar(int $id,$values): bool {
		return $this->notaDataI->actualizar($id,$values);		
	}
	
	public function eliminar(int $id): bool {		
		return $this->notaDataI->eliminar($id);		
	}
	
	public function nuevos($news_notas): void {		
		$this->notaDataI->nuevos($news_notas);		
	}
	
	public function actualizars($updates_notas,$updates_columnas): void {		
		$this->notaDataI->actualizars($updates_notas,$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_notas): void {		
		$this->notaDataI->eliminars($ids_deletes_notas);		
	}	
	
	public function guardarCambios($news_notas,$ids_deletes_notas,$updates_notas,$updates_columnas): void {
		$this->notaDataI->guardarCambios($news_notas,$ids_deletes_notas,$updates_notas,$updates_columnas);		
	}
	
	/*FKs*/
	
	public function getFks(): void {
		$this->notaDataI->getFks();		
		
		$this->alumnosFK = $this->notaDataI->alumnosFK;
		$this->materiasFK = $this->notaDataI->materiasFK;
		$this->docentesFK = $this->notaDataI->docentesFK;
	}
	
	
}
