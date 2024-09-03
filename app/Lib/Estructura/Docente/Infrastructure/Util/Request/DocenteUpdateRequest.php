<?php declare(strict_types = 1);

namespace App\Lib\Estructura\Docente\Infrastructure\Util\Request;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class DocenteUpdateRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        return [
            
			'docente.id' => 'required' ,
			'docente.updated_at' => 'required' ,
			'docente.nombre' => 'required' ,
			'docente.apellido' => 'required' ,
			'docente.fecha_nacimiento' => 'required' ,
			'docente.anios_experiencia' => 'required' ,
			'docente.nota_evaluacion' => 'required' ,	
        ];
    }    

    public function failedValidation(Validator $validator) {
        
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ],Response::HTTP_BAD_REQUEST));
    }

    public function messages() {
        return [
			
			'docente.id' => ' id es Requerido' ,
			'docente.updated_at' => ' updated_at es Requerido' ,
			'docente.nombre' => ' nombre es Requerido' ,
			'docente.apellido' => ' apellido es Requerido' ,
			'docente.fecha_nacimiento' => ' fecha_nacimiento es Requerido' ,
			'docente.anios_experiencia' => ' anios_experiencia es Requerido' ,
			'docente.nota_evaluacion' => ' nota_evaluacion es Requerido' ,	
        ];
    }
}