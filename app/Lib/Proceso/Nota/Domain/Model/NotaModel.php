<?php
namespace App\Lib\Proceso\Nota\Domain\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
//use Illuminate\Database\Factories\HasFactory;

/*FKs*/
use App\Lib\Estructura\Alumno\Domain\Model\AlumnoModel;
use App\Lib\Estructura\Materia\Domain\Model\MateriaModel;
use App\Lib\Estructura\Docente\Domain\Model\DocenteModel;


/*RELACIONES*/



class NotaModel extends Model {
	
	//use HasFactory;
	
	protected $table = 'nota';
	
	public $timestamps = true;
	
	//Asignacion
	protected $fillable = [
	
		'created_at',
		'id_alumno',
		'id_materia',
		'id_docente',
		'nota_prueba',
		'nota_trabajo',
		'nota_examen',
		'nota_final',	
	];

	//no regresa json
	protected $hidden = [
		
	];
	
	/* created_at Format */
	public function getCreatedAtAttribute($date) {
    	return Carbon::parse($date)->format('Y-m-d h:m:s');
	}

	/* updated_at Format */
	public function getUpdatedAtAttribute($date) {
    	return Carbon::parse($date)->format('Y-m-d h:m:s');
	}
	
	//FKs
	
	public function alumno() {
		return $this->belongsTo(AlumnoModel::class,'id_alumno','id');
	}

	public function materia() {
		return $this->belongsTo(MateriaModel::class,'id_materia','id');
	}

	public function docente() {
		return $this->belongsTo(DocenteModel::class,'id_docente','id');
	}

	
	//RELACIONES
	
}