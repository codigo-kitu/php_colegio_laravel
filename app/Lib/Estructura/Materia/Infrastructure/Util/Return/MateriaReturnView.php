<?php declare(strict_types = 1);

namespace App\Lib\Estructura\Materia\Infrastructure\Util\Return;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Estructura\Materia\Domain\Entity\Materia;

class MateriaReturnView {	
	
	public string $title=''; 
	public array $materias;
	public Materia $materia1;
	public string $action='';
	public string $action_title='';
	
	function __construct() {
        
		$this->title='';
		$this->action='';
        $this->action_title='';
		
		$this->materias = array(); /*new Collection();*/
		
        $this->materia1=new Materia();
    }
	
	public function setReturnView(TipoAccionEnum $tipo_accion_enum1,Materia $materia1,array $materias) : void {		
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
			case TipoAccionEnum::NUEVO_PREPARAR: {
				$pre_titulo='';
                $post_titulo='Nuevo Preparar';
				$action_form='nuevo_preparar';
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
			case TipoAccionEnum::CANCELAR: {
				$pre_titulo='';
                $post_titulo='Cancelar';
				$action_form='cancelar';
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
		
		
		$this->title = $pre_titulo . ' materia ' . $post_titulo;
		$this->materia1 = $materia1;
		$this->materias = $materias;		
		$this->action = $action_form;
		$this->action_title = $post_titulo;				
	}
}