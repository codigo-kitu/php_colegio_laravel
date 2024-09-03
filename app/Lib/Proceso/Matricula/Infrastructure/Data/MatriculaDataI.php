<?php

namespace App\Lib\Proceso\Matricula\Infrastructure\Data;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Proceso\Matricula\Domain\Entity\Matricula;
use App\Lib\Proceso\Matricula\Domain\Model\MatriculaModel;

interface MatriculaDataI {	
	
	public function getIndex(Pagination $pagination1) : array;	
	public function getTodos(Pagination $pagination1) : array;	
	public function getSeleccionar(int $id) : Matricula;	
	
	public function nuevo($values) : Matricula;
	public function actualizar(int $id,$values) : bool;	
	public function eliminar(int $id) : bool;	
	
	public function nuevos($news_matriculas) : void;	
	public function actualizars($updates_matriculas,$updates_columnas) : void;	
	public function eliminars($ids_deletes_matriculas) : void;		
	public function guardarCambios($news_matriculas,$ids_deletes_matriculas,$updates_matriculas,$updates_columnas) : void;
	
	
	/*FKs*/	
	public function getFks() : void;
	
	
}
