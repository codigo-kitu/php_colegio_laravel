<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	/* Run the migrations.
     * @return void */	
    public function up() {
        			
		Schema::create('alumno', function (Blueprint $table) {
			
			//GENERAL
			$table->engine = 'InnoDB';
			$table->charset = 'utf8mb4';
			$table->collation = 'utf8mb4_unicode_ci'; //unicode,general
			
			//COLUMNS
			$table->id();
			
			$table->timestamps(); //created_at,updated_at
			
			$table->string('nombre',25)
				  ->default('');
			
			$table->string('apellido',25)
				  ->default('');
			
			$table->date('fecha_nacimiento')
				  ->default(date('Y-m-d'));
			
						
		});					
		
    }

    /* Reverse the migrations.
     * @return void */
    public function down() {
		
        Schema::dropIfExists('alumno');
    }
	
	//=========================== NO APLICA ===========================
	
	//* Usar los Archivos create_name_table.php,alter_name_table.php generados.
	//* Usar parametro --path en migrate con archivos create_name_table.php,alter_name_table.php generados.

	//------------ CREATE MIGRATION: create table ---------------
	//php artisan make:migration --path database/migrations/Estructura/create create_alumno_table
	
	//------------ CREATE MIGRATION: alter table ---------------
	//php artisan make:migration --path database/migrations/Estructura/alter alter_alumno_table
	
	//=========================== NO APLICA ===========================
	
	//------------ RUN MIGRATION: create/alter table --> (public function up()) ---------------	
	//php artisan migrate --path=database/migrations/Estructura/create/create_alumno_table.php
	//php artisan migrate --path=database/migrations/Estructura/alter/alter_alumno_table.php
	
	//php artisan migrate (Run Todos Create)
	
	//------------ ROLLBACK MIGRATION: crete/alter(public function down()) ---------------		
	//php artisan migrate:rollback --path=database/migrations/Estructura/create/create_alumno_table.php
	//php artisan migrate:rollback --path=database/migrations/Estructura/alter/alter_alumno_table.php
	
	//php artisan migrate:reset (Delete Todos Drop)
};
