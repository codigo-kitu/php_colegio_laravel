<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	/* Run the migrations.
     * @return void */	
    public function up() {
		
		Schema::table('sueldo', function (Blueprint $table) {
		

			$table->foreign('id_docente')
				  ->references('id')
				  ->on('docente');
		});
		
    }

    /* Reverse the migrations.
     * @return void */
    public function down() {
		
		Schema::table('sueldo', function (Blueprint $table) {
		

			$table->dropForeign(['id_docente']);
		});
    }
	
	//------------ CREATE ---------------
	//php artisan make:migration Financiero/alter_sueldo_table_fk
	
	//------------ GENERATE ---------------	
	//php artisan migrate --path=database/migrations/Financiero/alter_sueldo_table_fk.php
	//php artisan migrate:rollback --path=database/migrations/Financiero/alter_sueldo_table_fk.php
	//php artisan migrate (Todos Create)
	//php artisan migrate:reset (Todos Drop)
};
