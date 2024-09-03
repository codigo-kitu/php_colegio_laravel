<?php
namespace App\Lib\Estructura\Alumno\Domain\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
//use Illuminate\Database\Factories\HasFactory;

/*FKs*/


/*RELACIONES*/
use App\Lib\Proceso\Matricula\Domain\Model\MatriculaModel;
use App\Lib\Estructura\AlumnoMateria\Domain\Model\AlumnoMateriaModel;
use App\Lib\Estructura\Materia\Domain\Model\MateriaModel;
use App\Lib\Financiero\Pension\Domain\Model\PensionModel;
use App\Lib\Proceso\Nota\Domain\Model\NotaModel;



class AlumnoModel extends Model {
	
	//use HasFactory;
	
	protected $table = 'alumno';
	
	public $timestamps = true;
	
	//Asignacion
	protected $fillable = [
	
		'created_at',
		'nombre',
		'apellido',
		'fecha_nacimiento',	
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
	
	public function matricula() {
		return $this->hasOne(MatriculaModel::class,'id');
	}

	public function alumno_materias() {
		return $this->hasMany(AlumnoMateriaModel::class,'id_alumno');
	}

	public function materias() {
		return $this->belongsToMany(MateriaModel::class,'alumno_materia','id_alumno','id_materia');
	}

	public function pensions() {
		return $this->hasMany(PensionModel::class,'id_alumno');
	}

	public function notas() {
		return $this->hasMany(NotaModel::class,'id_alumno');
	}

}