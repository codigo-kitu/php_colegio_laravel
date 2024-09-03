<?php

namespace Database\Seeders\Estructura;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Estructura\DocenteMateria;
use Database\Factories\Estructura\DocenteMateriaFactory;

class DocenteMateriaSeeder extends Seeder {
	
	public $docente_materiaFactory;
	
	/* MANUAL CONFIG BEFORE RUN */
	public $tipo = 'I'; //I,U,D,F
	
	function __construct() {
		$this->docente_materiaFactory = new DocenteMateriaFactory();
	}
	
    /* Run the database seeds.
     * @return void */
    public function run() {
		
		if($this->tipo=='I') {
			
			//INSERT
			DB::table('docente_materia')->insert(
				[			
					
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'id_docente'=>-1,
					'id_materia'=>-1,
				]
			);
			
		} else if($this->tipo=='U') {
		
			//UPDATE
			DB::table('docente_materia')->where('id',1)
								->update(
				[			
				
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'id_docente'=>-1,
					'id_materia'=>-1,
				]
			);
			
		} else if($this->tipo=='D') {
		
			//DELETE
			DB::table('docente_materia')->where('id',1)
								->delete();
								
		} else if($this->tipo=='F') {
		
			//FACTORY
			
			$this->docente_materiaFactory->count(3)
									->create();
			
			//FALTA: Modificar Model con Factory
			//DocenteMateria::factory()->count(3)
			//						->create();
			
			
		}
    }
	
	//------------------ RUN/EXEC TODOS ------------
	
	// php artisan db:seed
	
	// Path: DatabaseSeeder.php
	// Function: public function run() {
	
	// Code:
	/*
	use Database\Seeders\Estructura\DocenteMateriaSeeder;
	
	public function run():void {
		$this->call([
    		DocenteMateriaSeeder::class,
			User::class
    	]);
	}
	*/
	
	//------------------ RUN/EXEC POR TABLA ------------
	
	// php artisan db:seed --class=Estructura/DocenteMateriaSeeder
	
	//------------------ RUN/EXEC CON MIGRATIONS ------------
	
	// php artisan migrate:fresh --seed
	
	// php artisan migrate:fresh --seed --seeder=Estructura/DocenteMateriaSeeder
}