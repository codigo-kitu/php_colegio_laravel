<?php

namespace Database\Factories\Estructura;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Lib\Estructura\DocenteMateria\Domain\Entity\DocenteMateria;

/*
@extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\General\Actuador>
*/
class DocenteMateriaFactory extends Factory {

	protected $model = DocenteMateria::class;
	
	/* Define the model's default state.
     * @return array<string, mixed> */
    public function definition() {
		
        return [
            
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
			'id_docente'=>-1,
			'id_materia'=>-1,
        ];
    }
}