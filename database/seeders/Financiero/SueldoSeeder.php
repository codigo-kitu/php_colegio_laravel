<?php

namespace Database\Seeders\Financiero;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Financiero\Sueldo;
use Database\Factories\Financiero\SueldoFactory;

class SueldoSeeder extends Seeder {
	
	public $sueldoFactory;
	
	/* MANUAL CONFIG BEFORE RUN */
	public $tipo = 'I'; //I,U,D,F
	
	function __construct() {
		$this->sueldoFactory = new SueldoFactory();
	}
	
    /* Run the database seeds.
     * @return void */
    public function run() {
		
		if($this->tipo=='I') {
			
			//INSERT
			DB::table('sueldo')->insert(
				[			
					
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'id_docente'=>-1,
					'anio'=>0,
					'mes'=>0,
					'valor'=>0.0,
					'cobrado'=>0,
				]
			);
			
		} else if($this->tipo=='U') {
		
			//UPDATE
			DB::table('sueldo')->where('id',1)
								->update(
				[			
				
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'id_docente'=>-1,
					'anio'=>0,
					'mes'=>0,
					'valor'=>0.0,
					'cobrado'=>0,
				]
			);
			
		} else if($this->tipo=='D') {
		
			//DELETE
			DB::table('sueldo')->where('id',1)
								->delete();
								
		} else if($this->tipo=='F') {
		
			//FACTORY
			
			$this->sueldoFactory->count(3)
									->create();
			
			//FALTA: Modificar Model con Factory
			//Sueldo::factory()->count(3)
			//						->create();
			
			
		}
    }
	
	//------------------ RUN/EXEC TODOS ------------
	
	// php artisan db:seed
	
	// Path: DatabaseSeeder.php
	// Function: public function run() {
	
	// Code:
	/*
	use Database\Seeders\Financiero\SueldoSeeder;
	
	public function run():void {
		$this->call([
    		SueldoSeeder::class,
			User::class
    	]);
	}
	*/
	
	//------------------ RUN/EXEC POR TABLA ------------
	
	// php artisan db:seed --class=Financiero/SueldoSeeder
	
	//------------------ RUN/EXEC CON MIGRATIONS ------------
	
	// php artisan migrate:fresh --seed
	
	// php artisan migrate:fresh --seed --seeder=Financiero/SueldoSeeder
}