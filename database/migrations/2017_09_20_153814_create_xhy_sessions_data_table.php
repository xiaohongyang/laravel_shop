<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhySessionsDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_sessions_data', function(Blueprint $table)
		{
			$table->string('sesskey', 32)->default('')->primary();
			$table->integer('expiry')->unsigned()->default(0)->index('expiry');
			$table->text('data');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_sessions_data');
	}

}
