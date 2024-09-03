<?php

namespace Database\Seeders\Estructura;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Estructura\Alumno;
use Database\Factories\Estructura\AlumnoFactory;

class AlumnoSeeder extends Seeder {
	
	public $alumnoFactory;
	
	/* MANUAL CONFIG BEFORE RUN */
	public $tipo = 'I'; //I,U,D,F
	
	function __construct() {
		$this->alumnoFactory = new AlumnoFactory();
	}
	
    /* Run the database seeds.
     * @return void */
    public function run() {
		
		if($this->tipo=='I') {
			
			//INSERT
			DB::table('alumno')->insert(
				[			
					
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'nombre'=>Str::random(25),
					'apellido'=>Str::random(25),
					'fecha_nacimiento'=>date('Y-m-d'),
				]
			);
			
		} else if($this->tipo=='U') {
		
			//UPDATE
			DB::table('alumno')->where('id',1)
								->update(
				[			
				
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'nombre'=>Str::random(25),
					'apellido'=>Str::random(25),
					'fecha_nacimiento'=>date('Y-m-d'),
				]
			);
			
		} else if($this->tipo=='D') {
		
			//DELETE
			DB::table('alumno')->where('id',1)
								->delete();
								
		} else if($this->tipo=='F') {
		
			//FACTORY
			
			$this->alumnoFactory->count(3)
									->create();
			
			//FALTA: Modificar Model con Factory
			//Alumno::factory()->count(3)
			//						->create();
			
			
		}
    }
	
	//------------------ RUN/EXEC TODOS ------------
	
	// php artisan db:seed
	
	// Path: DatabaseSeeder.php
	// Function: public function run() {
	
	// Code:
	/*
	use Database\Seeders\Estructura\AlumnoSeeder;
	
	public function run():void {
		$this->call([
    		AlumnoSeeder::class,
			User::class
    	]);
	}
	*/
	
	//------------------ RUN/EXEC POR TABLA ------------
	
	// php artisan db:seed --class=Estructura/AlumnoSeeder
	
	//------------------ RUN/EXEC CON MIGRATIONS ------------
	
	// php artisan migrate:fresh --seed
	
	// php artisan migrate:fresh --seed --seeder=Estructura/AlumnoSeeder
}