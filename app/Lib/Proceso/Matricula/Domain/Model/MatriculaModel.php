<?php
namespace App\Lib\Proceso\Matricula\Domain\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
//use Illuminate\Database\Factories\HasFactory;

/*FKs*/
use App\Lib\Estructura\Alumno\Domain\Model\AlumnoModel;


/*RELACIONES*/



class MatriculaModel extends Model {
	
	//use HasFactory;
	
	protected $table = 'matricula';
	
	public $timestamps = true;
	
	//Asignacion
	protected $fillable = [
	
		'created_at',
		'anio',
		'costo',
		'fecha',
		'pagado',	
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
		return $this->belongsTo(AlumnoModel::class,'id','id');
	}

	
	//RELACIONES
	
}