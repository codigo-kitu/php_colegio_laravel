<?php declare(strict_types = 1);

namespace App\Lib\Financiero\Contrato\Infrastructure\Util\Return;

use Illuminate\Database\Eloquent\Collection;

class ContratoFKReturnView {
		
	
	public Collection $docentesFK;
			
	function __construct () {			
		
		$this->docentesFK = new Collection();
	} 
}
