<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhySearchHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_search_history', function(Blueprint $table)
		{
			$table->increments('id');
			$table->char('keyword', 50);
			$table->integer('count');
			$table->enum('type', array('goods','store'));
			$table->integer('store_id');
			$table->integer('updated');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_search_history');
	}

}
