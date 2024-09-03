<?php

namespace App\Lib\Estructura\DocenteMateria\Application\Logic;

/*use Illuminate\Support\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Estructura\DocenteMateria\Domain\Entity\DocenteMateria;
/*use App\Lib\Estructura\DocenteMateria\Domain\Model\DocenteMateriaModel;*/

interface DocenteMateriaLogicI {	

	public function getIndex(Pagination $pagination1): array;	
	public function getTodos(Pagination $pagination1): array;	
	public function getSeleccionar(int $id): DocenteMateria;
	
	public function nuevo($values): DocenteMateria;	
	public function actualizar(int $id,$values): bool;	
	public function eliminar(int $id): bool;
	
	public function nuevos($news_docente_materias): void;	
	public function actualizars($updates_docente_materias,$updates_columnas): void;
	public function eliminars($ids_deletes_docente_materias): void;		
	public function guardarCambios($news_docente_materias,$ids_deletes_docente_materias,$updates_docente_materias,$updates_columnas): void;
	
	/*FKs*/	
	public function getFks(): void;		
	
}
