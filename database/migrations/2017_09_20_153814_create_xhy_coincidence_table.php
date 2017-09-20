<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyCoincidenceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_coincidence', function(Blueprint $table)
		{
			$table->string('type_id', 100);
			$table->string('type', 20);
			$table->integer('time')->nullable();
			$table->primary(['type_id','type']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_coincidence');
	}

}
