<?php declare(strict_types = 1);

namespace App\Lib\Estructura\AlumnoMateria\Infrastructure\Util\Return;

/*use Illuminate\Database\Eloquent\Collection;*/

class AlumnoMateriaFKReturnView {
		
	
	public array $alumnosFK;
	public array $materiasFK;
			
	function __construct () {			
		
		$this->alumnosFK = array();
		$this->materiasFK = array();
	} 
}
