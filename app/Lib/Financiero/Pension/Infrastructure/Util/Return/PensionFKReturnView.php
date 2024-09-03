<?php declare(strict_types = 1);

namespace App\Lib\Financiero\Pension\Infrastructure\Util\Return;

use Illuminate\Database\Eloquent\Collection;

class PensionFKReturnView {
		
	
	public Collection $alumnosFK;
			
	function __construct () {			
		
		$this->alumnosFK = new Collection();
	} 
}
