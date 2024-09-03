<?php declare(strict_types = 1);

namespace App\Lib\Proceso\Matricula\Infrastructure\Data;

use Illuminate\Database\Eloquent\Collection;

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Proceso\Matricula\Domain\Model\MatriculaModel;
use App\Lib\Proceso\Matricula\Domain\Entity\Matricula;

/*FKs*/
use App\Lib\Estructura\Alumno\Domain\Model\AlumnoModel;
use App\Lib\Estructura\Alumno\Infrastructure\Data\AlumnoData;
		

//use App\Lib\Entities\Proceso\MatriculaReturnView;

/*FKs*/
//use App\Lib\Entities\Proceso\MatriculaFKReturnView;	

class MatriculaData implements MatriculaDataI {
		
	public Matricula $matricula1;
	public array $matriculas;
	
	public MatriculaModel $matriculaModel1;
	public Collection $matriculaModels;
	
	//public Pagination $pagination1;
	//public MatriculaReturnView $matriculaReturnView;
	
	/*FKs*/
	//public MatriculaFKReturnView $matriculaFKReturnView;
	
	

	public array $alumnosFK;
	public AlumnoData $alumnoData1;
	
	function __construct() {        
		$this->matricula1 = new Matricula();
		$this->matriculas = array();		
		
		$this->matriculaModel1 = new MatriculaModel();
		$this->matriculaModels = new Collection();		
		
		//$this->pagination1 = new Pagination();		
		//$this->matriculaReturnView = new MatriculaReturnView();
		
		/*FKs*/
		//$this->matriculaFKReturnView = new MatriculaFKReturnView();
		
		

		$this->alumnosFK = array();
		$this->alumnoData1 = new AlumnoData();
    }
	
	public function getIndex(Pagination $pagination1): array {		
		
		$this->matriculaModels = MatriculaModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		//----- FKs -----			
		foreach($this->matriculaModels as $matriculaModel) {
			
			$matriculaModel->alumno;				
		}
		//----- FKs -----
		
		$this->matriculas = $this->getEntitiesFromModels($this->matriculaModels);				
		
		return $this->matriculas;
	}
	
	public function getTodos(Pagination $pagination1): array {
		
		$this->matriculaModels = MatriculaModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		//----- FKs -----			
		foreach($this->matriculaModels as $matriculaModel) {
			
			$matriculaModel->alumno;				
		}
		//----- FKs -----
		
		$this->matriculas = $this->getEntitiesFromModels($this->matriculaModels);				
		
		return $this->matriculas;
	}
	
	public function getSeleccionar(int $id): Matricula {
		
		$this->matriculaModel1 = MatriculaModel::where('id', $id)
									->first();
		
		//----- FKs -----			
		
		$this->matriculaModel1->alumno;			
		//----- FKs -----
		
		$this->matricula1 = $this->getEntityFromModel($this->matriculaModel1);					
		
		return $this->matricula1;
	}			
	
	public function nuevo($values): Matricula {
		$this->matriculaModel1 = MatriculaModel::create($values);						
		
		$this->matricula1 = $this->getEntityFromModel($this->matriculaModel1);
		
		return $this->matricula1;
	}
	
	public function actualizar(int $id,$values): bool {
		$this->matriculaModel1 = MatriculaModel::find($id);
		
		$updated = $this->matriculaModel1->update($values);
				
		return $updated;
	}
	
	public function eliminar(int $id): bool {		
		$this->matriculaModel1 = MatriculaModel::find($id);
		
		$deleted = $this->matriculaModel1->delete();
		
		return $deleted;
	}
	
	public function getEntitiesFromModels(Collection $arr_matriculas) : array {
		$matriculas = [];
		
		foreach($arr_matriculas as $arr_matricula1) {
			$this->matricula1 = $this->getEntityFromModel($arr_matricula1);
			array_push($matriculas,$this->matricula1);
		}
		
		return $matriculas;
	}
	
	public function getEntityFromModel(MatriculaModel $arr_matricula1) : Matricula {
		
		$matricula1 = new Matricula();
		
		$matricula1->id = $arr_matricula1->id;
		$matricula1->created_at = $arr_matricula1->created_at;
		$matricula1->updated_at = $arr_matricula1->updated_at;
		
		$matricula1->anio= $arr_matricula1->anio;
		$matricula1->costo= $arr_matricula1->costo;
		$matricula1->fecha= $arr_matricula1->fecha;
		$matricula1->pagado= $arr_matricula1->pagado;
	
		return $matricula1;
	}
	
	public function setModelFromEntity(Matricula $matricula1) : array {
		
		$data_matricula = [		
			'created_at' => $matricula1->created_at,			
			'updated_at' => $matricula1->updated_at,			
			'anio' => $matricula1->anio,			
			'costo' => $matricula1->costo,			
			'fecha' => $matricula1->fecha,			
			'pagado' => $matricula1->pagado,			
        ];
		
		return $data_matricula;
	}
	
	public function nuevos($news_matriculas): void {
		MatriculaModel::insert($news_matriculas);				
	}		
	
	public function actualizars($updates_matriculas,$updates_columnas): void {
		MatriculaModel::upsert($updates_matriculas,['id'],$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_matriculas): void {
		MatriculaModel::destroy($ids_deletes_matriculas);		
	}
	
	public function guardarCambios($news_matriculas,$ids_deletes_matriculas,$updates_matriculas,$updates_columnas): void {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/
		/*--- Updates ---*/		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		MatriculaModel::insert($news_matriculas);
		/*--- Deletes ---*/		
		MatriculaModel::destroy($ids_deletes_matriculas);
		/*--- Updates ---*/
		MatriculaModel::upsert($updates_matriculas,['id'],$updates_columnas);		
	}
	
	/*FKs*/
	
	public function getFks(): void {
		
		$this->alumnosFK = $this->alumnoData1->getEntitiesFromModels(AlumnoModel::get());
	}
	
}
