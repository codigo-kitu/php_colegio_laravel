<?php

namespace Database\Seeders\Estructura;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Estructura\Materia;
use Database\Factories\Estructura\MateriaFactory;

class MateriaSeeder extends Seeder {
	
	public $materiaFactory;
	
	/* MANUAL CONFIG BEFORE RUN */
	public $tipo = 'I'; //I,U,D,F
	
	function __construct() {
		$this->materiaFactory = new MateriaFactory();
	}
	
    /* Run the database seeds.
     * @return void */
    public function run() {
		
		if($this->tipo=='I') {
			
			//INSERT
			DB::table('materia')->insert(
				[			
					
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'codigo'=>'MATE',
					'nombre'=>'MATEMATICAS',
					'activo'=>0,
				]
			);
			
		} else if($this->tipo=='U') {
		
			//UPDATE
			DB::table('materia')->where('id',1)
								->update(
				[			
				
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'codigo'=>Str::random(15),
					'nombre'=>Str::random(25),
					'activo'=>0,
				]
			);
			
		} else if($this->tipo=='D') {
		
			//DELETE
			DB::table('materia')->where('id',1)
								->delete();
								
		} else if($this->tipo=='F') {
		
			//FACTORY
			
			$this->materiaFactory->count(3)
									->create();
			
			//FALTA: Modificar Model con Factory
			//Materia::factory()->count(3)
			//						->create();
			
			
		}
    }
	
	//------------------ RUN/EXEC TODOS ------------
	
	// php artisan db:seed
	
	// Path: DatabaseSeeder.php
	// Function: public function run() {
	
	// Code:
	/*
	use Database\Seeders\Estructura\MateriaSeeder;
	
	public function run():void {
		$this->call([
    		MateriaSeeder::class,
			User::class
    	]);
	}
	*/
	
	//------------------ RUN/EXEC POR TABLA ------------
	
	// php artisan db:seed --class=Estructura/MateriaSeeder
	
	//------------------ RUN/EXEC CON MIGRATIONS ------------
	
	// php artisan migrate:fresh --seed
	
	// php artisan migrate:fresh --seed --seeder=Estructura/MateriaSeeder
}