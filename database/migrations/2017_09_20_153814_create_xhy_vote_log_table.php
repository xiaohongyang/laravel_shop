<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyVoteLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_vote_log', function(Blueprint $table)
		{
			$table->increments('log_id');
			$table->smallInteger('vote_id')->unsigned()->default(0)->index('vote_id');
			$table->string('ip_address', 15)->default('');
			$table->integer('vote_time')->unsigned()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_vote_log');
	}

}
