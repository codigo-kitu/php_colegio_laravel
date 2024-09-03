<?php

namespace Database\Seeders\Estructura;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Estructura\AlumnoMateria;
use Database\Factories\Estructura\AlumnoMateriaFactory;

class AlumnoMateriaSeeder extends Seeder {
	
	public $alumno_materiaFactory;
	
	/* MANUAL CONFIG BEFORE RUN */
	public $tipo = 'I'; //I,U,D,F
	
	function __construct() {
		$this->alumno_materiaFactory = new AlumnoMateriaFactory();
	}
	
    /* Run the database seeds.
     * @return void */
    public function run() {
		
		if($this->tipo=='I') {
			
			//INSERT
			DB::table('alumno_materia')->insert(
				[			
					
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'id_alumno'=>-1,
					'id_materia'=>-1,
				]
			);
			
		} else if($this->tipo=='U') {
		
			//UPDATE
			DB::table('alumno_materia')->where('id',1)
								->update(
				[			
				
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'id_alumno'=>-1,
					'id_materia'=>-1,
				]
			);
			
		} else if($this->tipo=='D') {
		
			//DELETE
			DB::table('alumno_materia')->where('id',1)
								->delete();
								
		} else if($this->tipo=='F') {
		
			//FACTORY
			
			$this->alumno_materiaFactory->count(3)
									->create();
			
			//FALTA: Modificar Model con Factory
			//AlumnoMateria::factory()->count(3)
			//						->create();
			
			
		}
    }
	
	//------------------ RUN/EXEC TODOS ------------
	
	// php artisan db:seed
	
	// Path: DatabaseSeeder.php
	// Function: public function run() {
	
	// Code:
	/*
	use Database\Seeders\Estructura\AlumnoMateriaSeeder;
	
	public function run():void {
		$this->call([
    		AlumnoMateriaSeeder::class,
			User::class
    	]);
	}
	*/
	
	//------------------ RUN/EXEC POR TABLA ------------
	
	// php artisan db:seed --class=Estructura/AlumnoMateriaSeeder
	
	//------------------ RUN/EXEC CON MIGRATIONS ------------
	
	// php artisan migrate:fresh --seed
	
	// php artisan migrate:fresh --seed --seeder=Estructura/AlumnoMateriaSeeder
}