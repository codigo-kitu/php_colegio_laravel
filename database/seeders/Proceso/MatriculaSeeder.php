<?php

namespace Database\Seeders\Proceso;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Proceso\Matricula;
use Database\Factories\Proceso\MatriculaFactory;

class MatriculaSeeder extends Seeder {
	
	public $matriculaFactory;
	
	/* MANUAL CONFIG BEFORE RUN */
	public $tipo = 'I'; //I,U,D,F
	
	function __construct() {
		$this->matriculaFactory = new MatriculaFactory();
	}
	
    /* Run the database seeds.
     * @return void */
    public function run() {
		
		if($this->tipo=='I') {
			
			//INSERT
			DB::table('matricula')->insert(
				[			
					
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'anio'=>0,
					'costo'=>0.0,
					'fecha'=>date('Y-m-d'),
					'pagado'=>0,
				]
			);
			
		} else if($this->tipo=='U') {
		
			//UPDATE
			DB::table('matricula')->where('id',1)
								->update(
				[			
				
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'anio'=>0,
					'costo'=>0.0,
					'fecha'=>date('Y-m-d'),
					'pagado'=>0,
				]
			);
			
		} else if($this->tipo=='D') {
		
			//DELETE
			DB::table('matricula')->where('id',1)
								->delete();
								
		} else if($this->tipo=='F') {
		
			//FACTORY
			
			$this->matriculaFactory->count(3)
									->create();
			
			//FALTA: Modificar Model con Factory
			//Matricula::factory()->count(3)
			//						->create();
			
			
		}
    }
	
	//------------------ RUN/EXEC TODOS ------------
	
	// php artisan db:seed
	
	// Path: DatabaseSeeder.php
	// Function: public function run() {
	
	// Code:
	/*
	use Database\Seeders\Proceso\MatriculaSeeder;
	
	public function run():void {
		$this->call([
    		MatriculaSeeder::class,
			User::class
    	]);
	}
	*/
	
	//------------------ RUN/EXEC POR TABLA ------------
	
	// php artisan db:seed --class=Proceso/MatriculaSeeder
	
	//------------------ RUN/EXEC CON MIGRATIONS ------------
	
	// php artisan migrate:fresh --seed
	
	// php artisan migrate:fresh --seed --seeder=Proceso/MatriculaSeeder
}