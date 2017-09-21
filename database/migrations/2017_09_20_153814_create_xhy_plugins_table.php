<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyPluginsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_plugins', function(Blueprint $table)
		{
			$table->string('code', 30)->default('')->primary();
			$table->string('version', 10)->default('');
			$table->string('library')->default('');
			$table->boolean('assign')->default(0);
			$table->integer('install_date')->unsigned()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_plugins');
	}

}
