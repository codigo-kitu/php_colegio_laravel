<?php declare(strict_types = 1);

namespace App\Lib\Base\Application\Logic;

class GeneralEntityLogic {
	
	//public $connexion1=null;
    public string $query='';
    public string $query_pagination='';

    function __construct() {
        //$this->connexion1=new Connexion(); 
        $this->query='';
        $this->query_pagination='';
    }
}