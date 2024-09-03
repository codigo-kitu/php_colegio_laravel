<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	/* Run the migrations.
     * @return void */	
    public function up() {
        			
		//RENAME TABLE
		Schema::rename('docente','new_docente');
		
		//UPDATE TABLE		
		Schema::table('docente', function (Blueprint $table) {
			
			$table->string('nombre',25)
					  ->default('')
					  ->change();
			
			$table->string('apellido',25)
					  ->default('')
					  ->change();
			
			$table->date('fecha_nacimiento')
					  ->default(date('Y-m-d'))
					  ->change();
			
			$table->integer('anios_experiencia')
					  ->default(0)
					  ->change();
			
			$table->decimal('nota_evaluacion',18,2)
					  ->default(0.0)
					  ->change();
			
		});		
    }

    /* Reverse the migrations.
     * @return void */
    public function down() {
		
		//RENAME TABLE
		Schema::rename('docente','new_docente');
		
		//UPDATE TABLE		
		Schema::table('docente', function (Blueprint $table) {
			
			$table->string('nombre',25)
					  ->default('')
					  ->change();
			
			$table->string('apellido',25)
					  ->default('')
					  ->change();
			
			$table->date('fecha_nacimiento')
					  ->default(date('Y-m-d'))
					  ->change();
			
			$table->integer('anios_experiencia')
					  ->default(0)
					  ->change();
			
			$table->decimal('nota_evaluacion',18,2)
					  ->default(0.0)
					  ->change();
			
		});
    }
	
	//------------ CREATE ---------------
	//php artisan make:migration Estructura/alter_docente_table
	
	//------------ GENERATE ---------------	
	//php artisan migrate --path=database/migrations/Estructura/alter_docente_table.php
	//php artisan migrate:rollback --path=database/migrations/Estructura/alter_docente_table.php
	//php artisan migrate (Todos Create)
	//php artisan migrate:reset (Todos Drop)
};
