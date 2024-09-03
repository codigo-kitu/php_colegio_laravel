<?php declare(strict_types = 1);

namespace App\Lib\Financiero\Sueldo\Infrastructure\Data;

use Illuminate\Database\Eloquent\Collection;

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Financiero\Sueldo\Domain\Model\SueldoModel;
use App\Lib\Financiero\Sueldo\Domain\Entity\Sueldo;

/*FKs*/
use App\Lib\Estructura\Docente\Domain\Model\DocenteModel;
use App\Lib\Estructura\Docente\Infrastructure\Data\DocenteData;
		

//use App\Lib\Entities\Financiero\SueldoReturnView;

/*FKs*/
//use App\Lib\Entities\Financiero\SueldoFKReturnView;	

class SueldoData implements SueldoDataI {
		
	public Sueldo $sueldo1;
	public array $sueldos;
	
	public SueldoModel $sueldoModel1;
	public Collection $sueldoModels;
	
	//public Pagination $pagination1;
	//public SueldoReturnView $sueldoReturnView;
	
	/*FKs*/
	//public SueldoFKReturnView $sueldoFKReturnView;
	
	

	public array $docentesFK;
	public DocenteData $docenteData1;
	
	function __construct() {        
		$this->sueldo1 = new Sueldo();
		$this->sueldos = array();		
		
		$this->sueldoModel1 = new SueldoModel();
		$this->sueldoModels = new Collection();		
		
		//$this->pagination1 = new Pagination();		
		//$this->sueldoReturnView = new SueldoReturnView();
		
		/*FKs*/
		//$this->sueldoFKReturnView = new SueldoFKReturnView();
		
		

		$this->docentesFK = array();
		$this->docenteData1 = new DocenteData();
    }
	
	public function getIndex(Pagination $pagination1): array {		
		
		$this->sueldoModels = SueldoModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		//----- FKs -----			
		foreach($this->sueldoModels as $sueldoModel) {
			
			$sueldoModel->docente;				
		}
		//----- FKs -----
		
		$this->sueldos = $this->getEntitiesFromModels($this->sueldoModels);				
		
		return $this->sueldos;
	}
	
	public function getTodos(Pagination $pagination1): array {
		
		$this->sueldoModels = SueldoModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		//----- FKs -----			
		foreach($this->sueldoModels as $sueldoModel) {
			
			$sueldoModel->docente;				
		}
		//----- FKs -----
		
		$this->sueldos = $this->getEntitiesFromModels($this->sueldoModels);				
		
		return $this->sueldos;
	}
	
	public function getSeleccionar(int $id): Sueldo {
		
		$this->sueldoModel1 = SueldoModel::where('id', $id)
									->first();
		
		//----- FKs -----			
		
		$this->sueldoModel1->docente;			
		//----- FKs -----
		
		$this->sueldo1 = $this->getEntityFromModel($this->sueldoModel1);					
		
		return $this->sueldo1;
	}			
	
	public function nuevo($values): Sueldo {
		$this->sueldoModel1 = SueldoModel::create($values);						
		
		$this->sueldo1 = $this->getEntityFromModel($this->sueldoModel1);
		
		return $this->sueldo1;
	}
	
	public function actualizar(int $id,$values): bool {
		$this->sueldoModel1 = SueldoModel::find($id);
		
		$updated = $this->sueldoModel1->update($values);
				
		return $updated;
	}
	
	public function eliminar(int $id): bool {		
		$this->sueldoModel1 = SueldoModel::find($id);
		
		$deleted = $this->sueldoModel1->delete();
		
		return $deleted;
	}
	
	public function getEntitiesFromModels(Collection $arr_sueldos) : array {
		$sueldos = [];
		
		foreach($arr_sueldos as $arr_sueldo1) {
			$this->sueldo1 = $this->getEntityFromModel($arr_sueldo1);
			array_push($sueldos,$this->sueldo1);
		}
		
		return $sueldos;
	}
	
	public function getEntityFromModel(SueldoModel $arr_sueldo1) : Sueldo {
		
		$sueldo1 = new Sueldo();
		
		$sueldo1->id = $arr_sueldo1->id;
		$sueldo1->created_at = $arr_sueldo1->created_at;
		$sueldo1->updated_at = $arr_sueldo1->updated_at;
		
		$sueldo1->id_docente= $arr_sueldo1->id_docente;
		$sueldo1->anio= $arr_sueldo1->anio;
		$sueldo1->mes= $arr_sueldo1->mes;
		$sueldo1->valor= $arr_sueldo1->valor;
		$sueldo1->cobrado= $arr_sueldo1->cobrado;
	
		return $sueldo1;
	}
	
	public function setModelFromEntity(Sueldo $sueldo1) : array {
		
		$data_sueldo = [		
			'created_at' => $sueldo1->created_at,			
			'updated_at' => $sueldo1->updated_at,			
			'id_docente' => $sueldo1->id_docente,			
			'anio' => $sueldo1->anio,			
			'mes' => $sueldo1->mes,			
			'valor' => $sueldo1->valor,			
			'cobrado' => $sueldo1->cobrado,			
        ];
		
		return $data_sueldo;
	}
	
	public function nuevos($news_sueldos): void {
		SueldoModel::insert($news_sueldos);				
	}		
	
	public function actualizars($updates_sueldos,$updates_columnas): void {
		SueldoModel::upsert($updates_sueldos,['id'],$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_sueldos): void {
		SueldoModel::destroy($ids_deletes_sueldos);		
	}
	
	public function guardarCambios($news_sueldos,$ids_deletes_sueldos,$updates_sueldos,$updates_columnas): void {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/
		/*--- Updates ---*/		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		SueldoModel::insert($news_sueldos);
		/*--- Deletes ---*/		
		SueldoModel::destroy($ids_deletes_sueldos);
		/*--- Updates ---*/
		SueldoModel::upsert($updates_sueldos,['id'],$updates_columnas);		
	}
	
	/*FKs*/
	
	public function getFks(): void {
		
		$this->docentesFK = $this->docenteData1->getEntitiesFromModels(DocenteModel::get());
	}
	
}
