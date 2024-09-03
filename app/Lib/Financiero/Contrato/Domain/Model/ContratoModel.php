<?php
namespace App\Lib\Financiero\Contrato\Domain\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
//use Illuminate\Database\Factories\HasFactory;

/*FKs*/
use App\Lib\Estructura\Docente\Domain\Model\DocenteModel;


/*RELACIONES*/



class ContratoModel extends Model {
	
	//use HasFactory;
	
	protected $table = 'contrato';
	
	public $timestamps = true;
	
	//Asignacion
	protected $fillable = [
	
		'created_at',
		'anio',
		'valor',
		'fecha',
		'firmado',	
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
		return $this->belongsTo(DocenteModel::class,'id','id');
	}

	
	//RELACIONES
	
}