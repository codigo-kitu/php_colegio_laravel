<?php declare(strict_types = 1);

namespace App\Lib\Base\Util;

enum TipoAccionEnum {

    case SELECCIONAR;// = "SELECCIONAR";

    case NUEVO_PREPARAR;//= "NUEVO_PREPARAR";
    case NUEVO;//= "NUEVO";
    case ACTUALIZAR;//= "ACTUALIZAR";
    case ELIMINAR;//= "ELIMINAR";
    case CANCELAR;//= "CANCELAR";

    case GUARDAR_CAMBIOS;

    case BUSCAR_TODOS;// = "BUSCAR_TODOS";
    case BUSCAR;// = "BUSCAR";
}