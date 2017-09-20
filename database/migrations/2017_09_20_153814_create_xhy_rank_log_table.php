<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyRankLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_rank_log', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('rank_id')->nullable();
			$table->string('rank_name', 45)->nullable();
			$table->integer('pay_points')->nullable();
			$table->integer('create_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_rank_log');
	}

}
