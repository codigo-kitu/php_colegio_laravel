<?php declare(strict_types = 1);

namespace App\Lib\Estructura\Docente\Infrastructure\Data;

use Illuminate\Database\Eloquent\Collection;

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Estructura\Docente\Domain\Model\DocenteModel;
use App\Lib\Estructura\Docente\Domain\Entity\Docente;


//use App\Lib\Entities\Estructura\DocenteReturnView;


class DocenteData implements DocenteDataI {
		
	public Docente $docente1;
	public array $docentes;
	
	public DocenteModel $docenteModel1;
	public Collection $docenteModels;
	
	//public Pagination $pagination1;
	//public DocenteReturnView $docenteReturnView;
	
	
	function __construct() {        
		$this->docente1 = new Docente();
		$this->docentes = array();		
		
		$this->docenteModel1 = new DocenteModel();
		$this->docenteModels = new Collection();		
		
		//$this->pagination1 = new Pagination();		
		//$this->docenteReturnView = new DocenteReturnView();
		
    }
	
	public function getIndex(Pagination $pagination1): array {		
		
		$this->docenteModels = DocenteModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		
		$this->docentes = $this->getEntitiesFromModels($this->docenteModels);				
		
		return $this->docentes;
	}
	
	public function getTodos(Pagination $pagination1): array {
		
		$this->docenteModels = DocenteModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		
		$this->docentes = $this->getEntitiesFromModels($this->docenteModels);				
		
		return $this->docentes;
	}
	
	public function getSeleccionar(int $id): Docente {
		
		$this->docenteModel1 = DocenteModel::where('id', $id)
									->first();
		
		
		$this->docente1 = $this->getEntityFromModel($this->docenteModel1);					
		
		return $this->docente1;
	}			
	
	public function nuevo($values): Docente {
		$this->docenteModel1 = DocenteModel::create($values);						
		
		$this->docente1 = $this->getEntityFromModel($this->docenteModel1);
		
		return $this->docente1;
	}
	
	public function actualizar(int $id,$values): bool {
		$this->docenteModel1 = DocenteModel::find($id);
		
		$updated = $this->docenteModel1->update($values);
				
		return $updated;
	}
	
	public function eliminar(int $id): bool {		
		$this->docenteModel1 = DocenteModel::find($id);
		
		$deleted = $this->docenteModel1->delete();
		
		return $deleted;
	}
	
	public function getEntitiesFromModels(Collection $arr_docentes) : array {
		$docentes = [];
		
		foreach($arr_docentes as $arr_docente1) {
			$this->docente1 = $this->getEntityFromModel($arr_docente1);
			array_push($docentes,$this->docente1);
		}
		
		return $docentes;
	}
	
	public function getEntityFromModel(DocenteModel $arr_docente1) : Docente {
		
		$docente1 = new Docente();
		
		$docente1->id = $arr_docente1->id;
		$docente1->created_at = $arr_docente1->created_at;
		$docente1->updated_at = $arr_docente1->updated_at;
		
		$docente1->nombre= $arr_docente1->nombre;
		$docente1->apellido= $arr_docente1->apellido;
		$docente1->fecha_nacimiento= $arr_docente1->fecha_nacimiento;
		$docente1->anios_experiencia= $arr_docente1->anios_experiencia;
		$docente1->nota_evaluacion= $arr_docente1->nota_evaluacion;
	
		return $docente1;
	}
	
	public function setModelFromEntity(Docente $docente1) : array {
		
		$data_docente = [		
			'created_at' => $docente1->created_at,			
			'updated_at' => $docente1->updated_at,			
			'nombre' => $docente1->nombre,			
			'apellido' => $docente1->apellido,			
			'fecha_nacimiento' => $docente1->fecha_nacimiento,			
			'anios_experiencia' => $docente1->anios_experiencia,			
			'nota_evaluacion' => $docente1->nota_evaluacion,			
        ];
		
		return $data_docente;
	}
	
	public function nuevos($news_docentes): void {
		DocenteModel::insert($news_docentes);				
	}		
	
	public function actualizars($updates_docentes,$updates_columnas): void {
		DocenteModel::upsert($updates_docentes,['id'],$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_docentes): void {
		DocenteModel::destroy($ids_deletes_docentes);		
	}
	
	public function guardarCambios($news_docentes,$ids_deletes_docentes,$updates_docentes,$updates_columnas): void {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/
		/*--- Updates ---*/		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		DocenteModel::insert($news_docentes);
		/*--- Deletes ---*/		
		DocenteModel::destroy($ids_deletes_docentes);
		/*--- Updates ---*/
		DocenteModel::upsert($updates_docentes,['id'],$updates_columnas);		
	}
	
	
	/*----- RELACIONES -----*/
	
	public function getTodosRelaciones(Pagination $pagination1): array {
		
		$this->docenteModels = DocenteModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
							
		foreach($this->docentes as $docente) {
			/*----- Relaciones -----*/
						$docente->sueldos;
			$docente->contrato;
			$docente->materias;
			$docente->notas;
			$docente->docente_materias;

		}	
		
		return $this->docentes;
	}
	
	public function getSeleccionarRelaciones(int $id): Docente {
		
		$this->docenteModel1 = DocenteModel::where('id', $id)
									->first();
		
		$this->docente1 = $this->getEntityFromModel($this->docenteModel1);
		
		
		/*----- Relaciones -----*/
				$this->docente1->sueldos;
		$this->docente1->contrato;
		$this->docente1->materias;
		$this->docente1->notas;
		$this->docente1->docente_materias;
		
		
		return $this->docente1;
	}
}
