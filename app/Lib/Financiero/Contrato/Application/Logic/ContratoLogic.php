<?php

namespace App\Lib\Financiero\Contrato\Application\Logic;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Financiero\Contrato\Domain\Entity\Contrato;
/*use App\Lib\Financiero\Contrato\Domain\Model\ContratoModel;*/

use App\Lib\Financiero\Contrato\Infrastructure\Data\ContratoDataI;
use App\Lib\Financiero\Contrato\Infrastructure\Data\ContratoData;

use App\Lib\Financiero\Contrato\Application\Logic\ContratoLogicI;

class ContratoLogic implements ContratoLogicI {
	
	public ContratoDataI $contratoDataI;
	
	public Contrato $contrato1;
	public array $contratos;
	
	/*FKs*/
	
	public Collection $docentesFK;
	
	function __construct() {      
		$this->contratoDataI = new ContratoData();
		
		$this->contrato1 = new Contrato();
		$this->contratos = array();		
				
		/*FKs*/
		//$this->contratoFKReturnView = new ContratoFKReturnView();
		
		
		$this->docentesFK = new Collection();
    }
	
	public function getIndex(Pagination $pagination1): array {				
		$this->contratos = $this->contratoDataI->getIndex($pagination1);
		return $this->contratos;
	}
	
	public function getTodos(Pagination $pagination1): array {
		$this->contratos = $this->contratoDataI->getTodos($pagination1);		
		return $this->contratos;
	}
	
	public function getSeleccionar(int $id): Contrato {
		$this->contrato1 = $this->contratoDataI->getSeleccionar($id);		
		return $this->contrato1;
	}			
	
	public function nuevo($values): Contrato {
		$this->contrato1 = $this->contratoDataI->nuevo($values);		
		return $this->contrato1;
	}
	
	public function actualizar(int $id,$values): bool {
		return $this->contratoDataI->actualizar($id,$values);		
	}
	
	public function eliminar(int $id): bool {		
		return $this->contratoDataI->eliminar($id);		
	}
	
	public function nuevos($news_contratos): void {		
		$this->contratoDataI->nuevos($news_contratos);		
	}
	
	public function actualizars($updates_contratos,$updates_columnas): void {		
		$this->contratoDataI->actualizars($updates_contratos,$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_contratos): void {		
		$this->contratoDataI->eliminars($ids_deletes_contratos);		
	}	
	
	public function guardarCambios($news_contratos,$ids_deletes_contratos,$updates_contratos,$updates_columnas): void {
		$this->contratoDataI->guardarCambios($news_contratos,$ids_deletes_contratos,$updates_contratos,$updates_columnas);		
	}
	
	/*FKs*/
	
	public function getFks(): void {
		$this->contratoDataI->getFks();		
		
		$this->docentesFK = $this->contratoDataI->docentesFK;
	}
	
	
}
