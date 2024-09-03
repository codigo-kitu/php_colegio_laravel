<?php declare(strict_types = 1);

namespace App\Lib\Proceso\Nota\Infrastructure\Data;

use Illuminate\Database\Eloquent\Collection;

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Proceso\Nota\Domain\Model\NotaModel;
use App\Lib\Proceso\Nota\Domain\Entity\Nota;

/*FKs*/
use App\Lib\Estructura\Alumno\Domain\Model\AlumnoModel;
use App\Lib\Estructura\Alumno\Infrastructure\Data\AlumnoData;
use App\Lib\Estructura\Materia\Domain\Model\MateriaModel;
use App\Lib\Estructura\Materia\Infrastructure\Data\MateriaData;
use App\Lib\Estructura\Docente\Domain\Model\DocenteModel;
use App\Lib\Estructura\Docente\Infrastructure\Data\DocenteData;
		

//use App\Lib\Entities\Proceso\NotaReturnView;

/*FKs*/
//use App\Lib\Entities\Proceso\NotaFKReturnView;	

class NotaData implements NotaDataI {
		
	public Nota $nota1;
	public array $notas;
	
	public NotaModel $notaModel1;
	public Collection $notaModels;
	
	//public Pagination $pagination1;
	//public NotaReturnView $notaReturnView;
	
	/*FKs*/
	//public NotaFKReturnView $notaFKReturnView;
	
	

	public array $alumnosFK;
	public AlumnoData $alumnoData1;

	public array $materiasFK;
	public MateriaData $materiaData1;

	public array $docentesFK;
	public DocenteData $docenteData1;
	
	function __construct() {        
		$this->nota1 = new Nota();
		$this->notas = array();		
		
		$this->notaModel1 = new NotaModel();
		$this->notaModels = new Collection();		
		
		//$this->pagination1 = new Pagination();		
		//$this->notaReturnView = new NotaReturnView();
		
		/*FKs*/
		//$this->notaFKReturnView = new NotaFKReturnView();
		
		

		$this->alumnosFK = array();
		$this->alumnoData1 = new AlumnoData();

		$this->materiasFK = array();
		$this->materiaData1 = new MateriaData();

		$this->docentesFK = array();
		$this->docenteData1 = new DocenteData();
    }
	
	public function getIndex(Pagination $pagination1): array {		
		
		$this->notaModels = NotaModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		//----- FKs -----			
		foreach($this->notaModels as $notaModel) {
			
			$notaModel->alumno;	
			$notaModel->materia;	
			$notaModel->docente;				
		}
		//----- FKs -----
		
		$this->notas = $this->getEntitiesFromModels($this->notaModels);				
		
		return $this->notas;
	}
	
	public function getTodos(Pagination $pagination1): array {
		
		$this->notaModels = NotaModel::skip($pagination1->skip)
			 						->take($pagination1->limit)
			 						->get();
		
		//----- FKs -----			
		foreach($this->notaModels as $notaModel) {
			
			$notaModel->alumno;	
			$notaModel->materia;	
			$notaModel->docente;				
		}
		//----- FKs -----
		
		$this->notas = $this->getEntitiesFromModels($this->notaModels);				
		
		return $this->notas;
	}
	
	public function getSeleccionar(int $id): Nota {
		
		$this->notaModel1 = NotaModel::where('id', $id)
									->first();
		
		//----- FKs -----			
		
		$this->notaModel1->alumno;	
		$this->notaModel1->materia;	
		$this->notaModel1->docente;			
		//----- FKs -----
		
		$this->nota1 = $this->getEntityFromModel($this->notaModel1);					
		
		return $this->nota1;
	}			
	
	public function nuevo($values): Nota {
		$this->notaModel1 = NotaModel::create($values);						
		
		$this->nota1 = $this->getEntityFromModel($this->notaModel1);
		
		return $this->nota1;
	}
	
	public function actualizar(int $id,$values): bool {
		$this->notaModel1 = NotaModel::find($id);
		
		$updated = $this->notaModel1->update($values);
				
		return $updated;
	}
	
	public function eliminar(int $id): bool {		
		$this->notaModel1 = NotaModel::find($id);
		
		$deleted = $this->notaModel1->delete();
		
		return $deleted;
	}
	
	public function getEntitiesFromModels(Collection $arr_notas) : array {
		$notas = [];
		
		foreach($arr_notas as $arr_nota1) {
			$this->nota1 = $this->getEntityFromModel($arr_nota1);
			array_push($notas,$this->nota1);
		}
		
		return $notas;
	}
	
	public function getEntityFromModel(NotaModel $arr_nota1) : Nota {
		
		$nota1 = new Nota();
		
		$nota1->id = $arr_nota1->id;
		$nota1->created_at = $arr_nota1->created_at;
		$nota1->updated_at = $arr_nota1->updated_at;
		
		$nota1->id_alumno= $arr_nota1->id_alumno;
		$nota1->id_materia= $arr_nota1->id_materia;
		$nota1->id_docente= $arr_nota1->id_docente;
		$nota1->nota_prueba= $arr_nota1->nota_prueba;
		$nota1->nota_trabajo= $arr_nota1->nota_trabajo;
		$nota1->nota_examen= $arr_nota1->nota_examen;
		$nota1->nota_final= $arr_nota1->nota_final;
	
		return $nota1;
	}
	
	public function setModelFromEntity(Nota $nota1) : array {
		
		$data_nota = [		
			'created_at' => $nota1->created_at,			
			'updated_at' => $nota1->updated_at,			
			'id_alumno' => $nota1->id_alumno,			
			'id_materia' => $nota1->id_materia,			
			'id_docente' => $nota1->id_docente,			
			'nota_prueba' => $nota1->nota_prueba,			
			'nota_trabajo' => $nota1->nota_trabajo,			
			'nota_examen' => $nota1->nota_examen,			
			'nota_final' => $nota1->nota_final,			
        ];
		
		return $data_nota;
	}
	
	public function nuevos($news_notas): void {
		NotaModel::insert($news_notas);				
	}		
	
	public function actualizars($updates_notas,$updates_columnas): void {
		NotaModel::upsert($updates_notas,['id'],$updates_columnas);		
	}
	
	public function eliminars($ids_deletes_notas): void {
		NotaModel::destroy($ids_deletes_notas);		
	}
	
	public function guardarCambios($news_notas,$ids_deletes_notas,$updates_notas,$updates_columnas): void {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/
		/*--- Updates ---*/		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		NotaModel::insert($news_notas);
		/*--- Deletes ---*/		
		NotaModel::destroy($ids_deletes_notas);
		/*--- Updates ---*/
		NotaModel::upsert($updates_notas,['id'],$updates_columnas);		
	}
	
	/*FKs*/
	
	public function getFks(): void {
		
		$this->alumnosFK = $this->alumnoData1->getEntitiesFromModels(AlumnoModel::get());
		$this->materiasFK = $this->materiaData1->getEntitiesFromModels(MateriaModel::get());
		$this->docentesFK = $this->docenteData1->getEntitiesFromModels(DocenteModel::get());
	}
	
}
