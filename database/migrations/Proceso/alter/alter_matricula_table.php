<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	/* Run the migrations.
     * @return void */	
    public function up() {
        			
		//RENAME TABLE
		Schema::rename('matricula','new_matricula');
		
		//UPDATE TABLE		
		Schema::table('matricula', function (Blueprint $table) {
			
			$table->integer('anio')
					  ->default(0)
					  ->change();
			
			$table->decimal('costo',18,2)
					  ->default(0.0)
					  ->change();
			
			$table->date('fecha')
					  ->default(date('Y-m-d'))
					  ->change();
			
			$table->boolean('pagado')
					  ->default(0)
					  ->change();
			
		});		
    }

    /* Reverse the migrations.
     * @return void */
    public function down() {
		
		//RENAME TABLE
		Schema::rename('matricula','new_matricula');
		
		//UPDATE TABLE		
		Schema::table('matricula', function (Blueprint $table) {
			
			$table->integer('anio')
					  ->default(0)
					  ->change();
			
			$table->decimal('costo',18,2)
					  ->default(0.0)
					  ->change();
			
			$table->date('fecha')
					  ->default(date('Y-m-d'))
					  ->change();
			
			$table->boolean('pagado')
					  ->default(0)
					  ->change();
			
		});
    }
	
	//------------ CREATE ---------------
	//php artisan make:migration Proceso/alter_matricula_table
	
	//------------ GENERATE ---------------	
	//php artisan migrate --path=database/migrations/Proceso/alter_matricula_table.php
	//php artisan migrate:rollback --path=database/migrations/Proceso/alter_matricula_table.php
	//php artisan migrate (Todos Create)
	//php artisan migrate:reset (Todos Drop)
};
