<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	/* Run the migrations.
     * @return void */	
    public function up() {
        			
		Schema::create('sueldo', function (Blueprint $table) {
			
			//GENERAL
			$table->engine = 'InnoDB';
			$table->charset = 'utf8mb4';
			$table->collation = 'utf8mb4_unicode_ci'; //unicode,general
			
			//COLUMNS
			$table->id();
			
			$table->timestamps(); //created_at,updated_at
			
			$table->unsignedBigInteger('id_docente');
			
			$table->integer('anio')
				  ->default(0);
			
			$table->smallInteger('mes')
				  ->default(0);
			
			$table->decimal('valor',18,2)
				  ->default(0.0);
			
			$table->boolean('cobrado')
				  ->default(0);
			
						
		});					
		
    }

    /* Reverse the migrations.
     * @return void */
    public function down() {
		
        Schema::dropIfExists('sueldo');
    }
	
	//=========================== NO APLICA ===========================
	
	//* Usar los Archivos create_name_table.php,alter_name_table.php generados.
	//* Usar parametro --path en migrate con archivos create_name_table.php,alter_name_table.php generados.

	//------------ CREATE MIGRATION: create table ---------------
	//php artisan make:migration --path database/migrations/Financiero/create create_sueldo_table
	
	//------------ CREATE MIGRATION: alter table ---------------
	//php artisan make:migration --path database/migrations/Financiero/alter alter_sueldo_table
	
	//=========================== NO APLICA ===========================
	
	//------------ RUN MIGRATION: create/alter table --> (public function up()) ---------------	
	//php artisan migrate --path=database/migrations/Financiero/create/create_sueldo_table.php
	//php artisan migrate --path=database/migrations/Financiero/alter/alter_sueldo_table.php
	
	//php artisan migrate (Run Todos Create)
	
	//------------ ROLLBACK MIGRATION: crete/alter(public function down()) ---------------		
	//php artisan migrate:rollback --path=database/migrations/Financiero/create/create_sueldo_table.php
	//php artisan migrate:rollback --path=database/migrations/Financiero/alter/alter_sueldo_table.php
	
	//php artisan migrate:reset (Delete Todos Drop)
};
