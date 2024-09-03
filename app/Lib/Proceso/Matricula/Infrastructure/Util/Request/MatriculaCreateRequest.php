<?php declare(strict_types = 1);

namespace App\Lib\Proceso\Matricula\Infrastructure\Util\Request;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class MatriculaCreateRequest extends FormRequest {
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
            
			'matricula.created_at' => 'required' ,
			'matricula.updated_at' => 'required' ,
			'matricula.anio' => 'required' ,
			'matricula.costo' => 'required' ,
			'matricula.fecha' => 'required' ,
			'matricula.pagado' => 'required' ,	
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
            
			'matricula.created_at' => ' created_at es Requerido' ,
			'matricula.updated_at' => ' updated_at es Requerido' ,
			'matricula.anio' => ' anio es Requerido' ,
			'matricula.costo' => ' costo es Requerido' ,
			'matricula.fecha' => ' fecha es Requerido' ,
			'matricula.pagado' => ' pagado es Requerido' ,	
        ];
    }
}