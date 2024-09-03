<?php declare(strict_types = 1);

namespace App\Lib\Estructura\DocenteMateria\Infrastructure\Data;

use Illuminate\Database\Eloquent\Collection;

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Estructura\DocenteMateria\Domain\Model\DocenteMateriaModel;
use App\Lib\Estructura\DocenteMateria\Domain\Entity\DocenteMateria;

/*FKs*/
use App\Lib\Estructura\Docente\Domain\Model\DocenteModel;
use App\Lib\Estructura\Docente\Infrastructure\Data\DocenteData;
use App\Lib\Estructura\Materia\Domain\Model\MateriaModel;
use App\Lib\Estructura\Materia\Infrastructure\Data\MateriaData;
		

//use App\Lib\Entities\Estructura\DocenteMateriaReturnView;

/*FKs*/
//use App\Lib\Entities\Estructura\DocenteMateriaFKReturnView;	

class DocenteMateriaData implements DocenteMateriaDataI {
		
	public DocenteMateria $docente_materia1;
	public array $docente_materias;
	
	public DocenteMateriaModel $docente_materiaModel1;
	public Collection $docente_materiaModels;
	
	//public Pagination $pagination1;
	//public DocenteMateriaReturnView $docente_materiaReturnView;
	
	/*FKs*/
	//public DocenteMateriaFKReturnView $docente_materiaFKReturnView;
	
	

	public array $docentesFK;
	public DocenteData $docenteData1;

	public array $materiasFK;
	public MateriaData $materiaData1;
	
	function __construct() {        
		$this->docente_materia1 = new DocenteMateria();
		$this->docente_materias = array();		
		
		$this->docente_materiaModel1 = new DocenteMateriaModel();
		$this->docente_materiaModels = new Collection();		
		
		//$this->pagination1 = new Pagination();		
		//$this->docente_materiaReturnView = new DocenteMateriaReturnView();
		
		/*FKs*/
		//$this->docente_materiaFKReturnView = new DocenteMateriaFKReturnView();
		
		

		$this->docentesFK = array();
		$this->docenteData1 = new DocenteData();

		$this->materiasFK = array();
		$this->materiaData1 = new MateriaData();
    }
	
	public function getIndex(Pagination $pagination1): array {		
		
		$this->docente_materiaModels = DocenteMateriaModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		//----- FKs -----			
		foreach($this->docente_materiaModels as $docente_materiaModel) {
			
			$docente_materiaModel->docente;	
			$docente_materiaModel->materia;				
		}
		//----- FKs -----
		
		$this->docente_materias = $this->getEntitiesFromModels($this->docente_materiaModels);				
		
		return $this->docente_materias;
	}
	
	public function getTodos(Pagination $pagination1): array {
		
		$this->docente_materiaModels = DocenteMateriaModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		//----- FKs -----			
		foreach($this->docente_materiaModels as $docente_materiaModel) {
			
			$docente_materiaModel->docente;	
			$docente_materiaModel->materia;				
		}
		//----- FKs -----
		
		$this->docente_materias = $this->getEntitiesFromModels($this->docente_materiaModels);				
		
		return $this->docente_materias;
	}
	
	public function getSeleccionar(int $id): DocenteMateria {
		
		$this->docente_materiaModel1 = DocenteMateriaModel::where('id', $id)
									->first();
		
		//----- FKs -----			
		
		$this->docente_materiaModel1->docente;	
		$this->docente_materiaModel1->materia;			
		//----- FKs -----
		
		$this->docente_materia1 = $this->getEntityFromModel($this->docente_materiaModel1);					
		
		return $this->docente_materia1;
	}			
	
	public function nuevo($values): DocenteMateria {
		$this->docente_materiaModel1 = DocenteMateriaModel::create($values);						
		
		$this->docente_materia1 = $this->getEntityFromModel($this->docente_materiaModel1);
		
		return $this->docente_materia1;
	}
	
	public function actualizar(int $id,$values): bool {
		$this->docente_materiaModel1 = DocenteMateriaModel::find($id);
		
		$updated = $this->docente_materiaModel1->update($values);
				
		return $updated;
	}
	
	public function eliminar(int $id): bool {		
		$this->docente_materiaModel1 = DocenteMateriaModel::find($id);
		
		$deleted = $this->docente_materiaModel1->delete();
		
		return $deleted;
	}
	
	public function getEntitiesFromModels(Collection $arr_docente_materias) : array {
		$docente_materias = [];
		
		foreach($arr_docente_materias as $arr_docente_materia1) {
			$this->docente_materia1 = $this->getEntityFromModel($arr_docente_materia1);
			array_push($docente_materias,$this->docente_materia1);
		}
		
		return $docente_materias;
	}
	
	public function getEntityFromModel(DocenteMateriaModel $arr_docente_materia1) : DocenteMateria {
		
		$docente_materia1 = new DocenteMateria();
		
		$docente_materia1->id = $arr_docente_materia1->id;
		$docente_materia1->created_at = $arr_docente_materia1->created_at;
		$docente_materia1->updated_at = $arr_docente_materia1->updated_at;
		
		$docente_materia1->id_docente= $arr_docente_materia1->id_docente;
		$docente_materia1->id_materia= $arr_docente_materia1->id_materia;
	
		return $docente_materia1;
	}
	
	public function setModelFromEntity(DocenteMateria $docente_materia1) : array {
		
		$data_docente_materia = [		
			'created_at' => $docente_materia1->created_at,			
			'updated_at' => $docente_materia1->updated_at,			
			'id_docente' => $docente_materia1->id_docente,			
			'id_materia' => $docente_materia1->id_materia,			
        ];
		
		return $data_docente_materia;
	}
	
	public function nuevos($news_docente_materias): void {
		DocenteMateriaModel::insert($news_docente_materias);				
	}		
	
	public function actualizars($updates_docente_materias,$updates_columnas): void {
		DocenteMateriaModel::upsert($updates_docente_materias,['id'],$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_docente_materias): void {
		DocenteMateriaModel::destroy($ids_deletes_docente_materias);		
	}
	
	public function guardarCambios($news_docente_materias,$ids_deletes_docente_materias,$updates_docente_materias,$updates_columnas): void {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/
		/*--- Updates ---*/		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		DocenteMateriaModel::insert($news_docente_materias);
		/*--- Deletes ---*/		
		DocenteMateriaModel::destroy($ids_deletes_docente_materias);
		/*--- Updates ---*/
		DocenteMateriaModel::upsert($updates_docente_materias,['id'],$updates_columnas);		
	}
	
	/*FKs*/
	
	public function getFks(): void {
		
		$this->docentesFK = $this->docenteData1->getEntitiesFromModels(DocenteModel::get());
		$this->materiasFK = $this->materiaData1->getEntitiesFromModels(MateriaModel::get());
	}
	
}
