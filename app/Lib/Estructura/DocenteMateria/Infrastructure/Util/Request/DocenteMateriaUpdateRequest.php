<?php declare(strict_types = 1);

namespace App\Lib\Estructura\DocenteMateria\Infrastructure\Util\Request;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class DocenteMateriaUpdateRequest extends FormRequest {
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
            
			'docente_materia.id' => 'required' ,
			'docente_materia.updated_at' => 'required' ,
			'docente_materia.id_docente' => 'required' ,
			'docente_materia.id_materia' => 'required' ,	
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
			
			'docente_materia.id' => ' id es Requerido' ,
			'docente_materia.updated_at' => ' updated_at es Requerido' ,
			'docente_materia.id_docente' => ' id_docente es Requerido' ,
			'docente_materia.id_materia' => ' id_materia es Requerido' ,	
        ];
    }
}