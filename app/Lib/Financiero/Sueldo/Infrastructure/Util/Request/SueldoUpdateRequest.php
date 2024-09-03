<?php declare(strict_types = 1);

namespace App\Lib\Financiero\Sueldo\Infrastructure\Util\Request;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SueldoUpdateRequest extends FormRequest {
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
            
			'sueldo.id' => 'required' ,
			'sueldo.updated_at' => 'required' ,
			'sueldo.id_docente' => 'required' ,
			'sueldo.anio' => 'required' ,
			'sueldo.mes' => 'required' ,
			'sueldo.valor' => 'required' ,
			'sueldo.cobrado' => 'required' ,	
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
			
			'sueldo.id' => ' id es Requerido' ,
			'sueldo.updated_at' => ' updated_at es Requerido' ,
			'sueldo.id_docente' => ' id_docente es Requerido' ,
			'sueldo.anio' => ' anio es Requerido' ,
			'sueldo.mes' => ' mes es Requerido' ,
			'sueldo.valor' => ' valor es Requerido' ,
			'sueldo.cobrado' => ' cobrado es Requerido' ,	
        ];
    }
}