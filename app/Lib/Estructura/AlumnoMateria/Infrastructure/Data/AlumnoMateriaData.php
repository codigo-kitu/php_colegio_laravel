<?php declare(strict_types = 1);

namespace App\Lib\Estructura\AlumnoMateria\Infrastructure\Data;

use Illuminate\Database\Eloquent\Collection;

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Estructura\AlumnoMateria\Domain\Model\AlumnoMateriaModel;
use App\Lib\Estructura\AlumnoMateria\Domain\Entity\AlumnoMateria;

/*FKs*/
use App\Lib\Estructura\Alumno\Domain\Model\AlumnoModel;
use App\Lib\Estructura\Alumno\Infrastructure\Data\AlumnoData;
use App\Lib\Estructura\Materia\Domain\Model\MateriaModel;
use App\Lib\Estructura\Materia\Infrastructure\Data\MateriaData;
		

//use App\Lib\Entities\Estructura\AlumnoMateriaReturnView;

/*FKs*/
//use App\Lib\Entities\Estructura\AlumnoMateriaFKReturnView;	

class AlumnoMateriaData implements AlumnoMateriaDataI {
		
	public AlumnoMateria $alumno_materia1;
	public array $alumno_materias;
	
	public AlumnoMateriaModel $alumno_materiaModel1;
	public Collection $alumno_materiaModels;
	
	//public Pagination $pagination1;
	//public AlumnoMateriaReturnView $alumno_materiaReturnView;
	
	/*FKs*/
	//public AlumnoMateriaFKReturnView $alumno_materiaFKReturnView;
	
	

	public array $alumnosFK;
	public AlumnoData $alumnoData1;

	public array $materiasFK;
	public MateriaData $materiaData1;
	
	function __construct() {        
		$this->alumno_materia1 = new AlumnoMateria();
		$this->alumno_materias = array();		
		
		$this->alumno_materiaModel1 = new AlumnoMateriaModel();
		$this->alumno_materiaModels = new Collection();		
		
		//$this->pagination1 = new Pagination();		
		//$this->alumno_materiaReturnView = new AlumnoMateriaReturnView();
		
		/*FKs*/
		//$this->alumno_materiaFKReturnView = new AlumnoMateriaFKReturnView();
		
		

		$this->alumnosFK = array();
		$this->alumnoData1 = new AlumnoData();

		$this->materiasFK = array();
		$this->materiaData1 = new MateriaData();
    }
	
	public function getIndex(Pagination $pagination1): array {		
		
		$this->alumno_materiaModels = AlumnoMateriaModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		//----- FKs -----			
		foreach($this->alumno_materiaModels as $alumno_materiaModel) {
			
			$alumno_materiaModel->alumno;	
			$alumno_materiaModel->materia;				
		}
		//----- FKs -----
		
		$this->alumno_materias = $this->getEntitiesFromModels($this->alumno_materiaModels);				
		
		return $this->alumno_materias;
	}
	
	public function getTodos(Pagination $pagination1): array {
		
		$this->alumno_materiaModels = AlumnoMateriaModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		//----- FKs -----			
		foreach($this->alumno_materiaModels as $alumno_materiaModel) {
			
			$alumno_materiaModel->alumno;	
			$alumno_materiaModel->materia;				
		}
		//----- FKs -----
		
		$this->alumno_materias = $this->getEntitiesFromModels($this->alumno_materiaModels);				
		
		return $this->alumno_materias;
	}
	
	public function getSeleccionar(int $id): AlumnoMateria {
		
		$this->alumno_materiaModel1 = AlumnoMateriaModel::where('id', $id)
									->first();
		
		//----- FKs -----			
		
		$this->alumno_materiaModel1->alumno;	
		$this->alumno_materiaModel1->materia;			
		//----- FKs -----
		
		$this->alumno_materia1 = $this->getEntityFromModel($this->alumno_materiaModel1);					
		
		return $this->alumno_materia1;
	}			
	
	public function nuevo($values): AlumnoMateria {
		$this->alumno_materiaModel1 = AlumnoMateriaModel::create($values);						
		
		$this->alumno_materia1 = $this->getEntityFromModel($this->alumno_materiaModel1);
		
		return $this->alumno_materia1;
	}
	
	public function actualizar(int $id,$values): bool {
		$this->alumno_materiaModel1 = AlumnoMateriaModel::find($id);
		
		$updated = $this->alumno_materiaModel1->update($values);
				
		return $updated;
	}
	
	public function eliminar(int $id): bool {		
		$this->alumno_materiaModel1 = AlumnoMateriaModel::find($id);
		
		$deleted = $this->alumno_materiaModel1->delete();
		
		return $deleted;
	}
	
	public function getEntitiesFromModels(Collection $arr_alumno_materias) : array {
		$alumno_materias = [];
		
		foreach($arr_alumno_materias as $arr_alumno_materia1) {
			$this->alumno_materia1 = $this->getEntityFromModel($arr_alumno_materia1);
			array_push($alumno_materias,$this->alumno_materia1);
		}
		
		return $alumno_materias;
	}
	
	public function getEntityFromModel(AlumnoMateriaModel $arr_alumno_materia1) : AlumnoMateria {
		
		$alumno_materia1 = new AlumnoMateria();
		
		$alumno_materia1->id = $arr_alumno_materia1->id;
		$alumno_materia1->created_at = $arr_alumno_materia1->created_at;
		$alumno_materia1->updated_at = $arr_alumno_materia1->updated_at;
		
		$alumno_materia1->id_alumno= $arr_alumno_materia1->id_alumno;
		$alumno_materia1->id_materia= $arr_alumno_materia1->id_materia;
		
		$alumno_materia1->alumno = $this->alumnoData1->getEntityFromModel($arr_alumno_materia1->alumno);
		$alumno_materia1->materia = $this->materiaData1->getEntityFromModel($arr_alumno_materia1->materia);
		
		return $alumno_materia1;
	}
	
	public function setModelFromEntity(AlumnoMateria $alumno_materia1) : array {
		
		$data_alumno_materia = [		
			'created_at' => $alumno_materia1->created_at,			
			'updated_at' => $alumno_materia1->updated_at,			
			'id_alumno' => $alumno_materia1->id_alumno,			
			'id_materia' => $alumno_materia1->id_materia,			
        ];
		
		return $data_alumno_materia;
	}
	
	public function nuevos($news_alumno_materias): void {
		AlumnoMateriaModel::insert($news_alumno_materias);				
	}		
	
	public function actualizars($updates_alumno_materias,$updates_columnas): void {
		AlumnoMateriaModel::upsert($updates_alumno_materias,['id'],$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_alumno_materias): void {
		AlumnoMateriaModel::destroy($ids_deletes_alumno_materias);		
	}
	
	public function guardarCambios($news_alumno_materias,$ids_deletes_alumno_materias,$updates_alumno_materias,$updates_columnas): void {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/
		/*--- Updates ---*/		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		AlumnoMateriaModel::insert($news_alumno_materias);
		/*--- Deletes ---*/		
		AlumnoMateriaModel::destroy($ids_deletes_alumno_materias);
		/*--- Updates ---*/
		AlumnoMateriaModel::upsert($updates_alumno_materias,['id'],$updates_columnas);		
	}
	
	/*FKs*/
	
	public function getFks(): void {
		
		$this->alumnosFK = $this->alumnoData1->getEntitiesFromModels(AlumnoModel::get());
		$this->materiasFK = $this->materiaData1->getEntitiesFromModels(MateriaModel::get());
	}
	
}
