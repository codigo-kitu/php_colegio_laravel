<?php
namespace App\Lib\Estructura\Materia\Domain\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
//use Illuminate\Database\Factories\HasFactory;

/*FKs*/


/*RELACIONES*/
use App\Lib\Estructura\Alumno\Domain\Model\AlumnoModel;
use App\Lib\Estructura\AlumnoMateria\Domain\Model\AlumnoMateriaModel;
use App\Lib\Estructura\Docente\Domain\Model\DocenteModel;
use App\Lib\Proceso\Nota\Domain\Model\NotaModel;
use App\Lib\Estructura\DocenteMateria\Domain\Model\DocenteMateriaModel;



class MateriaModel extends Model {
	
	//use HasFactory;
	
	protected $table = 'materia';
	
	public $timestamps = true;
	
	//Asignacion
	protected $fillable = [
	
		'created_at',
		'codigo',
		'nombre',
		'activo',	
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
	
	
	//RELACIONES
	
	public function alumnos() {
		return $this->belongsToMany(AlumnoModel::class,'alumno_materia','id_materia','id_alumno');
	}

	public function alumno_materias() {
		return $this->hasMany(AlumnoMateriaModel::class,'id_materia');
	}

	public function docentes() {
		return $this->belongsToMany(DocenteModel::class,'docente_materia','id_materia','id_docente');
	}

	public function notas() {
		return $this->hasMany(NotaModel::class,'id_materia');
	}

	public function docente_materias() {
		return $this->hasMany(DocenteMateriaModel::class,'id_materia');
	}

}