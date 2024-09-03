<?php

namespace Database\Seeders\Estructura;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Estructura\Docente;
use Database\Factories\Estructura\DocenteFactory;

class DocenteSeeder extends Seeder {
	
	public $docenteFactory;
	
	/* MANUAL CONFIG BEFORE RUN */
	public $tipo = 'I'; //I,U,D,F
	
	function __construct() {
		$this->docenteFactory = new DocenteFactory();
	}
	
    /* Run the database seeds.
     * @return void */
    public function run() {
		
		if($this->tipo=='I') {
			
			//INSERT
			DB::table('docente')->insert(
				[			
					
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'nombre'=>Str::random(25),
					'apellido'=>Str::random(25),
					'fecha_nacimiento'=>date('Y-m-d'),
					'anios_experiencia'=>0,
					'nota_evaluacion'=>0.0,
				]
			);
			
		} else if($this->tipo=='U') {
		
			//UPDATE
			DB::table('docente')->where('id',1)
								->update(
				[			
				
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'nombre'=>Str::random(25),
					'apellido'=>Str::random(25),
					'fecha_nacimiento'=>date('Y-m-d'),
					'anios_experiencia'=>0,
					'nota_evaluacion'=>0.0,
				]
			);
			
		} else if($this->tipo=='D') {
		
			//DELETE
			DB::table('docente')->where('id',1)
								->delete();
								
		} else if($this->tipo=='F') {
		
			//FACTORY
			
			$this->docenteFactory->count(3)
									->create();
			
			//FALTA: Modificar Model con Factory
			//Docente::factory()->count(3)
			//						->create();
			
			
		}
    }
	
	//------------------ RUN/EXEC TODOS ------------
	
	// php artisan db:seed
	
	// Path: DatabaseSeeder.php
	// Function: public function run() {
	
	// Code:
	/*
	use Database\Seeders\Estructura\DocenteSeeder;
	
	public function run():void {
		$this->call([
    		DocenteSeeder::class,
			User::class
    	]);
	}
	*/
	
	//------------------ RUN/EXEC POR TABLA ------------
	
	// php artisan db:seed --class=Estructura/DocenteSeeder
	
	//------------------ RUN/EXEC CON MIGRATIONS ------------
	
	// php artisan migrate:fresh --seed
	
	// php artisan migrate:fresh --seed --seeder=Estructura/DocenteSeeder
}