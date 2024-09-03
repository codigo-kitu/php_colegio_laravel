<?php declare(strict_types = 1);

namespace App\Lib\Financiero\Pension\Infrastructure\Data;

use Illuminate\Database\Eloquent\Collection;

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Financiero\Pension\Domain\Model\PensionModel;
use App\Lib\Financiero\Pension\Domain\Entity\Pension;

/*FKs*/
use App\Lib\Estructura\Alumno\Domain\Model\AlumnoModel;
use App\Lib\Estructura\Alumno\Infrastructure\Data\AlumnoData;
		

//use App\Lib\Entities\Financiero\PensionReturnView;

/*FKs*/
//use App\Lib\Entities\Financiero\PensionFKReturnView;	

class PensionData implements PensionDataI {
		
	public Pension $pension1;
	public array $pensions;
	
	public PensionModel $pensionModel1;
	public Collection $pensionModels;
	
	//public Pagination $pagination1;
	//public PensionReturnView $pensionReturnView;
	
	/*FKs*/
	//public PensionFKReturnView $pensionFKReturnView;
	
	

	public array $alumnosFK;
	public AlumnoData $alumnoData1;
	
	function __construct() {        
		$this->pension1 = new Pension();
		$this->pensions = array();		
		
		$this->pensionModel1 = new PensionModel();
		$this->pensionModels = new Collection();		
		
		//$this->pagination1 = new Pagination();		
		//$this->pensionReturnView = new PensionReturnView();
		
		/*FKs*/
		//$this->pensionFKReturnView = new PensionFKReturnView();
		
		

		$this->alumnosFK = array();
		$this->alumnoData1 = new AlumnoData();
    }
	
	public function getIndex(Pagination $pagination1): array {		
		
		$this->pensionModels = PensionModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		//----- FKs -----			
		foreach($this->pensionModels as $pensionModel) {
			
			$pensionModel->alumno;				
		}
		//----- FKs -----
		
		$this->pensions = $this->getEntitiesFromModels($this->pensionModels);				
		
		return $this->pensions;
	}
	
	public function getTodos(Pagination $pagination1): array {
		
		$this->pensionModels = PensionModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		//----- FKs -----			
		foreach($this->pensionModels as $pensionModel) {
			
			$pensionModel->alumno;				
		}
		//----- FKs -----
		
		$this->pensions = $this->getEntitiesFromModels($this->pensionModels);				
		
		return $this->pensions;
	}
	
	public function getSeleccionar(int $id): Pension {
		
		$this->pensionModel1 = PensionModel::where('id', $id)
									->first();
		
		//----- FKs -----			
		
		$this->pensionModel1->alumno;			
		//----- FKs -----
		
		$this->pension1 = $this->getEntityFromModel($this->pensionModel1);					
		
		return $this->pension1;
	}			
	
	public function nuevo($values): Pension {
		$this->pensionModel1 = PensionModel::create($values);						
		
		$this->pension1 = $this->getEntityFromModel($this->pensionModel1);
		
		return $this->pension1;
	}
	
	public function actualizar(int $id,$values): bool {
		$this->pensionModel1 = PensionModel::find($id);
		
		$updated = $this->pensionModel1->update($values);
				
		return $updated;
	}
	
	public function eliminar(int $id): bool {		
		$this->pensionModel1 = PensionModel::find($id);
		
		$deleted = $this->pensionModel1->delete();
		
		return $deleted;
	}
	
	public function getEntitiesFromModels(Collection $arr_pensions) : array {
		$pensions = [];
		
		foreach($arr_pensions as $arr_pension1) {
			$this->pension1 = $this->getEntityFromModel($arr_pension1);
			array_push($pensions,$this->pension1);
		}
		
		return $pensions;
	}
	
	public function getEntityFromModel(PensionModel $arr_pension1) : Pension {
		
		$pension1 = new Pension();
		
		$pension1->id = $arr_pension1->id;
		$pension1->created_at = $arr_pension1->created_at;
		$pension1->updated_at = $arr_pension1->updated_at;
		
		$pension1->id_alumno= $arr_pension1->id_alumno;
		$pension1->anio= $arr_pension1->anio;
		$pension1->mes= $arr_pension1->mes;
		$pension1->valor= $arr_pension1->valor;
		$pension1->cobrado= $arr_pension1->cobrado;
	
		return $pension1;
	}
	
	public function setModelFromEntity(Pension $pension1) : array {
		
		$data_pension = [		
			'created_at' => $pension1->created_at,			
			'updated_at' => $pension1->updated_at,			
			'id_alumno' => $pension1->id_alumno,			
			'anio' => $pension1->anio,			
			'mes' => $pension1->mes,			
			'valor' => $pension1->valor,			
			'cobrado' => $pension1->cobrado,			
        ];
		
		return $data_pension;
	}
	
	public function nuevos($news_pensions): void {
		PensionModel::insert($news_pensions);				
	}		
	
	public function actualizars($updates_pensions,$updates_columnas): void {
		PensionModel::upsert($updates_pensions,['id'],$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_pensions): void {
		PensionModel::destroy($ids_deletes_pensions);		
	}
	
	public function guardarCambios($news_pensions,$ids_deletes_pensions,$updates_pensions,$updates_columnas): void {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/
		/*--- Updates ---*/		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		PensionModel::insert($news_pensions);
		/*--- Deletes ---*/		
		PensionModel::destroy($ids_deletes_pensions);
		/*--- Updates ---*/
		PensionModel::upsert($updates_pensions,['id'],$updates_columnas);		
	}
	
	/*FKs*/
	
	public function getFks(): void {
		
		$this->alumnosFK = $this->alumnoData1->getEntitiesFromModels(AlumnoModel::get());
	}
	
}
