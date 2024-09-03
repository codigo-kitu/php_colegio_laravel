<?php declare(strict_types = 1);

namespace App\Lib\Estructura\Alumno\Infrastructure\Util\Request;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AlumnoUpdateRequest extends FormRequest {
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
            
			'alumno.id' => 'required' ,
			'alumno.updated_at' => 'required' ,
			'alumno.nombre' => 'required' ,
			'alumno.apellido' => 'required' ,
			'alumno.fecha_nacimiento' => 'required' ,	
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
			
			'alumno.id' => ' id es Requerido' ,
			'alumno.updated_at' => ' updated_at es Requerido' ,
			'alumno.nombre' => ' nombre es Requerido' ,
			'alumno.apellido' => ' apellido es Requerido' ,
			'alumno.fecha_nacimiento' => ' fecha_nacimiento es Requerido' ,	
        ];
    }
}