<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	/* Run the migrations.
     * @return void */	
    public function up() {
        			
		//RENAME TABLE
		Schema::rename('docente_materia','new_docente_materia');
		
		//UPDATE TABLE		
		Schema::table('docente_materia', function (Blueprint $table) {
			
			$table->unsignedBigInteger('id_docente')
					  ->change();
			
			$table->unsignedBigInteger('id_materia')
					  ->change();
			
		});		
    }

    /* Reverse the migrations.
     * @return void */
    public function down() {
		
		//RENAME TABLE
		Schema::rename('docente_materia','new_docente_materia');
		
		//UPDATE TABLE		
		Schema::table('docente_materia', function (Blueprint $table) {
			
			$table->unsignedBigInteger('id_docente')
					  ->change();
			
			$table->unsignedBigInteger('id_materia')
					  ->change();
			
		});
    }
	
	//------------ CREATE ---------------
	//php artisan make:migration Estructura/alter_docente_materia_table
	
	//------------ GENERATE ---------------	
	//php artisan migrate --path=database/migrations/Estructura/alter_docente_materia_table.php
	//php artisan migrate:rollback --path=database/migrations/Estructura/alter_docente_materia_table.php
	//php artisan migrate (Todos Create)
	//php artisan migrate:reset (Todos Drop)
};
