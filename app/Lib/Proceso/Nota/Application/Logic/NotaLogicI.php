<?php

namespace App\Lib\Proceso\Nota\Application\Logic;

/*use Illuminate\Support\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Proceso\Nota\Domain\Entity\Nota;
/*use App\Lib\Proceso\Nota\Domain\Model\NotaModel;*/

interface NotaLogicI {	

	public function getIndex(Pagination $pagination1): array;	
	public function getTodos(Pagination $pagination1): array;	
	public function getSeleccionar(int $id): Nota;
	
	public function nuevo($values): Nota;	
	public function actualizar(int $id,$values): bool;	
	public function eliminar(int $id): bool;
	
	public function nuevos($news_notas): void;	
	public function actualizars($updates_notas,$updates_columnas): void;
	public function eliminars($ids_deletes_notas): void;		
	public function guardarCambios($news_notas,$ids_deletes_notas,$updates_notas,$updates_columnas): void;
	
	/*FKs*/	
	public function getFks(): void;		
	
}
