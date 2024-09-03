<?php

namespace App\Lib\Estructura\Alumno\Infrastructure\Data;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Estructura\Alumno\Domain\Entity\Alumno;
use App\Lib\Estructura\Alumno\Domain\Model\AlumnoModel;

interface AlumnoDataI {	
	
	public function getIndex(Pagination $pagination1) : array;	
	public function getTodos(Pagination $pagination1) : array;	
	public function getSeleccionar(int $id) : Alumno;	
	
	public function nuevo($values) : Alumno;
	public function actualizar(int $id,$values) : bool;	
	public function eliminar(int $id) : bool;	
	
	public function nuevos($news_alumnos) : void;	
	public function actualizars($updates_alumnos,$updates_columnas) : void;	
	public function eliminars($ids_deletes_alumnos) : void;		
	public function guardarCambios($news_alumnos,$ids_deletes_alumnos,$updates_alumnos,$updates_columnas) : void;
	
	
	
	/*----- RELACIONES -----*/	
	public function getTodosRelaciones(Pagination $pagination1) : array;	
	public function getSeleccionarRelaciones(int $id) : Alumno;
	
}
