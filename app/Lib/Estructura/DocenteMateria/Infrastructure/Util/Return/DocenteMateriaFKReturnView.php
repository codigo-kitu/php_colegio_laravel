<?php declare(strict_types = 1);

namespace App\Lib\Estructura\DocenteMateria\Infrastructure\Util\Return;

use Illuminate\Database\Eloquent\Collection;

class DocenteMateriaFKReturnView {
		
	
	public Collection $docentesFK;
	public Collection $materiasFK;
			
	function __construct () {			
		
		$this->docentesFK = new Collection();
		$this->materiasFK = new Collection();
	} 
}
