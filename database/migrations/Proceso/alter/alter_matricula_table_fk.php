<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	/* Run the migrations.
     * @return void */	
    public function up() {
		
		Schema::table('matricula', function (Blueprint $table) {
		

			$table->foreign('id')
				  ->references('id')
				  ->on('alumno');
		});
		
    }

    /* Reverse the migrations.
     * @return void */
    public function down() {
		
		Schema::table('matricula', function (Blueprint $table) {
		

			$table->dropForeign(['id']);
		});
    }
	
	//------------ CREATE ---------------
	//php artisan make:migration Proceso/alter_matricula_table_fk
	
	//------------ GENERATE ---------------	
	//php artisan migrate --path=database/migrations/Proceso/alter_matricula_table_fk.php
	//php artisan migrate:rollback --path=database/migrations/Proceso/alter_matricula_table_fk.php
	//php artisan migrate (Todos Create)
	//php artisan migrate:reset (Todos Drop)
};
