<?php
namespace App\Lib\Estructura\DocenteMateria\Domain\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
//use Illuminate\Database\Factories\HasFactory;

/*FKs*/
use App\Lib\Estructura\Docente\Domain\Model\DocenteModel;
use App\Lib\Estructura\Materia\Domain\Model\MateriaModel;


/*RELACIONES*/



class DocenteMateriaModel extends Model {
	
	//use HasFactory;
	
	protected $table = 'docente_materia';
	
	public $timestamps = true;
	
	//Asignacion
	protected $fillable = [
	
		'created_at',
		'id_docente',
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
	
	public function docente() {
		return $this->belongsTo(DocenteModel::class,'id_docente','id');
	}

	public function materia() {
		return $this->belongsTo(MateriaModel::class,'id_materia','id');
	}

	
	//RELACIONES
	
}