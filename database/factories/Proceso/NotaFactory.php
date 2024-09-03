<?php

namespace Database\Factories\Proceso;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Lib\Proceso\Nota\Domain\Entity\Nota;

/*
@extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\General\Actuador>
*/
class NotaFactory extends Factory {

	protected $model = Nota::class;
	
	/* Define the model's default state.
     * @return array<string, mixed> */
    public function definition() {
		
        return [
            
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
			'id_alumno'=>-1,
			'id_materia'=>-1,
			'id_docente'=>-1,
			'nota_prueba'=>0.0,
			'nota_trabajo'=>0.0,
			'nota_examen'=>0.0,
			'nota_final'=>0.0,
        ];
    }
}