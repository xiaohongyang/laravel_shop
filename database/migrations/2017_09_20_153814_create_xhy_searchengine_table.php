<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhySearchengineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_searchengine', function(Blueprint $table)
		{
			$table->date('date');
			$table->string('searchengine', 20)->default('');
			$table->integer('count')->unsigned()->default(0);
			$table->primary(['date','searchengine']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_searchengine');
	}

}
