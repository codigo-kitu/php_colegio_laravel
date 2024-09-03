<?php declare(strict_types = 1);

namespace App\Lib\Estructura\AlumnoMateria\Infrastructure\Util\Request;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AlumnoMateriaCreateRequest extends FormRequest {
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
            
			'alumno_materia.created_at' => 'required' ,
			'alumno_materia.updated_at' => 'required' ,
			'alumno_materia.id_alumno' => 'required' ,
			'alumno_materia.id_materia' => 'required' ,	
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
            
			'alumno_materia.created_at' => ' created_at es Requerido' ,
			'alumno_materia.updated_at' => ' updated_at es Requerido' ,
			'alumno_materia.id_alumno' => ' id_alumno es Requerido' ,
			'alumno_materia.id_materia' => ' id_materia es Requerido' ,	
        ];
    }
}