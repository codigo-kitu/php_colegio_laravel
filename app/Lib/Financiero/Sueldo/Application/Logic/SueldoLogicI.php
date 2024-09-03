<?php

namespace App\Lib\Financiero\Sueldo\Application\Logic;

/*use Illuminate\Support\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Financiero\Sueldo\Domain\Entity\Sueldo;
/*use App\Lib\Financiero\Sueldo\Domain\Model\SueldoModel;*/

interface SueldoLogicI {	

	public function getIndex(Pagination $pagination1): array;	
	public function getTodos(Pagination $pagination1): array;	
	public function getSeleccionar(int $id): Sueldo;
	
	public function nuevo($values): Sueldo;	
	public function actualizar(int $id,$values): bool;	
	public function eliminar(int $id): bool;
	
	public function nuevos($news_sueldos): void;	
	public function actualizars($updates_sueldos,$updates_columnas): void;
	public function eliminars($ids_deletes_sueldos): void;		
	public function guardarCambios($news_sueldos,$ids_deletes_sueldos,$updates_sueldos,$updates_columnas): void;
	
	/*FKs*/	
	public function getFks(): void;		
	
}
