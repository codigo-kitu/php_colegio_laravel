<?php

namespace App\Lib\Financiero\Pension\Application\Logic;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Financiero\Pension\Domain\Entity\Pension;
/*use App\Lib\Financiero\Pension\Domain\Model\PensionModel;*/

use App\Lib\Financiero\Pension\Infrastructure\Data\PensionDataI;
use App\Lib\Financiero\Pension\Infrastructure\Data\PensionData;

use App\Lib\Financiero\Pension\Application\Logic\PensionLogicI;

class PensionLogic implements PensionLogicI {
	
	public PensionDataI $pensionDataI;
	
	public Pension $pension1;
	public array $pensions;
	
	/*FKs*/
	
	public Collection $alumnosFK;
	
	function __construct() {      
		$this->pensionDataI = new PensionData();
		
		$this->pension1 = new Pension();
		$this->pensions = array();		
				
		/*FKs*/
		//$this->pensionFKReturnView = new PensionFKReturnView();
		
		
		$this->alumnosFK = new Collection();
    }
	
	public function getIndex(Pagination $pagination1): array {				
		$this->pensions = $this->pensionDataI->getIndex($pagination1);
		return $this->pensions;
	}
	
	public function getTodos(Pagination $pagination1): array {
		$this->pensions = $this->pensionDataI->getTodos($pagination1);		
		return $this->pensions;
	}
	
	public function getSeleccionar(int $id): Pension {
		$this->pension1 = $this->pensionDataI->getSeleccionar($id);		
		return $this->pension1;
	}			
	
	public function nuevo($values): Pension {
		$this->pension1 = $this->pensionDataI->nuevo($values);		
		return $this->pension1;
	}
	
	public function actualizar(int $id,$values): bool {
		return $this->pensionDataI->actualizar($id,$values);		
	}
	
	public function eliminar(int $id): bool {		
		return $this->pensionDataI->eliminar($id);		
	}
	
	public function nuevos($news_pensions): void {		
		$this->pensionDataI->nuevos($news_pensions);		
	}
	
	public function actualizars($updates_pensions,$updates_columnas): void {		
		$this->pensionDataI->actualizars($updates_pensions,$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_pensions): void {		
		$this->pensionDataI->eliminars($ids_deletes_pensions);		
	}	
	
	public function guardarCambios($news_pensions,$ids_deletes_pensions,$updates_pensions,$updates_columnas): void {
		$this->pensionDataI->guardarCambios($news_pensions,$ids_deletes_pensions,$updates_pensions,$updates_columnas);		
	}
	
	/*FKs*/
	
	public function getFks(): void {
		$this->pensionDataI->getFks();		
		
		$this->alumnosFK = $this->pensionDataI->alumnosFK;
	}
	
	
}
