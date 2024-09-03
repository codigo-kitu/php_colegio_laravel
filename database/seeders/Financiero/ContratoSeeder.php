<?php

namespace Database\Seeders\Financiero;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Financiero\Contrato;
use Database\Factories\Financiero\ContratoFactory;

class ContratoSeeder extends Seeder {
	
	public $contratoFactory;
	
	/* MANUAL CONFIG BEFORE RUN */
	public $tipo = 'I'; //I,U,D,F
	
	function __construct() {
		$this->contratoFactory = new ContratoFactory();
	}
	
    /* Run the database seeds.
     * @return void */
    public function run() {
		
		if($this->tipo=='I') {
			
			//INSERT
			DB::table('contrato')->insert(
				[			
					
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'anio'=>0,
					'valor'=>0.0,
					'fecha'=>date('Y-m-d'),
					'firmado'=>0,
				]
			);
			
		} else if($this->tipo=='U') {
		
			//UPDATE
			DB::table('contrato')->where('id',1)
								->update(
				[			
				
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'anio'=>0,
					'valor'=>0.0,
					'fecha'=>date('Y-m-d'),
					'firmado'=>0,
				]
			);
			
		} else if($this->tipo=='D') {
		
			//DELETE
			DB::table('contrato')->where('id',1)
								->delete();
								
		} else if($this->tipo=='F') {
		
			//FACTORY
			
			$this->contratoFactory->count(3)
									->create();
			
			//FALTA: Modificar Model con Factory
			//Contrato::factory()->count(3)
			//						->create();
			
			
		}
    }
	
	//------------------ RUN/EXEC TODOS ------------
	
	// php artisan db:seed
	
	// Path: DatabaseSeeder.php
	// Function: public function run() {
	
	// Code:
	/*
	use Database\Seeders\Financiero\ContratoSeeder;
	
	public function run():void {
		$this->call([
    		ContratoSeeder::class,
			User::class
    	]);
	}
	*/
	
	//------------------ RUN/EXEC POR TABLA ------------
	
	// php artisan db:seed --class=Financiero/ContratoSeeder
	
	//------------------ RUN/EXEC CON MIGRATIONS ------------
	
	// php artisan migrate:fresh --seed
	
	// php artisan migrate:fresh --seed --seeder=Financiero/ContratoSeeder
}