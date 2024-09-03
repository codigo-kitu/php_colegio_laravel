<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	/* Run the migrations.
     * @return void */	
    public function up() {
		
		Schema::table('alumno_materia', function (Blueprint $table) {
		

			$table->foreign('id_alumno')
				  ->references('id')
				  ->on('alumno');

			$table->foreign('id_materia')
				  ->references('id')
				  ->on('materia');
		});
		
    }

    /* Reverse the migrations.
     * @return void */
    public function down() {
		
		Schema::table('alumno_materia', function (Blueprint $table) {
		

			$table->dropForeign(['id_alumno']);

			$table->dropForeign(['id_materia']);
		});
    }
	
	//------------ CREATE ---------------
	//php artisan make:migration Estructura/alter_alumno_materia_table_fk
	
	//------------ GENERATE ---------------	
	//php artisan migrate --path=database/migrations/Estructura/alter_alumno_materia_table_fk.php
	//php artisan migrate:rollback --path=database/migrations/Estructura/alter_alumno_materia_table_fk.php
	//php artisan migrate (Todos Create)
	//php artisan migrate:reset (Todos Drop)
};
