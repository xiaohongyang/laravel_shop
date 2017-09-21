<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyKeywordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_keywords', function(Blueprint $table)
		{
			$table->date('date');
			$table->string('searchengine', 20)->default('');
			$table->string('keyword', 90)->default('');
			$table->integer('count')->unsigned()->default(0);
			$table->primary(['date','searchengine','keyword']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_keywords');
	}

}
