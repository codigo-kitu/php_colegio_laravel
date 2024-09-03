<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	/* Run the migrations.
     * @return void */	
    public function up() {
        			
		//RENAME TABLE
		Schema::rename('materia','new_materia');
		
		//UPDATE TABLE		
		Schema::table('materia', function (Blueprint $table) {
			
			$table->string('codigo',15)
					  ->default('')
					  ->change();
			
			$table->string('nombre',25)
					  ->default('')
					  ->change();
			
			$table->boolean('activo')
					  ->default(0)
					  ->change();
			
		});		
    }

    /* Reverse the migrations.
     * @return void */
    public function down() {
		
		//RENAME TABLE
		Schema::rename('materia','new_materia');
		
		//UPDATE TABLE		
		Schema::table('materia', function (Blueprint $table) {
			
			$table->string('codigo',15)
					  ->default('')
					  ->change();
			
			$table->string('nombre',25)
					  ->default('')
					  ->change();
			
			$table->boolean('activo')
					  ->default(0)
					  ->change();
			
		});
    }
	
	//------------ CREATE ---------------
	//php artisan make:migration Estructura/alter_materia_table
	
	//------------ GENERATE ---------------	
	//php artisan migrate --path=database/migrations/Estructura/alter_materia_table.php
	//php artisan migrate:rollback --path=database/migrations/Estructura/alter_materia_table.php
	//php artisan migrate (Todos Create)
	//php artisan migrate:reset (Todos Drop)
};
