<?php
namespace App\Lib\Financiero\Sueldo\Domain\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
//use Illuminate\Database\Factories\HasFactory;

/*FKs*/
use App\Lib\Estructura\Docente\Domain\Model\DocenteModel;


/*RELACIONES*/



class SueldoModel extends Model {
	
	//use HasFactory;
	
	protected $table = 'sueldo';
	
	public $timestamps = true;
	
	//Asignacion
	protected $fillable = [
	
		'created_at',
		'id_docente',
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
	
	public function docente() {
		return $this->belongsTo(DocenteModel::class,'id_docente','id');
	}

	
	//RELACIONES
	
}