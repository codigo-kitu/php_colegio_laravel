<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	/* Run the migrations.
     * @return void */	
    public function up() {
        			
		//RENAME TABLE
		Schema::rename('sueldo','new_sueldo');
		
		//UPDATE TABLE		
		Schema::table('sueldo', function (Blueprint $table) {
			
			$table->unsignedBigInteger('id_docente')
					  ->change();
			
			$table->integer('anio')
					  ->default(0)
					  ->change();
			
			$table->smallInteger('mes')
					  ->default(0)
					  ->change();
			
			$table->decimal('valor',18,2)
					  ->default(0.0)
					  ->change();
			
			$table->boolean('cobrado')
					  ->default(0)
					  ->change();
			
		});		
    }

    /* Reverse the migrations.
     * @return void */
    public function down() {
		
		//RENAME TABLE
		Schema::rename('sueldo','new_sueldo');
		
		//UPDATE TABLE		
		Schema::table('sueldo', function (Blueprint $table) {
			
			$table->unsignedBigInteger('id_docente')
					  ->change();
			
			$table->integer('anio')
					  ->default(0)
					  ->change();
			
			$table->smallInteger('mes')
					  ->default(0)
					  ->change();
			
			$table->decimal('valor',18,2)
					  ->default(0.0)
					  ->change();
			
			$table->boolean('cobrado')
					  ->default(0)
					  ->change();
			
		});
    }
	
	//------------ CREATE ---------------
	//php artisan make:migration Financiero/alter_sueldo_table
	
	//------------ GENERATE ---------------	
	//php artisan migrate --path=database/migrations/Financiero/alter_sueldo_table.php
	//php artisan migrate:rollback --path=database/migrations/Financiero/alter_sueldo_table.php
	//php artisan migrate (Todos Create)
	//php artisan migrate:reset (Todos Drop)
};
