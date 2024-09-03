<?php declare(strict_types = 1);

namespace App\Lib\Financiero\Contrato\Infrastructure\Util\Request;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ContratoCreateRequest extends FormRequest {
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
            
			'contrato.created_at' => 'required' ,
			'contrato.updated_at' => 'required' ,
			'contrato.anio' => 'required' ,
			'contrato.valor' => 'required' ,
			'contrato.fecha' => 'required' ,
			'contrato.firmado' => 'required' ,	
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
            
			'contrato.created_at' => ' created_at es Requerido' ,
			'contrato.updated_at' => ' updated_at es Requerido' ,
			'contrato.anio' => ' anio es Requerido' ,
			'contrato.valor' => ' valor es Requerido' ,
			'contrato.fecha' => ' fecha es Requerido' ,
			'contrato.firmado' => ' firmado es Requerido' ,	
        ];
    }
}