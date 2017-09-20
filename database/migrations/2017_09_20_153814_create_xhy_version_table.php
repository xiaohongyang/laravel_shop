<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyVersionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_version', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('platform')->default(3);
			$table->char('version', 50)->nullable();
			$table->char('url', 200)->nullable();
			$table->char('content');
			$table->boolean('status')->default(1);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_version');
	}

}
