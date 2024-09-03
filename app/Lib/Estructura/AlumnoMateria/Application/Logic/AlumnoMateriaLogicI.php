<?php

namespace App\Lib\Estructura\AlumnoMateria\Application\Logic;

/*use Illuminate\Support\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Estructura\AlumnoMateria\Domain\Entity\AlumnoMateria;
/*use App\Lib\Estructura\AlumnoMateria\Domain\Model\AlumnoMateriaModel;*/

interface AlumnoMateriaLogicI {	

	public function getIndex(Pagination $pagination1): array;	
	public function getTodos(Pagination $pagination1): array;	
	public function getSeleccionar(int $id): AlumnoMateria;
	
	public function nuevo($values): AlumnoMateria;	
	public function actualizar(int $id,$values): bool;	
	public function eliminar(int $id): bool;
	
	public function nuevos($news_alumno_materias): void;	
	public function actualizars($updates_alumno_materias,$updates_columnas): void;
	public function eliminars($ids_deletes_alumno_materias): void;		
	public function guardarCambios($news_alumno_materias,$ids_deletes_alumno_materias,$updates_alumno_materias,$updates_columnas): void;
	
	/*FKs*/	
	public function getFks(): void;		
	
}
