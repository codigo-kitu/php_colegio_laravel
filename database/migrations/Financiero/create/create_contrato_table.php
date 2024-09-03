<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	/* Run the migrations.
     * @return void */	
    public function up() {
        			
		Schema::create('contrato', function (Blueprint $table) {
			
			//GENERAL
			$table->engine = 'InnoDB';
			$table->charset = 'utf8mb4';
			$table->collation = 'utf8mb4_unicode_ci'; //unicode,general
			
			//COLUMNS
			$table->id();
			
			$table->timestamps(); //created_at,updated_at
			
			$table->integer('anio')
				  ->default(0);
			
			$table->decimal('valor',18,2)
				  ->default(0.0);
			
			$table->date('fecha')
				  ->default(date('Y-m-d'));
			
			$table->boolean('firmado')
				  ->default(0);
			
						
		});					
		
    }

    /* Reverse the migrations.
     * @return void */
    public function down() {
		
        Schema::dropIfExists('contrato');
    }
	
	//=========================== NO APLICA ===========================
	
	//* Usar los Archivos create_name_table.php,alter_name_table.php generados.
	//* Usar parametro --path en migrate con archivos create_name_table.php,alter_name_table.php generados.

	//------------ CREATE MIGRATION: create table ---------------
	//php artisan make:migration --path database/migrations/Financiero/create create_contrato_table
	
	//------------ CREATE MIGRATION: alter table ---------------
	//php artisan make:migration --path database/migrations/Financiero/alter alter_contrato_table
	
	//=========================== NO APLICA ===========================
	
	//------------ RUN MIGRATION: create/alter table --> (public function up()) ---------------	
	//php artisan migrate --path=database/migrations/Financiero/create/create_contrato_table.php
	//php artisan migrate --path=database/migrations/Financiero/alter/alter_contrato_table.php
	
	//php artisan migrate (Run Todos Create)
	
	//------------ ROLLBACK MIGRATION: crete/alter(public function down()) ---------------		
	//php artisan migrate:rollback --path=database/migrations/Financiero/create/create_contrato_table.php
	//php artisan migrate:rollback --path=database/migrations/Financiero/alter/alter_contrato_table.php
	
	//php artisan migrate:reset (Delete Todos Drop)
};
