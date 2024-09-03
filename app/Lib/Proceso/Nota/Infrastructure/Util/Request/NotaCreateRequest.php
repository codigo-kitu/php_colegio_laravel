<?php declare(strict_types = 1);

namespace App\Lib\Proceso\Nota\Infrastructure\Util\Request;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class NotaCreateRequest extends FormRequest {
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
            
			'nota.created_at' => 'required' ,
			'nota.updated_at' => 'required' ,
			'nota.id_alumno' => 'required' ,
			'nota.id_materia' => 'required' ,
			'nota.id_docente' => 'required' ,
			'nota.nota_prueba' => 'required' ,
			'nota.nota_trabajo' => 'required' ,
			'nota.nota_examen' => 'required' ,
			'nota.nota_final' => 'required' ,	
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
            
			'nota.created_at' => ' created_at es Requerido' ,
			'nota.updated_at' => ' updated_at es Requerido' ,
			'nota.id_alumno' => ' id_alumno es Requerido' ,
			'nota.id_materia' => ' id_materia es Requerido' ,
			'nota.id_docente' => ' id_docente es Requerido' ,
			'nota.nota_prueba' => ' nota_prueba es Requerido' ,
			'nota.nota_trabajo' => ' nota_trabajo es Requerido' ,
			'nota.nota_examen' => ' nota_examen es Requerido' ,
			'nota.nota_final' => ' nota_final es Requerido' ,	
        ];
    }
}