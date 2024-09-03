<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	/* Run the migrations.
     * @return void */	
    public function up() {
		
		Schema::table('nota', function (Blueprint $table) {
		

			$table->foreign('id_alumno')
				  ->references('id')
				  ->on('alumno');

			$table->foreign('id_materia')
				  ->references('id')
				  ->on('materia');

			$table->foreign('id_docente')
				  ->references('id')
				  ->on('docente');
		});
		
    }

    /* Reverse the migrations.
     * @return void */
    public function down() {
		
		Schema::table('nota', function (Blueprint $table) {
		

			$table->dropForeign(['id_alumno']);

			$table->dropForeign(['id_materia']);

			$table->dropForeign(['id_docente']);
		});
    }
	
	//------------ CREATE ---------------
	//php artisan make:migration Proceso/alter_nota_table_fk
	
	//------------ GENERATE ---------------	
	//php artisan migrate --path=database/migrations/Proceso/alter_nota_table_fk.php
	//php artisan migrate:rollback --path=database/migrations/Proceso/alter_nota_table_fk.php
	//php artisan migrate (Todos Create)
	//php artisan migrate:reset (Todos Drop)
};
