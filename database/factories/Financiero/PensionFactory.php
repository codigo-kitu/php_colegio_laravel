<?php

namespace Database\Factories\Financiero;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Lib\Financiero\Pension\Domain\Entity\Pension;

/*
@extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\General\Actuador>
*/
class PensionFactory extends Factory {

	protected $model = Pension::class;
	
	/* Define the model's default state.
     * @return array<string, mixed> */
    public function definition() {
		
        return [
            
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
			'id_alumno'=>-1,
			'anio'=>0,
			'mes'=>0,
			'valor'=>0.0,
			'cobrado'=>0,
        ];
    }
}