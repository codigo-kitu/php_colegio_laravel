<?php declare(strict_types = 1);

namespace App\Lib\Financiero\Sueldo\Infrastructure\Util\Return;

use Illuminate\Database\Eloquent\Collection;

class SueldoFKReturnView {
		
	
	public Collection $docentesFK;
			
	function __construct () {			
		
		$this->docentesFK = new Collection();
	} 
}
