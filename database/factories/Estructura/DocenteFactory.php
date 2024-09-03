<?php

namespace Database\Factories\Estructura;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Lib\Estructura\Docente\Domain\Entity\Docente;

/*
@extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\General\Actuador>
*/
class DocenteFactory extends Factory {

	protected $model = Docente::class;
	
	/* Define the model's default state.
     * @return array<string, mixed> */
    public function definition() {
		
        return [
            
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
			'nombre'=>$this->faker->name(),
			'apellido'=>Str::random(25),
			'fecha_nacimiento'=>date('Y-m-d'),
			'anios_experiencia'=>0,
			'nota_evaluacion'=>0.0,
        ];
    }
}