<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	/* Run the migrations.
     * @return void */	
    public function up() {
		
		Schema::table('docente_materia', function (Blueprint $table) {
		

			$table->foreign('id_docente')
				  ->references('id')
				  ->on('docente');

			$table->foreign('id_materia')
				  ->references('id')
				  ->on('materia');
		});
		
    }

    /* Reverse the migrations.
     * @return void */
    public function down() {
		
		Schema::table('docente_materia', function (Blueprint $table) {
		

			$table->dropForeign(['id_docente']);

			$table->dropForeign(['id_materia']);
		});
    }
	
	//------------ CREATE ---------------
	//php artisan make:migration Estructura/alter_docente_materia_table_fk
	
	//------------ GENERATE ---------------	
	//php artisan migrate --path=database/migrations/Estructura/alter_docente_materia_table_fk.php
	//php artisan migrate:rollback --path=database/migrations/Estructura/alter_docente_materia_table_fk.php
	//php artisan migrate (Todos Create)
	//php artisan migrate:reset (Todos Drop)
};
