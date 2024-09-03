<?php

namespace Database\Factories\Estructura;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Lib\Estructura\AlumnoMateria\Domain\Entity\AlumnoMateria;

/*
@extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\General\Actuador>
*/
class AlumnoMateriaFactory extends Factory {

	protected $model = AlumnoMateria::class;
	
	/* Define the model's default state.
     * @return array<string, mixed> */
    public function definition() {
		
        return [
            
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
			'id_alumno'=>-1,
			'id_materia'=>-1,
        ];
    }
}