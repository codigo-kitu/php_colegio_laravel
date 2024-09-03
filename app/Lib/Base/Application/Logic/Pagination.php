<?php declare(strict_types = 1);

namespace App\Lib\Base\Application\Logic;

use App\Lib\Base\Util\Constantes;

class Pagination {
	
	public int $skip=0;
    public int $limit=0;

    function __construct() {
        $this->skip=0;
        $this->limit=Constantes::$LIMIT;
    }
}