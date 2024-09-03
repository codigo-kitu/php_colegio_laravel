<?php
namespace App\Lib\Financiero\Pension\Domain\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
//use Illuminate\Database\Factories\HasFactory;

/*FKs*/
use App\Lib\Estructura\Alumno\Domain\Model\AlumnoModel;


/*RELACIONES*/



class PensionModel extends Model {
	
	//use HasFactory;
	
	protected $table = 'pension';
	
	public $timestamps = true;
	
	//Asignacion
	protected $fillable = [
	
		'created_at',
		'id_alumno',
		'anio',
		'mes',
		'valor',
		'cobrado',	
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

	
	//RELACIONES
	
}