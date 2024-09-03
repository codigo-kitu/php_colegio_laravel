<?php

namespace App\Lib\Estructura\Docente\Infrastructure\Data;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Estructura\Docente\Domain\Entity\Docente;
use App\Lib\Estructura\Docente\Domain\Model\DocenteModel;

interface DocenteDataI {	
	
	public function getIndex(Pagination $pagination1) : array;	
	public function getTodos(Pagination $pagination1) : array;	
	public function getSeleccionar(int $id) : Docente;	
	
	public function nuevo($values) : Docente;
	public function actualizar(int $id,$values) : bool;	
	public function eliminar(int $id) : bool;	
	
	public function nuevos($news_docentes) : void;	
	public function actualizars($updates_docentes,$updates_columnas) : void;	
	public function eliminars($ids_deletes_docentes) : void;		
	public function guardarCambios($news_docentes,$ids_deletes_docentes,$updates_docentes,$updates_columnas) : void;
	
	
	
	/*----- RELACIONES -----*/	
	public function getTodosRelaciones(Pagination $pagination1) : array;	
	public function getSeleccionarRelaciones(int $id) : Docente;
	
}
