<?php

namespace Database\Seeders\Proceso;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Proceso\Nota;
use Database\Factories\Proceso\NotaFactory;

class NotaSeeder extends Seeder {
	
	public $notaFactory;
	
	/* MANUAL CONFIG BEFORE RUN */
	public $tipo = 'I'; //I,U,D,F
	
	function __construct() {
		$this->notaFactory = new NotaFactory();
	}
	
    /* Run the database seeds.
     * @return void */
    public function run() {
		
		if($this->tipo=='I') {
			
			//INSERT
			DB::table('nota')->insert(
				[			
					
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'id_alumno'=>-1,
					'id_materia'=>-1,
					'id_docente'=>-1,
					'nota_prueba'=>0.0,
					'nota_trabajo'=>0.0,
					'nota_examen'=>0.0,
					'nota_final'=>0.0,
				]
			);
			
		} else if($this->tipo=='U') {
		
			//UPDATE
			DB::table('nota')->where('id',1)
								->update(
				[			
				
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'id_alumno'=>-1,
					'id_materia'=>-1,
					'id_docente'=>-1,
					'nota_prueba'=>0.0,
					'nota_trabajo'=>0.0,
					'nota_examen'=>0.0,
					'nota_final'=>0.0,
				]
			);
			
		} else if($this->tipo=='D') {
		
			//DELETE
			DB::table('nota')->where('id',1)
								->delete();
								
		} else if($this->tipo=='F') {
		
			//FACTORY
			
			$this->notaFactory->count(3)
									->create();
			
			//FALTA: Modificar Model con Factory
			//Nota::factory()->count(3)
			//						->create();
			
			
		}
    }
	
	//------------------ RUN/EXEC TODOS ------------
	
	// php artisan db:seed
	
	// Path: DatabaseSeeder.php
	// Function: public function run() {
	
	// Code:
	/*
	use Database\Seeders\Proceso\NotaSeeder;
	
	public function run():void {
		$this->call([
    		NotaSeeder::class,
			User::class
    	]);
	}
	*/
	
	//------------------ RUN/EXEC POR TABLA ------------
	
	// php artisan db:seed --class=Proceso/NotaSeeder
	
	//------------------ RUN/EXEC CON MIGRATIONS ------------
	
	// php artisan migrate:fresh --seed
	
	// php artisan migrate:fresh --seed --seeder=Proceso/NotaSeeder
}