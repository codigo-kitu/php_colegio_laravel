<?php declare(strict_types = 1);

namespace App\Lib\Base\Util;

class Constantes {
    
    public static string $PROTOCOL = 'http';
    public static string $IP_SERVIDOR = 'localhost';
    public static string $PUERTO_SERVIDOR = '3000';
    public static string $CONTEXTO_APLICACION = 'api/colegio_relaciones';

    public static bool $CON_LOG=true;

    public static int $LIMIT=10;

    public static string $PAGINATION = 'pagination';
    public static string $ID = 'id';
    public static string $EQUAL = '=';

    public static string $JSON_SKIP = 'pagination.skip';
    public static string $JSON_LIMIT = 'pagination.limit';

    //TO LUMEN
    public static string $DB = 'db';
    
    public static string $DEFAULT = '/';
    public static string $INDEX = '/index';
    public static string $TODOS = '/todos';
    public static string $BUSCAR = '/buscar';
    public static string $NUEVO = '/nuevo';
    public static string $NUEVO_PREPARAR = '/nuevo_preparar';
    public static string $ACTUALIZAR = '/actualizar';
    public static string $ELIMINAR = '/eliminar';
    public static string $CANCELAR = '/cancelar';

    public static string $GUARDAR_CAMBIOS = '/guardar_cambios';
    public static string $SELECCIONAR = '/seleccionar';
    public static string $ACEPTAR = '/aceptar';
    public static string $GET_FKS = '/get_fks';
    public static string $TODOS_RELACIONES = '/todos_relaciones';
    public static string $SELECCIONAR_RELACIONES = '/seleccionar_relaciones';

    public static string $DEFAULT_API = '/';
    public static string $INDEX_API = '/index';//'/api';
    public static string $TODOS_API = '/todos';//'/todos';   '/todos_api';
    public static string $BUSCAR_API = '/buscar';//'/buscar_api';
    public static string $SELECCIONAR_API = '/seleccionar';//'/buscar_api';
    public static string $NUEVO_API = '/nuevo';//'/nuevo_api';
    public static string $ACTUALIZAR_API = '/actualizar';//'/actualizar_api';
    public static string $ELIMINAR_API = '/eliminar';//'/eliminar_api';
    
    public static string $S_SKIP='skip';
    public static string $S_LIMIT='limit';

    public static string $USUARIO='usuario';
    public static string $CONTRASENA='contrasena';

    public static string $GET_INDEX = 'getIndex';
    public static string $GET_TODOS = 'getTodos';
    public static string $GET_BUSCAR = 'getBuscar';
    public static string $GET_SELECCIONAR = 'getSeleccionar';
    public static string $GET_SELECCIONAR_ID = 'getSeleccionarId';
    public static string $GET_TODOS_RELACIONES = 'getTodosRelaciones';
    public static string $GET_SELECCIONAR_RELACIONES = 'getSeleccionarRelaciones';

    public static string $SNUEVO = 'nuevo';
    public static string $SNUEVO_PREPARAR = 'nuevoPreparar';
    public static string $SACTUALIZAR = 'actualizar';
    public static string $SELIMINAR = 'eliminar';
    public static string $SCANCELAR = 'cancelar';

    public static string $SNUEVOS = 'nuevos';
    public static string $SELIMINARS = 'eliminars';
    public static string $SACTUALIZARS = 'actualizars';
    public static string $SGUARDAR_CAMBIOS = 'guardarCambios';
    
    public static string $SGET_FKS = 'getFks';
}