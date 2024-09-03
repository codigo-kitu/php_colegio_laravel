<?php

namespace App\Lib\Financiero\Sueldo\Application\Logic;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Financiero\Sueldo\Domain\Entity\Sueldo;
/*use App\Lib\Financiero\Sueldo\Domain\Model\SueldoModel;*/

use App\Lib\Financiero\Sueldo\Infrastructure\Data\SueldoDataI;
use App\Lib\Financiero\Sueldo\Infrastructure\Data\SueldoData;

use App\Lib\Financiero\Sueldo\Application\Logic\SueldoLogicI;

class SueldoLogic implements SueldoLogicI {
	
	public SueldoDataI $sueldoDataI;
	
	public Sueldo $sueldo1;
	public array $sueldos;
	
	/*FKs*/
	
	public Collection $docentesFK;
	
	function __construct() {      
		$this->sueldoDataI = new SueldoData();
		
		$this->sueldo1 = new Sueldo();
		$this->sueldos = array();		
				
		/*FKs*/
		//$this->sueldoFKReturnView = new SueldoFKReturnView();
		
		
		$this->docentesFK = new Collection();
    }
	
	public function getIndex(Pagination $pagination1): array {				
		$this->sueldos = $this->sueldoDataI->getIndex($pagination1);
		return $this->sueldos;
	}
	
	public function getTodos(Pagination $pagination1): array {
		$this->sueldos = $this->sueldoDataI->getTodos($pagination1);		
		return $this->sueldos;
	}
	
	public function getSeleccionar(int $id): Sueldo {
		$this->sueldo1 = $this->sueldoDataI->getSeleccionar($id);		
		return $this->sueldo1;
	}			
	
	public function nuevo($values): Sueldo {
		$this->sueldo1 = $this->sueldoDataI->nuevo($values);		
		return $this->sueldo1;
	}
	
	public function actualizar(int $id,$values): bool {
		return $this->sueldoDataI->actualizar($id,$values);		
	}
	
	public function eliminar(int $id): bool {		
		return $this->sueldoDataI->eliminar($id);		
	}
	
	public function nuevos($news_sueldos): void {		
		$this->sueldoDataI->nuevos($news_sueldos);		
	}
	
	public function actualizars($updates_sueldos,$updates_columnas): void {		
		$this->sueldoDataI->actualizars($updates_sueldos,$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_sueldos): void {		
		$this->sueldoDataI->eliminars($ids_deletes_sueldos);		
	}	
	
	public function guardarCambios($news_sueldos,$ids_deletes_sueldos,$updates_sueldos,$updates_columnas): void {
		$this->sueldoDataI->guardarCambios($news_sueldos,$ids_deletes_sueldos,$updates_sueldos,$updates_columnas);		
	}
	
	/*FKs*/
	
	public function getFks(): void {
		$this->sueldoDataI->getFks();		
		
		$this->docentesFK = $this->sueldoDataI->docentesFK;
	}
	
	
}
