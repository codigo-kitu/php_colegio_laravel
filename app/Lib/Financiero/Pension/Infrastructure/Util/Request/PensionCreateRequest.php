<?php declare(strict_types = 1);

namespace App\Lib\Financiero\Pension\Infrastructure\Util\Request;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PensionCreateRequest extends FormRequest {
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
            
			'pension.created_at' => 'required' ,
			'pension.updated_at' => 'required' ,
			'pension.id_alumno' => 'required' ,
			'pension.anio' => 'required' ,
			'pension.mes' => 'required' ,
			'pension.valor' => 'required' ,
			'pension.cobrado' => 'required' ,	
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
            
			'pension.created_at' => ' created_at es Requerido' ,
			'pension.updated_at' => ' updated_at es Requerido' ,
			'pension.id_alumno' => ' id_alumno es Requerido' ,
			'pension.anio' => ' anio es Requerido' ,
			'pension.mes' => ' mes es Requerido' ,
			'pension.valor' => ' valor es Requerido' ,
			'pension.cobrado' => ' cobrado es Requerido' ,	
        ];
    }
}