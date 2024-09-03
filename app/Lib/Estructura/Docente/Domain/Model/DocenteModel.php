<?php
namespace App\Lib\Estructura\Docente\Domain\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
//use Illuminate\Database\Factories\HasFactory;

/*FKs*/


/*RELACIONES*/
use App\Lib\Financiero\Sueldo\Domain\Model\SueldoModel;
use App\Lib\Financiero\Contrato\Domain\Model\ContratoModel;
use App\Lib\Estructura\Materia\Domain\Model\MateriaModel;
use App\Lib\Proceso\Nota\Domain\Model\NotaModel;
use App\Lib\Estructura\DocenteMateria\Domain\Model\DocenteMateriaModel;



class DocenteModel extends Model {
	
	//use HasFactory;
	
	protected $table = 'docente';
	
	public $timestamps = true;
	
	//Asignacion
	protected $fillable = [
	
		'created_at',
		'nombre',
		'apellido',
		'fecha_nacimiento',
		'anios_experiencia',
		'nota_evaluacion',	
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
	
	public function sueldos() {
		return $this->hasMany(SueldoModel::class,'id_docente');
	}

	public function contrato() {
		return $this->hasOne(ContratoModel::class,'id');
	}

	public function materias() {
		return $this->belongsToMany(MateriaModel::class,'docente_materia','id_docente','id_materia');
	}

	public function notas() {
		return $this->hasMany(NotaModel::class,'id_docente');
	}

	public function docente_materias() {
		return $this->hasMany(DocenteMateriaModel::class,'id_docente');
	}

}