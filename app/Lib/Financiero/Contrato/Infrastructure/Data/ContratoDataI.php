<?php

namespace App\Lib\Financiero\Contrato\Infrastructure\Data;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;

use App\Lib\Financiero\Contrato\Domain\Entity\Contrato;
use App\Lib\Financiero\Contrato\Domain\Model\ContratoModel;

interface ContratoDataI {	
	
	public function getIndex(Pagination $pagination1) : array;	
	public function getTodos(Pagination $pagination1) : array;	
	public function getSeleccionar(int $id) : Contrato;	
	
	public function nuevo($values) : Contrato;
	public function actualizar(int $id,$values) : bool;	
	public function eliminar(int $id) : bool;	
	
	public function nuevos($news_contratos) : void;	
	public function actualizars($updates_contratos,$updates_columnas) : void;	
	public function eliminars($ids_deletes_contratos) : void;		
	public function guardarCambios($news_contratos,$ids_deletes_contratos,$updates_contratos,$updates_columnas) : void;
	
	
	/*FKs*/	
	public function getFks() : void;
	
	
}
