<?php declare(strict_types = 1);

namespace App\Lib\Estructura\Materia\Infrastructure\Data;

use Illuminate\Database\Eloquent\Collection;

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Estructura\Materia\Domain\Model\MateriaModel;
use App\Lib\Estructura\Materia\Domain\Entity\Materia;


//use App\Lib\Entities\Estructura\MateriaReturnView;


class MateriaData implements MateriaDataI {
		
	public Materia $materia1;
	public array $materias;
	
	public MateriaModel $materiaModel1;
	public Collection $materiaModels;
	
	//public Pagination $pagination1;
	//public MateriaReturnView $materiaReturnView;
	
	
	function __construct() {        
		$this->materia1 = new Materia();
		$this->materias = array();		
		
		$this->materiaModel1 = new MateriaModel();
		$this->materiaModels = new Collection();		
		
		//$this->pagination1 = new Pagination();		
		//$this->materiaReturnView = new MateriaReturnView();
		
    }
	
	public function getIndex(Pagination $pagination1): array {		
		
		$this->materiaModels = MateriaModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		
		$this->materias = $this->getEntitiesFromModels($this->materiaModels);				
		
		return $this->materias;
	}
	
	public function getTodos(Pagination $pagination1): array {
		
		$this->materiaModels = MateriaModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		
		$this->materias = $this->getEntitiesFromModels($this->materiaModels);				
		
		return $this->materias;
	}
	
	public function getSeleccionar(int $id): Materia {
		
		$this->materiaModel1 = MateriaModel::where('id', $id)
									->first();
		
		
		$this->materia1 = $this->getEntityFromModel($this->materiaModel1);					
		
		return $this->materia1;
	}			
	
	public function nuevo($values): Materia {
		$this->materiaModel1 = MateriaModel::create($values);						
		
		$this->materia1 = $this->getEntityFromModel($this->materiaModel1);
		
		return $this->materia1;
	}
	
	public function actualizar(int $id,$values): bool {
		$this->materiaModel1 = MateriaModel::find($id);
		
		$updated = $this->materiaModel1->update($values);
				
		return $updated;
	}
	
	public function eliminar(int $id): bool {		
		$this->materiaModel1 = MateriaModel::find($id);
		
		$deleted = $this->materiaModel1->delete();
		
		return $deleted;
	}
	
	public function getEntitiesFromModels(Collection $arr_materias) : array {
		$materias = [];
		
		foreach($arr_materias as $arr_materia1) {
			$this->materia1 = $this->getEntityFromModel($arr_materia1);
			array_push($materias,$this->materia1);
		}
		
		return $materias;
	}
	
	public function getEntityFromModel(MateriaModel $arr_materia1) : Materia {
		
		$materia1 = new Materia();
		
		$materia1->id = $arr_materia1->id;
		$materia1->created_at = $arr_materia1->created_at;
		$materia1->updated_at = $arr_materia1->updated_at;
		
		$materia1->codigo= $arr_materia1->codigo;
		$materia1->nombre= $arr_materia1->nombre;
		$materia1->activo= $arr_materia1->activo;
	
		return $materia1;
	}
	
	public function setModelFromEntity(Materia $materia1) : array {
		
		$data_materia = [		
			'created_at' => $materia1->created_at,			
			'updated_at' => $materia1->updated_at,			
			'codigo' => $materia1->codigo,			
			'nombre' => $materia1->nombre,			
			'activo' => $materia1->activo,			
        ];
		
		return $data_materia;
	}
	
	public function nuevos($news_materias): void {
		MateriaModel::insert($news_materias);				
	}		
	
	public function actualizars($updates_materias,$updates_columnas): void {
		MateriaModel::upsert($updates_materias,['id'],$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_materias): void {
		MateriaModel::destroy($ids_deletes_materias);		
	}
	
	public function guardarCambios($news_materias,$ids_deletes_materias,$updates_materias,$updates_columnas): void {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/
		/*--- Updates ---*/		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		MateriaModel::insert($news_materias);
		/*--- Deletes ---*/		
		MateriaModel::destroy($ids_deletes_materias);
		/*--- Updates ---*/
		MateriaModel::upsert($updates_materias,['id'],$updates_columnas);		
	}
	
	
	/*----- RELACIONES -----*/
	
	public function getTodosRelaciones(Pagination $pagination1): array {
		
		$this->materiaModels = MateriaModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
							
		foreach($this->materias as $materia) {
			/*----- Relaciones -----*/
						$materia->alumnos;
			$materia->alumno_materias;
			$materia->docentes;
			$materia->notas;
			$materia->docente_materias;

		}	
		
		return $this->materias;
	}
	
	public function getSeleccionarRelaciones(int $id): Materia {
		
		$this->materiaModel1 = MateriaModel::where('id', $id)
									->first();
		
		$this->materia1 = $this->getEntityFromModel($this->materiaModel1);
		
		
		/*----- Relaciones -----*/
				$this->materia1->alumnos;
		$this->materia1->alumno_materias;
		$this->materia1->docentes;
		$this->materia1->notas;
		$this->materia1->docente_materias;
		
		
		return $this->materia1;
	}
}
