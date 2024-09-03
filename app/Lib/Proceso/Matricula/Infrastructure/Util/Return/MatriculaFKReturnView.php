<?php declare(strict_types = 1);

namespace App\Lib\Proceso\Matricula\Infrastructure\Util\Return;

use Illuminate\Database\Eloquent\Collection;

class MatriculaFKReturnView {
		
	
	public Collection $alumnosFK;
			
	function __construct () {			
		
		$this->alumnosFK = new Collection();
	} 
}
