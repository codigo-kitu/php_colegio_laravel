<?php declare(strict_types = 1);

namespace App\Lib\Base\Domain\Entity;

class GeneralEntity {
	
	//public $id=0;
    public int $id=0;

    function __construct() {
        //this._id=0;
        $this->id=0;
    }
}