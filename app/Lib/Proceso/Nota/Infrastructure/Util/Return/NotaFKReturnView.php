<?php declare(strict_types = 1);

namespace App\Lib\Proceso\Nota\Infrastructure\Util\Return;

use Illuminate\Database\Eloquent\Collection;

class NotaFKReturnView {
		
	
	public Collection $alumnosFK;
	public Collection $materiasFK;
	public Collection $docentesFK;
			
	function __construct () {			
		
		$this->alumnosFK = new Collection();
		$this->materiasFK = new Collection();
		$this->docentesFK = new Collection();
	} 
}
