<?php
namespace App\Lib\Estructura\AlumnoMateria\Domain\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
//use Illuminate\Database\Factories\HasFactory;

/*FKs*/
use App\Lib\Estructura\Alumno\Domain\Model\AlumnoModel;
use App\Lib\Estructura\Materia\Domain\Model\MateriaModel;


/*RELACIONES*/



class AlumnoMateriaModel extends Model {
	
	//use HasFactory;
	
	protected $table = 'alumno_materia';
	
	public $timestamps = true;
	
	//Asignacion
	protected $fillable = [
	
		'created_at',
		'id_alumno',
		'id_materia',	
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

	
	//RELACIONES
	
}