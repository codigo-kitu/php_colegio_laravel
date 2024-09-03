<?php

namespace Database\Factories\Proceso;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Lib\Proceso\Matricula\Domain\Entity\Matricula;

/*
@extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\General\Actuador>
*/
class MatriculaFactory extends Factory {

	protected $model = Matricula::class;
	
	/* Define the model's default state.
     * @return array<string, mixed> */
    public function definition() {
		
        return [
            
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
			'anio'=>0,
			'costo'=>0.0,
			'fecha'=>date('Y-m-d'),
			'pagado'=>0,
        ];
    }
}