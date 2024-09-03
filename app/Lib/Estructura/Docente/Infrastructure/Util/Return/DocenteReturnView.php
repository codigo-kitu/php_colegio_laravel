<?php declare(strict_types = 1);

namespace App\Lib\Estructura\Docente\Infrastructure\Util\Return;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Estructura\Docente\Domain\Entity\Docente;

class DocenteReturnView {	
	
	public string $title=''; 
	public array $docentes;
	public Docente $docente1;
	public string $action='';
	public string $action_title='';
	
	function __construct() {
        
		$this->title='';
		$this->action='';
        $this->action_title='';
		
		$this->docentes = array(); /*new Collection();*/
		
        $this->docente1=new Docente();
    }
	
	public function setReturnView(TipoAccionEnum $tipo_accion_enum1,Docente $docente1,array $docentes) : void {		
		$pre_titulo='Datos';
		$post_titulo='Ejecutada';
		$action_form='';
		
        switch($tipo_accion_enum1) {
			
			case TipoAccionEnum::SELECCIONAR: {
                $pre_titulo='Datos';
				$post_titulo='Seleccionar';
				break;
            }
            case TipoAccionEnum::BUSCAR_TODOS: {
                $pre_titulo='Datos';
				$post_titulo='Buscar_Todos';
				break;
            }
			case TipoAccionEnum::BUSCAR: {
                $pre_titulo='Datos';
				$post_titulo='Buscar';
				break;
            }
			case TipoAccionEnum::NUEVO: {
				$pre_titulo='';
                $post_titulo='Nuevo';
				$action_form='nuevo';
				break;
            }
			case TipoAccionEnum::ACTUALIZAR: {
				$pre_titulo='';
                $post_titulo='Actualizar';
				$action_form='actualizar';
				break;
            }
			case TipoAccionEnum::ELIMINAR: {
				$pre_titulo='';
                $post_titulo='Eliminar';
				$action_form='eliminar';
				break;
            }
			case TipoAccionEnum::GUARDAR_CAMBIOS: {
				$pre_titulo='';
                $post_titulo='Guardar Cambios';
				$action_form='guardar_cambios';
				break;
            }
            default: {
                break;
            }
        }
		
		
		$this->title = $pre_titulo . ' docente ' . $post_titulo;
		$this->docente1 = $docente1;
		$this->docentes = $docentes;		
		$this->action = $action_form;
		$this->action_title = $post_titulo;				
	}
}