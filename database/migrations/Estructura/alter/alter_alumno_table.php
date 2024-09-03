<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	/* Run the migrations.
     * @return void */	
    public function up() {
        			
		//RENAME TABLE
		Schema::rename('alumno','new_alumno');
		
		//UPDATE TABLE		
		Schema::table('alumno', function (Blueprint $table) {
			
			$table->string('nombre',25)
					  ->default('')
					  ->change();
			
			$table->string('apellido',25)
					  ->default('')
					  ->change();
			
			$table->date('fecha_nacimiento')
					  ->default(date('Y-m-d'))
					  ->change();
			
		});		
    }

    /* Reverse the migrations.
     * @return void */
    public function down() {
		
		//RENAME TABLE
		Schema::rename('alumno','new_alumno');
		
		//UPDATE TABLE		
		Schema::table('alumno', function (Blueprint $table) {
			
			$table->string('nombre',25)
					  ->default('')
					  ->change();
			
			$table->string('apellido',25)
					  ->default('')
					  ->change();
			
			$table->date('fecha_nacimiento')
					  ->default(date('Y-m-d'))
					  ->change();
			
		});
    }
	
	//------------ CREATE ---------------
	//php artisan make:migration Estructura/alter_alumno_table
	
	//------------ GENERATE ---------------	
	//php artisan migrate --path=database/migrations/Estructura/alter_alumno_table.php
	//php artisan migrate:rollback --path=database/migrations/Estructura/alter_alumno_table.php
	//php artisan migrate (Todos Create)
	//php artisan migrate:reset (Todos Drop)
};
