<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhySuppliersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_suppliers', function(Blueprint $table)
		{
			$table->smallInteger('suppliers_id', true)->unsigned();
			$table->string('suppliers_name')->nullable();
			$table->text('suppliers_desc', 16777215)->nullable();
			$table->boolean('is_check')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_suppliers');
	}

}
