<?php

namespace Database\Factories\Estructura;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Lib\Estructura\Materia\Domain\Entity\Materia;

/*
@extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\General\Actuador>
*/
class MateriaFactory extends Factory {

	protected $model = Materia::class;
	
	/* Define the model's default state.
     * @return array<string, mixed> */
    public function definition() {
		
        return [
            
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
			'codigo'=>Str::random(15),
			'nombre'=>$this->faker->name(),
			'activo'=>0,
        ];
    }
}