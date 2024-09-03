<?php

namespace App\Lib\Financiero\Pension\Application\Logic;

/*use Illuminate\Support\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Financiero\Pension\Domain\Entity\Pension;
/*use App\Lib\Financiero\Pension\Domain\Model\PensionModel;*/

interface PensionLogicI {	

	public function getIndex(Pagination $pagination1): array;	
	public function getTodos(Pagination $pagination1): array;	
	public function getSeleccionar(int $id): Pension;
	
	public function nuevo($values): Pension;	
	public function actualizar(int $id,$values): bool;	
	public function eliminar(int $id): bool;
	
	public function nuevos($news_pensions): void;	
	public function actualizars($updates_pensions,$updates_columnas): void;
	public function eliminars($ids_deletes_pensions): void;		
	public function guardarCambios($news_pensions,$ids_deletes_pensions,$updates_pensions,$updates_columnas): void;
	
	/*FKs*/	
	public function getFks(): void;		
	
}
