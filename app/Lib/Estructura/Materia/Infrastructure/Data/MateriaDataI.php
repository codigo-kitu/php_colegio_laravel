<?php

namespace App\Lib\Estructura\Materia\Infrastructure\Data;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Estructura\Materia\Domain\Entity\Materia;
use App\Lib\Estructura\Materia\Domain\Model\MateriaModel;

interface MateriaDataI {	
	
	public function getIndex(Pagination $pagination1) : array;	
	public function getTodos(Pagination $pagination1) : array;	
	public function getSeleccionar(int $id) : Materia;	
	
	public function nuevo($values) : Materia;
	public function actualizar(int $id,$values) : bool;	
	public function eliminar(int $id) : bool;	
	
	public function nuevos($news_materias) : void;	
	public function actualizars($updates_materias,$updates_columnas) : void;	
	public function eliminars($ids_deletes_materias) : void;		
	public function guardarCambios($news_materias,$ids_deletes_materias,$updates_materias,$updates_columnas) : void;
	
	
	
	/*----- RELACIONES -----*/	
	public function getTodosRelaciones(Pagination $pagination1) : array;	
	public function getSeleccionarRelaciones(int $id) : Materia;
	
}
