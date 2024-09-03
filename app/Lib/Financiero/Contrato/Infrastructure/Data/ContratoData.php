<?php declare(strict_types = 1);

namespace App\Lib\Financiero\Contrato\Infrastructure\Data;

use Illuminate\Database\Eloquent\Collection;

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Financiero\Contrato\Domain\Model\ContratoModel;
use App\Lib\Financiero\Contrato\Domain\Entity\Contrato;

/*FKs*/
use App\Lib\Estructura\Docente\Domain\Model\DocenteModel;
use App\Lib\Estructura\Docente\Infrastructure\Data\DocenteData;
		

//use App\Lib\Entities\Financiero\ContratoReturnView;

/*FKs*/
//use App\Lib\Entities\Financiero\ContratoFKReturnView;	

class ContratoData implements ContratoDataI {
		
	public Contrato $contrato1;
	public array $contratos;
	
	public ContratoModel $contratoModel1;
	public Collection $contratoModels;
	
	//public Pagination $pagination1;
	//public ContratoReturnView $contratoReturnView;
	
	/*FKs*/
	//public ContratoFKReturnView $contratoFKReturnView;
	
	

	public array $docentesFK;
	public DocenteData $docenteData1;
	
	function __construct() {        
		$this->contrato1 = new Contrato();
		$this->contratos = array();		
		
		$this->contratoModel1 = new ContratoModel();
		$this->contratoModels = new Collection();		
		
		//$this->pagination1 = new Pagination();		
		//$this->contratoReturnView = new ContratoReturnView();
		
		/*FKs*/
		//$this->contratoFKReturnView = new ContratoFKReturnView();
		
		

		$this->docentesFK = array();
		$this->docenteData1 = new DocenteData();
    }
	
	public function getIndex(Pagination $pagination1): array {		
		
		$this->contratoModels = ContratoModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		//----- FKs -----			
		foreach($this->contratoModels as $contratoModel) {
			
			$contratoModel->docente;				
		}
		//----- FKs -----
		
		$this->contratos = $this->getEntitiesFromModels($this->contratoModels);				
		
		return $this->contratos;
	}
	
	public function getTodos(Pagination $pagination1): array {
		
		$this->contratoModels = ContratoModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		//----- FKs -----			
		foreach($this->contratoModels as $contratoModel) {
			
			$contratoModel->docente;				
		}
		//----- FKs -----
		
		$this->contratos = $this->getEntitiesFromModels($this->contratoModels);				
		
		return $this->contratos;
	}
	
	public function getSeleccionar(int $id): Contrato {
		
		$this->contratoModel1 = ContratoModel::where('id', $id)
									->first();
		
		//----- FKs -----			
		
		$this->contratoModel1->docente;			
		//----- FKs -----
		
		$this->contrato1 = $this->getEntityFromModel($this->contratoModel1);					
		
		return $this->contrato1;
	}			
	
	public function nuevo($values): Contrato {
		$this->contratoModel1 = ContratoModel::create($values);						
		
		$this->contrato1 = $this->getEntityFromModel($this->contratoModel1);
		
		return $this->contrato1;
	}
	
	public function actualizar(int $id,$values): bool {
		$this->contratoModel1 = ContratoModel::find($id);
		
		$updated = $this->contratoModel1->update($values);
				
		return $updated;
	}
	
	public function eliminar(int $id): bool {		
		$this->contratoModel1 = ContratoModel::find($id);
		
		$deleted = $this->contratoModel1->delete();
		
		return $deleted;
	}
	
	public function getEntitiesFromModels(Collection $arr_contratos) : array {
		$contratos = [];
		
		foreach($arr_contratos as $arr_contrato1) {
			$this->contrato1 = $this->getEntityFromModel($arr_contrato1);
			array_push($contratos,$this->contrato1);
		}
		
		return $contratos;
	}
	
	public function getEntityFromModel(ContratoModel $arr_contrato1) : Contrato {
		
		$contrato1 = new Contrato();
		
		$contrato1->id = $arr_contrato1->id;
		$contrato1->created_at = $arr_contrato1->created_at;
		$contrato1->updated_at = $arr_contrato1->updated_at;
		
		$contrato1->anio= $arr_contrato1->anio;
		$contrato1->valor= $arr_contrato1->valor;
		$contrato1->fecha= $arr_contrato1->fecha;
		$contrato1->firmado= $arr_contrato1->firmado;
	
		return $contrato1;
	}
	
	public function setModelFromEntity(Contrato $contrato1) : array {
		
		$data_contrato = [		
			'created_at' => $contrato1->created_at,			
			'updated_at' => $contrato1->updated_at,			
			'anio' => $contrato1->anio,			
			'valor' => $contrato1->valor,			
			'fecha' => $contrato1->fecha,			
			'firmado' => $contrato1->firmado,			
        ];
		
		return $data_contrato;
	}
	
	public function nuevos($news_contratos): void {
		ContratoModel::insert($news_contratos);				
	}		
	
	public function actualizars($updates_contratos,$updates_columnas): void {
		ContratoModel::upsert($updates_contratos,['id'],$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_contratos): void {
		ContratoModel::destroy($ids_deletes_contratos);		
	}
	
	public function guardarCambios($news_contratos,$ids_deletes_contratos,$updates_contratos,$updates_columnas): void {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/
		/*--- Updates ---*/		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		ContratoModel::insert($news_contratos);
		/*--- Deletes ---*/		
		ContratoModel::destroy($ids_deletes_contratos);
		/*--- Updates ---*/
		ContratoModel::upsert($updates_contratos,['id'],$updates_columnas);		
	}
	
	/*FKs*/
	
	public function getFks(): void {
		
		$this->docentesFK = $this->docenteData1->getEntitiesFromModels(DocenteModel::get());
	}
	
}
