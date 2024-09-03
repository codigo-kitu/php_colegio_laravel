<?php declare(strict_types = 1);

namespace App\Lib\Estructura\Alumno\Infrastructure\Data;

use Illuminate\Database\Eloquent\Collection;

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Estructura\Alumno\Domain\Model\AlumnoModel;
use App\Lib\Estructura\Alumno\Domain\Entity\Alumno;


//use App\Lib\Entities\Estructura\AlumnoReturnView;


class AlumnoData implements AlumnoDataI {
		
	public Alumno $alumno1;
	public array $alumnos;
	
	public AlumnoModel $alumnoModel1;
	public Collection $alumnoModels;
	
	//public Pagination $pagination1;
	//public AlumnoReturnView $alumnoReturnView;
	
	
	function __construct() {        
		$this->alumno1 = new Alumno();
		$this->alumnos = array();		
		
		$this->alumnoModel1 = new AlumnoModel();
		$this->alumnoModels = new Collection();		
		
		//$this->pagination1 = new Pagination();		
		//$this->alumnoReturnView = new AlumnoReturnView();
		
    }
	
	public function getIndex(Pagination $pagination1): array {		
		
		$this->alumnoModels = AlumnoModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		
		$this->alumnos = $this->getEntitiesFromModels($this->alumnoModels);				
		
		return $this->alumnos;
	}
	
	public function getTodos(Pagination $pagination1): array {
		
		$this->alumnoModels = AlumnoModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		
		$this->alumnos = $this->getEntitiesFromModels($this->alumnoModels);				
		
		return $this->alumnos;
	}
	
	public function getSeleccionar(int $id): Alumno {
		
		$this->alumnoModel1 = AlumnoModel::where('id', $id)
									->first();
		
		
		$this->alumno1 = $this->getEntityFromModel($this->alumnoModel1);					
		
		return $this->alumno1;
	}			
	
	public function nuevo($values): Alumno {
		$this->alumnoModel1 = AlumnoModel::create($values);						
		
		$this->alumno1 = $this->getEntityFromModel($this->alumnoModel1);
		
		return $this->alumno1;
	}
	
	public function actualizar(int $id,$values): bool {
		$this->alumnoModel1 = AlumnoModel::find($id);
		
		$updated = $this->alumnoModel1->update($values);
				
		return $updated;
	}
	
	public function eliminar(int $id): bool {		
		$this->alumnoModel1 = AlumnoModel::find($id);
		
		$deleted = $this->alumnoModel1->delete();
		
		return $deleted;
	}
	
	public function getEntitiesFromModels(Collection $arr_alumnos) : array {
		$alumnos = [];
		
		foreach($arr_alumnos as $arr_alumno1) {
			$this->alumno1 = $this->getEntityFromModel($arr_alumno1);
			array_push($alumnos,$this->alumno1);
		}
		
		return $alumnos;
	}
	
	public function getEntityFromModel(AlumnoModel $arr_alumno1) : Alumno {
		
		$alumno1 = new Alumno();
		
		$alumno1->id = $arr_alumno1->id;
		$alumno1->created_at = $arr_alumno1->created_at;
		$alumno1->updated_at = $arr_alumno1->updated_at;
		
		$alumno1->nombre= $arr_alumno1->nombre;
		$alumno1->apellido= $arr_alumno1->apellido;
		$alumno1->fecha_nacimiento= $arr_alumno1->fecha_nacimiento;
	
		return $alumno1;
	}
	
	public function setModelFromEntity(Alumno $alumno1) : array {
		
		$data_alumno = [		
			'created_at' => $alumno1->created_at,			
			'updated_at' => $alumno1->updated_at,			
			'nombre' => $alumno1->nombre,			
			'apellido' => $alumno1->apellido,			
			'fecha_nacimiento' => $alumno1->fecha_nacimiento,			
        ];
		
		return $data_alumno;
	}
	
	public function nuevos($news_alumnos): void {
		AlumnoModel::insert($news_alumnos);				
	}		
	
	public function actualizars($updates_alumnos,$updates_columnas): void {
		AlumnoModel::upsert($updates_alumnos,['id'],$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_alumnos): void {
		AlumnoModel::destroy($ids_deletes_alumnos);		
	}
	
	public function guardarCambios($news_alumnos,$ids_deletes_alumnos,$updates_alumnos,$updates_columnas): void {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/
		/*--- Updates ---*/		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		AlumnoModel::insert($news_alumnos);
		/*--- Deletes ---*/		
		AlumnoModel::destroy($ids_deletes_alumnos);
		/*--- Updates ---*/
		AlumnoModel::upsert($updates_alumnos,['id'],$updates_columnas);		
	}
	
	
	/*----- RELACIONES -----*/
	
	public function getTodosRelaciones(Pagination $pagination1): array {
		
		$this->alumnoModels = AlumnoModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
							
		foreach($this->alumnos as $alumno) {
			/*----- Relaciones -----*/
						$alumno->matricula;
			$alumno->alumno_materias;
			$alumno->materias;
			$alumno->pensions;
			$alumno->notas;

		}	
		
		return $this->alumnos;
	}
	
	public function getSeleccionarRelaciones(int $id): Alumno {
		
		$this->alumnoModel1 = AlumnoModel::where('id', $id)
									->first();
		
		$this->alumno1 = $this->getEntityFromModel($this->alumnoModel1);
		
		
		/*----- Relaciones -----*/
				$this->alumno1->matricula;
		$this->alumno1->alumno_materias;
		$this->alumno1->materias;
		$this->alumno1->pensions;
		$this->alumno1->notas;
		
		
		return $this->alumno1;
	}
}
