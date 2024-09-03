<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	/* Run the migrations.
     * @return void */	
    public function up() {
        			
		//RENAME TABLE
		Schema::rename('nota','new_nota');
		
		//UPDATE TABLE		
		Schema::table('nota', function (Blueprint $table) {
			
			$table->unsignedBigInteger('id_alumno')
					  ->change();
			
			$table->unsignedBigInteger('id_materia')
					  ->change();
			
			$table->unsignedBigInteger('id_docente')
					  ->change();
			
			$table->decimal('nota_prueba',18,2)
					  ->default(0.0)
					  ->change();
			
			$table->decimal('nota_trabajo',18,2)
					  ->default(0.0)
					  ->change();
			
			$table->decimal('nota_examen',18,2)
					  ->default(0.0)
					  ->change();
			
			$table->decimal('nota_final',18,2)
					  ->default(0.0)
					  ->change();
			
		});		
    }

    /* Reverse the migrations.
     * @return void */
    public function down() {
		
		//RENAME TABLE
		Schema::rename('nota','new_nota');
		
		//UPDATE TABLE		
		Schema::table('nota', function (Blueprint $table) {
			
			$table->unsignedBigInteger('id_alumno')
					  ->change();
			
			$table->unsignedBigInteger('id_materia')
					  ->change();
			
			$table->unsignedBigInteger('id_docente')
					  ->change();
			
			$table->decimal('nota_prueba',18,2)
					  ->default(0.0)
					  ->change();
			
			$table->decimal('nota_trabajo',18,2)
					  ->default(0.0)
					  ->change();
			
			$table->decimal('nota_examen',18,2)
					  ->default(0.0)
					  ->change();
			
			$table->decimal('nota_final',18,2)
					  ->default(0.0)
					  ->change();
			
		});
    }
	
	//------------ CREATE ---------------
	//php artisan make:migration Proceso/alter_nota_table
	
	//------------ GENERATE ---------------	
	//php artisan migrate --path=database/migrations/Proceso/alter_nota_table.php
	//php artisan migrate:rollback --path=database/migrations/Proceso/alter_nota_table.php
	//php artisan migrate (Todos Create)
	//php artisan migrate:reset (Todos Drop)
};
