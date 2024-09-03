<?php

namespace Database\Factories\Financiero;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Lib\Financiero\Contrato\Domain\Entity\Contrato;

/*
@extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\General\Actuador>
*/
class ContratoFactory extends Factory {

	protected $model = Contrato::class;
	
	/* Define the model's default state.
     * @return array<string, mixed> */
    public function definition() {
		
        return [
            
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
			'anio'=>0,
			'valor'=>0.0,
			'fecha'=>date('Y-m-d'),
			'firmado'=>0,
        ];
    }
}